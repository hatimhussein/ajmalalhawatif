<?php $__env->startSection('title'); ?>
    <?php echo e(__('warrantymodule::admin.insurance')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('css'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('assets/admin/plugins/table/datatable/custom_dt_zero_config.css')); ?>"
          type="text/css">

<?php $__env->stopSection(); ?>



<?php $__env->startSection('content'); ?>


    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
    <!--  BEGIN CONTENT PART  -->
    <div id="content" class="main-content">
        <div class="container">
            <div class="page-header">
                <div class="page-title">
                    <h3><?php echo e(__('warrantymodule::admin.insurance')); ?></h3>
                    <div class="crumbs">
                        <ul id="breadcrumbs" class="breadcrumb">
                            <li><a href="<?php echo e(url('/admin')); ?>"><i class="flaticon-home-fill"></i></a></li>
                            <li><a href="#"><?php echo e(__('warrantymodule::admin.insurance')); ?></a></li>
                        </ul>
                    </div>
                </div>
                <div class="page-title" style="float:right">
                    <a class="mt-4 btn btn-button-16 mr-2"
                       href="<?php echo e(route('skudo.insurance.export')); ?>">
                        <?php echo e(__('productmodule::category.download')); ?>

                    </a>
                </div>
            </div>

            <div class="row" id="cancel-row">

                <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                    <div class="statbox widget box box-shadow">
                        <div class="widget-header">
                            <form action="<?php echo e(route('skudo.insurance.index')); ?>" method="get">
                                <div class="row mt-5">
                                    <div class="col-md-3 col-xs-12">
                                        <input type="date" name="date" id="date_input" class="form-control">
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-md-6">
                                        <button type="submit"
                                                class="btn btn-success">
                                            <?php echo e(__('warrantymodule::warranty.all')); ?>

                                        </button>
                                        <button type="submit" name="filter" value="new"
                                                class="btn btn-info">
                                            <?php echo e(__('warrantymodule::warranty.new')); ?>

                                        </button>
                                        <button type="submit" class="btn btn-warning" name="filter" value="in_progress">
                                            <?php echo e(__('warrantymodule::warranty.in_progress')); ?>

                                        </button>
                                        <button type="submit" name="filter" value="completed"
                                                class="btn btn-danger">
                                            <?php echo e(__('warrantymodule::warranty.completed')); ?>

                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="widget-content widget-content-area">
                            <div class="table-responsive mb-4">
                                <table id="zero-config" class="table table-hover table-bordered" style="width:100%">
                                    <thead>
                                    <tr class="text-center">
                                        <th><?php echo e(__('warrantymodule::insurance.quote_number')); ?></th>


                                        <th><?php echo e(__('warrantymodule::insurance.user_name')); ?></th>
                                        <th><?php echo e(__('warrantymodule::insurance.phone')); ?></th>

                                        <th><?php echo e(__('warrantymodule::insurance.dummy_text_1')); ?></th>
                                        <th><?php echo e(__('warrantymodule::insurance.dummy_text_2')); ?></th>

                                        <th><?php echo e(__('warrantymodule::insurance.attachments')); ?></th>
                                        <th><?php echo e(__('warrantymodule::insurance.usage_date')); ?></th>
                                        <th><?php echo e(__('warrantymodule::insurance.sent_at')); ?></th>
                                        <th><?php echo e(__('warrantymodule::insurance.replied_at')); ?></th>
                                        <th><?php echo e(__('warrantymodule::insurance.status')); ?></th>
                                        <th><?php echo e(__('warrantymodule::insurance.expire_date')); ?></th>
                                        <th><?php echo e(__('warrantymodule::warranty.admin')); ?></th>
                                        <th><?php echo e(__('productmodule::category.action')); ?></th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <?php echo $__env->make('warrantymodule::admin.includes.attachment_modal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        </div>
    </div>
    <!--  END CONTENT PART  -->
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
    <?php echo $__env->make('commonmodule::includes.swal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <script>
        let dTable = $('#zero-config').DataTable({
            "bProcessing": true,
            "processing": true,
            "serverSide": true,
            "sAjaxSource": "<?php echo e(url('admin/skudo-insuranceServer?filter='.request()->get('filter').'&date='.request()->get('date'))); ?>",
            "lengthMenu": [10, 20, 50, 100],
            "pageLength": 50,
            "order": [[ 0, "desc" ]],
            "language": {
                "paginate": {
                    "previous": "<i class='flaticon-arrow-left-1'></i>",
                    "next": "<i class='flaticon-arrow-right'></i>"
                },
                "info": "Showing page _PAGE_ of _PAGES_"
            },
            drawCallback: function (settings) {
                $('[data-toggle="tooltip"]').tooltip();
            }
        });
    </script>
<?php $__env->stopSection(); ?>



<?php echo $__env->make('commonmodule::layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\freelancing\أجمل الهواتف\real_web_app\Modules/SkudoModule\Resources/views/admin/insurance/index.blade.php ENDPATH**/ ?>