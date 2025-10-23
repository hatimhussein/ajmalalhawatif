@extends('fronthomemodule::layouts.master')

@section('title')
    {{__('usermodule::login.login_head')}}
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('assets\front\plugins\chosen\chosen.min.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet"/>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/0.8.2/css/flag-icon.min.css" rel="stylesheet"/>
@endsection

@section('content')


    <!-- main-container -->
    <section class="main-container col1-layout">
        <div class="main container">
            <div class="account-login">
                <div class="page-title">
                    <h2>{{__('usermodule::login.login_head')}}</h2>
                </div>
                <fieldset class="col2-set row mrg-0" style="overflow: visible;">
                    <div class="registered-users col-lg-8 col-md-12  col-xs-12">
                        <strong class="col-sm-12 login-head">{{__('usermodule::login.signin')}}</strong>
                        <strong class="col-sm-12 register-head"
                                style="display:none;">{{__('usermodule::login.create_account')}}</strong>
                        <strong class="col-sm-12 merchant-login-head"
                                style="display:none;">{{__('usermodule::login.merchant_login_head')}}</strong>

                        <div class="col-md-8 login-sec">

                            <form id="loginForm" action="#" method="post">
                                <div class="content login-div">
                                    @if($phoneLogin)
                                        <button class="button btn register-selector phoneLogin"
                                                type="button" style="margin-bottom: 1em;">
                                            <i class="icon-phone-sign"></i>
                                            {{ __('usermodule::login.phone_login') }}
                                        </button>
                                    @endif
                                    <ul class="form-list">
                                        <li>
                                            <label for="email">{{__('usermodule::login.email')}} <span class="required">*</span></label>
                                            <br>
                                            <input type="email" name="email" title="Email Address"
                                                   class="input-text required-entry"
                                                   value="" autocomplete="off">
                                        </li>
                                        <li>
                                            <label for="pass">{{__('usermodule::login.password')}} <span
                                                    class="required">*</span></label>
                                            <br>
                                            <input type="password" name="password" title="Password"
                                                   class="input-text required-entry validate-password"
                                                   autocomplete="off">
                                            <i class="icon-eye-close"></i>
                                        </li>

                                    </ul>

                                    <div class="buttons-set set2" style="margin-bottom: 10px;">
                                        <div class="login-btns-holder">
                                            <button name="send" type="submit" class="button login send btn-block mb-0">
                                                <span>{{__('usermodule::login.login')}}</span>
                                            </button>
                                            <a class="forgot-word forgot-pass"
                                               href="#">{{__('usermodule::login.forgot_password')}}</a>
                                        </div>
                                    </div>
                                    <ul class="form-list">
                                        <li>
                                            <input type="checkbox" name="remember_me" title="remember_me"
                                                   id="remember_me">
                                            <label for="remember_me">{{__('usermodule::login.remember_me')}}</label>
                                        </li>
                                    </ul>

                                </div>
                            </form>

                            <form id="phoneLoginForm" class="auth-form" action="{{ url('login-by-phone') }}"
                                  method="post">
                                <div class="content phone-login-div" style="display: none">
                                    <button class="button btn register-selector back-login"
                                            type="button" style="margin-bottom: 1em;">
                                        <i class="icon-email"></i>
                                        {{ __('usermodule::login.email_login') }}
                                    </button>

                                    <ul class="form-list">
                                        <li class="">
                                            <label>{{__('usermodule::login.choose_phone_code')}} <span
                                                    class="required">*</span></label>
                                            <br>

                                            <select name="phone_code_id" title="Phone Code"
                                                    class="input-text required-entry select2" required
                                                    autocomplete="off">
                                            </select>
                                        </li>
                                        <li>
                                            <label for="phone">{{__('usermodule::login.phone')}} <span class="required">*</span></label>
                                            <br>
                                            <input name="phone" type="number" title="Phone Number" minlength="9"
                                                   maxlength="14"
                                                   placeholder="{{__('commonmodule::front.phone_placeholder')}}"
                                                   class="input-text required-entry"
                                                   value="" required>
                                        </li>
                                    </ul>
                                    <div class="buttons-set set2" style="margin-bottom: 10px;">
                                        <div class="login-btns-holder">
                                            <button name="send" type="submit" class="button login send btn-block mb-0">
                                                <span>{{__('usermodule::login.login')}}</span>
                                            </button>
                                            <a class="forgot-word forgot-pass"
                                               href="#">{{__('usermodule::login.forgot_password')}}</a>
                                        </div>
                                    </div>
                                    <ul class="form-list">
                                        <li>
                                            <input type="checkbox" name="remember_me" title="remember_me"
                                                   id="remember_me">
                                            <label for="remember_me">{{__('usermodule::login.remember_me')}}</label>
                                        </li>
                                    </ul>
                                </div>
                            </form>

                            <form id="verifyCodeForm" class="auth-form" action="{{ url('verify-phone-code') }}"
                                  method="post">
                                <input type="hidden" name="phone">
                                <div class="content verify-code-div" style="display: none">
                                    <ul class="form-list">
                                        <li>
                                            <label for="email">{{__('usermodule::login.code')}} <span
                                                    class="required">*</span></label>
                                            <br>
                                            <input name="code" type="number" title="Code"
                                                   class="input-text required-entry"
                                                   value="" required>
                                        </li>
                                    </ul>
                                    <div class="buttons-set set2">
                                        <button name="send" type="submit"
                                                class="button login send btn-block btn-forgot">
                                            <span>{{__('usermodule::login.login')}}</span>
                                        </button>
                                    </div>
                                </div>
                            </form>

                            <form id="registerForm" action="#" method="post">
                                <div class="content register-div ">

                                    <ul class="form-list ">
                                        <li>
                                            <label>{{__('usermodule::login.first_name')}} <span
                                                    class="required">*</span></label>
                                            <br>
                                            <input name="first_name" type="text" title="First Name" autocomplete="off"
                                                   class="input-text required-entry"
                                                   value="" autocomplete="off">
                                        </li>
                                        <li>
                                            <label>{{__('usermodule::login.last_name')}} <span class="required">*</span></label>
                                            <br>
                                            <input name="last_name" type="text" title="Last Name" autocomplete="off"
                                                   class="input-text required-entry"
                                                   value="" autocomplete="off">
                                        </li>
                                        <li>
                                            <label for="email">{{__('usermodule::login.email')}} <span class="required">*</span></label>
                                            <br>
                                            <input name="email" type="text" title="Email Address" autocomplete="off"
                                                   class="input-text required-entry"
                                                   value="" autocomplete="off">
                                        </li>
                                        <li>
                                            <label for="pass">{{__('usermodule::login.password')}} <span
                                                    class="required">*</span></label>
                                            <br>
                                            <input name="password" type="password" autocomplete="off" title="Password"
                                                   class="input-text required-entry validate-password"
                                                   autocomplete="off">
                                            <i class="icon-eye-close"></i>
                                        </li>
                                        <li>
                                            <label>{{__('usermodule::login.choose_phone_code')}} <span
                                                    class="required">*</span></label>
                                            <br>
                                            <select name="phone_code_id" title="Phone Code"
                                                    class="input-text required-entry select2" required
                                                    autocomplete="off">
                                            </select>
                                        </li>
                                        <li>
                                            <label>{{__('usermodule::login.phone')}} <span
                                                    class="required">*</span></label>
                                            <br>
                                            <input name="phone" type="number" title="Email Address" autocomplete="off"
                                                   placeholder="{{__('commonmodule::front.phone_placeholder')}}"
                                                   class="input-text required-entry" minlength="9" maxlength="14"
                                                   value="">
                                        </li>
                                        <li style="display: none">
                                            <label for="email">{{__('usermodule::login.country')}} <span
                                                    class="required">*</span></label>
                                            <br>
                                            <input type="hidden" id="country_id" name="country_id" value="">
                                            <input type="text" id="country_id_text" name="country_id_text"
                                                   class="form-control" value=""
                                                   disabled placeholder="{{__('usermodule::login.country')}}">
                                        </li>
                                        <li style="display: none">
                                            <label for="email">{{__('usermodule::login.zone')}} <span
                                                    class="required">*</span></label>
                                            <br>
                                            <input type="hidden" id="government_id" name="government_id" value="">
                                            <input type="text" id="government_id_text" name="government_id_text"
                                                   class="form-control" value=""
                                                   disabled placeholder="{{__('usermodule::login.zone')}}">
                                        </li>

                                        <li style="display: none">
                                            <label for="pass">{{__('usermodule::login.city')}} <span
                                                    class="required">*</span></label>
                                            <br>
                                            <input type="hidden" id="city_id" name="city_id" value="">
                                            <input type="text" id="city_id_text" name="city_id_text"
                                                   class="form-control" value=""
                                                   disabled placeholder="{{__('usermodule::login.city')}}">
                                        </li>
                                        <li>
                                            <label for="pass">{{__('usermodule::login.government')}} <span
                                                    class="required">*</span></label>
                                            <br>
                                            <select id="zone_id" name="zone_id" title="Email Address"
                                                    class="input-text required-entry chosen-select">
                                                <option disabled selected
                                                        value="">{{__('usermodule::login.choose_government')}}</option>
                                            </select>
                                        </li>

                                        <li class="accept_terms">
                                            <input type="checkbox" name="terms" title="terms & conditions"
                                                   id="terms" checked required>
                                            <label for="terms">
                                                {{__('usermodule::login.accept')}}
                                                <a href="{{ url('config/3') }}"
                                                   target="_blank">{{__('usermodule::login.terms_conditions')}}</a>
                                            </label>
                                        </li>
                                    </ul>


                                    <div class="buttons-set set2">
                                        <button name="send" type="submit"
                                                class="button login send btn-block btn-register bg-green text-white">
                                            <span>{{__('usermodule::login.register')}} </span></button>
                                        <div class="text-left t-r">
                                            <a class="forgot-word back-login"
                                               href="#">{{__('usermodule::login.back_to_login')}} </a>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <form id="merchantRegisterForm" action="#" method="post">
                                <div class="content merchantRegister-div ">

                                    <ul class="form-list ">
                                        <li>
                                            <label>{{__('usermodule::login.company_name')}} <span
                                                    class="required">*</span></label>
                                            <br>
                                            <input name="company_name" type="text" title="Company Name"
                                                   autocomplete="off" class="input-text required-entry"
                                                   value="">
                                        </li>
                                        <li>
                                            <label>{{__('usermodule::login.authorized_person')}} <span class="required">*</span></label>
                                            <br>
                                            <input name="authorized_person" type="text" title="Authorized person"
                                                   autocomplete="off" class="input-text required-entry"
                                                   value="">
                                        </li>

                                        <li>
                                            <label for="email">{{__('usermodule::login.email')}} <span class="required">*</span></label>
                                            <br>
                                            <input name="email" type="text" title="Email Address"
                                                   class="input-text required-entry"
                                                   value="" autocomplete="off">
                                        </li>
                                        <li>
                                            <label for="pass">{{__('usermodule::login.password')}} <span
                                                    class="required">*</span></label>
                                            <br>
                                            <input name="password" type="password" title="Password"
                                                   class="input-text required-entry validate-password"
                                                   autocomplete="off">
                                            <i class="icon-eye-close"></i>
                                        </li>
                                        <li>
                                            <label>{{__('usermodule::login.choose_phone_code')}} <span
                                                    class="required">*</span></label>
                                            <br>
                                            <select name="phone_code_id" title="Phone Code"
                                                    class="input-text required-entry select2" required
                                                    autocomplete="off">
                                            </select>
                                        </li>
                                        <li>
                                            <label>{{__('usermodule::login.phone')}} <span
                                                    class="required">*</span></label>
                                            <br>
                                            <input name="phone" type="number" title="Email Address" autocomplete="off"
                                                   placeholder="{{__('commonmodule::front.phone_placeholder')}}"
                                                   class="input-text required-entry" minlength="9" maxlength="14"
                                                   value="">
                                        </li>
                                        <li style="display: none">
                                            <label for="country_id_text2">{{__('usermodule::login.country')}} <span
                                                    class="required">*</span></label>
                                            <br>
                                            <input type="hidden" id="country_id2" name="country_id" value="">
                                            <input type="text" id="country_id_text2" name="country_id_text"
                                                   class="form-control" value=""
                                                   disabled placeholder="{{__('usermodule::login.country')}}">
                                        </li>
                                        <li style="display: none">
                                            <label for="government_id_text2">{{__('usermodule::login.zone')}} <span
                                                    class="required">*</span></label>
                                            <br>
                                            <input type="hidden" id="government_id2" name="government_id" value="">
                                            <input type="text" id="government_id_text2" name="government_id_text"
                                                   class="form-control" value=""
                                                   disabled placeholder="{{__('usermodule::login.zone')}}">
                                        </li>

                                        <li style="display: none">
                                            <label for="city_id_text2">{{__('usermodule::login.city')}} <span
                                                    class="required">*</span></label>
                                            <br>
                                            <input type="hidden" id="city_id2" name="city_id" value="">
                                            <input type="text" id="city_id_text2" name="city_id_text"
                                                   class="form-control" value=""
                                                   disabled placeholder="{{__('usermodule::login.city')}}">
                                        </li>
                                        <li>
                                            <label for="zone_id2">{{__('usermodule::login.government')}} <span
                                                    class="required">*</span></label>
                                            <br>
                                            <select id="zone_id2" name="zone_id" title="Email Address"
                                                    class="input-text required-entry chosen-select">
                                                <option disabled selected
                                                        value="">{{__('usermodule::login.choose_government')}}</option>
                                            </select>
                                        </li>

                                        <li class="accept_terms">
                                            <input type="checkbox" name="terms" title="terms & conditions"
                                                   id="terms" checked required>
                                            <label for="terms">
                                                {{__('usermodule::login.accept')}}
                                                <a href="{{ url('config/3') }}"
                                                   target="_blank">{{__('usermodule::login.terms_conditions')}}</a>
                                            </label>
                                        </li>
                                    </ul>


                                    <div class="buttons-set set2">
                                        <button name="send" type="submit"
                                                class="button login send btn-block btn-register bg-green text-white">
                                            <span>{{__('usermodule::login.register')}} </span></button>
                                        <div class="text-left t-r"><a class="forgot-word back-login"
                                                                      href="#">{{__('usermodule::login.back_to_login')}} </a>
                                        </div>
                                    </div>
                                </div>
                            </form>

                            <form id="resetPasswordForm" class="auth-form" action="{{ url('forgot-password')}}"
                                  method="post">
                                <div class="content forgotten-div">
                                    <div id="sociallogin-forgot">
                                        <span
                                            class="sociallogin-forgot-content">{{__('usermodule::login.reset_password_message')}}</span>
                                    </div>
                                    @if($resetSms)
                                        <button class="button btn register-selector phoneReset"
                                                type="button" style="margin-bottom: 1em;">
                                            <i class="icon-phone-sign"></i>
                                            {{ __('usermodule::login.phone_reset') }}
                                        </button>
                                    @endif
                                    <ul class="form-list">
                                        <li>
                                            <label
                                                for="email">{{__('usermodule::login.email')}}
                                                <span class="required">*</span></label>
                                            <br>
                                            <input name="email" type="text" title="Email Address"
                                                   class="input-text required-entry"
                                                   value="">
                                        </li>
                                    </ul>
                                    <div class="buttons-set set2">
                                        <button name="send" type="submit"
                                                class="button login send btn-block btn-forgot bg-green text-white">
                                            <span>{{ __('usermodule::login.send') }}</span></button>
                                        <div class="text-left t-r"><a class="forgot-word back-login"
                                                                      href="#">{{__('usermodule::login.back_to_login')}}</a>
                                        </div>
                                    </div>
                                </div>
                            </form>

                            <form id="resetPasswordPhone" class="auth-form" action="{{ url('forgot-password-phone')}}"
                                  method="post">
                                <div class="content phone-forgotten" style="display: none">
                                    <div id="sociallogin-forgot">
                                        <span
                                            class="sociallogin-forgot-content">{{__('usermodule::login.reset_password_message')}}</span>
                                    </div>
                                    <button class="button btn register-selector forgot-word forgot-pass"
                                            type="button" style="margin-bottom: 1em;">
                                        <i class="icon-email"></i>
                                        {{ __('usermodule::login.email_reset') }}
                                    </button>
                                    <ul class="form-list">
                                        <li class="">
                                            <label>{{__('usermodule::login.choose_phone_code')}} <span
                                                    class="required">*</span></label>
                                            <br>

                                            <select name="phone_code_id" title="Phone Code"
                                                    class="input-text required-entry select2" required
                                                    autocomplete="off">
                                            </select>
                                        </li>
                                        <li>
                                            <label
                                                for="phone">{{__('usermodule::login.phone')}}
                                                <span class="required">*</span></label>
                                            <br>
                                            <input name="phone" type="number" title="Phone Number" minlength="9"
                                                   maxlength="14"
                                                   placeholder="{{__('commonmodule::front.phone_placeholder')}}"
                                                   class="input-text required-entry"
                                                   value="" required>
                                        </li>
                                    </ul>
                                    <div class="buttons-set set2">
                                        <button name="send" type="submit"
                                                class="button login send btn-block btn-forgot bg-green text-white">
                                            <span>{{ __('usermodule::login.send') }}</span></button>
                                        <div class="text-left t-r"><a class="forgot-word back-login"
                                                                      href="#">{{__('usermodule::login.back_to_login')}}</a>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="col-md-4 login-sec login-left">
                            <div class="left-sec">
                                <p class="text-green">{{__('usermodule::login.no_account')}}</p>
                                <div class="login-btns-holder">
                                    <button class="button btn registerModalBtn bg-green text-white"
                                            type="button"
                                            style="font-size: 16px; padding: 9px 25px;">{{__('usermodule::login.register')}}</button>
                                </div>
                            </div>

                        </div>


                    </div>
                </fieldset>
            </div>
            <br>
            <br>
        </div>
    </section>
    <!--End main-container -->


    <!-- Start Modal -->
    <div class="modal registerModal" id="registerModal" tabindex="-1" role="dialog"
         aria-labelledby="exampleModalCenterTitle"
         aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6 col-sm-12">
                            <div class="register-selector-holder first">
                                <div class="register-selector merchantRegister" data-dismiss="modal">
                                    <i class="icon-suitcase"></i>
                                    <h3>{{ __('usermodule::login.merchant_register') }}</h3>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <div class="register-selector-holder">
                                <div class="register-selector register" data-dismiss="modal">
                                    <i class="icon-user"></i>
                                    <h3>{{ __('usermodule::login.user_register') }}</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--End Modal -->
@endsection

@section('js')
    @include('usermodule::front.auth.phone_code_scripts')

    <script>
        $('.registerModalBtn').click(function (e) {
            e.preventDefault();
            $('#registerModal').modal('show');
        });
    </script>

    @include('usermodule::front.auth.scripts')
@endsection


