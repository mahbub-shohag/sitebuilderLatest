</* global bootbox */

/* global bootbox */

div class="container-fluid">
    <div class="panel panel-danger">
        <div class="panel panel-heading">
            <?php echo $title; ?> <p class="pull-right" style="color:#a94442;"><?php echo $pan_info->STATUS_NAME; ?></p>
        </div>
        <div class="panel panel-body">
            <div class="col-lg-12">
                <u><h4 style="text-align: center;">PAN Info</h4></u><br>

                <table class="table table-bordered">
                    <tbody>
                        <tr>
                            <th>Vendor Reference Number</th><td><?php echo $pan_info->VENDOR_REF_NUMBER; ?></td>
                            <th>Invoice Amount</th><td><?php echo number_format($pan_info->INVOICE_AMOUNT); ?></td>
                            <th>WO value</th><td><?php echo number_format($pan_info->WO_VALUE); ?></td>
                            <th>Payment Schedule</th><td><?php echo $pan_info->PAYMENT_SCHEDULE; ?></td>
                        </tr>

                        <tr>
                            <th>Paid Amount</th><td><?php echo number_format($pan_info->PAID_AMOUNT); ?></td>
                            <th>Remaining</th><td><?php echo number_format($pan_info->REMAINING); ?></td>
                            <th>Remarks</th><td><?php echo $pan_info->REMARKS; ?></td>

                        </tr>

                    </tbody>
                </table>

            </div>
          
         <!-- DOCUMENT INFO-->
         <?PHP if(!empty($document_info)){ ?>
          <div class="col-lg-12">
              
                    <u><h4 style="text-align: center;">Supporting Document</h4></u><br>

                    <table class="table table-hover">
                        <thead>
                        <th style="text-align: center;">SL.</th>
                        <th style="text-align: center;">Title</th>
                        <th style="text-align: center;">Attached Date</th>
                        <th style="text-align: center;">Action</th>
                        </thead>

                        <tbody>
                            <?php $i = 1;
                            foreach ($document_info as $key => $val) {
                                ?>
                                <tr>
                                    <td style="text-align: center;"><?php echo $i++; ?></td>
                                    <td style="text-align: center;"><?php echo $val['TITLE']; ?></td>
                                    <td style="text-align: center;"><?php echo $val['DATE_OF_ATTACHED']; ?></td>
                                    <td style="text-align: center;"><a download href="<?php echo $val['FILE_LOCATION'];?>"> <button class="btn btn-danger btn-xm">view</button> </a></td>
                                </tr>
    <?php } ?>
                        </tbody>
                    </table>

                </div>
    <?php } ?>
         
        <?PHP if(!empty($approval_info)){ ?> 
            <div class="col-lg-12">

                <?php if ($pan_info->STATUS != 10 && !empty($approval_info)) {?>
                    <u><h4 style="text-align: center;">Approval Info</h4></u><br>

                    <table class="table table-hover">
                        <thead>
                        <th style="text-align: center;">Approval Person</th>
                        <th style="text-align: center;">Remarks</th>
                        <th style="text-align: center;">Approval Date</th>
                        </thead>

                        <tbody>
                            <?php $i = 1;
                            foreach ($approval_info as $key => $val) {
                                ?>
                                <tr>
                                    <td style="text-align: center;"><?php echo $val['first_name']; ?></td>
                                    <td style="text-align: center;"><?php echo $val['REMARKS']; ?></td>
                                    <td style="text-align: center;"><?php echo $val['APPROVAL_DATE']; ?></td>
                                </tr>
    <?php } ?>
                        </tbody>
                    </table>

                </div>
<?php } ?>   
            
 <?php } ?> 
         
       <?php if(in_array(5, $user_level) && $pan_info->PRESENT_LOCATION ==$user_id &&$pan_info->STATUS==7) {?>
            <div class=" col-lg-3 pull-right">
                <form class="form-horizontal" method="post" action="<?php echo base_url().'payment/approve_pan/'.$pan_id;?>" 
                <div class="form-group">
                    <div class="col-lg-12">
                        <label for="remarks" class="control-label">Remarks<span style="color:red;">*</span></label>
                    </div>
                    <div class="col-lg-12">
                        <textarea required name="REMARKS" class="form-control"></textarea>
                    </div>
               
                    <input type="hidden" name="PAN_ID" value="<?php echo $pan_id;?>">
                    <input type="hidden" name="APPROVAL_PERSON" value="<?php echo $user_id;?>">
                    
             <?php } ?>
                    
                    

                 <br><br><br><br>
                <?php if(in_array(4, $user_level)&& $pan_info->STATUS==10) { ?>
                    <a href="<?php echo base_url() . 'payment/send_pan_for_approval/' . $pan_id; ?>"> <button class="btn btn-primary btn-sm">Send for Approval</button></i> </a>  
<?php } elseif (in_array(5, $user_level)  && $pan_info->PRESENT_LOCATION ==$user_id &&$pan_info->STATUS==7) { ?>
                   
                 <button type="submit" class="btn btn-primary btn-sm pull-right">Approve</button> </form>     
                 <?php } ?>
            </div>
                      
        <!-- for compliance team -->
        
        
       <?php if(in_array(6, $user_level) && $pan_info->STATUS==8) {?> <!-- compliance team and pan approved-->
            <div class=" col-lg-3 pull-right">
                <form id="remarks_form" class="form-horizontal" method="post" action="<?php echo base_url().'payment/compliance_pan/'.$pan_id;?>" 
                <div class="form-group">
                    <div class="col-lg-12">
                        <label for="remarks" class="control-label">Remarks<span style="color:red;">*</span></label>
                    </div>
                    <div class="col-lg-12">
                        <textarea required name="REMARKS" id="remarks" class="form-control"></textarea>
                        <br>
                    </div>
               
                    <input type="hidden" name="PAN_ID" value="<?php echo $pan_id;?>">
                    <input type="hidden" name="APPROVAL_PERSON" value="<?php echo $user_id;?>">

                   
                    <div class="col-lg-7 pull-right">
                        
                        <input type="submit" id="revert" name="button" class="save btn btn-sm btn-danger col-lg-5" value="Revert">
                        <input type="submit" name="button" class="save btn btn-sm btn-danger col-lg-offset-1 col-lg-5" value="Confirm">
                    
                    </div>
                  </form> 
            </div>    
             <?php } ?>
         </div> <!-- panel body div end -->
 

    </div>
</div>
<style>
    th{
        background-color:#f5f5f5;
    }
</style>

<script>
$(document).ready(function(){
    
    $("#revert").on("click", function (e) {
        e.preventDefault();
        //alert("ok");
        var remarks = $("#remarks").val();
        if(remarks.length){
           bootbox.dialog({
//            onEscape: function() {
//                $("#premises").select2('val','');
//            },
            message: "Do you want to add further approval?",
            buttons: {
              success: {
                label: "Yes",
                className: "btn-success btn-sm",
                callback: function() {
                    $("#remarks_form").submit();
                }
              },
              danger: {
                label: "No",
                className: "btn-danger btn-sm",
                callback: function() {
                    //alert(agreement_id);
                     $( '<input type="hidden" name="NEED_APPROVAL" value="0">').appendTo('#remarks_form');
                      $("#remarks_form").submit();
                }
              }
            }
          });
    });
  }
  else{
  return;
  }
});
</script>
