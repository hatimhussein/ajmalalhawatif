@php($category->products = $category->products->merge($category->directProducts)->unique())
<section class="best-seller-pro wow bounceInUp animated">
    <div class="slider-items-products">
        <div class="new_title center">
            <h2><a href="{{ url('category/'.$category->id) }}">{!! LanguageHelper::categoryName($category) !!}</a></h2>
            @if($category->products->count() > 1)
                <a href="{{ url('category/'.$category->id) }}">
                    <span class="more">
                        <i class="icon-plus-sign"></i> {{__('fronthomemodule::home.show_more')}}
                    </span>
                </a>
            @endif
        </div>
        <div id="best-seller-slider" class="product-flexslider hidden-buttons">
            <div class="slider-items slider-width-col4">
                @foreach($category->products->take(10) as $product)
                    @include('fronthomemodule::content.product')
                @endforeach
            </div>
        </div>
    </div>
</section>
