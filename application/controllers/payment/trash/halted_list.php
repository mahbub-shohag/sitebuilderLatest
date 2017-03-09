<br>
<div class="container-fluid">
    <div class="panel  panel-default">
        <div class="panel-heading">
            <?php echo $title;?>
        </div>
        <div class="panel-body">
            
            <table class="table table-bordered" id="my_table">
                <thead>
                    <th>SL.</th>
                    <th style="text-align: center;">Invoice Number</th>
                    <th style="text-align: center;">Supplier</th>
                   
                    <th style="text-align: center;">Payment Type</th>
<!--                    <th style="text-align: center;">Purchase Date</th>-->
                    <th style="text-align: center;">Bill Date</th>
                    <th style="text-align: center;">Receive Date</th>
                    <th style="text-align: center;">Create Date</th>
                    <th style="text-align: center;">Reason</th>
                    <th style="text-align: center;">Total Bill Amount</th>
                    <th style="text-align: center;">Action</th>
                </thead>
              
                <tbody>
                  <?php $i=1;
                  foreach($halted_list as $key=>$val){?>
                    <tr>
                        <td>
                          <?php echo $i++; ?>
                        </td>
                        <td style="text-align: center;"><a href="<?php echo base_url().'payment/add_bill/'.$val['BILL_ID'];?>"><?php echo $val['INVOICE_NUMBER'];?></a></td>
                        <td style="text-align: center;"><?php echo $val['SUPPLIER_NAME'];?></td>
                       
                        <td style="text-align: center;"><?php echo $val['PAY_TYPE_NAME'];?></td>
<!--                        <td style="text-align: center;"><?php echo $val['PURCHASE_DATE'];?></td>-->
                        <td style="text-align: center;"><?php echo $val['BILL_DATE'];?></td>
                        <td style="text-align: center;"><?php echo $val['RECEIVE_DATE'];?></td>
                        <td style="text-align: center;"><?php echo $val['CREATED'];?></td>
                        <td style="text-align: center;"><?php echo $val['STATUS_NAME'];?></td>
                        <td style="text-align: right;"><?php echo $val['TOTAL_BILL'];?></td>
                        <td style="text-align: center;">
                         <a target="" <?php if($val['STATUS']){ ?> href="<?php echo base_url().'payment/approve_payment/'.$val['BILL_ID'];?>"<?php } else {?> class ="" href="#"<?php } ?>  > <button <?php if($val['STATUS']!=8){echo '';} ?> class="btn btn-primary btn-xs">Create PAN</button> </a>
                        </td>
                    </tr>
                  <?php }?>
                </tbody>
            </table>
            
        </div>

    </div>
</div>
<script>
    $(document).ready(function(){
    $('#my_table').DataTable();
});
</script>
<style>
    .disabled {
   pointer-events: none;
   cursor: default;
}
</style>

