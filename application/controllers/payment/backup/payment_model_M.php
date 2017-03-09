<?php

class Payment_Model extends CI_Model {

    public function __construct() {
        $this->load->database();
    }
    public function save_data($data, $table,$sequence_name=NULL) {   
        $this->db->insert($table,$data);
        
          if($sequence_name!=NULL)
            {
                $sql = "SELECT $sequence_name.CURRVAL from dual";
                $result = $this->db->query($sql);
                return $result->row()->CURRVAL;
            }
    }
    
   public function update_data($data,$table,$where){
       
        $this->db->where($where);
        $this->db->update($table,$data);
    }
    
    public function delete_data($table,$where){
        $this->db->delete($table,$where); 
    }
    
    public function get_details_bill_info($bill_id=NULL){
        $this->db->select('bill.*,supplier.SUPPLIER_NAME,payment_type.PAY_TYPE_NAME,status.STATUS_NAME');
        $this->db->from('bill');
        $this->db->join('supplier','bill.SUPPLIER_ID=supplier.SUPPLIER_ID');
        $this->db->join('payment_type','payment_type.PAY_TYPE_ID=bill.PAYMENT_TYPE');
        //$this->db->join('purchase_order','bill.PO_NUMBER=purchase_order.PURCHASE_ORDER_ID');
        $this->db->join('status','bill.STATUS = status.STATUS_ID');
        
        if($bill_id==NULL){
            $result = $this->db->get();
            return $result->result_array();
        }
        else{
           $this->db->where('BILL_ID',$bill_id);
           $result = $this->db->get();
           return $result->row();
        }
    }
    
    public function get_pending_bill_list($user_id){
        $this->db->select('bill.*,supplier.SUPPLIER_NAME,payment_type.PAY_TYPE_NAME,status.STATUS_NAME,purchase_order.PURCHASE_ORDER_NO');
        $this->db->from('bill');
        $this->db->join('supplier','bill.SUPPLIER_ID=supplier.SUPPLIER_ID');
        $this->db->join('payment_type','payment_type.PAY_TYPE_ID=bill.PAYMENT_TYPE');
        $this->db->join('purchase_order','bill.PO_NUMBER=purchase_order.PURCHASE_ORDER_ID');
        $this->db->join('status','bill.STATUS = status.STATUS_ID');
        $this->db->where('PRESENT_LOCATION',$user_id);
        $this->db->where("bill.STATUS",7); // 7 FOR PENDING
         //echo $this->db->_compile_select();exit;
        $result = $this->db->get();
        return $result->result_array();
        
    }
    
        public function get_approve_bill_list($user_id){
        $this->db->select('bill.*,bill_approval_history.REMARKS,bill_approval_history.APPROVAL_DATE,supplier.SUPPLIER_NAME,payment_type.PAY_TYPE_NAME,status.STATUS_NAME,purchase_order.PURCHASE_ORDER_NO');
        $this->db->from('bill');
        $this->db->join('supplier','bill.SUPPLIER_ID=supplier.SUPPLIER_ID');
        $this->db->join('payment_type','payment_type.PAY_TYPE_ID=bill.PAYMENT_TYPE');
        $this->db->join('purchase_order','bill.PO_NUMBER=purchase_order.PURCHASE_ORDER_ID');
        $this->db->join('status','bill.STATUS = status.STATUS_ID');
        $this->db->join('bill_approval_history','bill_approval_history.BILL_ID = bill.BILL_ID');
        $this->db->where('APPROVAL_PERSON',$user_id);
        //$this->db->where("bill.STATUS",7); // 7 FOR PENDING
         //echo $this->db->_compile_select();exit;
        $result = $this->db->get();
        return $result->result_array();
        
    }
    
    public function get_unit_price($selected_item){
        $this->db->select('UNIT_PRICE');
        $this->db->from('items');
        $this->db->where('ITEM_ID',$selected_item);
        $result = $this->db->get();
        return $result->row()->UNIT_PRICE;
    }
    
    public function get_bill_item_list($bill_id){
        $this->db->select('item_details.*,items.ITEM_NAME');
        $this->db->from('item_details');
        $this->db->join('items','item_details.ITEM_ID=items.ITEM_ID');
        $this->db->where('item_details.BILL_ID',$bill_id);
        $result = $this->db->get();
        return $result->result_array();
    }
    
    public function get_details_item_info($bill_id,$item_details_id){
        $this->db->select('*');
        $this->db->from('item_details');
        //$this->db->join('items','item_details.ITEM_ID=items.ITEM_ID');
        $this->db->where('item_details.BILL_ID',$bill_id);
        $this->db->where('item_details.ITEM_DETAILS_ID',$item_details_id);
        //echo $this->db->_compile_select();exit;
        $result = $this->db->get();
        return $result->row();
    }
    
    public function get_details_pan_info($pan_id=NULL){
        
        $this->db->select('payment_approval_note.*,status.STATUS_NAME');
        $this->db->from('payment_approval_note');
        $this->db->join('status','payment_approval_note.STATUS=status.STATUS_ID');
        if($pan_id==NULL){
            $result = $this->db->get();
            return $result->result_array();
        }
        else{
           $this->db->where('PAN_ID',$pan_id);
           $result = $this->db->get();
           return $result->row();
        }
        
    }
    
    public function get_last_sort_no($pan_id){
        $this->db->select_max('SORTING_NUMBER');
        $this->db->from('approval_delegation');
        $this->db->where('PAN_ID',$pan_id);
        $result = $this->db->get();
        $sort_no = $result->row()->SORTING_NUMBER;
        if($sort_no !=NULL){
            return $sort_no;
        }
        else{
            return 0;
        }
        
    }
    
    public function get_delegation_users($pan_id=NULL){
        $this->db->select(' "approval_delegation".*,"user_id","username" || \' > \' || "first_name" || \' \' || "last_name" AS "NAME" ',FALSE);
        $this->db->from('approval_delegation');
        $this->db->join('user','approval_delegation.APPROVAL_PERSON_ID=user.user_id');
        if($pan_id!=NULL){
            $this->db->where('PAN_ID',$pan_id);
        }
        $this->db->order_by('SORTING_NUMBER','ASC');
           $result = $this->db->get();
           return $result->result_array();
    }
    
    
    public function set_last_approval_person($pan_id){
            // FIRST RESET IS_LAST FIELD OF ALL ENTRIES OF THIS PAN
            $reset_data = array("IS_LAST"=>0);
            $this->db->where('approval_delegation.PAN_ID',$pan_id);
            $this->db->update('approval_delegation', $reset_data); 
            
            // set last inserted person as first
            $data = array("IS_LAST"=>1);
        // build subquery
            $this->db->select_max('SORTING_NUMBER');
            $this->db->from('approval_delegation');
            $this->db->where('approval_delegation.PAN_ID',$pan_id);
            $where_clause = $this->db->_compile_select();
            $this->db->_reset_select();
            $this->db->where('approval_delegation.PAN_ID',$pan_id);
            
            $this->db->where('SORTING_NUMBER = ','('.$where_clause.')',false);
            
            $this->db->update('approval_delegation', $data); 
            //echo $this->db->last_query();exit;
    }
    
    public function reorder_user_delegation($data){
        foreach ($data as $value) {
            $split_value = explode("=", $value);
            $DELEGATION_id = $split_value[0];
            $SORTING_NUMBER = $split_value[1];
            $update_data = array("SORTING_NUMBER"=>$SORTING_NUMBER);
            $where = array("DELEGATION_ID"=>$DELEGATION_id);    
            
            $this->db->where($where);
            $this->db->update('approval_delegation',$update_data);

    }                 
}

  public function check_delegation_user($where){
      $this->db->select('*');
      $this->db->from('approval_delegation');
      $this->db->where($where);
     // echo $this->db->_compile_select();exit;
      $result = $this->db->get();
      
       if($result->num_rows()){
           return 1;
       }
       else {return 0;}
  }
  
  public function get_line_manager_id($user_id){
        
        $this->db->select('line_manager_id');
        $this->db->from('user');
        $this->db->where('user_id',$user_id);
        //echo $this->db->_compile_select();exit;
        $result = $this->db->get();
        return $result->row()->line_manager_id;
  }
  
  public function get_last_approval_person($pan_id){
      $this->db->select('APPROVAL_PERSON_ID');
      $this->db->from('approval_delegation');
      $this->db->where('PAN_ID',$pan_id);
      $this->db->where('IS_LAST',1);
      $result = $this->db->get();
      return $result->row()->APPROVAL_PERSON_ID;
      
  }
  
  // get created by me pan list
  public function get_created_pan_list($user_id=NULL){
        $this->db->select('payment_approval_note.*,bill.INVOICE_NUMBER,status.STATUS_NAME');
        $this->db->from('payment_approval_note');
        $this->db->join('bill','payment_approval_note.BILL_ID=bill.BILL_ID');
        $this->db->join('status','payment_approval_note.STATUS = status.STATUS_ID');
        if($user_id){
            $this->db->where('payment_approval_note.CREATED_BY',$user_id);
        }
        else{
           $this->db->where('payment_approval_note.STATUS',8);// status approved 
        }
        //echo $this->db->_compile_select();exit;
        
        $result = $this->db->get();
        return $result->result_array(); 
  }
  
  public function get_pending_pan_list($user_id=NULL){
        $this->db->select('payment_approval_note.*,bill.INVOICE_NUMBER,status.STATUS_NAME');
        $this->db->from('payment_approval_note');
        $this->db->join('bill','payment_approval_note.BILL_ID=bill.BILL_ID');
        $this->db->join('status','payment_approval_note.STATUS = status.STATUS_ID');
        $this->db->where('payment_approval_note.STATUS',7); // waiting for approval
        if($user_id){
            $this->db->where('payment_approval_note.PRESENT_LOCATION',$user_id);
        }
        //echo $this->db->_compile_select();exit;
        
        $result = $this->db->get();
        return $result->result_array();   
  }
  
    public function get_approved_pan_list($user_id){
        // SUBQUERY
        
        $this->db->select('pan_approval_history.PAN_ID');
        $this->db->from('pan_approval_history');
        $this->db->where('pan_approval_history.APPROVAL_PERSON',$user_id);
        //$this->db->order_by('approval_delegation.SORTING_NUMBER');
        $IN_clause = $this->db->_compile_select();
         //echo $IN_clause ;exit;
        $this->db->_reset_select();
        
      // MAIN QUERY
       // $this->db->distinct();
        $this->db->select('bill.INVOICE_NUMBER,pan_approval_history.*,payment_approval_note.*,status.STATUS_NAME');
        $this->db->from('payment_approval_note');
        $this->db->join('pan_approval_history','payment_approval_note.PAN_ID=pan_approval_history.PAN_ID');
        $this->db->join('bill','payment_approval_note.BILL_ID=bill.BILL_ID');
        $this->db->join('status','payment_approval_note.STATUS = status.STATUS_ID');
        $this->db->where(' "payment_approval_note"."PAN_ID" IN ('.$IN_clause.')',NULL,FALSE);
        $this->db->where('pan_approval_history.APPROVAL_PERSON',$user_id);
      // echo $this->db->_compile_select();exit;
        $result = $this->db->get();
        return $result->result_array();
        
    }
  
  public function get_pan_approval_history($pan_id){
      $this->db->select('pan_approval_history.*,user.first_name');
      $this->db->from('pan_approval_history');
      $this->db->join('user','user.user_id=pan_approval_history.APPROVAL_PERSON');
      $this->db->where('pan_approval_history.PAN_ID',$pan_id);
      //echo $this->db->_compile_select();exit;
      $result = $this->db->get();
     return $result->result_array();
  }
  
  public function get_delegator_id($pan_id) {
      $this->db->select('*');
      $this->db->from('approval_delegation');
      $this->db->where('approval_delegation.PAN_ID',$pan_id);
      $this->db->where('approval_delegation.IS_DONE',0);
      $this->db->order_by('approval_delegation.SORTING_NUMBER');
      $from_clause = $this->db->_compile_select();
      $this->db->_reset_select();
      
      // MAIN QUERY
      $this->db->select('*');
      $this->db->from('('.$from_clause.')');
      $this->db->where('ROWNUM=',1,FALSE);
       //echo $this->db->_compile_select();exit;
      $result = $this->db->get();
      if($result->num_rows()){
        return $result->row()->APPROVAL_PERSON_ID;
      }
      
  }
  
  // get pan attached file
  
      public function get_file_list($pan_id){
        $this->db->select('*');
        $this->db->from('pan_attached_document');
        //$this->db->join('attachment_title','attachment_title.ATTACHMENT_TITLE_ID=attached_document.ATTACHMENT_TITLE_ID');
        $this->db->where('PAN_ID',$pan_id);
      // echo $this->db->_compile_select();exit;
        $result = $this->db->get();
        return $result->result_array();
    }
    public function get_item_details_by_id($item_id){
         $this->db->select('*');
        $this->db->from('items');
        //$this->db->join('attachment_title','attachment_title.ATTACHMENT_TITLE_ID=attached_document.ATTACHMENT_TITLE_ID');
        $this->db->where('ITEM_ID',$item_id);
      // echo $this->db->_compile_select();exit;
        $result = $this->db->get();
       // echo $this->db->last_query();
        return $result->row();
        
    }
    
}



