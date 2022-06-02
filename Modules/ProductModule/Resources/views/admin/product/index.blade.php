@extends('commonmodule::layouts.master')

@section('title')
    {{__('productmodule::admin.products')}}
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
                    <h3>{{__('productmodule::admin.products')}}</h3>
                    <div class="crumbs">
                        <ul id="breadcrumbs" class="breadcrumb">
                            <li><a href="{{url('/admin')}}"><i class="flaticon-home-fill"></i></a></li>
                            <li class="active"><a href="#">{{__('productmodule::admin.products')}}</a></li>
                        </ul>
                    </div>
                </div>

                <div class="page-title" style="float:right">
                    <a href="{{url('admin/product/create')}}"
                       class="mt-4 btn btn-button-16 mr-2"> {{__('productmodule::admin.add_new_product')}}  </a>

                    <a class="mt-4 btn btn-button-16 mr-2"
                       href="{{url('admin/downloadproducts')}}"> {{__('productmodule::admin.download')}}  </a>
                    <a data-target="#uploadModal" data-toggle="modal"
{{--                       class="mt-4 btn btn-button-16 mr-2"> {{__('productmodule::admin.upload')}}  </a>--}}
                       class="mt-4 btn btn-button-16 mr-2"> استيراد / تحديث  </a>
                </div>


            </div>


            <div class="row margin-bottom-120">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="statbox widget box box-shadow">
                        <div class="widget-header">
                            <div class="row">
                                <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                    <h4>{{__('productmodule::admin.products')}} </h4>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <form class="bulk-form" action="{{ route('product.bulk') }}" method="post">
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
                            <div class="mb-4">
                                <table id="ecommerce-product-list"
                                       class="table table-hover  table-bordered text-center">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th><input type="checkbox" class="table-select-all"></th>
                                        <th>{{__('productmodule::admin.product_item_number')}}</th>
                                        <th>{{__('productmodule::admin.product_code')}}</th>
                                        <th>{{__('productmodule::admin.photo')}}</th>
                                        <th>{{__('productmodule::admin.name_ar')}}</th>
                                        <th>{{__('productmodule::admin.name_en')}}</th>
                                        <th>{{__('productmodule::admin.type')}}</th>
                                        <th>{{__('productmodule::admin.quantity')}}</th>
                                        <th>{{__('productmodule::admin.category')}}</th>
                                        <th class="align-center">{{__('productmodule::admin.status')}}</th>
                                        <th class="align-center">{{__('productmodule::admin.action')}}</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($products as $product)
                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td>
                                                <input type="checkbox" class="table-select"
                                                       name="ids[]" value="{{$product->id}}">
                                            </td>
                                            <td>{{$product->item_number}}</td>
                                            <td>{{$product->product_code}}</td>
                                            <td class="text-center">
                                                <a class="product-list-img" href="javascript: void(0);"><img
                                                        src="{{asset('images/product/'.$product->product_photo)}}"
                                                        alt="product"></a></td>
                                            <td>{{$product->name_ar}}</td>
                                            <td>{{$product->name_en}}</td>
                                            <td>{{$product->type}}</td>
                                            <td>
                                                @if($product->type == 'simple')
                                                    <input type="number"
                                                           onchange='changeQuantity(this, {{$product->id}}, value)'
                                                           class="product_quantity_inp form-control form-control-rounded"
                                                           value="{{$product->product_quantity}}">
                                                @else
                                                    -
                                                @endif
                                            </td>
                                            <td>{{($product->category!=null)?$product->category->name_ar:'-'}}</td>

                                            <td class="text-center">
                                                @if($product->status==1)
                                                    <span
                                                        class="badge badge-success">{{__('productmodule::admin.active')}}</span>
                                                @else
                                                    <span
                                                        class="badge badge-danger">{{__('productmodule::admin.unactive')}}</span>
                                                @endif
                                            </td>


                                        <!-- <td class="text-center">

                                            <i class="{{($product->status==1)?'flaticon-cart-bag-1':'flaticon-cart-bag'}}"></i>

                                           </td> -->
                                            <td class="align-center">
                                                <ul class="table-controls">
                                                    <li>
                                                        <a href="{{url('admin/product/'.$product->id.'/edit')}}"
                                                           data-toggle="tooltip" data-placement="top" title="Edit">
                                                            <i class="flaticon-edit bg-success p-1 text-white"></i>
                                                        </a>
                                                    </li>
                                                    @can('delete_product')

                                                        <li>
                                                            <form class="inline"
                                                                  action="{{url('admin/product/' . $product->id)}}"
                                                                  method="POST">
                                                                {{ method_field('DELETE') }} {!! csrf_field() !!}
                                                                <button class="unst" title="Delete" type="submit"
                                                                        onclick="return confirm('{{__("productmodule::product.delete_product")}}')"
                                                                        type="button"
                                                                >
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
                <form method="post" action="{{url('admin/uploadproducts')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="row">

                            <input type="file" name="products" class="col-lg-6" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">{{__('productmodule::admin.upload')}}</button>
                    </div>
                </form>

            </div>
        </div>
    </div>


@stop

@section('js')
    @include('commonmodule::includes.swal')
    <script src="{{ asset('assets/admin/plugins/table/datatable/datatables.js')}}"></script>
    <script>
        let dTable = $('#ecommerce-product-list').DataTable({
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
    <script>
        function changeQuantity(that, id, product_quantity) {
            $(that).prop('disabled', true);
            let _token = "{{ csrf_token() }}";
            let r_type = "MainData";
            $.ajax({
                type: "POST",
                url: `{{url('admin/update-product')}}`,
                data: {r_type, id, product_quantity, _token},
                statusCode: {
                    200: function (response) {
                        $(that).prop('disabled', false);
                    },
                    422: function (response) {
                        $(that).val('0');
                        $(that).prop('disabled', false);
                    }
                }
            });
        }
    </script>
    <!--  END CUSTOM SCRIPT FILES  -->
@endsection
