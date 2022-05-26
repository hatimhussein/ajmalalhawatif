@extends('commonmodule::layouts.master')

@section('title', $title)

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

@section('content')
    <div id="content" class="main-content">
        <div class="container">
            <div class="page-header">
                <div class="page-title">
                    <h3>  {{__('ordermodule::admin.orders')}}</h3>
                </div>
            </div>
            <div class="row" id="cancel-row">
                <div class="col-lg-12 layout-spacing">
                    <div class="statbox widget box box-shadow">
                        <div class="widget-header">
                            <div class="row">
                                <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                    <h4>{{$title}}</h4>
                                </div>
                            </div>
                        </div>
                        <div class="widget-content widget-content-area">
                            <form id="checkout_form" action="{{url('admin/doCheckout')}}" method="post" name="checkout_form"
                                  class="checkout_form" data-on-before-submit="no_submit"
                                  data-on-error-input="notifyOnErrorInput" data-show-error-hint="false">
                                @csrf
                                <div id="icon-text" class="">
                                    <h3>
                                        <i class="flaticon-notes-1" style="color: #f8538d;"></i>
                                        {{__('ordermodule::admin.user_info')}}
                                    </h3>
                                    @include('ordermodule::admin.includes.main')
                                    <h3>
                                        <i class="flaticon-settings-7" style="color: #f8538d;"></i>
                                        {{__('ordermodule::admin.order_products')}}
                                    </h3>

                                    @include('ordermodule::admin.includes.checkout')
                                </div>

                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>








@stop
@include('ordermodule::admin.includes.scripts')



