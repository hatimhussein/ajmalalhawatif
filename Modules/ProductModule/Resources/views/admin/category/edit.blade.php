@extends('commonmodule::layouts.master')

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
    {{__('productmodule::category.update_category')}}
@endsection

@section('content')
    <div id="content" class="main-content">
        <div class="container">
            <div class="page-header">
                <div class="page-title">
                    <h3>{{__('productmodule::category.categories')}}</h3>
                </div>
            </div>

            <div class="row">
                <form action="{{url('admin/category/'.$category->id)}}" class="col-12" method="POST"
                      data-role="validator" data-on-before-submit="no_submit" data-on-error-input="notifyOnErrorInput"
                      data-show-error-hint="false" novalidate="novalidate" novalidate enctype="multipart/form-data">
                    @csrf
                    {{ method_field('PUT') }}
                    <div class="layout-spacing">
                        <div class="statbox widget box box-shadow">
                            <div class="widget-header">
                                <div class="row">
                                    <div class="col-xl-9 col-md-9 col-sm-9 col-9">
                                        <h4>{{__('productmodule::category.update_category')}}</h4>
                                    </div>
                                </div>
                            </div>

                            <div class="widget-content widget-content-area">

                                <div class="row">

                                    <div class="col-xl-9 col-lg-9 col-12 ">
                                        <div class="statbox widget box box-shadow">
                                            <div class="widget-content simple-tab">
                                                <ul class="nav nav-tabs  mb-3 mt-3" id="simpletab" role="tablist">
                                                    <li class="nav-item">
                                                        <a class="nav-link active" id="home-tab" data-toggle="tab"
                                                           href="#arabic" role="tab" aria-controls="arabic"
                                                           aria-selected="true">{{__('productmodule::category.info_ar')}}</a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link" id="profile-tab" data-toggle="tab"
                                                           href="#english" role="tab" aria-controls="english"
                                                           aria-selected="false">{{__('productmodule::category.info_en')}}</a>
                                                    </li>
                                                </ul>


                                                <div class="tab-content" id="simpletabContent">
                                                    <div class="tab-pane fade show active" id="arabic" role="tabpanel"
                                                         aria-labelledby="arabic-tab">

                                                        <div class="form-row">
                                                            <div class="col-md-9 mb-4 input-control required">
                                                                <input name="name_ar" value="{{ $category['name_ar'] }}"
                                                                       class="form-control"
                                                                       data-validate-func="required"
                                                                       data-validate-arg="6"
                                                                       data-validate-hint="{{__('productmodule::category.rname_ar')}} "
                                                                       placeholder="{{__('productmodule::category.name_ar')}}"
                                                                       autocomplete="off">
                                                                <div class="invalid-feedback">

                                                                </div>
                                                                @if ($errors->has('name_ar'))
                                                                    @include('commonmodule::includes.error',['errors'=>$errors->toArray(),'filed'=>'name_ar'])
                                                                @endif


                                                            </div>
                                                            <div class="col-md-9 mb-4 input-control required">
                                                                <textarea name="desc_ar" class="form-control"
                                                                          data-validate-func="required"
                                                                          data-validate-arg="5"
                                                                          data-validate-hint="{{__('productmodule::category.rdesc_ar')}}"
                                                                          rows="5"
                                                                          placeholder="{{__('productmodule::category.desc_ar')}}">{{ $category['desc_ar']}}</textarea>
                                                                @if ($errors->has('desc_ar'))
                                                                    @include('commonmodule::includes.error',['errors'=>$errors->toArray(),'filed'=>'desc_ar'])
                                                                @endif

                                                            </div>
                                                        </div>

                                                    </div>
                                                    <div class="tab-pane fade" id="english" role="tabpanel"
                                                         aria-labelledby="english-tab">
                                                        <div class="form-row">
                                                            <div class="col-md-9 mb-4 input-control required">
                                                                <input name="name_en"
                                                                       value="{{  $category['name_en'] }}"
                                                                       class="form-control"
                                                                       data-validate-func="required"
                                                                       data-validate-arg="5"
                                                                       data-validate-hint="{{__('productmodule::category.rname_en')}} "
                                                                       placeholder="{{__('productmodule::category.name_en')}}"
                                                                       autocomplete="off" required>
                                                                @if ($errors->has('name_en'))
                                                                    @include('commonmodule::includes.error',['errors'=>$errors->toArray(),'filed'=>'name_en'])
                                                                @endif

                                                            </div>
                                                            <div class="col-md-9 mb-4 input-control required">
                                                                <textarea name="desc_en" class="form-control" rows="5"
                                                                          placeholder="{{__('productmodule::category.desc_en')}}"
                                                                          data-validate-func="required"
                                                                          data-validate-arg="5"
                                                                          data-validate-hint="{{__('productmodule::category.rdesc_en')}}">{{  $category['desc_en']}}</textarea>
                                                                @if ($errors->has('desc_en'))
                                                                    @include('commonmodule::includes.error',['errors'=>$errors->toArray(),'filed'=>'desc_en'])
                                                                @endif

                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <br> <br> <br> <br>
                                        <div class="row">
                                            <div class="col-xl-6 col-lg-6 col-8 mb-4">
                                                <div class="statbox widget box box-shadowr">
                                                    <label>{{__('productmodule::category.category')}}</label>


                                                    <div class="widget-content">
                                                        <select name="parent_id" placeholder=""
                                                                class="disabled-results form-control custom-select">
                                                            <option
                                                                value="">{{__('productmodule::category.category')}}</option>
                                                            @foreach($categories as $categorys)
                                                                <option
                                                                    {{($categorys->id == $category->parent_id)?"selected":""}} value="{{$categorys->id}}">{{$categorys->name_en}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>

                                                    @if ($errors->has('parent_id'))
                                                        @include('commonmodule::includes.error',['errors'=>$errors->toArray(),'filed'=>'parent_id'])
                                                    @endif

                                                </div>


                                            </div>


                                            <div class="col-xl-6 col-lg-6 col-6 ">

                                                <div class="statbox widget box box-shadow">
                                                    <div class="widget-content ">
                                                        <label>{{__('productmodule::category.filter')}}</label>

                                                        <select name="option_id[]" multiple="multiple"
                                                                class="disabled-results form-control custom-select">
                                                            @foreach($options as $option)
                                                                <option
                                                                    {{(in_array($option->id,$selectedOptions)?'selected':'')}} value="{{$option->id}}">{{$option->name_ar}}</option>
                                                            @endforeach

                                                        </select>
                                                    </div>

                                                    @if ($errors->has('offer_products'))
                                                        @include('commonmodule::includes.error',['errors'=>$errors->toArray(),'filed'=>'offer_products'])
                                                    @endif

                                                </div>

                                            </div>

                                            <div class="col-lg-3 col-md-3 col-sm-4 col-4">

                                                <div class="statbox widget box box-shadow">
                                                    <label> {{__('productmodule::category.status')}}</label>
                                                    <div class="widget-content">
                                                        <label class="switch s-success  mb-4 mr-2">

                                                            <input name="status"
                                                                   type="checkbox" {{($category->status==1)?'checked':''}}>
                                                            <span class="slider round"></span>
                                                        </label>

                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-lg-3 col-md-3 col-sm-4 col-4">

                                                <div class="statbox widget box box-shadow ">
                                                    <label> {{__('productmodule::category.sort_order')}}</label>
                                                    <input name="sort_order" value="{{ $category->sort_order }}"
                                                           class="form-control" data-validate-func="required"
                                                           data-validate-arg="6"
                                                           type="number">
                                                    @if ($errors->has('sort_order'))
                                                        @include('commonmodule::includes.error',['errors'=>$errors->toArray(),'filed'=>'sort_order'])
                                                    @endif
                                                </div>
                                            </div>


                                        </div>
                                    </div>

                                    <div class="col-xl-3 col-lg-3 col-12 ">
                                        <div class="statbox widget box box-shadow">
                                            <div class="widget-content p-0">
                                                <div class="custom-file-container" data-upload-id="mySecondImage">
                                                    <label> {{__('productmodule::category.photo')}}<a
                                                            class="custom-file-container__image-clear"
                                                            title="Clear Image"></a></label>
                                                    <label class="custom-file-container__custom-file">
                                                        <input type="file" name="photo"
                                                               class="custom-file-container__custom-file__custom-file-input"
                                                               accept="image/*">
                                                        <!-- <input type="hidden" name="MAX_FILE_SIZE" value="10485760" /> -->
                                                        <span
                                                            class="custom-file-container__custom-file__custom-file-control">
                                                          </span>
                                                    </label>
                                                    <h4>
                                                        @if ($errors->has('photo'))
                                                            @include('commonmodule::includes.error',['errors'=>$errors->toArray(),'filed'=>'photo'])
                                                        @endif
                                                    </h4>
                                                    <div class="custom-file-container__image-preview product-list-img">

                                                    </div>

                                                    <div class="custom-file-container__image-preview product-list-img">
                                                        <img src="{{asset('images/category/'.$category->photo)}}"/>

                                                    </div>


                                                </div>
                                            </div>
                                        </div>
                                        <div class="statbox widget box box-shadow">
                                            <div class="widget-content p-0">
                                                <div class="custom-file-container" data-upload-id="myFirstImage">
                                                    <label> {{__('productmodule::category.banner')}}<a
                                                            class="custom-file-container__image-clear"
                                                            title="Clear Image"></a></label>
                                                    <label class="custom-file-container__custom-file">
                                                        <input type="file" name="banner"
                                                               class="custom-file-container__custom-file__custom-file-input"
                                                               accept="image/*">
                                                        <!-- <input type="hidden" name="MAX_FILE_SIZE" value="10485760" /> -->
                                                        <span
                                                            class="custom-file-container__custom-file__custom-file-control">
                                                          </span>
                                                    </label>
                                                    <h4>
                                                        @if ($errors->has('banner'))
                                                            @include('commonmodule::includes.error',['errors'=>$errors->toArray(),'filed'=>'banner'])
                                                        @endif
                                                    </h4>
                                                    <div class="custom-file-container__image-preview product-list-img">

                                                    </div>

                                                    <div class="custom-file-container__image-preview product-list-img">
                                                        <img src="{{asset('images/category/'.$category->banner)}}"/>

                                                    </div>


                                                </div>
                                            </div>
                                        </div>
                                    </div>



                                    <div class="col-12">
                                        <button class="btn btn-gradient-danger mb-4"
                                                type="submit">{{__('productmodule::category.save')}}</button>
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
        var secondUpload = new FileUploadWithPreview('mySecondImage')
    </script>
    <!-- END PAGE LEVEL PLUGINS -->

@endsection
