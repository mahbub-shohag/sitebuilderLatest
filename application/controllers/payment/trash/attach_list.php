<br>
<div class="container-fluid">
    <div class="panel  panel-default">
        <div class="panel-heading">
        </div>
        <div class="panel-body">
            
            <div class="col-lg-12">
                <!--<div class="col-lg-5">-->
                    
                <!--</div>-->
<!--                <div id="3">
                    
                </div>-->
                <div class="col-lg-12">
                    <table class="table table-bordered" id="attach_dtls">
                    <thead>
                        <th>SL.</th>
                        <th style="text-align: center;">Detail Item Id</th>
                        <th style="text-align: center;">File Name</th>
                        <th style="text-align: center;">File Location</th>
                        <th style="text-align: center;">Action</th>

                    </thead>

                    <tbody>
                      <?php $i=1;
// print_r($bill_list);
                      foreach($bill_list as $key=>$val){?>
                        <tr>
                            <td>
                              <?php echo $i++; ?>
                            </td>

                            <td style="text-align: center;"><?php echo $val['ITEM_DETAILS_ID'];?></td>
                            <td style="text-align: center;"><?php echo $val['FILE_NAME'];?></td>
                            <!--<td style="text-align: center;"><?php // echo $val['FILE_LOC'];?></td>-->
                            <td style="text-align: center;"><?php echo str_replace('upload/', '',$val['FILE_LOC']);?></td>
                            <td style="text-align: center"><a href="<?php echo base_url($val['FILE_LOC']);?>" download>Download</a></td>


                        </tr>
                      <?php }?>
                    </tbody>
                </table>
                </div>
            </div>
          
        </div>

    </div>
</div>


