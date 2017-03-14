<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of My_Admin_Controller
 *
 * @author Mahbub-Alam
 */
class My_Admin_Controller extends CI_Controller{
    function __construct() {
        parent::__construct();
    }
    function render($view=null,$data=null)
    {
        $this->load->view('common/oheader',$data);
        $this->load->view($view,$data);
        $this->load->view('common/ofooter');
    }
    function render_school($view=NULL,$data=NULL)
    {
        $this->load->view('templates/school/header');
        $this->load->view($view,$data);    
    }
    function render_edu($view=null,$data=null)
    {
        $this->load->view('common/education/oheader',$data);
        $this->load->view($view,$data);
        $this->load->view('common/education/ofooter');
    }
    function render_main($view=NULL,$data=NULL)
    {
        $menus = $data['menus'];
        $m['menus']=$menus;
        $this->load->view('main_template/header',$m);
        $this->load->view($view,$data);
        $this->load->view('main_template/footer');
    }

}
