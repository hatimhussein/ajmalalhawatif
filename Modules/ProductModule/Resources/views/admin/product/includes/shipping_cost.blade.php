<section>





              <div class="row">
                <div class="col-lg-3 mb-2">
                  <label for="">{{__('productmodule::admin.dimensions')}}</label>
                </div>
                <div class="col-md-3 mb-2">
                  <div class="input-control  col-md-12   ">
                      <input  name="length"  class="form-control   "placeholder="{{__('productmodule::admin.length')}}" autocomplete="off" >
                  </div>
                </div>

                <div class="col-md-3 ">
                      <div class="input-control required col-md-12   ">
                          <input  name="width"  class="form-control   " placeholder="{{__('productmodule::admin.width')}}" autocomplete="off" >
                      </div>
                </div>

                <div class="col-md-3 ">
                      <div class="input-control required col-md-12   ">
                          <input  name="height" class="form-control   "  placeholder=" {{__('productmodule::admin.height')}}" autocomplete="off" >
                      </div>
                </div>

                <div class="col-md-3 mb-2">
                        <label> {{__('productmodule::admin.length_class')}}</label>
                </div>


                <div class="col-md-9 mb-2  ">
                  <div class="input-control  col-md-12   ">
                    <select name="length_class" class="form-control ">
                        <option value="Centimeter" >{{__('productmodule::admin.centimeter')}}</option>
                        <option value="Millimeter" > {{__('productmodule::admin.millimeter')}}</option>
                        <option value="Inch" > {{__('productmodule::admin.inch')}}</option>
                     </select>
                   </div>
                 </div>

                <div class="col-md-3 mb-2">
                        <label>{{__('productmodule::admin.weight')}}</label>
                </div>


                <div class="col-md-9 ">
                  <div class="input-control  col-md-12   ">
                      <input  name="weight"  class="form-control   "  placeholder="{{__('productmodule::admin.weight')}}" autocomplete="off" >
                  </div>
                </div>

                <div class="col-md-3 mb-2">
                        <label>{{__('productmodule::admin.weight_class')}}</label>
                </div>


                <div class="col-md-9 ">
                  <div class="input-control  col-md-12   ">

                    <select name="weight_class" class="form-control ">
                        <option value="Kilogram" > {{__('productmodule::admin.kilogram')}}</option>
                        <option value="Gram" > {{__('productmodule::admin.gram')}}</option>
                        <option value="Pound" > {{__('productmodule::admin.pound')}}</option>
                        <option value="Ounce" > {{__('productmodule::admin.ounce')}}</option>
                     </select>
                    </div>

                 </div>


              </div>


</section>
