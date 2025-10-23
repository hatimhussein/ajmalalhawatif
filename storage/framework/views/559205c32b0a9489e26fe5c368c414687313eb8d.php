<div class="container">
    <div class=" widget-content widget-content-area">
        <div class="col-12">
            <div class="layout-spacing">
                <div class="statbox widget box box-shadow">
                    <div class="row">
                        <div class="col-xl-8 col-lg-8 col-12">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="statbox widget box box-shadow">
                                                <label for="quote_number">
                                                    <?php echo e(__('warrantymodule::insurance.quote_number')); ?>:
                                                </label>
                                                <input type="text" readonly id="quote_number"
                                                       class="form-control"
                                                       value="<?php echo e($insurance->id); ?>">
                                            </div>

                                            <div class="statbox widget box box-shadow">
                                                <label for="company_name">
                                                    <b><?php echo e(__('warrantymodule::insurance.company_name')); ?>:</b>
                                                </label>
                                                <input type="text" readonly id="company_name"
                                                       class="form-control"
                                                       value="<?php echo e($insurance->merchant->company_name ?? ''); ?>">
                                            </div>

                                            <div class="statbox widget box box-shadow">
                                                <label for="company_account">
                                                    <b><?php echo e(__('warrantymodule::insurance.company_account')); ?>:</b>
                                                </label>
                                                <input type="text" readonly id="company_account"
                                                       class="form-control"
                                                       value="<?php echo e($insurance->merchant->account_number ?? ''); ?>">
                                            </div>

                                            <div class="statbox widget box box-shadow">
                                                <label for="created_at">
                                                    <b><?php echo e(__('warrantymodule::insurance.sent_at')); ?>:</b>
                                                </label>
                                                <input type="date" readonly id="created_at"
                                                       class="form-control"
                                                       value="<?php echo e($insurance->created_at ? $insurance->created_at->toDateString() : ''); ?>">
                                            </div>

                                            <div class="statbox widget box box-shadow">
                                                <label for="user_notes">
                                                    <?php echo e(__('warrantymodule::insurance.user_notes')); ?>:
                                                </label>
                                                <textarea readonly id="user_notes" rows="4"
                                                          class="form-control"><?php echo e($insurance->user_notes); ?></textarea>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="statbox widget box box-shadow">
                                                <label for="usage_date">
                                                    <?php echo e(__('warrantymodule::insurance.usage_date')); ?>:
                                                </label>
                                                <input type="date" readonly id="usage_date"
                                                       class="form-control"
                                                       value="<?php echo e($insurance->usage_date ? $insurance->usage_date->toDateString() : ''); ?>">
                                            </div>

                                            <div class="statbox widget box box-shadow">
                                                <label for="user_name">
                                                    <b><?php echo e(__('warrantymodule::insurance.user_name')); ?>:</b>
                                                </label>
                                                <input type="text" readonly id="user_name"
                                                       class="form-control"
                                                       value="<?php echo e($insurance->user_name); ?>">
                                            </div>

                                            <div class="statbox widget box box-shadow">
                                                <label for="phone">
                                                    <b><?php echo e(__('warrantymodule::insurance.phone')); ?>:</b>
                                                </label>
                                                <input type="text" readonly id="phone"
                                                       class="form-control"
                                                       value="<?php echo e($insurance->phone ? ($insurance->phone_code->code ?? '') : ''); ?> <?php echo e($insurance->phone); ?>">
                                            </div>

                                            <div class="statbox widget box box-shadow">
                                                <label for="email">
                                                    <b><?php echo e(__('warrantymodule::insurance.email')); ?>:</b>
                                                </label>
                                                <input type="text" readonly id="email"
                                                       class="form-control"
                                                       value="<?php echo e($insurance->email); ?>">
                                            </div>

                                            <div class="statbox widget box box-shadow">
                                                <label for="dummy_text_1">
                                                    <b><?php echo e(__('warrantymodule::insurance.dummy_text_1')); ?>:</b>
                                                </label>
                                                <input type="text" readonly id="dummy_text_1"
                                                       class="form-control"
                                                       value="<?php echo e($insurance->dummy_text_1); ?>">
                                            </div>

                                            <div class="statbox widget box box-shadow">
                                                <label for="dummy_text_2">
                                                    <b><?php echo e(__('warrantymodule::insurance.dummy_text_2')); ?>:</b>
                                                </label>
                                                <input type="text" readonly id="dummy_text_2"
                                                       class="form-control"
                                                       value="<?php echo e($insurance->dummy_text_2); ?>">
                                            </div>

                                            <div class="statbox widget box box-shadow">
                                                <label for="dummy_text_3">
                                                    <b><?php echo e(__('warrantymodule::insurance.dummy_text_3')); ?>:</b>
                                                </label>
                                                <input type="text" readonly id="dummy_text_3"
                                                       class="form-control"
                                                       value="<?php echo e($insurance->dummy_text_3); ?>">
                                            </div>

                                        </div>
                                    </div>

                                </div>

                            </div>
                        </div>


                        <div class="col-xl-4 col-lg-4 col-12">
                            <form class="col-12">
                                <div class="row mt-3">

                                    <div class="col-md-12 text-center">
                                        <h2 class="legend"><?php echo e(__('warrantymodule::insurance.status')); ?>

                                            <i class="flaticon-file"></i>
                                        </h2>
                                    </div>

                                    <div class="col-lg-12 text-center mb-4">
                                        <div class="statbox widget box box-shadow">
                                            <div class="switch-toggle switch-2 switch-candy w-100 mt-4">
                                                <?php if($insurance->isClosed()): ?>
                                                    <input id="closed" class="status-switch"
                                                           name="status" type="radio" disabled checked/>
                                                    <label
                                                        for="closed"><?php echo e(__('warrantymodule::insurance.closed')); ?></label>

                                                    <input id="applicable" class="status-switch"
                                                           name="status" type="radio" value="1" disabled/>
                                                    <label
                                                        for="applicable"><?php echo e(__('warrantymodule::insurance.activated')); ?></label>
                                                <?php else: ?>
                                                    <input id="applicable" class="status-switch"
                                                           name="status" type="radio" value="1" disabled
                                                        <?php echo e($insurance->status == 1 ? 'checked' : ''); ?>/>
                                                    <label
                                                        for="applicable"><?php echo e(__('warrantymodule::insurance.activated')); ?></label>

                                                    <input id="pending" class="status-switch"
                                                           name="status" type="radio" value="0" disabled
                                                        <?php echo e($insurance->status == 0 ? 'checked' : ''); ?>/>
                                                    <label
                                                        for="pending"><?php echo e(__('warrantymodule::admin.pending')); ?></label>

                                                    <input id="not_applicable" class="status-switch"
                                                           name="status" type="radio" value="2" disabled
                                                        <?php echo e($insurance->status === 2 ? 'checked' : ''); ?>/>
                                                    <label
                                                        for="not_applicable"><?php echo e(__('warrantymodule::insurance.rejected')); ?></label>
                                                <?php endif; ?>

                                                <a></a>
                                            </div>
                                        </div>
                                    </div>

                                    <?php if($insurance->isClosed()): ?>
                                        <?php if($insurance->isUsed()): ?>
                                            <div class="col-md-12 mb-4 input-control status-tab" id="value-cont"
                                                 style="<?php echo e($insurance->status == 1 ? '' : 'display: none'); ?>">
                                                <div class="statbox widget box box-shadow">
                                                    <label for="replied_at">
                                                        <?php echo e(__('warrantymodule::sms_warranty.sms_warranty')); ?>:
                                                    </label>
                                                    <input type="text" disabled
                                                           value="<?php echo e($insurance->getRespondedWarranty()->first()->id); ?>"
                                                           class="form-control" autocomplete="off">
                                                </div>
                                                <div class="statbox widget box box-shadow">
                                                    <label for="replied_at">
                                                        <?php echo e(__('warrantymodule::sms_warranty.status')); ?>:
                                                    </label>
                                                    <input type="text" disabled
                                                           value="<?php echo e(__('warrantymodule::sms_warranty.'.$insurance->getRespondedWarranty()->first()->status_locale)); ?>"
                                                           class="form-control" autocomplete="off">
                                                </div>
                                            </div>
                                        <?php else: ?>
                                            <div class="col-md-12 mb-4 input-control status-tab" id="value-cont"
                                                 style="<?php echo e($insurance->status == 1 ? '' : 'display: none'); ?>">
                                                <div class="statbox widget box box-shadow">
                                                    <label for="replied_at">
                                                        <?php echo e(__('warrantymodule::insurance.replied_at')); ?>:
                                                    </label>
                                                    <input name="replied_at" id="replied_at" type="date"
                                                           readonly
                                                           disabled
                                                           value="<?php echo e($insurance->replied_at ? $insurance->replied_at->toDateString() : ''); ?>"
                                                           class="form-control" autocomplete="off">
                                                </div>

                                                <div class="statbox widget box box-shadow">
                                                    <label for="application_number">
                                                        <?php echo e(__('warrantymodule::insurance.expire_date'),':'); ?>

                                                    </label>
                                                    <input name="expire_date" id="expire_date" type="date"
                                                           readonly
                                                           disabled
                                                           value="<?php echo e($insurance->expire_date ? $insurance->expire_date->toDateString() : ''); ?>"
                                                           class="form-control" autocomplete="off">
                                                </div>
                                            </div>
                                        <?php endif; ?>
                                    <?php else: ?>
                                        <div class="col-md-12 mb-4 input-control status-tab" id="value-cont"
                                             style="<?php echo e($insurance->status == 1 ? '' : 'display: none'); ?>">
                                            <div class="statbox widget box box-shadow">
                                                <label for="replied_at">
                                                    <?php echo e(__('warrantymodule::insurance.replied_at')); ?>:
                                                </label>
                                                <input name="replied_at" id="replied_at" type="date" readonly
                                                       disabled
                                                       value="<?php echo e($insurance->replied_at ? $insurance->replied_at->toDateString() : ''); ?>"
                                                       class="form-control" autocomplete="off">
                                            </div>

                                            <div class="statbox widget box box-shadow">
                                                <label for="application_number">
                                                    <?php echo e(__('warrantymodule::insurance.expire_date'),':'); ?>

                                                </label>
                                                <input name="expire_date" id="expire_date" type="date" readonly
                                                       disabled
                                                       value="<?php echo e($insurance->expire_date ? $insurance->expire_date->toDateString() : ''); ?>"
                                                       class="form-control" autocomplete="off">
                                            </div>
                                        </div>
                                        <div class="col-md-12 mb-4 input-control status-tab"
                                             id="store-reason-cont"
                                             style="<?php echo e($insurance->status == 0 ? '' : 'display: none'); ?>">
                                            <div class="statbox widget box box-shadow">
                                                <label for="store_reason">
                                                    <?php echo e(__('warrantymodule::insurance.store_reason')); ?>:
                                                </label>
                                                <textarea name="store_reason" id="store_reason" class="form-control"
                                                          data-validate-func="<?php echo e(is_null($insurance->is_applicable) ? 'required' : ''); ?>"
                                                          data-validate-arg="6" readonly
                                                          data-validate-hint="<?php echo e(__('warrantymodule::admin.rreaseon')); ?> "
                                                          placeholder="<?php echo e(__('warrantymodule::insurance.store_reason')); ?>"
                                                          rows="2"><?php echo e($insurance->store_reason); ?></textarea>
                                                <?php if($errors->has('store_reason')): ?>
                                                    <?php echo $__env->make('commonmodule::includes.error',['errors'=>$errors->toArray(),'filed'=>'store_reason'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                        <div class="col-md-12 mb-4 input-control status-tab"
                                             id="reason-cont"
                                             style="<?php echo e(($insurance->status == 2) ? '' : 'display: none'); ?>">
                                            <div class="statbox widget box box-shadow">
                                                <label for="reason">
                                                    <?php echo e(__('warrantymodule::insurance.reason')); ?>:
                                                </label>
                                                <textarea name="reason" id="reason" class="form-control"
                                                          data-validate-func="<?php echo e(($insurance->is_applicable === 0) ? 'required' : ''); ?>"
                                                          data-validate-arg="6" readonly
                                                          data-validate-hint="<?php echo e(__('warrantymodule::admin.rreaseon')); ?> "
                                                          placeholder="<?php echo e(__('warrantymodule::insurance.reason')); ?>"
                                                          rows="2"><?php echo e($insurance->reason); ?></textarea>
                                                <?php if($errors->has('reason')): ?>
                                                    <?php echo $__env->make('commonmodule::includes.error',['errors'=>$errors->toArray(),'filed'=>'reason'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </form>
                        </div>

                    </div>

                    <div class="row mt-5">
                        <div class="col-md-12 text-center">
                            <h2 class="legend"><?php echo e(__('usermodule::admin.attachment')); ?>

                                <i class="flaticon-attachment"></i>
                            </h2>
                        </div>
                        <?php if($insurance->front_image): ?>
                            <div class="col-lg-4">
                                <label> <?php echo e(__('warrantymodule::insurance.front_image')); ?></label>
                                <div
                                    class="custom-file-container__image-preview product-list-img">
                                    <?php if(is_video($insurance->front_image)): ?>
                                        <video controls>
                                            <source
                                                src="<?php echo e(asset('images/warranty/'.$insurance->front_image)); ?>"
                                                type="video/mp4">
                                            <source
                                                src="<?php echo e(asset('images/warranty/'.$insurance->front_image)); ?>"
                                                type="video/quicktime">
                                            Your browser does not support the video
                                            tag.
                                        </video>
                                    <?php else: ?>
                                        <img
                                            src="<?php echo e(asset('images/warranty/'.$insurance->front_image)); ?>"
                                            alt=""/>
                                    <?php endif; ?>
                                </div>
                            </div>
                        <?php endif; ?>
                        <?php if($insurance->back_image): ?>
                            <div class="col-lg-4">
                                <label> <?php echo e(__('warrantymodule::insurance.back_image')); ?></label>
                                <div
                                    class="custom-file-container__image-preview product-list-img">
                                    <?php if(is_video($insurance->back_image)): ?>
                                        <video controls>
                                            <source
                                                src="<?php echo e(asset('images/warranty/'.$insurance->back_image)); ?>"
                                                type="video/mp4">
                                            <source
                                                src="<?php echo e(asset('images/warranty/'.$insurance->back_image)); ?>"
                                                type="video/quicktime">
                                            Your browser does not support the video
                                            tag.
                                        </video>
                                    <?php else: ?>
                                        <img
                                            src="<?php echo e(asset('images/warranty/'.$insurance->back_image)); ?>"/>
                                    <?php endif; ?>
                                </div>
                            </div>
                        <?php endif; ?>
                        <?php if($insurance->warranty_image): ?>
                            <div class="col-lg-4">
                                <label> <?php echo e(__('warrantymodule::insurance.warranty_image')); ?></label>
                                <div
                                    class="custom-file-container__image-preview product-list-img">
                                    <?php if(is_video($insurance->warranty_image)): ?>
                                        <video controls>
                                            <source
                                                src="<?php echo e(asset('images/warranty/'.$insurance->warranty_image)); ?>"
                                                type="video/mp4">
                                            <source
                                                src="<?php echo e(asset('images/warranty/'.$insurance->warranty_image)); ?>"
                                                type="video/quicktime">
                                            Your browser does not support the video
                                            tag.
                                        </video>
                                    <?php else: ?>
                                        <img src="<?php echo e(asset('images/warranty/'.$insurance->warranty_image)); ?>"/>
                                    <?php endif; ?>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>




<?php /**PATH D:\freelancing\أجمل الهواتف\real_web_app\Modules/WarrantyModule\Resources/views/admin/insurance/insurance-fields.blade.php ENDPATH**/ ?>