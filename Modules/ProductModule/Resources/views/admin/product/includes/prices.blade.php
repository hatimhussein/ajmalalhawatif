<section style="padding: 0!important;">
    <style media="screen">
        .input-background{
            background: whitesmoke;
        }
    </style>

    <style>
        #prices_table {
            justify-content: space-around;
            background: #f1f0f0;
            padding: 10px;
            font-size: 14px;
            color: white;
            font-weight: bold;
        }
        #prices_table label{
            color: #e95f2b;
        }
    </style>

    <div class="row" id="prices_table">

            <div class="col-lg-2">
                <div class="">
                    <label class="" for="mainPrice">{{__('productmodule::admin.first_level')}}</label>
                    <input  class="form-control"  data-validate-func="required" data-validate-arg="6"  name="product_price1" type="text"  required>
                </div>

                <div class="">
                    <label>{{__('productmodule::admin.first_level_min_qty')}}</label>
                    <input class=" form-control" data-validate-func="required"
                           data-validate-arg="6"
                           name="product_min_qty1" id="product_min_qty1" type="number" min="0" required>
                </div>
                <div class="">
                    <label>{{__('productmodule::admin.first_level_max_qty')}}</label>
                    <input class=" form-control" data-validate-func="required"
                           data-validate-arg="6"
                           name="product_max_qty1" id="product_max_qty1" type="number" min="0" required>
                </div>

            </div>
            <div class="col-lg-2">
                <div class="">
                    <label class="" for="mainPrice">{{__('productmodule::admin.second_level')}}</label>
                    <input  class="form-control"  data-validate-func="required" data-validate-arg="6"  name="product_price2" type="text"  required>
                </div>

                <div class="">
                    <label>{{__('productmodule::admin.second_level_min_qty')}}</label>
                    <input class=" form-control" data-validate-func="required"
                           data-validate-arg="6"
                           name="product_min_qty2" id="product_min_qty2" type="number" min="0" required>
                </div>
                <div class="">
                    <label>{{__('productmodule::admin.second_level_max_qty')}}</label>
                    <input class=" form-control" data-validate-func="required"
                           data-validate-arg="6"
                           name="product_max_qty2" id="product_max_qty2" type="number" min="0" required>
                </div>
            </div>
            <div class="col-lg-2">
                <div class="">
                    <label class="" for="mainPrice">{{__('productmodule::admin.third_level')}}</label>
                    <input  class="form-control"  data-validate-func="required" data-validate-arg="6"  name="product_price3" type="text"  required>
                </div>

                <div class="">
                    <label>{{__('productmodule::admin.third_level_min_qty')}}</label>
                    <input class=" form-control" data-validate-func="required"
                           data-validate-arg="6"
                           name="product_min_qty3" id="product_min_qty3" type="number" min="0" required>
                </div>
                <div class="">
                    <label>{{__('productmodule::admin.third_level_max_qty')}}</label>
                    <input class=" form-control" data-validate-func="required"
                           data-validate-arg="6"
                           name="product_max_qty3" id="product_max_qty3" type="number" min="0" required>
                </div>
            </div>
            <div class="col-lg-2">
                <div class="">
                    <label class="" for="mainPrice">{{__('productmodule::admin.fourth_level')}}</label>
                    <input  class="form-control"  data-validate-func="required" data-validate-arg="6"  name="product_price4" type="text"  required>
                </div>

                <div class="">
                    <label>{{__('productmodule::admin.fourth_level_min_qty')}}</label>
                    <input class=" form-control" data-validate-func="required"
                           data-validate-arg="6"
                           name="product_min_qty4" id="product_min_qty4" type="number" min="0" required>
                </div>
                <div class="">
                    <label>{{__('productmodule::admin.fourth_level_max_qty')}}</label>
                    <input class=" form-control" data-validate-func="required"
                           data-validate-arg="6"
                           name="product_max_qty4" id="product_max_qty4" type="number" min="0" required>
                </div>
            </div>
            <div class="col-lg-2">
                <div class="">
                    <label class="" for="mainPrice">{{__('productmodule::admin.fifth_level')}}</label>
                    <input  class="form-control"  data-validate-func="required" data-validate-arg="6" id="mainPrice"  name="product_price" type="text"  required>
                </div>
                <div class="">
                    <label>{{__('productmodule::admin.fifth_level_min_qty')}}</label>
                    <input class=" form-control" data-validate-func="required"
                           data-validate-arg="6"
                           name="product_min_qty5" id="product_min_qty5" type="number" min="0" required>
                </div>
                <div class="">
                    <label>{{__('productmodule::admin.fifth_level_max_qty')}}</label>
                    <input class=" form-control" data-validate-func="required"
                           data-validate-arg="6"
                           name="product_max_qty5" id="product_max_qty5" type="number" min="0" required>
                </div>
            </div>

        </div>

        <div class="row mt-3 mb-3">
            <div class="col-lg-12">
                <div class="">
                    <label class="" for="viewed_levels">{{__('productmodule::admin.view_price_for')}}</label><br>
                    <input  data-validate-func="required" data-validate-arg="6" id="viewed_levels"  name="viewed_levels[]" type="checkbox"  value="1" checked> {{__('productmodule::admin.first_level')}}
                    <input  data-validate-func="required" data-validate-arg="6" id="viewed_levels"  name="viewed_levels[]" type="checkbox"  value="2" checked> {{__('productmodule::admin.second_level')}}
                    <input  data-validate-func="required" data-validate-arg="6" id="viewed_levels"  name="viewed_levels[]" type="checkbox"  value="3" checked> {{__('productmodule::admin.third_level')}}
                    <input  data-validate-func="required" data-validate-arg="6" id="viewed_levels"  name="viewed_levels[]" type="checkbox"  value="4" checked> {{__('productmodule::admin.fourth_level')}}
                    <input  data-validate-func="required" data-validate-arg="6" id="viewed_levels"  name="viewed_levels[]" type="checkbox"  value="5" checked> {{__('productmodule::admin.fifth_level')}}

                </div>

            </div>
        </div>


</section>
