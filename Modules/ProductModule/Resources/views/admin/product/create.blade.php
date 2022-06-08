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
        #formValidate .wizard > .content {
            min-height: 25em;
        }

        #example-vertical.wizard > .content {
            min-height: 24.5em;
        }

        .form-control {
            border: 1px solid #ccc;
            color: #888ea8;
            font-size: 15px;
        }

        label {
            color: #3b3f5c;
        }

        .form-control::-webkit-input-placeholder {
            color: #888ea8;
            font-size: 15px;
        }

        .form-control::-ms-input-placeholder {
            color: #888ea8;
            font-size: 15px;
        }

        .form-control::-moz-placeholder {
            color: #888ea8;
            font-size: 15px;
        }

        .form-control:focus {
            border-color: #3862f5;
        }

    </style>


@endsection


@section('title')
    {{__('productmodule::admin.add_new_product')}}
@endsection

@section('content')
    <div id="content" class="main-content">
        <div class="container">
            <div class="page-header">
                <div class="page-title">
                    <h3>  {{__('productmodule::admin.products')}}</h3>
                </div>
            </div>
            <div class="row" id="cancel-row">
                <div class="col-lg-12 layout-spacing">
                    <div class="statbox widget box box-shadow">
                        <div class="widget-header">
                            <div class="row">
                                <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                    <h4>  {{__('productmodule::admin.add_new_product')}}</h4>
                                </div>
                            </div>
                        </div>
                        <div class="widget-content widget-content-area">
                            <form id="product_form" action="{{url('admin/product')}}" method="POST"
                                  data-role="validator" data-on-before-submit="no_submit"
                                  data-on-error-input="notifyOnErrorInput" data-show-error-hint="false"
                                  novalidate="novalidate" enctype="multipart/form-data">
                                @csrf
                                <div id="icon-text" class="">
                                    <h3>
                                        <i class="flaticon-notes-1" style="color: #f8538d;"></i>
                                        {{__('productmodule::admin.product_names')}}
                                    </h3>
                                    @include('productmodule::admin.product.includes.main')

                                    <h3>
                                        <i class="flaticon-settings-7" style="color: #f8538d;"></i>
                                        {{__('productmodule::admin.basic_info')}}
                                    </h3>
                                    @include('productmodule::admin.product.includes.basic')
                                    <h3>
                                        <i class="flaticon-money" style="color: #f8538d;"></i>
                                        {{__('productmodule::admin.prices')}}
                                    </h3>
                                    @include('productmodule::admin.product.includes.prices')


                                    <h3>
                                        <i class="flaticon-user-check" style="color: #f58b22;"></i>
                                        <p id="option_tab">{{__('productmodule::admin.quantities')}}</p>
                                    </h3>
                                    @include('productmodule::admin.product.includes.options')


                                    <h3>
                                        <i class="flaticon-settings-7" style="color: #f8538d;"></i>
                                        {{__('productmodule::admin.attributes')}}
                                    </h3>
                                    @include('productmodule::admin.product.includes.attributes')


                                    <h3>
                                        <i class="flaticon-fill-tick" style="color: #18d17f;"></i>
                                        {{__('productmodule::admin.discounts')}}
                                    </h3>
                                    @include('productmodule::admin.product.includes.discount')


                                    <h3>
                                        <i class="flaticon-fill-tick" style="color: #18d17f;"></i>
                                        {{__('productmodule::admin.shipping_cost')}}
                                    </h3>
                                    @include('productmodule::admin.product.includes.shipping_cost')


                                    <h3>
                                        <i class="flaticon-crop-1" style="color: ##00b1f4;"></i>
                                        {{__('productmodule::admin.image_finish')}}
                                    </h3>
                                    @include('productmodule::admin.product.includes.images')
                                </div>
                            </form>

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    @include('productmodule::admin.product.includes.modals')
@stop


@include('productmodule::admin.product.includes.scripts')
{{-- @include('productmodule::admin.product.includes.ajax') --}}
