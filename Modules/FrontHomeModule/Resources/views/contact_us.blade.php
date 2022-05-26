@extends('fronthomemodule::layouts.master')

@section('title')
    {{__('fronthomemodule::contactus.contact_us')}}
@endsection


@section('content')

    <!-- Breadcrumbs -->
    @include('fronthomemodule::content.breadCrumbs',['pages'=>[__('fronthomemodule::contactus.contact_us')]])

    <!-- main-container -->
    <div id="map"></div>

    <div class="main-container col2-right-layout">
        <div class="main container">
            <div class="row">
                <div class="col-sm-12">
                    <h2 class="legend">{{__('fronthomemodule::contactus.leave_message')}}</b></h2>
                </div>
                <section class="col-main col-sm-8 wow bounceInUp animated">
                    <div class="static-contain">
                        <fieldset class="group-select">
                            <form id="ContactUsForm">
                                <ul>
                                    <li id="billing-new-address-form">
                                        <fieldset>
                                            <div class="col-md-6 fl-r">
                                                <ul>
                                                    <li>
                                                        <div class="customer-name">
                                                            <div class="input-box name-firstname">
                                                                <label
                                                                    for="billing:firstname">{{__('fronthomemodule::contactus.name')}}
                                                                    <span class="required">*</span></label>
                                                                <input type="text" name="name" value=""
                                                                       title="First Name" class="input-text "
                                                                       autocomplete="off">
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="customer-name">
                                                            <div class="input-box name-lastname">
                                                                <label
                                                                    for="billing:lastname">{{__('fronthomemodule::contactus.email')}}
                                                                    <span class="required">*</span></label>
                                                                <input type="text" name="email" value=""
                                                                       title="Last Name" class="input-text"
                                                                       autocomplete="off">
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="input-box">
                                                            <label
                                                                for="billing:email">{{__('fronthomemodule::contactus.phone')}}</label>
                                                            <input type="text" name="phone" value=""
                                                                   title="Email Address"
                                                                   class="input-text validate-email" autocomplete="off">
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="col-md-6 fl-r">
                                                <ul>
                                                    <li class="">
                                                        <label
                                                            for="comment">{{__('fronthomemodule::contactus.message')}}
                                                            <span class="required">*</span></label>
                                                        <div style="float:none" class="">
                                                      <textarea name="message" title="Comment"
                                                                class="required-entry input-text" rows="5"
                                                                autocomplete="off"></textarea>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>

                                        </fieldset>
                                    </li>
                                    <div class="col-md-12">
                                        <div class="buttons-set text-l">
                                            <button type="submit" title="Submit" class="button submit send"> <span>
                                              {{__('fronthomemodule::contactus.submit')}}
                                          </span></button>
                                        </div>
                                    </div>
                                </ul>
                            </form>
                        </fieldset>
                    </div>
                </section>

                <section class="col-main col-sm-4 wow bounceInUp animated">
                    <div class="details">
                        <h2 class="legend">{{__('fronthomemodule::contactus.contact_details')}} </h2>
                        <div class="contact-email">
                            <span>{!! LanguageHelper::configTranslate($site_data->where('key','hotline')->first())  !!}
                                <br>
                                    <a href="tel:{{ $site_data->where('key','hotline')->first()->{'value_' . app()->getLocale()} }}">
                                        {{ $site_data->where('key','hotline')->first()->{'value_' . app()->getLocale()} }}
                                    </a>
                              </span>
                        </div>
                        <div class="contact-email"><span>{!! LanguageHelper::configTranslate($site_data->where('key','email')->first())  !!}<br>
                                @foreach($emails as $email)
                                    <a href="mailto:{{ $site_data->where('key','email')->first()->{'value_' . app()->getLocale()} }}">{{ $site_data->where('key','email')->first()->{'value_' . app()->getLocale()} }}</a>
                                @endforeach
                            </span>
                        </div>
                    </div>
                </section>

            </div>
        </div>
    </div>


@stop




@section('js')

    <script type="text/javascript">


        $("#ContactUsForm").submit(function (event) {
            event.preventDefault();
            var form = document.getElementById('ContactUsForm');
            token = '{{csrf_token()}}';
            var formdata = new FormData(document.querySelector('#ContactUsForm'));
            formdata.append("_token", token);

            $.ajax({
                'type': 'post',
                'url': '{{ url("save-contact-us") }}',
                data: formdata,
                processData: false,
                contentType: false,
                'statusCode': {
                    200: function (response) {

                        if (response.code == 201)
                            toastr["error"](response.message);
                        else {
                            toastr["success"](response.message)
                            $('input').val('');
                            $('textarea').val('');

                        }

                    },
                    422: function (response) {

                        $.map(response.responseJSON.errors, function (error) {
                            toastr["error"](error)
                        });

                    }
                },
            });

        });


    </script>

    <script>
        var map;

        function initMap() {
            var cordienate = {
                lat: {{$site_data->where('key','lat')->first()->value_ar }},
                lng: {{$site_data->where('key','lng')->first()->value_ar }}};
            map = new google.maps.Map(document.getElementById('map'), {
                center: cordienate,
                zoom: 8
            });
            var marker = new google.maps.Marker({position: cordienate, map: map});

        }
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDdB-OtsN9eywcvWkkR0XKrVD8HiIxBEDE&callback=initMap"
            async defer></script>

@endsection
