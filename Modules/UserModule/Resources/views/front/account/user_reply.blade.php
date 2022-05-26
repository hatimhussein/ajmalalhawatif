<div class="d-flex justify-content-end">
    <div class="msg_content_send">
        <div class="author"><p>  {{$suggestion->user->name}}</p></div>
        <div class="msg_container_send">
            {{$reply->reply}}
            <span class="msg_time_send">{{$reply->created_at->format('M D,Y') }}</span>
            @if(!empty($reply->file))
                @php($attachments = explode(',',$reply->file))
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
