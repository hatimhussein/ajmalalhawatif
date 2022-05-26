@extends('commonmodule::layouts.master')

@section('title')
    المديرين
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
                      <h3>{{__('commonmodule::sidebar.admins_group')}}</h3>
                      <div class="crumbs">
                          <ul id="breadcrumbs" class="breadcrumb">
                              <li><a href="{{url('/admin')}}"><i class="flaticon-home-fill"></i></a></li>
                              <li><a href="#">{{__('commonmodule::sidebar.admins_group')}}</a></li>
                              <li class="active"><a href="#">{{__('adminmodule::permissions.allGroups')}}</a> </li>
                          </ul>
                      </div>
                  </div>

                  @can('add_role')
                    <div class="page-title" style="float:right">
                        <a href="{{url('admin/permissions/create')}}" class="mt-4 btn btn-button-16">{{__('adminmodule::permissions.addGroup')}}</a>
                    </div>
                  @endcan

              </div>

              <div class="row" id="cancel-row">

                  <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                      <div class="statbox widget box box-shadow">
                          <div class="widget-header">
                              <div class="row">
                                  <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                      <h4>{{__('commonmodule::sidebar.admins_group')}}</h4>

                                  </div>
                              </div>
                          </div>
                          <div class="widget-content widget-content-area">
                              <div class="table-responsive mb-4">
                                  <table id="zero-config" class="table table-hover table-bordered" style="width:100%">
                                      <thead>
                                          <tr>
                                              <th>#</th>
                                              <th>{{__('adminmodule::permissions.groupName')}}</th>
                                              <th>{{__('adminmodule::permissions.create_at')}}</th>
                                              <th >{{__('adminmodule::permissions.operations')}}</th>
                                          </tr>
                                      </thead>
                                      <tbody>
                                        @foreach($roles as $role)
                                          <tr>
                                              <td class="text-primary">{{$role->id}}</td>
                                              <td class="editablegrid-name" data-title="NAME">{{$role->name}}</td>
                                              <td>{{$role->created_at}}</td>
                                              <td>
                                                <ul class="table-controls">
                                                    <li><a class="btn btn-primary p-0" href="{{url('admin/permissions/'.$role->id.'/edit')}}" data-toggle="tooltip" data-placement="top" title="Settings"><i class="flaticon-settings-4  bg-primary p-1 text-white br-6"></i></a> </li>


                                                  @can('delete_role')
                                                      <li>
                                                        <form class="inline" action="{{url('admin/permissions/' . $role->id)}}" method="POST">
                                                          {{ method_field('DELETE') }} {!! csrf_field() !!}
                                                          <button title="Delete" type="submit" onclick="return confirm('{{__('adminmodule::admin.delete_admins')}}')" type="button"
                                                            class="btn btn-danger p-0"><i class="flaticon-delete  bg-danger p-1 text-white br-6"></i></button>
                                                        </form>
                                                        </a>
                                                      </li>
                                                  @endcan
                                                  @can('update_role')
                                                    <li>
                                                      <button type="button" class="mod btn btn-success p-0" data-toggle="modal" data-value="{{$role->name}}" data-id="{{$role->id}}" data-target="#exampleModalCenter">
                                                        <i class="flaticon-edit  bg-success p-1 text-white "></i>
                                                      </button>
                                                    @endcan


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

        <!-- Modal -->
        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalCenterTitle">تعديل اسم المجموعة</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                      <div class="col-xl-12 pt-3">
                        <form action="{{url('admin/permissions/update-role-name')}}" method="POST">
                          @csrf
                          <input  type="hidden" id="roleId" name="roleId" >

                           <div class="input-group mb-4">
                             <input type="text" id="roleName" name="roleName" value="" class="form-control" placeholder="GroupName" aria-label="Recipient's username" aria-describedby="basic-addon2" required="">
                             <div class="input-group-append">
                               <button class="btn btn-success" type="submit">حفظ</button>
                             </div>

                           </div>
                       </form>
                       </div>



                    </div>
                </div>
            </div>
        </div>



@stop


@section('js')

@include('commonmodule::includes.swal')
@include('commonmodule::includes.modal')

<script>
    $('#zero-config').DataTable({
        "language": {
            "paginate": { "previous": "<i class='flaticon-arrow-left-1'></i>", "next": "<i class='flaticon-arrow-right'></i>" },
            "info": "Showing page _PAGE_ of _PAGES_"
        }
    });
</script>




    <!--  BEGIN CUSTOM SCRIPT FILE  -->
    <script>

    $(document).on("click", ".mod", function () {

        var id = $(this).data('id');
        var name = $(this).data('value');
        $(".modal-body #roleId").val( id );
        $(".modal-body #roleName").val( name );
    });



    </script>
    <!--  END CUSTOM SCRIPT FILE  -->

@endsection
