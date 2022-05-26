@extends('commonmodule::layouts.master')

@section('css')
  <link rel="stylesheet" href="{{ asset('assets/admin/plugins/table/datatable/custom_dt_customer.css')}}" type="text/css" >
@endsection


@section('title')
  {{__('adminmodule::permissions.editGroup')}}
@endsection
@section('content')


<input id='role_id' value="{{$role->id}}" type="hidden">
<!--  BEGIN CONTENT PART  -->
   <div id="content" class="main-content">
       <div class="container">
           <div class="page-header">
               <div class="page-title">
                   <h3>{{__('commonmodule::sidebar.admins_group')}}</h3>
                   <div class="crumbs">
                       <ul id="breadcrumbs" class="breadcrumb">
                           <li><a href="{{url('/admin')}}"><i class="flaticon-home-fill"></i></a></li>
                           <li><a href="{{url('admin/permissions')}}" >{{__('commonmodule::sidebar.admins_group')}}</a></li>
                           <li class="active"><a href="#">{{__('adminmodule::permissions.editGroup')}}</a> </li>
                       </ul>
                   </div>
               </div>
           </div>


             <div class="row layout-spacing">
               <div class="col-lg-12">

                         <div class="widget-content widget-content-area justify-pill rounded-pills-icon" style="padding:0px">

                             <ul class="nav nav-pills mb-4 justify-content-center navs" id="justify-pills-tab" role="tablist">

                                     <li class="nav-item ml-2 mr-2" >
                                         <a class="nav-link mb-2 text-center active" id="justify-pills-curd-tab" data-toggle="pill" href="#justify-pills-curd" role="tab" aria-controls="justify-pills-curd" aria-selected="true">{{__('adminmodule::permissions.curd')}}</a>
                                     </li>

                                     <li class="nav-item ml-2 mr-2" >
                                         <a class="nav-link mb-2 text-center " id="justify-pills-custom-tab" data-toggle="pill" href="#justify-pills-custom" role="tab" aria-controls="justify-pills-custom" aria-selected="true">{{__('adminmodule::permissions.custom')}}</a>
                                     </li>

                             </ul>

                             <div  class="tab-content" id="justify-pills-tabContent">
                               <div   class="tab-pane fade show active" id="justify-pills-curd" role="tabpanel" aria-labelledby="justify-pills-curd-tab">
                                 <div class="statbox widget box box-shadow">
                                     <div class="widget-content">
                                         <div class=" mb-4 style-1">
                                             <table id="customer-info-detail-1" class="table style-1  table-bordered table-hover">
                                                 <thead>

                                                     <tr>

                                                         <th style="display: none;" class="hidden" > #</th>
                                                         <th > #</th>
                                                         <th > {{__('adminmodule::permissions.page')}}</th>
                                                         <th > {{__('adminmodule::permissions.add')}}</th>
                                                         <th>{{__('adminmodule::permissions.delete')}}</th>
                                                         <th>{{__('adminmodule::permissions.update')}}</th>
                                                         <th>{{__('adminmodule::permissions.show')}}</th>
                                                     </tr>
                                                 </thead>
                                                 <tbody>
                                                   @php($i=1)
                                                   @foreach ($permissionsGroup as $key => $permissions)

                                                     <tr>
                                                       <td  style="display: none;"> 1 </td>
                                                       <td > {{$i}} </td>
                                                       <td class="text-center"> {{$permissions[0]['title']}} </td>

                                                         @foreach ($permissions as $key => $permission)

                                                             <td class="text-center">
                                                                 <label class="new-control new-checkbox checkbox-outline-primary">
                                                                   <input {{($role->permissions->contains($permission))?'Checked':''}} type="checkbox" name="permission[]" value="{{$permission->name}}" class="new-control-input">
                                                                   <span class="new-control-indicator"></span><span class="invisible">s</span>
                                                                 </label>
                                                              </td>
                                                            @endforeach

                                                       </tr>
                                                       @php($i++)
                                                     @endforeach

                                                 </tbody>
                                             </table>
                                         </div>
                                     </div>
                                 </div>

                               </div>
                               <div class="tab-pane fade " id="justify-pills-custom" role="tabpanel" aria-labelledby="justify-pills-custom-tab">

                                 <div class="statbox widget box box-shadow">
                                     <div class="widget-content">
                                         <div class=" mb-4 style-1">
                                             <table id="customer-info-detail-3" class="table style-1  table-bordered table-hover">
                                                 <thead>

                                                     <tr>
                                                         <th style="display: none;" class="hidden" > # </th>
                                                         <th > #</th>
                                                         <th> {{__('adminmodule::permissions.permission_')}}</th>
                                                         <th></th>
                                                     </tr>
                                                 </thead>
                                                 <tbody>
                                                   @foreach ($custom_permissions as $key => $permission)

                                                     <tr>
                                                       <td  style="display: none;"> 1 </td>
                                                       <td > {{$key}} </td>
                                                       <td class="text-center"> {{$permission->title}} </td>
                                                       <td class="text-center">
                                                           <label class="new-control new-checkbox checkbox-outline-primary">
                                                             <input {{($role->permissions->contains($permission))?'Checked':''}} type="checkbox" name="permission[]" value="{{$permission->name}}" class="new-control-input">
                                                             <span class="new-control-indicator"></span><span class="invisible">s</span>
                                                           </label>
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
           </div>


       </div>
   </div>

@endsection


@section('js')
@include('commonmodule::includes.swal')


<script>
    // var e;
    c1 = $('#customer-info-detail-1').DataTable({
        "lengthMenu": [100 ],
        headerCallback:function(e, a, t, n, s) {
            e.getElementsByTagName("th")[0].innerHTML='<label class="new-control new-checkbox checkbox-outline-primary m-auto">\n<input type="checkbox" class="new-control-input chk-parent select-customers-info" id="customer-all-info">\n<span class="new-control-indicator"></span><span style="visibility:hidden">c</span>\n</label>'
        },
        columnDefs:[ {
            targets:0, width:"30px", className:"", orderable:!1, render:function(e, a, t, n) {
                return'<label class="new-control new-checkbox checkbox-outline-primary  m-auto">\n<input type="checkbox" class="new-control-input child-chk select-customers-info" id="customer-all-info">\n<span class="new-control-indicator"></span><span style="visibility:hidden">c</span>\n</label>'
            }
        }],
        "language": {
            "paginate": {
              "previous": "<i class='flaticon-arrow-left-1'></i>",
              "next": "<i class='flaticon-arrow-right'></i>"
            },
            "info": "Showing page _PAGE_ of _PAGES_"
        }
    });

    multiCheck(c1);

    c2 = $('#customer-info-detail-2').DataTable({
        "lengthMenu": [100 ],
        headerCallback:function(e, a, t, n, s) {
            e.getElementsByTagName("th")[0].innerHTML='<label class="new-control new-checkbox checkbox-outline-primary m-auto">\n<input type="checkbox" class="new-control-input chk-parent select-customers-info" id="customer-all-info">\n<span class="new-control-indicator"></span><span style="visibility:hidden">c</span>\n</label>'
        },
        columnDefs:[ {
            targets:0, width:"30px", className:"", orderable:!1, render:function(e, a, t, n) {
                return'<label class="new-control new-checkbox checkbox-outline-primary  m-auto">\n<input type="checkbox" class="new-control-input child-chk select-customers-info" id="customer-all-info">\n<span class="new-control-indicator"></span><span style="visibility:hidden">c</span>\n</label>'
            }
        }],
        "language": {
            "paginate": {
              "previous": "<i class='flaticon-arrow-left-1'></i>",
              "next": "<i class='flaticon-arrow-right'></i>"
            },
            "info": "Showing page _PAGE_ of _PAGES_"
        }
    });

    multiCheck(c2);

    c3 = $('#customer-info-detail-3').DataTable({
        "lengthMenu": [ 100 ],
        "language": {
            "paginate": {
              "previous": "<i class='flaticon-arrow-left-1'></i>",
              "next": "<i class='flaticon-arrow-right'></i>"
            },
            "info": "Showing page _PAGE_ of _PAGES_"
        }
    });

    multiCheck(c3);
</script>
<!-- END PAGE LEVEL SCRIPTS -->



<script type="text/javascript">
  $(document).ready(function(){
    $('input[type=checkbox]').on('click',function(){

      var premession=$(this).val();
      var role_id=$('#role_id').val();
      $.ajax({
          'type': 'POST',
          'url': '{{ url("admin/permissions/update-role-permession") }}',
          data: {
              '_token': '{{csrf_token()}}',
              'role_id': role_id,
              'premession': premession
          },
          'statusCode': {
                  200: function (response) {
                    const toast = swal.mixin({
                      toast: true,
                      position: 'top-end',
                      showConfirmButton: false,
                      timer: 900,
                      padding: '2em'
                    });

                    toast({
                      type: 'success',
                      title: '{{__('commonmodule::swal.edited')}}',
                      padding: '2em',
                    })
                  },
                  422: function (response) {
                      swal("خطأ", "حدث خطأ ما، أعد ادخال البيانات الصحيحة", "error", { button: "Ok", });
                  }
              },
      })

    });



  });
</script>


@endsection
