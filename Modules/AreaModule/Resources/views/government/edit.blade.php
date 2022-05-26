@extends('commonmodule::layouts.master')

@section('css')
<link rel="stylesheet" href="{{ asset('assets/admin/css/design-css/design.css')}}" type="text/css" >
<link rel="stylesheet" href="{{ asset('assets/admin/css/design-css/design-icons.css')}}" type="text/css" >

<link rel="stylesheet" href="{{ asset('assets/admin/plugins/select2/select2.min.css')}}" type="text/css" >


<style>
    .row [class*="col-"] .widget .widget-header h4 { color: #00d1c1; }
</style>
<!--  END CUSTOM STYLE FILE  -->

<!-- END PAGE LEVEL STYLES -->

@endsection


@section('title')
    {{__('areamodule::area.update_government')}}
@endsection

@section('content')
  <div id="content" class="main-content">
      <div class="container">


          <div class="row">
            <form  action="{{url('admin/government/'.$government->id)}}" style="width:100%"  method="POST"  data-role="validator" data-on-before-submit="no_submit" data-on-error-input="notifyOnErrorInput" data-show-error-hint="false" novalidate="novalidate" enctype="multipart/form-data">
               @csrf
                {{ method_field('PUT') }}


                <div class="col-lg-12 layout-spacing col-md-12 mt-4">
                    <div class="statbox widget box box-shadow">
                        <div class="widget-header">
                            <div class="row">
                                <div class="col-xl-9 col-md-9 col-sm-9 col-9">
                                    <h4>    {{__('areamodule::area.update_government')}}</h4>
                                  </div>

                            </div>
                        </div>

                        <div class="widget-content widget-content-area">

                              <div class="row">

                                  <div class="col-md-6 col-9 ">


                                      <div  class="statbox widget box box-shadow col-md-12">
                                      <label class="col-md-12">{{__('areamodule::area.country')}}</label>

                                              <select name="country_id" class="disabled-results form-control custom-select" >
                                                <option disabled selected value="">{{__('areamodule::area.choose_country')}}</option>

                                                @foreach($countries as $country)
                                                  <option {{($government->country_id == $country->id)?'selected':''}} value="{{$country->id}}">{{$country->name_ar}}</option>
                                                @endforeach
                                              </select>

                                            @if ($errors->has('country_id'))
                                              @include('commonmodule::includes.error',['errors'=>$errors->toArray(),'filed'=>'country_id'])
                                            @endif

                                        </div>




                                        <label class="col-md-12 pl-0">{{__('areamodule::area.name_ar')}}</label>
                                        <div class="input-control required col-md-12 mb-4 required pl-0">
                                            <input name="name_ar" value="{{$government->name_ar}}" class="form-control" data-validate-func="required" data-validate-arg="6"  data-validate-hint="{{__('areamodule::area.rname_ar')}} " placeholder="{{__('areamodule::area.name_ar')}}" autocomplete="off">
                                            @if ($errors->has('name_ar'))
                                              @include('commonmodule::includes.error',['errors'=>$errors->toArray(),'filed'=>'name_ar'])
                                            @endif
                                        </div>
                                        <label class="col-md-12 pl-0">English Name</label>

                                        <div class="input-control required col-md-12 mb-4 pl-0">
                                            <input name="name_en" value="{{$government->name_en}}" class="form-control" data-validate-func="required" data-validate-arg="6"  data-validate-hint="{{__('areamodule::area.rname_en')}} " placeholder="{{__('areamodule::area.name_en')}}" autocomplete="off">
                                            @if ($errors->has('name_en'))
                                              @include('commonmodule::includes.error',['errors'=>$errors->toArray(),'filed'=>'name_en'])
                                            @endif
                                        </div>


                                        <div class="col-3 pl-0">
                                          <button class="btn btn-gradient-danger mb-4 mt-3" type="submit">{{__('areamodule::area.update')}}</button>
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


<script  src="{{ asset('assets/admin/plugins/select2/select2.min.js')}}" ></script>
<script  src="{{ asset('assets/admin/plugins/select2/custom-select2.js')}}" ></script>



@endsection
