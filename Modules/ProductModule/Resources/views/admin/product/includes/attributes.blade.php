<section style="padding-bottom:0px;">
  <div  class="col-lg-12 layout-spacing  ">
         <div class="statbox widget box box-shadow">

                     <div class="repeater-slide">
                         <div class="row" data-repeater-list="attributes">



                             <div class="col-md-12" data-repeater-item>
                                 <div class="form-group mb-2">
                                     <div class="row">

                                       <div class="col-md-4 mb-2">
                                           <select name="attribute_id" id="attributeSelection"  class="form-control " data-validate-func="required" data-validate-arg="6"   placeholder="{{__('productmodule::admin.attr')}}" autocomplete="off" required>
                                             <option disabled selected value="" >{{__('productmodule::admin.choose')}}</option>

                                             @foreach($attributes as $attribute)
                                               <option value="{{$attribute->id}}" >{!! LanguageHelper::nameTranslate($attribute) !!}</option>
                                              @endforeach
                                            </select>
                                       </div>

                                       <div class="col-md-4 ">
                                         <div class="form-row">
                                             <div class="input-control required col-md-12 mb-4  ">
                                                 <input  name="attribute_value" class="form-control" data-validate-func="required" data-validate-arg="6"  placeholder="{{__('productmodule::admin.attr_value')}}" autocomplete="off" required>
                                             </div>
                                         </div>
                                       </div>


                                         <div class="col-md-2 delete" >
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

                                     <span class="btn btn-button-16 btn-md"  data-toggle="modal" data-target="#attributeModal">
                                         <span class="glyphicon glyphicon-plus"></span> {{__('productmodule::admin.new_attribute')}}
                                     </span>
                                 </div>
                             </div>
                         </div>
                         <hr/>
                     </div>

         </div>



  </div>





 </section>
