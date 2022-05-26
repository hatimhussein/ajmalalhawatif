@extends('fronthomemodule::layouts.master')

@section('title')
    {{__('usermodule::account.add_new_address')}}
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('assets\front\plugins\chosen\chosen.min.css') }}">
@endsection

@section('content')

    @include('fronthomemodule::content.breadCrumbs',['pages'=>[__('usermodule::account.add_new_address')]])

    <!-- main-container -->
    <div class="main-container col2-right-layout">
        <div class="main container">
            <div class="row">
                @include('usermodule::front.account.menu')
                <section class="col-main col-md-9 col-sm-8 wow bounceInUp">
                    <div class="my-account">
                        <div class="page-title title">
                            <h2>{{__('usermodule::account.add_new_address')}}</h2>
                        </div>
                        <form id="add_address_form" class="form">
                            <div class="fieldset">
                                <h2 class="legend">{{__('usermodule::account.add_new_address')}}</h2>
                                <ul class="form-list">
                                    <li style="display: none">
                                        <div class="customer-name row">
                                            <div class="field name-firstname col-md-6">
                                                <label for="country_id_text"
                                                       class="required">{{__('usermodule::login.country')}}
                                                    <em>*</em></label>
                                                <div class="input-box">
                                                    <input type="hidden" id="country_id" name="country_id" value="">
                                                    <input type="text" id="country_id_text" name="country_id_text"
                                                           class="form-control" value=""
                                                           disabled placeholder="{{__('usermodule::login.country')}}">
                                                </div>
                                            </div>
                                            <div class="field name-firstname col-md-6">
                                                <label for="government_id_text"
                                                       class="required">{{__('usermodule::login.zone')}}
                                                    <em>*</em></label>
                                                <div class="input-box">
                                                    <input type="hidden" id="government_id" name="government_id"
                                                           value="">
                                                    <input type="text" id="government_id_text" name="government_id_text"
                                                           class="form-control" value=""
                                                           disabled placeholder="{{__('usermodule::login.zone')}}">
                                                </div>
                                            </div>

                                        </div>
                                    </li>
                                    <li>
                                        <div class="customer-name row">

                                            <div class="field name-lastname col-md-6" style="display: none">
                                                <label for="city_id_text"
                                                       class="required">{{__('usermodule::login.city')}}
                                                    <em>*</em></label>
                                                <input type="hidden" id="city_id" name="city_id" value="">
                                                <input type="text" id="city_id_text" name="city_id_text"
                                                       class="form-control" value=""
                                                       disabled placeholder="{{__('usermodule::login.city')}}">
                                            </div>
                                            <div class="field name-firstname col-md-12">
                                                <label for="lastname"
                                                       class="required">{{__('usermodule::login.government')}}
                                                    <em>*</em></label>
                                                <div class="input-box">
                                                    <select id="zone_id" name="zone_id" title="Government"
                                                            class="validate-select required-entry chosen-select">
                                                        <option disabled selected
                                                                value="">{{__('usermodule::login.choose_government')}}</option>
                                                    </select>

                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="customer-name row">
                                            <div class="field name-firstname col-md-12">
                                                <label for="address"
                                                       class="required">{{__('usermodule::login.address')}}</label>
                                                <div class="input-box">
                                                    <input type="text" name="address" value="" title="" maxlength="255"
                                                           class="input-text required-entry">
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <div class="buttons-set">
                                <div id="errors" class="required"></div>
                                <button type="submit" title="Save" class="button send"><span><span>Save
                                        Address</span></span></button>
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
