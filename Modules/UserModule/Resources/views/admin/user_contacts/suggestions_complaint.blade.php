@extends('commonmodule::layouts.master')

@section('title')
    {{__('usermodule::admin.suggestions_complaint')}}
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('assets/admin/plugins/table/datatable/datatables.css')}}" type="text/css" >
    <link rel="stylesheet" href="{{ asset('assets/admin/css/ecommerce/product.css')}}" type="text/css" >
@endsection


@section('content')

    <link rel="stylesheet" href="{{ asset('assets/front/plugins/toastr/toastr.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{ asset('assets/front/plugins/toastr/custom-notification.css')}}" type="text/css">
    <!--  BEGIN CONTENT PART  -->
    <div id="content" class="main-content">
        <div class="container">
            <div class="page-header">
                <div class="page-title">
                    <h3>{{__('usermodule::admin.suggestions_complaint')}}</h3>

                </div>
            </div>


            <div class="widget-content justify-pill rounded-pills-icon widget-content-area" style="padding:0px">

{{--                <ul class="nav nav-pills mt-3  justify-content-center navs nav3" id="justify-pills-tab" role="tablist">--}}

{{--                    <li class="nav-item ml-2 mr-2" >--}}
{{--                        <a class="nav-link mb-2 text-center {{$type=='all'?'active':''}}"   href="{{url('admin/suggestions_complaint')}}"   >{{__('usermodule::admin.all')}}</a>--}}
{{--                    </li>--}}


{{--                    <li class="nav-item ml-2 mr-2" >--}}
{{--                        <a class="nav-link mb-2 text-center {{$type=='suggestion'?'active':''}}"  href="{{url('admin/suggestions_complaint/suggestion')}}" role="tab" aria-controls="justify-pills-Suggestion" aria-selected="true">{{__('usermodule::admin.suggestions')}}</a>--}}
{{--                    </li>--}}

{{--                    <li class="nav-item ml-2 mr-2" >--}}
{{--                        <a class="nav-link mb-2 text-center {{$type=='complaint'?'active':''}}" href="{{url('admin/suggestions_complaint/complaint')}}" role="tab" aria-controls="justify-pills-complaint" aria-selected="true">{{__('usermodule::admin.complaint')}}</a>--}}
{{--                    </li>--}}

{{--                    <li class="nav-item ml-2 mr-2" >--}}
{{--                        <a class="nav-link mb-2 text-center {{$type=='message'?'active':''}}"  href="{{url('admin/suggestions_complaint/message')}}" role="tab" aria-controls="justify-pills-messages" aria-selected="true">{{__('usermodule::admin.messages')}}</a>--}}
{{--                    </li>--}}



{{--                </ul>--}}

                <ul class="nav nav-pills mt-3  justify-content-center navs nav3" id="justify-pills-tab" role="tablist">

                    <li class="nav-item ml-2 mr-2" >
                        <a class="complete-tab nav-link mb-2 text-center {{$complete=='all'?'active':''}}" data-complete="all" id="justify-pills-all-tab" data-toggle="pill" href="#justify-pills-all" role="tab" aria-controls="justify-pills-all" aria-selected="true">{{__('usermodule::admin.all')}}</a>
                    </li>

                    <li class="nav-item ml-2 mr-2" >
                        <a class="complete-tab nav-link mb-2 text-center {{$complete=='complete'?'active':''}}" data-complete="complete" id="justify-pills-complete-tab" data-toggle="pill" href="#justify-pills-complete" role="tab" aria-controls="justify-pills-complete" aria-selected="true">{{__('usermodule::admin.complete')}}</a>
                    </li>

                    <li class="nav-item ml-2 mr-2" >
                        <a class="complete-tab nav-link mb-2 text-center {{$complete=='incomplete'?'active':''}}" data-complete="incomplete" id="justify-pills-incomplete-tab" data-toggle="pill" href="#justify-pills-incomplete" role="tab" aria-controls="justify-pills-incomplete" aria-selected="true">{{__('usermodule::admin.incomplete')}}</a>
                    </li>

                </ul>

                <ul class="nav nav-pills mt-3  justify-content-center navs nav3" id="justify-pills-tab" role="tablist">

                <form method="get" action="" class="form-sugge-date d-flex align-items-center flex-md-row flex-column">

                    <input id="complete-input" value="complete" type="hidden" name="complete">

                     <li class="nav-item ml-2 mr-2 d-flex align-items-center mb-2" >
                         <label class="ml-2 mr-2">{{__('usermodule::admin.from')}} </label>
                         <input class="form-control" name="from" type="date" value="{{$from}}">
                     </li>

                    <li class="nav-item ml-2 mr-2 d-flex align-items-center mb-2" >
                        <label class="ml-2 mr-2">{{__('usermodule::admin.to')}} </label>
                        <input class="form-control" name="to" type="date" value="{{$to}}">
                    </li>

                    <li class="nav-item ml-2 mr-2 mb-2" >
                        <input style="background-color: #2196F3;color: #fff" class="form-control"  type="submit" value="{{__('usermodule::admin.search')}}" >
                    </li>

                </form>

                </ul>

                <div  class="tab-content" id="justify-pills-tabContent">
                    @include('usermodule::admin.suggestion.all',['complete'=>$complete])
                    @include('usermodule::admin.suggestion.complete',['complete'=>$complete])
                    @include('usermodule::admin.suggestion.incomplete',['complete'=>$complete])





                </div>

            </div>


        </div>
    </div>
    <!--  END CONTENT PART  -->

    <!-- Modal -->
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
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
                        <div class="col-md-6" >
                            <span>{{__('usermodule::admin.name')}} :</span>
                            <strong id="name"></strong>
                        </div>
                        <div class="col-md-6" >
                            <span>{{__('usermodule::admin.phone')}} :</span>
                            <strong id="phone"></strong>
                        </div>

                        <div class="col-md-6" >
                            <span>{{__('usermodule::admin.date')}} :</span>
                            <strong id="created_at"></strong>
                        </div>
                    </div>
                    <hr>
                    <form enctype="multipart/form-data" method="post" id="reply-suggestion-admin">
                        <input id="id-suggestion" type="hidden" name="id" value="">
                        <div class="mb-3">
                            <label for="formFile" class="form-label">{{__('usermodule::admin.attachment')}}</label>
                            <input name="attach[]" multiple class="form-control" type="file" id="formFile">
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlTextarea1" class="form-label">{{__('usermodule::admin.comment')}}</label>
                            <textarea name="reply" class="form-control" id="reply" rows="3"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">{{__('usermodule::admin.reply')}}</button>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

<button data-id="1">dsad</button>


@stop

@section('js')
    @include('commonmodule::includes.swal')
    @include('commonmodule::includes.modal')
    <script src="{{ asset('assets/front/plugins/toastr/toastr.min.js')}}"></script>
    <script src="{{ asset('assets/front/plugins/toastr/custom-toastr.js')}}"></script>
    <script  src="{{ asset('assets/admin/plugins/table/datatable/datatables.js')}}" ></script>
    <script>
        $('#ecommerce-product-list').DataTable({
            "lengthMenu": [100, 50, 20, 10],
            "language": { "paginate": { "previous": "<i class='flaticon-arrow-left-1'></i>", "next": "<i class='flaticon-arrow-right'></i>" },
                "info": "Showing page _PAGE_ of _PAGES_"
            },
            drawCallback: function( settings ) { $('[data-toggle="tooltip"]').tooltip(); }
        });
        $('#ecommerce-product-list1').DataTable({
            "lengthMenu": [ 10, 20, 50, 100 ],
            "language": { "paginate": { "previous": "<i class='flaticon-arrow-left-1'></i>", "next": "<i class='flaticon-arrow-right'></i>" },
                "info": "Showing page _PAGE_ of _PAGES_"
            },
            drawCallback: function( settings ) { $('[data-toggle="tooltip"]').tooltip(); }
        });
        $('#ecommerce-product-list2').DataTable({
            "lengthMenu": [ 10, 20, 50, 100 ],
            "language": { "paginate": { "previous": "<i class='flaticon-arrow-left-1'></i>", "next": "<i class='flaticon-arrow-right'></i>" },
                "info": "Showing page _PAGE_ of _PAGES_"
            },
            drawCallback: function( settings ) { $('[data-toggle="tooltip"]').tooltip(); }
        });

    </script>
    <!--  END CUSTOM SCRIPT FILES  -->


    <script>

        $(document).on("click", ".mod", function () {
            var name = $(this).data('name');
            var phone = $(this).data('phone');
            var type = $(this).data('type');

            var id = $(this).data('id');
            var created_at = $(this).data('created_at');

            $("#name").text( name );
            $("#id-suggestion").val(id);
            $("#phone").text( phone );
            $("#type").text( type );

            $("#created_at").text( created_at );

        });


  $('.complete-tab').click(function ()
  {
      $('#complete-input').val($(this).data('complete'));
  })

        $("#reply-suggestion-admin").submit(function (event) {
            event.preventDefault();
            var form = document.getElementById('reply-suggestion-admin');
            token = '{{csrf_token()}}';
            var formdata = new FormData(document.querySelector('#reply-suggestion-admin'));
            formdata.append("_token", token);

            $.ajax({
                'type': 'post',
                'url': '{{ route("admin.replysuggestion") }}',
                data: formdata,
                processData: false,
                contentType: false,
                'statusCode': {
                    200: function (response) {
                        $('#exampleModalCenter').modal('toggle');
                        if (response.code == 201)
                            toastr["error"](response.message);
                        else {
                            toastr["success"](response.message)
                            let id = $('#id-suggestion').val()
                            $( "button[data-id='" + id + "']" ).attr('disabled','disabled')
                            $('input').val('');
                            $('textarea').val('');


                        }

                    },
                    422: function (response) {
                        let errors = reverseObj(response.responseJSON.errors);
                        $.map(errors, function (error) {
                            toastr["error"](error)
                        });

                    }
                },
            });

        });
    </script>
@endsection
