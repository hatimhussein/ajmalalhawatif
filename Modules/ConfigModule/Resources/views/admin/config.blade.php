@extends('commonmodule::layouts.master')

@section('title')
    {{__('configmodule::admin.config')}}
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
                                <div class="col-sm-12 col-12">
                                    <div class="nav nav-pills mb-sm-0 mb-3" id="rounded-vertical-pills-tab"
                                         role="tablist" aria-orientation="vertical">
                                        @foreach($configCategorires->where('key', '!=', 'insurance')->where('key', '!=', 'sms_warranty') as $key=>$cat)
                                            <a class="nav-link mb-2 {{($key==0)?'active':''}} mx-auto"
                                               id="rounded-vertical-pills-{{$cat->key}}-tab" data-toggle="pill"
                                               href="#rounded-vertical-pills-{{$cat->key}}" role="tab"
                                               aria-controls="rounded-vertical-pills-{{$cat->key}}"
                                               aria-selected="true">
                                                <img
                                                    src="{{ asset("assets/admin/img/icons/config/".$cat->key.".svg") }}"
                                                    alt="{{ $cat->key }}">
                                                {{--                                                <i class="{{$cat->icon}}"></i>--}}
                                                {!! LanguageHelper::title($cat) !!}
                                            </a>
                                        @endforeach

                                    </div>
                                </div>

                                <div class="col-sm-12 col-12">
                                    <div class="tab-content" id="rounded-vertical-pills-tabContent">

                                        @foreach($configCategorires->where('key', '!=', 'insurance')->where('key', '!=', 'sms_warranty') as $key=>$cat)
                                            <div class="tab-pane fade {{($key==0)?'show active':''}}"
                                                 id="rounded-vertical-pills-{{$cat->key}}" role="tabpanel"
                                                 aria-labelledby="rounded-vertical-pills-{{$cat->key}}-tab">
                                                @include('configmodule::admin.tabs.'.$cat->key)
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

    <script src="{{ asset('assets/admin/plugins/ckeditor/ckeditor.js')}}"></script>
    <!-- BEGIN PAGE LEVEL PLUGINS -->
    <script src="{{ asset('assets/admin/plugins/file-upload/file-upload-with-preview.js')}}"></script>
    <script>
        let firstUpload = new FileUploadWithPreview('myFirstImage')

        $('.imageUploader').each((i, item) => {
            let key = $(item).val();
            new FileUploadWithPreview(key + '-image');
            let preview = $(`#${key}-preview`);
            let img = preview.data('image');
            if (img.length > 0) {
                $(document).ready(() => {
                    console.log(preview, img);
                    preview.css("background-image", `url('${img}')`);
                });
            }
        })
    </script>

@endsection
