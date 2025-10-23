<?php $__env->startSection('title'); ?>
    <?php echo e(__('commonmodule::front.warranty')); ?>

<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>


    <?php echo $__env->make('fronthomemodule::content.breadCrumbs',['pages'=>[__('commonmodule::front.warranty')]], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


    <!-- main-container -->
    <div class="main-container col2-right-layout">
        <div class="main container warranty-container">
            <div class="row w-attachments box">
                <div class="col-lg-4 col-md-4">
                    <?php if($warranty->front_image): ?>
                        <h5> <?php echo e(__('warrantymodule::warranty.front_image')); ?></h5>
                        <?php if(is_video($warranty->front_image)): ?>
                            <video class="img-responsive" controls>
                                <source src="<?php echo e(asset('images/warranty/'.$warranty->front_image)); ?>" type="video/mp4">
                                <source src="<?php echo e(asset('images/warranty/'.$warranty->front_image)); ?>"
                                        type="video/quicktime">
                                Your browser does not support the video tag.
                            </video>
                        <?php else: ?>
                            <img class="img-responsive"
                                 src="<?php echo e(asset('images/warranty/'.$warranty->front_image)); ?>"/>
                        <?php endif; ?>
                    <?php endif; ?>
                </div>
                <div class="col-lg-4 col-md-4">
                    <?php if($warranty->back_image): ?>
                        <h5> <?php echo e(__('warrantymodule::warranty.back_image')); ?></h5>
                        <?php if(is_video($warranty->back_image)): ?>
                            <video class="img-responsive" controls>
                                <source src="<?php echo e(asset('images/warranty/'.$warranty->back_image)); ?>" type="video/mp4">
                                <source src="<?php echo e(asset('images/warranty/'.$warranty->back_image)); ?>"
                                        type="video/quicktime">
                                Your browser does not support the video tag.
                            </video>
                        <?php else: ?>
                            <img class="img-responsive"
                                 src="<?php echo e(asset('images/warranty/'.$warranty->back_image)); ?>"/>
                        <?php endif; ?>
                    <?php endif; ?>
                </div>
                <div class="col-lg-4 col-md-4">
                    <?php if($warranty->warranty_image): ?>
                        <h5> <?php echo e(__('warrantymodule::warranty.warranty_image')); ?></h5>
                        <?php if(is_video($warranty->warranty_image)): ?>
                            <video class="img-responsive" controls>
                                <source src="<?php echo e(asset('images/warranty/'.$warranty->warranty_image)); ?>" type="video/mp4">
                                <source src="<?php echo e(asset('images/warranty/'.$warranty->warranty_image)); ?>"
                                        type="video/quicktime">
                                Your browser does not support the video tag.
                            </video>
                        <?php else: ?>
                            <img class="img-responsive"
                                 src="<?php echo e(asset('images/warranty/'.$warranty->warranty_image)); ?>" alt=""/>
                        <?php endif; ?>
                    <?php endif; ?>
                </div>
            </div>

            <div class="row w-user_info box">
                <div class="col-lg-12">
                    <div class="row mt-5">
                        <div class="col-lg-6 col-md-6">
                            <h5>
                                <?php echo e(__('warrantymodule::warranty.user_name')); ?>:
                            </h5>
                            <span><?php echo e($warranty->user_name); ?></span>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <h5>
                                <?php echo e(__('warrantymodule::warranty.phone')); ?>:
                            </h5>
                            <span><?php echo e($warranty->phone_code->code ?? ''); ?><?php echo e($warranty->phone); ?></span>
                        </div>
                    </div>

                    <div class="row mt-5">
                        <div class="col-lg-6 col-md-6">
                            <h5>
                                <?php echo e(__('warrantymodule::warranty.usage_date')); ?>:
                            </h5>
                            <span><?php echo e($warranty->usage_date); ?></span>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <h5>
                                <?php echo e(__('warrantymodule::warranty.sent_at')); ?>:
                            </h5>
                            <span><?php echo e($warranty->created_at->diffForHumans()); ?></span>
                        </div>
                    </div>

                    <div class="row mt-5">
                        <div class="col-lg-6 col-md-6">
                            <h5>
                                <?php echo e(__('warrantymodule::warranty.dummy_text_1')); ?>:
                            </h5>
                            <span><?php echo e($warranty->dummy_text_1); ?></span>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <h5>
                                <?php echo e(__('warrantymodule::warranty.dummy_text_2')); ?>:
                            </h5>
                            <span><?php echo e($warranty->dummy_text_2); ?></span>
                        </div>
                    </div>

                    <div class="row mt-5">
                        <div class="col-lg-6 col-md-6">
                            <h5>
                                <?php echo e(__('warrantymodule::warranty.dummy_text_3')); ?>:
                            </h5>
                            <span><?php echo e($warranty->dummy_text_3); ?></span>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <h5>
                                رقم تسجيل الضمان:
                            </h5>
                            <span><?php echo e($warranty->insurance_id); ?></span>
                        </div>
                    </div>

                    <div class="row mt-5">
                        <div class="col-lg-12">
                            <h5>
                                <?php echo e(__('warrantymodule::warranty.user_notes')); ?>:
                            </h5>
                            <span><?php echo e($warranty->user_notes); ?></span>
                        </div>
                    </div>
                </div>
            </div>

            <?php if(!is_null($warranty->is_applicable)): ?>
                <div class="row w-response_info box">
                    <div class="col-lg-12">
                        <div class="row mt-5">
                            <div class="col-lg-6 col-md-6">
                                <h5>
                                    <?php echo e(__('warrantymodule::warranty.device_name')); ?>:
                                </h5>
                                <span><?php echo e($warranty->device_name); ?></span>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <h5>
                                    <?php echo e(__('warrantymodule::warranty.replied_at')); ?>:
                                </h5>
                                <span><?php echo e($warranty->replied_at ? $warranty->replied_at->diffForHumans() : ''); ?></span>
                            </div>
                        </div>

                        <div class="row mt-5">
                            <div class="col-lg-6 col-md-6">
                                <h5><?php echo e(__('warrantymodule::warranty.application_number')); ?></h5>
                                <span><?php echo e($warranty->application_number); ?></span>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <h5>
                                    <?php echo e(__('warrantymodule::warranty.status').':'); ?>

                                </h5>
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
                            </div>
                        </div>

                        <div class="row mt-5">
                            <div class="col-lg-12">
                                <?php if($warranty->is_applicable): ?>
                                    <h5>
                                        <?php echo e(__('warrantymodule::warranty.value')); ?>:
                                    </h5>
                                    <span><?php echo e($warranty->value); ?> <?php echo e(LanguageHelper::nameTranslate($warranty->currency)); ?></span>
                                <?php else: ?>
                                    <h5>
                                        <?php echo e(__('warrantymodule::warranty.reason')); ?>:
                                    </h5>
                                    <span><?php echo e($warranty->reason); ?></span>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
            <?php if($warranty->is_applicable == 2): ?>
                <div class="row w-response_info box">
                    <div class="col-lg-12">
                        <div class="row mt-5">
                            <div class="col-lg-6 col-md-6">
                                <h5>
                                    <?php echo e(__('warrantymodule::warranty.replied_at')); ?>:
                                </h5>
                                <span><?php echo e(\Carbon\Carbon::parse($warranty->replied_at)->diffForHumans()); ?></span>
                            </div>

                            <div class="col-lg-6 col-md-6">
                                <h5>
                                    <?php echo e(__('warrantymodule::warranty.status').':'); ?>

                                </h5>
                                <span><?php echo e(__('warrantymodule::warranty.pending')); ?></span>
                            </div>
                        </div>

                        <div class="row mt-5">
                            <div class="col-lg-12">
                                <h5>
                                    <?php echo e(__('warrantymodule::warranty.reason')); ?>:
                                </h5>
                                <span><?php echo e($warranty->store_reason); ?></span>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>
    <!--End main-container -->

<?php $__env->stopSection(); ?>

<?php echo $__env->make('fronthomemodule::layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\freelancing\أجمل الهواتف\real_web_app\Modules/SkudoModule\Resources/views/front/warranty/show.blade.php ENDPATH**/ ?>