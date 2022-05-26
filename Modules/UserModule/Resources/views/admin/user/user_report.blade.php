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
                        <ul id="breadcrumbs" class="breadcrumb">
                            <li><a href="{{url('/admin')}}"><i class="flaticon-home-fill"></i></a></li>
                            <li class="active"><a href="#">{{$title}}</a></li>
                        </ul>
                    </div>
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
</div>


<div class="widget-content widget-content-area">
<div class=" mb-4">
<table id="zero-config" class="table table-hover table-bordered" style="width:100%">
<thead>
<tr>
<th>#</th>
<th>{{__('usermodule::admin.name')}}</th>
<th> {{__('usermodule::admin.email')}}</th>
<th>{{__('usermodule::admin.phone')}}</th>
<th>{{__('usermodule::admin.log')}}</th>
<th>{{__('usermodule::admin.last_login')}} </th>
<th>{{__('usermodule::admin.Orders')}} </th>
<th>{{__('usermodule::admin.wishlist')}}</th>
</tr>
</thead>
<tbody>
@foreach($users as $value)
@php 

@endphp
  <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td class="text-primary">{{$value->user->first_name}} {{$value->user->last_name}}</td>
                                            <td>{{$value->user->email}}</td>
                                            <td>{{$value->user->phone}}</td>
                                            <td>{{$value->count}}</td>
                                       
                                            <td>{{$value->created_at}}</td>
                                            @if(count($value->user->orders->where('created_at','>=',\Carbon\Carbon::today())))
                                              <td><a >{{count($value->user->orders->where('created_at','>=',\Carbon\Carbon::today()))}}</a></td>
                                            @else
                                              <td><a href="#">ـــــــــ</a></td>
                                            @endif
                                   @if(count($value->user->wishlist->where('created_at','>=',\Carbon\Carbon::today())))
                                              <td><a href="{{url('admin/wishlist/'.$value->user_id)}}">{{count($value->user->wishlist->where('created_at','>=',\Carbon\Carbon::today()))}}</a></td>
                                            @else
                                              <td><a href="#">ـــــــــ</a></td>
                                            @endif
                                          

                                            

                                   
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
            ]
        });

        $(document).ready(function () {
            $(".dt-button.buttons-html5").addClass('btn btn-info');
        })
</script>
<!--  END CUSTOM SCRIPT FILES  -->
@endsection



