@extends('fronthomemodule::layouts.master')

@section('title')
    {{__('commonmodule::front.warranty')}}
@endsection


@section('content')


    @include('fronthomemodule::content.breadCrumbs',['pages'=>[__('commonmodule::front.warranty')]])


    <!-- main-container -->
    <div class="main-container col2-right-layout">
        <div class="main container new-warranty">
            <div class="row">
                <div class="col-md-4"></div>
                <section class="col-md-4">
                    <div class="main">
                        <div class="col-main">
                            <div class="text-center">
                                <h3>{{__('warrantymodule::warranty.choose_warranty_type')}}</h3>
                            </div>
                            <div class="card-body">
                                <div class="text-center red">
                                    <a href="{{ route('front.warranty.create', ['type' => 'card']) }}">{{ __('warrantymodule::warranty.card_warranty') }}</a>
                                </div>
                                <div class="text-center">
                                    <p>{{ __('warrantymodule::warranty.or') }}</p>
                                </div>
                                <div class="text-center green">
                                    <a href="{{ route('front.warranty.create', ['type' => 'sms']) }}">{{ __('warrantymodule::warranty.sms_warranty') }}</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>


            </div>
        </div>
    </div>
    <!--End main-container -->

@stop
