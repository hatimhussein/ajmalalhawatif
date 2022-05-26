<footer class="footer bounceInUp animated">
    <div class="brand-logo ">
        <div class="container">
            <div class="slider-items-products">
                <div class="new_title center">
                    <h2><a href="#">{{__('commonmodule::front.shopbybrand')}}</a></h2>
                </div>
                <div id="brand-logo-slider" class="product-flexslider hidden-buttons">
                    <div class="slider-items slider-width-col6">

                        @foreach($brands as $brand)
                            <div class="item"><a href="{{url('brand-products/'.$brand->id)}}"><img
                                        src="{{asset('images/brand/'.$brand->photo)}}" alt="Image"></a></div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-top">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-6 col-md-7 fl-r">
                    <div class="block-subscribe">
                        <div class="newsletter">
                            <form id="newsLetterForm">
                                <h4>{{__('commonmodule::front.newsletter')}}</h4>
                                <input type="text" placeholder="{{__('commonmodule::front.enter_email')}}"
                                       class="input-text required-entry validate-email"
                                       title="Sign up for our newsletter"
                                       id="newsletter1" name="email" autocomplete="off">
                                <button class="subscribe" title="Subscribe" type="submit">
                                    <span>{{__('commonmodule::front.subscribe')}}</span></button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-5 fl-r">
                    <div class="social">
                        <ul>
                            @foreach($socialLinks as $social)
                                @if (!empty($social->value_ar))

                                    <li class="{{$social->key}}">
                                        <a target="_blank" href="{{$social->value_ar}}"
                                           style="background-image: url('{{ asset('images/img/'.$social->photo)}}');"
                                        ></a>
                                    </li>
                                @endif
                            @endforeach

                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="footer-middle">
        <div class="container">
            <div class="grid-div footer-top-grid">
                <div class="logo-footer">
                    <a href="{{url('/')}}" title="Logo">
                        <img src="{{asset('images/img/'.$websiteLogo_footer)}}" alt="logo">
                    </a>
                    <p>{{__('commonmodule::front.footer_slogan')}}</p>
                </div>
                <div class="company">
                    <p>
                        {!! LanguageHelper::configTranslate($site_data->where('key','hotline')->first()) !!}
                        <span>{{ $hotlines[0] }}</span>
                    </p>
                    <a href="{{url('/contact_us')}}">{{__('fronthomemodule::home.contact_us')}}</a>
                    <a href="{{url('/catalog')}}">{{__('commonmodule::front.catalogs')}}</a>
                    <a href="{{url('/config/5')}}">{!! LanguageHelper::configTranslate($site_data->where('key','privacy')->first())  !!}</a>
                    <a href="{{url('/config/3')}}">{!! LanguageHelper::configTranslate($site_data->where('key','aman')->first())  !!}</a>
                    <a href="{{route('front.insurance.index')}}">{{__('warrantymodule::insurance.insurance')}}</a>
                    <a href="{{route('front.warranty.index')}}">{{__('commonmodule::front.warranty')}}</a>
                </div>

                <div class="policy">
                    <h3>{{__('fronthomemodule::home.policies')}}</h3>

                    <a href="{{url('/config/2')}}">{!! LanguageHelper::configTranslate($site_data->where('key','map')->first())  !!}</a>
                    <a href="{{url('/config/5')}}">{!! LanguageHelper::configTranslate($site_data->where('key','privacy')->first())  !!}</a>
                    <a href="{{url('/config/3')}}">{!! LanguageHelper::configTranslate($site_data->where('key','aman')->first())  !!}</a>
                </div>

                <div class="shipping-payment">
                    <h4>{{__('fronthomemodule::home.express_methods')}}</h4>
                    <ul>
                        @foreach($shipping_method as $method)
                            <li><img
                                    src="{{ asset('images/img/'.$method->image) }}"
                                    alt=""></li>
                        @endforeach
                    </ul>
                    <h4>{{__('fronthomemodule::home.payment_methods')}}</h4>
                    <ul>
                        @foreach($payment_method as $method)
                            <li><img
                                    src="{{ asset('images/img/'.$method->image) }}"
                                    alt=""></li>
                        @endforeach
                    </ul>
                </div>
            </div>

        </div>
    </div>
    <div class="footer-bottom">
        <div class="container">
            <div class="col-sm-12 coppyright">&copy; 2021 AJMAL ALHWATIF. All Rights Reserved.</div>
        </div>
    </div>
</footer>
<!-- End Footer -->
