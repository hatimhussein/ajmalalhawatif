@extends('fronthomemodule::layouts.master')

@section('title')
    {{__('skudomodule::insurance.page_title')}}
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
        
        /* تحسين modal الباركود للهواتف - عرض أكبر وطول أقل */
        #barcodeScannerModal .modal-dialog {
            max-width: 98% !important;
            margin: 5px auto !important;
        }
        
        #barcodeScannerReader {
            aspect-ratio: 16 / 4; /* Landscape orientation - very wide and short */
            width: 100%;
            max-width: 100%;
            position: relative;
            overflow: hidden;
        }
        
        /* Force landscape orientation for scanner */
        #barcodeScannerReader video,
        #barcodeScannerReader canvas {
            width: 100% !important;
            height: auto !important;
            object-fit: cover;
            display: block;
        }
        
        /* Ensure video fills the container in landscape */
        #barcodeScannerReader > div {
            width: 100% !important;
            height: 100% !important;
        }
        
        #barcodeScannerReader > div > video {
            width: 100% !important;
            height: auto !important;
            min-height: 100%;
        }
        
        @media (max-width: 768px) {
            #barcodeScannerModal .modal-dialog {
                max-width: 98% !important;
                margin: 5px auto !important;
            }
            
            #barcodeScannerModal .modal-content {
                border-radius: 8px !important;
            }
            
            #barcodeScannerModal .modal-header {
                padding: 6px 10px !important;
            }
            
            #barcodeScannerModal .modal-title {
                font-size: 15px !important;
            }
            
            #barcodeScannerModal .modal-body {
                padding: 8px 10px !important;
            }
            
            #barcodeScannerReader {
                min-height: 120px !important;
                max-height: 140px !important;
                aspect-ratio: 16 / 4 !important;
            }
            
            #barcodeScannerReader video,
            #barcodeScannerReader canvas {
                width: 100% !important;
                height: auto !important;
            }
            
            #barcodeScannerModal .modal-footer {
                padding: 6px 10px !important;
            }
            
            #barcodeScannerModal .btn {
                font-size: 11px !important;
                padding: 4px 8px !important;
            }
        }
        
        @media (max-width: 480px) {
            #barcodeScannerModal .modal-dialog {
                max-width: 98% !important;
                margin: 5px auto !important;
            }
            
            #barcodeScannerModal .modal-content {
                border-radius: 8px !important;
            }
            
            #barcodeScannerModal .modal-header {
                padding: 5px 8px !important;
            }
            
            #barcodeScannerModal .modal-title {
                font-size: 14px !important;
            }
            
            #barcodeScannerModal .modal-body {
                padding: 6px 8px !important;
            }
            
            #barcodeScannerReader {
                min-height: 100px !important;
                max-height: 120px !important;
                aspect-ratio: 16 / 4 !important;
            }
            
            #barcodeScannerReader video,
            #barcodeScannerReader canvas {
                width: 100% !important;
                height: auto !important;
            }
            
            #barcodeScannerModal .modal-footer {
                padding: 5px 8px !important;
            }
        }
        
        /* Loader Overlay Styles */
        .form-loader-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.7);
            display: none;
            justify-content: center;
            align-items: center;
            z-index: 99999;
            flex-direction: column;
        }
        
        .form-loader-overlay.active {
            display: flex;
        }
        
        .form-loader-spinner {
            width: 60px;
            height: 60px;
            border: 5px solid rgba(255, 255, 255, 0.3);
            border-top-color: #667eea;
            border-radius: 50%;
            animation: spin 1s linear infinite;
        }
        
        .form-loader-text {
            color: #fff;
            margin-top: 20px;
            font-size: 18px;
            font-weight: 600;
            text-align: center;
        }
        
        .form-loader-subtext {
            color: rgba(255, 255, 255, 0.8);
            margin-top: 8px;
            font-size: 14px;
            text-align: center;
        }
        
        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }
    </style>
@endsection

@section('content')

    <!-- Form Loader Overlay -->
    <div id="formLoaderOverlay" class="form-loader-overlay">
        <div class="form-loader-spinner"></div>
        <div class="form-loader-text">جاري تسجيل الضمان...</div>
        <div class="form-loader-subtext">يرجى الانتظار وعدم إغلاق الصفحة</div>
    </div>

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
                                            <div class="col-md-8">
                                                @if($inputs->contains('key', 'phone'))
                                                    <div class="form-group">
                                                        @include("skudomodule::front.includes.input", ['input' => $inputs->where('key', 'phone')->first(), 'localeFile' => 'insurance'])
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
                                        $packageSerialKeys = ['package_serial', 'box_serial', 'product_serial'];
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
                                                        {{ __('skudomodule::insurance.scan_serial') }}
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
                                        @endif
                                    </div>

                                    {{-- device_serial field removed - no longer required --}}

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
                                        $hasDeviceBack = $fileInputs->contains('key', 'device_back_image');
                                        $hasBack = $fileInputs->contains('key', 'back_image');
                                    @endphp

                                    {{--  صورة الجهاز من الأمام بعد التركيب (تُظهر الرقم التسلسلي) --}}
                                    @if($hasFront)
                                        @php $input = $fileInputs->where('key', 'front_image')->first(); @endphp
                                        <div class="col-md-3 custom-file-container" data-upload-id="front_image">
                                            <label for="front_image" class="required"> صورة الجهاز من الأمام بعد التركيب (تُظهر الرقم التسلسلي للجهاز) @if($input->value_en)<em class="required">*</em>@endif</label>
                                            <label> <a href="javascript:void(0)" class="custom-file-container__image-clear" title="Clear Image"></a></label>
                                            <label class="custom-file-container__custom-file">
                                                <input type="file" name="front_image" id="front_image" class="custom-file-container__custom-file__custom-file-input" accept="image/*,video/*">
                                                <span class="custom-file-container__custom-file__custom-file-control"></span>
                                            </label>
                                            <div class="custom-file-container__image-preview" style="min-height: 180px; background-position: center; background-repeat: no-repeat; background-size: contain; background-color: #f7f7f7; border: 1px dashed #ddd;"></div>
                                        </div>
                                    @else
                                        <div class="col-md-3 custom-file-container" data-upload-id="front_image">
                                            <label for="front_image" class="required">  صورة الجهاز من الأمام بعد التركيب (تُظهر الرقم التسلسلي)</label>
                                            <label> <a href="javascript:void(0)" class="custom-file-container__image-clear" title="Clear Image"></a></label>
                                            <label class="custom-file-container__custom-file">
                                                <input type="file" name="front_image" id="front_image" class="custom-file-container__custom-file__custom-file-input" accept="image/*,video/*">
                                                <span class="custom-file-container__custom-file__custom-file-control"></span>
                                            </label>
                                            <div class="custom-file-container__image-preview" style="min-height: 180px; background-position: center; background-repeat: no-repeat; background-size: contain; background-color: #f7f7f7; border: 1px dashed #ddd;"></div>
                                        </div>
                                    @endif

                                    {{--  صورة الجهاز من الخلف --}}
                                    @if($hasDeviceBack)
                                        @php $input = $fileInputs->where('key', 'device_back_image')->first(); @endphp
                                        <div class="col-md-3 custom-file-container" data-upload-id="device_back_image">
                                            <label for="device_back_image" class="required">{{ __('skudomodule::insurance.device_back_image') }} @if($input->value_en)<em class="required">*</em>@endif</label>
                                            <label> <a href="javascript:void(0)" class="custom-file-container__image-clear" title="Clear Image"></a></label>
                                            <label class="custom-file-container__custom-file">
                                                <input type="file" name="device_back_image" id="device_back_image" class="custom-file-container__custom-file__custom-file-input" accept="image/*,video/*">
                                                <span class="custom-file-container__custom-file__custom-file-control"></span>
                                            </label>
                                            <div class="custom-file-container__image-preview"></div>
                                        </div>
                                    @else
                                        <div class="col-md-3 custom-file-container" data-upload-id="device_back_image">
                                            <label for="device_back_image" class="required">{{ __('skudomodule::insurance.device_back_image') }}</label>
                                            <label> <a href="javascript:void(0)" class="custom-file-container__image-clear" title="Clear Image"></a></label>
                                            <label class="custom-file-container__custom-file">
                                                <input type="file" name="device_back_image" id="device_back_image" class="custom-file-container__custom-file__custom-file-input" accept="image/*,video/*">
                                                <span class="custom-file-container__custom-file__custom-file-control"></span>
                                            </label>
                                            <div class="custom-file-container__image-preview"></div>
                                        </div>
                                    @endif

                                    {{-- صورة الرقم التسلسلي الموجود على المنتج (لبكج) --}}
                                    @if($hasBack)
                                        @php $input = $fileInputs->where('key', 'back_image')->first(); @endphp
                                        <div class="col-md-3 custom-file-container" data-upload-id="back_image">
                                            <label for="back_image" class="required">صورة الرقم التسلسلي الموجود على المنتج (لبكج) @if($input->value_en)<em class="required">*</em>@endif</label>
                                            <label> <a href="javascript:void(0)" class="custom-file-container__image-clear" title="Clear Image"></a></label>
                                            <label class="custom-file-container__custom-file">
                                                <input type="file" name="back_image" id="back_image" class="custom-file-container__custom-file__custom-file-input" accept="image/*">
                                                <span class="custom-file-container__custom-file__custom-file-control"></span>
                                            </label>
                                            <div class="custom-file-container__image-preview"></div>
                                        </div>
                                    @else
                                        <div class="col-md-3 custom-file-container" data-upload-id="back_image">
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
                                    <div class="col-md-3 custom-file-container" data-upload-id="invoice_image">
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
                                        @if(!in_array($fi->key, ['front_image','device_back_image','back_image','invoice_image']))
                                            @if(stripos($fi->key, 'qr') !== false)
                                                @continue
                                            @endif
                                            @if($fi->key === 'warranty_image')
                                                @continue
                                            @endif
                                            <div class="col-md-3 custom-file-container" data-upload-id="{{ $fi->key }}">
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

                        

                        {{-- Barcode scanner modal --}}
                        <div class="modal fade" id="barcodeScannerModal" tabindex="-1" role="dialog" aria-labelledby="barcodeScannerModalTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" style="max-width: 95%; margin: 10px auto;" role="document">
                                <div class="modal-content" style="border-radius: 12px; overflow: hidden;">
                                    <div class="modal-header" style="padding: 8px 15px; border-bottom: 1px solid #e9ecef;">
                                        <h5 class="modal-title" id="barcodeScannerModalTitle" style="font-size: 16px; font-weight: 600;">{{ __('skudomodule::insurance.scanner_title') }}</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="margin: 0; padding: 0;">
                                            <span aria-hidden="true" style="font-size: 24px;">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body" style="padding: 10px 15px;">
                                        <p class="text-muted mb-1" style="font-size: 12px; margin-bottom: 5px;">{{ __('skudomodule::insurance.scanner_hint') }}</p>
                                        <div id="barcodeScannerStatus" class="small text-muted mb-1 text-center" style="font-size: 11px; margin-bottom: 5px;">{{ __('skudomodule::insurance.scanner_starting') }}</div>
                                        <div id="barcodeScannerReader" style="width: 100%; margin: 0 auto; min-height: 120px; max-height: 140px; background: #000; border-radius: 8px; overflow: hidden; position: relative; aspect-ratio: 16/4;"></div>
                                        <div id="barcodeScannerError" class="alert alert-danger mt-1" style="display:none; padding: 6px 10px; font-size: 12px; margin-top: 5px;"></div>
                                        <div class="text-center mt-1" style="margin-top: 5px;">
                                            <p class="text-muted small" style="font-size: 10px; margin: 0;">
                                                <i class="glyphicon glyphicon-info-sign"></i>
                                                سيتم نسخ الكود تلقائياً عند قراءة الباركود
                                            </p>
                                        </div>
                                    </div>
                                    <div class="modal-footer" style="padding: 8px 15px; border-top: 1px solid #e9ecef;">
                                        <button type="button" id="stopScannerBtn" class="btn btn-warning btn-sm" style="display:none; padding: 5px 10px; font-size: 12px;">
                                            <i class="glyphicon glyphicon-stop"></i> إيقاف المسح
                                        </button>
                                        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal" style="padding: 5px 10px; font-size: 12px;">{{ __('skudomodule::insurance.scanner_close') }}</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

            </div>
        </div>
    </div>

@stop

@section('js')
    <script src="{{ asset('assets/admin/plugins/file-upload/file-upload-with-preview.js')}}"></script>
    <script>
        // Load QuaggaJS library
        (function() {
            function loadScript(src, callback) {
                const script = document.createElement('script');
                script.src = src;
                script.onload = function() {
                    if (callback) callback();
                };
                script.onerror = function() {
                    if (callback) callback(true);
                };
                document.head.appendChild(script);
            }
            
            if (typeof Quagga === 'undefined') {
                loadScript('https://cdnjs.cloudflare.com/ajax/libs/quagga/0.12.1/quagga.min.js', function(error) {
                    if (error) {
                         console.error('Failed to load QuaggaJS');
                    }
                });
            }
        })();
    </script>

    <script>
        // تهيئة front_image و back_image و invoice_image أولاً (يتم عرضهم يدوياً في القالب)
        new FileUploadWithPreview('front_image');
        new FileUploadWithPreview('device_back_image');
        new FileUploadWithPreview('back_image');
        new FileUploadWithPreview('invoice_image');
        
        // ثم تهيئة بقية الحقول (ما عدا front/back/invoice لأنهم تم تهيئتهم بالفعل)
        @foreach($fileInputs->filter(function($fi){ 
            return stripos($fi->key, 'qr') === false 
                && $fi->key !== 'warranty_image' 
                && !in_array($fi->key, ['front_image', 'device_back_image', 'back_image', 'invoice_image']); 
        }) as $input)
        new FileUploadWithPreview('{{ $input->key }}');
        @endforeach
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
            
            // عرض الـ Loader
            $('#formLoaderOverlay').addClass('active');
            
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
                timeout: 120000,
                processData: false,
                contentType: false,
                'statusCode': {
                    200: function (response) {
                        if (response.code === 201) {
                            // إخفاء الـ Loader
                            $('#formLoaderOverlay').removeClass('active');
                            toastr["error"](response.message);
                            submitter.text(oldText);
                            submitter.prop('disabled', false);
                        } else {
                            // تحديث نص الـ Loader للنجاح
                            $('.form-loader-text').text('تم التسجيل بنجاح!');
                            $('.form-loader-subtext').text('جاري التحويل...');
                            toastr["success"](response.message);

                            setTimeout(function () {
                                // إعادة التوجيه مع رقم الهاتف للبحث
                                let redirectUrl = "{{route('front.skudo.insurance.index')}}";
                                if (response.data && response.data.phone) {
                                    redirectUrl += "?q=" + encodeURIComponent(response.data.phone);
                                }
                                window.location = redirectUrl;
                            }, 3000);
                        }
                    },
                    422: function (response) {
                        // إخفاء الـ Loader
                        $('#formLoaderOverlay').removeClass('active');
                        $.map(response.responseJSON.errors, function (error) {
                            toastr["error"](error)
                        });
                        submitter.text(oldText);
                        submitter.prop('disabled', false);
                    }
                },
                error: function (xhr, textStatus, errorThrown) {
                    // إخفاء الـ Loader
                    $('#formLoaderOverlay').removeClass('active');
                    // Friendly hint for common mobile failure: large uploads => 413 or status 0.
                    if (xhr && xhr.status === 413) {
                        toastr["error"]("حجم الملفات كبير جداً. حاول تصغير الصور ثم أعد المحاولة.");
                    } else if (textStatus === 'timeout') {
                        toastr["error"]("انتهت مهلة الاتصال. تحقق من الإنترنت وحاول مرة أخرى.");
                    } else {
                        toastr["error"]("فشل الإرسال. حاول مرة أخرى.");
                    }

                    submitter.text(oldText);
                    submitter.prop('disabled', false);
                },
            });
        })

        // البحث عند النقر على زر البحث
        let isSearching = false;

        // Barcode scanner using QuaggaJS
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
            $('#barcodeScannerStatus').text('{{ __('skudomodule::insurance.scanner_starting') }}');

            // Wait for library to load
            if (typeof Quagga === 'undefined') {
                for (let i = 0; i < 10; i++) {
                    await new Promise(resolve => setTimeout(resolve, 200));
                    if (typeof Quagga !== 'undefined') break;
                }
                
                if (typeof Quagga === 'undefined') {
                    _scannerSetError('{{ __('skudomodule::insurance.scanner_not_supported') }}. يرجى تحديث الصفحة والمحاولة مرة أخرى.');
                    return;
                }
            }

            if (_scannerRunning) return;

            // Camera APIs require secure context (HTTPS) except localhost
            const host = (window.location && window.location.hostname) ? window.location.hostname : '';
            const isLocalhost = (host === 'localhost' || host === '127.0.0.1' || host === '[::1]');
            if (!window.isSecureContext && !isLocalhost) {
                _scannerSetError('{{ __('skudomodule::insurance.scanner_https_required') }}');
                return;
            }

            try {
                Quagga.init({
                    inputStream: {
                        name: "Live",
                        type: "LiveStream",
                        target: document.querySelector('#barcodeScannerReader'),
                        constraints: {
                            facingMode: "environment", // Use rear camera
                            width: 1280,
                            height: 720,
                            aspectRatio: { min: 1, max: 2 }
                        },
                    },
                    decoder: {
                        readers: [
                            "code_128_reader",
                            "ean_reader",
                            "ean_8_reader"
                        ],
                        debug: {
                            showCanvas: false,
                            showPatches: false,
                            showFoundPatches: false,
                            showSkeleton: false,
                            showLabels: false,
                            showPatchLabels: false,
                            showRemainingPatchLabels: false,
                            boxFromPatches: {
                                showTransformed: false,
                                showTransformedBox: false,
                                showBB: false
                            }
                        }
                    },
                    locate: true,
                    locator: {
                        patchSize: "medium",
                        halfSample: true
                    }
                }, function(err) {
                    if (err) {
                        console.error(err);
                        const msg = (err.name === 'NotAllowedError' || err.name === 'PermissionDeniedError')
                            ? '{{ __('skudomodule::insurance.scanner_permission_denied') }}'
                            : 'فشل تشغيل الكاميرا. يرجى التأكد من الصلاحيات.';
                        _scannerSetError(msg);
                        return;
                    }
                    
                    console.log("Initialization finished. Ready to start");
                    Quagga.start();
                    _scannerRunning = true;
                    
                    $('#barcodeScannerStatus').text('وجّه الكاميرا نحو الباركود...');
                    $('#stopScannerBtn').show();
                });

                let scannedOnce = false;
                let lastCode = null;
                let codeCount = 0;
                
                Quagga.onDetected(function(result) {
                    if (scannedOnce) return;
                    
                    const code = result.codeResult.code;
                    
                    // Simple validation: Ignore short codes (noise often produces 1-3 chars)
                    if (!code || code.length < 5) return;

                    // Consecutive scan validation to reduce false positives
                    if (code === lastCode) {
                        codeCount++;
                    } else {
                        lastCode = code;
                        codeCount = 0;
                        return;
                    }

                    // Require 3 consecutive identical reads to confirm
                    if (codeCount >= 2) {
                        console.log("Barcode confirmed: [" + code + "]", result);
                        scannedOnce = true;
                        
                        // Play a sound if possible (optional) or just vibrate
                        if (navigator.vibrate) navigator.vibrate(200);

                        stopBarcodeScanner(); // Stop scanning

                        // Populate and Trigger Search
                        $('#package_serial').val(code).trigger('input');
                        $('#barcodeScannerModal').modal('hide');
                        
                        if (typeof toastr !== 'undefined') {
                            toastr["success"]("تم مسح الباركود بنجاح: " + code);
                        }

                        setTimeout(() => {
                            $('#search_serial_btn').click();
                        }, 300);
                    }
                });

            } catch (e) {
                console.error(e);
                _scannerSetError('حدث خطأ غير متوقع أثناء تشغيل الماسح.');
                _scannerRunning = false;
            }
        }

        function stopBarcodeScanner() {
            if (_scannerRunning) {
                Quagga.stop();
                _scannerRunning = false;
            }
            $('#barcodeScannerReader').html(''); // Clear the video element
            $('#stopScannerBtn').hide();
            $('#barcodeScannerStatus').text('');
            
            // Remove event listeners
            Quagga.offDetected();
        }
        
        // Stop scanner button
        $('#stopScannerBtn').on('click', function() {
            stopBarcodeScanner();
        });
        
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
            // Check if library is loaded before opening modal
            if (typeof Quagga === 'undefined') {
                toastr["error"]('{{ __('skudomodule::insurance.scanner_not_supported') }}');
                return;
            }
            
            $('#barcodeScannerModal').modal('show');
            // IMPORTANT: start camera from the same user gesture (mobile Safari)
            // Small delay to ensure modal is fully shown
            setTimeout(async () => {
                await startBarcodeScanner();
            }, 300);
        });

        $('#barcodeScannerModal').on('hidden.bs.modal', function() {
            stopBarcodeScanner();
        });
        
        // Reset scanner state when modal is shown
        $('#barcodeScannerModal').on('show.bs.modal', function() {
            _scannerRunning = false;
            $('#stopScannerBtn').hide();
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
@endsection
