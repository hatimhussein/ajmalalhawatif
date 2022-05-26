@extends('commonmodule::layouts.master')

@section('title')
    {{__('configmodule::admin.menu_links')}}
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('assets/admin/plugins/table/datatable/custom_dt_zero_config.css')}}"
          type="text/css">
@endsection

@section('content')

    <!--  BEGIN CONTENT PART  -->
    <div id="content" class="main-content">
        <div class="container">
            <div class="page-header">
                <div class="page-title">
                    <h3>{{__('configmodule::admin.menu_links')}}</h3>
                    <div class="crumbs">
                        <ul id="breadcrumbs" class="breadcrumb">
                            <li><a href="{{url('/admin')}}"><i class="flaticon-home-fill"></i></a></li>
                            <li><a href="#">{{__('configmodule::admin.menu_links')}}</a></li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="row" id="cancel-row">

                <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                    <div class="statbox widget box box-shadow">
                        <div class="widget-header">
                            <div class="row">
                                <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                    <h4>{{__('configmodule::admin.menu_links')}}</h4>
                                </div>
                            </div>
                        </div>
                        <div class="widget-content widget-content-area">
                            <div class="table-responsive mb-4">
                                <table id="zero-config" class="table table-hover table-bordered" style="width:100%">
                                    <thead>
                                    <tr class="text-center">
                                        <th>#</th>
                                        <th>{{__('configmodule::admin.name')}}</th>
                                        <th>{{__('configmodule::admin.status')}}</th>
                                        <th>{{__('configmodule::admin.sort')}}@method('put')</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($links as $line)
                                        <tr class="text-center">
                                            <td class="text-primary">{{$loop->iteration}}</td>
                                            <td>{{__($line->name)}}</td>
                                            <td>
                                                @if($line->status)
                                                    <span style="cursor: pointer"
                                                          onclick="changeStatus(this, {{$line->id}}, 0)"
                                                          class="badge badge-success">{{__('configmodule::admin.shown')}}</span>
                                                @else
                                                    <span style="cursor: pointer"
                                                          onclick="changeStatus(this, {{$line->id}}, 1)"
                                                          class="badge badge-danger">{{__('configmodule::admin.hidden')}}</span>
                                                @endif
                                            </td>
                                            <td>
                                                <input type="number" name="sort[]" style="width: 100px"
                                                       onchange='changeSort(this, {{$line->id}}, value)'
                                                       class='form-control form-control-rounded'
                                                       value='{{$line->sort}}'>
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
            "lengthMenu": [100, 50, 20, 10],
            "language": {
                "paginate": {
                    "previous": "<i class='flaticon-arrow-left-1'></i>",
                    "next": "<i class='flaticon-arrow-right'></i>"
                },
                "info": "Showing page _PAGE_ of _PAGES_"
            }
        });
    </script>

    <script>
        function changeSort(that, id, sort) {
            $(that).prop('disabled', true);
            let _token = "{{ csrf_token() }}";
            let _method = "put";
            $.ajax({
                type: "POST",
                url: `{{url('admin/menu')}}/${id}`,
                data: {sort, _token, _method},
                statusCode: {
                    200: function (response) {
                        $(that).prop('disabled', false);
                    },
                    422: function (response) {
                        $(that).prop('disabled', false);
                    }
                }
            });
        }

        function changeStatus(that, id, status) {
            $(that).prop('disabled', true);
            let _token = "{{ csrf_token() }}";
            let _method = "put";
            $.ajax({
                type: "POST",
                url: `{{url('admin/menu')}}/${id}`,
                data: {status, _token, _method},
                statusCode: {
                    200: function (response) {
                        if (status) {
                            $(that).parent().html(`<span style="cursor: pointer" onclick="changeStatus(this, ${id}, 0)"
                                                        class="badge badge-success">{{__('configmodule::admin.shown')}}</span>`);
                        } else {
                            $(that).parent().html(`<span style="cursor: pointer" onclick="changeStatus(this, ${id}, 1)"
                                                        class="badge badge-danger">{{__('configmodule::admin.hidden')}}</span>`);
                        }
                    },
                    422: function (response) {
                        alert('fail');
                    }
                }
            });
        }
    </script>


@endsection


