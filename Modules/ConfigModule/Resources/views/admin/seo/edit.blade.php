@extends('commonmodule::layouts.master')

@section('title')
    {{__('configmodule::admin.update_seo')}}
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('assets/admin/plugins/table/datatable/custom_dt_zero_config.css')}}" type="text/css" >
@endsection



@section('content')



      <!--  BEGIN CONTENT PART  -->
      <div id="content" class="main-content">
          <div class="container">
              <div class="page-header">
                  <div class="page-title">
                      <h3>{{__('configmodule::admin.seo')}}</h3>
                      <div class="crumbs">
                          <ul id="breadcrumbs" class="breadcrumb">
                              <li><a href="{{url('/admin')}}"><i class="flaticon-home-fill"></i></a></li>
                              <li><a href="#">{{__('configmodule::admin.update_seo')}}</a></li>
                          </ul>
                      </div>
                  </div>

              </div>

              <form method="post" action="{{url('admin/seo/'.$seo->id)}}" method="post">
                @csrf
                {{ method_field('PUT') }}

                <div class="row">

                  <div class="col-lg-9">
                    <div class=" widget-content-area">
                      <div class="statbox widget box box-shadow">
                        <div style="height: 311px;" >

                            <div class="row mb-4 mt-3">
                                <div class="col-sm-2 col-12 vertical-line-pill">
                                    <div class="nav flex-column nav-pills mb-sm-0 mb-3      mx-auto" id="v-border-pills-tab" role="tablist" aria-orientation="vertical">
                                      <a class="nav-link active" id="v-border-pills-home-tab" data-toggle="pill" href="#v-border-pills-home" role="tab" aria-controls="v-border-pills-home" aria-selected="true">{{__('configmodule::admin.info_ar')}}</a>
                                      <a class="nav-link" id="v-border-pills-profile-tab" data-toggle="pill" href="#v-border-pills-profile" role="tab" aria-controls="v-border-pills-profile" aria-selected="false">{{__('configmodule::admin.info_en')}}</a>
                                      <a class="nav-link" id="v-border-pills-script-tab" data-toggle="pill" href="#v-border-pills-script" role="tab" aria-controls="v-border-pills-script" aria-selected="false">{{__('configmodule::admin.info_script')}}</a>
                                    </div>
                                </div>

                                <div class="col-sm-10 col-12">
                                    <div class="tab-content" id="v-border-pills-tabContent">

                                      <div class="tab-pane fade show active" id="v-border-pills-home" role="tabpanel" aria-labelledby="v-border-pills-home-tab">
                                        <div class="form-row">
                                            <div class="input-control required col-md-12 mb-4 required">
                                                <input  name="name_ar" value="{{$seo->name_ar}}"  class="form-control   " data-validate-func="required" data-validate-arg="6"  data-validate-hint="{{__('configmodule::admin.please')}}  {{__('configmodule::admin.name_ar')}}  " placeholder="{{__('configmodule::admin.name_ar')}} " autocomplete="off" >
                                            </div>
                                        </div>

                                        <div class="form-row">
                                              <div class="input-control  col-md-12 mb-4 ">
                                              <label>{{__('configmodule::admin.desc_ar')}}</label>
                                                  <textarea  name="desc_ar"  class="form-control ckeditor"  placeholder="{{__('configmodule::admin.desc_ar')}}" autocomplete="off" >{{$seo->desc_ar}}</textarea>
                                              </div>
                                          </div>
                                          <div class="form-row">
                                            <div class="input-control  col-md-12 mb-4 ">
                                              <label>{{__('configmodule::admin.keys_ar')}}</label>

                                                <textarea name="keys_ar"  class="form-control ckeditor"  placeholder="{{__('configmodule::admin.keys_ar')}}" autocomplete="off" >{{$seo->keys_ar}}</textarea>
                                            </div>
                                        </div>


                                      </div>

                                      <div class="tab-pane fade" id="v-border-pills-profile" role="tabpanel" aria-labelledby="v-border-pills-profile-tab">

                                        <div class="form-row">
                                            <div class="input-control required col-md-12 mb-4 required">
                                                <input name="name_en" class="form-control"  value="{{$seo->name_en}}" data-validate-func="required" data-validate-arg="6"  data-validate-hint="{{__('configmodule::admin.please')}}  {{__('configmodule::admin.name_en')}} " placeholder="{{__('configmodule::admin.name_en')}} " autocomplete="off" >
                                            </div>
                                        </div>

                                        <div class="form-row">
                                            <div class="input-control  col-md-12 mb-4 ">
                                              <label>{{__('configmodule::admin.desc_en')}}</label>

                                                <textarea name="desc_en"  class="form-control ckeditor"  placeholder="{{__('configmodule::admin.desc_en')}}" autocomplete="off" >{{$seo->desc_en}}</textarea>
                                            </div>
                                        </div>


                                        <div class="form-row">
                                            <div class="input-control  col-md-12 mb-4 ">
                                              <label>{{__('configmodule::admin.keys_en')}}</label>

                                                <textarea name="keys_en"  class="form-control ckeditor"  placeholder="{{__('configmodule::admin.keys_en')}}" autocomplete="off" >{{$seo->keys_en}}</textarea>
                                            </div>
                                        </div>

                                      </div>


                                      <div class="tab-pane fade" id="v-border-pills-script" role="tabpanel" aria-labelledby="v-border-pills-script-tab">

                                        <div class="form-row">
                                            <div class="input-control required col-md-12 mb-4 required">
                                                <label>{{__('configmodule::admin.header')}}</label>
                                                <textarea name="script_header"  class="form-control ckeditor"  placeholder="{{__('configmodule::admin.header')}}" autocomplete="off" >{{$seo->script_header}}</textarea>
                                            </div>
                                        </div>

                                        <div class="form-row">
                                            <div class="input-control  col-md-12 mb-4 ">
                                              <label>{{__('configmodule::admin.header')}}</label>

                                                <textarea name="script_footer"  class="form-control ckeditor"  placeholder="{{__('configmodule::admin.footer')}}" autocomplete="off" >{{$seo->script_footer}}</textarea>
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





                  <div class=" col-lg-3 ">
                      <div class=" widget-content-area">
                        <div class="widget-content p-0 row">
                        <div class="input-control required col-md-12 mb-4 required">
                            <label>{{__('configmodule::admin.url')}}</label>

                            <input name="url"  class="form-control" value="{{$seo->url}}" data-validate-func="required" data-validate-arg="6"  data-validate-hint="{{__('configmodule::admin.please')}} {{__('configmodule::admin.url')}}" placeholder="{{__('configmodule::admin.url')}}" autocomplete="off">
                        </div>

                      </div>
                      </div>
                      <br>
                      <div class=" widget-content-area">
                        <div class="widget-content p-0 row">
                        <div class="input-control required col-md-12 mb-4 required">
                            <label>{{__('configmodule::admin.author')}}</label>

                            <input name="author"  class="form-control" value="{{$seo->author}}" data-validate-func="required" data-validate-arg="6"  data-validate-hint="{{__('configmodule::admin.please')}} {{__('configmodule::admin.author')}}" placeholder="{{__('configmodule::admin.author')}}" autocomplete="off">
                        </div>

                      </div>
                      </div>
                      <br>
                          <div class="widget-content p-0 row">
                            <button style="width:100%" class="btn btn-gradient-danger mb-4 mt-3" type="submit">{{__('configmodule::admin.update')}}</button>
                        </div>


                  </div>
              </div>
              </form>
      </div>
      <!--  END CONTENT PART  -->
@stop

@section('js')
@include('commonmodule::includes.swal')
@foreach ($errors->all() as $error)
<script>
    swal("{{__('commonmodule::swal.fail')}}", "{{$error}}", "error", { button: "{{__('commonmodule::swal.btn')}}", });
</script>
@break
@endforeach

<script>
    $('#zero-config').DataTable({
        "language": {
            "paginate": { "previous": "<i class='flaticon-arrow-left-1'></i>", "next": "<i class='flaticon-arrow-right'></i>" },
            "info": "Showing page _PAGE_ of _PAGES_"
        }
    });
</script>
@endsection
