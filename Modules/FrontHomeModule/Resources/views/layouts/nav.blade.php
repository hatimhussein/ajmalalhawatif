<!-- end navbar -->
<div id="nav-placeholder"></div>
<nav>
    <div class="container">
        <div class="nav-inner">
            <!-- mobile-menu -->
            <div class="hidden-desktop" id="mobile-menu">
                <div class="shadow"></div>
                <ul class="navmenu">
                    <li>
                        <div class="menutop">
                            <div class="toggle"><span class="icon-bar"></span> <span class="icon-bar"></span> <span
                                    class="icon-bar"></span></div>
                            <h2>Menu</h2>
                        </div>
                        <ul class="submenu">
                            <li>
                                <ul class="topnav">
                                    <li class="level0 nav-6 level-top first parent"><a class="level-top" href="#">
                                            <span>{{__('fronthomemodule::home.categories')}}</span> </a>
                                        <ul class="level0">
                                            @foreach($categories as $category)
                                                <li class="level0 nav-6 level-top first parent">
                                                    <a class="{{ $category->child->where('status',1)->count() ? 'level-top' : '' }}"
                                                       href="{{url('category/'.$category['id'])}}">
                                                        <span>{!! LanguageHelper::nameTranslate($category) !!}</span>
                                                    </a>
                                                    @if ($category->child->where('status',1)->count())
                                                        <ul class="level0">
                                                            @foreach($category->child->where('status',1) as $childern)
                                                                <li class="level1 nav-10-2">
                                                                    <a href="{{url('category/'.$childern['id'])}}">
                                                                        <span>{!! LanguageHelper::nameTranslate($childern) !!}</span>
                                                                    </a>
                                                                </li>
                                                            @endforeach
                                                        </ul>
                                                    @endif
                                                </li>
                                            @endforeach
                                        </ul>
                                    </li>
                                    {{--                                    --}}
                                    @foreach($menu_links as $link)
                                        <li class="level0 nav-7 level-top"><a class="level-top"
                                                                              href="{{url($link->url)}}"><span>{{__($link->name)}}</span></a>
                                        </li>
                                    @endforeach
                                    {{--                                    --}}
                                    <li class="level0 nav-6 level-top parent">
                                        <a class="level-top" href="#">
                                            <span>
                                                {{__('commonmodule::front.lang')}}
                                            </span>
                                        </a>
                                        <ul class="level0">
                                            <li class="level0 nav-6 level-top">
                                                <a href="{{url('locale/ar')}}">
                                                    <span>
                                                        <img src="{{asset('images/img/arabic.png')}}" alt="language">
                                                        عربي
                                                    </span>
                                                </a>
                                            </li>
                                            <li class="level0 nav-6 level-top">
                                                <a href="{{url('locale/en')}}">
                                                    <span>
                                                        <img src="{{asset('images/img/english.png')}}" alt="language">
                                                        English
                                                    </span>
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="level0 nav-6 level-top parent">
                                        <a class="level-top" href="#">
                                            <span>
                                                {{__('commonmodule::front.currency')}}
                                            </span>
                                        </a>
                                        <ul class="level0">
                                            @foreach($currencies as $currency)
                                                <li class="level0 nav-6 level-top">
                                                    <a href="{{url('change-currency/'.$currency->id)}}">
                                                    <span>
                                                        {!! LanguageHelper::nameTranslate($currency) !!}
                                                    </span>
                                                    </a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </li>
                                    {{--                                    --}}
                                    @auth()
                                        <li class="level0 nav-6 level-top last parent">
                                            <a class="level-top" href="#">
                                            <span>
                                                {{__('commonmodule::front.my_account')}}
                                            </span>
                                            </a>
                                            <ul class="level0">
                                                <li class="level0 nav-6 level-top">
                                                    <a href="{{url('account-dashboard')}}">
                                                        <span>{{__('commonmodule::front.my_account')}}</span>
                                                    </a>
                                                </li>
                                                <li class="level0 nav-6 level-top">
                                                    <a href="{{route('front.returns.index')}}">
                                                        <span>{{__('commonmodule::front.returns')}}</span>
                                                    </a>
                                                </li>
                                                @if($show_warranty)
                                                    <li class="level0 nav-6 level-top">
                                                        <a href="{{route('front.insurance.index')}}">
                                                            <span>{{__('warrantymodule::insurance.insurance')}}</span>
                                                        </a>
                                                    </li>
                                                    <li class="level0 nav-6 level-top">
                                                        <a href="{{route('front.warranty.index')}}">
                                                            <span>{{__('commonmodule::front.warranty')}}</span>
                                                        </a>
                                                    </li>
                                                @endif
                                                <li class="level0 nav-6 level-top">
                                                    <a href="{{url('wishlist')}}">
                                                        <span>{{__('commonmodule::front.wishlist')}}</span>
                                                    </a>
                                                </li>
                                                <li class="level0 nav-6 level-top">
                                                    <a href="{{url('cart')}}">
                                                        <span>{{__('commonmodule::front.view_cart')}}</span>
                                                    </a>
                                                </li>
                                                <li class="level0 nav-6 level-top">
                                                    <a href="{{url('checkout')}}">
                                                        <span>{{__('commonmodule::front.checkout')}}</span>
                                                    </a>
                                                </li>
                                                <li class="level0 nav-6 level-top">
                                                    <a href="{{url('orders')}}">
                                                        <span>{{__('commonmodule::front.my_orders')}}</span>
                                                    </a>
                                                </li>
                                                <li class="level0 nav-6 level-top">
                                                    <a href="{{url('logout')}}">
                                                        <span>{{__('commonmodule::front.logout')}}</span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </li>
                                    @else
                                        <li class="level0 nav-6 level-top last">
                                            <a title="Login / RegisterLogin / Register" href="{{url('login')}}">
                                                <span>{{__('commonmodule::front.login_register')}}</span>
                                            </a>
                                        </li>
                                    @endauth
                                    {{--                                    --}}
                                </ul>
                            </li>
                        </ul>
                    </li>
                </ul>

            </div>
            <!--End mobile-menu -->


            <ul id="nav" class="hidden-xs">
                <li class="level0 nav-5 level-top first"><a class="level-top bg-ctg"> <span><i
                                class="icon-reorder"></i>{{__('fronthomemodule::home.categories')}}</span> </a>
                    <div style="display: none" class="level0-wrapper dropdown-6col">
                        <div class="level0-wrapper2">
                            <div class="nav-block nav-block-center">
                                <ul class="level0">
                                    @foreach($categories as $category)
                                        <li class="level1 nav-6-1 parent item"><a
                                                href="{{url('category/'.$category['id'])}}"><span>{!!
                                                LanguageHelper::nameTranslate($category) !!}</span></a>
                                            <ul class="level1">
                                                @foreach($category->child->where('status',1) as $childern)
                                                    <li class="level2 nav-6-1-1"><a
                                                            href="{{url('category/'.$childern['id'])}}"><span> {!!
                                                        LanguageHelper::nameTranslate($childern) !!}</span></a></li>
                                                @endforeach
                                            </ul>

                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </li>
                @foreach($menu_links as $link)
                    <li class="level0 parent"><a href="{{url($link->url)}}"><span>{{__($link->name)}}</span></a>
                    </li>
                @endforeach
            </ul>

            <!-- yiels!-->
            <div class="mini-cart-holder">
                <div class="top-cart-contain">
                    @php
                        $total = 0
                    @endphp
                    <div class="mini-cart">
                        <div data-toggle="dropdown" data-hover="dropdown" class="basket dropdown-toggle"><a
                                href="#">
                                <i class="glyphicon glyphicon-shopping-cart"></i>
                                <div class="cart-box"><span class="title">
                                        {{__('commonmodule::front.view_cart')}}</span>
                                    <span id="cart-total">{{count($cart_data)}}</span>
                                </div>
                            </a>
                        </div>

                        <div class="top-cart-content arrow_box">
                            <!-- <div class="block-subtitle">Recently added item(s)</div> -->
                            <div class="actions">
                                <a class="btn-checkout" href="{{url('checkout')}}"
                                   type="button"><span>{{__('commonmodule::front.checkout')}}</span></a>
                                <a href="{{url('cart')}}" class="view-cart"
                                   type="button"><span>{{__('commonmodule::front.view_cart')}}</span></a>
                            </div>

                            <ul id="cart-sidebar" class="mini-products-list">
                                @foreach($cart_data as $keys => $values)

                                    <li
                                        class="item even {{ $values["product_id"] . str_replace(',', '', $values["item_combination"]) }}">
                                        <a class="product-image"
                                           href="{{url('product-details/'.$values['product_id'])}}"
                                           title="Downloadable Product ">
                                            <img alt="Downloadable Product "
                                                 src="{{asset('images/product/'.$values['item_photo'])}}"
                                                 width="80">
                                        </a>
                                        <div class="detail-item">
                                            <div class="product-details"><a
                                                    href="{{url('product-details/'.$values['product_id'])}}"
                                                    title="Remove This Item" onClick=""
                                                    class="glyphicon glyphicon-remove remove-item"
                                                    data-product_id="{{ $values["product_id"] }}"
                                                    data-item_combination="{{ $values["item_combination"] }}">&nbsp;</a>
                                                <p class="product-name"><a
                                                        href="{{url('product-details/'.$values['product_id'])}}"
                                                        title="Downloadable Product">{{ $values["item_name"] }}
                                                        {{ (strlen($values["item_name"]) >= 18) ? '...' : '' }}</a>
                                                </p>
                                            </div>
                                            <div class="product-details-bottom"> <span
                                                    class="price item_price{{ $values["product_id"] . str_replace(',', '', $values["item_combination"]) }}">{!!
                                                    ProductHelper::calPriceCurrency($values['item_price']) !!} {!!
                                                    LanguageHelper::nameTranslate(Session::get('currency')) !!} </span>
                                                <span
                                                    class="title-desc">{{__('ordermodule::cart.quantity')}}:</span>
                                                <strong>{{$values['quantity']}}</strong></div>
                                        </div>
                                    </li>


                                    <?php $total = $total + ($values["quantity"] * $values["item_price"]);?>
                                @endforeach
                                <input type="hidden" id="subtotal_cal_prim"
                                       value="{!! ProductHelper::calPriceCurrency($total) !!}">

                            </ul>
                            @if(!count($cart_data))
                                <h2 id="no_products_in_cart">{{__('ordermodule::cart.no_products')}}</h2>
                            @endif
                            <div class="top-subtotal">{{__('ordermodule::cart.subtotal')}} : <span
                                    id="top-subtotal " class="price subtotal_cal">{!!
                                        ProductHelper::calPriceCurrency($total) !!}</span> {!!
                                    LanguageHelper::nameTranslate(Session::get('currency')) !!}</div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</nav>

<!-- end navbar -->
