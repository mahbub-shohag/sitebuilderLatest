<u><h4 class="text-center"> Attached File List</h4></u>
<table class="col-lg-12 table-bordered table-hover">
    <thead>
        <th>SL.</th>
        <th style="text-align: center;">Title</th>
        <th style="text-align: center;">Attached Date</th>
        <th style="text-align: center;">Action</th>
    </thead>
  <tbody>
      <?php $i=1;foreach($file_list as $key=>$val){?>
        <tr>
            <td>
              <?php echo $i++; ?>
            </td>
            <td style="text-align: center;"><?php echo $val['TITLE'];?></td>
            <td style="text-align: center;"><?php echo $val['DATE_OF_ATTACHED'];?></td>
            <td style="text-align: center;">
             &nbsp; 
             <a download href="<?php echo $val['FILE_LOCATION'];?>"> <i class="fa fa-eye" aria-hidden="true"></i> </a>
             &nbsp;
                <a href="javascript:void(0)"> <i data-pan="<?php echo $val['PAN_ID'];?>" data-title="<?php echo $val['TITLE'];?>" data-date="<?php echo $val['DATE_OF_ATTACHED'];?>" class="fa fa-times del_file" aria-hidden="true"></i> </a>

            </td>
        </tr>
      <?php }?>
    </tbody>
</table>






