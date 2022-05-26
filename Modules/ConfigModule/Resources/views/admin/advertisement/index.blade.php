@extends('commonmodule::layouts.master')

@section('title')
{{__('configmodule::admin.advertisment')}}
@endsection

@section('css')
<link rel="stylesheet" href="{{ asset('assets/admin/plugins/table/datatable/custom_dt_zero_config.css')}}" type="text/css" >

<link rel="stylesheet" href="{{ asset('assets/admin/plugins/lightbox/photoswipe.css')}}" type="text/css" >
<link rel="stylesheet" href="{{ asset('assets/admin/plugins/lightbox/default-skin/default-skin.css')}}" type="text/css" >
<link rel="stylesheet" href="{{ asset('assets/admin/plugins/lightbox/custom-photswipe.css')}}" type="text/css" >
<link rel="stylesheet" href="{{ asset('assets/admin/css/design-css/design.css')}}" type="text/css" >
<link rel="stylesheet" href="{{ asset('assets/admin/css/design-css/design-icons.css')}}" type="text/css" >

<!-- BEGIN PAGE LEVEL STYLES -->
<link rel="stylesheet" href="{{ asset('assets/admin/plugins/file-upload/file-upload-with-preview.css')}}" type="text/css" >
<!--  BEGIN CUSTOM STYLE FILE  -->

@endsection


@section('content')



      <!--  BEGIN CONTENT PART  -->
      <div id="content" class="main-content">
          <div class="container">

<br>
              <div class="row" id="cancel-row">
                  <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                      <div class="statbox widget box box-shadow">
                          <div class="widget-header">
                              <div class="row">
                                  <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                      <h4>{{__('configmodule::admin.advertisment')}}</h4>
                                  </div>
                              </div>
                          </div>
                          <div class="widget-content widget-content-area">
                              <div class=" mb-4">
                                  <table id="zero-config" class="table table-striped table-hover table-bordered" style="width:100%">
                                      <thead>
                                          <tr class="text-center">
                                              <th>#</th>
                                              <th>{{__('configmodule::admin.image')}}</th>
                                              <th>{{__('configmodule::admin.link')}}</th>
                                              <th>{{__('configmodule::admin.position')}}</th>
                                              <th>{{__('configmodule::admin.show')}}/{{__('configmodule::admin.hide')}}</th>
                                              <th>{{__('configmodule::admin.action')}}</th>

                                          </tr>
                                      </thead>
                                      <tbody>
                                      @php($i=0)
                                        @foreach($advertisements as $advertisement)
                                          <tr class="text-center">
                                            <td class="text-primary">{{$advertisement->id}}</td>
                                              <td class="text-center  ">
                                                    <div class="container">
                                                        <div class="my-gallery  product-list-img" itemscope itemtype="http://schema.org/ImageGallery">

                                                            <figure  class="m-0 " itemprop="associatedMedia" itemscope itemtype="http://schema.org/ImageObject">
                                                              <a href="{{asset('images/img/'.$advertisement->image)}}" itemprop="contentUrl" data-size="1024x768">
                                                                  <img class="mb-5" src="{{asset('images/img/'.$advertisement->image)}}" itemprop="thumbnail" alt="Image description" />
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
                                                                        <button class="pswp__button pswp__button--close" title="Close (Esc)"></button>
                                                                        <button class="pswp__button pswp__button--fs" title="Toggle fullscreen"></button>
                                                                        <button class="pswp__button pswp__button--zoom" title="Zoom in/out"></button>

                                                                        <!-- element will get class pswp__preloader--active when preloader is running -->
                                                                        <div class="pswp__preloader">
                                                                            <div class="pswp__preloader__icn">
                                                                              <div class="pswp__preloader__cut">
                                                                                <div class="pswp__preloader__donut"></div>
                                                                              </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="pswp__share-modal pswp__share-modal--hidden pswp__single-tap">
                                                                        <div class="pswp__share-tooltip"></div>
                                                                    </div>
                                                                    <button class="pswp__button pswp__button--arrow--left" title="Previous (arrow left)">
                                                                    </button>
                                                                    <button class="pswp__button pswp__button--arrow--right" title="Next (arrow right)">
                                                                    </button>
                                                                    <div class="pswp__caption">
                                                                        <div class="pswp__caption__center"></div>
                                                                    </div>

                                                                  </div>
                                                            </div>
                                                        </div>

                                                    </div>

                                              </td>
                                              <td class="text-primary">{{$advertisement->link}}</td>
                                              <td class="text-primary">{{$advertisement->title}}</td>
                                              @if($i%2 == 0)
                                                 <td rowspan="2" class="text-primary">

                                                     <input type="checkbox" value="1" {{isset($status[$i])&&$status[$i]->status==1?'checked':
                                                                                        (isset($status[$i])&&$status[$i]->status==0?'':($status[$i-1]->status==1?'checked':''))}}
                                                            onchange="changeStatus('{{isset($status[$i])?$status[$i]->id:$status[$i-1]->id}}')" >
                                                 </td>
                                              @endif
                                              <td>
                                                <ul class="table-controls">

                                                  @can('update_advertisment')
                                                    <li>
                                                      <li><a  href="{{url('admin/advertisment/'.$advertisement->id.'/edit')}}" data-toggle="tooltip" data-placement="top" title="Edit"><i class="flaticon-edit  bg-success p-1 text-white br-6 mb-1"></i></a></li>
                                                    </li>
                                                  @endcan
                                                </ul>

                                              </td>
                                          </tr>
                                            @php($i++)
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
            "paginate": { "previous": "<i class='flaticon-arrow-left-1'></i>", "next": "<i class='flaticon-arrow-right'></i>" },
            "info": "Showing page _PAGE_ of _PAGES_"
        }
    });

    function changeStatus(id)
    {
        var token = '{{csrf_token()}}';
        $.ajax({
            'type': 'post',
            'url': '{{ route("changeAdvertise") }}',
            data: {id:id,'_token': token},
            context: this,
            'statusCode': {
                200: function (response) {
                    swal("{{__('commonmodule::swal.good')}}", "{{__('commonmodule::swal.edited')}}", "success", {button: "{{__('commonmodule::swal.btn')}}",});
                },
                422: function (response) {
                    let errors = reverseObj(response.responseJSON.errors);
                    $.map(errors, function (error) {
                        toastr["error"](error)
                    });

                }
            },
        });

    }
</script>



<script src="{{ asset('assets/admin/plugins/lightbox/photoswipe.min.js')}}"></script>
<script src="{{ asset('assets/admin/plugins/lightbox/photoswipe-ui-default.min.js')}}"></script>
<script src="{{ asset('assets/admin/plugins/lightbox/custom-photswipe.js')}}"></script>



<script  src="{{ asset('assets/admin/js/design-js/design.js')}}" ></script>
<script  src="{{ asset('assets/admin/js/forms/form_validation/form_validation_material.js')}}" ></script>



<!-- BEGIN PAGE LEVEL PLUGINS -->
<script  src="{{ asset('assets/admin/plugins/file-upload/file-upload-with-preview.js')}}" ></script>

<!--  BEGIN CUSTOM SCRIPTS FILE  -->
<script  src="{{ asset('assets/admin/plugins/select2/select2.min.js')}}" ></script>
<script  src="{{ asset('assets/admin/plugins/select2/custom-select2.js')}}" ></script>
<!--  BEGIN CUSTOM SCRIPTS FILE  -->

<script>
    //First upload
    var firstUpload = new FileUploadWithPreview('myFirstImage')
    //Second upload
    var secondUpload = new FileUploadWithPreview('mySecondImage')
</script>
<!-- END PAGE LEVEL PLUGINS -->


@endsection
