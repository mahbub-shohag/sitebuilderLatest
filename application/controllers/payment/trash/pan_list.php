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
                    <th style="text-align: center;">Vendor Ref. Number</th>
                    <th style="text-align: center;">Cost Center</th>
                    <th style="text-align: center;">Invoice Amount</th>
                    <th style="text-align: center;">Paid Amount</th>
                    <th style="text-align: center;">Remaining Amount</th>
                    <th style="text-align: center;">Reason</th>
                    <th style="text-align: center;">Action</th>
                </thead>
              
                <tbody>
<tr>
                                    <td> 1</td>
                                    <td style="text-align: center;">IN58967</td>
                                    <td style="text-align: center;">12589</td>
                                    <td style="text-align: center;">Head Office</td>
                                    <td style="text-align: right;">Tk. 150,000.00</td>
                                    <td style="text-align: right;">Tk. 100,000.00</td>
                                    <td style="text-align: right;">Tk. 50,000.00</td>
                                    <td style="text-align: center;">Not Properly prepared</td>
                                    <td style="text-align: center;">
                                     &nbsp;

                                     <a href=""> <button class="btn btn-primary btn-xs">View</button></i> </a>
                                    </td>
                                  </tr>
                                  <tr>
                                    <td> 2</td>
                                    <td style="text-align: center;">IN58968</td>
                                    <td style="text-align: center;">12577</td>
                                    <td style="text-align: center;">Mirpur Branch</td>
                                    <td style="text-align: right;">Tk. 150,000.00</td>
                                    <td style="text-align: right;">Tk. 100,000.00</td>
                                    <td style="text-align: right;">Tk. 50,000.00</td>
                                    <td style="text-align: center;">There are some inconsistency</td>
                                    <td style="text-align: center;">
                                     &nbsp;

                                     <a href=""> <button class="btn btn-primary btn-xs">View</button></i> </a>
                                    </td>
                                  </tr>
                                  <tr>
                                    <td> 3</td>
                                    <td style="text-align: center;">IN58969</td>
                                    <td style="text-align: center;">12578</td>
                                    <td style="text-align: center;">Gulshan Branch</td>
                                    <td style="text-align: right;">Tk. 150,000.00</td>
                                    <td style="text-align: right;">Tk. 100,000.00</td>
                                    <td style="text-align: right;">Tk. 50,000.00</td>
                                    <td style="text-align: center;">Lack of Information</td>
                                    <td style="text-align: center;">
                                     &nbsp;

                                     <a href=""> <button class="btn btn-primary btn-xs">View</button></i> </a>
                                    </td>
                                  </tr>
                                  <tr>
                                    <td> 4</td>
                                    <td style="text-align: center;">IN58970</td>
                                    <td style="text-align: center;">12579</td>
                                    <td style="text-align: center;">Head Office</td>
                                    <td style="text-align: right;">Tk. 150,000.00</td>
                                    <td style="text-align: right;">Tk. 100,000.00</td>
                                    <td style="text-align: right;">Tk. 50,000.00</td>
                                    <td style="text-align: center;">Recheck Necessary</td>
                                    <td style="text-align: center;">
                                     &nbsp;

                                     <a href=""> <button class="btn btn-primary btn-xs">View</button></i> </a>
                                    </td>
                                  </tr>
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