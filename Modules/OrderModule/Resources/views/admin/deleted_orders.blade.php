@extends('commonmodule::layouts.master')

@section('title')
    الطلبات المحذوفة
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
                    <h3>الطلبات المحذوفة</h3>
                    <div class="crumbs">

                    </div>
                </div>


            </div>


            <div class="row margin-bottom-120">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="statbox widget box box-shadow">
                        <div class="widget-header">
                            <div class="row">
{{--                                <div class="col-xl-12 col-md-12 col-sm-12 col-12">--}}
{{--                                    @if($flag == 1)--}}
{{--                                        <a href="{{url('admin/orders/current/1')}}" class="btn"--}}
{{--                                           style="background-color: #00b1f4; color: #fff">{{__('adminmodule::admin.new')}}</a>--}}
{{--                                        <a href="{{url('admin/orders/current/2')}}" class="btn"--}}
{{--                                           style="background-color: #5247bd; color: #fff">{{__('adminmodule::admin.preparing')}}</a>--}}
{{--                                        <a href="{{url('admin/orders/current/3')}}" class="btn"--}}
{{--                                           style="background-color: #8828e1; color: #fff">{{__('adminmodule::admin.prepared')}}</a>--}}
{{--                                        <a href="{{url('admin/orders/current/4')}}" class="btn"--}}
{{--                                           style="background-color: #f8538d; color: #fff">{{__('adminmodule::admin.charging')}}</a>--}}
{{--                                        <a href="{{url('admin/orders/current/5')}}" class="btn"--}}
{{--                                           style="background-color: #1a73e9; color: #fff">{{__('adminmodule::admin.charged')}}</a>--}}
{{--                                    @endif--}}
{{--                                </div>--}}
                            </div>

                        </div>
                        <div class="widget-content widget-content-area">
                            <div class=" mb-4">
                                <table id="ecommerce-product-list"
                                       class="table table-hover  table-bordered text-center">
                                    <thead>
                                    <tr>
                                        <th>{{__('ordermodule::admin.order_id')}}</th>
                                        <th>{{__('ordermodule::admin.user_id')}}</th>
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
                                            <td>{{($order->user->first_name)?$order->user['first_name'] .' '. $order->user['last_name']: $order->user->company_name}} </td>
                                            <td>{{($order->user)?$order->user['phone']:''}}</td>
                                            <td>{{__('ordermodule::payment.'.$order->payment_type)}}</td>
                                            <?php $tot = $order->sub_total / (1+($order->tax_percentage/100))?>
                                            <?php $end_tot = ((((($tot - $order->discount) + $order->untaxed_shipping) * $order->tax_percentage) / 100) + (($tot - $order->discount) + $order->untaxed_shipping))  ?>
                                            <td>{{$end_tot}} {{$order->order_currency}}</td>
                                            <td>{{$order->created_at}}</td>


                                            <td class="align-center">
                                                <ul class="table-controls">
                                                    @can('delete_order')
                                                        <li>
                                                            <form class="inline"
                                                                  action="{{url('admin/restore-orders/' . $order->id)}}"
                                                                  method="POST">
                                                                {{ method_field('PUT') }}
                                                                {!! csrf_field() !!}
                                                                <button class="btn btn-danger p-0" title="Restore"
                                                                        type="submit"
                                                                        onclick="return confirm('هل انت متأكد من عملية استرجاع الطلب')"
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




@stop

@section('js')
    @include('commonmodule::includes.swal')
    <script src="{{ asset('assets/admin/plugins/table/datatable/datatables.js')}}"></script>
    <script>
        $('#ecommerce-product-list').DataTable({
            "lengthMenu": [100, 50, 20, 10],
            "order": [[0, "desc"]],
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
