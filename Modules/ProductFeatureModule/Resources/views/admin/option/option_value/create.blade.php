@extends('commonmodule::layouts.master')

@section('css')
<link rel="stylesheet" href="{{ asset('assets/admin/css/design-css/design.css')}}" type="text/css">
<link rel="stylesheet" href="{{ asset('assets/admin/css/design-css/design-icons.css')}}" type="text/css">

<link rel="stylesheet" href="{{ asset('assets/admin/plugins/colorpickers/jquery_minicolors/jquery.minicolors.css')}}"
    type="text/css">

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
  {{__('productfeaturemodule::admin.add_new_option_value')}}
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
            <form action="{{url('admin/option-value')}}" style="width:100%" method="POST" data-role="validator"
                data-on-before-submit="no_submit" data-on-error-input="notifyOnErrorInput" data-show-error-hint="false"
                novalidate="novalidate" enctype="multipart/form-data">
                @csrf
                <input type="hidden" value="{{old('type')}}" id="type" name="type">

                <div class="col-lg-12 layout-spacing col-md-12">
                    <div class="statbox widget box box-shadow">
                        <div class="widget-header">
                            <div class="row">
                                <div class="col-xl-9 col-md-9 col-sm-9 col-9">
                                    <h4>{{__('productfeaturemodule::admin.add_new_option_value')}}</h4>
                                </div>

                            </div>
                        </div>

                        <div class="widget-content widget-content-area">

                            <div class="row">
                                <div class="col-xl-9 col-lg-9 col-9">

                                    <div class="form-row ">
                                        <div class="input-control required col-md-9 mb-4 required">

                                            <select name="option_id" id="option" placeholder=""
                                                class="disabled-results form-control custom-select"
                                                data-validate-func="required" data-validate-arg="6"
                                                data-validate-hint="{{__('productfeaturemodule::admin.rtype')}} ">
                                                <option disabled selected value="">{{__('productfeaturemodule::admin.type')}}</option>
                                                @foreach($options as $option)
                                                <option {{$option->id==old('option_id')?'selected':''}}
                                                    data-type="{{$option->type}}" value="{{$option->id}}">
                                                    {{$option->name_ar}}</option>
                                                @endforeach
                                            </select>
                                            @if ($errors->has('type'))
                                            @include('commonmodule::includes.error',['errors'=>$errors->toArray(),'filed'=>'type'])
                                            @endif
                                        </div>
                                    </div>



                                    <div class="form-row">
                                        <div class="input-control required col-md-9 mb-4 required">
                                            <input name="name_ar" value="{{ old('name_ar') }}" class="form-control"
                                                data-validate-func="required" data-validate-arg="6"
                                                data-validate-hint="{{__('productfeaturemodule::admin.rname_ar')}} "
                                                placeholder="{{__('productfeaturemodule::admin.name_ar')}}"
                                                autocomplete="off">
                                            @if ($errors->has('name_ar'))
                                            @include('commonmodule::includes.error',['errors'=>$errors->toArray(),'filed'=>'name_ar'])
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-row">
                                        <div class="input-control required col-md-9 mb-4 ">
                                            <input name="name_en" value="{{ old('name_en') }}" class="form-control"
                                                data-validate-func="required" data-validate-arg="6"
                                                data-validate-hint="{{__('productfeaturemodule::admin.rname_en')}} "
                                                placeholder="{{__('productfeaturemodule::admin.name_en')}}"
                                                autocomplete="off">
                                            @if ($errors->has('name_en'))
                                            @include('commonmodule::includes.error',['errors'=>$errors->toArray(),'filed'=>'name_en'])
                                            @endif
                                        </div>
                                    </div>

                                    <div id="color" class="form-row"
                                        style="display:{{(old('type')=='color')?'':'none'}}">
                                        <div class="input-control required col-md-9 mb-4 ">
                                            <input type="text" name="color" id="wheel-demo" class="form-control demo"
                                                data-control="wheel" value="#00b1f4">

                                        </div>
                                    </div>


                                    <div class="col-12">
                                  <button class="btn btn-gradient-danger mb-4 mt-3" type="submit">{{__('adminmodule::admin.save')}}</button>
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
<script type="text/javascript">
    $(document).ready(function () {

        $('#option').on('change', function () {
            var type = $(this).find(':selected').data('type');
            if (type == 'color')
                $('#color').css("display", "flex");
            else
                $('#color').css("display", "none");

            $('#type').val(type);
        });

    });

</script>



<script src="{{ asset('assets/admin/js/design-js/design.js')}}"></script>
<script src="{{ asset('assets/admin/js/forms/form_validation/form_validation_material.js')}}"></script>


<script src="{{ asset('assets/admin/plugins/colorpickers/jquery_minicolors/jquery.minicolors.min.js')}}"></script>
<script src="{{ asset('assets/admin/plugins/colorpickers/jquery_minicolors/jquery.minicolors_examples.js')}}"></script>



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
