@extends('fronthomemodule::layouts.master')

@section('title')
    {{__('usermodule::account.edit_address')}}
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('assets\front\plugins\chosen\chosen.min.css') }}">
@endsection

@section('content')

    @include('fronthomemodule::content.breadCrumbs',['pages'=>[__('usermodule::account.edit_address')]])

    <!-- main-container -->
    <div class="main-container col2-right-layout">
        <div class="main container">
            <div class="row">
                @include('usermodule::front.account.menu')
                <section class="col-main col-md-9 col-sm-8 wow bounceInUp">
                    <div class="my-account">
                        <div class="page-title title">
                            <h2> {{__('usermodule::account.edit_address')}}</h2>
                        </div>
                        <form id="update_address_form" class="form">
                            <input type="hidden" name="id" value="{{$address->id}}">
                            <div class="fieldset">
                                <h2 class="legend">{{__('usermodule::account.edit_address')}}</h2>
                                <ul class="form-list">
                                    <li>
                                        <div class="customer-name row">
                                            <div class="field name-firstname col-md-6" style="display: none">
                                                <label for="government_id"
                                                       class="required">{{__('usermodule::login.country')}}
                                                    <em>*</em></label>
                                                <div class="input-box">
                                                    <input type="hidden" id="country_id" name="country_id"
                                                           value="{{$address->country_id}}">
                                                    <input type="text" id="country_id_text" name="country_id_text"
                                                           class="form-control" value="{{$address->getCountry->name}}"
                                                           disabled placeholder="{{__('usermodule::login.country')}}">
                                                </div>
                                            </div>
                                            <div class="field name-firstname col-md-6" style="display: none">
                                                <label for="government_id"
                                                       class="required">{{__('usermodule::login.zone')}}
                                                    <em>*</em></label>
                                                <div class="input-box">
                                                    <input type="hidden" id="government_id" name="government_id"
                                                           value="{{$address->government_id}}">
                                                    <input type="text" id="government_id_text" name="government_id_text"
                                                           class="form-control"
                                                           value="{{$address->getGovernment->name}}"
                                                           disabled placeholder="{{__('usermodule::login.zone')}}">
                                                </div>
                                            </div>
                                            <div class="field name-lastname col-md-6" style="display: none">
                                                <label for="lastname" class="required">{{__('usermodule::login.city')}}
                                                    <em>*</em></label>
                                                <input type="hidden" id="city_id" name="city_id"
                                                       value="{{ $address->city_id }}">
                                                <input type="text" id="city_id_text" name="city_id_text"
                                                       class="form-control" value="{{ $address->getCity->name }}"
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
                                                                {{($zone->id==$address->zone_id)?'selected':''}} value="{{$zone->id}}">{!! LanguageHelper::nameTranslate($zone) !!}</option>
                                                        @endforeach
                                                    </select>

                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="customer-name row">
                                            <div class="field name-firstname col-md-12">
                                                <label for="address" class="required">Address</label>
                                                <div class="input-box">
                                                    <input type="text" name="address" value="{{$address->address}}"
                                                           title="" maxlength="255"
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
