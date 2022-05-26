@extends('commonmodule::layouts.master')

@section('title')
    {{__('productmodule::category.categories')}}
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
                    <h3>{{__('productmodule::category.categories')}}</h3>
                    <div class="crumbs">
                        <ul id="breadcrumbs" class="breadcrumb">
                            <li><a href="{{url('/admin')}}"><i class="flaticon-home-fill"></i></a></li>
                            <li><a href="#">{{__('productmodule::category.categories')}}</a></li>
                        </ul>
                    </div>
                </div>

                @can('add_category')
                    <div class="page-title" style="float:right">
                        <a href="{{url('admin/category/create')}}"
                           class="mt-4 btn btn-button-16"> {{__('productmodule::category.add_new_category')}} </a>
                        <a class="mt-4 btn btn-button-16 mr-2"
                           href="{{url('admin/downloadcategory')}}"> {{__('productmodule::category.download')}}  </a>
                        <a data-target="#uploadModal" data-toggle="modal"
                           class="mt-4 btn btn-button-16 mr-2"> {{__('productmodule::category.upload')}}  </a>
                    </div>
                @endcan

            </div>

            <div class="row" id="cancel-row">

                <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                    <div class="statbox widget box box-shadow">
                        <div class="widget-header">
                            <div class="row">
                                <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                    <h4>{{__('productmodule::category.categories')}}</h4>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <form class="bulk-form" action="{{ route('category.bulk') }}" method="post">
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
                                <table id="zero-config" class="table table-hover table-bordered" style="width:100%">
                                    <thead>
                                    <tr class="text-center">
                                        <th>#</th>
                                        <th><input type="checkbox" class="table-select-all"></th>
                                        <th>{{__('productmodule::category.name_ar')}}</th>
                                        <th>{{__('productmodule::category.name_en')}}</th>
                                        <th>{{__('productmodule::category.photo')}}</th>
                                        <th>{{__('productmodule::category.status')}}</th>
                                        <th>{{__('productmodule::category.sort_order')}}</th>
                                        <th>{{__('productmodule::category.category')}}</th>
                                        <th>{{__('productmodule::category.in_home')}}</th>
                                        <th>{{__('productmodule::category.action')}}</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($categories as $category)
                                        <tr class="text-center">
                                            <td class="text-primary">{{$loop->iteration}}</td>
                                            <td>
                                                <input type="checkbox" class="table-select"
                                                       name="ids[]" value="{{$category->id}}">
                                            </td>
                                            <td>{{$category->name_ar}}</td>
                                            <td>{{$category->name_en}}</td>
                                            <td class="text-center ">
                                                <div class="product-list-img">
                                                    <img alt="category"
                                                         src="{{asset('images/category/'.$category->photo)}}">
                                                </div>
                                            </td>

                                            <td>
                                                @if($category->status==1)
                                                    <span
                                                        class="badge badge-success">{{__('productmodule::category.active')}}</span>
                                                @else
                                                    <span
                                                        class="badge badge-danger">{{__('productmodule::category.unactive')}}</span>
                                                @endif
                                            </td>

                                            <td>{{$category->sort_order}}</td>
                                            <td>{{($category->parent['name_ar']) ?? '-'}}</td>
                                            <td>
                                                <label><input class="selected_category"
                                                              data-status="{{$category->in_home_page}}"
                                                              {{($category->in_home_page==1)?'checked':''}} type="checkbox"
                                                              name="in_home_page" value="{{$category->id}}"></label>
                                            </td>


                                            <td>
                                                <ul class="table-controls">

                                                <!-- <li><a  href="{{url('admin/category/'.$category->id)}}" data-toggle="tooltip" data-placement="top" title="Show"><i class="flaticon-view  bg-info p-1 text-white mb-1"></i></a></li> -->

                                                    @can('update_category')
                                                        <li><a href="{{url('admin/category/'.$category->id.'/edit')}}"
                                                               data-toggle="tooltip" data-placement="top"
                                                               title="Edit"><i
                                                                    class="flaticon-edit  bg-success p-1 text-white"></i></a>
                                                        </li>
                                                    @endcan
                                                    @can('delete_category')

                                                        <li>
                                                            <form class="inline"
                                                                  action="{{url('admin/category/' . $category->id)}}"
                                                                  method="POST">
                                                                {{ method_field('DELETE') }} {!! csrf_field() !!}
                                                                <button class="unst" title="Delete" type="submit"
                                                                        onclick="return confirm('{{__("productmodule::category.delete_category")}}')"
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
                    <h5 class="modal-title" id="exampleModalLabel">{{__('productmodule::category.upload')}}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="post" action="{{url('admin/uploadcategory')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="row">

                            <input type="file" name="category" class="col-lg-6" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">{{__('productmodule::category.upload')}}</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
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


    <script type="text/javascript">
        $(".selected_category").on('click', function () {
            var id = $(this).val();
            var status = $(this).prop('checked');


            token = '{{csrf_token()}}';
            $.ajax({
                'type': 'POST',
                'url': '{{ url("admin/save-selected-category") }}',
                data: {'id': id, 'status': status, '_token': token},
                'statusCode': {
                    200: function (response) {

                        alert(response.message);

                    },
                    422: function (response) {
                        toastr["error"]('حدث خطأ ما');

                    }
                },
            });
        });

    </script>


@endsection


