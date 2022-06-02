<div class="sidebar-wrapper sidebar-theme">

    <div id="dismiss" class="d-lg-none"><i class="flaticon-cancel-12"></i></div>

    <nav id="sidebar">
        <ul class="navbar-nav theme-brand flex-row  d-none d-lg-flex">
{{--            <li class="nav-item d-flex">--}}
{{--                <a href="#" class="navbar-brand">--}}
{{--                    <img src="{{ asset('assets/admin/img/logo.svg')}}" class="img-fluid" alt="logo">--}}

{{--                </a>--}}
{{--                <p class="border-underline"></p>--}}
{{--            </li>--}}
            <li class="nav-item d-flex">
                <a href="#" class="navbar-brand">
                    <img src="{{ asset('assets/admin/img/icons/config/svg/site_data_new.svg')}}" class="img-fluid" alt="logo">
                </a>
                <p class="border-underline"></p>
            </li>
            <li class="nav-item theme-text">
                <a href="{{url('/')}}" class="nav-link"> {{ getSiteName() }} </a>
            </li>
        </ul>

        <div class="sidebar-notification-container">
            <a class="dropdown-item title load-notifications" href="javascript:void(0);">
                <i class="flaticon-reload-1 mr-3"></i> <span></span>
            </a>
            <div class="dropdown-item text-center  p-1" href="javascript:void(0);">

                <div class="notification-list ">
                    @include('commonmodule::includes.notification_items')
                </div>
            </div>
        </div>

        <ul class="list-unstyled menu-categories" id="accordionExample">
            <li class="menu">
                <a href="{{url('/admin')}}" class="dropdown-toggle">
                    <div class="">
                        <i class="flaticon-home-fill"></i>
                        <span>{{__('adminmodule::admin.home')}}</span>
                    </div>
                </a>
                <ul class="collapse submenu list-unstyled show" id="dashboard" data-parent="#accordionExample">
                </ul>
            </li>
            @can('admins')
                <li class="menu">
                    <a href="#admins" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                        <div class="">
                            <i class="flaticon-user-1"></i>
                            <span>{{__('commonmodule::sidebar.admins')}}</span>
                        </div>
                        <div>
                            <i class="flaticon-right-arrow"></i>
                        </div>
                    </a>
                    <ul class="collapse submenu list-unstyled" id="admins" data-parent="#accordionExample">
                        @can('show_admins')
                            <li>
                                <a href="{{url('admin/admins')}}"> {{__('commonmodule::sidebar.admins')}} </a>
                            </li>
                        @endcan

                        @can('show_role')
                            <li>
                                <a href="{{url('admin/permissions')}}"> {{__('commonmodule::sidebar.admins_group')}} </a>
                            </li>
                        @endcan
                    </ul>
                </li>
            @endcan
        <!-- <li class="menu">
                       <a href="#users" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                           <div class="">
                               <i class="flaticon-user-group"></i>
                               <span>{{__('commonmodule::sidebar.users')}}</span>
                           </div>
                           <div>
                               <i class="flaticon-right-arrow"></i>
                           </div>
                       </a>
                       <ul class="collapse submenu list-unstyled" id="users" data-parent="#accordionExample">
                           <li>
                               <a href="{{url('admin/users')}}"> {{__('commonmodule::sidebar.users')}} </a>
                           </li>
                       </ul>
                   </li> -->

            @can('products')

                <li class="menu">
                    <a href="#products" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                        <div class="">
                            <i class="flaticon-cart-2"></i>
                            <span>{{__('commonmodule::sidebar.products')}}</span>
                        </div>
                        <div>
                            <i class="flaticon-right-arrow"></i>
                        </div>
                    </a>
                    <ul class="collapse submenu list-unstyled" id="products" data-parent="#accordionExample">

                        @can('show_category')
                            <li>
                                <a href="{{url('admin/category')}}"> {{__('commonmodule::sidebar.categories')}} </a>
                            </li>
                        @endcan

                        @can('show_product')
                            <li>
                                <a href="{{url('admin/product')}}"> {{__('commonmodule::sidebar.products')}} </a>
                            </li>
                        @endcan

                        @can('show_brand')
                            <li>
                                <a href="{{url('admin/brand')}}"> {{__('commonmodule::sidebar.brands')}} </a>
                            </li>
                        @endcan

                        @can('show_catalog_category')
                            <li>
                                <a href="{{route('catalog_category.index')}}"> {{__('commonmodule::sidebar.catalog_category')}} </a>
                            </li>
                        @endcan
                        @can('show_catalog')
                            <li>
                                <a href="{{route('catalog.index')}}"> {{__('commonmodule::sidebar.catalogs')}} </a>
                            </li>
                        @endcan

                        @can('show_attribute')
                            <li>
                                <a href="{{url('admin/attribute')}}"> {{__('commonmodule::sidebar.attributes')}} </a>
                            </li>
                        @endcan

                        @can('show_options')
                            <li>
                                <a href="{{url('admin/option')}}"> {{__('commonmodule::sidebar.options')}} </a>
                            </li>
                        @endcan

                        @can('show_deliverytime')
                            <li>
                                <a href="{{url('admin/delivery_time')}}"> {{__('commonmodule::sidebar.delivery_time')}} </a>
                            </li>
                        @endcan
                    </ul>
                </li>

            @endcan

            @can('markting')
                <li class="menu">
                    <a href="#markting" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                        <div class="">
                            <i class="flaticon-wallet"></i>
                            <span>{{__('commonmodule::sidebar.markting')}}</span>
                        </div>
                        <div>
                            <i class="flaticon-right-arrow"></i>
                        </div>
                    </a>
                    <ul class="collapse submenu list-unstyled" id="markting" data-parent="#accordionExample">

                        @can('show_voucher')
                            <li>
                                <a href="{{url('admin/voucher')}}">{{__('commonmodule::sidebar.voucher')}}</a>
                            </li>
                        @endcan

                        @can('show_offer')
                            <li>
                                <a href="{{url('admin/offers')}}">{{__('commonmodule::sidebar.offers')}}</a>
                            </li>
                        @endcan

                        @can('show_advertisment')
                            <li>
                                <a href="{{url('admin/advertisment')}}">  {{__('commonmodule::sidebar.advertisment')}} </a>
                            </li>
                        @endcan

                        @can('abandoned_cart')
                            <li>
                                <a href="{{url('admin/abandoned-cart')}}">  {{__('ordermodule::admin.abandoned_carts')}} </a>
                            </li>
                        @endcan

                    </ul>
                </li>
            @endcan

            @can('config')
                <li class="menu">
                    <a href="#config" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                        <div class="">
                            <i class="flaticon-settings-7"></i>
                            <span>{{__('commonmodule::sidebar.config')}}</span>
                        </div>
                        <div>
                            <i class="flaticon-right-arrow"></i>
                        </div>
                    </a>
                    <ul class="collapse submenu list-unstyled" id="config" data-parent="#accordionExample">

                        <li>
                            <a href="{{url('admin/config')}}"> {{__('commonmodule::sidebar.config')}} </a>
                        </li>
                        <li>
                            <a href="{{url('admin/invoice-status')}}"> حالة الفاتور القابلة للتنزيل </a>
                        </li>
                        <li>
                            <a href="{{url('admin/log-viewer')}}"> تتبع اخطاء النظام </a>
                        </li>
                        @can('show_currency')
                            <li>
                                <a href="{{url('admin/currency')}}">  {{__('commonmodule::sidebar.currency')}} </a>
                            </li>
                        @endcan
                        @can('show_status')
                            <li>
                                <a href="{{url('admin/status')}}">  {{__('commonmodule::sidebar.status')}} </a>
                            </li>
                        @endcan
                        @can('newsletter')
                            <li>
                                <a href="{{url('admin/newsletter')}}">  {{__('commonmodule::sidebar.newsletter')}} </a>
                            </li>
                        @endcan

                        @can('show_slider')
                            <li>
                                <a href="{{url('admin/slider')}}">  {{__('commonmodule::sidebar.slider')}}</a>
                            </li>
                        @endcan

                        @can('show_payment_method')
                            <li>
                                <a href="{{url('admin/payment-method')}}">  {{__('commonmodule::sidebar.payment_method')}} </a>
                            </li>
                        @endcan
                        @can('show_shipping_method')
                            <li>
                                <a href="{{url('admin/shipping-method')}}">  {{__('commonmodule::sidebar.shipping_method')}} </a>
                            </li>
                        @endcan
                        @can('show_seo')
                            <li>
                                <a href="{{url('admin/seo')}}">  {{__('commonmodule::sidebar.seo')}} </a>
                            </li>
                        @endcan
                        <li>
                            <a href="{{url('admin/site_colors')}}">  {{__('commonmodule::sidebar.site_colors')}} </a>
                        </li>
                        @can('labels')
                            <li>
                                <a href="{{url('admin/labels')}}">  {{__('commonmodule::sidebar.lang_settings')}} </a>
                            </li>
                        @endcan
                        @can('News')
                            <li>
                                <a href="{{url('admin/news')}}">  {{__('configmodule::admin.news')}} </a>
                            </li>
                        @endcan
                        @can('tax')
                            <li>
                                <a href="{{url('admin/tax')}}">  {{__('commonmodule::sidebar.tax')}} </a>
                            </li>
                        @endcan
                        @can('menu_links')
                            <li>
                                <a href="{{route('menu.index')}}">  {{__('configmodule::admin.menu_links')}} </a>
                            </li>
                        @endcan
                        @can('notify_body')
                            <li>
                                <a href="{{route('notification-settings.index')}}">  {{__('configmodule::admin.notification_settings')}} </a>
                            </li>
                        @endcan
                    </ul>
                </li>
            @endcan


            @canany(['users', 'warranty', 'insurance'])
                <li class="menu">
                    <a href="#users" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                        <div class="">
                            <i class="flaticon-user-group-2"></i>
                            <span>{{__('commonmodule::sidebar.users')}}</span>
                        </div>
                        <div>
                            <i class="flaticon-right-arrow"></i>
                        </div>
                    </a>
                    <ul class="collapse submenu list-unstyled" id="users" data-parent="#accordionExample">

                        @can('users')
                            <li>
                                <a href="{{url('admin/users')}}"> {{__('commonmodule::sidebar.users')}} </a>
                            </li>
                        @endcan
                        @can('users')
                            <li>
                                <a href="{{url('admin/deleted-users')}}"> العملاء المحذوفين </a>
                            </li>
                        @endcan
                        @can('show_merchant')
                            <li>
                                <a href="{{url('admin/merchants')}}"> {{__('commonmodule::sidebar.merchants')}} <i
                                        class="" id="notificationBill"></i> </a>
                            </li>
                        @endcan
                        @can('warranty')
                            <li>
                                <a href="{{url('admin/warranty')}}"> {{__('commonmodule::sidebar.card_warranty')}} </a>
                            </li>
                            <li>
                                <a href="{{url('admin/warranty')}}?type=sms"> {{__('commonmodule::sidebar.sms_warranty')}} </a>
                            </li>
                        @endcan
                        @can('insurance')
                            <li>
                                <a href="{{route('insurance.index')}}"> {{__('commonmodule::sidebar.insurance')}} </a>
                            </li>
                        @endcan
                        @can('suggestions_complaint')
                            <li>
                                <a href="{{url('admin/suggestions_complaint')}}">{{__('commonmodule::sidebar.suggestions_complaint')}} </a>
                            </li>
                        @endcan
                        @can('contactus')
                            <li>
                                <a href="{{url('admin/contactus')}}"> {{__('commonmodule::sidebar.contactus')}} </a>
                            </li>
                        @endcan
                        @can('reviews')
                            <li>
                                <a href="{{url('admin/reviews')}}">{{__('commonmodule::sidebar.reviews')}}</a>
                            </li>
                        @endcan
                        @can('returns')
                            <li>
                                <a href="{{url('admin/returns')}}">{{__('commonmodule::sidebar.returns')}}</a>
                            </li>
                        @endcan

                    </ul>
                </li>
            @endcan

            @can('orders')
                <li class="menu">
                    <a href="#orders" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                        <div class="">
                            <i class="flaticon-cart-bag"></i>
                            <span>{{__('commonmodule::sidebar.orders')}}</span>
                        </div>
                        <div>
                            <i class="flaticon-right-arrow"></i>
                        </div>
                    </a>
                    <ul class="collapse submenu list-unstyled" id="orders" data-parent="#accordionExample">
                        <li>
                            <a href="#create_orders" data-toggle="collapse" aria-expanded="false"
                               class="dropdown-toggle">
                                <div class="">
                                    <span>{{__('commonmodule::sidebar.create_order')}}</span>
                                </div>
                                <div>
                                    <i class="flaticon-right-arrow"></i>
                                </div>
                            </a>
                            <ul class="list-unstyled sub-submenu collapse" id="create_orders" data-parent="#orders"
                                style="">
                                <li>
                                    <a href="{{url('admin/orders/create/user')}}"> {{__('commonmodule::sidebar.create_user_order')}} </a>
                                </li>

                                <li>
                                    <a href="{{url('admin/orders/create/merchant')}}"> {{__('commonmodule::sidebar.create_merchant_order')}} </a>
                                </li>

                            </ul>
                        </li>
                        <li>
                            <a href="#users_orders" data-toggle="collapse" aria-expanded="false"
                               class="dropdown-toggle">
                                <div class="">
                                    <span>{{__('commonmodule::sidebar.users_orders')}}</span>
                                </div>
                                <div>
                                    <i class="flaticon-right-arrow"></i>
                                </div>
                            </a>
                            <ul class="list-unstyled sub-submenu collapse" id="users_orders" data-parent="#orders"
                                style="">
                                <li>
                                    <a href="{{url('admin/orders/current')}}"> {{__('commonmodule::sidebar.open_orders')}} </a>
                                </li>

                                <li>
                                    <a href="{{url('admin/orders/done')}}"> {{__('commonmodule::sidebar.closed_order')}} </a>
                                </li>
                                <li>
                                    <a href="{{url('admin/orders/cancel')}}"> {{__('commonmodule::sidebar.canceled_order')}} </a>
                                </li>
                            </ul>
                        </li>

                        <li>
                            <a href="#merchants_orders" data-toggle="collapse" aria-expanded="false"
                               class="dropdown-toggle">
                                <div class="">
                                    <span>{{__('commonmodule::sidebar.merchants_orders')}}</span>
                                </div>
                                <div>
                                    <i class="flaticon-right-arrow"></i>
                                </div>
                            </a>
                            <ul class="list-unstyled sub-submenu collapse" id="merchants_orders" data-parent="#orders"
                                style="">
                                <li>
                                    <a href="{{url('admin/orders/merchants/current')}}"> {{__('commonmodule::sidebar.open_orders')}} </a>
                                </li>

                                <li>
                                    <a href="{{url('admin/orders/merchants/done')}}"> {{__('commonmodule::sidebar.closed_order')}} </a>
                                </li>
                                <li>
                                    <a href="{{url('admin/orders/merchants/cancel')}}"> {{__('commonmodule::sidebar.canceled_order')}} </a>
                                </li>
                            </ul>
                        </li>


                    </ul>
                </li>
            @endcan
            @can('report')
                <li class="menu">
                    <a href="#reports" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                        <div class="">
                            <i class="flaticon-settings-7"></i>
                            <span>{{__('commonmodule::sidebar.reports')}}</span>
                        </div>
                        <div>
                            <i class="flaticon-right-arrow"></i>
                        </div>
                    </a>
                    <ul class="collapse submenu list-unstyled" id="reports" data-parent="#accordionExample">

                        <li>
                            <a href="{{url('admin/orders/merchants/report')}}"> {{__('commonmodule::sidebar.merchant_reports')}} </a>
                        </li>

                        <li>
                            <a href="{{url('admin/orders/report')}}"> {{__('commonmodule::sidebar.user_reports')}} </a>
                        </li>
                        <li>
                            <a href="{{url('admin/users_activity')}}"> {{__('commonmodule::sidebar.user_activity')}} </a>
                        </li>
                        <li>
                            <a href="{{url('admin/merchants_activity')}}"> {{__('commonmodule::sidebar.merchants_activity')}} </a>
                        </li>

                    </ul>
                </li>
            @endcan
            @can('area')
                <li class="menu">
                    <a href="#area" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                        <div class="">
                            <i class="flaticon-map-1"></i>
                            <span>{{__('commonmodule::sidebar.area')}}</span>
                        </div>
                        <div>
                            <i class="flaticon-right-arrow"></i>
                        </div>
                    </a>
                    <ul class="collapse submenu list-unstyled" id="area" data-parent="#accordionExample">

                        @can('show_country')
                            <li>
                                <a href="{{url('admin/country')}}"> {{__('commonmodule::sidebar.countries')}} </a>
                            </li>
                        @endcan
                        @can('show_government')
                            <li>
                                <a href="{{url('admin/government')}}"> {{__('commonmodule::sidebar.governments')}} </a>
                            </li>
                        @endcan

                        @can('show_city')
                            <li>
                                <a href="{{url('admin/city')}}"> {{__('commonmodule::sidebar.cities')}} </a>
                            </li>
                        @endcan

                        @can('show_zone')
                            <li>
                                <a href="{{url('admin/zone')}}"> {{__('commonmodule::sidebar.zones')}} </a>
                            </li>
                        @endcan


                    </ul>
                </li>
        @endcan

            @can('report')

                <li class="menu">
                    <a href="#archive" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                        <div class="">
                            <i class="flaticon-folder"></i>
                            <span>الأرشيف</span>
                        </div>
                        <div>
                            <i class="flaticon-right-arrow"></i>
                        </div>
                    </a>
                    <ul class="collapse submenu list-unstyled" id="archive" data-parent="#accordionExample">

                        <li>
                            <a href="{{url('admin/deleted-users')}}"> التجار المحذوفون</a>
                        </li>
                        <li>
                            <a href="{{url('admin/deleted-products')}}"> المنتجات المحذوفة</a>
                        </li>

                    </ul>
                </li>

            <!--

            <li class="menu">
                <a href="#area" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                    <div class="">
                        <i class="flaticon-map-1"></i>
                        <span>{{__('commonmodule::sidebar.report')}}</span>
                        </div>
                        <div>
                            <i class="flaticon-right-arrow"></i>
                        </div>
                    </a>
                    <ul class="collapse submenu list-unstyled" id="area" data-parent="#accordionExample">

                        @can('show_report')
                <li>
                    <a href="{{url('admin/country')}}"> {{__('commonmodule::sidebar.countries')}} </a>
                            </li>
                        @endcan


                -->

                <!--   </ul> -->
                <!--      </li> -->
            <!--         @endcan -->
        </ul>


    </nav>
    <audio src="{{asset('assets/admin/assets/swiftly.mp3')}}" id="notif_sound"></audio>

</div>

