<section>
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
                <div class="widget-content widget-content-area">
                    <div class="custom-file-container" data-upload-id="myFirstImage">
                        <label> <a href="javascript:void(0)" class="custom-file-container__image-clear"
                                   title="Clear Image"></a></label>
                        <label class="custom-file-container__custom-file">
                            <input id="product_photo" name="product_photo" type="file"
                                   class="custom-file-container__custom-file__custom-file-input"
                                   data-validate-func="required" data-validate-arg="6" required accept="image/*">
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
                            <h4>{{__('productmodule::admin.images')}}</h4>
                        </div>
                    </div>
                </div>
                <div class="widget-content widget-content-area">
                    <div class="custom-file-container" data-upload-id="mySecondImage">
                        <label> <a href="javascript:void(0)" class="custom-file-container__image-clear"
                                   title="Clear Image"> </a></label>
                        <label class="custom-file-container__custom-file">
                            <input id="product_images" name="product_images[]" type="file"
                                   class="custom-file-container__custom-file__custom-file-input"
                                   data-validate-func="required" data-validate-arg="6" required multiple
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
                <div class="widget-content widget-content-area">
                    <div class="custom-file-container" data-upload-id="myVideo">
                        <label> <a href="javascript:void(0)" class="custom-file-container__image-clear"
                                   title="Clear Video"></a></label>
                        <label class="custom-file-container__custom-file">
                            <input id="video" name="video" type="file"
                                   class="custom-file-container__custom-file__custom-file-input" accept="video/mp4">
                            <span class="custom-file-container__custom-file__custom-file-control"></span>
                        </label>
                        <div class="custom-file-container__image-preview"></div>
                    </div>
                </div>
            </div>
        </div>

    </div>

</section>
