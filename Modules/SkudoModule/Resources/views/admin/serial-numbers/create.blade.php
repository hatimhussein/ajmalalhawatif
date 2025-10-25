@extends('commonmodule::layouts.master')

@section('css')
    <link rel="stylesheet" href="{{ asset('assets/admin/css/design-css/design.css')}}" type="text/css">
    <link rel="stylesheet" href="{{ asset('assets/admin/css/design-css/design-icons.css')}}" type="text/css">

    <style>
        .row [class*="col-"] .widget .widget-header h4 {
            color: #00d1c1;
        }
    </style>
@endsection

@section('title')
    إضافة رقم تسلسلي جديد
@endsection

@section('content')
    <div id="content" class="main-content">
        <div class="container">
            <div class="page-header">
                <div class="page-title">
                    <h3>الأرقام التسلسلية</h3>
                    <div class="crumbs">
                        <ul id="breadcrumbs" class="breadcrumb">
                            <li><a href="{{url('/admin')}}"><i class="flaticon-home-fill"></i></a></li>
                            <li><a href="{{route('skudo.serial-numbers.index')}}">الأرقام التسلسلية</a></li>
                            <li><a href="#">إضافة رقم تسلسلي جديد</a></li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="row">
                <form action="{{ route('skudo.serial-numbers.store') }}" class="col-lg-12" method="POST" data-role="validator"
                      data-on-before-submit="no_submit" data-on-error-input="notifyOnErrorInput"
                      data-show-error-hint="false"
                      novalidate="novalidate">
                    @csrf

                    <div class="layout-spacing">
                        <div class="statbox widget box box-shadow">
                            <div class="widget-header">
                                <div class="row">
                                    <div class="col-xl-9 col-md-9 col-sm-9 col-9">
                                        <h4>إضافة رقم تسلسلي جديد</h4>
                                    </div>
                                </div>
                            </div>

                            <div class="widget-content widget-content-area">

                                <div class="row">

                                    <div class="col-xl-9 col-lg-9 col-12 ">
                                        <div class="statbox widget box box-shadow">
                                            <div class="simple-tab">
                                                <ul class="nav nav-tabs  mb-3 mt-3" id="simpletab" role="tablist">
                                                    <li class="nav-item">
                                                        <a class="nav-link active" id="home-tab" data-toggle="tab"
                                                           href="#arabic" role="tab" aria-controls="arabic"
                                                           aria-selected="true">المعلومات الأساسية</a>
                                                    </li>
                                                </ul>

                                                <div class="tab-content" id="simpletabContent">
                                                    <div class="tab-pane fade show active" id="arabic" role="tabpanel"
                                                         aria-labelledby="arabic-tab">

                                                        <div class="form-row">
                                                            <div class="col-md-6 mb-4 input-control required">
                                                                <label for="item_number">رقم الصنف</label>
                                                                <input name="item_number" id="item_number" class="form-control" 
                                                                       data-validate-func="required"
                                                                       data-validate-arg="1"
                                                                       data-validate-hint="رقم الصنف مطلوب"
                                                                       value="{{ old('item_number') }}"
                                                                       placeholder="أدخل رقم الصنف">
                                                                @error('item_number')
                                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                                @enderror
                                                            </div>

                                                            <div class="col-md-6 mb-4 input-control">
                                                                <label for="barcode">الباركود</label>
                                                                <input name="barcode" id="barcode" class="form-control" 
                                                                       value="{{ old('barcode') }}"
                                                                       placeholder="أدخل الباركود">
                                                                @error('barcode')
                                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                                @enderror
                                                            </div>

                                                            <div class="col-md-6 mb-4 input-control">
                                                                <label for="product_name_ar">اسم الصنف (عربي)</label>
                                                                <input name="product_name_ar" id="product_name_ar" class="form-control" 
                                                                       value="{{ old('product_name_ar') }}"
                                                                       placeholder="أدخل اسم الصنف بالعربية">
                                                                @error('product_name_ar')
                                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                                @enderror
                                                            </div>

                                                            <div class="col-md-6 mb-4 input-control">
                                                                <label for="product_name_en">اسم الصنف (إنجليزي)</label>
                                                                <input name="product_name_en" id="product_name_en" class="form-control" 
                                                                       value="{{ old('product_name_en') }}"
                                                                       placeholder="أدخل اسم الصنف بالإنجليزية">
                                                                @error('product_name_en')
                                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                                @enderror
                                                            </div>

                                                            <div class="col-md-12 mb-4 input-control required">
                                                                <label for="product_serial">الرقم التسلسلي للمنتج</label>
                                                                <input name="product_serial" id="product_serial" class="form-control" 
                                                                       data-validate-func="required"
                                                                       data-validate-arg="1"
                                                                       data-validate-hint="الرقم التسلسلي مطلوب"
                                                                       value="{{ old('product_serial') }}"
                                                                       placeholder="أدخل الرقم التسلسلي للمنتج">
                                                                @error('product_serial')
                                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                                @enderror
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-xl-3 col-lg-3 col-12">
                                        <div class="statbox widget box box-shadow">
                                            <div class="widget-header">
                                                <div class="row">
                                                    <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                                        <h4>الإجراءات</h4>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="widget-content widget-content-area">
                                                <div class="row">
                                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                                        <button type="submit" class="btn btn-primary btn-block">
                                                            <i class="flaticon-check"></i> حفظ
                                                        </button>
                                                    </div>
                                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                                        <a href="{{ route('skudo.serial-numbers.index') }}" class="btn btn-secondary btn-block">
                                                            <i class="flaticon-cancel-12"></i> إلغاء
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
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
@endsection

@section('js')
    <script src="{{ asset('assets/admin/js/forms/bootstrap_validation/bs_validation_script.js') }}"></script>
@endsection