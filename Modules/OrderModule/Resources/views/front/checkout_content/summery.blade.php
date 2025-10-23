<div class="col-md-4 fl-r">
    <div class="opc-col-right">
        {{-- <div class="discount-block">
            <h3 data-toggle="collapse" class="pd0" href="#collapseExample" role="button" aria-expanded="false"
                aria-controls="collapseExample">{{__('ordermodule::checkout.discount_code')}}<span
                    class="icon-plus plus"></span></h3>
            <div class="collapse-block collapse " id="collapseExample">
                <div class="discount">
                    <div class="discount-form">
                        <label class="coupon-div" for="coupon_code">{{__('ordermodule::checkout.enter_code')}}</label>
                        <div class="input-box">
                            <input class="input-text" id="coupon_code" type="text" name="coupon_code" value=""
                                   autocomplete="off">
                                   <button type="button" id="check_voucher" title="Apply" class="button send apply-coupon"
                                   value="Apply"><span><span>{{__('ordermodule::checkout.apply')}}</span></span>
                           </button>
                        </div>
                        <div class="buttons-set mg0">

                        </div>
                    </div>
                </div>
            </div>
        </div> --}}

        <div class="review-menu-block">
            <div class="input-box">
                <input class="input-text" placeholder="{{__('ordermodule::checkout.enter_code')}}" id="coupon_code"
                       type="text" name="coupon_code" value=""
                       autocomplete="off">
                <button type="button" id="check_voucher" title="Apply" class="button send apply-coupon"
                        value="Apply">{{__('ordermodule::checkout.apply')}}
                </button>
            </div>
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

                        @php($total = 0)

                        @foreach($cart_data as $keys => $values)
                            <tr class="first last odd">
                                <td><img src="{{asset('images/product/'.$values['item_photo'])}}"
                                         alt="{{$values['item_name']}}"
                                         class="checkout-cart-image">
                                    <h3 class="product-name">{{$values['item_name']}}
                                    </h3>
                                </td>

                                <td class="a-center">{{$values['quantity']}}</td>
                                <!-- sub total starts here -->
                                <td class="last">
                                    {{--                                    <input type="hidden" name="curr_input" id="curr_input"--}}
                                    {{--                                           value=" {!! LanguageHelper::nameTranslate(Session::get('currency')) !!}">--}}
                                    <input type="hidden" id="x{{$loop->index}}" value="{{$values['tax_free_price']}}">
                                    <input type="hidden" id="y{{$loop->index}}" value="{{$values['quantity']}}">
                                    <span class="cart-price" id="old_price">
                                        <span class="pd-price" id="i{{$loop->index}}">
                                              {!! ProductHelper::calPriceCurrency($values['quantity'] * $values['tax_free_price']) !!}
                                            {!! LanguageHelper::nameTranslate(Session::get('currency')) !!}
                                        </span>
                                    </span>
                                </td>
                            </tr>

                            @php($total = $total + ($values["quantity"] * $values["tax_free_price"]))
                        @endforeach


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
                                <span id="sub_total_txt"
                                      class="price">{{$sub_total}} </span>{!! LanguageHelper::nameTranslate(Session::get('currency')) !!}
                                <input type="hidden" id="sub_total" name="sub_total" value="{{$sub_total}}">
                            </td>
                        </tr>

                        <tr class="first discount_value hidden">
                            <td style="" class="a-right" colspan="2">
                                {{__('ordermodule::checkout.discount_price')}} </td>
                            <td style="" class="a-right last">
                                <span id="discount_amount" class="price"></span>
                                {!! LanguageHelper::nameTranslate(Session::get('currency')) !!}
                            </td>
                        </tr>

                        <tr class="first discount_value hidden">
                            <td style="" class="a-right" colspan="2">
                                {{__('ordermodule::checkout.total_after_discount')}} </td>
                            <td style="" class="a-right last">
                                <span id="total_after_discount" class="price"></span>
                                {!! LanguageHelper::nameTranslate(Session::get('currency')) !!}
                            </td>
                        </tr>

                        <tr>
                            <td style="" class="a-right" colspan="2">
                                {{__('ordermodule::checkout.shipping_cost')}}</td>
                            <td style="" class="a-right last">
                                <span id="shipping_cost"
                                      class="price">0 </span> {!! LanguageHelper::nameTranslate(Session::get('currency')) !!}
                                <input type="hidden" id="shipping_cost_inp" value="0">
                            </td>
                        </tr>
                        <tr>
                            <td style="" class="a-right" colspan="2">
                                {{__('ordermodule::checkout.order_tax')}}
                                <span>( {{ $tax_shipping ? __('ordermodule::checkout.ordership_tax') : __('ordermodule::checkout.noordershp_tax')}} )</span>
                            </td>
                            <td style="" class="a-right last">
                                <span id="tax_span"
                                      class="price">{{$tax_value}} %</span>
                                <input type="hidden" id="tax_value" name="tax_value"
                                       value="{{$tax_value}}">
                            </td>
                        </tr>

                        <tr class="first gift_cost hidden">
                            <td style="" class="a-right" colspan="2">
                                {{__('ordermodule::checkout.gift_cost')}}</td>
                            <td style="" class="a-right last">
                                <span id="gift_cost"
                                      class="price">{{ $site_data->where('key', 'gift_price')->first()->value_ar * Session::get('currency')->value }} </span> {!! LanguageHelper::nameTranslate(Session::get('currency')) !!}
                                <input type="hidden" id="gift_cost_inp" value="0">
                            </td>
                        </tr>

                        </tfoot>
                    </table>
                </div>
            </div>
            <div class="opc-review-actions" id="checkout-review-submit">
                <h5 class="grand_total">{{__('ordermodule::checkout.total')}}
                    <p>
                        <span id="total" class="price">{{$tax_sub_total}}</span>
                        <span>{!! LanguageHelper::nameTranslate(Session::get('currency')) !!}</span>

                    </p>
                    <input type="hidden" id="total_inp" value="{{$tax_sub_total}}">
                </h5>

                <button class="button btn-proceed-checkout" title="Proceed to Checkout" type="submit">
                    {{__('ordermodule::checkout.place_order')}}</button>
                <h5 id="wait" class="hidden"><strong>{{__('ordermodule::checkout.wait')}}</strong></h5>
            </div>
        </div>
    </div>
</div>
