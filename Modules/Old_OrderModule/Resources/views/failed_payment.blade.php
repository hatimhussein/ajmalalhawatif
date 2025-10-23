@extends('fronthomemodule::layouts.master')

@section('title')
    {{__('ordermodule::checkout.order_details')}}
@endsection


@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6 text-center" style="margin:5em 0;">
                <img class="img-responsive" style="margin: 2em auto;"
                     src="{{ asset('assets/front/assets/images/exclamation-mark.png') }}" alt="Warning">
                <h1>Payment Failed</h1>
                <p>
                    Your Transaction id: {{ $transaction_id }}
                </p>
            </div>
            <div class="col-md-3"></div>
        </div>
    </div>
@stop
