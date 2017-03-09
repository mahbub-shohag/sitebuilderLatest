<div class="container-fluid">
    <div class="panel-body">
    <ul class="nav nav-tabs" id="tab_menu">
        <li role="presentation" class="active"><a data-toggle="tab" href="#pending">Pending Approval List</a></li>
        <li role="presentation"> <a  data-toggle='tab' href='#approved'>Approved by Me</a></li>
    </ul>
    
    <div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default remove_top_border">
        <!--<div class="panel panel-default">-->
            <div id="collapseOne" class="panel-collapse collapse in">
                <div class="panel-body tab-content">
                    <div id="pending" class="tab-pane fade in active">
                      
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
                         
                                  <tr>
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

                                     <a href=""> <button class="btn btn-primary btn-xs">View</button></i> </a>
                                    </td>
                                  </tr>

                              </tbody>
                        </table>
                    </div>
                    <!-- 2ND TAB START -->
                    
                    <div id="approved" class="tab-pane fade">
                            
                        <table class="table table-bordered" id="my_table">
                            <thead>
                                <tr>
                                    <th>SL.</th>
                                    <th style="text-align: center;">Invoice Number</th>
                                    <th style="text-align: center;">Vendor Ref. Number</th>
                                    <th style="text-align: center;">Cost Center</th>
                                    <th style="text-align: center;">Invoice Amount</th>
                                    <th style="text-align: center;">Paid Amount</th>
                                    <th style="text-align: center;">Remaining Amount</th>
                                    <th style="text-align: center;">Reason</th>
                                    <th style="text-align: center;">Action</th>
                                </tr>
                            </thead>
              
                            <tbody>

                                  <tr>
                                    <td> 1</td>
                                    <td style="text-align: center;"></td>
                                    <td style="text-align: center;"></td>
                                    <td style="text-align: center;"></td>
                                    <td style="text-align: center;"></td>
                                    <td style="text-align: center;"></td>
                                    <td style="text-align: center;"></td>
                                    <td style="text-align: center;"></td>
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
