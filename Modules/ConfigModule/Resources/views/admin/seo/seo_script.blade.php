@extends('commonmodule::layouts.master')

@section('title')
    Seo
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
                      <h3>Seo</h3>
                      <div class="crumbs">
                          <ul id="breadcrumbs" class="breadcrumb">
                              <li><a href="{{url('/admin')}}"><i class="flaticon-home-fill"></i></a></li>
                              <li><a href="#">Seo</a></li>
                          </ul>
                      </div>
                  </div>

              </div>

                <div class="row">

                  <div class="col-lg-9">
                    <div class=" widget-content-area">
                      <div class="statbox widget box box-shadow">
                        <form class="submit_config_form row" action="{{url('admin/update-seo-script')}}" method="POST">
                            @csrf
                            <div class="col-xl-9">
                                <div class="input-control  col-md-12 mb-4 ">
                                <label>Header</label>
                                    <textarea  name="value_ar"  class="form-control ckeditor"  placeholder="{{__('productmodule::product.desc_ar')}}" autocomplete="off" >{{$seo->value_ar}}</textarea>
                                </div>
                            </div>
                            <div class="col-xl-9">
                                <div class="input-control  col-md-12 mb-4 ">
                                <label>Footer</label>
                                    <textarea  name="value_en"  class="form-control ckeditor"  placeholder="{{__('productmodule::product.desc_ar')}}" autocomplete="off" >{{$seo->value_en}}</textarea>
                                </div>
                            </div>
                            <input type="hidden" name="key" value="{{$seo->key}}">
                            <div class="col-xl-3 mt-5" >
                                <button  type="submit" class="btn btn-md btn-block btn-success">Update</button>
                            </div>

                        </form>

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
</script>
@endsection
