<section>
    <div class="row">
        <div class="col-md-12">
            <form id="update_product_images" method="POST" data-role="validator" data-on-before-submit="no_submit"
                  data-on-error-input="notifyOnErrorInput" data-show-error-hint="false" novalidate="novalidate">
                @csrf

                <div class="row">
                    <div class="col-lg-4 layout-spacing">
                        <div class="statbox widget box box-shadow">
                            <div class="widget-header">
                                <div class="row">
                                    <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                        <h4>{{__('productmodule::admin.main_image')}}</h4>
                                    </div>
                                </div>
                            </div>
                            <div class="widget-content">
                                <div class="custom-file-container" data-upload-id="myFirstImage">
                                    <label> <a href="javascript:void(0)" class="custom-file-container__image-clear"
                                               title="Clear Image"></a></label>
                                    <label class="custom-file-container__custom-file">
                                        <input id="product_photo" name="product_photo" type="file"
                                               class="custom-file-container__custom-file__custom-file-input"
                                               accept="image/*">
                                        <span class="custom-file-container__custom-file__custom-file-control"></span>
                                    </label>
                                    <div id="main_image_preview" class="custom-file-container__image-preview"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 layout-spacing">
                        <div class="statbox widget box box-shadow">
                            <div class="widget-header">
                                <div class="row">
                                    <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                        <h4>{{__('productmodule::admin.images')}}</h4>
                                    </div>
                                </div>
                            </div>
                            <div class="widget-content ">
                                <div class="custom-file-container" data-upload-id="mySecondImage">
                                    <label><a href="javascript:void(0)" class="custom-file-container__image-clear"
                                              title="Clear Image"> </a></label>
                                    <label class="custom-file-container__custom-file">
                                        <input id="product_images" name="product_images[]" type="file"
                                               class="custom-file-container__custom-file__custom-file-input" multiple
                                               accept="image/*">
                                        <span class="custom-file-container__custom-file__custom-file-control"></span>
                                    </label>
                                    <div class="custom-file-container__image-preview"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 layout-spacing">
                        <div class="statbox widget box box-shadow">
                            <div class="widget-header">
                                <div class="row">
                                    <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                        <h4>{{__('productmodule::admin.video')}}</h4>
                                    </div>
                                </div>
                            </div>
                            <div class="widget-content ">
                                <div class="custom-file-container" data-upload-id="myVideo">
                                    <label><a href="javascript:void(0)" class="custom-file-container__image-clear"
                                              title="Clear Image"> </a></label>
                                    <label class="custom-file-container__custom-file">
                                        <input id="video" name="video" type="file"
                                               class="custom-file-container__custom-file__custom-file-input"
                                               accept="video/mp4">
                                        <span class="custom-file-container__custom-file__custom-file-control"></span>
                                    </label>
                                    <div class="custom-file-container__image-preview">
                                        @if(!empty($product_info->video))
                                            <div id="video_preview" style="position:relative;">
                                                <div class="btn btn-danger" title="Delete" id="video_delete"
                                                     style="position: absolute; top: 10%;z-index: 9;"><i
                                                        class="flaticon-delete  bg-danger p-1 text-white br-6 mb-1"></i>
                                                </div>
                                                <video width="100%" height="100%" controls>
                                                    <source
                                                        src="{{ asset('images/product/'.$product_info->video) }}"
                                                        type="video/mp4">
                                                    Your browser does not support the video tag.
                                                </video>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <button id="update_main_data"
                                class="btn btn-md btn-block btn-success">{{__('productmodule::admin.upload')}}</button>
                        <input type="hidden" id="product_id" name="id" value="{{$product_info->id}}">
                    </div>
                </div>
            </form>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-lg-12" style="margin:30px 0 30px 0;">
            <h3 class="text-center">{{__('productmodule::admin.images')}}</h3>
        </div>

        @foreach($product_info->images as $image)
            <div class="col-md-4 col-6" style="margin-bottom:20px;">
                <form class="inline" action="{{url('admin/product/image/' . $image->id)}}" method="POST">
                    {{ method_field('DELETE') }} {!! csrf_field() !!}
                    <button class="btn btn-danger" title="Delete" type="submit"
                            onclick="return confirm('{{__("productmodule::product.delete_image")}}')"
                            style="position: absolute; top: 30px;"><i
                            class="flaticon-delete  bg-danger p-1 text-white br-6 mb-1"></i></button>
                </form>

                <img style="width: 100%;" src="{{asset('images/product/'.$image->image)}}"/>
            </div>
        @endforeach

    </div>
</section>
