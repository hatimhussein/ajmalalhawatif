<div class="col-md-4 fl-r">
    <div class="opc-col-left">

        <div id="co-billing-form">
            <li class="wide">
                <label for="billing-address-select" class="notice">{{__('ordermodule::checkout.address_text')}}</label>
                <div class="input-box">
                    <select data-from="address" name="shipping_address_id" id="billing-address-select"
                            class="address-select validation-passed" title="">
                        <option value="" selected="selected">{{__('ordermodule::checkout.new_adderess')}}</option>

                        @foreach($user_addresses as $address)
                            <option value="{{$address->id}}">

                                @if($address->getCountry !=null)
                                    {!! LanguageHelper::nameTranslate($address->getCountry) !!}
                                @endif
                                @if($address->getGovernment !=null)
                                    {!! LanguageHelper::nameTranslate($address->getGovernment) !!}
                                @endif

                                @if($address->getCity !=null)
                                    {!! LanguageHelper::nameTranslate($address->getCity) !!}
                                @endif

                                @if($address->getZone !=null)
                                    {!! LanguageHelper::nameTranslate($address->getZone) !!}
                                @endif

                                {{$address->address}}

                            </option>
                        @endforeach
                    </select></div>
            </li>

            <ul class="form-list" id="new_address">
                <li id="billing-new-address-form" style="display:block;">
                    <fieldset>
                        <ul>

                            <li class="fields" style="display: none">
                                <div class="field">
                                    <label for="country_id_text" class="required">{{__('usermodule::login.country')}}
                                        <em>*</em></label>
                                    <div class="input-box">
                                        <input type="hidden" id="country_id" name="country_id" value="">
                                        <input type="text" id="country_id_text" name="country_id_text"
                                               class="form-control" value=""
                                               disabled placeholder="{{__('usermodule::login.country')}}">
                                    </div>

                                </div>
                            </li>

                            <li class="fields" style="display: none">
                                <div class="field">
                                    <label for="government_id_text" class="required">{{__('usermodule::login.zone')}}
                                        <em>*</em></label>
                                    <div class="input-box">
                                        <input type="hidden" id="government_id" name="government_id" value="">
                                        <input type="text" id="government_id_text" name="government_id_text"
                                               class="form-control" value=""
                                               disabled placeholder="{{__('usermodule::login.zone')}}">
                                    </div>

                                </div>
                            </li>

                            <li class="fields">
                                <div class="row">
                                    <div class="field col-md-6 che" style="display: none">
                                        <label for="city_id_text" class="required">{{__('usermodule::login.city')}}
                                            <em>*</em></label>
                                        <div class="input-box">
                                            <input type="hidden" id="city_id" name="city_id" value="">
                                            <input type="text" id="city_id_text" name="city_id_text"
                                                   class="form-control" value=""
                                                   disabled placeholder="{{__('usermodule::login.city')}}">
                                        </div>
                                    </div>
                                    <div class="field col-md-12 che">
                                        <label for="zone_id"
                                               class="required">{{__('usermodule::login.government')}}<em>*</em></label>
                                        <div class="input-box">
                                            <select id="zone_id" name="zone_id" title="government"
                                                    class="validate-select validation-passed chosen-select">
                                                <option value="">{{__('usermodule::login.choose_government')}}</option>

                                            </select>

                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="wide">
                                <label for="shipping:street1" class="required">{{__('usermodule::login.address')}}
                                    <em>*</em></label>
                                <div class="input-box">
                                    <input type="text" title="Street Address" name="address"
                                           id="shipping:street1" value=""
                                           class="input-text  required-entry validation-passed">
                                </div>
                            </li>
                        </ul>
                    </fieldset>
                </li>


                <li class="control hidden">
                    <input type="checkbox" name="shipping[use_for_shipping]" id="shipping:use_for_shipping_yes"
                           value="1" title="Ship to this address"
                           class="checkbox validation-passed"><label for="shipping:use_for_shipping_yes">Ship to this
                        address</label>
                </li>
            </ul>

        </div>

    </div>
</div>
