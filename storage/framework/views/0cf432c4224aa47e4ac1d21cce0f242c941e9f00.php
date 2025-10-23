<?php $__env->startSection('title'); ?>
    <?php echo e(__('commonmodule::front.warranty')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('css'); ?>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet"/>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/0.8.2/css/flag-icon.min.css" rel="stylesheet"/>
    <link rel="stylesheet" href="<?php echo e(asset('assets/admin/plugins/file-upload/file-upload-with-preview.css')); ?>"
          type="text/css">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>


    <?php echo $__env->make('fronthomemodule::content.breadCrumbs',['pages'=>[__('commonmodule::front.warranty')]], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!-- main-container -->

    <div class="main-container col2-right-layout warranty-create-div">
        <div class="main container">
            <div class="row">
                <section class="col-md-12">
                    <div class="my-account">
                        <div class="page-title title">
                            <h2><?php echo e(__('skudomodule::insurance.insurance')); ?></h2>
                        </div>
                        
                        <?php if(!auth()->check()): ?>
                            <div class="alert alert-info">
                                <strong><?php echo e(__('skudomodule::insurance.guest_notice')); ?></strong>
                                <p><?php echo e(__('skudomodule::insurance.guest_notice_text')); ?></p>
                            </div>
                        <?php endif; ?>
                        
                        <form id="insurance-form"
                              action="<?php echo e(route('front.skudo.insurance.store')); ?>" class="form"
                              method="post" enctype="multipart/form-data">
                            <?php echo csrf_field(); ?>

                            <div class="fieldset">
                                <h2 class="legend"><?php echo e(__('skudomodule::warranty.main_info')); ?> <i
                                        class="glyphicon glyphicon-file"></i></h2>

                                <div class="row">
                                    <div class="col-md-9">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <?php if($inputs->contains('key', 'user_name')): ?>
                                                    <div class="form-group">
                                                        <?php echo $__env->make("warrantymodule::front.includes.input", ['input' => $inputs->where('key', 'user_name')->first(), 'localeFile' => 'insurance'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                                    </div>
                                                <?php endif; ?>
                                            </div>
                                            <div class="col-md-6">
                                                <?php if($inputs->contains('key', 'phone_code_id')): ?>
                                                    <div class="form-group">
                                                        <?php echo $__env->make("warrantymodule::front.includes.input", ['input' => $inputs->where('key', 'phone_code_id')->first(), 'localeFile' => 'insurance'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                                    </div>
                                                <?php endif; ?>
                                            </div>
                                            <div class="col-md-6">
                                                <?php if($inputs->contains('key', 'phone')): ?>
                                                    <div class="form-group">
                                                        <?php echo $__env->make("warrantymodule::front.includes.input", ['input' => $inputs->where('key', 'phone')->first(), 'localeFile' => 'insurance'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                                    </div>
                                                <?php endif; ?>
                                            </div>
                                        </div>

                                        
                                    </div>
                                    <!-- Notes column removed as requested -->
                                </div>

                                <div class="row mt-3">
                                    <div class="col-md-12">
                                            <h2 class="legend">بيانات المنتج <i
                                                    class="glyphicon glyphicon-file"></i></h2>
                                    </div>
                                    <?php
                                        $deviceSerialKeys = ['device_serial', 'serial_number', 'imei', 'imei_number'];
                                        $packageSerialKeys = ['package_serial', 'box_serial', 'product_serial'];
                                        $firstDeviceKey = collect($deviceSerialKeys)->first(fn($k) => $inputs->contains('key', $k));
                                        $firstPackageKey = collect($packageSerialKeys)->first(fn($k) => $inputs->contains('key', $k));
                                    ?>
                                    <div class="col-md-6">
                                        <?php if(isset($firstDeviceKey)): ?>
                                            <div class="form-group">
                                                <?php echo $__env->make("warrantymodule::front.includes.input", ['input' => $inputs->where('key', $firstDeviceKey)->first(), 'localeFile' => 'insurance'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                            </div>
                                        <?php else: ?>
                                            <div class="form-group">
                                                <label for="device_serial" class="required">الرقم التسلسلي للجهاز</label>
                                                <input type="text" name="device_serial" id="device_serial" class="form-control" maxlength="100" placeholder="الرقم التسلسلي للجهاز">
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                    <div class="col-md-6">
                                        <?php if(isset($firstPackageKey)): ?>
                                            <div class="form-group">
                                                <?php echo $__env->make("warrantymodule::front.includes.input", ['input' => $inputs->where('key', $firstPackageKey)->first(), 'localeFile' => 'insurance'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                            </div>
                                        <?php else: ?>
                                            <div class="form-group">
                                                <label for="package_serial" class="required">الرقم التسلسلي للمنتج (البكج)</label>
                                                <input type="text" name="package_serial" id="package_serial" class="form-control" maxlength="100" placeholder="الرقم التسلسلي للمنتج (البكج)">
                                            </div>
                                        <?php endif; ?>
                                    </div>

                                    <?php if($inputs->contains('key', 'usage_date')): ?>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <?php echo $__env->make("warrantymodule::front.includes.input", ['input' => $inputs->where('key', 'usage_date')->first(), 'localeFile' => 'insurance'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                            </div>
                                        </div>
                                    <?php endif; ?>
                                    <div class="col-md-12">
                                        <div class="form-group-header">
                                            <h3><?php echo e(__('usermodule::admin.attachment')); ?> <i
                                                    class="glyphicon glyphicon-picture"></i></h3>
                                        </div>
                                    </div>

                                    <?php
                                        $fileInputs = $inputs->where('properties.type', 'file');
                                        $hasFront = $fileInputs->contains('key', 'front_image');
                                        $hasBack = $fileInputs->contains('key', 'back_image');
                                    ?>

                                    
                                    <?php if($hasFront): ?>
                                        <?php $input = $fileInputs->where('key', 'front_image')->first(); ?>
                                        <div class="col-md-4 custom-file-container" data-upload-id="front_image">
                                            <label for="front_image" class="required">صورة الجهاز من الأمام بعد التركيب <?php if($input->value_en): ?><em class="required">*</em><?php endif; ?></label>
                                            <label> <a href="javascript:void(0)" class="custom-file-container__image-clear" title="Clear Image"></a></label>
                                            <label class="custom-file-container__custom-file">
                                                <input type="file" name="front_image" id="front_image" class="custom-file-container__custom-file__custom-file-input" accept="image/*,video/*">
                                                <span class="custom-file-container__custom-file__custom-file-control"></span>
                                            </label>
                                            <div class="custom-file-container__image-preview" style="min-height: 180px; background-position: center; background-repeat: no-repeat; background-size: contain; background-color: #f7f7f7; border: 1px dashed #ddd;"></div>
                                        </div>
                                    <?php else: ?>
                                        <div class="col-md-4 custom-file-container" data-upload-id="front_image">
                                            <label for="front_image" class="required">صورة الجهاز من الأمام بعد التركيب</label>
                                            <label> <a href="javascript:void(0)" class="custom-file-container__image-clear" title="Clear Image"></a></label>
                                            <label class="custom-file-container__custom-file">
                                                <input type="file" name="front_image" id="front_image" class="custom-file-container__custom-file__custom-file-input" accept="image/*,video/*">
                                                <span class="custom-file-container__custom-file__custom-file-control"></span>
                                            </label>
                                            <div class="custom-file-container__image-preview" style="min-height: 180px; background-position: center; background-repeat: no-repeat; background-size: contain; background-color: #f7f7f7; border: 1px dashed #ddd;"></div>
                                        </div>
                                    <?php endif; ?>

                                    
                                    <?php if($hasBack): ?>
                                        <?php $input = $fileInputs->where('key', 'back_image')->first(); ?>
                                        <div class="col-md-4 custom-file-container" data-upload-id="back_image">
                                            <label for="back_image" class="required">صورة الرقم التسلسلي الموجود على المنتج (لبكج) <?php if($input->value_en): ?><em class="required">*</em><?php endif; ?></label>
                                            <label> <a href="javascript:void(0)" class="custom-file-container__image-clear" title="Clear Image"></a></label>
                                            <label class="custom-file-container__custom-file">
                                                <input type="file" name="back_image" id="back_image" class="custom-file-container__custom-file__custom-file-input" accept="image/*">
                                                <span class="custom-file-container__custom-file__custom-file-control"></span>
                                            </label>
                                            <div class="custom-file-container__image-preview"></div>
                                        </div>
                                    <?php else: ?>
                                        <div class="col-md-4 custom-file-container" data-upload-id="back_image">
                                            <label for="back_image" class="required">صورة الرقم التسلسلي الموجود على المنتج (لبكج)</label>
                                            <label> <a href="javascript:void(0)" class="custom-file-container__image-clear" title="Clear Image"></a></label>
                                            <label class="custom-file-container__custom-file">
                                                <input type="file" name="back_image" id="back_image" class="custom-file-container__custom-file__custom-file-input" accept="image/*">
                                                <span class="custom-file-container__custom-file__custom-file-control"></span>
                                            </label>
                                            <div class="custom-file-container__image-preview"></div>
                                        </div>
                                    <?php endif; ?>

                                    
                                    <?php $__currentLoopData = $fileInputs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $fi): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php if(!in_array($fi->key, ['front_image','back_image'])): ?>
                                            <?php if(stripos($fi->key, 'qr') !== false): ?>
                                                <?php continue; ?>
                                            <?php endif; ?>
                                            <?php if($fi->key === 'warranty_image'): ?>
                                                <?php continue; ?>
                                            <?php endif; ?>
                                            <div class="col-md-4 custom-file-container" data-upload-id="<?php echo e($fi->key); ?>">
                                                <label for="<?php echo e($fi->key); ?>" class="required"><?php echo e(__('skudomodule::insurance.'.$fi->key)); ?> <?php if($fi->value_en): ?><em class="required">*</em><?php endif; ?></label>
                                                <label> <a href="javascript:void(0)" class="custom-file-container__image-clear" title="Clear Image"></a></label>
                                                <label class="custom-file-container__custom-file">
                                                    <input type="file" name="<?php echo e($fi->key); ?>" id="<?php echo e($fi->key); ?>" class="custom-file-container__custom-file__custom-file-input" accept="image/*,video/*">
                                                    <span class="custom-file-container__custom-file__custom-file-control"></span>
                                                </label>
                                                <div class="custom-file-container__image-preview"></div>
                                            </div>
                                        <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>

                            </div>

                            <div class="row">
                                <div class="col-12 accept_terms">
                                    <input type="checkbox" name="terms" title="terms & conditions"
                                           id="terms" checked required>
                                    <label for="terms" style="display: inline-block">
                                        <?php echo e(__('usermodule::login.accept')); ?>

                                        <a href="<?php echo e(url('config/'.$site_data->where('key', 'insurance')->first()->id ?? '2')); ?>"
                                           target="_blank"><?php echo e(__('usermodule::login.terms_conditions')); ?></a>
                                    </label>
                                </div>
                            </div>

                            <div class="buttons-set">
                                <button type="submit" title="Save" class="button send">
                                    <span><span><?php echo e(__('usermodule::login.save')); ?></span></span></button>
                            </div>
                        </form>
                    </div>
                </section>

            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
    <script src="<?php echo e(asset('assets/admin/plugins/file-upload/file-upload-with-preview.js')); ?>"></script>

    <script>
        <?php $__currentLoopData = $fileInputs->filter(function($fi){ return stripos($fi->key, 'qr') === false && $fi->key !== 'warranty_image'; }); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $input): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        new FileUploadWithPreview('<?php echo e($input->key); ?>')
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        // Ensure back_image is initialized explicitly (in case it was filtered/missed)
        try { new FileUploadWithPreview('back_image'); } catch (e) {}
    </script>

    <?php echo $__env->make('usermodule::front.auth.phone_code_scripts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <script>
        const warranty_form = document.querySelector('#insurance-form');
        const submitter = $(warranty_form).find('[type="submit"]');
        $(warranty_form).on('submit', (e) => {
            e.preventDefault();
            submitter.prop('disabled', true);
            let oldText = submitter.text();
            submitter.text('....');
            let form = warranty_form;
            let formData = new FormData(form);
            let url = $(form).attr('action');

            $.ajax({
                'type': 'post',
                'url': url,
                data: formData,
                processData: false,
                contentType: false,
                'statusCode': {
                    200: function (response) {
                        if (response.code === 201) {
                            toastr["error"](response.message);
                            submitter.text(oldText);
                            submitter.prop('disabled', false);
                        } else {
                            toastr["success"](response.message);

                            setTimeout(function () {
                                window.location = "<?php echo e(route('front.skudo.insurance.index')); ?>";
                            }, 3000);
                        }
                    },
                    422: function (response) {
                        $.map(response.responseJSON.errors, function (error) {
                            toastr["error"](error)
                        });
                        submitter.text(oldText);
                        submitter.prop('disabled', false);
                    }
                },
            });
        })
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('fronthomemodule::layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\freelancing\أجمل الهواتف\real_web_app\Modules/SkudoModule\Resources/views/front/insurance/create.blade.php ENDPATH**/ ?>