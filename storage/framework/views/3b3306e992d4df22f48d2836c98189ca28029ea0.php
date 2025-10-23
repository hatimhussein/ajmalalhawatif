<?php $__env->startSection('title'); ?>
    <?php echo e(__('commonmodule::front.warranty')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('css'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('assets/admin/plugins/table/datatable/datatables.css')); ?>" type="text/css">
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>


    <?php echo $__env->make('fronthomemodule::content.breadCrumbs',['pages'=>[__('commonmodule::front.warranty')]], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


    <!-- main-container -->
    <div class="main-container col2-right-layout">
        <div class="main container">
            <div class="row">
                <section class=" wow bounceInUp animated col-md-12">
                    <div class="main">
                        <div class="col-main">
                            <div class="cart wow bounceInUp animated my-account warranty-div">
                                <div class="page-title title">
                                    <h2><?php echo e(__('commonmodule::front.warranty')); ?></h2>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="corner-buttons">
                                            <a href="<?php echo e(route('front.warranty.new')); ?>" class="btn btn-info">
                                                <?php echo e(__('warrantymodule::warranty.request_warranty')); ?>

                                            </a>
                                        </div>
                                        
                                        <div class="form-group mb-0">
                                            <small><?php echo e(__('ordermodule::admin.search')); ?></small>
                                            <input type="text" class="form-control" name="q"
                                                   id="warranty-search" value="<?php echo e(request()->get('q')); ?>">
                                        </div>
                                        
                                    </div>
                                </div>

                                <?php if(count($warranties) > 0): ?>
                                    <div class="table-responsive warranty-table pl-0">
                                        <fieldset>
                                            <table id="warranty-table">
                                                <thead>
                                                <tr class="first last">
                                                    <th class="a-center"
                                                        rowspan="1"><?php echo e(__('warrantymodule::warranty.quote_number')); ?></th>
                                                    <th class="a-center"
                                                        rowspan="1"><?php echo e(__('warrantymodule::warranty.warranty_type')); ?></th>
                                                    <th class="a-center"
                                                        rowspan="1"><?php echo e(__('warrantymodule::warranty.user_name')); ?></th>
                                                    <th class="a-center"
                                                        rowspan="1"><?php echo e(__('warrantymodule::warranty.phone')); ?></th>
                                                    <th class="a-center"
                                                        rowspan="1"><?php echo e(__('warrantymodule::warranty.company_name')); ?></th>
                                                    <th class="a-center"
                                                        rowspan="1"><?php echo e(__('warrantymodule::warranty.company_account')); ?></th>
                                                    <th class="a-center"
                                                        rowspan="1"><?php echo e(__('warrantymodule::warranty.dummy_text_1')); ?></th>
                                                    <th class="a-center"
                                                        rowspan="1"><?php echo e(__('warrantymodule::warranty.dummy_text_2')); ?></th>
                                                    <th class="a-center"
                                                        rowspan="1"><?php echo e(__('warrantymodule::warranty.dummy_text_3')); ?></th>
                                                    <th class="a-center"
                                                        rowspan="1"><?php echo e(__('warrantymodule::warranty.usage_date')); ?></th>
                                                    <th class="a-center"
                                                        rowspan="1"><?php echo e(__('warrantymodule::warranty.sent_at')); ?></th>
                                                    <th colspan="1"
                                                        class="a-center"><?php echo e(__('warrantymodule::warranty.status')); ?></th>
                                                    <th colspan="1"
                                                        class="a-center"><?php echo e(__('warrantymodule::warranty.value')); ?></th>
                                                    <th colspan="1" class="a-center"></th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <?php $__currentLoopData = $warranties; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $warranty): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <tr class="first odd <?php echo e(is_null($warranty->is_applicable) ? 'bg-info' : (($warranty->is_applicable == 2) ? 'bg-warning': (($warranty->is_applicable == 1) ? 'bg-success':'bg-danger'))); ?>">
                                                        <td class="a-center">
                                                            <span><?php echo e($warranty->id); ?></span>
                                                        </td>

                                                        <td class="a-center">
                                                            <span><?php echo __('warrantymodule::warranty.'.$warranty->type??'card', ['phone' => '<br>' . $warranty->phone]); ?></span>
                                                        </td>

                                                        <td class="a-center">
                                                            <span><?php echo e($warranty->user_name); ?></span>
                                                        </td>

                                                        <td class="a-center">
                                                            <span><?php echo e($warranty->phone_code->code ?? ''); ?> <?php echo e($warranty->phone); ?></span>
                                                        </td>

                                                        <td class="a-center">
                                                            <span><?php echo e($warranty->merchant->company_name); ?></span>
                                                        </td>

                                                        <td class="a-center">
                                                            <span><?php echo e($warranty->merchant->account_number); ?></span>
                                                        </td>

                                                        <td class="a-center">
                                                            <span><?php echo e($warranty->dummy_text_1); ?></span>
                                                        </td>

                                                        <td class="a-center">
                                                            <span><?php echo e($warranty->dummy_text_2); ?></span>
                                                        </td>

                                                        <td class="a-center">
                                                            <span><?php echo e($warranty->dummy_text_3); ?></span>
                                                        </td>

                                                        <td class="a-center">
                                                            <span><?php echo e($warranty->usage_date ? $warranty->usage_date->toDateString() : ''); ?></span>
                                                        </td>

                                                        <td class="a-center">
                                                            <span><?php echo e($warranty->created_at); ?></span>
                                                        </td>

                                                        <td class="a-center">
                                                            <span>
                                                                  <?php if($warranty->is_applicable == 1): ?>
                                                                    <?php echo e(__('warrantymodule::warranty.applicable')); ?>

                                                                <?php elseif($warranty->is_applicable == 2): ?>
                                                                    <?php echo e(__('warrantymodule::warranty.in_progress')); ?>

                                                                <?php elseif(is_null($warranty->is_applicable)): ?>
                                                                    <?php echo e(__('warrantymodule::warranty.new')); ?>

                                                                <?php else: ?>
                                                                    <?php echo e(__('warrantymodule::warranty.not_applicable')); ?>

                                                                <?php endif; ?>
                                                            </span>
                                                        </td>

                                                        <td class="a-center">
                                                            <span><?php echo e($warranty->value); ?> <?php echo e(LanguageHelper::nameTranslate($warranty->currency)); ?></span>
                                                        </td>

                                                        <td class="a-center last">
                                                            <ul class="warranty-actions">
                                                                <li>
                                                                    <a class="btn btn-info a-button p-0"
                                                                       href="<?php echo e(route('front.warranty.show', $warranty->id)); ?>"
                                                                       title="<?php echo e(__('ordermodule::order.order_details')); ?>">
                                                                        <i class="icon-eye-open"></i>
                                                                    </a>
                                                                </li>
                                                                <?php if($warranty->is_applicable == 2 && $warranty->user_id == auth()->id()): ?>
                                                                    <li>
                                                                        <a class="btn btn-danger a-button p-0"
                                                                           href="<?php echo e(route('front.warranty.edit', $warranty->id)); ?>">
                                                                            <i class="icon-pencil"></i>
                                                                        </a>
                                                                    </li>
                                                                <?php endif; ?>
                                                            </ul>
                                                        </td>
                                                    </tr>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </tbody>
                                            </table>

                                        </fieldset>
                                    </div>
                                <?php else: ?>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <h3 class="text-center"><?php echo e(__('ordermodule::order.no_orders')); ?></h3>
                                        </div>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </section>


            </div>
        </div>
    </div>
    <!--End main-container -->

<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
    <script src="<?php echo e(asset('assets/admin/plugins/table/datatable/datatables.js')); ?>"></script>

    <script>
        const dtTable = $('#warranty-table').DataTable({
            order: [[0, "desc"]],
            lengthMenu: [100, 50, 20, 10],
            language: {
                paginate: {
                    previous: '<i class="glyphicon glyphicon-circle-arrow-left"></i>',
                    next: '<i class="glyphicon glyphicon-circle-arrow-right"></i>'
                },
                // info: "Showing page _PAGE_ of _PAGES_"
                info: ""
            },
            dom: 't',
            columns: [
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,

                {searchable: false, orderable: false},
                {searchable: false, orderable: false},

                null,

                {searchable: false, orderable: false},
                {searchable: false, orderable: false},
            ]
        });

        $('#warranty-search').on('keyup', function () {
            dtTable.search(this.value).draw();
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('fronthomemodule::layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\freelancing\أجمل الهواتف\real_web_app\Modules/WarrantyModule\Resources/views/front/warranty/index.blade.php ENDPATH**/ ?>