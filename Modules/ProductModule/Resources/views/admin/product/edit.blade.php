@extends('commonmodule::layouts.master')

@section('css')
    <link rel="stylesheet" href="{{ asset('assets/admin/plugins/jquery-step/jquery.steps.css')}}" type="text/css">
    <link rel="stylesheet" href="{{ asset('assets/admin/plugins/mdl/material.css')}}" type="text/css">
    <link rel="stylesheet" href="{{ asset('assets/admin/css/design-css/design.css')}}" type="text/css">
    <link rel="stylesheet" href="{{ asset('assets/admin/css/design-css/design-icons.css')}}" type="text/css">
    <link rel="stylesheet" href="{{ asset('assets/admin/plugins/select2/select2.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{ asset('assets/admin/plugins/file-upload/file-upload-with-preview.css')}}"
          type="text/css">



    <style>

        #icon-pills-tab.nav-pills {
            display: flex;
            justify-content: space-around;
        }

        #icon-pills-tab .nav-link {
            font-size: 20px;
        }

    </style>


@endsection


@section('title')
    {{__('productmodule::admin.update_product')}}
@endsection

@section('content')
    <div id="content" class="main-content">
        <div class="container">
            <div class="page-header">
                <div class="page-title">
                    <h3>{{__('productmodule::admin.products')}}</h3>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-12">
                    <div class="statbox widget box box-shadow">
                        <div class="widget-header border-bottom border-default">
                            <div class="row">
                                <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                    <h4>{{__('productmodule::admin.update_product')}}</h4>
                                </div>
                            </div>
                        </div>
                        <div class="widget-content widget-content-area icon-pill">
                            <ul class="nav nav-pills mb-5 mt-3" id="icon-pills-tab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="icon-main-tab" data-toggle="pill"
                                       href="#icon-pills-main" role="tab" aria-controls="icon-pills-main"
                                       aria-selected="true"><i
                                            class="flaticon-notes-1"></i> {{__('productmodule::admin.product_names')}}
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="icon-basic-tab" data-toggle="pill" href="#icon-pills-basic"
                                       role="tab" aria-controls="icon-pills-basic" aria-selected="false"><i
                                            class="flaticon-settings-7"></i> {{__('productmodule::admin.basic_info')}}
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" id="icon-prices-tab" data-toggle="pill"
                                       href="#icon-pills-prices" role="tab" aria-controls="icon-pills-prices"
                                       aria-selected="false"><i
                                            class="flaticon-money"></i> {{__('productmodule::admin.prices')}}</a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" id="icon-options-tab" data-toggle="pill"
                                       href="#icon-pills-options" role="tab" aria-controls="icon-pills-options"
                                       aria-selected="false">
                                        <i class="flaticon-user-check"></i>
                                        <span
                                            id="option_tab">{{($product_info->type=='simple')?__('productmodule::admin.quantities'):__('productmodule::admin.options') }}</span>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" id="icon-attributes-tab" data-toggle="pill"
                                       href="#icon-pills-attributes" role="tab" aria-controls="icon-pills-attributes"
                                       aria-selected="false"><i
                                            class="flaticon-settings-7"></i> {{__('productmodule::admin.attributes') }}
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" id="icon-discount-tab" data-toggle="pill"
                                       href="#icon-pills-discount" role="tab" aria-controls="icon-pills-discount"
                                       aria-selected="false"><i
                                            class="flaticon-fill-tick"></i> {{__('productmodule::admin.discounts') }}
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" id="icon-shipping_cost-tab" data-toggle="pill"
                                       href="#icon-pills-shipping_cost" role="tab"
                                       aria-controls="icon-pills-shipping_cost" aria-selected="false"><i
                                            class="flaticon-fill-tick"></i> {{__('productmodule::admin.shipping_cost') }}
                                    </a>
                                </li>


                                <li class="nav-item">
                                    <a class="nav-link" id="icon-images-tab" data-toggle="pill"
                                       href="#icon-pills-images" role="tab" aria-controls="icon-pills-images"
                                       aria-selected="false"><i
                                            class="flaticon-fill-tick"></i> {{__('productmodule::admin.image_finish') }}
                                    </a>
                                </li>


                            </ul>

                            <div class="tab-content" id="icon-pills-tabContent">

                                <div class="tab-pane fade show active" id="icon-pills-main" role="tabpanel"
                                     aria-labelledby="icon-pills-main-tab">
                                    @include('productmodule::admin.product.update_pages.main')
                                </div>

                                <div class="tab-pane fade  " id="icon-pills-basic" role="tabpanel"
                                     aria-labelledby="icon-pills-basic-tab">
                                    @include('productmodule::admin.product.update_pages.basic')
                                </div>

                                <div class="tab-pane fade  " id="icon-pills-prices" role="tabpanel"
                                     aria-labelledby="icon-pills-prices-tab">
                                    @include('productmodule::admin.product.update_pages.prices')
                                </div>


                                <div class="tab-pane fade" id="icon-pills-options" role="tabpanel"
                                     aria-labelledby="icon-pills-options-tab">
                                    @include('productmodule::admin.product.update_pages.options')
                                </div>

                                <div class="tab-pane fade" id="icon-pills-attributes" role="tabpanel"
                                     aria-labelledby="icon-pills-attributes-tab">
                                    @include('productmodule::admin.product.update_pages.attributes')
                                </div>

                                <div class="tab-pane fade" id="icon-pills-discount" role="tabpanel"
                                     aria-labelledby="icon-pills-discount-tab">
                                    @include('productmodule::admin.product.update_pages.discount')
                                </div>

                                <div class="tab-pane fade" id="icon-pills-shipping_cost" role="tabpanel"
                                     aria-labelledby="icon-pills-shipping_cost-tab">
                                    @include('productmodule::admin.product.update_pages.shipping_cost')
                                </div>

                                <div class="tab-pane fade" id="icon-pills-images" role="tabpanel"
                                     aria-labelledby="icon-pills-images-tab">
                                    @include('productmodule::admin.product.update_pages.images')
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>


@stop


@include('productmodule::admin.product.update_pages.scripts')
