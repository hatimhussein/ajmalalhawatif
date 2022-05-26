<form class="submit_config_form" action="{{route('update-sms-settings')}}" method="POST">
    @csrf
    <div class="row">
        @foreach($configCategorires->where('key', 'sms')->first()->configs as $config)
            <div class="col-12">
                <label>{{$config->display_name_en}}</label>
                <div class="form-row">
                    @if($config->key == 'sms_driver')
                        <div class="input-control required col-md-12 mb-4 required">
                            <select name="{{$config->key}}" class="form-control "
                                    data-validate-func="required" data-validate-arg="6"
                                    data-validate-hint="{{$config->display_name_en}}">
                                @foreach(config('sms.drivers') as $driver => $values)
                                    <option value="{{$driver}}">{{$driver}}</option>
                                @endforeach
                            </select>
                        </div>
                    @else
                        <div class="input-control required col-md-12 mb-4 required">
                            <input name="{{$config->key}}" value="{{$config->value_ar}}" class="form-control "
                                   data-validate-func="required" data-validate-arg="6"
                                   data-validate-hint="{{$config->display_name_en}}"
                                   placeholder="{{$config->display_name_en}}" autocomplete="off">
                        </div>
                    @endif
                </div>

            </div>
        @endforeach
        <div class="col-xl-3 mb-3 mt-2">
            <button type="submit" class="btn btn-md btn-block btn-success">{{__('configmodule::admin.update')}}</button>
        </div>
    </div>

</form>
