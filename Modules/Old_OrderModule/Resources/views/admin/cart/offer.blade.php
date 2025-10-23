@extends('commonmodule::layouts.master')

@section('title')
    {{__('ordermodule::admin.abandoned_carts')}}
@endsection
@section('css')
    <link rel="stylesheet" href="{{ asset('assets/admin/plugins/select2/select2.min.css')}}" type="text/css">

    <style>
        div#offer-details, .offer-view, .offer-price .price-val, .cart-offer-editable .offer-hide {
            display: none;
        }

        input[type="number"] {
            border: none;
            max-width: 100px;
            margin: 0 auto;
        }

        .cart-offer-editable .offer-view, .cart-offer-editable .offer-price .price-val, .cart-offer-editable div#offer-details {
            display: block;
        }
    </style>
@endsection
@section('content')
    <!--  BEGIN CONTENT PART  -->
    <div id="content" class="main-content">
        <div class="container">
            <div class="page-header">
                <div class="page-title">
                    <h3>{{__('ordermodule::admin.abandoned_carts')}}</h3>
                </div>
            </div>

            <div class="row">
                <div class="col-12 mt-5">
                    <div class="profile-info-section mb-4">
                        <div class="card" style="">
                            <div class="card-header">
                                <h4 class="mb-0"><i
                                        class="flaticon-user-6"></i> {{__('ordermodule::admin.customer_data')}}
                                </h4>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-5 col-xs-12">
                                        <p class="mb-2"><span
                                                class="usr-work-position">{{__('ordermodule::admin.user_id')}} </span>
                                            <span
                                                style="float:right">{{$user->first_name . ' ' . $user->last_name}} </span>
                                        </p>
                                        <p class="mb-2"><span
                                                class="usr-work-position">{{__('ordermodule::admin.mobile')}} </span>
                                            <span
                                                style="float:right">{{$user->phone}} </span></p>
                                    </div>
                                    <div class="col-lg-2"></div>
                                    <div class="col-lg-5">
                                        @can('users')
                                            <a href="{{url('admin/users/'.$user->id)}}"
                                               class="btn btn-info {{app()->isLocale('en') ? 'float-right' : 'float-left'}}">
                                                {{__('ordermodule::admin.customer_data')}}
                                            </a>
                                        @endcan
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            @can('update_cart')
                <div class="row">
                    <div class="col-12 mt-5">
                        <div class="profile-info-section mb-4">
                            <div class="card" style="">
                                <div class="card-header">
                                    <h4 class="mb-0"><i
                                            class="flaticon-user-6"></i> {{__('ordermodule::admin.add_product')}}
                                    </h4>
                                </div>
                                <div class="card-body">
                                    <form action="{{ route('admin.cart.store') }}" id="add_product_form" method="post">
                                        @csrf
                                        <input type="hidden" name="user_id" value="{{$user->id}}">
                                        <div class="row">
                                            <div class="col-lg-5 col-xs-12">
                                                <select class="disabled-results form-control custom-select"
                                                        name="product_id"
                                                        id="product_id_select">
                                                    <option value="" selected
                                                            disabled>{{__('ordermodule::admin.choose_product')}}</option>
                                                    @foreach($products as $product)
                                                        <option value="{{$product->id}}" data-type="{{$product->type}}">
                                                            {{ LanguageHelper::nameTranslate($product) }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            <div class="col-lg-5" id="combination_holder" style="display: none">
                                                <select class="form-control" name="combination"
                                                        id="combination_select"></select>
                                            </div>

                                            <div class="col-lg-2">
                                                <button type="submit" id="add_product_btn"
                                                        class="btn btn-info {{app()->isLocale('en') ? 'float-right' : 'float-left'}}">
                                                    {{__('ordermodule::admin.add_product')}}
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endcan

            <form id="cart-offer-form" class="" action="{{route('abandoned-cart.update', $user->id)}}" method="post">
                @csrf
                @method('put')

                <div class="row">

                    <div class="col-lg-12">
                        <div class="statbox widget box box-shadow">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="mb-0 {{app()->isLocale('ar') ? 'float-right' : 'float-left'}}"><i
                                            class="flaticon-cart-2"></i> {{__('ordermodule::admin.products')}}
                                    </h4>
                                    <a href="javascript:void(0);" id="allow-offer-edit"
                                       class="btn btn-success {{app()->isLocale('en') ? 'float-right' : 'float-left'}}">
                                        {{__('ordermodule::admin.add_temp_offer')}}
                                    </a>
                                </div>
                                <div class="widget-content widget-content-area">
                                    <table class="table table-hover table-bordered">
                                        <thead>
                                        <tr>
                                            <th>{{__('ordermodule::admin.product_name')}}</th>
                                            <th>{{__('ordermodule::admin.combination')}}</th>
                                            <th>{{__('ordermodule::admin.price')}}</th>
                                            <th>{{__('ordermodule::admin.quantity')}}</th>
                                            @can('update_cart')
                                                <th>{{__('ordermodule::admin.action')}}</th>
                                            @endcan
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($user->cart as $product)
                                            <tr id="p-{{$product->product_id}}-c-{{str_replace(',','-',$product->item_combination)}}">
                                                <td class="user-name"><span>{{$product->name}}</span></td>
                                                <td class="option-name"><span>{{$product->combination_name}}</span></td>
                                                <td class="offer-price">
                                                    <span class="offer-hide">{{$product->item_price}}</span>
                                                    <input type="number" name="offer_price[{{$product->id}}]"
                                                           class="price-val form-control form-control-rounded text-center"
                                                           value="{{$product->item_price}}" step="any">
                                                    <input type="hidden" name="old_price[{{$product->id}}]"
                                                           class="price-val form-control form-control-rounded text-center"
                                                           value="{{$product->item_price}}" step="any">
                                                </td>
                                                <td class="qty-text">
                                                    @can('update_cart')
                                                        <div class="">
                                                            <input type="number" name="quantity[{{$product->id}}]"
                                                                   class="form-control form-control-rounded text-center p-1 d-inline"
                                                                   value="{{$product->quantity}}" step="1" min="0">
                                                            <button type="button"
                                                                    class="btn btn-primary p-1 d-inline qty-btn"
                                                                    data-id="{{$product->id}}" data-toggle="tooltip"
                                                                    data-placement="top" title="Update">
                                                                <i class="flaticon-reload-bold"></i></button>
                                                        </div>
                                                    @else
                                                        <span class="qty-text">{{$product->quantity}}</span>
                                                    @endcan
                                                </td>
                                                @can('update_cart')
                                                    <td class="table-controls">
                                                        <a href="javascript:void(0);" class="remove-item"
                                                           data-id="{{$product->id}}" data-toggle="tooltip"
                                                           data-placement="top" title="Delete">
                                                            <i class="flaticon-delete bg-danger text-white p-2 br-4"></i></a>
                                                    </td>
                                                @endcan
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div id="offer-details" class="col-12 mt-5">
                        <div class="profile-info-section mb-4">
                            <div class="card" style="">
                                <div class="card-header">
                                    <h4 class="mb-0"><i
                                            class="flaticon-user-6"></i> {{__('ordermodule::admin.offer_details')}}
                                    </h4>
                                </div>
                                <div class="card-body">
                                    <div class="widget-content">
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <label for="offer_send_time">من</label>
                                                    <input type="datetime-local" class="form-control"
                                                           name="offer_send_time"
                                                           id="offer_send_time" required
                                                           min="{{\Carbon\Carbon::now()->format('Y-m-d\TH:i')}}"
                                                           value="{{\Carbon\Carbon::now()->format('Y-m-d\TH:i')}}">
                                                </div>
                                                <div class="col-lg-6">
                                                    <label for="offer_end_time">الى</label>
                                                    <input type="datetime-local" class="form-control"
                                                           name="offer_end_time"
                                                           id="offer_end_time" required
                                                           min="{{\Carbon\Carbon::now()->format('Y-m-d\TH:i')}}"
                                                           value="{{\Carbon\Carbon::now()->addHour()->format('Y-m-d\TH:i')}}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <button type="submit"
                                                    class="btn btn-info">{{ __('ordermodule::admin.save') }}</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </form>

        </div>
    </div>
    <!--  END CONTENT PART  -->

@stop

@section('js')
    <script src="{{ asset('assets/admin/plugins/select2/select2.min.js')}}"></script>
    <script src="{{ asset('assets/admin/plugins/select2/custom-select2.js')}}"></script>
    @include('commonmodule::includes.swal')
    @include('ordermodule::admin.cart.admin_cart_scripts')
@endsection
