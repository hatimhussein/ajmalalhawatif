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


                            <form action="{{ url('/admin/invoice-status') }}" method="POST">
                                @csrf
                                <div class="row mb-4 mt-3">

                                    @foreach($status as $sta)
                                        <div class="col-3">

                                            <div class="statbox widget box box-shadow ">
                                                <label for="status_id">{{ $sta->title }}</label>
                                                <div class="widget-content">
                                                    <label class="switch s-success mb-4 mr-2">
                                                        <input name="status_id[]" value="{{ $sta->id }}"
                                                               type="checkbox" {{ ($sta->able_print == 1) ?'checked':''}}>
                                                        <span class="slider round"></span>
                                                    </label>
                                                </div>
                                            </div>

                                        </div>
                                    @endforeach

                                    <div class="col-12">
                                        <button type="submit"
                                                class="btn btn-md btn-block btn-success">{{__('configmodule::admin.update')}}</button>
                                    </div>

                                </div>
                            </form>

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
