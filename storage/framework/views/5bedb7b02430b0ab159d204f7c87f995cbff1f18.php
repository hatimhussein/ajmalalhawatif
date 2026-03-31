<div class="sidebar-wrapper sidebar-theme">

    <div id="dismiss" class="d-lg-none"><i class="flaticon-cancel-12"></i></div>

    <nav id="sidebar">
        <ul class="navbar-nav theme-brand flex-row  d-none d-lg-flex">







            <li class="nav-item d-flex">
                <a href="#" class="navbar-brand">
                    <img src="<?php echo e(asset('assets/admin/img/icons/config/svg/site_data_new.svg')); ?>" class="img-fluid" alt="logo">
                </a>
                <p class="border-underline"></p>
            </li>
            <li class="nav-item theme-text">
                <a href="<?php echo e(url('/')); ?>" class="nav-link"> <?php echo e(getSiteName()); ?> </a>
            </li>
        </ul>

        <div class="sidebar-notification-container">
            <a class="dropdown-item title load-notifications" href="javascript:void(0);">
                <i class="flaticon-reload-1 mr-3"></i> <span></span>
            </a>
            <div class="dropdown-item text-center  p-1" href="javascript:void(0);">

                <div class="notification-list ">
                    <?php echo $__env->make('commonmodule::includes.notification_items', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
            </div>
        </div>

        <ul class="list-unstyled menu-categories" id="accordionExample">
            <li class="menu">
                <a href="<?php echo e(url('/admin')); ?>" class="dropdown-toggle">
                    <div class="">
                        <i class="flaticon-home-fill"></i>
                        <span><?php echo e(__('adminmodule::admin.home')); ?></span>
                    </div>
                </a>
                <ul class="collapse submenu list-unstyled show" id="dashboard" data-parent="#accordionExample">
                </ul>
            </li>
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admins')): ?>
                <li class="menu">
                    <a href="#admins" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                        <div class="">
                            <i class="flaticon-user-1"></i>
                            <span><?php echo e(__('commonmodule::sidebar.admins')); ?></span>
                        </div>
                        <div>
                            <i class="flaticon-right-arrow"></i>
                        </div>
                    </a>
                    <ul class="collapse submenu list-unstyled" id="admins" data-parent="#accordionExample">
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('show_admins')): ?>
                            <li>
                                <a href="<?php echo e(url('admin/admins')); ?>"> <?php echo e(__('commonmodule::sidebar.admins')); ?> </a>
                            </li>
                        <?php endif; ?>

                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('show_role')): ?>
                            <li>
                                <a href="<?php echo e(url('admin/permissions')); ?>"> <?php echo e(__('commonmodule::sidebar.admins_group')); ?> </a>
                            </li>
                        <?php endif; ?>
                    </ul>
                </li>
            <?php endif; ?>
        <!-- <li class="menu">
                       <a href="#users" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                           <div class="">
                               <i class="flaticon-user-group"></i>
                               <span><?php echo e(__('commonmodule::sidebar.users')); ?></span>
                           </div>
                           <div>
                               <i class="flaticon-right-arrow"></i>
                           </div>
                       </a>
                       <ul class="collapse submenu list-unstyled" id="users" data-parent="#accordionExample">
                           <li>
                               <a href="<?php echo e(url('admin/users')); ?>"> <?php echo e(__('commonmodule::sidebar.users')); ?> </a>
                           </li>
                       </ul>
                   </li> -->

            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('products')): ?>

                <li class="menu">
                    <a href="#products" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                        <div class="">
                            <i class="flaticon-cart-2"></i>
                            <span><?php echo e(__('commonmodule::sidebar.products')); ?></span>
                        </div>
                        <div>
                            <i class="flaticon-right-arrow"></i>
                        </div>
                    </a>
                    <ul class="collapse submenu list-unstyled" id="products" data-parent="#accordionExample">

                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('show_category')): ?>
                            <li>
                                <a href="<?php echo e(url('admin/category')); ?>"> <?php echo e(__('commonmodule::sidebar.categories')); ?> </a>
                            </li>
                        <?php endif; ?>

                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('show_product')): ?>
                            <li>
                                <a href="<?php echo e(url('admin/product')); ?>"> <?php echo e(__('commonmodule::sidebar.products')); ?> </a>
                            </li>
                        <?php endif; ?>

                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('show_brand')): ?>
                            <li>
                                <a href="<?php echo e(url('admin/brand')); ?>"> <?php echo e(__('commonmodule::sidebar.brands')); ?> </a>
                            </li>
                        <?php endif; ?>

                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('show_catalog_category')): ?>
                            <li>
                                <a href="<?php echo e(route('catalog_category.index')); ?>"> <?php echo e(__('commonmodule::sidebar.catalog_category')); ?> </a>
                            </li>
                        <?php endif; ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('show_catalog')): ?>
                            <li>
                                <a href="<?php echo e(route('catalog.index')); ?>"> <?php echo e(__('commonmodule::sidebar.catalogs')); ?> </a>
                            </li>
                        <?php endif; ?>

                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('show_attribute')): ?>
                            <li>
                                <a href="<?php echo e(url('admin/attribute')); ?>"> <?php echo e(__('commonmodule::sidebar.attributes')); ?> </a>
                            </li>
                        <?php endif; ?>

                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('show_options')): ?>
                            <li>
                                <a href="<?php echo e(url('admin/option')); ?>"> <?php echo e(__('commonmodule::sidebar.options')); ?> </a>
                            </li>
                        <?php endif; ?>

                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('show_deliverytime')): ?>
                            <li>
                                <a href="<?php echo e(url('admin/delivery_time')); ?>"> <?php echo e(__('commonmodule::sidebar.delivery_time')); ?> </a>
                            </li>
                        <?php endif; ?>
                    </ul>
                </li>

            <?php endif; ?>

            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('markting')): ?>
                <li class="menu">
                    <a href="#markting" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                        <div class="">
                            <i class="flaticon-wallet"></i>
                            <span><?php echo e(__('commonmodule::sidebar.markting')); ?></span>
                        </div>
                        <div>
                            <i class="flaticon-right-arrow"></i>
                        </div>
                    </a>
                    <ul class="collapse submenu list-unstyled" id="markting" data-parent="#accordionExample">

                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('show_voucher')): ?>
                            <li>
                                <a href="<?php echo e(url('admin/voucher')); ?>"><?php echo e(__('commonmodule::sidebar.voucher')); ?></a>
                            </li>
                        <?php endif; ?>

                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('show_offer')): ?>
                            <li>
                                <a href="<?php echo e(url('admin/offers')); ?>"><?php echo e(__('commonmodule::sidebar.offers')); ?></a>
                            </li>
                        <?php endif; ?>

                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('show_advertisment')): ?>
                            <li>
                                <a href="<?php echo e(url('admin/advertisment')); ?>">  <?php echo e(__('commonmodule::sidebar.advertisment')); ?> </a>
                            </li>
                        <?php endif; ?>

                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('abandoned_cart')): ?>
                            <li>
                                <a href="<?php echo e(url('admin/abandoned-cart')); ?>">  <?php echo e(__('ordermodule::admin.abandoned_carts')); ?> </a>
                            </li>
                        <?php endif; ?>

                    </ul>
                </li>
            <?php endif; ?>

            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('config')): ?>
                <li class="menu">
                    <a href="#config" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                        <div class="">
                            <i class="flaticon-settings-7"></i>
                            <span><?php echo e(__('commonmodule::sidebar.config')); ?></span>
                        </div>
                        <div>
                            <i class="flaticon-right-arrow"></i>
                        </div>
                    </a>
                    <ul class="collapse submenu list-unstyled" id="config" data-parent="#accordionExample">

                        <li>
                            <a href="<?php echo e(url('admin/config')); ?>"> <?php echo e(__('commonmodule::sidebar.config')); ?> </a>
                        </li>
                        <li>
                            <a href="<?php echo e(url('admin/invoice-status')); ?>"> حالة الفاتور القابلة للتنزيل </a>
                        </li>
                        <li>
                            <a href="<?php echo e(url('admin/log-viewer')); ?>"> تتبع اخطاء النظام </a>
                        </li>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('show_currency')): ?>
                            <li>
                                <a href="<?php echo e(url('admin/currency')); ?>">  <?php echo e(__('commonmodule::sidebar.currency')); ?> </a>
                            </li>
                        <?php endif; ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('show_status')): ?>
                            <li>
                                <a href="<?php echo e(url('admin/status')); ?>">  <?php echo e(__('commonmodule::sidebar.status')); ?> </a>
                            </li>
                        <?php endif; ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('newsletter')): ?>
                            <li>
                                <a href="<?php echo e(url('admin/newsletter')); ?>">  <?php echo e(__('commonmodule::sidebar.newsletter')); ?> </a>
                            </li>
                        <?php endif; ?>

                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('show_slider')): ?>
                            <li>
                                <a href="<?php echo e(url('admin/slider')); ?>">  <?php echo e(__('commonmodule::sidebar.slider')); ?></a>
                            </li>
                        <?php endif; ?>

                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('show_payment_method')): ?>
                            <li>
                                <a href="<?php echo e(url('admin/payment-method')); ?>">  <?php echo e(__('commonmodule::sidebar.payment_method')); ?> </a>
                            </li>
                        <?php endif; ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('show_shipping_method')): ?>
                            <li>
                                <a href="<?php echo e(url('admin/shipping-method')); ?>">  <?php echo e(__('commonmodule::sidebar.shipping_method')); ?> </a>
                            </li>
                        <?php endif; ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('show_seo')): ?>
                            <li>
                                <a href="<?php echo e(url('admin/seo')); ?>">  <?php echo e(__('commonmodule::sidebar.seo')); ?> </a>
                            </li>
                        <?php endif; ?>
                        <li>
                            <a href="<?php echo e(url('admin/site_colors')); ?>">  <?php echo e(__('commonmodule::sidebar.site_colors')); ?> </a>
                        </li>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('labels')): ?>
                            <li>
                                <a href="<?php echo e(url('admin/labels')); ?>">  <?php echo e(__('commonmodule::sidebar.lang_settings')); ?> </a>
                            </li>
                        <?php endif; ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('News')): ?>
                            <li>
                                <a href="<?php echo e(url('admin/news')); ?>">  <?php echo e(__('configmodule::admin.news')); ?> </a>
                            </li>
                        <?php endif; ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('tax')): ?>
                            <li>
                                <a href="<?php echo e(url('admin/tax')); ?>">  <?php echo e(__('commonmodule::sidebar.tax')); ?> </a>
                            </li>
                        <?php endif; ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('menu_links')): ?>
                            <li>
                                <a href="<?php echo e(route('menu.index')); ?>">  <?php echo e(__('configmodule::admin.menu_links')); ?> </a>
                            </li>
                        <?php endif; ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('notify_body')): ?>
                            <li>
                                <a href="<?php echo e(route('notification-settings.index')); ?>">  <?php echo e(__('configmodule::admin.notification_settings')); ?> </a>
                            </li>
                        <?php endif; ?>
                    </ul>
                </li>
            <?php endif; ?>


            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->any(['users', 'warranty', 'insurance', 'show_skudo_warranty', 'show_skudo_insurance'])): ?>
                <li class="menu">
                    <a href="#users" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                        <div class="">
                            <i class="flaticon-user-group-2"></i>
                            <span><?php echo e(__('commonmodule::sidebar.users')); ?></span>
                        </div>
                        <div>
                            <i class="flaticon-right-arrow"></i>
                        </div>
                    </a>
                    <ul class="collapse submenu list-unstyled" id="users" data-parent="#accordionExample">

                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('users')): ?>
                            <li>
                                <a href="<?php echo e(url('admin/users')); ?>"> <?php echo e(__('commonmodule::sidebar.users')); ?> </a>
                            </li>
                        <?php endif; ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('users')): ?>
                            <li>
                                <a href="<?php echo e(url('admin/deleted-users')); ?>"> العملاء المحذوفين </a>
                            </li>
                        <?php endif; ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('show_merchant')): ?>
                            <li>
                                <a href="<?php echo e(url('admin/merchants')); ?>"> <?php echo e(__('commonmodule::sidebar.merchants')); ?> <i
                                        class="" id="notificationBill"></i> </a>
                            </li>
                        <?php endif; ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('warranty')): ?>
                            <li>
                                <a href="<?php echo e(url('admin/warranty')); ?>"> <?php echo e(__('commonmodule::sidebar.card_warranty')); ?> </a>
                            </li>
                            <li>
                                <a href="<?php echo e(url('admin/warranty')); ?>?type=sms"> <?php echo e(__('commonmodule::sidebar.sms_warranty')); ?> </a>
                            </li>
                        <?php endif; ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('insurance')): ?>
                            <li>
                                <a href="<?php echo e(route('insurance.index')); ?>"> <?php echo e(__('commonmodule::sidebar.insurance')); ?> </a>
                            </li>
                        <?php endif; ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('suggestions_complaint')): ?>
                            <li>
                                <a href="<?php echo e(url('admin/suggestions_complaint')); ?>"><?php echo e(__('commonmodule::sidebar.suggestions_complaint')); ?> </a>
                            </li>
                        <?php endif; ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('contactus')): ?>
                            <li>
                                <a href="<?php echo e(url('admin/contactus')); ?>"> <?php echo e(__('commonmodule::sidebar.contactus')); ?> </a>
                            </li>
                        <?php endif; ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('reviews')): ?>
                            <li>
                                <a href="<?php echo e(url('admin/reviews')); ?>"><?php echo e(__('commonmodule::sidebar.reviews')); ?></a>
                            </li>
                        <?php endif; ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('returns')): ?>
                            <li>
                                <a href="<?php echo e(url('admin/returns')); ?>"><?php echo e(__('commonmodule::sidebar.returns')); ?></a>
                            </li>
                        <?php endif; ?>

                    </ul>
                </li>
            <?php endif; ?>

            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('orders')): ?>
                <li class="menu">
                    <a href="#orders" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                        <div class="">
                            <i class="flaticon-cart-bag"></i>
                            <span><?php echo e(__('commonmodule::sidebar.orders')); ?></span>
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
                                    <span><?php echo e(__('commonmodule::sidebar.create_order')); ?></span>
                                </div>
                                <div>
                                    <i class="flaticon-right-arrow"></i>
                                </div>
                            </a>
                            <ul class="list-unstyled sub-submenu collapse" id="create_orders" data-parent="#orders"
                                style="">
                                <li>
                                    <a href="<?php echo e(url('admin/orders/create/user')); ?>"> <?php echo e(__('commonmodule::sidebar.create_user_order')); ?> </a>
                                </li>

                                <li>
                                    <a href="<?php echo e(url('admin/orders/create/merchant')); ?>"> <?php echo e(__('commonmodule::sidebar.create_merchant_order')); ?> </a>
                                </li>

                            </ul>
                        </li>
                        <li>
                            <a href="#users_orders" data-toggle="collapse" aria-expanded="false"
                               class="dropdown-toggle">
                                <div class="">
                                    <span><?php echo e(__('commonmodule::sidebar.users_orders')); ?></span>
                                </div>
                                <div>
                                    <i class="flaticon-right-arrow"></i>
                                </div>
                            </a>
                            <ul class="list-unstyled sub-submenu collapse" id="users_orders" data-parent="#orders"
                                style="">
                                <li>
                                    <a href="<?php echo e(url('admin/orders/current')); ?>"> <?php echo e(__('commonmodule::sidebar.open_orders')); ?> </a>
                                </li>

                                <li>
                                    <a href="<?php echo e(url('admin/orders/done')); ?>"> <?php echo e(__('commonmodule::sidebar.closed_order')); ?> </a>
                                </li>
                                <li>
                                    <a href="<?php echo e(url('admin/orders/cancel')); ?>"> <?php echo e(__('commonmodule::sidebar.canceled_order')); ?> </a>
                                </li>
                            </ul>
                        </li>

                        <li>
                            <a href="#merchants_orders" data-toggle="collapse" aria-expanded="false"
                               class="dropdown-toggle">
                                <div class="">
                                    <span><?php echo e(__('commonmodule::sidebar.merchants_orders')); ?></span>
                                </div>
                                <div>
                                    <i class="flaticon-right-arrow"></i>
                                </div>
                            </a>
                            <ul class="list-unstyled sub-submenu collapse" id="merchants_orders" data-parent="#orders"
                                style="">
                                <li>
                                    <a href="<?php echo e(url('admin/orders/merchants/current')); ?>"> <?php echo e(__('commonmodule::sidebar.open_orders')); ?> </a>
                                </li>

                                <li>
                                    <a href="<?php echo e(url('admin/orders/merchants/done')); ?>"> <?php echo e(__('commonmodule::sidebar.closed_order')); ?> </a>
                                </li>
                                <li>
                                    <a href="<?php echo e(url('admin/orders/merchants/cancel')); ?>"> <?php echo e(__('commonmodule::sidebar.canceled_order')); ?> </a>
                                </li>
                            </ul>
                        </li>


                    </ul>
                </li>
            <?php endif; ?>
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('report')): ?>
                <li class="menu">
                    <a href="#reports" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                        <div class="">
                            <i class="flaticon-settings-7"></i>
                            <span><?php echo e(__('commonmodule::sidebar.reports')); ?></span>
                        </div>
                        <div>
                            <i class="flaticon-right-arrow"></i>
                        </div>
                    </a>
                    <ul class="collapse submenu list-unstyled" id="reports" data-parent="#accordionExample">

                        <li>
                            <a href="<?php echo e(url('admin/orders/merchants/report')); ?>"> <?php echo e(__('commonmodule::sidebar.merchant_reports')); ?> </a>
                        </li>

                        <li>
                            <a href="<?php echo e(url('admin/orders/report')); ?>"> <?php echo e(__('commonmodule::sidebar.user_reports')); ?> </a>
                        </li>
                        <li>
                            <a href="<?php echo e(url('admin/users_activity')); ?>"> <?php echo e(__('commonmodule::sidebar.user_activity')); ?> </a>
                        </li>
                        <li>
                            <a href="<?php echo e(url('admin/merchants_activity')); ?>"> <?php echo e(__('commonmodule::sidebar.merchants_activity')); ?> </a>
                        </li>

                    </ul>
                </li>
            <?php endif; ?>
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('area')): ?>
                <li class="menu">
                    <a href="#area" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                        <div class="">
                            <i class="flaticon-map-1"></i>
                            <span><?php echo e(__('commonmodule::sidebar.area')); ?></span>
                        </div>
                        <div>
                            <i class="flaticon-right-arrow"></i>
                        </div>
                    </a>
                    <ul class="collapse submenu list-unstyled" id="area" data-parent="#accordionExample">

                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('show_country')): ?>
                            <li>
                                <a href="<?php echo e(url('admin/country')); ?>"> <?php echo e(__('commonmodule::sidebar.countries')); ?> </a>
                            </li>
                        <?php endif; ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('show_government')): ?>
                            <li>
                                <a href="<?php echo e(url('admin/government')); ?>"> <?php echo e(__('commonmodule::sidebar.governments')); ?> </a>
                            </li>
                        <?php endif; ?>

                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('show_city')): ?>
                            <li>
                                <a href="<?php echo e(url('admin/city')); ?>"> <?php echo e(__('commonmodule::sidebar.cities')); ?> </a>
                            </li>
                        <?php endif; ?>

                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('show_zone')): ?>
                            <li>
                                <a href="<?php echo e(url('admin/zone')); ?>"> <?php echo e(__('commonmodule::sidebar.zones')); ?> </a>
                            </li>
                        <?php endif; ?>


                    </ul>
                </li>
        <?php endif; ?>

            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('report')): ?>

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
                            <a href="<?php echo e(url('admin/deleted-users')); ?>"> التجار المحذوفون</a>
                        </li>
                        <li>
                            <a href="<?php echo e(url('admin/deleted-products')); ?>"> المنتجات المحذوفة</a>
                        </li>

                    </ul>
                </li>

            <?php endif; ?>

            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->any(['show_skudo_warranty', 'show_skudo_insurance', 'show_skudo_serial_numbers'])): ?>
                <li class="menu">
                    <a href="#skudo-management" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                        <div class="">
                            <i class="flaticon-shield"></i>
                            <span>إدارة سكودو</span>
                        </div>
                        <div>
                            <i class="flaticon-right-arrow"></i>
                        </div>
                    </a>
                    <ul class="collapse submenu list-unstyled" id="skudo-management" data-parent="#accordionExample">

                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->any(['show_skudo_insurance'])): ?>
                            <li>
                                <a href="<?php echo e(route('skudo.insurance.index')); ?>"> <?php echo e(__('commonmodule::sidebar.insurance_skudo')); ?> </a>
                            </li>
                        <?php endif; ?>

                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->any(['show_skudo_warranty'])): ?>
                            <li>
                                <a href="<?php echo e(route('skudo.warranty.index')); ?>?type=sms"> <?php echo e(__('commonmodule::sidebar.warranty_skudo')); ?> </a>
                            </li>
                            
                            
                            

                        <?php endif; ?>

                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->any(['show_skudo_serial_numbers'])): ?>
                            <li>
                                <a href="<?php echo e(route('skudo.serial-numbers.index')); ?>"> الأرقام التسلسلية </a>
                            </li>
                        <?php endif; ?>


                            





                    </ul>
                </li>
            <?php endif; ?>

            <!--

            <li class="menu">
                <a href="#area" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                    <div class="">
                        <i class="flaticon-map-1"></i>
                        <span><?php echo e(__('commonmodule::sidebar.report')); ?></span>
                        </div>
                        <div>
                            <i class="flaticon-right-arrow"></i>
                        </div>
                    </a>
                    <ul class="collapse submenu list-unstyled" id="area" data-parent="#accordionExample">

                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('show_report')): ?>
                <li>
                    <a href="<?php echo e(url('admin/country')); ?>"> <?php echo e(__('commonmodule::sidebar.countries')); ?> </a>
                            </li>
                        <?php endif; ?>


                -->

                <!--   </ul> -->
                <!--      </li> -->
        </ul>


    </nav>
    <audio src="<?php echo e(asset('assets/admin/assets/swiftly.mp3')); ?>" id="notif_sound"></audio>

</div>

<?php /**PATH D:\freelancing\أجمل الهواتف\real_web_app\Modules/CommonModule\Resources/views/includes/aside.blade.php ENDPATH**/ ?>