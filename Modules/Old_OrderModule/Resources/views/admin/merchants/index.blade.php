@extends('commonmodule::layouts.master')

@section('title')
    {{$title}}
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('assets/admin/plugins/table/datatable/datatables.css')}}" type="text/css">
    <link rel="stylesheet" href="{{ asset('assets/admin/css/ecommerce/product.css')}}" type="text/css">
@endsection


@section('content')


    <!--  BEGIN CONTENT PART  -->
    <div id="content" class="main-content">
        <div class="container">
            <div class="page-header">
                <div class="page-title">
                    <h3>{{$title}}</h3>
                    <div class="crumbs">
                    <!-- <ul id="breadcrumbs" class="breadcrumb">
                        <li><a href="{{url('/admin')}}"><i class="flaticon-home-fill"></i></a></li>
                        <li class="active"><a href="#">{{$title}}</a></li>
                    </ul> -->
                    </div>
                </div>


            </div>


            <div class="row margin-bottom-120">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="statbox widget box box-shadow">
                        <div class="widget-header">
                            <div class="row">
                                <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                    @if($flag == 1)
                                        <a href="{{url('admin/orders/merchant/current/1')}}" class="btn"
                                           style="background-color: #00b1f4; color: #fff">{{__('adminmodule::admin.new')}}</a>
                                        <a href="{{url('admin/orders/merchant/current/2')}}" class="btn"
                                           style="background-color: #5247bd; color: #fff">{{__('adminmodule::admin.preparing')}}</a>
                                        <a href="{{url('admin/orders/merchant/current/3')}}" class="btn"
                                           style="background-color: #8828e1; color: #fff">{{__('adminmodule::admin.prepared')}}</a>
                                        <a href="{{url('admin/orders/merchant/current/4')}}" class="btn"
                                           style="background-color: #f8538d; color: #fff">{{__('adminmodule::admin.charging')}}</a>
                                        <a href="{{url('admin/orders/merchant/current/5')}}" class="btn"
                                           style="background-color: #1a73e9; color: #fff">{{__('adminmodule::admin.charged')}}</a>

                                    @endif
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-info dropdown-toggle"
                                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            {{__('productmodule::admin.price_level')}}
                                        </button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item"
                                               href="{{url('admin/orders/merchant/price_level/'.$status.'/1')}}">{{__('productmodule::admin.first_level')}}</a>
                                            <a class="dropdown-item"
                                               href="{{url('admin/orders/merchant/price_level/'.$status.'/2')}}">{{__('productmodule::admin.second_level')}}</a>
                                            <a class="dropdown-item"
                                               href="{{url('admin/orders/merchant/price_level/'.$status.'/3')}}">{{__('productmodule::admin.third_level')}}</a>
                                            <a class="dropdown-item"
                                               href="{{url('admin/orders/merchant/price_level/'.$status.'/4')}}">{{__('productmodule::admin.fourth_level')}}</a>
                                            <a class="dropdown-item"
                                               href="{{url('admin/orders/merchant/price_level/'.$status.'/5')}}">{{__('productmodule::admin.fifth_level')}}</a>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            @can('delete_order')
                                <div class="row mt-5">
                                    <div class="col-md-6">
                                        <form class="bulk-form" action="{{ route('order.bulk') }}" method="post">
                                            @csrf
                                            <input type="hidden" name="method" value="">
                                            <input type="hidden" name="ids" value="">
                                            <button type="submit" class="btn btn-info bulk-btn" value="invoice"
                                                    disabled>{{__('ordermodule::admin.invoice')}}</button>
                                            <button type="submit" class="btn btn-danger bulk-btn" value="delete"
                                                    disabled>{{__('productmodule::admin.delete')}}</button>
                                        </form>
                                    </div>
                                </div>
                            @endcan
                        </div>
                        <div class="widget-content widget-content-area">
                            <div class=" mb-4">
                                <table id="ecommerce-product-list"
                                       class="table table-hover  table-bordered text-center">
                                    <thead>
                                    <tr>
                                        <th>{{__('ordermodule::admin.order_id')}}</th>
                                        <th><input type="checkbox" class="table-select-all"></th>
                                        <th>{{__('ordermodule::admin.merchant')}}</th>
                                        <th>{{__('ordermodule::admin.mobile')}}</th>
                                        <th>{{__('ordermodule::checkout.payment_method')}}</th>
                                        <th>{{__('ordermodule::admin.total')}}</th>
                                        <th>{{__('ordermodule::admin.date')}}</th>
                                        <th class="align-center">{{__('ordermodule::admin.action')}}</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($orders as $order)
                                        <tr>
                                            <td class="{{ $order->send_gift ? 'gift' : '' }}">{{$order->id}}</td>
                                            <td>
                                                <input type="checkbox" class="table-select"
                                                       name="ids[]" value="{{$order->id}}">
                                            </td>
                                            <td>{{($order->user)?$order->user->name:''}} </td>
                                            <td>{{($order->user)?$order->user->phone:''}}</td>
                                            <td>{{__('ordermodule::payment.'.$order->payment_type)}}</td>
                                            <td>{{$order->total}} {{$order->order_currency}}</td>
                                            <td>{{$order->created_at}}</td>


                                            <td class="align-center">
                                                <ul class="table-controls">
                                                    @can('update_order')
                                                        @if($order->current_status_type_id == 1)
                                                            <li>
                                                                <a class="btn btn-success p-0"
                                                                   href="{{url('admin/order/'.$order->id.'/edit')}}"
                                                                   data-toggle="tooltip" data-placement="top"
                                                                   title="Edit">
                                                                    <i class="flaticon-edit bg-success p-1 text-white br-6 mb-1"></i>
                                                                </a>
                                                            </li>
                                                        @endif
                                                    @endcan
                                                    @can('order_details')
                                                        <li>
                                                            <a class="btn btn-info p-0"
                                                               href="{{url('admin/order/'.$order->id.'')}}"
                                                               data-toggle="tooltip" data-placement="top"
                                                               title="Details">
                                                                <i class="flaticon-view bg-info p-1 text-white br-6 mb-1"></i>
                                                            </a>
                                                        </li>
                                                    @endcan

                                                    @can('invoice_print')
                                                        <li>
                                                            <a class="btn btn-danger p-0"
                                                               href="{{url('admin/order/invoice/'.$order->id.'')}}"
                                                               target="_blank" data-toggle="tooltip"
                                                               data-placement="top" title="Print">
                                                                <i class="flaticon-print bg-danger p-1 text-white br-6 mb-1"></i>
                                                            </a>
                                                        </li>
                                                    @endcan

                                                    @can('delete_product')
                                                        <li>
                                                            <form class="inline"
                                                                  action="{{url('admin/order/' . $order->id)}}"
                                                                  method="POST">
                                                                {{ method_field('DELETE') }} {!! csrf_field() !!}
                                                                <button class="unst" title="Delete" type="submit"
                                                                        onclick="return confirm('{{__("ordermodule::admin.delete_order")}}')"
                                                                        type="button">
                                                                    <i class="flaticon-delete  bg-danger p-1 text-white"></i>
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
    <script src="{{ asset('assets/admin/plugins/table/datatable/datatables.js')}}"></script>
    <script>
        $('#ecommerce-product-list').DataTable({
            "order": [[0, "desc"]],
            "lengthMenu": [100, 50, 20, 10],
            "language": {
                "paginate": {
                    "previous": "<i class='flaticon-arrow-left-1'></i>",
                    "next": "<i class='flaticon-arrow-right'></i>"
                },
                "info": "Showing page _PAGE_ of _PAGES_"
            },
            drawCallback: function (settings) {
                $('[data-toggle="tooltip"]').tooltip();
            },
            columnDefs: [{
                orderable: false,
                targets: 1
            }],
        });
    </script>
    <!--  END CUSTOM SCRIPT FILES  -->
@endsection
