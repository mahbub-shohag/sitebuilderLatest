<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Owner_model
 *
 * @author Mahbub-Alam
 */
class Owner_model extends CI_Model{
    function __construct() {
        parent::__construct();
        $this->load->database();
    }
    function insert($table, $data)
    {
        $this->db->insert($table, $data);
    }
    
    function login($email=null, $password=null)
    {
        $this->db->select('*');
        $this->db->from('owner');
        $this->db->where('email',$email);
        $this->db->where('password',$password);
        //$this->db->get();
        //echo $this->db->last_query();exit();
        return $this->db->get()->row();
        
    }
}
