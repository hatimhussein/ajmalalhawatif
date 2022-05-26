@extends('commonmodule::layouts.master')

@section('title')
    {{__('productfeaturemodule::admin.brands')}}
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('assets/admin/plugins/table/datatable/custom_dt_zero_config.css')}}"
          type="text/css">

    <link rel="stylesheet" href="{{ asset('assets/admin/plugins/lightbox/photoswipe.css')}}" type="text/css">
    <link rel="stylesheet" href="{{ asset('assets/admin/plugins/lightbox/default-skin/default-skin.css')}}"
          type="text/css">
    <link rel="stylesheet" href="{{ asset('assets/admin/plugins/lightbox/custom-photswipe.css')}}" type="text/css">
@endsection


@section('content')



    <!--  BEGIN CONTENT PART  -->
    <div id="content" class="main-content">
        <div class="container">
            <div class="page-header">
                <div class="page-title">
                    <h3>{{__('productfeaturemodule::admin.brands')}}</h3>
                    <div class="crumbs">
                        <ul id="breadcrumbs" class="breadcrumb">
                            <li><a href="{{url('/admin')}}"><i class="flaticon-home-fill"></i></a></li>
                            <li><a href="#">{{__('productfeaturemodule::admin.brands')}}</a></li>
                        </ul>
                    </div>
                </div>

            <!-- <div class="page-title" style="float:right">
                    <button type="button" class="mt-4 btn btn-button-4" data-toggle="modal"  data-target="#exampleModalCenter">
                      {{__('productfeaturemodule::admin.addNew')}}
                </button>
              </div> -->

                @can('add_brand')
                    <div class="page-title" style="float:right">
                        <a href="{{url('admin/brand/create')}}"
                           class="mt-4 btn btn-button-16"> {{__('productfeaturemodule::admin.add_new_brand')}}  </a>
                        <a class="mt-4 btn btn-button-16 mr-2"
                           href="{{url('admin/downloadBrand')}}"> {{__('productfeaturemodule::admin.download')}}  </a>
                        <a data-target="#uploadModal" data-toggle="modal"
                           class="mt-4 btn btn-button-16 mr-2"> {{__('productfeaturemodule::admin.upload')}}  </a>
                    </div>
                @endcan


            </div>

            <div class="row" id="cancel-row">

                <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                    <div class="statbox widget box box-shadow">
                        <div class="widget-header">
                            <div class="row">
                                <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                    <h4>{{__('productfeaturemodule::admin.brands')}}</h4>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <form class="bulk-form" action="{{ route('brand.bulk') }}" method="post">
                                        @csrf
                                        <input type="hidden" name="method" value="">
                                        <input type="hidden" name="ids" value="">
                                        <button type="submit" class="btn btn-danger bulk-btn" value="delete"
                                                disabled>{{__('productmodule::admin.delete')}}</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="widget-content widget-content-area">
                            <div class="table-responsive mb-4">
                                <table id="zero-config" class="table table-hover table-bordered" style="width:100%">
                                    <thead>
                                    <tr class="text-center">
                                        <th>#</th>
                                        <th><input type="checkbox" class="table-select-all"></th>
                                        <th>{{__('productfeaturemodule::admin.sort_order')}}</th>
                                        <th>{{__('productfeaturemodule::admin.name_ar')}}</th>
                                        <th>{{__('productfeaturemodule::admin.name_en')}}</th>
                                        <th>{{__('productfeaturemodule::admin.photo')}}</th>
                                        <th>{{__('productfeaturemodule::admin.action')}}</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($brands as $brand)
                                        <tr class="text-center">
                                            <td class="text-primary">{{$loop->iteration}}</td>
                                            <td>
                                                <input type="checkbox" class="table-select"
                                                       name="ids[]" value="{{$brand->id}}">
                                            </td>
                                            <td>{{$brand->sort_order}}</td>
                                            <td>{{$brand->name_ar}}</td>
                                            <td>{{$brand->name_en}}</td>
                                            <td class="text-center  ">
                                                <div class="container">
                                                    <div class="my-gallery  product-list-img" itemscope
                                                         itemtype="http://schema.org/ImageGallery">

                                                        <figure class="m-0 " itemprop="associatedMedia" itemscope
                                                                itemtype="http://schema.org/ImageObject">
                                                            <a href="{{asset('images/brand/'.$brand->photo)}}"
                                                               itemprop="contentUrl" data-size="1024x768">
                                                                <img class=""
                                                                     src="{{asset('images/brand/'.$brand->photo)}}"
                                                                     itemprop="thumbnail" alt="Image description"/>
                                                            </a>
                                                            <figcaption
                                                                itemprop="caption description">{{$brand->name_ar}}</figcaption>
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

                                                                    <!-- element will get class pswp__preloader--active when preloader is running -->
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


                                            <!-- <div class="product-list-img">
                                                  <img alt="category" src="{{asset('images/brand/'.$brand->photo)}}">
                                                </div> -->
                                            </td>


                                            <td>
                                                <ul class="table-controls">

                                                    @can('update_brand')
                                                        <li><a href="{{url('admin/brand/'.$brand->id.'/edit')}}"
                                                               data-toggle="tooltip" data-placement="top"
                                                               title="Edit"><i
                                                                    class="flaticon-edit  bg-success p-1 text-white"></i></a>
                                                        </li>
                                                    @endcan
                                                <!--
                                                  <li>

                                                    <button type="button" class="mod btn btn-success p-0" data-toggle="modal"data-name_ar="{{$brand->name_ar}}" data-name_en="{{$brand->name_en}}" data-sort_order="{{$brand->sort_order}}"  data-id="{{$brand->id}}"  data-target="#exampleModalCenter">
                                                      <i class="flaticon-edit  bg-success p-1 text-white br-6 mb-1"></i>
                                                    </button>

                                                  </li> -->
                                                    @can('delete_brand')
                                                        <li>
                                                            <form class="inline"
                                                                  action="{{url('admin/brand/' . $brand->id)}}"
                                                                  method="POST">
                                                                {{ method_field('DELETE') }} {!! csrf_field() !!}
                                                                <button class="unst" title="Delete" type="submit"
                                                                        onclick="return confirm('{{__('productfeaturemodule::admin.brand_delete')}}')"
                                                                        type="button"
                                                                >
                                                                    <i class="flaticon-delete  bg-danger p-1 text-white"></i>
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


    <!-- Modal -->
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
         aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content ">
                <div class="modal-header ">
                    <h5 class="modal-title "
                        id="exampleModalCenterTitle"> {{__('productfeaturemodule::admin.brands')}} </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="col-xl-12 pt-3">
                        <form id="form" action="{{url('admin/brand')}}" method="POST" class="needs-validation"
                              enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" id="brand_id" name="brand_id">

                            <div class="form-group">
                                <input type="text" id="name_ar" name="name_ar"
                                       placeholder="{{__('productfeaturemodule::admin.name_ar')}}"
                                       id="validationCustom01" class="form-control-rounded form-control text-center"
                                       autocomplete="off" required>
                            </div>
                            <div class="form-group">
                                <input type="text" id="name_en" name="name_en"
                                       placeholder="{{__('productfeaturemodule::admin.name_en')}}"
                                       id="validationCustom01" class="form-control-rounded form-control text-center"
                                       autocomplete="off" required>
                            </div>

                            <div class="form-group">
                                <input type="number" id="sort_order" name="sort_order"
                                       placeholder="{{__('productfeaturemodule::admin.sort_order')}}"
                                       id="validationCustom01" class="form-control-rounded form-control text-center"
                                       autocomplete="off">
                            </div>

                            <div class="form-group">
                                <input type="file" id="photo" name="photo" placeholder="photo" id="validationCustom01"
                                       class="form-control-rounded form-control text-center" required>
                            </div>


                            <div class="form-group text-center">
                                <button type="submit" class="mt-4 btn btn-button-7 btn-rounded ">
                                    {{__('productfeaturemodule::attribute.save')}}
                                </button>
                            </div>
                        </form>

                    </div>


                </div>
            </div>
        </div>
    </div>



    <!--  END CONTENT PART  -->

    <div class="modal fade" id="uploadModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">{{__('productmodule::admin.upload')}}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="post" action="{{url('admin/uploadBrand')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="row">

                            <input type="file" name="brands" class="col-lg-6" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">{{__('productmodule::admin.upload')}}</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
@stop

@section('js')
    @include('commonmodule::includes.swal')
    @include('commonmodule::includes.modal')

    <script>
        $('#zero-config').DataTable({
            "order": [[0, "desc"]],
            "lengthMenu": [100, 50, 20, 10],
            "language": {
                "paginate": {
                    "previous": "<i class='flaticon-arrow-left-1'></i>",
                    "next": "<i class='flaticon-arrow-right'></i>"
                },
                "info": "Showing page _PAGE_ of _PAGES_"
            },
            columnDefs: [{
                orderable: false,
                targets: 1
            }],
        });
    </script>


    <script>

        $(document).on("click", ".mod", function () {
            var id = $(this).data('id');
            var name_ar = $(this).data('name_ar');
            var name_en = $(this).data('name_en');
            var sort_order = $(this).data('sort_order');

            $("#brand_id").val(id);
            $("#name_ar").val(name_ar);
            $("#name_en").val(name_en);
            $("#sort_order").val(sort_order);

        });


    </script>


    <script src="{{ asset('assets/admin/plugins/lightbox/photoswipe.min.js')}}"></script>
    <script src="{{ asset('assets/admin/plugins/lightbox/photoswipe-ui-default.min.js')}}"></script>
    <script src="{{ asset('assets/admin/plugins/lightbox/custom-photswipe.js')}}"></script>



@endsection
