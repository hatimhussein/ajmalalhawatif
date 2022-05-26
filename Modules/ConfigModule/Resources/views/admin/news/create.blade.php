@extends('commonmodule::layouts.master')

@section('css')
    <link rel="stylesheet" href="{{ asset('assets/admin/css/design-css/design.css')}}" type="text/css">
    <link rel="stylesheet" href="{{ asset('assets/admin/css/design-css/design-icons.css')}}" type="text/css">

    <style>
        .row [class*="col-"] .widget .widget-header h4 {
            color: #00d1c1;
        }

    </style>
    <!--  END CUSTOM STYLE FILE  -->

    <!-- END PAGE LEVEL STYLES -->

@endsection


@section('title')
    {{__('configmodule::admin.create_news')}}
@endsection

@section('content')
    <div id="content" class="main-content">
        <div class="container">
            <div class="page-header">
                <div class="page-title">
                    <h3>{{__('configmodule::admin.news')}}</h3>
                </div>
            </div>

            <div class="row">
                <form action="{{ route('news.store') }}" class="col-lg-12" method="POST" data-role="validator"
                      data-on-before-submit="no_submit" data-on-error-input="notifyOnErrorInput"
                      data-show-error-hint="false"
                      novalidate="novalidate">
                    @csrf

                    <div class="layout-spacing">
                        <div class="statbox widget box box-shadow">
                            <div class="widget-header">
                                <div class="row">
                                    <div class="col-xl-9 col-md-9 col-sm-9 col-9">
                                        <h4>{{__('configmodule::admin.create_news')}}</h4>
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
                                                            <div class="col-md-9 mb-4 input-control required">
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
                                                            <div class="col-md-9 mb-4 input-control required">
                                                            <textarea name="desc_en" class="form-control" rows="5"
                                                                      placeholder="{{__('productmodule::category.desc_en')}}"
                                                                      data-validate-func="required"
                                                                      data-validate-arg="5"
                                                                      data-validate-hint="{{__('productmodule::category.rdesc_en')}}">{{ old('desc_en') }}</textarea>
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
                                        <div class="row">
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
                                        </div>
                                        <br>
                                        <div class="row">
                                            <div class="col-lg-3 col-md-3 col-sm-4 col-4">

                                                <div class="statbox widget box box-shadow ">
                                                    <label> {{__('configmodule::admin.status')}}</label>
                                                    <div class="widget-content">
                                                        <label class="switch s-success mb-4 mr-2">

                                                            <input name="status" type="checkbox" checked="">
                                                            <span class="slider round"></span>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <button class="btn btn-gradient-danger mb-4 mt-3"
                                                type="submit">{{__('configmodule::admin.save')}}</button>
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
        var firstUpload = new FileUploadWithPreview('myFirstImage')
        //Second upload
        var secondUpload = new FileUploadWithPreview('mySecondImage')

    </script>
    <!-- END PAGE LEVEL PLUGINS -->

@endsection
