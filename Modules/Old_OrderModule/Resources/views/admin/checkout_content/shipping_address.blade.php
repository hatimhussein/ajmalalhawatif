<!-- checkout -->
<section class="padding-bottom-20">
    <div class="container">
        <div class="row">
            <div class="form-group top_radio col-lg-10 select-add">
                <input class="billing-address-select" type="radio" name="address_type" value="old" checked>
                <strong>{{__('ordermodule::checkout.old_adderess')}}</strong><br>
                <input class="billing-address-select" type="radio" name="address_type" value="new">
                <strong>{{__('ordermodule::checkout.new_adderess')}}</strong>
                <br>
            </div>
            <div class="col-lg-12" id="old_address">
                <div class="row address-all">
                    @foreach($user_addresses as $address)
                        <div class="col-lg-6 ">
                            <div class="address_form">
                                <div>
                                    <input type="radio" value="{{$address->id}}"
                                           {{($address->id == $order->user_address_id)?'checked':''}} data-from="address"
                                           name="shipping_address_id">
                                    <strong class="address">{{$address->address}} </strong><br>
                                    <ul class="bullet-round-list">
                                        <li><strong>{{__('usermodule::login.country')}} : </strong>
                                            @if($address->getCountry !=null)
                                                {!! LanguageHelper::nameTranslate($address->getGovernment) !!}
                                            @endif
                                        </li>
                                        <li><strong>{{__('usermodule::login.government')}} : </strong>
                                            @if($address->getGovernment !=null)
                                                {!! LanguageHelper::nameTranslate($address->getGovernment) !!}
                                            @endif
                                        </li>
                                        <li><strong>{{__('usermodule::login.city')}} : </strong>
                                            @if($address->getCity !=null)
                                                {!! LanguageHelper::nameTranslate($address->getCity) !!}
                                            @endif
                                        </li>
                                        <li><strong>{{__('usermodule::login.zone')}} : </strong>
                                            @if($address->getZone !=null)
                                                {!! LanguageHelper::nameTranslate($address->getZone) !!}
                                            @endif
                                        </li>
                                        <li><strong>{{__('usermodule::login.address')}}
                                                : </strong> {{$address->address}} </li>
                                    </ul>
                                    <!-- <a href="#" class="a_edit"> Edit </a> -->
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <!-- <a href="payment-method.html" class="btn-round"> Continue</a> -->
            </div>
            <div class="col-md-12 hidden shadow" id="new_address">
                <div>
                    <div class="short-lst">
                        <ul>
                            <div class=" new_edit product ">
                                <article>
                                    <div class="media-body">
                                        <input type="text" name="address" placeholder="Address">
                                        <select id="country_id" name="government_id" title="State/Province">
                                            <option disabled selected
                                                    value="">{{__('usermodule::login.choose_government')}}</option>
                                            @foreach($countries as $country)
                                                <option
                                                    value="{{$country->id}}">{!! LanguageHelper::nameTranslate($country) !!}</option>
                                            @endforeach
                                        </select>
                                        <select id="government_id" name="government_id" title="State/Province">
                                            <option disabled selected
                                                    value="">{{__('usermodule::login.choose_government')}}</option>

                                        </select>
                                        <select id="city_id" name="city_id" title="City">
                                            <option disabled selected
                                                    value="">{{__('usermodule::login.choose_city')}}</option>
                                        </select>
                                        <select id="zone_id" name="zone_id">
                                            <option disabled selected
                                                    value="">{{__('usermodule::login.choose_zone')}}</option>
                                        </select>
                                    </div>
                                </article>
                            </div>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- checkout -->
