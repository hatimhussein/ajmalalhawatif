@extends('commonmodule::layouts.master')

@section('css')
    <link rel="stylesheet" href="{{ asset('assets/admin/css/design-css/design.css')}}" type="text/css">
    <link rel="stylesheet" href="{{ asset('assets/admin/css/design-css/design-icons.css')}}" type="text/css">

    <link rel="stylesheet" href="{{ asset('assets/admin/plugins/select2/select2.min.css')}}" type="text/css">

    <!-- BEGIN PAGE LEVEL STYLES -->
    <link rel="stylesheet" href="{{ asset('assets/admin/plugins/file-upload/file-upload-with-preview.css')}}"
          type="text/css">
    <!--  BEGIN CUSTOM STYLE FILE  -->


    <style>
        .row [class*="col-"] .widget .widget-header h4 {
            color: #00d1c1;
        }
    </style>
    <!--  END CUSTOM STYLE FILE  -->

    <!-- END PAGE LEVEL STYLES -->

@endsection


@section('title')
    {{__('productfeaturemodule::admin.add_new_offer')}}
@endsection

@section('content')
    <div id="content" class="main-content">
        <div class="container">
            <div class="page-header">
                <div class="page-title">
                    <h3>
                        <a href="{{url('admin/Offers')}}">
                            {{__('productfeaturemodule::admin.offers')}}
                        </a>
                    </h3>

                </div>
            </div>

            <div class="row">
                <form id="offer_form" action="{{url('admin/offers')}}" style="width:100%" method="POST"
                      data-role="validator" data-on-before-submit="no_submit" data-on-error-input="notifyOnErrorInput"
                      data-show-error-hint="false" novalidate="novalidate" enctype="multipart/form-data">
                    @csrf

                    <div class="col-lg-12 layout-spacing col-md-12">
                        <div class="statbox widget box box-shadow">
                            <div class="widget-header">
                                <div class="row">
                                    <div class="col-xl-9 col-md-9 col-sm-9 col-9">
                                        <h4>{{__('productfeaturemodule::admin.add_new_offer')}}</h4>
                                    </div>


                                </div>
                            </div>

                            <div class="widget-content widget-content-area">

                                <div class="row">

                                    <div class="col-lg-9 col-12">


                                        <div class="statbox widget box box-shadow">
                                            <div>

                                                <div class="row mb-4 mt-3">
                                                    <div class="col-sm-3 col-12 vertical-line-pill">
                                                        <div
                                                            class="nav flex-column nav-pills mb-sm-0 mb-3   text-center mx-auto"
                                                            id="v-border-pills-tab" role="tablist"
                                                            aria-orientation="vertical">
                                                            <a class="nav-link active" id="v-border-pills-home-tab"
                                                               data-toggle="pill" href="#v-border-pills-home" role="tab"
                                                               aria-controls="v-border-pills-home"
                                                               aria-selected="true">{{__('productfeaturemodule::admin.info_ar')}}</a>
                                                            <a class="nav-link  text-center"
                                                               id="v-border-pills-profile-tab" data-toggle="pill"
                                                               href="#v-border-pills-profile" role="tab"
                                                               aria-controls="v-border-pills-profile"
                                                               aria-selected="false">{{__('productfeaturemodule::admin.info_en')}}</a>
                                                            <a class="nav-link  text-center"
                                                               id="v-border-pills-photo-tab" data-toggle="pill"
                                                               href="#v-border-pills-photo" role="tab"
                                                               aria-controls="v-border-pills-photo"
                                                               aria-selected="false">{{__('productfeaturemodule::admin.offer_photo')}}</a>
                                                            <a class="nav-link  text-center"
                                                               id="v-border-pills-products-tab" data-toggle="pill"
                                                               href="#v-border-pills-products" role="tab"
                                                               aria-controls="v-border-pills-products"
                                                               aria-selected="false">{{__('productfeaturemodule::admin.offer_products')}}</a>
                                                        </div>
                                                    </div>

                                                    <div class="col-sm-9 col-12">
                                                        <div class="tab-content" id="v-border-pills-tabContent">

                                                            <div class="tab-pane fade show active mb-5"
                                                                 id="v-border-pills-home" role="tabpanel"
                                                                 aria-labelledby="v-border-pills-home-tab">
                                                                <div class="form-row">
                                                                    <div
                                                                        class="input-control required col-md-12 mb-4 required">
                                                                        <input name="name_ar" value="{{old('name_ar')}}"
                                                                               class="form-control"
                                                                               placeholder="{{__('productfeaturemodule::admin.name_ar')}}"
                                                                               autocomplete="off">
                                                                    </div>
                                                                </div>

                                                                <div class="form-row">
                                                                    <div class="input-control  col-md-12 mb-4 ">

                                                                        <textarea name="desc_ar"
                                                                                  class="form-control ckeditor"
                                                                                  placeholder="{{__('productfeaturemodule::admin.desc_ar')}}"
                                                                                  autocomplete="off">{{ old('desc_ar')}}</textarea>
                                                                    </div>
                                                                </div>


                                                            </div>

                                                            <div class="tab-pane fade mb-5" id="v-border-pills-profile"
                                                                 role="tabpanel"
                                                                 aria-labelledby="v-border-pills-profile-tab">

                                                                <div class="form-row">
                                                                    <div
                                                                        class="input-control required col-md-12 mb-4 required">
                                                                        <input name="name_en"
                                                                               value="{{ old('name_en')}}"
                                                                               class="form-control"
                                                                               placeholder="{{__('productfeaturemodule::admin.name_en')}}"
                                                                               autocomplete="off">
                                                                    </div>
                                                                </div>

                                                                <div class="form-row">
                                                                    <div class="input-control  col-md-12 mb-4 ">
                                                                        <textarea name="desc_en"
                                                                                  class="form-control ckeditor"
                                                                                  placeholder="{{__('productfeaturemodule::admin.desc_en')}}"
                                                                                  autocomplete="off">{{ old('desc_en')}}</textarea>
                                                                    </div>
                                                                </div>

                                                            </div>

                                                            <div class="tab-pane fade" id="v-border-pills-photo"
                                                                 role="tabpanel"
                                                                 aria-labelledby="v-border-pills-photo-tab">

                                                                <div class="statbox widget box box-shadow">
                                                                    <div class="widget-content widget-content-area">
                                                                        <div class="custom-file-container"
                                                                             data-upload-id="myFirstImage">
                                                                            <label> <a href="javascript:void(0)"
                                                                                       class="custom-file-container__image-clear"
                                                                                       title="Clear Image"></a></label>

                                                                            <label
                                                                                class="custom-file-container__custom-file">
                                                                                <input id="photo" name="photo"
                                                                                       type="file"
                                                                                       class="custom-file-container__custom-file__custom-file-input"
                                                                                       accept="image/*">
                                                                                <span
                                                                                    class="custom-file-container__custom-file__custom-file-control"></span>
                                                                            </label>
                                                                            <div
                                                                                class="custom-file-container__image-preview"></div>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                            </div>

                                                            <div class="tab-pane fade" id="v-border-pills-products"
                                                                 role="tabpanel"
                                                                 aria-labelledby="v-border-pills-products-tab">
                                                                @if(false)
                                                                <div class="statbox widget box box-shadow">
                                                                    <div class="widget-content ">
                                                                        <label>{{__('productfeaturemodule::admin.search_product')}}</label>
                                                                        <br><br>
                                                                        <div class="">

                                                                            <input id="search_offer" name="search_offer"
                                                                                   type="radio" value="1"
                                                                                   onclick="SearchName()">
                                                                            <label>{{__('productfeaturemodule::admin.name')}}</label>&nbsp&nbsp&nbsp
                                                                            <input id="search_offer" name="search_offer"
                                                                                   type="radio" value="2"
                                                                                   onclick="SearchID()">
                                                                            <label>{{__('productfeaturemodule::admin.number')}}</label>&nbsp&nbsp&nbsp
                                                                            <input id="search_offer" name="search_offer"
                                                                                   type="radio" value="3"
                                                                                   onclick="SearchParcode()">
                                                                            <label>{{__('productfeaturemodule::admin.parcode')}}</label>

                                                                        </div>


                                                                    </div>


                                                                </div>
                                                                    <br>
                                                                @endif
                                                                <div class="statbox widget box box-shadow text-center">

                                                                    <div class="row" id="type_search"></div>
                                                                </div>
                                                                <br>
                                                                <div class="statbox widget box box-shadow">
                                                                    <div class="widget-content ">
                                                                        <label>{{__('productfeaturemodule::admin.offer_products')}}</label>
                                                                        <!--   <select  name="serach_product_name"  class="disabled-results form-control custom-select" id="serach_product_name" >

                                                                                                                   <option value="1">1</option>


                                                                                                               </select> -->
                                                                        <select name="offer_products[]"
                                                                                multiple="multiple"
                                                                                class="disabled-results form-control custom-select offer_products_select"
                                                                                id="offer_products">
                                                                            @foreach($products as $product)
                                                                                <option
                                                                                    value="{{$product->id}}">{{$product->name_ar}}</option>
                                                                            @endforeach

                                                                        </select>
                                                                    </div>

                                                                    @if ($errors->has('type'))
                                                                        @include('commonmodule::includes.error',['errors'=>$errors->toArray(),'filed'=>'type'])
                                                                    @endif

                                                                </div>

                                                            </div>


                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="">
                                            <label class=""
                                                   for="viewed_levels">{{__('productfeaturemodule::admin.view_price_for')}}</label><br>
                                            <input data-validate-func="required" data-validate-arg="6"
                                                   id="viewed_levels" name="viewed_levels[]" type="checkbox" value="1"
                                                   checked> {{__('productfeaturemodule::admin.first_level')}}
                                            <input data-validate-func="required" data-validate-arg="6"
                                                   id="viewed_levels" name="viewed_levels[]" type="checkbox" value="2"
                                                   checked> {{__('productfeaturemodule::admin.second_level')}}
                                            <input data-validate-func="required" data-validate-arg="6"
                                                   id="viewed_levels" name="viewed_levels[]" type="checkbox" value="3"
                                                   checked> {{__('productfeaturemodule::admin.third_level')}}
                                            <input data-validate-func="required" data-validate-arg="6"
                                                   id="viewed_levels" name="viewed_levels[]" type="checkbox" value="4"
                                                   checked> {{__('productfeaturemodule::admin.fourth_level')}}
                                            <input data-validate-func="required" data-validate-arg="6"
                                                   id="viewed_levels" name="viewed_levels[]" type="checkbox" value="5"
                                                   checked> {{__('productfeaturemodule::admin.fifth_level')}}
                                        </div>
                                    </div>
                                    <!--             <div class="row mt-3 mb-3">
                             <div class="col-lg-12"> -->


                                    <!--             </div>
                                            </div> -->
                                    <div class="col-lg-3">

                                        <div class="statbox widget box box-shadow">
                                            <label
                                                class="col-sm-12">{{__('productfeaturemodule::admin.start_date')}}</label>
                                            <div class="input-control required col-md-12 mb-3   required">
                                                <input {{ old('start_date')}} type="date" name="start_date"
                                                       class="form-control"
                                                       placeholder="{{__('productfeaturemodule::admin.start_date')}}"
                                                       autocomplete="off">
                                            </div>

                                            @if ($errors->has('parent_id'))
                                                @include('commonmodule::includes.error',['errors'=>$errors->toArray(),'filed'=>'parent_id'])
                                            @endif

                                            <label
                                                class="col-sm-12">{{__('productfeaturemodule::admin.end_date')}}</label>
                                            <div class="input-control required col-md-12 mb-3   required">
                                                <input type="date" {{ old('end_date')}}  name="end_date"
                                                       class="form-control"
                                                       placeholder="{{__('productfeaturemodule::admin.end_date')}}"
                                                       autocomplete="off">
                                            </div>

                                            @if ($errors->has('parent_id'))
                                                @include('commonmodule::includes.error',['errors'=>$errors->toArray(),'filed'=>'parent_id'])
                                            @endif


                                        </div>

                                        <label
                                            class="col-sm-12">{{__('productfeaturemodule::admin.discount_type')}}</label>
                                        <div class="input-control select full-size mb-3 col-md-12 required"
                                             data-role="input">
                                            <select id="type" name="type" class="form-control text-center">
                                                <option value=""
                                                        selected=""> {{__('productfeaturemodule::admin.discount_type')}}</option>
                                                <option
                                                    value="value">{{__('productfeaturemodule::admin.amount')}}</option>
                                                <option
                                                    value="percentage">{{__('productfeaturemodule::admin.precentage')}}</option>
                                            </select>
                                        </div>

                                        @if ($errors->has('type'))
                                            @include('commonmodule::includes.error',['errors'=>$errors->toArray(),'filed'=>'type'])
                                        @endif


                                        <div class="statbox widget box box-shadow text-center">

                                            <div class="mt-3" id="type_val">

                                            </div>


                                        </div>


                                        <button style="width:100%" class="btn btn-gradient-danger mb-4 mt-3"
                                                type="submit">{{__('productfeaturemodule::admin.save')}}</button>


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

    </script>
    <!-- END PAGE LEVEL PLUGINS -->
    <script>
        function SearchName() {
            $('#type_search').html('<div class="col-lg-5 input-control required" ><input type="text" name="product_search" id="product_search" placeholder="{{__('productfeaturemodule::admin.name')}}" class="form-control"></div><div class="col-lg-4 "><button type="button" name="search_button" class="btn btn-info"  id="search_button" onclick="clickFunction()">{{__('productfeaturemodule::admin.search')}}</button></div><input type="hidden" name="search_type" id="search_type" value="1">');
        }

        function SearchID() {
            $('#type_search').html('<div class="col-lg-5 input-control required"><input type="text" name="product_search" id="product_search" placeholder="{{__('productfeaturemodule::admin.number')}}" class="form-control"></div><div class="col-lg-4 "><button type="button" name="search_button" class="btn btn-info"  id="search_button"  onclick="clickFunction()">{{__('productfeaturemodule::admin.search')}}</button></div><input type="hidden" name="search_type" id="search_type" value="2">');
        }

        function SearchParcode() {
            $('#type_search').html('<div class="col-lg-5 input-control required"><input type="text"  name="product_search" id="product_search" placeholder="{{__('productfeaturemodule::admin.parcode')}}" class="form-control"></div><div class="col-lg-4 "><button type="button" name="search_button" class="btn btn-info"  id="search_button"  onclick="clickFunction()">{{__('productfeaturemodule::admin.search')}}</button></div><input type="hidden" name="search_type" id="search_type" value="3">');
        }

        function clickFunction() {
            var search_type = $("#search_type").val();
            var search_product = $("#product_search").val();

            $.ajax({
                'type': 'get',
                'url': '{{ url("admin/offers/search/product") }}',
                data: {'search_type': search_type, 'search_product': search_product},
                success: function (data) {
                    $(".offer_products_select").html(data);
                }


            });
        }


        $('#type').change(function () {
            var type = $(this).val();

            if (type == 'value') {
                $('#type_title').text('{{__('productfeaturemodule::admin.amount')}}');

                $('#type_val').html('<input type="text"  autocomplete="off"class="form-control"  placeholder="{{__('productfeaturemodule::admin.amount')}}" name="value">');

            } else {
                $('#type_title').text('{{__('productfeaturemodule::admin.precentage')}}');
                $('#type_val').html('<input type="text"  autocomplete="off" class="form-control"   placeholder="{{__('productfeaturemodule::admin.precentage')}}" name="value">');


            }
        });


        $("#offer_form").submit(function (event) {
            event.preventDefault();
            let submitBtn = $('#offer_form button[type="submit"]');
            let oldText = submitBtn.text();

            submitBtn.html('<div class="cp-spinner cp-skeleton"></div>');
            submitBtn.prop('disabled', true);

            var form = document.getElementById('offer_form');
            var isValidForm = form.checkValidity();
            if (isValidForm) {

                token = '{{csrf_token()}}';
                photo = $('#photo').prop('files')[0];


                var formdata = new FormData(document.querySelector('#offer_form'));
                formdata.append("photo", photo);
                formdata.append("_token", token);


                console.log(formdata);

                $.ajax({
                    'type': 'post',
                    'url': '{{ url("admin/offers") }}',
                    data: formdata,
                    processData: false,
                    contentType: false,

                    'statusCode': {
                        200: function (response) {
                            swal("رائع", "تم اضافة العرض بنجاح   ", "success", {button: "Ok",});
                            window.location.href = '{{url("admin/offers")}}';
                        },
                        422: function (response) {
                            var erro = '';
                            let errors = reverseObj(response.responseJSON.errors);

                            $.map(errors, function (error) {
                                if (error[0])
                                    swal("Error", error[0], "error", {button: "Ok",});
                            });

                            submitBtn.text(oldText);
                            submitBtn.prop('disabled', false);
                        }
                    },
                });
            } else {
                submitBtn.text(oldText);
                submitBtn.prop('disabled', false);
            }
        });
        $('#offer_products').select2({

            ajax: {
                url: '{{ url("admin/offers/search/product") }}',
                dataType: 'json',
                data: function (params) {
                    var query = {
                        search: params.term,
                        type: 'public'
                    }

                    return query;
                },
                processResults: function (data) {
                    // Transforms the top-level key of the response object from 'items' to 'results'
                    return {
                        results: data.items
                    };
                }
            }
        });

        $("#offer_products").on('select2:select select2:unselect', function (e) {

            let notSelected = $(this).find('option').not('option:selected').not('option[value="all"]');

            if (e.params.data.id == 'all') {

                if (notSelected.length) {
                    notSelected.prop('selected', true);
                } else {
                    $(this).find('option').prop('selected', false);
                }

            }

            $(this).find('option[value="all"]').prop('selected', false);
            $("#offer_products").change();
        });
    </script>


@endsection
