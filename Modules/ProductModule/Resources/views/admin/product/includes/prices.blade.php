<section >
    <style media="screen">
        .input-background{
            background: whitesmoke;
        }
    </style>
    <div class="row">

            <div class="col-lg-4">
                <div class="">
                    <label class="" for="mainPrice">{{__('productmodule::admin.first_level')}}</label>
                    <input  class="form-control"  data-validate-func="required" data-validate-arg="6"  name="product_price1" type="text"  required>

                </div>

            </div>
            <div class="col-lg-4">
                <div class="">
                    <label class="" for="mainPrice">{{__('productmodule::admin.second_level')}}</label>
                    <input  class="form-control"  data-validate-func="required" data-validate-arg="6"  name="product_price2" type="text"  required>

                </div>

            </div>
            <div class="col-lg-4">
                <div class="">
                    <label class="" for="mainPrice">{{__('productmodule::admin.third_level')}}</label>
                    <input  class="form-control"  data-validate-func="required" data-validate-arg="6"  name="product_price3" type="text"  required>

                </div>

            </div>
            <div class="col-lg-4">
                <div class="">
                    <label class="" for="mainPrice">{{__('productmodule::admin.fourth_level')}}</label>
                    <input  class="form-control"  data-validate-func="required" data-validate-arg="6"  name="product_price4" type="text"  required>

                </div>

            </div>
            <div class="col-lg-4">
                <div class="">
                    <label class="" for="mainPrice">{{__('productmodule::admin.fifth_level')}}</label>
                    <input  class="form-control"  data-validate-func="required" data-validate-arg="6" id="mainPrice"  name="product_price" type="text"  required>

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
