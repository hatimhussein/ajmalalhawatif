@extends('fronthomemodule::layouts.master')

@section('title')
    {{__('warrantymodule::insurance.insurance')}}
@endsection


@section('content')


    @include('fronthomemodule::content.breadCrumbs',['pages'=>[__('commonmodule::front.warranty')]])


    <!-- main-container -->
    <div class="main-container col2-right-layout">
        <div class="main container warranty-container">
            <div class="row w-attachments box">
                <div class="col-lg-6 col-md-3">
                    @if($insurance->front_image)
                        <h5> صورة الجهاز من الأمام بعد التركيب</h5>
                        @if(is_video($insurance->front_image))
                            <video class="img-responsive" controls>
                                <source src="{{asset('images/warranty/'.$insurance->front_image)}}" type="video/mp4">
                                <source src="{{asset('images/warranty/'.$insurance->front_image)}}"
                                        type="video/quicktime">
                                Your browser does not support the video tag.
                            </video>
                        @else
                            <img class="img-responsive"
                                 src="{{asset('images/warranty/'.$insurance->front_image)}}"/>
                        @endif
                    @endif
                </div>
                <div class="col-lg-6 col-md-3">
                    @if($insurance->device_back_image)
                        <h5> {{ __('skudomodule::insurance.device_back_image') }}</h5>
                        @if(is_video($insurance->device_back_image))
                            <video class="img-responsive" controls>
                                <source src="{{asset('images/warranty/'.$insurance->device_back_image)}}" type="video/mp4">
                                <source src="{{asset('images/warranty/'.$insurance->device_back_image)}}"
                                        type="video/quicktime">
                                Your browser does not support the video tag.
                            </video>
                        @else
                            <img class="img-responsive"
                                 src="{{asset('images/warranty/'.$insurance->device_back_image)}}"/>
                        @endif
                    @endif
                </div>
                <div class="col-lg-6 col-md-3">
                    @if($insurance->back_image)
                        <h5> {{ __('skudomodule::insurance.back_image') }}</h5>
                        @if(is_video($insurance->back_image))
                            <video class="img-responsive" controls>
                                <source src="{{asset('images/warranty/'.$insurance->back_image)}}" type="video/mp4">
                                <source src="{{asset('images/warranty/'.$insurance->back_image)}}"
                                        type="video/quicktime">
                                Your browser does not support the video tag.
                            </video>
                        @else
                            <img class="img-responsive"
                                 src="{{asset('images/warranty/'.$insurance->back_image)}}"/>
                        @endif
                    @endif
                </div>
                <div class="col-lg-6 col-md-3">
                    @if($insurance->invoice_image)
                        <h5> صورة الفاتورة</h5>
                        @if(is_video($insurance->invoice_image))
                            <video class="img-responsive" controls>
                                <source src="{{asset('images/warranty/'.$insurance->invoice_image)}}" type="video/mp4">
                                <source src="{{asset('images/warranty/'.$insurance->invoice_image)}}" type="video/quicktime">
                                Your browser does not support the video tag.
                            </video>
                        @else
                            <img class="img-responsive" src="{{asset('images/warranty/'.$insurance->invoice_image)}}"/>
                        @endif
                    @endif
                </div>
                <!-- warranty_image intentionally not shown to match create page inputs -->
            </div>

            <div class="row w-user_info box">
                <div class="col-lg-12">
                    <div class="row mt-5">
                        <div class="col-lg-6 col-md-6">
                            <h5>
                                {{__('warrantymodule::insurance.user_name')}}:
                            </h5>
                            <span>{{ $insurance->user_name }}</span>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <h5>
                                {{__('warrantymodule::insurance.phone')}}:
                            </h5>
                            <span>{{ $insurance->phone_code->code ?? '' }}{{ $insurance->phone }}</span>
                        </div>
                    </div>

                    
                    <div class="row mt-5">
                        <div class="col-lg-6 col-md-6">
                            <h5>
                                الرقم التسلسلي للجهاز:
                            </h5>
                            <span>{{ $insurance->device_serial }}</span>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <h5>
                                الرقم التسلسلي للمنتج (البكج):
                            </h5>
                            <span>{{ $insurance->package_serial }}</span>
                        </div>
                    </div>

                    <div class="row mt-5">
                        <div class="col-lg-6 col-md-6">
                            <h5>
                                {{__('warrantymodule::insurance.usage_date')}}:
                            </h5>
                            <span>{{ $insurance->usage_date ? $insurance->usage_date->toDateString() : '' }}</span>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <h5>
                                وقت وتاريخ الارسال:
                            </h5>
                            <span>{{ $insurance->created_at ? $insurance->created_at->format('Y-m-d H:i') : '' }}</span>
                        </div>
                    </div>

                    <div class="row mt-5">
                        <div class="col-lg-6 col-md-6">
                            <h5>
                                {{__('warrantymodule::insurance.dummy_text_1')}}:
                            </h5>
                            <span>{{ $insurance->dummy_text_1 }}</span>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <h5>
                                {{__('warrantymodule::insurance.dummy_text_2')}}:
                            </h5>
                            <span>{{ $insurance->dummy_text_2 }}</span>
                        </div>
                    </div>

                    

                    <div class="row mt-5">
                        <div class="col-lg-12">
                            <h5>
                                {{__('warrantymodule::insurance.user_notes')}}:
                            </h5>
                            <span>{{ $insurance->user_notes }}</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row w-response_info box">
                <div class="col-lg-12">
                    <div class="row mt-5">

                        <div class="col-lg-6 col-md-6">
                            <h5>
                                {{__('warrantymodule::insurance.replied_at')}}:
                            </h5>
                            <span>{{ $insurance->replied_at ? $insurance->replied_at->diffForHumans() : '' }}</span>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <h5>
                                {{__('warrantymodule::insurance.status').':'}}
                            </h5>
                            <span>
                                @if($insurance->isClosed())
                                    {{ __('warrantymodule::insurance.closed') }}
                                @elseif($insurance->status == 0)
                                    {{ __('warrantymodule::warranty.new') }}
                                @elseif($insurance->status == 1)
                                    {{ __('warrantymodule::insurance.activated') }}
                                @elseif($insurance->status == 3)
                                    {{ __('warrantymodule::warranty.in_progress') }}
                                @elseif($insurance->status == 2)
                                    {{ __('warrantymodule::insurance.rejected') }}
                                @endif
                                </span>
                        </div>
                    </div>

                    @if ($insurance->isClosed())
                        @if($insurance->isFinalUsed())
                            <div class="row mt-5">
                                <div class="col-lg-12">
                                    <h5>
                                        {{__('warrantymodule::sms_warranty.sms_warranty')}}:
                                    </h5>
                                    <span>{{ $insurance->getRespondedWarranty()->first()->id }}</span>
                                </div>
                            </div>
                        @else
                            <div class="row mt-5">
                                <div class="col-lg-12">
                                    <h5>
                                        {{__('warrantymodule::insurance.expire_date')}}:
                                    </h5>
                                    <span>{{ $insurance->expire_date ? $insurance->expire_date->toDateString() : '' }}</span>
                                </div>
                            </div>
                        @endif
                    @elseif(($insurance->status == 3 && $insurance->store_reason) || ($insurance->status == 2 && $insurance->reason))
                        <div class="row mt-5">
                            <div class="col-lg-12">
                                <h5>
                                    {{__('warrantymodule::insurance.reason')}}:
                                </h5>
                                <span>{{ $insurance->status == 3 ? $insurance->store_reason : $insurance->reason }}</span>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <!--End main-container -->

@stop
