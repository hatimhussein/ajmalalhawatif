@extends('commonmodule::layouts.master')

@section('css')
  <link rel="stylesheet" href="{{ asset('assets/admin/plugins/table/datatable/custom_dt_customer.css')}}" type="text/css" >
@endsection


@section('title')
  {{__('adminmodule::permissions.addGroup')}}
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
                           <li><a href="{{url('admin/permissions')}}">{{__('commonmodule::sidebar.admins_group')}}</a></li>
                           <li class="active"><a href="#">{{__('adminmodule::permissions.addGroup')}}</a> </li>
                       </ul>
                   </div>
               </div>
           </div>
           <form  action="{{url('admin/permissions')}}" method="POST">
             @csrf
             <div class="row layout-spacing">
               <div class="col-lg-12">
                 <div class="widget-content widget-content-area justify-pill rounded-pills-icon" style="padding:0px">
                 <ul class="nav nav-pills mb-2 justify-content-center navs" id="justify-pills-tab" role="tablist">
                                    <li class="nav-item ml-2 mr-2">
                                        <a class="nav-link mb-2 text-center active" id="justify-pills-curd-tab" data-toggle="pill" href="#justify-pills-curd" role="tab" aria-controls="justify-pills-curd" aria-selected="true"> {{__('adminmodule::permissions.curd')}}</a>
                                    </li>
                                    <li class="nav-item ml-2 mr-2">
                                        <a class="nav-link mb-2 text-center" id="justify-pills-custom-tab" data-toggle="pill" href="#justify-pills-custom" role="tab" aria-controls="justify-pills-custom" aria-selected="false"> Private custom</a>
                                    </li>
                                </ul>
                     <div  class="tab-content" id="justify-pills-tabContent">
                       <div   class="tab-pane fade show active" id="justify-pills-curd" role="tabpanel" aria-labelledby="justify-pills-curd-tab">
                         <div class="statbox widget box box-shadow">
                             <div class="widget-header">
                                 <div class="row">
                                   <div class="col-xl-3">
                                   </div>
                                     <div class="col-xl-6 pt-3">

                                       <div class="input-group mb-4">
                                         <input type="text" name="roleName" value="{{ old('roleName')}}" class=" form-control" placeholder="{{__('adminmodule::permissions.groupName')}}" aria-label="Recipient's username" aria-describedby="basic-addon2" required>
                                         <div class="input-group-append">
                                           <button class="btn btn-primary " type="submit">SAVE</button>
                                         </div>
                                         @if ($errors->has('roleName'))
                                           @include('commonmodule::includes.error',['errors'=>$errors->toArray(),'filed'=>'roleName'])
                                         @endif

                                       </div>
                                     </div>


                                 </div>
                             </div>
                             <div class="widget-content widget-content-area">
                                 <div class=" style-1">
                                     <table id="customer-info-detail-1" class="table  table-bordered table-hover">
                                         <thead>
                                             <tr>

                                                 <th id="all_checked" class="checkbox-column"> # </th>
                                                 <th > {{__('adminmodule::permissions.page')}}</th>
                                                 <th > {{__('adminmodule::permissions.add')}}</th>
                                                 <th>{{__('adminmodule::permissions.update')}}</th>
                                                 <th>{{__('adminmodule::permissions.show')}}</th>
                                                 <th>{{__('adminmodule::permissions.delete')}}</th>
                                                  <th>تحميل</th>
                                             </tr>
                                         </thead>
                                         <tbody>
                                           @foreach ($permissionsGroup as $key => $permissions)

                                               <td class="checkbox-column"> 1 </td>
                                               <td class="text-center"> {{$permissions[0]['title']}} </td>

                                                 @foreach ($permissions as $key => $permission)

                                                     <td class="text-center">
                                                         <label class="new-control new-checkbox checkbox-outline-primary">
                                                           <input {{(old('permission'))?((in_array($permission->name,old('permission')))?'Checked':''):''}} type="checkbox" name="permission[]" value="{{$permission->name}}" class="new-control-input">
                                                           <span class="new-control-indicator"></span><span class="invisible">s</span>
                                                         </label>
                                                      </td>
                                                    @endforeach

                                               </tr>
                                             @endforeach

                                         </tbody>
                                     </table>
                                 </div>
                             </div>
                         </div>
                       </div>
                       <div class="tab-pane fade " id="justify-pills-custom" role="tabpanel" aria-labelledby="justify-pills-custom-tab">

                         <div class="statbox widget box box-shadow">
                             <div class="widget-content widget-content-area">
                                 <div class=" mb-4 style-1">
                                     <table id="customer-info-detail-3" class="table style-1  table-bordered table-hover">
                                         <thead>

                                             <tr>

                                                 <th style="display: none;" class="hidden" > # </th>
                                                 <th > #</th>
                                                 <th class="text-center"> {{__('adminmodule::permissions.permission_')}}</th>
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
                                                     <input type="checkbox" name="permission[]" value="{{$permission->name}}" class="new-control-input">
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

          </form>


       </div>
   </div>

@endsection


@section('js')

<script type="text/javascript">
$('#all_checked').on('change',function(){

    $('input[type=checkbox]').trigger('click');
});

</script>
<script>


    // var e;
    c1 = $('#customer-info-detail-1').DataTable({
        "lengthMenu": [ 100 ],
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
        "lengthMenu": [100 ],
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

@endsection
