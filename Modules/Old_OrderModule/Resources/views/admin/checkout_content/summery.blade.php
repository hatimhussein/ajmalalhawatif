<div class="col-md-4 fl-r">
  <div class="opc-col-right">
    <div class="discount-block">
      <h3 data-toggle="collapse" class="pd0" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">{{__('ordermodule::checkout.discount_code')}}<span class="icon-plus plus"></span></h3>
      <div class="collapse-block collapse " id="collapseExample">
          <div class="discount">
            <div class="discount-form">
              <label class="coupon-div" for="coupon_code">{{__('ordermodule::checkout.enter_code')}}</label>
              <div class="input-box">
                <input class="input-text" id="coupon_code" type="text" name="coupon_code" value=""
                  autocomplete="off">
              </div>
              <div class="buttons-set mg0">
                <button type="button" id="check_voucher" title="Apply" class="button send apply-coupon"
                  value="Apply"><span><span>{{__('ordermodule::checkout.apply')}}</span></span></button>
              </div>
            </div>
          </div>
      </div>
    </div>

    <div class="right review-menu-block">

      <span class="polygon"></span>
      <div class="" id="opc-review-block">
        <div id="checkout-review-table-wrapper">
          <h3 class="review-title">{{__('ordermodule::checkout.review_order')}}</h3>
          <table class="opc-data-table" id="checkout-review-table">
            <colgroup>
              <col>
              <col width="1">
              <col width="1">
              <col width="1">
            </colgroup>

            <tbody>

              <?php

                 $total = 0;
              if(isset($_COOKIE["shopping_cart"]))
              {
                 $cookie_data = stripslashes($_COOKIE['shopping_cart']);
                 $cart_data = json_decode($cookie_data, true);
                 if(count($cart_data) > 0){
                 foreach($cart_data as $keys => $values)
                 {
                   // print_r($values);
                   // die();
                ?>
                <tr class="first last odd">
                  <td><img
                      src="{{asset('images/product/'.$values['item_photo'])}}"
                      alt="{{$values['item_name']}}"
                      class="checkout-cart-image">
                    <h3 class="product-name">{{$values['item_name']}}
                    </h3>
                  </td>

                  <td class="a-center">{{$values['quantity']}}</td>
                  <!-- sub total starts here -->
                  <td class="last">
                    <span class="cart-price">

                      <span class="price">{!! ProductHelper::calPriceCurrency($values['quantity'] * $values['item_price']) !!} {!! LanguageHelper::nameTranslate(Session::get('currency')) !!}</span>
                    </span>


                  </td>
                </tr>

                <?php
                  $total = $total + ($values["quantity"] * $values["item_price"]);
                 }
                ?>
                <?php

              } }?>







            </tbody>
            <thead>
              <tr class="first last">
                <th rowspan="1">Product Name</th>

                <th rowspan="1" class="a-center">Qty</th>
                <th colspan="1" class="a-center">Subtotal</th>
              </tr>
            </thead>
            <tfoot>

              <tr class="first">
                <td style="" class="a-right" colspan="2">
                  {{__('ordermodule::checkout.subtotal')}} </td>
                <td style="" class="a-right last">
                  <span id="sub_total" class="price">{{$sub_total}} </span>{!! LanguageHelper::nameTranslate(Session::get('currency')) !!}
                  <input type="hidden" name="sub_total" value="{{$sub_total}}">
                  </td>
              </tr>

              <tr class="first discount_value hidden">
                <td style="" class="a-right" colspan="2">
                  قيمة الخصم </td>
                <td style="" class="a-right last">
                  <span id="discount_amount" class="price"></span>
                  {!! LanguageHelper::nameTranslate(Session::get('currency')) !!}
                  </td>
              </tr>
              <tr class="first discount_value hidden">
                <td style="" class="a-right" colspan="2">
                  الاجمالى بعد الخصم </td>
                <td style="" class="a-right last">
                  <span id="total_after_discount" class="price"></span>
                  {!! LanguageHelper::nameTranslate(Session::get('currency')) !!}
                  </td>
              </tr>


              <tr>
                <td style="" class="a-right" colspan="2">
                  {{__('ordermodule::checkout.shipping_cost')}}</td>
                <td style="" class="a-right last">
                  <span id="shipping_cost" class="price">0 </span> {!! LanguageHelper::nameTranslate(Session::get('currency')) !!} </td>
              </tr>

            </tfoot>


          </table>
        </div>
      </div>
    </div>


    <div class="opc-review-actions" id="checkout-review-submit">
      <h5 class="grand_total">{{__('ordermodule::checkout.total')}}<span>{!! LanguageHelper::nameTranslate(Session::get('currency')) !!}</span><span id="total" class="price">{{$sub_total}}</span>

      </h5>



      <button class="button btn-proceed-checkout" title="Proceed to Checkout" type="submit"><span>{{__('ordermodule::checkout.place_order')}}</span></button>
    </div>
  </div>
</div>
