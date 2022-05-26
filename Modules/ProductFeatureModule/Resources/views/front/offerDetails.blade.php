@extends('fronthomemodule::layouts.master')

@section('title')
وصل حديثا
@endsection

@section('content')


<div class="container">

  <div class="row" >
    <div class="co-lg-12" style="margin:30px 15px">
      <h1>{!! LanguageHelper::nameTranslate($offer) !!}</h1>
    </div>
        @if($offer->products->count() == 0)
          <h1 class="text-center" style="padding:20px 0 90px 0;">{{__('productmodule::product.no_products')}}</h1>
        @endif

          @foreach($offer->products as $product)
                <div class="col-lg-2 col-md-3 col-sm-4 col-xs-6 mr width">
                  @include('fronthomemodule::content.product')
                </div>
          @endforeach

  </div>

</div>


@stop
