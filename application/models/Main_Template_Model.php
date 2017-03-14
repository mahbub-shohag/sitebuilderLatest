<?php
class Main_Template_Model extends CI_Model {
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }
    function get_menu()
    {
        $query = $this->db->query('
            SELECT * FROM _cats WHERE parent =1
            UNION
            SELECT * FROM _cats WHERE parent in(SELECT id FROM _cats WHERE parent =1)
            UNION
            SELECT * FROM _cats where parent in(SELECT id FROM _cats WHERE parent in(SELECT id FROM _cats WHERE parent =1))'
                            ,false);
        $menus = $query->result_array();
        return $menus;
    }
    
    function if_user_unique($data)
    {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('user_name',$data['user_name']);
        $this->db->or_where('email',$data['email']);
        return $this->db->count_all_results();
    }
    function insert_data($table,$data)
    {
        $this->db->insert($table,$data);
    }
    function login($user_info)
    {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('password',$user_info['password']);
        $this->db->where('user_name',$user_info['user_name']);
        $this->db->or_where('email',$user_info['user_name']);
        $result = $this->db->get();
        //$result = $this->db->get();
         $count_result = $this->db->count_all_results();
         if($count_result==1)
           {
               
             return $result->result_array();
           }
         else if($count_result==0)
           {
               return "Sorry There No Such Account!";
           }
         else
           {
               
               return "There is some problem.";  
           }  
        //$result->result_array();
        //echo $this->db->last_query();       
    }
    function get_subcategory_wise_websites($subcategory_id)
    {
        $this->db->select('*');
        $this->db->from('site');
        $this->db->where('subcategory_id',$subcategory_id);
        $query = $this->db->get();
        return $query->result_array();
        
        
    }
}
