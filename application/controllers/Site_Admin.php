<?php
class Site_Admin extends My_Admin_Controller{
       function __construct() {
parent::__construct();
$this->load->model('Site_model');
$this->load->library('session');
$this->load->library('Upload');
}
    function build_site($site_id=NULL)
    {
         /*create / edit */
        if($_POST) 
        {
            if(isset($site_id)) //edit
            {
                   
            }
        else 
            {  /*create*/
                
            }
        }  
        
        /*end of post block*/
        
        /*if not posted.either edit or new entry form */
        else  
        {
            if(isset($site_id)) //edit a user from list or else 
            {
                
            }
            /*new entry form for signup*/
            else 
            { 
               if(1==1){
                   $this->render('education_admin/education_admin_dashboard',$data);
               } 
               
            }
            
        }
    }
    
    function edit_site()
    {
        if($_POST)
        {
            //print_r($_POST);exit;
            $images = array();
            $logo_image = new Upload($_FILES['logo']);
            $logo_path = $this->upload_original($logo_image);
            $banner_image = new Upload($_FILES['banner']);
            $banner_path = $this->upload_original($banner_image);
            //echo $banner_path;exit;
            //$this->Site_model->insert_into($index,'');
            //echo $_POST['slug'];exit;
            $slug = $_POST['slug'];
            $data['logo_path'] = $logo_path;
            $data['banner_path'] = $banner_path;
            //array_push($data,$_POST);
            //print_r($data);exit;
            $site_id = $this->session->userdata['site_id'];
            $data['slug'] = $slug;
            $data['site_id'] = $this->session->userdata('site_id');
            //print_r($data);exit;
            if($_POST['update'])
            {
                if($logo_path){
                    $info['logo_path'] = $logo_path;
                }
                if($banner_path){
                    $info['banner_path'] = $banner_path;
                }
                $info['slug'] = $slug;
                $this->Site_model->update_data('index',$site_id,$info);  
            }
            if($this->Site_model->insert_data('index',$data))
            {
                
                //$data['site_id'] = $site_id;
                $site_info = $this->Site_model->get_site_info($site_id);
                $data['site_info'] = $site_info;
                $this->render_edu('education_admin/education_admin_dashboard',$data);
            }
        }
        else
        {
            $site_id = $_GET['site_id'];
            //$site_detail = $this->Site_model->get_site_info($site_id);
            $this->session->unset_userdata('site_id');
            $this->session->set_userdata(array('site_id' =>$site_id));
            //print_r($this->session->userdata('site_id'));exit;
            $data['site_id'] = $site_id;
            //echo $site_id;
            $site_info = $this->Site_model->get_site_info($site_id);
            $data['site_info'] = $site_info;
            //print_r($site_info);exit;
            /*if($site_info->id==5 || $site_info->id==6 || $site_info->id==7 || $site_info->id==8)
            {
                $this->render_school('templates/school/index',$data);
            }*/
            $this->render_edu('education_admin/education_admin_dashboard',$data);
        }
        
    }
    
    function upload_original($foo)
        {   
            $folder ="image/education/".$this->session->userdata('site_id');
            $images['image_path'] = $folder.$foo->file_src_name_body.".jpg";
            if ($foo->uploaded) {
                $foo->Process($folder);
                if ($foo->processed) {
                //echo 'successful';
               //return;
                return $images['image_path'];
            } else {
              echo 'error : ' . $foo->error;
            }
         }
        }            
    
    function load_modal($page_name=NULL)
    {
        $site_id = $this->session->userdata('site_id');
        $index_row = $this->Site_model->get_index_row($site_id);
        $data['index_row'] = $index_row;
        //echo $index_row->slug;exit;
        //print_r($index_row);exit;
        //if($page_name==)
        $this->load->view('common/education/indexModal',$data);
    }
    
     function set_site_info_to_site($site_id)
    {
        $site_id = $_GET['site_id'];
        //$site_detail = $this->Site_model->get_site_info($site_id);
        $data['site_id'] = $site_id;
        //echo $site_id;
        $site_info = $this->Site_model->get_site_info($site_id);
        $this->session->set_userdata('site_id',$site_id);
        $data['site_info'] = $site_info;
        $this->render_edu('education_admin/education_admin_dashboard',$data);
    }
    function browse_school($template_id=NULL, $site_id)
    {
        if($template_id ==1){
            
           $this->render_school('templates/school/index'); 
        }
        else if($template_id==2){
            
        }
        else{
            
        }
        
    }
 
}
