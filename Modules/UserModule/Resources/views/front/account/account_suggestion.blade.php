@extends('fronthomemodule::layouts.master')

@section('title')
    {{__('usermodule::account.my_account')}}
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('assets\front\plugins\chosen\chosen.min.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet"/>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/0.8.2/css/flag-icon.min.css" rel="stylesheet"/>
@endsection

@section('content')

    @include('fronthomemodule::content.breadCrumbs',['pages'=>[__('usermodule::account.my_account')]])

    <!-- main-container -->

    <div class="main-container col2-right-layout">
        <div class="main container">

            <div class="row">

                <div class="col-lg-12">
                    <div class="profile-info-section ">
                        <div class="card" style="">
                            <div class="card-body">
                                <h5 class="">
                                    {{$suggestion->type}}
                                </h5>
                                <p class="">
                                    {{$suggestion->message}}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
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
                        <div class="d-flex justify-content-start">
                            <div class="img_cont_msg">
                                <img src="https://e7.pngegg.com/pngimages/84/165/png-clipart-united-states-avatar-organization-information-user-avatar-service-computer-wallpaper.png" class="rounded-circle user_img_msg" alt="img">
                            </div>
                            <div class="msg_content">
                                <div class="author"><p>admin</p></div>
                                <div class="msg_container">
                                    {{$key->reply}}
                                    <span class="msg_time">{{$key->created_at->format('M D,Y') }}</span>
                                    @if(!empty($key->file))
                                        @php($attachments = explode(',',$key->file))
                                    <div class="row mt-2">
                                        @foreach($attachments as $ke)
                                            @if((strpos($ke,'jpg') !== false || strpos($ke,'jpeg') !== false)|| strpos($ke,'png') !== false)
                                                <div class="col-sm-4">

                                                    <img style="max-height:300px;width: 100%; object-fit: contain "  class="img-fluid rounded" src="{{asset('files/suggestion/'.$ke)}}" alt="banner image">

                                                </div>
                                            @elseif((strpos($ke,'mp4') !== false || strpos($ke,'mov') !== false))
                                                <div class="col-sm-4">

                                                    <video width="320" height="240" controls>
                                                        <source src="{{asset('files/suggestion/'.$ke)}}" type="video/mp4">
                                                        <source src="{{asset('files/suggestion/'.$ke)}}" type="video/mov">
                                                    </video>
                                                </div>
                                            @elseif((strpos($ke,'docx') !== false || strpos($ke,'doc') !== false) || strpos($ke,'pdf') !== false)
                                                <div class="col-sm-4">

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
                            @else
                        <div class="d-flex justify-content-end">
                            <div class="msg_content_send">
                                <div class="author"><p>  {{$suggestion->user->name}}</p></div>
                                <div class="msg_container_send">
                                    {{$key->reply}}
                                    <span class="msg_time_send">{{$key->created_at->format('M D,Y') }}</span>
                                    @if(!empty($key->file))
                                        @php($attachments = explode(',',$key->file))
                                        <div class="row mt-2">
                                            @foreach($attachments as $ke)
                                                @if((strpos($ke,'jpg') !== false || strpos($ke,'jpeg') !== false)|| strpos($ke,'png') !== false)
                                                    <div class="col-sm-4">

                                                        <img style="max-height:300px;width: 100%; object-fit: contain "  class="img-fluid rounded" src="{{asset('files/suggestion/'.$ke)}}" alt="banner image">

                                                    </div>
                                                @elseif((strpos($ke,'mp4') !== false || strpos($ke,'mov') !== false))
                                                    <div class="col-sm-4">

                                                        <video width="320" height="240" controls>
                                                            <source src="{{asset('files/suggestion/'.$ke)}}" type="video/mp4">
                                                            <source src="{{asset('files/suggestion/'.$ke)}}" type="video/mov">
                                                        </video>
                                                    </div>
                                                @elseif((strpos($ke,'docx') !== false || strpos($ke,'doc') !== false) || strpos($ke,'pdf') !== false)
                                                    <div class="col-sm-4">

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

                            @endif
                        @endforeach


                    </div>
                    @if($suggestion->complete == 0)
                    <form id="reply-suggestion-user" method="post" enctype="multipart/form-data">
                        <input id="id-suggestion" type="hidden" name="id" value="{{$suggestion->id}}">
                            <div class="card-footer">
                                <div class="msb-reply d-flex">
                                    <label for="file-upload" class="input-group-text attach_btn custom-file-upload">
                                        <i class="icon-paperclip mr-2"></i>
                                        <input id="file-upload" type="file" multiple name="attach[]"/>
                                    </label>
                                    <textarea name="reply" placeholder="Typing a message ..."></textarea>
                                    <button id="btn-reply-submit" style="background-color:{{$suggestion->reply_type==1?'#E91E63':'#efc3d2'}} " {{$suggestion->reply_type==1?'':'disabled'}} type="{{$suggestion->reply_type==1?'submit':'button'}}"><i class="icon-share-alt"></i></button>
                                </div>
                            </div>
                    </form>
                        @endif
                </div>
            </div>
        </div>
    </div>
    <!--End main-container -->
@stop

@section('js')

    @include('usermodule::front.auth.scripts')
    <script>
        $("#reply-suggestion-user").submit(function (event) {
            event.preventDefault();
            var form = document.getElementById('reply-suggestion-user');
            token = '{{csrf_token()}}';
            var formdata = new FormData(document.querySelector('#reply-suggestion-user'));
            formdata.append("_token", token);

            $.ajax({
                'type': 'post',
                'url': '{{ route("user.replysuggestion") }}',
                data: formdata,
                processData: false,
                contentType: false,
                'statusCode': {
                    200: function (response) {
                        $('#exampleModalCenter').modal('toggle');
                        if (response.code == 201)
                            toastr["error"](response.message);
                        else {
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
    </script>
@endsection


