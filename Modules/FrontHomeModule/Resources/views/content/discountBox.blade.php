@php($discount=$product->discounts->sortByDesc('id')->where('discount_quantity',1)->where('start_date',"<=",date('Y-m-d'))->where('end_date',">=",date('Y-m-d'))->sortByDesc('id')->first())


<div class="price-box">

    @if($discount)
        <p class="old-price">
            <span class="price">
                {!! ProductHelper::calPriceCurrency($product->product_price) !!}  {!! LanguageHelper::nameTranslate(Session::get('currency')) !!}
            </span>
        </p>
        <p class="special-price">
            <span class="price">
                {!! ProductHelper::calDiscountAmount($product->tax_free_price,$discount) !!}  {!! LanguageHelper::nameTranslate(Session::get('currency')) !!}
            </span>
        </p>
    @else
        <p class="special-price">
            <span class="price">
                {!! ProductHelper::calPriceCurrency($product->product_price) !!}  {!! LanguageHelper::nameTranslate(Session::get('currency')) !!}
            </span>
        </p>
    @endif

</div>
