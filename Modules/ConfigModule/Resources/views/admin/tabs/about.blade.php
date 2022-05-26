
<div class="row">
    <div class="col-12 layout-spacing">

        <div class="widget-content widget-content-area justify-pill" style="padding:0px">

            <ul class="nav nav-pills nav-fill bg-nav" id="justify-pills-tab" role="tablist">
                @foreach($configCategorires->where('id',2)->first()->configs as $key=>$config)
                    <li class="nav-item" >
                        <a style="    width: 70%;" class="nav-link {{($key==0)?'active':''}}" id="justify-pills-{{$config->key}}-tab" data-toggle="pill" href="#justify-pills-{{$config->key}}" role="tab" aria-controls="justify-pills-{{$config->key}}" aria-selected="true">{!! LanguageHelper::configTranslate($config) !!}</a>
                    </li>
                @endforeach


            </ul>

            <div   class="tab-content mt-3" id="justify-pills-tabContent">
              @foreach($configCategorires->where('id',2)->first()->configs as $key=>$config)
                <div style="height: 500px; overflow:auto;"  class="tab-pane fade {{($key==0)?'show active':''}}" id="justify-pills-{{$config->key}}" role="tabpanel" aria-labelledby="justify-pills-{{$config->key}}-tab">

                <form class="submit_config_form row" action="{{url('admin/update-config')}}" method="POST">
                    @csrf
                    <div class="col-xl-9">
                        <div class="input-control  col-md-12 mb-4 ">
                        <label>{{__('configmodule::admin.desc_ar')}}</label>
                            <textarea  name="value_ar"  class="form-control ckeditor"  placeholder="{{__('productmodule::product.desc_ar')}}" autocomplete="off" >{{$config->value_ar}}</textarea>
                        </div>
                    </div>
                    <div class="col-xl-3 mt-5" >
                        <button  type="submit" class="btn btn-md btn-block btn-success">{{__('configmodule::admin.update')}}</button>
                    </div>

                    <div class="col-xl-9">
                        <div class="input-control  col-md-12 mb-4 ">
                        <label>{{__('configmodule::admin.desc_en')}}</label>
                            <textarea  name="value_en"  class="form-control ckeditor"  placeholder="{{__('productmodule::product.desc_ar')}}" autocomplete="off" >{{$config->value_en}}</textarea>
                        </div>
                    </div>
                    <input type="hidden" name="key" value="{{$config->key}}">

                </form>
                </div>
                @endforeach
            </div>

        </div>
    </div>
</div>
