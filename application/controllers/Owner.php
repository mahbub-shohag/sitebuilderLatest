<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Owner
 *
 * @author Mahbub-Alam
 */
class Owner extends My_Controller{
    function __construct() {
        parent::__construct();
        $this->load->model('Owner_model');
    }
    function signup($owner_id=null){
    
        /*create / edit */
        if($_POST) 
        {
            if(isset($owner_id)) //edit
            {
                   
            }
        else 
            {  /*create*/
                $owner_info = $this->input->post(); 
                $result = $this->Owner_model->insert('owner', $owner_info);
                $data['message'] = 1;
                $this->render('owner/signup',$data); 
            }
        }  
        
        /*end of post block*/
        
        /*if not posted.either edit or new entry form */
        else  
        {
            if($owner_id) //edit a user from list or else 
            {
                
            }
            /*new entry form for signup*/
            else 
            {
               $this->render('owner/signup'); 
            }
            
        }
        
    }
    
    function login()
    {
        if($_POST)
        {
            $email = $this->input->post('email');
            $password = $this->input->post('password');
            $number_of_row = $this->Owner_model->login($email, $password);
            if($number_of_row)
            {
                $this->render('owner/admin_panel');
            }
        }
       else 
       {
           $this->render('owner/login');
       }
    }
    
    
    
}
