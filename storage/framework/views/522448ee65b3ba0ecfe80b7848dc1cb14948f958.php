<!-- <script src="<?php echo e(asset('assets/admin/plugins/sweetalert/sweetalert.min.js')); ?>"></script> -->

<link rel="stylesheet" href="<?php echo e(asset('assets/admin/plugins/animate/animate.css')); ?>" type="text/css">
<link rel="stylesheet" href="<?php echo e(asset('assets/admin/plugins/sweetalerts/sweetalert2.min.css')); ?>" type="text/css">
<link rel="stylesheet" href="<?php echo e(asset('assets/admin/plugins/sweetalerts/sweetalert.css')); ?>" type="text/css">
<link rel="stylesheet" href="<?php echo e(asset('assets/admin/css/ui-kit/custom-sweetalert.css')); ?>" type="text/css">

<script src="<?php echo e(asset('assets/admin/plugins/sweetalerts/promise-polyfill.js')); ?>"></script>
<script src="<?php echo e(asset('assets/admin/plugins/sweetalerts/sweetalert2.min.js')); ?>"></script>
<!-- <script src="<?php echo e(asset('assets/admin/plugins/sweetalerts/custom-sweetalert.js')); ?>"></script> -->

<?php if(session('success')): ?>
    <script>
        swal("<?php echo e(__('commonmodule::swal.good')); ?>", "<?php echo e(__('commonmodule::swal.saved')); ?>", "success", {button: "<?php echo e(__('commonmodule::swal.btn')); ?>",});
    </script>
<?php endif; ?>

<?php if(session('updated')=='updated'): ?>
    <script>
        swal("<?php echo e(__('commonmodule::swal.good')); ?>", "<?php echo e(__('commonmodule::swal.edited')); ?>", "success", {button: "<?php echo e(__('commonmodule::swal.btn')); ?>",});
    </script>

<?php elseif(session('updated')=='failed'): ?>
    <script>
        swal("<?php echo e(__('commonmodule::swal.fail')); ?>", "الشجرة كدا اكبر من 3 مينفعش الفئة دى ", "error", {button: "<?php echo e(__('commonmodule::swal.btn')); ?>",});
    </script>

<?php endif; ?>

<?php if(session('deleted')=='deleted'): ?>
    <script>
        swal("<?php echo e(__('commonmodule::swal.good')); ?>", "<?php echo e(__('commonmodule::swal.deleted')); ?>", "success", {button: "<?php echo e(__('commonmodule::swal.btn')); ?>",});
    </script>
<?php elseif(session('deleted')=='failed'): ?>
    <script>
        swal("<?php echo e(__('commonmodule::swal.fail')); ?>", "لا يمكن حذف هذة الفئة حيث انها تحتوى على فئات فرعية او منتجات !!!", "error", {button: "<?php echo e(__('commonmodule::swal.btn')); ?>",});
    </script>


<?php elseif(session('deleted')=='failed-status'): ?>
    <script>
        swal("oops", "Can't Delete This Staus It Assigned To Orders", "error", {button: "<?php echo e(__('commonmodule::swal.btn')); ?>",});
    </script>

<?php elseif(session('deleted')): ?>
    <script>
        swal("oops", "<?php echo e(session('deleted')); ?>", "error", {button: "<?php echo e(__('commonmodule::swal.btn')); ?>",});
    </script>
<?php endif; ?>


<?php if(session('validated')): ?>
    <script>
        swal("<?php echo e(__('commonmodule::swal.fail')); ?>", "لا بد من اختيار قسم للمنتج", "error", {button: "<?php echo e(__('commonmodule::swal.btn')); ?>",});
    </script>
<?php endif; ?>

<?php if(session('next')): ?>
    <script>
        swal("<?php echo e(__('commonmodule::swal.fail')); ?>", "لا يوجد اوردارات تالية", "error", {button: "<?php echo e(__('commonmodule::swal.btn')); ?>",});
    </script>
<?php endif; ?>

<?php if(session('previous')): ?>
    <script>
        swal("<?php echo e(__('commonmodule::swal.fail')); ?>", "لا يوجد اوردارات سابقة", "error", {button: "<?php echo e(__('commonmodule::swal.btn')); ?>",});
    </script>
<?php endif; ?>
<?php if(session('product_deleted')=='deleted'): ?>
    <script>
        swal("<?php echo e(__('commonmodule::swal.good')); ?>", "<?php echo e(__('productmodule::product.deleted_success')); ?>", "success", {button: "<?php echo e(__('commonmodule::swal.btn')); ?>",});
    </script>
<?php elseif(session('product_deleted')=='failed'): ?>
    <script>
        swal("<?php echo e(__('commonmodule::swal.fail')); ?>", "<?php echo e(__('productmodule::product.deleted_fail')); ?>", {button: "<?php echo e(__('commonmodule::swal.btn')); ?>",});
    </script>
<?php endif; ?>

<?php if(session('user_deleted')=='failed'): ?>
    <script>
        swal("<?php echo e(__('commonmodule::swal.fail')); ?>", "<?php echo e(__('usermodule::admin.deleted_fail')); ?>", {button: "<?php echo e(__('commonmodule::swal.btn')); ?>",});
    </script>
<?php endif; ?>


<?php if(session('warning')): ?>
    <script>
        swal("<?php echo e(__('commonmodule::swal.warning')); ?>", "<?php echo e(session('warning')); ?>", "warning", {button: "<?php echo e(__('commonmodule::swal.btn')); ?>",});
    </script>
<?php endif; ?>
<?php /**PATH D:\freelancing\أجمل الهواتف\real_web_app\Modules/CommonModule\Resources/views/includes/swal.blade.php ENDPATH**/ ?>