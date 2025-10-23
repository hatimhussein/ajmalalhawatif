
<div class="breadcrumbs">
    <div class="container">
        <div class="row">
            <ul>
            <li class="home"> <a title="Go to Home Page" href="<?php echo e(url('/')); ?>"><?php echo e(__('fronthomemodule::breadCrumbs.home')); ?></a><span>&mdash;›</span></li>

                <?php $__currentLoopData = $pages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$page): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <li class="category13"><strong><?php echo e($page); ?></strong>
                    <?php if($key+1 != count($pages)): ?>
                    <span>&mdash;›</span>
                    <?php endif; ?>

                  </li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>
    </div>
</div>
<?php /**PATH D:\freelancing\أجمل الهواتف\real_web_app\Modules/FrontHomeModule\Resources/views/content/breadCrumbs.blade.php ENDPATH**/ ?>