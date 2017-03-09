<?php //print_r($categories);exit; 
 //print_r($this->session->userdata);exit;
?>
<div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_content">
                      <form action="<?php echo base_url();?>/index.php/OAdmin_Panel/create_site" method="post" class="form-horizontal form-label-left" novalidate>
                      
                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Domain Type</label><span class="required">*</span>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <select name="domain_type" id="domain_type" class="form-control">
                                
                                <?php
                                  foreach ($domain_types as $adomain_type)
                                  { ?>
                                <option value="<?php echo $adomain_type['id']; ?>"><?php echo $adomain_type['slug']; ?></option>
                                 <?php }
                                ?>
                            </select>
                        </div>
                    </div>
                    
                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name" >Domain <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="domain" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="domain" placeholder="amarblog" type="text">
                          <span id="domain_msg"></span>
                        </div>
                      </div>
                    
                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Website Category</label><span class="required">*</span>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <select name="category_id" id="category_id" class="form-control">
                                <?php foreach ($categories as $acategory){
                                   ?>
                                <option value="<?php echo $acategory['id']; ?>"><?php echo $acategory['slug']; ?></option>
                                    <?php
                                } ?>
                                
                            </select>
                        </div>
                    </div>
                    
                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Subcategory</label><span class="required">*</span>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <select name="subcategory_id" id="subcategory_id" class="form-control">
                              
                                <!--<option value="1">University</option>
                                <option value="2">College</option>
                                <option value="3">School</option>-->
                            </select>
                        </div>
                    </div>
                    
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="slugan">Slugan <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" id="slugan" name="slugan" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Website Caption <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="email2" name="website_caption"  required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div>
                          <input type="hidden" name="owner_id" value="<?php echo $this->session->userdata['id'];?>">
                      </div>    
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-md-offset-3">
                          <button type="submit" class="btn btn-primary">Cancel</button>
                          <button id="send" type="submit" class="btn btn-success">Submit</button>
                        </div>
                      </div>
                    </form>
                   </div>
                </div>
              </div>
            </div>
<script>
$(document).ready(function(){ 

});
   var fun =function(){
   var domain_type = $('#domain_type option:selected').val();
   //alert(domain_type);
   var domain = $('#domain').val();
     $.ajax({
  method: "POST",
  url: "<?php echo base_url();?>/index.php/OAdmin_Panel/is_domain_exists",
  data: { domain: domain ,domain_type : domain_type}
})
  .done(function( msg ) {
    if(msg>0){$('#domain_msg').html("This domain is already exists").css("color","red");}
    else{$('#domain_msg').html("this domain is available").css("color","green");}
        
  });
     
   };
$('#domain').keyup(fun);
$('#domain_type').on('change',fun);

$('#category_id').on('change',function(){
var category_id = ($(this).val());
$.ajax(
        {
          method : "POST",
          url : "<?php echo base_url();?>/index.php/OAdmin_Panel/get_subcategories",
          data : {category_id : category_id}
        })
                .done(function(data)
                
                {
                    $('#subcategory_id').empty();
                    $('#subcategory_id').append(data);
                    //alert(data);
                    //$('#subcategory_option').html(data);
                });
});
</script>