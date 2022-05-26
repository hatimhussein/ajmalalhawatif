@extends('commonmodule::layouts.master')

@section('css')
    <link rel="stylesheet" href="{{ asset('assets/admin/css/design-css/design.css')}}" type="text/css">
    <link rel="stylesheet" href="{{ asset('assets/admin/css/design-css/design-icons.css')}}" type="text/css">

    <!-- BEGIN PAGE LEVEL STYLES -->
    <link rel="stylesheet" href="{{ asset('assets/admin/plugins/file-upload/file-upload-with-preview.css')}}"
          type="text/css">
    <!--  BEGIN CUSTOM STYLE FILE  -->

    <link rel="stylesheet" href="{{ asset('assets/admin/plugins/select2/select2.min.css')}}" type="text/css">

    <style>
        .row [class*="col-"] .widget .widget-header h4 {
            color: #00d1c1;
        }
    </style>
    <!--  END CUSTOM STYLE FILE  -->

    <!-- END PAGE LEVEL STYLES -->

@endsection


@section('title')
    {{__('productfeaturemodule::admin.add_new_catalog')}}
@endsection

@section('content')
    <div id="content" class="main-content">
        <div class="container">
            <div class="page-header">
                <div class="page-title">
                    <h3>{{__('productfeaturemodule::admin.catalogs')}}</h3>
                </div>
            </div>

            <div class="row">
                <form action="{{ route('catalog.store') }}" class="col-lg-12" method="POST" data-role="validator"
                      data-on-before-submit="no_submit" data-on-error-input="notifyOnErrorInput"
                      data-show-error-hint="false" enctype="multipart/form-data"
                      novalidate="novalidate">
                    @csrf

                    <div class="layout-spacing">
                        <div class="statbox widget box box-shadow">
                            <div class="widget-header">
                                <div class="row">
                                    <div class="col-xl-9 col-md-9 col-sm-9 col-9">
                                        <h4>{{__('productfeaturemodule::admin.add_new_catalog')}}</h4>
                                    </div>
                                </div>
                            </div>

                            <div class="widget-content widget-content-area">

                                <div class="row">

                                    <div class="col-xl-9 col-lg-9 col-12 ">
                                        <div class="statbox widget box box-shadow">
                                            <div class="simple-tab">
                                                <ul class="nav nav-tabs  mb-3 mt-3" id="simpletab" role="tablist">
                                                    <li class="nav-item">
                                                        <a class="nav-link active" id="home-tab" data-toggle="tab"
                                                           href="#arabic" role="tab" aria-controls="arabic"
                                                           aria-selected="true">{{__('productmodule::category.info_ar')}} </a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link" id="profile-tab" data-toggle="tab"
                                                           href="#english" role="tab" aria-controls="english"
                                                           aria-selected="false">{{__('productmodule::category.info_en')}} </a>
                                                    </li>
                                                </ul>


                                                <div class="tab-content" id="simpletabContent">
                                                    <div class="tab-pane fade show active" id="arabic" role="tabpanel"
                                                         aria-labelledby="arabic-tab">
                                                        <div class="form-row">
                                                            <label
                                                                class="col-md-12">{{__('productfeaturemodule::admin.name_ar')}}</label>
                                                            <div class="input-control required col-md-12 mb-4 required">
                                                                <input name="name_ar" value="{{ old('name_ar') }}"
                                                                       class="form-control"
                                                                       data-validate-func="required"
                                                                       data-validate-arg="6"
                                                                       data-validate-hint="{{__('productfeaturemodule::admin.rname_ar')}} "
                                                                       placeholder="{{__('productfeaturemodule::admin.name_ar')}}"
                                                                       autocomplete="off">
                                                                @if ($errors->has('name_ar'))
                                                                    @include('commonmodule::includes.error',['errors'=>$errors->toArray(),'filed'=>'name_ar'])
                                                                @endif
                                                            </div>
                                                            <label
                                                                class="col-md-12">{{__('productfeaturemodule::admin.desc_ar')}}</label>
                                                            <div class="input-control required col-md-12 mb-4 required">
                                                            <textarea name="desc_ar" class="form-control" rows="5"
                                                                      data-validate-func="required"
                                                                      data-validate-arg="5"
                                                                      data-validate-hint="{{__('productmodule::category.rdesc_ar')}}"
                                                                      placeholder="{{__('productmodule::category.desc_ar')}}">{{ old('desc_ar') }}</textarea>
                                                                @if ($errors->has('desc_ar'))
                                                                    @include('commonmodule::includes.error',['errors'=>$errors->toArray(),'filed'=>'desc_ar'])
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="tab-pane fade" id="english" role="tabpanel"
                                                         aria-labelledby="english-tab">
                                                        <div class="form-row">
                                                            <label
                                                                class="col-md-12">{{__('productfeaturemodule::admin.name_en')}}</label>
                                                            <div class="input-control required col-md-12 mb-4 required">
                                                                <input name="name_en" value="{{ old('name_en') }}"
                                                                       class="form-control"
                                                                       data-validate-func="required"
                                                                       data-validate-arg="6"
                                                                       data-validate-hint="{{__('productfeaturemodule::admin.rname_en')}} "
                                                                       placeholder="{{__('productfeaturemodule::admin.name_en')}}"
                                                                       autocomplete="off">
                                                                @if ($errors->has('name_en'))
                                                                    @include('commonmodule::includes.error',['errors'=>$errors->toArray(),'filed'=>'name_en'])
                                                                @endif
                                                            </div>
                                                            <label
                                                                class="col-md-12">{{__('productfeaturemodule::admin.desc_en')}}</label>
                                                            <div class="input-control required col-md-12 mb-4 required">
                                                            <textarea name="desc_en" class="form-control" rows="5"
                                                                      data-validate-func="required"
                                                                      data-validate-arg="5"
                                                                      data-validate-hint="{{__('productmodule::category.rdesc_en')}}"
                                                                      placeholder="{{__('productmodule::category.desc_en')}}">{{ old('desc_en') }}</textarea>
                                                                @if ($errors->has('desc_en'))
                                                                    @include('commonmodule::includes.error',['errors'=>$errors->toArray(),'filed'=>'desc_en'])
                                                                @endif
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <br>
                                    </div>

                                    <div class="col-xl-3 col-lg-3 col-12">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="statbox widget box box-shadow">
                                                    <label>{{__('productfeaturemodule::brand.brand')}}</label>

                                                    <div class="widget-content">
                                                        <select name="brand_id" required
                                                                class="disabled-results form-control custom-select">
                                                            <option
                                                                value="">{{__('productfeaturemodule::brand.brand')}}</option>
                                                            @foreach($brands as $brand)
                                                                <option
                                                                    value="{{$brand->id}}">{{ $brand->name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>

                                                    @if ($errors->has('brand_id'))
                                                        @include('commonmodule::includes.error',['errors'=>$errors->toArray(),'filed'=>'brand_id'])
                                                    @endif
                                                </div>
                                            </div>

                                            <div class="col-lg-12">
                                                <div class="statbox widget box box-shadow   ">
                                                    <label>{{__('productmodule::admin.category')}}</label>
                                                    <select name="catalog_category_id"
                                                            class="disabled-results form-control custom-select"
                                                            id="brandSelection">
                                                        <option disabled selected
                                                                value="">{{__('productmodule::admin.choose')}}</option>
                                                        @foreach($categories as $key)
                                                            <option
                                                                value="{{$key->id}}">{!! LanguageHelper::nameTranslate($key)!!}</option>
                                                        @endforeach
                                                    </select>
                                                    @if ($errors->has('catalog_category_id'))
                                                        @include('commonmodule::includes.error',['errors'=>$errors->toArray(),'filed'=>'catalog_category_id'])
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="statbox widget box box-shadow">
                                            <div class="widget-content p-0">
                                                <div class="custom-file-container widget-content-area"
                                                     data-upload-id="myFirstFile">
                                                    <label> {{__('productfeaturemodule::admin.file')}}<a
                                                            class="custom-file-container__image-clear"
                                                            title="Clear Image"></a></label>
                                                    <label class="custom-file-container__custom-file ">
                                                        <input data-validate-func="required" data-validate-arg="5"
                                                               data-validate-hint="{{__('productfeaturemodule::admin.rfile')}}"
                                                               type="file" name="file"
                                                               class="custom-file-container__custom-file__custom-file-input"
                                                        >
                                                        <span
                                                            class="custom-file-container__custom-file__custom-file-control"></span>
                                                    </label>
                                                    <h4>
                                                        @if ($errors->has('file'))
                                                            @include('commonmodule::includes.error',['errors'=>$errors->toArray(),'filed'=>'file'])
                                                        @endif
                                                    </h4>
                                                    <div class="custom-file-container__image-preview"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                                        <div class="statbox widget box box-shadow ">
                                            <label> {{__('productfeaturemodule::admin.view_price_for')}}</label>
                                            <div class="widget-content" style="user-select: none">
                                                <label for="viewed_levels-1">
                                                    <input data-validate-func="required" data-validate-arg="6"
                                                           id="viewed_levels-1" name="viewed_levels[]"
                                                           type="checkbox"
                                                           value="1"
                                                           checked>
                                                    {{__('productfeaturemodule::admin.first_level')}}
                                                </label>
                                                <label for="viewed_levels-2">
                                                    <input data-validate-func="required" data-validate-arg="6"
                                                           id="viewed_levels-2" name="viewed_levels[]"
                                                           type="checkbox"
                                                           value="2"
                                                           checked> {{__('productfeaturemodule::admin.second_level')}}
                                                </label>
                                                <label for="viewed_levels-3">
                                                    <input data-validate-func="required" data-validate-arg="6"
                                                           id="viewed_levels-3" name="viewed_levels[]"
                                                           type="checkbox"
                                                           value="3"
                                                           checked> {{__('productfeaturemodule::admin.third_level')}}
                                                </label>
                                                <label for="viewed_levels-4">
                                                    <input data-validate-func="required" data-validate-arg="6"
                                                           id="viewed_levels-4" name="viewed_levels[]"
                                                           type="checkbox"
                                                           value="4"
                                                           checked> {{__('productfeaturemodule::admin.fourth_level')}}
                                                </label>
                                                <label for="viewed_levels-5">
                                                    <input data-validate-func="required" data-validate-arg="6"
                                                           id="viewed_levels-5" name="viewed_levels[]"
                                                           type="checkbox"
                                                           value="5"
                                                           checked> {{__('productfeaturemodule::admin.fifth_level')}}
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <button class="btn btn-gradient-danger mb-4 mt-3"
                                                type="submit">{{__('productfeaturemodule::admin.save')}}</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@stop

@section('js')
    @include('commonmodule::includes.swal')

    <script src="{{ asset('assets/admin/js/design-js/design.js')}}"></script>
    <script src="{{ asset('assets/admin/js/forms/form_validation/form_validation_material.js')}}"></script>



    <!-- BEGIN PAGE LEVEL PLUGINS -->
    <script src="{{ asset('assets/admin/plugins/file-upload/file-upload-with-preview.js')}}"></script>

    <!--  BEGIN CUSTOM SCRIPTS FILE  -->
    <script src="{{ asset('assets/admin/plugins/select2/select2.min.js')}}"></script>
    <script src="{{ asset('assets/admin/plugins/select2/custom-select2.js')}}"></script>
    <!--  BEGIN CUSTOM SCRIPTS FILE  -->

    <script>
        //First upload
        var firstUpload = new FileUploadWithPreview('myFirstFile')
    </script>
    <!-- END PAGE LEVEL PLUGINS -->

@endsection
