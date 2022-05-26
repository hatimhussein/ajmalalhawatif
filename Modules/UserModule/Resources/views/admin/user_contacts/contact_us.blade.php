@extends('commonmodule::layouts.master')

@section('title')
    {{__('usermodule::admin.contactus')}}
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
                    <h3>{{__('usermodule::admin.contactus')}}</h3>
                    <div class="crumbs">
                        <ul id="breadcrumbs" class="breadcrumb">
                            <li><a href="{{url('/admin')}}"><i class="flaticon-home-fill"></i></a></li>
                            <li class="active"><a href="#">{{__('usermodule::admin.contactus')}}</a></li>
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
                                    <h4 class="page-title"
                                        style="display: inline-block;">{{__('usermodule::admin.contactus')}} </h4>
                                    <div style="display: inline-block;padding: 10px;">
                                        <form class="inline" action="{{url('admin/contactus/truncate')}}" method="get">
                                            <button class="btn btn-danger" title="Delete" type="submit"
                                                    onclick="return confirm('{{__("usermodule::admin.delete_contact")}}')"
                                                    type="button"
                                            >{{__('usermodule::admin.delete_all')}}</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="widget-content widget-content-area">
                            <div class="mb-4">
                                <table id="ecommerce-product-list" class="table table-hover table-bordered text-center">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>{{__('usermodule::admin.name')}}</th>
                                        <th>{{__('usermodule::admin.phone')}}</th>
                                        <th>{{__('usermodule::admin.email')}}</th>
                                        <th>{{__('usermodule::admin.date')}}</th>
                                        <th class="align-center">{{__('usermodule::admin.action')}}</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($contacts as $contact)
                                        <tr>
                                            <td>{{$contact->id}}</td>
                                            <td>{{$contact->name}} </td>
                                            <td>{{$contact->phone}}</td>
                                            <td>{{$contact->email}}</td>
                                            <td>{{$contact->created_at}}</td>


                                            <td class="align-center">
                                                <ul class="table-controls">

                                                    <li>
                                                        <button type="button" class="mod btn btn-success p-0"
                                                                data-toggle="modal"
                                                                data-name="{{$contact->name}}"
                                                                data-phone="{{$contact->phone}}"
                                                                data-email="{{$contact->email}}"
                                                                data-message="{{$contact->message}}"
                                                                data-created_at="{{$contact->created_at}}"
                                                                data-target="#exampleModalCenter">
                                                            <i class="flaticon-view  bg-info p-1 text-white br-6"></i>
                                                        </button>
                                                    </li>


                                                    <li>
                                                        <form class="inline"
                                                              action="{{url('admin/contactus/'. $contact->id)}}"
                                                              method="POST">
                                                            {{ method_field('DELETE') }} {!! csrf_field() !!}
                                                            <button class="unst" title="Delete" type="submit"
                                                                    onclick="return confirm('{{__("usermodule::admin.delete_contact")}}')"
                                                                    type="button"
                                                            ><i class="flaticon-delete  bg-danger p-1 text-white"></i>
                                                            </button>
                                                        </form>
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
                            <span>{{__('usermodule::admin.name')}}  :</span>
                            <strong id="name"></strong>
                        </div>
                        <div class="col-md-6">
                            <span>{{__('usermodule::admin.phone')}}  :</span>
                            <strong id="phone"></strong>
                        </div>
                        <div class="col-md-6">
                            <span>{{__('usermodule::admin.email')}}  :</span>
                            <strong id="email"></strong>
                        </div>
                        <div class="col-md-6">
                            <span>{{__('usermodule::admin.date')}}  :</span>
                            <strong id="created_at"></strong>
                        </div>
                    </div>
                    <hr>

                    <div class="col-xl-12" id="message">

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
            var phone = $(this).data('phone');
            var email = $(this).data('email');
            var message = $(this).data('message');
            var created_at = $(this).data('created_at');

            $("#name").text(name);
            $("#message").text(message);
            $("#phone").text(phone);
            $("#email").text(email);
            $("#created_at").text(created_at);

        });


    </script>
@endsection
