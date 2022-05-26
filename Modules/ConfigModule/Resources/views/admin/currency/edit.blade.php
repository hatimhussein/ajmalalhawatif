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
    {{__('configmodule::admin.update_currency')}}
@endsection


@section('content')
  <div id="content" class="main-content">
      <div class="container">
          <div class="page-header">
              <div class="page-title">
                <h3>
                  <a href="{{url('admin/currency')}}">
                    {{__('configmodule::admin.currency')}}
                  </a>
                </h3>

              </div>
          </div>

          <div class="row">
            <form  action="{{url('admin/currency/'.$currency->id)}}" style="width:100%"  method="POST"  data-role="validator" data-on-before-submit="no_submit" data-on-error-input="notifyOnErrorInput" data-show-error-hint="false" novalidate="novalidate" enctype="multipart/form-data">
              @csrf
              {{ method_field('PUT') }}

                <div class="col-lg-12 layout-spacing col-md-12">
                    <div class="statbox widget box box-shadow">
                        <div class="widget-header">
                            <div class="row">
                                <div class="col-xl-9 col-md-9 col-sm-9 col-9">
                                    <h4>{{__('configmodule::admin.update_currency')}}</h4>
                                </div>


                            </div>
                        </div>

                        <div class="widget-content widget-content-area">

                              <div class="row">


                                        <div class="input-control required col-md-6 mb-4 required">
                                            <label>{{__('configmodule::admin.name_ar')}}</label>

                                            <input name="name_ar"  class="form-control" value="{{$currency->name_ar}}" data-validate-func="required" data-validate-arg="6"  data-validate-hint="{{__('configmodule::admin.please')}} {{__('configmodule::admin.name_ar')}}" placeholder="{{__('configmodule::admin.name_ar')}}" autocomplete="off">
                                            @if ($errors->has('name_ar'))
                                              @include('commonmodule::includes.error',['errors'=>$errors->toArray(),'filed'=>'name_ar'])
                                            @endif
                                        </div>

                                        <div class="input-control required col-md-6 mb-4 ">
                                        <label>{{__('configmodule::admin.name_en')}}</label>

                                            <input name="name_en" value="{{ $currency->name_en }}" class="form-control" data-validate-func="required" data-validate-arg="6"  data-validate-hint="{{__('configmodule::admin.please')}} {{__('configmodule::admin.name_en')}}" placeholder=" {{__('configmodule::admin.name_en')}}" autocomplete="off">
                                            @if ($errors->has('name_en'))
                                              @include('commonmodule::includes.error',['errors'=>$errors->toArray(),'filed'=>'name_en'])
                                            @endif
                                        </div>


                                        <div class="input-control required col-md-6 mb-4 ">
                                        <label>{{__('configmodule::admin.code')}}</label>

                                            <input name="code" value="{{$currency->code }}" class="form-control" data-validate-func="required" data-validate-arg="6"  data-validate-hint="{{__('configmodule::admin.please')}} {{__('configmodule::admin.code')}}" placeholder=" {{__('configmodule::admin.code')}}" autocomplete="off">
                                            @if ($errors->has('code'))
                                              @include('commonmodule::includes.error',['errors'=>$errors->toArray(),'filed'=>'code'])
                                            @endif
                                        </div>


                                        <div class="input-control required col-md-6 mb-4 ">
                                        <label>{{__('configmodule::admin.symbol')}}</label>

                                            <input type="text" name="symbol" value="{{ $currency->symbol }}" class="form-control" data-validate-func="required" data-validate-arg="6"  data-validate-hint="{{__('configmodule::admin.please')}} {{__('configmodule::admin.symbol')}}" placeholder="{{__('configmodule::admin.symbol')}}" autocomplete="off">
                                            @if ($errors->has('symbol'))
                                              @include('commonmodule::includes.error',['errors'=>$errors->toArray(),'filed'=>'symbol'])
                                            @endif
                                        </div>

                                        <div class="input-control required col-md-6 mb-4 ">
                                        <label>{{__('configmodule::admin.factor')}}</label>

                                            <input type="text" name="value" {{($currency->is_deafult==1)?'readonly':''}} value="{{$currency->value}}" class="form-control" data-validate-func="required" data-validate-arg="6"  data-validate-hint="{{__('configmodule::admin.please')}} {{__('configmodule::admin.factor')}} " placeholder="{{__('configmodule::admin.factor')}}" autocomplete="off">
                                            @if ($errors->has('value'))
                                              @include('commonmodule::includes.error',['errors'=>$errors->toArray(),'filed'=>'value'])
                                            @endif
                                        </div>


                                        <div class="col-lg-6 mt-4">
                                          <div class="">
                                            @if($currency->is_deafult!=1)
                                            <label style="margin-right:20px"><input {{($currency->status==1)?'checked':''}} type="radio" name="status" value="1" > Active</label>
                                            <label><input {{($currency->status==0)?'checked':''}} type="radio" name="status" value="0">Un-Active</label>
                                            @else
                                              @if($currency->status==1)
                                              <label style="margin-right:20px"><input checked type="radio" name="status" value="1" > {{__('configmodule::admin.active')}}</label>
                                              @else
                                                <label><input checked type="radio" name="status" value="0">{{__('configmodule::admin.unactive')}}</label>
                                              @endif
                                            @endif
                                          </div>
                                        </div>


                                        <div class="col-3">
                                          <button class="btn btn-gradient-danger mb-4 mt-3" type="submit">{{__('configmodule::admin.update')}}</button>
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

<script  src="{{ asset('assets/admin/js/design-js/design.js')}}" ></script>
<script  src="{{ asset('assets/admin/js/forms/form_validation/form_validation_material.js')}}" ></script>





@endsection
