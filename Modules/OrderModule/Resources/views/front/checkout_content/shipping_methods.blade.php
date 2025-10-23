<div class="col-md-4 fl-r">
    <div class="opc-col-center">
        <div class="shipping-block">
            <h3>{{__('ordermodule::checkout.shipping_method')}}</h3>
            <div id="shipping-block-methods">
                <div id="checkout-shipping-method-load">
                    <ul class="form-list">
                        <li class="fields">
                            {{--                            <div class="shipping-div">--}}
                            {{--                                <label for="">--}}
                            {{--                                    <input type="radio" name="" id="">--}}
                            {{--                                    <img--}}
                            {{--                                        src="https://upload.wikimedia.org/wikipedia/commons/thumb/3/3f/NBC_logo.svg/1200px-NBC_logo.svg.png"--}}
                            {{--                                        alt="">--}}
                            {{--                                </label>--}}
                            {{--                                <label for="">--}}
                            {{--                                    <input type="radio" name="" id="">--}}
                            {{--                                    <img--}}
                            {{--                                        src="https://upload.wikimedia.org/wikipedia/commons/thumb/3/3f/NBC_logo.svg/1200px-NBC_logo.svg.png"--}}
                            {{--                                        alt="">--}}
                            {{--                                </label>--}}
                            {{--                                <label for="">--}}
                            {{--                                    <input type="radio" name="" id="">--}}
                            {{--                                    <img--}}
                            {{--                                        src="https://upload.wikimedia.org/wikipedia/commons/thumb/3/3f/NBC_logo.svg/1200px-NBC_logo.svg.png"--}}
                            {{--                                        alt="">--}}
                            {{--                                </label>--}}
                            {{--                            </div>--}}
                            <div class="delivery_info">{{__('ordermodule::checkout.delivery_period_text')}}</div>
                            <div class="input-box">
                                <div>
                                    <h4 class="icon-head head-edit-form fieldset-legend"></h4>
                                    <fieldset id="amdeliverydate">
                                        @if ($delivery_time->count())
                                            <span class="field-row dis-block">
                                                <label for="delivery_time">{{__('ordermodule::checkout.delivery_time')}}<em>*</em></label>
                                                <div style="clear: both;"></div>
                                                <select id="delivery_time" name="delivery_time"
                                                        title="Delivery Time Interval" class=" required-entry select"
                                                        required="">
                                                    <option value="" disabled
                                                            selected="selected">{{__('ordermodule::checkout.delivery_time_choose')}}</option>
                                                     @foreach($delivery_time as $time)
                                                        <option
                                                            value="{{$time->id}}">{!! LanguageHelper::deliverytimeName($time) !!}</option>
                                                    @endforeach

                                                </select>
                                                <div type="anchor" id="anchor_delivery_time"></div>
                                                <p class="note" id="note_delivery_time"></p>
                                            </span>
                                        @endif
                                        <span class="field-row">
                                            <label for="comment">{{__('ordermodule::checkout.comment')}}</label>
                                            <textarea class="comment" name="comment"
                                                      title="Delivery Comments" rows="3" class="textarea"></textarea>
{{--                                            <div type="anchor" id="anchor_comment"></div>--}}
                                        </span>
                                        @php($giftConfig = $site_data->where('key', 'gift_price')->first())
                                        @if(auth()->user()->is_merchant && $giftConfig->properties['merchant_active'] || (!auth()->user()->is_merchant && $giftConfig->properties['user_active']))
                                            <span class="field-row">
                                                <input type="checkbox" name="send_gift" id="send_gift"
                                                       data-gift_price="{{ $giftConfig->value_ar * Session::get('currency')->value }}">
                                                       <label
                                                           for="send_gift">{{__('ordermodule::checkout.send_as_gift')}}</label>
                                                <div type="anchor" id="anchor_comment"
                                                     style="display: none;color: #121212;">
                                                    {{__('commonmodule::front.send_as_gift_msg')}}
                                                </div>
                                            </span>
                                        @endif
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
                    <div class="payment-div">
                        {{--                        <label for="">--}}
                        {{--                            <input type="radio" name="payment_type" id="">--}}
                        {{--                            <img src="https://upload.wikimedia.org/wikipedia/commons/5/5e/Visa_Inc._logo.svg" alt="">--}}
                        {{--                        </label>--}}
                        @foreach($paymentMethods as $key => $method)
                            <label for="p_method_{{$key}}">
                                <input id="p_method_{{$key}}" value="{{$key}}"
                                       type="radio" name="payment_type" title="{{__('ordermodule::payment.front_'.$key)}}"
                                       {{ $key == 'cash_on_delivery' ? 'checked' : '' }}
                                       class="radio" autocomplete="off">
                                <span>{!! __('ordermodule::payment.front_'.$key) !!}</span>
                            </label>
                        @endforeach
                    </div>
                </fieldset>

            </div>

        </div>
    </div>
</div>
