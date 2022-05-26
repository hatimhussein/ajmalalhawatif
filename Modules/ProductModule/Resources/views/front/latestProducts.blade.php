@extends('fronthomemodule::layouts.master')

@section('title')
{{__('productmodule::product.latest_products')}}
@endsection

@section('content')



@include('fronthomemodule::content.breadCrumbs',['pages'=>[__('productmodule::product.latest_products')]])


<div class="container">

  <div class="row" >
    <div class="co-lg-12" style="margin: 30px 15px;">
      <h1>{{__('productmodule::product.latest_products')}}</h1>
    </div>

          @foreach($products as $product)
                <div class="col-lg-2 col-md-3 col-sm-4 col-xs-6 mr width">
                  @include('fronthomemodule::content.product')
                </div>
          @endforeach

  </div>

</div>


@stop
