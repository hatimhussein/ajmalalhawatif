<?php $__env->startSection('title'); ?>
    <?php echo e(__('skudomodule::insurance.insurance')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('css'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('assets/admin/plugins/table/datatable/datatables.css')); ?>" type="text/css">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('fronthomemodule::content.breadCrumbs',['pages'=>[__('skudomodule::insurance.insurance')]], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


    <!-- main-container -->
    <div class="main-container col2-right-layout">
        <div class="main container">
            <div class="row">
                <section class="insurance wow bounceInUp animated col-md-12">
                    <div class="main">
                        <div class="col-main">
                            <div class="cart wow bounceInUp animated my-account warranty-div">
                                <div class="page-title title">
                                    
                                    <h2><?php echo e(__('skudomodule::insurance.insurance')); ?></h2>
                                    <div class="row mt-5">
                                        <div class="col-md-9 col-sm-8">
                                            <div class="insurance-search-box">
                                                <form action="<?php echo e(route('front.skudo.insurance.index')); ?>" method="get">
                                                    <input type="search" name="q" id="insurance-search"
                                                           value="<?php echo e($search); ?>"
                                                           placeholder="البحث برقم التسجيل أو الرقم التسلسلي للمنتج">
                                                    <button class="btn btn-info" type="submit"><?php echo e(__('usermodule::admin.search')); ?></button>
                                                </form>
                                            </div>
                                        </div>
                                        <hr class="mobile-separator">
                                        <div class="col-md-3 col-sm-4">
                                            <div class="corner-buttons">
                                                <a href="<?php echo e(route('front.skudo.insurance.create')); ?>" class="btn btn-info">
                                                    <?php echo e(__('skudomodule::insurance.add_insurance')); ?>

                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                </div>

                                <?php if($insurances->count()): ?>
                                    <div class="table-responsive warranty-table pl-0">
                                        <fieldset>
                                            <table id="insurance-table">
                                                <thead>
                                                <tr class="first last">
                                                    <th class="a-center"
                                                        rowspan="1"><?php echo e(__('skudomodule::insurance.quote_number')); ?></th>
                                                    <th class="a-center"
                                                        rowspan="1"><?php echo e(__('skudomodule::insurance.user_name')); ?></th>
                                                    <th colspan="1"
                                                        class="a-center"><?php echo e(__('skudomodule::insurance.phone')); ?></th>
                                                    <th class="a-center"
                                                        rowspan="1">الرقم التسلسلي للجهاز</th>
                                                    <th class="a-center"
                                                        rowspan="1">الرقم التسلسلي للمنتج (البكج)</th>
                                                    <!-- <th colspan="1"
                                                        class="a-center"><?php echo e(__('skudomodule::insurance.dummy_text_1')); ?></th>
                                                    <th colspan="1"
                                                        class="a-center"><?php echo e(__('skudomodule::insurance.dummy_text_2')); ?></th> -->
                                                    <th colspan="1"
                                                        class="a-center">وقت وتاريخ الارسال</th>
                                                    <th colspan="1"
                                                        class="a-center"><?php echo e(__('skudomodule::insurance.status')); ?></th>
                                                    <th colspan="1"
                                                        class="a-center"></th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <?php $__currentLoopData = $insurances; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $insurance): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <tr class="<?php echo e($insurance->isClosed() ? 'bg-dark' : ($insurance->status == 0 ? 'bg-info' : (($insurance->status == 1) ? 'bg-success': (($insurance->status == 3) ? 'bg-warning':'bg-danger')))); ?>">
                                                        <td><?php echo e($insurance->id); ?></td>
                                                        <td><?php echo e($insurance->user_name); ?></td>
                                                        <td><?php echo e($insurance->phone ? ($insurance->phone_code->code ?? '') : ''); ?> <?php echo e($insurance->phone); ?></td>
                                                        <td><?php echo e($insurance->device_serial); ?></td>
                                                        <td><?php echo e($insurance->package_serial); ?></td>
                                                        <!-- <td><?php echo e($insurance->dummy_text_1); ?></td>
                                                        <td><?php echo e($insurance->dummy_text_2); ?></td> -->
                                                        <td><?php echo e($insurance->created_at ? $insurance->created_at->format('Y-m-d H:i') : ''); ?></td>
                                                        <td>
                                                            <?php if($insurance->isClosed()): ?>
                                                                <span disabled
                                                                      class="btn btn-dark"><?php echo e(__('skudomodule::insurance.closed')); ?></span>
                                                            <?php else: ?>
                                                                <?php if($insurance->status == 1): ?>
                                                                    <span disabled
                                                                          class="btn btn-success"><?php echo e(__('skudomodule::insurance.activated')); ?></span>
                                                                <?php elseif($insurance->status == 3): ?>
                                                                    <span disabled
                                                                          class="btn btn-warning"><?php echo e(__('skudomodule::warranty.in_progress')); ?></span>
                                                                <?php elseif($insurance->status == 0): ?>
                                                                    <button
                                                                        <?php echo e($insurance->store_reason ? '' : 'disabled'); ?>

                                                                        class="btn btn-info <?php echo e($insurance->store_reason ? 'reason-details' : ''); ?>"
                                                                        data-reason="<?php echo e($insurance->store_reason); ?>"><?php echo e(__('skudomodule::insurance.pending')); ?></button>
                                                                <?php else: ?>
                                                                    <span
                                                                        class="btn btn-danger reason-details"
                                                                        data-reason="<?php echo e($insurance->reason); ?>"><?php echo e(__('skudomodule::insurance.rejected')); ?></span>
                                                                <?php endif; ?>
                                                            <?php endif; ?>
                                                        </td>
                                                        <td class="a-center last">
                                                            <ul class="warranty-actions">
                                                                <li>
                                                                    <a class="btn btn-info a-button p-0"
                                                                       href="<?php echo e(route('front.skudo.insurance.show', $insurance->id)); ?>"
                                                                       title="<?php echo e(__('ordermodule::order.order_details')); ?>">
                                                                        <i class="icon-eye-open"></i>
                                                                    </a>
                                                                </li>
                                                                <?php if($insurance->status == 3 && !$insurance->isClosed()): ?>
                                                                    <li>
                                                                        <a class="btn btn-danger a-button p-0"
                                                                           href="<?php echo e(route('front.skudo.insurance.edit', $insurance->id)); ?>">
                                                                            <i class="icon-pencil"></i>
                                                                        </a>
                                                                    </li>
                                                                <?php endif; ?>
                                                            </ul>
                                                        </td>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </tr>
                                                </tbody>
                                            </table>

                                        </fieldset>
                                    </div>
                                <?php else: ?>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <h3 class="text-center"><?php echo e(__('skudomodule::insurance.no_result')); ?></h3>
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

    <div class="modal fade" id="reason-modal" tabindex="-1" role="dialog" aria-labelledby="reasonModalTitle"
         aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <h3 id="reason-body" class="text-center">

                    </h3>
                </div>
                <div class="modal-footer">
                </div>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
    <script src="<?php echo e(asset('assets/admin/plugins/table/datatable/datatables.js')); ?>"></script>

    <script>
        $('.reason-details').click(function () {
            const reason = $(this).data('reason');

            $('#reason-modal #reason-body').text(reason);
            $('#reason-modal').modal('show');
        })
    </script>

    <script>
        const dtTable = $('#insurance-table').DataTable({
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
                null, // id
                null, // user_name
                null, // phone
                null, // device_serial
                null, // package_serial
                null, // dummy_text_1
                null, // dummy_text_2
                null, // sent_at (created_at)

                {searchable: false, orderable: false}, // status badge
                {searchable: false, orderable: false}, // actions
            ]
        });

        $('#insurance-search').on('keyup', function () {
            dtTable.search(this.value).draw();
        });
    </script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('fronthomemodule::layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\freelancing\أجمل الهواتف\real_web_app\Modules/SkudoModule\Resources/views/front/insurance/index.blade.php ENDPATH**/ ?>