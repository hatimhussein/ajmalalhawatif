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
    {{__('productfeaturemodule::admin.add_new_brand')}}
@endsection

@section('content')
    <div id="content" class="main-content">
        <div class="container">
            <div class="page-header">
                <div class="page-title">
                    <h3>
                        <a href="{{url('admin/brand')}}">
                            {{__('productfeaturemodule::admin.brands')}}
                        </a>
                    </h3>

                </div>
            </div>

            <div class="row">
                <form action="{{url('admin/brand')}}" style="width:100%" method="POST" data-role="validator"
                      data-on-before-submit="no_submit" data-on-error-input="notifyOnErrorInput"
                      data-show-error-hint="false" novalidate="novalidate" enctype="multipart/form-data">
                    @csrf

                    <div class="col-lg-12 layout-spacing col-md-12">
                        <div class="statbox widget box box-shadow">
                            <div class="widget-header mb-4">
                                <div class="row">
                                    <div class="col-xl-9 col-md-9 col-sm-9 col-9">
                                        <h4>{{__('productfeaturemodule::admin.add_new_brand')}}</h4>
                                    </div>


                                </div>
                            </div>


                            <div class="row">

                                <div class="col-lg-6">

                                    <div class=" widget-content-area">
                                        <label class="col-md-12">{{__('productfeaturemodule::admin.name_ar')}}</label>
                                        <div class="input-control required col-md-12 mb-4 required">
                                            <input name="name_ar" value="{{ old('name_ar') }}" class="form-control"
                                                   data-validate-func="required" data-validate-arg="6"
                                                   data-validate-hint="{{__('productfeaturemodule::admin.rname_ar')}} "
                                                   placeholder="{{__('productfeaturemodule::admin.name_ar')}}"
                                                   autocomplete="off">
                                            @if ($errors->has('name_ar'))
                                                @include('commonmodule::includes.error',['errors'=>$errors->toArray(),'filed'=>'name_ar'])
                                            @endif
                                        </div>
                                        <label class="col-md-12">{{__('productfeaturemodule::admin.name_en')}}</label>
                                        <div class="input-control required col-md-12 mb-4 ">
                                            <input name="name_en" value="{{ old('name_en') }}" class="form-control"
                                                   data-validate-func="required" data-validate-arg="6"
                                                   data-validate-hint="{{__('productfeaturemodule::admin.rname_en')}} "
                                                   placeholder="{{__('productfeaturemodule::admin.name_en')}}"
                                                   autocomplete="off">
                                            @if ($errors->has('name_en'))
                                                @include('commonmodule::includes.error',['errors'=>$errors->toArray(),'filed'=>'name_en'])
                                            @endif
                                        </div>


                                        <label class="col-md-12">Sort Order</label>
                                        <div class="input-control required col-md-12 mb-4 ">
                                            <input type="number" name="sort_order" value="{{ old('sort_order') }}"
                                                   class="form-control" data-validate-func="required"
                                                   data-validate-arg="6"
                                                   data-validate-hint="{{__('productfeaturemodule::admin.rsort_order')}} "
                                                   placeholder="{{__('productfeaturemodule::admin.sort_order')}}"
                                                   autocomplete="off">
                                            @if ($errors->has('sort_order'))
                                                @include('commonmodule::includes.error',['errors'=>$errors->toArray(),'filed'=>'sort_order'])
                                            @endif
                                        </div>

                                        <div class="col-12">
                                            <button class="btn btn-gradient-danger mb-4 mt-3"
                                                    type="submit">{{__('productfeaturemodule::admin.save')}}</button>
                                        </div>
                                    </div>


                                </div>


                                <div class=" col-lg-6 ">
                                    <div class="statbox widget box box-shadow">
                                        <div class="widget-content p-0">
                                            <div class="custom-file-container widget-content-area"
                                                 data-upload-id="myFirstImage">
                                                <label> {{__('productfeaturemodule::admin.photo')}}<a
                                                        class="custom-file-container__image-clear"
                                                        title="Clear Image"></a></label>
                                                <label class="custom-file-container__custom-file ">
                                                    <input data-validate-func="required" data-validate-arg="5"
                                                           data-validate-hint="{{__('productfeaturemodule::admin.rphoto')}}"
                                                           type="file" name="photo"
                                                           class="custom-file-container__custom-file__custom-file-input"
                                                           accept="image/*">
                                                    <input type="hidden" name="MAX_FILE_SIZE" value="10485760"/>
                                                    <span
                                                        class="custom-file-container__custom-file__custom-file-control"></span>
                                                </label>
                                                <h4>
                                                    @if ($errors->has('photo'))
                                                        @include('commonmodule::includes.error',['errors'=>$errors->toArray(),'filed'=>'photo'])
                                                    @endif
                                                </h4>

                                                <div class="custom-file-container__image-preview"></div>
                                            </div>
                                        </div>
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
