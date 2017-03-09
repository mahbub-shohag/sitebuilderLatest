<?php

class Payment_Model extends CI_Model
{

  public function __construct()
  {
    $this->load->database();
  }

  public function save_data($data, $table, $sequence_name = NULL)
  {
    $this->db->insert($table, $data);

    return;

    //if ($sequence_name != NULL)
    //{
     // $sql = "SELECT $sequence_name.CURRVAL from dual";
     // $result = $this->db->query($sql);
     // return $result->row()->CURRVAL;
    //}
  }

  public function update_data($data, $table, $where)
  {

    $this->db->where($where);
    $this->db->update($table, $data);
  }

  public function delete_data($table, $where)
  {
    $this->db->delete($table, $where);
  }

  public function get_details_bill_info($bill_id = NULL)
  {


    if ($bill_id == NULL)
    {
      $result = $this->db->query('SELECT
	"bill".BILL_ID,
    "payment_approval_note".BILL_ID PAN_BILL_ID,
	"bill".SUPPLIER_ID,
	"bill".INVOICE_NUMBER,
	"bill".REFERENCE_NUMBER,
	"bill".PURCHASE_DATE,
	"bill".INVOICE_DATE,
	"bill".RECEIVE_DATE,
	"bill".STATUS,
	"bill".PRESENT_LOCATION,
	"bill".CREATED_BY,
	"bill".CREATED,
	"bill".UPDATED_BY,
	"bill".UPDATED,
	"bill".REFERENCE_TYPE,
	"bill".REMARKS,
	"bill".INVOICE_AMOUNT,
	"bill".PAID_AMOUNT,
	"bill".PAYMENT_TYPE,
	"bill".PAN_ID,
	"supplier"."SUPPLIER_NAME",
	"payment_type"."PAY_TYPE_NAME",
	"status"."STATUS_NAME",
	SUM (
		NVL("bill_details"."QUANTITY",0) * NVL("bill_details"."UNIT_PRICE",0)+NVL("bill_details"."VAT_AMOUNT",0)+NVL("bill_details"."TAX_AMOUNT",0) 
	) TOTAL_BILL
FROM
	"bill"
LEFT JOIN "payment_approval_note" ON "bill".PAN_ID = "payment_approval_note".PAN_ID
LEFT JOIN "supplier" ON "bill"."SUPPLIER_ID" = "supplier"."SUPPLIER_ID"
LEFT JOIN "payment_type" ON "payment_type"."PAY_TYPE_ID" = "bill"."PAYMENT_TYPE"
LEFT JOIN "bill_details" ON "bill_details"."BILL_ID" = "bill"."BILL_ID"
LEFT JOIN "status" ON "bill"."STATUS" = "status"."STATUS_ID"
GROUP BY
	"bill".BILL_ID,
    "payment_approval_note".BILL_ID,
 "bill".SUPPLIER_ID,
 "bill".INVOICE_NUMBER,
 "bill".REFERENCE_NUMBER,
 "bill".PURCHASE_DATE,
 "bill".INVOICE_DATE,
 "bill".RECEIVE_DATE,
 "bill".STATUS,
 "bill".PRESENT_LOCATION,
 "bill".CREATED_BY,
 "bill".CREATED,
 "bill".UPDATED_BY,
 "bill".UPDATED,
 "bill".REFERENCE_TYPE,
 "bill".REMARKS,
 "bill".INVOICE_AMOUNT,
 "bill".PAID_AMOUNT,
 "bill".PAYMENT_TYPE,
"bill".PAN_ID,
"supplier"."SUPPLIER_NAME",
	"payment_type"."PAY_TYPE_NAME",
	"status"."STATUS_NAME"
    ORDER BY
	"bill".BILL_ID DESC');

      return $result->result_array();
    }
    else
    {
      $this->db->select('bill.*,supplier.SUPPLIER_NAME,payment_type.PAY_TYPE_NAME,status.STATUS_NAME');

      $this->db->from('bill');
      $this->db->join('supplier', 'bill.SUPPLIER_ID=supplier.SUPPLIER_ID');
      $this->db->join('payment_type', 'payment_type.PAY_TYPE_ID=bill.PAYMENT_TYPE');
      //$this->db->join('purchase_order','bill.PO_NUMBER=purchase_order.PURCHASE_ORDER_ID');
      $this->db->join('status', 'bill.STATUS = status.STATUS_ID');
      $this->db->where('BILL_ID', $bill_id);

      $result = $this->db->get();
      return $result->row();
    }
  }

  public function get_pending_bill_list($user_id)
  {
    $this->db->select('bill.*,supplier.SUPPLIER_NAME,payment_type.PAY_TYPE_NAME,status.STATUS_NAME,purchase_order.PURCHASE_ORDER_NO');
    $this->db->from('bill');
    $this->db->join('supplier', 'bill.SUPPLIER_ID=supplier.SUPPLIER_ID');
    $this->db->join('payment_type', 'payment_type.PAY_TYPE_ID=bill.PAYMENT_TYPE');
    $this->db->join('purchase_order', 'bill.PO_NUMBER=purchase_order.PURCHASE_ORDER_ID');
    $this->db->join('status', 'bill.STATUS = status.STATUS_ID');
    $this->db->where('PRESENT_LOCATION', $user_id);
    $this->db->where("bill.STATUS", 7); // 7 FOR PENDING
    //echo $this->db->_compile_select();exit;
    $result = $this->db->get();
    return $result->result_array();
  }

  //All required Info for pan Approval
  public function get_pan_info_prev($bill_id = '')
  {
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
	"bill".BILL_ID IN(' . $bb . ')
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

  public function get_pan_info($bill_id = '')
  {
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

  public function get_payment_approval_note_view($pan_id = '')
  {
    if (!empty($pan_id)):
      $this->db->select(' pan.*, cur.CURRENCY_NAME,bill.SUPPLIER_ID,supplier.SUPPLIER_NAME  "SUP_NAME"');
      $this->db->from('payment_approval_note "pan"');
      $this->db->join('currency "cur"', 'pan.CURRENCY_ID = cur.CURRENCY_ID', 'LEFT');
      $this->db->join('bill', 'pan.BILL_ID = bill.BILL_ID', 'LEFT');
      $this->db->join('supplier', 'bill.SUPPLIER_ID = supplier.SUPPLIER_ID', 'LEFT');
      $this->db->where('pan.PAN_ID', $pan_id);
      return $this->db->get();
    else:
      $this->db->select('*');
      $this->db->from('payment_approval_note');
      return $this->db->get();
    endif;
  }

  public function get_payment_approval_tags_view($pan_id = '')
  {
    $this->db->select('*');
    $this->db->from('PAN_TAG');
    $this->db->where('PAN_ID', $pan_id);
    return $this->db->get();
  }

  public function get_approve_bill_list($user_id)
  {
    $this->db->select('bill.*,bill_approval_history.REMARKS,bill_approval_history.APPROVAL_DATE,supplier.SUPPLIER_NAME,payment_type.PAY_TYPE_NAME,status.STATUS_NAME,purchase_order.PURCHASE_ORDER_NO');
    $this->db->from('bill');
    $this->db->join('supplier', 'bill.SUPPLIER_ID=supplier.SUPPLIER_ID');
    $this->db->join('payment_type', 'payment_type.PAY_TYPE_ID=bill.PAYMENT_TYPE');
    $this->db->join('purchase_order', 'bill.PO_NUMBER=purchase_order.PURCHASE_ORDER_ID');
    $this->db->join('status', 'bill.STATUS = status.STATUS_ID');
    $this->db->join('bill_approval_history', 'bill_approval_history.BILL_ID = bill.BILL_ID');
    $this->db->where('APPROVAL_PERSON', $user_id);
    //$this->db->where("bill.STATUS",7); // 7 FOR PENDING
    //echo $this->db->_compile_select();exit;
    $result = $this->db->get();
    return $result->result_array();
  }

  public function get_unit_price($selected_item)
  {
    $this->db->select('UNIT_PRICE');
    $this->db->from('items');
    $this->db->where('ITEM_ID', $selected_item);
    $result = $this->db->get();
    return $result->row()->UNIT_PRICE;
  }

  public function get_bill_item_list_prev($bill_id)
  {
    $this->db->select('item_details.*,items.ITEM_NAME');
    $this->db->from('item_details');
    $this->db->join('items', 'item_details.ITEM_ID=items.ITEM_ID');
    $this->db->where('item_details.BILL_ID', $bill_id);
    $result = $this->db->get();
    echo $this->db->last_query();
    exit();
    return $result->result_array();
  }

  public function get_bill_item_list($bill_id)
  {
    /* $result= $this->db->query('SELECT
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
      CI."item_details".BILL_ID = \''.$bill_id.'\'
      AND CI."item_details".STATUS != 13
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
      '); */
    $result = $this->db->query('SELECT
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
	CI."product".PRODUCT_NAME,
	COUNT (
		CI.BILL_ATTACHMENT.FILE_NAME
	) NOF
FROM
	CI."item_details"
LEFT JOIN CI."product" ON CI."item_details".PRODUCT_ID = CI."product".PRODUCT_ID
LEFT JOIN CI."BILL_ATTACHMENT" ON CI."item_details".ITEM_DETAILS_ID = CI.BILL_ATTACHMENT.ITEM_DETAILS_ID
WHERE
	CI."item_details".BILL_ID = \'' . $bill_id . '\'
AND CI."item_details".STATUS != 13
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
	CI."item_details".TAX_METHOD,
	CI."product".PRODUCT_NAME');
    return $result->result_array();
  }

  public function bill_preview_list($bill_id)
  {
    $result = $this->db->query('SELECT
                    CI."product".PRODUCT_NAME,
                    CI."item_details".QUANTITY,
                    CI."item_details".PRICE,
                    CI."item_details".MEMO_NUMBER,
                    CI."item_details".PO_NUMBER,
                    CI."supplier".SUPPLIER_NAME,
                    CI."supplier".SUPPLIER_NAME,
                    CI."supplier".SUPPLIER_ADDRESS,
                    CI."supplier".PHONE
                    FROM
                    CI."item_details"
                    LEFT JOIN CI.BILL_ATTACHMENT ON CI."item_details".ITEM_DETAILS_ID = CI.BILL_ATTACHMENT.ITEM_DETAILS_ID
                    LEFT JOIN CI."product" ON CI."item_details".PRODUCT_ID = CI."product".PRODUCT_ID
                    left JOIN CI."bill" ON CI."item_details".BILL_ID = CI."bill".BILL_ID
                    left JOIN CI."supplier" ON CI."bill".SUPPLIER_ID = CI."supplier".SUPPLIER_ID
                WHERE
                CI."item_details".BILL_ID = \'' . $bill_id . '\' AND
                CI."item_details".STATUS != 13');
    return $result->result_array();
  }

  public function get_details_item_info($bill_id, $item_details_id)
  {
    $this->db->select('*');
    $this->db->from('item_details');
    //$this->db->join('items','item_details.ITEM_ID=items.ITEM_ID');
    $this->db->where('item_details.BILL_ID', $bill_id);
    $this->db->where('item_details.ITEM_DETAILS_ID', $item_details_id);
    //echo $this->db->_compile_select();exit;
    $result = $this->db->get();
    return $result->row();
  }

  //Auto Fill UP Attachment Info
  public function get_item_fill_up_info($po_number = NULL)
  {
    $this->db->select('purchase_order.PURCHASE_ORDER_NO,purchase_order.DELIVERY_DATE,memo_archive.MEMO_REF,purchase_order_details.QTY,purchase_order_details.UNIT_PRICE');
    $this->db->from('purchase_order');
    $this->db->join('requisition_memo_archive', 'purchase_order.REQUISITION_ID = requisition_memo_archive.REQUISITION_ID', 'left');
    $this->db->join('memo_archive', 'requisition_memo_archive.MEMO_ARCHIVE_ID = memo_archive.MEMO_ARCHIVE_ID', 'left');
    $this->db->join('purchase_order_details', 'purchase_order.PURCHASE_ORDER_ID = purchase_order_details.PURCHASE_ORDER_ID', 'left');
    $this->db->where('purchase_order.PURCHASE_ORDER_NO', $po_number);
    $result = $this->db->get();
//        echo $this->db->last_query();
//        exit();
    return $result->result_array();
//        echo json_encode($data);
  }

  public function get_memo_refs($po_number)
  {
    $this->db->select('memo_archive.MEMO_REF');
    $this->db->from('purchase_order');
    $this->db->join('requisition_memo_archive', 'purchase_order.REQUISITION_ID = requisition_memo_archive.REQUISITION_ID', 'left');
    $this->db->join('memo_archive', 'requisition_memo_archive.MEMO_ARCHIVE_ID = memo_archive.MEMO_ARCHIVE_ID', 'left');
    $this->db->join('purchase_order_details', 'purchase_order.PURCHASE_ORDER_ID = purchase_order_details.PURCHASE_ORDER_ID', 'left');
    $this->db->where('purchase_order.PURCHASE_ORDER_NO', $po_number);
    $result = $this->db->get();
//        echo $this->db->last_query();
//        exit();
    return $result->result_array();
  }

  public function get_details_pan_info($pan_id = NULL)
  {

    $this->db->select('payment_approval_note.*,status.STATUS_NAME');
    $this->db->from('payment_approval_note');
    $this->db->join('status', 'payment_approval_note.STATUS=status.STATUS_ID');
    if ($pan_id == NULL)
    {
      $result = $this->db->get();
      return $result->result_array();
    }
    else
    {
      $this->db->where('PAN_ID', $pan_id);
      $result = $this->db->get();
      return $result->row();
    }
  }

  public function get_last_sort_no($pan_id)
  {
    $this->db->select_max('SORTING_NUMBER');
    $this->db->from('approval_delegation');
    $this->db->where('PAN_ID', $pan_id);
    $result = $this->db->get();
    $sort_no = $result->row()->SORTING_NUMBER;
    if ($sort_no != NULL)
    {
      return $sort_no;
    }
    else
    {
      return 0;
    }
  }

  public function get_delegation_users($pan_id = NULL)
  {
    $this->db->select(' "approval_delegation".*,"user_id","username" || \' > \' || "first_name" || \' \' || "last_name" AS "NAME" ', FALSE);
    $this->db->from('approval_delegation');
    $this->db->join('user', 'approval_delegation.APPROVAL_PERSON_ID=user.user_id');
    if ($pan_id != NULL)
    {
      $this->db->where('PAN_ID', $pan_id);
    }
    $this->db->order_by('SORTING_NUMBER', 'ASC');
    $result = $this->db->get();
    return $result->result_array();
  }

  public function set_last_approval_person($pan_id)
  {
    // FIRST RESET IS_LAST FIELD OF ALL ENTRIES OF THIS PAN
    $reset_data = array("IS_LAST" => 0);
    $this->db->where('approval_delegation.PAN_ID', $pan_id);
    $this->db->update('approval_delegation', $reset_data);

    // set last inserted person as first
    $data = array("IS_LAST" => 1);
    // build subquery
    $this->db->select_max('SORTING_NUMBER');
    $this->db->from('approval_delegation');
    $this->db->where('approval_delegation.PAN_ID', $pan_id);
    $where_clause = $this->db->_compile_select();
    $this->db->_reset_select();
    $this->db->where('approval_delegation.PAN_ID', $pan_id);

    $this->db->where('SORTING_NUMBER = ', '(' . $where_clause . ')', false);

    $this->db->update('approval_delegation', $data);
    //echo $this->db->last_query();exit;
  }

  public function reorder_user_delegation($data)
  {
    foreach ($data as $value)
    {
      $split_value = explode("=", $value);
      $DELEGATION_id = $split_value[0];
      $SORTING_NUMBER = $split_value[1];
      $update_data = array("SORTING_NUMBER" => $SORTING_NUMBER);
      $where = array("DELEGATION_ID" => $DELEGATION_id);

      $this->db->where($where);
      $this->db->update('approval_delegation', $update_data);
    }
  }

  public function check_delegation_user($where)
  {
    $this->db->select('*');
    $this->db->from('approval_delegation');
    $this->db->where($where);
    // echo $this->db->_compile_select();exit;
    $result = $this->db->get();

    if ($result->num_rows())
    {
      return 1;
    }
    else
    {
      return 0;
    }
  }

  public function get_line_manager_id($user_id)
  {

    $this->db->select('line_manager_id');
    $this->db->from('user');
    $this->db->where('user_id', $user_id);
    //echo $this->db->_compile_select();exit;
    $result = $this->db->get();
    return $result->row()->line_manager_id;
  }

  public function get_last_approval_person($pan_id)
  {
    $this->db->select('APPROVAL_PERSON_ID');
    $this->db->from('approval_delegation');
    $this->db->where('PAN_ID', $pan_id);
    $this->db->where('IS_LAST', 1);
    $result = $this->db->get();
    return $result->row()->APPROVAL_PERSON_ID;
  }

  // get created by me pan list
  public function get_created_pan_list($user_id = NULL)
  {
    $this->db->select('payment_approval_note.*,bill.INVOICE_NUMBER,status.STATUS_NAME');
    $this->db->from('payment_approval_note');
    $this->db->join('bill', 'payment_approval_note.BILL_ID=bill.BILL_ID');
    $this->db->join('status', 'payment_approval_note.STATUS = status.STATUS_ID');
    if ($user_id)
    {
      $this->db->where('payment_approval_note.CREATED_BY', $user_id);
    }
    else
    {
      $this->db->where('payment_approval_note.STATUS', 8); // status approved 
    }
    //echo $this->db->_compile_select();exit;

    $result = $this->db->get();
    return $result->result_array();
  }

  public function get_pending_pan_list_back($user_id = NULL)
  {
    $this->db->select('payment_approval_note.*,bill.INVOICE_NUMBER,status.STATUS_NAME');
    $this->db->from('payment_approval_note');
    $this->db->join('bill', 'payment_approval_note.BILL_ID=bill.BILL_ID', 'LEFT');
    $this->db->join('status', 'payment_approval_note.STATUS = status.STATUS_ID', 'LEFT');
    $this->db->where('payment_approval_note.STATUS', 7); // waiting for approval
    if ($user_id)
    {
      $this->db->where('payment_approval_note.PRESENT_LOCATION', $user_id);
    }
    //echo $this->db->_compile_select();exit;

    $result = $this->db->get();
//        echo $this->db->last_query();
//        exit();
    return $result->result_array();
  }

  public function get_pan_list($user_id = NULL, $status = array(7, 10))
  {
    $this->db->select('payment_approval_note.*, bill.INVOICE_NUMBER, bill.BILL_AMOUNT, MAKE_PAYMENT_TYPE.MPT_NAME');
    $this->db->from('payment_approval_note');
    $this->db->join('bill', 'payment_approval_note.PAN_ID = bill.PAN_ID', 'left');
    $this->db->join('MAKE_PAYMENT_TYPE', 'payment_approval_note.MAKE_PAYMENT_TYPE = MAKE_PAYMENT_TYPE.MPT_ID', 'left');
    $this->db->where_in('payment_approval_note.STATUS', $status);
    if ($user_id):
    //$this->db->where('payment_approval_note.PRESENT_LOCATION',$user_id);
    endif;
    $this->db->order_by('payment_approval_note.PAN_ID', 'DESC');
    return $this->db->get();
  }

  public function get_pending_pan_list($user_id = NULL)
  {
    $this->db->select('payment_approval_note.PAN_ID,
                payment_approval_note.BILL_ID,
                payment_approval_note.VENDOR_REF_NUMBER,
                payment_approval_note.INVOICE_AMOUNT,
                payment_approval_note.PAID_AMOUNT,
                payment_approval_note.REMAINING_AMOUNT,
                bill.INVOICE_NUMBER,
                bill.BILL_AMOUNT,
                payment_approval_note.COST_CENTER,
                payment_approval_note.PAN_CODE');
    $this->db->from('payment_approval_note');
    $this->db->join('bill', 'payment_approval_note.PAN_ID = bill.PAN_ID', 'left');
    $this->db->where_in('payment_approval_note.STATUS', array(7, 10));
    if ($user_id)
    {
      //$this->db->where('payment_approval_note.PRESENT_LOCATION',$user_id);
    }
    $result = $this->db->get();

//      echo $this->db->last_query();
//      exit();
    return $result->result_array();
  }

  public function get_approved_pan_list($user_id)
  {
    // SUBQUERY

    $this->db->select('pan_approval_history.PAN_ID');
    $this->db->from('pan_approval_history');
    $this->db->where('pan_approval_history.APPROVAL_PERSON', $user_id);
    //$this->db->order_by('approval_delegation.SORTING_NUMBER');
    $IN_clause = $this->db->_compile_select();
    //echo $IN_clause ;exit;
    $this->db->_reset_select();

    // MAIN QUERY
    // $this->db->distinct();
    $this->db->select('bill.INVOICE_NUMBER,pan_approval_history.*,payment_approval_note.*,status.STATUS_NAME');
    $this->db->from('payment_approval_note');
    $this->db->join('pan_approval_history', 'payment_approval_note.PAN_ID=pan_approval_history.PAN_ID');
    $this->db->join('bill', 'payment_approval_note.BILL_ID=bill.BILL_ID');
    $this->db->join('status', 'payment_approval_note.STATUS = status.STATUS_ID');
    $this->db->where(' "payment_approval_note"."PAN_ID" IN (' . $IN_clause . ')', NULL, FALSE);
    $this->db->where('pan_approval_history.APPROVAL_PERSON', $user_id);
    // echo $this->db->_compile_select();exit;
    $result = $this->db->get();
    return $result->result_array();
  }

  public function get_pan_approval_history($pan_id)
  {
    $this->db->select('pan_approval_history.*,user.first_name');
    $this->db->from('pan_approval_history');
    $this->db->join('user', 'user.user_id=pan_approval_history.APPROVAL_PERSON');
    $this->db->where('pan_approval_history.PAN_ID', $pan_id);
    //echo $this->db->_compile_select();exit;
    $result = $this->db->get();
    return $result->result_array();
  }

  public function get_delegator_id($pan_id)
  {
    $this->db->select('*');
    $this->db->from('approval_delegation');
    $this->db->where('approval_delegation.PAN_ID', $pan_id);
    $this->db->where('approval_delegation.IS_DONE', 0);
    $this->db->order_by('approval_delegation.SORTING_NUMBER');
    $from_clause = $this->db->_compile_select();
    $this->db->_reset_select();

    // MAIN QUERY
    $this->db->select('*');
    $this->db->from('(' . $from_clause . ')');
    $this->db->where('ROWNUM=', 1, FALSE);
    //echo $this->db->_compile_select();exit;
    $result = $this->db->get();
    if ($result->num_rows())
    {
      return $result->row()->APPROVAL_PERSON_ID;
    }
  }

  // get pan attached file

  public function get_file_list($pan_id)
  {
    $this->db->select('*');
    $this->db->from('pan_attached_document');
    //$this->db->join('attachment_title','attachment_title.ATTACHMENT_TITLE_ID=attached_document.ATTACHMENT_TITLE_ID');
    $this->db->where('PAN_ID', $pan_id);
    // echo $this->db->_compile_select();exit;
    $result = $this->db->get();
    return $result->result_array();
  }

  public function get_item_details_by_id($item_id)
  {
    $this->db->select('*');
    $this->db->from('items');
    //$this->db->join('attachment_title','attachment_title.ATTACHMENT_TITLE_ID=attached_document.ATTACHMENT_TITLE_ID');
    $this->db->where('ITEM_ID', $item_id);
    // echo $this->db->_compile_select();exit;
    $result = $this->db->get();
    // echo $this->db->last_query();
    return $result->row();
  }

  public function save_attachment_data($post_data, $bill_id)
  {
    $this->db->insert('BILL_ATTACHMENT', $post_data);
  }

  public function get_details_attach_info($item_details_id)
  {
//        $result =  $this->db->query('SELECT COUNT(ITEM_DETAILS_ID) as TOTAL_ATTACHMENT, ITEM_DETAILS_ID FROM BILL_ATTACHMENT GROUP BY ITEM_DETAILS_ID');
    $result = $this->db->query("SELECT * FROM BILL_ATTACHMENT where ITEM_DETAILS_ID= '$item_details_id' ");
//       echo $this->db->last_query();
//       exit();
    return $result->result_array();
  }

  public function find_gl_list($search_act)
  {
//        echo'hello' .$search_act;
    $this->db->select('CI."gl_main".GL_ID,CI."gl_main".GL_CODE,CI."gl_main".GL_DESCRIPTION');
    $this->db->from('CI."gl_main"');
    $this->db->like('GL_DESCRIPTION', $search_act);
    $result = $this->db->get();
//        echo $this->db->last_query();
//        exit();
    return $result->result_array();
  }

  public function find_branch_list($search_act)
  {
    $this->db->select('BANK_BRANCH_ID, BANK_BRANCH_NAME, BANK_ID');
    $this->db->from('bank_branch');
    $this->db->like('BANK_BRANCH_NAME', $search_act);
    $result = $this->db->get();
//        echo $this->db->last_query();
//        exit();
    return $result->result_array();
  }

  public function find_sol_list($search_act)
  {
    $this->db->select('SOL_ID, SOL_CODE, SOL_NAME');
    $this->db->from('sol');
    $this->db->like('SOL_NAME', $search_act);
    $result = $this->db->get();
//        echo $this->db->last_query();
//        exit();

    return $result->result_array();
  }

  public function find_gl_sub_gl_list($gl, $sub_gl)
  {
    $this->db->select('CI."gl_sub".SUB_GL_ID,
                           CI."gl_sub".GL_ID,
                           CI."gl_sub".SUB_GL_CODE,
                           CI."gl_main".GL_DESCRIPTION');
    $this->db->from('CI."gl_sub"');
    $this->db->join('CI."gl_main"', 'CI.gl_sub.GL_ID = CI.gl_main.GL_ID', 'left');
    $this->db->like(array('SUB_GL_DESCRIPTION' => $sub_gl, 'GL_DESCRIPTION' => $gl));
    $result = $this->db->get();
//        echo $this->db->last_query();
//        exit();
    return $result->result_array();
  }

  public function find_gl_sub_gl_list_chcked($gl, $sub_gl)
  {
    $this->db->select('CI."gl_sub".SUB_GL_ID,
                           CI."gl_sub".GL_ID,
                           CI."gl_sub".SUB_GL_CODE,
                           CI."gl_main".GL_DESCRIPTION');
    $this->db->from('CI."gl_sub"');
    $this->db->join('CI."gl_main"', 'CI.gl_sub.GL_ID = CI.gl_main.GL_ID', 'left');
    $this->db->like(array('SUB_GL_DESCRIPTION' => $sub_gl, 'GL_DESCRIPTION' => $gl));
    $this->db->group_by('CI."gl_sub".SUB_GL_ID,
                           CI."gl_sub".GL_ID,
                           CI."gl_sub".SUB_GL_CODE,
                           CI."gl_main".GL_DESCRIPTION');
    $result = $this->db->get();
//        echo $this->db->last_query();
//        exit();
    return $result->result_array();
  }

  public function get_tag_item_list($tag_item)
  {
    $table = array('', 'gl_account', 'gl_sub', 'sol', 'cost_center');
    $this->db->select('*');
    $this->db->from($table[$tag_item]);
    $this->db->where('ROWNUM <= 100', NULL, FALSE);
    return $this->db->get();
  }

  //Working with PAN
  public function get_pan_id($pan_code)
  {
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
  public function insert_pan_id_in_bill($bill_id, $pan_id)
  {
    $ids = explode(',', $bill_id);
    $this->db->where_in('BILL_ID', $ids);
    $this->db->update('bill', array('PAN_ID' => $pan_id), false);
    echo $pan_id;
//        echo $this->db->last_query();
  }

  //Make Payment Work
  public function find_make_payment_info($pan_id)
  {
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

  public function get_vendor_wise_bill_list()
  {

    /* $select = '"bill".SUPPLIER_ID, "supplier".SUPPLIER_NAME, COUNT ("bill".SUPPLIER_ID) "TOTAL_BILL", SUM ("bill".BILL_AMOUNT) "TOTAL_BILL_AMOUNT"';
      $this->db->select($select);
      $this->db->from('bill');
      $this->db->join('supplier', '"bill".SUPPLIER_ID = "supplier".SUPPLIER_ID', 'LEFT');
      $this->db->group_by('"bill".SUPPLIER_ID','"supplier".SUPPLIER_NAME'); */
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

  public function get_single_vendor_bill_list($supplier_id)
  {
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

//  Saving Item ATtachment
  public function save_attachment_item_data($post_data, $bill_id)
  {
    $this->db->insert('ITEM_ATTACHMENT', $post_data);
  }

  public function get_dtls_attachment_list($bill_id)
  {
    //$result = $this->db->query("SELECT * FROM ITEM_ATTACHMENT WHERE BILL_ID='$bill_id'");
//        echo $this->db->last_query();
//        exit();
    $this->db->select('ia.*, at.ATTACHMENT_TYPE_NAME');
    $this->db->from('ITEM_ATTACHMENT "ia"');
    $this->db->join('ATTACHMENT_TYPE "at"', 'ia.ATTACHMENT_TYPE_ID = at.ATTACHMENT_TYPE_ID', 'LEFT');
    $this->db->where('ia.BILL_ID', $bill_id);
    $result = $this->db->get();
    return $result->result_array();
  }

  //Khairul 19.1.17
  public function get_vat_chalan_list()
  {
    $this->db->select(' VAT_TRANSACTION.TRANS_ID,
                    VAT_TRANSACTION.TRANS_DATE,
                   VAT_TRANSACTION.AMOUNT,
                    "supplier".SUPPLIER_NAME,
                    "supplier".SUPPLIER_ADDRESS');
    $this->db->FROM('VAT_TRANSACTION');
    $this->db->JOIN('supplier', 'VAT_TRANSACTION.SUPPLIER_ID =  supplier.SUPPLIER_ID', 'left');
    $this->db->WHERE(array('VAT_TRANSACTION.CHALLAN_NO' => NULL));
    $this->db->ORDER_BY('VAT_TRANSACTION.TRANS_ID');
    $result = $this->db->get();
//        echo $this->db->last_query();
//        exit();
    return $result->result_array();
  }

  public function insert_vat_challan_info($post_data, $amount)
  {
    $AMOUNT = $amount;
    $vat_trans_id = $post_data;
    $CHALAN_NO = rand();
    $created_date = date("Y-m-d");
    $this->db->insert('CREATED_VAT', array('VAT_TRANS_ID' => $vat_trans_id, 'STATUS' => 1, 'CHALAN_NO' => "$CHALAN_NO", 'CREATED_DATE' => $created_date, 'AMOUNT' => $AMOUNT));
    $this->db->select('VAT_TRANS_ID, CHALAN_NO,CREATED_DATE');
    $this->db->from('CREATED_VAT');
    $this->db->where('VAT_TRANS_ID', $vat_trans_id);
    $result = $this->db->get()->row();
//      $res =   $result->result_array();
//      print_r($res);
//       echo $p->'VAT_TRANS_ID';
    $tr_ids = $result->VAT_TRANS_ID;
    $chalan_id = $result->CHALAN_NO;
    $chalan_date = $result->CREATED_DATE;
    echo $chalan_date;

    $temp_tr_id = '';
    $tr_id = explode('_', $tr_ids);
    foreach ($tr_id as $trns_id):
      $temp_tr_id .= "$trns_id,";
    endforeach;

    $final_tr_id = rtrim($temp_tr_id, ',');
//       $this->db->query('UPDATE VAT_TRANSACTION SET CHALLAN_NO= '.$chalan_id.', CHALLAN_DATE='.$chalan_date.'  WHERE TRANS_ID IN('.$final_tr_id.')');
    $this->db->query('UPDATE VAT_TRANSACTION SET CHALLAN_NO= ' . $chalan_id . ', CHALLAN_DATE=' . "'" . $chalan_date . "'" . '  WHERE TRANS_ID IN(' . $final_tr_id . ')');
//       echo $this->db->last_query();
  }

  public function get_created_chalan_list()
  {
    $this->db->select('*');
    $this->db->from('CREATED_VAT');
    $result = $this->db->get();

    return $result->result_array();
  }

  //Khairul 21-01-17
  public function get_tax_chalan_list()
  {
    $this->db->select('TAX_TRANSACTION.TRANS_ID,
                    TAX_TRANSACTION.TRANS_DATE,
                   TAX_TRANSACTION.AMOUNT,
                    "supplier".SUPPLIER_NAME,
                    "supplier".SUPPLIER_ADDRESS');
    $this->db->FROM('TAX_TRANSACTION');
    $this->db->JOIN('supplier', 'TAX_TRANSACTION.SUPPLIER_ID =  supplier.SUPPLIER_ID', 'left');
    $this->db->WHERE(array('TAX_TRANSACTION.CHALLAN_NO' => NULL));
    $this->db->ORDER_BY('TAX_TRANSACTION.TRANS_ID');
    $result = $this->db->get();
//        echo $this->db->last_query();
//        exit();
    return $result->result_array();
  }

  public function get_created_tax_chalan_list()
  {
    $this->db->select('*');
    $this->db->from('CREATED_TAX');
    $result = $this->db->get();

    return $result->result_array();
  }

  public function insert_tax_challan_info($post_data, $amount)
  {
    $AMOUNT = $amount;
    $vat_trans_id = $post_data;
    $CHALAN_NO = rand();
    $created_date = date("Y-m-d");
    $this->db->insert('CREATED_TAX', array('TAX_TRANS_ID' => $vat_trans_id, 'STATUS' => 1, 'CHALAN_NO' => "$CHALAN_NO", 'CREATED_DATE' => $created_date, 'AMOUNT' => $AMOUNT));
    $this->db->select('TAX_TRANS_ID, CHALAN_NO,CREATED_DATE');
    $this->db->from('CREATED_TAX');
    $this->db->where('TAX_TRANS_ID', $vat_trans_id);
    $result = $this->db->get()->row();
//      $res =   $result->result_array();
//      print_r($res);
//       echo $p->'VAT_TRANS_ID';
    $tr_ids = $result->TAX_TRANS_ID;
    $chalan_id = $result->CHALAN_NO;
    $chalan_date = $result->CREATED_DATE;
    echo $chalan_date;

    $temp_tr_id = '';
    $tr_id = explode('_', $tr_ids);
    foreach ($tr_id as $trns_id):
      $temp_tr_id .= "$trns_id,";
    endforeach;

    $final_tr_id = rtrim($temp_tr_id, ',');
//       $this->db->query('UPDATE VAT_TRANSACTION SET CHALLAN_NO= '.$chalan_id.', CHALLAN_DATE='.$chalan_date.'  WHERE TRANS_ID IN('.$final_tr_id.')');
    $this->db->query('UPDATE TAX_TRANSACTION SET CHALLAN_NO= ' . $chalan_id . ', CHALLAN_DATE=' . "'" . $chalan_date . "'" . '  WHERE TRANS_ID IN(' . $final_tr_id . ')');
//       echo $this->db->last_query();
  }

  public function get_po_total_po_value($bill_id_array)
  {
    //echo "<pre>";
    // print_r($bill_id_array);
    //exit();
    $bill_id = '';
    foreach ($bill_id_array as $value)
    {
      $bill_id .= "'$value',";
    }
    $bill_id = rtrim($bill_id, ',');
    //echo $bill_id;
    //exit();
    $result = $this->db->query('SELECT
SUM(DISTINCT "purchase_order".TOTAL_VALUE) TOTAL

FROM
	"bill"
INNER JOIN "item_details" ON "item_details".BILL_ID = "bill".BILL_ID
INNER JOIN "purchase_order" ON CAST (
	REGEXP_REPLACE (
		"item_details".PO_NUMBER,' . "
		'[^0-9]+',
		''" . '
	) AS NUMBER
) = "purchase_order".PURCHASE_ORDER_NO
WHERE "bill".BILL_ID IN(' . $bill_id . ')
');

    return $result->row()->TOTAL;
  }

  public function get_po_all_po_list($bill_id_array)
  {
    //echo "<pre>";
    // print_r($bill_id_array);
    //exit();
    $bill_id = '';
    foreach ($bill_id_array as $value)
    {
      $bill_id .= "'$value',";
    }
    $bill_id = rtrim($bill_id, ',');
    //echo $bill_id;
    //exit();
    $result = $this->db->query('SELECT
DISTINCT PURCHASE_ORDER_NO

FROM
	"bill"
INNER JOIN "item_details" ON "item_details".BILL_ID = "bill".BILL_ID
INNER JOIN "purchase_order" ON CAST (
	REGEXP_REPLACE (
		"item_details".PO_NUMBER,' . "
		'[^0-9]+',
		''" . '
	) AS NUMBER
) = "purchase_order".PURCHASE_ORDER_NO
WHERE "bill".BILL_ID IN(' . $bill_id . ')
');

    return $result->result_array();
  }

  public function update_generate_ttum_pan($where)
  {
    $this->db->set(array('STATUS' => 23));
    $this->db->where_in('PAN_ID', $where);
    $this->db->update('payment_approval_note');
  }

  public function get_all_bill_by_supplier($supplier_id)
  {
    $this->db->select('bill.*,payment_type.PAY_TYPE_NAME,status.STATUS_NAME');
    $this->db->from('bill');
    //$this->db->join('supplier','purchase_order.SUPPLIER_ID=supplier.SUPPLIER_ID','left');
    //$this->db->join('bill','bill.SUPPLIER_ID=purchase_order.SUPPLIER_ID','left');
    $this->db->join('payment_type', 'payment_type.PAY_TYPE_ID=bill.PAYMENT_TYPE', 'left');
    //$this->db->join('purchase_order','supplier.SUPPLIER_ID=purchase_order.SUPPLIER_ID','left');
    $this->db->join('status', 'bill.STATUS = status.STATUS_ID', 'left');
    $this->db->where('bill.SUPPLIER_ID', $supplier_id);
    //$this->db->where("bill.STATUS",7); // 7 FOR PENDING
    //echo $this->db->_compile_select();exit;
    $result = $this->db->get();
    return $result->result_array();
  }

  public function get_all_po_by_supplier($supplier_id)
  {
    $this->db->distinct();
    $this->db->select('purchase_order.PURCHASE_ORDER_NO,purchase_order.TOTAL_VALUE,purchase_order.PAID_AMOUNT');
    $this->db->from('purchase_order');
    $this->db->join('supplier', 'purchase_order.SUPPLIER_ID=supplier.SUPPLIER_ID', 'left');
    // $this->db->join('bill','bill.SUPPLIER_ID=purchase_order.SUPPLIER_ID','left');
    //$this->db->join('payment_type','payment_type.PAY_TYPE_ID=bill.PAYMENT_TYPE','left');
    //$this->db->join('purchase_order','supplier.SUPPLIER_ID=purchase_order.SUPPLIER_ID','left');
    //$this->db->join('status','bill.STATUS = status.STATUS_ID','left');
    $this->db->where('purchase_order.SUPPLIER_ID', $supplier_id);
    //$this->db->where("bill.STATUS",7); // 7 FOR PENDING
    //echo $this->db->_compile_select();exit;
    $result = $this->db->get();
    return $result->result_array();
  }
  
  public function get_products_by_po_id($where)
  {
    $this->db->select('a.PRODUCT_ID, b.PRODUCT_NAME');
    $this->db->from('purchaseorder_item_delivery "a"');
    $this->db->join('product "b"', 'a.PRODUCT_ID = b.PRODUCT_ID', 'LEFT');
    $this->db->where($where);
    return $this->db->get();
  }
  
  public function search_purchase_order()
  {
    $this->db->select('PO.PURCHASE_ORDER_ID, PO.PURCHASE_ORDER_NO, S.SUPPLIER_NAME');
    $this->db->from('purchase_order "PO"');
    $this->db->join('supplier "S"', 'PO.SUPPLIER_ID = S.SUPPLIER_ID', 'LEFT');
    return $this->db->get();
  }

}
