@extends('fronthomemodule::layouts.master')

@section('title')
    {{__('usermodule::account.my_account')}}
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('assets\front\plugins\chosen\chosen.min.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet"/>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/0.8.2/css/flag-icon.min.css" rel="stylesheet"/>
@endsection

@section('content')

    @include('fronthomemodule::content.breadCrumbs',['pages'=>[__('usermodule::account.my_account')]])

    <!-- main-container -->
    <div class="main-container col2-right-layout">
        <div class="main container">
            <div class="row">
                @include('usermodule::front.account.menu')
                <section class="col-main col-md-9 col-sm-8 wow bounceInUp">
                    <div class="my-account">
                        <div class="page-title title">
                            <h2>{{__('usermodule::account.edit_account_information')}}</h2>
                        </div>
                        <form id="update_merchant_informations" class="form">
                            <div class="fieldset">
                                <h2 class="legend">{{__('usermodule::account.account_information')}}</h2>
                                <ul class="form-list">
                                    <li class="fields">
                                        <div class="customer-name row">
                                            <div class="field name-firstname col-md-6">
                                                <label for="firstname"
                                                       class="required">{{__('usermodule::login.email')}}
                                                    <em>*</em></label>
                                                <div class="input-box">
                                                    <input type="email" name="email" value="{{$user->email}}"
                                                           title="Email" maxlength="255"
                                                           class="input-text required-entry">
                                                </div>
                                            </div>
                                            <div class="field name-firstname col-md-2">
                                                <label for="phone_code_id">{{__('usermodule::login.choose_phone_code')}}
                                                    <em>*</em>
                                                </label>
                                                <div class="input-box">
                                                    <select id="phone_code_id" name="phone_code_id" title="Phone Code"
                                                            class="input-text required-entry select2" required
                                                            autocomplete="off">
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="field name-lastname col-md-4">
                                                <label for="phone" class="required">{{__('usermodule::login.phone')}}
                                                    <em>*</em></label>
                                                <div class="input-box">
                                                    <input type="text" name="phone"
                                                           value="{{$user->phone}}" title="Phone" maxlength="14" minlength="9"
                                                           class="input-text required-entry">
                                                </div>
                                            </div>
                                        </div>
                                    </li>

                                    <li class="fields">
                                        <div class="customer-name row">
                                            <div class="field col-md-6">
                                                <label
                                                    for="commercial_register">{{__('usermodule::login.commercial_register')}}</label>
                                                <div class="input-box">
                                                    <input type="text" id="commercial_register"
                                                           name="commercial_register"
                                                           value="{{$user->commercial_register}}"
                                                           title="Commercial Register"
                                                           class="input-text">
                                                </div>
                                            </div>

                                            <div class="field col-md-6">
                                                <label
                                                    for="tax_number">{{__('usermodule::login.tax_number')}}</label>
                                                <div class="input-box">
                                                    <input type="text" id="tax_number"
                                                           name="tax_number"
                                                           value="{{$user->tax_number}}"
                                                           title="Tax Number"
                                                           class="input-text">
                                                </div>
                                            </div>
                                        </div>
                                    </li>

                                    <li class="fields">
                                        <div class="customer-name row">
                                            <div class="field name-firstname col-md-6" style="display:none">
                                                <label for="government_id"
                                                       class="required">{{__('usermodule::login.country')}}
                                                    <em>*</em></label>
                                                <div class="input-box">
                                                    <input type="hidden" id="country_id" name="country_id"
                                                           value="{{$user->country_id}}">
                                                    <input type="text" id="country_id_text"
                                                           class="form-control" value="{{$user->country->name}}"
                                                           disabled placeholder="{{__('usermodule::login.country')}}">
                                                </div>
                                            </div>
                                            <div class="field name-firstname col-md-6" style="display:none">
                                                <label for="government_id"
                                                       class="required">{{__('usermodule::login.zone')}}
                                                    <em>*</em></label>
                                                <div class="input-box">
                                                    <input type="hidden" id="government_id" name="government_id"
                                                           value="{{$user->government_id}}">
                                                    <input type="text" id="government_id_text" name="government_id_text"
                                                           class="form-control"
                                                           value="{{$user->government->name}}"
                                                           disabled placeholder="{{__('usermodule::login.zone')}}">
                                                </div>
                                            </div>
                                            <div class="field name-lastname col-md-6" style="display:none">
                                                <label for="lastname" class="required">{{__('usermodule::login.city')}}
                                                    <em>*</em></label>
                                                <input type="hidden" id="city_id" name="city_id"
                                                       value="{{ $user->city_id }}">
                                                <input type="text" id="city_id_text" name="city_id_text"
                                                       class="form-control" value="{{ $user->city->name }}"
                                                       disabled placeholder="{{__('usermodule::login.city')}}">
                                            </div>
                                            <div class="field name-firstname col-md-12">
                                                <label for="lastname"
                                                       class="required">{{__('usermodule::login.government')}}
                                                    <em>*</em></label>
                                                <div class="input-box">
                                                    <select id="zone_id" name="zone_id" title="Government"
                                                            class="input-text required-entry chosen-select">
                                                        <option disabled selected
                                                                value="">{{__('usermodule::login.choose_government')}}</option>
                                                        @foreach($zones as $zone)
                                                            <option
                                                                {{($zone->id==$user->zone_id)?'selected':''}} value="{{$zone->id}}">{!! LanguageHelper::nameTranslate($zone) !!}</option>
                                                        @endforeach
                                                    </select>

                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="fields">
                                        <div class="customer-name row">
                                            <div class="field name-lastname col-md-12">
                                                <label for="address"
                                                       class="required">{{__('usermodule::login.address')}}
                                                    <em>*</em></label>
                                                <div class="input-box">
                                                    <input type="text" name="address"
                                                           value="{{$user->address}}" title="Last Name" maxlength="255"
                                                           class="input-text required-entry">
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="fields">
                                        <div class="customer-name row">
                                            <div class="field col-md-6">
                                                <label
                                                    for="logo">{{__('usermodule::login.logo')}}</label>
                                                <div class="input-box">
                                                    <input type="file" id="logo"
                                                           name="logo"
                                                           class="input-text">
                                                </div>
                                            </div>
                                            @if($user->logo)
                                                <div class="field col-md-6">
                                                    <label
                                                        for="tax_number">{{__('usermodule::login.logo')}}</label>
                                                    <div class="input-box">
                                                        <img class="merchant-logo" src="{{asset('images/user/'.$user->logo)}}"
                                                             alt="{{$user->name}}-Logo">
                                                    </div>
                                                </div>
                                            @endif
                                        </div>
                                    </li>


                                </ul>
                            </div>


                            <div class="buttons-set">
                                <p class="required">{{ __('usermodule::account.required_fields') }}</p>
                                <button type="submit" title="Save" class="button send">
                                    <span><span>{{__('usermodule::login.save')}}</span></span></button>
                            </div>
                        </form>
                    </div>
                </section>

            </div>
        </div>
    </div>
    <!--End main-container -->
@stop


@section('js')
    @include('usermodule::front.auth.phone_code_scripts')
    @include('usermodule::front.auth.scripts')
@endsection


