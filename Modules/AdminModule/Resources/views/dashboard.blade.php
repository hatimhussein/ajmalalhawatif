@extends('commonmodule::layouts.master')

@section('title')
    {{__('adminmodule::admin.home')}}
@endsection

@section('content')

    <!--  BEGIN CONTENT PART  -->
    <div id="content" class="main-content">
        <div class="container">
            <br>
            <div class="row layout-spacing ">
                <div class="col-xl-3 mb-xl-0 col-lg-6 mb-4 col-md-6 col-sm-6">
                    <div class="widget-content-area  data-widgets br-4">
                        <div class="widget  t-sales-widget">
                            <div class="media">
                                <div class="icon ml-2">
                                    <i class="flaticon-line-chart"></i>
                                </div>
                                <div class="media-body text-right">
                                    <p class="widget-text mb-0">{{__('adminmodule::admin.sales')}}</p>
                                    @php($total_products=0)
                                    @foreach($sales as $sale)
                                        @php($total_products+=$sale->orderProducts->sum('quantity'))
                                    @endforeach
                                    <p class="widget-numeric-value">{{$total_products}}</p>

                                </div>
                            </div>
                            <!-- <p class="widget-total-stats mt-2">94% New Sales</p> -->
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 mb-xl-0 col-lg-6 mb-4 col-md-6 col-sm-6">
                    <div class="widget-content-area  data-widgets br-4">
                        <div class="widget  t-order-widget">
                            <div class="media">
                                <div class="icon ml-2">
                                    <i class="flaticon-cart-bag"></i>
                                </div>
                                <div class="media-body text-right">
                                    <p class="widget-text mb-0">{{__('adminmodule::admin.orders')}}</p>
                                    <p class="widget-numeric-value">
                                        <span>{{__('adminmodule::admin.merchants')}}: {{$merchant_orders}}</span>
                                        <span>{{__('usermodule::admin.users')}}: {{$client_orders}}</span>
                                    </p>
                                </div>
                            </div>
                            <!-- <p class="widget-total-stats mt-2">552 New Orders</p> -->
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 mb-sm-0 mb-4">
                    <div class="widget-content-area  data-widgets br-4">
                        <div class="widget  t-customer-widget">
                            <div class="media">
                                <div class="icon ml-2">
                                    <i class="flaticon-user-11"></i>
                                </div>
                                <div class="media-body text-right">
                                    <p class="widget-text mb-0">{{__('adminmodule::admin.customers')}}</p>
                                    <p class="widget-numeric-value">
                                        <span>{{__('adminmodule::admin.merchants')}}: {{$merchants}}</span>
                                        <span>{{__('usermodule::admin.users')}}: {{$clients}}</span>
                                    </p>
                                </div>
                            </div>
                            <!-- <p class="widget-total-stats mt-2">390 New Customers</p> -->
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">

                    <div class="widget-content-area  data-widgets br-4">
                        <div class="widget  t-income-widget">
                            <div class="media">
                                <div class="icon ml-2">
                                    <i class="flaticon-money"></i>
                                </div>
                                <div class="media-body text-right">
                                    <p class="widget-text mb-0">{{__('adminmodule::admin.income')}}</p>
                                    @foreach($incomes as $income)
                                        <p class="widget-numeric-value"><span>{{$income->sum}}</span>
                                            <span>{!! LanguageHelper::nameTranslate($income->currency) !!}</span></p>
                                    @endforeach
                                </div>
                            </div>
                            <!-- <p class="widget-total-stats mt-2">$2.1 M This Week</p> -->
                        </div>
                    </div>
                </div>

            </div>

            <div class="row">

                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 layout-spacing">
                    <div class="widget-content widget-content-area br-4 p-0">
                        <div class="widget-card stock-traded">

                            <div class="row">
                                <div class="col-12">
                                    <div class="stock-data-1-1 br-4">
                                        <h6 class="mb-2 s-t-title">{{__('adminmodule::admin.new')}}</h6>
                                        <p class="s-t-total-traded mb-0"><i class="flaticon-profits-1 mx-2"></i>{{$new}}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 layout-spacing">
                    <div class="widget-content widget-content-area br-4 p-0">
                        <div class="widget-card stock-traded">

                            <div class="row">
                                <div class="col-12">
                                    <div class="stock-data-1-2 br-4">
                                        <h6 class="mb-2 s-t-title">{{__('adminmodule::admin.preparing')}}</h6>
                                        <p class="s-t-total-traded mb-0"><i
                                                class="flaticon-profits-1 mx-2"></i>{{$preparing}}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 layout-spacing">
                    <div class="widget-content widget-content-area br-4 p-0">
                        <div class="widget-card stock-traded">

                            <div class="row">
                                <div class="col-12">
                                    <div class="stock-data-1-6 br-4">
                                        <h6 class="mb-2 s-t-title">{{__('adminmodule::admin.prepared')}}</h6>
                                        <p class="s-t-total-traded mb-0"><i
                                                class="flaticon-profits-1 mx-2"></i>{{$prepared}}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 layout-spacing">
                    <div class="widget-content widget-content-area br-4 p-0">
                        <div class="widget-card stock-traded">

                            <div class="row">
                                <div class="col-12">
                                    <div class="stock-data-1-4 br-4">
                                        <h6 class="mb-2 s-t-title">{{__('adminmodule::admin.charging')}}</h6>
                                        <p class="s-t-total-traded mb-0"><i
                                                class="flaticon-profits-1 mx-2"></i>{{$charging}}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 layout-spacing">
                    <div class="widget-content widget-content-area br-4 p-0">
                        <div class="widget-card stock-traded">

                            <div class="row">
                                <div class="col-12">
                                    <div class="stock-data-1-5 br-4">
                                        <h6 class="mb-2 s-t-title">{{__('adminmodule::admin.charged')}}</h6>
                                        <p class="s-t-total-traded mb-0"><i
                                                class="flaticon-profits-1 mx-2"></i>{{$charged}}
                                        </p>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 layout-spacing">
                    <div class="widget-content widget-content-area br-4 p-0">
                        <div class="widget-card stock-traded">

                            <div class="row">
                                <div class="col-12">
                                    <div class="stock-data-1-3 br-4">
                                        <h6 class="mb-2 s-t-title">{{__('adminmodule::admin.done')}}</h6>
                                        <p class="s-t-total-traded mb-0"><i
                                                class="flaticon-profits-1 mx-2"></i>{{$finished}}
                                        </p>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 layout-spacing">
                    <div class="widget-content widget-content-area br-4 p-0">
                        <div class="widget-card stock-traded">

                            <div class="row">
                                <div class="col-12">
                                    <div class="stock-data-1-7 br-4">
                                        <h6 class="mb-2 s-t-title">{{__('adminmodule::admin.canceled')}}</h6>
                                        <p class="s-t-total-traded mb-0"><i
                                                class="flaticon-profits-1 mx-2"></i>{{$cancelled}}
                                        </p>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

            </div>

            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
                    <div class="statbox widget box box-shadow">
                        <div class="widget-header">
                            <div class="row">
                                <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                    <h4>{{__('adminmodule::admin.order_listing')}}</h4>
                                </div>
                            </div>
                        </div>
                        <div class="widget-content widget-content-area">
                            <div class="table-responsive mb-4">
                                <table id="ecommerce-order-list" class="table table-hover table-bordered">
                                    <thead>
                                    <tr>
                                        <th class="checkbox-column">#</th>
                                        <th> {{__('adminmodule::admin.user_name')}}</th>
                                        <th> {{__('adminmodule::admin.mobile')}}</th>
                                        <th> {{__('adminmodule::admin.total')}}</th>
                                        <th> {{__('adminmodule::admin.date')}}</th>
                                        <th class="align-center">{{__('adminmodule::admin.action')}}</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($current_orders as $order)
                                        @if($order->user)
                                            <tr>
                                                <td class="checkbox-column"> {{$order->id}} </td>
                                                <td>{{$order->user['first_name'] .' '. $order->user['last_name']}} </td>
                                                <td>{{$order->user['phone']}}</td>
                                                <td>{{$order->total}} {{$order->order_currency}}</td>
                                                <td>{{$order->created_at}}</td>
                                                <!-- <td class="align-center"><span class="badge badge-success">Approved</span></td> -->
                                                <td class="align-center"><a href="{{url('admin/order/'.$order->id.'')}}"
                                                                            type="button"
                                                                            class="btn btn-default btn-sm"><i
                                                            class="icon-search"></i> {{__('adminmodule::admin.view')}}
                                                    </a></td>
                                            </tr>
                                        @endif
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
@endsection

@section('js')

    <script>
        $('#ecommerce-order-list').DataTable({
            "language": {
                "paginate": {
                    "previous": "<i class='flaticon-arrow-left-1'></i>",
                    "next": "<i class='flaticon-arrow-right'></i>"
                },
                "info": "Showing page _PAGE_ of _PAGES_"
            }
        });
    </script>
@endsection
