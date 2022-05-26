@extends('fronthomemodule::layouts.master')

@section('title')
    {{__('fronthomemodule::home.best_seller')}}
@endsection

@section('content')




    <div class="container">


        <div class="row">
            <div class="co-lg-12" style="margin:50px">
                <h1>{{__('fronthomemodule::home.best_seller')}}</h1>
            </div>

            @foreach($order_products as $order)
                @continue($order->product)
                <div class="col-lg-2 col-md-3 col-sm-4 col-xs-4 mr width">
                    @php($discount=$order->product->discounts->sortByDesc('id')->where('discount_quantity',1)->where('start_date',"<=",date('Y-m-d'))->where('end_date',">=",date('Y-m-d'))->sortByDesc('id')->first())

                    <div class="item">
                        <div class="col-item">
                            @if($discount)

                                <div class="sale-label sale-top-right">Sale</div>
                            @endif
                            @if($wish_list)
                                @if($wish_list->contains('product_id', $order->product->id))
                                    <div class="Wishlist sale-top-left"><span
                                            data-product_id="{{$order->product->id}}"
                                            class="active wishlist_operations" href="#"><i
                                                class="icon-heart"></i></span></div>
                                @else
                                    <div class="Wishlist sale-top-left"><span
                                            data-product_id="{{$order->product->id}}" class="wishlist_operations"><i
                                                class="icon-heart"></i></span></div>
                                @endif
                            @endif

                            <div class="product-image-area"><a class="product-image"
                                                               title="Sample Product"
                                                               href="{{url('product-details/'.$order->product->id)}}">
                                    <img alt="a" class="img-responsive one"
                                         src="{{asset('images/product/'.$order->product['product_photo'])}}">
                                    @if($order->product->images->count() > 0)
                                        <img alt="a" class="img-responsive two"
                                             src="{{asset('images/product/'.$order->product['images']->first()->image)}}">
                                    @else
                                        <img alt="a" class="img-responsive two"
                                             src="{{asset('images/product/'.$order->product['product_photo'])}}">
                                    @endif
                                </a>
                            </div>
                            <div class="info">
                                <div class="info-inner">
                                    <div class="item-title">
                                        <a title=" Sample Product"
                                           href="{{url('product-details/'.$order->product->id)}}">
                                            {!! LanguageHelper::productName($order->product) !!}
                                        </a>
                                    </div>
                                    <!--item-title-->
                                    <div class="item-content">
                                        <div class="ratings">
                                            <div class="rating-box">
                                                @if($order->product->reviews->count() > 0)
                                                    <div
                                                        style="width:{{$order->product->reviews->sum('stars') / $order->product->reviews->count()}}%"
                                                        class="rating"></div>
                                                @else
                                                    <div style="width:0%" class="rating"></div>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="price-box">

                                            @if($discount)

                                                <p class="old-price"><span
                                                        class="price"> {!! ProductHelper::calPriceCurrency($order->product->product_price) !!}  {!! LanguageHelper::nameTranslate(Cookie::get('currency')) !!}  </span>
                                                </p>
                                                <p class="special-price"><span
                                                        class="price"> {!! ProductHelper::calDiscountAmount($order->product->product_price,$discount) !!}  {!! LanguageHelper::nameTranslate(Cookie::get('currency')) !!}  </span>
                                                </p>
                                            @else
                                                <p class="special-price"><span
                                                        class="price"> {!! ProductHelper::calPriceCurrency($order->product->product_price) !!}  {!! LanguageHelper::nameTranslate(Cookie::get('currency')) !!} </span>
                                                </p>
                                            @endif

                                        </div>

                                    </div>
                                    <!--item-content-->
                                </div>
                                <!--info-inner-->
                                <div class="actions">

                                    @if($order->product->type=="simple")


                                        @if(count($discount) > 0)
                                            <button data-product_id="{{$order->product->id}}"
                                                    data-cart_type="from_home"
                                                    data-product_photo="{{$order->product->product_photo}}"
                                                    data-product_name="{{$order->product->name_en}}"
                                                    data-product_price="{!! ProductHelper::calDiscountAmountWithoutCurrency($order->product->product_price,$discount) !!}"
                                                    class="button btn-cart add_to_cart"
                                                    title="Add to Cart" type="button"><span><i
                                                        class="icon-basket"></i> {{__('productmodule::product.add_to_cart')}}</span>
                                            </button>

                                        @else
                                            <button data-product_id="{{$order->product->id}}"
                                                    data-cart_type="from_home"
                                                    data-product_photo="{{$order->product->product_photo}}"
                                                    data-product_name="{{$order->product->name_en}}"
                                                    data-product_price=" {{$order->product->product_price}}"
                                                    class="button btn-cart add_to_cart"
                                                    title="Add to Cart" type="button"><span><i
                                                        class="icon-basket"></i> {{__('productmodule::product.add_to_cart')}}</span>
                                            </button>
                                        @endif



                                    <!-- <button type="button" title="{{__('productmodule::product.add_to_cart')}}" class="button btn-cart">
                              <span>{{__('productmodule::product.add_to_cart')}}</span>
                            </button> -->
                                    @else
                                        <a href="{{url('product-details/'.$order->product->id)}}"
                                           class="button btn-cart">
                                            <span>{{__('productmodule::product.cart_details')}}</span>
                                        </a>
                                    @endif
                                </div>
                                <!--actions-->

                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>


                </div>
            @endforeach

        </div>

    </div>


@stop
