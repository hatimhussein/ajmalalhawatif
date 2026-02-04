<?php $__env->startSection('title'); ?>
    <?php echo e(__('skudomodule::insurance.page_title')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('css'); ?>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet"/>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/0.8.2/css/flag-icon.min.css" rel="stylesheet"/>
    <link rel="stylesheet" href="<?php echo e(asset('assets/admin/plugins/file-upload/file-upload-with-preview.css')); ?>"
          type="text/css">
    <style>
        /* تنسيق زر البحث عن الرقم التسلسلي */
        #search_serial_btn {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border: none;
            color: white;
            padding: 10px 20px;
            transition: all 0.3s ease;
            box-shadow: 0 2px 8px rgba(102, 126, 234, 0.3);
            white-space: nowrap;
            height: 100%;
        }
        
        #search_serial_btn:hover {
            background: linear-gradient(135deg, #5a67d8 0%, #6a3f92 100%);
            box-shadow: 0 4px 12px rgba(102, 126, 234, 0.5);
            transform: translateY(-1px);
        }
        
        #search_serial_btn:active {
            transform: translateY(0);
            box-shadow: 0 2px 6px rgba(102, 126, 234, 0.4);
        }
        
        #search_serial_btn:disabled {
            background: linear-gradient(135deg, #9ca3af 0%, #6b7280 100%);
            cursor: not-allowed;
            opacity: 0.7;
        }
        
        .input-group #package_serial:focus {
            box-shadow: none;
            border-color: #667eea;
        }
        
        /* تنسيق مجموعة الإدخال للرقم التسلسلي */
        #package_serial_group {
            width: 95%;
            display: flex;
        }

        /* Mobile: keep same phone layout as warranty (code left, number right) */
    </style>
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
                        
                        <!-- <?php if(!auth()->check()): ?>
                            <div class="alert alert-info">
                                <strong><?php echo e(__('skudomodule::insurance.guest_notice')); ?></strong>
                                <p><?php echo e(__('skudomodule::insurance.guest_notice_text')); ?></p>
                            </div>
                        <?php endif; ?> -->
                        
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
                                            <div class="col-md-8">
                                                <?php if($inputs->contains('key', 'phone')): ?>
                                                    <div class="form-group">
                                                        <?php echo $__env->make("skudomodule::front.includes.input", ['input' => $inputs->where('key', 'phone')->first(), 'localeFile' => 'insurance'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
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
                                        <?php if(isset($firstPackageKey)): ?>
                                            <div class="form-group">
                                                <?php echo $__env->make("warrantymodule::front.includes.input", ['input' => $inputs->where('key', $firstPackageKey)->first(), 'localeFile' => 'insurance'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                            </div>
                                        <?php else: ?>
                                            <div class="form-group">
                                                <label for="package_serial" class="required">الرقم التسلسلي للمنتج (البكج)</label>
                                                <small class="help-block" style="font-size: 11px; font-weight: bold; color: black;">أدخل الرقم التسلسلي ثم اضغط على "تحقق من الرقم" للتأكد من صحته</small>
                                                <div class="input-group" id="package_serial_group" style="direction: rtl;">
                                                    <input type="text" name="package_serial" id="package_serial" class="form-control" maxlength="100" placeholder="الرقم التسلسلي للمنتج (البكج)"
                                                           style="border-top-left-radius: 0; border-bottom-left-radius: 0; border-left: 0;">
                                                    <div class="input-group-append">
                                                        <button type="button" id="search_serial_btn" class="btn btn-primary" 
                                                                style="border-top-left-radius: 4px; border-bottom-left-radius: 4px; border-top-right-radius: 0; border-bottom-right-radius: 0; white-space: nowrap; padding: 0.375rem 1rem;">
                                                            تحقق من الرقم
                                                        </button>
                                                    </div>
                                                </div>
                                                <div class="mt-2">
                                                    <button type="button" id="scan_serial_btn" class="btn btn-dark w-100"
                                                            style="white-space: nowrap;">
                                                        <i class="glyphicon glyphicon-camera" style="margin-left: 6px;"></i>
                                                        <?php echo e(__('skudomodule::insurance.scan_serial')); ?>

                                                    </button>
                                                </div>
                                                <div id="package_serial_info" class="mt-2" style="display: none;">
                                                    <div class="alert alert-success" style="border-radius: 8px; border-left: 4px solid #28a745;">
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <div class="d-flex align-items-center mb-2">
                                                                    <i class="glyphicon glyphicon-tag" style="margin-left: 8px; color: #28a745;"></i>
                                                                    <strong style="margin-left: 5px;">اسم المنتج:</strong>
                                                                </div>
                                                                <span id="product_name_ar" class="text-primary" style="font-weight: bold;"></span>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <div class="d-flex align-items-center mb-2">
                                                                    <i class="glyphicon glyphicon-barcode" style="margin-left: 8px; color: #28a745;"></i>
                                                                    <strong style="margin-left: 5px;">الباركود:</strong>
                                                                </div>
                                                                <span id="barcode" class="text-primary" style="font-weight: bold;"></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                                <div id="package_serial_error" class="mt-2" style="display: none;">
                                                    <div class="alert alert-danger" style="border-radius: 8px; border-left: 4px solid #dc3545;">
                                                        <div class="d-flex align-items-center">
                                                            <i class="glyphicon glyphicon-warning-sign" style="margin-left: 8px; color: #dc3545; font-size: 18px;"></i>
                                                            <span id="error_message" class="text-danger" style="font-weight: bold;"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endif; ?>
                                    </div>

                                    <div class="col-md-6">
                                        <?php if(isset($firstDeviceKey)): ?>
                                            <div class="form-group">
                                                <?php echo $__env->make("warrantymodule::front.includes.input", ['input' => $inputs->where('key', $firstDeviceKey)->first(), 'localeFile' => 'insurance'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                            </div>
                                        <?php else: ?>
                                            <div class="form-group">
                                                <label for="device_serial" class="required">الرقم التسلسلي للجهاز</label>
                                                <small class="help-block" style="font-size: 11px; font-weight: bold; color: black;">الرقم التسلسلي للجهاز من خلال النقر على: <strong>#06#*</strong> ثم اتصال</small>

                                                <input type="text" name="device_serial" id="device_serial" class="form-control" maxlength="100" placeholder="الرقم التسلسلي للجهاز">
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
                                        $hasDeviceBack = $fileInputs->contains('key', 'device_back_image');
                                        $hasBack = $fileInputs->contains('key', 'back_image');
                                    ?>

                                    
                                    <?php if($hasFront): ?>
                                        <?php $input = $fileInputs->where('key', 'front_image')->first(); ?>
                                        <div class="col-md-3 custom-file-container" data-upload-id="front_image">
                                            <label for="front_image" class="required"> صورة الجهاز من الأمام بعد التركيب (تُظهر الرقم التسلسلي) <?php if($input->value_en): ?><em class="required">*</em><?php endif; ?></label>
                                            <label> <a href="javascript:void(0)" class="custom-file-container__image-clear" title="Clear Image"></a></label>
                                            <label class="custom-file-container__custom-file">
                                                <input type="file" name="front_image" id="front_image" class="custom-file-container__custom-file__custom-file-input" accept="image/*,video/*">
                                                <span class="custom-file-container__custom-file__custom-file-control"></span>
                                            </label>
                                            <div class="custom-file-container__image-preview" style="min-height: 180px; background-position: center; background-repeat: no-repeat; background-size: contain; background-color: #f7f7f7; border: 1px dashed #ddd;"></div>
                                        </div>
                                    <?php else: ?>
                                        <div class="col-md-3 custom-file-container" data-upload-id="front_image">
                                            <label for="front_image" class="required">  صورة الجهاز من الأمام بعد التركيب (تُظهر الرقم التسلسلي)</label>
                                            <label> <a href="javascript:void(0)" class="custom-file-container__image-clear" title="Clear Image"></a></label>
                                            <label class="custom-file-container__custom-file">
                                                <input type="file" name="front_image" id="front_image" class="custom-file-container__custom-file__custom-file-input" accept="image/*,video/*">
                                                <span class="custom-file-container__custom-file__custom-file-control"></span>
                                            </label>
                                            <div class="custom-file-container__image-preview" style="min-height: 180px; background-position: center; background-repeat: no-repeat; background-size: contain; background-color: #f7f7f7; border: 1px dashed #ddd;"></div>
                                        </div>
                                    <?php endif; ?>

                                    
                                    <?php if($hasDeviceBack): ?>
                                        <?php $input = $fileInputs->where('key', 'device_back_image')->first(); ?>
                                        <div class="col-md-3 custom-file-container" data-upload-id="device_back_image">
                                            <label for="device_back_image" class="required"><?php echo e(__('skudomodule::insurance.device_back_image')); ?> <?php if($input->value_en): ?><em class="required">*</em><?php endif; ?></label>
                                            <label> <a href="javascript:void(0)" class="custom-file-container__image-clear" title="Clear Image"></a></label>
                                            <label class="custom-file-container__custom-file">
                                                <input type="file" name="device_back_image" id="device_back_image" class="custom-file-container__custom-file__custom-file-input" accept="image/*,video/*">
                                                <span class="custom-file-container__custom-file__custom-file-control"></span>
                                            </label>
                                            <div class="custom-file-container__image-preview"></div>
                                        </div>
                                    <?php else: ?>
                                        <div class="col-md-3 custom-file-container" data-upload-id="device_back_image">
                                            <label for="device_back_image" class="required"><?php echo e(__('skudomodule::insurance.device_back_image')); ?></label>
                                            <label> <a href="javascript:void(0)" class="custom-file-container__image-clear" title="Clear Image"></a></label>
                                            <label class="custom-file-container__custom-file">
                                                <input type="file" name="device_back_image" id="device_back_image" class="custom-file-container__custom-file__custom-file-input" accept="image/*,video/*">
                                                <span class="custom-file-container__custom-file__custom-file-control"></span>
                                            </label>
                                            <div class="custom-file-container__image-preview"></div>
                                        </div>
                                    <?php endif; ?>

                                    
                                    <?php if($hasBack): ?>
                                        <?php $input = $fileInputs->where('key', 'back_image')->first(); ?>
                                        <div class="col-md-3 custom-file-container" data-upload-id="back_image">
                                            <label for="back_image" class="required">صورة الرقم التسلسلي الموجود على المنتج (لبكج) <?php if($input->value_en): ?><em class="required">*</em><?php endif; ?></label>
                                            <label> <a href="javascript:void(0)" class="custom-file-container__image-clear" title="Clear Image"></a></label>
                                            <label class="custom-file-container__custom-file">
                                                <input type="file" name="back_image" id="back_image" class="custom-file-container__custom-file__custom-file-input" accept="image/*">
                                                <span class="custom-file-container__custom-file__custom-file-control"></span>
                                            </label>
                                            <div class="custom-file-container__image-preview"></div>
                                        </div>
                                    <?php else: ?>
                                        <div class="col-md-3 custom-file-container" data-upload-id="back_image">
                                            <label for="back_image" class="required">صورة الرقم التسلسلي الموجود على المنتج (لبكج)</label>
                                            <label> <a href="javascript:void(0)" class="custom-file-container__image-clear" title="Clear Image"></a></label>
                                            <label class="custom-file-container__custom-file">
                                                <input type="file" name="back_image" id="back_image" class="custom-file-container__custom-file__custom-file-input" accept="image/*">
                                                <span class="custom-file-container__custom-file__custom-file-control"></span>
                                            </label>
                                            <div class="custom-file-container__image-preview"></div>
                                        </div>
                                    <?php endif; ?>

                                    
                                    <div class="col-md-3 custom-file-container" data-upload-id="invoice_image">
                                        <label for="invoice_image" class="required">صورة الفاتورة</label>
                                        <label> <a href="javascript:void(0)" class="custom-file-container__image-clear" title="Clear Image"></a></label>
                                        <label class="custom-file-container__custom-file">
                                            <input type="file" name="invoice_image" id="invoice_image" class="custom-file-container__custom-file__custom-file-input" accept="image/*">
                                            <span class="custom-file-container__custom-file__custom-file-control"></span>
                                        </label>
                                        <div class="custom-file-container__image-preview"></div>
                                    </div>

                                    
                                    <?php $__currentLoopData = $fileInputs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $fi): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php if(!in_array($fi->key, ['front_image','device_back_image','back_image','invoice_image'])): ?>
                                            <?php if(stripos($fi->key, 'qr') !== false): ?>
                                                <?php continue; ?>
                                            <?php endif; ?>
                                            <?php if($fi->key === 'warranty_image'): ?>
                                                <?php continue; ?>
                                            <?php endif; ?>
                                            <div class="col-md-3 custom-file-container" data-upload-id="<?php echo e($fi->key); ?>">
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

                        
                        <div class="modal fade" id="barcodeScannerModal" tabindex="-1" role="dialog" aria-labelledby="barcodeScannerModalTitle" aria-hidden="true">
                            <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="barcodeScannerModalTitle"><?php echo e(__('skudomodule::insurance.scanner_title')); ?></h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <p class="text-muted mb-2"><?php echo e(__('skudomodule::insurance.scanner_hint')); ?></p>
                                        <div id="barcodeScannerStatus" class="small text-muted mb-2"><?php echo e(__('skudomodule::insurance.scanner_starting')); ?></div>
                                        <div id="barcodeScannerReader" style="width: 100%; max-width: 640px; margin: 0 auto;"></div>
                                        <div id="barcodeScannerError" class="alert alert-danger mt-3" style="display:none;"></div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo e(__('skudomodule::insurance.scanner_close')); ?></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
    <script src="<?php echo e(asset('assets/admin/plugins/file-upload/file-upload-with-preview.js')); ?>"></script>
    <script src="https://unpkg.com/html5-qrcode@2.3.10/html5-qrcode.min.js"></script>

    <script>
        // تهيئة front_image و back_image و invoice_image أولاً (يتم عرضهم يدوياً في القالب)
        new FileUploadWithPreview('front_image');
        new FileUploadWithPreview('device_back_image');
        new FileUploadWithPreview('back_image');
        new FileUploadWithPreview('invoice_image');
        
        // ثم تهيئة بقية الحقول (ما عدا front/back/invoice لأنهم تم تهيئتهم بالفعل)
        <?php $__currentLoopData = $fileInputs->filter(function($fi){ 
            return stripos($fi->key, 'qr') === false 
                && $fi->key !== 'warranty_image' 
                && !in_array($fi->key, ['front_image', 'device_back_image', 'back_image', 'invoice_image']); 
        }); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $input): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        new FileUploadWithPreview('<?php echo e($input->key); ?>');
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </script>

    <?php echo $__env->make('usermodule::front.auth.phone_code_scripts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <script>
        const warranty_form = document.querySelector('#insurance-form');
        const submitter = $(warranty_form).find('[type="submit"]');
        $(warranty_form).on('submit', (e) => {
            e.preventDefault();
            
            // التحقق من أن الرقم التسلسلي غير مستخدم
            const packageSerial = $('#package_serial').val().trim();
            if (packageSerial && $('#package_serial_error').is(':visible')) {
                toastr["error"]("لا يمكن إرسال النموذج لأن الرقم التسلسلي مستخدم مسبقاً");
                return;
            }
            
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

        // البحث عند النقر على زر البحث
        let isSearching = false;

        // Barcode scanner
        let _html5QrCode = null;
        let _scannerRunning = false;

        function _scannerSetError(msg) {
            if (msg) {
                $('#barcodeScannerError').text(msg).show();
            } else {
                $('#barcodeScannerError').hide().text('');
            }
        }

        async function startBarcodeScanner() {
            _scannerSetError('');
            $('#barcodeScannerStatus').text('<?php echo e(__('skudomodule::insurance.scanner_starting')); ?>');

            // Camera APIs require secure context (HTTPS) except localhost
            const host = (window.location && window.location.hostname) ? window.location.hostname : '';
            const isLocalhost = (host === 'localhost' || host === '127.0.0.1' || host === '[::1]');
            if (!window.isSecureContext && !isLocalhost) {
                _scannerSetError('<?php echo e(__('skudomodule::insurance.scanner_https_required')); ?>');
                return;
            }

            if (typeof Html5Qrcode === 'undefined') {
                _scannerSetError('<?php echo e(__('skudomodule::insurance.scanner_not_supported')); ?>');
                return;
            }

            try {
                if (!_html5QrCode) {
                    _html5QrCode = new Html5Qrcode('barcodeScannerReader');
                }

                if (_scannerRunning) return;

                const config = {
                    fps: 10,
                    qrbox: { width: 300, height: 200 },
                    // supports EAN/Code128/etc (not only QR)
                    formatsToSupport: [
                        Html5QrcodeSupportedFormats.EAN_13,
                        Html5QrcodeSupportedFormats.EAN_8,
                        Html5QrcodeSupportedFormats.CODE_128,
                        Html5QrcodeSupportedFormats.CODE_39,
                        Html5QrcodeSupportedFormats.UPC_A,
                        Html5QrcodeSupportedFormats.UPC_E,
                        Html5QrcodeSupportedFormats.QR_CODE
                    ]
                };

                _scannerRunning = true;

                const onDecoded = (decodedText) => {
                    const val = (decodedText || '').trim();
                    if (!val) return;

                    $('#package_serial').val(val).trigger('input');
                    $('#barcodeScannerModal').modal('hide');
                    // Auto run existing verification
                    setTimeout(() => $('#search_serial_btn').click(), 150);
                };

                // Prefer back camera on mobile
                try {
                    await _html5QrCode.start(
                        { facingMode: "environment" },
                        config,
                        onDecoded,
                        () => {}
                    );
                } catch (e1) {
                    // Fallback to first available camera
                    const devices = await Html5Qrcode.getCameras();
                    const cameraId = devices?.[0]?.id;
                    if (!cameraId) {
                        _scannerRunning = false;
                        _scannerSetError('<?php echo e(__('skudomodule::insurance.scanner_no_camera_found')); ?>');
                        return;
                    }
                    await _html5QrCode.start(
                        cameraId,
                        config,
                        onDecoded,
                        () => {}
                    );
                }

                $('#barcodeScannerStatus').text('');
            } catch (e) {
                _scannerRunning = false;
                const name = (e && e.name) ? e.name : '';
                const msg =
                    (name === 'NotAllowedError' || name === 'PermissionDeniedError')
                        ? '<?php echo e(__('skudomodule::insurance.scanner_permission_denied')); ?>'
                        : (name === 'NotFoundError')
                            ? '<?php echo e(__('skudomodule::insurance.scanner_no_camera_found')); ?>'
                            : (name === 'NotReadableError')
                                ? '<?php echo e(__('skudomodule::insurance.scanner_camera_in_use')); ?>'
                                : (name === 'SecurityError')
                                    ? '<?php echo e(__('skudomodule::insurance.scanner_https_required')); ?>'
                                    : '<?php echo e(__('skudomodule::insurance.scanner_not_supported')); ?>';
                _scannerSetError(msg);
            }
        }

        async function stopBarcodeScanner() {
            try {
                if (_html5QrCode && _scannerRunning) {
                    await _html5QrCode.stop();
                    await _html5QrCode.clear();
                }
            } catch (e) {
                // ignore
            } finally {
                _scannerRunning = false;
                $('#barcodeScannerReader').html('');
            }
        }
        
        // إخفاء الرسائل عند تعديل الحقل
        $('#package_serial').on('input', function() {
            // إخفاء المعلومات السابقة عند تعديل الحقل
            $('#package_serial_info').hide();
            $('#package_serial_error').hide();
            // إزالة الـ serial_number_id عند تعديل الحقل
            $('#serial_number_id').remove();
        });
        
        // البحث عند النقر على الزر
        $('#search_serial_btn').on('click', function() {
            const serialNumber = $('#package_serial').val().trim();
            
            // إخفاء المعلومات السابقة
            $('#package_serial_info').hide();
            $('#package_serial_error').hide();
            $('#loading_indicator').remove();
            
            // التحقق من أن الرقم التسلسلي ليس فارغاً
            if (!serialNumber) {
                $('#error_message').text('يرجى إدخال الرقم التسلسلي أولاً');
                $('#package_serial_error').show();
                return;
            }
            
            // التحقق من الحد الأدنى للطول
            if (serialNumber.length < 3) {
                $('#error_message').text('يرجى إدخال رقم تسلسلي صحيح (3 أحرف على الأقل)');
                $('#package_serial_error').show();
                return;
            }
            
            if (!isSearching) {
                isSearching = true;
                
                // تعطيل الزر وإضافة مؤشر تحميل
                $(this).prop('disabled', true).html('<i class="fa fa-spinner fa-spin"></i> جاري التحقق...');
                
                searchSerialNumber(serialNumber);
            }
        });

        // Open scanner modal
        $('#scan_serial_btn').on('click', async function() {
            $('#barcodeScannerModal').modal('show');
            // IMPORTANT: start camera from the same user gesture (mobile Safari)
            await startBarcodeScanner();
        });

        $('#barcodeScannerModal').on('hidden.bs.modal', function() {
            stopBarcodeScanner();
        });
        
        // السماح بالبحث عند الضغط على Enter في حقل الرقم التسلسلي
        $('#package_serial').on('keypress', function(e) {
            if (e.which === 13) { // Enter key
                e.preventDefault();
                $('#search_serial_btn').click();
            }
        });

        function searchSerialNumber(serialNumber) {
            $.ajax({
                url: '<?php echo e(route("front.skudo.serial-numbers.search")); ?>',
                method: 'GET',
                data: { serial: serialNumber },
                success: function(response) {
                    // إعادة تفعيل الزر وإعادة تعيين flag
                    $('#search_serial_btn').prop('disabled', false).html('تحقق من الرقم');
                    isSearching = false;
                    
                    // إخفاء جميع الرسائل أولاً
                    $('#package_serial_info').hide();
                    $('#package_serial_error').hide();
                    
                    if (response.success && response.data) {
                        // عرض معلومات المنتج
                        $('#product_name_ar').text(response.data.product_name_ar || '-');
                        $('#barcode').text(response.data.barcode || '-');
                        $('#package_serial_info').show();
                        
                        // إضافة hidden input للـ serial_number_id
                        if ($('#serial_number_id').length === 0) {
                            $('#package_serial').after('<input type="hidden" id="serial_number_id" name="serial_number_id" value="' + response.data.serial_number_id + '">');
                        } else {
                            $('#serial_number_id').val(response.data.serial_number_id);
                        }
                        
                        // عرض رسالة نجاح
                        toastr["success"]("تم العثور على الرقم التسلسلي بنجاح");
                    } else {
                        // إذا كان الرقم مستخدم مسبقاً، عرض رسالة خطأ منفصلة
                        if (response.is_used) {
                            $('#error_message').text(response.message);
                            $('#package_serial_error').show();
                            
                            // إزالة hidden input
                            $('#serial_number_id').remove();
                        } else {
                            // إذا لم يتم العثور على الرقم التسلسلي
                            $('#error_message').text('لم يتم العثور على الرقم التسلسلي في قاعدة البيانات');
                            $('#package_serial_error').show();
                            
                            // إزالة hidden input
                            $('#serial_number_id').remove();
                        }
                    }
                },
                error: function() {
                    // إعادة تفعيل الزر وإعادة تعيين flag
                    $('#search_serial_btn').prop('disabled', false).html('تحقق من الرقم');
                    isSearching = false;
                    $('#package_serial_info').hide();
                    $('#package_serial_error').hide();
                    $('#serial_number_id').remove();
                    
                    // عرض رسالة خطأ
                    $('#error_message').text('حدث خطأ أثناء البحث. يرجى المحاولة مرة أخرى');
                    $('#package_serial_error').show();
                }
            });
        }
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('fronthomemodule::layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\freelancing\أجمل الهواتف\real_web_app\Modules/SkudoModule\Resources/views/front/insurance/create.blade.php ENDPATH**/ ?>