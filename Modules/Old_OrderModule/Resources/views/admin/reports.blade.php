@extends('commonmodule::layouts.master')

@section('title')
    {{$title}}
@endsection

@section('css')
<link rel="stylesheet" href="{{ asset('assets/admin/plugins/table/datatable/datatables.css')}}" type="text/css" >
<link rel="stylesheet" href="{{ asset('assets/admin/css/ecommerce/product.css')}}" type="text/css" >
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
  @foreach($all_status as $key)
  @if($key->id == 6)
<a href="{{url('admin/orders/report_done')}}"class="btn" style="background-color: #f8538d; color: #fff">{{$key->title}}</a>
  @elseif($key->id == 7)
 <a href="{{url('admin/orders/report_cancel')}}" class="btn" style="background-color: #1a73e9; color: #fff">{{$key->title}}</a>
  @else
 <a href="{{url('admin/orders/report/'.$key->id.'')}}" class="btn" style="background-color: #5247bd; color: #fff">{{$key->title}}</a>
  @endif
  @endforeach
<!-- <a href="{{url('admin/orders/report/1')}}" class="btn" style="background-color: #00b1f4; color: #fff">{{__('adminmodule::admin.new')}}</a>
<a href="{{url('admin/orders/report/2')}}" class="btn" style="background-color: #5247bd; color: #fff">{{__('adminmodule::admin.preparing')}}</a>
<a href="{{url('admin/orders/report/3')}}" class="btn" style="background-color: #8828e1; color: #fff">{{__('adminmodule::admin.prepared')}}</a>
<a href="{{url('admin/orders/report/4')}}" class="btn" style="background-color: #f8538d; color: #fff">{{__('adminmodule::admin.charging')}}</a>
<a href="{{url('admin/orders/report/5')}}" class="btn" style="background-color: #1a73e9; color: #fff">{{__('adminmodule::admin.charged')}}</a>
<a href="{{url('admin/orders/report_done')}}" class="btn" style="background-color: #1a73e9; color: #fff">{{__('adminmodule::admin.done')}}</a>
<a href="{{url('admin/orders/report_cancel')}}" class="btn" style="background-color: #1a73e9; color: #fff">{{__('adminmodule::admin.canceled')}}</a> -->
</div>
                            <br><br><hr>
                               <div class="col-xl-12 col-md-12 col-sm-12 col-12">

                                        <form action="{{url('admin/orders/report/search/'.$status_id)}}" method="POST" class="ws-validate">
                                            @csrf
                                              <div class="row">

            <div class="col-lg-4">
                <div class="">
                    <h4 class="" for="mainPrice">{{__('ordermodule::admin.date_from')}}</h4>
                  
                   <input type="hidden" name="status_id" value="{{$status_id}}">
                                        <input type="date" name="date_from" id="date-from" placeholder="from" class="form-control " required/> 

                </div>

            </div>
              <div class="col-lg-4">
                <div class="">
                    <h4 class="" for="mainPrice">{{__('ordermodule::admin.date_to')}}</h4>
                     
                   <input type="date" name="date_to" id="date-to" placeholder="to" class="form-control" required/> 

                </div>

            </div>
                <div class="col-lg-4">
                <div class="">
               <h4></h4>
                      <input type="submit" class="mt-4 btn btn-button-16" value="{{__('ordermodule::admin.search')}}" />

                </div>

            </div>
          </div>


                                        </form>
                                    
                                    </div>
                        </div>
                    </div>
                    <div class="widget-content widget-content-area">
                        <div class=" mb-4">
                            <table id="ecommerce-product-list" class="table table-hover  table-bordered text-center">
                                <thead>
                                    <tr>
                                        <th>{{__('ordermodule::admin.order_id')}}</th>
                                        <th>{{__('ordermodule::admin.user_id')}}</th>
                                        <th>{{__('ordermodule::admin.mobile')}}</th>
                                        <th>{{__('ordermodule::admin.total')}}</th>
                                        <th>{{__('ordermodule::admin.date')}}</th>
                                        <th class="align-center">{{__('ordermodule::admin.action')}}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                  @foreach($orders as $order)
                                    <tr>
                                          <td class="{{ $order->send_gift ? 'gift' : '' }}">{{$order->id}}</td>
                                          <td>{{($order->user)?$order->user['first_name'] .' '. $order->user['last_name']:''}} </td>
                                          <td>{{($order->user)?$order->user['phone']:''}}</td>
                                          <td>{{$order->total}} {{$order->order_currency}}</td>
                                          <td>{{$order->created_at}}</td>


                                          <td class="align-center">
                                              <ul class="table-controls">
                                                @can('order_details')
                                                  <li>
                                                      <a class="btn btn-info p-0" href="{{url('admin/order/'.$order->id.'')}}" data-toggle="tooltip" data-placement="top" title="Details">
                                                          <i class="flaticon-view bg-info p-1 text-white br-6 mb-1"></i>
                                                      </a>
                                                  </li>
                                                  @endcan

                                                  @can('invoice_print')
                                                    <li>
                                                        <a class="btn btn-danger p-0" href="{{url('admin/order/invoice/'.$order->id.'')}}" target="_blank" data-toggle="tooltip" data-placement="top" title="Print">
                                                            <i class="flaticon-print bg-danger p-1 text-white br-6 mb-1"></i>
                                                        </a>
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
  <script src="{{ asset('assets/admin/plugins/table/datatable/button-ext/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('assets/admin/plugins/table/datatable/button-ext/jszip.min.js') }}"></script>
    <script src="{{ asset('assets/admin/plugins/table/datatable/button-ext/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('assets/admin/plugins/table/datatable/button-ext/buttons.print.min.js') }}"></script>
<!-- <script  src="{{ asset('assets/admin/plugins/table/datatable/datatables.js')}}" ></script> -->
<script>

      $('#ecommerce-product-list').DataTable({
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
            ]
        });

        $(document).ready(function () {
            $(".dt-button.buttons-html5").addClass('btn btn-info');
        })
</script>
<!--  END CUSTOM SCRIPT FILES  -->
@endsection
