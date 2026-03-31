@if($input->key == 'phone')
    <div class="row">
        <div class="col-md-8 col-xs-8">
            <label for="phone"
                   class="required">{{__('warrantymodule::insurance.phone')}}
                @if($input->value_en)<em class="required">*</em>@endif
            </label>
            <div class="input-box">
                <input type="number" name="{{ $input->key }}"
                       {{ ($read_only ?? false) ? 'readonly' : '' }}
                       {{ ($disabled ?? false) ? 'readonly' : '' }}
                       title="Phone Number" id="{{ $input->key }}"
                       class="input-text form-control {{ $input->value_en ? 'required-entry' : '' }}"
                       value="{{ $value ?? '' }}">
            </div>
        </div>
        <div class="col-md-4 col-xs-4">
            <label for="phone_code_id" class="required">{{__('usermodule::login.choose_phone_code')}}
                @if($input->value_en)<em class="required">*</em>@endif
            </label>
            <div class="input-box">
                <select name="phone_code_id" title="Phone Code"
                        {{ ($read_only ?? false) ? 'disabled' : '' }}
                        {{ ($disabled ?? false) ? 'disabled' : '' }}
                        class="input-text form-control {{ $input->value_en ? 'required-entry' : '' }} select2"
                        {{$input->value_en ? 'required' : '' }}
                        autocomplete="off">
                </select>
            </div>
        </div>
    </div>
@else
    <label for="{{ $input->key }}">{{__('warrantymodule::'.($localeFile ?? 'warranty').'.'.$input->key)}}
        @if($input->value_en)<em class="required">*</em>@endif
    </label>
    <div class="input-box">
        <input type="{{ $input->properties['type'] }}" name="{{ $input->key }}"
               {{ ($read_only ?? false) ? 'readonly' : '' }}
               {{ ($disabled ?? false) ? 'readonly' : '' }}
               title="{{__('warrantymodule::'.($localeFile ?? 'warranty').'.'.$input->key)}}" id="{{ $input->key }}"
               class="input-text form-control {{ $input->value_en ? 'required-entry' : '' }}"
               value="{{ $value ?? '' }}">
    </div>
@endif
