<?php $__env->startSection('title'); ?>
    <?php echo e(__('skudomodule::warranty.warranty_card')); ?>

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

    <!-- main-container -->
    <div class="main-container col2-right-layout warranty-create-div">
        <div class="main container">
            <div class="row">
                <section class="col-md-12">
                    <div class="my-account">
                        <div class="page-title title">
                            <h2><?php echo e(__('skudomodule::warranty.warranty_card')); ?></h2>
                        </div>
                        
                        <?php if(!auth()->check()): ?>
                            <div class="alert alert-info">
                                <strong><?php echo e(__('skudomodule::warranty.guest_notice')); ?></strong>
                                <p><?php echo e(__('skudomodule::warranty.guest_notice_text')); ?></p>
                            </div>
                        <?php endif; ?>
                        
                        <?php if($type == 'sms'): ?>
                            <div class="alert alert-success">
                                <strong><?php echo e(__('skudomodule::warranty.registration_number_inquiry')); ?></strong>
                                <p><?php echo e(__('skudomodule::warranty.enter_registration_number')); ?></p>
                                <small class="text-muted"><?php echo e(__('skudomodule::warranty.registration_number_help')); ?></small>
                            </div>
                        <?php endif; ?>
                        
                        <form id="warranty-form"
                              action="<?php echo e(route('front.skudo.warranty.store', ['type' => $type ?? 'card'])); ?>" class="form"
                              enctype="multipart/form-data">
                            <?php echo csrf_field(); ?>

                            <div class="fieldset">
                                <h2 class="legend"><?php echo e(__('skudomodule::warranty.main_info')); ?> <i
                                        class="glyphicon glyphicon-file"></i></h2>

                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <?php if($inputs->contains('key', 'warranty_number')): ?>
                                                    <div class="form-group">
                                                        <?php echo $__env->make("skudomodule::front.includes.input", ['localeFile' => $localeFile, 'input' => $inputs->where('key', 'warranty_number')->first()], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                                    </div>
                                                <?php endif; ?>
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                <?php if($inputs->contains('key', 'user_name')): ?>
                                                    <div class="form-group">
                                                        <?php echo $__env->make("skudomodule::front.includes.input", ['localeFile' => $localeFile, 'input' => $inputs->where('key', 'user_name')->first(), 'disabled' => true], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                                    </div>
                                                <?php endif; ?>
                                                <?php if($inputs->contains('key', 'phone')): ?>
                                                    <div class="form-group">
                                                        <?php echo $__env->make("skudomodule::front.includes.input", ['localeFile' => $localeFile, 'input' => $inputs->where('key', 'phone')->first()], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                                    </div>
                                                <?php endif; ?>
                                            </div>
                                            <div class="col-md-6">
                                                <?php if($inputs->contains('key', 'sent_at')): ?>
                                                    <div class="form-group">
                                                        <?php echo $__env->make("skudomodule::front.includes.input", ['localeFile' => $localeFile, 'input' => $inputs->where('key', 'sent_at')->first(), 'disabled' => true], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                                    </div>
                                                <?php endif; ?>
                                                <?php if($inputs->contains('key', 'usage_date')): ?>
                                                    <div class="form-group">
                                                        <?php echo $__env->make("skudomodule::front.includes.input", ['localeFile' => $localeFile, 'input' => $inputs->where('key', 'usage_date')->first(), 'read_only' => $type == 'sms'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                                    </div>
                                                <?php endif; ?>
                                                <?php if($inputs->contains('key', 'dummy_text_1')): ?>
                                                    <div class="form-group">
                                                        <?php echo $__env->make("skudomodule::front.includes.input", ['localeFile' => $localeFile, 'input' => $inputs->where('key', 'dummy_text_1')->first()], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                                    </div>
                                                <?php endif; ?>
                                                <?php if($inputs->contains('key', 'dummy_text_2')): ?>
                                                    <div class="form-group">
                                                        <?php echo $__env->make("skudomodule::front.includes.input", ['localeFile' => $localeFile, 'input' => $inputs->where('key', 'dummy_text_2')->first()], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                                    </div>
                                                <?php endif; ?>
                                                <?php if($inputs->contains('key', 'dummy_text_3')): ?>
                                                    <div class="form-group">
                                                        <?php echo $__env->make("skudomodule::front.includes.input", ['localeFile' => $localeFile, 'input' => $inputs->where('key', 'dummy_text_3')->first()], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                                    </div>
                                                <?php endif; ?>
                                                <?php if($inputs->contains('key', 'device_serial')): ?>
                                                    <div class="form-group">
                                                        <?php echo $__env->make("skudomodule::front.includes.input", ['localeFile' => $localeFile, 'input' => $inputs->where('key', 'device_serial')->first()], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                                    </div>
                                                <?php endif; ?>
                                                <?php if($inputs->contains('key', 'package_serial')): ?>
                                                    <div class="form-group">
                                                        <?php echo $__env->make("skudomodule::front.includes.input", ['localeFile' => $localeFile, 'input' => $inputs->where('key', 'package_serial')->first()], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                                    </div>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <!-- البيانات البنكية -->
                                        <div class="form-group">
                                            <label for="bank_name" class="required"><?php echo e(__('skudomodule::warranty.bank_name')); ?> <em class="required">*</em></label>
                                            <input type="text" name="bank_name" id="bank_name" 
                                                   class="input-text form-control" 
                                                   placeholder="<?php echo e(__('skudomodule::warranty.bank_name')); ?>" 
                                                   required>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label for="account_holder_name" class="required"><?php echo e(__('skudomodule::warranty.account_holder_name')); ?> <em class="required">*</em></label>
                                            <input type="text" name="account_holder_name" id="account_holder_name" 
                                                   class="input-text form-control" 
                                                   placeholder="<?php echo e(__('skudomodule::warranty.account_holder_name')); ?>" 
                                                   required>
                                            <small class="text-info">
                                                <i class="glyphicon glyphicon-info-sign"></i>
                                                <?php echo e(__('skudomodule::warranty.account_holder_name_note')); ?>

                                            </small>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label for="bank_account_number" class="required"><?php echo e(__('skudomodule::warranty.bank_account_number')); ?> <em class="required">*</em></label>
                                            <input type="text" name="bank_account_number" id="bank_account_number" 
                                                   class="input-text form-control" 
                                                   placeholder="<?php echo e(__('skudomodule::warranty.bank_account_number')); ?>" 
                                                   required>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label for="iban_number" class="required"><?php echo e(__('skudomodule::warranty.iban_number')); ?> <em class="required">*</em></label>
                                            <input type="text" name="iban_number" id="iban_number" 
                                                   class="input-text form-control" 
                                                   placeholder="<?php echo e(__('skudomodule::warranty.iban_number')); ?>" 
                                                   required>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mt-3">
                                    <div class="col-md-12">
                                        <div class="form-group-header">
                                            <h3><?php echo e(__('usermodule::admin.attachment')); ?> <i
                                                    class="glyphicon glyphicon-picture"></i></h3>
                                        </div>
                                    </div>
                                    <?php $__currentLoopData = $inputs->where('properties.type', 'file'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $input): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php if($input->key != 'front_image'): ?>
                                            <div class="col-md-4 custom-file-container" data-upload-id="<?php echo e($input->key); ?>">
                                                <label for="<?php echo e($input->key); ?>"
                                                       class="required"><?php echo e(__('skudomodule::warranty.'.$input->key)); ?>

                                                    <?php if($input->value_en): ?><em class="required">*</em><?php endif; ?>
                                                </label>
                                                <label> <a href="javascript:void(0)"
                                                           class="custom-file-container__image-clear"
                                                           title="Clear Image"></a></label>
                                                <label class="custom-file-container__custom-file">
                                                    <input type="file" name="<?php echo e($input->key); ?>"
                                                           title="<?php echo e(__('skudomodule::warranty.'.$input->key)); ?>"
                                                           id="<?php echo e($input->key); ?>"
                                                           class="custom-file-container__custom-file__custom-file-input"
                                                           accept="image/*,video/*">
                                                    <span
                                                        class="custom-file-container__custom-file__custom-file-control"></span>
                                                </label>
                                                <div class="custom-file-container__image-preview"></div>
                                            </div>
                                        <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    
                                    <!-- مدخل رفع صورة الجهاز المكسور -->
                                    <div class="col-md-4 custom-file-container" data-upload-id="broken_device_image">
                                        <label for="broken_device_image" class="required">
                                            <?php echo e(__('skudomodule::warranty.broken_device_image')); ?> <em class="required">*</em>
                                        </label>
                                        <label> <a href="javascript:void(0)"
                                                   class="custom-file-container__image-clear"
                                                   title="Clear Image"></a></label>
                                        <label class="custom-file-container__custom-file">
                                            <input type="file" name="broken_device_image"
                                                   title="<?php echo e(__('skudomodule::warranty.broken_device_image')); ?>"
                                                   id="broken_device_image"
                                                   class="custom-file-container__custom-file__custom-file-input"
                                                   accept="image/*" required>
                                            <span class="custom-file-container__custom-file__custom-file-control"></span>
                                        </label>
                                        <div class="custom-file-container__image-preview"></div>
                                    </div>

































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
    <!--End main-container -->

<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
    <script src="<?php echo e(asset('assets/admin/plugins/file-upload/file-upload-with-preview.js')); ?>"></script>

    <script>
        <?php $__currentLoopData = $inputs->where('properties.type', 'file'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $input): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        new FileUploadWithPreview('<?php echo e($input->key); ?>')
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        
        // تهيئة مدخل صورة الجهاز المكسور
        new FileUploadWithPreview('broken_device_image')
    </script>

    <!-- <?php echo $__env->make('commonmodule::includes.filePond', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?> -->
    <?php echo $__env->make('usermodule::front.auth.phone_code_scripts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <?php if($type == 'sms'): ?>
        <script type="text/javascript">
            const url = '<?php echo route('skudo.warranty.insurance', 'replaceable'); ?>';
            let isLoading = false;
            let searchTimeout;
            
            $('#warranty_number').on('input', function () {
                const id = $(this).val().trim();
                
                // Clear previous timeout
                if (searchTimeout) {
                    clearTimeout(searchTimeout);
                }
                
                // Clear previous data if input is empty
                if (!id) {
                    fillInsuranceInputs();
                    return;
                }
                
                // Set timeout to search after user stops typing (1000ms delay)
                searchTimeout = setTimeout(() => {
                    performSearch(id);
                }, 1000);
            });

            function performSearch(id) {
                // Prevent multiple requests
                if (isLoading) return;
                
                isLoading = true;
                showLoader();
                
                $.get(url.replace('replaceable', id))
                    .done(response => {
                        const insurance = response.insurance;
                        if (insurance) {
                            fillInsuranceInputs(insurance);
                            hideLoader();
                            // Show success message after loader is hidden
                            setTimeout(() => {
                                toastr["success"]("تم العثور على تسجيل الضمان وتم ملء البيانات بنجاح");
                            }, 350);
                        } else {
                            fillInsuranceInputs();
                            hideLoader();
                            toastr["warning"]("رقم التسجيل غير موجود");
                        }
                    })
                    .fail(response => {
                        fillInsuranceInputs();
                        hideLoader();
                        if (response.status === 404) {
                            toastr["error"]("رقم تسجيل الضمان غير موجود أو مرفوض");
                        } else {
                            toastr["error"]("حدث خطأ في جلب البيانات");
                        }
                    })
                    .always(() => {
                        isLoading = false;
                    });
            }

            function fillInsuranceInputs(insurance = null) {
                $('#user_name').val(insurance?.user_name ?? '');
                $('#phone').val(insurance?.phone ?? '');
                $('[name="phone_code_id"]').val(insurance?.phone_code_id ?? '').change();
                
                // Fill serial numbers
                $('#device_serial').val(insurance?.device_serial ?? '');
                $('#package_serial').val(insurance?.package_serial ?? '');
                
                // Safe date handling
                if (insurance?.created_at) {
                    try {
                        const createdDate = new Date(insurance.created_at);
                        if (!isNaN(createdDate.getTime())) {
                            $('#sent_at').val(createdDate.toISOString().substring(0, 10));
                        } else {
                            $('#sent_at').val('');
                        }
                    } catch (e) {
                        console.log('Error parsing created_at:', insurance.created_at);
                        $('#sent_at').val('');
                    }
                } else {
                    $('#sent_at').val('');
                }
                
                if (insurance?.usage_date) {
                    try {
                        const usageDate = new Date(insurance.usage_date);
                        if (!isNaN(usageDate.getTime())) {
                            $('#usage_date').val(usageDate.toISOString().substring(0, 10));
                        } else {
                            $('#usage_date').val('');
                        }
                    } catch (e) {
                        console.log('Error parsing usage_date:', insurance.usage_date);
                        $('#usage_date').val('');
                    }
                } else {
                    $('#usage_date').val('');
                }
                
                // Display original insurance images
                displayOriginalImages(insurance);
                
                // Add visual feedback
                if (insurance) {
                    $('#user_name, #phone, #usage_date, #device_serial, #package_serial').addClass('auto-filled');
                } else {
                    $('#user_name, #phone, #usage_date, #device_serial, #package_serial').removeClass('auto-filled');
                }
            }
            
            function displayImagePreview(inputId, imagePath) {
                const previewContainer = $(`[data-upload-id="${inputId}"] .custom-file-container__image-preview`);
                if (previewContainer.length > 0 && imagePath) {
                    let imageUrl;
                    if (imagePath.startsWith('http')) {
                        imageUrl = imagePath;
                    } else if (imagePath.startsWith('images/')) {
                        imageUrl = `/${imagePath}`;
                    } else {
                        imageUrl = `/images/warranty/${imagePath}`;
                    }
                    
                    previewContainer.html(`
                        <div style="position: relative; display: inline-block;">
                            <img src="${imageUrl}" alt="Preview" style="max-width: 100%; max-height: 200px; border-radius: 4px; border: 2px solid #28a745;">
                            <div style="position: absolute; top: 5px; right: 5px; background: #28a745; color: white; padding: 2px 6px; border-radius: 3px; font-size: 12px;">
                                تم جلبها تلقائياً
                            </div>
                        </div>
                    `);
                }
            }
            
            function displayOriginalImages(insurance) {
                // عرض صورة الجهاز من الأمام بعد التركيب
                if (insurance?.front_image) {
                    console.log('Front image path:', insurance.front_image);
                    let imageUrl;
                    if (insurance.front_image.startsWith('http')) {
                        imageUrl = insurance.front_image;
                    } else if (insurance.front_image.startsWith('images/')) {
                        imageUrl = `/${insurance.front_image}`;
                    } else {
                        imageUrl = `/images/warranty/${insurance.front_image}`;
                    }
                    console.log('Front image URL:', imageUrl);
                    
                    $('#original-front-image').html(`
                        <img src="${imageUrl}" alt="صورة الجهاز من الأمام بعد التركيب" style="max-width: 100%; max-height: 200px; border-radius: 4px; box-shadow: 0 2px 8px rgba(0,0,0,0.1);">
                    `);
                } else {
                    $('#original-front-image').html(`
                        <div class="no-image-placeholder">
                            <i class="glyphicon glyphicon-picture"></i>
                            <p><?php echo e(__('skudomodule::warranty.no_image_available')); ?></p>
                        </div>
                    `);
                }
                
                // عرض صورة الرقم التسلسلي الموجود على المنتج (البكج)
                if (insurance?.back_image) {
                    console.log('Back image path:', insurance.back_image);
                    let imageUrl;
                    if (insurance.back_image.startsWith('http')) {
                        imageUrl = insurance.back_image;
                    } else if (insurance.back_image.startsWith('images/')) {
                        imageUrl = `/${insurance.back_image}`;
                    } else {
                        imageUrl = `/images/warranty/${insurance.back_image}`;
                    }
                    console.log('Back image URL:', imageUrl);
                    
                    $('#original-back-image').html(`
                        <img src="${imageUrl}" alt="صورة الرقم التسلسلي الموجود على المنتج" style="max-width: 100%; max-height: 200px; border-radius: 4px; box-shadow: 0 2px 8px rgba(0,0,0,0.1);">
                    `);
                } else {
                    $('#original-back-image').html(`
                        <div class="no-image-placeholder">
                            <i class="glyphicon glyphicon-picture"></i>
                            <p><?php echo e(__('skudomodule::warranty.no_image_available')); ?></p>
                        </div>
                    `);
                }
            }
            
            function showLoader() {
                // Create loader if it doesn't exist
                if ($('#warranty-loader').length === 0) {
                    $('body').append('<div id="warranty-loader" class="warranty-loader-overlay"><div class="warranty-loader-content"><div class="warranty-spinner"></div><p>جاري البحث عن تسجيل الضمان...</p></div></div>');
                }
                $('#warranty-loader').addClass('show');
            }
            
            function hideLoader() {
                if ($('#warranty-loader').length > 0) {
                    $('#warranty-loader').removeClass('show');
                    setTimeout(() => {
                        $('#warranty-loader').remove();
                    }, 300);
                }
            }
            
            // Clear timeout when user focuses out or presses Enter
            $('#warranty_number').on('blur keypress', function(e) {
                if (e.type === 'keypress' && e.which === 13) { // Enter key
                    if (searchTimeout) {
                        clearTimeout(searchTimeout);
                        const id = $(this).val().trim();
                        if (id) {
                            performSearch(id);
                        }
                    }
                }
            });
        </script>
        
        <style>
            .warranty-loader-overlay {
                position: fixed;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                background: rgba(0, 0, 0, 0.5);
                z-index: 9999;
                display: none;
                justify-content: center;
                align-items: center;
                opacity: 0;
                transition: opacity 0.3s ease;
            }
            
            .warranty-loader-overlay.show {
                display: flex !important;
                opacity: 1;
            }
            
            .warranty-loader-content {
                background: white;
                padding: 30px 40px;
                border-radius: 10px;
                text-align: center;
                box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
                max-width: 300px;
                width: 90%;
            }
            
            .warranty-spinner {
                width: 40px;
                height: 40px;
                border: 4px solid #f3f3f3;
                border-top: 4px solid #007bff;
                border-radius: 50%;
                animation: warranty-spin 1s linear infinite;
                margin: 0 auto 20px;
            }
            
            @keyframes  warranty-spin {
                0% { transform: rotate(0deg); }
                100% { transform: rotate(360deg); }
            }
            
            .warranty-loader-content p {
                margin: 0;
                color: #333;
                font-size: 16px;
                font-weight: 500;
            }
            
            .auto-filled {
                background-color: #e8f5e8 !important;
                border-color: #28a745 !important;
            }
            
            .insurance-image-display {
                border: 2px dashed #ddd;
                border-radius: 8px;
                padding: 20px;
                text-align: center;
                background: #f9f9f9;
                min-height: 200px;
                display: flex;
                align-items: center;
                justify-content: center;
            }
            
            .insurance-image-display img {
                max-width: 100%;
                max-height: 200px;
                border-radius: 4px;
                box-shadow: 0 2px 8px rgba(0,0,0,0.1);
            }
            
            .no-image-placeholder {
                color: #999;
            }
            
            .no-image-placeholder i {
                font-size: 48px;
                margin-bottom: 10px;
                display: block;
            }
            
            .no-image-placeholder p {
                margin: 0;
                font-size: 14px;
            }
            
            .custom-file-container__image-preview {
                background: #f8f9fa;
                border: 2px dashed #dee2e6;
                border-radius: 8px;
                padding: 15px;
                text-align: center;
                min-height: 120px;
                display: flex;
                align-items: center;
                justify-content: center;
            }
            
            .custom-file-container__image-preview img {
                max-width: 100%;
                max-height: 200px;
                border-radius: 4px;
                box-shadow: 0 2px 8px rgba(0,0,0,0.1);
            }
        </style>
    <?php endif; ?>

    <script type="text/javascript">
        const warranty_form = document.querySelector('#warranty-form');
        const submitter = $(warranty_form).find('[type="submit"]');
        submitter.click((e) => {
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
                                window.location = "<?php echo e(route('front.skudo.warranty.index')); ?>";
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

<?php echo $__env->make('fronthomemodule::layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\freelancing\أجمل الهواتف\real_web_app\Modules/SkudoModule\Resources/views/front/warranty/create.blade.php ENDPATH**/ ?>