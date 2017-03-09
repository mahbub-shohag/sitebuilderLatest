
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-danger">      
                    <div class="panel-heading">
                            Create Payment Approval Note
                        </div>
                    <div class="panel-body">

                            <!-- 1st Column Start Div -->
                            <form class="form-horizontal"  id="my_form" method="post" action="">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <div class="col-lg-3 col-lg-offset-1">
                                            <label for="pan_date" class="control-label">PAN Date</label>
                                        </div>
                                        <div class="col-lg-6">
                                            <input placeholder= "Click to Select Date" class="form-control oracle_date" name="PAN_DATE"  value="<?php if (isset($pan_info->PAN_DATE)) {
    echo $pan_info->PAN_DATE;
} ?>">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-lg-3 col-lg-offset-1">
                                            <label for="cost_center" class="control-label">Cost Center</label>
                                        </div>
                                        <div class="col-lg-6">
                                            <input class="form-control" type="text" name="COST_CENTER" value="<?php if (isset($pan_info->COST_CENTER)) {
    echo $pan_info->COST_CENTER;
} ?>">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-lg-3 col-lg-offset-1">
                                            <label for="ref_no" class="control-label">Vendor Ref. Number</label>
                                        </div>
                                        <div class="col-lg-6">
                                            <input class="form-control" type="text" name="VENDOR_REF_NUMBER" value="<?php if (isset($pan_info->PAN_DATE)) {
    echo $pan_info->PAN_DATE;
} ?>">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-lg-3 col-lg-offset-1">
                                            <label for="details" class="control-label">Purpose Details</label>
                                        </div>
                                        <div class="col-lg-6">
                                            <textarea class="form-control" name="PURPOSE_DETAILS"><?php if (isset($pan_info->PURPOSE_DETAILS)) {
    echo $pan_info->PURPOSE_DETAILS;
} ?></textarea>     
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-lg-3 col-lg-offset-1">
                                            <label for="amount" class="control-label">Invoice Amount</label>
                                        </div>
                                        <div class="col-lg-6">
                                            <input class="form-control" type="text" name="INVOICE_AMOUNT" value="<?php if (isset($pan_info->INVOICE_AMOUNT)) {
    echo $pan_info->INVOICE_AMOUNT;
} ?>"> 
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-lg-3 col-lg-offset-1">
                                            <label for="schedule" class="control-label">Payment Schedule</label>
                                        </div>
                                        <div class="col-lg-6">
<?php
$data = array('begining_of_month' => 'Begining of the Month', 'end_of_month' => 'End of Month');
$selected = NULL;
if (isset($pan_info->PAYMENT_SCHEDULE)) {
    $selected = $pan_info->PAYMENT_SCHEDULE;
}
echo custom_combo('PAYMENT_SCHEDULE', $data, $selected);
?>
                                        </div>
                                    </div>

                                </div> <!-- 1st column end-->

                                <!-- second column start -->

                                <div class="col-lg-6">

                                    <div class="form-group">
                                        <div class="col-lg-5">
                                            <label for="wo_val" class="control-label">WO Value</label>
                                        </div>
                                        <div class="col-lg-6">
                                            <input class="form-control" type="number" name="WO_VALUE" value="<?php if (isset($pan_info->WO_VALUE)) {
    echo $pan_info->WO_VALUE;
} ?>">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-lg-5">
                                            <label for="paid_up_to_date" class="control-label">Paid Up to Date</label>
                                        </div>
                                        <div class="col-lg-6">
                                            <!--calculated value -->
                                            <input class="form-control" readonly type="number" name="PAID_UP_TO_DATE" value="">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-lg-5">
                                            <label for="bill_amount" class="control-label">Bill Amount</label>
                                        </div>
                                        <div class="col-lg-6">
                                            <input class="form-control" type="number" name="PAID_AMOUNT" value="<?php if (isset($pan_info->PAID_AMOUNT)) {
    echo $pan_info->PAID_AMOUNT;
} ?>">
                                        </div>
                                    </div>    

                                    <div class="form-group">
                                        <div class="col-lg-5">
                                            <label for="remaining" class="control-label">Remaining</label>
                                        </div>
                                        <div class="col-lg-6">
                                            <input class="form-control" type="number" name="REMAINING" value="<?php if (isset($pan_info->REMAINING)) {
    echo $pan_info->REMAINING;
} ?>">
                                        </div>
                                    </div>  

                                    <div class="form-group">
                                        <div class="col-lg-5">
                                            <label for="remarks" class="control-label">Remarks</label>
                                        </div>
                                        <div class="col-lg-6">
                                            <input class="form-control" name="REMARKS" type="text" value="<?php if (isset($pan_info->REMARKS)) {
    echo $pan_info->REMARKS;
} ?>">
                                        </div>
                                    </div>



                                    <input type="hidden" name="BILL_ID" value="<?php echo $bill_id; ?>">
                                    <input type="hidden" name="CREATED_BY" value="<?php echo $user_id; ?>">
                                    <div class="pull-right">
                                        <br><br>
                                    <?php if ($pan_id) { ?>
                                            <input type="submit" name="save" class="save btn btn-primary" value="Update">
                                    <?php } else { ?>
                                            <input type="submit" name="save" class="save btn btn-primary" value="Save">
<?php } ?>
                                    </div>

                            </form>
                        </div>

                   </div>
        </div>
           
                    <div class="panel panel-danger">      
                        <div class="panel-heading">
                            Add User to delegation
                        </div>
                        <div class="panel-body">

                                <div class="col-lg-12">
                                    <div class='col-lg-6'>
                                        <div class="col-lg-3">
                                            <label for="add_user" class="control-label">Delegation User</label>
                                        </div>
                                        <div class="col-lg-6">
        <?php
            // if(isset($agreement_info->SOL_ID)) {$selected = $agreement_info->SOL_ID;}
            echo delegator_user();
        ?>
                                        </div>
                                        <div class="col-lg-3">
                                            <button  id="add_user" class="btn btn-primary btn-xs">Add</button>
                                        </div>


                                    </div>

                                    <input type="hidden" id="pan_id" name="PAN_ID" value="<?php echo $pan_id; ?>">
                                    <!-- hidden field for current tab -->
                                <!--    <input type="hidden" name="tab" value="delegation"> -->
                                    <div class="col-lg-4 col-lg-offset-1" id="delegation_list">

                                    </div>

                                </div>
                            <button class=" btn btn-primary pull-right">Save</button>
                        </div></div>



    </div>
</div>
</div>
</div>

<script>
    $(document).ready(function () {
//       setTimeout(function() { $(".alert-success").alert('close'); }, 3000);
//

//
// 
//

//       //Show owner list if exist

        var pan_id = $("#pan_id").val();
//        
        function get_delegation_users(pan_id) {
            $.ajax({
                url: '<?php echo base_url(); ?>payment/get_delegation_users',
                type: 'POST',
                data: {PAN_ID: pan_id},
                success: function (data) {
                    //alert(data);
                    $("#delegation_list").html(data);

                    // MAKE THE LIST SORTABLE
                    $('#sortable').sortable({
                        stop: function (e, ui) {
                            var controller_url = $('#sortable').data('url');
                            var p = ($.map($(this).find('div'), function (el) {
                                return $(el).attr('id') + '=' + $(el).index();
                            }));
                            $.ajax({
                                url: controller_url,
                                type: "POST",
                                data: {order: p,pan_id:pan_id},
                                // complete: function(){},
                                success: function () {
                                    $("#message").html('<div style="text-align:center;" id="message_div" class="alert alert-success fade in">' +
                                            '<strong>Reordered Successfully.</strong></div>');
                                    $("#message_div").delay(500).fadeOut();

                                }
                            });
                        }
                    });
                }
            });
        }
        // load delegation list of selected pan if exist

        get_delegation_users(pan_id);


        // add delegation user

        function add_delegation_user(pan_id, user_id) {
            $.ajax({
                url: '<?php echo base_url(); ?>payment/add_pan_delegation_user',
                type: 'POST',
                data: {PAN_ID: pan_id, APPROVAL_PERSON_ID: user_id},
                success: function () {
                    //alert(data);
                    get_delegation_users(pan_id);
                }
            });
        }

        // function to check if user is already added for this pan

        function check_delegation_user(pan_id, user_id) {

            $.ajax({
                url: '<?php echo base_url(); ?>payment/check_delegation_user',
                type: 'POST',
                data: {PAN_ID: pan_id, APPROVAL_PERSON_ID: user_id},
                success: function (data) {
                    //alert(data);
                    if (data == 0) {
                        add_delegation_user(pan_id, user_id);


                    }
                    else {
                        bootbox.alert("This user is already added!!!");
                    }

                }
            });
        }


        $(document).on('click', '#add_user', function () {
            //var flag;
            var pan_id = $("#pan_id").val();
            var user_id = $("#user option:selected").val();
            //alert(pan_id+'+'+user_id);
            if (user_id) {
                check_delegation_user(pan_id, user_id)
            }
            ;
            //return;
        });
//
        $(document).on('click', '.del_user', function () {
            var table = 'approval_delegation';
            var id = $(this).closest('div').attr('id');
            var data = {"DELEGATION_ID": id};
            //console.log(data);
            $(this).parent().remove();
            del_delegation_user(table, data);

        });
//
//       // function to call delete_list_item
        function del_delegation_user(table, data) {
            $.ajax({
                url: '<?php echo base_url(); ?>payment/delete_list_item',
                type: 'POST',
                data: {data_array: data, table: table},
                success: function () {
                    //alert(data);
                    $("#message").html('<div style="text-align:center;" id="message_div" class="alert alert-success fade in">' +
                            '<strong>Delete Successfully.</strong></div>');
                    $("#message_div").delay(500).fadeOut();
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


        $(function () {
            $("#sortable").sortable();
            $("#sortable").disableSelection();
        });

        // add deligation

//
//            /*disable non active tabs*/
//
//
//          //calcute total payable amount
//
//            $('#area_unit,#area_owned').on('input',function(){
//                var total_unit = $("#area_owned").val();
//               // alert(total_unit);
//
//                var price = $("#area_unit").val();  //alert(price)
//                var total = total_unit*price;
//                //alert(total);
//                $('#payable').attr('value',total);
//            });
    });

</script>



