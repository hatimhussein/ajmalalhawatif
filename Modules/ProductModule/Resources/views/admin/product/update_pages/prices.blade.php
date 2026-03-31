<style>
    #prices_table {
        justify-content: space-around;
        background: #f1f0f0;
        padding: 10px;
        font-size: 14px;
        color: white;
        font-weight: bold;
    }
</style>

<section >
    <style media="screen">
        .input-background{
            background: whitesmoke;
        }
    </style>
    <form id="update_product_prices" method="POST" data-role="validator" data-on-before-submit="no_submit"
          data-on-error-input="notifyOnErrorInput" data-show-error-hint="false" novalidate="novalidate">
        @csrf

        <div class="row" id="prices_table">
            <div class="col-lg-2">
                <div class="">
                    <label>{{__('productmodule::admin.first_level')}}</label>
                    <input value="{{$product_info->product_price1}}" class=" form-control" data-validate-func="required"
                           data-validate-arg="6"
                           name="product_price1" type="text" required>
                </div>
                <div class="">
                    <label>{{__('productmodule::admin.first_level_min_qty')}}</label>
                    <input value="{{$product_info->product_min_qty1}}" class=" form-control" data-validate-func="required"
                           data-validate-arg="6"
                           name="product_min_qty1" type="number" min="0" required>
                </div>
                <div class="">
                    <label>{{__('productmodule::admin.first_level_max_qty')}}</label>
                    <input value="{{$product_info->product_max_qty1}}" class=" form-control" data-validate-func="required"
                           data-validate-arg="6"
                           name="product_max_qty1" type="number" min="0" required>
                </div>
            </div>
            <div class="col-lg-2">
                <div class="">
                    <label>{{__('productmodule::admin.second_level')}}</label>
                    <input value="{{$product_info->product_price2}}" class=" form-control" data-validate-func="required"
                           data-validate-arg="6"
                           name="product_price2" type="text" required>
                </div>
                <div class="">
                    <label>{{__('productmodule::admin.second_level_min_qty')}}</label>
                    <input value="{{$product_info->product_min_qty2}}" class=" form-control" data-validate-func="required"
                           data-validate-arg="6"
                           name="product_min_qty2" type="number" min="0" required>
                </div>
                <div class="">
                    <label>{{__('productmodule::admin.second_level_max_qty')}}</label>
                    <input value="{{$product_info->product_max_qty2}}" class=" form-control" data-validate-func="required"
                           data-validate-arg="6"
                           name="product_max_qty2" type="number" min="0" required>
                </div>
            </div>
            <div class="col-lg-2">
                <div class="">
                    <label>{{__('productmodule::admin.third_level')}}</label>
                    <input value="{{$product_info->product_price3}}" class=" form-control" data-validate-func="required"
                           data-validate-arg="6"
                           name="product_price3" type="text" required>
                </div>
                <div class="">
                    <label>{{__('productmodule::admin.third_level_min_qty')}}</label>
                    <input value="{{$product_info->product_min_qty3}}" class=" form-control" data-validate-func="required"
                           data-validate-arg="6"
                           name="product_min_qty3" type="number" min="0" required>
                </div>
                <div class="">
                    <label>{{__('productmodule::admin.third_level_max_qty')}}</label>
                    <input value="{{$product_info->product_max_qty3}}" class=" form-control" data-validate-func="required"
                           data-validate-arg="6"
                           name="product_max_qty3" type="number" min="0" required>
                </div>
            </div>

{{--            <div class="col-12" style="height: 50px"></div>--}}

            <div class="col-lg-2">
                <div class="">
                    <label>{{__('productmodule::admin.fourth_level')}}</label>
                    <input value="{{$product_info->product_price4}}" class=" form-control" data-validate-func="required"
                           data-validate-arg="6"
                           name="product_price4" type="text" required>
                </div>
                <div class="">
                    <label>{{__('productmodule::admin.fourth_level_min_qty')}}</label>
                    <input value="{{$product_info->product_min_qty4}}" class=" form-control" data-validate-func="required"
                           data-validate-arg="6"
                           name="product_min_qty4" type="number" min="0" required>
                </div>
                <div class="">
                    <label>{{__('productmodule::admin.fourth_level_max_qty')}}</label>
                    <input value="{{$product_info->product_max_qty4}}" class=" form-control" data-validate-func="required"
                           data-validate-arg="6"
                           name="product_max_qty4" type="number" min="0" required>
                </div>
            </div>
            <div class="col-lg-2">
                <div class="">
                    <label>{{__('productmodule::admin.fifth_level')}}</label>
                    <input value="{{$product_info->product_price}}" class=" form-control" id="mainPrice" data-validate-func="required"
                           data-validate-arg="6"
                           name="product_price" type="text" required>
                </div>
                <div class="">
                    <label>{{__('productmodule::admin.fifth_level_min_qty')}}</label>
                    <input value="{{$product_info->product_min_qty5}}" class=" form-control" data-validate-func="required"
                           data-validate-arg="6"
                           name="product_min_qty5" type="number" min="0" required>
                </div>
                <div class="">
                    <label>{{__('productmodule::admin.fifth_level_max_qty')}}</label>
                    <input value="{{$product_info->product_max_qty5}}" class=" form-control" data-validate-func="required"
                           data-validate-arg="6"
                           name="product_max_qty5" type="number" min="0" required>
                </div>
            </div>
        </div>

        <div class="row mt-3 mb-3">
            <div class="col-lg-12">
                <div class="">
                    @php($viewed_levels = explode('_',$product_info->viewed_levels))
                    <label class="" for="viewed_levels">{{__('productmodule::admin.view_price_for')}}</label><br>
                    <input  data-validate-func="required" data-validate-arg="6" id="viewed_levels"  name="viewed_levels[]" type="checkbox"  value="1" {{ in_array(1,$viewed_levels)?'checked':''}}> {{__('productmodule::admin.first_level')}}
                    <input  data-validate-func="required" data-validate-arg="6" id="viewed_levels"  name="viewed_levels[]" type="checkbox"  value="2"  {{ in_array(2,$viewed_levels)?'checked':''}}> {{__('productmodule::admin.second_level')}}
                    <input  data-validate-func="required" data-validate-arg="6" id="viewed_levels"  name="viewed_levels[]" type="checkbox"  value="3"  {{ in_array(3,$viewed_levels)?'checked':''}}> {{__('productmodule::admin.third_level')}}
                    <input  data-validate-func="required" data-validate-arg="6" id="viewed_levels"  name="viewed_levels[]" type="checkbox"  value="4"  {{ in_array(4,$viewed_levels)?'checked':''}}> {{__('productmodule::admin.fourth_level')}}
                    <input  data-validate-func="required" data-validate-arg="6" id="viewed_levels"  name="viewed_levels[]" type="checkbox"  value="5"  {{ in_array(5,$viewed_levels)?'checked':''}}> {{__('productmodule::admin.fifth_level')}}

                </div>

            </div>
        </div>

        <div class="row">
            <div class="col-sm-3 mt-2 mb-2">
                <button id="update_main_data" class="btn btn-md btn-block btn-success">{{__('productmodule::admin.update')}}</button>
            </div>
            <div class="col-xl-9">
                <input type="hidden" name="id" value="{{$product_info->id}}">
            </div>
        </div>
    </form>
</section>
