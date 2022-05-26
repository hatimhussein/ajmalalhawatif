@extends('commonmodule::layouts.master')

@section('css')
<link rel="stylesheet" href="{{ asset('assets/admin/css/design-css/design.css')}}" type="text/css" >
<link rel="stylesheet" href="{{ asset('assets/admin/css/design-css/design-icons.css')}}" type="text/css" >

<!-- BEGIN PAGE LEVEL STYLES -->
<link rel="stylesheet" href="{{ asset('assets/admin/plugins/file-upload/file-upload-with-preview.css')}}" type="text/css" >
<!--  BEGIN CUSTOM STYLE FILE  -->

<link rel="stylesheet" href="{{ asset('assets/admin/plugins/select2/select2.min.css')}}" type="text/css" >

<style>
    .row [class*="col-"] .widget .widget-header h4 { color: #00d1c1; }
</style>
<!--  END CUSTOM STYLE FILE  -->

<!-- END PAGE LEVEL STYLES -->

@endsection


@section('title')
    {{__('productfeaturemodule::admin.add_new_option')}}
@endsection

@section('content')
  <div id="content" class="main-content">
      <div class="container">
          <div class="page-header">
              <div class="page-title">
                <h3>
                  <a href="{{url('admin/option')}}">
                    {{__('productfeaturemodule::admin.options')}}
                  </a>
                </h3>

              </div>
          </div>

          <div class="row">
            <form  action="{{url('admin/option')}}" style="width:100%"  method="POST"  data-role="validator" data-on-before-submit="no_submit" data-on-error-input="notifyOnErrorInput" data-show-error-hint="false" novalidate="novalidate" enctype="multipart/form-data">
              @csrf

                <div class="col-lg-12 layout-spacing col-md-12">
                    <div class="statbox widget box box-shadow">
                        <div class="widget-header">
                            <div class="row">
                                <div class="col-xl-9 col-md-9 col-sm-9 col-9">
                                    <h4>{{__('productfeaturemodule::admin.add_new_option')}}</h4>
                                </div>
                            </div>
                        </div>

                        <div class="widget-content widget-content-area">

                              <div class="row">

                                  <div class="col-xl-9 col-lg-9 col-9 ">
                                    <div class="form-row">
                                        <div class="input-control required col-md-9 mb-4 required">
                                            <input name="name_ar" value="{{ old('name_ar') }}" class="form-control" data-validate-func="required" data-validate-arg="6"  data-validate-hint="{{__('productfeaturemodule::admin.rname_ar')}} " placeholder="{{__('productfeaturemodule::admin.name_ar')}}" autocomplete="off">
                                            @if ($errors->has('name_ar'))
                                              @include('commonmodule::includes.error',['errors'=>$errors->toArray(),'filed'=>'name_ar'])
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-row">
                                        <div class="input-control required col-md-9 mb-4 ">
                                            <input name="name_en" value="{{ old('name_en') }}" class="form-control" data-validate-func="required" data-validate-arg="6"  data-validate-hint="{{__('productfeaturemodule::admin.rname_en')}} " placeholder="{{__('productfeaturemodule::admin.name_en')}}" autocomplete="off">
                                            @if ($errors->has('name_en'))
                                              @include('commonmodule::includes.error',['errors'=>$errors->toArray(),'filed'=>'name_en'])
                                            @endif
                                        </div>
                                    </div>

                                    <div  class="statbox widget box box-shadow col-md-9">
                                        <label  >{{__('productfeaturemodule::admin.type')}}</label>
                                        <div class="widget-content ">
                                            <select name="type"  placeholder="" class="disabled-results form-control custom-select" data-validate-func="required" data-validate-arg="6"  data-validate-hint="{{__('productfeaturemodule::admin.rtype')}} " >
                                              <option  selected disabled value="">{{__('productfeaturemodule::admin.choose')}}</option>
                                              <option value="list">{{__('productfeaturemodule::admin.list')}}</option>
                                              <option value="color">{{__('productfeaturemodule::admin.color')}}</option>
                                            </select>
                                        </div>

                                          @if ($errors->has('type'))
                                            @include('commonmodule::includes.error',['errors'=>$errors->toArray(),'filed'=>'type'])
                                          @endif

                                      </div>

                                  </div>


                                  <div class="col-12">
                                  <button class="btn btn-gradient-danger mb-4 mt-3" type="submit">{{__('adminmodule::admin.save')}}</button>
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

<script  src="{{ asset('assets/admin/js/design-js/design.js')}}" ></script>
<script  src="{{ asset('assets/admin/js/forms/form_validation/form_validation_material.js')}}" ></script>



<!-- BEGIN PAGE LEVEL PLUGINS -->
<script  src="{{ asset('assets/admin/plugins/file-upload/file-upload-with-preview.js')}}" ></script>

<!--  BEGIN CUSTOM SCRIPTS FILE  -->
<script  src="{{ asset('assets/admin/plugins/select2/select2.min.js')}}" ></script>
<script  src="{{ asset('assets/admin/plugins/select2/custom-select2.js')}}" ></script>
<!--  BEGIN CUSTOM SCRIPTS FILE  -->

<script>
    //First upload
    var firstUpload = new FileUploadWithPreview('myFirstImage')
    //Second upload
    var secondUpload = new FileUploadWithPreview('mySecondImage')
</script>
<!-- END PAGE LEVEL PLUGINS -->

@endsection
