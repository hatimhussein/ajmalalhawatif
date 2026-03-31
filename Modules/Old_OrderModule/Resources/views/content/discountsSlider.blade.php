


<section class="best-seller-pro wow bounceInUp animated">
  <div class="slider-items-products">
    <div class="new_title center">
      <h2><a href="#">{{__('fronthomemodule::home.offers_and_discount')}}</a></h2>
      @if($dicount_products->count() > 0)
        <a href="{{url('discount-products')}}"><span class="more">{{__('fronthomemodule::home.show_more')}} <i class="icon-double-angle-right"></i></span></a>
      @endif
    </div>
    <div id="best-seller-slider" class="product-flexslider hidden-buttons">
      <div class="slider-items slider-width-col4">


        <!-- Item -->
        @foreach($dicount_products as $product)

          @include('fronthomemodule::content.product')

        @endforeach
        <!-- End Item -->


      </div>
    </div>
  </div>
</section>
<br>
