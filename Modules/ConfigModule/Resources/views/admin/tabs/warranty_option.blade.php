<div class="warranty-option-box">
    <p>{{__('warrantymodule::'.$localeFile.'.'.$config->key)}}</p>
    <div class="warranty-option-toggle-box">
        <div class="statbox widget box box-shadow">
            <label for="{{ $config->key }}">
                {{__('configmodule::admin.show')}}
            </label>
            <div class="widget-content">
                <label class="switch s-success">
                    <input type="hidden" name="{{ $config->key }}[value_ar]"
                           value="0">
                    <input name="{{ $config->key }}[value_ar]" value="1"
                           type="checkbox" {{($config->value_ar==1)?'checked':''}}>
                    <span class="slider round"></span>
                </label>
            </div>
        </div>
        <div class="statbox widget box box-shadow">
            <label for="{{ $config->key }}">
                {{__('configmodule::admin.required')}}
            </label>
            <div class="widget-content">
                <label class="switch s-success">
                    <input type="hidden" name="{{ $config->key }}[value_en]"
                           value="0">
                    <input name="{{ $config->key }}[value_en]" value="1"
                           type="checkbox" {{($config->value_en==1)?'checked':''}}>
                    <span class="slider round"></span>
                </label>
            </div>
        </div>
    </div>
</div>
