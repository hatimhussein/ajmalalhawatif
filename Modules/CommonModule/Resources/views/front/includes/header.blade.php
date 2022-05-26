<!--  BEGIN header  -->
<header class="header-container">
    <div class="header-top">
        <div class="container">
            <div class="row">
                <!-- Header Language -->
                <div class="col-xs-7 fl-r">
                    <div class="dropdown block-language-wrapper">

                        <a role="button" data-toggle="dropdown" data-target="#" class="block-language dropdown-toggle"
                           href="#">
                            @if(session('locale')!='en')
                                <img src="{{asset('images/img/arabic.png')}}" alt="language">
                            @else
                                <img src="{{asset('images/img/english.png')}}" alt="language">
                            @endif
                            {{__('commonmodule::front.lang')}} <span class="caret"></span>
                        </a>


                        <ul class="dropdown-menu" role="menu">
                            <li role="presentation">
                                <a class="bold" role="menuitem" tabindex="-1" href="{{url('locale/ar')}}">
                                    <img src="{{asset('images/img/arabic.png')}}" alt="language"> عربي
                                </a>
                            </li>
                            <li role="presentation">
                                <a role="menuitem" tabindex="-1" href="{{url('locale/en')}}">
                                    <img src="{{asset('images/img/english.png')}}" alt="language"> English
                                </a>
                            </li>
                        </ul>
                    </div>


                    <div class="dropdown block-language-wrapper">
                        <a role="button" data-toggle="dropdown" data-target="#" class="block-language dropdown-toggle"
                           href="#">
                            <img src="{{asset('images/img/coins.png')}}" alt="language">
                            {{__('commonmodule::front.currency')}} <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu" role="menu">

                            @foreach($currencies as $currency)
                                <li role="presentation">
                                    <a class="bold" role="menuitem" tabindex="-1"
                                       href="{{url('change-currency/'.$currency->id)}}">

                                        {!! LanguageHelper::nameTranslate($currency) !!}
                                    </a>
                                </li>
                            @endforeach

                        </ul>
                    </div>


                    <!-- End Header Language -->
                    <div class="welcome-msg hidden-xs"> {{__('commonmodule::front.welcome_message')}} </div>
                </div>
                <div class="col-xs-5 fl-r">

                    <!-- Header Top Links -->
                    <div class="toplinks">
                        <div class="links">
                            @if(auth()->check())
                                <div class="dropdown block-language-wrapper account">
                                    <a role="button"
                                       data-toggle="dropdown"
                                       data-target="#"
                                       class="block-language dropdown-toggle"
                                       href="{{url('account-dashboard')}}">{{__('commonmodule::front.my_account')}}
                                        <span
                                            class="caret"></span> </a>
                                    <ul class="account-list dropdown-menu" role="menu">
                                        <li role="presentation"><a role="menuitem" tabindex="-1"
                                                                   href="{{url('account-dashboard')}}">
                                                {{__('commonmodule::front.my_account')}} </a></li>

                                        <li role="presentation"><a role="menuitem" tabindex="-1"
                                                                   href="{{route('front.returns.index')}}">
                                                {{__('commonmodule::front.returns')}} </a></li>

                                        @if($show_warranty)
                                            <li role="presentation">
                                                <a role="menuitem" tabindex="-1"
                                                   href="{{route('front.insurance.index')}}">
                                                    {{__('warrantymodule::insurance.insurance')}}
                                                </a>
                                            </li>
                                            <li role="presentation">
                                                <a role="menuitem" tabindex="-1"
                                                   href="{{route('front.warranty.index')}}">
                                                    {{__('commonmodule::front.warranty')}}
                                                </a>
                                            </li>
                                        @endif
                                        <li role="presentation"><a role="menuitem" tabindex="-1"
                                                                   href="{{route('allSuggestion')}}">
                                                {{__('commonmodule::front.suggestion')}} </a></li>

                                        <li role="presentation"><a role="menuitem" tabindex="-1"
                                                                   href="{{url('wishlist')}}">
                                                {{__('commonmodule::front.wishlist')}} </a></li>
                                        <li role="presentation"><a role="menuitem" tabindex="-1" href="{{url('cart')}}">
                                                {{__('commonmodule::front.view_cart')}} </a></li>
                                        <li role="presentation"><a role="menuitem" tabindex="-1"
                                                                   href="{{url('orders')}}">
                                                {{__('commonmodule::front.my_orders')}} </a></li>
                                        <li role="presentation" class="last"><a role="menuitem" tabindex="-1"
                                                                                href="{{url('logout')}}">
                                                {{__('commonmodule::front.logout')}} </a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="dropdown block-language-wrapper">
                                    <a role="button"
                                       data-toggle="dropdown"
                                       id="notification-bell"
                                       class="notification-bell dropdown-toggle"
                                       href="javascript:void(0);">
                                        <i class="glyphicon glyphicon-bell"></i>
                                        <span class="bell-count" style="display: none">0</span>
                                    </a>
                                    <ul class="dropdown-menu notification-dropdown" id="notification-list" role="menu">
                                        <li id="notifications-loading">
                                            <a href="javascript:void(0);">
                                                <p class="notification-head text-center">
                                                    <b class="notification-title">
                                                        {{__('configmodule::notification.loading')}}
                                                    </b>
                                                </p>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            @else
                                <div class="myaccount">
                                    <a title="Login / RegisterLogin / Register" href="{{url('login')}}">
                                        <span>{{__('commonmodule::front.login_register')}}</span>
                                    </a>
                                </div>
                            @endif

                        </div>
                    </div>
                    <!-- End Header Top Links -->
                </div>
            </div>
        </div>
    </div>
    <div class="header container">
        <div class="row">
            <div class="col-lg-2 col-sm-3 col-md-2 fl-r">
                <!-- Header Logo -->
                <a class="logo" title="Magento Commerce" href="{{url('/')}}">
                    <img alt="Magento Commerce" src="{{asset('images/img/'.$websiteLogo)}}">
                </a>
                <!-- End Header Logo -->
            </div>
            <div class="col-lg-10 col-sm-9 col-md-10 fl-r fl-un">
                <!-- Search-col -->
                <div class="search-box">
                    <form action="{{url('search')}}" method="get" id="search_mini_form" name="Categories">
                        <input type="text" autocomplete="off" placeholder="{{__('commonmodule::front.search_here')}}"
                               value="" maxlength="70" class="" name="word" id="search">
                        <button id="submit-button" class="search-btn-bg"><span><i
                                    class="icon-search"></i></span></button>
                    </form>
                </div>


                <!-- End Search-col -->
            </div>
            <!-- End Top Cart -->
        </div>
    </div>
</header>


<!--  END header  -->
