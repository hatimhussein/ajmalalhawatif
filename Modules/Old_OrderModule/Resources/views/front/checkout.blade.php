@extends('fronthomemodule::layouts.master')

@section('title')
    {{__('commonmodule::front.checkout')}}
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('assets\front\plugins\chosen\chosen.min.css') }}">
@endsection

@section('content')


    @include('fronthomemodule::content.breadCrumbs',['pages'=>[__('commonmodule::front.checkout')]])

    <!-- main-container -->
    <div class="main-container col2-right-layout">
        <div class="main container">
            <div class="row">
                <section class="col-main col-sm-12 wow bounceInUp animated myaccount">
                    <div class="page-title title2">
                        <h2>{{__('ordermodule::checkout.checkout')}}</h2>
                    </div>
                    <div class="opc-wrapper-opc design_package_smartwave design_theme_porto">

                        <form id="checkout_form" method="post">
                            <div class="row">
                                @include('ordermodule::front.checkout_content.shipping_address')
                                @include('ordermodule::front.checkout_content.shipping_methods')
                                @include('ordermodule::front.checkout_content.summery', ['cart_data' => $cart_data])
                            </div>

                        </form>

                    </div>
                </section>
            </div>
        </div>
    </div>
    </div>


    <div class="modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="z-index: 99999999;
    top: 15%;">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title m-title2">{{__('ordermodule::checkout.cookie_error')}}</h5>
                </div>
                <div class="modal-body">
                    <ul class="mini-products-list modal-products">

                    </ul>
                    <div class="total-price2">
                        <p>{{__('ordermodule::checkout.total')}} : <span class="total-num2"></span></p>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" id="confirm_checkout"
                            class="btn btn-primary">{{__('ordermodule::checkout.confirm')}}</button>
                    <h5 style="    display: inline-block;" class="hidden" id="wait1">
                        <strong>{{__('ordermodule::checkout.wait')}}</strong></h5>
                    <button type="button" class="btn btn-danger" onclick="closemodal()"
                            data-dismiss="modal">{{__('ordermodule::checkout.close')}}</button>
                </div>
            </div>
        </div>
    </div>

    <!--End main-container -->
@section('js')

    <script src="{{ asset('assets\front\plugins\chosen\chosen.jquery.min.js') }}"></script>
    <script>
        $('.chosen-select').chosen({
            width: '100%'
        });
    </script>

    @include('ordermodule::front.checkout_content.checkout_scripts')


@endsection



@stop

