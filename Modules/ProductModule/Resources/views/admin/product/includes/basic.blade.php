<section>
    <style media="screen">
        .input-background {
            background: whitesmoke;
        }
    </style>
    <div class="row">
        <div class="col-lg-8">
            <div class="row">
                <div class="col-lg-8">
                    <div class="statbox widget box box-shadow   ">
                        <label>{{__('productmodule::admin.category')}}</label>
                        <select name="parent_id" data-validate-func="required" data-validate-arg="6"
                                id="categorySelection" class="disabled-results form-control custom-select" required>
                            <option disabled selected value="">{{__('productmodule::admin.category')}}</option>
                            @foreach($categories as $category)
                                <option
                                    value="{{$category->id}}">{!! LanguageHelper::nameTranslate($category)!!}</option>
                            @endforeach
                        </select>


                        @if ($errors->has('parent_id'))
                            @include('commonmodule::includes.error',['errors'=>$errors->toArray(),'filed'=>'parent_id'])
                        @endif

                    </div>
                </div>
                <div class="col-lg-4">
                    <a href="#" class="btn btn-info" data-toggle="modal"
                       data-target="#categoryModal"> {{__('productmodule::category.add_new_category')}}</a>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-8">
                    <div class="statbox widget box box-shadow   ">
                        <label>{{__('productmodule::admin.brands')}}</label>

                        <select name="brand_id" class="disabled-results form-control custom-select" id="brandSelection">
                            <option disabled selected value="">{{__('productmodule::admin.choose')}}</option>

                            @foreach($brands as $brand)
                                <option value="{{$brand->id}}">{!! LanguageHelper::nameTranslate($brand)!!}</option>
                            @endforeach
                        </select>

                        @if ($errors->has('parent_id'))
                            @include('commonmodule::includes.error',['errors'=>$errors->toArray(),'filed'=>'parent_id'])
                        @endif

                    </div>

                </div>
                <div class="col-lg-4">
                    <a href="#" class="btn btn-info" data-toggle="modal"
                       data-target="#brandModal">{{__('productfeaturemodule::admin.add_new_brand')}}</a>
                </div>
            </div>

        </div>

        <div class="col-lg-4">
            <div class="widget-content">
                <div class="mb-2">
                    <p>{{__('productmodule::admin.type')}}</p>
                    <label class="mdl-radio mdl-js-radio mdl-js-ripple-effect d-block" for="option-1">
                        <input type="radio" id="option-1" class="mdl-radio__button" name="type" value="simple" checked
                               data-validate-func="required" data-validate-arg="6" required>
                        <span class="mdl-radio__label">{{__('productmodule::admin.simple')}}</span>
                    </label>
                    <label class="mdl-radio mdl-js-radio mdl-js-ripple-effect" for="option-2">
                        <input type="radio" id="option-2" class="mdl-radio__button" name="type" value="combination"
                               data-validate-func="required" data-validate-arg="6" required>
                        <span class="mdl-radio__label"> {{__('productmodule::admin.combination')}}</span>
                    </label>
                </div>
                <hr>
            </div>
        </div>


        <div class="col-lg-3">
            <div class="input-control">
                <label class="" for="sample2">{{__('productmodule::admin.product_code')}}</label>
                <input class="form-control" data-validate-func="required" data-validate-arg="6" name="product_code"
                       type="text" id="sample2" required>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="input-control">
                <label class="" for="sample3">{{__('productmodule::admin.product_item_number')}}</label>
                <input class="form-control" data-validate-func="required" data-validate-arg="6" name="item_number"
                       type="text" id="sample3" required>
            </div>
        </div>

        <div class="col-lg-2">
            <div class="input-control">
                <label class="" for="sort">{{__('productmodule::category.sort_order')}}</label>
                <input class="form-control" data-validate-func="required" data-validate-arg="6" name="sort"
                       step="1" type="number" id="sort" value="1" required>
            </div>
        </div>


        <div class="col-lg-3">
            <div class="statbox widget box box-shadow   ">
                <label> {{__('productmodule::admin.view-hide')}}</label>
                <div class="widget-content">
                    <label class="switch s-success  mb-4 mr-2">
                        <input name="status" type="checkbox" checked="">
                        <span class="slider round"></span>
                    </label>
                </div>
            </div>
        </div>
        {{--    youtube video    --}}
        <div class="col-lg-4">
            <div>
                <label for="yt_video">{{__('productmodule::admin.yt_video')}}</label>
                <input class="form-control" id="yt_video" name="yt_video" type="text">
            </div>
        </div>
        {{--    END youtube video    --}}
    </div>


</section>



