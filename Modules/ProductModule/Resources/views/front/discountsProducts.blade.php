@extends('fronthomemodule::layouts.master')

@section('title')
{{__('productmodule::product.offers')}}
@endsection

@section('content')



@include('fronthomemodule::content.breadCrumbs',['pages'=>[__('productmodule::product.offers')]])

<div class="container">

  @if($offers->count() > 0)
    <div class="row" >
      <div class="co-lg-12" style="margin: 30px 15px;">
        <h1>{{__('productmodule::product.offers')}}</h1>
      </div>

            @foreach($offers as $offer)
                  <div class="col-lg-3 col-md-3 col-sm-4 col-xs-6 mr width">
                    <div class="col-item">
                      <div class="product-image-area">
                         <a class="product-image"
                        title="Sample Product" href="{{url('offer/'.$offer->id)}}">
                        <img alt="a" class="img-responsive discount-img"
                            src="{{asset('images/offers/'.$offer->photo)}}">
</a>
                      </div>
                      <div class="info">
                        <div class="info-inner">
                            <div class="item-title">
                               <a title=" Sample Product offers-text" href="{{url('offer/'.$offer->id)}}">
                              {!! LanguageHelper::productName($offer) !!}
                              </a>
                            </div>
                        </div>

                        <div class="clearfix"> </div>
                      </div>
                    </div>
                  </div>
            @endforeach

    </div>
  @endif

  <div class="row" >
    <div class="co-lg-12" style="margin:30px 15px">
      <h1>{{__('productmodule::product.discounts')}}</h1>
    </div>

          @foreach($products as $product)
                <div class="col-lg-2 col-md-3 col-sm-4 col-xs-6 mr width">
                  @include('fronthomemodule::content.product')
                </div>
          @endforeach

  </div>

</div>


@stop
