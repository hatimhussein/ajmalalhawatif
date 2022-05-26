@extends('fronthomemodule::layouts.master')

@section('title')
    {{__('usermodule::account.my_orders')}}
@endsection


@section('content')

    @include('fronthomemodule::content.breadCrumbs',['pages'=>[__('usermodule::account.my_orders')]])

    <!-- main-container -->
    <div class="main-container col2-right-layout">
        <div class="main container">
            <div class="row">
            @include('usermodule::front.account.menu')                    <!--cart-collaterals-->
                <section class=" wow bounceInUp animated col-md-9">
                    <div class="main">
                        <div class="col-main">
                            <div class="cart wow bounceInUp animated my-account">
                                <div class="page-title title">
                                    <h2>{{__('usermodule::account.my_orders')}}</h2>
                                </div>

                                @if(count($orders) > 0)
                                    <div class="table-responsive pl-0">
                                        <fieldset>
                                            <table class="data-table cart-table" id="shopping-cart-table">
                                                <thead>
                                                <tr class="first last">

                                                    <th rowspan="1"><span
                                                            class="nobr">{{__('ordermodule::order.order_id')}}</span>
                                                    </th>
                                                    <th class="a-center"
                                                        rowspan="1">{{__('ordermodule::order.date')}}</th>
                                                    <th colspan="1"
                                                        class="a-center">{{__('ordermodule::order.subtotal')}}</th>
                                                    <th colspan="1"
                                                        class="a-center">{{__('ordermodule::order.shipping_cost')}}</th>
                                                    <th colspan="1"
                                                        class="a-center">{{__('ordermodule::order.discount')}}</th>
                                                    <th colspan="1"
                                                        class="a-center">{{__('ordermodule::order.total')}}</th>
                                                    <th colspan="1"
                                                        class="a-center">{{__('ordermodule::order.status')}}</th>
                                                    <th colspan="1" class="a-center"></th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($orders as $order)
                                                    <tr class="first odd">

                                                        <td class="a-center">
                                                            <span>{{$order->id}}</span>
                                                        </td>
                                                        <td class="a-center">
                                                            <span>{{$order->created_at}}</span>
                                                        </td>
                                                        <td class="a-center">
                                                            <span>{{$order->sub_total}} {{$order->order_currency}} </span>
                                                        </td>
                                                        <td class="a-center">
                                                            <span>{{$order->shipping}} {{$order->order_currency}}</span>
                                                        </td>
                                                        <td class="a-center">
                                                            <span>{{$order->discount}} {{$order->order_currency}}</span>
                                                        </td>

                                                        <td class="a-center">
                                                            <span>{{$order->total}} {{$order->order_currency}}</span>
                                                        </td>

                                                        <td class="a-center">
                                                            <span>{{$order->currentStatus->title}}</span>
                                                        </td>

                                                        <td class="a-center last">

                                                            <form action="{{url('re-order/'.$order->id)}}"
                                                                  method="post">
                                                                @csrf

                                                                @if($order->status->first()->able_print)
                                                                    <a class="btn btn-warning a-button p-0"
                                                                       href="{{url('order/invoice/'.$order->id)}}" target="_blank" title="{{ __('ordermodule::order.print_invoice') }}">
                                                                        {{ __('ordermodule::order.print_invoice') }}
                                                                    </a>
                                                                    <br>
                                                                    <br>
                                                                @endif

                                                                <a class="btn btn-success a-button p-0"
                                                                   href="{{url('order/'.$order->id)}}" title="Edit">
                                                                    {{__('ordermodule::order.order_details')}}
                                                                </a>
                                                                <br>
                                                                <br>
                                                                <button class="btn btn-info a-button re-purchase"
                                                                        type="submit"
                                                                        title="RePurchase">
                                                                    {{__('ordermodule::order.re_order')}}
                                                                </button>
                                                            </form>
                                                        </td>

                                                    </tr>
                                                @endforeach
                                                </tbody>
                                            </table>

                                        </fieldset>
                                    </div>
                                @else
                                    <h3 class="text-center">{{__('ordermodule::order.no_orders')}}</h3>
                                @endif
                            </div>
                        </div>
                    </div>
                </section>


            </div>
        </div>
    </div>
    <!--End main-container -->

@stop
