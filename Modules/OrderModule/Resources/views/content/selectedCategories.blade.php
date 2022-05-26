



<section class="best-seller-pro wow bounceInUp animated">
  <div class="slider-items-products">
    <div class="new_title center">
      <h2><a href="#">{!! LanguageHelper::categoryName($category) !!}</a> </h2>
      @if($category->products->count() > 10)
        <a href="products.html"><span class="more">{{__('fronthomemodule::home.show_more')}} <i class="icon-double-angle-right"></i></span></a>
      @endif
    </div>
    <div id="best-seller-slider" class="product-flexslider hidden-buttons">
      <div class="slider-items slider-width-col4">
        @if($category->directproducts->count() > 0 )
          @foreach($category->directproducts()->with(['images','discounts','reviews'])->orderBy(DB::raw('RAND()'))->take(10)->get() as $product)

            @include('fronthomemodule::content.product')
          @endforeach
        @else
          @foreach($category->products()->with(['images','discounts','reviews'])->orderBy(DB::raw('RAND()'))->take(10)->get() as $product)

          @include('fronthomemodule::content.product')

          @endforeach
        @endif
      </div>
    </div>
  </div>
</section>
