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
    {{__('configmodule::admin.add_new_voucher')}}
@endsection


@section('content')
  <div id="content" class="main-content">
      <div class="container">
          <div class="page-header">
              <div class="page-title">
                <h3>
                  <a href="{{url('admin/voucher')}}">
                    {{__('configmodule::admin.vouchers')}}
                  </a>
                </h3>

              </div>
          </div>

          <div class="row">
            <form  action="{{url('admin/voucher')}}" style="width:100%"  method="POST"  data-role="validator" data-on-before-submit="no_submit" data-on-error-input="notifyOnErrorInput" data-show-error-hint="false" novalidate="novalidate" enctype="multipart/form-data">
              @csrf

                <div class="col-lg-12 layout-spacing col-md-12">
                    <div class="statbox widget box box-shadow">
                        <div class="widget-header">
                            <div class="row">
                                <div class="col-xl-9 col-md-9 col-sm-9 col-9">
                                    <h4>{{__('configmodule::admin.add_new_voucher')}}</h4>
                                </div>


                            </div>
                        </div>

                        <div class="widget-content widget-content-area">

                              <div class="row">


                                        <div class="input-control required col-md-4 mb-5 required">
                                            <label>{{__('configmodule::admin.code')}}</label>

                                            <input name="code"  class="form-control" value="{{ old('code') }}" data-validate-func="required" data-validate-arg="6"  data-validate-hint="{{__('configmodule::admin.please')}} {{__('configmodule::admin.code')}} " placeholder="{{__('configmodule::admin.code')}}" autocomplete="off">
                                            @if ($errors->has('code'))
                                              @include('commonmodule::includes.error',['errors'=>$errors->toArray(),'filed'=>'code'])
                                            @endif
                                        </div>

                                        <div class="input-control required  col-md-4 mb-5 ">
                                        <label> {{__('configmodule::admin.max_num_of_use')}}</label>

                                            <input name="max_num_of_use" value="{{ old('max_num_of_use') }}" class="form-control" data-validate-func="required" data-validate-arg="6"  data-validate-hint="{{__('configmodule::admin.please')}} {{__('configmodule::admin.max_num_of_use')}} " placeholder="{{__('configmodule::admin.max_num_of_use')}}" autocomplete="off">
                                            @if ($errors->has('max_num_of_use'))
                                              @include('commonmodule::includes.error',['errors'=>$errors->toArray(),'filed'=>'max_num_of_use'])
                                            @endif
                                        </div>


                                        <div class="input-control required col-md-4 mb-5 ">
                                        <label> {{__('configmodule::admin.min_total')}}</label>

                                            <input name="min_total" value="{{ old('min_total') }}" class="form-control" data-validate-func="required" data-validate-arg="6"  data-validate-hint="{{__('configmodule::admin.please')}} {{__('configmodule::admin.min_total')}} " placeholder=" {{__('configmodule::admin.min_total')}} " autocomplete="off">
                                            @if ($errors->has('min_total'))
                                              @include('commonmodule::includes.error',['errors'=>$errors->toArray(),'filed'=>'min_total'])
                                            @endif
                                        </div>


                                        <div class="input-control required col-md-4 mb-5 ">
                                        <label> {{__('configmodule::admin.start_date')}}</label>

                                            <input type="date" name="from" value="{{ old('from') }}" class="form-control" data-validate-func="required" data-validate-arg="6" data-validate-hint="{{__('configmodule::admin.please')}} {{__('configmodule::admin.start_date')}} " placeholder="{{__('configmodule::admin.start_date')}}"  autocomplete="off">
                                            @if ($errors->has('from'))
                                              @include('commonmodule::includes.error',['errors'=>$errors->toArray(),'filed'=>'from'])
                                            @endif
                                        </div>

                                        <div class="input-control required col-md-4 mb-5 ">
                                        <label> {{__('configmodule::admin.end_date')}}</label>

                                            <input type="date" name="to" value="{{ old('to') }}" class="form-control" data-validate-func="required" data-validate-arg="6" data-validate-hint="{{__('configmodule::admin.please')}} {{__('configmodule::admin.end_date')}} " placeholder="{{__('configmodule::admin.end_date')}}" autocomplete="off">
                                            @if ($errors->has('to'))
                                              @include('commonmodule::includes.error',['errors'=>$errors->toArray(),'filed'=>'to'])
                                            @endif
                                        </div>

                                        <div  class=" col-md-4 ">
                                            <label  >{{__('configmodule::admin.discount_type')}}</label>
                                                <select id="voucher_type" name="voucher_type" class="form-control" >
                                                <option disabled selected value="">{{__('configmodule::admin.discount_type')}}</option>
                                                <option value="1">{{__('configmodule::admin.amount')}}</option>
                                                <option value="2">{{__('configmodule::admin.precentage')}}</option>
                                              </select>
                                              @if ($errors->has('voucher_type'))
                                                @include('commonmodule::includes.error',['errors'=>$errors->toArray(),'filed'=>'voucher_type'])
                                              @endif

                                        </div>



                                        <div class="col-md-4 mt-2">
                                          <label  >{{__('configmodule::admin.status')}}</label>
                                          <div class="">
                                            <label style="margin-right: 15px;"><input type="radio" name="status" value="enabled" checked=""> {{__('configmodule::admin.active')}}</label>
                                            <label><input type="radio" name="status" value="disabled"> {{__('configmodule::admin.unactive')}}</label>

                                          </div>
                                        </div>

                                        <div class="col-md-4 ">
                                          <label class="control-label" id="type_title"></label>
                                          <div class=""  id="type_val">

                                          </div>
                                            @if ($errors->has('amount'))
                                              @include('commonmodule::includes.error',['errors'=>$errors->toArray(),'filed'=>'amount'])
                                            @endif
                                            @if ($errors->has('percentage'))
                                              @include('commonmodule::includes.error',['errors'=>$errors->toArray(),'filed'=>'percentage'])
                                            @endif

                                        </div>


                                        <div class="col-12">
                                          <button class="btn btn-gradient-danger mb-5 mt-3" type="submit">{{__('configmodule::admin.save')}}</button>
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






<script type="text/javascript">
    $('#voucher_type').change(function () {
        var type = $(this).val();

        if (type==1) {
          $('#type_title').text('{{__('configmodule::admin.amount')}}');

          $('#type_val').html('<input type="text" required autocomplete="off"class="form-control" data-validate-func="required" data-validate-arg="6" placeholder="{{__('configmodule::admin.amount')}}"  data-validate-hint="{{__('configmodule::admin.please')}} {{__('configmodule::admin.amount')}}"  name="amount">');

        }
        else{
          $('#type_title').text('{{__('configmodule::admin.precentage')}}');
          $('#type_val').html('<input type="text" required autocomplete="off" class="form-control"  data-validate-func="required" data-validate-arg="6" placeholder="{{__('configmodule::admin.precentage')}}"  data-validate-hint="{{__('configmodule::admin.please')}} {{__('configmodule::admin.precentage')}}" name="percentage">');


            }
        });
</script>
@endsection
