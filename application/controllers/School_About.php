<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of School_About
 *
 * @author Mahbub-Alam
 */
class School_About extends My_Admin_Controller{
    function __construct() {
        parent::__construct();
    $this->load->model('School_About_Model');
    $this->load->library('session');
    $this->load->library('Upload');        
    }
    function about($about_id=NULL)
    {
        $this->load->view('common/education/aboutModal');
        /*if($_POST)
        {
            if($about_id)  //edit
            {
                
            }
            else{         //newly post to create
                
            }
            
        }
        else{           //only load the page
            //$this->load->view('common/education/aboutModal');
            $this->load->view('common/education/aboutModal');
        }*/
        
    }
    
}
