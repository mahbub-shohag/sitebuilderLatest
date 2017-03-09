<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Custom_Controller
 *
 * @author Mahbub-Alam
 */
class My_Controller extends CI_Controller {
    function __construct() {
        parent::__construct();
    }
    function render($view, $data=null)
    {
        $this->load->view('common/header');
        $this->load->view($view, $data);
        $this->load->view('common/footer');
    }
}
