@extends('fronthomemodule::layouts.master')

@section('title')
    {{__('usermodule::login.activation_code')}}
@endsection


@section('content')


<!-- main-container -->
<section class="main-container col1-layout">
    <div class="main container">
        <div class="account-login">
            <div class="page-title">
                <h2>{{__('usermodule::login.activate_title')}}</h2>
            </div>
            <fieldset class="col2-set row mrg-0">
                <div class="registered-users col-lg-6 col-md-8 col-sm-8 col-xs-8">
                  <strong class="col-sm-12 login-head">{{__('usermodule::login.activation_code')}}</strong>

                  <div class="col-md-6 login-sec">

                    <form id="activation_form"  method="post">
                      <div class="content login-div">
                          <ul class="form-list">
                              <li>
                                  <label for="code">{{__('usermodule::login.code')}} <span class="required">*</span></label>
                                  <br>
                                  <input type="text" name="code" title="Code" class="input-text required-entry"
                                      value="">
                              </li>
                          </ul>
                          <div class="buttons-set set2">
                              <button name="send" type="submit"
                                  class="button login send btn-block"><span>{{__('usermodule::login.active')}}</span></button>
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
