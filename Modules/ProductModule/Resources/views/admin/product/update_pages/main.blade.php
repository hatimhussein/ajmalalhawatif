<section style="height: 574px; overflow-y: auto;">

    <form id="update_product_names" action="{{url('admin/product/4')}}" method="POST" data-role="validator"
          data-on-before-submit="no_submit" data-on-error-input="notifyOnErrorInput" data-show-error-hint="false"
          novalidate="novalidate">
        @csrf
        <div class="row">
            <div class="col-9">
                <input type="hidden" name="id" value="{{$product_info->id}}">
            </div>

            <div class="col-xl-3">
                <button id="update_main_data"
                        class="btn btn-md btn-block btn-success">{{__('productmodule::admin.update')}}</button>
            </div>
        </div>

        <div class="row">

            <div class=" col-12">


                <div class="statbox widget box box-shadow">
                    <div style="height: 311px;">

                        <div class="row mb-4 mt-3">
                            <div class="col-sm-2 col-12 vertical-line-pill">
                                <div class="nav flex-column nav-pills mb-sm-0 mb-3      mx-auto" id="v-border-pills-tab"
                                     role="tablist" aria-orientation="vertical">
                                    <a class="nav-link active" id="v-border-pills-home-tab" data-toggle="pill"
                                       href="#v-border-pills-home" role="tab" aria-controls="v-border-pills-home"
                                       aria-selected="true">{{__('productmodule::admin.info_ar')}}</a>
                                    <a class="nav-link " id="v-border-pills-profile-tab" data-toggle="pill"
                                       href="#v-border-pills-profile" role="tab" aria-controls="v-border-pills-profile"
                                       aria-selected="false">{{__('productmodule::admin.info_en')}}</a>
                                </div>
                            </div>

                            <div class="col-sm-10 col-12">
                                <div class="tab-content" id="v-border-pills-tabContent">

                                    <div class="tab-pane fade show active" id="v-border-pills-home" role="tabpanel"
                                         aria-labelledby="v-border-pills-home-tab">
                                        <div class="form-row">
                                            <div class="input-control required col-md-12 mb-4 required">
                                                <input name="name_ar" value="{{$product_info->name_ar}}"
                                                       class="form-control" data-validate-func="required"
                                                       data-validate-arg="6"
                                                       placeholder="{{__('productmodule::admin.name_ar')}}"
                                                       autocomplete="off" required>
                                            </div>
                                        </div>

                                        <div class="form-row">
                                            <div class="input-control  col-md-12 mb-4 ">
                                                <label
                                                    for="short_desc_ar">{{__('productmodule::admin.short_desc_ar')}}</label>
                                                <textarea id="short_desc_ar" name="short_desc_ar" class="form-control"
                                                          rows="3"
                                                          placeholder="{{__('productmodule::admin.short_desc_ar')}}"
                                                          autocomplete="off">{{$product_info->short_desc_ar}}</textarea>
                                            </div>
                                        </div>

                                        <div class="form-row">
                                            <div class="input-control  col-md-12 mb-4 ">
                                                <label>{{__('productmodule::admin.desc_ar')}}</label>
                                                <textarea name="desc_ar" class="form-control ckeditor"
                                                          placeholder="{{__('productmodule::admin.desc_ar')}}"
                                                          autocomplete="off">{{$product_info->desc_ar}}</textarea>
                                            </div>
                                        </div>


                                    </div>

                                    <div class="tab-pane fade" id="v-border-pills-profile" role="tabpanel"
                                         aria-labelledby="v-border-pills-profile-tab">

                                        <div class="form-row">
                                            <div class="input-control required col-md-12 mb-4 required">
                                                <input name="name_en" value="{{$product_info->name_en}}"
                                                       class="form-control" data-validate-func="required"
                                                       data-validate-arg="6"
                                                       placeholder="{{__('productmodule::admin.name_en')}}"
                                                       autocomplete="off" required>
                                            </div>
                                        </div>

                                        <div class="form-row">
                                            <div class="input-control  col-md-12 mb-4 ">
                                                <label
                                                    for="short_desc_en">{{__('productmodule::admin.short_desc_en')}}</label>
                                                <textarea id="short_desc_en" name="short_desc_en" class="form-control"
                                                          rows="3"
                                                          placeholder="{{__('productmodule::admin.short_desc_en')}}"
                                                          autocomplete="off">{{$product_info->short_desc_en}}</textarea>
                                            </div>
                                        </div>

                                        <div class="form-row">
                                            <div class="input-control  col-md-12 mb-4 ">
                                                <label>{{__('productmodule::admin.desc_en')}}</label>

                                                <textarea name="desc_en" class="form-control ckeditor"
                                                          placeholder="{{__('productmodule::admin.desc_en')}}"
                                                          autocomplete="off">{{$product_info->desc_en}}</textarea>
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
    </form>


</section>
