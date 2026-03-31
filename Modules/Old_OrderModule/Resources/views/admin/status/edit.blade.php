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
    {{__('ordermodule::admin.update_status')}}
@endsection

@section('content')
  <div id="content" class="main-content">
      <div class="container">
          <div class="page-header">
              <div class="page-title">
                  <h3>  {{__('ordermodule::admin.update_status')}}</h3>
              </div>
          </div>

          <div class="row">
            <form  action="{{url('admin/status/'.$status->id)}}" style="width:100%"  method="POST"  data-role="validator" data-on-before-submit="no_submit" data-on-error-input="notifyOnErrorInput" data-show-error-hint="false" novalidate="novalidate" enctype="multipart/form-data">
              @csrf
              {{ method_field('PUT') }}


                <div class="col-lg-12 layout-spacing col-md-12">
                    <div class="statbox widget box box-shadow">
                        <div class="widget-header">
                            <div class="row">
                                <div class="col-xl-9 col-md-9 col-sm-9 col-9">

                                </div>
                            </div>
                        </div>

                        <div class="widget-content widget-content-area">
                              <div class="row">
                                  <div class="col-md-4 ">
                                      <div  class="statbox widget box box-shadow">
                                        <label  >  {{__('ordermodule::admin.status_type')}}</label>
                                        <div class="widget-content">
                                            <select name="status_type_id"   class="disabled-results form-control custom-select" >
                                              @foreach($status_types as $type)
                                                <option {{($status->status_type_id==$type->id)?'selected':''}}  value="{{$type->id}}">{{$type->type}}</option>
                                              @endforeach
                                            </select>
                                        </div>

                                          @if ($errors->has('status_type_id'))
                                            @include('commonmodule::includes.error',['errors'=>$errors->toArray(),'filed'=>'status_type_id'])
                                          @endif

                                      </div>
                                  </div>
                              </div>

                              <div class="row">
                              <div class="input-control required col-md-4 mb-4 ">
                                          <input name="title" value="{{$status->title}}" class="form-control" data-validate-func="required" data-validate-arg="6"  data-validate-hint="{{__('configmodule::admin.please')}} {{__('ordermodule::admin.status')}}" placeholder="{{__('ordermodule::admin.status')}}" autocomplete="off">
                                          @if ($errors->has('title'))
                                            @include('commonmodule::includes.error',['errors'=>$errors->toArray(),'filed'=>'title'])
                                          @endif
                                      </div>
                                      <div class="col-12">
                                  <button class="btn btn-gradient-danger mb-4 mt-3" type="submit">{{__('ordermodule::admin.update')}}</button>
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
