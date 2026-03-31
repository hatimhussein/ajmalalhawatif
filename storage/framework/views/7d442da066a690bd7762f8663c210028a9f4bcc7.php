<?php $__env->startSection('title'); ?>
    <?php echo e(__('warrantymodule::admin.returns')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('css'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('assets/admin/plugins/table/datatable/datatables.css')); ?>" type="text/css">
    <link rel="stylesheet" href="<?php echo e(asset('assets/admin/css/ecommerce/product.css')); ?>" type="text/css">
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>


    <!--  BEGIN CONTENT PART  -->
    <div id="content" class="main-content">
        <div class="container">
            <div class="page-header">
                <div class="page-title">
                    <h3><?php echo e(__('warrantymodule::admin.returns')); ?></h3>
                    <div class="crumbs">
                        <ul id="breadcrumbs" class="breadcrumb">
                            <li><a href="<?php echo e(url('/admin')); ?>"><i class="flaticon-home-fill"></i></a></li>
                            <li class="active"><a href="#"><?php echo e(__('warrantymodule::admin.returns')); ?></a></li>
                        </ul>
                    </div>
                </div>

                <div class="page-title" style="float:right">
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('return_reason')): ?>
                        <a href="<?php echo e(route('reasons.index')); ?>"
                           class="mt-4 btn btn-button-16 mr-2">
                            <?php echo e(__('warrantymodule::admin.reasons')); ?>

                        </a>
                    <?php endif; ?>
                </div>

            </div>


            <div class="row margin-bottom-120">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="statbox widget box box-shadow">
                        <div class="widget-header">
                            <div class="row">
                                <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                    <h4><?php echo e(__('warrantymodule::admin.returns')); ?></h4>
                                </div>
                            </div>
                        </div>
                        <div class="widget-content widget-content-area">
                            <div class=" mb-4">
                                <table id="ecommerce-product-list"
                                       class="table table-hover  table-bordered text-center">
                                    <thead>
                                    <tr>


                                        <th>#</th>
                                        <th><?php echo e(__('warrantymodule::admin.client')); ?></th>
                                        <th><?php echo e(__('warrantymodule::admin.product')); ?></th>
                                        <th><?php echo e(__('warrantymodule::admin.price')); ?></th>
                                        <th><?php echo e(__('warrantymodule::admin.date')); ?></th>
                                        <th class="align-center"><?php echo e(__('usermodule::admin.action')); ?></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php $__currentLoopData = $returns; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $return): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td><?php echo e($loop->iteration); ?></td>
                                            <td><?php echo e($return->user->name); ?> </td>
                                            <td><?php echo e($return->order_product->product->name); ?></td>
                                            <td><?php echo e($return->order_product->item_price); ?> <?php echo e(LanguageHelper::nameTranslate($return->order_product->order->currency)); ?></td>
                                            <td><?php echo e($return->created_at); ?></td>

                                            <td class="align-center">
                                                <ul class="table-controls">

                                                    <li>
                                                        <button type="button" class="mod btn btn-success p-0"
                                                                data-toggle="modal"
                                                                data-client="<?php echo e($return->user->name); ?>"
                                                                data-product="<?php echo e($return->order_product->product->name); ?>"
                                                                data-price="<?php echo e($return->order_product->item_price); ?> <?php echo e(LanguageHelper::nameTranslate($return->order_product->order->currency)); ?>"
                                                                data-reason="<?php echo e($return->reason->name); ?>"
                                                                data-created_at="<?php echo e($return->created_at); ?>"
                                                                data-target="#exampleModalCenter">
                                                            <i class="flaticon-view  bg-info p-1 text-white br-6"></i>
                                                        </button>
                                                    </li>

                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    

                                                    <li>
                                                        <form action="<?php echo e(route('returns.destroy', $return->id)); ?>"
                                                              method="post">
                                                            <?php echo csrf_field(); ?>
                                                            <?php echo method_field('delete'); ?>
                                                            <button class="mod btn btn-danger p-0"
                                                                    onclick="return confirm('<?php echo e(__("warrantymodule::admin.delete_return")); ?>')">
                                                                <i class="flaticon-delete   bg-danger p-1 text-white br-6"></i>
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
        </div>
    </div>
    <!--  END CONTENT PART  -->

    <!-- Modal -->
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
         aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content ">
                <div class="modal-header ">
                    <div class="row">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <span><?php echo e(__('warrantymodule::admin.client')); ?> :</span>
                            <strong id="client"></strong>
                        </div>
                        <div class="col-md-6">
                            <span><?php echo e(__('warrantymodule::admin.product')); ?> :</span>
                            <strong id="product"></strong>
                        </div>
                        <div class="col-md-6">
                            <span><?php echo e(__('warrantymodule::admin.price')); ?> :</span>
                            <strong id="price"></strong>
                        </div>
                        <div class="col-md-6">
                            <span><?php echo e(__('warrantymodule::admin.date')); ?> :</span>
                            <strong id="created_at"></strong>
                        </div>
                    </div>
                    <hr>
                    <div class="col-xl-12" id="reason">

                    </div>


                </div>
            </div>
        </div>
    </div>




<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
    <?php echo $__env->make('commonmodule::includes.swal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('commonmodule::includes.modal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <script src="<?php echo e(asset('assets/admin/plugins/table/datatable/datatables.js')); ?>"></script>
    <script>
        $('#ecommerce-product-list').DataTable({
            "lengthMenu": [100, 50, 20, 10],
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
    <!--  END CUSTOM SCRIPT FILES  -->


    <script>

        $(document).on("click", ".mod", function () {
            let client = $(this).data('client');
            let product = $(this).data('product');
            let price = $(this).data('price');
            let reason = $(this).data('reason');
            let created_at = $(this).data('created_at');

            $("#client").text(client);
            $("#product").text(product);
            $("#price").text(price);
            $("#created_at").text(created_at);
            $("#reason").text(reason);
        });
    </script>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('commonmodule::layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\freelancing\أجمل الهواتف\real_web_app\Modules/WarrantyModule\Resources/views/admin/returns/index.blade.php ENDPATH**/ ?>