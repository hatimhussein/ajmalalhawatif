@extends('commonmodule::layouts.master')

@section('title')
    {{__('productfeaturemodule::admin.options')}}
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
                    <h3>
                      <a href="{{url('admin/option')}}">
                        {{__('productfeaturemodule::admin.options')}}
                      </a>
                    </h3>

                      <div class="crumbs">
                          <ul id="breadcrumbs" class="breadcrumb">
                              <li><a href="index.html"><i class="flaticon-home-fill"></i></a></li>
                              <li><a href="#">{{__('productfeaturemodule::admin.options')}}</a></li>
                          </ul>
                      </div>
                  </div>

                  <div class="page-title" style="float:right">
                      <a href="{{url('admin/option/create')}}" class="mt-4 btn btn-button-16"> {{__('productfeaturemodule::admin.add_new_option')}}  </a>
                  </div>

                  <div class="page-title" style="float:right">
                      <a href="{{url('admin/option-value/create')}}" class="mt-4 btn btn-button-5"> {{__('productfeaturemodule::admin.add_new_option_value')}}  </a>
                  </div>


              </div>

              <div class="row" id="cancel-row">

                  <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                      <div class="statbox widget box box-shadow">
                          <div class="widget-header">
                              <div class="row">
                                  <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                      <h4>{{__('productfeaturemodule::admin.options')}}</h4>
                                  </div>
                              </div>
                          </div>
                          <div class="widget-content widget-content-area">
                              <div class="table-responsive mb-4">
                                  <table id="zero-config" class="table table-striped table-hover table-bordered" style="width:100%">
                                      <thead>
                                          <tr class="text-center">
                                              <th>#</th>
                                              <th>{{__('productfeaturemodule::admin.name_ar')}}</th>
                                              <th>{{__('productfeaturemodule::admin.name_en')}}</th>
                                              <th >{{__('productfeaturemodule::admin.action')}}</th>
                                          </tr>
                                      </thead>
                                      <tbody>
                                        @foreach($options as $option)
                                          <tr class="text-center">
                                              <td class="text-primary">{{$option->id}}</td>
                                              <td>{{$option->name_ar}}</td>
                                              <td>{{$option->name_en}}</td>



                                              <td>
                                                <ul class="table-controls">

                                                  <li><a  href="{{url('admin/option/'.$option->id)}}" data-toggle="tooltip" data-placement="top" title="Show"><i class="flaticon-view  bg-info p-1 text-white br-6 mb-1"></i></a></li>

                                                    <li><a  href="{{url('admin/option/'.$option->id.'/edit')}}" data-toggle="tooltip" data-placement="top" title="Edit"><i class="flaticon-edit  bg-success p-1 text-white br-6 mb-1"></i></a></li>
                                                    <li>
                                                      <form class="inline" action="{{url('admin/option/' . $option->id)}}" method="POST">
                                                        {{ method_field('DELETE') }} {!! csrf_field() !!}
                                                        <button class="unst" title="Delete" type="submit" onclick="return confirm('{{__('productfeaturemodule::admin.delete_option')}}')" type="button"
                                                          ><i class="flaticon-delete  bg-danger p-1 text-white br-6 mb-1"></i></button>
                                                      </form>
                                                    </li>
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
    var myDataTable =$('#zero-config').DataTable({
        "language": {
            "paginate": { "previous": "<i class='flaticon-arrow-left-1'></i>", "next": "<i class='flaticon-arrow-right'></i>" },
            "info": "Showing page _PAGE_ of _PAGES_"
        },


    });


</script>
@endsection
