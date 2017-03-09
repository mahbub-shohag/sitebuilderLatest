<span style="text-align: center; font-weight: bold;display: block">Item List</span>
<table class=" table-bordered table-hover" style="width:100% !important">
    <thead>
        <th>SL.</th>
        <!--<th>Detail Item ID</th>-->
        <th style="text-align: center;">Name</th>
        <th style="text-align: center;">Quantity</th>
        <th style="text-align: center;">Total Price</th>
        <th style="text-align: center;">Number Of Attachment</th>
        <th style="text-align: center;">Attachment</th>
        <th style="text-align: center;">Action</th>
    </thead>
  <tbody>
      <?php $i=1;foreach($item_list as $key=>$val){?>
        <tr>
  <!--<input type="text" id="item_id" value="<?php // echo $val['ITEM_DETAILS_ID'];?>"-->
            <td>
              <?php echo $i++; ?>
            </td>
            <!--<td style="text-align: center;"><?php // echo $val['ITEM_DETAILS_ID'];?></td>-->
            <td style="text-align: center;"><?php echo $val['DETAILS'];?></td>
            <td style="text-align: center;"><?php echo $val['QUANTITY'];?></td>
            <td style="text-align: center;"><?php echo number_format($val['PRICE'],2);?></td>
            <td style="text-align: center;"><a href="javascript:void(0)" class="get_attch" detitemids="<?php echo $val['ITEM_DETAILS_ID'];?>"><?php echo $val['NOF'];?></a></td>
            <td style="text-align: center;"><input type="button"  class="btn btn-success pp" itemids="<?php echo $val['ITEM_DETAILS_ID'];?>" data-toggle="modal" data-target="#myModal" id="browse_attachment" value="Browse"/></td>
            
            <td style="text-align: center;">
             &nbsp; 
             <a href="<?php echo base_url().'payment/add_bill/'.$val['BILL_ID'].'/'.$val['ITEM_DETAILS_ID'].'#item';?>"> <i class="fa fa-pencil" aria-hidden="true"></i> </a>
             &nbsp;
              <a href="javascript:void(0)"> <i id="<?php echo $val['ITEM_DETAILS_ID'];?>" class="fa fa-times del_item PP" aria-hidden="true"></i> </a>

            </td>
        </tr>
      <?php }?>
    </tbody>
</table>
<br>
<br>
 <button id="done" class="btn btn-primary btn-xs pull-right">Done</button>
 
 <div id="show_attac_data">
     
 </div>
 
 <script>
 $('.pp').click(function(){
     var x = $(this).attr('itemids')
     //alert(x);
     //exit();
     $('#item_det_id').val(x);
 });
 
 $('.get_attch').click(function(){
    var ITEM_DETAILS_ID = $(this).attr('detitemids');
    $.ajax({
        url: '<?php echo base_url(); ?>payment/get_all_attach_list',
        type: 'post',
        data: {ITEM_DETAILS_ID: ITEM_DETAILS_ID},
        success:function(data) {
            $('#show_attac_data').html(data);
        }
    });
    
 });
 </script>


