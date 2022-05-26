<section>
    <div class="widget-content">
        <h4 class="text-center mb-5">{{__('productmodule::admin.type')}}</h4>

        <div class="row">

            <div class="col-md-4">
                <label class="mdl-radio mdl-js-radio mdl-js-ripple-effect d-block" for="option-1">
                    <input type="radio" id="option-1" class="mdl-radio__button product_type" name="type" value="simple"
                           checked data-validate-func="required" data-validate-arg="6"
                           {{($product_info->type == 'simple' )?'checked':''}}  required>
                    <span class="mdl-radio__label">{{__('productmodule::admin.simple')}}</span>
                </label>
            </div>
            <div class="col-md-4">
                <label class="mdl-radio mdl-js-radio mdl-js-ripple-effect" for="option-2">
                    <input type="radio" id="option-2" class="mdl-radio__button product_type" name="type"
                           value="combination" data-validate-func="required" data-validate-arg="6"
                           {{($product_info->type == 'combination' )?'checked':''}} required>
                    <span class="mdl-radio__label">{{__('productmodule::admin.combination')}}</span>
                </label>

            </div>
        </div>

        <hr>


    </div>


    <div class="col-lg-12 layout-spacing option_body {{($product_info->type == 'simple' )?'hidden':''}}">

        <!-- options -->
        <form id="update_product_combination" method="POST" data-role="validator" data-on-before-submit="no_submit"
              data-on-error-input="notifyOnErrorInput" data-show-error-hint="false" novalidate="novalidate">
            @csrf
            <div class="statbox widget box box-shadow">
                <div class="widget-content">

                    <div class="repeater-slide">
                        <div class="row" data-repeater-list="options">

                            @if($product_info->option->count() > 0)
                                @foreach($product_info->option as $selected_option)
                                    <div class="col-md-6" data-repeater-item>
                                        <div class="form-group mb-2">
                                            <div class="row">
                                                <div class="col-md-8 mb-2">
                                                    <select name="option_id" class="form-control options">
                                                        <option selected disabled
                                                                value="">{{__('productmodule::admin.choose')}} </option>
                                                        @foreach($options as $key=>$option)
                                                            <option
                                                                {{($selected_option->option_id==$option->id)?'selected':''}} value="{{$option->id}}">{!! LanguageHelper::nameTranslate($option) !!}</option>
                                                        @endforeach

                                                    </select>
                                                </div>


                                                <div class="col-md-2 delete">
                                               <span data-repeater-delete class="btn btn-warning">
                                                   <span class="glyphicon glyphicon-remove"></span> {{__('productmodule::admin.delete')}}
                                               </span>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                @endforeach

                            @else
                                <div class="col-md-6" data-repeater-item>
                                    <div class="form-group mb-5">
                                        <div class="row">

                                            <div class="col-md-8 mb-2">
                                                <select name="option_id" class="form-control options">
                                                    <option selected disabled
                                                            value="">{{__('productmodule::admin.choose')}} </option>
                                                    @foreach($options as $option)
                                                        <option
                                                            value="{{$option->id}}">{!! LanguageHelper::nameTranslate($option) !!}</option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            <div class="col-md-2 delete">
                                              <span data-repeater-delete class="btn btn-warning">
                                                  <span class="glyphicon glyphicon-remove"></span> {{__('productmodule::admin.delete')}}
                                              </span>
                                            </div>

                                        </div>
                                    </div>
                                </div>

                            @endif

                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-sm-12">
                                     <span data-repeater-create class="btn btn-button-16 btn-md">
                                         <span class="glyphicon glyphicon-plus"></span> {{__('productmodule::admin.add_new')}}
                                     </span>
                                </div>
                            </div>
                        </div>
                        <hr/>
                    </div>

                    @if(isset($selected_option))
                        @php($values=$selected_option->where('product_id',$product_info->id)->pluck('option_id')->unique()->toArray())
                    @else
                        @php($values=[])
                    @endif

                    <input type="hidden" value="{{(!empty($values)) ?implode(',',$values):''}}" id="selectd_option"
                           name="selectd_option[]">


                </div>
            </div>


            <!-- combinations -->
            <div class="row">

                <div class="col-md-3 ">
                    <button style="width: 100%" class="btn btn-gradient-danger mt-1 mb-3" type="button" id="generate"
                            name="button">{{__('productmodule::admin.generate')}}</button>
                </div>

                <div class="col-lg-10">

                    <div class="widget-content">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped mb-4">
                                <thead>
                                <tr>
                                    <th>{{__('productmodule::admin.combination')}}</th>
                                    <th>{{__('productmodule::admin.quantity')}}</th>
                                    <th>{{__('productmodule::admin.price')}}</th>
                                    <th>{{__('productmodule::product.total_price')}}</th>
                                    <th class="text-center">{{__('productmodule::admin.delete')}}</th>
                                </tr>
                                </thead>
                                <tbody id="acutal_combinations">
                                @php($names=[])
                                @foreach($product_info->combinations as $key=>$combination)
                                    @php($names[$key]=$combination->combination_names)
                                    <tr class="{{$combination->options_ids}}  "
                                        data-name="{{$combination->combination_names}}">
                                        <td><span>{{$combination->combination_names}}</span></td>
                                        <input type="hidden"
                                               name="combination_names[{{$combination->combination_values}}]"
                                               class="form-control-rounded form-control "
                                               value="{{$combination->combination_names}}" id="inlineFormInputName2"
                                               placeholder="Combination">
                                        <input type="hidden" name="options_ids[{{$combination->combination_values}}]"
                                               class="form-control-rounded form-control "
                                               value="{{$combination->combination_names}}" id="inlineFormInputName2"
                                               placeholder="Combination">
                                        <input type="hidden"
                                               name="combination_values[{{$combination->combination_values}}]"
                                               class="form-control-rounded form-control "
                                               value="{{$combination->combination_values}}" id="inlineFormInputName2"
                                               placeholder="Combination">
                                        <td><input type="number" onkeydown="return event.keyCode !== 69"
                                                   name="combination_qty[{{$combination->combination_values}}]"
                                                   value="{{$combination->combination_quantity}}"
                                                   class="form-control-rounded form-control " id="inlineFormInputName2"
                                                   placeholder="Quantity"></td>
                                        <td><input type="text"
                                                   name="combination_price[{{$combination->combination_values}}]"
                                                   class="form-control-rounded form-control "
                                                   value="{{$combination->combination_price}}"
                                                   onchange="getTotalPrice(this.value,this)" id="inlineFormInputName3"
                                                   placeholder="Price"></td>
                                        <td class=" text-center">{{$combination->combination_price + $product_info->product_price}}</td>
                                        <td class=" text-center"><i
                                                data-combination_name="{{$combination->combination_names}}"
                                                class="delete_one_combination t-icon t-hover-icon flaticon-cancel-12"></i>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <input type="hidden" value="{{implode('|',$names)}}" id="names" name="names[]">
                </div>

                <div id="options_values" class="col-xl-2 col-lg-2 col-md-2 col-sm-2 col-2 ">
                    <div class="statbox widget box box-shadow">
                        <div style="padding:0px" class="widget-content">

                            @foreach($optionsValues as $key=>$option)
                                <div class="widget-header">
                                    <div class="row">
                                        <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                            <h4>
                                                {!! LanguageHelper::nameTranslate($option->first()->option) !!}
                                            </h4>
                                        </div>
                                    </div>
                                </div>

                                @foreach($option as $value)

                                    <div class="n-chk">
                                        <label class="new-control new-radio radio-info">
                                            <input data-option_name="{{$value->name_ar}}" value="{{$value->id}}"
                                                   data-name="{{$key}}" name="{{$key}}" type="radio"
                                                   class="new-control-input option_type">
                                            <span class="new-control-indicator"></span>

                                            {!! LanguageHelper::nameTranslate($value) !!}
                                        </label>
                                    </div>
                                @endforeach
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>


            <div class="row">
                <div class="col-sm-3 mb-2 mt-2">
                    <button id="update_main_data"
                            class="btn btn-md btn-block btn-success">{{__('productmodule::admin.update')}}</button>
                </div>
                <div class="col-xl-9">
                    <input type="hidden" name="id" value="{{$product_info->id}}">
                    <input type="hidden" name="type" value="combination">

                </div>
            </div>


        </form>
    </div>

    <!-- Quantity -->
    <div id="quantity" class="col-lg-12 layout-spacing {{($product_info->type == 'combination' )?'hidden':''}} ">
        <form id="update_product_quantity" method="POST" data-role="validator" data-on-before-submit="no_submit"
              data-on-error-input="notifyOnErrorInput" data-show-error-hint="false" novalidate="novalidate">
            @csrf
            <div class="row">
                <div class="col-xl-9">
                    <input type="hidden" name="id" value="{{$product_info->id}}">
                    <input type="hidden" name="type" value="simple">
                </div>

                <div class="col-xl-3 mb-5">
                    <button id="update_main_data"
                            class="btn btn-md btn-block btn-success">{{__('productmodule::admin.update')}}</button>
                </div>
            </div>

            <div class="statbox widget box box-shadow">
                <div class="widget-content widget-content-area">
                    <input onkeydown="return event.keyCode !== 69" value="{{$product_info->product_quantity}}"
                           name="product_quantity" placeholder="{{__('productmodule::admin.quantity')}}" type="number"
                           class="form-control text-center">
                </div>
            </div>
        </form>

    </div>


</section>
