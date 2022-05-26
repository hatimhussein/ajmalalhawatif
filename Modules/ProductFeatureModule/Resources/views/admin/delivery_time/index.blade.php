@extends('commonmodule::layouts.master')

@section('title')
    {{__('productfeaturemodule::admin.deliverytime')}}
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('assets/admin/plugins/table/datatable/custom_dt_zero_config.css')}}"
          type="text/css">

    <link rel="stylesheet" href="{{ asset('assets/admin/plugins/lightbox/photoswipe.css')}}" type="text/css">
    <link rel="stylesheet" href="{{ asset('assets/admin/plugins/lightbox/default-skin/default-skin.css')}}"
          type="text/css">
    <link rel="stylesheet" href="{{ asset('assets/admin/plugins/lightbox/custom-photswipe.css')}}" type="text/css">
@endsection


@section('content')



    <!--  BEGIN CONTENT PART  -->
    <div id="content" class="main-content">
        <div class="container">
            <div class="page-header">
                <div class="page-title">
                    <h3>{{__('productfeaturemodule::admin.deliverytime')}}</h3>
                    <div class="crumbs">
                        <ul id="breadcrumbs" class="breadcrumb">
                            <li><a href="{{url('/admin')}}"><i class="flaticon-home-fill"></i></a></li>
                            <li><a href="#">{{__('productfeaturemodule::admin.deliverytime')}}</a></li>
                        </ul>
                    </div>
                </div>

            <!-- <div class="page-title" style="float:right">
                    <button type="button" class="mt-4 btn btn-button-4" data-toggle="modal"  data-target="#exampleModalCenter">
                      {{__('productfeaturemodule::admin.addNew')}}
                </button>
              </div> -->

                @can('add_deliverytime')
                    <div class="page-title" style="float:right">
                        <a href="{{url('admin/delivery_time/create')}}"
                           class="mt-4 btn btn-button-16"> {{__('productfeaturemodule::admin.add_new_deliverytime')}}  </a>

                    </div>
                @endcan


            </div>

            <div class="row" id="cancel-row">

                <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                    <div class="statbox widget box box-shadow">
                        <div class="widget-header">
                            <div class="row">
                                <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                    <h4>{{__('productfeaturemodule::admin.deliverytime')}}</h4>
                                </div>
                            </div>
                        </div>
                        <div class="widget-content widget-content-area">
                            <div class="table-responsive mb-4">
                                <table id="zero-config" class="table table-hover table-bordered" style="width:100%">
                                    <thead>
                                    <tr class="text-center">
                                        <th>#</th>
                                        <th>{{__('productfeaturemodule::admin.deliverytime_ar')}}</th>
                                        <th>{{__('productfeaturemodule::admin.deliverytime_en')}}</th>
                                        <th>{{__('productmodule::category.sort_order')}}</th>
                                        <th>{{__('productfeaturemodule::admin.action')}}</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($deliveryTimes as $deliveryTime)
                                        <tr class="text-center">
                                            <td class="text-primary">{{$deliveryTime->id}}</td>
                                            <td>{{$deliveryTime->deliverytime_ar}}</td>
                                            <td>{{$deliveryTime->deliverytime_en}}</td>
                                            <td>{{$deliveryTime->sort_order}}</td>


                                            <td>
                                                <ul class="table-controls">

                                                    @can('update_deliverytime')
                                                        <li>
                                                            <a href="{{url('admin/delivery_time/'.$deliveryTime->id.'/edit')}}"
                                                               data-toggle="tooltip" data-placement="top"
                                                               title="Edit"><i
                                                                    class="flaticon-edit  bg-success p-1 text-white"></i></a>
                                                        </li>
                                                    @endcan

                                                    @can('delete_deliverytime')
                                                        <li>
                                                            <form class="inline"
                                                                  action="{{url('admin/delivery_time/' . $deliveryTime->id)}}"
                                                                  method="POST">
                                                                {{ method_field('DELETE') }} {!! csrf_field() !!}
                                                                <button class="unst" title="Delete" type="submit"
                                                                        onclick="return confirm('{{__('productfeaturemodule::admin.deliverytime_delete')}}')"
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


    <!-- Modal -->
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
         aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content ">
                <div class="modal-header ">
                    <h5 class="modal-title "
                        id="exampleModalCenterTitle"> {{__('productfeaturemodule::admin.brands')}} </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="col-xl-12 pt-3">
                        <form id="form" action="{{url('admin/delivery_time')}}" method="POST" class="needs-validation"
                              enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" id="brand_id" name="brand_id">

                            <div class="form-group">
                                <input type="text" id="name_ar" name="name_ar"
                                       placeholder="{{__('productfeaturemodule::admin.name_ar')}}"
                                       id="validationCustom01" class="form-control-rounded form-control text-center"
                                       autocomplete="off" required>
                            </div>
                            <div class="form-group">
                                <input type="text" id="name_en" name="name_en"
                                       placeholder="{{__('productfeaturemodule::admin.name_en')}}"
                                       id="validationCustom01" class="form-control-rounded form-control text-center"
                                       autocomplete="off" required>
                            </div>

                            <div class="form-group">
                                <input type="number" id="sort_order" name="sort_order"
                                       placeholder="{{__('productfeaturemodule::admin.sort_order')}}"
                                       id="validationCustom01" class="form-control-rounded form-control text-center"
                                       autocomplete="off">
                            </div>

                            <div class="form-group">
                                <input type="file" id="photo" name="photo" placeholder="photo" id="validationCustom01"
                                       class="form-control-rounded form-control text-center" required>
                            </div>


                            <div class="form-group text-center">
                                <button type="submit" class="mt-4 btn btn-button-7 btn-rounded ">
                                    {{__('productfeaturemodule::attribute.save')}}
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
        $('#zero-config').DataTable({
            "order": [[0, "desc"]],
            "lengthMenu": [100, 50, 20, 10],
            "language": {
                "paginate": {
                    "previous": "<i class='flaticon-arrow-left-1'></i>",
                    "next": "<i class='flaticon-arrow-right'></i>"
                },
                "info": "Showing page _PAGE_ of _PAGES_"
            }
        });
    </script>


    <script>

        $(document).on("click", ".mod", function () {
            var id = $(this).data('id');
            var name_ar = $(this).data('name_ar');
            var name_en = $(this).data('name_en');
            var sort_order = $(this).data('sort_order');

            $("#brand_id").val(id);
            $("#name_ar").val(name_ar);
            $("#name_en").val(name_en);
            $("#sort_order").val(sort_order);

        });


    </script>


    <script src="{{ asset('assets/admin/plugins/lightbox/photoswipe.min.js')}}"></script>
    <script src="{{ asset('assets/admin/plugins/lightbox/photoswipe-ui-default.min.js')}}"></script>
    <script src="{{ asset('assets/admin/plugins/lightbox/custom-photswipe.js')}}"></script>



@endsection
