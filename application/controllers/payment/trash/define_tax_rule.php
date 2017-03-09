
<div class="container-fluid">
        <div class=" panel panel-heading"><b style="font-size:20px !important">Tax Rule Setting</b></div>
    <div class="panel-body">
        <!--<div class="panel panel-default remove_top_border">-->
        <div class="row">
            <div class="col-lg-12">
                <form class="form-horizontal" id="tax_rule_form" method="post" action="">
                    <div class="tax_rule" id="tax_rule">
                        <div class="col-lg-5">
                            <div class="form-group">
                                <!--<div class="row">-->
                                    <div class="col-lg-3">
                                        <label for='tax_rule_title'>Tax Rule Title </label>
                                    </div>
                                   <div class="col-lg-5">
                                            <input type="text" class="form-control" name="name" id="tax_rule_title" placeholder="" value="<?php if(isset($tax_rule_info->TAX_RULE_TITLE)){ echo $tax_rule_info->TAX_RULE_TITLE;}?>" />
                                   </div>
                                <!--</div>-->
                                <div class="row"
                                <br>
    <!--                            <div class="row">
                                    <div class="col-lg-9">
                                        <?php // echo file_upload_add(true); ?>
                                    <input type="button" id="save_tax_rule_info" class="btn btn-primary  save_tax_rule_info" style="float:right" value="Save" />
                                    </div>
                                </div>-->
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-lg-3">
                                    <label for="description">Description</label>
                                </div>
                                <div class="col-lg-5">
                                    <textarea class="form-control" id="description" name="DESCRIPTION"><?php if(isset($tax_rule_info->DESCRIPTION)){ echo $tax_rule_info->DESCRIPTION;}?></textarea>
                                </div>
                            </div>
                            <br>
                            <div class="form-group">
                                <div class="col-lg-6">
                                    <label>Section Of Income Ordinance</label>
                                </div>
                                <div class="col-lg-2">
                                    <input type="text" id="sec_of_inc_ord" class="form-control" value="<?php if(isset($tax_rule_info->SECTIONOFINCOMETAXORDINANCE)){ echo $tax_rule_info->SECTIONOFINCOMETAXORDINANCE; }?>" />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="slab_details" id="slab_details">
                        <table class="table table-bordered" id="slab_tbl">
                            <thead>
                                <th>Amount</th>
                                <th>Range Type</th>
                                <th>Rate</th>
                                <!--<th></th>-->
                            </thead>
                            <tbody>
                                <tr>
                                    <td><input type="text" id="amount" class="form-control" value="<?php if (isset($tax_rule_info->AMOUNT)) { echo $tax_rule_info->AMOUNT;}?>"/></td>
                                    <td></td>
                                    <td><input type="text" id="rate" class="form-control" value="<?php if (isset($tax_rule_info->RATE)) { echo $tax_rule_info->RATE;}?>"/></td>
                                    <!--<td></td>-->
                                    <!--<td></td>-->
                                </tr>
                                
                            </tbody>
                        </table>
                    </div>
                </form>
        </div>
        <!--</div>-->
    </div>
</div>