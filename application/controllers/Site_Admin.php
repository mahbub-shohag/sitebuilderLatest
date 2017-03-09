<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Site_Admin
 *
 * @author Mahbub-Alam
 */
class Site_Admin extends My_Admin_Controller{
       function __construct() {
parent::__construct();
$this->load->model('Site_model');
$this->load->library('session');
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
        $site_id = $_GET['site_id'];
        $data['site_id'] = $site_id;
        //echo $site_id;
        $site_info = $this->Site_model->get_site_info($site_id);
        $data['site_info'] = $site_info;
        $this->render_edu('education_admin/education_admin_dashboard',$data);
    }
}
