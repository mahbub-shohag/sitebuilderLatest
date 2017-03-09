<div class="container-fluid">
    <div class="panel panel-danger">
        <div class="panel panel-heading">
            <?php echo $title;?> <p class="pull-right" style="color: #a94442;"><?php echo $bill_info->STATUS_NAME;?></p>
        </div>
        <div class="panel panel-body">
            <div class="col-lg-12">
                <u><h4 style="text-align: center;">Bill Info</h4></u><br>
                
                <table class="table table-bordered">
                    <tbody>
                        <tr>
                            <th>Invoice Number</th><td><?php echo $bill_info->INVOICE_NUMBER;?></td>
                            <th>Supplier Name</th><td><?php echo $bill_info->SUPPLIER_NAME;?></td>
                            <th>PO Number</th><td><?php echo $bill_info->PURCHASE_ORDER_NO;?></td>
                            <th>Payment Type</th><td><?php echo $bill_info->PAY_TYPE_NAME;?></td>
                        </tr>
                        
                        <tr>
                            <th>Purchase Date</th><td><?php echo $bill_info->PURCHASE_DATE;?></td>
                            <th>Bill Date</th><td><?php echo $bill_info->BILL_DATE;?></td>
                            <th>Received Date</th><td><?php echo $bill_info->RECEIVE_DATE;?></td>
                            <th>Status</th><td><?php echo $bill_info->STATUS_NAME;?></td>
                            
                        </tr>
                        
                    </tbody>
                </table>
                
            </div>
            
            <div class="col-lg-12">
                
                <u><h4 style="text-align: center;">Item Details</h4></u><br>
                
                <table class="table table-hover">
                        <thead>
                           <th style="text-align: center;">Item Name</th>
                           <th style="text-align: center;">Quantity</th>
                           <th style="text-align: center;">Total Price</th>
                           <th style="text-align: center;">VAT</th>
                           <th style="text-align: center;">TAX</th>
                           <th style="text-align: center;">Details</th>
                        </thead>
                        
                        <tbody>
                            <?php $i=1;
                                foreach($item_info as $key=>$val){?>
                                    <tr>
                                        <td style="text-align: center;"><?php echo $val['ITEM_NAME'];?></td>
                                        <td style="text-align: center;"><?php echo $val['QUANTITY'];?></td>
                                        <td style="text-align: center;"><?php echo number_format($val['PRICE']);?></td>
                                        <td style="text-align: center;"><?php echo $val['VAT'];?>%</td>
                                        <td style="text-align: center;"><?php echo $val['TAX'];?>%</td>
                                        <td style="text-align: center;"><?php echo $val['DETAILS'];?></td>
                                      
                                    </tr>
                            <?php }?>
                        </tbody>
                </table>
                
            </div>
            <br><br>
             <?php if(in_array(3,$user_level) && $bill_info->STATUS ==7) {?>
            <div class=" col-lg-4 pull-right">
                <form class="form-horizontal"  id="agreement_form" method="post" action="<?php echo base_url().'payment/approve_bill/'.$bill_id;?>" 
                <div class="form-group">
                    <div class="col-lg-2">
                        <label for="remarks" class="control-label">Remarks</label>
                    </div>
                    <div class="col-lg-9">
                        <textarea required="required" name="REMARKS" class="form-control"></textarea>
                    </div>
                </div> 
                    <input type="hidden" name="BILL_ID" value="<?php echo $bill_id;?>">
                    <input type="hidden" name="APPROVAL_PERSON" value="<?php echo $user_id;?>">
             
                
            </div>
             <?php } ?>
            
        </div>
        
        <div class="panel-footer clearfix">
            <div class="pull-right"> 

                <?php if(in_array(3,$user_level) && $bill_info->STATUS == 7) {?>
                <button type="submit" class="btn btn-danger btn-sm">Approve</button> </form>
              <?php  } else { if($bill_info->STATUS == 7){?>
                <a href="<?php echo base_url().'payment/add_bill/'.$bill_id;?>"> <button class="btn btn-danger btn-sm">Edit</button></i> </a>  
              <?php  } } ?>
            </div>

        </div>
</div>
</div>
<style>
    th{
       background-color:#f5f5f5;
    }
</style>