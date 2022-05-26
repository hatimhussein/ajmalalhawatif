
  <div id="catProducts" class="">

{{--    <div class="pages">--}}
{{--        @if($products->count() > 12 )<label>Page:</label> @endif--}}
{{--        {!! $products->render() !!}--}}
{{--    </div>--}}

    <input type="hidden" name="hidden_page" id="hidden_page" value="1" />

        <ul   class="products-grid grid-list">
          @foreach($products as $product)
                <div class="col-lg-3 col-md-4 col-sm-6 col-xs-6 mr width">
                  @include('fronthomemodule::content.product')
            </div>
          @endforeach
        </ul>
  </div>
