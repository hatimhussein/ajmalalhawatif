@extends('fronthomemodule::layouts.master')

@section('title')
    {{__('commonmodule::front.returns')}}
@endsection


@section('content')


    @include('fronthomemodule::content.breadCrumbs',['pages'=>[__('commonmodule::front.returns')]])
    <!-- main-container -->
    <div class="main-container col2-right-layout">
        <div class="main container">
            <div class="row">
                @include('usermodule::front.account.menu')
                <section class="col-md-9 col-sm-6 wow bounceInUp animated return">
                    <form id="return-form" action="{{route('front.returns.store')}}" method="POST">
                        @csrf
                        <div id="pick-returns" class="returns-tab">
                            <h3> {{__('warrantymodule::returns.choose_products')}} </h3>
                            <div class="corner-buttons">
                                <a href="{{route('front.returns.index')}}" class="btn btn-default">
                                    {{__('warrantymodule::returns.cancel')}}
                                </a>
                                <button type="button" role="button" class="btn btn-info tab-switch action-btn"
                                        data-target="#pick-address" style="display: none">
                                    {{__('warrantymodule::returns.choose_address')}}
                                </button>
                            </div>

                            @foreach($products as $product)
                                <div class="row product_col">
                                    <div class="col-lg-7">
                                        <div class="row product_details">
                                            <div class="col-lg-3">
                                                <label class="container-checkbox">
                                                    <img
                                                        src="{{asset('images/product/'.$product->product->product_photo)}}">
                                                    <input type="checkbox" name="products[]" class="returned-products"
                                                           value="{{$product->id}}">
                                                    <span class="checkmark"></span>
                                                </label>

                                            </div>
                                            <div class="col-lg-9">

                                                <h3>{{ $product->product->name }}</h3>
                                                <span class="price">
                                                    {{$product->item_price}} {{LanguageHelper::nameTranslate($product->order->currency)}}
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-5">
                                        <div class="customer-name row">
                                            <div class="field name-firstname col-md-12">
                                                <h5> {{__('warrantymodule::returns.order_id')}} {{$product->order_id}}</h5>
                                                <label> {{__('warrantymodule::returns.return_reason_lbl')}} </label>
                                                <div class="input-box">
                                                    <select name="reasons[{{$product->id}}]"
                                                            class="input-text form-control required-entry">
                                                        <option selected disabled>
                                                            {{__('warrantymodule::returns.choose_reason')}}
                                                        </option>
                                                        @foreach($reasons as $reason)
                                                            <option value="{{$reason->id}}">
                                                                {{$reason->name}}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            @endforeach

                        </div>
                        <div id="pick-address" class="returns-tab" style="display: none">
                            <h3> {{__('warrantymodule::returns.choose_address')}} </h3>
                            <div class="corner-buttons">
                                <button type="button" role="button" class="btn btn-default tab-switch"
                                        data-target="#pick-returns">
                                    {{__('warrantymodule::returns.choose_products')}}
                                </button>
                                <button type="submit" class="btn btn-info action-btn">
                                    {{__('warrantymodule::returns.proceed')}}
                                </button>
                            </div>
                            <div class="row">
                                <label for="billing-address-select"
                                       class="notice">{{__('ordermodule::checkout.address_text')}}</label>
                                <div class="input-box">
                                    <select name="user_address_id" id="billing-address-select">
                                        <option value=""
                                                selected="selected">{{__('ordermodule::checkout.new_adderess')}}</option>

                                        @foreach($user_addresses as $address)
                                            <option value="{{$address->id}}">

                                                @if($address->getCountry !=null)
                                                    {!! LanguageHelper::nameTranslate($address->getCountry) !!}
                                                @endif
                                                @if($address->getGovernment !=null)
                                                    {!! LanguageHelper::nameTranslate($address->getGovernment) !!}
                                                @endif

                                                @if($address->getCity !=null)
                                                    {!! LanguageHelper::nameTranslate($address->getCity) !!}
                                                @endif

                                                @if($address->getZone !=null)
                                                    {!! LanguageHelper::nameTranslate($address->getZone) !!}
                                                @endif

                                                {{$address->address}}

                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </form>
                </section>
            </div>
        </div>
    </div>

@stop

@section('js')
    <script>
        $(".tab-switch").click(function (e) {
            e.preventDefault();
            $('.return .returns-tab').hide();
            $($(this).data('target')).show();
        });

        $('.returned-products').change(() => {
            if ($('.returned-products:checked').length > 0) {
                $('.action-btn').show();
            } else {
                $('.action-btn').hide();
            }
        });

        $('#return-form [type="submit"]').click((e) => {
            e.preventDefault();
            let submitters = $('#return-form [type="submit"]');
            submitters.prop('disabled', true);

            let form = document.querySelector('#return-form');
            let formData = new FormData(form);
            let url = $(form).attr('action');

            $.ajax({
                'type': 'post',
                'url': url,
                data: formData,
                processData: false,
                contentType: false,
                'statusCode': {
                    200: function (response) {
                        if (response.code === 201) {
                            toastr["error"](response.message);
                            submitters.prop('disabled', false);
                        } else {
                            toastr["success"](response.message);

                            setTimeout(function () {
                                window.location = "{{route('front.returns.index')}}";
                            }, 3000);
                        }
                    },
                    422: function (response) {
                        $.map(response.responseJSON.errors, function (error) {
                            toastr["error"](error)
                        });
                        submitters.prop('disabled', false);
                    }
                },
            });
        })
    </script>
@endsection
