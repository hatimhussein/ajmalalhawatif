<div class="col-xl-12 col-lg-6 col-md-6 col-sm-12 " id="shipping-section">
    <div class="profile-info-section hgt mb-4">
        <div class="card" style="">
            <div class="card-header">
                <h4 class="mb-0 text-center"><i
                        class="flaticon-money"></i> {{__('ordermodule::checkout.address_text')}}</h4>
            </div>
            <div class="card-body">

                <p class="mb-2">
                    <span class="usr-work-position">
                        {{__('ordermodule::checkout.address_text')}}
                    </span>
                    <select data-from="address" name="shipping_address_id" id="billing-address-select"
                            class="disabled-results form-control custom-select" title="">
                        <option selected value="0">{{__('ordermodule::checkout.new_adderess')}}</option>
                    </select>
                </p>
                <div id="new_address">
                    <p class="mb-2"><span
                            class="usr-work-position"> {{__('usermodule::login.country')}}</span>
                        <select id="country_id" name="country_id" title="Country"
                                class="form-control custom-select"
                                defaultvalue="">
                            <option value="">{{__('usermodule::login.choose_country')}}</option>
                            @foreach($countries as $country)
                                <option
                                    value="{{$country->id}}">{!! LanguageHelper::nameTranslate($country) !!}</option>
                            @endforeach
                        </select>
                    </p>
                    <p class="mb-2">
                        <span class="usr-work-position"> {{__('usermodule::login.zone')}}</span>
                        <select id="government_id" name="government_id" title="Zone"
                                class="disabled-results form-control custom-select" defaultvalue="">
                            <option value="">{{__('usermodule::login.choose_zone')}}</option>

                        </select>
                    </p>
                    <p class="mb-2">
                        <span class="usr-work-position"> {{__('usermodule::login.city')}}</span>
                        <select id="city_id" data-from="city" name="city_id" title="Governorate"
                                class="disabled-results form-control custom-select"
                                defaultvalue="">
                            <option value="">{{__('usermodule::login.choose_city')}}</option>

                        </select>
                    </p>
                    <p class="mb-2"><span
                            class="usr-work-position"> {{__('usermodule::login.government')}}</span>
                        <select id="zone_id" name="zone_id" title="government"
                                class="disabled-results form-control custom-select" defaultvalue="297">
                            <!-- <option value=""></option> -->
                            <option value="">{{__('usermodule::login.choose_government')}}</option>

                        </select>
                    </p>
                    <p class="mb-2">
                        <span class="usr-work-position"> {{__('usermodule::login.address')}}</span>
                        <input type="text" title="Street Address" name="address" id="shipping:street1"
                               value="" class="form-control-rounded form-control">
                    </p>
                </div>
            </div>
        </div>
    </div>

</div>
