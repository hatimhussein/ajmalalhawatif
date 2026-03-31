@extends('commonmodule::layouts.master')

@section('css')
    <link rel="stylesheet" href="{{ asset('assets/admin/css/design-css/design.css')}}" type="text/css">
    <link rel="stylesheet" href="{{ asset('assets/admin/css/design-css/design-icons.css')}}" type="text/css">

    <!-- BEGIN PAGE LEVEL STYLES -->
    <link rel="stylesheet" href="{{ asset('assets/admin/plugins/file-upload/file-upload-with-preview.css')}}"
          type="text/css">
    <!--  BEGIN CUSTOM STYLE FILE  -->

    <link rel="stylesheet" href="{{ asset('assets/admin/plugins/select2/select2.min.css')}}" type="text/css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/css-toggle-switch/latest/toggle-switch.css" type="text/css">

    <!-- GLightbox CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/glightbox/dist/css/glightbox.min.css">

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

        /* Lightbox Styles */
        .lightbox-trigger {
            cursor: pointer;
            transition: opacity 0.3s ease;
        }

        .lightbox-trigger:hover {
            opacity: 0.8;
        }

        .custom-file-container__image-preview img,
        .custom-file-container__image-preview video {
            width: 100%;
            height: auto;
            cursor: pointer;
        }

        /* GLightbox RTL arrow fix (CSS-only) */
        .glightbox-clean .gprev svg,
        .glightbox-clean .gnext svg {
            transform: rotate(180deg);
        }

        .glightbox-clean .gprev {
            right: 30px;
            left: auto;
        }

        .glightbox-clean .gnext {
            left: 30px;
            right: auto;
        }

        .glightbox-clean .gslide-desc {
            color: black;
            font-weight: bold;
            font-size: 18px;
            text-align: center;
        }
    </style>
    <!--  END CUSTOM STYLE FILE  -->

    <!-- END PAGE LEVEL STYLES -->

@endsection


@section('title')
    {{__('skudomodule::insurance.update_insurance')}}
@endsection

@section('content')
    <div id="content" class="main-content">
        <div class="container">
            <div class="page-header">
                <div class="page-title">
                    <h3>{{__('skudomodule::admin.insurance')}}</h3>
                </div>
            </div>

            <div class=" widget-content widget-content-area">
                <div class="col-12">
                    <div class="layout-spacing">
                        <div class="statbox widget box box-shadow">
                            <div class="widget-header">
                                <div class="row">
                                    <div class="col-xl-9 col-md-9 col-sm-9 col-9">
                                        <h4>{{__('skudomodule::insurance.update_insurance')}}</h4>
                                    </div>
                                </div>
                            </div>

                            <div class="row">

                                <div class="col-xl-8 col-lg-8 col-12">
                                    <div class="row">
                                        <div class="col-md-12 text-center">
                                            <h2 class="legend">{{__('skudomodule::insurance.insurance_info')}}
                                                <i class="flaticon-file"></i>
                                            </h2>
                                        </div>
                                        <div class="col-md-12">

                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="statbox widget box box-shadow">
                                                        <label for="quote_number" style="font-weight: bold;">
                                                            {{__('warrantymodule::insurance.quote_number')}}:
                                                        </label>
                                                        <input type="text" readonly id="quote_number"
                                                               class="form-control"
                                                               value="{{ $insurance->id }}">
                                                    </div>

                                                    <div class="statbox widget box box-shadow">
                                                        <label for="created_at">
                                                            <b>{{__('skudomodule::insurance.sent_at')}}:</b>
                                                        </label>
                                                        <input type="date" readonly id="created_at"
                                                               class="form-control"
                                                               value="{{ $insurance->created_at ? $insurance->created_at->toDateString() : '' }}">
                                                    </div>

                                                    <div class="statbox widget box box-shadow">
                                                        <label for="user_name">
                                                            <b>{{__('warrantymodule::insurance.user_name')}}:</b>
                                                        </label>
                                                        <input type="text" readonly id="user_name"
                                                               class="form-control"
                                                               value="{{ $insurance->user_name }}">
                                                    </div>

                                                    <div class="statbox widget box box-shadow">
                                                        <label for="phone">
                                                            <b>{{__('warrantymodule::insurance.phone')}}:</b>
                                                        </label>
                                                        <input type="text" readonly id="phone"
                                                               class="form-control" dir="ltr"
                                                               value="{{ $insurance->phone ? ($insurance->phone_code->code ?? '') : '' }} {{ $insurance->phone }}">
                                                    </div>

                                                    <div class="statbox widget box box-shadow">
                                                        <label for="user_notes" style="font-weight: bold;">
                                                            {{__('warrantymodule::insurance.user_notes')}}:
                                                        </label>
                                                        <textarea readonly id="user_notes" rows="4"
                                                                  class="form-control">{{ $insurance->user_notes }}</textarea>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <!-- <div class="statbox widget box box-shadow">
                                                        <label for="usage_date" style="font-weight: bold;">
                                                            {{__('warrantymodule::insurance.usage_date')}}:
                                                        </label>
                                                        <input type="date" readonly id="usage_date"
                                                               class="form-control"
                                                               value="{{ $insurance->usage_date ? $insurance->usage_date->toDateString() : '' }}">
                                                    </div> -->

                                                    <div class="statbox widget box box-shadow">
                                                        <label for="dummy_text_1">
                                                            <b>الرقم التسلسلي للجهاز:</b>
                                                        </label>
                                                        <input type="text" readonly id="dummy_text_1"
                                                               class="form-control"
                                                               value="{{ $insurance->device_serial }}">
                                                    </div>

                                                    <div class="statbox widget box box-shadow">
                                                        <label for="dummy_text_1">
                                                            <b>الرقم التسلسلي للمنتج (البكج):</b>
                                                        </label>
                                                        <input type="text" readonly id="dummy_text_1"
                                                               class="form-control"
                                                               value="{{ $insurance->package_serial }}">
                                                    </div>

                                                    <div class="statbox widget box box-shadow">
                                                        <label for="item_number">
                                                            <b>رقم الصنف:</b>
                                                        </label>
                                                        <input type="text" readonly id="item_number"
                                                               class="form-control"
                                                               value="{{ $insurance->serialNumber->item_number ?? '-' }}">
                                                    </div>

                                                    <div class="statbox widget box box-shadow">
                                                        <label for="barcode">
                                                            <b>الباركود:</b>
                                                        </label>
                                                        <input type="text" readonly id="barcode"
                                                               class="form-control"
                                                               value="{{ $insurance->serialNumber->barcode ?? '-' }}">
                                                    </div>

                                                    <div class="statbox widget box box-shadow">
                                                        <label for="product_name_ar">
                                                            <b>اسم الصنف عربي:</b>
                                                        </label>
                                                        <input type="text" readonly id="product_name_ar"
                                                               class="form-control"
                                                               value="{{ $insurance->serialNumber->product_name_ar ?? '-' }}">
                                                    </div>
                                                    <div class="statbox widget box box-shadow">
                                                        <label for="product_name_en">
                                                            <b>اسم الصنف انجليزي:</b>
                                                        </label>
                                                        <input type="text" readonly id="product_name_en"
                                                               class="form-control"
                                                               value="{{ $insurance->serialNumber->product_name_en ?? '-' }}">
                                                    </div>
                                                    <div class="statbox widget box box-shadow">
                                                        <label for="serial_created_at">
                                                            <b>تاريخ اضافة الرقم التسلسلي:</b>
                                                        </label>
                                                        <input type="text" readonly id="serial_created_at"
                                                               class="form-control"
                                                               value="{{ $insurance->serialNumber->formatted_created_at ?? '-' }}">
                                                    </div>

                                                </div>
                                            </div>

                                        </div>

                                    </div>
                                </div>


                                <div class="col-xl-4 col-lg-4 col-12">
                                    <form action="{{route('skudo.insurance.update', $insurance->id)}}"
                                          class="col-12" method="POST"
                                          enctype="multipart/form-data"
                                          data-role="validator" data-on-before-submit="no_submit"
                                          data-on-error-input="notifyOnErrorInput"
                                          data-show-error-hint="false" novalidate="novalidate">
                                        @csrf
                                        @method('put')
                                        <div class="row mt-3">

                                            <div class="col-md-12 text-center">
                                                <h2 class="legend">{{__('warrantymodule::insurance.status')}}
                                                    <i class="flaticon-file"></i>
                                                </h2>
                                            </div>

                                            <div class="col-lg-12 text-center mb-4">
                                                <div class="statbox widget box box-shadow">
                                                    <div class="switch-toggle switch-2 switch-candy w-100 mt-4">
                                                        @if($insurance->isClosed())
                                                            <input id="closed" class="status-switch"
                                                                   name="status" type="radio" disabled checked/>
                                                            <label
                                                                for="closed">{{__('warrantymodule::insurance.closed')}}</label>

                                                            <input id="applicable" class="status-switch"
                                                                   name="status" type="radio" value="1" disabled/>
                                                            <label
                                                                for="applicable">{{__('warrantymodule::insurance.activated')}}</label>
                                                        @else
                                                            <input id="applicable" class="status-switch"
                                                                   name="status" type="radio" value="1"
                                                                {{ $insurance->status == 1 ? 'checked' : '' }}/>
                                                            <label
                                                                for="applicable">{{__('warrantymodule::insurance.activated')}}</label>

                                                            <input id="pending" class="status-switch"
                                                                   name="status" type="radio" value="3"
                                                                {{ $insurance->status == 3 ? 'checked' : '' }}/>
                                                            <label
                                                                for="pending">{{__('warrantymodule::admin.pending')}}</label>

                                                            <input id="not_applicable" class="status-switch"
                                                                   name="status" type="radio" value="2"
                                                                {{ $insurance->status === 2 ? 'checked' : '' }}/>
                                                            <label
                                                                for="not_applicable">{{__('warrantymodule::insurance.rejected')}}</label>

                                                            <input id="new" class="status-switch"
                                                                   name="status" type="radio" value="0"
                                                                {{$insurance->status === 0  ? 'checked' : '' }}/>
                                                            <label
                                                                for="pending">{{__('warrantymodule::admin.new')}}</label>
                                                        @endif

                                                        <a></a>
                                                    </div>
                                                </div>
                                            </div>

                                            @if($insurance->isClosed())
                                                @if($insurance->isFinalUsed())
                                                    <div class="col-md-12 mb-4 input-control status-tab" id="value-cont"
                                                         style="{{ $insurance->status == 1 ? '' : 'display: none' }}">
                                                        <div class="statbox widget box box-shadow">
                                                            <label for="replied_at" style="font-weight: bold;">
                                                                {{__('warrantymodule::sms_warranty.sms_warranty')}}:
                                                            </label>
                                                            <input type="text" disabled
                                                                   value="{{ $insurance->getRespondedWarranty()->first()->id }}"
                                                                   class="form-control" autocomplete="off">
                                                        </div>
                                                        <div class="statbox widget box box-shadow">
                                                            <label for="replied_at" style="font-weight: bold;">
                                                                {{__('warrantymodule::sms_warranty.status')}}:
                                                            </label>
                                                            <input type="text" disabled
                                                                   value="{{ __('warrantymodule::sms_warranty.'.$insurance->getRespondedWarranty()->first()->status_locale) }}"
                                                                   class="form-control" autocomplete="off">
                                                        </div>
                                                    </div>
                                                @else
                                                    <div class="col-md-12 mb-4 input-control status-tab" id="value-cont"
                                                         style="{{ $insurance->status == 1 ? '' : 'display: none' }}">
                                                        <div class="statbox widget box box-shadow">
                                                            <label for="replied_at" style="font-weight: bold;">
                                                                {{__('warrantymodule::insurance.replied_at')}}:
                                                            </label>
                                                            <input name="replied_at" id="replied_at" type="date"
                                                                   readonly
                                                                   disabled
                                                                   value="{{ $insurance->replied_at ? $insurance->replied_at->toDateString() : '' }}"
                                                                   class="form-control" autocomplete="off">
                                                        </div>

                                                        <div class="statbox widget box box-shadow">
                                                            <label for="application_number" style="font-weight: bold;">
                                                                {{__('warrantymodule::insurance.expire_date'),':'}}
                                                            </label>
                                                            <input name="expire_date" id="expire_date" type="date"
                                                                   readonly
                                                                   disabled
                                                                   value="{{ $insurance->expire_date ? $insurance->expire_date->toDateString() : '' }}"
                                                                   class="form-control" autocomplete="off">
                                                        </div>
                                                    </div>
                                                @endif
                                            @else
                                                <div class="col-md-12 mb-4 input-control status-tab" id="value-cont"
                                                     style="{{ $insurance->status == 1 ? '' : 'display: none' }}">
                                                    <div class="statbox widget box box-shadow">
                                                        <label for="replied_at" style="font-weight: bold;">
                                                            {{__('warrantymodule::insurance.replied_at')}}:
                                                        </label>
                                                        <input name="replied_at" id="replied_at" type="date" readonly
                                                               disabled
                                                               value="{{ $insurance->replied_at ? $insurance->replied_at->toDateString() : '' }}"
                                                               class="form-control" autocomplete="off">
                                                    </div>

                                                    <div class="statbox widget box box-shadow">
                                                        <label for="application_number" style="font-weight: bold;">
                                                            {{__('warrantymodule::insurance.expire_date'),':'}}
                                                        </label>
                                                        <input name="expire_date" id="expire_date" type="date" readonly
                                                               disabled
                                                               value="{{ $insurance->expire_date ? $insurance->expire_date->toDateString() : '' }}"
                                                               class="form-control" autocomplete="off">
                                                    </div>
                                                </div>
                                                <div class="col-md-12 mb-4 input-control status-tab"
                                                     id="store-reason-cont"
                                                     style="{{ $insurance->status == 0 ? '' : 'display: none' }}">
                                                    <div class="statbox widget box box-shadow">
                                                        <label for="store_reason" style="font-weight: bold;">
                                                            {{__('warrantymodule::insurance.store_reason')}}:
                                                        </label>
                                                        <textarea name="store_reason" id="store_reason"
                                                                  class="form-control"
                                                                  data-validate-func="{{ is_null($insurance->is_applicable) ? 'required' : '' }}"
                                                                  data-validate-arg="6"
                                                                  data-validate-hint="{{__('warrantymodule::admin.rreaseon')}} "
                                                                  placeholder="{{__('warrantymodule::insurance.store_reason')}}"
                                                                  rows="2">{{  $insurance->store_reason }}</textarea>
                                                        @if ($errors->has('store_reason'))
                                                            @include('commonmodule::includes.error',['errors'=>$errors->toArray(),'filed'=>'store_reason'])
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="col-md-12 mb-4 input-control status-tab"
                                                     id="reason-cont"
                                                     style="{{ ($insurance->status == 2) ? '' : 'display: none' }}">
                                                    <div class="statbox widget box box-shadow">
                                                        <label for="reason" style="font-weight: bold;">
                                                            {{__('warrantymodule::insurance.reason')}}:
                                                        </label>
                                                        <textarea name="reason" id="reason" class="form-control"
                                                                  data-validate-func="{{ ($insurance->is_applicable === 0) ? 'required' : '' }}"
                                                                  data-validate-arg="6"
                                                                  data-validate-hint="{{__('warrantymodule::admin.rreaseon')}} "
                                                                  placeholder="{{__('warrantymodule::insurance.reason')}}"
                                                                  rows="2">{{  $insurance->reason }}</textarea>
                                                        @if ($errors->has('reason'))
                                                            @include('commonmodule::includes.error',['errors'=>$errors->toArray(),'filed'=>'reason'])
                                                        @endif
                                                    </div>
                                                </div>
                                            @endif
                                        </div>
                                        @if(!$insurance->isClosed())
                                            {{-- device_back_image is client-only; admins must not upload it --}}
                                            <div class="row mt-3">
                                                <div class="col-12">
                                                    <button class="btn btn-gradient-danger mb-4"
                                                            type="submit">{{__('productmodule::category.save')}}</button>
                                                </div>
                                            </div>
                                        @endif
                                    </form>
                                </div>

                            </div>

                            <div class="row mt-5">
                                <div class="col-md-12 text-center">
                                    <h2 class="legend">{{__('usermodule::admin.attachment')}}
                                        <i class="flaticon-attachment"></i>
                                    </h2>
                                </div>
                                {{-- Always render 4 slots in a fixed order so GLightbox navigation matches review flow --}}
                                {{-- 1) front_image --}}
                                <div class="col-lg-3 col-md-6">
                                    <label style="font-weight: bold;">صورة الجهاز من الأمام بعد التركيب (تُظهر الرقم التسلسلي)</label>
                                    <div class="custom-file-container__image-preview product-list-img">
                                        @if($insurance->front_image)
                                            @if(is_video($insurance->front_image))
                                                <a href="{{asset('images/warranty/'.$insurance->front_image)}}" class="glightbox lightbox-trigger" data-gallery="insurance-gallery" data-glightbox="description: صورة الجهاز من الأمام بعد التركيب (تُظهر الرقم التسلسلي)">
                                                    <video>
                                                        <source src="{{asset('images/warranty/'.$insurance->front_image)}}" type="video/mp4">
                                                        <source src="{{asset('images/warranty/'.$insurance->front_image)}}" type="video/quicktime">
                                                        Your browser does not support the video tag.
                                                    </video>
                                                </a>
                                            @else
                                                <a href="{{asset('images/warranty/'.$insurance->front_image)}}" class="glightbox lightbox-trigger" data-gallery="insurance-gallery" data-glightbox="description: صورة الجهاز من الأمام بعد التركيب (تُظهر الرقم التسلسلي)">
                                                    <img src="{{asset('images/warranty/'.$insurance->front_image)}}" alt="صورة الجهاز من الأمام بعد التركيب"/>
                                                </a>
                                            @endif
                                        @else
                                            <div class="text-muted text-center py-4" style="width:100%;">{{ __('skudomodule::insurance.image_not_available') }}</div>
                                        @endif
                                    </div>
                                </div>

                                {{-- 2) device_back_image --}}
                                <div class="col-lg-3 col-md-6">
                                    <label style="font-weight: bold;">{{ __('skudomodule::insurance.device_back_image') }}</label>
                                    <div class="custom-file-container__image-preview product-list-img">
                                        @if($insurance->device_back_image)
                                            @if(is_video($insurance->device_back_image))
                                                <a href="{{asset('images/warranty/'.$insurance->device_back_image)}}" class="glightbox lightbox-trigger" data-gallery="insurance-gallery" data-glightbox="description: {{ __('skudomodule::insurance.device_back_image') }}">
                                                    <video>
                                                        <source src="{{asset('images/warranty/'.$insurance->device_back_image)}}" type="video/mp4">
                                                        <source src="{{asset('images/warranty/'.$insurance->device_back_image)}}" type="video/quicktime">
                                                        Your browser does not support the video tag.
                                                    </video>
                                                </a>
                                            @else
                                                <a href="{{asset('images/warranty/'.$insurance->device_back_image)}}" class="glightbox lightbox-trigger" data-gallery="insurance-gallery" data-glightbox="description: {{ __('skudomodule::insurance.device_back_image') }}">
                                                    <img src="{{asset('images/warranty/'.$insurance->device_back_image)}}" alt="{{ __('skudomodule::insurance.device_back_image') }}"/>
                                                </a>
                                            @endif
                                        @else
                                            <div class="text-muted text-center py-4" style="width:100%;">{{ __('skudomodule::insurance.image_not_available') }}</div>
                                        @endif
                                    </div>
                                </div>

                                {{-- 3) back_image --}}
                                <div class="col-lg-3 col-md-6">
                                    <label style="font-weight: bold;">صورة الرقم التسلسلي الموجود على المنتج (لبكج)</label>
                                    <div class="custom-file-container__image-preview product-list-img">
                                        @if($insurance->back_image)
                                            @if(is_video($insurance->back_image))
                                                <a href="{{asset('images/warranty/'.$insurance->back_image)}}" class="glightbox lightbox-trigger" data-gallery="insurance-gallery" data-glightbox="description: صورة الرقم التسلسلي الموجود على المنتج (لبكج)">
                                                    <video>
                                                        <source src="{{asset('images/warranty/'.$insurance->back_image)}}" type="video/mp4">
                                                        <source src="{{asset('images/warranty/'.$insurance->back_image)}}" type="video/quicktime">
                                                        Your browser does not support the video tag.
                                                    </video>
                                                </a>
                                            @else
                                                <a href="{{asset('images/warranty/'.$insurance->back_image)}}" class="glightbox lightbox-trigger" data-gallery="insurance-gallery" data-glightbox="description: صورة الرقم التسلسلي الموجود على المنتج (لبكج)">
                                                    <img src="{{asset('images/warranty/'.$insurance->back_image)}}" alt="صورة الرقم التسلسلي الموجود على المنتج"/>
                                                </a>
                                            @endif
                                        @else
                                            <div class="text-muted text-center py-4" style="width:100%;">{{ __('skudomodule::insurance.image_not_available') }}</div>
                                        @endif
                                    </div>
                                </div>

                                {{-- 4) invoice_image --}}
                                <div class="col-lg-3 col-md-6">
                                    <label style="font-weight: bold;">صورة الفاتورة</label>
                                    <div class="custom-file-container__image-preview product-list-img">
                                        @if($insurance->invoice_image)
                                            @if(is_video($insurance->invoice_image))
                                                <a href="{{asset('images/warranty/'.$insurance->invoice_image)}}" class="glightbox lightbox-trigger" data-gallery="insurance-gallery" data-glightbox="description: صورة الفاتورة">
                                                    <video>
                                                        <source src="{{asset('images/warranty/'.$insurance->invoice_image)}}" type="video/mp4">
                                                        <source src="{{asset('images/warranty/'.$insurance->invoice_image)}}" type="video/quicktime">
                                                        Your browser does not support the video tag.
                                                    </video>
                                                </a>
                                            @else
                                                <a href="{{asset('images/warranty/'.$insurance->invoice_image)}}" class="glightbox lightbox-trigger" data-gallery="insurance-gallery" data-glightbox="description: صورة الفاتورة">
                                                    <img src="{{asset('images/warranty/'.$insurance->invoice_image)}}" alt="صورة الفاتورة"/>
                                                </a>
                                            @endif
                                        @else
                                            <div class="text-muted text-center py-4" style="width:100%;">{{ __('skudomodule::insurance.image_not_available') }}</div>
                                        @endif
                                    </div>
                                </div>
                                {{-- warranty_image intentionally not shown for Skudo insurance to match client UI --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@stop

@section('js')

    <script src="{{ asset('assets/admin/js/design-js/design.js')}}"></script>
    <script src="{{ asset('assets/admin/js/forms/form_validation/form_validation_material.js')}}"></script>

    <!-- GLightbox JS -->
    <script src="https://cdn.jsdelivr.net/npm/glightbox/dist/js/glightbox.min.js"></script>

    <script>
        const is_applicable = document.querySelector('#is_applicable');
        $(is_applicable).change(() => {
            console.log($(is_applicable).val());
            if ($(is_applicable).is(':checked')) {
                $('#value-cont').show();
                $('#reason-cont').hide();
            } else {
                $('#value-cont').hide();
                $('#reason-cont').show()
            }
        })
    </script>

    <script>
        const status = '.status-switch';

        $(status).change(function () {

            if (!$(this).is(':checked')) {
                return true;
            }

            const checkedVal = parseInt($(this).val());

            if (checkedVal === 1) {
                $('#value-cont').show();
                $('#store-reason-cont').hide()
                $('#reason-cont').hide();
            } else if (checkedVal === 2) {
                $('#value-cont').hide();
                $('#store-reason-cont').hide()
                $('#reason-cont').show()
            }
            else {
                $('#value-cont').hide();
                $('#reason-cont').hide()
                $('#store-reason-cont').show()
            }
            $('.status-tab:visible input, .status-tab:visible textarea').each((i, item) => {
                $(item).data('validate-func', 'required');
            });

            $('.status-tab:hidden input, .status-tab:hidden textarea').each((i, item) => {
                $(item).data('validate-func', '');
            });
        })
    </script>

    <script>
        // Initialize GLightbox
        const lightbox = GLightbox({
            selector: '.glightbox',
            touchNavigation: true,
            loop: true,
            autoplayVideos: true,
            closeButton: true,
            zoomable: true,
            draggable: true,
            skin: 'clean',
            plyr: {
                config: {
                    ratio: '16:9',
                    muted: false,
                    hideControls: true,
                    youtube: {
                        noCookie: true,
                        rel: 0,
                        showinfo: 0,
                        iv_load_policy: 3
                    },
                    vimeo: {
                        byline: false,
                        portrait: false,
                        title: false,
                        speed: true,
                        transparent: false
                    }
                }
            }
        });
    </script>
@endsection
