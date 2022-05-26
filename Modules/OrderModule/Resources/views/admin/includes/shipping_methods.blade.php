<div class="col-xl-12 col-lg-6 col-md-6 col-sm-12 " id="methods-section">
    <div class="profile-info-section hgt mb-4">
        <div class="card" style="">
            <div class="card-header">
                <h4 class="mb-0 text-center"><i
                        class="flaticon-money"></i> {{__('ordermodule::checkout.shipping_method')}}</h4>
            </div>
            <div class="card-body">

                <p class="mb-2"><span
                        class="usr-work-position"> {{__('ordermodule::checkout.delivery_period_text')}}</span></p>
                <p class="mb-2"><span
                        class="usr-work-position"> {{__('ordermodule::checkout.delivery_time')}}</span> <select
                        class="disabled-results form-control custom-select"
                        id="delivery_time" name="delivery_time" required="">
                        <option value="" disabled
                                selected="selected">{{__('ordermodule::checkout.delivery_time_choose')}}</option>
                        @foreach($delivery_time as $time)
                            <option
                                value="{{$time->id}}">{!! LanguageHelper::deliverytimeName($time) !!}</option>
                        @endforeach
                    </select></p>
                <p class="mb-2"><span
                        class="usr-work-position"> {{__('ordermodule::checkout.comment')}}</span>
                    <textarea class="comment" name="comment"
                              title="Delivery Comments" rows="5" class="textarea"></textarea></p>
                @php($giftConfig = $site_data->where('key', 'gift_price')->first())
                @if (($is_merchant && $giftConfig->properties['merchant_active']) || (!$is_merchant && $giftConfig->properties['user_active']))
                    <p class="mb-2">
                        <input type="checkbox" name="send_gift" id="send_gift"
                               data-gift_price="{{ $giftConfig->value_ar * Session::get('currency')->value }}">
                        <label for="send_gift"
                               class="usr-work-position"> {{__('ordermodule::checkout.send_as_gift')}}</label>
                    </p>
                @endif
                <span class="usr-work-position">{{__('ordermodule::checkout.payment_method')}}</span>
                <div class="payment-div mt-5">

                    {{--                        <label for="">--}}
                    {{--                            <input type="radio" name="payment_type" id="">--}}
                    {{--                            <img src="https://upload.wikimedia.org/wikipedia/commons/5/5e/Visa_Inc._logo.svg" alt="">--}}
                    {{--                        </label>--}}
                    @foreach($paymentMethods as $key => $method)
                        <label for="p_method_{{$key}}" class="ml-5">
                            <input id="p_method_{{$key}}" value="{{$key}}"
                                   type="radio" name="payment_type" title="{{__('ordermodule::payment.'.$key)}}"
                                   {{ $key == 'cash_on_delivery' ? 'checked' : '' }}
                                   class="radio d-inline-block" autocomplete="off">
                            <span>{{__('ordermodule::payment.'.$key)}}</span>
                        </label>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

</div>
