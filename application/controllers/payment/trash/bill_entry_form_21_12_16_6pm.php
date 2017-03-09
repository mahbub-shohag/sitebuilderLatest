
<div class="container-fluid">
    <div class="panel-body">

    <!--Extra by Khairul-->
        <div class="modal fade" id="myModal" role="dialog">
                <div class="modal-dialog">

                  <!-- Modal content-->
                  <div class="modal-content">
                  
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        <div class="modal-body">
                            
                              <form method="post" action="<?php echo base_url(); ?>payment/do_upload_img" enctype="multipart/form-data" class="form-horizontal" id="upload_form_img">
                                    <div class="form-group">
                                        <?php echo form_open_multipart('payment/do_upload_img');?>  
                                          <table class="table table-bordered" id="attachment_tab">
                                                <thead>
                                                    <!--<th>SL.</th>-->
                                                    <th>Attachment Tittle</th>
                                                    <th>Attachment Type</th>
                                                    <th style="text-align: center">File Name</th> 
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <!--<td>1.</td>-->
                                                        <td align='left'><input type='text' name='FILE_NAME'/></td>
                                                       <td><?php echo attachment_type_combo();?></td>
                                                       <td><input class='file' type="file" class="form-control" name="FILE_LOC" id="images"></td>
                                                    </tr>
                                                </tbody>
                                          </table>    
                                    </div>
                                  <input type="hidden" name="BILL_ID" value="<?php echo $bill_id;?>" />
                                  <input type="submit" value="Upload" name="image_upload" id="image_upload" class="btn"/>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <!--<button type="button" class="btn btn-success" id="save_attach_info">Save</button>-->
<!--                            <input type="submit" name="submit_img" value="Submit"/>-->
                        </div>
                  </div>

                </div>
          </div>
        <!--End Kjhairul-->
        
        <ul class="nav nav-tabs" id="tab_menu">
            <li role="presentation" class="active"><a data-toggle="tab" href="#bill">Bill Information</a></li>
            <li role="presentation" <?php if ($bill_id == NULL) echo "class='disabled'"; ?> > <a <?php if ($bill_id != NULL) echo "data-toggle='tab' href='#item'"; ?> >Item Details</a></li>
            <li role="presentation" <?php if ($bill_id == NULL) echo "class='disabled'"; ?> > <a <?php if ($bill_id != NULL) echo "data-toggle='tab' href='#attachment'"; ?> >Attachment</a></li>
            <li role="presentation" <?php if ($bill_id == NULL) echo "class='disabled'"; ?> > <a <?php if ($bill_id != NULL) echo "data-toggle='tab' href='#preview'"; ?> >Bill Preview</a></li>

        </ul>

        <div class="row">

            <div class="col-lg-12">
                <div class="panel panel-default remove_top_border">
                    <div id="collapseOne" class="panel-collapse collapse in">
                        <div class="panel-body tab-content padding">
                            <div id="bill" class="tab-pane fade in active">
                                <!-- 1st Column Start Div -->


                                <form class="form-horizontal"  id="my_form" method="post" action="">
                                    <div class="col-lg-4 ">
                                        <div class="form-group ">
                                            <div class="col-lg-4  ">
                                                <label for="name" class="control-label">Supplier Name</label>
                                            </div>
                                            <div class="col-lg-6 ">
                                                <?php
                                                $selected = NULL;
                                                if (isset($bill_info->SUPPLIER_ID)) {
                                                    $selected = $bill_info->SUPPLIER_ID;
                                                }
                                                echo supplier_name($selected);
                                                ?> 
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="col-lg-4   ">
                                                <label for="invoice" class="control-label">Invoice No.</label>
                                            </div>
                                            <div class="col-lg-6 ">
                                                <input class="form-control" type="text" name="INVOICE_NUMBER"  value="<?php if (isset($bill_info->INVOICE_NUMBER)) {
                                                    echo $bill_info->INVOICE_NUMBER;
                                                } ?>">
                                            </div>
                                        </div>


                                        <div class="form-group">
                                            <div class="col-lg-4   ">
                                                <label for="bill_amount" class="control-label">Total Bill Amount</label>
                                            </div>
                                            <div class="col-lg-6 ">
                                                <input class="form-control" type="number" name="BILL_AMOUNT"  value="<?php if (isset($bill_info->BILL_AMOUNT)) {
                                                    echo $bill_info->BILL_AMOUNT;
                                                } ?>">  
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-lg-4">
                                                <label for="payment_type" class="control-label">Payment Type</label>
                                            </div>
                                            <div class="col-lg-6">
                                            <?php
                                            $selected = NULL;
                                            if (isset($bill_info->PAYMENT_TYPE)) {
                                                $selected = $bill_info->PAYMENT_TYPE;
                                            }
                                            echo payment_method($selected);
                                            ?> 
                                            </div>
                                        </div>  
                                        <div class="form-group">
                                            <div class="col-lg-4">
                                                <label for="bill_date" class="control-label">Bill Date</label>
                                            </div>
                                            <div class="col-lg-6">
                                                <input placeholder= "Click to Select Date" class="form-control oracle_date" name="BILL_DATE"   value="<?php if (isset($bill_info->BILL_DATE)) {echo $bill_info->BILL_DATE;} ?>">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-lg-4">
                                                <label for="receive_date" class="control-label">Receive Date</label>
                                            </div>
                                            <div class="col-lg-6 ">
                                                <input placeholder= "Click to Select Date" class="form-control oracle_date" name="RECEIVE_DATE"   value="<?php if (isset($bill_info->RECEIVE_DATE)) {echo $bill_info->RECEIVE_DATE;} ?>">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-lg-4   ">
                                                <label for="remarks" class="control-label">Remarks</label>
                                            </div>
                                            <div class="col-lg-6 ">
                                                <textarea class="form-control" name="REMARKS"><?php if (isset($bill_info->REMARKS)) {echo $bill_info->REMARKS;} ?></textarea>
                                            </div>
                                        </div>
                                        
                                        <div class="form-group">
                                            <div class="col-lg-4   ">
                                               <label for="VAT_METHOD" class="control-label"> Include VAT </label>
                                            </div>
                                            <div class="col-lg-6 ">
                                                <div class="checkbox">
                                                    <label><input type="checkbox" value="1" name="VAT_METHOD">Yes</label>
                                                </div>
                                            </div>
                                        </div> 
                                        <div class="form-group">
                                            <div class="col-lg-4   ">
                                               <label for="TAX_METHOD" class="control-label"> Include TAX </label>
                                            </div>
                                            <div class="col-lg-6 ">
                                                <div class="checkbox">
                                                    <label><input type="checkbox" name="TAX_METHOD" value="1">Yes</label>
                                                </div>
                                            </div>
                                        </div>  
                                        <input type="hidden" name="tab" value="bill"> 
                                        <div class="form-group">
                                            <div class="col-lg-4   ">
                                               <?php if ($bill_id) { ?>
                                                        <input type="submit" name="save" class="save btn btn-primary" value="ADD">
                                                    <?php } else { ?>
                                                        <input type="submit" name="save" class="save btn btn-primary" value="Save">
                                                    <?php } ?>
                                            </div>
                                            <div class="col-lg-6 ">
                                               
                                            </div>
                                        </div>
                                        

                                    </div>
                                    <!--                <div class="col-lg-4">
                                                        <div class="col-lg-6 line_height"></div>
                                                        <div class="col-lg-6 line_height">
                                                         <div class="new_h1">
                                                             <div class="initiate">
                                                                Initiated By:<?php echo $this->session->userdata('FIRSTNAME'); ?>
                                                                <br>
                                                                Date :<?php echo date('Y-m-d'); ?>
                                                             </div>
                                                         </div>
                                                    </div>
                                                    </div>-->
                                </form>
                            </div><!--1st tab div end -->

                            <div id="attachment" class="tab-pane fade"><!-- 2nd tab div start-->
                                <form class="form-horizontal"  id="my_form2" method="post" action="">
                                    <div class="col-lg-12">
                                        <div class='col-lg-5'>
                                            <br>
                                                <?php echo file_upload_html(true); ?>
                                            <div class="col-lg-2 pull-right">

                                                    <?php if ($item_details_id) { ?>
                                                            <input type="submit" name="save" class="save btn btn-primary btn-sm" value="ADD">
                                                    <?php } else { ?>
                                                            <input type="submit" name="save" class="save btn btn-primary btn-sm" value="ADD">
                                                    <?php } ?>
                                                <br>
                                            </div>
                                        </div>

                                        <input type="hidden" id="bill_id" name="BILL_ID" value="<?php echo $bill_id; ?>">
                                        <!-- hidden field for current tab -->
                                        <input type="hidden" name="tab" value="item">
                                    </div>
                                </form>

                            </div>
                            <div id="item" class="tab-pane fade"><!-- 2nd tab div start-->
                              
                                
                                <div class="col-lg-12">
                                           <div id="show_attach_table"  style="text-align: right;">
                                                 
                                            </div>
                                        <form class="form-horizontal"  id="my_form2" method="post" action="">
                                        <div class='col-lg-4'>
                                            <div class="form-group">
                                                <div class="col-lg-4">
                                                    <label for="item_name" class="control-label">Item Name</label>
                                                </div>
                                                <div class="col-lg-8">
                                                    <?php
                                                    $selected = NULL;
                                                    if (isset($item_info->ITEM_ID)) {
                                                        $selected = $item_info->ITEM_ID;
                                                    }
                                                    echo items($selected, array('id' => 'item_id'));
                                                    ?>  
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-lg-4">
                                                    <label for="details" class="control-label">Item Details</label>
                                                </div>
                                                <div class="col-lg-8">
                                                    <textarea class="form-control" name="DETAILS"><?php if (isset($item_info->DETAILS)) {echo $item_info->DETAILS;} ?></textarea>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-lg-4">
                                                    <label for="PO_NUMBER" class="control-label">PO Number</label>
                                                </div>
                                                <div class="col-lg-8">
                                                    <input type="text" class="form-control" name="PO_NUMBER"  value="<?php if (isset($item_info->PO_NUMBER)) {echo $item_info->EXCHANGE_RATE;} ?>">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="col-lg-4">
                                                    <label for="memo_number" class="control-label">Memo Number</label>
                                                </div>
                                                <div class="col-lg-8">
                                                    <input type="text" class="form-control" name="MEMO_NUMBER"  value="<?php if (isset($item_info->MEMO_NUMBER)) {echo $item_info->MEMO_NUMBER;} ?>">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="col-lg-4">
                                                    <label for="purchase_date" class="control-label">Purchase Date</label>
                                                </div>
                                                <div class="col-lg-8">
                                                    <input placeholder= "Click to Select Date" class="form-control oracle_date" name="PURCHASE_DATE"   value="<?php if (isset($bill_info->PURCHASE_DATE)) {echo $bill_info->PURCHASE_DATE;} ?>">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-lg-4">
                                                    <label for="qty" class="control-label">Quantity</label>
                                                </div>
                                                <div class="col-lg-8">
                                                    <input id="qty" type="number" class="form-control price_cal" name="QUANTITY"  value="<?php if (isset($item_info->QUANTITY)) { echo $item_info->QUANTITY;} ?>">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="col-lg-4">
                                                    <label for="price" class="control-label">Unit Price</label>
                                                </div>
                                                <div class="col-lg-8">
                                                    <input id="unit_price" type="number" class="form-control price_cal" name="PRICE"  value="<?php if (isset($item_info->PRICE)) {echo $item_info->PRICE;} ?>">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="col-lg-4">
                                                    <label for="vat" class="control-label">VAT</label>
                                                </div>
                                                <div class="col-lg-8">
                                                    <input  id="vat" type="number" class="form-control price_cal" name="PRICE"  value="<?php if (isset($item_info->VAT)) {echo $item_info->VAT;} ?>">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                            <div class="col-lg-4   ">
                                               <label for="VAT_METHOD" class="control-label"> Include VAT </label>
                                            </div>
                                            <div class="col-lg-8 ">
                                                <div class="checkbox">
                                                    <label><input type="checkbox" value="1" name="VAT_METHOD">Yes</label>
                                                </div>
                                            </div>
                                        </div> 
                                        <div class="form-group">
                                            <div class="col-lg-4   ">
                                               <label for="TAX_METHOD" class="control-label"> Include TAX </label>
                                            </div>
                                            <div class="col-lg-8 ">
                                                <div class="checkbox">
                                                    <label><input type="checkbox" name="TAX_METHOD" value="1">Yes</label>
                                                </div>
                                            </div>
                                        </div> 
                                            <div class="form-group">
                                                <div class="col-lg-4">
                                                    <label for="price" class="control-label">Total Price</label>
                                                </div>
                                                <div class="col-lg-8">
                                                    <input readonly id="price" type="number" class="form-control" name="PRICE"  value="<?php if (isset($item_info->PRICE)) {echo $item_info->PRICE;} ?>">
                                                </div>
                                            </div>
                                            <!--Attachment start here-->
                                            <div class="form-group">
                                                
                                                
                                            </div>
                                            <div class="form-group">
                                                <div class="col-lg-8">
                                                    <div class="form-group">
                                                        <div class="col-lg-6">
                                                            <label>Attachment</label>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <input type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal" id="browse_attachment" value="Browse"/>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-2 ">
                                                    <br>
                                                    <?php if ($item_details_id) { ?>
                                                         <input type="submit" name="save" class="save btn btn-primary btn-sm" value="Update">
                                                    <?php } else { ?>
                                                    <input type="submit" name="save" class="save btn btn-primary btn-sm" value="ADD">
                                                       
                                                    <?php } ?>
                                                </div>
                                            </div>
                                            
                                            <!--Attachment Ends Here-->
                                        </div>
                                        <div class="col-lg-8" >
                                            <div id="item_list">
                                                
                                            </div>
                                            <br>
                                            <div>
                                                <?php 
                                                       echo $file_attach; 
                                                 ?>
                                            </div>
                                            
                                        </div>
                                            <input type="hidden" id="bill_id" name="BILL_ID" value="<?php echo $bill_id; ?>">
                                        <!-- hidden field for current tab -->
                                        <input type="hidden" name="tab" value="item">
                        </form>
                                     
                                    </div>
                                  
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
</div>


    <script>
        $(document).ready(function () {
            
//            $('#image_upload').click(function(){
//                  $.ajax({
//                url: '<?php // echo base_url(); ?>payment/get_all_attach_list',
//                type: 'POST',
//                data: {bill_id: 1},
//                success: function (data) {
//                    //alert(data);
//                    $("#show_attach_table").html(data);
//                }
//            });
//            });
    //       setTimeout(function() { $(".alert-success").alert('close'); }, 3000);
    //
    //       //Show owner list if exist
            var bill_id = $("#bill_id").val();
    //
            $.ajax({
                url: '<?php echo base_url(); ?>payment/get_bill_item_list',
                type: 'POST',
                data: {bill_id: bill_id},
                success: function (data) {
                    //alert(data);
                    $("#item_list").html(data);
                }
            });
    //
    //         // Show renovation list
    //          $.ajax({
    //             url:'<?php echo base_url(); ?>premises/get_premises_renovation_list',
    //             type:'POST',
    //             data:{premises_id:premises_id},
    //             success:function(data){
    //                 //alert(data);
    //                 $("#renovation_list").html(data);
    //             }
    //         });
    //
    //
    //         // delete list item
    //
    //
            $(document).on('click', '.del_item', function () {
                alert('click');
                var bill_id = $("input[name=BILL_ID]").val();
                var table = 'item_details';
                var id = $(this).attr('id');
                var data = {"BILL_ID": bill_id, "ITEM_ID": id}
                call_function_to_del_list(table, data);
            });
    //
            $(document).on('click', '#done', function (e) {
                e.preventDefault();
                var bill_id = $("input[name=BILL_ID]").val();

                // update present location
                $.ajax({
                    url: '<?php echo base_url(); ?>payment/update_present_location',
                    type: 'POST',
                    data: {bill_id: bill_id},
                    success: function () {
                        //alert(data);
                        location.href = "<?php echo base_url() . 'payment/get_details_bill/' ?>" + bill_id;
                    }
                })

            });
    //
    //       // function to call delete_list_item
            function call_function_to_del_list(table, data) {
                $.ajax({
                    url: '<?php echo base_url(); ?>premises/delete_list_item',
                    type: 'POST',
                    data: {data_array: data, table: table},
                    success: function () {
                        //alert(data);
                        location.reload();
                    }
                });
            }
    //
    //        //TO STAY CURRENT TAB ON PAGE REFRESH
    //
    //
    //          // store the currently selected tab in the hash value
            $("ul.nav-tabs > li > a").on("shown.bs.tab", function (e) {
                var id = $(e.target).attr("href").substr(1);
                window.location.hash = id;
            });

            // on load of the page: switch to the currently selected tab
            var hash = window.location.hash;
            $('#tab_menu a[href="' + hash + '"]').tab('show');
    //
    //            /*disable non active tabs*/
    //
    //
    //

            //calcute total price

            $('.price_cal').on('input', function () {
                var qty = $("#qty").val();
                var vat = $("#vat").val();
                //alert(vat);
                var unit_price = $("#unit_price").val();
                var total = qty * unit_price;
                var total_with_vat=calculate_vat(total,vat)+parseFloat(total);

                if (total)
                    $('#price').attr('value', total_with_vat);
                //get_unit_price();
            });
            
            //Saving Attachment Info
            $('#save_attach_info').click(function(){
               alert('hello'); 
            });
        });
        function calculate_vat(total,vat){
            return parseFloat((total*vat)/100);
        }
$(document).on('change', '#item_id', function (e) {
                e.preventDefault();
                var item_id = $(this).val();

                // update present location
                $.ajax({
                    url: '<?php echo base_url(); ?>payment/get_item_details_by_id',
                    type: 'POST',
                    data: {item_id: item_id},
                    success: function (data) {
                        //alert(data);
                       
                    }
                })

            });
    </script>
    
   
    



