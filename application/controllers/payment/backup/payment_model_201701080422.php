<?php

class Payment_Model extends CI_Model {

    public function __construct() {
        $this->load->database();
    }
    public function save_data($data, $table,$sequence_name=NULL) {   
        $this->db->insert($table,$data);
        
        return;
        
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
       
        
        if($bill_id==NULL){
           $result =  $this->db->query('SELECT
	"bill".BILL_ID,
	"bill".SUPPLIER_ID,
	"bill".INVOICE_NUMBER,
	"bill".REFERENCE_NUMBER,
	"bill".PURCHASE_DATE,
	"bill".BILL_DATE,
	"bill".RECEIVE_DATE,
	"bill".STATUS,
	"bill".PRESENT_LOCATION,
	"bill".CREATED_BY,
	"bill".CREATED,
	"bill".UPDATED_BY,
	"bill".UPDATED,
	"bill".REFERENCE_TYPE,
	"bill".REMARKS,
	"bill".BILL_AMOUNT,
	"bill".PAID_AMOUNT,
	"bill".PAYMENT_TYPE,
	"bill".PAN_ID,
	"supplier"."SUPPLIER_NAME",
	"payment_type"."PAY_TYPE_NAME",
	"status"."STATUS_NAME",
	SUM (
		NVL("item_details"."QUANTITY",0) * NVL("item_details"."PRICE",0)+NVL("item_details"."VAT",0)+NVL("item_details"."TAX",0) 
	) TOTAL_BILL
FROM
	"bill"
LEFT JOIN "supplier" ON "bill"."SUPPLIER_ID" = "supplier"."SUPPLIER_ID"
LEFT JOIN "payment_type" ON "payment_type"."PAY_TYPE_ID" = "bill"."PAYMENT_TYPE"
LEFT JOIN "item_details" ON "item_details"."BILL_ID" = "bill"."BILL_ID"
LEFT JOIN "status" ON "bill"."STATUS" = "status"."STATUS_ID"
GROUP BY
	"bill".BILL_ID,
 "bill".SUPPLIER_ID,
 "bill".INVOICE_NUMBER,
 "bill".REFERENCE_NUMBER,
 "bill".PURCHASE_DATE,
 "bill".BILL_DATE,
 "bill".RECEIVE_DATE,
 "bill".STATUS,
 "bill".PRESENT_LOCATION,
 "bill".CREATED_BY,
 "bill".CREATED,
 "bill".UPDATED_BY,
 "bill".UPDATED,
 "bill".REFERENCE_TYPE,
 "bill".REMARKS,
 "bill".BILL_AMOUNT,
 "bill".PAID_AMOUNT,
 "bill".PAYMENT_TYPE,
"bill".PAN_ID,
"supplier"."SUPPLIER_NAME",
	"payment_type"."PAY_TYPE_NAME",
	"status"."STATUS_NAME"');
           
           /*$result =  $this->db->query('SELECT
	"bill".BILL_ID,
	"bill".SUPPLIER_ID,
	"bill".INVOICE_NUMBER,
	"bill".REFERENCE_NUMBER,
	"bill".PURCHASE_DATE,
	"bill".BILL_DATE,
	"bill".RECEIVE_DATE,
	"bill".STATUS,
	"bill".PRESENT_LOCATION,
	"bill".CREATED_BY,
	"bill".CREATED,
	"bill".UPDATED_BY,
	"bill". UPDATED,
	"bill".REFERENCE_TYPE,
	"bill".REMARKS,
	"bill".BILL_AMOUNT,
	"bill".PAID_AMOUNT,
	"bill".PAYMENT_TYPE,
	"supplier"."SUPPLIER_NAME",
	"payment_type"."PAY_TYPE_NAME",
	"status"."STATUS_NAME",
	SUM (
		NVL("item_details"."QUANTITY",0) * NVL("item_details"."PRICE",0)+NVL("item_details"."VAT",0)+NVL("item_details"."TAX",0) 
	) TOTAL_BILL
FROM
	"bill"
JOIN "supplier" ON "bill"."SUPPLIER_ID" = "supplier"."SUPPLIER_ID"
JOIN "payment_type" ON "payment_type"."PAY_TYPE_ID" = "bill"."PAYMENT_TYPE"
JOIN "item_details" ON "item_details"."BILL_ID" = "bill"."BILL_ID"
JOIN "status" ON "bill"."STATUS" = "status"."STATUS_ID"
where "bill".PAN_ID IS  NULL
GROUP BY
	"bill".BILL_ID,
 "bill".SUPPLIER_ID,
 "bill".INVOICE_NUMBER,
 "bill".REFERENCE_NUMBER,
 "bill".PURCHASE_DATE,
 "bill".BILL_DATE,
 "bill".RECEIVE_DATE,
 "bill".STATUS,
 "bill".PRESENT_LOCATION,
 "bill".CREATED_BY,
 "bill".CREATED,
 "bill".UPDATED_BY,
 "bill".UPDATED,
 "bill".REFERENCE_TYPE,
 "bill".REMARKS,
 "bill".BILL_AMOUNT,
 "bill".PAID_AMOUNT,
 "bill".PAYMENT_TYPE, "supplier"."SUPPLIER_NAME",
	"payment_type"."PAY_TYPE_NAME",
	"status"."STATUS_NAME"');*/
            
            return $result->result_array();
            
        }
        else{
             $this->db->select('bill.*,supplier.SUPPLIER_NAME,payment_type.PAY_TYPE_NAME,status.STATUS_NAME');
       
        $this->db->from('bill');
        $this->db->join('supplier','bill.SUPPLIER_ID=supplier.SUPPLIER_ID');
        $this->db->join('payment_type','payment_type.PAY_TYPE_ID=bill.PAYMENT_TYPE');
        //$this->db->join('purchase_order','bill.PO_NUMBER=purchase_order.PURCHASE_ORDER_ID');
        $this->db->join('status','bill.STATUS = status.STATUS_ID');
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
    
    //All required Info for pan Approval
    public function get_pan_info_prev($bill_id='') {
       print_r($bill_id);
       $x = implode(",", $bill_id);
       
     $bb = rtrim($x, ',');
        $result = $this->db->query('SELECT
	"bill".BILL_ID,
	"bill".SUPPLIER_ID,
	"bill".INVOICE_NUMBER,
	"bill".REFERENCE_NUMBER,
	"bill".PURCHASE_DATE,
	"bill".BILL_DATE,
	"bill".RECEIVE_DATE,
	"bill".STATUS,
	"bill".PRESENT_LOCATION,
	"bill".CREATED_BY,
	"bill".CREATED,
	"bill".UPDATED_BY,
	"bill". UPDATED,
	"bill".REFERENCE_TYPE,
	"bill".REMARKS,
	"bill".BILL_AMOUNT,
	"bill".PAID_AMOUNT,
	"bill".PAYMENT_TYPE,
	"supplier"."SUPPLIER_NAME",
	"payment_type"."PAY_TYPE_NAME",
	"status"."STATUS_NAME",
	SUM (
		NVL (
			"item_details"."QUANTITY",
			0
		) * NVL ("item_details"."PRICE", 0) + NVL ("item_details"."VAT", 0) + NVL ("item_details"."TAX", 0)
	) TOTAL_BILL
FROM
	"bill"
JOIN "supplier" ON "bill"."SUPPLIER_ID" = "supplier"."SUPPLIER_ID"
JOIN "payment_type" ON "payment_type"."PAY_TYPE_ID" = "bill"."PAYMENT_TYPE"
JOIN "item_details" ON "item_details"."BILL_ID" = "bill"."BILL_ID"
JOIN "status" ON "bill"."STATUS" = "status"."STATUS_ID"
WHERE
	"bill".BILL_ID IN('.$bb.')
GROUP BY
	"bill".BILL_ID,
	"bill".SUPPLIER_ID,
	"bill".INVOICE_NUMBER,
	"bill".REFERENCE_NUMBER,
	"bill".PURCHASE_DATE,
	"bill".BILL_DATE,
	"bill".RECEIVE_DATE,
	"bill".STATUS,
	"bill".PRESENT_LOCATION,
	"bill".CREATED_BY,
	"bill".CREATED,
	"bill".UPDATED_BY,
	"bill". UPDATED,
	"bill".REFERENCE_TYPE,
	"bill".REMARKS,
	"bill".BILL_AMOUNT,
	"bill".PAID_AMOUNT,
	"bill".PAYMENT_TYPE,
	"supplier"."SUPPLIER_NAME",
	"payment_type"."PAY_TYPE_NAME",
	"status"."STATUS_NAME"');
        
        return $result->row();
    }
    
    public function get_pan_info($bill_id='') {
        //$temp_bill_id = implode(",", $bill_id);
      $temp_bill_id = '';
      foreach ($bill_id as $bd):
        $temp_bill_id .= "'$bd',";
      endforeach;
        $final_bill_id = rtrim($temp_bill_id, ',');
        //$result = $this->db->query('select SUM( NVL("bill"."BILL_AMOUNT",0)) "TOTAL_BILL", SUM(NVL("bill"."PAID_AMOUNT",0)) "PAID_BILL" from "bill" where "BILL_ID" IN('.$final_bill_id.')');
        //$result = $this->db->query('SELECT SUM( NVL("bill"."BILL_AMOUNT",0)) "TOTAL_BILL", SUM(NVL("bill"."PAID_AMOUNT",0)) "PAID_BILL" from "bill"');
        $sql = 'SELECT
	SUM (
		NVL ("bill"."BILL_AMOUNT", 0)
	) "TOTAL_BILL",
	SUM (
		NVL ("bill"."PAID_AMOUNT", 0)
	) "PAID_BILL",
    "bill"."PAN_ID",
	"supplier"."SUPPLIER_NAME"
FROM
	"bill"
LEFT JOIN "supplier" ON "bill"."SUPPLIER_ID" = "supplier"."SUPPLIER_ID"
WHERE
	"BILL_ID" IN (' . $final_bill_id . ')
GROUP BY
    "bill"."PAN_ID",
	"supplier"."SUPPLIER_NAME"';
        $result = $this->db->query($sql);
        $result_final = $result->row();
        $result_final->BILL_ID = rtrim(implode(",", $bill_id), ',');

        return $result_final;
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
    
    public function get_bill_item_list_prev($bill_id){
        $this->db->select('item_details.*,items.ITEM_NAME');
        $this->db->from('item_details');
        $this->db->join('items','item_details.ITEM_ID=items.ITEM_ID');
        $this->db->where('item_details.BILL_ID',$bill_id);
        $result = $this->db->get();
        echo $this->db->last_query();
        exit();
        return $result->result_array();
    }
    public function get_bill_item_list($bill_id){
       $result= $this->db->query('SELECT
            CI."item_details".BILL_ID,
            CI."item_details".ITEM_ID,
            CI."item_details".DETAILS,
            CI."item_details".QUANTITY,
            CI."item_details".ITEM_DETAILS_ID,
            CI."item_details".PRICE,
            CI."item_details".VAT,
            CI."item_details".TAX,
            CI."item_details".CURRENCY,
            CI."item_details".EXCHANGE_RATE,
            CI."item_details".PURCHASE_DATE,
            CI."item_details".MEMO_NUMBER,
            CI."item_details".PO_NUMBER,
            CI."item_details".VAT_METHOD,
            CI."item_details".TAX_METHOD,
            Count(CI.BILL_ATTACHMENT.FILE_NAME) NOF
            FROM
            CI."item_details"
            LEFT JOIN CI.BILL_ATTACHMENT ON CI."item_details".ITEM_DETAILS_ID = CI.BILL_ATTACHMENT.ITEM_DETAILS_ID
            WHERE
            CI."item_details".BILL_ID = '.$bill_id.'
            GROUP BY
            CI."item_details".BILL_ID,
            CI."item_details".ITEM_ID,
            CI."item_details".DETAILS,
            CI."item_details".QUANTITY,
            CI."item_details".ITEM_DETAILS_ID,
            CI."item_details".PRICE,
            CI."item_details".VAT,
            CI."item_details".TAX,
            CI."item_details".CURRENCY,
            CI."item_details".EXCHANGE_RATE,
            CI."item_details".PURCHASE_DATE,
            CI."item_details".MEMO_NUMBER,
            CI."item_details".PO_NUMBER,
            CI."item_details".VAT_METHOD,
            CI."item_details".TAX_METHOD
            ');
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
  
  public function get_pending_pan_list_back($user_id=NULL){
        $this->db->select('payment_approval_note.*,bill.INVOICE_NUMBER,status.STATUS_NAME');
        $this->db->from('payment_approval_note');
        $this->db->join('bill','payment_approval_note.BILL_ID=bill.BILL_ID', 'LEFT');
        $this->db->join('status','payment_approval_note.STATUS = status.STATUS_ID', 'LEFT');
        $this->db->where('payment_approval_note.STATUS',7); // waiting for approval
        if($user_id){
            $this->db->where('payment_approval_note.PRESENT_LOCATION',$user_id);
        }
        //echo $this->db->_compile_select();exit;
        
        $result = $this->db->get();
//        echo $this->db->last_query();
//        exit();
        return $result->result_array();   
  }
  public function get_pending_pan_list($user_id=NULL) {
      $this->db->select('payment_approval_note.PAN_ID,
                payment_approval_note.BILL_ID,
                payment_approval_note.VENDOR_REF_NUMBER,
                payment_approval_note.INVOICE_AMOUNT,
                payment_approval_note.PAID_AMOUNT,
                payment_approval_note.REMAINING,
                bill.INVOICE_NUMBER,
                bill.BILL_AMOUNT,
                payment_approval_note.COST_CENTER,
                payment_approval_note.PAN_CODE');
      $this->db->from('payment_approval_note');
      $this->db->join('bill', 'payment_approval_note.PAN_ID = bill.PAN_ID', 'left');
      $this->db->where('payment_approval_note.STATUS', 7);
        if($user_id){
            $this->db->where('payment_approval_note.PRESENT_LOCATION',$user_id);
        }
      $result = $this->db->get();
      
//      echo $this->db->last_query();
//      exit();
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
    public function save_attachment_data($post_data, $bill_id) {
        $this->db->insert('BILL_ATTACHMENT', $post_data);
    }

    public function get_details_attach_info($item_details_id) {
//        $result =  $this->db->query('SELECT COUNT(ITEM_DETAILS_ID) as TOTAL_ATTACHMENT, ITEM_DETAILS_ID FROM BILL_ATTACHMENT GROUP BY ITEM_DETAILS_ID');
       $result = $this->db->query("SELECT * FROM BILL_ATTACHMENT where ITEM_DETAILS_ID= '$item_details_id' ");
//       echo $this->db->last_query();
//       exit();
        return $result->result_array();
        
    }
    public function find_gl_list($search_act) {
//        echo'hello' .$search_act;
        $this->db->select('CI."gl_main".GL_ID,CI."gl_main".GL_CODE,CI."gl_main".GL_DESCRIPTION');
        $this->db->from('CI."gl_main"');
        $this->db->like('GL_DESCRIPTION' , $search_act);
        $result = $this->db->get();
//        echo $this->db->last_query();
//        exit();
        return $result->result_array();
    }
    
    public function find_branch_list($search_act) {
        $this->db->select('BANK_BRANCH_ID, BANK_BRANCH_NAME, BANK_ID');
        $this->db->from('bank_branch');
        $this->db->like('BANK_BRANCH_NAME', $search_act);
        $result = $this->db->get();
//        echo $this->db->last_query();
//        exit();
        return  $result->result_array();
    }
    
    public function find_sol_list($search_act) {
        $this->db->select('SOL_ID, SOL_CODE, SOL_NAME');
        $this->db->from('sol');
        $this->db->like('SOL_NAME', $search_act);
        $result = $this->db->get();
//        echo $this->db->last_query();
//        exit();
        
        return $result->result_array();
    }
    
    public function find_gl_sub_gl_list($gl, $sub_gl) {
        $this->db->select('CI."gl_sub".SUB_GL_ID,
                           CI."gl_sub".GL_ID,
                           CI."gl_sub".SUB_GL_CODE,
                           CI."gl_main".GL_DESCRIPTION');
        $this->db->from('CI."gl_sub"');
        $this->db->join('CI."gl_main"', 'CI.gl_sub.GL_ID = CI.gl_main.GL_ID', 'left');
        $this->db->like(array('SUB_GL_DESCRIPTION'=>$sub_gl, 'GL_DESCRIPTION'=>$gl));
        $result = $this->db->get();
//        echo $this->db->last_query();
//        exit();
        return $result->result_array();
    }
    
    public function find_gl_sub_gl_list_chcked($gl, $sub_gl) {
        $this->db->select('CI."gl_sub".SUB_GL_ID,
                           CI."gl_sub".GL_ID,
                           CI."gl_sub".SUB_GL_CODE,
                           CI."gl_main".GL_DESCRIPTION');
        $this->db->from('CI."gl_sub"');
        $this->db->join('CI."gl_main"', 'CI.gl_sub.GL_ID = CI.gl_main.GL_ID', 'left');
        $this->db->like(array('SUB_GL_DESCRIPTION'=>$sub_gl, 'GL_DESCRIPTION'=>$gl));
        $this->db->group_by('CI."gl_sub".SUB_GL_ID,
                           CI."gl_sub".GL_ID,
                           CI."gl_sub".SUB_GL_CODE,
                           CI."gl_main".GL_DESCRIPTION');
        $result = $this->db->get();
//        echo $this->db->last_query();
//        exit();
        return $result->result_array();
    }
    
    //Working with PAN
    public function get_pan_id($pan_code) {
        $this->db->select('PAN_ID,BILL_ID, WO_REF');
        $this->db->from('payment_approval_note');
        $this->db->where('PAN_CODE', $pan_code);
        $result = $this->db->get();
//        echo $this->db->last_query();
//        exit();
//        return $result->result_array();
        return $result->row();
                
    }
    
//    Updating Bill Table
    public function insert_pan_id_in_bill($bill_id,$pan_id){
        $ids = explode(',', $bill_id);
        $this->db->where_in('BILL_ID', $ids);
        $this->db->update('bill', array('PAN_ID'=>$pan_id), false);
        echo $pan_id;
//        echo $this->db->last_query();
        
    }
    
    //Make Payment Work
    public function find_make_payment_info($pan_id) {
        //echo $pan_id;
        $this->db->select('CI."payment_approval_note".PAN_ID,
                    CI."payment_approval_note".BILL_ID,
                    CI."payment_approval_note".INVOICE_AMOUNT,
                    CI."payment_approval_note".WO_VALUE,
                    CI."payment_approval_note".PAID_UP_TO_DATE,
                    CI."payment_approval_note".PAID_AMOUNT,
                    CI."payment_approval_note".WO_REF,
                    CI."payment_approval_note".PURPOSE,
                    CI."payment_approval_note".PAN_CODE,
                    CI."bill".INVOICE_NUMBER,
                    CI."bill".REFERENCE_NUMBER,
                    CI."bill".BILL_AMOUNT,
                    CI."bill".PAID_AMOUNT,
                    CI."bill".PAYMENT_TYPE,
                    CI."bill".TAX_METHOD,
                    CI."bill".VAT_METHOD,
                    CI."supplier".SUPPLIER_NAME');
        $this->db->from('CI."payment_approval_note"');
        $this->db->join('CI."bill"', 'CI.payment_approval_note.PAN_ID = CI."bill".PAN_ID');
        $this->db->join('CI."supplier"', 'CI.bill.SUPPLIER_ID = CI."supplier".SUPPLIER_ID', 'left');
        $this->db->where('CI."payment_approval_note".PAN_ID = CI."bill".PAN_ID');
        $this->db->where('CI."payment_approval_note".PAN_ID', $pan_id);
        
        //$result = $this->db->get();
        
        //return $result->result_array();
//        echo $this->db->last_query();
//        exit();
//        
        return $this->db->get();
    }
    
    public function get_vendor_wise_bill_list(){
      
      /*$select = '"bill".SUPPLIER_ID, "supplier".SUPPLIER_NAME, COUNT ("bill".SUPPLIER_ID) "TOTAL_BILL", SUM ("bill".BILL_AMOUNT) "TOTAL_BILL_AMOUNT"';
      $this->db->select($select);
      $this->db->from('bill');
      $this->db->join('supplier', '"bill".SUPPLIER_ID = "supplier".SUPPLIER_ID', 'LEFT');
      $this->db->group_by('"bill".SUPPLIER_ID','"supplier".SUPPLIER_NAME');*/
      $sql = 'SELECT
	"bill".SUPPLIER_ID,
	"supplier".SUPPLIER_NAME,
	COUNT ("bill".SUPPLIER_ID) "TOTAL_BILL",
	SUM (NVL("bill"."BILL_AMOUNT",0)) "TOTAL_BILL_AMOUNT",
	SUM (NVL("bill"."PAID_AMOUNT",0)) "TOTAL_PAID_AMOUNT",
	(SUM (NVL("bill"."BILL_AMOUNT",0)) - SUM (NVL("bill"."PAID_AMOUNT",0))) "TOTAL_DUE_AMOUNT"
FROM
	"bill"
LEFT JOIN "supplier" ON "bill".SUPPLIER_ID = "supplier".SUPPLIER_ID
GROUP BY
	"bill".SUPPLIER_ID,
	"supplier".SUPPLIER_NAME';           
           
            return $this->db->query($sql);
    }
    
    public function get_single_vendor_bill_list($supplier_id){
      $sql = 'SELECT
	"bill".BILL_ID,
	"bill".SUPPLIER_ID,
	"bill".INVOICE_NUMBER,
	"bill".REFERENCE_NUMBER,
	"bill".PURCHASE_DATE,
	"bill".BILL_DATE,
	"bill".RECEIVE_DATE,
	"bill".STATUS,
	"bill".PRESENT_LOCATION,
	"bill".CREATED_BY,
	"bill".CREATED,
	"bill".UPDATED_BY,
	"bill". UPDATED,
	"bill".REFERENCE_TYPE,
	"bill".REMARKS,
	"bill".BILL_AMOUNT,
	"bill".PAID_AMOUNT,
	"bill".PAYMENT_TYPE,
	"bill".PAN_ID,
	"supplier"."SUPPLIER_NAME",
	"payment_type"."PAY_TYPE_NAME",
	"status"."STATUS_NAME",
	SUM (
		NVL (
			"item_details"."QUANTITY",
			0
		) * NVL ("item_details"."PRICE", 0) + NVL ("item_details"."VAT", 0) + NVL ("item_details"."TAX", 0)
	) TOTAL_BILL
FROM
	"bill"
LEFT JOIN "supplier" ON "bill"."SUPPLIER_ID" = "supplier"."SUPPLIER_ID"
LEFT JOIN "payment_type" ON "payment_type"."PAY_TYPE_ID" = "bill"."PAYMENT_TYPE"
LEFT JOIN "item_details" ON "item_details"."BILL_ID" = "bill"."BILL_ID"
LEFT JOIN "status" ON "bill"."STATUS" = "status"."STATUS_ID"
WHERE
	"bill".SUPPLIER_ID = ' . $supplier_id . '
GROUP BY
	"bill".BILL_ID,
	"bill".SUPPLIER_ID,
	"bill".INVOICE_NUMBER,
	"bill".REFERENCE_NUMBER,
	"bill".PURCHASE_DATE,
	"bill".BILL_DATE,
	"bill".RECEIVE_DATE,
	"bill".STATUS,
	"bill".PRESENT_LOCATION,
	"bill".CREATED_BY,
	"bill".CREATED,
	"bill".UPDATED_BY,
	"bill". UPDATED,
	"bill".REFERENCE_TYPE,
	"bill".REMARKS,
	"bill".BILL_AMOUNT,
	"bill".PAID_AMOUNT,
	"bill".PAYMENT_TYPE,
	"bill".PAN_ID,
	"supplier"."SUPPLIER_NAME",
	"payment_type"."PAY_TYPE_NAME",
	"status"."STATUS_NAME"';
        
      return $this->db->query($sql);
    }
    
  public function get_supplier($supplier_id)
  {
    $this->db->select('*');
    $this->db->from('supplier');
    $this->db->where('SUPPLIER_ID', $supplier_id);
    return $this->db->get();
  }

}



