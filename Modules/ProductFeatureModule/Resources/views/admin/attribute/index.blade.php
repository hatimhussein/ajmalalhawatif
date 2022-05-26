@extends('commonmodule::layouts.master')

@section('title')
    {{__('productfeaturemodule::admin.attributes')}}
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
                    <h3>{{__('productfeaturemodule::admin.attributes')}}</h3>
                    <div class="crumbs">
                        <ul id="breadcrumbs" class="breadcrumb">
                            <li><a href="{{url('/admin')}}"><i class="flaticon-home-fill"></i></a></li>
                            <li><a href="#">{{__('productfeaturemodule::admin.attributes')}}</a></li>
                        </ul>
                    </div>
                </div>

                @can('add_attribute')
                    <div class="page-title" style="float:right">
                        <button type="button" class="mt-4 btn btn-button-16" data-toggle="modal"
                                data-target="#exampleModalCenter1">
                            {{__('productfeaturemodule::admin.add_new_attribute')}}
                        </button>
                    </div>
                @endcan


            </div>

            <div class="row" id="cancel-row">

                <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                    <div class="statbox widget box box-shadow">
                        <div class="widget-header">
                            <div class="row">
                                <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                    <h4>{{__('productfeaturemodule::admin.attributes')}}</h4>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <form class="bulk-form" action="{{ route('attribute.bulk') }}" method="post">
                                        @csrf
                                        <input type="hidden" name="method" value="">
                                        <input type="hidden" name="ids" value="">
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
                                        <th>{{__('productfeaturemodule::admin.name_ar')}}</th>
                                        <th>{{__('productfeaturemodule::admin.name_en')}}</th>
                                        <th>{{__('productfeaturemodule::admin.action')}}</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($attributes as $attribute)
                                        <tr class="text-center">
                                            <td class="text-primary">{{$loop->iteration}}</td>
                                            <td>
                                                <input type="checkbox" class="table-select"
                                                       name="ids[]" value="{{$attribute->id}}">
                                            </td>
                                            <td>{{$attribute->name_ar}}</td>
                                            <td>{{$attribute->name_en}}</td>


                                            <td>
                                                <ul class="table-controls">


                                                    @can('update_attribute')
                                                        <li>
                                                            <button type="button" class="mod btn btn-success p-0"
                                                                    data-toggle="modal"
                                                                    data-name_ar="{{$attribute->name_ar}}"
                                                                    data-name_en="{{$attribute->name_en}}"
                                                                    data-id="{{$attribute->id}}"
                                                                    data-target="#exampleModalCenter">
                                                                <i class="flaticon-edit  bg-success p-1 text-white br-6 mb-1"></i>
                                                            </button>
                                                        </li>
                                                    @endcan

                                                    @can('delete_attribute')
                                                        <li>
                                                            <form class="inline"
                                                                  action="{{url('admin/attribute/' . $attribute->id)}}"
                                                                  method="POST">
                                                                {{ method_field('DELETE') }} {!! csrf_field() !!}
                                                                <button class="btn btn-danger p-0" title="Delete"
                                                                        type="submit"
                                                                        onclick="return confirm('{{__('productfeaturemodule::admin.delete_attr')}}')"
                                                                        type="button"
                                                                >
                                                                    <i class="flaticon-delete  bg-danger p-1 text-white br-6 mb-1"></i>
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


    <!-- Modal -->
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
         aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content ">
                <div class="modal-header ">
                    <h5 class="modal-title "
                        id="exampleModalCenterTitle">{{__('productfeaturemodule::admin.attributes')}}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="col-xl-12 pt-3">
                        <form id="form" action="{{url('admin/attribute')}}" method="POST" class="needs-validation">
                            @csrf
                            <input type="hidden" id="attribute_id" name="attribute_id">

                            <div class="form-group">
                                <input type="text" id="name_ar" name="name_ar"
                                       placeholder="{{__('productfeaturemodule::admin.name_ar')}}"
                                       id="validationCustom01" class="   form-control" required>
                            </div>
                            <div class="form-group">
                                <input type="text" id="name_en" name="name_en"
                                       placeholder="{{__('productfeaturemodule::admin.name_en')}}"
                                       id="validationCustom01" class="   form-control " required>
                            </div>

                            <div class="form-group text-center">
                                <button type="submit" class="mt-4 btn btn-button-7 btn-rounded ">
                                    {{__('productfeaturemodule::admin.save')}}
                                </button>
                            </div>
                        </form>

                    </div>


                </div>
            </div>
        </div>
    </div>



    <div class="modal fade" id="exampleModalCenter1" tabindex="-1" role="dialog"
         aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content ">
                <div class="modal-header ">
                    <h5 class="modal-title "
                        id="exampleModalCenterTitle">{{__('productfeaturemodule::admin.attributes')}}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="col-xl-12 pt-3">
                        <form id="form" action="{{url('admin/attribute')}}" method="POST" class="needs-validation">
                            @csrf

                            <div class="form-group">
                                <input type="text" id="name_ar" name="name_ar"
                                       placeholder="{{__('productfeaturemodule::admin.name_ar')}}"
                                       id="validationCustom01" class="   form-control" required>
                            </div>
                            <div class="form-group">
                                <input type="text" id="name_en" name="name_en"
                                       placeholder="{{__('productfeaturemodule::admin.name_en')}}"
                                       id="validationCustom01" class=" form-control " required>
                            </div>

                            <div class="form-group text-center">
                                <button type="submit" class="mt-4 btn btn-button-7 btn-rounded ">
                                    {{__('productfeaturemodule::admin.save')}}
                                </button>
                            </div>
                        </form>

                    </div>


                </div>
            </div>
        </div>
    </div>


    <!--  END CONTENT PART  -->
@stop

@section('js')
    @include('commonmodule::includes.swal')
    @include('commonmodule::includes.modal')

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


    <script>

        $(document).on("click", ".mod", function () {
            var id = $(this).data('id');
            var name_ar = $(this).data('name_ar');
            var name_en = $(this).data('name_en');

            $("#attribute_id").val(id);
            $("#name_ar").val(name_ar);
            $("#name_en").val(name_en);
        });


    </script>


@endsection
