<div class="col-md-4 fl-r">
  <div class="opc-col-center">
    <div class="shipping-block">
      <h3>{{__('ordermodule::checkout.shipping_method')}}</h3>
      <div id="shipping-block-methods">
          <div id="checkout-shipping-method-load">

            <ul class="form-list">
              <li class="fields">
                <div class="delivery_info">{{__('ordermodule::checkout.delivery_period_text')}}</div>
                <div class="input-box">
                  <div>
                    <h4 class="icon-head head-edit-form fieldset-legend"></h4>
                    <fieldset id="amdeliverydate">
                      <span class="field-row dis-block">
                        <label for="delivery_time">{{__('ordermodule::checkout.delivery_time')}}<em>*</em></label>
                        <div style="clear: both;"></div>
                        <select id="delivery_time" name="deliverydata[delivery_time]"
                          title="Delivery Time Interval" class=" required-entry select" required="">
                          <option value="" disabled selected="selected">{{__('ordermodule::checkout.delivery_time_choose')}}</option>
                          <option value="{{__('ordermodule::checkout.delivery_time_from1')}}">{{__('ordermodule::checkout.delivery_time_from1')}}</option>
                          <option value="{{__('ordermodule::checkout.delivery_time_from1')}}">{{__('ordermodule::checkout.delivery_time_from1')}}</option>
                        </select>
                        <div type="anchor" id="anchor_delivery_time"></div>
                        <p class="note" id="note_delivery_time"></p>
                      </span>
                      <span class="field-row">
                        <label for="comment">{{__('ordermodule::checkout.comment')}}</label>
                        <textarea class="comment" name="comment"
                          title="Delivery Comments" rows="5" class=" textarea"></textarea>
                        <div type="anchor" id="anchor_comment"></div>
                      </span>
                    </fieldset>
                  </div>
                </div>
              </li>
            </ul>
      </div>
    </div>

    <div class="payment-block ">
      <h3>{{__('ordermodule::checkout.payment_method')}}</h3>

        <fieldset id="checkout-payment-method-load">
          <dt style="display: flex;" id="dt_method_cashondelivery" class="active">
            <input id="p_method_cashondelivery" value="{{__('ordermodule::checkout.cash')}}" type="radio"
              name="payment_type" title="Cash On Delivery" checked="checked" class="radio"
              autocomplete="off">
            <label for="p_method_cashondelivery">{{__('ordermodule::checkout.cash')}} </label>
          </dt>
          <dt style="display: flex;"  id="dt_method_vpcpaymentgateway">
            <input id="p_method_vpcpaymentgateway" value="{{__('ordermodule::checkout.credit')}} " type="radio"
              name="payment_type" title="Credit Card" class="radio" autocomplete="off">
            <label for="p_method_vpcpaymentgateway">{{__('ordermodule::checkout.credit')}} </label>
          </dt>

        </fieldset>

    </div>

  </div>
</div>
