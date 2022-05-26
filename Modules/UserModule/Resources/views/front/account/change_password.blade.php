@extends('fronthomemodule::layouts.master')

@section('title')
    {{__('usermodule::account.change_password')}}
@endsection


@section('content')
@include('fronthomemodule::content.breadCrumbs',['pages'=>[__('usermodule::account.change_password')]])

<!-- main-container -->
<div class="main-container col2-right-layout">
    <div class="main container">
        <div class="row">
            @include('usermodule::front.account.menu')
            <section class="col-main col-md-9 col-sm-8 wow bounceInUp">
                <div class="my-account">
                    <div class="page-title title">
                        <h2>{{__('usermodule::account.change_password')}}</h2>
                    </div>
                    <form id="update_change_form" class="form">


                        <div class="fieldset" >
                            <h2 class="legend">{{__('usermodule::account.change_password')}}</h2>
                            <ul class="form-list">
                                <li class="fields">
                                  <div class="field">
                                      <label for="password" class="required">{{__('usermodule::account.old_password')}}<em>*</em></label>
                                      <div class="input-box">
                                          <input type="password" title="Old Password"
                                              class="input-text required-entry validate-password"
                                              name="old_password">
                                      </div>
                                  </div>

                                    <div class="field">
                                        <label for="password" class="required">{{__('usermodule::account.new_password')}}<em>*</em></label>
                                        <div class="input-box">
                                            <input type="password" title="New Password"
                                                class="input-text required-entry validate-password"
                                                name="password">
                                        </div>
                                    </div>
                                    <div class="field">
                                        <label for="confirmation" class="required">{{__('usermodule::account.confirm_new_password')}}<em>*</em></label>
                                        <div class="input-box">
                                            <input type="password" title="Confirm New Password"
                                                class="input-text required-entry validate-cpassword"
                                                name="password_confirmation">
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="buttons-set">
                              <div id="errors" style="color:red"></div>
                            <button type="submit" title="Save" class="button send"><span><span>{{__('usermodule::account.save')}}</span></span></button>
                        </div>
                    </form>
                </div>
            </section>

        </div>
    </div>
</div>
<!--End main-container -->


@section('js')
 @include('usermodule::front.auth.scripts')
 @endsection

@stop
