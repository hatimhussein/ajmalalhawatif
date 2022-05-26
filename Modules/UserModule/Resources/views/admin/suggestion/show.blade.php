@extends('commonmodule::layouts.master')

@section('css')
    <link rel="stylesheet" href="{{ asset('assets/admin/css/design-css/design.css')}}" type="text/css">
    <link rel="stylesheet" href="{{ asset('assets/admin/css/design-css/design-icons.css')}}" type="text/css">

    <!-- BEGIN PAGE LEVEL STYLES -->
    <link rel="stylesheet" href="{{ asset('assets/admin/plugins/file-upload/file-upload-with-preview.css')}}"
          type="text/css">
    <!--  BEGIN CUSTOM STYLE FILE  -->

    <link rel="stylesheet" href="{{ asset('assets/admin/plugins/select2/select2.min.css')}}" type="text/css">

    <style>
        .row [class*="col-"] .widget .widget-header h4 {
            color: #00d1c1;
        }
    </style>
    <!--  END CUSTOM STYLE FILE  -->

    <!-- END PAGE LEVEL STYLES -->

@endsection


@section('title')
    {{$suggestion->name }}
@endsection

@section('content')
    <link rel="stylesheet" href="{{ asset('assets/front/plugins/toastr/toastr.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{ asset('assets/front/plugins/toastr/custom-notification.css')}}" type="text/css">
    <div id="content" class="main-content">
        <div class="container">
            <div class="page-header">
                <div class="page-title">
                    <h3>
                        {{$suggestion->name}}
                    </h3>

                </div>
            </div>

            <div class="row">
                <form action="{{url('admin/brand')}}" style="width:100%" method="POST" data-role="validator"
                      data-on-before-submit="no_submit" data-on-error-input="notifyOnErrorInput"
                      data-show-error-hint="false" novalidate="novalidate" enctype="multipart/form-data">
                    @csrf

                    <div class="col-lg-12 layout-spacing col-md-12">
                        <div class="statbox widget box box-shadow">
                            <div class="widget-header">

                            </div>

                            <div class="widget-content widget-content-area">

                                <div class="row">
                                    <div class="col-xl-3 col-lg-12 col-12 ">
                                        <div class="profile-info-section mb-4">
                                            <div class="card" style="">
                                                <div class="card-body">
                                                    <h5 class="mb-4"><i
                                                            class="flaticon-user-plus"></i> {{$suggestion->name }}
                                                    </h5>
                                                    <p class="mb-2"><span class="usr-work-position">{{__('usermodule::admin.phone')}} : </span>
                                                        <a href="">{{$suggestion->phone}}</a></p>

                                                    <p class="mb-2"><span class="usr-work-position">{{__('fronthomemodule::suggestion.subject')}} : </span>
                                                        <a href="">{{$suggestion->subject}}</a></p>



                                                </div>
                                            </div>
                                        </div>


                                    </div>
                                    <div class="col-xl-9 col-lg-12 col-12 ">
                                        <div class="profile-info-section mb-4">
                                            <div class="card" style="">
                                                <div class="card-body">
                                                    <h5 class="mb-4">
                                                        {{$suggestion->type }}
                                                    </h5>
                                                    <p class="mb-2">
                                                        {{$suggestion->message }}
                                                    </p>



                                                </div>
                                            </div>
                                        </div>


                                    </div>

                                </div>

                            </div>
                        </div>
                    </div>


                </form>

            </div>

            <!-- pro-chat -->
            <div class="pro-chat">
            	<div class="card">
            		<div class="card-body msg_card_body">
            			<div class="chat-box-single-line">
            				<abbr class="timestamp">{{$suggestion->created_at->format('M D,Y') }}</abbr>
            			</div>
                        @foreach($suggestion->suggestionReply as $key)
                            @if($key->reply_type ==0)
            			<div class="d-flex justify-content-end">

							<div class="msg_content_send">
								<div class="author"><p>

                                            admin

                                    </p></div>
								<div class="msg_container">
									{{$key->reply}}
									<span class="msg_time_send">{{$key->created_at->format('M D,Y') }}</span>
                                    @if(!empty($key->file))
                                        @php($attachments = explode(',',$key->file))
                                    <div class="row mt-2">
                                        @foreach($attachments as $ke)
                                            @if((strpos($ke,'jpg') !== false || strpos($ke,'jpeg') !== false)|| strpos($ke,'png') !== false)
                                               <div class="col-4">

                                                  <img style="max-height:300px;width: 100%; object-fit: contain "  class="img-fluid rounded" src="{{asset('files/suggestion/'.$ke)}}" alt="banner image">

                                               </div>
                                            @elseif((strpos($ke,'mp4') !== false || strpos($ke,'mov') !== false))
                                                <div class="col-4">

                                                    <video width="320" height="240" controls>
                                                        <source src="{{asset('files/suggestion/'.$ke)}}" type="video/mp4">
                                                        <source src="{{asset('files/suggestion/'.$ke)}}" type="video/mov">
                                                    </video>
                                                </div>
                                            @elseif((strpos($ke,'docx') !== false || strpos($ke,'doc') !== false) || strpos($ke,'pdf') !== false)
                                                <div class="col-4">

                                                     <a href="{{asset('files/suggestion/'.$ke)}}" target="_blank">
                                                         <img width="250" class="img-fluid rounded" src="{{asset('files/suggestion/file.png')}}" alt="banner image">
                                                     </a>
                                                </div>
                                            @endif
                                        @endforeach

                                    </div>
                                    @endif
								</div>
							</div>
                            <div class="img_cont_msg">
                                <img src="https://e7.pngegg.com/pngimages/84/165/png-clipart-united-states-avatar-organization-information-user-avatar-service-computer-wallpaper.png" class="rounded-circle user_img_msg" alt="img">
                            </div>
            			</div>
                            @else
                                <div class="d-flex justify-content-start">
                                    <div class="img_cont_msg">
                                        <img src="https://e7.pngegg.com/pngimages/84/165/png-clipart-united-states-avatar-organization-information-user-avatar-service-computer-wallpaper.png" class="rounded-circle user_img_msg" alt="img">
                                    </div>
                                    <div class="msg_content">
                                        <div class="author"><p>
                                                {{$suggestion->user->name}}
                                            </p></div>
                                        <div class="msg_container">
                                            {{$key->reply}}
                                            <span class="msg_time">{{$key->created_at->format('M D,Y') }}</span>
                                            @if(!empty($key->file))
                                                @php($attachments = explode(',',$key->file))
                                                <div class="row mt-2">
                                                    @foreach($attachments as $ke)
                                                        @if((strpos($ke,'jpg') !== false || strpos($ke,'jpeg') !== false)|| strpos($ke,'png') !== false)
                                                            <div class="col-4">

                                                                <img style="max-height:300px;width: 100%; object-fit: contain "  class="img-fluid rounded" src="{{asset('files/suggestion/'.$ke)}}" alt="banner image">

                                                            </div>
                                                        @elseif((strpos($ke,'mp4') !== false || strpos($ke,'mov') !== false))
                                                            <div class="col-4">

                                                                <video width="320" height="240" controls>
                                                                    <source src="{{asset('files/suggestion/'.$ke)}}" type="video/mp4">
                                                                    <source src="{{asset('files/suggestion/'.$ke)}}" type="video/mov">
                                                                </video>
                                                            </div>
                                                        @elseif((strpos($ke,'docx') !== false || strpos($ke,'doc') !== false) || strpos($ke,'pdf') !== false)
                                                            <div class="col-4">

                                                                <a href="{{asset('files/suggestion/'.$ke)}}" target="_blank">
                                                                    <img width="250" class="img-fluid rounded" src="{{asset('files/suggestion/file.png')}}" alt="banner image">
                                                                </a>
                                                            </div>
                                                        @endif
                                                    @endforeach

                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endforeach

            		</div>
                    @if($suggestion->complete == 0)
                    <form id="reply-suggestion-admin" method="post" enctype="multipart/form-data">
                        <input id="id-suggestion" type="hidden" name="id" value="{{$suggestion->id}}">
                        <input  type="hidden" name="type" value="show">
            		<div class="card-footer">

            			<div class="msb-reply d-flex">

                                <label for="file-upload" class="input-group-text attach_btn custom-file-upload">
                                    <i class="flaticon-attachment mr-2"></i>
                                    <input id="file-upload" type="file" name="attach[]" multiple/>
                                </label>
                                <textarea name="reply" placeholder="Typing a message ..."></textarea>
                                <button id="btn-reply-submit" style="background-color:{{$suggestion->reply_type==0?'#E91E63':'#efc3d2'}} " {{$suggestion->reply_type==0?'':'disabled'}} type="{{$suggestion->reply_type==0?'submit':'button'}}"><i class="flaticon-send"></i></button>

            			</div>
            		</div>
                    </form>
                    @endif
            	</div>
            </div>

        </div>
    </div>


@stop

@section('js')
    @include('commonmodule::includes.swal')

    <script src="{{ asset('assets/admin/js/design-js/design.js')}}"></script>
    <script src="{{ asset('assets/admin/js/forms/form_validation/form_validation_material.js')}}"></script>



    <!-- BEGIN PAGE LEVEL PLUGINS -->
    <script src="{{ asset('assets/admin/plugins/file-upload/file-upload-with-preview.js')}}"></script>

    <!--  BEGIN CUSTOM SCRIPTS FILE  -->
    <script src="{{ asset('assets/admin/plugins/select2/select2.min.js')}}"></script>
    <script src="{{ asset('assets/admin/plugins/select2/custom-select2.js')}}"></script>
    <!--  BEGIN CUSTOM SCRIPTS FILE  -->
    <script src="{{ asset('assets/front/plugins/toastr/toastr.min.js')}}"></script>
    <script src="{{ asset('assets/front/plugins/toastr/custom-toastr.js')}}"></script>

    <script>

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
                            // toastr["success"](response.message)
                            $(".pro-chat .card .card-body").animate({ scrollTop: $('.pro-chat .card .card-body').prop("scrollHeight")}, 1000);
                            $('.pro-chat .card .card-body').append(response)
                            $( "#btn-reply-submit" ).attr('disabled','disabled')
                            $( "#btn-reply-submit" ).attr('type','button')
                            $( "#btn-reply-submit" ).css('background-color','#efc3d2')
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

        //First upload
        var firstUpload = new FileUploadWithPreview('myFirstImage')
        //Second upload
        var secondUpload = new FileUploadWithPreview('mySecondImage')




    </script>
    <!-- END PAGE LEVEL PLUGINS -->

@endsection
