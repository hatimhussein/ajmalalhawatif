@extends('fronthomemodule::layouts.master')

@section('title')
    {{__('usermodule::account.dashboard')}}
@endsection


@section('content')

    @include('fronthomemodule::content.breadCrumbs',['pages'=>[__('usermodule::account.dashboard')]])

    <!-- main-container -->
    <div class="main-container col2-right-layout">
        <div class="main container">
            <div class="row">
                @include('usermodule::front.account.menu')
                <section class="col-main col-md-9 col-sm-8 wow bounceInUp">
                    <div class="my-account">
                        <div class="page-title title">
                            <h2>{{__('usermodule::account.dashboard')}}</h2>
                        </div>
                        <div class="dashboard">
                            <div class="welcome-msg"><strong> {{__('usermodule::account.hello')}}
                                    , {{$user->first_name}} {{$user->last_name}}!</strong>
                                <p> {{__('usermodule::account.dashboard_word')}}</p>
                            </div>
                            <div class="box-account">
                                <div class="page-title">
                                    <h2>{{__('usermodule::account.account_information')}}</h2>
                                </div>
                                <div class="col2-set">
                                    <div class="head">
                                        <h5>{{__('usermodule::account.my_data')}}</h5>
                                        <a href="{{url('account-information')}}">{{__('usermodule::account.edit')}}</a>
                                    </div>
                                    <p> {{$user->email}}<br>
                                        {{$user->phone}}<br>
                                        @if($user->country!=null)
                                            {!! ($user->country)?LanguageHelper::nameTranslate($user->country):'' !!}
                                            <br>
                                        @endif
                                        @if($user->government!=null)
                                            {!! ($user->government)?LanguageHelper::nameTranslate($user->government):'' !!}
                                            <br>
                                        @endif
                                        @if($user->city!=null)
                                            {!! ($user->city)?LanguageHelper::nameTranslate($user->city):'' !!}<br>
                                        @endif
                                        @if($user->zone!=null)
                                            {!! ($user->zone)?LanguageHelper::nameTranslate($user->zone):'' !!}<br>
                                        @endif
                                        {{$user->address}}<br>

                                        <a href="{{url('change-password')}}">{{__('usermodule::account.change_password')}}</a>
                                    </p>
                                </div>

                                <div class="col2-set">
                                    <div class="head">
                                        <h5>{{__('usermodule::account.address_book')}}</h5>
                                        <a href="{{url('account-address')}}">{{__('usermodule::account.add_new_address')}}</a>
                                    </div>
                                    <div class="bag">

                                        <div class=" row">
                                            @foreach($user->addresses as $key=>$address)
                                                <div class="col-two col-lg-4 col-md-6 col-sm-12">
                                                    <!-- <h5>Shipping Address</h5> -->
                                                    <address>
                                                        @if($address->getCountry!=null)
                                                            {!! LanguageHelper::nameTranslate($address->getCountry) !!}
                                                            <br>
                                                        @endif
                                                        @if($address->getGovernment!=null)
                                                            {!! LanguageHelper::nameTranslate($address->getGovernment) !!}
                                                            <br>
                                                        @endif

                                                        @if($address->getCity != null)
                                                            {!! LanguageHelper::nameTranslate($address->getCity) !!}<br>
                                                        @endif
                                                        @if($address->getZone!=null)
                                                            {!! LanguageHelper::nameTranslate($address->getZone) !!}
                                                            <br>
                                                        @endif
                                                        {{$address->address}}<br>

                                                        <br>
                                                        <a href="{{url('account-address/'.$address->id.'/edit')}}">{{__('usermodule::account.edit')}}</a>
                                                        | <a href="javascript:void(0);" class="remove-address"
                                                             data-address_id="{{ $address->id }}">{{__('usermodule::account.remove')}}</a>
                                                    </address>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
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

@section('js')
    <script>
        $('.remove-address').click(function (e) {
            e.preventDefault();
            let clicked = $(this);
            let address_id = clicked.data('address_id');
            let _method = 'DELETE';
            let _token = "{{ csrf_token() }}";

            console.log('clicked');
            $.ajax({
                url: `account-address/${address_id}`,
                method: "POST",
                data: {_method, _token},
                statusCode: {
                    200: function (response) {
                        if (response.code == 201) {
                            toastr["error"](response.message);
                        } else {
                            clicked.parents('address').parent().remove();
                            toastr["success"](response.message);
                        }
                    },
                    422: function (response) {
                        toastr["error"]("{{__('commonmodule::validation.error')}}");
                    }
                }

            });
        })
    </script>
@endsection
