<form class="submit_config_form" action="{{url('admin/update-config-array')}}" method="POST"
      enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-9">
            @php($logo=$configCategorires->where('id',4)->first()->configs->where('key','logo')->first())
            @php($favicon=$configCategorires->where('id',4)->first()->configs->where('key','favicon')->first())
            @php($logo_footer=$configCategorires->where('id',4)->first()->configs->where('key','logo_footer')->first())
            @php($login_logo = $configCategorires->where('id',4)->first()->configs->where('key','login_logo')->first())
            @php($nav_logo = $configCategorires->where('id',4)->first()->configs->where('key','nav_logo')->first())
        @foreach($configCategorires->where('id',4)->first()->configs as $key=>$config)
                @if($config->key=='timezone')
                    <div class="row">
                        <div class="col-12">
                            <label>{!! LanguageHelper::configTranslate($config) !!}</label>
                            <div class="form-row">
                                <div class="input-control required col-md-12 mb-4 required">

                                    <select name="{{$config->key}}" style="width:30%">
                                        <option
                                            {{($config->value_ar == 'Africa/Cairo') ? 'selected':'' }} value="Africa/Cairo">
                                            Africa/Cairo
                                        </option>
                                        <option
                                            {{($config->value_ar=='Asia/Riyadh')?'selected':''}} value="Asia/Riyadh">
                                            Asia/Riyadh
                                        </option>

                                    </select>

                                </div>
                            </div>
                        </div>
                    </div>
                @elseif($config->key=='address')
                    <div class="row">
                        <div class="col-12">
                            <label>{!! LanguageHelper::configTranslate($config) !!} </label>
                            <div class="form-row">
                                <div class="input-control required col-md-12 mb-4 required">
                                    <input name="{{$config->key}}[]" value="{{$config->value_en}}" class="form-control "
                                           data-validate-func="required" data-validate-arg="6"
                                           data-validate-hint="{{$config->display_name_en}}"
                                           placeholder="{{$config->display_name_en}}" autocomplete="off" required>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <label>{!! LanguageHelper::configTranslate($config) !!}</label>
                            <div class="form-row">
                                <div class="input-control required col-md-12 mb-4 required">
                                    <input name="{{$config->key}}[]" value="{{$config->value_ar}}" class="form-control "
                                           data-validate-func="required" data-validate-arg="6"
                                           data-validate-hint="{{$config->display_name_en}}"
                                           placeholder="{{$config->display_name_en}}" autocomplete="off" required>
                                </div>
                            </div>
                        </div>
                    </div>

                @elseif($config->key=='cancel_order' || $config->key=='categories_slider')
                    <div class="row">
                        <div class="col-12">
                            <div class="statbox widget box box-shadow ">
                                <label for="{{ $config->key }}">{!! LanguageHelper::configTranslate($config) !!}</label>
                                <div class="widget-content">
                                    <label class="switch s-success mb-4 mr-2">
                                        <input name="{{ $config->key }}"
                                               type="hidden" value="0">
                                        <input name="{{ $config->key }}"
                                               type="checkbox" {{($config->value_ar==1)?'checked':''}} value="1">
                                        <span class="slider round"></span>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                @elseif($config->key=='gift_price')
                    <div class="row">
                        <div class="col-4">
                            <label>{!! LanguageHelper::configTranslate($config) !!}</label>
                            <div class="form-row">
                                <div class="input-control required col-md-12 mb-4 required">
                                    <input type="number"
                                           name="{{$config->key}}[value_ar]" value="{{$config->value_ar}}"
                                           class="form-control "
                                           data-validate-func="required" data-validate-arg="6"
                                           data-validate-hint="{{$config->display_name_en}}"
                                           placeholder="{{$config->display_name_en}}" autocomplete="off" required>
                                </div>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="statbox widget box box-shadow ">
                                <label
                                    for="{{ $config->key }}">{{ __('configmodule::admin.active_for_user') }}</label>
                                <div class="widget-content">
                                    <label class="switch s-success mb-4 mr-2">
                                        <input type="hidden" name="{{ $config->key }}[properties][user_active]"
                                               value="0">
                                        <input name="{{ $config->key }}[properties][user_active]" value="1"
                                               type="checkbox" {{($config->properties['user_active'])?'checked':''}}>
                                        <span class="slider round"></span>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="statbox widget box box-shadow ">
                                <label
                                    for="{{ $config->key }}">{{ __('configmodule::admin.active_for_merchant') }}</label>
                                <div class="widget-content">
                                    <label class="switch s-success mb-4 mr-2">
                                        <input type="hidden" name="{{ $config->key }}[properties][merchant_active]"
                                               value="0">
                                        <input name="{{ $config->key }}[properties][merchant_active]"
                                               type="checkbox"
                                               {{($config->properties['merchant_active'])?'checked':''}} value="1">
                                        <span class="slider round"></span>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                @elseif($config->key=='forward_account')
                    {{--                    <div class="row">--}}
                    {{--                        <div class="col-12">--}}
                    {{--                            <div class="statbox widget box box-shadow ">--}}
                    {{--                                <label for="{{ $config->key }}">{!! LanguageHelper::configTranslate($config) !!}</label>--}}
                    {{--                                <div class="widget-content">--}}
                    {{--                                    <label class="switch s-success mb-4 mr-2">--}}
                    {{--                                        <input name="{{ $config->key }}"--}}
                    {{--                                               type="hidden" value="0">--}}
                    {{--                                        <input name="{{ $config->key }}"--}}
                    {{--                                               type="checkbox" value="1" {{($config->value_ar==1)?'checked':''}}>--}}
                    {{--                                        <span class="slider round"></span>--}}
                    {{--                                    </label>--}}
                    {{--                                </div>--}}
                    {{--                            </div>--}}
                    {{--                        </div>--}}
                    {{--                    </div>--}}
                @elseif($config->key!='logo' && $config->key!='favicon' )
                    <div class="row">
                        <div class="col-12">
                            <label>{!! LanguageHelper::configTranslate($config) !!}</label>
                            <div class="form-row">
                                <div class="input-control required col-md-12 mb-4 required">
                                    <input name="{{$config->key}}" value="{{$config->{'value_' . app()->getLocale()} }}" class="form-control "
                                           data-validate-func="required" data-validate-arg="6"
                                           data-validate-hint="{{$config->display_name_en}}"
                                           placeholder="{{$config->display_name_en}}" autocomplete="off" required>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
        <div class="col-3">
            <div class="statbox widget box box-shadow">
                <div class="widget-content p-0">
                    <div class="custom-file-container" data-upload-id="myFirstImage">
                        <label>{!! LanguageHelper::configTranslate($logo) !!}<a
                                class="custom-file-container__image-clear" title="Clear Image"></a></label>
                        <label class="custom-file-container__custom-file">
                            <input type="file" name="logo" class="custom-file-container__custom-file__custom-file-input"
                                   accept="image/*">
                            <!-- <input type="hidden" name="MAX_FILE_SIZE" value="10485760" /> -->
                            <span class="custom-file-container__custom-file__custom-file-control">
                        </span>
                        </label>
                        <h4>
                            @if ($errors->has('photo'))
                                @include('commonmodule::includes.error',['errors'=>$errors->toArray(),'filed'=>'photo'])
                            @endif
                        </h4>
                        <div class="custom-file-container__image-preview product-list-img">

                        </div>

                        <div class="custom-file-container__image-preview product-list-img">
                            <img src="{{asset('images/img/'.$logo->photo)}}"/>
                        </div>
                    </div>
                </div>
            </div>
            <div class="statbox widget box box-shadow">
                <div class="widget-content p-0">
                    <div class="custom-file-container" data-upload-id="myFirstImage">
                        <label>{!! LanguageHelper::configTranslate($favicon) !!}<a
                                class="custom-file-container__image-clear" title="Clear Image"></a></label>
                        <label class="custom-file-container__custom-file">
                            <input type="file" name="favicon"
                                   class="custom-file-container__custom-file__custom-file-input"
                                   accept="image/*">
                            <!-- <input type="hidden" name="MAX_FILE_SIZE" value="10485760" /> -->
                            <span class="custom-file-container__custom-file__custom-file-control">
                        </span>
                        </label>
                        <h4>
                            @if ($errors->has('photo'))
                                @include('commonmodule::includes.error',['errors'=>$errors->toArray(),'filed'=>'photo'])
                            @endif
                        </h4>

                        <div class="custom-file-container__image-preview product-list-img">
                            <img src="{{asset('images/img/'.$favicon->photo)}}"/>
                        </div>


                    </div>
                </div>
            </div>
            <div class="statbox widget box box-shadow">
                <div class="widget-content p-0">
                    <div class="custom-file-container" data-upload-id="myFirstImage">
                        <label>{!! LanguageHelper::configTranslate($logo_footer) !!}<a
                                class="custom-file-container__image-clear" title="Clear Image"></a></label>
                        <label class="custom-file-container__custom-file">
                            <input type="file" name="logo_footer"
                                   class="custom-file-container__custom-file__custom-file-input"
                                   accept="image/*">
                            <!-- <input type="hidden" name="MAX_FILE_SIZE" value="10485760" /> -->
                            <span class="custom-file-container__custom-file__custom-file-control">
                        </span>
                        </label>
                        <h4>
                            @if ($errors->has('photo'))
                                @include('commonmodule::includes.error',['errors'=>$errors->toArray(),'filed'=>'photo'])
                            @endif
                        </h4>

                        <div class="custom-file-container__image-preview product-list-img">
                            <img src="{{asset('images/img/'.$logo_footer->photo)}}"/>
                        </div>
                    </div>
                </div>
            </div>
            <div class="statbox widget box box-shadow">
                <div class="widget-content p-0">
                    <div class="custom-file-container" data-upload-id="myFirstImage">
                        <label>{!! LanguageHelper::configTranslate($login_logo) !!}<a
                                class="custom-file-container__image-clear" title="Clear Image"></a></label>
                        <label class="custom-file-container__custom-file">
                            <input type="file" name="login_logo"
                                   class="custom-file-container__custom-file__custom-file-input"
                                   accept="image/*">
                            <!-- <input type="hidden" name="MAX_FILE_SIZE" value="10485760" /> -->
                            <span class="custom-file-container__custom-file__custom-file-control">
                        </span>
                        </label>
                        <h4>
                            @if ($errors->has('photo'))
                                @include('commonmodule::includes.error',['errors'=>$errors->toArray(),'filed'=>'photo'])
                            @endif
                        </h4>
                        <div class="custom-file-container__image-preview product-list-img">
                            <img src="{{asset('images/img/'.$login_logo->photo)}}"/>
                        </div>
                    </div>
                </div>
            </div>

            <div class="statbox widget box box-shadow">
                <div class="widget-content p-0">
                    <div class="custom-file-container" data-upload-id="myFirstImage">
                        <label>{!! LanguageHelper::configTranslate($nav_logo) !!}<a
                                class="custom-file-container__image-clear" title="Clear Image"></a></label>
                        <label class="custom-file-container__custom-file">
                            <input type="file" name="nav_logo"
                                   class="custom-file-container__custom-file__custom-file-input"
                                   accept="image/*">
                            <!-- <input type="hidden" name="MAX_FILE_SIZE" value="10485760" /> -->
                            <span class="custom-file-container__custom-file__custom-file-control">
                        </span>
                        </label>
                        <h4>
                            @if ($errors->has('photo'))
                                @include('commonmodule::includes.error',['errors'=>$errors->toArray(),'filed'=>'photo'])
                            @endif
                        </h4>
                        <div class="custom-file-container__image-preview product-list-img">
                            <img src="{{asset('images/img/'.$nav_logo->photo)}}"/>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="col-xl-3 mb-3 mt-2">
            <button type="submit" class="btn btn-md btn-block btn-success">{{__('configmodule::admin.update')}}</button>
        </div>
    </div>

</form>



