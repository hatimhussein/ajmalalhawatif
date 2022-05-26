@extends('commonmodule::layouts.master')

@section('title')
{{__('adminmodule::admin.admins')}}
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
                      <h3>{{__('adminmodule::admin.admins')}}</h3>
                      <div class="crumbs">
                          <ul id="breadcrumbs" class="breadcrumb">
                              <li><a href="{{url('/admin')}}"><i class="flaticon-home-fill"></i></a></li>
                              <li><a href="#">{{__('adminmodule::admin.admins')}}</a></li>
                              <li class="active"><a href="#">{{__('adminmodule::admin.allAdmins')}}</a> </li>
                          </ul>
                      </div>
                  </div>

                  @can('add_admins')
                    <div class="page-title" style="float:right">
                        <a href="{{url('admin/admins/create')}}" class="mt-4 btn btn-button-16"> {{__('adminmodule::admin.add_new_admin')}}  </a>
                    </div>
                  @endcan

              </div>

              <div class="row" id="cancel-row">

                  <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                      <div class="statbox widget box box-shadow">
                          <div class="widget-header">
                              <div class="row">
                                  <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                      <h4>{{__('adminmodule::admin.admins')}}</h4>
                                  </div>
                              </div>
                          </div>
                          <div class="widget-content widget-content-area">
                              <div class="table-responsive mb-4">
                                  <table id="zero-config" class="table table-hover table-bordered" style="width:100%">
                                      <thead>
                                          <tr>
                                              <th>{{__('adminmodule::admin.name')}}</th>
                                              <th>{{__('adminmodule::admin.userName')}}</th>
                                              <th>{{__('adminmodule::admin.email')}}</th>
                                              <th>{{__('adminmodule::admin.permissions')}}</th>
                                              <th>{{__('adminmodule::admin.create_at')}}</th>
                                              <th >{{__('adminmodule::admin.operations')}}</th>
                                          </tr>
                                      </thead>
                                      <tbody>
                                        @foreach($admins as $admin)
                                          <tr>
                                              <td class="text-primary">{{$admin->name}}</td>
                                              <td>{{$admin->username}}</td>
                                              <td>{{$admin->email}}</td>
                                              <td>{{($admin->roles()->first())?$admin->roles()->first()->name:'لا يوجد'}}</td>
                                              <td>{{$admin->created_at}}</td>
                                              <td>
                                                <ul class="table-controls">
                                                  @can('update_admins')

                                                    <li><a class="btn btn-success p-0" href="{{url('admin/admins/'.$admin->id.'/edit')}}" data-toggle="tooltip" data-placement="top" title="Edit"><i class="flaticon-edit  bg-success p-1 text-white br-6 mb-1"></i></a></li>
                                                  @endcan

                                                    @can('delete_admins')
                                                      <li>
                                                        <form class="inline" action="{{url('admin/admins/' . $admin->id)}}" method="POST">
                                                          {{ method_field('DELETE') }} {!! csrf_field() !!}
                                                          <button title="Delete" type="submit" onclick="return confirm('{{__('adminmodule::admin.delete_admins')}}')" type="button"
                                                            class="btn btn-danger p-0"><i class="flaticon-delete  bg-danger p-1 text-white br-6 "></i></button>
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
        "lengthMenu": [ 100, 50, 20, 10 ],
        "language": {
            "paginate": { "previous": "<i class='flaticon-arrow-left-1'></i>", "next": "<i class='flaticon-arrow-right'></i>" },
            "info": "Showing page _PAGE_ of _PAGES_"
        }
    });
</script>
@endsection
