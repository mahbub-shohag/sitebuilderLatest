<br>
<div class="container-fluid">
    <div class="panel  panel-default">
        <div class="panel-heading">
            <?php echo $title;?>
        </div>
        <div class="panel-body">
            <div id="hide_show_chalan" style="display: none" >
                <!--<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Open Modal</button>-->
                <div class="modal fade" id="tx_ch_update" role="dialog">
                    <div class="modal-dialog">

                      <!-- Modal content-->
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        <div class="modal-body">
                          <div class="form-group">
                            <div class="col-lg-3">
                                <label for="challan_no">Challan No :</label>
                            </div>
                            <div class="col-lg-8">
                                <input type="text" class="form-control" id="challan_no" name="challan_no" />
                            </div>
                        </div>
                        </div>
                          <br>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-primary" data-dismiss="modal">Update</button>
                        </div>
                      </div>

                    </div>
                  </div>
            </div>
            
            <table class="table table-bordered" id="view_chalan_list">
                <thead>
                    <tr>
                        <th>SL.</th>
                        <th style="text-align: center;">Chalan ID</th>
                        <th style="text-align: center;">Chalan Date</th>
                        <th style="text-align: center;"> Number Of Vendor</th>
                        <th style="text-align: center;">Tax Amount</th>
                        <th style="text-align: center;">Action</th>
                        <!--<th style="text-align: center;">Status</th>--> 
                    </tr>
                </thead>
              
                <tbody>

                    <tr>
                        <td>1</td>
                        <td>CH-15693</td>
                        <td style="text-align: center;">16-Dec-16</td>
                        <td style="text-align: center;">1</td>
                        <td style="text-align: right;">250,000.00</td>
                        <td style="text-align: center;"> <input type="button" id="updt_chalan" data-toggle="modal" data-target="#tx_ch_update" class="btn btn-primary" value="Update Chalan"/></td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>CH-15693</td>
                        <td style="text-align: center;">16-Dec-16</td>
                        <td style="text-align: center;">1</td>
                        <td style="text-align: right;">250,000.00</td>
                        <td style="text-align: center;"> <input type="button" id="updt_chalan" data-toggle="modal" data-target="#tx_ch_update" class="btn btn-primary" value="Update Chalan"/></td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>CH-15693</td>
                        <td style="text-align: center;">16-Dec-16</td>
                        <td style="text-align: center;">1</td>
                        <td style="text-align: right;">250,000.00</td>
                        <td style="text-align: center;"> <input type="button" id="view_chalan"  class="btn btn-primary" value="View Chalan"/></td>
                    </tr>
                    <tr>
                        <td>4</td>
                        <td>CH-15693</td>
                        <td style="text-align: center;">16-Dec-16</td>
                        <td style="text-align: center;">1</td>
                        <td style="text-align: right;">250,000.00</td>
                        <td style="text-align: center;"> <input type="button" id="view_chalan"  class="btn btn-primary" value="View Chalan"/></td>
                    </tr>
                    
                </tbody>
            </table>
            
        </div>

    </div>
</div>
<script>
    $(document).ready(function(){
        $('#view_chalan_list').DataTable();
        $('#updt_chalan').click(function(){
           $('#hide_show_chalan').show(); 
        });
        
        $('#view_chalan').click(function(){
            window.location.href = 'create_tax_chalan';
        })
    });
</script>
<style>
    .disabled {
   pointer-events: none;
   cursor: default;
}
</style>

