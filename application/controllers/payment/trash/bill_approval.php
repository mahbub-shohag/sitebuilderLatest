<div class="container-fluid">

    <ul class="nav nav-tabs" id="tab_menu">
        <li role="presentation" class="active"><a data-toggle="tab" href="#pending">Pending Approval</a></li>
        <li role="presentation"> <a  data-toggle='tab' href='#approved'>Approved by Me</a></li>
    </ul>
    
    <div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div id="collapseOne" class="panel-collapse collapse in">
                <div class="panel-body tab-content">
                    <div id="pending" class="tab-pane fade in active">
                    
                    <?php if(empty($bill_list)){?>
                        <div style="text-align: center;" class="alert alert-danger fade in">
<!--                            <a href="#" class="close" data-dismiss="alert">&times;</a>-->
                             There is no available pending bill!!
                        </div>
                        
                    <?php } else{ ?>    
                        <table class="col-lg-12 table table-hover">
                            <thead>
                                <th>SL.</th>
                                <th style="text-align: center;">Invoice Number</th>
                                <th style="text-align: center;">Supplier</th>
                                <th style="text-align: center;">PO Number</th>
                                <th style="text-align: center;">Payment Type</th>
                                <th style="text-align: center;">Purchase Date</th>
                                <th style="text-align: center;">Action</th>
                            </thead>
              
                            <tbody>
                              <?php $i=1;
                                foreach($bill_list as $key=>$val){?>
                                  <tr>
                                    <td>
                                      <?php echo $i++; ?>
                                    </td>
                                    <td style="text-align: center;"><?php echo $val['INVOICE_NUMBER'];?></td>
                                    <td style="text-align: center;"><?php echo $val['SUPPLIER_NAME'];?></td>
                                    <td style="text-align: center;"><?php echo $val['PURCHASE_ORDER_NO'];?></td>
                                    <td style="text-align: center;"><?php echo $val['PAY_TYPE_NAME'];?></td>
                                    <td style="text-align: center;"><?php echo $val['PURCHASE_DATE'];?></td>
                                    <td style="text-align: center;">
                                     &nbsp;

                                     <a href="<?php echo base_url().'payment/get_details_bill/'.$val['BILL_ID'];?>"> <button class="btn btn-primary btn-xs">View</button></i> </a>
                                    </td>
                                  </tr>
                                <?php }?>
                              </tbody>
                        </table>
                    <?php } ?>
                    </div>
                    <!-- 2ND TAB START -->
                    
                    <div id="approved" class="tab-pane fade">
                         
                        <?php if(empty($approve_list)){?>
                        <div style="text-align: center;" class="alert alert-danger fade in">
<!--                            <a href="#" class="close" data-dismiss="alert">&times;</a>-->
                             There is no available pending bill!!
                        </div>
                        
                    <?php } else{ ?>    
                        <table class="col-lg-12 table table-hover">
                            <thead>
                                <th>SL.</th>
                                <th style="text-align: center;">Invoice Number</th>
                                <th style="text-align: center;">Supplier</th>
                                <th style="text-align: center;">PO Number</th>
                                <th style="text-align: center;">Payment Type</th>
                                <th style="text-align: center;">Approval Date</th>
                                 <th style="text-align: center;">Remarks</th>
                                <th style="text-align: center;">Action</th>
                            </thead>
              
                            <tbody>
                              <?php $i=1;
                                foreach($approve_list as $key=>$val){?>
                                  <tr>
                                    <td>
                                      <?php echo $i++; ?>
                                    </td>
                                    <td style="text-align: center;"><?php echo $val['INVOICE_NUMBER'];?></td>
                                    <td style="text-align: center;"><?php echo $val['SUPPLIER_NAME'];?></td>
                                    <td style="text-align: center;"><?php echo $val['PURCHASE_ORDER_NO'];?></td>
                                    <td style="text-align: center;"><?php echo $val['PAY_TYPE_NAME'];?></td>
                                    <td style="text-align: center;"><?php echo $val['APPROVAL_DATE'];?></td>
                                    <td style="text-align: center;"><?php echo $val['REMARKS'];?></td>
                                    <td style="text-align: center;">
                                     &nbsp;

                                     <a href="<?php echo base_url().'payment/get_details_bill/'.$val['BILL_ID'];?>"> <button class="btn btn-primary btn-xs">View</button></i> </a>
                                    </td>
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
