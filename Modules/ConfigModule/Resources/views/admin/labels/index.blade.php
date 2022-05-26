@extends('commonmodule::layouts.master')

@section('title')
    {{__('configmodule::admin.config')}}
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('assets/admin/css/ui-kit/tabs-accordian/custom-tabs.css')}}" type="text/css">

@endsection



@section('content')



    <!--  BEGIN CONTENT PART  -->
    <div id="content" class="main-content labels-page">
        <div class="container">
            <div class="row">

                <div class="col-12 mt-5 layout-spacing">
                    <div class="statbox widget box box-shadow">
                        <!-- <div class="widget-header border-bottom border-default">
                            <div class="row">
                                <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                    <h4>Vertical Rounded With Icon</h4>
                                </div>
                            </div>
                        </div> -->
                        <div class="widget-content widget-content-area rounded-vertical-pills-icon">

                            <div class="row mb-4 mt-3">
                                <div class="col-sm-12 col-12">
                                    <div class="nav nav-pills mb-sm-0 mb-3" id="rounded-vertical-pills-tab"
                                         role="tablist" aria-orientation="vertical">

                                        <a class="nav-link mb-2 active mx-auto" id="front-file-tab"
                                           data-toggle="pill" href="#front-file" role="tab"
                                           aria-controls="front-file"
                                           aria-selected="true">
                                            <img
                                                src="{{ asset("assets/admin/img/icons/language/Head-script.svg") }}">
                                            <span>{{__('configmodule::admin.header')}}</span>
                                        </a>
                                        <a class="nav-link mb-2  mx-auto" id="warranty-file-tab"
                                           data-toggle="pill" href="#warranty-file" role="tab"
                                           aria-controls="warranty-file"
                                           aria-selected="true">
                                            <img
                                                src="{{ asset("assets/admin/img/icons/language/Warranty.svg") }}">
                                            <span>{{__('commonmodule::sidebar.card_warranty')}}</span>
                                        </a>
                                        <a class="nav-link mb-2  mx-auto" id="sms-warranty-file-tab"
                                           data-toggle="pill" href="#sms-warranty-file" role="tab"
                                           aria-controls="sms-warranty-file"
                                           aria-selected="true">
                                            <img
                                                src="{{ asset("assets/admin/img/icons/language/Warranty.svg") }}">
                                            <span>{{__('warrantymodule::sms_warranty.sms_warranty')}}</a></span>
                                        <a class="nav-link mb-2  mx-auto" id="insurance-file-tab"
                                           data-toggle="pill" href="#insurance-file" role="tab"
                                           aria-controls="insurance-file"
                                           aria-selected="true">
                                            <img
                                                src="{{ asset("assets/admin/img/icons/language/Insurance.svg") }}">
                                            <span>{{__('warrantymodule::insurance.insurance')}}</span>
                                        </a>
                                    </div>
                                </div>

                                <div class="col-sm-12 col-12">
                                    <div class="tab-content" id="rounded-vertical-pills-tabContent">
                                        <div class="tab-pane fade active show" id="front-file"
                                             role="tabpanel"
                                             aria-labelledby="front-file-tab">
                                            <div class="row">
                                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                                    <div class="statbox widget box box-shadow">
                                                        <div class="widget-header">
                                                            <div class="row">
                                                                <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                                                    <h4>{{__('configmodule::admin.header')}} </h4>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="widget-content widget-content-area">
                                                            <div class="mb-4">

                                                                <table id="ecommerce-product-list2"
                                                                       class="ecommerce-product-list table table-hover  table-bordered text-center">
                                                                    <thead>
                                                                    <tr>
                                                                        <th>{{__('configmodule::admin.valuear')}}</th>
                                                                        <th>{{__('configmodule::admin.valueen')}}</th>
                                                                    </tr>
                                                                    </thead>
                                                                    <tbody>

                                                                    @foreach($front_lang_ar as $key=>$value)
                                                                        <tr>
                                                                            <td><p style="display:none;">{{$value}}</p>
                                                                                <input type='text' name='tokenval'
                                                                                       onchange='changeval(this,"{{$key}}","{{$value}}","{{$front_file_ar}}")'
                                                                                       class='form-control'
                                                                                       value='{{$value}}'></td>
                                                                            <td>
                                                                                <p style="display:none;">{{isset($front_lang_en[$key])?$front_lang_en[$key]:''}}</p>
                                                                                <input type='text' name='tokenval'
                                                                                       onchange='changeval(this,"{{$key}}","{{isset($front_lang_en[$key])?$front_lang_en[$key]:''}}","{{$front_file_en}}")'
                                                                                       class='form-control'
                                                                                       value='{{isset($front_lang_en[$key])?$front_lang_en[$key]:''}}'>
                                                                            </td>

                                                                        </tr>
                                                                    @endforeach
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="warranty-file"
                                             role="tabpanel"
                                             aria-labelledby="warranty-file-tab">
                                            <div class="row">
                                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                                    <div class="statbox widget box box-shadow">
                                                        <div class="widget-header">
                                                            <div class="row">
                                                                <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                                                    <h4>{{__('warrantymodule::warranty.card_warranty')}} </h4>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="widget-content widget-content-area">
                                                            <div class="mb-4">

                                                                <table id="ecommerce-product-list2"
                                                                       class="ecommerce-product-list table table-hover  table-bordered text-center">
                                                                    <thead>
                                                                    <tr>
                                                                        <th>{{__('configmodule::admin.valuear')}}</th>
                                                                        <th>{{__('configmodule::admin.valueen')}}</th>
                                                                    </tr>
                                                                    </thead>
                                                                    <tbody>

                                                                    @foreach($warranty_lang_ar as $key=>$value)
                                                                        <tr>
                                                                            <td><p style="display:none;">{{$value}}</p>
                                                                                <input type='text' name='tokenval'
                                                                                       onchange='changeval(this,"{{$key}}","{{$value}}","{{$warranty_file_ar}}")'
                                                                                       class='form-control'
                                                                                       value='{{$value}}'></td>
                                                                            <td>
                                                                                <p style="display:none;">{{$warranty_lang_en[$key] ?? ''}}</p>
                                                                                <input type='text' name='tokenval'
                                                                                       onchange='changeval(this,"{{$key}}","{{$warranty_lang_en[$key] ?? ''}}","{{$warranty_file_en}}")'
                                                                                       class='form-control'
                                                                                       value='{{$warranty_lang_en[$key] ?? ''}}'>
                                                                            </td>

                                                                        </tr>
                                                                    @endforeach
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="tab-pane fade" id="sms-warranty-file"
                                             role="tabpanel"
                                             aria-labelledby="sms-warranty-file-tab">
                                            <div class="row">
                                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                                    <div class="statbox widget box box-shadow">
                                                        <div class="widget-header">
                                                            <div class="row">
                                                                <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                                                    <h4>{{__('warrantymodule::sms_warranty.sms_warranty')}} </h4>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="widget-content widget-content-area">
                                                            <div class="mb-4">

                                                                <table id="ecommerce-product-list2"
                                                                       class="ecommerce-product-list table table-hover  table-bordered text-center">
                                                                    <thead>
                                                                    <tr>
                                                                        <th>{{__('configmodule::admin.valuear')}}</th>
                                                                        <th>{{__('configmodule::admin.valueen')}}</th>
                                                                    </tr>
                                                                    </thead>
                                                                    <tbody>

                                                                    @foreach($smsWarranty_lang_ar as $key=>$value)
                                                                        <tr>
                                                                            <td><p style="display:none;">{{$value}}</p>
                                                                                <input type='text' name='tokenval'
                                                                                       onchange='changeval(this,"{{$key}}","{{$value}}","{{$smsWarranty_file_ar}}")'
                                                                                       class='form-control'
                                                                                       value='{{$value}}'></td>
                                                                            <td>
                                                                                <p style="display:none;">{{$smsWarranty_lang_en[$key] ?? ''}}</p>
                                                                                <input type='text' name='tokenval'
                                                                                       onchange='changeval(this,"{{$key}}","{{$smsWarranty_lang_en[$key] ?? ''}}","{{$smsWarranty_file_en}}")'
                                                                                       class='form-control'
                                                                                       value='{{$smsWarranty_lang_en[$key] ?? ''}}'>
                                                                            </td>

                                                                        </tr>
                                                                    @endforeach
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="tab-pane fade" id="insurance-file"
                                             role="tabpanel"
                                             aria-labelledby="insurance-file-tab">
                                            <div class="row">
                                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                                    <div class="statbox widget box box-shadow">
                                                        <div class="widget-header">
                                                            <div class="row">
                                                                <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                                                    <h4>{{__('warrantymodule::insurance.insurance')}} </h4>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="widget-content widget-content-area">
                                                            <div class="mb-4">

                                                                <table id="ecommerce-product-list2"
                                                                       class="ecommerce-product-list table table-hover  table-bordered text-center">
                                                                    <thead>
                                                                    <tr>
                                                                        <th>{{__('configmodule::admin.valuear')}}</th>
                                                                        <th>{{__('configmodule::admin.valueen')}}</th>
                                                                    </tr>
                                                                    </thead>
                                                                    <tbody>

                                                                    @foreach($insurance_lang_ar as $key=>$value)
                                                                        <tr>
                                                                            <td><p style="display:none;">{{$value}}</p>
                                                                                <input type='text' name='tokenval'
                                                                                       onchange='changeval(this,"{{$key}}","{{$value}}","{{$insurance_file_ar}}")'
                                                                                       class='form-control'
                                                                                       value='{{$value}}'></td>
                                                                            <td>
                                                                                <p style="display:none;">{{$insurance_lang_en[$key] ?? ''}}</p>
                                                                                <input type='text' name='tokenval'
                                                                                       onchange='changeval(this,"{{$key}}","{{$insurance_lang_en[$key] ?? ''}}","{{$insurance_file_en}}")'
                                                                                       class='form-control'
                                                                                       value='{{$insurance_lang_en[$key] ?? ''}}'>
                                                                            </td>

                                                                        </tr>
                                                                    @endforeach
                                                                    </tbody>
                                                                </table>
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
                    </div>
                </div>


            </div>
        </div>
    </div>

@stop

@section('js')
    @include('commonmodule::includes.swal')
    <script src="{{ asset('assets/admin/plugins/table/datatable/datatables.js')}}"></script>
    <script>

        var oTable = $('table.ecommerce-product-list').DataTable();


    </script>
    <script>
        function changeval(va, key, old, file) {
            var data = {"va": va.value, "key": key, "old": old, "file": file};
            $.ajaxSetup({
                headers: {
                    "X-CSRF-Token": "{{@csrf_token()}}"
                }
            });
            $.ajax({
                'type': 'post',
                'url': '{{ url("admin/labels") }}',
                data: data,
                'statusCode': {
                    200: function (response) {


                    },
                    422: function (response) {


                    }
                },
            });
        }
    </script>


@endsection
