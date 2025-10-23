<?php $__env->startSection('title'); ?>
    <?php echo e(__('fronthomemodule::home.home')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <!-- start News -->
    <?php if($news->count()): ?>
        <div class="news-line onoffswitch3">
            <input type="checkbox" name="onoffswitch3" class="onoffswitch3-checkbox" id="myonoffswitch3" checked>
            <label class="onoffswitch3-label" for="myonoffswitch3">
        <span class="onoffswitch3-inner">
            <span class="onoffswitch3-active">
                <marquee class="scroll-text" <?php echo e((App::getLocale()=='en') ? '' : 'direction=right'); ?>>
                    <?php $__currentLoopData = $news; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $single_news): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <span><?php echo e(LanguageHelper::productDescription($single_news)); ?></span>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </marquee>

                <span class="onoffswitch3-switch"><?php echo e(__('fronthomemodule::home.breaking_news')); ?></span>
            </span>
        <span class="onoffswitch3-inactive"><span
                class="onoffswitch3-switch"><?php echo e(__('fronthomemodule::home.show_breaking_news')); ?></span></span>
        </span>
            </label>
        </div>
    <?php endif; ?>
    <!-- end News -->

    <!-- start menu And Slider -->
    <div class="magik-slideshow" id="magik-slideshow">
        <div class="container">
            <div class="row">
                
                <?php echo $__env->make('fronthomemodule::content.slider', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
        </div>
    </div>

    <!-- end menu And Slider -->
    <div class="brand-logo ">
        <div class="container">
            <?php if($site_data->where('key','categories_slider')->first()->value_ar): ?>
                <div class="slider-items-products">
                    <div id="brand-logo-slider" class="product-flexslider hidden-buttons">
                        <div class="slider-items slider-width-col6">

                            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="item"><a href="<?php echo e(url('category/'.$category->id)); ?>"><img
                                            src="<?php echo e(asset('images/category/'.$category->photo)); ?>" alt="Image"></a>
                                    <h5><?php echo e(LanguageHelper::nameTranslate($category)); ?></h5>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                </div>
            <?php else: ?>
                <div class="grid gr-m-4 gr-sm-3 gr-xs-2 index-brands">
                    <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <a href="<?php echo e(url('category/'.$category->id)); ?>" class="imageDiv-container">
                            <div class="imageDiv"
                                 style="background-image: url('<?php echo e(asset('images/category/'.$category->banner)); ?>');background-size: 100% 100%;
                                     background-repeat: no-repeat;">
                            </div>
                            <div class="text">
                                <div>
                                    <h3><?php echo e(LanguageHelper::nameTranslate($category)); ?></h3>
                                </div>
                            </div>
                        </a>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            <?php endif; ?>

        </div>
    </div>

    <?php if($AdvertiseStatus[0]->status==1): ?>
        <!-- start ADS  -->
        <div class="offer-banner-section banner">
            <div class="container">
                <div class="row">

                    <?php $__currentLoopData = $advertisements; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$advertisement): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if($key > 1): ?>  <?php break; ?> <?php endif; ?>
                        <a href="<?php echo e($advertisement->link); ?>" target="_blank" class="col-xs-6">
                            <img alt="promo-banner3" src="<?php echo e(asset('images/img/'.$advertisement->image)); ?>">
                        </a>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </div>
        <!-- end ADS -->
    <?php endif; ?>

    <!-- start selectedCategories And Ads -->
    <div class="main-container col1-layout home-content-container">
        <div class="container">
            <?php echo $__env->make('fronthomemodule::content.discountsSlider', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

            <?php ($is_shown=true); ?>

            <?php $__currentLoopData = $selected_categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat_key=>$category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php echo $__env->make('fronthomemodule::content.selectedCategories', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
    <!-- start selectedCategories  -->
    <?php if($AdvertiseStatus[1]->status==1): ?>
        <div class="promo-banner-section wow bounceInDown animated banner">
            <div class="container">
                <div class="row">
                    <?php $__currentLoopData = $advertisements; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$advertisement): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if($key <= 1): ?>  <?php continue; ?> <?php endif; ?>
                        <a href="<?php echo e($advertisement->link); ?>" target="_blank" class="col-xs-6">
                            <img alt="promo-banner3" src="<?php echo e(asset('images/img/'.$advertisement->image)); ?>">
                        </a>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </div>
    <?php endif; ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('fronthomemodule::layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\freelancing\أجمل الهواتف\real_web_app\Modules/FrontHomeModule\Resources/views/index.blade.php ENDPATH**/ ?>