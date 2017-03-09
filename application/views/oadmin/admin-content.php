 <!-- page content -->
        <div class="right_col" role="main">
          <!--four-grids here-->  
          <?php
          if(!empty($my_sites))
          {
              //print_r($my_sites);exit;
              
              echo '<div class="four-grids">';
              foreach ($my_sites as $thesite)
              {
                  ?>
            <div class="col-md-3 four-grid">
              <a href="<?php echo base_url(); ?>index.php/Site_Admin/edit_site?site_id=<?php echo $thesite['id']; ?>">
                  <div class="siteBox" style="margin-bottom:40px;">
                        <div class="icon">
                            
                                <i class="fa <?php 
                                   if($thesite['category_id'] == 2){echo "fa-graduation-cap fa-5x";}
                                   else if($thesite['category_id'] == 33){echo "fa-hospital-o fa-5x";}
                                   else if($thesite['category_id'] == 22){echo "fa-shopping-cart fa-5x";}
                                   else if($thesite['category_id'] == 36){echo "fa-bus fa-5x";}
                                
                                ?>" aria-hidden="true"></i>
                        </div>
                        <div class="four-text">
                                <h3><?php echo $thesite['domain'].$thesite['domain_type_slug']; ?></h3>
                                <h4> <?php echo $thesite['slugan']; ?>  </h4>

                        </div>

                </div>
              </a>     
	    </div>  
            <?php
              }
              echo '</div>';
          }
         
          ?>  
          <div class="col-md-3 four-grid">
           <a href="<?php echo base_url(); ?>index.php/OAdmin_Panel/create_site">
            <div class="four-w3ls">
                    <div class="icon">
                            <i class="fa fa-plus-circle fa-5x" aria-hidden="true"></i>
                    </div>
                    <div class="four-text">
                            <h3>Create A New Project</h3>
                            <h4>Its free and always be...</h4>

                    </div>

            </div>
           </a>     
	</div>
          
          <!-- /top tiles -->

        </div>
        <!-- /page content -->
<!--//four-grids here-->
<script>
    $(document).ready(function(){
        $('.siteBox:eq(0)').addClass('four-agileits'); 
        $('.siteBox:eq(1)').addClass('four-agileinfo');
        $('.siteBox:eq(2)').addClass('four-w3ls');
        $('.siteBox:eq(3)').addClass('four-wthree');
        $('.siteBox:eq(4)').addClass('four-agileits');
        $('.siteBox:eq(5)').addClass('four-agileinfo');
        $('.siteBox:eq(6)').addClass('four-w3ls');
    });
   
</script>    