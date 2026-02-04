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

    </style>
    <!--  END CUSTOM STYLE FILE  -->

    <!-- END PAGE LEVEL STYLES -->

@endsection


@section('title')
    {{__('warrantymodule::' . $localeFile . '.update_warranty')}}
@endsection

@section('content')
    <div id="content" class="main-content">
        <div class="container">
            <div class="page-header">
                <div class="page-title">
                    <h3>{{__('warrantymodule::admin.warranty')}}</h3>
                </div>
            </div>

            <div class=" widget-content widget-content-area">
                <div class="col-12">
                    <div class="layout-spacing">
                        <div class="statbox widget box box-shadow">
                            <div class="widget-header">
                                <div class="row">
                                    <div class="col-xl-9 col-md-9 col-sm-9 col-9">
                                        <h4>{{__('warrantymodule::' . $localeFile . '.update_warranty')}}</h4>
                                    </div>
                                </div>
                            </div>

                            <div class="row">

                                <div class="col-xl-7 col-lg-8 col-12">
                                    <div class="row">
                                        <div class="col-md-12 text-center">
                                            <h2 class="legend">{{__('warrantymodule::' . $localeFile . '.main_info')}}
                                                <i class="flaticon-file"></i>
                                            </h2>
                                        </div>
                                        <div class="col-md-12">

                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="statbox widget box box-shadow">
                                                        <label for="quote_number" style="font-weight: bold;">
                                                            رقم المطالبة:
                                                        </label>
                                                        <input type="text" readonly id="quote_number"
                                                               class="form-control"
                                                               value="{{ $warranty->id }}">
                                                    </div>

                                                    <div class="statbox widget box box-shadow">
                                                        <label for="company_name">
                                                            <b>{{__('warrantymodule::' . $localeFile . '.company_name')}}:</b>
                                                        </label>
                                                        <input type="text" readonly id="company_name"
                                                               class="form-control"
                                                               value="{{ $warranty->merchant->company_name ?? '' }}">
                                                    </div>

                                                    <div class="statbox widget box box-shadow">
                                                        <label for="company_account" style="font-weight: bold;">
                                                            {{__('warrantymodule::' . $localeFile . '.company_account')}}:
                                                        </label>
                                                        <input type="text" readonly id="company_account"
                                                               class="form-control"
                                                               value="{{ $warranty->merchant->account_number ?? '' }}">
                                                    </div>

                                                    <div class="statbox widget box box-shadow">
                                                        <label for="created_at" style="font-weight: bold;">
                                                        تاريخ ووقت التركيب:
                                                        </label>
                                                        <input type="datetime" readonly id="created_at"
                                                               class="form-control"
                                                               value="{{ $warranty->created_at }}">
                                                    </div>

                                                    @if($warranty->type == 'sms')
                                                        <div class="statbox widget box box-shadow">
                                                            <label for="user_notes" style="font-weight: bold;">
                                                                {{__('warrantymodule::' . $localeFile . '.user_notes')}}:
                                                            </label>
                                                            <textarea readonly id="user_notes" rows="6"
                                                                      class="form-control">{{ $warranty->user_notes }}</textarea>
                                                        </div>
                                                    @endif
                                                </div>
                                                <div class="col-lg-6">
                                                    @if($warranty->type == 'sms')
                                                        <div class="statbox widget box box-shadow">
                                                            <label for="warranty_number" style="font-weight: bold;">
                                                                رقم تسجيل الضمان:
                                                            </label>
                                                            <input type="text" readonly id="warranty_number"
                                                                   class="form-control"
                                                                   value="{{ $warranty->insurance_id }}">
                                                        </div>

                                                        <div class="statbox widget box box-shadow">
                                                            <label for="user_name">
                                                                <b>{{__('warrantymodule::' . $localeFile . '.user_name')}}:</b>
                                                            </label>
                                                            <input type="text" readonly id="user_name"
                                                                   class="form-control"
                                                                   value="{{ $warranty->user_name }}">
                                                        </div>

                                                        <div class="statbox widget box box-shadow">
                                                            <label for="phone" style="font-weight: bold;">
                                                                {{__('warrantymodule::' . $localeFile . '.phone')}}:
                                                            </label>
                                                            <input type="text" readonly id="phone"
                                                                   class="form-control" dir="ltr"
                                                                   value="{{ $warranty->phone_code->code ?? '' }} {{ $warranty->phone }}">
                                                        </div>
                                                    @endif

                                                    {{--
                                                    <div class="statbox widget box box-shadow">
                                                        <label for="usage_date">
                                                            <b>{{__('skudomodule::warranty.sent_at')}}:</b>
                                                        </label>
                                                        <input type="date" readonly id="usage_date"
                                                               class="form-control"
                                                               value="{{ $warranty->insurance && $warranty->insurance->created_at ? $warranty->insurance->created_at->toDateString() : '' }}">
                                                    </div>
                                                    --}}

                                                    <div class="statbox widget box box-shadow">
                                                        <label for="dummy_text_1">
                                                            <b>{{__('warrantymodule::' . $localeFile . '.dummy_text_1')}}:</b>
                                                        </label>
                                                        <input type="text" readonly id="dummy_text_1"
                                                               class="form-control"
                                                               value="{{ $warranty->dummy_text_1 }}">
                                                    </div>

                                                    <div class="statbox widget box box-shadow">
                                                        <label for="dummy_text_2">
                                                            <b>{{__('warrantymodule::' . $localeFile . '.dummy_text_2')}}:</b>
                                                        </label>
                                                        <input type="text" readonly id="dummy_text_2"
                                                               class="form-control"
                                                               value="{{ $warranty->dummy_text_2 }}">
                                                    </div>

                                                    <div class="statbox widget box box-shadow">
                                                        <label for="dummy_text_3">
                                                            <b>{{__('warrantymodule::' . $localeFile . '.dummy_text_3')}}:</b>
                                                        </label>
                                                        <input type="text" readonly id="dummy_text_3"
                                                               class="form-control"
                                                               value="{{ $warranty->dummy_text_3 }}">
                                                    </div>
                                                </div>
                                                <div class="col-lg-12">
                                                    @if($warranty->type == 'card')
                                                        <div class="statbox widget box box-shadow">
                                                            <label for="user_notes" style="font-weight: bold;">
                                                                {{__('warrantymodule::' . $localeFile . '.user_notes')}}:
                                                            </label>
                                                            <textarea readonly id="user_notes" rows="4"
                                                                      class="form-control">{{ $warranty->user_notes }}</textarea>
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>

                                        </div>

                                    </div>
                                </div>


                                <div class="col-xl-5 col-lg-4 col-12">
                                    <form action="{{route('skudo.warranty.update', $warranty->id)}}"
                                          class="col-12" method="POST"
                                          data-role="validator" data-on-before-submit="no_submit"
                                          data-on-error-input="notifyOnErrorInput"
                                          data-show-error-hint="false" novalidate="novalidate"
                                          enctype="multipart/form-data">
                                        @csrf
                                        @method('put')
                                        <div class="row mt-3">

                                            <div class="col-md-12 text-center">
                                                <h2 class="legend">{{__('warrantymodule::admin.head_applicable')}}
                                                    <i class="flaticon-file"></i>
                                                </h2>
                                            </div>

                                            <div class="col-lg-12 text-center mb-4">
                                                <div class="statbox widget box box-shadow">
                                                    <div class="switch-toggle switch-2 switch-candy w-100 mt-4">


                                                        <input id="not_applicable" class="is_applicable-switch"
                                                               name="is_applicable" type="radio" value="0"
                                                            {{ $warranty->is_applicable === 0 ? 'checked' : '' }}/>
                                                        <label
                                                            for="not_applicable">{{__('warrantymodule::admin.not_applicable')}}</label>


                                                        <input id="applicable" class="is_applicable-switch"
                                                        name="is_applicable" type="radio" value="1"
                                                        {{ $warranty->is_applicable === 1 ?  'checked' : '' }}/>
                                                        <label
                                                        for="applicable">{{__('warrantymodule::admin.applicable')}}</label>


                                                        <input id="pending" class="is_applicable-switch"
                                                               name="is_applicable" type="radio" value="2"
                                                            {{ ($warranty->is_applicable) == 2 ? 'checked' : '' }}/>
                                                        <label
                                                            for="pending">{{__('warrantymodule::admin.pending')}}</label>

                                                        <input id="new" class="is_applicable-switch"
                                                               name="is_applicable" type="radio" value=""
                                                              {{ is_null($warranty->is_applicable) ? 'checked' : '' }}/>
                                                        <label
                                                            for="pending">{{__('warrantymodule::admin.new')}}</label>


                                                        <a></a>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-12 mb-4 input-control status-tab" id="value-cont"
                                                 style="{{ $warranty->is_applicable ? '' : 'display: none' }}">
                                                <div class="statbox widget box box-shadow">
                                                    <label for="value" style="font-weight: bold;">
                                                        {{__('warrantymodule::' . $localeFile . '.value')}}:
                                                    </label>
                                                    <input type="number" name="value" id="value"
                                                           value="{{ old('value') ?? $warranty->value }}"
                                                           class="form-control"
                                                           data-validate-func="{{ $warranty->is_applicable ? 'required' : '' }}"
                                                           data-validate-arg="6"
                                                           data-validate-hint="{{__('warrantymodule::admin.rvalue')}} "
                                                           placeholder="{{__('warrantymodule::' . $localeFile . '.value')}}"
                                                           autocomplete="off">
                                                    @if ($errors->has('value'))
                                                        @include('commonmodule::includes.error',['errors'=>$errors->toArray(),'filed'=>'value'])
                                                    @endif
                                                </div>

                                                <div class="statbox widget box box-shadow">
                                                    <label for="application_number" style="font-weight: bold;">
                                                        {{__('warrantymodule::' . $localeFile . '.application_number'),':'}}
                                                    </label>
                                                    <input name="application_number" id="application_number"
                                                           value="{{ old('application_number') ?? $warranty->application_number }}"
                                                           class="form-control"
                                                           data-validate-func="{{ $warranty->is_applicable ? 'required' : '' }}"
                                                           data-validate-arg="6"
                                                           data-validate-hint="{{__('warrantymodule::admin.rapplication_number')}} "
                                                           placeholder="{{__('warrantymodule::' . $localeFile . '.application_number')}}"
                                                           autocomplete="off">
                                                    @if ($errors->has('application_number'))
                                                        @include('commonmodule::includes.error',['errors'=>$errors->toArray(),'filed'=>'application_number'])
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-md-12 mb-4 input-control status-tab"
                                                 id="store-reason-cont"
                                                 style="{{ is_null($warranty->is_applicable) ? '' : 'display: none' }}">
                                                <div class="statbox widget box box-shadow">
                                                    <label for="store_reason" style="font-weight: bold;">
                                                        {{__('warrantymodule::' . $localeFile . '.store_reason')}}:
                                                    </label>
                                                    <textarea name="store_reason" id="store_reason" class="form-control"
                                                              data-validate-func="{{ is_null($warranty->is_applicable) ? 'required' : '' }}"
                                                              data-validate-arg="6"
                                                              data-validate-hint="{{__('warrantymodule::admin.rreaseon')}} "
                                                              placeholder="{{__('warrantymodule::' . $localeFile . '.store_reason')}}"
                                                              rows="2">{{  $warranty->store_reason }}</textarea>
                                                    @if ($errors->has('store_reason'))
                                                        @include('commonmodule::includes.error',['errors'=>$errors->toArray(),'filed'=>'store_reason'])
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-md-12 mb-4 input-control status-tab"
                                                 id="reason-cont"
                                                 style="{{ ($warranty->is_applicable !== 0) ? 'display: none' : '' }}">
                                                <div class="statbox widget box box-shadow">
                                                    <label for="reason" style="font-weight: bold;">
                                                        {{__('warrantymodule::' . $localeFile . '.reason')}}:
                                                    </label>
                                                    <textarea name="reason" id="reason" class="form-control"
                                                              data-validate-func="{{ ($warranty->is_applicable === 0) ? 'required' : '' }}"
                                                              data-validate-arg="6"
                                                              data-validate-hint="{{__('warrantymodule::admin.rreaseon')}} "
                                                              placeholder="{{__('warrantymodule::' . $localeFile . '.reason')}}"
                                                              rows="2">{{  $warranty->reason }}</textarea>
                                                    @if ($errors->has('reason'))
                                                        @include('commonmodule::includes.error',['errors'=>$errors->toArray(),'filed'=>'reason'])
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <!-- حالة التحويل وملف الإيصال - تظهر فقط عند الضمان المطبق -->
                                        <div class="row mt-3 input-control status-tab" id="transfer-cont"
                                             style="{{ $warranty->is_applicable ? 'display: flex' : 'display: none' }}">
                                            <div class="col-lg-6">
                                                <div class="statbox widget box box-shadow">
                                                    <label for="transfer_status">
                                                        <b>{{__('skudomodule::warranty.transfer_status')}}:</b>
                                                    </label>
                                                    <select name="transfer_status" id="transfer_status" class="form-control">
                                                        <option value="">{{__('skudomodule::warranty.transfer_pending')}}</option>
                                                        <option value="1" {{ $warranty->transfer_status === 1 ? 'selected' : '' }}>
                                                            {{__('skudomodule::warranty.transfer_completed')}}
                                                        </option>
                                                        <option value="0" {{ $warranty->transfer_status === 0 ? 'selected' : '' }}>
                                                            {{__('skudomodule::warranty.transfer_not_completed')}}
                                                        </option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-lg-6">
                                                <div class="statbox widget box box-shadow">
                                                    <label for="transfer_receipt">
                                                        <b>{{__('skudomodule::warranty.transfer_receipt')}}:</b>
                                                    </label>
                                                    @if($warranty->transfer_receipt)
                                                        <div class="mb-2">
                                                            <a href="{{ asset('images/warranty/' . $warranty->transfer_receipt) }}" 
                                                               target="_blank" class="btn btn-sm btn-info">
                                                                <i class="flaticon-eye"></i> عرض الملف
                                                            </a>
                                                        </div>
                                                    @endif
                                                    <input type="file" name="transfer_receipt" id="transfer_receipt" 
                                                           class="form-control" accept=".pdf,.jpg,.jpeg,.png">
                                                    <small class="text-muted">PDF أو صورة (JPG, PNG)</small>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="row mt-3">
                                            <div class="col-12">
                                                <button class="btn btn-gradient-danger mb-4"
                                                        type="submit">{{__('productmodule::category.save')}}</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>

                            </div>

                            <div class="row mt-5">
                                <div class="col-md-12 text-center">
                                    <h2 class="legend">{{__('usermodule::admin.attachment')}}
                                        <i class="flaticon-attachment"></i>
                                    </h2>
                                </div>

                                {{-- Row 1: broken device image (client upload) --}}
                                <div class="col-lg-12">
                                    <label style="font-weight: bold;"> {{ __('skudomodule::warranty.broken_device_image') }}</label>
                                    <div class="custom-file-container__image-preview product-list-img">
                                    @if($warranty->broken_device_image)
                                            @if(is_video($warranty->broken_device_image))
                                                <a href="{{asset('images/warranty/'.$warranty->broken_device_image)}}" class="glightbox lightbox-trigger" data-gallery="warranty-gallery">
                                                    <video>
                                                        <source src="{{asset('images/warranty/'.$warranty->broken_device_image)}}" type="video/mp4">
                                                        <source src="{{asset('images/warranty/'.$warranty->broken_device_image)}}" type="video/quicktime">
                                                        Your browser does not support the video tag.
                                                    </video>
                                                </a>
                                            @else
                                                <a href="{{asset('images/warranty/'.$warranty->broken_device_image)}}" class="glightbox lightbox-trigger" data-gallery="warranty-gallery" data-glightbox="description: {{ __('skudomodule::warranty.broken_device_image') }}">
                                                    <img src="{{asset('images/warranty/'.$warranty->broken_device_image)}}" alt="{{ __('skudomodule::warranty.broken_device_image') }}"/>
                                                </a>
                                            @endif
                                        @else
                                            <div class="text-muted text-center py-4" style="width:100%;">{{ __('skudomodule::warranty.image_not_available') }}</div>
                                            @endif
                                        </div>
                                </div>

                                <div class="w-100"></div>

                                {{-- Row 2: 4 insurance registration images (same order as client insurance UI) --}}
                                @php $ins = $warranty->insurance; @endphp
                                <div class="col-lg-3">
                                        <label style="font-weight: bold;"> صورة الجهاز من الأمام بعد التركيب (تُظهر الرقم التسلسلي)</label>
                                    <div class="custom-file-container__image-preview product-list-img">
                                        @if($ins && $ins->front_image)
                                            @if(is_video($ins->front_image))
                                                <a href="{{asset('images/warranty/'.$ins->front_image)}}" class="glightbox lightbox-trigger" data-gallery="warranty-gallery">
                                                    <video>
                                                        <source src="{{asset('images/warranty/'.$ins->front_image)}}" type="video/mp4">
                                                        <source src="{{asset('images/warranty/'.$ins->front_image)}}" type="video/quicktime">
                                                        Your browser does not support the video tag.
                                                    </video>
                                                </a>
                                            @else
                                                <a href="{{asset('images/warranty/'.$ins->front_image)}}" class="glightbox lightbox-trigger" data-gallery="warranty-gallery" data-glightbox="description: صورة الجهاز من الأمام بعد التركيب (تُظهر الرقم التسلسلي)">
                                                    <img src="{{asset('images/warranty/'.$ins->front_image)}}" alt="صورة الجهاز من الامام"/>
                                                </a>
                                            @endif
                                        @else
                                            <div class="text-muted text-center py-4" style="width:100%;">{{ __('skudomodule::insurance.image_not_available') }}</div>
                                        @endif
                                    </div>
                                        </div>

                                <div class="col-lg-3">
                                    <label style="font-weight: bold;"> {{ __('skudomodule::insurance.device_back_image') }}</label>
                                    <div class="custom-file-container__image-preview product-list-img">
                                        @if($ins && $ins->device_back_image)
                                            @if(is_video($ins->device_back_image))
                                                <a href="{{asset('images/warranty/'.$ins->device_back_image)}}" class="glightbox lightbox-trigger" data-gallery="warranty-gallery">
                                                    <video>
                                                        <source src="{{asset('images/warranty/'.$ins->device_back_image)}}" type="video/mp4">
                                                        <source src="{{asset('images/warranty/'.$ins->device_back_image)}}" type="video/quicktime">
                                                        Your browser does not support the video tag.
                                                    </video>
                                                </a>
                                            @else
                                                <a href="{{asset('images/warranty/'.$ins->device_back_image)}}" class="glightbox lightbox-trigger" data-gallery="warranty-gallery" data-glightbox="description: {{ __('skudomodule::insurance.device_back_image') }}">
                                                    <img src="{{asset('images/warranty/'.$ins->device_back_image)}}" alt="{{ __('skudomodule::insurance.device_back_image') }}"/>
                                                </a>
                                            @endif
                                        @else
                                            <div class="text-muted text-center py-4" style="width:100%;">{{ __('skudomodule::insurance.image_not_available') }}</div>
                                    @endif
                                    </div>
                                </div>

                                <div class="col-lg-3">
                                    <label style="font-weight: bold;"> {{ __('skudomodule::insurance.back_image') }}</label>
                                    <div class="custom-file-container__image-preview product-list-img">
                                        @if($ins && $ins->back_image)
                                            @if(is_video($ins->back_image))
                                                <a href="{{asset('images/warranty/'.$ins->back_image)}}" class="glightbox lightbox-trigger" data-gallery="warranty-gallery">
                                                    <video>
                                                        <source src="{{asset('images/warranty/'.$ins->back_image)}}" type="video/mp4">
                                                        <source src="{{asset('images/warranty/'.$ins->back_image)}}" type="video/quicktime">
                                                        Your browser does not support the video tag.
                                                    </video>
                                                </a>
                                            @else
                                                <a href="{{asset('images/warranty/'.$ins->back_image)}}" class="glightbox lightbox-trigger" data-gallery="warranty-gallery" data-glightbox="description: {{ __('skudomodule::insurance.back_image') }}">
                                                    <img src="{{asset('images/warranty/'.$ins->back_image)}}" alt="{{ __('skudomodule::insurance.back_image') }}"/>
                                                </a>
                                            @endif
                                        @else
                                            <div class="text-muted text-center py-4" style="width:100%;">{{ __('skudomodule::insurance.image_not_available') }}</div>
                                            @endif
                                        </div>
                                </div>

                                <div class="col-lg-3">
                                        <label style="font-weight: bold;"> صورة الفاتورة</label>
                                    <div class="custom-file-container__image-preview product-list-img">
                                        @if($ins && $ins->invoice_image)
                                            @if(is_video($ins->invoice_image))
                                                <a href="{{asset('images/warranty/'.$ins->invoice_image)}}" class="glightbox lightbox-trigger" data-gallery="warranty-gallery">
                                                    <video>
                                                        <source src="{{asset('images/warranty/'.$ins->invoice_image)}}" type="video/mp4">
                                                        <source src="{{asset('images/warranty/'.$ins->invoice_image)}}" type="video/quicktime">
                                                        Your browser does not support the video tag.
                                                    </video>
                                                </a>
                                            @else
                                                <a href="{{asset('images/warranty/'.$ins->invoice_image)}}" class="glightbox lightbox-trigger" data-gallery="warranty-gallery" data-glightbox="description: صورة الفاتورة">
                                                    <img src="{{asset('images/warranty/'.$ins->invoice_image)}}" alt="صورة الفاتورة"/>
                                                </a>
                                            @endif
                                        @else
                                            <div class="text-muted text-center py-4" style="width:100%;">{{ __('skudomodule::insurance.image_not_available') }}</div>
                                            @endif
                                        </div>
                                </div>
                            </div>

                            <!-- قسم البيانات البنكية -->
                            <div class="row mt-5">
                                <div class="col-md-12 text-center">
                                    <h2 class="legend">{{__('skudomodule::warranty.bank_info')}}
                                        <i class="flaticon-credit-card"></i>
                                    </h2>
                                </div>

                                <div class="col-lg-3">
                                    <div class="statbox widget box box-shadow">
                                        <label for="bank_name">
                                            <b>{{__('skudomodule::warranty.bank_name')}}:</b>
                                        </label>
                                        <input type="text" readonly id="bank_name"
                                               class="form-control"
                                               value="{{ $warranty->bank_name ?? '' }}">
                                    </div>
                                </div>

                                <div class="col-lg-3">
                                    <div class="statbox widget box box-shadow">
                                        <label for="account_holder_name">
                                            <b>{{__('skudomodule::warranty.account_holder_name')}}:</b>
                                        </label>
                                        <input type="text" readonly id="account_holder_name"
                                               class="form-control"
                                               value="{{ $warranty->account_holder_name ?? '' }}">
                                    </div>
                                </div>

                                <div class="col-lg-3">
                                    <div class="statbox widget box box-shadow">
                                        <label for="bank_account_number">
                                            <b>{{__('skudomodule::warranty.bank_account_number')}}:</b>
                                        </label>
                                        <input type="text" readonly id="bank_account_number"
                                               class="form-control"
                                               value="{{ $warranty->bank_account_number ?? '' }}">
                                    </div>
                                </div>

                                <div class="col-lg-3">
                                    <div class="statbox widget box box-shadow">
                                        <label for="iban_number">
                                            <b>{{__('skudomodule::warranty.iban_number')}}:</b>
                                        </label>
                                        <input type="text" readonly id="iban_number"
                                               class="form-control"
                                               value="{{ $warranty->iban_number ?? '' }}">
                                    </div>
                                </div>
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
