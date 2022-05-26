@extends('fronthomemodule::layouts.master')

@section('title')
    {{__('usermodule::login.resetpassword')}}
@endsection


@section('content')


<!-- main-container -->
<section class="main-container col1-layout">
    <div class="main container">
        <div class="account-login">
            <div class="page-title">

            </div>
            <fieldset class="col2-set row mrg-0">
                <div class="registered-users col-lg-6 col-md-8 col-sm-8 col-xs-8">
                  <strong class="col-sm-12 login-head">{{__('usermodule::login.resetpassword')}}</strong>

                  <div class="col-md-6 login-sec">

                    <form id="reset_password_form"  method="post">
                      <input type="hidden" name="token" value="{{$token}}">

                      <div class="content login-div">
                          <ul class="form-list">
                              <li>
                                  <label for="password">{{__('usermodule::account.new_password')}} <span class="required">*</span></label>
                                  <br>
                                  <input type="password" name="password" title="password" class="input-text required-entry"
                                      value="">
                              </li>
                              <li>
                                  <label for="password">{{__('usermodule::account.confirm_new_password')}} <span class="required">*</span></label>
                                  <br>
                                  <input type="password" name="password_confirmation" title="password" class="input-text required-entry"
                                      value="">
                              </li>

                          </ul>
                          <div class="buttons-set set2">
                              <button name="send" type="submit"
                                  class="button login send btn-block"><span>{{__('usermodule::account.save')}}</span></button>
                          </div>
                      </div>
                    </form>

                </div>
            </fieldset>
        </div>
        <br>
        <br>
    </div>
</section>
<!--End main-container -->


@section('js')
 @include('usermodule::front.auth.scripts')
 @endsection


@stop
