<footer class="footer bounceInUp animated">
    <div class="brand-logo ">
        <div class="container">
            <div class="slider-items-products">
                <div class="new_title center">
                    <h2><a href="#"><?php echo e(__('commonmodule::front.shopbybrand')); ?></a></h2>
                </div>
                <div id="brand-logo-slider" class="product-flexslider hidden-buttons">
                    <div class="slider-items slider-width-col6">

                        <?php $__currentLoopData = $brands; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $brand): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="item"><a href="<?php echo e(url('brand-products/'.$brand->id)); ?>"><img
                                        src="<?php echo e(asset('images/brand/'.$brand->photo)); ?>" alt="Image"></a></div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
                                <h4><?php echo e(__('commonmodule::front.newsletter')); ?></h4>
                                <input type="text" placeholder="<?php echo e(__('commonmodule::front.enter_email')); ?>"
                                       class="input-text required-entry validate-email"
                                       title="Sign up for our newsletter"
                                       id="newsletter1" name="email" autocomplete="off">
                                <button class="subscribe" title="Subscribe" type="submit">
                                    <span><?php echo e(__('commonmodule::front.subscribe')); ?></span></button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-5 fl-r">
                    <div class="social">
                        <ul>
                            <?php $__currentLoopData = $socialLinks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $social): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if(!empty($social->value_ar)): ?>

                                    <li class="<?php echo e($social->key); ?>">
                                        <a target="_blank" href="<?php echo e($social->value_ar); ?>"
                                           style="background-image: url('<?php echo e(asset('images/img/'.$social->photo)); ?>');"
                                        ></a>
                                    </li>
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

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
                    <a href="<?php echo e(url('/')); ?>" title="Logo">
                        <img src="<?php echo e(asset('images/img/'.$websiteLogo_footer)); ?>" alt="logo">
                    </a>
                    <p><?php echo e(__('commonmodule::front.footer_slogan')); ?></p>
                </div>
                <div class="company">
                    <p>
                        <?php echo LanguageHelper::configTranslate($site_data->where('key','hotline')->first()); ?>

                        <span><?php echo e($hotlines[0]); ?></span>
                    </p>
                    <a href="<?php echo e(url('/contact_us')); ?>"><?php echo e(__('fronthomemodule::home.contact_us')); ?></a>
                    <a href="<?php echo e(url('/catalog')); ?>"><?php echo e(__('commonmodule::front.catalogs')); ?></a>
                    <a href="<?php echo e(url('/config/5')); ?>"><?php echo LanguageHelper::configTranslate($site_data->where('key','privacy')->first()); ?></a>
                    <a href="<?php echo e(url('/config/3')); ?>"><?php echo LanguageHelper::configTranslate($site_data->where('key','aman')->first()); ?></a>
                    <?php if(auth()->guard()->check()): ?>
                        <a href="<?php echo e(route('front.insurance.index')); ?>"><?php echo e(__('warrantymodule::insurance.insurance')); ?></a>
                        <a href="<?php echo e(route('front.warranty.index')); ?>"><?php echo e(__('commonmodule::front.warranty')); ?></a>
                    <?php endif; ?>
                    <a href="<?php echo e(route('front.skudo.insurance.index')); ?>"><?php echo e(__('commonmodule::front.insurance_skudo')); ?></a>
                    <a href="<?php echo e(route('front.skudo.warranty.index')); ?>"><?php echo e(__('commonmodule::front.warranty_skudo')); ?></a>
                </div>

                <div class="policy">
                    <h3><?php echo e(__('fronthomemodule::home.policies')); ?></h3>

                    <a href="<?php echo e(url('/config/2')); ?>"><?php echo LanguageHelper::configTranslate($site_data->where('key','map')->first()); ?></a>
                    <a href="<?php echo e(url('/config/5')); ?>"><?php echo LanguageHelper::configTranslate($site_data->where('key','privacy')->first()); ?></a>
                    <a href="<?php echo e(url('/config/3')); ?>"><?php echo LanguageHelper::configTranslate($site_data->where('key','aman')->first()); ?></a>
                </div>

                <div class="shipping-payment">
                    <h4><?php echo e(__('fronthomemodule::home.express_methods')); ?></h4>
                    <ul>
                        <?php $__currentLoopData = $shipping_method; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $method): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li><img
                                    src="<?php echo e(asset('images/img/'.$method->image)); ?>"
                                    alt=""></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                    <h4><?php echo e(__('fronthomemodule::home.payment_methods')); ?></h4>
                    <ul>
                        <?php $__currentLoopData = $payment_method; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $method): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li><img
                                    src="<?php echo e(asset('images/img/'.$method->image)); ?>"
                                    alt=""></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
<?php /**PATH D:\freelancing\أجمل الهواتف\real_web_app\Modules/CommonModule\Resources/views/front/includes/footer.blade.php ENDPATH**/ ?>