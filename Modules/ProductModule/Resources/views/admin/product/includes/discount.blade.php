

<section style="padding-bottom:0px;">
  <div  class="col-lg-12 layout-spacing ">
         <div class="statbox widget box box-shadow">

                     <div class="repeater-slide">
                         <div class="row" data-repeater-list="discount">



                             <div class="col-md-12" data-repeater-item>
                                 <div class="form-group mb-2">
                                     <div class="row">
                                       <div class="col-md-4 mb-4 input-control required">
                                         <label>{{__('productmodule::admin.discount_type')}}</label>

                                           <select name="discount_type" class="form-control " data-validate-func="required" data-validate-arg="6"   required>
                                               <option disabled selected value="" >{{__('productmodule::admin.discount_type')}}</option>
                                               <option value="value" >{{__('productmodule::admin.amount')}}</option>
                                               <option value="percentage" >{{__('productmodule::admin.percentage')}}</option>
                                            </select>
                                       </div>

                                       <div class="col-md-4 mb-4">
                                             <div class="input-control required col-md-12 ">
                                               <label>{{__('productmodule::admin.value')}}</label>

                                                 <input  name="discount_value"  class="form-control " data-validate-func="required" data-validate-arg="6"  placeholder="{{__('productmodule::admin.discount_value')}}" autocomplete="off" required>
                                             </div>
                                       </div>

                                       <div class="col-md-4 mb-4">
                                             <div class="input-control required col-md-12  required">
                                               <label>{{__('productmodule::admin.quantity')}}</label>

                                                 <input type="number" name="discount_quantity" class="form-control " data-validate-func="required" data-validate-arg="6"   placeholder="{{__('productmodule::admin.discount_quantity')}}" autocomplete="off" required>
                                             </div>
                                       </div>

                                       <div class="col-md-4 mb-4">
                                             <div class="input-control  col-md-12 " style="padding:0">
                                               <label>{{__('productmodule::admin.start_date')}}</label>

                                                 <input type="date" name="start_date" class="form-control " >
                                             </div>
                                       </div>


                                       <div class="col-md-4 mb-4">
                                             <div class="input-control col-md-12 ">
                                               <label>{{__('productmodule::admin.end_date')}}</label>
                                                 <input type="date" name="end_date" class="form-control ">
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

                         </div>
                         <div class="form-group mt-2">
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

         </div>



  </div>





 </section>
