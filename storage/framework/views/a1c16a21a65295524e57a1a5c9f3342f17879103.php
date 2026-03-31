
<div class="invalid-feedback" style="display: block; font-size:15px;">
  <?php $__currentLoopData = $errors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <?php if($key==$filed): ?>
          <?php echo e($error[0]); ?>

    <?php endif; ?>
  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

</div>
<?php /**PATH D:\freelancing\أجمل الهواتف\real_web_app\Modules/CommonModule\Resources/views/includes/error.blade.php ENDPATH**/ ?>