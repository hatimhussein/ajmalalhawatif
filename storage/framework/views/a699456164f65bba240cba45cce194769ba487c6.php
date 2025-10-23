<!--  GLOBAL MANDATORY STYLES -->
<link rel="stylesheet" href="<?php echo e(asset('assets/admin/bootstrap/css/bootstrap.min.css')); ?>" type="text/css">

<?php if(session('locale')=='en'): ?>
    <link rel="stylesheet" href="<?php echo e(asset('assets/admin/css/plugins.css')); ?>" type="text/css">
<?php else: ?>
    <link rel="stylesheet" href="<?php echo e(asset('assets/admin/css/plugins-rtl.css')); ?>" type="text/css">
<?php endif; ?>


<?php echo $__env->yieldContent('css'); ?>

<!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM STYLES -->
<link rel="stylesheet" href="<?php echo e(asset('assets/admin/plugins/dropzone/dropzone.min.css')); ?>" type="text/css">
<link rel="stylesheet" href="<?php echo e(asset('assets/admin/css/accounting-dashboard/style.css')); ?>" type="text/css">
<link rel="stylesheet" href="<?php echo e(asset('assets/admin/plugins/charts/c3charts/c3.min.css')); ?>" type="text/css">

<link rel="stylesheet" href="<?php echo e(asset('assets/admin/plugins/table/datatable/datatables.css')); ?>" type="text/css">


<link rel="stylesheet" href="<?php echo e(asset('assets/admin/plugins/loaders/csspin.css')); ?>" type="text/css">
<link rel="stylesheet" href="<?php echo e(asset('assets/admin/plugins/loaders/custom-loader.css')); ?>" type="text/css">


<!-- END PAGE LEVEL PLUGINS/CUSTOM STYLES -->

<!-- Font -->
<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700" rel="stylesheet">

<style media="screen">
    .cp-skeleton {
        background: white !important;
    }
</style>

<?php echo $__env->yieldPushContent('styles'); ?>
<?php /**PATH D:\freelancing\أجمل الهواتف\real_web_app\Modules/CommonModule\Resources/views/includes/css.blade.php ENDPATH**/ ?>