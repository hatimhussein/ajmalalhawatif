@extends('commonmodule::layouts.master')

@section('css')
    <!-- <link rel="stylesheet" href="{{ asset('assets/admin/css/design-css/design.css')}}" type="text/css" >
<link rel="stylesheet" href="{{ asset('assets/admin/css/design-css/design-icons.css')}}" type="text/css" > -->
    <link rel="stylesheet" href="{{ asset('assets/admin/css/forms/form-validation.css')}}" type="text/css">

@endsection

@section('title')
    {{__('adminmodule::admin.updateMerchant')}}
@endsection

@section('content')
    <div id="content" class="main-content">
        <div class="container">
            <div class="page-header">
                <div class="page-title">
                    <h3>{{__('adminmodule::admin.merchants')}}</h3>
                    <div class="crumbs">
                        <ul id="breadcrumbs" class="breadcrumb">
                            <li><a href="{{url('/admin')}}"><i class="flaticon-home-fill"></i></a></li>
                            <li><a href="{{url('admin/admins')}}">{{__('adminmodule::admin.merchants')}}</a></li>
                            <li class="active"><a href="#">{{__('adminmodule::admin.updateMerchant')}}</a></li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12 layout-spacing col-md-12">
                    <div class="statbox widget box box-shadow">
                        <div class="widget-header">
                            <div class="row">
                                <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                    <h4>{{__('adminmodule::admin.updateMerchant')}}</h4>
                                </div>
                            </div>
                        </div>

                        <div class="widget-content widget-content-area">
                            <form action="{{url('admin/merchants/'.$merchant->id)}}" method="POST"
                                  class="needs-validation" novalidate enctype="multipart/form-data">
                                @csrf
                                @method('put')
                                <div class="form-row">
                                    <div class="col-md-4 mb-3">
                                        <label
                                            for="validationCustom01">{{__('adminmodule::admin.company_name')}}</label>
                                        <input name="company_name" value="{{ $merchant->company_name }}"
                                               class="form-control" id="validationCustom01"
                                               placeholder="{{__('adminmodule::admin.company_name')}}" required>
                                        <div class="invalid-feedback">

                                        </div>
                                        @if ($errors->has('company_name'))
                                            @include('commonmodule::includes.error',['errors'=>$errors->toArray(),'filed'=>'company_name'])
                                        @endif

                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label
                                            for="validationCustom02">{{__('adminmodule::admin.authorized_person')}}</label>
                                        <input name="authorized_person" value="{{ $merchant->authorized_person }}"
                                               class="form-control" id="validationCustom02"
                                               placeholder="{{__('adminmodule::admin.authorized_person')}}" required>
                                        <div class="invalid-feedback">

                                        </div>
                                        @if ($errors->has('authorized_person'))
                                            @include('commonmodule::includes.error',['errors'=>$errors->toArray(),'filed'=>'authorized_person'])
                                        @endif

                                    </div>

                                    <div class="col-md-4 mb-3">
                                        <label
                                            for="logo">{{__('usermodule::login.logo')}}</label>
                                        <input name="logo"
                                               class="form-control" id="logo" type="file"
                                               placeholder="{{__('usermodule::login.logo')}}">
                                        <div class="invalid-feedback">

                                        </div>
                                        @if ($errors->has('logo'))
                                            @include('commonmodule::includes.error',['errors'=>$errors->toArray(),'filed'=>'logo'])
                                        @endif
                                    </div>

                                </div>
                                <div class="form-row">
                                    <div class="col-md-4 mb-3">
                                        <label
                                            for="commercial_register">{{__('usermodule::login.commercial_register')}}</label>
                                        <input name="commercial_register"
                                               value="{{ old('commercial_register') ?? $merchant->commercial_register }}"
                                               class="form-control" id="commercial_register"
                                               placeholder="{{__('usermodule::login.commercial_register')}}">
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label
                                            for="tax_number">{{__('usermodule::login.tax_number')}}</label>
                                        <input name="tax_number"
                                               value="{{ old('tax_number') ?? $merchant->tax_number }}"
                                               class="form-control" id="tax_number"
                                               placeholder="{{__('usermodule::login.tax_number')}}">
                                    </div>
                                    @if($merchant->logo)
                                        <div class="col-md-4 mb-3">
                                            <label
                                                for="tax_number"></label>
                                            <h4 class="text-center danger">
                                                <a href="{{asset('images/user/'.$merchant->logo)}}" target="_blank">
                                                    {{__('adminmodule::admin.view_logo')}}
                                                </a>
                                            </h4>
                                        </div>
                                    @endif
                                </div>
                                <div class="form-row">
                                    <div class="col-md-4 mb-3">
                                        <label for="validationCustomUsername">{{__('adminmodule::admin.email')}}</label>
                                        <div class="input-group">
                                            <!-- <div class="input-group-prepend">
                                                <span class="input-group-text" id="inputGroupPrepend">@</span>
                                            </div> -->
                                            <input name="email" type="email" value="{{ $merchant->email }}"
                                                   class="form-control" id="validationCustomUsername"
                                                   placeholder="Example@gmail.com" aria-describedby="inputGroupPrepend"
                                                   required>
                                            <div class="invalid-feedback">
                                                Please Enter Valid Email Address
                                            </div>
                                            @if ($errors->has('email'))
                                                @include('commonmodule::includes.error',['errors'=>$errors->toArray(),'filed'=>'email'])
                                            @endif

                                        </div>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="validationCustom03">{{__('adminmodule::admin.password')}}</label>
                                        <input type="text" name="password" minlength="6" value="" class="form-control"
                                               id="validationCustom03"
                                               placeholder="{{__('adminmodule::admin.password')}}">
                                        <div class="invalid-feedback">
                                            MinLength 6 Char
                                        </div>
                                        @if ($errors->has('password'))
                                            @include('commonmodule::includes.error',['errors'=>$errors->toArray(),'filed'=>'password'])
                                        @endif

                                    </div>
                                    <div class="col-md-2 mb-3">
                                        <label for="phone_code_id">{{__('usermodule::login.choose_phone_code')}}</label>
                                        <select id="phone_code_id" name="phone_code_id" title="Phone Code"
                                                class="form-control" required>
                                            <option disabled selected
                                                    value="">{{__('usermodule::login.choose_phone_code')}}</option>
                                            @foreach($phone_codes as $code)
                                                <option
                                                    value="{{$code->id}}" {{ old('phone_code_id') == $code->id
                                                                            ? 'selected' : ($merchant->phone_code_id == $code->id
                                                                            ? 'selected' : ($code->status ? 'selected' : '')) }}>
                                                    {!! $code->iso . ' ' . $code->code !!}</option>
                                            @endforeach
                                        </select>
                                        <div class="invalid-feedback">
                                            required
                                        </div>
                                        @if ($errors->has('phone_code_id'))
                                            @include('commonmodule::includes.error',['errors'=>$errors->toArray(),'filed'=>'phone_code_id'])
                                        @endif
                                    </div>
                                    <div class="col-md-2 mb-3">
                                        <label for="validationCustom03">{{__('adminmodule::admin.phone')}}</label>
                                        <input type="text" name="phone" value="{{$merchant->phone}}" minlength="9" maxlength="14"
                                               class="form-control" id="validationCustom03"
                                               placeholder="{{__('adminmodule::admin.phone')}}" required>
                                        <div class="invalid-feedback">

                                        </div>
                                        @if ($errors->has('phone'))
                                            @include('commonmodule::includes.error',['errors'=>$errors->toArray(),'filed'=>'phone'])
                                        @endif

                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-lg-2">
                                        <div class="statbox widget box box-shadow">
                                            <label class="mb-3"> {{__('adminmodule::admin.status')}}</label>
                                            <br>
                                            <label class="switch s-success  mb-4 mr-2">
                                                <input name="status"
                                                       type="checkbox" {{($merchant->is_active)?'checked':''}}>
                                                <span class="slider round"></span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-2">
                                        <div class="statbox widget box box-shadow">
                                            <label
                                                class="mb-3"> {{__('adminmodule::admin.has_forward_account')}}</label>
                                            <br>
                                            <label class="switch s-success  mb-4 mr-2">
                                                <input type="hidden" name="has_forward_account" value="0">
                                                <input name="has_forward_account" value="1"
                                                       type="checkbox" {{($merchant->has_forward_account)?'checked':''}}>
                                                <span class="slider round"></span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-2">
                                        <div class="statbox widget box box-shadow">
                                            <label
                                                class="mb-3"> {{__('ordermodule::payment.cash_on_delivery')}}</label>
                                            <br>
                                            <label class="switch s-success  mb-4 mr-2">
                                                <input type="hidden" name="can_cash" value="0">
                                                <input name="can_cash" value="1"
                                                       type="checkbox" {{($merchant->can_cash)?'checked':''}}>
                                                <span class="slider round"></span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-2">
                                        <div class="statbox widget box box-shadow">
                                            <label
                                                class="mb-3"> {{__('ordermodule::payment.bank_transfer')}}</label>
                                            <br>
                                            <label class="switch s-success  mb-4 mr-2">
                                                <input type="hidden" name="bank_transfer" value="0">
                                                <input name="bank_transfer" value="1"
                                                       type="checkbox" {{($merchant->bank_transfer)?'checked':''}}>
                                                <span class="slider round"></span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4 mb-3">
                                        <label
                                            for="validationCustom03">{{__('adminmodule::admin.account_number')}}</label>
                                        <input type="text" name="account_number"
                                               value="{{old('account_number') ?? $merchant->account_number}}"
                                               minlength="4" class="form-control" id="validationCustom03"
                                               placeholder="{{__('adminmodule::admin.account_number')}}" required>
                                        <div class="invalid-feedback">

                                        </div>
                                        @if ($errors->has('account_number'))
                                            @include('commonmodule::includes.error',['errors'=>$errors->toArray(),'filed'=>'account_number'])
                                        @endif

                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="validationCustom03">{{__('adminmodule::admin.price_level')}}</label>
                                        <select id="prices_level" name="prices_level" title="prices_level"
                                                class="form-control" required>
                                            <option disabled selected
                                                    value="">{{__('adminmodule::admin.price_level')}} </option>
                                            <option
                                                value="1" {{($merchant->prices_level == 1)?'selected':''}}>{{__('adminmodule::admin.first_level')}}</option>
                                            <option
                                                value="2" {{($merchant->prices_level == 2)?'selected':''}}>{{__('adminmodule::admin.second_level')}}</option>
                                            <option
                                                value="3" {{($merchant->prices_level == 3)?'selected':''}}>{{__('adminmodule::admin.third_level')}}</option>
                                            <option
                                                value="4" {{($merchant->prices_level == 4)?'selected':''}}>{{__('adminmodule::admin.fourth_level')}}</option>
                                            <option
                                                value="5" {{($merchant->prices_level == 5)?'selected':''}}>{{__('adminmodule::admin.fifth_level')}}</option>
                                        </select>
                                        @if ($errors->has('prices_level'))
                                            @include('commonmodule::includes.error',['errors'=>$errors->toArray(),'filed'=>'prices_level'])
                                        @endif

                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3 mb-3">
                                        <label for="validationCustom03">{{__('usermodule::login.country')}}</label>
                                        <br>
                                        <select id="country_id" name="country_id" title="Country" class="form-control"
                                                required>
                                            <option disabled selected
                                                    value="">{{__('usermodule::login.choose_country')}}</option>
                                            @foreach($countries as $country)
                                                <option
                                                    value="{{$country->id}}" {{($merchant->country_id == $country->id)?'selected':''}}>{!! LanguageHelper::nameTranslate($country) !!}</option>
                                            @endforeach
                                        </select>
                                        @if ($errors->has('country_id'))
                                            @include('commonmodule::includes.error',['errors'=>$errors->toArray(),'filed'=>'country_id'])
                                        @endif

                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <label for="validationCustom03">{{__('usermodule::login.zone')}}</label>
                                        <br>
                                        <select id="government_id" name="government_id" title="Zone"
                                                class="form-control" required>
                                            <option disabled selected
                                                    value="">{{__('usermodule::login.choose_zone')}}</option>
                                            @foreach($governments as $government)
                                                <option
                                                    value="{{$government->id}}" {{($merchant->government_id == $government->id)?'selected':''}}>{!! LanguageHelper::nameTranslate($government) !!}</option>
                                            @endforeach
                                        </select>
                                        @if ($errors->has('government_id'))
                                            @include('commonmodule::includes.error',['errors'=>$errors->toArray(),'filed'=>'government_id'])
                                        @endif

                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <label for="validationCustom03">{{__('usermodule::login.city')}}</label>
                                        <br>
                                        <select id="city_id" name="city_id" title="city" class="form-control" required>
                                            <option disabled selected
                                                    value="">{{__('usermodule::login.choose_city')}}</option>
                                            @foreach($cities as $city)
                                                <option
                                                    value="{{$city->id}}" {{($merchant->city_id == $city->id)?'selected':''}}>{!! LanguageHelper::nameTranslate($city) !!}</option>
                                            @endforeach
                                        </select>
                                        @if ($errors->has('city_id'))
                                            @include('commonmodule::includes.error',['errors'=>$errors->toArray(),'filed'=>'city_id'])
                                        @endif

                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <label for="validationCustom03">{{__('usermodule::login.government')}}</label>
                                        <br>
                                        <select id="zone_id" name="zone_id" title="zone" class="form-control" required>
                                            <option disabled selected
                                                    value="">{{__('usermodule::login.choose_government')}}</option>
                                            @foreach($zones as $zone)
                                                <option
                                                    value="{{$zone->id}}" {{($merchant->zone_id == $zone->id)?'selected':''}}>{!! LanguageHelper::nameTranslate($zone) !!}</option>
                                            @endforeach
                                        </select>
                                        @if ($errors->has('zone_id'))
                                            @include('commonmodule::includes.error',['errors'=>$errors->toArray(),'filed'=>'zone_id'])
                                        @endif

                                    </div>
                                </div>
                                <button class="btn btn-gradient-danger"
                                        type="submit">{{__('adminmodule::admin.save')}}</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>


@stop

@section('js')
    <script src="{{ asset('assets/admin/js/forms/bootstrap_validation/bs_validation_script.js')}}"></script>
    @include('commonmodule::front.includes.basic_area_scripts');
@endsection
