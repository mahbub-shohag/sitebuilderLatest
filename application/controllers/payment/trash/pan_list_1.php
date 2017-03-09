<div class="container-fluid">
    <div class="panel panel-danger">
        <div class="panel-heading">
            <?php echo $title; ?>
        </div>
        <div class="panel-body">

            <table class="col-lg-12 table table-hover">
                <thead>
                <th>SL.</th>
                <th style="text-align: center;">Invoice Number</th>
                <th style="text-align: center;">Vendor Ref. Number</th>
                <th style="text-align: center;">Cost Center</th>
                <th style="text-align: center;">Invoice Amount</th>
                <th style="text-align: center;">Paid Amount</th>
                <th style="text-align: center;">Remaining Amount</th>
                <th style="text-align: center;">Status</th>
                <th style="text-align: center;">Action</th>
                </thead>

                <tbody>
                    <?php $i = 1;
                    foreach ($pan_list as $key => $val) {
                        ?>
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

                                <a href="<?php echo base_url() . 'payment/get_details_pan/' . $val['PAN_ID']; ?>"> <button class="btn btn-danger btn-xs">View</button></i> </a>

                            </td>
                        </tr>
<?php } ?>
<!--                        <tr>
                            <td>1</td>
                            <td style="text-align: center;"></td>
                            <td style="text-align: center;"></td>
                            <td style="text-align: center;"></td>
                            <td style="text-align: center;"></td>
                            <td style="text-align: center;"></td>
                            <td style="text-align: center;"></td>
                             <td style="text-align: center;"></td>
                            <td style="text-align: center;">
                                &nbsp;

                                <a href="<?php // echo base_url() . 'payment/get_details_pan/' . $val['PAN_ID']; ?>"> <button class="btn btn-danger btn-xs">View</button></i> </a>

                            </td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td style="text-align: center;"></td>
                            <td style="text-align: center;"></td>
                            <td style="text-align: center;"></td>
                            <td style="text-align: center;"></td>
                            <td style="text-align: center;"></td>
                            <td style="text-align: center;"></td>
                             <td style="text-align: center;"></td>
                            <td style="text-align: center;">
                                &nbsp;

                                <a href="<?php // echo base_url() . 'payment/get_details_pan/' . $val['PAN_ID']; ?>"> <button class="btn btn-danger btn-xs">View</button></i> </a>

                            </td>
                        </tr>-->
                </tbody>
            </table>

        </div>

    </div>
</div>

<style>
    .disabled {
        pointer-events: none;
        cursor: default;
    }
</style>

