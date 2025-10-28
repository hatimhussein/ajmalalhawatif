@extends('fronthomemodule::layouts.master')

@section('title')
    {{__('commonmodule::front.warranty')}}
@endsection

@section('css')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet"/>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/0.8.2/css/flag-icon.min.css" rel="stylesheet"/>
    <link rel="stylesheet" href="{{ asset('assets/admin/plugins/file-upload/file-upload-with-preview.css')}}"
          type="text/css">
    <style>
        /* تنسيق زر البحث عن الرقم التسلسلي */
        #search_serial_btn {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border: none;
            color: white;
            font-weight: 600;
            padding: 10px 20px;
            transition: all 0.3s ease;
            box-shadow: 0 2px 8px rgba(102, 126, 234, 0.3);
            white-space: nowrap;
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
        
        #search_serial_btn i {
            margin-left: 5px;
        }
        
        /* تحسين مظهر الحقل */
        #package_serial {
            border-radius: 4px 0 0 4px;
            border-right: none;
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
    </style>
@endsection

@section('content')


    @include('fronthomemodule::content.breadCrumbs',['pages'=>[__('commonmodule::front.warranty')]])
    <!-- main-container -->

    <div class="main-container col2-right-layout warranty-create-div">
        <div class="main container">
            <div class="row">
                <section class="col-md-12">
                    <div class="my-account">
                        <div class="page-title title">
                            <h2>{{__('skudomodule::insurance.insurance')}}</h2>
                        </div>
                        
                        <!-- @if(!auth()->check())
                            <div class="alert alert-info">
                                <strong>{{ __('skudomodule::insurance.guest_notice') }}</strong>
                                <p>{{ __('skudomodule::insurance.guest_notice_text') }}</p>
                            </div>
                        @endif -->
                        
                        <form id="insurance-form"
                              action="{{route('front.skudo.insurance.store')}}" class="form"
                              method="post" enctype="multipart/form-data">
                            @csrf

                            <div class="fieldset">
                                <h2 class="legend">{{__('skudomodule::warranty.main_info')}} <i
                                        class="glyphicon glyphicon-file"></i></h2>

                                <div class="row">
                                    <div class="col-md-9">
                                        <div class="row">
                                            <div class="col-md-4">
                                                @if($inputs->contains('key', 'user_name'))
                                                    <div class="form-group">
                                                        @include("warrantymodule::front.includes.input", ['input' => $inputs->where('key', 'user_name')->first(), 'localeFile' => 'insurance'])
                                                    </div>
                                                @endif
                                            </div>
                                            <div class="col-md-6">
                                                @if($inputs->contains('key', 'phone_code_id'))
                                                    <div class="form-group">
                                                        @include("warrantymodule::front.includes.input", ['input' => $inputs->where('key', 'phone_code_id')->first(), 'localeFile' => 'insurance'])
                                                    </div>
                                                @endif
                                            </div>
                                            <div class="col-md-6">
                                                @if($inputs->contains('key', 'phone'))
                                                    <div class="form-group">
                                                        @include("warrantymodule::front.includes.input", ['input' => $inputs->where('key', 'phone')->first(), 'localeFile' => 'insurance'])
                                                    </div>
                                                @endif
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
                                    @php
                                        $deviceSerialKeys = ['device_serial', 'serial_number', 'imei', 'imei_number'];
                                        $packageSerialKeys = ['package_serial', 'box_serial', 'product_serial'];
                                        $firstDeviceKey = collect($deviceSerialKeys)->first(fn($k) => $inputs->contains('key', $k));
                                        $firstPackageKey = collect($packageSerialKeys)->first(fn($k) => $inputs->contains('key', $k));
                                    @endphp
                                    <div class="col-md-6">
                                        @if(isset($firstPackageKey))
                                            <div class="form-group">
                                                @include("warrantymodule::front.includes.input", ['input' => $inputs->where('key', $firstPackageKey)->first(), 'localeFile' => 'insurance'])
                                            </div>
                                        @else
                                            <div class="form-group">
                                                <label for="package_serial" class="required">الرقم التسلسلي للمنتج (البكج)</label>
                                                <div class="input-group" id="package_serial_group">
                                                    <input type="text" name="package_serial" id="package_serial" class="form-control" maxlength="100" placeholder="الرقم التسلسلي للمنتج (البكج)">
                                                    <div class="input-group-append">
                                                        <button type="button" id="search_serial_btn" class="btn btn-primary" style="border-radius: 0 4px 4px 0;">
                                                            <i class="glyphicon glyphicon-search"></i> تحقق من الرقم
                                                        </button>
                                                    </div>
                                                </div>
                                                <small class="form-text text-muted">أدخل الرقم التسلسلي ثم اضغط على "تحقق من الرقم" للتأكد من صحته</small>
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
                                        @endif
                                    </div>

                                    <div class="col-md-6">
                                        @if(isset($firstDeviceKey))
                                            <div class="form-group">
                                                @include("warrantymodule::front.includes.input", ['input' => $inputs->where('key', $firstDeviceKey)->first(), 'localeFile' => 'insurance'])
                                            </div>
                                        @else
                                            <div class="form-group">
                                                <label for="device_serial" class="required">الرقم التسلسلي للجهاز</label>
                                                <small class="help-block text-muted">الرقم التسلسلي للجهاز من خلال النقر على: <strong>#06#*</strong> ثم اتصال</small>

                                                <input type="text" name="device_serial" id="device_serial" class="form-control" maxlength="100" placeholder="الرقم التسلسلي للجهاز">
                                            </div>
                                        @endif
                                    </div>

                                    @if($inputs->contains('key', 'usage_date'))
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                @include("warrantymodule::front.includes.input", ['input' => $inputs->where('key', 'usage_date')->first(), 'localeFile' => 'insurance'])
                                            </div>
                                        </div>
                                    @endif
                                    <div class="col-md-12">
                                        <div class="form-group-header">
                                            <h3>{{__('usermodule::admin.attachment')}} <i
                                                    class="glyphicon glyphicon-picture"></i></h3>
                                        </div>
                                    </div>

                                    @php
                                        $fileInputs = $inputs->where('properties.type', 'file');
                                        $hasFront = $fileInputs->contains('key', 'front_image');
                                        $hasBack = $fileInputs->contains('key', 'back_image');
                                    @endphp

                                    {{-- صورة الجهاز من الأمام بعد التركيب --}}
                                    @if($hasFront)
                                        @php $input = $fileInputs->where('key', 'front_image')->first(); @endphp
                                        <div class="col-md-4 custom-file-container" data-upload-id="front_image">
                                            <label for="front_image" class="required">صورة الجهاز من الأمام بعد التركيب @if($input->value_en)<em class="required">*</em>@endif</label>
                                            <label> <a href="javascript:void(0)" class="custom-file-container__image-clear" title="Clear Image"></a></label>
                                            <label class="custom-file-container__custom-file">
                                                <input type="file" name="front_image" id="front_image" class="custom-file-container__custom-file__custom-file-input" accept="image/*,video/*">
                                                <span class="custom-file-container__custom-file__custom-file-control"></span>
                                            </label>
                                            <div class="custom-file-container__image-preview" style="min-height: 180px; background-position: center; background-repeat: no-repeat; background-size: contain; background-color: #f7f7f7; border: 1px dashed #ddd;"></div>
                                        </div>
                                    @else
                                        <div class="col-md-4 custom-file-container" data-upload-id="front_image">
                                            <label for="front_image" class="required">صورة الجهاز من الأمام بعد التركيب</label>
                                            <label> <a href="javascript:void(0)" class="custom-file-container__image-clear" title="Clear Image"></a></label>
                                            <label class="custom-file-container__custom-file">
                                                <input type="file" name="front_image" id="front_image" class="custom-file-container__custom-file__custom-file-input" accept="image/*,video/*">
                                                <span class="custom-file-container__custom-file__custom-file-control"></span>
                                            </label>
                                            <div class="custom-file-container__image-preview" style="min-height: 180px; background-position: center; background-repeat: no-repeat; background-size: contain; background-color: #f7f7f7; border: 1px dashed #ddd;"></div>
                                        </div>
                                    @endif

                                    {{-- صورة الرقم التسلسلي الموجود على المنتج (لبكج) --}}
                                    @if($hasBack)
                                        @php $input = $fileInputs->where('key', 'back_image')->first(); @endphp
                                        <div class="col-md-4 custom-file-container" data-upload-id="back_image">
                                            <label for="back_image" class="required">صورة الرقم التسلسلي الموجود على المنتج (لبكج) @if($input->value_en)<em class="required">*</em>@endif</label>
                                            <label> <a href="javascript:void(0)" class="custom-file-container__image-clear" title="Clear Image"></a></label>
                                            <label class="custom-file-container__custom-file">
                                                <input type="file" name="back_image" id="back_image" class="custom-file-container__custom-file__custom-file-input" accept="image/*">
                                                <span class="custom-file-container__custom-file__custom-file-control"></span>
                                            </label>
                                            <div class="custom-file-container__image-preview"></div>
                                        </div>
                                    @else
                                        <div class="col-md-4 custom-file-container" data-upload-id="back_image">
                                            <label for="back_image" class="required">صورة الرقم التسلسلي الموجود على المنتج (لبكج)</label>
                                            <label> <a href="javascript:void(0)" class="custom-file-container__image-clear" title="Clear Image"></a></label>
                                            <label class="custom-file-container__custom-file">
                                                <input type="file" name="back_image" id="back_image" class="custom-file-container__custom-file__custom-file-input" accept="image/*">
                                                <span class="custom-file-container__custom-file__custom-file-control"></span>
                                            </label>
                                            <div class="custom-file-container__image-preview"></div>
                                        </div>
                                    @endif

                                    {{-- صورة الفاتورة --}}
                                    <div class="col-md-4 custom-file-container" data-upload-id="invoice_image">
                                        <label for="invoice_image" class="required">صورة الفاتورة</label>
                                        <label> <a href="javascript:void(0)" class="custom-file-container__image-clear" title="Clear Image"></a></label>
                                        <label class="custom-file-container__custom-file">
                                            <input type="file" name="invoice_image" id="invoice_image" class="custom-file-container__custom-file__custom-file-input" accept="image/*">
                                            <span class="custom-file-container__custom-file__custom-file-control"></span>
                                        </label>
                                        <div class="custom-file-container__image-preview"></div>
                                    </div>

                                    {{-- Render any remaining file inputs if exist --}}
                                    @foreach($fileInputs as $fi)
                                        @if(!in_array($fi->key, ['front_image','back_image','invoice_image']))
                                            @if(stripos($fi->key, 'qr') !== false)
                                                @continue
                                            @endif
                                            @if($fi->key === 'warranty_image')
                                                @continue
                                            @endif
                                            <div class="col-md-4 custom-file-container" data-upload-id="{{ $fi->key }}">
                                                <label for="{{ $fi->key }}" class="required">{{ __('skudomodule::insurance.'.$fi->key) }} @if($fi->value_en)<em class="required">*</em>@endif</label>
                                                <label> <a href="javascript:void(0)" class="custom-file-container__image-clear" title="Clear Image"></a></label>
                                                <label class="custom-file-container__custom-file">
                                                    <input type="file" name="{{ $fi->key }}" id="{{ $fi->key }}" class="custom-file-container__custom-file__custom-file-input" accept="image/*,video/*">
                                                    <span class="custom-file-container__custom-file__custom-file-control"></span>
                                                </label>
                                                <div class="custom-file-container__image-preview"></div>
                                            </div>
                                        @endif
                                    @endforeach
                                </div>

                            </div>

                            <div class="row">
                                <div class="col-12 accept_terms">
                                    <input type="checkbox" name="terms" title="terms & conditions"
                                           id="terms" checked required>
                                    <label for="terms" style="display: inline-block">
                                        {{__('usermodule::login.accept')}}
                                        <a href="{{ url('config/'.$site_data->where('key', 'insurance')->first()->id ?? '2') }}"
                                           target="_blank">{{__('usermodule::login.terms_conditions')}}</a>
                                    </label>
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

@stop

@section('js')
    <script src="{{ asset('assets/admin/plugins/file-upload/file-upload-with-preview.js')}}"></script>

    <script>
        @foreach($fileInputs->filter(function($fi){ return stripos($fi->key, 'qr') === false && $fi->key !== 'warranty_image'; }) as $input)
        new FileUploadWithPreview('{{ $input->key }}')
        @endforeach
        // Ensure back_image is initialized explicitly (in case it was filtered/missed)
        try { new FileUploadWithPreview('back_image'); } catch (e) {}
        // Initialize invoice_image upload
        try { new FileUploadWithPreview('invoice_image'); } catch (e) {}
    </script>

    @include('usermodule::front.auth.phone_code_scripts')

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
                                window.location = "{{route('front.skudo.insurance.index')}}";
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
        
        // السماح بالبحث عند الضغط على Enter في حقل الرقم التسلسلي
        $('#package_serial').on('keypress', function(e) {
            if (e.which === 13) { // Enter key
                e.preventDefault();
                $('#search_serial_btn').click();
            }
        });

        function searchSerialNumber(serialNumber) {
            $.ajax({
                url: '{{ route("front.skudo.serial-numbers.search") }}',
                method: 'GET',
                data: { serial: serialNumber },
                success: function(response) {
                    // إعادة تفعيل الزر وإعادة تعيين flag
                    $('#search_serial_btn').prop('disabled', false).html('<i class="glyphicon glyphicon-search"></i> تحقق من الرقم');
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
                    $('#search_serial_btn').prop('disabled', false).html('<i class="glyphicon glyphicon-search"></i> تحقق من الرقم');
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
@endsection
