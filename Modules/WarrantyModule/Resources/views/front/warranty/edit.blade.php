@extends('fronthomemodule::layouts.master')

@section('title')
    {{__('commonmodule::front.warranty')}}
@endsection

@section('css')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet"/>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/0.8.2/css/flag-icon.min.css" rel="stylesheet"/>
    <link rel="stylesheet" href="{{ asset('assets/admin/plugins/file-upload/file-upload-with-preview.css')}}"
          type="text/css">
@endsection

@section('content')


    @include('fronthomemodule::content.breadCrumbs',['pages'=>[__('commonmodule::front.warranty')]])
    <!-- main-container -->

    <!-- main-container -->
    <div class="main-container col2-right-layout warranty-create-div">
        <div class="main container">
            <div class="row">
                <section class="col-md-12">
                    <div class="my-account">
                        <div class="page-title title">
                            <h2>{{__('commonmodule::front.warranty')}}</h2>
                        </div>
                        <form id="warranty-form"
                              action="{{route('front.warranty.update', $warranty->id)}}" class="form"
                              enctype="multipart/form-data">
                            @csrf
                            @method('put')

                            <div class="fieldset">
                                <h2 class="legend">{{__('warrantymodule::warranty.main_info')}} <i
                                        class="glyphicon glyphicon-file"></i></h2>

                                <div class="row">
                                    <div class="col-md-9">
                                        <div class="row">
                                            <div class="col-md-6">
                                                @if($inputs->contains('key', 'warranty_number'))
                                                    <div class="form-group">
                                                        @include("warrantymodule::front.includes.input", ['localeFile' => $localeFile, 'input' => $inputs->where('key', 'warranty_number')->first(), 'value' => $warranty->insurance_id])
                                                    </div>
                                                @endif
                                                {{--                                                @if($inputs->contains('key', 'company_name'))--}}
                                                {{--                                                    <div class="form-group">--}}
                                                {{--                                                        @include("warrantymodule::front.includes.input", ['localeFile' => $localeFile, 'input' => $inputs->where('key', 'company_name')->first(), 'value' => auth()->user()->company_name, 'disabled' => true])--}}
                                                {{--                                                    </div>--}}
                                                {{--                                                @endif--}}
                                                {{--                                                @if($inputs->contains('key', 'company_account'))--}}
                                                {{--                                                    <div class="form-group">--}}
                                                {{--                                                        @include("warrantymodule::front.includes.input", ['localeFile' => $localeFile, 'input' => $inputs->where('key', 'company_account')->first(), 'value' => auth()->user()->account_number, 'disabled' => true])--}}
                                                {{--                                                    </div>--}}
                                                {{--                                                @endif--}}
                                                @if($inputs->contains('key', 'user_name'))
                                                    <div class="form-group">
                                                        @include("warrantymodule::front.includes.input", ['localeFile' => $localeFile, 'input' => $inputs->where('key', 'user_name')->first(), 'disabled' => true, 'value' => $warranty->insurance->user_name ?? ''])
                                                    </div>
                                                @endif
                                                @if($inputs->contains('key', 'phone'))
                                                    <div class="form-group">
                                                        @include("warrantymodule::front.includes.input", ['localeFile' => $localeFile, 'input' => $inputs->where('key', 'phone')->first(), 'value' => $warranty->phone])
                                                    </div>
                                                @endif
                                            </div>
                                            <div class="col-md-6 purple">
                                                @if($inputs->contains('key', 'usage_date'))
                                                    <div class="form-group">
                                                        @include("warrantymodule::front.includes.input", ['localeFile' => $localeFile, 'input' => $inputs->where('key', 'usage_date')->first(), 'value' => $warranty->usage_date ? $warranty->usage_date->toDateString() : '', 'read_only' => $type == 'sms'])
                                                    </div>
                                                @endif
                                                @if($inputs->contains('key', 'dummy_text_1'))
                                                    <div class="form-group">
                                                        @include("warrantymodule::front.includes.input", ['localeFile' => $localeFile, 'input' => $inputs->where('key', 'dummy_text_1')->first(), 'value' => $warranty->dummy_text_1])
                                                    </div>
                                                @endif
                                                @if($inputs->contains('key','dummy_text_2'))
                                                    <div class="form-group">
                                                        @include("warrantymodule::front.includes.input", ['localeFile' => $localeFile, 'input' => $inputs->where('key', 'dummy_text_2')->first(), 'value' => $warranty->dummy_text_2])
                                                    </div>
                                                @endif
                                                @if($inputs->contains('key', 'dummy_text_3'))
                                                    <div class="form-group">
                                                        @include("warrantymodule::front.includes.input", ['localeFile' => $localeFile, 'input' => $inputs->where('key', 'dummy_text_3')->first(), 'value' => $warranty->dummy_text_3])
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3 purple">
                                        <div class="customer-name row">
                                            @if($inputs->contains('key', 'user_notes'))
                                                <div class="form-group col-md-12">
                                                    <label for="user_notes"
                                                           class="required">{{__('warrantymodule::warranty.user_notes')}}
                                                    </label>
                                                    <textarea type="text" name="user_notes"
                                                              title="Notes" id="user_notes" maxlength="255"
                                                              class="input-text form-control"
                                                              rows="12">{{ $warranty->user_notes }}</textarea>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <div class="row mt-3">
                                    <div class="col-md-12">
                                        <div class="form-group-header">
                                            <h3>{{__('usermodule::admin.attachment')}} <i
                                                    class="glyphicon glyphicon-picture"></i></h3>
                                        </div>
                                    </div>
                                    @foreach($inputs->where('properties.type', 'file') as $input)
                                        <div class="col-md-4 custom-file-container" data-upload-id="{{ $input->key }}">
                                            <label for="{{ $input->key }}"
                                                   class="required">{{__('warrantymodule::warranty.'.$input->key)}}
                                                @if($input->value_en)<em class="required">*</em>@endif
                                            </label>
                                            <label> <a href="javascript:void(0)"
                                                       class="custom-file-container__image-clear"
                                                       title="Clear Image"></a></label>
                                            <label class="custom-file-container__custom-file">
                                                <input type="file" name="{{ $input->key }}"
                                                       title="{{ __('warrantymodule::warranty.'.$input->key) }}"
                                                       id="{{ $input->key }}"
                                                       class="custom-file-container__custom-file__custom-file-input"
                                                       accept="image/*,video/*">
                                                <span
                                                    class="custom-file-container__custom-file__custom-file-control"></span>
                                            </label>
                                            <div id="{{$input->key}}_preview"
                                                 class="custom-file-container__image-preview">
                                                @if(is_video($warranty->{$input->key}))
                                                    <div class="video_preview" style="position:relative;">
                                                        <video width="100%" height="250" controls
                                                               style="object-fit: contain">
                                                            <source
                                                                src="{{ asset('images/warranty/'.$warranty->{$input->key}) }}"
                                                                type="video/mp4">
                                                            <source
                                                                src="{{ asset('images/warranty/'.$warranty->{$input->key}) }}"
                                                                type="video/ogg">
                                                            Your browser does not support the video tag.
                                                        </video>
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    @endforeach
                                </div>

                            </div>


                            <div class="buttons-set">
                                <button type="submit" title="Save" class="button send">
                                    <span><span>{{__('usermodule::login.save')}}</span></span></button>
                            </div>
                        </form>
                    </div>
                </section>

            </div>
        </div>
    </div>
    <!--End main-container -->

@stop

@section('js')
    <script src="{{ asset('assets/admin/plugins/file-upload/file-upload-with-preview.js')}}"></script>

    <script>
        @foreach($inputs->where('properties.type', 'file') as $input)
        new FileUploadWithPreview('{{ $input->key }}')
        @endforeach
    </script>

    <script>
        @foreach($inputs->where('properties.type', 'file') as $input)
        @if ($warranty->{$input->key})
        $("#{{$input->key}}_preview").css("background-image", "url('{{ asset('images/warranty/'.$warranty->{$input->key}) }}')");
        @endif
        @endforeach
    </script>

    <script type="text/javascript">
        $('input[type="file"]').change(function () {
            $(this).parents('.custom-file-container').find('.video_preview').hide();
        })
    </script>

    <!-- @include('commonmodule::includes.filePond') -->
    @include('usermodule::front.auth.phone_code_scripts')


    <script>
        $(document).ready(() => {
            $('[name="phone_code_id"]').val('{{ $warranty->phone_code_id }}').change();
        });
    </script>

    @if ($type == 'sms')
        <script type="text/javascript">
            const url = '{!! route('warranty.insurance', 'replaceable') !!}';
            $('#warranty_number').change(function () {
                const id = $(this).val();
                $.get(url.replace('replaceable', id), response => {
                    const insurance = response.insurance;
                    fillInsuranceInputs(insurance);
                }).fail(response => {
                    fillInsuranceInputs();
                })
            });

            function fillInsuranceInputs(insurance = null) {
                $('#user_name').val(insurance?.user_name ?? '');
                $('#phone').val(insurance?.phone ?? '');
                $('[name="phone_code_id"]').val(insurance?.phone_code_id ?? '').change();
                $('#sent_at').val(insurance ? new Date(insurance.created_at ?? '').toISOString().substring(0, 10) : '');
                $('#usage_date').val(insurance ? new Date(insurance.usage_date ?? '').toISOString().substring(0, 10) : '');
            }
        </script>
    @endif

    <script type="text/javascript">
        const warranty_form = document.querySelector('#warranty-form');
        const submitter = $(warranty_form).find('[type="submit"]');
        submitter.click((e) => {
            e.preventDefault();
            submitter.prop('disabled', true);
            let oldText = submitter.text();
            submitter.text('....');
            let form = warranty_form;
            let formData = new FormData(form);
            let url = $(form).attr('action');

            $.ajax({
                'type': 'post',
                'url': url,
                data: formData,
                processData: false,
                contentType: false,
                'statusCode': {
                    200: function (response) {
                        if (response.code === 201) {
                            toastr["error"](response.message);
                            submitter.text(oldText);
                            submitter.prop('disabled', false);
                        } else {
                            toastr["success"](response.message);

                            setTimeout(function () {
                                window.location = "{{route('front.warranty.index', ['type' => $warranty->type])}}";
                            }, 3000);
                        }
                    },
                    422: function (response) {
                        $.map(response.responseJSON.errors, function (error) {
                            toastr["error"](error)
                        });
                        submitter.text(oldText);
                        submitter.prop('disabled', false);
                    }
                },
            });
        })
    </script>
@endsection
