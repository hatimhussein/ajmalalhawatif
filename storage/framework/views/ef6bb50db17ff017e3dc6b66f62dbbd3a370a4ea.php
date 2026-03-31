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
                            <?php if(session('locale')!='en'): ?>
                                <img src="<?php echo e(asset('images/img/arabic.png')); ?>" alt="language">
                            <?php else: ?>
                                <img src="<?php echo e(asset('images/img/english.png')); ?>" alt="language">
                            <?php endif; ?>
                            <?php echo e(__('commonmodule::front.lang')); ?> <span class="caret"></span>
                        </a>


                        <ul class="dropdown-menu" role="menu">
                            <li role="presentation">
                                <a class="bold" role="menuitem" tabindex="-1" href="<?php echo e(url('locale/ar')); ?>">
                                    <img src="<?php echo e(asset('images/img/arabic.png')); ?>" alt="language"> عربي
                                </a>
                            </li>
                            <li role="presentation">
                                <a role="menuitem" tabindex="-1" href="<?php echo e(url('locale/en')); ?>">
                                    <img src="<?php echo e(asset('images/img/english.png')); ?>" alt="language"> English
                                </a>
                            </li>
                        </ul>
                    </div>


                    <div class="dropdown block-language-wrapper">
                        <a role="button" data-toggle="dropdown" data-target="#" class="block-language dropdown-toggle"
                           href="#">
                            <img src="<?php echo e(asset('images/img/coins.png')); ?>" alt="language">
                            <?php echo e(__('commonmodule::front.currency')); ?> <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu" role="menu">

                            <?php $__currentLoopData = $currencies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $currency): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li role="presentation">
                                    <a class="bold" role="menuitem" tabindex="-1"
                                       href="<?php echo e(url('change-currency/'.$currency->id)); ?>">

                                        <?php echo LanguageHelper::nameTranslate($currency); ?>

                                    </a>
                                </li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        </ul>
                    </div>


                    <!-- End Header Language -->
                    <div class="welcome-msg hidden-xs"> <?php echo e(__('commonmodule::front.welcome_message')); ?> </div>
                </div>
                <div class="col-xs-5 fl-r">

                    <!-- Header Top Links -->
                    <div class="toplinks">
                        <div class="links">
                            <?php if(auth()->check()): ?>
                                <div class="dropdown block-language-wrapper account">
                                    <a role="button"
                                       data-toggle="dropdown"
                                       data-target="#"
                                       class="block-language dropdown-toggle"
                                       href="<?php echo e(url('account-dashboard')); ?>"><?php echo e(__('commonmodule::front.my_account')); ?>

                                        <span
                                            class="caret"></span> </a>
                                    <ul class="account-list dropdown-menu" role="menu">
                                        <li role="presentation"><a role="menuitem" tabindex="-1"
                                                                   href="<?php echo e(url('account-dashboard')); ?>">
                                                <?php echo e(__('commonmodule::front.my_account')); ?> </a></li>

                                        <li role="presentation"><a role="menuitem" tabindex="-1"
                                                                   href="<?php echo e(route('front.returns.index')); ?>">
                                                <?php echo e(__('commonmodule::front.returns')); ?> </a></li>

                                        <?php if($show_warranty): ?>
                                            <li role="presentation">
                                                <a role="menuitem" tabindex="-1"
                                                   href="<?php echo e(route('front.insurance.index')); ?>">
                                                    <?php echo e(__('warrantymodule::insurance.insurance')); ?>

                                                </a>
                                            </li>
                                            <li role="presentation">
                                                <a role="menuitem" tabindex="-1"
                                                   href="<?php echo e(route('front.warranty.index')); ?>">
                                                    <?php echo e(__('commonmodule::front.warranty')); ?>

                                                </a>
                                            </li>
                                        <?php endif; ?>
                                        <li role="presentation"><a role="menuitem" tabindex="-1"
                                                                   href="<?php echo e(route('allSuggestion')); ?>">
                                                <?php echo e(__('commonmodule::front.suggestion')); ?> </a></li>

                                        <li role="presentation"><a role="menuitem" tabindex="-1"
                                                                   href="<?php echo e(url('wishlist')); ?>">
                                                <?php echo e(__('commonmodule::front.wishlist')); ?> </a></li>
                                        <li role="presentation"><a role="menuitem" tabindex="-1" href="<?php echo e(url('cart')); ?>">
                                                <?php echo e(__('commonmodule::front.view_cart')); ?> </a></li>
                                        <li role="presentation"><a role="menuitem" tabindex="-1"
                                                                   href="<?php echo e(url('orders')); ?>">
                                                <?php echo e(__('commonmodule::front.my_orders')); ?> </a></li>
                                        <li role="presentation" class="last"><a role="menuitem" tabindex="-1"
                                                                                href="<?php echo e(url('logout')); ?>">
                                                <?php echo e(__('commonmodule::front.logout')); ?> </a>
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
                                                        <?php echo e(__('configmodule::notification.loading')); ?>

                                                    </b>
                                                </p>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            <?php else: ?>
                                <div class="myaccount">
                                    <a title="Login / RegisterLogin / Register" href="<?php echo e(url('login')); ?>">
                                        <span><?php echo e(__('commonmodule::front.login_register')); ?></span>
                                    </a>
                                </div>
                            <?php endif; ?>

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
                <a class="logo" title="Magento Commerce" href="<?php echo e(url('/')); ?>">
                    <img alt="Magento Commerce" src="<?php echo e(asset('images/img/'.$websiteLogo)); ?>">
                </a>
                <!-- End Header Logo -->
            </div>
            <div class="col-lg-10 col-sm-9 col-md-10 fl-r fl-un">
                <!-- Search-col -->
                <div class="search-box">
                    <form action="<?php echo e(url('search')); ?>" method="get" id="search_mini_form" name="Categories">
                        <input type="text" autocomplete="off" placeholder="<?php echo e(__('commonmodule::front.search_here')); ?>"
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
<?php /**PATH D:\freelancing\أجمل الهواتف\real_web_app\Modules/CommonModule\Resources/views/front/includes/header.blade.php ENDPATH**/ ?>