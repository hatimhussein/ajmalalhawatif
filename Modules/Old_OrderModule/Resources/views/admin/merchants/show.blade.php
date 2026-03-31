@extends('commonmodule::layouts.master')

@section('title')
    {{__('ordermodule::admin.order_details')}}
@endsection
@section('css')
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

                <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12">
                    <div class="profile-info-section hgt mb-4">
                        <div class="card" style="">
                            <div class="card-header">
                                <h4 class="mb-0 text-center"><i
                                        class="flaticon-money"></i> {{__('ordermodule::admin.payment_details')}}</h4>
                            </div>
                            <div class="card-body">
                                <p class="mb-2"><span
                                        class="usr-work-position"> {{__('ordermodule::admin.order_id')}}</span> <span
                                        style="float:right">{{$order->id}} </span></p>
                                <p class="mb-2"><span
                                        class="usr-work-position"> {{__('ordermodule::admin.date')}}</span> <span
                                        style="float:right">{{$order->created_at}}</span></p>
                                <p class="mb-2"><span
                                        class="usr-work-position"> {{__('ordermodule::admin.subtotal')}}</span> <span
                                        style="float:right">{{$order->sub_total}} {{$order->order_currency}}</span></p>
                                <p class="mb-2"><span
                                        class="usr-work-position"> {{__('ordermodule::admin.discount')}}</span> <span
                                        style="float:right">{{$order->discount}} {{$order->order_currency}}</span></p>
                                <p class="mb-2">
                                    <span class="usr-work-position"> {{__('ordermodule::admin.shipping_cost')}}</span>
                                    <span style="float:right">{{$order->shipping}} {{$order->order_currency}}</span>
                                </p>
                                <p class="mb-2">
                                    <span class="usr-work-position"> {{__('ordermodule::admin.gift_cost')}}</span> <span
                                        style="float:right">{{$order->gift_cost}} {{$order->order_currency}}</span>
                                </p>
                                <p class="mb-2">
                                    <span class="usr-work-position"> {{__('ordermodule::admin.total')}}</span> <span
                                        style="float:right">{{$order->total}} {{$order->order_currency}}</span>
                                </p>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12">
                    <div class="profile-info-section hgt mb-4">
                        <div class="card" style="">
                            <div class="card-header">
                                <h4 class="mb-0 text-center"><i
                                        class="flaticon-location-line"></i> {{__('ordermodule::admin.shipping_address')}}
                                </h4>
                            </div>

                            <div class="card-body">
                                <p class="mb-2"><span
                                        class="usr-work-position">{{__('ordermodule::order.country')}}</span> <span
                                        style="float:right">
                              @if($order->userAddresses->getCountry!=null)
                                            {!! LanguageHelper::nameTranslate($order->userAddresses->getCountry) !!}
                                        @endif
                             </span></p>
                                <p class="mb-2"><span class="usr-work-position">{{__('ordermodule::admin.zone')}}</span>
                                    <span style="float:right">
                              @if($order->userAddresses->getGovernment!=null)
                                            {!! LanguageHelper::nameTranslate($order->userAddresses->getGovernment) !!}
                                        @endif
                             </span></p>
                                <p class="mb-2"><span class="usr-work-position">{{__('ordermodule::admin.city')}}</span>
                                    <span style="float:right">
                              @if($order->userAddresses->getcity!=null)
                                            {!! LanguageHelper::nameTranslate($order->userAddresses->getcity) !!}
                                        @endif

                            </span></p>
                                <p class="mb-2"><span
                                        class="usr-work-position">{{__('ordermodule::admin.government')}}</span> <span
                                        style="float:right">
                              @if($order->userAddresses->getZone!=null)
                                            {!! LanguageHelper::nameTranslate($order->userAddresses->getZone) !!}
                                        @endif

                             </span></p>
                                <p class="mb-2"><span
                                        class="usr-work-position">{{__('ordermodule::admin.address')}}</span> <span
                                        style="float:right">{{$order->userAddresses->address}} </span></p>


                            </div>
                        </div>
                    </div>

                </div>

                <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12">
                    <div class="profile-info-section hgt mb-4">
                        <div class="card" style="">
                            <div class="card-header">
                                <h4 class="mb-0 text-center"><i
                                        class="flaticon-cart-fill"></i> {{__('ordermodule::admin.order_details')}}</h4>
                            </div>

                            <div class="card-body">

                                @if($order->send_gift)
                                    <p class="mb-2 text-center">
                                        <span class="usr-work-position">
                                            {{__('ordermodule::admin.send_gift')}}
                                        </span>
                                    </p>
                                @endif

                                <p class="mb-2"><span
                                        class="usr-work-position">{{__('ordermodule::admin.coupon_code')}}</span> <span
                                        style="float:right">{{($order->coupon_code) ?? 'لا يوجد'}} </span></p>
                                <p class="mb-2"><span
                                        class="usr-work-position">{{__('ordermodule::admin.payment_type')}} </span>
                                    <span
                                        style="float:right">{{__('ordermodule::payment.'.$order->payment_type)}} </span>
                                </p>
                                <p class="mb-2"><span
                                        class="usr-work-position">{{__('ordermodule::admin.shipping_time')}} </span>
                                    <span style="float:right">{{$order->delivery_time}} </span></p>
                                <p class="mb-2"><span
                                        class="usr-work-position">{{__('ordermodule::admin.comment')}} </span> <span
                                        style="float:right">{{($order->comment)?? 'لا يوجد'}} </span></p>

                            </div>
                        </div>
                    </div>

                </div>

                <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12">
                    <div class="profile-info-section hgt mb-4">
                        <div class="card" style="">
                            <div class="card-header">
                                <h4 class="mb-0 text-center"><i
                                        class="flaticon-user-6"></i> {{__('ordermodule::admin.customer_data')}}</h4>
                            </div>

                            <div class="card-body">

                                <p class="mb-2"><span
                                        class="usr-work-position">{{__('ordermodule::admin.user_id')}} </span> <span
                                        style="float:right">{{$order->user->name}} </span>
                                </p>
                                <p class="mb-2"><span
                                        class="usr-work-position">{{__('ordermodule::admin.mobile')}} </span> <span
                                        style="float:right">{{$order->user->phone}} </span></p>

                                <p class="mb-2"><span
                                        class="usr-work-position">{{__('usermodule::admin.email')}} </span> <span
                                        style="float:right">{{$order->user->email}} </span>
                                </p>

                            </div>
                        </div>
                    </div>

                </div>


                <div class="col-lg-12">
                    <div class="statbox widget box box-shadow">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="mb-0"><i class="flaticon-cart-2"></i> {{__('ordermodule::admin.products')}}
                                </h4>
                            </div>
                            <div class="widget-content widget-content-area">
                                <table class="table table-hover table-bordered">
                                    <thead>
                                    <tr>
                                        <th>{{__('ordermodule::admin.product_name')}}</th>
                                        <th>{{__('ordermodule::admin.price')}}</th>
                                        <th>{{__('ordermodule::admin.quantity')}}</th>
                                        <th>{{__('ordermodule::admin.combination')}}</th>
                                        <th>{{__('ordermodule::admin.total')}}</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($order->products as $product)

                                        <tr>
                                            <td class="user-name"><span>{{$product->name_ar}}</span></td>
                                            <td class="user-name">
                                                <span>{{$product->pivot->item_price}} {{$order->order_currency}}</span>
                                            </td>
                                            <td class="user-name"><span>{{$product->pivot->quantity}}</span></td>
                                            <td class="user-name">
                                                <span>{{$product->pivot->item_combination_name}}</span></td>
                                            <td class="user-name">
                                                <span>{{$product->pivot->item_price * $product->pivot->quantity}} {{$order->order_currency}}</span>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="col-12 mt-5">
                    <div class="profile-info-section mb-4">
                        <div class="card" style="">
                            <div class="card-header">
                                <h4 class="mb-0"><i class="flaticon-user-6"></i> {{__('ordermodule::admin.statuses')}}
                                </h4>
                            </div>
                            <div class="card-body">
                                @if($order->current_status_type_id == 1)
                                    @can('order_status_change')
                                        <form action="{{url('admin/order/update-status')}}" method="POST">
                                            @csrf
                                            <input type="hidden" name="order_id" value="{{$order->id}}">
                                            <div class="">
                                                <select name="status_id" class="form-control text-center"
                                                        data-validate-func="required" data-validate-arg="6"
                                                        data-validate-hint="{{__('ordermodule::admin.status')}}"
                                                        autocomplete="off" required>
                                                    <option disabled selected
                                                            value="">{{__('ordermodule::admin.status')}}</option>
                                                    @foreach($statuses as $status)

                                                        <option value="{{$status->id}}">{{$status->title}}</option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            <div class="form-row mt-4">
                                                <div class="input-control col-md-12 mb-0 ">
                                                    <textarea name="status_comment" class="form-control ckeditor"
                                                              placeholder="{{__('ordermodule::admin.comment')}}"
                                                              autocomplete="off"></textarea>
                                                </div>
                                            </div>

                                            <div class="form-row ">
                                                <div class="col-md-12 mb-4">
                                                    <button
                                                        class="mt-4 btn btn-button-16">{{__('ordermodule::admin.update')}} </button>
                                                </div>
                                            </div>
                                        </form>
                                    @endcan
                                @endif

                                <div class="widget-content">
                                    <table class="table table-hover table-bordered">
                                        <thead>
                                        <tr>
                                            <th class="status">{{__('ordermodule::admin.status')}}</th>
                                            <th class="status">{{__('ordermodule::admin.date')}}</th>
                                            <th class="status">{{__('ordermodule::admin.comment')}}</th>

                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($order->status as $status)

                                            <tr>
                                                <td class="user-name"><span>{{$status->title}}</span></td>
                                                <td class="user-name"><span>{{$status->pivot->created_at}}</span></td>
                                                <td class="user-name"><span>{{$status->pivot->status_comment }}</span>
                                                </td>

                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>

                            </div>

                        </div>
                    </div>

                </div>

            </div>


        </div>
    </div>
    <!--  END CONTENT PART  -->




@stop

@section('js')
    @include('commonmodule::includes.swal')
@endsection
