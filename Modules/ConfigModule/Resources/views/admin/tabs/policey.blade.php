<div class="row">
    <div class="col-12 layout-spacing">

        <div class="widget-content justify-pill" style="padding:0px">

            <ul class="nav nav-pills nav-fill bg-nav" id="justify-pills-tab" role="tablist">
                @foreach($configCategorires->where('id',1)->first()->configs as $key=>$config)
                    <li class="nav-item">
                        <a style="width:70%;" class="nav-link {{($key==0)?'active':''}}"
                           id="justify-pills-{{$config->key}}-tab" data-toggle="pill"
                           href="#justify-pills-{{$config->key}}" role="tab"
                           aria-controls="justify-pills-{{$config->key}}"
                           aria-selected="true">{!! LanguageHelper::configTranslate($config) !!}</a>
                    </li>
                @endforeach


            </ul>

            <div class="tab-content mt-3" id="justify-pills-tabContent">
                @foreach($configCategorires->where('id',1)->first()->configs as $key=>$config)
                    <div style="height: 500px; overflow:auto;" class="tab-pane fade {{($key==0)?'show active':''}}"
                         id="justify-pills-{{$config->key}}" role="tabpanel"
                         aria-labelledby="justify-pills-{{$config->key}}-tab">

                        <form class="submit_config_form row" action="{{url('admin/update-config')}}" method="POST"
                              enctype="multipart/form-data">
                            @csrf
                            <div class="col-xl-9">
                                <div class="input-control  col-md-12 mb-4 ">
                                    <label>{{__('configmodule::admin.desc_ar')}}</label>
                                    <textarea name="value_ar" class="form-control ckeditor"
                                              placeholder="{{__('productmodule::product.desc_ar')}}"
                                              autocomplete="off">{{$config->value_ar}}</textarea>
                                </div>

                                <div class="input-control  col-md-12 mb-4 ">
                                    <label>{{__('configmodule::admin.desc_en')}}</label>
                                    <textarea name="value_en" class="form-control ckeditor"
                                              placeholder="{{__('productmodule::product.desc_ar')}}"
                                              autocomplete="off">{{$config->value_en}}</textarea>
                                </div>
                            </div>

                            <input type="hidden" name="key" value="{{$config->key}}">

                            <div class="col-xl-3 mt-5">

                                <div class="statbox widget box box-shadow">
                                    <div class="widget-content p-0">
                                        <div class="custom-file-container" data-upload-id="{{$config->key}}-image">
                                            <label>{{ __('productmodule::admin.photo') }}<a
                                                    class="custom-file-container__image-clear" title="Clear Image"></a></label>
                                            <label class="custom-file-container__custom-file">
                                                <input type="file" name="photo"
                                                       class="custom-file-container__custom-file__custom-file-input"
                                                       accept="image/*">
                                                <span
                                                    class="custom-file-container__custom-file__custom-file-control"></span>
                                            </label>
                                            <h4>
                                                @if ($errors->has('photo'))
                                                    @include('commonmodule::includes.error',['errors'=>$errors->toArray(),'filed'=>'photo'])
                                                @endif
                                            </h4>

                                            <div class="custom-file-container__image-preview product-list-img"
                                                 id="{{$config->key}}-preview"
                                                 data-image="{{$config->photo ? asset('images/img/'.$config->photo) : ''}}"
                                                 style="background-image: url('{{asset('images/img/'.$config->photo)}}')">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <button type="submit"
                                        class="btn btn-md btn-block btn-success">{{__('configmodule::admin.update')}}</button>
                            </div>
                        </form>
                    </div>

                    <input type="hidden" class="imageUploader" value="{{$config->key}}">
                @endforeach
            </div>

        </div>

    </div>
</div>
