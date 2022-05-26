
<form class="submit_config_form" action="{{url('admin/update-config-array-share')}}" method="POST"   enctype="multipart/form-data">
    @csrf
    <div class="row">
        @foreach($configCategorires->where('id',10)->first()->configs as $key=>$config)
            <div class="col-3">
                <label>{{$config->display_name_ar}}</label>
                <div class="form-row">
                    <div class="input-control col-md-12 mb-4">
                        <input  name="{{$config->key}}[ar]"  multiple value="{{$config->value_ar}}"  class="form-control " data-validate-arg="6"  data-validate-hint="{{$config->display_name_en}}" placeholder="{{$config->display_name_en}}" autocomplete="off">
                    </div>
                </div>

            </div>

            <div class="col-3">
                <label>{{$config->display_name_en}}</label>
                <div class="form-row">
                    <div class="input-control col-md-12 mb-4">
                        <input  name="{{$config->key}}[en]" multiple value="{{$config->value_en}}"  class="form-control " data-validate-arg="6"  data-validate-hint="{{$config->display_name_en}}" placeholder="{{$config->display_name_en}}" autocomplete="off">
                    </div>
                </div>

            </div>

            <div class="col-3">
                <label>{!! LanguageHelper::configTranslate($config) !!}</label>
                <div class="form-row">
                    <div class="input-control col-md-3 mb-4">
                        <input type="file" name="{{$config->key}}[image]" multiple
                               accept="image/*">
                    </div>
                </div>




            </div>
            <div class="col-3">
                <div class="form-row">
                    <div class="input-control col-md-3 mb-4">
                        <div class="custom-file-container__image-preview product-list-img" style="height: 50px;">
                            <img src="{{asset('images/img/'.$config->photo)}}"/>

                        </div>
                    </div>
                </div>
            </div>
        @endforeach
        <div class="col-xl-3 mb-3 mt-2" >
            <button  type="submit" class="btn btn-md btn-block btn-success">{{__('configmodule::admin.update')}}</button>
        </div>
    </div>

</form>
