@extends('fronthomemodule::layouts.master')

@section('title')
    {{__('commonmodule::front.warranty')}}
@endsection

@section('css')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet"/>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/0.8.2/css/flag-icon.min.css" rel="stylesheet"/>
    <link rel="stylesheet" href="{{ asset('assets/admin/plugins/file-upload/file-upload-with-preview.css')}}"
          type="text/css">
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
                        
                        @if(!auth()->check())
                            <div class="alert alert-info">
                                <strong>{{ __('skudomodule::insurance.guest_notice') }}</strong>
                                <p>{{ __('skudomodule::insurance.guest_notice_text') }}</p>
                            </div>
                        @endif
                        
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
                                        @if(isset($firstDeviceKey))
                                            <div class="form-group">
                                                @include("warrantymodule::front.includes.input", ['input' => $inputs->where('key', $firstDeviceKey)->first(), 'localeFile' => 'insurance'])
                                            </div>
                                        @else
                                            <div class="form-group">
                                                <label for="device_serial" class="required">الرقم التسلسلي للجهاز</label>
                                                <input type="text" name="device_serial" id="device_serial" class="form-control" maxlength="100" placeholder="الرقم التسلسلي للجهاز">
                                            </div>
                                        @endif
                                    </div>
                                    <div class="col-md-6">
                                        @if(isset($firstPackageKey))
                                            <div class="form-group">
                                                @include("warrantymodule::front.includes.input", ['input' => $inputs->where('key', $firstPackageKey)->first(), 'localeFile' => 'insurance'])
                                            </div>
                                        @else
                                            <div class="form-group">
                                                <label for="package_serial" class="required">الرقم التسلسلي للمنتج (البكج)</label>
                                                <input type="text" name="package_serial" id="package_serial" class="form-control" maxlength="100" placeholder="الرقم التسلسلي للمنتج (البكج)">
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

                                    {{-- Render any remaining file inputs if exist --}}
                                    @foreach($fileInputs as $fi)
                                        @if(!in_array($fi->key, ['front_image','back_image']))
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
    </script>

    @include('usermodule::front.auth.phone_code_scripts')

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
    </script>
@endsection
