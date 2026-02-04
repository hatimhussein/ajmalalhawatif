<?php $__env->startSection('title'); ?>
    <?php echo e(__('warrantymodule::insurance.insurance')); ?>

<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>


    <?php echo $__env->make('fronthomemodule::content.breadCrumbs',['pages'=>[__('commonmodule::front.warranty')]], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


    <!-- main-container -->
    <div class="main-container col2-right-layout">
        <div class="main container warranty-container">
            <div class="row w-attachments box">
                <div class="col-lg-6 col-md-3">
                    <?php if($insurance->front_image): ?>
                        <h5> صورة الجهاز من الأمام بعد التركيب</h5>
                        <?php if(is_video($insurance->front_image)): ?>
                            <video class="img-responsive" controls>
                                <source src="<?php echo e(asset('images/warranty/'.$insurance->front_image)); ?>" type="video/mp4">
                                <source src="<?php echo e(asset('images/warranty/'.$insurance->front_image)); ?>"
                                        type="video/quicktime">
                                Your browser does not support the video tag.
                            </video>
                        <?php else: ?>
                            <img class="img-responsive"
                                 src="<?php echo e(asset('images/warranty/'.$insurance->front_image)); ?>"/>
                        <?php endif; ?>
                    <?php endif; ?>
                </div>
                <div class="col-lg-6 col-md-3">
                    <?php if($insurance->device_back_image): ?>
                        <h5> <?php echo e(__('skudomodule::insurance.device_back_image')); ?></h5>
                        <?php if(is_video($insurance->device_back_image)): ?>
                            <video class="img-responsive" controls>
                                <source src="<?php echo e(asset('images/warranty/'.$insurance->device_back_image)); ?>" type="video/mp4">
                                <source src="<?php echo e(asset('images/warranty/'.$insurance->device_back_image)); ?>"
                                        type="video/quicktime">
                                Your browser does not support the video tag.
                            </video>
                        <?php else: ?>
                            <img class="img-responsive"
                                 src="<?php echo e(asset('images/warranty/'.$insurance->device_back_image)); ?>"/>
                        <?php endif; ?>
                    <?php endif; ?>
                </div>
                <div class="col-lg-6 col-md-3">
                    <?php if($insurance->back_image): ?>
                        <h5> <?php echo e(__('skudomodule::insurance.back_image')); ?></h5>
                        <?php if(is_video($insurance->back_image)): ?>
                            <video class="img-responsive" controls>
                                <source src="<?php echo e(asset('images/warranty/'.$insurance->back_image)); ?>" type="video/mp4">
                                <source src="<?php echo e(asset('images/warranty/'.$insurance->back_image)); ?>"
                                        type="video/quicktime">
                                Your browser does not support the video tag.
                            </video>
                        <?php else: ?>
                            <img class="img-responsive"
                                 src="<?php echo e(asset('images/warranty/'.$insurance->back_image)); ?>"/>
                        <?php endif; ?>
                    <?php endif; ?>
                </div>
                <div class="col-lg-6 col-md-3">
                    <?php if($insurance->invoice_image): ?>
                        <h5> صورة الفاتورة</h5>
                        <?php if(is_video($insurance->invoice_image)): ?>
                            <video class="img-responsive" controls>
                                <source src="<?php echo e(asset('images/warranty/'.$insurance->invoice_image)); ?>" type="video/mp4">
                                <source src="<?php echo e(asset('images/warranty/'.$insurance->invoice_image)); ?>" type="video/quicktime">
                                Your browser does not support the video tag.
                            </video>
                        <?php else: ?>
                            <img class="img-responsive" src="<?php echo e(asset('images/warranty/'.$insurance->invoice_image)); ?>"/>
                        <?php endif; ?>
                    <?php endif; ?>
                </div>
                <!-- warranty_image intentionally not shown to match create page inputs -->
            </div>

            <div class="row w-user_info box">
                <div class="col-lg-12">
                    <div class="row mt-5">
                        <div class="col-lg-6 col-md-6">
                            <h5>
                                <?php echo e(__('warrantymodule::insurance.user_name')); ?>:
                            </h5>
                            <span><?php echo e($insurance->user_name); ?></span>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <h5>
                                <?php echo e(__('warrantymodule::insurance.phone')); ?>:
                            </h5>
                            <span><?php echo e($insurance->phone_code->code ?? ''); ?><?php echo e($insurance->phone); ?></span>
                        </div>
                    </div>

                    
                    <div class="row mt-5">
                        <div class="col-lg-6 col-md-6">
                            <h5>
                                الرقم التسلسلي للجهاز:
                            </h5>
                            <span><?php echo e($insurance->device_serial); ?></span>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <h5>
                                الرقم التسلسلي للمنتج (البكج):
                            </h5>
                            <span><?php echo e($insurance->package_serial); ?></span>
                        </div>
                    </div>

                    <div class="row mt-5">
                        <div class="col-lg-6 col-md-6">
                            <h5>
                                <?php echo e(__('warrantymodule::insurance.usage_date')); ?>:
                            </h5>
                            <span><?php echo e($insurance->usage_date ? $insurance->usage_date->toDateString() : ''); ?></span>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <h5>
                                وقت وتاريخ الارسال:
                            </h5>
                            <span><?php echo e($insurance->created_at ? $insurance->created_at->format('Y-m-d H:i') : ''); ?></span>
                        </div>
                    </div>

                    <div class="row mt-5">
                        <div class="col-lg-6 col-md-6">
                            <h5>
                                <?php echo e(__('warrantymodule::insurance.dummy_text_1')); ?>:
                            </h5>
                            <span><?php echo e($insurance->dummy_text_1); ?></span>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <h5>
                                <?php echo e(__('warrantymodule::insurance.dummy_text_2')); ?>:
                            </h5>
                            <span><?php echo e($insurance->dummy_text_2); ?></span>
                        </div>
                    </div>

                    

                    <div class="row mt-5">
                        <div class="col-lg-12">
                            <h5>
                                <?php echo e(__('warrantymodule::insurance.user_notes')); ?>:
                            </h5>
                            <span><?php echo e($insurance->user_notes); ?></span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row w-response_info box">
                <div class="col-lg-12">
                    <div class="row mt-5">

                        <div class="col-lg-6 col-md-6">
                            <h5>
                                <?php echo e(__('warrantymodule::insurance.replied_at')); ?>:
                            </h5>
                            <span><?php echo e($insurance->replied_at ? $insurance->replied_at->diffForHumans() : ''); ?></span>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <h5>
                                <?php echo e(__('warrantymodule::insurance.status').':'); ?>

                            </h5>
                            <span>
                                <?php if($insurance->isClosed()): ?>
                                    <?php echo e(__('warrantymodule::insurance.closed')); ?>

                                <?php elseif($insurance->status == 0): ?>
                                    <?php echo e(__('warrantymodule::warranty.new')); ?>

                                <?php elseif($insurance->status == 1): ?>
                                    <?php echo e(__('warrantymodule::insurance.activated')); ?>

                                <?php elseif($insurance->status == 3): ?>
                                    <?php echo e(__('warrantymodule::warranty.in_progress')); ?>

                                <?php elseif($insurance->status == 2): ?>
                                    <?php echo e(__('warrantymodule::insurance.rejected')); ?>

                                <?php endif; ?>
                                </span>
                        </div>
                    </div>

                    <?php if($insurance->isClosed()): ?>
                        <?php if($insurance->isFinalUsed()): ?>
                            <div class="row mt-5">
                                <div class="col-lg-12">
                                    <h5>
                                        <?php echo e(__('warrantymodule::sms_warranty.sms_warranty')); ?>:
                                    </h5>
                                    <span><?php echo e($insurance->getRespondedWarranty()->first()->id); ?></span>
                                </div>
                            </div>
                        <?php else: ?>
                            <div class="row mt-5">
                                <div class="col-lg-12">
                                    <h5>
                                        <?php echo e(__('warrantymodule::insurance.expire_date')); ?>:
                                    </h5>
                                    <span><?php echo e($insurance->expire_date ? $insurance->expire_date->toDateString() : ''); ?></span>
                                </div>
                            </div>
                        <?php endif; ?>
                    <?php elseif(($insurance->status == 3 && $insurance->store_reason) || ($insurance->status == 2 && $insurance->reason)): ?>
                        <div class="row mt-5">
                            <div class="col-lg-12">
                                <h5>
                                    <?php echo e(__('warrantymodule::insurance.reason')); ?>:
                                </h5>
                                <span><?php echo e($insurance->status == 3 ? $insurance->store_reason : $insurance->reason); ?></span>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
    <!--End main-container -->

<?php $__env->stopSection(); ?>

<?php echo $__env->make('fronthomemodule::layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\freelancing\أجمل الهواتف\real_web_app\Modules/SkudoModule\Resources/views/front/insurance/show.blade.php ENDPATH**/ ?>