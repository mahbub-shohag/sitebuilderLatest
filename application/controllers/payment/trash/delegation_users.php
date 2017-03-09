<h5 style="text-align:center;"> <u>Delegation User Order List</u></h5>  
<div id="message">
    
</div>
<ul id="sortable" class="ui-sortable list-unstyled" data-url="<?php echo base_url().'payment/reorder_user_delegation' ?>" style="text-align: center;">
      
        <?php
                //print_r($sort_menu_list);
                foreach($delegation_list AS $val){
                    echo '<div id="'.$val['DELEGATION_ID'].'" class="alert alert-info padded" role="alert"> <i class="fa fa-arrows-v pull-left" aria-hidden="true"></i> '.$val['NAME'].' <a href = "javascript:void(0)" class="del_user pull-right" ><i class="fa fa-times" aria-hidden="true"></i></a> </div>';
                }
                ?>
            </ul> 

