@extends('fronthomemodule::layouts.master')

@section('title')
    {{__('commonmodule::front.view_cart')}}
@endsection


@section('content')

    @include('fronthomemodule::content.breadCrumbs',['pages'=>[__('commonmodule::front.view_cart')]])

    <!-- main-container -->
    <div class="main-container">
        <div class="main container">

            <h2 style="text-align: center;color: red;">{!! session('failed') !!}</h2>

            <div class="cart wow bounceInUp animated">
                <div class="row" style="margin: 0">
                    @php($total = 0)
                    @if(count($cart_data))
                        <div class="col-sm-12">
                            <div class="page-title col-sm-12">
                                <h2>{{__('ordermodule::cart.cart')}}</h2>
                            </div>
                        </div>

                        <div class="col-md-8">
                            <div class="table-responsive pl-0 cart_item tablecart">


                                <fieldset>
                                    <table class="data-table cart-table" id="shopping-cart-table">
                                        <thead>
                                        <tr class="first last">
                                            <th rowspan="1">{{__('ordermodule::cart.product_image')}}</th>
                                            <th rowspan="1"><span
                                                    class="nobr">{{__('ordermodule::cart.product_name')}}</span>
                                            </th>
                                            <th class="xs-hidden" rowspan="1">{{__('ordermodule::cart.options')}}</th>
                                            <th colspan="1" class="a-center"><span
                                                    class="nobr">{{__('ordermodule::cart.unit_price')}}</span>
                                            </th>
                                            <th class="a-center"
                                                rowspan="1">{{__('ordermodule::cart.quantity')}}</th>
                                            <th colspan="1"
                                                class="a-center">{{__('ordermodule::cart.subtotal')}}</th>
                                            <th class="a-center" rowspan="1">&nbsp;</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($cart_data as $keys => $values)
                                            <tr class=" first odd {{$values["product_id"] . str_replace(',', '', $values["item_combination"])}}">
                                                <td class="image"><a class="product-image"
                                                                     title="Sample Product"
                                                                     href="{{url('product-details/'.$values['product_id'])}}"><img
                                                            width="75" height="75" alt="Sample Product"
                                                            src="{{asset('images/product/')}}/{{$values["item_photo"]}}"></a>
                                                </td>

                                                <td>
                                                    <h2 class="product-name">
                                                        <a href="{{url('product-details/'.$values['product_id'])}}"
                                                           title="{{$values['item_name']}}">
                                                            {!! strlen($values['item_name']) > 20 ? mb_substr($values['item_name'], 0, 18) . '...' : $values['item_name'] !!}
                                                        </a>
                                                    </h2>
                                                </td>

                                                <td class="a-center xs-hidden">
                                                    <span class="cart-price">
                                                        <span class="price">
                                                            {{ $values["item_combination_name"] }}
                                                        </span>
                                                    </span>
                                                </td>

                                                <td class="a-right"><span class="cart-price"> <span
                                                            class="price item_price{{$values["product_id"] . str_replace(',', '', $values["item_combination"])}}">{!! ProductHelper::calPriceCurrency($values['item_price']) !!} </span>{!! LanguageHelper::nameTranslate(Cookie::get('currency')) !!} </span>
                                                </td>

                                                <td class="a-center movewishlist quantity_td">
                                                    <input maxlength="12" class="input-text qty update-quantity"
                                                           title="Qty"
                                                           size="4"
                                                           value="{{$values["quantity"]}}"
                                                           name="cart[15945][qty]" type="number"
                                                           data-item_price="{!! ProductHelper::calPriceCurrency($values['item_price']) !!}"
                                                           data-old_quantity="{{$values['quantity']}}"
                                                           data-product_id="{{$values["product_id"]}}"
                                                           data-item_combination="{{$values["item_combination"]}}"
                                                           min="1"
                                                    >

                                                </td>

                                                <td class="a-right movewishlist"><span class="cart-price"> <span
                                                            class="price">{!! ProductHelper::calPriceCurrency( $values["item_price"] * $values["quantity"]) !!}</span> {!! LanguageHelper::nameTranslate(Cookie::get('currency')) !!}</span>
                                                </td>

                                                <td class="a-center last">
                                                    @if($wish_list)
                                                        <div
                                                            class="cart-wish">
                                                            <a class="wishlist_operations button fav-item {{$wish_list->contains('product_id', $values["product_id"]) ? 'active' : ''}}"
                                                               data-product_id="{{$values["product_id"]}}"
                                                               title="" href="#"></a>
                                                        </div>
                                                    @endif
                                                    <a
                                                        data-product_id="{{$values["product_id"]}}"
                                                        data-item_combination="{{$values["item_combination"]}}"
                                                        class="button remove-item"
                                                        title="Remove item"
                                                        href="#"><span><span>Remove item</span></span></a>
                                                </td>
                                            </tr>
                                            @php($total = $total + ProductHelper::calPriceCurrency($values["item_price"] * $values["quantity"]))
                                        @endforeach
                                        </tbody>
                                    </table>
                                    <table class="data-table cart-table">
                                        <tfoot>
                                        <tr class="first last">
                                            <td class="a-right last" colspan="50">
                                                <button class="clear-cart"
                                                        data-toggle="modal" data-target="#emptyModal"
                                                        title="Clear Cart" value="empty_cart"
                                                        name="update_cart_action"
                                                        type="submit">
                                                    {{__('ordermodule::cart.clear_cart')}}
                                                </button>
                                            </td>
                                        </tr>
                                        </tfoot>
                                    </table>

                                </fieldset>
                            </div>
                        </div>
                        <!-- BEGIN CART COLLATERALS -->
                        <div class="col-sm-4">
                            <div class="cart-collaterals cart_item">
                                <div class="totals ">
                                    <h3>{{__('ordermodule::cart.cart_products_total')}}</h3>

                                    <div class="price-and-check">
                                        <h4>
                                            <span class="subtotal_cal">{{number_format($total, 2)}}</span>
                                            {!! LanguageHelper::nameTranslate(Session::get('currency')) !!}
                                        </h4>
                                        <a href="{{url('checkout')}}"
                                           class="button"
                                           title="Proceed to Checkout"
                                           type="button">{{__('fronthomemodule::home.checkout')}}</a>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <!--cart-collaterals-->
                    @else
                        <h1 class="text-center">{{__('ordermodule::cart.no_products')}}</h1>
                    @endif
                </div>

            </div>
        </div>
    </div>
    <!--End main-container -->

    <!-- Start Empty Cart Modal -->
    <div class="modal" id="emptyModal" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title text-center">{{__('ordermodule::cart.clear_cart_confirm')}}</h4>
                    <div class="btns-container">
                        <button type="button" class="btn btn-primary btn-empty" data-dismiss="modal">
                            {{__('ordermodule::cart.clear_cart')}}
                        </button>
                        <button type="button" class="btn btn-secondary"
                                data-dismiss="modal">{{__('ordermodule::cart.no')}}</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Empty Cart Modal -->

@section('js')

    @include('productmodule::front.content.add_to_cart')

@endsection
@stop
