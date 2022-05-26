@extends('commonmodule::layouts.master')

@section('css')
    <!-- <link rel="stylesheet" href="{{ asset('assets/admin/css/design-css/design.css')}}" type="text/css" >
<link rel="stylesheet" href="{{ asset('assets/admin/css/design-css/design-icons.css')}}" type="text/css" > -->
    <link rel="stylesheet" href="{{ asset('assets/admin/css/forms/form-validation.css')}}" type="text/css">

@endsection


@section('title')
    {{__('usermodule::admin.edit_user')}}
@endsection

@section('content')
    <div id="content" class="main-content">
        <div class="container">
            <div class="page-header">
                <div class="page-title">
                    <h3>{{__('usermodule::admin.users')}}</h3>
                    <div class="crumbs">
                        <ul id="breadcrumbs" class="breadcrumb">
                            <li><a href="{{url('/admin')}}"><i class="flaticon-home-fill"></i></a></li>
                            <li><a href="{{url('admin/users')}}">{{__('usermodule::admin.users')}}</a></li>
                            <li class="active"><a href="#">{{__('usermodule::admin.edit_user')}}</a></li>
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
                                    <h4>{{__('usermodule::admin.edit_user')}}</h4>
                                </div>
                            </div>
                        </div>

                        <div class="widget-content widget-content-area">
                            <form action="{{url('admin/users/'.$user->id)}}" method="POST" class="needs-validation"
                                  novalidate>
                                @csrf
                                @method('PUT')
                                <div class="form-row">
                                    <div class="col-md-4 mb-3">
                                        <label for="validationCustom01">{{__('usermodule::login.first_name')}}</label>
                                        <input name="first_name"
                                               value="{{ old('first_name') ?? $user->first_name }}"
                                               class="form-control"
                                               id="validationCustom01"
                                               placeholder="{{__('usermodule::login.first_name')}}"
                                               required>
                                        <div class="invalid-feedback">

                                        </div>
                                        @if ($errors->has('first_name'))
                                            @include('commonmodule::includes.error',['errors'=>$errors->toArray(),'filed'=>'first_name'])
                                        @endif

                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="validationCustom02">{{__('usermodule::login.last_name')}}</label>
                                        <input name="last_name" class="form-control"
                                               value="{{ old('last_name') ?? $user->last_name }}"
                                               id="validationCustom02"
                                               placeholder="{{__('usermodule::login.last_name')}}" required>
                                        <div class="invalid-feedback">

                                        </div>
                                        @if ($errors->has('last_name'))
                                            @include('commonmodule::includes.error',['errors'=>$errors->toArray(),'filed'=>'last_name'])
                                        @endif

                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="validationCustomUsername">{{__('adminmodule::admin.email')}}</label>
                                        <div class="input-group">
                                            <input name="email" type="email"
                                                   value="{{ old('email') ?? $user->email }}"
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
                                </div>
                                <div class="form-row">
                                    <div class="col-md-4 mb-3">
                                        <label for="validationCustom03">{{__('adminmodule::admin.password')}}</label>
                                        <input type="text" name="password" minlength="6" value="{{old('password')}}"
                                               class="form-control" id="validationCustom03"
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
                                                                            ? 'selected' : ($user->phone_code_id == $code->id
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
                                        <input type="text" name="phone" minlength="9" maxlength="14"
                                               value="{{ old('phone') ?? $user->phone }}"
                                               class="form-control" id="validationCustom03"
                                               placeholder="{{__('adminmodule::admin.phone')}}" required>
                                        <div class="invalid-feedback">

                                        </div>
                                        @if ($errors->has('phone'))
                                            @include('commonmodule::includes.error',['errors'=>$errors->toArray(),'filed'=>'phone'])
                                        @endif

                                    </div>
                                    <div class="col-lg-2">
                                        <div class="statbox widget box box-shadow">
                                            <label
                                                class="mb-3"> {{__('ordermodule::payment.cash_on_delivery')}}</label>
                                            <br>
                                            <label class="switch s-success  mb-4 mr-2">
                                                <input type="hidden" name="can_cash" value="0">
                                                <input name="can_cash" value="1"
                                                       type="checkbox" {{($user->can_cash)?'checked':''}}>
                                                <span class="slider round"></span>
                                            </label>
                                        </div>
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
                                                <option {{ $country->id == $user->country_id ? 'selected' : '' }}
                                                        value="{{$country->id}}">{!! LanguageHelper::nameTranslate($country) !!}</option>
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
                                                <option {{ $government->id == $user->government_id ? 'selected' : '' }}
                                                        value="{{$government->id}}">{!! LanguageHelper::nameTranslate($government) !!}</option>
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
                                                <option {{ $city->id == $user->city_id ? 'selected' : '' }}
                                                        value="{{$city->id}}">{!! LanguageHelper::nameTranslate($city) !!}</option>
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
                                                <option {{ $zone->id == $user->zone_id ? 'selected' : '' }}
                                                        value="{{$zone->id}}">{!! LanguageHelper::nameTranslate($zone) !!}</option>
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
    @include('commonmodule::front.includes.common_scripts');
@endsection
