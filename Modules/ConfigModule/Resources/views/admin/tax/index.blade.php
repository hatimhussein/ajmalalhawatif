    @extends('commonmodule::layouts.master')

    @section('title')
    {{__('configmodule::admin.tax')}}
    @endsection

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
    {{__('configmodule::admin.tax')}}
    @endsection

    @section('content')
    <div id="content" class="main-content">
    <div class="container">
    <div class="page-header">
    <div class="page-title">
    <h4>{{__('configmodule::admin.tax')}}</h4>
    </div>
    </div>

    <div class="row">
  <!--   <form action="{{url('admin/category')}}" class="col-lg-12" method="POST" data-role="validator"
    data-on-before-submit="no_submit" data-on-error-input="notifyOnErrorInput" data-show-error-hint="false"
    novalidate="novalidate" enctype="multipart/form-data">
    @csrf -->
<div  class="col-lg-12">
    <div class="layout-spacing">
    <div class="statbox widget box box-shadow">
    <div class="widget-header">
    <div class="row">
    <div class="col-xl-9 col-md-9 col-sm-9 col-9">
    <h4>{{__('configmodule::admin.tax_active')}}</h4>
    </div>
    </div>
    </div>
          <input type="hidden" name="tax_id" id="tax_id" value="{{$tax->id}}">

    <div class="widget-content widget-content-area">

    <div class="row">

    <div class="col-xl-12 col-lg-9 col-12 ">
    <div class="statbox widget box box-shadow">
    <div class="simple-tab">

    <div class="statbox widget box box-shadow ">
    <!--    <label> {{__('configmodule::admin.ask_active')}}</label> -->
    <div class="widget-content">
    <label> {{__('configmodule::admin.ask_active')}}</label>
    <label class="switch s-success mb-4 mr-2">
    {{__('configmodule::admin.yes')}}
    <input name="status" id="status" type="checkbox"  {{($tax->is_active == 1)?'checked':' '}}   onclick="myFunction()" >
    <span class="slider round"></span>
    </label>

    </div>
    </div>



    </div>
    </div>


    <br> <br><br> <br>
    @if($tax->is_active == 1)

    <div class="row" id="shipp_tax" >
    <div class="col-xl-6 col-lg-6 col-6 ">
    <div class="statbox widget box box-shadow  ">

    <div class="widget-content">
    <label> {{__('configmodule::admin.shipp_tax')}}</label>


    </div>
    </div>
    </div>

    <div class="col-xl-3 col-lg-6 col-6 ">

    <!--   <label class="switch s-success mb-4 mr-2"> -->

    <input name="tax_shipping" id="active_tax_shipping" type="radio"  {{($tax->tax_shipping == 1)?'checked':' '}} value="1"  onclick="TaxFunction()" >
    <span class="slider round">  {{__('configmodule::admin.yes')}}</span>
    <!-- </label> -->

    </div>
    <div class="col-xl-3 col-lg-6 col-6 ">
    <!--   <label class="switch s-success mb-4 mr-2"> -->

    <input name="tax_shipping" id="deactive_tax_shipping" type="radio" {{($tax->tax_shipping == 0)?'checked':' '}} value="0" onclick="NoTaxFunction()">
    <span class="slider round"> {{__('configmodule::admin.no')}}</span>
    <!--   </label> -->


    </div>


    </div>
    <br><br><br>
    <div class="row" id="product_tax">
    <div class="col-xl-6 col-lg-6 col-6 ">
    <div class="statbox widget box box-shadow  ">

    <div class="widget-content">
    <label> {{__('configmodule::admin.product_tax')}}</label>


    </div>
    </div>
    </div>

    <div class="col-xl-3 col-lg-6 col-6 ">

    <!--   <label class="switch s-success mb-4 mr-2"> -->

    <input name="tax_product" type="radio" id="active_tax_product" type="radio"  {{($tax->tax_product == 1)?'checked':' '}} value="1"  onclick="ProductTaxFunction()" >
    <span class="slider round">  {{__('configmodule::admin.yes')}}</span>
    <!-- </label> -->

    </div>
    <div class="col-xl-3 col-lg-6 col-6 ">
    <!--   <label class="switch s-success mb-4 mr-2"> -->

    <input name="tax_product" type="radio" value="0" id="deactive_tax_product" type="radio"  {{($tax->tax_product == 0)?'checked':' '}} value="0"  onclick="NoProductTaxFunction()">
    <span class="slider round"> {{__('configmodule::admin.no')}}</span>
    <!--   </label> -->


    </div>


    </div>
       <br><br>
    </div>









    </div>

    </div>
  

    </div>
    </div>

</div>
 <!--    </form> -->

    </div>
<div class="row" id="country_tax">
<!--     <form  class="col-lg-12" method="POST" data-role="validator"
    data-on-before-submit="no_submit" data-on-error-input="notifyOnErrorInput" data-show-error-hint="false"
    novalidate="novalidate" enctype="multipart/form-data">
    @csrf -->
<div class="col-lg-12">
    <div class="layout-spacing">
    <div class="statbox widget box box-shadow">
    <div class="widget-header">
    <div class="row">
    <div class="col-xl-9 col-md-9 col-sm-9 col-9">
    <h4>{{__('configmodule::admin.country_tax')}}</h4>
    <hr>
    </div>
    </div>
    </div>

    <div class="widget-content widget-content-area">

    <div class="row">

    <div class="col-xl-10 col-lg-10 col-12 ">
    <div class="statbox widget box box-shadow">
    <div class="simple-tab">

    <div class="statbox widget box box-shadow ">
    <!--    <label> {{__('configmodule::admin.ask_active')}}</label> -->
   <div class="widget-content">
    <label>السعودية </label><br>
<span>{{__('configmodule::admin.tax_percentage')}} {{$tax->country_tax}}%</span>

    </div>
    </div>



    </div>
    </div>
</div>
   <div class="col-xl-2 col-lg-2 col-12 ">
    <div class="statbox widget box box-shadow">
    <div class="simple-tab">

    <div class="statbox widget box box-shadow ">
    <!--    <label> {{__('configmodule::admin.ask_active')}}</label> -->
   <div class="widget-content">
    <label> {{__('configmodule::admin.edit')}}</label>
<a id="country_form" data-toggle="tooltip" data-placement="top" title="Edit"><i class="flaticon-edit  bg-success p-1 text-white"></i></a>
<form id="update_country_tax" action="{{url('admin/update_country_tax')}}" method="post" style="display: none;">
	@csrf
<input type="text" name="country_tax" value="{{$tax->country_tax}}" class="form-control" required="">
<input type="hidden" name="id" value="{{$tax->id}}" >

<button type="submit" class="mt-2 btn btn-button-16 mr-2">{{__('configmodule::admin.save')}}</button></form>
    </div>
    </div>



    </div>
    </div>
</div>
</div>

    <hr>
    <div class="row">
    <div class="col-xl-10 col-lg-10 col-12 ">
    <div class="statbox widget box box-shadow">
    <div class="simple-tab">

    <div class="statbox widget box box-shadow ">
    <!--    <label> {{__('configmodule::admin.ask_active')}}</label> -->
   <div class="widget-content">
    <label>{{__('configmodule::admin.othercountry')}} </label><br>
<span>  {{__('configmodule::admin.tax_percentage')}}   {{$tax->other_country_tax}}%</span>

    </div>
    </div>



    </div>
    </div>
</div>
   <div class="col-xl-2 col-lg-2 col-12 ">
    <div class="statbox widget box box-shadow">
    <div class="simple-tab">

    <div class="statbox widget box box-shadow ">
    <!--    <label> {{__('configmodule::admin.ask_active')}}</label> -->
   <div class="widget-content">
    <label> {{__('configmodule::admin.edit')}}</label>
<a id="attach_box"
data-toggle="tooltip" data-placement="top"
title="Edit"><i
class="flaticon-edit  bg-success p-1 text-white"></i></a>
<form id="update_other_country_tax" action="{{url('admin/update_other_country_tax')}}" method="post" style="display: none;">
	@csrf
<input type="text" name="other_country_tax" value="{{$tax->other_country_tax}}" class="form-control" required="">
<input type="hidden" name="id" value="{{$tax->id}}" >

<button type="submit" class="mt-2 btn btn-button-16 mr-2">{{__('configmodule::admin.save')}}</button></form>
</div>
    </div>
    </div>



    </div>
    </div>
</div>




    </div>
   


    </div>
  

    </div>
    </div>


<!--     </form> -->

    </div>
    @endif
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



    @endsection
