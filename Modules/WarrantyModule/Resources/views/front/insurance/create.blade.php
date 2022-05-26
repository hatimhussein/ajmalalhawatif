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

    <div class="main-container col2-right-layout warranty-create-div">
        <div class="main container">
            <div class="row">
                <section class="col-md-12">
                    <div class="my-account">
                        <div class="page-title title">
                            <h2>{{__('warrantymodule::insurance.insurance')}}</h2>
                        </div>
                        <form id="insurance-form"
                              action="{{route('front.insurance.store')}}" class="form"
                              method="post" enctype="multipart/form-data">
                            @csrf

                            <div class="fieldset">
                                <h2 class="legend">{{__('warrantymodule::warranty.main_info')}} <i
                                        class="glyphicon glyphicon-file"></i></h2>

                                <div class="row">
                                    <div class="col-md-9">
                                        <div class="row">
                                            <div class="col-md-6">
                                                {{--                                                @if($inputs->contains('key', 'company_name'))--}}
                                                {{--                                                    <div class="form-group">--}}
                                                {{--                                                        @include("warrantymodule::front.includes.input", ['input' => $inputs->where('key', 'company_name')->first(), 'value' => auth()->user()->account_number, 'read_only' => true, 'localeFile' => 'insurance'])--}}
                                                {{--                                                    </div>--}}
                                                {{--                                                @endif--}}
                                                {{--                                                @if($inputs->contains('key', 'company_account'))--}}
                                                {{--                                                    <div class="form-group">--}}
                                                {{--                                                        @include("warrantymodule::front.includes.input", ['input' => $inputs->where('key', 'company_account')->first(), 'value' => auth()->user()->company_name, 'read_only' => true, 'localeFile' => 'insurance'])--}}
                                                {{--                                                    </div>--}}
                                                {{--                                                @endif--}}
                                                @if($inputs->contains('key', 'user_name'))
                                                    <div class="form-group">
                                                        @include("warrantymodule::front.includes.input", ['input' => $inputs->where('key', 'user_name')->first(), 'localeFile' => 'insurance'])
                                                    </div>
                                                @endif
                                                @if($inputs->contains('key', 'phone'))
                                                    <div class="form-group">
                                                        @include("warrantymodule::front.includes.input", ['input' => $inputs->where('key', 'phone')->first(), 'localeFile' => 'insurance'])
                                                    </div>
                                                @endif
                                                @if($inputs->contains('key', 'email'))
                                                    <div class="form-group">
                                                        @include("warrantymodule::front.includes.input", ['input' => $inputs->where('key', 'email')->first(), 'localeFile' => 'insurance'])
                                                    </div>
                                                @endif
                                            </div>
                                            <div class="col-md-6 purple">
                                                @if($inputs->contains('key', 'usage_date'))
                                                    <div class="form-group">
                                                        @include("warrantymodule::front.includes.input", ['input' => $inputs->where('key', 'usage_date')->first(), 'localeFile' => 'insurance'])
                                                    </div>
                                                @endif
                                                @if($inputs->contains('key', 'dummy_text_1'))
                                                    <div class="form-group">
                                                        @include("warrantymodule::front.includes.input", ['input' => $inputs->where('key', 'dummy_text_1')->first(), 'localeFile' => 'insurance'])
                                                    </div>
                                                @endif
                                                @if($inputs->contains('key', 'dummy_text_2'))
                                                    <div class="form-group">
                                                        @include("warrantymodule::front.includes.input", ['input' => $inputs->where('key', 'dummy_text_2')->first(), 'localeFile' => 'insurance'])
                                                    </div>
                                                @endif
                                                @if($inputs->contains('key', 'dummy_text_3'))
                                                    <div class="form-group">
                                                        @include("warrantymodule::front.includes.input", ['input' => $inputs->where('key', 'dummy_text_3')->first(), 'localeFile' => 'insurance'])
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
                                                           class="required">{{__('warrantymodule::insurance.user_notes')}}
                                                    </label>
                                                    <textarea type="text" name="user_notes"
                                                              title="Notes" id="user_notes" maxlength="255"
                                                              class="input-text form-control" rows="12"></textarea>
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
                                                   class="required">{{__('warrantymodule::insurance.'.$input->key)}}
                                                @if($input->value_en)<em class="required">*</em>@endif
                                            </label>
                                            <label> <a href="javascript:void(0)"
                                                       class="custom-file-container__image-clear"
                                                       title="Clear Image"></a></label>
                                            <label class="custom-file-container__custom-file">
                                                <input type="file" name="{{ $input->key }}"
                                                       title="{{ __('warrantymodule::insurance.'.$input->key) }}"
                                                       id="{{ $input->key }}"
                                                       class="custom-file-container__custom-file__custom-file-input"
                                                       accept="image/*,video/*">
                                                <span
                                                    class="custom-file-container__custom-file__custom-file-control"></span>
                                            </label>
                                            <div class="custom-file-container__image-preview"></div>
                                        </div>
                                    @endforeach
                                </div>

                            </div>

                            <div class="row">
                                <div class="col-12 accept_terms">
                                    <input type="checkbox" name="terms" title="terms & conditions"
                                           id="terms" checked required>
                                    <label for="terms" style="display: inline-block">
                                        {{__('usermodule::login.accept')}}
                                        <a href="{{ url('config/'.$site_data->where('key', 'insurance')->first()->id ?? '2') }}"
                                           target="_blank">{{__('usermodule::login.terms_conditions')}}</a>
                                    </label>
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

@stop

@section('js')
    <script src="{{ asset('assets/admin/plugins/file-upload/file-upload-with-preview.js')}}"></script>

    <script>
        @foreach($inputs->where('properties.type', 'file') as $input)
        new FileUploadWithPreview('{{ $input->key }}')
        @endforeach
    </script>

    @include('usermodule::front.auth.phone_code_scripts')

    <script>
        const warranty_form = document.querySelector('#insurance-form');
        const submitter = $(warranty_form).find('[type="submit"]');
        $(warranty_form).on('submit', (e) => {
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
                                window.location = "{{route('front.insurance.index')}}";
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
