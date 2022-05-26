@extends('commonmodule::layouts.master')

@section('title')
    {{__('commonmodule::sidebar.site_colors')}}
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('assets/admin/plugins/table/datatable/custom_dt_zero_config.css')}}"
          type="text/css">

    <style>
        .color1, .color2, .color3, .color4 {
            height: 55px;
            border: unset !important;
            padding: .375rem 0px;
        }
    </style>
@endsection



@section('content')



    <!--  BEGIN CONTENT PART  -->
    <div id="content" class="main-content">
        <div class="container">
            <div class="page-header">
                <div class="page-title">
                    <h3>{{__('configmodule::admin.site_fonts')}} </h3>

                </div>

                <div class="mt-5">
                    <form action="{{route('site_colors.store')}}" method="post">
                        @csrf
                        @foreach($fonts as $font)
                            <div class="row">
                                <div class="col-lg-4">
                                    <label>{{ LanguageHelper::nameTranslate($font) }}</label>
                                    <input type="text" class="form-control" name="{{$font->key}}[value]"
                                           value="{{$font->value}}"
                                           required>
                                </div>
                                <div class="col-lg-8">
                                    <label>{{ __('configmodule::admin.font_url') }}</label>
                                    <input type="text" class="form-control" name="{{$font->key}}[ex_value]"
                                           value="{{$font->ex_value}}"
                                           required>
                                </div>
                            </div>
                        @endforeach
                        <div class="row">

                            <div class="col-lg-3 mt-4">
                                <button type="submit"
                                        class="btn btn-primary">{{__('configmodule::admin.save')}}</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <div class="page-header">
                <div class="page-title">
                    <h3>{{__('commonmodule::sidebar.site_colors')}} </h3>

                </div>

                <div class="mt-5">
                    <form action="{{route('site_colors.store')}}" method="post">
                        @csrf
                        <div class="row">
                            @foreach($colors as $color)
                                <div class="col-lg-2">
                                    <label>{{ LanguageHelper::nameTranslate($color) }}</label>
                                    <input type="color" class="form-control color1" name="{{$color->key}}[value]"
                                           value="{{$color->value}}"
                                           required>
                                </div>
                            @endforeach

                            <div class="col-lg-3 mt-4">
                                <button type="submit"
                                        class="btn btn-primary">{{__('configmodule::admin.save')}}</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>


        </div>
    </div>

    <!-- Button trigger modal -->

    <!--  END CONTENT PART  -->
@stop

@section('js')
    @include('commonmodule::includes.swal')
@endsection
