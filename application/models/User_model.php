<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of User_model
 *
 * @author Mahbub-Alam
 */
class User_model extends CI_Model {
    function __construct() {
        parent::__construct();
        $this->load->database();
    }
       function insert($table, $data)
    {
           return $this->db->insert($table, $data);
    }
    function is_user_exists($user_name)
    {
         $this->db->select('*');
         $this->db->from('user');
         $this->db->where('user_name', $user_name);
         return $this->db->get()->result_array();
    }
    function login($user_name=null, $password=null)
    {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('user_name',$user_name);
        $this->db->where('password',$password);
        //$this->db->get();
        //echo $this->db->last_query();exit();
        return $this->db->get()->row();
        
    }
    function get_categories()
    {
        $groups = array(19,20,21,22,31,32);
        $this->db->select('*');
        $this->db->from('_cats');
        $this->db->where_in('parent',$groups);
        return $this->db->get()->result_array();
        //echo $this->db->last_query();exit;
        //return $this->db->result_array();
    }
    
    function get_domain_types()
    {
        $this->db->select('id');
        $this->db->select('slug');
        $this->db->from('_cats');
        $this->db->where('parent',25);
        $query = $this->db->get();//->result_array();
        //echo $this->db->last_query();exit;
        return $query->result_array();
    }
    function is_domain_exists($domain,$domain_type)
    {
        return $this->db->where('domain',$domain)
                         ->where('domain_type',$domain_type)  
                         ->count_all_results('site');
        
    }
    function get_subcategories($category_id)
    {
        $this->db->select('id,slug');
        $this->db->from('_cats');
        $this->db->where('parent',$category_id);
        $query = $this->db->get();
        //echo $query;exit;
        return $query->result_array();
    }
    function get_my_sites($owner_id)
    {
        $this->db->select("site.*,_cats.slug domain_type_slug");
        $this->db->from("site");
        $this->db->join('_cats','site.domain_type = _cats.id','inner');
        $this->db->where("owner_id",$owner_id);
        $query = $this->db->get();
        return $query->result_array();
    }
    
}
