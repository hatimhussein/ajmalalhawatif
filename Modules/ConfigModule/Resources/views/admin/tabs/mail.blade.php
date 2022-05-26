
<form class="submit_config_form" action="{{url('admin/update-config-array')}}" method="POST">
@csrf
<div class="row">
    @foreach($configCategorires->where('id',7)->first()->configs as $key=>$config)
        <div class="col-12">
            <label>{{$config->display_name_en}}</label>
            <div class="form-row">
                <div class="input-control required col-md-12 mb-4 required">
                    <input  name="{{$config->key}}" value="{{$config->value_ar}}"  class="form-control " data-validate-func="required" data-validate-arg="6"  data-validate-hint="{{$config->display_name_en}}" placeholder="{{$config->display_name_en}}" autocomplete="off" >
                </div>
            </div>

        </div>
    @endforeach
    <div class="col-xl-3 mb-3 mt-2" >
    <button  type="submit" class="btn btn-md btn-block btn-success">{{__('configmodule::admin.update')}}</button>
</div>
</div>

</form>
