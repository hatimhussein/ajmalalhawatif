@extends('fronthomemodule::layouts.master')

@section('title')
    {{__('commonmodule::front.warranty')}}
@endsection


@section('content')


    @include('fronthomemodule::content.breadCrumbs',['pages'=>[__('commonmodule::front.warranty')]])


    <!-- main-container -->
    <div class="main-container col2-right-layout">
        <div class="main container warranty-container">
            <div class="row w-attachments box">
                {{-- Row 1: broken device image (client upload) --}}
                <div class="col-lg-12 col-md-12">
                    <h5>{{ __('skudomodule::warranty.broken_device_image') }}</h5>
                    @if($warranty->broken_device_image)
                        @if(is_video($warranty->broken_device_image))
                            <video class="img-responsive" controls>
                                <source src="{{asset('images/warranty/'.$warranty->broken_device_image)}}" type="video/mp4">
                                <source src="{{asset('images/warranty/'.$warranty->broken_device_image)}}" type="video/quicktime">
                                Your browser does not support the video tag.
                            </video>
                        @else
                            <img class="img-responsive" src="{{asset('images/warranty/'.$warranty->broken_device_image)}}" alt=""/>
                        @endif
                    @else
                        <div class="text-muted text-center py-4">{{ __('skudomodule::warranty.image_not_available') }}</div>
                    @endif
                </div>

                <div class="w-100"></div>

                {{-- Row 2: 4 insurance registration images (same order as client insurance UI) --}}
                @php $ins = $warranty->insurance; @endphp
                <div class="col-lg-3 col-md-3">
                    <h5> صورة الجهاز من الأمام بعد التركيب</h5>
                    @if($ins && $ins->front_image)
                        @if(is_video($ins->front_image))
                            <video class="img-responsive" controls>
                                <source src="{{asset('images/warranty/'.$ins->front_image)}}" type="video/mp4">
                                <source src="{{asset('images/warranty/'.$ins->front_image)}}" type="video/quicktime">
                                Your browser does not support the video tag.
                            </video>
                        @else
                            <img class="img-responsive" src="{{asset('images/warranty/'.$ins->front_image)}}"/>
                        @endif
                    @else
                        <div class="text-muted text-center py-4">{{ __('skudomodule::insurance.image_not_available') }}</div>
                    @endif
                </div>
                <div class="col-lg-3 col-md-3">
                    <h5> {{ __('skudomodule::insurance.device_back_image') }}</h5>
                    @if($ins && $ins->device_back_image)
                        @if(is_video($ins->device_back_image))
                            <video class="img-responsive" controls>
                                <source src="{{asset('images/warranty/'.$ins->device_back_image)}}" type="video/mp4">
                                <source src="{{asset('images/warranty/'.$ins->device_back_image)}}" type="video/quicktime">
                                Your browser does not support the video tag.
                            </video>
                        @else
                            <img class="img-responsive" src="{{asset('images/warranty/'.$ins->device_back_image)}}"/>
                        @endif
                    @else
                        <div class="text-muted text-center py-4">{{ __('skudomodule::insurance.image_not_available') }}</div>
                    @endif
                </div>
                <div class="col-lg-3 col-md-3">
                    <h5> {{ __('skudomodule::insurance.back_image') }}</h5>
                    @if($ins && $ins->back_image)
                        @if(is_video($ins->back_image))
                            <video class="img-responsive" controls>
                                <source src="{{asset('images/warranty/'.$ins->back_image)}}" type="video/mp4">
                                <source src="{{asset('images/warranty/'.$ins->back_image)}}" type="video/quicktime">
                                Your browser does not support the video tag.
                            </video>
                        @else
                            <img class="img-responsive" src="{{asset('images/warranty/'.$ins->back_image)}}"/>
                        @endif
                    @else
                        <div class="text-muted text-center py-4">{{ __('skudomodule::insurance.image_not_available') }}</div>
                    @endif
                </div>
                <div class="col-lg-3 col-md-3">
                    <h5> صورة الفاتورة</h5>
                    @if($ins && $ins->invoice_image)
                        @if(is_video($ins->invoice_image))
                            <video class="img-responsive" controls>
                                <source src="{{asset('images/warranty/'.$ins->invoice_image)}}" type="video/mp4">
                                <source src="{{asset('images/warranty/'.$ins->invoice_image)}}" type="video/quicktime">
                                Your browser does not support the video tag.
                            </video>
                        @else
                            <img class="img-responsive" src="{{asset('images/warranty/'.$ins->invoice_image)}}"/>
                        @endif
                    @else
                        <div class="text-muted text-center py-4">{{ __('skudomodule::insurance.image_not_available') }}</div>
                    @endif
                </div>

                <div class="w-100"></div>

                {{-- Other warranty attachments (if any) --}}
                <div class="col-lg-4 col-md-4">
                    @if($warranty->front_image)
                        <h5> {{__('warrantymodule::warranty.front_image')}}</h5>
                        @if(is_video($warranty->front_image))
                            <video class="img-responsive" controls>
                                <source src="{{asset('images/warranty/'.$warranty->front_image)}}" type="video/mp4">
                                <source src="{{asset('images/warranty/'.$warranty->front_image)}}" type="video/quicktime">
                                Your browser does not support the video tag.
                            </video>
                        @else
                            <img class="img-responsive" src="{{asset('images/warranty/'.$warranty->front_image)}}"/>
                        @endif
                    @endif
                </div>
                <div class="col-lg-4 col-md-4">
                    @if($warranty->back_image)
                        <h5> {{__('warrantymodule::warranty.back_image')}}</h5>
                        @if(is_video($warranty->back_image))
                            <video class="img-responsive" controls>
                                <source src="{{asset('images/warranty/'.$warranty->back_image)}}" type="video/mp4">
                                <source src="{{asset('images/warranty/'.$warranty->back_image)}}" type="video/quicktime">
                                Your browser does not support the video tag.
                            </video>
                        @else
                            <img class="img-responsive" src="{{asset('images/warranty/'.$warranty->back_image)}}"/>
                        @endif
                    @endif
                </div>
                <div class="col-lg-4 col-md-4">
                    @if($warranty->warranty_image)
                        <h5> {{__('warrantymodule::warranty.warranty_image')}}</h5>
                        @if(is_video($warranty->warranty_image))
                            <video class="img-responsive" controls>
                                <source src="{{asset('images/warranty/'.$warranty->warranty_image)}}" type="video/mp4">
                                <source src="{{asset('images/warranty/'.$warranty->warranty_image)}}" type="video/quicktime">
                                Your browser does not support the video tag.
                            </video>
                        @else
                            <img class="img-responsive" src="{{asset('images/warranty/'.$warranty->warranty_image)}}" alt=""/>
                        @endif
                    @endif
                </div>
            </div>

            <div class="row w-user_info box">
                <div class="col-lg-12">
                    <div class="row mt-5">
                        <div class="col-lg-6 col-md-6">
                            <h5>
                                {{__('warrantymodule::warranty.user_name')}}:
                            </h5>
                            <span>{{ $warranty->user_name }}</span>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <h5>
                                {{__('warrantymodule::warranty.phone')}}:
                            </h5>
                            <span>{{ $warranty->phone_code->code ?? '' }}{{ $warranty->phone }}</span>
                        </div>
                    </div>

                    <div class="row mt-5">
                        <div class="col-lg-6 col-md-6">
                            <h5>
                                {{__('warrantymodule::warranty.usage_date')}}:
                            </h5>
                            <span>{{ $warranty->usage_date }}</span>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <h5>
                                {{__('warrantymodule::warranty.sent_at')}}:
                            </h5>
                            <span>{{ $warranty->created_at->diffForHumans() }}</span>
                        </div>
                    </div>

                    <div class="row mt-5">
                        <div class="col-lg-6 col-md-6">
                            <h5>
                                {{__('warrantymodule::warranty.dummy_text_1')}}:
                            </h5>
                            <span>{{ $warranty->dummy_text_1 }}</span>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <h5>
                                {{__('warrantymodule::warranty.dummy_text_2')}}:
                            </h5>
                            <span>{{ $warranty->dummy_text_2 }}</span>
                        </div>
                    </div>

                    <div class="row mt-5">
                        <div class="col-lg-6 col-md-6">
                            <h5>
                                {{__('warrantymodule::warranty.dummy_text_3')}}:
                            </h5>
                            <span>{{ $warranty->dummy_text_3 }}</span>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <h5>
                                رقم تسجيل الضمان:
                            </h5>
                            <span>{{ $warranty->insurance_id }}</span>
                        </div>
                    </div>

                    <div class="row mt-5">
                        <div class="col-lg-12">
                            <h5>
                                {{__('warrantymodule::warranty.user_notes')}}:
                            </h5>
                            <span>{{ $warranty->user_notes }}</span>
                        </div>
                    </div>
                </div>
            </div>

            @if(!is_null($warranty->is_applicable))
                <div class="row w-response_info box">
                    <div class="col-lg-12">
                        <div class="row mt-5">
                            <div class="col-lg-6 col-md-6">
                                <h5>
                                    {{__('warrantymodule::warranty.device_name')}}:
                                </h5>
                                <span>{{ $warranty->device_name }}</span>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <h5>
                                    {{__('warrantymodule::warranty.replied_at')}}:
                                </h5>
                                <span>{{ $warranty->replied_at ? $warranty->replied_at->diffForHumans() : '' }}</span>
                            </div>
                        </div>

                        <div class="row mt-5">
                            <div class="col-lg-6 col-md-6">
                                <h5>{{ __('warrantymodule::warranty.application_number') }}</h5>
                                <span>{{ $warranty->application_number }}</span>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <h5>
                                    {{__('warrantymodule::warranty.status').':'}}
                                </h5>
                                <span>
                                     @if($warranty->is_applicable == 1)
                                        {{ __('warrantymodule::warranty.applicable') }}
                                    @elseif($warranty->is_applicable == 2)
                                        {{ __('warrantymodule::warranty.in_progress')}}
                                    @elseif(is_null($warranty->is_applicable))
                                        {{ __('warrantymodule::warranty.new') }}
                                    @else
                                        {{ __('warrantymodule::warranty.not_applicable') }}
                                    @endif
                                </span>
                            </div>
                        </div>

                        <div class="row mt-5">
                            <div class="col-lg-12">
                                @if($warranty->is_applicable)
                                    <h5>
                                        {{__('warrantymodule::warranty.value')}}:
                                    </h5>
                                    <span>{{$warranty->value}} {{LanguageHelper::nameTranslate($warranty->currency)}}</span>
                                @else
                                    <h5>
                                        {{__('warrantymodule::warranty.reason')}}:
                                    </h5>
                                    <span>{{ $warranty->reason }}</span>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            @endif
            @if($warranty->is_applicable == 2)
                <div class="row w-response_info box">
                    <div class="col-lg-12">
                        <div class="row mt-5">
                            <div class="col-lg-6 col-md-6">
                                <h5>
                                    {{__('warrantymodule::warranty.replied_at')}}:
                                </h5>
                                <span>{{ \Carbon\Carbon::parse($warranty->replied_at)->diffForHumans() }}</span>
                            </div>

                            <div class="col-lg-6 col-md-6">
                                <h5>
                                    {{__('warrantymodule::warranty.status').':'}}
                                </h5>
                                <span>{{ __('warrantymodule::warranty.pending') }}</span>
                            </div>
                        </div>

                        <div class="row mt-5">
                            <div class="col-lg-12">
                                <h5>
                                    {{__('warrantymodule::warranty.reason')}}:
                                </h5>
                                <span>{{ $warranty->store_reason }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
    <!--End main-container -->

@stop
