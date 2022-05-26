<section>

  <form id="update_product_shipping_cost"   method="POST"  data-role="validator" data-on-before-submit="no_submit" data-on-error-input="notifyOnErrorInput" data-show-error-hint="false" novalidate="novalidate">
    @csrf

    <div class="row">
      <div class="col-lg-3 mb-2">
        <label for="">{{__('productmodule::admin.dimensions')}}</label>
      </div>
      <div class="col-md-3 mb-2">
        <div class="input-control  col-md-12 mb-4 ">
            <input  name="length"  value="{{$product_info->length}}" class="form-control text-center"placeholder="{{__('productmodule::admin.length')}}" autocomplete="off" >
        </div>
      </div>
      <div class="col-md-3 ">
            <div class="input-control required col-md-12 mb-4 ">
                <input  name="width"  value="{{$product_info->width}}"  class="form-control text-center" placeholder="{{__('productmodule::admin.width')}}" autocomplete="off" >
            </div>
      </div>
      <div class="col-md-3 ">
            <div class="input-control required col-md-12 mb-4 ">
                <input  name="height" value="{{$product_info->height}}" class="form-control text-center"  placeholder="{{__('productmodule::admin.height')}}" autocomplete="off" >
            </div>
      </div>
      <div class="col-md-3 mb-2">
              <label>{{__('productmodule::admin.length_class')}}</label>
      </div>
      <div class="col-md-9 mb-2  ">
        <div class="input-control  col-md-12 mb-4 ">
          <select name="length_class" class="form-control ">
              <option value="{{($product_info->length_class == 'Centimeter')?'selected':''}}"  value="Centimeter" >{{__('productmodule::admin.centimeter')}}</option>
              <option value="{{($product_info->length_class == 'Millimeter')?'selected':''}}" value="Millimeter" >{{__('productmodule::admin.millimeter')}}</option>
              <option value="{{($product_info->length_class == 'Inch')?'selected':''}}" value="Inch" >{{__('productmodule::admin.inch')}}</option>
           </select>
         </div>
       </div>
      <div class="col-md-3 mb-2">
              <label> {{__('productmodule::admin.weight')}}</label>
      </div>
      <div class="col-md-9 ">
        <div class="input-control  col-md-12 mb-4 ">
            <input  name="weight" value="{{$product_info->weight}}"  class="form-control text-center"  placeholder="weight" autocomplete="off" >
        </div>
      </div>
      <div class="col-md-3 mb-2">
              <label> {{__('productmodule::admin.weight_class')}}</label>
      </div>
      <div class="col-md-9 ">
        <div class="input-control  col-md-12 mb-4 ">

          <select name="weight_class" class="form-control ">
              <option value="{{($product_info->weight_class == 'Kilogram')?'selected':''}}" value="Kilogram" >{{__('productmodule::admin.kilogram')}}</option>
              <option value="{{($product_info->weight_class == 'Gram')?'selected':''}}" value="Gram" >{{__('productmodule::admin.gram')}}</option>
              <option value="{{($product_info->weight_class == 'Pound')?'selected':''}}" value="Pound" >{{__('productmodule::admin.pound')}}</option>
              <option value="{{($product_info->weight_class == 'Ounce')?'selected':''}}" value="Ounce" >{{__('productmodule::admin.ounce')}}</option>
           </select>
          </div>

       </div>
   </div>

   <hr>
   <div class="row">
      <div class="col-xl-9">
        <input type="hidden" name="id" value="{{$product_info->id}}">
      </div>

      <div class="col-xl-3 mb-5" >
        <button id="update_main_data" class="btn btn-md btn-block btn-success">{{__('productmodule::admin.update')}}</button>
      </div>
    </div>

</form>
</section>
