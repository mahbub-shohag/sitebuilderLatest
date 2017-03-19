<div class="modal fade" id="homeModal" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Index Page</h4>
            </div>
            <div class="modal-body">
                <form id="home_modal" method="post" enctype="multipart/form-data" action="<?php echo base_url(); ?>index.php/Site_Admin/edit_site">
                    <div class="form-group">
                        <label for="formGroupExampleInput2">Site Head</label>
                        <input type="text" name="slug" value="<?php if(!empty($index_row->slug)){echo $index_row->slug;}?>" class="form-control" id="formGroupExampleInput2" placeholder="Another input">
                    </div>
                    <div class="form-group">
                        <label for="formGroupExampleInput">Logo</label>
                        <input type="file" name="logo">
                    </div>
                    <div>
                        <label>Website Banner</label>
                        <input type="file" name="banner">
                    </div>
                    <div>
                        <?php
                          if($index_row) {
                         
                              echo '<input type="submit" name="update" value="Update">'; 
                          }
                          else{
                              echo '<input type="submit" name="save" value="Save">';
                          }
                        ?>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div> 