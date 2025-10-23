<!-- end navbar -->
<nav>
    <div class="container">
        <div class="nav-inner">
            <!-- mobile-menu -->
             <div class="hidden-desktop" id="mobile-menu">
                <ul class="navmenu">
                    <li>
                        <div class="menutop">
                            <div class="toggle"> <span class="icon-bar"></span> <span class="icon-bar"></span> <span
                                    class="icon-bar"></span></div>
                            <h2>Menu</h2>
                        </div>
                        <ul style="display:none;" class="submenu">
                            <li>
                                <ul class="topnav">
                                    <li class="level0 nav-6 level-top first parent"> <a class="level-top" href="#">
                                            <span>{{__('fronthomemodule::home.categories')}}</span> </a>
                                        <ul class="level0">
                                            @foreach($categories as $category)

                                            <li class="level0 nav-6 level-top first parent"> <a class="level-top"
                                                    href="{{url('category/'.$category['id'])}}"> <span>{!!
                                                        LanguageHelper::nameTranslate($category) !!}</span> </a>
                                                <ul class="level0">
                                                    @foreach($category->child->where('status',1) as $childern)
                                                    <li class="level1 nav-10-2"> <a
                                                            href="{{url('category/'.$childern['id'])}}"> <span>{!!
                                                                LanguageHelper::nameTranslate($childern) !!}</span> </a>
                                                    </li>
                                                    @endforeach
                                                </ul>
                                            </li>
                                            @endforeach
                                        </ul>
                                    </li>
                                    <li class="level0 nav-7 level-top parent"> <a class="level-top"
                                            href="{{url('/')}}"><span>{{__('fronthomemodule::home.home')}}</span></a>
                                    </li>
                                    <li class="level0 nav-8 level-top parent"> <a class="level-top"
                                            href="{{url('/config/1')}}"><span>{{__('fronthomemodule::home.about')}}</span></a>
                                    </li>
                                    <li class="level0 nav-10 level-top "> <a class="level-top"
                                            href="{{url('/latest_products')}}"><span>{{__('fronthomemodule::home.latest_products')}}</span>
                                        </a> </li>
                                    <li class="level0 nav-10 level-top "> <a class="level-top"
                                            href="{{url('/discount-products')}}">
                                            <span>{{__('fronthomemodule::home.offers')}}</span></a></li>
                                    <li class="level0 nav-10 level-top "> <a class="level-top"
                                            href="{{url('/suggestions')}}"><span>{{__('fronthomemodule::home.suggestions')}}</span></a>
                                    </li>
                                    <li class="level0 nav-9 level-top last parent "><a class="level-top"
                                            href="{{url('/contact_us')}}"><span>{{__('fronthomemodule::home.contact_us')}}</span></a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                </ul>

            </div>
            <!--End mobile-menu -->




            <ul id="nav" class="hidden-xs">
                <li class="level0 nav-5 level-top first"> <a class="level-top bg-ctg"> <span><i
                                class="icon-reorder"></i>{{__('fronthomemodule::home.categories')}}</span> </a>
                    <div style="display: none" class="level0-wrapper dropdown-6col">
                        <div class="level0-wrapper2">
                            <div class="nav-block nav-block-center">
                                <ul class="level0">
                                    @foreach($categories as $category)
                                    <li class="level1 nav-6-1 parent item"> <a
                                            href="{{url('category/'.$category['id'])}}"><span>{!!
                                                LanguageHelper::nameTranslate($category) !!}</span></a>
                                        <ul class="level1">
                                            @foreach($category->child->where('status',1) as $childern)
                                            <li class="level2 nav-6-1-1"> <a
                                                    href="{{url('category/'.$childern['id'])}}"><span> {!!
                                                        LanguageHelper::nameTranslate($childern) !!}</span></a> </li>
                                            @endforeach
                                        </ul>

                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </li>
                <li id="nav-home" class="level0 parent"><a
                        href="{{url('/')}}"><span>{{__('fronthomemodule::home.home')}}</span></a></li>
                <li id="nav-home" class="level0 parent"><a
                        href="{{url('/config/1')}}"><span>{{__('fronthomemodule::home.about')}}</span></a></li>
                <li id="nav-home" class="level0 parent"><a
                        href="{{url('/latest_products')}}"><span>{{__('fronthomemodule::home.latest_products')}}</span></a>
                </li>
                <li id="nav-home" class="level0 parent"><a
                        href="{{url('/discount-products')}}"><span>{{__('fronthomemodule::home.offers')}}</span></a>
                </li>
                <li id="nav-home" class="level0 parent"><a
                        href="{{url('/suggestions')}}"><span>{{__('fronthomemodule::home.suggestions')}}</span></a></li>
                <li id="nav-home" class="level0 parent last"><a
                        href="{{url('/contact_us')}}"><span>{{__('fronthomemodule::home.contact_us')}}</span></a></li>
            </ul>
        </div>
    </div>
</nav>

<!-- end navbar -->
