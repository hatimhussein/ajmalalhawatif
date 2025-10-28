@extends('fronthomemodule::layouts.master')

@section('title')
    {{__('skudomodule::warranty.warranty_card')}}
@endsection

@section('css')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet"/>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/0.8.2/css/flag-icon.min.css" rel="stylesheet"/>
    <link rel="stylesheet" href="{{ asset('assets/admin/plugins/file-upload/file-upload-with-preview.css')}}"
          type="text/css">
    <style>
        /* تنسيق زر البحث عن رقم التسجيل */
        #search_warranty_btn {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border: none;
            color: white;
            font-weight: 600;
            padding: 10px 20px;
            transition: all 0.3s ease;
            box-shadow: 0 2px 8px rgba(102, 126, 234, 0.3);
            white-space: nowrap;
        }
        
        #search_warranty_btn:hover {
            background: linear-gradient(135deg, #5a67d8 0%, #6a3f92 100%);
            box-shadow: 0 4px 12px rgba(102, 126, 234, 0.5);
            transform: translateY(-1px);
        }
        
        #search_warranty_btn:active {
            transform: translateY(0);
            box-shadow: 0 2px 6px rgba(102, 126, 234, 0.4);
        }
        
        #search_warranty_btn:disabled {
            background: linear-gradient(135deg, #9ca3af 0%, #6b7280 100%);
            cursor: not-allowed;
            opacity: 0.7;
        }
        
        #search_warranty_btn i {
            margin-left: 5px;
        }
        
        /* تحسين مظهر الحقل */
        #warranty_number_group {
            width: 95%;
            display: flex;
        }
        
        #warranty_number {
            border-radius: 4px 0 0 4px;
            border-right: none;
        }
        
        .input-group #warranty_number:focus {
            box-shadow: none;
            border-color: #667eea;
        }
    </style>
@endsection

@section('content')


    @include('fronthomemodule::content.breadCrumbs',['pages'=>[__('commonmodule::front.warranty')]])
    <!-- main-container -->

    <!-- main-container -->
    <div class="main-container col2-right-layout warranty-create-div">
        <div class="main container">
            <div class="row">
                <section class="col-md-12">
                    <div class="my-account">
                        <div class="page-title title">
                            <h2>{{__('skudomodule::warranty.warranty_card')}}</h2>
                        </div>
                        
                        <!-- @if(!auth()->check())
                            <div class="alert alert-info">
                                <strong>{{ __('skudomodule::warranty.guest_notice') }}</strong>
                                <p>{{ __('skudomodule::warranty.guest_notice_text') }}</p>
                            </div>
                        @endif -->
                        
                        @if($type == 'sms')
                            <div class="alert alert-success">
                                <strong>{{ __('skudomodule::warranty.registration_number_inquiry') }}</strong>
                                <p>{{ __('skudomodule::warranty.enter_registration_number') }}</p>
                                <small class="text-muted">{{ __('skudomodule::warranty.registration_number_help') }}</small>
                            </div>
                        @endif
                        
                        <form id="warranty-form"
                              action="{{route('front.skudo.warranty.store', ['type' => $type ?? 'card'])}}" class="form"
                              enctype="multipart/form-data">
                            @csrf

                            <div class="fieldset">
                                <h2 class="legend">{{__('skudomodule::warranty.main_info')}} <i
                                        class="glyphicon glyphicon-file"></i></h2>

                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="row">
                                            <div class="col-md-6">
                                                @if($inputs->contains('key', 'warranty_number'))
                                                    @php
                                                        $warrantyInput = $inputs->where('key', 'warranty_number')->first();
                                                    @endphp
                                                    <div class="form-group">
                                                        <label for="warranty_number">{{__('skudomodule::'.($localeFile ?? 'warranty').'.warranty_number')}}
                                                            @if($warrantyInput->value_en)<em class="required">*</em>@endif
                                                        </label>
                                                        <div class="input-box">
                                                            <div class="input-group" id="warranty_number_group">
                                                                <input type="text" name="warranty_number" id="warranty_number" 
                                                                       title="{{__('skudomodule::'.($localeFile ?? 'warranty').'.warranty_number')}}"
                                                                       class="input-text form-control {{ $warrantyInput->value_en ? 'required-entry' : '' }}" 
                                                                       placeholder="أدخل رقم تسجيل الضمان">
                                                                <div class="input-group-append">
                                                                    <button type="button" id="search_warranty_btn" class="btn btn-primary" style="border-radius: 0 4px 4px 0;">
                                                                        <i class="glyphicon glyphicon-search"></i> تحقق من الرقم
                                                                    </button>
                                                                </div>
                                                            </div>
                                                            <small class="form-text text-muted">أدخل رقم تسجيل الضمان ثم اضغط على "تحقق من الرقم" لجلب البيانات</small>
                                                        </div>
                                                    </div>
                                                @endif
                                                {{--                                                @if($inputs->contains('key', 'company_name'))--}}
                                                {{--                                                    <div class="form-group">--}}
                                                {{--                                                        @include("warrantymodule::front.includes.input", ['localeFile' => $localeFile, 'input' => $inputs->where('key', 'company_name')->first(), 'value' => auth()->user()->company_name, 'disabled' => true])--}}
                                                {{--                                                    </div>--}}
                                                {{--                                                @endif--}}
                                                {{--                                                @if($inputs->contains('key', 'company_account'))--}}
                                                {{--                                                    <div class="form-group">--}}
                                                {{--                                                        @include("warrantymodule::front.includes.input", ['localeFile' => $localeFile, 'input' => $inputs->where('key', 'company_account')->first(), 'value' => auth()->user()->account_number, 'disabled' => true])--}}
                                                {{--                                                    </div>--}}
                                                {{--                                                @endif--}}
                                                @if($inputs->contains('key', 'user_name'))
                                                    <div class="form-group">
                                                        @include("skudomodule::front.includes.input", ['localeFile' => $localeFile, 'input' => $inputs->where('key', 'user_name')->first(), 'disabled' => true])
                                                    </div>
                                                @endif
                                                @if($inputs->contains('key', 'phone'))
                                                    <div class="form-group">
                                                        @include("skudomodule::front.includes.input", ['localeFile' => $localeFile, 'input' => $inputs->where('key', 'phone')->first()])
                                                    </div>
                                                @endif
                                            </div>
                                            <div class="col-md-6">
                                                @if($inputs->contains('key', 'sent_at'))
                                                    <div class="form-group">
                                                        @include("skudomodule::front.includes.input", ['localeFile' => $localeFile, 'input' => $inputs->where('key', 'sent_at')->first(), 'disabled' => true])
                                                    </div>
                                                @endif
                                                @if($inputs->contains('key', 'usage_date'))
                                                    <div class="form-group">
                                                        @include("skudomodule::front.includes.input", ['localeFile' => $localeFile, 'input' => $inputs->where('key', 'usage_date')->first(), 'read_only' => $type == 'sms'])
                                                    </div>
                                                @endif
                                                @if($inputs->contains('key', 'dummy_text_1'))
                                                    <div class="form-group">
                                                        @include("skudomodule::front.includes.input", ['localeFile' => $localeFile, 'input' => $inputs->where('key', 'dummy_text_1')->first()])
                                                    </div>
                                                @endif
                                                @if($inputs->contains('key', 'dummy_text_2'))
                                                    <div class="form-group">
                                                        @include("skudomodule::front.includes.input", ['localeFile' => $localeFile, 'input' => $inputs->where('key', 'dummy_text_2')->first()])
                                                    </div>
                                                @endif
                                                @if($inputs->contains('key', 'dummy_text_3'))
                                                    <div class="form-group">
                                                        @include("skudomodule::front.includes.input", ['localeFile' => $localeFile, 'input' => $inputs->where('key', 'dummy_text_3')->first()])
                                                    </div>
                                                @endif
                                                @if($inputs->contains('key', 'device_serial'))
                                                    <div class="form-group">
                                                        @include("skudomodule::front.includes.input", ['localeFile' => $localeFile, 'input' => $inputs->where('key', 'device_serial')->first()])
                                                    </div>
                                                @endif
                                                @if($inputs->contains('key', 'package_serial'))
                                                    <div class="form-group">
                                                        @include("skudomodule::front.includes.input", ['localeFile' => $localeFile, 'input' => $inputs->where('key', 'package_serial')->first()])
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <!-- البيانات البنكية -->
                                        <div class="form-group">
                                            <label for="bank_name" class="required">{{__('skudomodule::warranty.bank_name')}} <em class="required">*</em></label>
                                            <input type="text" name="bank_name" id="bank_name" 
                                                   class="input-text form-control" 
                                                   placeholder="{{__('skudomodule::warranty.bank_name')}}" 
                                                   required>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label for="account_holder_name" class="required">{{__('skudomodule::warranty.account_holder_name')}} <em class="required">*</em></label>
                                            <input type="text" name="account_holder_name" id="account_holder_name" 
                                                   class="input-text form-control" 
                                                   placeholder="{{__('skudomodule::warranty.account_holder_name')}}" 
                                                   required>
                                            <small class="text-info">
                                                <i class="glyphicon glyphicon-info-sign"></i>
                                                {{__('skudomodule::warranty.account_holder_name_note')}}
                                            </small>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label for="bank_account_number" class="required">{{__('skudomodule::warranty.bank_account_number')}} <em class="required">*</em></label>
                                            <input type="text" name="bank_account_number" id="bank_account_number" 
                                                   class="input-text form-control" 
                                                   placeholder="{{__('skudomodule::warranty.bank_account_number')}}" 
                                                   required>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label for="iban_number" class="required">{{__('skudomodule::warranty.iban_number')}} <em class="required">*</em></label>
                                            <input type="text" name="iban_number" id="iban_number" 
                                                   class="input-text form-control" 
                                                   placeholder="{{__('skudomodule::warranty.iban_number')}}" 
                                                   required>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mt-3">
                                    <div class="col-md-12">
                                        <div class="form-group-header">
                                            <h3>{{__('usermodule::admin.attachment')}} <i
                                                    class="glyphicon glyphicon-picture"></i></h3>
                                        </div>
                                    </div>
                                    @foreach($inputs->where('properties.type', 'file') as $input)
                                        @if($input->key != 'front_image')
                                            <div class="col-md-4 custom-file-container" data-upload-id="{{ $input->key }}">
                                                <label for="{{ $input->key }}"
                                                       class="required">{{__('skudomodule::warranty.'.$input->key)}}
                                                    @if($input->value_en)<em class="required">*</em>@endif
                                                </label>
                                                <label> <a href="javascript:void(0)"
                                                           class="custom-file-container__image-clear"
                                                           title="Clear Image"></a></label>
                                                <label class="custom-file-container__custom-file">
                                                    <input type="file" name="{{ $input->key }}"
                                                           title="{{ __('skudomodule::warranty.'.$input->key) }}"
                                                           id="{{ $input->key }}"
                                                           class="custom-file-container__custom-file__custom-file-input"
                                                           accept="image/*,video/*">
                                                    <span
                                                        class="custom-file-container__custom-file__custom-file-control"></span>
                                                </label>
                                                <div class="custom-file-container__image-preview"></div>
                                            </div>
                                        @endif
                                    @endforeach
                                    
                                    <!-- مدخل رفع صورة الجهاز المكسور -->
                                    <div class="col-md-4 custom-file-container" data-upload-id="broken_device_image">
                                        <label for="broken_device_image" class="required">
                                            {{__('skudomodule::warranty.broken_device_image')}} <em class="required">*</em>
                                        </label>
                                        <label> <a href="javascript:void(0)"
                                                   class="custom-file-container__image-clear"
                                                   title="Clear Image"></a></label>
                                        <label class="custom-file-container__custom-file">
                                            <input type="file" name="broken_device_image"
                                                   title="{{ __('skudomodule::warranty.broken_device_image') }}"
                                                   id="broken_device_image"
                                                   class="custom-file-container__custom-file__custom-file-input"
                                                   accept="image/*" required>
                                            <span class="custom-file-container__custom-file__custom-file-control"></span>
                                        </label>
                                        <div class="custom-file-container__image-preview"></div>
                                    </div>

{{--                                    <!-- عرض الصور من تسجيل الضمان الأصلي -->--}}
{{--                                    <div class="col-md-12 mt-3">--}}
{{--                                        <div class="form-group-header">--}}
{{--                                            <h4>{{__('skudomodule::warranty.original_insurance_images')}} <i class="glyphicon glyphicon-eye-open"></i></h4>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    --}}
{{--                                    <!-- صورة الجهاز من الأمام بعد التركيب -->--}}
{{--                                    <div class="col-md-6">--}}
{{--                                        <div class="form-group">--}}
{{--                                            <label>{{__('skudomodule::warranty.front_image_after_installation')}}</label>--}}
{{--                                            <div id="original-front-image" class="insurance-image-display">--}}
{{--                                                <div class="no-image-placeholder">--}}
{{--                                                    <i class="glyphicon glyphicon-picture"></i>--}}
{{--                                                    <p>{{__('skudomodule::warranty.no_image_available')}}</p>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    --}}
{{--                                    <!-- صورة الرقم التسلسلي الموجود على المنتج (البكج) -->--}}
{{--                                    <div class="col-md-6">--}}
{{--                                        <div class="form-group">--}}
{{--                                            <label>{{__('skudomodule::warranty.back_image')}}</label>--}}
{{--                                            <div id="original-back-image" class="insurance-image-display">--}}
{{--                                                <div class="no-image-placeholder">--}}
{{--                                                    <i class="glyphicon glyphicon-picture"></i>--}}
{{--                                                    <p>{{__('skudomodule::warranty.no_image_available')}}</p>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
                                </div>

                            </div>

                            <div class="buttons-set">
                                <button type="submit" title="Save" class="button send">
                                    <span><span>{{__('usermodule::login.save')}}</span></span></button>
                            </div>
                        </form>
                    </div>
                </section>

            </div>
        </div>
    </div>
    <!--End main-container -->

@stop

@section('js')
    <script src="{{ asset('assets/admin/plugins/file-upload/file-upload-with-preview.js')}}"></script>

    <script>
        @foreach($inputs->where('properties.type', 'file') as $input)
        new FileUploadWithPreview('{{ $input->key }}')
        @endforeach
        
        // تهيئة مدخل صورة الجهاز المكسور
        new FileUploadWithPreview('broken_device_image')
    </script>

    <!-- @include('commonmodule::includes.filePond') -->
    @include('usermodule::front.auth.phone_code_scripts')

    @if ($type == 'sms')
        <script type="text/javascript">
            const url = '{!! route('skudo.warranty.insurance', 'replaceable') !!}';
            let isLoading = false;
            
            // إخفاء البيانات عند تعديل الحقل
            $('#warranty_number').on('input', function () {
                const id = $(this).val().trim();
                
                // Clear previous data if input is empty
                if (!id) {
                    fillInsuranceInputs();
                }
            });
            
            // البحث عند النقر على الزر
            $('#search_warranty_btn').on('click', function() {
                const id = $('#warranty_number').val().trim();
                
                // التحقق من أن الرقم ليس فارغاً
                if (!id) {
                    toastr["warning"]("يرجى إدخال رقم تسجيل الضمان أولاً");
                    return;
                }
                
                // التحقق من الحد الأدنى للطول
                if (id.length < 1) {
                    toastr["warning"]("يرجى إدخال رقم تسجيل صحيح");
                    return;
                }
                
                if (!isLoading) {
                    performSearch(id);
                }
            });
            
            // السماح بالبحث عند الضغط على Enter في حقل الرقم
            $('#warranty_number').on('keypress', function(e) {
                if (e.which === 13) { // Enter key
                    e.preventDefault();
                    $('#search_warranty_btn').click();
                }
            });

            function performSearch(id) {
                // Prevent multiple requests
                if (isLoading) return;
                
                isLoading = true;
                
                // تعطيل الزر وإضافة مؤشر تحميل
                $('#search_warranty_btn').prop('disabled', true).html('<i class="fa fa-spinner fa-spin"></i> جاري التحقق...');
                
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
                        // إعادة تفعيل الزر
                        $('#search_warranty_btn').prop('disabled', false).html('<i class="glyphicon glyphicon-search"></i> تحقق من الرقم');
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
                            <p>{{__('skudomodule::warranty.no_image_available')}}</p>
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
                            <p>{{__('skudomodule::warranty.no_image_available')}}</p>
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
            
            @keyframes warranty-spin {
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
    @endif

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
                                window.location = "{{route('front.skudo.warranty.index')}}";
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
@endsection
