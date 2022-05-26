<section>
    <style media="screen">
        .input-background {
            background: whitesmoke;
        }

    </style>
    <form id="update_product_main_data" method="POST" data-role="validator" data-on-before-submit="no_submit"
          data-on-error-input="notifyOnErrorInput" data-show-error-hint="false" novalidate="novalidate">
        @csrf


        <div class="row">
            <div class="col-lg-4 mb-3">
                <div class="statbox widget box box-shadow">
                    <label>{{__('productmodule::admin.category')}}</label>
                    <select name="parent_id" data-validate-func="required" data-validate-arg="6"
                            class="disabled-results form-control custom-select" required>
                        <option disabled selected value="">{{__('productmodule::admin.choose')}} </option>
                        @foreach($categories as $category)
                            <option {{($product_info->parent_id == $category->id )?'selected':''}}
                                    value="{{$category->id}}">{{ LanguageHelper::nameTranslate($category) }}</option>
                        @endforeach
                    </select>

                    @if ($errors->has('parent_id'))
                        @include('commonmodule::includes.error',['errors'=>$errors->toArray(),'filed'=>'parent_id'])
                    @endif

                </div>
            </div>
            <div class="col-lg-4 mb-3">
                <div class="statbox widget box box-shadow">
                    <label>{{__('productmodule::admin.brands')}}</label>

                    <select name="brand_id" class="disabled-results form-control custom-select">
                        <option disabled selected value=""> {{__('productmodule::admin.choose')}}</option>

                        @foreach($brands as $brand)
                            <option {{($product_info->brand_id == $brand->id )?'selected':''}} value="{{$brand->id}}">
                                {{LanguageHelper::nameTranslate($brand)}}</option>
                        @endforeach
                    </select>

                    @if ($errors->has('parent_id'))
                        @include('commonmodule::includes.error',['errors'=>$errors->toArray(),'filed'=>'parent_id'])
                    @endif

                </div>
            </div>
            {{--    youtube video    --}}
            <div class="col-lg-4">
                <div>
                    <label for="yt_video">{{__('productmodule::admin.yt_video')}}</label>
                    <input class="form-control" id="yt_video" name="yt_video" type="text"
                           value="{{ $product_info->yt_video ? 'https://www.youtube.com/watch?v='.$product_info->yt_video : '' }}">
                </div>
            </div>
            {{--    END youtube video    --}}
        </div>

    <!-- <div class="col-lg-4">
      <div class="widget-content widget-content-area">
        <div class="mb-2">
            <p>Product Type</p>
            <label class="mdl-radio mdl-js-radio mdl-js-ripple-effect d-block" for="option-1">
              <input  type="radio"   {{($product_info->type == 'simple' )?'checked':''}} id="option-1" class="mdl-radio__button"  name="type" value="simple" checked data-validate-func="required" data-validate-arg="6"  data-validate-hint="{{__('productmodule::admin.rproduct_type')}}" required>
              <span class="mdl-radio__label">Simple Product</span>
            </label>
            <label class="mdl-radio mdl-js-radio mdl-js-ripple-effect" for="option-2">
              <input  type="radio" {{($product_info->type == 'combination' )?'checked':''}} id="option-2" class="mdl-radio__button" name="type" value="combination"  data-validate-func="required" data-validate-arg="6"  data-validate-hint="{{__('productmodule::admin.rproduct_type')}}" required>
              <span class="mdl-radio__label">Combination Product</span>
            </label>
        </div>

        <hr>


      </div>

    </div> -->


        <div class="row">
            <div class="col-lg-3">
                <div class="">
                    <label>{{__('productmodule::admin.product_code')}}</label>
                    <input value="{{$product_info->product_code}}" class=" form-control" data-validate-func="required"
                           data-validate-arg="6"
                           name="product_code" type="text" id="sample2" required>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="">
                    <label>{{__('productmodule::admin.product_item_number')}}</label>
                    <input value="{{$product_info->item_number}}" class=" form-control" data-validate-func="required"
                           data-validate-arg="6"
                           name="item_number" type="text" id="sample55" required>
                </div>
            </div>

            <div class="col-lg-3">
                <div class="input-control">
                    <label class="" for="sort">{{__('productmodule::category.sort_order')}}</label>
                    <input class="form-control" data-validate-func="required" data-validate-arg="6" name="sort"
                           min="1" step="1" type="number" value="{{$product_info->sort}}" id="sort" required>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="statbox widget box box-shadow">
                    <label class="mb-3"> {{__('productmodule::admin.view-hide')}}</label>
                    <br>
                    <label class="switch s-success  mb-4 mr-2">
                        <input name="status" type="checkbox" {{($product_info->status == 1 )?'checked':''}}>
                        <span class="slider round"></span>
                    </label>


                </div>


            </div>
        </div>

        <div class="row">
            <div class="col-sm-3 mt-2 mb-2">
                <button id="update_main_data"
                        class="btn btn-md btn-block btn-success">{{__('productmodule::admin.update')}}</button>
            </div>
            <div class="col-xl-9">
                <input type="hidden" name="id" value="{{$product_info->id}}">
            </div>
        </div>


    </form>


</section>
