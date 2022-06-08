@extends('commonmodule::layouts.master')

@section('title')
    العملاء المحذوفون
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
                    <h3>العملاء المحذوفون</h3>
                    <div class="crumbs">
                        <ul id="breadcrumbs" class="breadcrumb">
                            <li><a href="{{url('/admin')}}"><i class="flaticon-home-fill"></i></a></li>
                            <li class="active"><a href="#">العملاء المحذوفون</a></li>
                        </ul>
                    </div>
                </div>

            </div>

            <br>

            <div class="row" id="cancel-row">

                <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                    <div class="statbox widget box box-shadow">

                        <div class="widget-content widget-content-area">
                            <div class=" mb-4">
                                <table id="zero-config" class="table table-hover table-bordered" style="width:100%">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>{{ __('usermodule::admin.name') }}</th>
                                        <th>{{ __('usermodule::admin.email') }}</th>
                                        <th>{{ __('usermodule::admin.phone') }}</th>
                                        <th>{{ __('usermodule::admin.date') }} </th>
                                        <th>{{ __('usermodule::admin.status') }} </th>
                                        <th>{{ __('usermodule::admin.action') }}</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($users as $user)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td class="text-primary">{{ $user->first_name . ' ' . $user->last_name  }}</td>
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
                                                                  action="{{url('admin/restore-user/' . $user->id)}}"
                                                                  method="POST">
                                                                {{ method_field('PUT') }}
                                                                {!! csrf_field() !!}
                                                                <button class="btn btn-danger p-0" title="Restore"
                                                                        type="submit"
                                                                        onclick="return confirm('{{__('productmodule::product.delete_product')}}')"
                                                                        type="button">
                                                                    <i class="flaticon-reload-1  bg-danger p-1 text-white"></i>
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
