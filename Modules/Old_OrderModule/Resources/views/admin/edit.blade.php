@extends('commonmodule::layouts.master')

@section('title')
    {{__('ordermodule::admin.order_details')}}
@endsection

@section('css')
    <link rel="stylesheet" href="{{asset('assets/admin/assets/css/pages/check-out/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/admin/assets/css/pages/check-out/main.css')}}">
    <link rel="stylesheet" href="{{asset('assets/admin/assets/css/pages/check-out/style.css')}}">
    <style>
        @if(App::getLocale() == 'ar')
        .tab-content {
            direction: rtl;
            text-align: right;
        }

        .address_form {
            background: #fff;
            padding: 0px 10px;
            margin-bottom: 8px;
            border: 0px solid #ddd;
            border-radius: 10px;
            direction: rtl;
            text-align: right;
        }

        .c-progress-steps {
            direction: rtl;
        }

        .placard {
            direction: ltr;
        }

        .fix-align-ar {
            text-align: right;
        }

        h3 {
            direction: rtl;
        }

        .total {
            direction: rtl;
        }

        .total-title, .total h3 {
            text-align: right;
        }

        @else
        html {
            dir: ltr;
        }

        body {
            text-align: left;
            direction: ltr;
        }

        .placard {
            direction: rtl;
        }

        .fix-align-ar {
            text-align: left;
        }

        @endif

        @media (min-width: 600px) {
            .c-progress-steps li.current:before {
                color: #8ec53f;
                content: "\f192";
            }
        }

        .hidden {
            display: none;
        }

        .ship-process {
            width: 100%;
        }

        .ship-process li a {
            color: #2a89dc !important;
        }

        .ship-process li i {
            font-size: 18px;
            width: 0;
            height: 0;
            border: none;
            color: #2a89dc;
            padding: 0 1rem;
        }

        .ship-process li {
            list-style: none;
            display: inline-block;
        }

        .con-btn {
            width: 130px !important;
        }
    </style>
@endsection

@section('content')

    <!--  BEGIN CONTENT PART  -->
    <div id="content" class="main-content">
        <div class="container">
            <div class="page-header">
                <div class="page-title">
                    <h3>{{__('ordermodule::admin.order_details')}}</h3>
                </div>
            </div>
            <div class="row">

                <ol class="c-progress-steps">
                    <li class="c-progress-steps__step  current" id="stepOne" next="stepTwo" previous="" tab="step1"
                        next_tab="step2" previous_tab=""> المنتجات
                    </li>
                    <li class="c-progress-steps__step  done" id="stepTwo" next="stepThree" previous="stepOne"
                        tab="step2" next_tab="step3" previous_tab="step1"> الشحن
                    </li>
                    <li class="c-progress-steps__step  done" id="stepThree" next="stepFour" previous="stepTwo"
                        tab="step3" next_tab="step4" previous_tab="step2">الدفع
                    </li>
                    <li class="c-progress-steps__step  done" id="stepFour" next="" previous="stepThree" tab="step4"
                        next_tab="" previous_tab="step3">أتمام عمليه الشراء
                    </li>
                </ol>
                <div class="container">
                    <div class="row" style="width: 105%;">
                        <div class="ship-process padding-top-30 padding-bottom-30">
                            <div class="wizard">
                                @php($total =0)
                                <div class="tab-content">
                                    <form id="checkout_form" role="form">
                                        <div id="step1">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <h6 class="cart-header"> {{__('ordermodule::cart.cart')}}
                                                                ({{count($order->products)}})</h6>
                                                            <div class="shoping_cart">

                                                                @if($order->products->count())
                                                                    @foreach($order->products as $product)
                                                                        <?php
                                                                        $quantity = 0;
                                                                        if ($product->type == 'simple') {
                                                                            $quantity = $product->product_quantity + $product->pivot->quantity;
                                                                        } else {
                                                                            $combination = $product->combinations()->where('combination_names', $product->pivot->item_combination_name)->first();
                                                                            $quantity = $combination->combination_quantity ?? 0 + $product->pivot->quantity;
                                                                        }
                                                                        ?>


                                                                        <div
                                                                            class="placard cart-items {{$product->id.str_replace (',','',$product->pivot->item_combination_name)}}">
                                                                            <div class="row">

                                                                                <div class="col-lg-9">

                                                                                    <div class="row"
                                                                                         style="align-items: baseline;">

                                                                                        <div class="col-sm-3">
                                                                                            <div class="">
                                                                                                <span
                                                                                                    class="qty-label"> {{__('ordermodule::admin.quantity')}} </span>

                                                                                                <input type="number"
                                                                                                       class="update-quantity form-control"
                                                                                                       onchange="updateQuantity(this.value,'{{url('admin/order/'.$order->id.'/updateQuantity/'.$product->id)}}')"
                                                                                                       step="1"
                                                                                                       max="{{$quantity}}"
                                                                                                       data-item_price="0"
                                                                                                       data-old_quantity=""
                                                                                                       data-product_id=""
                                                                                                       data-item_combination=""
                                                                                                       value="{{$product->pivot->quantity}}">
                                                                                                {{--                                                                                                <select--}}
                                                                                                {{--                                                                                                    class="update-quantity"--}}
                                                                                                {{--                                                                                                    onchange="updateQuantity(this.value,'{{url('admin/order/'.$order->id.'/updateQuantity/'.$product->id)}}')"--}}
                                                                                                {{--                                                                                                    size="1"--}}
                                                                                                {{--                                                                                                    data-item_price="0"--}}
                                                                                                {{--                                                                                                    data-old_quantity=""--}}
                                                                                                {{--                                                                                                    data-product_id=""--}}
                                                                                                {{--                                                                                                    data-item_combination="">--}}
                                                                                                {{--                                                                                                    @for($i = 1; $i<= $quantity; $i++)--}}
                                                                                                {{--                                                                                                        <option--}}
                                                                                                {{--                                                                                                            value="{{$i}}" {{($i == $product->pivot->quantity)?'selected':''}}>{{$i}}</option>--}}
                                                                                                {{--                                                                                                    @endfor--}}
                                                                                                {{--                                                                                                </select>--}}
                                                                                            </div>
                                                                                        </div>

                                                                                        <div
                                                                                            class="col-sm-9 fix-align-ar">
                                                                                            <span
                                                                                                class="price"><h5>{!! LanguageHelper::nameTranslate($product) !!}</h5><span
                                                                                                    class="item_price"> {!! ProductHelper::calPriceCurrency($product->pivot->item_price) !!}</span> {!! LanguageHelper::nameTranslate($order->currency) !!} </span>
                                                                                        </div>
                                                                                    </div>

                                                                                </div>
                                                                                <div class="col-lg-3">
                                                                                    <div class="media-left">

                                                                                        <img
                                                                                            src="{{asset('images/product/'.$product->product_photo)}}"
                                                                                            class="img-responsive"
                                                                                            alt="">
                                                                                    </div>
                                                                                </div>

                                                                            </div>
                                                                            <div
                                                                                class="cart_info d-flex justify-content-end border-top">
                                                                                <ul>

                                                                                    <li><a style="cursor: pointer;"
                                                                                           href="#"
                                                                                           onclick="deleteProduct('{{url('admin/order/'.$order->id.'/deleteProduct/'.$product->id)}}')">
                                                                                            <i class="fa fa-trash"></i> {{__('ordermodule::cart.delete')}}
                                                                                        </a></li>
                                                                                </ul>
                                                                            </div>
                                                                        </div>
                                                                        @php($total = $total + ProductHelper::calPriceCurrency( $product->pivot->item_price * $product->pivot->quantity))

                                                                    @endforeach
                                                                @endif

                                                            </div>
                                                        </div>
                                                        <div class="col-lg-3">
                                                            <div class="total">
                                                                <div class="accordion">
                                                                    <div
                                                                        class="total-title">{{__('ordermodule::cart.cart_total')}}
                                                                        :
                                                                    </div>
                                                                    <h3>
                                                                        <span class="cart-total"><strong
                                                                                class="total-price subtotal_cal">{{number_format($total, 2)}}</strong></span>&nbsp;<small
                                                                            class="currency-text">{!! LanguageHelper::nameTranslate($order->currency) !!}</small>
                                                                    </h3>

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <ul class="list-inline pull-right continue">
                                                        <li>
                                                            <button type="button" class="con-btn next-step"
                                                                    onclick="getNextStep()">{{__('ordermodule::checkout.continue')}}</button>
                                                        </li>
                                                    </ul>
                                                </div>

                                            </div>
                                        </div>
                                        <div id="step2" style="display: none;">
                                            @php($sub_total = $order->sub_total)
                                            @include('ordermodule::admin.checkout_content.shipping_address')
                                            <ul class="list-inline pull-right continue">
                                                <li>
                                                    <button type="button" class="prev-step con-btn"
                                                            onclick="getPreviousStep()">{{__('ordermodule::checkout.previous')}}</button>
                                                </li>

                                                <li>
                                                    <button type="button" class="con-btn next-step"
                                                            onclick="getNextStep()">{{__('ordermodule::checkout.continue')}}</button>
                                                </li>
                                            </ul>
                                        </div>


                                        <div class="tab-pane" role="tabpanel" id="step3" style="display: none;">
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <h4>{{__('ordermodule::checkout.payment_method')}}</h4>
                                                    <div class="address_form_pay">
                                                        <div class="payment-div">
                                                            @foreach($paymentMethods as $key => $method)
                                                                <label for="p_method_{{$key}}">
                                                                    <input id="p_method_{{$key}}" value="{{$key}}"
                                                                           type="radio" name="payment_type"
                                                                           title="{{__('ordermodule::payment.'.$key)}}"
                                                                           {{ $key == 'cash_on_delivery' ? 'checked' : '' }}
                                                                           class="radio" autocomplete="off">
                                                                    <strong>{{__('ordermodule::payment.'.$key)}}</strong>
                                                                </label>
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                    <ul class="list-inline pull-right">
                                                        <li>
                                                            <button type="button" class="prev-step con-btn"
                                                                    onclick="getPreviousStep()">{{__('ordermodule::checkout.previous')}}</button>
                                                        </li>
                                                        <li>
                                                            <button type="button" class="con-btn next-step"
                                                                    onclick="updateOrder('{{url('admin/order/'.$order->id.'/update')}}','{{$order->id}}')">{{__('ordermodule::checkout.confirm')}}</button>
                                                        </li>
                                                        <h5 class="hidden" id="wait">
                                                            <strong>{{__('ordermodule::checkout.wait')}}</strong></h5>

                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>
                                        <div class="tab-pane" role="tabpanel" id="step4" style="display: none;">
                                            <div class="row">
                                                <div class="col-lg-2"></div>
                                                <div class="col-lg-8 text-center">
                                                    <div class="placard cart-items " style=" background: #efefef;">
                                                        <div class="text-center">
                                                            <h5>{{__('ordermodule::checkout.thanks')}}</h5>
                                                        </div>
                                                        <div class="text-center">
                                                            {{__('ordermodule::checkout.your_order_id')}} <strong
                                                                id="OrderNumber"><strong>
                                                                </strong></strong>
                                                        </div>
                                                        <strong><strong>
                                                            </strong></strong>
                                                    </div>
                                                    <ul class="list-inline pull-right">
                                                        <li>
                                                            <button type="button" class="prev-step con-btn"
                                                                    onclick="getPreviousStep()">{{__('ordermodule::checkout.previous')}}</button>
                                                        </li>
                                                        <a href="{{url('/')}}"
                                                           class="btn btn-primary">{{__('ordermodule::checkout.finish')}}</a>
                                                    </ul>
                                                </div>
                                                <div class="col-lg-2"></div>
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>
                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"
                     style="z-index: 99999999;
   top: 15%;">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title m-title2">{{__('ordermodule::checkout.cookie_error')}}</h5>
                            </div>
                            <div class="modal-body">
                                <ul class="mini-products-list modal-products">
                                </ul>
                                <div class="total-price2">
                                    <p style="font-size:21px">{{__('ordermodule::checkout.total')}} : <span
                                            class="total-num2"></span>{!! LanguageHelper::nameTranslate(Session::get('currency')) !!}
                                    </p>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" id="confirm_checkout"
                                        class="btn btn-success">{{__('ordermodule::checkout.confirm')}}</button>
                                <h5 style="display: inline-block;" class="hidden" id="wait1">
                                    <strong>{{__('ordermodule::checkout.wait')}}</strong></h5>
                                <button type="button" class="btn btn-danger" onclick="closemodal()"
                                        data-dismiss="modal">{{__('ordermodule::checkout.close')}}</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--  END CONTENT PART  -->

@endsection

@section('js')
    @include('commonmodule::includes.swal')
    @include('ordermodule::admin.checkout_content.checkout_scripts')
    <script type="text/javascript">
        $(document).ready(function () {
            //Initialize tooltips
            $('.nav-tabs > li a[title]').tooltip();

            //Wizard
            $('a[data-toggle="tab"]').on('show.bs.tab', function (e) {

                var $target = $(e.target);

                if ($target.parent().hasClass('disabled')) {
                    return false;
                }
            });

            $(".prev-step").click(function (e) {

                var $active = $('.wizard .nav-tabs li.active');
                prevTab($active);

            });
        });

        function nextTab(elem) {
            $(elem).next().find('a[data-toggle="tab"]').click();
        }

        function prevTab(elem) {
            $(elem).prev().find('a[data-toggle="tab"]').click();
        }

        function getNextStep() {
            var flag = 0;
            $('.c-progress-steps__step').each(function () {
                if ($(this).hasClass('current') && flag == 0) {
                    flag = 1;
                    if ($(this).attr('next') != '') {
                        $('#' + $(this).attr('next')).removeClass('done').addClass('current');
                        $(this).removeClass('current').addClass('done');

                        $('#' + $(this).attr('next_tab')).css('display', 'block');
                        $('#' + $(this).attr('tab')).css('display', 'none');

                    }

                }
            })

        }

        function getPreviousStep() {
            console.log('here');
            var flag = 0;
            $('.c-progress-steps__step').each(function () {
                if ($(this).hasClass('current') && flag == 0) {
                    flag = 1;
                    if ($(this).attr('previous') != '') {
                        $('#' + $(this).attr('previous')).removeClass('done').addClass('current');
                        $(this).removeClass('current').addClass('done');

                        $('#' + $(this).attr('previous_tab')).css('display', 'block');
                        $('#' + $(this).attr('tab')).css('display', 'none');

                    }

                }
            })
        }
    </script>
@endsection
