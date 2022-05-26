@extends('commonmodule::layouts.master')

@section('title')
    {{__('usermodule::admin.users')}}
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('assets/admin/plugins/table/datatable/custom_dt_zero_config.css')}}"
          type="text/css">
    <link rel="stylesheet" href="{{ asset('assets/admin/plugins/table/datatable/custom_dt_html5.css')}}"
          type="text/css">
@endsection



@section('content')



    <!--  BEGIN CONTENT PART  -->
    <div id="content" class="main-content">
        <div class="container">
            <div class="page-header">
                <div class="page-title">
                    <h3>{{__('usermodule::admin.users')}}</h3>
                    <div class="crumbs">
                        <ul id="breadcrumbs" class="breadcrumb">
                            <li><a href="{{url('/admin')}}"><i class="flaticon-home-fill"></i></a></li>
                            <li class="active"><a href="#">{{__('usermodule::admin.users')}}</a></li>
                        </ul>
                    </div>
                </div>

                <div class="page-title" style="float:right">
                    <a href="{{url('admin/users/create')}}"
                       class="mt-4 btn btn-button-16"> {{__('usermodule::admin.add_new_user')}}  </a>
                    <a href="{{asset('assets/admin/users_sample.xlsx')}}"
                       class="mt-4 btn btn-button-16 mr-2"> {{__('productmodule::admin.download')}}  </a>
                    <a data-target="#uploadModal" data-toggle="modal"
                       class="mt-4 btn btn-button-16 mr-2"> {{__('productmodule::admin.upload')}}  </a>
                </div>


            </div>

            <br>

            <div class="row" id="cancel-row">

                <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                    <div class="statbox widget box box-shadow">
                        <div class="widget-header">
                            <div class="row">
                                <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                    <h4>{{__('usermodule::admin.users')}}</h4>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <form class="bulk-form" action="{{ route('user.bulk') }}" method="post">
                                        @csrf
                                        <input type="hidden" name="method" value="">
                                        <input type="hidden" name="ids" value="">
                                        <button type="submit" class="btn btn-success bulk-btn" value="active"
                                                disabled>{{__('productmodule::admin.activate')}}</button>
                                        <button type="submit" class="btn btn-danger bulk-btn" value="de-active"
                                                disabled>{{__('productmodule::admin.de-active')}}</button>
                                        <button type="submit" class="btn btn-danger bulk-btn" value="delete"
                                                disabled>{{__('productmodule::admin.delete')}}</button>
                                        <div class="bulk-btn-group d-inline-block">
                                            <h2 class="group-title">{{__('ordermodule::payment.cash_on_delivery')}}</h2>
                                            <button type="submit" class="btn btn-success bulk-btn" value="can_cash"
                                                    disabled>{{__('productmodule::admin.activate')}}</button>
                                            <button type="submit" class="btn btn-danger bulk-btn" value="can_not_cash"
                                                    disabled>{{__('productmodule::admin.de-active')}}</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>


                        <div class="widget-content widget-content-area">
                            <div class=" mb-4">
                                <table id="zero-config" class="table table-hover table-bordered" style="width:100%">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th><input type="checkbox" class="table-select-all"></th>
                                        <th>{{__('usermodule::admin.name')}}</th>
                                        <th> {{__('usermodule::admin.email')}}</th>
                                        <th>{{__('usermodule::admin.phone')}}</th>
                                        <th>{{__('usermodule::admin.date')}} </th>
                                        <th>{{__('usermodule::admin.status')}} </th>
                                        <th>{{__('usermodule::admin.action')}}</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($users as $user)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>
                                                <input type="checkbox" class="table-select"
                                                       name="ids[]" value="{{$user->id}}">
                                            </td>
                                            <td class="text-primary">{{$user->first_name}} {{$user->last_name}}</td>
                                            <td>{{$user->email}}</td>
                                            <td>{{$user->phone}}</td>

                                            <td>{{$user->created_at}}</td>
                                            <td>

                                                @if(!$user->is_ban)
                                                    <a href="{{url('admin/change-user-status/status/1/id/'.$user->id)}}"
                                                       class="btn btn-outline-success btn-rounded mb-4 mr-2">
                                                        <i class="flaticon-single-circle-tick"></i> {{__('usermodule::admin.active')}}
                                                    </a>

                                                @else
                                                    <a href="{{url('admin/change-user-status/status/0/id/'.$user->id)}}"
                                                       class="btn btn-outline-danger btn-rounded mb-4 mr-2">
                                                        <i class="flaticon-circle-cross"></i> {{__('usermodule::admin.unactive')}}
                                                    </a>
                                                @endif

                                            </td>

                                            <td>
                                                <ul class="table-controls">
                                                    <li>
                                                        <a class="btn btn-info p-0"
                                                           href="{{url('admin/users/'.$user->id)}}"
                                                           data-toggle="tooltip" data-placement="top" title="Edit">
                                                            <i class="flaticon-view  bg-info p-1 text-white br-6"></i>
                                                        </a>
                                                    </li>

                                                    @can('users')
                                                        <li>
                                                            <a href="{{ url('admin/users/'.$user->id.'/edit') }}"
                                                               class="mod btn btn-success p-0">
                                                                <i class="flaticon-edit  bg-success p-1 text-white br-6 mb-1"></i>
                                                            </a>
                                                        </li>
                                                    @endcan

                                                    @can('users')
                                                        <li>
                                                            <form class="inline"
                                                                  action="{{url('admin/users/' . $user->id)}}"
                                                                  method="POST">
                                                                {{ method_field('DELETE') }} {!! csrf_field() !!}
                                                                <button class="btn btn-danger p-0" title="Delete"
                                                                        type="submit"
                                                                        onclick="return confirm('{{__('usermodule::admin.delete_user')}}')"
                                                                        type="button">
                                                                    <i class="flaticon-delete  bg-danger p-1 text-white br-6 mb-1"></i>
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
    <!--  END CONTENT PART  -->

    {{--  upload Modal  --}}

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
                <form method="post" action="{{route('upload_users')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <input type="file" name="users" class="col-lg-6"
                                   accept=".csv, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel"
                                   required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary"
                                data-dismiss="modal">{{__('productmodule::admin.cancel')}}</button>
                        <button type="submit" class="btn btn-primary">{{__('productmodule::admin.upload')}}</button>
                    </div>
                </form>

            </div>
        </div>
    </div>

    {{--  End Upload Modal  --}}
@stop

@section('js')
    @include('commonmodule::includes.swal')

    <script src="{{ asset('assets/admin/plugins/table/datatable/button-ext/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('assets/admin/plugins/table/datatable/button-ext/jszip.min.js') }}"></script>
    <script src="{{ asset('assets/admin/plugins/table/datatable/button-ext/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('assets/admin/plugins/table/datatable/button-ext/buttons.print.min.js') }}"></script>

    <script>
        $('#zero-config').DataTable({
            dom: 'Bfrtip',
            "lengthMenu": [100, 50, 20, 10],
            "language": {
                "paginate": {
                    "previous": "<i class='flaticon-arrow-left-1'></i>",
                    "next": "<i class='flaticon-arrow-right'></i>"
                },
                "info": "Showing page _PAGE_ of _PAGES_"
            },
            "buttons": [
                'excel'
            ],
            columnDefs: [{
                orderable: false,
                targets: 1
            }],
        });

        $(document).ready(function () {
            $(".dt-button.buttons-html5").addClass('btn btn-info');
        })
    </script>
@endsection
