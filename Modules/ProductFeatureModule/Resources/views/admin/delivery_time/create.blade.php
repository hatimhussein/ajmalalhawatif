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
    {{__('productfeaturemodule::admin.add_new_deliverytime')}}
@endsection

@section('content')
    <div id="content" class="main-content">
        <div class="container">
            <div class="page-header">
                <div class="page-title">
                    <h3>
                        <a href="{{url('admin/delivery_time')}}">
                            {{__('productfeaturemodule::admin.deliverytime')}}
                        </a>
                    </h3>

                </div>
            </div>

            <div class="row">
                <form action="{{url('admin/delivery_time')}}" style="width:100%" method="POST" data-role="validator"
                      data-on-before-submit="no_submit" data-on-error-input="notifyOnErrorInput"
                      data-show-error-hint="false" novalidate="novalidate">
                    @csrf

                    <div class="col-lg-12 layout-spacing col-md-12">
                        <div class="statbox widget box box-shadow">
                            <div class="widget-header mb-4">
                                <div class="row">
                                    <div class="col-xl-9 col-md-9 col-sm-9 col-9">
                                        <h4>{{__('productfeaturemodule::admin.add_new_deliverytime')}}</h4>
                                    </div>


                                </div>
                            </div>

                            <div class="widget-content widget-content-area">

                                <div class="row mb-4">
                                    <div class="col-md-6">
                                        <label>{{__('productfeaturemodule::admin.name_ar')}}</label>
                                        <input name="deliverytime_ar" value="{{ old('deliverytime_ar') }}"
                                               class="form-control" data-validate-func="required"
                                               data-validate-arg="6"
                                               data-validate-hint="{{__('productfeaturemodule::admin.rname_ar')}} "
                                               placeholder="{{__('productfeaturemodule::admin.name_ar')}}"
                                               autocomplete="off">
                                        @if ($errors->has('deliverytime_ar'))
                                            @include('commonmodule::includes.error',['errors'=>$errors->toArray(),'filed'=>'deliverytime_ar'])
                                        @endif
                                    </div>
                                    <div class="col-md-6">
                                        <label>{{__('productfeaturemodule::admin.name_en')}}</label>
                                        <input name="deliverytime_en" value="{{ old('deliverytime_en') }}"
                                               class="form-control" data-validate-func="required"
                                               data-validate-arg="6"
                                               data-validate-hint="{{__('productfeaturemodule::admin.rname_en')}} "
                                               placeholder="{{__('productfeaturemodule::admin.name_en')}}"
                                               autocomplete="off">
                                        @if ($errors->has('deliverytime_en'))
                                            @include('commonmodule::includes.error',['errors'=>$errors->toArray(),'filed'=>'delivery_en'])
                                        @endif
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-4 col-md-3 col-sm-4 col-4">
                                        <div class="statbox widget box box-shadow ">
                                            <label> {{__('productmodule::category.sort_order')}}</label>
                                            <input name="sort_order" value="{{ old('sort_order') }}"
                                                   class="form-control" data-validate-func="required"
                                                   data-validate-arg="6"
                                                   type="number">
                                            @if ($errors->has('sort_order'))
                                                @include('commonmodule::includes.error',['errors'=>$errors->toArray(),'filed'=>'sort_order'])
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-lg-2">
                                        <div class="statbox widget box box-shadow">
                                            <label class="mb-3"> {{__('configmodule::admin.active_for_user')}}</label>
                                            <br>
                                            <label class="switch s-success  mb-4 mr-2">
                                                <input type="hidden" name="for_user" value="0">
                                                <input name="for_user" value="1"
                                                       type="checkbox" {{(old('for_user'))?'checked':''}}>
                                                <span class="slider round"></span>
                                            </label>
                                        </div>
                                    </div>

                                    <div class="col-lg-2">
                                        <div class="statbox widget box box-shadow">
                                            <label
                                                class="mb-3"> {{__('configmodule::admin.active_for_merchant')}}</label>
                                            <br>
                                            <label class="switch s-success  mb-4 mr-2">
                                                <input type="hidden" name="for_merchant" value="0">
                                                <input name="for_merchant" value="1"
                                                       type="checkbox" {{(old('for_merchant'))?'checked':''}}>
                                                <span class="slider round"></span>
                                            </label>
                                        </div>
                                    </div>

                                </div>

                                <div class="row">
                                    <div class="col-6">
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
        var firstUpload = new FileUploadWithPreview('myFirstImage')
        //Second upload
        var secondUpload = new FileUploadWithPreview('mySecondImage')
    </script>
    <!-- END PAGE LEVEL PLUGINS -->

@endsection
