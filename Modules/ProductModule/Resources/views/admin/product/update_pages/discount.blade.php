<section style="padding-bottom:0px;">
  <form id="update_product_dicounts"   method="POST"  data-role="validator" data-on-before-submit="no_submit" data-on-error-input="notifyOnErrorInput" data-show-error-hint="false" novalidate="novalidate">
    @csrf

    <div  class="col-lg-12 layout-spacing ">
           <div class="statbox widget box box-shadow">

                       <div class="repeater-slide">
                           <div class="row" data-repeater-list="discount">

                             @if($product_info->discounts->count() > 0)

                                @foreach($product_info->discounts as $discount)
                                   <div style="    border-bottom: 2px solid;  margin-bottom: 14px;" class="col-md-12" data-repeater-item>
                                       <div class="form-group mb-2">
                                           <div class="row">
                                             <div class="col-md-4 mb-4 input-control ">
                                               <label>{{__('productmodule::admin.discount_type')}}</label>
                                                 <select name="discount_type" class="form-control " >
                                                     <option disabled selected value="" >{{__('productmodule::admin.discount_type')}}</option>
                                                     <option {{($discount->discount_type=='value')?'selected':''}} value="value" >{{__('productmodule::admin.amount')}}</option>
                                                     <option {{($discount->discount_type=='percentage')?'selected':''}} value="percentage" >{{__('productmodule::admin.percentage')}}</option>
                                                  </select>
                                             </div>

                                             <div class="col-md-4 mb-4">
                                                   <div class="input-control required col-md-12  ">
                                                     <label>{{__('productmodule::admin.value')}}</label>

                                                       <input  name="discount_value" value="{{$discount->discount_value}}" class="form-control text-center" data-validate-func="required" data-validate-arg="6"   placeholder="{{__('productmodule::product.discount_value')}}" autocomplete="off" required>
                                                   </div>
                                             </div>

                                             <div class="col-md-4 mb-4">
                                                   <div class="input-control required col-md-12 required">
                                                     <label>{{__('productmodule::admin.quantity')}}</label>

                                                       <input type="number" name="discount_quantity" value="{{$discount->discount_quantity}}" class="form-control text-center" data-validate-func="required" data-validate-arg="6"   placeholder="{{__('productmodule::product.discount_quantity')}}" autocomplete="off" required>
                                                   </div>
                                             </div>

                                             <div class="col-md-4 mb-4">
                                                   <div class="input-control  col-md-12 " style="padding:0">
                                                     <label>{{__('productmodule::admin.start_date')}}</label>

                                                       <input type="date" name="start_date" value="{{$discount->start_date}}" class="form-control text-center" >
                                                   </div>
                                             </div>


                                             <div class="col-md-4 mb-4">
                                                   <div class="input-control col-md-12 ">
                                                     <label>{{__('productmodule::admin.end_date')}}</label>
                                                       <input type="date" name="end_date" value="{{$discount->end_date}}" class="form-control text-center">
                                                   </div>
                                             </div>



                                             <div class="col-md-2 delete mt-4" >
                                               <span data-repeater-delete class="btn btn-warning">
                                                   <span class="glyphicon glyphicon-remove"></span> {{__('productmodule::admin.delete')}}
                                               </span>
                                             </div>

                                           </div>
                                       </div>
                                   </div>


                                @endforeach
                              @else
                                <div class="col-md-12" data-repeater-item>
                                    <div class="form-group mb-2">
                                        <div class="row">
                                          <div class="col-md-2 mb-4 input-control required">
                                            <label>{{__('productmodule::admin.discount_type')}}</label>

                                              <select name="discount_type" class="form-control" >
                                                  <option disabled selected value="" >{{__('productmodule::admin.discount_type')}}</option>
                                                  <option value="value" >{{__('productmodule::admin.amount')}}</option>
                                                  <option  value="percentage" >{{__('productmodule::admin.percentage')}}</option>
                                               </select>
                                          </div>

                                          <div class="col-md-2 mb-4">
                                                <div class="input-control required col-md-12">
                                                  <label>{{__('productmodule::admin.value')}}</label>

                                                    <input  name="discount_value"  class="form-control" data-validate-func="required" data-validate-arg="6"   placeholder="{{__('productmodule::product.discount_value')}}" autocomplete="off" required>
                                                </div>
                                          </div>

                                          <div class="col-md-2 mb-4">
                                                <div class="input-control  col-md-12 required">
                                                  <label>{{__('productmodule::admin.quantity')}}</label>

                                                    <input type="number" name="discount_quantity"  class="form-control" data-validate-func="required" data-validate-arg="6"   placeholder="{{__('productmodule::product.discount_quantity')}}" autocomplete="off" required>
                                                </div>
                                          </div>

                                          <div class="col-md-2 mb-4">
                                                <div class="input-control  col-md-12 ">
                                                  <label>{{__('productmodule::admin.start_date')}}</label>

                                                    <input type="date" name="start_date" class="form-control" >
                                                </div>
                                          </div>


                                          <div class="col-md-2 mb-4">
                                                <div class="input-control col-md-12 ">
                                                  <label>{{__('productmodule::admin.end_date')}}</label>
                                                    <input type="date" name="end_date"  class="form-control">
                                                </div>
                                          </div>



                                          <div class="col-md-1 delete mt-4" >
                                            <span data-repeater-delete class="btn btn-warning">
                                                <span class="glyphicon glyphicon-remove"></span> {{__('productmodule::admin.delete')}}
                                            </span>
                                          </div>

                                        </div>
                                    </div>
                                </div>
                              @endif
                           </div>
                           <div class="form-group mt-2">
                               <div class="row">
                                   <div class="col-sm-12">
                                       <span data-repeater-create class="btn btn-button-7 btn-md">
                                           <span class="glyphicon glyphicon-plus"></span> {{__('productmodule::admin.add_new')}}
                                       </span>
                                   </div>
                               </div>
                           </div>
                           <hr/>
                           <div class="row">
      <div class="col-xl-9">
        <input type="hidden" name="id" value="{{$product_info->id}}">
      </div>

      <div class="col-xl-3 mb-5" >
        <button id="update_main_data" class="btn btn-md btn-block btn-success">{{__('productmodule::admin.update')}}</button>
      </div>
    </div>
                       </div>

           </div>



    </div>

  </form>



 </section>
