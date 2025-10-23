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
                                            <span><?php echo e(__('fronthomemodule::home.categories')); ?></span> </a>
                                        <ul class="level0">
                                            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <li class="level0 nav-6 level-top first parent">
                                                    <a class="<?php echo e($category->child->where('status',1)->count() ? 'level-top' : ''); ?>"
                                                       href="<?php echo e(url('category/'.$category['id'])); ?>">
                                                        <span><?php echo LanguageHelper::nameTranslate($category); ?></span>
                                                    </a>
                                                    <?php if($category->child->where('status',1)->count()): ?>
                                                        <ul class="level0">
                                                            <?php $__currentLoopData = $category->child->where('status',1); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $childern): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <li class="level1 nav-10-2">
                                                                    <a href="<?php echo e(url('category/'.$childern['id'])); ?>">
                                                                        <span><?php echo LanguageHelper::nameTranslate($childern); ?></span>
                                                                    </a>
                                                                </li>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        </ul>
                                                    <?php endif; ?>
                                                </li>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </ul>
                                    </li>
                                    
                                    <?php $__currentLoopData = $menu_links; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $link): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <li class="level0 nav-7 level-top"><a class="level-top"
                                                                              href="<?php echo e(url($link->url)); ?>"><span><?php echo e(__($link->name)); ?></span></a>
                                        </li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    
                                    <li class="level0 nav-6 level-top parent">
                                        <a class="level-top" href="#">
                                            <span>
                                                <?php echo e(__('commonmodule::front.lang')); ?>

                                            </span>
                                        </a>
                                        <ul class="level0">
                                            <li class="level0 nav-6 level-top">
                                                <a href="<?php echo e(url('locale/ar')); ?>">
                                                    <span>
                                                        <img src="<?php echo e(asset('images/img/arabic.png')); ?>" alt="language">
                                                        عربي
                                                    </span>
                                                </a>
                                            </li>
                                            <li class="level0 nav-6 level-top">
                                                <a href="<?php echo e(url('locale/en')); ?>">
                                                    <span>
                                                        <img src="<?php echo e(asset('images/img/english.png')); ?>" alt="language">
                                                        English
                                                    </span>
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="level0 nav-6 level-top parent">
                                        <a class="level-top" href="#">
                                            <span>
                                                <?php echo e(__('commonmodule::front.currency')); ?>

                                            </span>
                                        </a>
                                        <ul class="level0">
                                            <?php $__currentLoopData = $currencies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $currency): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <li class="level0 nav-6 level-top">
                                                    <a href="<?php echo e(url('change-currency/'.$currency->id)); ?>">
                                                    <span>
                                                        <?php echo LanguageHelper::nameTranslate($currency); ?>

                                                    </span>
                                                    </a>
                                                </li>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </ul>
                                    </li>
                                    
                                    <?php if(auth()->guard()->check()): ?>
                                        <li class="level0 nav-6 level-top last parent">
                                            <a class="level-top" href="#">
                                            <span>
                                                <?php echo e(__('commonmodule::front.my_account')); ?>

                                            </span>
                                            </a>
                                            <ul class="level0">
                                                <li class="level0 nav-6 level-top">
                                                    <a href="<?php echo e(url('account-dashboard')); ?>">
                                                        <span><?php echo e(__('commonmodule::front.my_account')); ?></span>
                                                    </a>
                                                </li>
                                                <li class="level0 nav-6 level-top">
                                                    <a href="<?php echo e(route('front.returns.index')); ?>">
                                                        <span><?php echo e(__('commonmodule::front.returns')); ?></span>
                                                    </a>
                                                </li>
                                                <?php if($show_warranty): ?>
                                                    <li class="level0 nav-6 level-top">
                                                        <a href="<?php echo e(route('front.insurance.index')); ?>">
                                                            <span><?php echo e(__('warrantymodule::insurance.insurance')); ?></span>
                                                        </a>
                                                    </li>
                                                    <li class="level0 nav-6 level-top">
                                                        <a href="<?php echo e(route('front.warranty.index')); ?>">
                                                            <span><?php echo e(__('commonmodule::front.warranty')); ?></span>
                                                        </a>
                                                    </li>
                                                <?php endif; ?>
                                                <li class="level0 nav-6 level-top">
                                                    <a href="<?php echo e(url('wishlist')); ?>">
                                                        <span><?php echo e(__('commonmodule::front.wishlist')); ?></span>
                                                    </a>
                                                </li>
                                                <li class="level0 nav-6 level-top">
                                                    <a href="<?php echo e(url('cart')); ?>">
                                                        <span><?php echo e(__('commonmodule::front.view_cart')); ?></span>
                                                    </a>
                                                </li>
                                                <li class="level0 nav-6 level-top">
                                                    <a href="<?php echo e(url('checkout')); ?>">
                                                        <span><?php echo e(__('commonmodule::front.checkout')); ?></span>
                                                    </a>
                                                </li>
                                                <li class="level0 nav-6 level-top">
                                                    <a href="<?php echo e(url('orders')); ?>">
                                                        <span><?php echo e(__('commonmodule::front.my_orders')); ?></span>
                                                    </a>
                                                </li>
                                                <li class="level0 nav-6 level-top">
                                                    <a href="<?php echo e(url('logout')); ?>">
                                                        <span><?php echo e(__('commonmodule::front.logout')); ?></span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </li>
                                    <?php else: ?>
                                        <li class="level0 nav-6 level-top last">
                                            <a title="Login / RegisterLogin / Register" href="<?php echo e(url('login')); ?>">
                                                <span><?php echo e(__('commonmodule::front.login_register')); ?></span>
                                            </a>
                                        </li>
                                    <?php endif; ?>
                                    
                                </ul>
                            </li>
                        </ul>
                    </li>
                </ul>

            </div>
            <!--End mobile-menu -->


            <ul id="nav" class="hidden-xs">
                <li class="level0 nav-5 level-top first"><a class="level-top bg-ctg"> <span><i
                                class="icon-reorder"></i><?php echo e(__('fronthomemodule::home.categories')); ?></span> </a>
                    <div style="display: none" class="level0-wrapper dropdown-6col">
                        <div class="level0-wrapper2">
                            <div class="nav-block nav-block-center">
                                <ul class="level0">
                                    <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <li class="level1 nav-6-1 parent item"><a
                                                href="<?php echo e(url('category/'.$category['id'])); ?>"><span><?php echo LanguageHelper::nameTranslate($category); ?></span></a>
                                            <ul class="level1">
                                                <?php $__currentLoopData = $category->child->where('status',1); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $childern): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <li class="level2 nav-6-1-1"><a
                                                            href="<?php echo e(url('category/'.$childern['id'])); ?>"><span> <?php echo LanguageHelper::nameTranslate($childern); ?></span></a></li>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </ul>

                                        </li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </li>
                <?php $__currentLoopData = $menu_links; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $link): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li class="level0 parent"><a href="<?php echo e(url($link->url)); ?>"><span><?php echo e(__($link->name)); ?></span></a>
                    </li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>

            <!-- yiels!-->
            <div class="mini-cart-holder">
                <div class="top-cart-contain">
                    <?php
                        $total = 0
                    ?>
                    <div class="mini-cart">
                        <div data-toggle="dropdown" data-hover="dropdown" class="basket dropdown-toggle"><a
                                href="#">
                                <i class="glyphicon glyphicon-shopping-cart"></i>
                                <div class="cart-box"><span class="title">
                                        <?php echo e(__('commonmodule::front.view_cart')); ?></span>
                                    <span id="cart-total"><?php echo e(count($cart_data)); ?></span>
                                </div>
                            </a>
                        </div>

                        <div class="top-cart-content arrow_box">
                            <!-- <div class="block-subtitle">Recently added item(s)</div> -->
                            <div class="actions">
                                <a class="btn-checkout" href="<?php echo e(url('checkout')); ?>"
                                   type="button"><span><?php echo e(__('commonmodule::front.checkout')); ?></span></a>
                                <a href="<?php echo e(url('cart')); ?>" class="view-cart"
                                   type="button"><span><?php echo e(__('commonmodule::front.view_cart')); ?></span></a>
                            </div>

                            <ul id="cart-sidebar" class="mini-products-list">
                                <?php $__currentLoopData = $cart_data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $keys => $values): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                    <li
                                        class="item even <?php echo e($values["product_id"] . str_replace(',', '', $values["item_combination"])); ?>">
                                        <a class="product-image"
                                           href="<?php echo e(url('product-details/'.$values['product_id'])); ?>"
                                           title="Downloadable Product ">
                                            <img alt="Downloadable Product "
                                                 src="<?php echo e(asset('images/product/'.$values['item_photo'])); ?>"
                                                 width="80">
                                        </a>
                                        <div class="detail-item">
                                            <div class="product-details"><a
                                                    href="<?php echo e(url('product-details/'.$values['product_id'])); ?>"
                                                    title="Remove This Item" onClick=""
                                                    class="glyphicon glyphicon-remove remove-item"
                                                    data-product_id="<?php echo e($values["product_id"]); ?>"
                                                    data-item_combination="<?php echo e($values["item_combination"]); ?>">&nbsp;</a>
                                                <p class="product-name"><a
                                                        href="<?php echo e(url('product-details/'.$values['product_id'])); ?>"
                                                        title="Downloadable Product"><?php echo e($values["item_name"]); ?>

                                                        <?php echo e((strlen($values["item_name"]) >= 18) ? '...' : ''); ?></a>
                                                </p>
                                            </div>
                                            <div class="product-details-bottom"> <span
                                                    class="price item_price<?php echo e($values["product_id"] . str_replace(',', '', $values["item_combination"])); ?>"><?php echo ProductHelper::calPriceCurrency($values['item_price']); ?> <?php echo LanguageHelper::nameTranslate(Session::get('currency')); ?> </span>
                                                <span
                                                    class="title-desc"><?php echo e(__('ordermodule::cart.quantity')); ?>:</span>
                                                <strong><?php echo e($values['quantity']); ?></strong></div>
                                        </div>
                                    </li>


                                    <?php $total = $total + ($values["quantity"] * $values["item_price"]);?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <input type="hidden" id="subtotal_cal_prim"
                                       value="<?php echo ProductHelper::calPriceCurrency($total); ?>">

                            </ul>
                            <?php if(!count($cart_data)): ?>
                                <h2 id="no_products_in_cart"><?php echo e(__('ordermodule::cart.no_products')); ?></h2>
                            <?php endif; ?>
                            <div class="top-subtotal"><?php echo e(__('ordermodule::cart.subtotal')); ?> : <span
                                    id="top-subtotal " class="price subtotal_cal"><?php echo ProductHelper::calPriceCurrency($total); ?></span> <?php echo LanguageHelper::nameTranslate(Session::get('currency')); ?></div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</nav>

<!-- end navbar -->
<?php /**PATH D:\freelancing\أجمل الهواتف\real_web_app\Modules/FrontHomeModule\Resources/views/layouts/nav.blade.php ENDPATH**/ ?>