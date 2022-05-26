@extends('fronthomemodule::layouts.master')

@section('title')
العروض
@endsection

@section('content')


<div class="container">

  @if($offers->count() > 0)
  <div class="row" >
    <div class="co-lg-12" style="margin:50px">
      <h1>العروض</h1>
    </div>

          @foreach($offers as $offer)
                <div class="col-lg-3 col-md-3 col-sm-4 col-xs-4 mr width">
                  <div class="col-item">
                    <div class="product-image-area">
                      <a class="product-image" title="Sample Product" href="{{url('offer/'.$offer->id)}}">
                        <img alt="a" class="img-responsive one"
                            src="{{asset('images/offers/'.$offer->photo)}}">
                      </a>

                      <a class="product-image"  href="{{url('offer/'.$offer->id)}}">
                            <img alt="a" class="img-responsive two"
                              src="{{asset('images/offers/'.$offer->photo)}}">
                      </a>
                    </div>

                    <div class="info">
                      <div class="info-inner">
                          <div class="item-title">
                             <a title=" Sample Product" href="{{url('offer/'.$offer->id)}}">
                            {!! LanguageHelper::nameTranslate($offer) !!}
                            </a>
                          </div>
                      </div>

                      <div class="clearfix"> </div>
                    </div>
                  </div>
                </div>
          @endforeach

  </div>
  @else
  <h1 class="text-center" style="margin:80px 0 19px 0">لا يوجد عروض فى الفترة الحالية</h1>
  @endif
</div>


@stop
