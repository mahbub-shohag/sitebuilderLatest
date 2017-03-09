<?php
//print_r($get_item);exit;
$items = $get_item; ?>

                                <?php foreach ($items as $aitem){
                                   ?>
                                <option value="<?php echo $aitem['id']; ?>"><?php echo $aitem['slug']; ?></option>
                                    <?php
                                } ?>
                                
