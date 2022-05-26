@extends('commonmodule::layouts.master')

@section('title')
    {{__('usermodule::admin.reviews')}}
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
                    <h3>{{__('usermodule::admin.reviews')}}</h3>
                    <div class="crumbs">
                        <ul id="breadcrumbs" class="breadcrumb">
                            <li><a href="{{url('/admin')}}"><i class="flaticon-home-fill"></i></a></li>
                            <li class="active"><a href="#">{{__('usermodule::admin.reviews')}}</a></li>
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
                                    <h4>{{__('usermodule::admin.reviews')}}</h4>
                                </div>
                            </div>
                        </div>
                        <div class="widget-content widget-content-area">
                            <div class=" mb-4">
                                <table id="ecommerce-product-list"
                                       class="table table-hover  table-bordered text-center">
                                    <thead>
                                    <tr>


                                        <th>#</th>
                                        <th>{{__('usermodule::admin.name')}}</th>
                                        <th>{{__('productmodule::admin.product_names')}}</th>
                                        <th>{{__('productmodule::admin.product_code')}}</th>
                                        <th>{{__('usermodule::admin.comment')}}</th>
                                        <th>{{__('usermodule::admin.review')}}</th>
                                        <th>{{__('usermodule::admin.date')}}</th>
                                        <th class="align-center">{{__('usermodule::admin.action')}}</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($reviews as $review)
                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td>{{$review->name}} </td>
                                            <td>{{\Modules\CommonModule\Helper\LanguageHelper::productName($review->product)}} </td>
                                            <td>{{$review->product->product_code??''}} </td>
                                            <td>{{$review->review}}</td>
                                            <td>{{$review->stars}} %</td>
                                            <td>{{$review->created_at}}</td>


                                            <td class="align-center">
                                                <ul class="table-controls">

                                                    <li>
                                                        <button type="button" class="mod btn btn-success p-0"
                                                                data-toggle="modal"
                                                                data-name="{{$review->name}}"
                                                                data-stars="{{$review->stars}}"
                                                                data-review="{{$review->review}}"
                                                                data-created_at="{{$review->created_at}}"
                                                                data-target="#exampleModalCenter">
                                                            <i class="flaticon-view  bg-info p-1 text-white br-6"></i>
                                                        </button>
                                                    </li>

                                                    <li>
                                                        @if($review->is_shown)
                                                            <a href="{{url('admin/change-review-status/status/0/id/'.$review->id)}}"
                                                               class="mod btn btn-success p-0">
                                                                <i class="flaticon-single-tick  bg-success p-1 text-white br-6"></i>
                                                            </a>
                                                        @else
                                                            <a href="{{url('admin/change-review-status/status/1/id/'.$review->id)}}"
                                                               class="mod btn btn-danger p-0">
                                                                <i class="flaticon-circle-cross  bg-danger p-1 text-white br-6"></i>
                                                            </a>
                                                        @endif
                                                    </li>

                                                    <li>
                                                        <a href="{{url('admin/delete-review/id/'.$review->id)}}"
                                                           class="mod btn btn-danger p-0">
                                                            <i class="flaticon-delete   bg-danger p-1 text-white br-6"></i>
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

    <!-- Modal -->
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
         aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content ">
                <div class="modal-header ">
                    <div class="row">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                </div>

                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <span>{{__('usermodule::admin.name')}} :</span>
                            <strong id="name"></strong>
                        </div>
                        <div class="col-md-6">
                            <span>{{__('usermodule::admin.date')}} :</span>
                            <strong id="created_at"></strong>
                        </div>
                        <div class="col-md-6">
                            <span>{{__('usermodule::admin.review')}} :</span>
                            <strong id="stars"></strong>
                        </div>
                    </div>
                    <hr>
                    <div class="col-xl-12" id="review">

                    </div>


                </div>
            </div>
        </div>
    </div>




@stop

@section('js')
    @include('commonmodule::includes.swal')
    @include('commonmodule::includes.modal')

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


    <script>

        $(document).on("click", ".mod", function () {
            var name = $(this).data('name');
            var stars = $(this).data('stars');
            var review = $(this).data('review');
            var created_at = $(this).data('created_at');

            $("#name").text(name);
            $("#stars").text(stars);
            $("#review").text(review);
            $("#created_at").text(created_at);


        });
    </script>


@endsection
