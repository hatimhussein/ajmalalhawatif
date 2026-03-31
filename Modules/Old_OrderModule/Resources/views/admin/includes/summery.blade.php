<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12" id="summery-section">
    <div class="profile-info-section hgt mb-4">
        <div class="card" style="">
            <div class="card-header">
                <h4 class="mb-0 text-center"><i
                        class="flaticon-money"></i> {{__('ordermodule::checkout.discount_code')}}</h4>
            </div>

            <div class="card-body">

                <div class="widget-content widget-content-area">
                    <table class="table table-hover table-bordered" id="checkout-review-table">
                        <thead>
                        <tr>
                            <th>{{__('ordermodule::admin.product_name')}}</th>

                            <th>{{__('ordermodule::admin.quantity')}}</th>
                            <th>{{__('ordermodule::admin.combination')}}</th>
                            <th>{{__('ordermodule::admin.price')}}</th>
                        </tr>
                        </thead>
                        <tbody id="summery-table">
                        @php($total = 0)
                        @foreach($orderProducts as $product)
                            <tr>
                                <td>{{ $product['name'] }}</td>
                                <td>{{ $product['quantity'] }}</td>
                                <td>{{ $product['item_combination_name'] ?? '' }}</td>
                                <td>{{ $product['item_price'] }}</td>
                            </tr>
                            @php($total += $product['quantity'] * $product['item_price'])
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <br> <br>
                <p class="mb-2">
                    <span class="usr-work-position">
                        {{__('ordermodule::checkout.subtotal')}}
                    </span>
                    <span style="float:right">
                        {{ $total }}
                    </span>
                </p>
                <p class="mb-2 discount_value">
                    <span class="usr-work-position">
                        {{__('ordermodule::checkout.discount_price')}}
                    </span>
                    <span style="float:right" id="discount_amount" class="price">
                        {{ $main_order_data['discount'] }}
                    </span>
                </p>
                <p class="mb-2 ">
                    <span class="usr-work-position">
                        {{__('ordermodule::checkout.shipping_cost')}}
                    </span>
                    <span style="float:right"
                          class="price">
                        {{ $main_order_data['shipping'] }}  {{ $main_order_data['order_currency'] }}
                    </span>
                </p>
                <p class="mb-2 gift_cost {{ $main_order_data['send_gift'] ? '' : 'hidden' }}"><span
                        class="usr-work-position">{{__('ordermodule::checkout.gift_cost')}}</span><span
                        id="gift_cost"
                        class="price">{{ $main_order_data['gift_cost'] }} {{ $main_order_data['order_currency'] }}</span>
                </p>
                <p class="mb-2">
                    <span class="usr-work-position">
                        {{__('ordermodule::checkout.order_tax')}}
                    </span>
                    <span id="tax_span" style="float:right">
                        {{$main_order_data['tax_percentage']}}
                    </span>
                </p>
                <p class="mb-2">
                    <span class="usr-work-position">
                        {{__('ordermodule::checkout.total')}}
                    </span>
                    <span id="total" class="price">
                        {{$main_order_data['total']}}
                    </span>
                </p>
            </div>
        </div>
    </div>

</div>
