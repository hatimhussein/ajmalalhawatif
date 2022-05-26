@extends('commonmodule::layouts.master')

@section('css')
<link rel="stylesheet" href="{{ asset('assets/admin/css/design-css/design.css')}}" type="text/css" >
<link rel="stylesheet" href="{{ asset('assets/admin/css/design-css/design-icons.css')}}" type="text/css" >


<style>
    .row [class*="col-"] .widget .widget-header h4 { color: #00d1c1; }
</style>
<!--  END CUSTOM STYLE FILE  -->

<!-- END PAGE LEVEL STYLES -->

@endsection


@section('title')
  {{__('areamodule::area.add_new_country')}}
@endsection

@section('content')
  <div id="content" class="main-content">
      <div class="container">


          <div class="row">
            <form  action="{{url('admin/country')}}" style="width:100%"  method="POST"  data-role="validator" data-on-before-submit="no_submit" data-on-error-input="notifyOnErrorInput" data-show-error-hint="false" novalidate="novalidate" enctype="multipart/form-data">
              @csrf

                <div class="col-lg-12 layout-spacing col-md-12 mt-4">
                    <div class="statbox widget box box-shadow">
                        <div class="widget-header">
                            <div class="row">
                                <div class="col-xl-9 col-md-9 col-sm-9 col-9">
                                    <h4>    {{__('areamodule::area.add_new_country')}}</h4>
                                  </div>

                            </div>
                        </div>

                        <div class="widget-content widget-content-area">

                              <div class="row">

                                  <div class="col-xl-6 col-md-6 col-9 ">

                                  <label class="col-md-12">{{__('areamodule::area.name_ar')}}</label>
                                        <div class="input-control required col-md-12 mb-4 required">
                                            <input name="name_ar" value="{{ old('name_ar') }}" class="form-control" data-validate-func="required" data-validate-arg="6"  data-validate-hint="{{__('areamodule::area.rname_ar')}}" placeholder="{{__('areamodule::area.name_ar')}}" autocomplete="off">
                                            @if ($errors->has('name_ar'))
                                              @include('commonmodule::includes.error',['errors'=>$errors->toArray(),'filed'=>'name_ar'])
                                            @endif
                                        </div>
                                        <label class="col-md-12">{{__('areamodule::area.name_en')}}</label>

                                        <div class="input-control required col-md-12 mb-4 ">
                                            <input name="name_en" value="{{ old('name_en') }}" class="form-control" data-validate-func="required" data-validate-arg="6"  data-validate-hint="{{__('areamodule::area.rname_en')}}" placeholder="{{__('areamodule::area.name_en')}}" autocomplete="off">
                                            @if ($errors->has('name_en'))
                                              @include('commonmodule::includes.error',['errors'=>$errors->toArray(),'filed'=>'name_en'])
                                            @endif
                                        </div>


                                        <label class="col-md-12">{{__('areamodule::area.code')}}</label>
                                        <div class="input-control required col-md-12 mb-4 ">
                                            <input type="number" name="code" value="{{ old('code') }}" class="form-control" data-validate-func="required" data-validate-arg="6"  data-validate-hint="{{__('areamodule::area.rcode')}}" placeholder="{{__('areamodule::area.code')}}" autocomplete="off">
                                            @if ($errors->has('sort_order'))
                                              @include('commonmodule::includes.error',['errors'=>$errors->toArray(),'filed'=>'code'])
                                            @endif
                                        </div>

                                        <div class="col-3">
                                          <button class="btn btn-gradient-danger mb-4 mt-3" type="submit">{{__('areamodule::area.save')}}</button>
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

<script  src="{{ asset('assets/admin/js/design-js/design.js')}}" ></script>
<script  src="{{ asset('assets/admin/js/forms/form_validation/form_validation_material.js')}}" ></script>




@endsection
