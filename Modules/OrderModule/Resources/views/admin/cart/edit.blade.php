@extends('commonmodule::layouts.master')

@section('title')
    {{__('ordermodule::admin.abandoned_carts')}}
@endsection
@section('css')

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
                                            <th>{{__('ordermodule::admin.action')}}</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($user->cart as $product)
                                            <tr id="p-{{$product->product_id}}-c-{{str_replace(',','-',$product->item_combination)}}">
                                                <td class="user-name"><span>{{$product->name}}</span></td>
                                                <td class="option-name"><span>{{$product->combination_name}}</span></td>
                                                <td class="offer-price">
                                                    <span class="price-text">{{$product->item_price}}</span>
                                                </td>
                                                <td class="qty-text">
                                                    <span>{{$product->quantity}}</span>
                                                    <input type="number" name="quantity[{{$product->id}}]"
                                                           class="form-control form-control-rounded text-center"
                                                           value="{{$product->quantity}}" step="1" min="0">
                                                </td>
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
    @include('commonmodule::includes.swal')

    <script>
        $('#allow-offer-edit').click(() => {
            $('#cart-offer-form').toggleClass('cart-offer-editable')
        });

        $("#cart-offer-form").submit(function (event) {
            event.preventDefault();
            $(this).formValidate;
            let submitter = $('button[type="submit"]');
            submitter_loading(submitter)

            let offerdata = new FormData(this);
            $.ajax({
                'type': 'post',
                'url': $(this).attr('action'),
                data: offerdata,
                processData: false,
                contentType: false,

                'statusCode': {
                    200: function (response) {
                        submitter_loaded(submitter);
                        if (response.code == 201) {
                            swal("Error", response.message, "error", {button: "Ok",});
                        } else {
                            swal("{{__('productmodule::admin.done')}}", "{{__('productmodule::admin.added_successfully')}}", "success", {button: "Ok",});
                            // window.location.reload();
                        }
                    },
                    422: function (response) {
                        submitter_loaded(submitter);
                        $.map(response.responseJSON.errors, function (error) {
                            if (error[0])
                                swal("Error", error[0], "error", {button: "Ok",});
                        });
                    }
                },
            });

        });

        function submitter_loading(submitter) {
            submitter.html('<div class="cp-spinner cp-skeleton"></div>');
            submitter.prop('disabled', true);
        }

        function submitter_loaded(submitter) {
            submitter.html("{{ __('ordermodule::admin.save') }}");
            submitter.prop('disabled', false);
        }
    </script>
@endsection
