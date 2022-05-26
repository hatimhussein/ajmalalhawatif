@extends('commonmodule::layouts.master')

@section('css')
<link rel="stylesheet" href="{{ asset('assets/admin/css/design-css/design.css')}}" type="text/css" >
<link rel="stylesheet" href="{{ asset('assets/admin/css/design-css/design-icons.css')}}" type="text/css" >

<!-- BEGIN PAGE LEVEL STYLES -->
<link rel="stylesheet" href="{{ asset('assets/admin/plugins/file-upload/file-upload-with-preview.css')}}" type="text/css" >
<!--  BEGIN CUSTOM STYLE FILE  -->

<link rel="stylesheet" href="{{ asset('assets/admin/plugins/select2/select2.min.css')}}" type="text/css" >

<style>
    .row [class*="col-"] .widget .widget-header h4 { color: #00d1c1; }
</style>
<!--  END CUSTOM STYLE FILE  -->

<!-- END PAGE LEVEL STYLES -->

@endsection


@section('title')
    {{$user->first_name .' '. $user->last_name}}
@endsection

@section('content')
  <div id="content" class="main-content">
      <div class="container">
          <div class="page-header">
              <div class="page-title">
                <h3>
                   {{$user->first_name .' '. $user->last_name}}
               </h3>

              </div>
          </div>

          <div class="row">
            <form  action="{{url('admin/brand')}}" style="width:100%"  method="POST"  data-role="validator" data-on-before-submit="no_submit" data-on-error-input="notifyOnErrorInput" data-show-error-hint="false" novalidate="novalidate" enctype="multipart/form-data">
              @csrf

                <div class="col-lg-12 layout-spacing col-md-12">
                    <div class="statbox widget box box-shadow">
                        <div class="widget-header">

                        </div>

                        <div class="widget-content widget-content-area">

                              <div class="row">
                                  <div class="col-xl-3 col-lg-12 col-12 ">
                                    <div class="profile-info-section mb-4">
                                        <div class="card" style="">
                                            <div class="card-body">
                                                <h5 class="mb-4"><i class="flaticon-user-plus"></i> {{$user->first_name .' '. $user->last_name}}</h5>
                                                <p class="mb-2"><span class="usr-work-position">{{__('usermodule::admin.phone')}} : </span>  <a href="">{{$user->phone}}</a></p>
                                                <p class="mb-2"><span class="usr-work-position">{{__('usermodule::admin.email')}} : </span>   <a href="">{{$user->email}}</a></p>

                                                <p class="mb-2"><span class="usr-work-position">{{__('usermodule::admin.address')}} : </span>   <a href="">
                                                  @if($user->government!=null)
                                                    {{$user->government->name_ar }}
                                                  @endif
                                                  @if($user->city!=null)
                                                    / {{$user->city->name_ar }}
                                                  @endif
                                                  @if($user->city!=null)
                                                  /  {{$user->zone->name_ar}}
                                                  @endif
                                                </a></p>


                                                <div class="social-networks-section mt-3">

                                                    <div class="row">
                                                        <div class="col-sm-12 text-center">
                                                            @if(!$user->is_ban)
                                                            <a href="{{url('admin/change-user-status/status/1/id/'.$user->id)}}" class="btn btn-outline-success btn-rounded mb-4 mr-2">
                                                              <i class="flaticon-single-circle-tick"></i> {{__('usermodule::admin.active')}}
                                                            </a>

                                                            @else
                                                            <a href="{{url('admin/change-user-status/status/0/id/'.$user->id)}}" class="btn btn-outline-danger btn-rounded mb-4 mr-2">
                                                              <i class="flaticon-circle-cross"></i> {{__('usermodule::admin.unactive')}}
                                                            </a>


                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                  </div>

                                  <div class="col-xl-9 col-lg-12 col-12 ">
                                    <div class="widget-content justify-pill rounded-pills-icon" style="padding:0px">

                                        <ul class="nav nav-pills mt-3  justify-content-center navs nav3" id="justify-pills-tab" role="tablist">

                                                <li class="nav-item ml-2 mr-2" >
                                                    <a  class="nav-link mb-2 text-center active" id="justify-pills-Suggestion-tab" data-toggle="pill" href="#justify-pills-Suggestion" role="tab" aria-controls="justify-pills-Suggestion" aria-selected="true">{{__('usermodule::admin.wishlist')}}</a>
                                                </li>

                                                <!-- <li class="nav-item ml-2 mr-2" >
                                                    <a  class="nav-link mb-2 text-center " id="justify-pills-complaint-tab" data-toggle="pill" href="#justify-pills-complaint" role="tab" aria-controls="justify-pills-complaint" aria-selected="true">Suggestions And Complaints</a>
                                                </li> -->
                                                <!-- <li class="nav-item ml-2 mr-2" >
                                                    <a  class="nav-link mb-2 text-center " id="justify-pills-complaint-tab" data-toggle="pill" href="#justify-pills-complaint" role="tab" aria-controls="justify-pills-complaint" aria-selected="true">Messages</a>
                                                </li> -->

                                        </ul>

                                        <div  class="tab-content" id="justify-pills-tabContent">
                                          <div   class="tab-pane fade show active" id="justify-pills-Suggestion" role="tabpanel" aria-labelledby="justify-pills-Suggestion-tab">
                                            <div class="row margin-bottom-120">
                                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                                  <div class="widget-content">
                                                      <div class=" mb-4">
                                                <table id="ecommerce-product-list" class="table table-hover  table-bordered text-center">
                                  <thead>
                                  <tr>
                                  <th>#</th>
                                  <th>{{__('usermodule::admin.product_name')}}</th>
                                  <th>{{__('usermodule::admin.date')}}</th>
                             
                                  </tr>
                                  </thead>
                                  <tbody>
                                  @foreach($wishlist as $wish)

                                  <tr>
                                  <td>{{$wish->product->id}}</td>
                                  <td>{!! LanguageHelper::nameTranslate($wish->product) !!} </td>
                                  <td>{{$wish->created_at}}</td>


                                  
                                  </tr>
                                  @endforeach
                                  </tbody>
                                                          </table>
                                                      </div>
                                                  </div>

                                                </div>
                                            </div>

                                          </div>
                                          <div class="tab-pane fade " id="justify-pills-complaint" role="tabpanel" aria-labelledby="justify-pills-complaint-tab">
                                            <div class="row margin-bottom-120">
                                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                                    <div class="statbox widget box box-shadow">
                                                        <div class="widget-content">
                                                            <div class="table-responsive mb-4">
                                                                <table id="ecommerce-product-list1" class="table table-hover   table-bordered text-center">
                                                                    <thead>
                                                                        <tr>
                                                                            <th>#</th>
                                                                            <th>{{__('usermodule::admin.phone')}}</th>

                                                                            <th>{{__('usermodule::admin.message')}}</th>
                                                                            <th>{{__('usermodule::admin.date')}}</th>
                                                                            <th class="align-center">{{__('usermodule::admin.action')}}</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>

                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                          </div>


                                        </div>

                                    </div>



                                  </div>




                              </div>

                        </div>
                    </div>
                </div>


              </form>

            </div>

    </div>
  </div>


@stop

@section('js')
@include('commonmodule::includes.swal')

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
