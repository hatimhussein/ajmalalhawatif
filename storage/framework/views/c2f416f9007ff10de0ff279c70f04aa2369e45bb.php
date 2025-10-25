

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
    تعديل الرقم التسلسلي
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
                            <li><a href="#">تعديل الرقم التسلسلي</a></li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="row">
                <form action="<?php echo e(route('skudo.serial-numbers.update', $serialNumber->id)); ?>" class="col-lg-12" method="POST" data-role="validator"
                      data-on-before-submit="no_submit" data-on-error-input="notifyOnErrorInput"
                      data-show-error-hint="false"
                      novalidate="novalidate">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('PUT'); ?>

                    <div class="layout-spacing">
                        <div class="statbox widget box box-shadow">
                            <div class="widget-header">
                                <div class="row">
                                    <div class="col-xl-9 col-md-9 col-sm-9 col-9">
                                        <h4>تعديل الرقم التسلسلي</h4>
                                    </div>
                                </div>
                            </div>

                            <div class="widget-content widget-content-area">

                                <div class="row">

                                    <div class="col-xl-9 col-lg-9 col-12 ">
                                        <div class="statbox widget box box-shadow">
                                            <div class="simple-tab">
                                                <ul class="nav nav-tabs  mb-3 mt-3" id="simpletab" role="tablist">
                                                    <li class="nav-item">
                                                        <a class="nav-link active" id="home-tab" data-toggle="tab"
                                                           href="#arabic" role="tab" aria-controls="arabic"
                                                           aria-selected="true">المعلومات الأساسية</a>
                                                    </li>
                                                </ul>

                                                <div class="tab-content" id="simpletabContent">
                                                    <div class="tab-pane fade show active" id="arabic" role="tabpanel"
                                                         aria-labelledby="arabic-tab">

                                                        <div class="form-row">
                                                            <div class="col-md-6 mb-4 input-control required">
                                                                <label for="item_number">رقم الصنف</label>
                                                                <input name="item_number" id="item_number" class="form-control" 
                                                                       data-validate-func="required"
                                                                       data-validate-arg="1"
                                                                       data-validate-hint="رقم الصنف مطلوب"
                                                                       value="<?php echo e(old('item_number', $serialNumber->item_number)); ?>"
                                                                       placeholder="أدخل رقم الصنف">
                                                                <?php $__errorArgs = ['item_number'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                                    <div class="invalid-feedback"><?php echo e($message); ?></div>
                                                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                            </div>

                                                            <div class="col-md-6 mb-4 input-control">
                                                                <label for="barcode">الباركود</label>
                                                                <input name="barcode" id="barcode" class="form-control" 
                                                                       value="<?php echo e(old('barcode', $serialNumber->barcode)); ?>"
                                                                       placeholder="أدخل الباركود">
                                                                <?php $__errorArgs = ['barcode'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                                    <div class="invalid-feedback"><?php echo e($message); ?></div>
                                                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                            </div>

                                                            <div class="col-md-6 mb-4 input-control">
                                                                <label for="product_name_ar">اسم الصنف (عربي)</label>
                                                                <input name="product_name_ar" id="product_name_ar" class="form-control" 
                                                                       value="<?php echo e(old('product_name_ar', $serialNumber->product_name_ar)); ?>"
                                                                       placeholder="أدخل اسم الصنف بالعربية">
                                                                <?php $__errorArgs = ['product_name_ar'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                                    <div class="invalid-feedback"><?php echo e($message); ?></div>
                                                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                            </div>

                                                            <div class="col-md-6 mb-4 input-control">
                                                                <label for="product_name_en">اسم الصنف (إنجليزي)</label>
                                                                <input name="product_name_en" id="product_name_en" class="form-control" 
                                                                       value="<?php echo e(old('product_name_en', $serialNumber->product_name_en)); ?>"
                                                                       placeholder="أدخل اسم الصنف بالإنجليزية">
                                                                <?php $__errorArgs = ['product_name_en'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                                    <div class="invalid-feedback"><?php echo e($message); ?></div>
                                                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                            </div>

                                                            <div class="col-md-12 mb-4 input-control required">
                                                                <label for="product_serial">الرقم التسلسلي للمنتج</label>
                                                                <input name="product_serial" id="product_serial" class="form-control" 
                                                                       data-validate-func="required"
                                                                       data-validate-arg="1"
                                                                       data-validate-hint="الرقم التسلسلي مطلوب"
                                                                       value="<?php echo e(old('product_serial', $serialNumber->product_serial)); ?>"
                                                                       placeholder="أدخل الرقم التسلسلي للمنتج">
                                                                <?php $__errorArgs = ['product_serial'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                                    <div class="invalid-feedback"><?php echo e($message); ?></div>
                                                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-xl-3 col-lg-3 col-12">
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
                                                        <button type="submit" class="btn btn-primary btn-block">
                                                            <i class="flaticon-check"></i> تحديث
                                                        </button>
                                                    </div>
                                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                                        <a href="<?php echo e(route('skudo.serial-numbers.index')); ?>" class="btn btn-secondary btn-block">
                                                            <i class="flaticon-cancel-12"></i> إلغاء
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
                </form>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
    <script src="<?php echo e(asset('assets/admin/js/forms/bootstrap_validation/bs_validation_script.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('commonmodule::layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\freelancing\أجمل الهواتف\real_web_app\Modules/SkudoModule\Resources/views/admin/serial-numbers/edit.blade.php ENDPATH**/ ?>