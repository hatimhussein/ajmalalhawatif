<!DOCTYPE html>
<html dir="ltr">
<head>

    <meta charset="utf-8">
    <META http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">

    <title> <?php echo $__env->yieldContent('title'); ?></title>

    <?php echo $__env->make('commonmodule::includes.css', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

</head>

<body>
<!-- Site header -->
<?php echo $__env->make('commonmodule::includes.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<!-- =============================================== -->
<!-- =============================================== -->

<div class="main-container" id="container">
    <div class="overlay"></div>
    <div class="cs-overlay"></div>


<?php echo $__env->make('commonmodule::includes.aside', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<!-- Main content -->
<?php echo $__env->yieldContent('content'); ?>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?php echo $__env->make('commonmodule::includes.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


<!-- ./wrapper -->


<?php echo $__env->make('commonmodule::includes.js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


</body>
</html>
<?php /**PATH D:\freelancing\أجمل الهواتف\real_web_app\Modules/CommonModule\Resources/views/layouts/master.blade.php ENDPATH**/ ?>