@php($discount=$product->discounts->sortByDesc('id')->where('discount_quantity',1)->where('start_date',"<=",date('Y-m-d'))->where('end_date',">=",date('Y-m-d'))->sortByDesc('id')->first())


<div class="price-box">

    @if($discount->count() > 0)

        <p class="old-price"><span
                class="price"> {!! ProductHelper::calPriceCurrency($product->product_price) !!}  {!! LanguageHelper::nameTranslate(Cookie::get('currency')) !!}  </span>
        </p>
        <p class="special-price"><span
                class="price"> {!! ProductHelper::calDiscountAmount($product->product_price,$discount) !!}  {!! LanguageHelper::nameTranslate(Cookie::get('currency')) !!}  </span>
        </p>
    @else
        <p class="special-price"><span
                class="price"> {!! ProductHelper::calPriceCurrency($product->product_price) !!}  {!! LanguageHelper::nameTranslate(Cookie::get('currency')) !!} </span>
        </p>
    @endif

</div>
