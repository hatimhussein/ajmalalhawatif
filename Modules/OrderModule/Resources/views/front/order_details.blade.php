@extends('fronthomemodule::layouts.master')

@section('title')
    {{__('ordermodule::checkout.order_details')}}
@endsection


@section('content')



    @include('fronthomemodule::content.breadCrumbs',['pages'=>[__('ordermodule::checkout.order_details')]])


    <div class="main-container col2-right-layout">
        <div class="main container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="card">
                        <h4 class="card-header text-center">{{__('ordermodule::order.shipping_address')}}</h4>
                        <div class="card-body">

                            @if($order->userAddresses !=null)
                                <div>
                                    <span>
                                        <strong>{{__('ordermodule::order.country')}}</strong>
                                    </span>
                                    <span>
                                        @if($order->userAddresses->getCountry !=null)
                                            {!! LanguageHelper::nameTranslate($order->userAddresses->getCountry) !!}
                                        @endif
                                    </span>
                                </div>
                                <div>
                                    <span><strong>{{__('ordermodule::order.government')}}</strong></span>
                                    <span>
                        @if($order->userAddresses->getGovernment !=null)
                                            {!! LanguageHelper::nameTranslate($order->userAddresses->getGovernment) !!}
                                        @endif
                      </span>
                                </div>
                                <div>
                                    <span><strong>{{__('ordermodule::order.city')}}</strong></span>
                                    @if($order->userAddresses->getCity !=null)
                                        <span>{!! LanguageHelper::nameTranslate($order->userAddresses->getCity) !!}</span>
                                    @else
                                        <span>-</span>
                                    @endif

                                </div>

                                <div>

                                    <span><strong>{{__('ordermodule::order.zone')}}</strong></span>
                                    @if($order->userAddresses->getZone !=null)
                                        <span>{!! LanguageHelper::nameTranslate($order->userAddresses->getZone) !!}</span>
                                    @else
                                        <span>-</span>
                                    @endif

                                </div>

                                <div>
                                    <span><strong>{{__('ordermodule::order.address')}}</strong></span>
                                    <span>{{$order->userAddresses->address}}</span>
                                </div>


                            @endif

                        </div>
                    </div>

                </div>

                <div class="col-lg-3">
                    <div class="card">
                        <h4 class="card-header text-center">{{__('ordermodule::order.payment_details')}}</h4>
                        <div class="card-body">
                            <div>
                                <span><strong>{{__('ordermodule::order.subtotal')}}</strong></span>
                                <?php $tot = $order->sub_total / (1+($order->tax_percentage/100))?>
                                <span>{{$tot}} {{$order->order_currency}}</span>
                            </div>
                            <div>
                                <span><strong>{{__('ordermodule::order.shipping_cost')}}</strong></span>
                                <span>{{$order->untaxed_shipping}} {{$order->order_currency}}</span>
                            </div>

                            <div>
                                <span><strong>{{__('ordermodule::order.discount')}}</strong></span>
                                <span>{{$order->discount}} {{$order->order_currency}}</span>
                            </div>
                            <div>
                                <span><strong>{{__('ordermodule::order.tax')}}</strong></span>
                                <span>@if($order->tax_percentage){{$order->tax_percentage}}% @else - @endif  </span>
                            </div>
                            @if($order->send_gift)
                                <div>
                                    <span><strong>{{__('ordermodule::checkout.gift_cost')}}</strong></span>
                                    <span>{{$order->gift_cost}} {{$order->order_currency}}</span>
                                </div>
                            @endif

                            <div>
                                <span><strong>{{__('ordermodule::order.total')}}</strong></span>
                                <?php $end_tot = ((((($tot - $order->discount) + $order->untaxed_shipping) * $order->tax_percentage) / 100) + (($tot - $order->discount) + $order->untaxed_shipping))  ?>
                                <span>{{$end_tot}} {{$order->order_currency}}</span>
                            </div>

                        </div>
                    </div>

                </div>

                <div class="col-lg-3">
                    <div class="card">
                        <h4 class="card-header text-center">{{__('ordermodule::order.order_details')}}</h4>
                        <div class="card-body">
                            <div>
                                <span><strong>{{__('ordermodule::order.shipping_time')}}</strong></span>
                                <span>{!! $order->deliverytime->name??'' !!}</span>
                            </div>
                            <div>
                                <span><strong>{{__('ordermodule::order.coupon_code')}}</strong></span>
                                <span>{{$order->coupon_code}}</span>
                            </div>
                            <div>
                                <span><strong>{{__('ordermodule::order.comment')}}</strong></span>
                                <span>{{$order->comment}}</span>
                            </div>

                            <div>
                                <span><strong>{{__('ordermodule::order.payment_type')}}</strong></span>
                                <span>{{__('ordermodule::payment.'.$order->payment_type)}}</span>
                            </div>


                        </div>
                    </div>

                </div>

                <div class="col-lg-3">
                    <div class="card">
                        <h4 class="card-header text-center">{{__('ordermodule::order.status')}}</h4>
                        <div class="card-body">
                            <div>

                                @foreach($order->status as $status)
                                    <p><strong>{{$status->title}} </strong><span>{{$status->pivot->created_at}}</span>
                                    </p>
                                @endforeach

                                @if($order->current_status_id==1 && $order->current_status_type_id==1)
                                    @if($site_data->where('key', 'cancel_order')->first()->value_ar == 1)
                                        <button class="btn btn-danger" data-id="{{$order->id}}" id="cancel-order">
                                            <strong>{{__('ordermodule::order.cancel_order')}}</strong>
                                        </button>
                                    @endif
                                @endif
                            </div>
                        </div>
                    </div>

                </div>


                <div style="margin-top:30px" class="col-lg-12">
                    <div class="card">
                        <h4 class="card-header">{{__('ordermodule::order.order_products')}}</h4>
                        <div class="card-body">
                            <div class="table-responsive pl-0">
                                <fieldset>
                                    <table class="data-table cart-table" id="shopping-cart-table">
                                        <thead>
                                        <tr class="first last">
                                            <th rowspan="1"
                                                class="a-center">{{__('ordermodule::order.product_name')}}</th>
                                            <th class="a-center" rowspan="1"> {{__('ordermodule::order.quantity')}}</th>
                                            <th class="a-center" rowspan="1">{{__('ordermodule::order.price')}}</th>
                                            <th colspan="1" class="a-center">{{__('ordermodule::order.total')}}</th>
                                            <th colspan="1"
                                                class="a-center">{{__('ordermodule::order.combination')}}</th>
                                        </tr>
                                        </thead>
                                        <tbody>

                                        @foreach($order->products as $product)
                                            <tr class="first odd">
                                                <td class="a-center">
                                                    {{$product->name_ar}}
                                                </td>
                                                <td class="a-center">
                                                    {{$product->pivot->quantity}}
                                                </td>
                                                <td class="a-center">
                                                    {{$product->pivot->item_price / (1+(($order->tax_percentage ?? 0)/100)) }} {{$order->order_currency}}
                                                </td>
                                                <td class="a-center">
                                                    {{($product->pivot->item_price / (1+(($order->tax_percentage ?? 0)/100))) * $product->pivot->quantity}} {{$order->order_currency}}
                                                </td>

                                                <td class="a-center">
                                                    {{$product->pivot->item_combination_name}}
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>

                                </fieldset>
                            </div>

                        </div>
                    </div>

                </div>


            </div>


        </div>
    </div>
@endsection

@section('js')

    <script type="text/javascript">


        $("#cancel-order").on('click', function (event) {
            var order_id = $(this).data('id');
            var token = '{{csrf_token()}}';

            $.ajax({
                'type': 'post',
                'url': '{{ url("order/cancel") }}',
                data: {order_id, '_token': token},
                'statusCode': {
                    200: function (response) {
                        console.log(response.data);
                        if (response.code == 201) {
                            toastr["error"](response.message);
                        } else {
                            toastr["success"]('{{__("ordermodule::order.admin_cancel")}}');
                            $('#cancel-order').replaceWith('<span>{{__("ordermodule::order.admin_cancel")}}<span>');
                        }

                    },
                    422: function (response) {
                        $.map(response.responseJSON.errors, function (error) {
                            toastr["error"](error)
                        });

                    }
                },
            });

        });

    </script>

@endsection
