<div class="modal fade" id="categoryModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <form action="" id="categoryFormModal" class="col-lg-12" method="POST" data-role="validator"
                  data-on-before-submit="no_submit" data-on-error-input="notifyOnErrorInput" data-show-error-hint="false"
                  novalidate="novalidate" enctype="multipart/form-data">


                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">{{__('productmodule::category.add_new_category')}}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">


                    <div class="layout-spacing">
                        <div class="statbox widget box box-shadow">
                            <div class="widget-header">
                                <div class="row">
                                    <div class="col-xl-9 col-md-9 col-sm-9 col-9">
                                        <h4>{{__('productmodule::category.add_new_category')}}</h4>
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
                                                           aria-selected="true">{{__('productmodule::category.info_ar')}} </a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link" id="profile-tab" data-toggle="tab"
                                                           href="#english" role="tab" aria-controls="english"
                                                           aria-selected="false">{{__('productmodule::category.info_en')}} </a>
                                                    </li>
                                                </ul>


                                                <div class="tab-content" id="simpletabContent">
                                                    <div class="tab-pane fade show active" id="arabic" role="tabpanel"
                                                         aria-labelledby="arabic-tab">

                                                        <div class="form-row">
                                                            <div class="input-control required col-md-9 mb-4 required">
                                                                <input name="name_ar" value="{{ old('name_ar') }}"
                                                                       class="form-control" data-validate-func="required"
                                                                       data-validate-arg="6"
                                                                       data-validate-hint="{{__('productmodule::category.rname_ar')}}"
                                                                       placeholder="{{__('productmodule::category.name_ar')}}"
                                                                       autocomplete="off">
                                                                @if ($errors->has('name_ar'))
                                                                    @include('commonmodule::includes.error',['errors'=>$errors->toArray(),'filed'=>'name_ar'])
                                                                @endif



                                                            </div>
                                                            <div class="col-md-9 mb-4 input-control required">
                                                              <textarea name="desc_ar" class="form-control" rows="5"
                                                                        data-validate-func="required" data-validate-arg="5"
                                                                        data-validate-hint="{{__('productmodule::category.rdesc_ar')}}"
                                                                        placeholder="{{__('productmodule::category.desc_ar')}}">{{ old('desc_ar') }}</textarea>
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
                                                                <input name="name_en" value="{{ old('name_en') }}"
                                                                       class="form-control" data-validate-func="required"
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
                                                                        data-validate-func="required" data-validate-arg="5"
                                                                        data-validate-hint="{{__('productmodule::category.rdesc_en')}}">{{ old('desc_en') }}</textarea>
                                                                @if ($errors->has('desc_en'))
                                                                    @include('commonmodule::includes.error',['errors'=>$errors->toArray(),'filed'=>'desc_en'])
                                                                @endif

                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                        <br> <br><br> <br>
                                        <div class="row">
                                            <div class="col-xl-6 col-lg-6 col-6 ">
                                                <div class="statbox widget box box-shadow  ">
                                                    <label>{{__('productmodule::category.category')}} </label>


                                                    <div class="widget-content">
                                                        <select name="parent_id" placeholder=""
                                                                class="disabled-results form-control custom-select">
                                                            <option value="">{{__('productmodule::category.category')}}  </option>
                                                            @foreach($categories as $category)
                                                                <option {{(old('parent_id') == $category->id )?'selected':''}}
                                                                        value="{{$category->id}}">{{$category->name_en}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>

                                                    @if ($errors->has('parent_id'))
                                                        @include('commonmodule::includes.error',['errors'=>$errors->toArray(),'filed'=>'parent_id'])
                                                    @endif

                                                </div>
                                            </div>

                                            <div class="col-xl-6 col-lg-6 col-6 ">

                                                <div  class="statbox widget box box-shadow">
                                                    <div class="widget-content ">
                                                        <label  >{{__('productmodule::category.filter')}}</label>

                                                        <select  name="option_id[]"  multiple="multiple" class="disabled-results form-control custom-select"  >
                                                            @foreach($options as $option)
                                                                <option  value="{{$option->id}}">{{$option->name_ar}}</option>
                                                            @endforeach

                                                        </select>
                                                    </div>

                                                    @if ($errors->has('offer_products'))
                                                        @include('commonmodule::includes.error',['errors'=>$errors->toArray(),'filed'=>'offer_products'])
                                                    @endif

                                                </div>

                                            </div>

                                            <div class="col-lg-3 col-md-3 col-sm-4 col-4">

                                                <div class="statbox widget box box-shadow ">
                                                    <label> {{__('productmodule::category.status')}}</label>
                                                    <div class="widget-content">
                                                        <label class="switch s-success mb-4 mr-2">

                                                            <input name="status" type="checkbox" checked="">
                                                            <span class="slider round"></span>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-md-3 col-sm-4 col-4">

                                                <div class="statbox widget box box-shadow ">
                                                    <label> {{__('productmodule::category.sort_order')}}</label>
                                                    <input name="sort_order" value="{{ old('sort_order') }}"
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
                                                <div class="custom-file-container " data-upload-id="myFirstImage">
                                                    <label> {{__('productmodule::category.photo')}}<a
                                                            class="custom-file-container__image-clear"
                                                            title="Clear Image"></a></label>
                                                    <label class="custom-file-container__custom-file ">
                                                        <input data-validate-func="required" data-validate-arg="5"
                                                               data-validate-hint="{{__('productmodule::category.r_photo')}}  "
                                                               type="file" name="photo" id="category_photo"
                                                               class="custom-file-container__custom-file__custom-file-input"
                                                               accept="image/*">
                                                        <input type="hidden" name="MAX_FILE_SIZE" value="10485760" />
                                                        <span
                                                            class="custom-file-container__custom-file__custom-file-control"></span>
                                                    </label>
                                                    <h4>
                                                        @if ($errors->has('photo'))
                                                            @include('commonmodule::includes.error',['errors'=>$errors->toArray(),'filed'=>'photo'])
                                                        @endif
                                                    </h4>
                                                    <div class="custom-file-container__image-preview"></div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>


                                </div>

                            </div>
                        </div>
                    </div>



                </div>
                <div class="modal-footer">

                    <div class="col-6">
                        <button type="button" class="btn btn-secondary" id="categoryClose" data-dismiss="modal">Close</button>
                    </div>
                    <div class="col-6">

                        <button class="btn btn-gradient-danger mb-4 mt-3 float-left"
                                type="submit" id="saveCategoryBtn">{{__('productmodule::category.save')}}</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>


<div class="modal fade" id="brandModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <form action="" id="brandFormModal" class="col-lg-12" method="POST" data-role="validator"
                  data-on-before-submit="no_submit" data-on-error-input="notifyOnErrorInput" data-show-error-hint="false"
                  novalidate="novalidate" enctype="multipart/form-data">


                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">{{__('productfeaturemodule::admin.add_new_brand')}}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">


                    <div class="col-lg-12 layout-spacing col-md-12">
                        <div class="statbox widget box box-shadow">
                            <div class="widget-header mb-4">
                                <div class="row">
                                    <div class="col-xl-9 col-md-9 col-sm-9 col-9">
                                        <h4>{{__('productfeaturemodule::admin.add_new_brand')}}</h4>
                                    </div>


                                </div>
                            </div>


                            <div class="row">

                                <div class="col-lg-6">

                                    <div class=" widget-content-area">
                                        <label class="col-md-12">{{__('productfeaturemodule::admin.name_ar')}}</label>
                                        <div class="input-control required col-md-12 mb-4 required">
                                            <input name="name_ar" value="{{ old('name_ar') }}" class="form-control" data-validate-func="required" data-validate-arg="6"  data-validate-hint="{{__('productfeaturemodule::admin.rname_ar')}} " placeholder="{{__('productfeaturemodule::admin.name_ar')}}" autocomplete="off">
                                            @if ($errors->has('name_ar'))
                                                @include('commonmodule::includes.error',['errors'=>$errors->toArray(),'filed'=>'name_ar'])
                                            @endif
                                        </div>
                                        <label class="col-md-12">{{__('productfeaturemodule::admin.name_en')}}</label>
                                        <div class="input-control required col-md-12 mb-4 ">
                                            <input name="name_en" value="{{ old('name_en') }}" class="form-control" data-validate-func="required" data-validate-arg="6"  data-validate-hint="{{__('productfeaturemodule::admin.rname_en')}} " placeholder="{{__('productfeaturemodule::admin.name_en')}}" autocomplete="off">
                                            @if ($errors->has('name_en'))
                                                @include('commonmodule::includes.error',['errors'=>$errors->toArray(),'filed'=>'name_en'])
                                            @endif
                                        </div>


                                        <label class="col-md-12">Sort Order</label>
                                        <div class="input-control required col-md-12 mb-4 ">
                                            <input type="number" name="sort_order" value="{{ old('sort_order') }}" class="form-control" data-validate-func="required" data-validate-arg="6"  data-validate-hint="{{__('productfeaturemodule::admin.rsort_order')}} " placeholder="{{__('productfeaturemodule::admin.sort_order')}}" autocomplete="off">
                                            @if ($errors->has('sort_order'))
                                                @include('commonmodule::includes.error',['errors'=>$errors->toArray(),'filed'=>'sort_order'])
                                            @endif
                                        </div>

                                        <div class="col-12">
                                            <button class="btn btn-gradient-danger mb-4 mt-3" type="submit">{{__('productfeaturemodule::admin.save')}}</button>
                                        </div>
                                    </div>


                                </div>


                                <div class=" col-lg-6 ">
                                    <div class="statbox widget box box-shadow">
                                        <div class="widget-content p-0">
                                            <div class="custom-file-container widget-content-area" data-upload-id="myFirstImage">
                                                <label> {{__('productfeaturemodule::admin.photo')}}<a class="custom-file-container__image-clear" title="Clear Image"></a></label>
                                                <label class="custom-file-container__custom-file " >
                                                    <input data-validate-func="required" data-validate-arg="5" id="brand_photo" data-validate-hint="{{__('productfeaturemodule::admin.rphoto')}}" type="file" name="photo" class="custom-file-container__custom-file__custom-file-input" accept="image/*">
                                                    <input type="hidden" name="MAX_FILE_SIZE" value="10485760" />
                                                    <span class="custom-file-container__custom-file__custom-file-control"></span>
                                                </label>
                                                <h4>
                                                    @if ($errors->has('photo'))
                                                        @include('commonmodule::includes.error',['errors'=>$errors->toArray(),'filed'=>'photo'])
                                                    @endif
                                                </h4>

                                                <div class="custom-file-container__image-preview"></div>
                                            </div>
                                        </div>
                                    </div>

                                </div>




                            </div>
                        </div>
                    </div>


                </div>
                <div class="modal-footer">

                    <div class="col-6">
                        <button type="button" class="btn btn-secondary" id="brandClose" data-dismiss="modal">Close</button>
                    </div>
                    <div class="col-6">

                        <button class="btn btn-gradient-danger mb-4 mt-3 float-left"
                                type="submit" id="saveBrandBtn">{{__('productmodule::category.save')}}</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>



<div class="modal fade" id="attributeModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="" id="attributeFormModal" class="col-lg-12" method="POST" data-role="validator"
                  data-on-before-submit="no_submit" data-on-error-input="notifyOnErrorInput" data-show-error-hint="false"
                  novalidate="novalidate" enctype="multipart/form-data">


                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">{{__('productmodule::admin.new_attribute')}}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">


                    <div class="col-xl-12 pt-3">

                            <div class="form-group">
                                <input type="text" id="name_ar" name="name_ar" placeholder="{{__('productfeaturemodule::admin.name_ar')}}"  id="validationCustom01"  class="   form-control" required>
                            </div>
                            <div class="form-group">
                                <input  type="text" id="name_en" name="name_en" placeholder="{{__('productfeaturemodule::admin.name_en')}}"  id="validationCustom01"  class="   form-control " required>
                            </div>


                    </div>


                </div>
                <div class="modal-footer">

                    <div class="col-6">
                        <button type="button" class="btn btn-secondary" id="attributeClose" data-dismiss="modal">Close</button>
                    </div>
                    <div class="col-6">

                        <button class="btn btn-gradient-danger mb-4 mt-3 float-left"
                                type="submit" id="saveAttributeBtn">{{__('productmodule::category.save')}}</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>



<div class="modal fade" id="optionModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="" id="optionFormModal" class="col-lg-12" method="POST" data-role="validator"
                  data-on-before-submit="no_submit" data-on-error-input="notifyOnErrorInput" data-show-error-hint="false"
                  novalidate="novalidate" enctype="multipart/form-data">


                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">{{__('productmodule::admin.new_option')}}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">


                    <div class="col-lg-12 layout-spacing col-md-12">
                        <div class="statbox widget box box-shadow">
                            <div class="widget-header">
                                <div class="row">
                                    <div class="col-xl-9 col-md-9 col-sm-9 col-9">
                                        <h4>{{__('productfeaturemodule::admin.add_new_option')}}</h4>
                                    </div>
                                </div>
                            </div>

                            <div class="widget-content widget-content-area">

                                <div class="row">

                                    <div class="col-xl-9 col-lg-9 col-9 ">
                                        <div class="form-row">
                                            <div class="input-control required col-md-9 mb-4 required">
                                                <input name="name_ar" value="{{ old('name_ar') }}" class="form-control" data-validate-func="required" data-validate-arg="6"  data-validate-hint="{{__('productfeaturemodule::admin.rname_ar')}} " placeholder="{{__('productfeaturemodule::admin.name_ar')}}" autocomplete="off">
                                                @if ($errors->has('name_ar'))
                                                    @include('commonmodule::includes.error',['errors'=>$errors->toArray(),'filed'=>'name_ar'])
                                                @endif
                                            </div>
                                        </div>

                                        <div class="form-row">
                                            <div class="input-control required col-md-9 mb-4 ">
                                                <input name="name_en" value="{{ old('name_en') }}" class="form-control" data-validate-func="required" data-validate-arg="6"  data-validate-hint="{{__('productfeaturemodule::admin.rname_en')}} " placeholder="{{__('productfeaturemodule::admin.name_en')}}" autocomplete="off">
                                                @if ($errors->has('name_en'))
                                                    @include('commonmodule::includes.error',['errors'=>$errors->toArray(),'filed'=>'name_en'])
                                                @endif
                                            </div>
                                        </div>

                                        <div  class="statbox widget box box-shadow col-md-9">
                                            <label  >{{__('productfeaturemodule::admin.type')}}</label>
                                            <div class="widget-content ">
                                                <select name="type"  placeholder="" class="disabled-results form-control custom-select" data-validate-func="required" data-validate-arg="6"  data-validate-hint="{{__('productfeaturemodule::admin.rtype')}} " >
                                                    <option  selected disabled value="">{{__('productfeaturemodule::admin.choose')}}</option>
                                                    <option value="list">{{__('productfeaturemodule::admin.list')}}</option>
                                                    <option value="color">{{__('productfeaturemodule::admin.color')}}</option>
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
                <div class="modal-footer">

                    <div class="col-6">
                        <button type="button" class="btn btn-secondary" id="optionClose" data-dismiss="modal">Close</button>
                    </div>
                    <div class="col-6">

                        <button class="btn btn-gradient-danger mb-4 mt-3 float-left"
                                type="submit" id="saveOptionBtn">{{__('productmodule::category.save')}}</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>


<div class="modal fade" id="valueModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="" id="valueFormModal" class="col-lg-12" method="POST" data-role="validator"
                  data-on-before-submit="no_submit" data-on-error-input="notifyOnErrorInput" data-show-error-hint="false"
                  novalidate="novalidate" enctype="multipart/form-data">


                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">{{__('productmodule::admin.new_option_value')}}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">


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

                                                <select name="option_id" id="optionInValue" placeholder=""
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


                                    </div>




                                </div>

                            </div>
                        </div>
                    </div>


                </div>
                <div class="modal-footer">

                    <div class="col-6">
                        <button type="button" class="btn btn-secondary" id="valueClose" data-dismiss="modal">Close</button>
                    </div>
                    <div class="col-6">

                        <button class="btn btn-gradient-danger mb-4 mt-3 float-left"
                                type="submit" id="saveValueBtn">{{__('productmodule::category.save')}}</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
