<?php $__env->startSection('css'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('assets/admin/css/design-css/design.css')); ?>" type="text/css">
    <link rel="stylesheet" href="<?php echo e(asset('assets/admin/css/design-css/design-icons.css')); ?>" type="text/css">

    <!-- BEGIN PAGE LEVEL STYLES -->
    <link rel="stylesheet" href="<?php echo e(asset('assets/admin/plugins/file-upload/file-upload-with-preview.css')); ?>"
          type="text/css">
    <!--  BEGIN CUSTOM STYLE FILE  -->

    <link rel="stylesheet" href="<?php echo e(asset('assets/admin/plugins/select2/select2.min.css')); ?>" type="text/css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/css-toggle-switch/latest/toggle-switch.css" type="text/css">

    <style>
        .row [class*="col-"] .widget .widget-header h4 {
            color: #00d1c1;
        }

        .switch-toggle {
            width: 10em;
        }

        .switch-toggle label:not(.disabled) {
            cursor: pointer;
        }

        .switch-toggle label {
            white-space: nowrap;
        }

    </style>
    <!--  END CUSTOM STYLE FILE  -->

    <!-- END PAGE LEVEL STYLES -->

<?php $__env->stopSection(); ?>


<?php $__env->startSection('title'); ?>
    <?php echo e(__('warrantymodule::' . $localeFile . '.update_warranty')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div id="content" class="main-content">
        <div class="container">
            <div class="page-header">
                <div class="page-title">
                    <h3><?php echo e(__('warrantymodule::admin.warranty')); ?></h3>
                </div>
            </div>

            <div class=" widget-content widget-content-area">
                <div class="col-12">
                    <div class="layout-spacing">
                        <div class="statbox widget box box-shadow">
                            <div class="widget-header">
                                <div class="row">
                                    <div class="col-xl-9 col-md-9 col-sm-9 col-9">
                                        <h4><?php echo e(__('warrantymodule::' . $localeFile . '.update_warranty')); ?></h4>
                                    </div>
                                </div>
                            </div>

                            <div class="row">

                                <div class="col-xl-7 col-lg-8 col-12">
                                    <div class="row">
                                        <div class="col-md-12 text-center">
                                            <h2 class="legend"><?php echo e(__('warrantymodule::' . $localeFile . '.main_info')); ?>

                                                <i class="flaticon-file"></i>
                                            </h2>
                                        </div>
                                        <div class="col-md-12">

                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="statbox widget box box-shadow">
                                                        <label for="quote_number">
                                                            <?php echo e(__('warrantymodule::' . $localeFile . '.quote_number')); ?>:
                                                        </label>
                                                        <input type="text" readonly id="quote_number"
                                                               class="form-control"
                                                               value="<?php echo e($warranty->id); ?>">
                                                    </div>

                                                    <div class="statbox widget box box-shadow">
                                                        <label for="company_name">
                                                            <b><?php echo e(__('warrantymodule::' . $localeFile . '.company_name')); ?>:</b>
                                                        </label>
                                                        <input type="text" readonly id="company_name"
                                                               class="form-control"
                                                               value="<?php echo e($warranty->merchant->company_name ?? ''); ?>">
                                                    </div>

                                                    <div class="statbox widget box box-shadow">
                                                        <label for="company_account">
                                                            <?php echo e(__('warrantymodule::' . $localeFile . '.company_account')); ?>:
                                                        </label>
                                                        <input type="text" readonly id="company_account"
                                                               class="form-control"
                                                               value="<?php echo e($warranty->merchant->account_number ?? ''); ?>">
                                                    </div>

                                                    <div class="statbox widget box box-shadow">
                                                        <label for="created_at">
                                                            <?php echo e(__('warrantymodule::' . $localeFile . '.sent_at')); ?>:
                                                        </label>
                                                        <input type="datetime" readonly id="created_at"
                                                               class="form-control"
                                                               value="<?php echo e($warranty->created_at); ?>">
                                                    </div>

                                                    <?php if($warranty->type == 'sms'): ?>
                                                        <div class="statbox widget box box-shadow">
                                                            <label for="user_notes">
                                                                <?php echo e(__('warrantymodule::' . $localeFile . '.user_notes')); ?>:
                                                            </label>
                                                            <textarea readonly id="user_notes" rows="6"
                                                                      class="form-control"><?php echo e($warranty->user_notes); ?></textarea>
                                                        </div>
                                                    <?php endif; ?>
                                                </div>
                                                <div class="col-lg-6">
                                                    <?php if($warranty->type == 'sms'): ?>
                                                        <div class="statbox widget box box-shadow">
                                                            <label for="warranty_number">
                                                                <?php echo e(__('warrantymodule::' . $localeFile . '.warranty_number')); ?>:
                                                            </label>
                                                            <input type="text" readonly id="warranty_number"
                                                                   class="form-control"
                                                                   value="<?php echo e($warranty->insurance_id); ?>">
                                                        </div>

                                                        <div class="statbox widget box box-shadow">
                                                            <label for="user_name">
                                                                <b><?php echo e(__('warrantymodule::' . $localeFile . '.user_name')); ?>:</b>
                                                            </label>
                                                            <input type="text" readonly id="user_name"
                                                                   class="form-control"
                                                                   value="<?php echo e($warranty->user_name); ?>">
                                                        </div>

                                                        <div class="statbox widget box box-shadow">
                                                            <label for="phone">
                                                                <?php echo e(__('warrantymodule::' . $localeFile . '.phone')); ?>:
                                                            </label>
                                                            <input type="text" readonly id="phone"
                                                                   class="form-control"
                                                                   value="<?php echo e($warranty->phone_code->code ?? ''); ?> <?php echo e($warranty->phone); ?>">
                                                        </div>
                                                    <?php endif; ?>

                                                    <div class="statbox widget box box-shadow">
                                                        <label for="usage_date">
                                                            <b><?php echo e(__('warrantymodule::' . $localeFile . '.usage_date')); ?>:</b>
                                                        </label>
                                                        <input type="date" readonly id="usage_date"
                                                               class="form-control"
                                                               value="<?php echo e($warranty->usage_date ? $warranty->usage_date->toDateString() : ''); ?>">
                                                    </div>

                                                    <div class="statbox widget box box-shadow">
                                                        <label for="dummy_text_1">
                                                            <b><?php echo e(__('warrantymodule::' . $localeFile . '.dummy_text_1')); ?>:</b>
                                                        </label>
                                                        <input type="text" readonly id="dummy_text_1"
                                                               class="form-control"
                                                               value="<?php echo e($warranty->dummy_text_1); ?>">
                                                    </div>

                                                    <div class="statbox widget box box-shadow">
                                                        <label for="dummy_text_2">
                                                            <b><?php echo e(__('warrantymodule::' . $localeFile . '.dummy_text_2')); ?>:</b>
                                                        </label>
                                                        <input type="text" readonly id="dummy_text_2"
                                                               class="form-control"
                                                               value="<?php echo e($warranty->dummy_text_2); ?>">
                                                    </div>

                                                    <div class="statbox widget box box-shadow">
                                                        <label for="dummy_text_3">
                                                            <b><?php echo e(__('warrantymodule::' . $localeFile . '.dummy_text_3')); ?>:</b>
                                                        </label>
                                                        <input type="text" readonly id="dummy_text_3"
                                                               class="form-control"
                                                               value="<?php echo e($warranty->dummy_text_3); ?>">
                                                    </div>
                                                </div>
                                                <div class="col-lg-12">
                                                    <?php if($warranty->type == 'card'): ?>
                                                        <div class="statbox widget box box-shadow">
                                                            <label for="user_notes">
                                                                <?php echo e(__('warrantymodule::' . $localeFile . '.user_notes')); ?>:
                                                            </label>
                                                            <textarea readonly id="user_notes" rows="4"
                                                                      class="form-control"><?php echo e($warranty->user_notes); ?></textarea>
                                                        </div>
                                                    <?php endif; ?>
                                                </div>
                                            </div>

                                        </div>

                                    </div>
                                </div>


                                <div class="col-xl-5 col-lg-4 col-12">
                                    <form action="<?php echo e(route('skudo.warranty.update', $warranty->id)); ?>"
                                          class="col-12" method="POST"
                                          data-role="validator" data-on-before-submit="no_submit"
                                          data-on-error-input="notifyOnErrorInput"
                                          data-show-error-hint="false" novalidate="novalidate"
                                          enctype="multipart/form-data">
                                        <?php echo csrf_field(); ?>
                                        <?php echo method_field('put'); ?>
                                        <div class="row mt-3">

                                            <div class="col-md-12 text-center">
                                                <h2 class="legend"><?php echo e(__('warrantymodule::admin.head_applicable')); ?>

                                                    <i class="flaticon-file"></i>
                                                </h2>
                                            </div>

                                            <div class="col-lg-12 text-center mb-4">
                                                <div class="statbox widget box box-shadow">
                                                    <div class="switch-toggle switch-2 switch-candy w-100 mt-4">


                                                        <input id="not_applicable" class="is_applicable-switch"
                                                               name="is_applicable" type="radio" value="0"
                                                            <?php echo e($warranty->is_applicable === 0 ? 'checked' : ''); ?>/>
                                                        <label
                                                            for="not_applicable"><?php echo e(__('warrantymodule::admin.not_applicable')); ?></label>


                                                        <input id="applicable" class="is_applicable-switch"
                                                        name="is_applicable" type="radio" value="1"
                                                        <?php echo e($warranty->is_applicable === 1 ?  'checked' : ''); ?>/>
                                                        <label
                                                        for="applicable"><?php echo e(__('warrantymodule::admin.applicable')); ?></label>


                                                        <input id="pending" class="is_applicable-switch"
                                                               name="is_applicable" type="radio" value="2"
                                                            <?php echo e(($warranty->is_applicable) == 2 ? 'checked' : ''); ?>/>
                                                        <label
                                                            for="pending"><?php echo e(__('warrantymodule::admin.pending')); ?></label>

                                                        <input id="new" class="is_applicable-switch"
                                                               name="is_applicable" type="radio" value=""
                                                              <?php echo e(is_null($warranty->is_applicable) ? 'checked' : ''); ?>/>
                                                        <label
                                                            for="pending"><?php echo e(__('warrantymodule::admin.new')); ?></label>


                                                        <a></a>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-12 mb-4 input-control status-tab" id="value-cont"
                                                 style="<?php echo e($warranty->is_applicable ? '' : 'display: none'); ?>">
                                                <div class="statbox widget box box-shadow">
                                                    <label for="value">
                                                        <?php echo e(__('warrantymodule::' . $localeFile . '.value')); ?>:
                                                    </label>
                                                    <input type="number" name="value" id="value"
                                                           value="<?php echo e(old('value') ?? $warranty->value); ?>"
                                                           class="form-control"
                                                           data-validate-func="<?php echo e($warranty->is_applicable ? 'required' : ''); ?>"
                                                           data-validate-arg="6"
                                                           data-validate-hint="<?php echo e(__('warrantymodule::admin.rvalue')); ?> "
                                                           placeholder="<?php echo e(__('warrantymodule::' . $localeFile . '.value')); ?>"
                                                           autocomplete="off">
                                                    <?php if($errors->has('value')): ?>
                                                        <?php echo $__env->make('commonmodule::includes.error',['errors'=>$errors->toArray(),'filed'=>'value'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                                    <?php endif; ?>
                                                </div>

                                                <div class="statbox widget box box-shadow">
                                                    <label for="application_number">
                                                        <?php echo e(__('warrantymodule::' . $localeFile . '.application_number'),':'); ?>

                                                    </label>
                                                    <input name="application_number" id="application_number"
                                                           value="<?php echo e(old('application_number') ?? $warranty->application_number); ?>"
                                                           class="form-control"
                                                           data-validate-func="<?php echo e($warranty->is_applicable ? 'required' : ''); ?>"
                                                           data-validate-arg="6"
                                                           data-validate-hint="<?php echo e(__('warrantymodule::admin.rapplication_number')); ?> "
                                                           placeholder="<?php echo e(__('warrantymodule::' . $localeFile . '.application_number')); ?>"
                                                           autocomplete="off">
                                                    <?php if($errors->has('application_number')): ?>
                                                        <?php echo $__env->make('commonmodule::includes.error',['errors'=>$errors->toArray(),'filed'=>'application_number'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                            <div class="col-md-12 mb-4 input-control status-tab"
                                                 id="store-reason-cont"
                                                 style="<?php echo e(is_null($warranty->is_applicable) ? '' : 'display: none'); ?>">
                                                <div class="statbox widget box box-shadow">
                                                    <label for="store_reason">
                                                        <?php echo e(__('warrantymodule::' . $localeFile . '.store_reason')); ?>:
                                                    </label>
                                                    <textarea name="store_reason" id="store_reason" class="form-control"
                                                              data-validate-func="<?php echo e(is_null($warranty->is_applicable) ? 'required' : ''); ?>"
                                                              data-validate-arg="6"
                                                              data-validate-hint="<?php echo e(__('warrantymodule::admin.rreaseon')); ?> "
                                                              placeholder="<?php echo e(__('warrantymodule::' . $localeFile . '.store_reason')); ?>"
                                                              rows="2"><?php echo e($warranty->store_reason); ?></textarea>
                                                    <?php if($errors->has('store_reason')): ?>
                                                        <?php echo $__env->make('commonmodule::includes.error',['errors'=>$errors->toArray(),'filed'=>'store_reason'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                            <div class="col-md-12 mb-4 input-control status-tab"
                                                 id="reason-cont"
                                                 style="<?php echo e(($warranty->is_applicable !== 0) ? 'display: none' : ''); ?>">
                                                <div class="statbox widget box box-shadow">
                                                    <label for="reason">
                                                        <?php echo e(__('warrantymodule::' . $localeFile . '.reason')); ?>:
                                                    </label>
                                                    <textarea name="reason" id="reason" class="form-control"
                                                              data-validate-func="<?php echo e(($warranty->is_applicable === 0) ? 'required' : ''); ?>"
                                                              data-validate-arg="6"
                                                              data-validate-hint="<?php echo e(__('warrantymodule::admin.rreaseon')); ?> "
                                                              placeholder="<?php echo e(__('warrantymodule::' . $localeFile . '.reason')); ?>"
                                                              rows="2"><?php echo e($warranty->reason); ?></textarea>
                                                    <?php if($errors->has('reason')): ?>
                                                        <?php echo $__env->make('commonmodule::includes.error',['errors'=>$errors->toArray(),'filed'=>'reason'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <!-- حالة التحويل وملف الإيصال - تظهر فقط عند الضمان المطبق -->
                                        <div class="row mt-3 input-control status-tab" id="transfer-cont"
                                             style="<?php echo e($warranty->is_applicable ? 'display: flex' : 'display: none'); ?>">
                                            <div class="col-lg-6">
                                                <div class="statbox widget box box-shadow">
                                                    <label for="transfer_status">
                                                        <b><?php echo e(__('skudomodule::warranty.transfer_status')); ?>:</b>
                                                    </label>
                                                    <select name="transfer_status" id="transfer_status" class="form-control">
                                                        <option value=""><?php echo e(__('skudomodule::warranty.transfer_pending')); ?></option>
                                                        <option value="1" <?php echo e($warranty->transfer_status === 1 ? 'selected' : ''); ?>>
                                                            <?php echo e(__('skudomodule::warranty.transfer_completed')); ?>

                                                        </option>
                                                        <option value="0" <?php echo e($warranty->transfer_status === 0 ? 'selected' : ''); ?>>
                                                            <?php echo e(__('skudomodule::warranty.transfer_not_completed')); ?>

                                                        </option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-lg-6">
                                                <div class="statbox widget box box-shadow">
                                                    <label for="transfer_receipt">
                                                        <b><?php echo e(__('skudomodule::warranty.transfer_receipt')); ?>:</b>
                                                    </label>
                                                    <?php if($warranty->transfer_receipt): ?>
                                                        <div class="mb-2">
                                                            <a href="<?php echo e(asset('images/warranty/' . $warranty->transfer_receipt)); ?>" 
                                                               target="_blank" class="btn btn-sm btn-info">
                                                                <i class="flaticon-eye"></i> عرض الملف
                                                            </a>
                                                        </div>
                                                    <?php endif; ?>
                                                    <input type="file" name="transfer_receipt" id="transfer_receipt" 
                                                           class="form-control" accept=".pdf,.jpg,.jpeg,.png">
                                                    <small class="text-muted">PDF أو صورة (JPG, PNG)</small>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="row mt-3">
                                            <div class="col-12">
                                                <button class="btn btn-gradient-danger mb-4"
                                                        type="submit"><?php echo e(__('productmodule::category.save')); ?></button>
                                            </div>
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

                                <div class="col-lg-12">
                                    <?php if($warranty->broken_device_image): ?>
                                        <label> صورة الجهاز المكسور</label>
                                        <div
                                                class="custom-file-container__image-preview product-list-img">
                                            <?php if(is_video($warranty->broken_device_image)): ?>
                                                <video controls>
                                                    <source
                                                            src="<?php echo e(asset('images/warranty/'.$warranty->broken_device_image)); ?>"
                                                            type="video/mp4">
                                                    <source
                                                            src="<?php echo e(asset('images/warranty/'.$warranty->broken_device_image)); ?>"
                                                            type="video/quicktime">
                                                    Your browser does not support the video
                                                    tag.
                                                </video>
                                            <?php else: ?>
                                                <img
                                                        src="<?php echo e(asset('images/warranty/'.$warranty->broken_device_image)); ?>"/>
                                            <?php endif; ?>
                                        </div>
                                    <?php endif; ?>
                                </div>


                                <div class="col-lg-4">
                                    <?php if($warranty->insurance->front_image): ?>
                                        <label> صورة الجهاز من الامام بعد التركيب</label>
                                        <div
                                            class="custom-file-container__image-preview product-list-img">
                                            <?php if(is_video($warranty->insurance->front_image)): ?>
                                                <video controls>
                                                    <source
                                                        src="<?php echo e(asset('images/warranty/'.$warranty->insurance->front_image)); ?>"
                                                        type="video/mp4">
                                                    <source
                                                        src="<?php echo e(asset('images/warranty/'.$warranty->insurance->front_image)); ?>"
                                                        type="video/quicktime">
                                                    Your browser does not support the video
                                                    tag.
                                                </video>
                                            <?php else: ?>
                                                <img
                                                    src="<?php echo e(asset('images/warranty/'.$warranty->insurance->front_image)); ?>" alt=""/>
                                            <?php endif; ?>
                                        </div>
                                    <?php endif; ?>
                                </div>
                                <div class="col-lg-4">
                                    <?php if($warranty->insurance->back_image): ?>
                                        <label> صورة الرقم التسلسلي الموجود على المنتج (البكج)</label>
                                        <div
                                            class="custom-file-container__image-preview product-list-img">
                                            <?php if(is_video($warranty->insurance->back_image)): ?>
                                                <video controls>
                                                    <source
                                                        src="<?php echo e(asset('images/warranty/'.$warranty->insurance->back_image)); ?>"
                                                        type="video/mp4">
                                                    <source
                                                        src="<?php echo e(asset('images/warranty/'.$warranty->insurance->back_image)); ?>"
                                                        type="video/quicktime">
                                                    Your browser does not support the video
                                                    tag.
                                                </video>
                                            <?php else: ?>
                                                <img
                                                    src="<?php echo e(asset('images/warranty/'.$warranty->insurance->back_image)); ?>"/>
                                            <?php endif; ?>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <!-- قسم البيانات البنكية -->
                            <div class="row mt-5">
                                <div class="col-md-12 text-center">
                                    <h2 class="legend"><?php echo e(__('skudomodule::warranty.bank_info')); ?>

                                        <i class="flaticon-credit-card"></i>
                                    </h2>
                                </div>

                                <div class="col-lg-3">
                                    <div class="statbox widget box box-shadow">
                                        <label for="bank_name">
                                            <b><?php echo e(__('skudomodule::warranty.bank_name')); ?>:</b>
                                        </label>
                                        <input type="text" readonly id="bank_name"
                                               class="form-control"
                                               value="<?php echo e($warranty->bank_name ?? ''); ?>">
                                    </div>
                                </div>

                                <div class="col-lg-3">
                                    <div class="statbox widget box box-shadow">
                                        <label for="account_holder_name">
                                            <b><?php echo e(__('skudomodule::warranty.account_holder_name')); ?>:</b>
                                        </label>
                                        <input type="text" readonly id="account_holder_name"
                                               class="form-control"
                                               value="<?php echo e($warranty->account_holder_name ?? ''); ?>">
                                    </div>
                                </div>

                                <div class="col-lg-3">
                                    <div class="statbox widget box box-shadow">
                                        <label for="bank_account_number">
                                            <b><?php echo e(__('skudomodule::warranty.bank_account_number')); ?>:</b>
                                        </label>
                                        <input type="text" readonly id="bank_account_number"
                                               class="form-control"
                                               value="<?php echo e($warranty->bank_account_number ?? ''); ?>">
                                    </div>
                                </div>

                                <div class="col-lg-3">
                                    <div class="statbox widget box box-shadow">
                                        <label for="iban_number">
                                            <b><?php echo e(__('skudomodule::warranty.iban_number')); ?>:</b>
                                        </label>
                                        <input type="text" readonly id="iban_number"
                                               class="form-control"
                                               value="<?php echo e($warranty->iban_number ?? ''); ?>">
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>

    <script src="<?php echo e(asset('assets/admin/js/design-js/design.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/admin/js/forms/form_validation/form_validation_material.js')); ?>"></script>

    <script>
        const is_applicable = '.is_applicable-switch';

        $(is_applicable).change(function () {

            if (!$(this).is(':checked')) {
                return true;
            }

            const checkedVal = parseInt($(this).val());

            if (checkedVal === 1) {
                $('#value-cont').show();
                $('#store-reason-cont').hide()
                $('#reason-cont').hide();
                $('#transfer-cont').show(); // إظهار قسم التحويل عند الضمان المطبق
            } else if (checkedVal === 0) {
                $('#value-cont').hide();
                $('#store-reason-cont').hide()
                $('#reason-cont').show()
                $('#transfer-cont').hide(); // إخفاء قسم التحويل عند عدم تطبيق الضمان
            } else  {
                $('#value-cont').hide();
                $('#reason-cont').hide()
                $('#store-reason-cont').show()
                $('#transfer-cont').hide(); // إخفاء قسم التحويل عند الحالة الجديدة
            }
            $('.status-tab:visible input, .status-tab:visible textarea').each((i, item) => {
                $(item).data('validate-func', 'required');
            });

            $('.status-tab:hidden input, .status-tab:hidden textarea').each((i, item) => {
                $(item).data('validate-func', '');
            });
        })
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('commonmodule::layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\freelancing\أجمل الهواتف\real_web_app\Modules/SkudoModule\Resources/views/admin/warranty/edit.blade.php ENDPATH**/ ?>