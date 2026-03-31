<div class="col-lg-12 col-md-12 col-sm-12  bounceInUp animated">

    <div class="swiper-container">
        <div class="swiper-wrapper">
            <?php $__currentLoopData = $sliders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $slider): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="swiper-slide">
                    <?php if(!empty($slider->link)): ?>
                        <a target="_blank" href="<?php echo e($slider->link); ?>">
                            <img src="<?php echo e(asset('images/slider/'.$slider->image)); ?>">
                        </a>
                    <?php else: ?>
                        <img src="<?php echo e(asset('images/slider/'.$slider->image)); ?>">
                    <?php endif; ?>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
        <!-- Add Pagination -->
        <div class="swiper-pagination"></div>
        <!-- Add Arrows -->
    </div>
</div>
<?php /**PATH D:\freelancing\أجمل الهواتف\real_web_app\Modules/FrontHomeModule\Resources/views/content/slider.blade.php ENDPATH**/ ?>