@extends('commonmodule::layouts.master')

@section('title')
    {{__('configmodule::admin.newsletter')}}
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('assets/admin/plugins/table/datatable/datatables.css')}}" type="text/css">
    <link rel="stylesheet" href="{{ asset('assets/admin/css/ecommerce/product.css')}}" type="text/css">
    <link rel="stylesheet" href="{{ asset('assets/admin/plugins/select2/select2.min.css')}}" type="text/css">
@endsection


@section('content')


    <!--  BEGIN CONTENT PART  -->
    <div id="content" class="main-content">
        <div class="container">
            <div class="page-header">
                <div class="page-title">
                    <h3>{{__('configmodule::admin.newsletter')}}</h3>
                </div>
                <br>
                <br>
                <br>
                <form action="{{url('admin/newsletter')}}" method="post" enctype="multipart/form-data">
                    @csrf

                    <div class="form-row">
                        <div class="col-md-8">
                            <div class="statbox widget box box-shadow">
                                <div class="widget-content ">
                                    <label for="emails">{{__('configmodule::admin.newsletter')}}</label>

                                    <select id="emails" name="emails[]" multiple="multiple"
                                            class="tagging form-control custom-select">
                                        <option
                                            value="all">{{__('adminmodule::admin.select_all')}}</option>
                                        @foreach($emails as $key)
                                            <option value="{{$key->email}}">{{$key->email}}</option>
                                        @endforeach

                                    </select>
                                </div>

                                @if ($errors->has('orders_zones'))
                                    @include('commonmodule::includes.error',['errors'=>$errors->toArray(),'filed'=>'orders_zones'])
                                @endif

                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-2">
                            <div class="statbox widget box box-shadow">
                                <label
                                    class="mb-3"> {{__('adminmodule::admin.merchants')}}</label>
                                <br>
                                <label class="switch s-success  mb-4 mr-2">
                                    <input type="hidden" name="merchants" value="0">
                                    <input name="merchants" value="1"
                                           type="checkbox">
                                    <span class="slider round"></span>
                                </label>
                            </div>
                        </div>
                        <div class="col-lg-2">
                            <div class="statbox widget box box-shadow">
                                <label
                                    class="mb-3"> {{__('usermodule::admin.users')}}</label>
                                <br>
                                <label class="switch s-success  mb-4 mr-2">
                                    <input type="hidden" name="users" value="0">
                                    <input name="users" value="1"
                                           type="checkbox">
                                    <span class="slider round"></span>
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-8 mb-4">
                            <input name="subject" placeholder="{{__('configmodule::admin.subject')}}"
                                   class="form-control">
                            @if ($errors->has('subject'))
                                @include('commonmodule::includes.error',['errors'=>$errors->toArray(),'filed'=>'subject'])
                            @endif
                        </div>
                        <div class="col-md-8 mb-4">
                            <textarea name="message" placeholder="{{__('configmodule::admin.message')}}"
                                      class="form-control"></textarea>
                            @if ($errors->has('message'))
                                @include('commonmodule::includes.error',['errors'=>$errors->toArray(),'filed'=>'message'])
                            @endif
                        </div>
                        <div class="col-md-8 mb-4">
                            <input type="file" name="attachment" placeholder="{{__('configmodule::admin.attachment')}}"
                                   class="form-control">
                            @if ($errors->has('attachment'))
                                @include('commonmodule::includes.error',['errors'=>$errors->toArray(),'filed'=>'attachment'])
                            @endif
                        </div>
                        <div class="input-control  col-md-2 mb-4 ">
                            <button class="btn btn-gradient-danger mb-4 mt-3"
                                    type="submit">{{__('configmodule::admin.send')}}</button>
                        </div>
                    </div>
                </form>

            </div>
            <div class="row margin-bottom-120">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="statbox widget box box-shadow">
                        <div class="widget-header">
                            <div class="row">
                                <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                    <h4>{{__('configmodule::admin.messages')}} </h4>
                                </div>
                            </div>
                        </div>
                        <div class="widget-content widget-content-area">
                            <div class="mb-4">
                                <table id="ecommerce-product-list" class="table table-hover table-bordered text-center">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>{{__('configmodule::admin.message')}}</th>
                                        <th>{{__('configmodule::admin.date')}}</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($messages as $message)
                                        <tr>
                                            <td>{{$message->id}}</td>
                                            <td>{{$message->message}} </td>
                                            <td>{{$message->created_at}} </td>

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
    @include('commonmodule::includes.modal')
    <script src="{{ asset('assets/admin/plugins/select2/select2.min.js')}}"></script>
    <script src="{{ asset('assets/admin/plugins/select2/custom-select2.js')}}"></script>

    <script>
        $("#emails").on('select2:select select2:unselect', function (e) {
            let notSelected = $(this).find('option').not('option:selected').not('option[value="all"]');
            if (e.params.data.id === 'all') {
                if (notSelected.length) {
                    notSelected.prop('selected', true);
                } else {
                    $(this).find('option').prop('selected', false);
                }
            }
            $(this).find('option[value="all"]').prop('selected', false);
            $("#emails").change();
        });
    </script>

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
