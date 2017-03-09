<br>
<div class="container-fluid">
    <div class="panel  panel-default">
        <div class="panel-heading">
            <?php echo $title;?>
        </div>
        <div class="panel-body">
            
            <table class="table table-bordered" id="my_table">
                <thead>
                    <th></th>
                    <th>SL.</th>
                    <th style="text-align: center;">Invoice Number</th>
                    <th style="text-align: center;">Supplier</th>
                   
                    <th style="text-align: center;">Payment Type</th>
<!--                    <th style="text-align: center;">Purchase Date</th>-->
                    <th style="text-align: center;">Bill Date</th>
                    <th style="text-align: center;">Receive Date</th>
                    <th style="text-align: center;">Create Date</th>
                    <th style="text-align: center;">Status</th>
                    <th style="text-align: center;">Total Bill Amount</th>
                    <!--<th style="text-align: center;">Action</th>-->
                </thead>
              
                <tbody>
                  <?php $i=1;
                  foreach($bill_list as $key=>$val){?>
                    <tr>
                        <td><input type="checkbox" name="chk_pan[]" id="<?php echo $val['BILL_ID'];?>" class="crt_payment_app_note" /></td>
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
                        <td style="text-align: right;"><?php echo number_format($val['TOTAL_BILL'], 2);?></td>
                        <!--<td style="text-align: center;">-->
                         <!--<a target="" <?php if($val['STATUS']){ ?> href="<?php // echo base_url().'payment/approve_payment/'.$val['BILL_ID'];?>"<?php } else {?> class ="" href="#"<?php } ?>  > <button <?php // if($val['STATUS']!=8){echo '';} ?> class="btn btn-primary btn-xs">Payment Approval Note</button> </a>-->
                        <!--</td>-->
                    </tr>
                  <?php }?>
                </tbody>
            </table>
            <!--Button to Create Payment Approval Note-->
            <input type="button" id="create_payment_appro" class="btn btn-primary" value="Create Payment Approval Note"/>
            
        </div>

    </div>
</div>
<script>
    $(document).ready(function(){
    $('#my_table').DataTable();
    //Work For Creating Pan 
    $('#create_payment_appro').click(function() {
        panGranted = '';
        pandenied = [];
        $("input:checkbox").each(function(){
            var $this = $(this);
            if($this.is(":checked")){
//              panGranted.push($this.attr("id")); 
              panGranted += $(this).attr("id")+"_";
            }
            else{
//               window.alert("Please Select at least a bill to create approval note ");
//               exit();
            }     
        });
        window.location.href='approve_payment/'+panGranted;

    });
});
</script>
<style>
    .disabled {
   pointer-events: none;
   cursor: default;
}
</style>

