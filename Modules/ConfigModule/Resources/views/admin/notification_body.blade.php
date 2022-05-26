@extends('commonmodule::layouts.master')

@section('title')
    {{__('configmodule::admin.notification_settings')}}
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('assets/admin/css/ui-kit/tabs-accordian/custom-tabs.css')}}" type="text/css">
    <!-- BEGIN PAGE LEVEL STYLES -->
    <link rel="stylesheet" href="{{ asset('assets/admin/plugins/file-upload/file-upload-with-preview.css')}}"
          type="text/css">
    <!--  BEGIN CUSTOM STYLE FILE  -->
@endsection



@section('content')

    <!--  BEGIN CONTENT PART  -->
    <div id="content" class="main-content">
        <div class="container">
            <div class="row">

                <div class="col-12 mt-5 layout-spacing">
                    <div class="statbox widget box box-shadow">

                        <div class="widget-content widget-content-area rounded-vertical-pills-icon">

                            <div class="row mb-4 mt-3">
                                <div class="col-sm-2 col-12">
                                    <div class="nav flex-column nav-pills mb-sm-0 mb-3" id="rounded-vertical-pills-tab"
                                         role="tablist" aria-orientation="vertical">
                                        @foreach($notifications as $key=>$notification)
                                            <a class="nav-link mb-2 {{($loop->iteration == 1)?'active':''}} mx-auto"
                                               id="rounded-vertical-pills-{{$notification->key}}-tab" data-toggle="pill"
                                               href="#rounded-vertical-pills-{{$notification->key}}" role="tab"
                                               aria-controls="rounded-vertical-pills-{{$notification->key}}"
                                               aria-selected="true">
                                                {!! LanguageHelper::nameTranslate($notification) !!}
                                            </a>
                                        @endforeach

                                    </div>
                                </div>

                                <div class="col-sm-10 col-12">
                                    <div class="tab-content" id="rounded-vertical-pills-tabContent">

                                        @foreach($notifications as $key=>$notification)
                                            <div class="tab-pane fade {{($loop->iteration == 1)?'show active':''}}"
                                                 id="rounded-vertical-pills-{{$notification->key}}" role="tabpanel"
                                                 aria-labelledby="rounded-vertical-pills-{{$notification->key}}-tab">

                                                <form class="notification_body_form"
                                                      action="{{route('notification-settings.update', $notification->key)}}"
                                                      method="POST">
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <label>{{ __('configmodule::admin.valuear') }}</label>
                                                            <div class="form-row">
                                                                <div
                                                                    class="input-control required col-md-12 mb-4 required">
                                                                    <textarea name="desc_ar" class="form-control"
                                                                              data-validate-func="required"
                                                                              data-validate-arg="6"
                                                                              data-validate-hint="{{__('configmodule::admin.valuear')}}"
                                                                              placeholder="{{__('configmodule::admin.valuear')}}"
                                                                              autocomplete="off" cols="30" rows="3"
                                                                              id="{{$notification->key}}_desc_ar">{{$notification->desc_ar}}</textarea>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <label>{{ __('configmodule::admin.valueen') }}</label>
                                                            <div class="form-row">
                                                                <div
                                                                    class="input-control required col-md-12 mb-4 required">
                                                                    <textarea name="desc_en" class="form-control"
                                                                              placeholder="{{__('configmodule::admin.valueen')}}"
                                                                              autocomplete="off" cols="30" rows="3"
                                                                              id="{{$notification->key}}_desc_en">{{$notification->desc_en}}</textarea>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-12">
                                                            <input name="send_sms" type="hidden" value="0">
                                                            <div class="statbox widget box box-shadow ">
                                                                <label
                                                                    for="send_sms">{{__('configmodule::admin.send_sms')}}</label>
                                                                <div class="widget-content">
                                                                    <label class="switch s-success mb-4 mr-2">
                                                                        <input name="send_sms" value="1"
                                                                               type="checkbox" {{($notification->send_sms)?'checked':''}}>
                                                                        <span class="slider round"></span>
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-xl-3 mb-3 mt-2">
                                                            <button type="submit"
                                                                    class="btn btn-md btn-block btn-success">{{__('configmodule::admin.update')}}</button>
                                                        </div>
                                                    </div>

                                                </form>

                                                <div class="row">
                                                    <div class="col-12">
                                                        <pre>{!! $notification->replacements_text !!}</pre>
                                                    </div>
                                                </div>

                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@stop

@section('js')
    @include('commonmodule::includes.swal')

    <script>
        $(".notification_body_form").on('submit', function (event) {
            event.preventDefault();
            let clicked = $(this).find('[type="submit"]');
            let oldHtml = clicked.html();
            clicked.prop('disabled', true);
            clicked.html('<div class="cp-spinner cp-skeleton"></div>');

            let formData = new FormData(this);
            let url = $(this).attr('action');

            $.ajax({
                'type': 'post',
                'url': url,
                data: formData,
                processData: false,
                contentType: false,

                'statusCode': {
                    200: function (response) {
                        $(clicked).html(oldHtml);
                        clicked.prop('disabled', false);
                        if (response.code == 201) {
                            swal("Error", response.message, "error", {button: "Ok",});
                            setTimeout(() => {
                                window.location.reload();
                            }, 3000)
                        } else {
                            swal("{{__('productmodule::admin.done')}}", "{{__('commonmodule::validation.updated')}}", "success", {button: "Ok",});
                        }
                    },
                    422: function (response) {
                        $.map(response.responseJSON.errors, function (error) {
                            if (error[0])
                                swal("Error", error[0], "error", {button: "Ok",});
                        });
                        clicked.prop('disabled', false);
                        $(clicked).html(oldHtml);
                    }
                },
            });
        });
    </script>
@endsection
