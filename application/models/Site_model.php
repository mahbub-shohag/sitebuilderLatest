<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Site_model
 *
 * @author Mahbub-Alam
 */
class Site_model extends CI_Model{
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }
    function get_site_info($site_id=NULL)
    {
        $this->db->select("site.*,_cats.slug domain_type_slug");
        $this->db->from("site");
        $this->db->join('_cats','site.domain_type = _cats.id','inner');
        $this->db->where("site.id",$site_id);
        $query = $this->db->get();
        return $query->row();
    }
    function insert_data($table,$data)
    {
        return $this->db->insert('index',$data);
    }
    function get_index_row($site_id)
    {
        $this->db->select('*');
        $this->db->from('index');
        $this->db->where('site_id',$site_id);
        $query = $this->db->get();
        //echo $query;exit;
        $row = $query->row();
        //print_r($row);exit;
        return $row;
    }
    function update_data($tabel=null,$site_id,$data)
    {  
        //echo $table;exit;
        $this->db->where('site_id', $site_id);
        $this->db->update('index', $data); 
    }
   
   
}
