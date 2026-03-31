<div id="about">

    <section class="col-main col-sm-9 wow bounceInUp animated about">

        <div class="policy-image-container">
            <?php if(!is_video($config->photo)): ?>
                <img src="<?php echo e(asset('images/img/'. $config->photo)); ?>" alt="">
            <?php else: ?>
                <video controls>
                    <source
                        src="<?php echo e(asset('images/img/'.$config->photo)); ?>"
                        type="video/mp4">
                    <source
                        src="<?php echo e(asset('images/img/'.$config->photo)); ?>"
                        type="video/quicktime">
                    Your browser does not support the video
                    tag.
                </video>
            <?php endif; ?>
        </div>
        <div class="page-title">
            <h2><?php echo e(LanguageHelper::configTranslate($config)); ?></h2>
        </div>
        <div class="static-contain">
            <?php echo LanguageHelper::configValue($config); ?>


        </div>
    </section>
</div>
<?php /**PATH D:\freelancing\أجمل الهواتف\real_web_app\Modules/ConfigModule\Resources/views/front/configRender.blade.php ENDPATH**/ ?>