<section style="padding-bottom:0px;">
  <form id="update_product_attributes"   method="POST"  data-role="validator" data-on-before-submit="no_submit" data-on-error-input="notifyOnErrorInput" data-show-error-hint="false" novalidate="novalidate">
    @csrf
    <div  class="col-lg-12 layout-spacing  ">

         <div class="statbox widget box box-shadow">

                     <div class="repeater-slide">
                         <div class="row" data-repeater-list="attributes">



                           @if($product_info->attributes->count() > 0)
                              @foreach($product_info->attributes as $attr)
                                 <div class="col-md-12 " data-repeater-item>
                                     <div class="form-group mb-2">
                                         <div class="row">
                                         <div class="col-md-4 mb-2 ">
                                               <select name="attribute_id"  class="form-control text-center" >
                                                 <option disabled selected value="" >{{__('productmodule::admin.choose')}}</option>

                                                 @foreach($attributes as $attribute)
                                                   <option {{($attr->id==$attribute->id)?'selected':''}} value="{{$attribute->id}}" >{{$attribute->name_ar}}</option>
                                                  @endforeach
                                                </select>
                                           </div>
                                           <div class="col-md-4 ">
                                             <div class="form-row">
                                                 <div class="input-control required col-md-12 mb-4  ">
                                                     <input value="{{$attr->pivot->attribute_value}}"  name="attribute_value" class="form-control text-center" data-validate-func="required" data-validate-arg="6"   placeholder="{{__('productmodule::product.attribute_value')}}" autocomplete="off" required>
                                                 </div>
                                             </div>
                                           </div>
                                           <!-- <input type="hidden" class="attr_ids" name="id" value="{{$attr->id}}"> -->
                                             <div class="col-md-2 delete" data-attr_id="{{$attr->id}}">
                                                 <span data-repeater-delete class="btn btn-warning">
                                                     <span class="glyphicon glyphicon-remove"></span> {{__('productmodule::admin.delete')}}
                                                 </span>
                                             </div>

                                         </div>
                                     </div>
                                 </div>
                                @endforeach
                           @else
                             <div class="col-md-12 " data-repeater-item>
                               <div class="form-group mb-2 ">
                                   <div class="row ">
                                   <div class="col-md-4 mb-2">
                                         <select name="attribute_id"  class="form-control text-center" >
                                           @foreach($attributes as $attribute)
                                             <option value="{{$attribute->id}}" >{!! LanguageHelper::nameTranslate($attribute) !!}</option>
                                            @endforeach
                                          </select>
                                     </div>
                                     <div class="col-md-4 ">
                                       <div class="form-row ">
                                           <div class="input-control required col-md-12 mb-4  ">
                                               <input  name="attribute_value" class="form-control text-center attribute_value" data-validate-func="required"  placeholder="{{__('productmodule::product.attribute_value')}}" autocomplete="off" required>
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
