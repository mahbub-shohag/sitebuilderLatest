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
class Visit_Sites extends My_Admin_Controller{
       function __construct() {
parent::__construct();
$this->load->model('Site_model');
$this->load->library('session');
}
function education()
{
    $this->load->view('education/header');
     $this->load->view('education/menu_header');
    $this->load->view('education/banner');
    $this->load->view('education/index');
    $this->load->view('education/footer');
}
}
