<div class="container-fluid">

    <ul class="nav nav-tabs" id="tab_menu">
        <li role="presentation" class="active"><a data-toggle="tab" href="#pending">Pending Approval List</a></li>
        <li role="presentation"> <a  data-toggle='tab' href='#approved'>Approved by Me</a></li>
    </ul>
    
    <div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div id="collapseOne" class="panel-collapse collapse in">
                <div class="panel-body tab-content">
                    <div id="pending" class="tab-pane fade in active">
                    
                    <?php if(empty($pending_pan_list)){?>
                        <div style="text-align: center;" class="alert alert-danger fade in">
<!--                            <a href="#" class="close" data-dismiss="alert">&times;</a>-->
                             There is no available pending PAN!!
                        </div>
                        
                    <?php } else
                        { ?>    
                         <table class="table table-bordered" id="pan_appro_table">
                            <thead>
                                <th>SL.</th>
                                <th style="text-align: center;">Invoice Number</th>
                                <th style="text-align: center;">Vendor Ref. Number</th>
                                <th style="text-align: center;">Cost Center</th>
                                <th style="text-align: center;">Invoice Amount</th>
                                <th style="text-align: center;">Paid Amount</th>
                                <th style="text-align: center;">Remaining Amount</th>
                                <th style="text-align: center;">Reason</th>
                                <th style="text-align: center;">Action</th>
                            </thead>
              
                            <tbody>
                              <?php $i=1;
                                foreach($pending_pan_list as $key=>$val){?>
                                  <tr>
                                    <td>
                                      <?php echo $i++; ?>
                                    </td>
                                    <td style="text-align: center;"><?php echo $val['INVOICE_NUMBER']; ?></td>
                                    <td style="text-align: center;"><?php echo $val['VENDOR_REF_NUMBER']; ?></td>
                                    <td style="text-align: center;"><?php echo $val['COST_CENTER']; ?></td>
                                    <td style="text-align: center;"><?php echo number_format($val['INVOICE_AMOUNT']); ?></td>
                                    <td style="text-align: center;"><?php echo number_format($val['PAID_AMOUNT']); ?></td>
                                    <td style="text-align: center;"><?php echo number_format($val['REMAINING']); ?></td>
                                    <td style="text-align: center;"><?php echo $val['STATUS_NAME']; ?></td>
                                    <td style="text-align: center;">
                                     &nbsp;

                                     <a href="<?php echo base_url().'payment/get_details_pan/'.$val['PAN_ID'];?>"> <button class="btn btn-primary btn-xs">View</button></i> </a>
                                    </td>
                                  </tr>
                                <?php }?>
                              </tbody>
                        </table>
                    <?php } ?>
                    </div>
                    <!-- 2ND TAB START -->
                    
                    <div id="approved" class="tab-pane fade">
                         
                        <?php if(empty($approved_pan_list)){?>
                        <div style="text-align: center;" class="alert alert-danger fade in">
<!--                            <a href="#" class="close" data-dismiss="alert">&times;</a>-->
                             No PAN available!!!
                        </div>
                        
                    <?php }else { ?>    
                        <table class="table table-bordered" id="my_table">
                            <thead>
                                <th>SL.</th>
                                <th style="text-align: center;">Invoice Number</th>
                                <th style="text-align: center;">Vendor Ref. Number</th>
                                <th style="text-align: center;">Cost Center</th>
                                <th style="text-align: center;">Invoice Amount</th>
                                <th style="text-align: center;">Paid Amount</th>
                                <th style="text-align: center;">Remaining Amount</th>
                                <th style="text-align: center;">Reason</th>
                                <th style="text-align: center;">Action</th>
                            </thead>
              
                            <tbody>
                              <?php $i=1;
                                foreach($approved_pan_list as $key=>$val){?>
                                  <tr>
                                    <td>
                                      <?php echo $i++; ?>
                                    </td>
                                    <td style="text-align: center;"><?php echo $val['INVOICE_NUMBER']; ?></td>
                                    <td style="text-align: center;"><?php echo $val['VENDOR_REF_NUMBER']; ?></td>
                                    <td style="text-align: center;"><?php echo $val['COST_CENTER']; ?></td>
                                    <td style="text-align: center;"><?php echo number_format($val['INVOICE_AMOUNT']); ?></td>
                                    <td style="text-align: center;"><?php echo number_format($val['PAID_AMOUNT']); ?></td>
                                    <td style="text-align: center;"><?php echo number_format($val['REMAINING']); ?></td>
                                    <td style="text-align: center;"><?php echo $val['STATUS_NAME']; ?></td>
                                    <td style="text-align: center;">
                                     &nbsp;

                                     <a href="<?php echo base_url().'payment/get_details_pan/'.$val['PAN_ID'];?>"> <button class="btn btn-primary btn-xs">View</button></i> </a>
                                    </td>
                                  </tr>
                                  </tr>
                                <?php }?>
                              </tbody>
                        </table>
                    <?php } ?>
                        
                    </div>
                    
                </div>
            </div>
        </div>
    </div>    
</div>      
 
</div>  
<script>
    $(document).ready(function(){
        $('#pan_appro_table').DataTable();
        $('#my_table').DataTable();
    });
</script>
<style>
    .disabled {
   pointer-events: none;
   cursor: default;
}
</style>
