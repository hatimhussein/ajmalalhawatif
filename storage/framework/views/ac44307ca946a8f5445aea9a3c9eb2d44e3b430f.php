<?php $__env->startSection('title'); ?>
    الأرقام التسلسلية
<?php $__env->stopSection(); ?>

<?php $__env->startSection('css'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('assets/admin/plugins/table/datatable/custom_dt_zero_config.css')); ?>"
          type="text/css">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <!--  BEGIN CONTENT PART  -->
    <div id="content" class="main-content">
        <div class="container">
            <div class="page-header">
                <div class="page-title">
                    <h3>الأرقام التسلسلية</h3>
                    <div class="crumbs">
                        <ul id="breadcrumbs" class="breadcrumb">
                            <li><a href="<?php echo e(url('/admin')); ?>"><i class="flaticon-home-fill"></i></a></li>
                            <li><a href="#">الأرقام التسلسلية</a></li>
                        </ul>
                    </div>
                </div>
                <div class="page-title" style="float:right">
                    <a class="mt-4 btn btn-button-16 mr-2"
                       href="<?php echo e(route('skudo.serial-numbers.create')); ?>">
                        إضافة رقم تسلسلي جديد
                    </a>
                </div>
            </div>

            <div class="row" id="cancel-row">

                <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                    <div class="statbox widget box box-shadow">
                        <div class="widget-header">
                            <div class="row mt-5">
                                <div class="col-md-6">
                                    <form action="<?php echo e(route('skudo.serial-numbers.index')); ?>">
                                        <div class="row">
                                            <div class="col-md-8">
                                                <input type="text" name="search" class="form-control mb-3"
                                                       placeholder="البحث في الأرقام التسلسلية..."
                                                       value="<?php echo e(request('search')); ?>">
                                            </div>
                                            <div class="col-md-4">
                                                <button type="submit" class="btn btn-success">
                                                    <i class="flaticon-search-1"></i> بحث
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="widget-content widget-content-area">
                            <div class="table-responsive mb-4">
                                <table id="zero-config" class="table table-hover table-bordered" style="width:100%">
                                    <thead>
                                    <tr class="text-center">
                                        <th>رقم الصنف</th>
                                        <th>الباركود</th>
                                        <th>اسم الصنف (عربي)</th>
                                        <th>اسم الصنف (إنجليزي)</th>
                                        <th>الرقم التسلسلي</th>
                                        <th>تاريخ الإضافة</th>
                                        <th>حالة تسجيل الضمان</th>
                                        <th>حالة المطالبة</th>
                                        <th>حالة المطالبة</th>
                                        <th>الإجراءات</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php $__empty_1 = true; $__currentLoopData = $serialNumbers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $serialNumber): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                        <tr class="text-center">
                                            <td><?php echo e($serialNumber->item_number ?? '-'); ?></td>
                                            <td><?php echo e($serialNumber->barcode ?? '-'); ?></td>
                                            <td><?php echo e($serialNumber->product_name_ar ?? '-'); ?></td>
                                            <td><?php echo e($serialNumber->product_name_en ?? '-'); ?></td>
                                            <td><?php echo e($serialNumber->product_serial ?? '-'); ?></td>
                                            <td><?php echo e($serialNumber->formatted_created_at); ?></td>
                                            <td>-</td>
                                            <td>-</td>
                                            <td>-</td>
                                            <td>
                                                <div class="btn-group" role="group">
                                                    <a href="<?php echo e(route('skudo.serial-numbers.show', $serialNumber->id)); ?>" 
                                                       class="btn btn-info btn-sm" title="عرض">
                                                        <i class="flaticon-eye"></i>
                                                    </a>
                                                    <a href="<?php echo e(route('skudo.serial-numbers.edit', $serialNumber->id)); ?>" 
                                                       class="btn btn-warning btn-sm" title="تعديل">
                                                        <i class="flaticon-edit-1"></i>
                                                    </a>
                                                    <form action="<?php echo e(route('skudo.serial-numbers.destroy', $serialNumber->id)); ?>" 
                                                          method="POST" style="display: inline-block;" 
                                                          onsubmit="return confirm('هل أنت متأكد من حذف هذا الرقم التسلسلي؟')">
                                                        <?php echo csrf_field(); ?>
                                                        <?php echo method_field('DELETE'); ?>
                                                        <button type="submit" class="btn btn-danger btn-sm" title="حذف">
                                                            <i class="flaticon-delete-1"></i>
                                                        </button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                        <tr>
                                            <td colspan="10" class="text-center">لا توجد أرقام تسلسلية</td>
                                        </tr>
                                    <?php endif; ?>
                                    </tbody>
                                </table>
                            </div>

                            <!-- Pagination -->
                            <?php if($serialNumbers->hasPages()): ?>
                                <div class="d-flex justify-content-center">
                                    <?php echo e($serialNumbers->appends(request()->query())->links()); ?>

                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!--  END CONTENT PART  -->

<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
    <script src="<?php echo e(asset('assets/admin/plugins/table/datatable/datatables.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/admin/plugins/table/datatable/custom_dt_zero_config.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('commonmodule::layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\freelancing\أجمل الهواتف\real_web_app\Modules/SkudoModule\Resources/views/admin/serial-numbers/index.blade.php ENDPATH**/ ?>