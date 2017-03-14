<?php
class OAdmin_Panel extends My_Admin_Controller {
    function __construct() {
parent::__construct();
$this->load->model('User_model');
$this->load->library('session');
}
function dashboard()
        {
            $my_sites = $this->User_model->get_my_sites($this->session->userdata['id']);
            $data['my_sites'] = $my_sites;
            $this->render('oadmin/admin-content',$data);
        }

function signup($id=null){
    
        /*create / edit */
        if($_POST) 
        {
            if(isset($id)) //edit
            {
                   
            }
        else 
            {  /*create*/
                $user_info = $this->input->post();
                $is_user_exists = $this->User_model->is_user_exists($user_info['user_name']);
                //print_r($is_user_exists);exit();
                if(count($is_user_exists)>0)
                {
                    $data['message'] = "sorry! this user name is already exists.Please try another";
                    $this->load->view('oadmin/login',$data); 
                }
                $user_info['password'] = md5($user_info['password']);
                $result = $this->User_model->insert('user', $user_info);
                $this->load->view('oadmin/login',$data); 
            }
        }  
        
        /*end of post block*/
        
        /*if not posted.either edit or new entry form */
        else  
        {
            if(isset($owner_id)) //edit a user from list or else 
            {
                
            }
            /*new entry form for signup*/
            else 
            { 
               $this->load->view('oadmin/login'); 
            }
            
        }
        
    }
    
function login()
{
    if($_POST)
    {
        $user_name = $this->input->post('user_name');
        $password = $this->input->post('password');
        $user_info = $this->User_model->login($user_name, $password);
        //print_r($number_of_row);exit();
        if($user_info)
        {   
            $this->session->set_userdata(array(
               'user_name' => $user_info->user_name,
               'email' => $user_info->email,
                'owner_id' => $user_info->id
            ));
            //$this->render('oadmin/admin-content');
            $this->render('education_admin/build_site_form');
        }
    }
   else 
   {
       $this->load->view('oadmin/login'); 
   }
}

function create_site($site_id=null)
{
    if($_POST)
    {
        if($site_id)
        {
            
        }
        else{
            //print_r($_POST);exit;
            $is_created = $this->User_model->insert('site',$_POST);
            if($is_created==1)
            {
                redirect('OAdmin_Panel/dashboard');
            }
        }
    }
    else{
        $categories = $this->User_model->get_categories();
        $data['domain_types'] = $this->User_model->get_domain_types();
        $data['categories'] = $categories;
        //print_r($categories);exit;
        $this->render('oadmin/site_create',$data);   
    }
    
}
function is_domain_exists()
{
    $domain = $_POST['domain'];
    $domain_type = $_POST['domain_type'];
    //echo $domain;exit;
    //print_r($_POST);exit;
    //echo $domain;exit;
    echo $this->User_model->is_domain_exists($domain,$domain_type);
}

function get_subcategories()
{
    $category_id = $_POST['category_id'];
    $get_item = $this->User_model->get_subcategories($category_id);
    $data['get_item'] = $get_item;
    return $this->load->view('common/create_dropdownlist',$data);
    
    //print_r($subcategories);exit;
}
function education()
{
    $this->load->view('education/header');
     $this->load->view('education/menu_header');
    $this->load->view('education/banner');
    $this->load->view('education/index');
    $this->load->view('education/footer');
}
function main_menu()
{
    $this->load->view('common/main_menu');
}
    
}
