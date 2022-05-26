@extends('commonmodule::layouts.master')

@section('title')
    {{__('configmodule::admin.shipping_method')}}
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('assets/admin/plugins/table/datatable/custom_dt_zero_config.css')}}"
          type="text/css">

    <link rel="stylesheet" href="{{ asset('assets/admin/plugins/lightbox/photoswipe.css')}}" type="text/css">
    <link rel="stylesheet" href="{{ asset('assets/admin/plugins/lightbox/default-skin/default-skin.css')}}"
          type="text/css">
    <link rel="stylesheet" href="{{ asset('assets/admin/plugins/lightbox/custom-photswipe.css')}}" type="text/css">
    <link rel="stylesheet" href="{{ asset('assets/admin/css/design-css/design.css')}}" type="text/css">
    <link rel="stylesheet" href="{{ asset('assets/admin/css/design-css/design-icons.css')}}" type="text/css">

    <!-- BEGIN PAGE LEVEL STYLES -->
    <link rel="stylesheet" href="{{ asset('assets/admin/plugins/file-upload/file-upload-with-preview.css')}}"
          type="text/css">
    <!--  BEGIN CUSTOM STYLE FILE  -->

@endsection


@section('content')



    <!--  BEGIN CONTENT PART  -->
    <div id="content" class="main-content">
        <div class="container">
            <div class="page-header">
                @can('add_shipping_method')
                    <form action="{{url('admin/shipping-method')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="page-title">
                            <div class="col-12 ">
                                <div class="statbox widget box box-shadow">
                                    <div class="widget-content p-0">
                                        <div class="custom-file-container " data-upload-id="myFirstImage">
                                            <label> {{__('configmodule::admin.image')}}<a
                                                    class="custom-file-container__image-clear ml-0"
                                                    title="Clear Image"></a></label>
                                            <label class="custom-file-container__custom-file ">
                                                <input data-validate-func="required" data-validate-arg="5"
                                                       data-validate-hint="{{__('configmodule::admin.image')}}"
                                                       type="file" name="photo"
                                                       class="custom-file-container__custom-file__custom-file-input"
                                                       accept="image/*">
                                                <input type="hidden" name="MAX_FILE_SIZE" value="10485760"/>
                                                <span
                                                    class="custom-file-container__custom-file__custom-file-control"></span>
                                            </label>
                                            <h4>
                                                @if ($errors->has('photo'))
                                                    @include('commonmodule::includes.error',['errors'=>$errors->toArray(),'filed'=>'photo'])
                                                @endif
                                            </h4>
                                            <div class="custom-file-container__image-preview"></div>

                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="page-title ml-4 mt-4">
                            <button class="btn btn-gradient-danger"
                                    type="submit">{{__('configmodule::admin.upload')}}</button>
                        </div>

                    </form>
                @endcan


            </div>

            <div class="row" id="cancel-row">

                <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                    <div class="statbox widget box box-shadow">
                        <div class="widget-header">
                            <div class="row">
                                <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                    <h4>{{__('configmodule::admin.shipping_method')}}</h4>
                                </div>
                            </div>
                        </div>
                        <div class="widget-content widget-content-area">
                            <div class="mb-4">
                                <table id="zero-config" class="table table-hover table-bordered" style="width:100%">
                                    <thead>
                                    <tr class="text-center">
                                        <th>#</th>
                                        <th>{{__('configmodule::admin.image')}}</th>
                                        <th>{{__('configmodule::admin.action')}}</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($methods as $method)
                                        <tr class="text-center">
                                            <td class="text-primary">{{$method->id}}</td>
                                            <td class="text-center  ">
                                                <div class="container">
                                                    <div class="my-gallery  product-list-img" itemscope
                                                         itemtype="http://schema.org/ImageGallery">

                                                        <figure class="m-0 " itemprop="associatedMedia" itemscope
                                                                itemtype="http://schema.org/ImageObject">
                                                            <a href="{{asset('images/img/'.$method->image)}}"
                                                               itemprop="contentUrl" data-size="1024x768">
                                                                <img class="mb-5"
                                                                     src="{{asset('images/img/'.$method->image)}}"
                                                                     itemprop="thumbnail" alt="Image description"/>
                                                            </a>

                                                        </figure>

                                                    </div>

                                                    <!-- Root element of PhotoSwipe. Must have class pswp. -->
                                                    <div class="pswp" tabindex="-1" role="dialog" aria-hidden="true">

                                                        <!-- Background of PhotoSwipe. It's a separate element, as animating opacity is faster than rgba(). -->
                                                        <div class="pswp__bg"></div>

                                                        <!-- Slides wrapper with overflow:hidden. -->
                                                        <div class="pswp__scroll-wrap">
                                                            <!-- Container that holds slides. PhotoSwipe keeps only 3 slides in DOM to save memory. -->
                                                            <!-- don't modify these 3 pswp__item elements, data is added later on. -->
                                                            <div class="pswp__container">
                                                                <div class="pswp__item"></div>
                                                                <div class="pswp__item"></div>
                                                                <div class="pswp__item"></div>
                                                            </div>

                                                            <!-- Default (PhotoSwipeUI_Default) interface on top of sliding area. Can be changed. -->
                                                            <div class="pswp__ui pswp__ui--hidden">

                                                                <div class="pswp__top-bar">

                                                                    <!--  Controls are self-explanatory. Order can be changed. -->
                                                                    <div class="pswp__counter"></div>
                                                                    <button class="pswp__button pswp__button--close"
                                                                            title="Close (Esc)"></button>
                                                                    <button class="pswp__button pswp__button--fs"
                                                                            title="Toggle fullscreen"></button>
                                                                    <button class="pswp__button pswp__button--zoom"
                                                                            title="Zoom in/out"></button>


                                                                    <div class="pswp__preloader">
                                                                        <div class="pswp__preloader__icn">
                                                                            <div class="pswp__preloader__cut">
                                                                                <div
                                                                                    class="pswp__preloader__donut"></div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div
                                                                    class="pswp__share-modal pswp__share-modal--hidden pswp__single-tap">
                                                                    <div class="pswp__share-tooltip"></div>
                                                                </div>
                                                                <button class="pswp__button pswp__button--arrow--left"
                                                                        title="Previous (arrow left)">
                                                                </button>
                                                                <button class="pswp__button pswp__button--arrow--right"
                                                                        title="Next (arrow right)">
                                                                </button>
                                                                <div class="pswp__caption">
                                                                    <div class="pswp__caption__center"></div>
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>


                                            </td>


                                            <td>
                                                <ul class="table-controls">


                                                    @can('delete_shipping_method')
                                                        <li>
                                                            <form class="inline"
                                                                  action="{{url('admin/shipping-method/' . $method->id)}}"
                                                                  method="POST">
                                                                {{ method_field('DELETE') }} {!! csrf_field() !!}
                                                                <button class="btn btn-danger p-0" title="Delete"
                                                                        type="submit"
                                                                        onclick="return confirm('{{__('configmodule::admin.delete_image')}}')"
                                                                        type="button"
                                                                >
                                                                    <i class="flaticon-delete  bg-danger p-1 text-white br-6 mb-1"></i>
                                                                </button>
                                                            </form>
                                                        </li>
                                                    @endcan
                                                </ul>

                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

            </div>


        </div>
    </div>






    <!--  END CONTENT PART  -->
@stop

@section('js')
    @include('commonmodule::includes.swal')


    <script>
        $('#zero-config').DataTable({
            "language": {
                "paginate": {
                    "previous": "<i class='flaticon-arrow-left-1'></i>",
                    "next": "<i class='flaticon-arrow-right'></i>"
                },
                "info": "Showing page _PAGE_ of _PAGES_"
            }
        });
    </script>



    <script src="{{ asset('assets/admin/plugins/lightbox/photoswipe.min.js')}}"></script>
    <script src="{{ asset('assets/admin/plugins/lightbox/photoswipe-ui-default.min.js')}}"></script>
    <script src="{{ asset('assets/admin/plugins/lightbox/custom-photswipe.js')}}"></script>



    <script src="{{ asset('assets/admin/js/design-js/design.js')}}"></script>
    <script src="{{ asset('assets/admin/js/forms/form_validation/form_validation_material.js')}}"></script>



    <!-- BEGIN PAGE LEVEL PLUGINS -->
    <script src="{{ asset('assets/admin/plugins/file-upload/file-upload-with-preview.js')}}"></script>

    <!--  BEGIN CUSTOM SCRIPTS FILE  -->
    <script src="{{ asset('assets/admin/plugins/select2/select2.min.js')}}"></script>
    <script src="{{ asset('assets/admin/plugins/select2/custom-select2.js')}}"></script>
    <!--  BEGIN CUSTOM SCRIPTS FILE  -->

    <script>
        //First upload
        var firstUpload = new FileUploadWithPreview('myFirstImage')
        //Second upload
        var secondUpload = new FileUploadWithPreview('mySecondImage')
    </script>
    <!-- END PAGE LEVEL PLUGINS -->


@endsection
