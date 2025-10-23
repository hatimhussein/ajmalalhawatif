<?php if($dicount_products->count()>0): ?>
    <section class="best-seller-pro wow bounceInUp animated">
        <div class="slider-items-products">
            <div class="new_title center">
                <h2><a href="#"><?php echo e(__('fronthomemodule::home.offers_and_discount')); ?></a></h2>
                <?php if($dicount_products->count() > 1): ?>
                    <a href="<?php echo e(url('discount-products')); ?>">
                        <span class="more">
                            <i class="icon-plus-sign"></i> <?php echo e(__('fronthomemodule::home.show_more')); ?>

                        </span>
                    </a>
                <?php endif; ?>
            </div>
            <div id="best-seller-slider" class="product-flexslider hidden-buttons">
                <div class="slider-items slider-width-col4">


                    <!-- Item -->
                <?php $__currentLoopData = $dicount_products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                    <?php echo $__env->make('fronthomemodule::content.product', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <!-- End Item -->


                </div>
            </div>
        </div>
    </section>
<?php endif; ?>
<br>
<?php /**PATH D:\freelancing\أجمل الهواتف\real_web_app\Modules/FrontHomeModule\Resources/views/content/discountsSlider.blade.php ENDPATH**/ ?>