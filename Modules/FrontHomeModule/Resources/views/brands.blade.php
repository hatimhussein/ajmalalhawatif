@extends('fronthomemodule::layouts.master')

@section('title')
    {{__('fronthomemodule::home.brands')}}
@endsection


@section('content')

    @include('fronthomemodule::content.breadCrumbs',['pages'=>[__('fronthomemodule::home.brands')]])

    <!-- main-container -->
    <div class="main-container col2-right-layout brands-container">
        <div class="main container">
            <div class="grid gr-m-4 gr-sm-3 gr-xs-2">
                @foreach($brands as $brand)
                    <a href="{{url('brand-products/'.$brand->id)}}" class="single-brand">
                        <img class="img-responsive"
                             src="{{asset('images/brand/'.$brand->photo)}}" alt="{{$brand->name_en}}">
                    </a>
                @endforeach
            </div>
        </div>
    </div>
    <!--End main-container -->

@stop
