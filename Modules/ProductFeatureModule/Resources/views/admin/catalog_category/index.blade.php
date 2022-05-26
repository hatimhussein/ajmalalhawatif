@extends('commonmodule::layouts.master')

@section('title')
    {{__('commonmodule::sidebar.catalog_category')}}
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
                    <h3>{{__('commonmodule::sidebar.catalog_category')}}</h3>
                    <div class="crumbs">
                        <ul id="breadcrumbs" class="breadcrumb">
                            <li><a href="{{url('/admin')}}"><i class="flaticon-home-fill"></i></a></li>
                            <li><a href="#">{{__('commonmodule::sidebar.catalog_category')}}</a></li>
                        </ul>
                    </div>
                </div>

                @can('add_catalog_category')
                    <div class="page-title" style="float:right">
                        <a href="{{url('admin/catalog_category/create')}}"
                           class="mt-4 btn btn-button-16"> {{__('productmodule::category.add_new_category')}} </a>

                    </div>
                @endcan

            </div>

            <div class="row" id="cancel-row">

                <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                    <div class="statbox widget box box-shadow">
                        <div class="widget-header">
                            <div class="row">
                                <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                    <h4>{{__('commonmodule::sidebar.catalog_category')}}</h4>
                                </div>
                            </div>

                        </div>
                        <div class="widget-content widget-content-area">
                            <div class="table-responsive mb-4">
                                <table id="zero-config" class="table table-hover table-bordered" style="width:100%">
                                    <thead>
                                    <tr class="text-center">
                                        <th>#</th>
                                        <th>{{__('productmodule::category.name_ar')}}</th>
                                        <th>{{__('productmodule::category.name_en')}}</th>
                                        <th>{{__('productmodule::category.photo')}}</th>
                                        <th>{{__('productmodule::category.category')}}</th>
                                        <th>{{__('productmodule::category.action')}}</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($categories as $category)
                                        <tr class="text-center">
                                            <td class="text-primary">{{$loop->iteration}}</td>

                                            <td>{{$category->name_ar}}</td>
                                            <td>{{$category->name_en}}</td>
                                            <td class="text-center ">
                                                <div class="product-list-img">
                                                    <img alt="category"
                                                         src="{{asset('images/catalog_category/'.$category->image)}}">
                                                </div>
                                            </td>
                                            <td>{{($category->parent)? \LanguageHelper::nameTranslate($category->parent):'-'}}</td>
                                            <td>
                                                <ul class="table-controls">

                                                <!-- <li><a  href="{{url('admin/category/'.$category->id)}}" data-toggle="tooltip" data-placement="top" title="Show"><i class="flaticon-view  bg-info p-1 text-white mb-1"></i></a></li> -->

                                                    @can('update_catalog_category')
                                                        <li><a href="{{url('admin/catalog_category/'.$category->id.'/edit')}}"
                                                               data-toggle="tooltip" data-placement="top"
                                                               title="Edit"><i
                                                                    class="flaticon-edit  bg-success p-1 text-white"></i></a>
                                                        </li>
                                                    @endcan
                                                    @can('delete_catalog_category')

                                                        <li>
                                                            <form class="inline"
                                                                  action="{{url('admin/catalog_category/' . $category->id)}}"
                                                                  method="POST">
                                                                {{ method_field('DELETE') }} {!! csrf_field() !!}
                                                                <button class="unst" title="Delete" type="submit"
                                                                        onclick="return confirm('{{__("productfeaturemodule::admin.catalog_category_delete")}}')"
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


