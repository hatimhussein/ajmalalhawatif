<?php $__env->startSection('css'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('assets/admin/css/design-css/design.css')); ?>" type="text/css">
    <link rel="stylesheet" href="<?php echo e(asset('assets/admin/css/design-css/design-icons.css')); ?>" type="text/css">

    <style>
        .row [class*="col-"] .widget .widget-header h4 {
            color: #00d1c1;
        }
    </style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('title'); ?>
    عرض الرقم التسلسلي
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div id="content" class="main-content">
        <div class="container">
            <div class="page-header">
                <div class="page-title">
                    <h3>الأرقام التسلسلية</h3>
                    <div class="crumbs">
                        <ul id="breadcrumbs" class="breadcrumb">
                            <li><a href="<?php echo e(url('/admin')); ?>"><i class="flaticon-home-fill"></i></a></li>
                            <li><a href="<?php echo e(route('skudo.serial-numbers.index')); ?>">الأرقام التسلسلية</a></li>
                            <li><a href="#">عرض الرقم التسلسلي</a></li>
                        </ul>
                    </div>
                </div>
                <div class="page-title" style="float:right">
                    <a class="mt-4 btn btn-button-16 mr-2"
                       href="<?php echo e(route('skudo.serial-numbers.edit', $serialNumber->id)); ?>">
                        تعديل
                    </a>
                    <a class="mt-4 btn btn-button-16 mr-2"
                       href="<?php echo e(route('skudo.serial-numbers.index')); ?>">
                        العودة
                    </a>
                </div>
            </div>

            <div class="row" id="cancel-row">

                <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                    <div class="statbox widget box box-shadow">
                        <div class="widget-header">
                            <div class="row">
                                <div class="col-xl-9 col-md-9 col-sm-9 col-9">
                                    <h4>تفاصيل الرقم التسلسلي</h4>
                                </div>
                            </div>
                        </div>
                        <div class="widget-content widget-content-area">
                            <div class="row">
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                                    <div class="statbox widget box box-shadow">
                                        <div class="widget-header">
                                            <div class="row">
                                                <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                                    <h4>المعلومات الأساسية</h4>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="widget-content widget-content-area">
                                            <div class="form-row">
                                                <div class="col-md-12 mb-4">
                                                    <label>رقم الصنف:</label>
                                                    <p class="form-control-plaintext"><?php echo e($serialNumber->item_number ?? '-'); ?></p>
                                                </div>

                                                <div class="col-md-12 mb-4">
                                                    <label>الباركود:</label>
                                                    <p class="form-control-plaintext"><?php echo e($serialNumber->barcode ?? '-'); ?></p>
                                                </div>

                                                <div class="col-md-12 mb-4">
                                                    <label>اسم الصنف (عربي):</label>
                                                    <p class="form-control-plaintext"><?php echo e($serialNumber->product_name_ar ?? '-'); ?></p>
                                                </div>

                                                <div class="col-md-12 mb-4">
                                                    <label>اسم الصنف (إنجليزي):</label>
                                                    <p class="form-control-plaintext"><?php echo e($serialNumber->product_name_en ?? '-'); ?></p>
                                                </div>

                                                <div class="col-md-12 mb-4">
                                                    <label>الرقم التسلسلي للمنتج:</label>
                                                    <p class="form-control-plaintext"><?php echo e($serialNumber->product_serial ?? '-'); ?></p>
                                                </div>

                                                <div class="col-md-12 mb-4">
                                                    <label>تاريخ الإضافة:</label>
                                                    <p class="form-control-plaintext"><?php echo e($serialNumber->formatted_created_at); ?></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                                    <div class="statbox widget box box-shadow">
                                        <div class="widget-header">
                                            <div class="row">
                                                <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                                    <h4>الإجراءات</h4>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="widget-content widget-content-area">
                                            <div class="row">
                                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                                    <a href="<?php echo e(route('skudo.serial-numbers.edit', $serialNumber->id)); ?>" class="btn btn-warning btn-block">
                                                        <i class="flaticon-edit-1"></i> تعديل
                                                    </a>
                                                </div>
                                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                                    <a href="<?php echo e(route('skudo.serial-numbers.index')); ?>" class="btn btn-secondary btn-block">
                                                        <i class="flaticon-cancel-12"></i> العودة
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('commonmodule::layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\freelancing\أجمل الهواتف\real_web_app\Modules/SkudoModule\Resources/views/admin/serial-numbers/show.blade.php ENDPATH**/ ?>