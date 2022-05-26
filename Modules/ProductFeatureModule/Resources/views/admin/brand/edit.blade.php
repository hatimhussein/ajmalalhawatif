@extends('commonmodule::layouts.master')

@section('css')
<link rel="stylesheet" href="{{ asset('assets/admin/plugins/table/datatable/custom_dt_zero_config.css')}}" type="text/css" >

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
    {{__('productfeaturemodule::admin.update_brand')}}
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


            <form  action="{{url('admin/brand/'.$brand->id)}}" style="width:100%"  method="POST"  data-role="validator" data-on-before-submit="no_submit" data-on-error-input="notifyOnErrorInput" data-show-error-hint="false" novalidate="novalidate" enctype="multipart/form-data">
                 @csrf
                {{ method_field('PUT') }}
                <div class="row">

                  <div class="col-lg-6 layout-spacing col-md-12">
                      <div class="statbox widget box box-shadow">
                          <div class="widget-header">
                              <div class="row">
                                  <div class="col-xl-9 col-md-9 col-sm-9 col-9">
                                      <h4>{{__('productfeaturemodule::admin.update_brand')}}</h4>
                                  </div>


                              </div>
                          </div>

                          <div class="widget-content widget-content-area">

                                <div class="row">

                                    <div class="col-xl-12 col-lg-12 col-12 ">
                                          <label>{{__('productfeaturemodule::admin.name_ar')}}</label>
                                          <div class="input-control required col-md-12 mb-4 required">
                                              <input name="name_ar" value="{{ $brand->name_ar }}" class="form-control" data-validate-func="required" data-validate-arg="6"  data-validate-hint="{{__('productfeaturemodule::admin.rname_ar')}} " placeholder="{{__('productfeaturemodule::admin.name_ar')}}" autocomplete="off">
                                              @if ($errors->has('name_ar'))
                                                @include('commonmodule::includes.error',['errors'=>$errors->toArray(),'filed'=>'name_ar'])
                                              @endif
                                          </div>
                                          <label>{{__('productfeaturemodule::admin.name_en')}}</label>
                                          <div class="input-control required col-md-12 mb-4 ">
                                              <input name="name_en" value="{{ $brand->name_en }}" class="form-control" data-validate-func="required" data-validate-arg="6"  data-validate-hint="{{__('productfeaturemodule::admin.rname_en')}} " placeholder="{{__('productfeaturemodule::admin.name_en')}}" autocomplete="off">
                                              @if ($errors->has('name_en'))
                                                @include('commonmodule::includes.error',['errors'=>$errors->toArray(),'filed'=>'name_en'])
                                              @endif
                                          </div>
                                          <label>{{__('productfeaturemodule::admin.sort_order')}}</label>
                                          <div class="input-control required col-md-12 mb-4 ">
                                              <input type="number" name="sort_order" value="{{ $brand->sort_order }}" class="form-control" data-validate-func="required" data-validate-arg="6"  data-validate-hint="{{__('productfeaturemodule::admin.rsort_order')}} " placeholder="{{__('productfeaturemodule::admin.sort_order')}}" autocomplete="off">
                                              @if ($errors->has('sort_order'))
                                                @include('commonmodule::includes.error',['errors'=>$errors->toArray(),'filed'=>'sort_order'])
                                              @endif
                                          </div>


                                    </div>


                                    <div class="col-6">
                                      <button class="btn btn-gradient-danger mb-4 mt-3" type="submit">{{__('productfeaturemodule::admin.save')}}</button>
                                    </div>


                                </div>

                          </div>
                      </div>
                  </div>

                  <div class="col-lg-6 layout-spacing">
                      <div class="statbox widget box box-shadow">
                          <div class="widget-header">
                              <div class="row">
                                  <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                      <h4>{{__('productfeaturemodule::admin.photo')}}</h4>
                                  </div>
                              </div>
                          </div>
                          <div class="widget-content widget-content-area">
                              <div class="custom-file-container" data-upload-id="myFirstImage">
                                  <label> <a href="javascript:void(0)" class="custom-file-container__image-clear" title="Clear Image">  </a></label>
                                  <label class="custom-file-container__custom-file" >
                                      <input id="photo"  name="photo" type="file" class="custom-file-container__custom-file__custom-file-input"   accept="image/*">
                                      <span class="custom-file-container__custom-file__custom-file-control"></span>
                                  </label>
                                  <h3>
                                    @if ($errors->has('photo'))
                                      @include('commonmodule::includes.error',['errors'=>$errors->toArray(),'filed'=>'photo'])
                                    @endif
                                  </h3>

                                  <div class="custom-file-container__image-preview"></div>
                              </div>
                          </div>
                      </div>
                  </div>

              </div>

              </form>



    </div>
  </div>


@stop

@section('js')

<script>
    $('#zero-config').DataTable({
        "language": {
            "paginate": { "previous": "<i class='flaticon-arrow-left-1'></i>", "next": "<i class='flaticon-arrow-right'></i>" },
            "info": "Showing page _PAGE_ of _PAGES_"
        }
    });
</script>

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
