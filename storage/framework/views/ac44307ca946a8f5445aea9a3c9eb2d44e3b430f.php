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
                
                <!-- Display Success/Error Messages -->
                <?php if(session('success')): ?>
                    <div class="col-12">
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>نجح!</strong> <?php echo e(session('success')); ?>

                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    </div>
                <?php endif; ?>
                
                <?php if(session('error')): ?>
                    <div class="col-12">
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>خطأ!</strong> <?php echo e(session('error')); ?>

                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    </div>
                <?php endif; ?>

                <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                    <div class="statbox widget box box-shadow">
                        <div class="widget-header">
                            <div class="row mt-5">
                                <div class="col-md-9">
                                    <form action="<?php echo e(route('skudo.serial-numbers.index')); ?>" id="search-form">
                                        <div class="row">
                                            <div class="col-md-5">
                                                <input type="text" name="search" class="form-control mb-3"
                                                       placeholder="البحث في الأرقام التسلسلية..."
                                                       value="<?php echo e(request('search')); ?>">
                                            </div>
                                            <div class="col-md-2">
                                                <button type="submit" class="btn btn-success">
                                                    <i class="flaticon-search-1"></i> بحث
                                                </button>
                                            </div>
                                            <div class="col-md-2">
                                                <a href="<?php echo e(route('skudo.serial-numbers.import')); ?>" class="btn btn-primary">
                                                    <i class="flaticon-upload"></i> استيراد
                                                </a>
                                            </div>
                                            <div class="col-md-3">
                                                <a href="<?php echo e(route('skudo.serial-numbers.export', ['search' => request('search')])); ?>" 
                                                   class="btn btn-info" 
                                                   data-toggle="tooltip" 
                                                   data-placement="top" 
                                                   title="تصدير جميع الأرقام التسلسلية إلى CSV (يمكن فتحه في Excel)">
                                                    <i class="flaticon-download"></i> تصدير CSV
                                                </a>
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
                                        <th>#</th>
                                        <th>رقم الصنف</th>
                                        <th>الباركود</th>
                                        <th>اسم الصنف (عربي)</th>
                                        <th>اسم الصنف (إنجليزي)</th>
                                        <th>الرقم التسلسلي</th>
                                        <th>تاريخ الإضافة</th>
                                        <th>رقم تسجيل الضمان وحالته</th>
                                        <th>حالة المطالبة</th>
                                        <th>قيمة التعويض - رقم الاعتماد</th>
                                        <th>الإجراءات</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php $__empty_1 = true; $__currentLoopData = $serialNumbers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $serialNumber): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                        <tr class="text-center">
                                            <td><?php echo e(($serialNumbers->currentPage() - 1) * $serialNumbers->perPage() + $loop->iteration); ?></td>
                                            <td><?php echo e($serialNumber->item_number ?? '-'); ?></td>
                                            <td><?php echo e($serialNumber->barcode ?? '-'); ?></td>
                                            <td><?php echo e($serialNumber->product_name_ar ?? '-'); ?></td>
                                            <td><?php echo e($serialNumber->product_name_en ?? '-'); ?></td>
                                            <td><?php echo e($serialNumber->product_serial ?? '-'); ?></td>
                                            <td><?php echo e($serialNumber->formatted_created_at); ?></td>
                                            <td>
                                                <?php if($serialNumber->insurance): ?>
                                                    <div class="d-flex flex-column">
                                                        <a href="<?php echo e(route('skudo.insurance.edit', $serialNumber->insurance->id)); ?>" 
                                                           class="badge badge-primary mb-1 text-decoration-none">#<?php echo e($serialNumber->insurance->id); ?></a>
                                                        <span class="badge 
                                                            <?php if($serialNumber->insurance->status == 0): ?> badge-secondary
                                                            <?php elseif($serialNumber->insurance->status == 1): ?> badge-success
                                                            <?php elseif($serialNumber->insurance->status == 2): ?> badge-danger
                                                            <?php elseif($serialNumber->insurance->status == 3): ?> badge-warning
                                                            <?php else: ?> badge-light <?php endif; ?>">
                                                            <?php if($serialNumber->insurance->status == 0): ?> جديد
                                                            <?php elseif($serialNumber->insurance->status == 1): ?> مفعل
                                                            <?php elseif($serialNumber->insurance->status == 2): ?> مرفوض
                                                            <?php elseif($serialNumber->insurance->status == 3): ?> قيد المراجعة
                                                            <?php else: ?> غير محدد <?php endif; ?>
                                                        </span>
                                                    </div>
                                                <?php else: ?>
                                                    <span class="text-muted">غير مستخدم</span>
                                                <?php endif; ?>
                                            </td>
                                            <td>
                                                <?php if($serialNumber->insurance && $serialNumber->insurance->warranties->count() > 0): ?>
                                                    <?php
                                                        $latestWarranty = $serialNumber->insurance->warranties->sortByDesc('created_at')->first();
                                                    ?>
                                                    <div class="d-flex flex-column">
                                                        <a href="<?php echo e(route('skudo.warranty.edit', $latestWarranty->id)); ?>" 
                                                           class="badge badge-info mb-1 text-decoration-none">#<?php echo e($latestWarranty->id); ?></a>
                                                        <span class="badge 
                                                            <?php if($latestWarranty->is_applicable == 1): ?> badge-success
                                                            <?php elseif($latestWarranty->is_applicable == 2): ?> badge-warning
                                                            <?php elseif($latestWarranty->is_applicable == null): ?> badge-secondary
                                                            <?php else: ?> badge-danger <?php endif; ?>">
                                                            <?php if($latestWarranty->is_applicable == 1): ?> يشمل الضمان
                                                            <?php elseif($latestWarranty->is_applicable == 2): ?> معلق
                                                            <?php elseif($latestWarranty->is_applicable == null): ?> جديد
                                                            <?php else: ?> لا يشمل الضمان <?php endif; ?>
                                                        </span>
                                                    </div>
                                                <?php elseif($serialNumber->insurance): ?>
                                                    <span class="text-muted">لا توجد مطالبات</span>
                                                <?php else: ?>
                                                    <span class="text-muted">غير مستخدم</span>
                                                <?php endif; ?>
                                            </td>
                                            <td>
                                                <?php if($serialNumber->insurance && $serialNumber->insurance->warranties->count() > 0): ?>
                                                    <?php
                                                        $latestWarranty = $serialNumber->insurance->warranties->sortByDesc('created_at')->first();
                                                    ?>
                                                    <div class="d-flex flex-column">
                                                        <?php if($latestWarranty->value && $latestWarranty->currency): ?>
                                                            <span class="badge badge-success mb-1">
                                                                <?php echo e(number_format($latestWarranty->value, 2)); ?> <?php echo e($latestWarranty->currency->code ?? ''); ?>

                                                            </span>
                                                        <?php else: ?>
                                                            <span class="text-muted small">لا توجد قيمة</span>
                                                        <?php endif; ?>
                                                        
                                                        <?php if($latestWarranty->application_number): ?>
                                                            <span class="badge badge-info">
                                                                رقم الاعتماد: <?php echo e($latestWarranty->application_number); ?>

                                                            </span>
                                                        <?php else: ?>
                                                            <span class="text-muted small">لا يوجد رقم اعتماد</span>
                                                        <?php endif; ?>
                                                    </div>
                                                <?php elseif($serialNumber->insurance): ?>
                                                    <span class="text-muted">لا توجد مطالبات</span>
                                                <?php else: ?>
                                                    <span class="text-muted">غير مستخدم</span>
                                                <?php endif; ?>
                                            </td>
                                            <td>
                                                <ul class="table-controls">
                                                    <li>
                                                        <a href="<?php echo e(route('skudo.serial-numbers.show', $serialNumber->id)); ?>" 
                                                           class="btn btn-info p-0" data-toggle="tooltip" data-placement="top" title="عرض">
                                                            <i class="flaticon-view bg-info p-1 text-white br-6 mb-1"></i>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="<?php echo e(route('skudo.serial-numbers.edit', $serialNumber->id)); ?>" 
                                                           class="btn btn-warning p-0" data-toggle="tooltip" data-placement="top" title="تعديل">
                                                            <i class="flaticon-edit bg-warning p-1 text-white br-6 mb-1"></i>
                                                        </a>
                                                    </li>
                                                    <?php if(!$serialNumber->insurance): ?>
                                                        <li>
                                                            <form class="inline" action="<?php echo e(route('skudo.serial-numbers.destroy', $serialNumber->id)); ?>" 
                                                                  method="POST" onsubmit="return confirm('هل أنت متأكد من حذف هذا الرقم التسلسلي؟')">
                                                                <?php echo csrf_field(); ?>
                                                                <?php echo method_field('DELETE'); ?>
                                                                <button type="submit" class="btn btn-danger p-0" data-toggle="tooltip" data-placement="top" title="حذف">
                                                                    <i class="flaticon-delete bg-danger p-1 text-white br-6"></i>
                                                                </button>
                                                            </form>
                                                        </li>
                                                    <?php else: ?>
                                                        <li>
                                                            <button class="btn btn-danger p-0" data-toggle="tooltip" data-placement="top" title="لا يمكن الحذف - مرتبط بضمان" disabled>
                                                                <i class="flaticon-delete bg-danger p-1 text-white br-6"></i>
                                                            </button>
                                                        </li>
                                                    <?php endif; ?>
                                                </ul>
                                            </td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                        <tr>
                                            <td colspan="11" class="text-center">لا توجد أرقام تسلسلية</td>
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