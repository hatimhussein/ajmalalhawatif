@extends('fronthomemodule::layouts.master')

@section('title')
    {{__('commonmodule::front.returns')}}
@endsection


@section('content')


    @include('fronthomemodule::content.breadCrumbs',['pages'=>[__('commonmodule::front.returns')]])


    <!-- main-container -->
    <div class="main-container col2-right-layout">
        <div class="main container">
            <div class="row">
                @include('usermodule::front.account.menu')
                <section class=" wow bounceInUp animated col-md-9">
                    <div class="main">
                        <div class="col-main">
                            <div class="cart wow bounceInUp animated my-account">
                                <div class="page-title title">
                                    <h2>{{__('commonmodule::front.returns')}}</h2>
                                    <div class="corner-buttons">
                                        <a href="{{route('front.skudo.returns.orders')}}" class="btn btn-info">
                                            {{ __('skudomodule::returns.add_new_return') }}
                                        </a>
                                    </div>
                                </div>

                                @if(count($returns) > 0)
                                    <div class="table-responsive pl-0">
                                        <fieldset>
                                            <table class="data-table cart-table" id="shopping-cart-table">
                                                <thead>
                                                <tr class="first last">
                                                    <th class="a-center"
                                                        rowspan="1">{{__('ordermodule::order.date')}}</th>
                                                    <th colspan="1"
                                                        class="a-center">{{__('productmodule::product.products')}}</th>
                                                    <th colspan="1"
                                                        class="a-center">{{__('productmodule::product.price')}}</th>
                                                    <th colspan="1"
                                                        class="a-center">{{__('ordermodule::order.shipping_address')}}</th>
                                                    <th colspan="1"
                                                        class="a-center">{{__('warrantymodule::returns.reason')}}</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($returns as $return)
                                                    <tr class="first odd">
                                                        <td class="a-center">
                                                            <span>{{$return->created_at}}</span>
                                                        </td>

                                                        <td class="a-center">
                                                            <span>{{$return->order_product->product->name}}</span>
                                                        </td>

                                                        <td class="a-center">
                                                            <span>{{$return->order_product->item_price}} {{LanguageHelper::nameTranslate($return->order_product->order->currency)}}</span>
                                                        </td>

                                                        <td class="a-center">
                                                            <span>{{$return->address->getZone->name ?? ''}} {{$return->address->address ?? '-'}}</span>
                                                        </td>

                                                        <td class="a-center">
                                                            <span>{{$return->reason->name}}</span>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                                </tbody>
                                            </table>

                                        </fieldset>
                                    </div>
                                @else
                                    <div class="row">
                                        <div class="col-md-12">
                                            <h3 class="text-center">{{__('ordermodule::order.no_orders')}}</h3>
                                        </div>
                                    </div>
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
