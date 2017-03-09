<div class="row">
  <div class="col-lg-12">
    <div id="show_attach_table"  style="text-align: right;">

    </div>
    <form class="form-horizontal"  id="item_detail_form" method="post" action="">
      <div class="col-lg-4">

        <div class="form-group">
          <div class="col-lg-5">
            <label for="po_number_txt" class="control-label">PO/WO Number</label>
          </div>
          <div class="col-lg-7">
            <input type="text" class="form-control" id="po_number_txt" value="<?php if (isset($a_item_details->PO_NUMBER)) echo $a_item_details->PO_NUMBER; ?>">
            <input type="hidden" name="PO_NUMBER" id="po_number_hdn" value="<?php if (isset($a_item_details->PO_NUMBER)) echo $a_item_details->PO_NUMBER; ?>">
          </div>
        </div>

        <div class="form-group">
          <div class="col-lg-5">
            <!--<label for="PO_NUMBER" class="control-label">PO Number</label>-->
          </div>
          <div class="col-lg-7">
            <!--<label for="link_po_number_txt" class="form-control" id="link_po_number_txt"></label>-->
            <a href="#" target="_blank" id="link_po_number_txt" class=""></a>
          </div>
        </div>

        <div class="form-group">
          <div class="col-lg-5">
            <label for="item_name" class="control-label">Item Name</label>
          </div>
          <div class="col-lg-7" id="items_dropdown">
            <?php
            $selected = NULL;
            if (isset($a_item_details->PRODUCT_ID)):
              $selected = $a_item_details->PRODUCT_ID;
            endif;
            echo ap_drop_down(219, '', array('SELECTED_VALUE' => $selected));
            ?>  
          </div>
        </div>
        <div class="form-group">
          <div class="col-lg-5">
            <label for="details" class="control-label">Item Details</label>
          </div>
          <div class="col-lg-7">
            <textarea class="form-control" name="DETAILS"><?php if (isset($a_item_details->DETAILS)) echo $a_item_details->DETAILS; ?></textarea>
          </div>
        </div>

        <div class="form-group">
          <div class="col-lg-5">
            <label for="memo_number" class="control-label">Memo Number</label>
          </div>
          <div class="col-lg-7">
            <input type="text" class="form-control" name="MEMO_NUMBER" id="memo_number" value="<?php if (isset($a_item_details->MEMO_NUMBER)) echo $a_item_details->MEMO_NUMBER; ?>">
          </div>
        </div>

        <div class="form-group">
          <div class="col-lg-5">

          </div>
          <div class="col-lg-7" id="memo_number_links">

          </div>
        </div>

        <div class="form-group">
          <div class="col-lg-5">
            <label for="memo_type" class="control-label">Memo Type</label>
          </div>
          <div class="col-lg-7">
            <?php
            $selected = NULL;
            if (isset($a_item_details->MEMO_TYPE)):
              $selected = $a_item_details->MEMO_TYPE;
            endif;
            echo ap_drop_down(600, '', array('SELECTED_VALUE' => $selected));
            ?> 
          </div>
        </div>

        <div class="form-group">
          <div class="col-lg-5">
            <label for="memo_date" class="control-label">Memo Date</label>
          </div>
          <div class="col-lg-7">
            <input type="text" name="MEMO_DATE" class="form-control oracle_date" id="memo_date" value="<?php if (isset($a_item_details->MEMO_DATE)) echo $a_item_details->MEMO_DATE; ?>" placeholder= "Click to Select Date">
          </div>
        </div>

        <div class="form-group">
          <div class="col-lg-5">
            <label for="quantity" class="control-label">Quantity</label>
          </div>
          <div class="col-lg-7">
            <input type="number" name="QUANTITY" id="quantity" class="form-control price_cal cal_pr" value="<?php if (isset($a_item_details->QUANTITY)) echo $a_item_details->QUANTITY; ?>">
          </div>
        </div>        

        <div class="form-group">
          <div class="col-lg-5">
            <label for="unit_price" class="control-label">Unit Price</label>
          </div>
          <div class="col-lg-7">
            <input id="unit_price" type="number" class="form-control price_cal cal_pr" name="UNIT_PRICE"  value="<?php
            if (isset($a_item_details->UNIT_PRICE))
            {
              echo $a_item_details->UNIT_PRICE;
            }
            ?>">
          </div>
        </div>

        <div class="form-group">
          <div class="col-lg-5">
            <label for="commission" class="control-label">Commission</label>
          </div>
          <div class="col-lg-7">
            <div class="row">
              <div class="col-lg-8">
                <input type="number" name="COMMISSION_AMOUNT" id="commission" class="form-control" value="<?php if (isset($a_item_details->COMMISSION_AMOUNT)) echo $a_item_details->COMMISSION_AMOUNT; ?>">
              </div>
              <div class="col-lg-3 percentage">
                <input type="number" name="COMMISSION_PERCENTAGE" id="commission_percent" class="form-control" value="<?php if (isset($a_item_details->COMMISSION_PERCENTAGE)) echo $a_item_details->COMMISSION_PERCENTAGE; ?>">
              </div>
              <span>%</span>
            </div>                                                    
          </div>
        </div>

        <div class="form-group">
          <div class="col-lg-5">
            <label for="vat_tax_method">Vat/Tax Method</label>
          </div>
          <div class="col-lg-7">
            <?php
            $selected = 4;
            if (isset($bill_info->METHOD_ID)):
              $selected = $bill_info->METHOD_ID;
            endif;
            if (isset($a_item_details->VAT_TAX_METHOD_ID)):
              $selected = $a_item_details->VAT_TAX_METHOD_ID;
            endif;
            echo ap_drop_down(216, '', array('SELECTED_VALUE' => $selected));
            //echo product($selected, array('id' => 'item_id'));
            ?>  
          </div>
        </div>

        <div class="form-group">
          <div class="col-lg-5">
            <label for="tax_amount" class="control-label">TAX Amount</label>
          </div>
          <div class="col-lg-7">
            <div class="row">
              <div class="col-lg-8">
                <input type="number" name="TAX_AMOUNT" id="tax_amount" class="form-control" value="<?php if (isset($a_item_details->TAX_AMOUNT)) echo $a_item_details->TAX_AMOUNT; ?>">
              </div>
              <div class="col-lg-3 percentage">
                <input type="number" name="TAX_PERCENTAGE" id="tax_percentage" class="form-control" value="<?php if (isset($a_item_details->TAX_PERCENTAGE)) echo $a_item_details->TAX_PERCENTAGE; ?>">
              </div>
              <span>%</span>
            </div>            
          </div>
        </div>

        <div class="form-group">
          <div class="col-lg-5">
            <label for="vat_amount" class="control-label">VAT Amount</label>
          </div>
          <div class="col-lg-7">
            <div class="row">
              <div class="col-lg-8">
                <input type="number" name="VAT_AMOUNT" id="vat_amount" class="form-control" value="<?php if (isset($a_item_details->VAT_AMOUNT)) echo $a_item_details->VAT_AMOUNT; ?>">
              </div>
              <div class="col-lg-3 percentage">
                <input type="number" name="VAT_PERCENTAGE" id="vat_percentage" class="form-control" value="<?php if (isset($a_item_details->VAT_PERCENTAGE)) echo $a_item_details->VAT_PERCENTAGE; ?>">
              </div>
              <span>%</span>
            </div>            
          </div>
        </div>
        
        <?php
        $display_none = 'display: none;';
        if (isset($a_item_details->VAT_PERCENTAGE)):
          if ($a_item_details->VAT_PERCENTAGE == '15'):
            $display_none = '';
          endif;
        endif;
        ?>
        <div id="is_vat_challan_mandatory_group" style="<?php echo $display_none; ?>">
          <div class="form-group">
            <div class="col-lg-6">
              <label for="is_vat_challan_mandatory" class="control-label">VAT Challan is Mandatory</label>
            </div>
            <div class="col-lg-6">
              <?php
              $checked = ' checked';
              if (isset($a_item_details->IS_VAT_CHALLAN_MANDATORY)):
                if ($a_item_details->IS_VAT_CHALLAN_MANDATORY == '0'):
                  $checked = '';
                endif;
              endif;
              ?>
              <input type="checkbox" name="IS_VAT_CHALLAN_MANDATORY" id="is_vat_challan_mandatory" value="<?php echo (isset($a_item_details->IS_VAT_CHALLAN_MANDATORY)) ? $a_item_details->IS_VAT_CHALLAN_MANDATORY : '0'; ?>"<?php echo $checked; ?>>
            </div>
          </div>
        </div>

        <div class="form-group">
          <div class="col-lg-5">
            <label for="total_price" class="control-label">Total</label>
          </div>
          <div class="col-lg-7">
            <input type="number" name="TOTAL_PRICE" id="total_price" class="form-control" value="<?php if (isset($a_item_details->TOTAL_PRICE)) echo $a_item_details->TOTAL_PRICE; ?>">
          </div>
        </div>

        <div id="hide_item_amt" style="display: none;">
          <div class="form-group">
            <div class="col-lg-5">
              <label for="bill__item_words" class="control-label">Bill Amount In Word</label>
            </div>
            <div class="col-lg-7">
              <label for="bill_amount_item_word" class="control-label"></label>
            </div>
          </div>
        </div>
        <div id="bill_amount_comment" style="display: none;">
          <div class="form-group">
            <div class="col-lg-5">
              <label class="control-label">Bill Amount Comments</label>
            </div>
            <div class="col-lg-7">
              <textarea id="bill_amount_comment_textarea" class="form-control" name="BILL_AMOUNT_COMMENT"><?php if (isset($a_item_details->TOTAL)) echo $a_item_details->TOTAL; ?></textarea>
            </div>
          </div>
        </div>
        <!--Attachment start here-->
        <div class="form-group">


        </div>
        <div class="form-group">
          <div class="col-lg-12">
            <!--<br>-->
            <?php
            if ($item_details_id)
            {
              ?>
              <input type="submit" btn_name="update" class="save btn btn-primary btn-sm" value="Update">
              <?php
            }
            else
            {
              ?>
              <button type="submit" btn_name="draft" class="btn btn-primary">Save as Draft</button>
              <button type="submit" btn_name="next" class="btn btn-primary">Next</button>

            <?php } ?>


          </div>
          <div class="col-lg-8">
            <div class="form-group">
              <div class="col-lg-6">
                <!--<label>Attachment</label>-->
              </div>
              <div class="col-lg-6">
                  <!--<input type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal" id="browse_attachment" value="Browse"/>-->
              </div>
            </div>
          </div>
          <div class="col-lg-2">

          </div>

        </div>

        <!--Attachment Ends Here-->
      </div>
      <div class="col-lg-8" >
        <div id="item_list">
          <?php
          if (isset($items_detail)):
            $this->load->view('payment/bill/item_detail_list_table');
          endif;
          ?>
        </div>
        <br>
        <div>
          <?php
//                                                       echo $file_attach; 
          ?>
        </div>

      </div>
      <input type="hidden" id="bill_id" name="BILL_ID" value="<?php echo $bill_id; ?>">
      <input type="hidden" name="BILL_DETAILS_ID" value="<?php if (isset($a_item_details->BILL_DETAILS_ID)) echo $a_item_details->BILL_DETAILS_ID; ?>">
      <!-- hidden field for current tab -->
<!--      <input type="hidden" name="tab" value="item">-->
    </form>
  </div>
</div>

<script>
  jQuery(document).ready(function ($) {
    
    setTotalAmount();
    var vatPercentage = $("#vat_percentage").val();
    toggleIsVatChallanMandatoryGroup(vatPercentage);
    //setIsVatChallanMandatoryValue();
    
    //form submit start
    $('#item_detail_form').submit(function (e) {
      var btn_submit;
      $('input[type=submit]').click(function () {
        btn_submit = $(this).attr('btn_name');
      });
      e.preventDefault();
      var data = $(this).serialize();
      var url = "<?php echo base_url("payment/save_item_detail"); ?>";
      $.post(url, data, function (info) {
        //reset form
        $(':input', '#item_detail_form')
                .not(':button, :submit')
                .val('')
                .removeAttr('checked')
                .removeAttr('selected');
        $("select").select2("val", "");
        $('#item_detail_form').find('input:text, input:password, select, textarea').val('');
        //$('#item_detail_form')[0].reset();
        $('#item_list').html(info);
      });
    });

    //form submit end

    $("select[name='PO_NUMBER']").change(function () {
      var purchaseOrderId = $(this).val();
      //alert(purchaseOrderId);
      var url = '<?php echo base_url("payment/get_products_by_po_id"); ?>';
      var data = {PURCHASE_ORDER_ID: purchaseOrderId};
      $.post(url, data, function (output) {
        $("#items_dropdown").html(output);
        $("select").select2();
      });
    });

    //Auto Fill-Up ItemDetails
    $("select[name='PO_NUMBER']").change(function () {
      var PO_NUMBER = $("option:selected", this).text();
      $.ajax({
        url: '<?php echo base_url(); ?>payment/auto_fill_item_dtls',
        type: 'post',
        data: {PURCHASE_ORDER_NO: PO_NUMBER},
        success: function (data) {

          var p_data = JSON.parse(data);
          console.log(p_data);
//                       alert(p_data.memo_refs);
////                       $('#hh').html(p_data);
          if (p_data.results.length > 0) {
            var PONumber = p_data.results[0]['PURCHASE_ORDER_NO'];
            $('#quantity').val(p_data.results[0]['QTY']);
            $('#unit_price').val(p_data.results[0]['UNIT_PRICE']);
            $('#link_po_number_txt').html(p_data.results[0]['PURCHASE_ORDER_NO']);
            $("#link_po_number_txt").attr('href', '<?php echo base_url("payment/view_po_details"); ?>/' + PONumber);
            $('#purchase_date').val(p_data.results[0]['DELIVERY_DATE']);
            $('#memo_number').val(p_data.memo_refs);
            var memoNumberArr = p_data.memo_refs.split(',');
            var memoNumberLink = '';
            $.each(memoNumberArr, function (i) {
              memoNumberLink += '<a href="#">' + memoNumberArr[i] + '</a> ';
            });
            $("#memo_number_links").html(memoNumberLink);
          } else {
            $('#po_no_not_available').show();
//                           <a href="#" onclick="$('alert').show()"></a>
          }
        }
      });
    });
    
    $("select[name='PRODUCT_ID']").change(function() {
      var productId = $(this).val();
      var url = '<?php echo base_url("payment/get_vat_tax"); ?>';
      var data = {'PRODUCT_ID': productId};
      $.post(url, data, function(output) {
        var data = JSON.parse(output);
        var taxPercentage = data.TAX;
        var vatPercentage = data.VAT;
        $("#tax_percentage").val(taxPercentage);
        $("#vat_percentage").val(vatPercentage);
        setPercentage("#tax_percentage", "#tax_amount");
        setPercentage("#vat_percentage", "#vat_amount");
        setTotalAmount();
        toggleIsVatChallanMandatoryGroup(vatPercentage);
      });
    });
    
    var setTotalAmountFields = "#quantity, #unit_price, #commission, #tax_amount, #vat_amount";
    $(setTotalAmountFields).on('input', function() {
      setTotalAmount();
    });

    $("#commission_percent").on('input', function () {
      setPercentage(this, "#commission");
      setTotalAmount();
    });
    
    var vatTaxMethodId = $("select[name='VAT_TAX_METHOD_ID']").val();
    $("select[name='VAT_TAX_METHOD_ID']").change(function() {
      vatTaxMethodId = $(this).val();
      //$(this).find('option').attr('selected', false);
      //$(this).find('option[value="' + vatTaxMethodId + '"]').attr('selected', true);
      setTotalAmount();
    });
    
    $("#tax_percentage").on('input', function () {
      setPercentage(this, "#tax_amount");
      setTotalAmount();
    });
    
    $("#vat_percentage").on('input', function () {
      setPercentage(this, "#vat_amount");
      setTotalAmount();
      var vatPercentage = $(this).val();
      toggleIsVatChallanMandatoryGroup(vatPercentage);
    });
    
    $("#is_vat_challan_mandatory").change(function() {
      setIsVatChallanMandatoryValue();
    });
    
    function toggleIsVatChallanMandatoryGroup(vatPercentage) {
      if(vatPercentage == '15') {
        $("#is_vat_challan_mandatory_group").show();        
      } else {        
        $("#is_vat_challan_mandatory_group").hide();
      }
      setIsVatChallanMandatoryValue();
    }
    
    function setIsVatChallanMandatoryValue() {
      if($("#is_vat_challan_mandatory_group").css('display') == 'none') {
        $("#is_vat_challan_mandatory").val('0');
      } else {
        if($("#is_vat_challan_mandatory").is(':checked')) {
          $("#is_vat_challan_mandatory").val('1');
        } else {
          $("#is_vat_challan_mandatory").val('0');
        }
      }      
    }
    
    function setPercentage(percentageSelector, setAmountSelector) {
      var percentage = Number($(percentageSelector).val());
      var quantity = Number($('#quantity').val());
      var unitPrice = Number($('#unit_price').val());
      var amount = (quantity * unitPrice);
      var percentageAmount = (amount * 0.01 * percentage);
      $(setAmountSelector).val(percentageAmount);
    }
    
    function setTotalAmount() {
      var quantity = Number($('#quantity').val());
      var unitPrice = Number($('#unit_price').val());
      var commission = Number($("#commission").val());
      var taxAmount = Number($("#tax_amount").val());
      var vatAmount = Number($("#vat_amount").val());
      var vatTaxAmount = (taxAmount + vatAmount);
      var amount = (quantity * unitPrice);
      var totalPrice = (amount + commission);
      //alert(vatTaxMethodId);
      switch(vatTaxMethodId) {
        case '1':
          totalPrice = (totalPrice - vatTaxAmount);
          break;
        case '2':
          totalPrice = (totalPrice + vatTaxAmount);
          break;
      }
      $("#total_price").val(totalPrice);
    }

  });
</script>

<script>
  $(document).ready(function () {
    
    var text2 = $("#po_number_txt").tautocomplete({
      width: "500px",
      columns: ['Purchase Order Number', 'Supplier'],
      ajax: {
        url: "<?php echo base_url("payment/search_purchase_order"); ?>",
        type: "POST",
        data: function () {
          var x = {
            supplier_id: '<?php echo $bill_info->SUPPLIER_ID; ?>',
            po_number: text2.searchdata()
          };
          return x;
        },
        success: function (data) {
          var filterData = [];
          var searchData = eval("/" + text2.searchdata() + "/gi");
          $.each(data, function (i, v) {
            if (v.PURCHASE_ORDER_NO.search(new RegExp(searchData)) != -1) {
              filterData.push(v);
            }
          });
          return filterData;
        }
      },
      oninput: function() {
        var purchaseOrderId = text2.searchdata();
        $("#po_number_hdn").val(purchaseOrderId);
        setItemsDropdown(purchaseOrderId);
      },
      onchange: function () {
        $("#po_number_hdn").val(text2.searchdata());
      }
    });
    
    function setItemsDropdown(purchaseOrderId) {
      var url = '<?php echo base_url("payment/get_products_by_po_id"); ?>';
      var data = {PURCHASE_ORDER_ID: purchaseOrderId};
      $.post(url, data, function (output) {
        $("#items_dropdown").html(output);
        $("select").select2();
      });
    }
    
  });
</script>
