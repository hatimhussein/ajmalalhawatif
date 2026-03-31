<!-- Item -->
@php($discount=$product->discounts->sortByDesc('id')->where('discount_quantity',1)->where('start_date',"<=",date('Y-m-d'))->where('end_date',">=",date('Y-m-d'))->sortByDesc('id')->first())

<div class="item">
    <div class="col-item">
        @if($discount)
            <div class="sale-label sale-top-right">Sale</div>
        @endif
        @include('fronthomemodule::content.Wishlist_heart')
        <div class="product-image-area"><a class="product-image"
                                           title="Sample Product" href="{{url('product-details/'.$product->id)}}">
                <img alt="a" class="img-responsive one"
                     src="{{asset('images/product/'.$product['product_photo'])}}">
                @if($product->images->count() > 0)
                    <img alt="a" class="img-responsive two"
                         src="{{asset('images/product/'.$product['images']->first()->image)}}">
                @else
                    <img alt="a" class="img-responsive two"
                         src="{{asset('images/product/'.$product['product_photo'])}}">
                @endif
            </a>
        </div>
        <div class="info">
            <div class="info-inner">
                <div class="item-title">
                    <a title=" Sample Product" href="{{url('product-details/'.$product->id)}}">
                        {!! LanguageHelper::productName($product) !!}
                    </a>
                </div>
                <!--item-title-->
                <div class="item-content">
                    <div class="ratings">
                        <div class="rating-box">
                        </div>
                    </div>
                    @include('fronthomemodule::content.discountBox')
                </div>
                <!--item-content-->
            </div>
            <!--info-inner-->
            <div class="actions">

                @if($product->type=="simple")


                    @if($discount)
                        <button data-product_id="{{$product->id}}" data-cart_type="from_home"
                                data-product_photo="{{$product->product_photo}}" data-product_type="{{$product->type}}"
                                data-product_name="{!! LanguageHelper::nameTranslate($product) !!}"
                                data-product_price="{!! ProductHelper::calDiscountAmountWithoutCurrency($product->product_price,$discount) !!}"
                                class="button btn-cart add_to_cart"
                                title="Add to Cart" type="button"><span><i class="icon-basket"></i> {{__('productmodule::product.add_to_cart')}}</span>
                        </button>

                    @else
                        <button data-product_id="{{$product->id}}" data-cart_type="from_home"
                                data-product_photo="{{$product->product_photo}}" data-product_type="{{$product->type}}"
                                data-product_name="{!! LanguageHelper::nameTranslate($product) !!}"
                                data-product_price=" {{$product->product_price}}" class="button btn-cart add_to_cart"
                                title="Add to Cart" type="button"><span><i class="icon-basket"></i> {{__('productmodule::product.add_to_cart')}}</span>
                        </button>
                    @endif



                <!-- <button type="button" title="{{__('productmodule::product.add_to_cart')}}" class="button btn-cart">
              <span>{{__('productmodule::product.add_to_cart')}}</span>
            </button> -->
                @else
                    <a href="{{url('product-details/'.$product->id)}}" class="button btn-cart">
                        <span>{{__('productmodule::product.cart_details')}}</span>
                    </a>
                @endif
            </div>
            <!--actions-->

            <div class="clearfix"></div>
        </div>
    </div>
</div>


<!-- End Item -->
