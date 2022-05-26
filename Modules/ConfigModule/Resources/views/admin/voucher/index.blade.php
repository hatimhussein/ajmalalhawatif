@extends('commonmodule::layouts.master')

@section('title')
    {{__('configmodule::admin.vouchers')}}
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
                    <h3>{{__('configmodule::admin.vouchers')}} </h3>

                </div>
                @can('add_voucher')
                    <div class="page-title" style="float:right">
                        <a href="{{url('admin/voucher/create')}}"
                           class="mt-4 btn btn-button-16"> {{__('configmodule::admin.add_new_voucher')}} </a>
                    </div>
                @endcan
            </div>

            <div class="row" id="cancel-row">

                <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                    <div class="statbox widget box box-shadow">
                        <div class="widget-header">
                            <div class="row">
                                <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                    <h4>{{__('configmodule::admin.vouchers')}}</h4>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <form class="bulk-form" action="{{ route('voucher.bulk') }}" method="post">
                                        @csrf
                                        <input type="hidden" name="method" value="">
                                        <input type="hidden" name="ids" value="">
                                        <button type="submit" class="btn btn-success bulk-btn" value="active"
                                                disabled>{{__('productmodule::admin.activate')}}</button>
                                        <button type="submit" class="btn btn-danger bulk-btn" value="de-active"
                                                disabled>{{__('productmodule::admin.de-active')}}</button>
                                        <button type="submit" class="btn btn-danger bulk-btn" value="delete"
                                                disabled>{{__('productmodule::admin.delete')}}</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="widget-content widget-content-area">
                            <div class="table-responsive mb-4">
                                <table id="zero-config" class="table table-striped table-hover table-bordered"
                                       style="width:100%">
                                    <thead>
                                    <tr class="text-center">
                                        <th>#</th>
                                        <th><input type="checkbox" class="table-select-all"></th>
                                        <th>{{__('configmodule::admin.code')}}</th>
                                        <th>{{__('configmodule::admin.min_total')}}</th>
                                        <th>{{__('configmodule::admin.num_of_use')}}</th>
                                        <th>{{__('configmodule::admin.max_num_of_use')}}</th>

                                        <th>{{__('configmodule::admin.start_date')}}</th>
                                        <th>{{__('configmodule::admin.end_date')}}</th>
                                        <th>{{__('configmodule::admin.amount')}}</th>
                                        <th>{{__('configmodule::admin.precentage')}}</th>
                                        <th>{{__('configmodule::admin.status')}}</th>
                                        <th>{{__('configmodule::admin.action')}}</th>

                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($vouchers as $voucher)
                                        <tr class="text-center">
                                            <td class="text-primary">{{$loop->iteration}}</td>
                                            <td>
                                                <input type="checkbox" class="table-select"
                                                       name="ids[]" value="{{$voucher->id}}">
                                            </td>
                                            <td>{{$voucher->code}}</td>
                                            <td>{{$voucher->min_total}}</td>
                                            <td>{{$voucher->num_of_use}}</td>
                                            <td>{{$voucher->max_num_of_use}}</td>

                                            <td>{{$voucher->from}}</td>
                                            <td>{{$voucher->to}}</td>
                                            <td>{{$voucher->amount}}</td>
                                            <td>{{$voucher->percentage}}</td>
                                            <td>
                                                @if($voucher->status=='enabled')
                                                    <span
                                                        class="badge badge-success">{{__('configmodule::admin.active')}}</span>
                                                @else
                                                    <span
                                                        class="badge badge-danger">{{__('configmodule::admin.unactive')}}</span>
                                                @endif
                                            </td>

                                            <td>
                                                <ul class="table-controls">


                                                    @can('update_voucher')
                                                        <li><a href="{{url('admin/voucher/'.$voucher->id.'/edit')}}"
                                                               data-toggle="tooltip" data-placement="top"
                                                               title="Edit"><i
                                                                    class="flaticon-edit  bg-success p-1 text-white br-6 mb-1"></i></a>
                                                        </li>
                                                    @endcan

                                                    @can('delete_voucher')
                                                        <li>
                                                            <form class="inline"
                                                                  action="{{url('admin/voucher/' . $voucher->id)}}"
                                                                  method="POST">
                                                                {{ method_field('DELETE') }} {!! csrf_field() !!}
                                                                <button class="unst" title="Delete" type="submit"
                                                                        onclick="return confirm('{{__('configmodule::admin.delete_voucher')}}')"
                                                                        type="button"
                                                                >
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
@stop

@section('js')
    @include('commonmodule::includes.swal')

    <script>
        let dTable = $('#zero-config').DataTable({
            "order": [[0, "desc"]],
            "lengthMenu": [100, 50, 20, 10],
            "language": {
                "paginate": {
                    "previous": "<i class='flaticon-arrow-left-1'></i>",
                    "next": "<i class='flaticon-arrow-right'></i>"
                },
                "info": "Showing page _PAGE_ of _PAGES_"
            },
            columnDefs: [{
                orderable: false,
                targets: 1
            }],
        });
    </script>
@endsection
