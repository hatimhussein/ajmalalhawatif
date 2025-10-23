@extends('commonmodule::layouts.master')

@section('title')
    {{__('ordermodule::admin.order_details')}}
@endsection
@section('css')
    <link rel="stylesheet" href="{{ asset('assets/admin/plugins/select2/select2.min.css')}}" type="text/css">
@endsection
@section('content')
    <!--  BEGIN CONTENT PART  -->
    <div id="content" class="main-content">
        <div class="container">
            <div class="page-header">
                <div class="page-title">
                    <h3>{{__('ordermodule::admin.order_details')}}</h3>
                </div>
                {{--                <div class="page-title">--}}
                {{--                    <button type="button" class="btn btn-info p-1 pl-3 pr-3 text-white br-6"--}}
                {{--                            data-toggle="tooltip" data-placement="top" data-original-title="Offer">--}}
                {{--                        <i class="flaticon-edit"></i>--}}
                {{--                    </button>--}}
                {{--                </div>--}}
            </div>
            @can('assign_order')
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-6 col-sm-12">
                        <div class="profile-info-section hgt mb-4">
                            <div class="card" style="min-height: unset">
                                <div class="card-header">
                                    <h4 class="mb-0 text-center"><i
                                            class="flaticon-money"></i> {{__('ordermodule::admin.order_employees')}}
                                    </h4>
                                </div>
                                <div class="card-body">
                                    <div class="statbox widget box box-shadow">
                                        <div class="widget-content ">
                                            <label>{{__('ordermodule::admin.order_employees')}}</label>

                                            <select id="admins_ids" name="admins_ids[]" multiple="multiple"
                                                    class="disabled-results form-control custom-select">
                                                <option
                                                    value="all">{{__('adminmodule::admin.select_all')}}</option>
                                                @foreach($admins as $admin)
                                                    <option
                                                        {{(in_array($admin->id, $orderAdminIds)?'selected':'')}} value="{{$admin->id}}">{{$admin->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="row">
                                            <button id="assignAdmins" class="btn btn-info">Save</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            @endcan
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
                                        {{--                    @php($no_tax_sub_total = $order->sub_total / (1+($order->tax_percentage/100)))--}}
                                        <?php $tot = $order->sub_total / (1+($order->tax_percentage/100))?>
                                        style="float:right">{{$tot}} {{$order->order_currency}}</span></p>
                                <p class="mb-2"><span
                                        class="usr-work-position"> {{__('ordermodule::admin.discount')}}</span> <span
                                        style="float:right">{{$order->discount}} {{$order->order_currency}}</span></p>
                                <p class="mb-2"><span
                                        class="usr-work-position"> {{__('ordermodule::admin.shipping_cost')}}</span>
                                    <span style="float:right">{{$order->untaxed_shipping}} {{$order->order_currency}}</span></p>
                                <p class="mb-2">
                                    <span class="usr-work-position"> {{__('ordermodule::admin.gift_cost')}}</span> <span
                                        style="float:right">{{$order->gift_cost}} {{$order->order_currency}}</span>
                                </p>
                                <p class="mb-2">
                                    <span class="usr-work-position"> {{__('ordermodule::admin.tax')}}</span> <span
                                        style="float:right">@if($order->tax_percentage)%{{$order->tax_percentage}} @else
                                            - @endif </span>
                                </p>
                                <p class="mb-2"><span
                                        class="usr-work-position"> {{__('ordermodule::admin.total')}}</span> <span
                                        <?php $end_tot = ((((($tot - $order->discount) + $order->untaxed_shipping) * $order->tax_percentage) / 100) + (($tot - $order->discount) + $order->untaxed_shipping))  ?>
                                        style="float:right">{{$end_tot}} {{$order->order_currency}}</span></p>
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
                              @if($order->userAddresses)
                                            {!! LanguageHelper::nameTranslate($order->userAddresses->getCountry??'') !!}
                                        @endif
                             </span></p>
                                <p class="mb-2"><span class="usr-work-position">{{__('ordermodule::admin.zone')}}</span>
                                    <span style="float:right">
                              @if($order->userAddresses)
                                            {!! LanguageHelper::nameTranslate($order->userAddresses->getGovernment??'') !!}
                                        @endif
                             </span></p>
                                <p class="mb-2"><span class="usr-work-position">{{__('ordermodule::admin.city')}}</span>
                                    <span style="float:right">
                              @if($order->userAddresses)
                                            {!! LanguageHelper::nameTranslate($order->userAddresses->getcity??'') !!}
                                        @endif

                            </span></p>
                                <p class="mb-2"><span
                                        class="usr-work-position">{{__('ordermodule::admin.government')}}</span> <span
                                        style="float:right">
                              @if($order->userAddresses)
                                            {!! LanguageHelper::nameTranslate($order->userAddresses->getZone??'') !!}
                                        @endif

                             </span></p>
                                <p class="mb-2"><span
                                        class="usr-work-position">{{__('ordermodule::admin.address')}}</span> <span
                                        style="float:right">{{$order->userAddresses->address??''}} </span></p>


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
                                        <span style="float:right"> </span>
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
                                    <span
                                        style="float:right">{{$order->deliverytime->name ?? ''}} </span>
                                </p>
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

                                <p class="mb-2">
                                    <span class="usr-work-position">{{__('usermodule::admin.email')}} </span>
                                    <span style="float:right">{{$order->user->email}} </span>
                                </p>

                                <p class="mb-2">
                                    <span class="usr-work-position">{{__('usermodule::admin.price_level')}} </span>
                                    <span
                                        style="float:right">
                                        {{__('usermodule::admin.price_level'.$order->prices_level)}}
                                    </span>
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
                                                <span> {{$product->pivot->item_price / (1+(($order->tax_percentage ?? 0)/100)) }} {{$order->order_currency}}</span>
                                            </td>
                                            <td class="user-name"><span>{{$product->pivot->quantity}}</span></td>
                                            <td class="user-name">
                                                <span>{{$product->pivot->item_combination_name}}</span></td>
                                            <td class="user-name">
                                                <span>{{($product->pivot->item_price / (1+(($order->tax_percentage ?? 0)/100)))  * $product->pivot->quantity}} {{LanguageHelper::nameTranslate($order->currency)}}</span>
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
                                    <!--  <form action="{{url('admin/order/update-status')}}" method="POST">
                                            @csrf -->
                                        <input type="hidden" name="order_id" id="order_id" value="{{$order->id}}">
                                        <div class="">
                                            <select name="status_id" id="status_id" class="form-control text-center"
                                                    data-validate-func="required" data-validate-arg="6"
                                                    data-validate-hint="{{__('ordermodule::admin.status')}}"
                                                    autocomplete="off" required>
                                                <option disabled selected
                                                        value="">{{__('ordermodule::admin.status')}}</option>
                                                @foreach($statuses as $status)
                                                    @if($status->id > $order->current_status_id)
                                                        <option value="{{$status->id}}">{{$status->title}}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="form-row mt-4">
                                            <div class="input-control col-md-12 mb-0 ">
                                                    <textarea name="status_comment" id="status_comment"
                                                              class="form-control ckeditor"
                                                              placeholder="{{__('ordermodule::admin.comment')}}"
                                                              autocomplete="off"></textarea>
                                            </div>
                                        </div>

                                        <div class="form-row ">
                                            <div class="col-md-12 mb-4">
                                                <button
                                                    class="mt-4 btn btn-button-16 update_status"> {{__('ordermodule::admin.update')}}  </button>
                                            <!--  <button
                                                        class="mt-4 btn btn-button-16">{{__('ordermodule::admin.update')}} </button> -->
                                            </div>
                                        </div>
                                        <!-- </form> -->
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



    <div class="modal fade" id="uploadModal" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel"
         aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="loginModalLabel">{{__('productmodule::admin.type_password')}}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{url('admin/order/update-status')}}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="modalpass" class="col-form-label">{{__('productmodule::admin.password')}}
                                :</label>
                            <input type="hidden" name="modal_order_id" id="modal_order_id">
                            <input type="hidden" name="modal_status_id" id="modal_status_id">
                            <input type="hidden" name="modal_status_comment" id="modal_status_comment">
                            <input type="text" name="password" required
                                   placeholder="{{__('productmodule::admin.password')}}" class="form-control">
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">{{__('ordermodule::admin.update')}}</button>
                </div>
                </form>
            </div>
        </div>
    </div>
@stop

@section('js')
    @include('commonmodule::includes.swal')

    <script src="{{ asset('assets/admin/plugins/select2/select2.min.js')}}"></script>
    <script src="{{ asset('assets/admin/plugins/select2/custom-select2.js')}}"></script>

    <script>
        $("#admins_ids").on('select2:select select2:unselect', function (e) {

            let notSelected = $(this).find('option').not('option:selected').not('option[value="all"]');

            if (e.params.data.id == 'all') {

                if (notSelected.length) {
                    notSelected.prop('selected', true);
                } else {
                    $(this).find('option').prop('selected', false);
                }
            }
            $(this).find('option[value="all"]').prop('selected', false);
            $(this).change();
        });

        /**
         *
         * */
        $("#assignAdmins").click(function (event) {
            event.preventDefault();
            let clicked = $(this);
            let oldHtml = clicked.html();
            clicked.prop('disabled', true);
            clicked.html('<div class="cp-spinner cp-skeleton"></div>');
            let admin_ids = $('#admins_ids').val().join(',');
            let token = "{{ csrf_token() }}"

            $.ajax({
                'type': 'post',
                'url': '{{ url("admin/assignOrderAdmins/". $order->id) }}',
                data: {_token: token, admin_ids: admin_ids},

                'statusCode': {
                    200: function (response) {
                        $(clicked).html(oldHtml);
                        clicked.prop('disabled', false);
                        if (response.code == 201) {
                            swal("Error", response.message, "error", {button: "Ok",});
                            setTimeout(() => {
                                window.location.reload();
                            }, 3000)
                        } else {
                            swal("{{__('productmodule::admin.done')}}", "{{__('commonmodule::validation.updated')}}", "success", {button: "Ok",});
                        }
                    },
                    422: function (response) {
                        $.map(response.responseJSON.errors, function (error) {
                            if (error[0])
                                swal("Error", error[0], "error", {button: "Ok",});
                        });
                        clicked.prop('disabled', false);
                        $(clicked).html(oldHtml);
                    }
                },
            });

        });
    </script>
@endsection
