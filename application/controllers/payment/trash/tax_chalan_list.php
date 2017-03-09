<br>
<div class="container-fluid">
    <div class="panel  panel-default">
        <div class="panel-heading">
            <?php echo $title;?>
        </div>
        <div class="panel-body">
            
            <table class="table table-bordered" id="tax_chalan_list">
                <thead>
                    <tr>
                        <th>SL.</th>
                        <th style="text-align: center;"></th>
                        <th style="text-align: center;">Vendor Name</th>
                        <th style="text-align: center;">Vendor Address</th>
                        <th style="text-align: center;">Contact No</th>
                        <th style="text-align: center;">Unpaid Tax Amount</th>
                        <th style="text-align: center;">Chalan Date</th>
                        <!--<th style="text-align: center;">Status</th>--> 
                    </tr>
                </thead>
              
                <tbody>

                    <tr>
                        <td>1</td>
                        <td style="text-align: center;"><input type="checkbox" style="height:16px; width: 16px;" name="chk_chalan_1" class="chk_chalan" id="chk_challan_1" /></td>
                        <td style="text-align: center;">Abul Khair Group</td>
                        <td style="text-align: center;">GEC More, Chittagong</td>
                        <td style="text-align: center;">0178621879</td>
                        <td style="text-align: right;">250,000.00</td>
                        <td style="text-align: center;">16-Dec-16</td>
                        <!--<td style="text-align: center;"></td>-->
                    </tr>
                    <tr>
                        <td>2</td>
                        <td style="text-align: center;"><input type="checkbox" style="height:16px; width: 16px;" name="chk_chalan_2" class="chk_chalan" id="chk_challan_2" /></td>
                        <td style="text-align: center;">EZONE Computers</td>
                        <td style="text-align: center;">Jalil Tower, Khulna</td>
                        <td style="text-align: center;">017862569</td>
                        <td style="text-align: right;">350,000.00</td>
                        <td style="text-align: center;">15-Dec-16</td>
                        <!--<td style="text-align: center;"></td>-->
                    </tr>
                    <tr>
                        <td>3</td>
                        <td style="text-align: center;"><input type="checkbox" style="height:16px; width: 16px;" name="chk_chalan_2" class="chk_chalan" id="chk_challan_2" /></td>
                        <td style="text-align: center;">EZONE Computers</td>
                        <td style="text-align: center;">Jalil Tower, Khulna</td>
                        <td style="text-align: center;">017862569</td>
                        <td style="text-align: right;">350,000.00</td>
                        <td style="text-align: center;">15-Dec-16</td>
                        <!--<td style="text-align: center;"></td>-->
                    </tr>
                    <tr>
                        <td>4</td>
                        <td style="text-align: center;"><input type="checkbox" style="height:16px; width: 16px;" name="chk_chalan_2" class="chk_chalan" id="chk_challan_2" /></td>
                        <td style="text-align: center;">EZONE Computers</td>
                        <td style="text-align: center;">Jalil Tower, Khulna</td>
                        <td style="text-align: center;">017862569</td>
                        <td style="text-align: right;">350,000.00</td>
                        <td style="text-align: center;">15-Dec-16</td>
                        <!--<td style="text-align: center;"></td>-->
                    </tr>
                    <tr>
                        <td>5</td>
                        <td style="text-align: center;"><input type="checkbox" style="height:16px; width: 16px;" name="chk_chalan_2" class="chk_chalan" id="chk_challan_2" /></td>
                        <td style="text-align: center;">EZONE Computers</td>
                        <td style="text-align: center;">Jalil Tower, Khulna</td>
                        <td style="text-align: center;">017862569</td>
                        <td style="text-align: right;">350,000.00</td>
                        <td style="text-align: center;">15-Dec-16</td>
                        <!--<td style="text-align: center;"></td>-->
                    </tr>
                </tbody>
            </table>
            <div class="create_btn">
                <input type="button" id="create_tax_chalan" class="btn btn-primary create_tax_chalan" value="Create Tax Chalan" />
            </div>
        </div>

    </div>
</div>
<script>
    $(document).ready(function(){
        $('#tax_chalan_list').DataTable();
        $('#create_tax_chalan').click(function(){
            window.location.href='get_tax_chalan_list'; 
        });
    });
</script>
<style>
    .disabled {
   pointer-events: none;
   cursor: default;
}
</style>

