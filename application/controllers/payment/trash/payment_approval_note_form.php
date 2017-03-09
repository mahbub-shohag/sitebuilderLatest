<style type="text/css">

.tbl td, tr, th {
border: none !important;
}
    .hline { height:1px; background: #000000 }
    .input-icon {
            position: relative;
          }

        .input-icon > i {
            position: absolute;
            display: block;
            transform: translate(0, -50%);
            top: 50%;
            pointer-events: none;
            width: 25px;
            text-align: center;
            font-style: normal;
        }

        .input-icon > input {
          padding-left: 25px;
         padding-right: 0;
        }

        .input-icon-right > i {
          right: 0;
        }

        .input-icon-right > input {
          padding-left: 0;
          padding-right: 25px;
          text-align: right;
        }

      
    </style>

<div class="container-fluid">
    <div class="panel-body">
        <div id="show_success_msg">
           
        </div>
     <ul class="nav nav-tabs" id="tab_menu">
        <li role="presentation" class="active"><a data-toggle="tab" href="#pan">Payment Approval Note</a></li>
        <li role="presentation" class=""><a data-toggle="tab" href="#appro_history">Approval History</a></li>
         <li role="presentation"> <a  data-toggle='tab' href='#preview'>Bill Preview</a></li>
        <!--<li role="presentation"  <?php // if ($pan_id == NULL) echo "class='disabled'"; ?> > <a <?php // if ($pan_id != NULL) echo "data-toggle='tab' href='#delegation'"; ?> >Delegation Set</a></li>-->
        <!--<li role="presentation" <?php // if ($pan_id == NULL) echo "class='disabled'"; ?> > <a <?php // if ($pan_id != NULL) echo "data-toggle='tab' href='#document'"; ?> >Document Attachment</a></li>-->
    </ul>
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default remove_top_border">
            <div class="panel-body tab-content">
                <div id="pan" class="tab-pane fade in active">
                    <!--Form For Payment Approval-->
                    <!--<div id="pan" class="pan_class">-->
                        <form class="form-horizontal" id="payment_approval_form" method="post" action="">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <div class="col-lg-3">
                                        <label for="pan_date">PAN Date:</label>
                                    </div>
                                    <div class="col-lg-5 requir">
                                        <input type="text" class="form-control oracle_date" id="pan_date" name="PAN_DATE" placeholder="Click To Select Date" value="<?php if(isset($pan_info->PAN_DATE)){ echo $pan_info->PAN_DATE;}?>" />
                                        <input type="hidden" id="bill_id" name="BILL_ID" value="<?php if(isset($pan_info->BILL_ID)){ echo $pan_info->BILL_ID;}?>"/>
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <div class="col-lg-3">
                                        <label for="name_of_client">Name Of Client:</label>
                                    </div>
                                    <div class="col-lg-5 requir">
                                        <input type="text" class="form-control" name="NAME_OF_CLIENT" id="name_of_client" value="<?php if(isset($pan_info->NAME_OF_CLIENT)){ echo $pan_info->NAME_OF_CLIENT;}?>" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-lg-3">
                                        <label for="wo_ref">WO/PO/SO Ref:</label>
                                    </div>
                                    <div class="col-lg-5 requir">
                                        <input type="text" class="form-control" name="WO_REF" id="wo_ref" placeholder="" value="<?php if(isset($pan_info->WO_REF)){ echo $pan_info->WO_REF;}?>" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-lg-3">
                                        <label for="vendor_ref_no">Vendor Ref No:</label>
                                    </div>
                                    <div class="col-lg-5">
                                        <input type="text" class="form-control form-docking" name="VENDOR_REF_NUMBER" id="vendor_ref_no" placeholder="" value="<?php if(isset($pan_info->VENDOR_REF_NUMBER)){ echo $pan_info->VENDOR_REF_NUMBER;}?>" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-lg-3">
                                        <label for="purpose">Purpose:</label>
                                    </div>
                                    <div class="col-lg-5">
                                        <textarea class="form-control" name="PURPOSE" id="purpose" placeholder=""><?php if(isset($pan_info->PURPOSE)){ echo $pan_info->PURPOSE;}?></textarea>
                                    </div>
                                </div>
                                  
                                <div class="form-group">
                                    <div class="col-lg-3">
                                        <label for="invoice_value">Invoice Value:</label>
                                    </div>
                                    <div class="col-lg-5">
                                        <input type="text" readonly="true" class="form-control" name="invoice_value" id="invoice_value" placeholder="" value="<?php if(isset($pan_info->TOTAL_BILL)){ echo $pan_info->TOTAL_BILL;}?>" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-lg-3">
                                        <label>Invoice Value (In Words):</label>
                                    </div>
                                    <div class="col-lg-5">
                                        <label name="invoice_value_in_words" id="invoice_value_in_words"><?php if(isset($pan_info->TOTAL_BILL)) {
                                            $inv_bill = $pan_info->TOTAL_BILL;
                                           echo convert_number_to_words($inv_bill);
                                        }?></label>
                                    </div>
                                </div>
                                <div class="form-group">
                                       &nbsp;&nbsp;&nbsp; <label for="payment_schedule" style="font-size:20px !important">Payment Schedule</label>
                                </div>
                                <div class="form-group">
                                    <div class="col-lg-3">
                                        <label for="wo_value">WO Value:</label>
                                    </div>
                                    <div class="col-lg-5">
                                        <div class="input-icon"><i>Tk.</i>  <input type="text" class="form-control ps" name="WO_VALUE" id="wo_value" placeholder="" value="<?php if(isset($pan_info->WO_VALUE)){ echo $pan_info->WO_VALUE;}?>" /></div>
                                    </div>
                                </div>
                                
                                <div class="form-group">
<!--                                    <div class="col-lg-3">

                                    </div>-->
                                      <div class="col-lg-3">
                                        <label for="paid_up_to_date">Paid up to Date:</label>
                                    </div>
                                    <div class="col-lg-5">
                                        <div class="input-icon"><i>Tk.</i> <input type="text" readonly="true" class="form-control ps" name="PAID_UP_TO_DATE" id="paid_up_to_date" placeholder="" value="<?php if(isset($pan_info->PAID_BILL)){ echo $pan_info->PAID_BILL;}?>" /></div>
                                    </div>
                                </div>
                                <div class="form-group">
<!--                                    <div class="col-lg-3">

                                    </div>-->
                                      <div class="col-lg-3">
                                        <label for="invoice_amount">Bill/Invoice Amount:</label>
                                    </div>
                                    <div class="col-lg-5">
                                        <div class="input-icon"><i>Tk.</i> <input type="text" class="form-control ps" name="invoice_amount" id="invoice_amount" placeholder="" value="<?php if(isset($pan_info->TOTAL_BILL)){ echo $pan_info->TOTAL_BILL;}?>" /></div>
                                    </div>
                                </div>
                                <div class="form-group">
<!--                                    <div class="col-lg-3">

                                    </div>-->
                                      <div class="col-lg-3">
                                        <label for="remaining">Remaining Amount:</label>
                                    </div>
                                    <div class="col-lg-5">
                                        <div class="input-icon"><i>Tk.</i> <input type="text" readonly="true" class="form-control ps" name="remaining_amount" id="remaining_amount" placeholder="" value="" /></div>
                                    </div>
                                </div>
                                <div class="row" style="display:none">
                                    <div class="col-lg-12">
                                          <div class="form-group">
                                            <label><b>This payable Amount is Subject to AIT & VAT and other deductions(If applicable)</b></label>
                                          </div>
                                        <div class="col-lg-4" align="left">
                                            <br><br>
                                            <div class="form-group">  
                                             <div class="col-lg-10 hline"><hr></div>

                                            </div>
                                          <h3>&nbsp;&nbsp;&nbsp;Initiated By</h3>

                                            <br><br>
                                            <div class="form-group">  
                                             <div class="col-lg-10 hline"><hr></div>

                                            </div>
                                          <h2>&nbsp;&nbsp;&nbsp;Checked By</h2>
                                        </div> 
                                        <div class="col-lg-4"></div>
                                        <div class="col-lg-4" align="right" >

                                            <br><br>

                                            <div class="form-group">  
                                             <div class="col-lg-10 hline"><hr></div>

                                            </div>
                                            <div align="left"> <h3>Recommended By</h3></div>

                                            <br><br>
                                            <div class="form-group">  
                                             <div class="col-lg-10 hline"><hr></div>

                                            </div>
                                            <div align="left"<h2>&nbsp;&nbsp;&nbsp;Approved By</h2></div>
                                        </div>    
                                    </div>
                                </div>
                                <input type="button" class="btn btn-primary" id="save_pan_info" value="Save"/>
                                <input type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal" id="approve_pan_info" value="Approve"/>
                                <input type="button" class="btn btn-danger" data-toggle="modal" data-target="#dec_Modal" id="decline_pan_info" value="Decline"/>
                                <input type="button" class="btn btn-primary" id="make_payment" value="Make Payment"/>
                            </div> 
                            <!--First column Ends Here-->
                            <!--<div class="col-lg-1"></div>-->
                            <!--Second column starts here-->
                            <div class="col-lg-5">
                                <div class="form-group">
                                    <div class="col-lg-3">
                                        <label for="currency">Currency:</label>
                                    </div>
                                    <div class="col-lg-5">
                                        <?php
                                            $selected = NULL;
                                            if(isset($pan_info->currency_id)) {
                                                $selected = $pan_info->currency_id;
                                            } 
                                            echo curency_list($selected, array('id'=>'first_currency_combo', 'name'=>'CURRENCY_ID'));
                                        ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-lg-3">
                                        <label for="exchange_rate">Exchange Rate:</label>
                                    </div>
                                    <div class="col-lg-5">
                                        <input type="text" class="form-control" name="EXCHANGE_RATE" id="exchange_rate" placeholder="" value="<?php if(isset($pan_info->EXCHANGE_RATE)){ echo $pan_info->EXCHANGE_RATE;}?>" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-lg-3">
                                        <label for="cost_center_code">Cost Center Code:</label>
                                    </div>
                                    <div class="col-lg-5">
                                        <?php cost_center_mul(explode(',',@$cost_cen_array),array('multiple'=>'multiple', 'class'=>'form-control', 'COST_CENTER_ID[]'));?>
                                    </div>
                                </div>
                                 <div class="form-group">
                                    <div class="col-lg-3">
                                        <label for="name_of_the_branch">Name Of the Br./Location:</label>
                                    </div>
                                    <div class="col-lg-5">
                                         <?php bank_branch_mul(explode(',',@$branch_array),array('multiple'=>'multiple', 'class'=>'form-control', 'BANK_BRANCH_ID[]'))?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-lg-3">   
                                        <label for="gl">GL</label>
                                    </div>
                                    <div class="col-lg-5">
                                        <?php gl_sel(explode(',',@$gl_array),array('multiple'=>'multiple', 'class'=>'form-control', 'GL_ID[]'))?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-lg-3">   
                                        <label for="sub_gl">Sub GL</label>
                                    </div>
                                    <div class="col-lg-5">
                                        <?php sub_gl_sel(explode(',',@$sub_gl_array),array('multiple'=>'multiple', 'class'=>'form-control', 'SUB_GL_ID[]'))?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-lg-3">   
                                        <label for="sol">Sol</label>
                                    </div>
                                    <div class="col-lg-5">
                                        <?php sol_sel(explode(',',@$sol_array),array('multiple'=>'multiple', 'class'=>'form-control', 'SOL_ID[]'))?>
                                    </div>
                                </div>
                                <br>
                                <div id="approve_modal" style="display: none" >
                                    <!--<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Open Modal</button>-->
                                    <div class="modal fade" id="myModal" role="dialog">
                                        <div class="modal-dialog">

                                          <!-- Modal content-->
                                          <div class="modal-content">
                                            <div class="modal-header">
                                              <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            </div>
                                            <div class="modal-body">
                                              <div class="form-group">
                                                <div class="col-lg-3">
                                                    <label for="comment_app">Comment:</label>
                                                </div>
                                                <div class="col-lg-9">
                                                    <textarea class="form-control" name="comment_app" id="coment_app" placeholder=""><?php if(isset($pan_info->COMMENT_APP)){ echo $pan_info->COMMENT_APP;}?></textarea>
                                                </div>
                                            </div>
                                            </div>
                                            <div class="modal-footer">
                                              <button type="button" class="btn btn-success" data-dismiss="modal">Approve</button>
                                            </div>
                                          </div>

                                        </div>
                                      </div>
                                </div>
                                <div id="decline_modal" style="display: none" >
                                    <!--<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Open Modal</button>-->
                                    <div class="modal fade" id="dec_Modal" role="dialog">
                                        <div class="modal-dialog">

                                          <!-- Modal content-->
                                          <div class="modal-content">
                                            <div class="modal-header">
                                              <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            </div>
                                            <div class="modal-body">
                                              <div class="form-group">
                                                <div class="col-lg-3">
                                                    <label for="comment">Comment:</label>
                                                </div>
                                                <div class="col-lg-9">
                                                    <textarea class="form-control" name="comment" id="comment" placeholder=""><?php if(isset($pan_info->COMMENT)){ echo $pan_info->PURPOSE;}?></textarea>
                                                </div>
                                            </div>
                                            </div>
                                            <div class="modal-footer">
                                              <button type="button" class="btn btn-danger" data-dismiss="modal">Decline</button>
                                            </div>
                                          </div>

                                        </div>
                                      </div>
                                </div>
                            </div>

                        </form>
                    </div>
                <div id="appro_history" class="tab-pane fade ">
                    <table class="table table-striped table-bordered table-hover dataTable" id="approval_history_list">
                        <thead>
                          <tr>
                            <th>SL No.</th>
                            <th>Date</th>
                            <th>Person Name</th>
                            <th>Comments</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td>1</td>
                            <td>22-Oct-2016</td>
                            <td>Ahsanul Kabir</td>
                            <td>Ahsanul Kabir Approved Successfully</td>
                          </tr>
                          <tr>
                              <td>2</td>
                            <td>16-Oct-2016</td>
                            <td>Moe</td>
                            <td>mary@example.com</td>
                          </tr>
                          <tr>
                              <td>3</td>
                            <td>15-Dec-2016</td>
                            <td>Dooley</td>
                            <td>july@example.com</td>
                          </tr>
                        </tbody>
                      </table>
                </div>
                <div id="preview" class="tab-pane fade"><!-- 2nd tab div start-->
                                <div class="col-lg-12 no_padding">
                                    <div style=" padding: 5px !important">
                                    <header>
                                        <div class="h1">Invoice</div>
			<address>
				<p>Jonathan Neal</p>
				<p>101 E. Chapman Ave<br>Orange, CA 92866</p>
				<p>(800) 555-1234</p>
			</address>
<!--			<span><img alt="" src=""></span>-->
		</header>
		<article>
			<h1>Recipient</h1>
			<address>
				<p>Some Company<br>c/o Some Guy</p>
			</address>
			<table class="meta invoice_table">
				<tr>
					<th><span  >Invoice #</span></th>
					<td><span  >101138</span></td>
				</tr>
				<tr>
					<th><span  >Date</span></th>
					<td><span  >January 1, 2012</span></td>
				</tr>
				<tr>
					<th><span  >Amount Due</span></th>
					<td><span id="prefix"  >$</span><span>600.00</span></td>
				</tr>
			</table>
			<table class="inventory invoice_table">
				<thead>
					<tr>
						<th><span  >Item</span></th>
						<th><span  >Description</span></th>
						<th><span  >Rate</span></th>
						<th><span  >Quantity</span></th>
                                                <th><span  >VAT</span></th>
                                                <th><span  >TAX</span></th>
                                                <th><span  >Net Price</span></th>
						<th><span  > Total Price</span></th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td><span  >Front End Consultation</span></td>
						<td><span  >Experience Review</span></td>
						<td><span data-prefix>$</span><span  >150.00</span></td>
						<td><span  >4</span></td>
						<td><span data-prefix>$</span><span>600.00</span></td>
                                                <td><span data-prefix>$</span><span>600.00</span></td>
                                                <td><span data-prefix>$</span><span>600.00</span></td>
                                                <td><span data-prefix>$</span><span>600.00</span></td>
					</tr>
				</tbody>
			</table>
			
			<table class="balance invoice_table">
				<tr>
					<th><span  >Total</span></th>
					<td><span data-prefix>$</span><span>600.00</span></td>
				</tr>
				<tr>
					<th><span  >Amount Paid</span></th>
					<td><span data-prefix>$</span><span  >0.00</span></td>
				</tr>
				<tr>
					<th><span  >Balance Due</span></th>
					<td><span data-prefix>$</span><span>600.00</span></td>
				</tr>
			</table>
		</article>
		<aside>
			<h1><span  >Additional Notes</span></h1>
			<div  >
				<p>A finance charge of 1.5% will be made on unpaid balances after 30 days.</p>
			</div>
		</aside>
                                </div>
                            </div>
                                 </div>
            </div>
            </div>
        </div>
    </div>
</div>
</div>
<script>
$(document).ready(function() {
//    $('#approval_history_list').dataTable();
    $('#approval_history_list').dataTable({
        "searching": false,
        "paging":   false
    });
        $('#wo_ref').blur(function(){
           var wo_ref_val = $('#wo_ref').val();
           if(wo_ref_val==123) {
               $('.ps').prop("readonly", true);
               $('#wo_value').val(200000);
               $('#paid_up_to_date').val(100000);
               $('#invoice_amount').val(120000);
               var rm_amount = parseFloat($('#invoice_amount').val()).toFixed(2)-parseFloat($('#paid_up_to_date').val()).toFixed(2);
//            alert(rm_amount);  
            $('#remaining_amount').val(rm_amount);
           } 
        });
        
        $('#invoice_amount').blur(function(){
           var rem_amount = parseFloat($('#invoice_amount').val()).toFixed(2)-parseFloat($('#paid_up_to_date').val()).toFixed(2);
            $('#remaining_amount').val(rem_amount);
        });
        
        $('#approve_pan_info').click(function(){
            $('#approve_modal').show();
        });
        $('#decline_pan_info').click(function(){
            $('#decline_modal').show();
        });
        
        //Saving Payment Approval information
        $('#save_pan_info').click(function(){
            var all_required_pan_info = $('#payment_approval_form').serialize();
            data = all_required_pan_info;

            $.ajax({
                url: '<?php echo base_url();?>payment/add_payment_approval_info',
                type: 'post',
                data: data,
                success:function(data) {
                }   
            });
            
        });
    });
    
    
</script>