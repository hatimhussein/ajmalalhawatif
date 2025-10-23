<?php $__env->startSection('title'); ?>
    <?php echo e(__('warrantymodule::admin.warranty')); ?>

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
                    <h3><?php echo e(__('warrantymodule::admin.warranty')); ?></h3>
                    <div class="crumbs">
                        <ul id="breadcrumbs" class="breadcrumb">
                            <li><a href="<?php echo e(url('/admin')); ?>"><i class="flaticon-home-fill"></i></a></li>
                            <li><a href="#"><?php echo e(__('warrantymodule::admin.warranty')); ?></a></li>
                        </ul>
                    </div>
                </div>
                <div class="page-title" style="float:right">
                    <a class="mt-4 btn btn-button-16 mr-2"
                       href="<?php echo e(route('skudo.warranty.export')); ?>">
                        <?php echo e(__('productmodule::category.download')); ?>

                    </a>
                </div>
            </div>

            <div class="row" id="cancel-row">

                <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                    <div class="statbox widget box box-shadow">
                        <div class="widget-header">
                            <div class="row mt-5">
                                <div class="col-md-6">
                                    <form
                                        action="<?php echo e(route('skudo.warranty.index')); ?>">
                                        <input type="hidden" name="type" value="<?php echo e(request()->get('type', 'card')); ?>">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <input type="date" name="date" id="date-filter-input"
                                                       class="form-control mb-3"
                                                       value="<?php echo e(request()->get('date')); ?>">
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-success" name="filter" value="all">
                                            <?php echo e(__('warrantymodule::' . $localeFile . '.all')); ?>

                                        </button>
                                        <button type="submit" class="btn btn-info" name="filter" value="new">
                                            <?php echo e(__('warrantymodule::' . $localeFile . '.new')); ?>

                                        </button>
                                        <button type="submit" class="btn btn-warning" name="filter" value="in_progress">
                                            <?php echo e(__('warrantymodule::' . $localeFile . '.in_progress')); ?>

                                        </button>
                                        <button type="submit" class="btn btn-danger" name="filter" value="completed">
                                            <?php echo e(__('warrantymodule::' . $localeFile . '.completed')); ?>

                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="widget-content widget-content-area">
                            <div class="table-responsive mb-4">
                                <table id="zero-config" class="table table-hover table-bordered" style="width:100%">
                                    <thead>
                                    <tr class="text-center">
                                        <th><?php echo e(__('warrantymodule::' . $localeFile . '.quote_number')); ?></th>
                                        <?php if(request()->get('type', 'card') == 'sms'): ?>
                                            <th><?php echo e(__('warrantymodule::' . $localeFile . '.user_name')); ?></th>
                                            <th><?php echo e(__('warrantymodule::' . $localeFile . '.phone')); ?></th>
                                            <th><?php echo e(__('warrantymodule::' . $localeFile . '.warranty_number')); ?></th>
                                        <?php endif; ?>


                                        <th><?php echo e(__('warrantymodule::' . $localeFile . '.dummy_text_1')); ?></th>
                                        <th><?php echo e(__('warrantymodule::' . $localeFile . '.dummy_text_2')); ?></th>
                                        <th><?php echo e(__('warrantymodule::' . $localeFile . '.dummy_text_3')); ?></th>
                                        <th><?php echo e(__('warrantymodule::insurance.attachments')); ?></th>
                                        <th><?php echo e(__('warrantymodule::' . $localeFile . '.status')); ?></th>
                                        <th><?php echo e(__('warrantymodule::' . $localeFile . '.value')); ?></th>
                                        <th><?php echo e(__('warrantymodule::' . $localeFile . '.usage_date')); ?></th>
                                        <th><?php echo e(__('warrantymodule::' . $localeFile . '.sent_at')); ?></th>
                                        <th><?php echo e(__('warrantymodule::' . $localeFile . '.replied_at')); ?></th>
                                        <th><?php echo e(__('warrantymodule::' . $localeFile . '.admin')); ?></th>
                                        <th><?php echo e(__('productmodule::category.action')); ?></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php $__currentLoopData = $warranties; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $warranty): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr class="text-center">
                                            <td class="text-primary"><?php echo e($warranty->id); ?></td>
                                            <?php if(request()->get('type', 'card') == 'sms'): ?>
                                                <td><?php echo e($warranty->user_name); ?></td>
                                                <td><?php echo e($warranty->phone_code->code ?? ''); ?> <?php echo e($warranty->phone); ?></td>
                                                <td>
                                                    <?php if($warranty->insurance): ?>
                                                        <ul class="table-controls">
                                                            <li>
                                                                <a href="javascript: void(0)"
                                                                   onclick="showInsurance('<?php echo e($warranty->insurance_id); ?>')"
                                                                   data-toggle="tooltip" data-placement="top"
                                                                   title="Shot">
                                                                    <i class="flaticon-view-1 bg-info p-1 text-white"></i>
                                                                </a>
                                                            </li>
                                                            <li> <?php echo e($warranty->insurance_id); ?></li>
                                                        </ul>
                                                    <?php endif; ?>
                                                </td>
                                            <?php endif; ?>


                                            <td><?php echo e($warranty->dummy_text_1); ?></td>
                                            <td><?php echo e($warranty->dummy_text_2); ?></td>
                                            <td><?php echo e($warranty->dummy_text_3); ?></td>
                                            <td>
                                                <ul class="table-controls">
                                                    <li>
                                                        <a href="javascript: void(0)"
                                                           onclick="showAttachments('<?php echo e(addslashes($warranty->attachments_str)); ?>')"
                                                           data-toggle="tooltip" data-placement="top"
                                                           title="Shot">
                                                            <i class="flaticon-view-1 bg-info p-1 text-white"></i>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </td>
                                            <td>
                                                <?php if($warranty->is_applicable == 1): ?>
                                                    <span
                                                        class="badge badge-success"><?php echo e(__('warrantymodule::' . $localeFile . '.applicable')); ?></span>
                                                <?php elseif($warranty->is_applicable == 2): ?>
                                                    <?php if(is_null($warranty->seen_at)): ?>
                                                        <span
                                                            style="margin-bottom: 10px;" class="badge badge-warning"><?php echo e(__('warrantymodule::' . $localeFile . '.in_progress')); ?></span>
                                                        <span
                                                            style="margin-bottom: 10px;" class="badge badge-info"><?php echo e(__('warrantymodule::' . $localeFile . '.replay_done')); ?></span>
                                                        <span
                                                            class="badge badge-secondary"><?php echo e($warranty->read_at); ?></span>
                                                    <?php else: ?>
                                                        <span
                                                            style="margin-bottom: 10px;" class="badge badge-warning"><?php echo e(__('warrantymodule::' . $localeFile . '.in_progress')); ?></span>

                                                    <?php endif; ?>

                                                <?php elseif(is_null($warranty->is_applicable)): ?>
                                                    <span
                                                        class="badge badge-info"><?php echo e(__('warrantymodule::' . $localeFile . '.new')); ?></span>
                                                <?php else: ?>
                                                    <span
                                                        class="badge badge-danger"><?php echo e(__('warrantymodule::' . $localeFile . '.not_applicable')); ?></span>
                                                <?php endif; ?>
                                            </td>
                                            <td><?php echo e($warranty->value); ?> <?php echo e($warranty->currency->name ?? '-'); ?></td>

                                            <td><?php echo $warranty->usage_date ? $warranty->usage_date->toDateString() . '<br>' . $warranty->usage_date->diffForHumans() : ''; ?></td>
                                            <td><?php echo $warranty->created_at ? $warranty->created_at . '<br>' . $warranty->created_at->diffForHumans() : ''; ?></td>
                                            <td><?php echo $warranty->replied_at ? $warranty->replied_at . '<br>' . humanReadableDiff($warranty->replied_at, $warranty->created_at) : ''; ?></td>

                                            <td><?php echo e($warranty->admin->name ?? '-'); ?></td>
                                            <td>
                                                <ul class="table-controls">
                                                    <li><a href="<?php echo e(route('skudo.warranty.edit', $warranty->id)); ?>"
                                                           data-toggle="tooltip" data-placement="top"
                                                           title="Edit"><i
                                                                class="flaticon-edit  bg-success p-1 text-white"></i></a>
                                                    </li>
                                                    <li>
                                                        <form class="inline"
                                                              action="<?php echo e(route('skudo.warranty.destroy', $warranty->id)); ?>"
                                                              method="POST">
                                                            <?php echo e(method_field('DELETE')); ?> <?php echo csrf_field(); ?>

                                                            <button class="unst" title="Delete" type="submit"
                                                                    onclick="return confirm('<?php echo e(__("warrantymodule::admin.delete_warranty")); ?>')">
                                                                <i class="flaticon-delete  bg-danger p-1 text-white"></i>
                                                            </button>
                                                        </form>
                                                    </li>
                                                </ul>
                                            </td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <?php echo $__env->make('warrantymodule::admin.includes.attachment_modal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php echo $__env->make('warrantymodule::admin.includes.insurance_modal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        </div>
    </div>
    <!--  END CONTENT PART  -->
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
    <?php echo $__env->make('commonmodule::includes.swal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <script>
        let dTable = $('#zero-config').DataTable({
            "order": [[0, "desc"]],
            "lengthMenu": [100, 50, 20, 10],
            "language": {
                "paginate": {
                    "previous": "<i class='flaticon-arrow-left-1'></i>",
                    "next": "<i class='flaticon-arrow-right'></i>"
                },
                "info": "Showing page _PAGE_ of _PAGES_"
            },
            columnDefs: [{
                orderable: false,
                targets: 1
            }],
        });
    </script>
<?php $__env->stopSection(); ?>



<?php echo $__env->make('commonmodule::layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\freelancing\أجمل الهواتف\real_web_app\Modules/SkudoModule\Resources/views/admin/warranty/index.blade.php ENDPATH**/ ?>