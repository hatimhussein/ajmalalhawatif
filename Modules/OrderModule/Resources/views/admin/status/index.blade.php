@extends('commonmodule::layouts.master')

@section('title')
    {{__('ordermodule::admin.statuses')}}
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
              @can('add_status')
                  <div class="page-title" style="float:right">
                      <a href="{{url('admin/status/create')}}" class="mt-4 btn btn-button-16"> {{__('ordermodule::admin.add_new_status')}}  </a>
                  </div>
              @endcan



        </div>


        <div class="row margin-bottom-120">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="statbox widget box box-shadow">
                    <div class="widget-header">
                        <div class="row">
                            <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                <h4>{{__('ordermodule::admin.statuses')}} </h4>
                            </div>
                        </div>
                    </div>
                    <div class="widget-content widget-content-area">
                        <div class=" mb-4">
                            <table id="ecommerce-product-list" class="table  table-bordered table-hover text-center">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>{{__('ordermodule::admin.status')}}</th>
                                        <th>{{__('ordermodule::admin.status_type')}}</th>
                                        <th>{{__('ordermodule::admin.action')}}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                  @foreach($statuses as $status)
                                    <tr>
                                          <td>{{$status->id}}</td>
                                          <td>{{$status->title }}</td>
                                          <td>{{$status->status_type->type }}</td>
                                          <td>
                                            @if($status->status_type->id == 1)
                                            <ul class="table-controls">

                                                @can('update_status')
                                                <li>
                                                  <a  href="{{url('admin/status/'.$status->id.'/edit')}}" data-toggle="tooltip" data-placement="top" title="Edit"><i class="flaticon-edit  bg-success p-1 text-white br-6 mb-1"></i></a>
                                                </li>

                                                @endcan

                                                @can('delete_status')

                                                <li>
                                                  <form class="inline" action="{{url('admin/status/' . $status->id)}}" method="POST">
                                                    {{ method_field('DELETE') }} {!! csrf_field() !!}
                                                    <button class="unst" title="Delete" type="submit" onclick="return confirm('{{__('ordermodule::admin.delete_status')}}')" type="button"
                                                      ><i class="flaticon-delete  bg-danger p-1 text-white"></i></button>
                                                  </form>
                                                </li>
                                                @endcan

                                              </ul>
                                            @endif
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
<script  src="{{ asset('assets/admin/plugins/table/datatable/datatables.js')}}" ></script>
<script>
    $('#ecommerce-product-list').DataTable({
        "lengthMenu": [ 100, 50, 20, 10 ],
        "language": { "paginate": { "previous": "<i class='flaticon-arrow-left-1'></i>", "next": "<i class='flaticon-arrow-right'></i>" },
            "info": "Showing page _PAGE_ of _PAGES_"
        },
        drawCallback: function( settings ) { $('[data-toggle="tooltip"]').tooltip(); }
    });
</script>
<!--  END CUSTOM SCRIPT FILES  -->
@endsection
