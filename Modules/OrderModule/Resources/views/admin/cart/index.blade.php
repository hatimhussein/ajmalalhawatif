@extends('commonmodule::layouts.master')

@section('title')
    {{__('ordermodule::admin.abandoned_carts')}}
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
                    <h3>{{__('ordermodule::admin.abandoned_carts')}}</h3>
                    <div class="crumbs">
                        <ul id="breadcrumbs" class="breadcrumb">
                            <li><a href="{{url('/admin')}}"><i class="flaticon-home-fill"></i></a></li>
                            <li class="active"><a href="#">{{__('ordermodule::admin.abandoned_carts')}}</a></li>
                        </ul>
                    </div>
                </div>

            </div>
            <div class="row margin-bottom-120">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="statbox widget box box-shadow">
                        <div class="widget-header">
                            <div class="row">
                                <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                    <h4>{{__('ordermodule::admin.abandoned_carts')}} </h4>
                                </div>
                            </div>
                        </div>
                        <div class="widget-content widget-content-area">
                            <div class=" mb-4">
                                <table id="ecommerce-product-list"
                                       class="table  table-bordered table-hover text-center">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>{{__('usermodule::admin.name')}}</th>
                                        <th>{{__('usermodule::admin.date')}}</th>
                                        <th>{{__('ordermodule::admin.products')}}</th>
                                        <th>{{__('ordermodule::admin.price')}}</th>
                                        <th>{{__('ordermodule::admin.action')}}</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($carts as $cart)
                                        @php($user = $cart['user'])
                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td>{{ $user->is_merchant ? $user->company_name : $user->first_name.' '.$user->last_name  }}</td>
                                            <td><span>{{ $cart['updated_at']}}</span><br> <span>{{ $cart['updated_at']->diffForHumans() }}</span></td>
                                            <td>{{ $cart['count'] }}</td>
                                            <td>{{ $cart['total_price'] }}</td>
                                            <td>
                                                <ul class="table-controls">
                                                    <li>
                                                        <a href="{{url('admin/abandoned-cart/'.$user->id.'/edit')}}"
                                                           data-toggle="tooltip" data-placement="top"
                                                           title="Offer">
                                                            <i class="flaticon-credit-card-1  bg-info p-1 text-white br-6 mb-1"></i>
                                                        </a>
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




@stop

@section('js')
    @include('commonmodule::includes.swal')
    <script src="{{ asset('assets/admin/plugins/table/datatable/datatables.js')}}"></script>
    <script>
        $('#ecommerce-product-list').DataTable({
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
            }
        });
    </script>
    <!--  END CUSTOM SCRIPT FILES  -->
@endsection
