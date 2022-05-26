<section>
  <style media="screen">
    /* .widget-content-area{
      padding: 0;
    } */
  </style>
  <div  class="col-lg-12 layout-spacing option_body hidden">
         <div class="statbox widget box box-shadow">
             <div class="widget-content ">

                     <div class="repeater-slide">
                         <div class="row" data-repeater-list="options">



                             <div class="col-md-6" data-repeater-item>
                                 <div class="form-group mb-2">
                                     <div class="row">

                                       <div class="col-md-8 mb-2">
                                           <select name="option_id" id="optionSelection" class="form-control options">
                                             <option selected disabled value="" >{{__('productmodule::admin.choose')}} </option>
                                             @foreach($options as $option)
                                               <option value="{{$option->id}}" >{!! LanguageHelper::nameTranslate($option) !!}</option>
                                              @endforeach
                                            </select>
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
                                     <span data-repeater-create class="btn btn-button-7 btn-md">
                                         <span class="glyphicon glyphicon-plus"></span> {{__('productmodule::admin.add_new')}}
                                     </span>
                                     <span class="btn btn-button-7 btn-md" data-toggle="modal" data-target="#optionModal">
                                         <span class="glyphicon glyphicon-plus"></span> {{__('productmodule::admin.new_option')}}
                                     </span>
                                     <span class="btn btn-button-7 btn-md" data-toggle="modal" data-target="#valueModal">
                                         <span class="glyphicon glyphicon-plus"></span> {{__('productmodule::admin.new_option_value')}}
                                     </span>
                                 </div>
                             </div>
                         </div>
                         <hr/>
                     </div>

             </div>
         </div>
         <div class="row">
           <input type="hidden" id="selectd_option" name="selectd_option[]">

           <div  class="col-sm-3 ">
             <button style="width: 100%" class="btn btn-gradient-danger mt-2 mb-4" type="button" id="generate" name="button">{{__('productmodule::admin.generate')}}</button>
           </div>


           <div class="col-lg-10">
             <!-- <div  class="statbox widget box box-shadow text-center">
               <label  >{{__('productmodule::category.parent')}}</label>
               <div class="widget-content widget-content-area">
                   <select id="combinations" multiple name="parent_id"  placeholder="" class="disabled-results form-control custom-select" >
                   </select>
               </div>

                 @if ($errors->has('parent_id'))
                   @include('commonmodule::includes.error',['errors'=>$errors->toArray(),'filed'=>'parent_id'])
                 @endif

             </div> -->

             <div class="widget-content">
                          <div class="table-responsive">
                              <table class="table table-bordered table-hover mb-4">
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
                                  </tbody>
                              </table>
                          </div>
                      </div>
           </div>

             <div id="options_values" class="col-xl-2 col-lg-2 col-md-2 col-sm-2 col-2 ">

             </div>

         </div>


  </div>

 <div id="quantity" class="col-lg-12 layout-spacing ">
        <div class="statbox widget box box-shadow">

            <div class="widget-content">
            <label class="">{{__('productmodule::admin.quantity')}}</label>
              <input onkeydown="return event.keyCode !== 69" name="product_quantity" placeholder="{{__('productmodule::admin.quantity')}}" type="number" class="form-control ">

            </div>
        </div>
  </div>



 </section>
