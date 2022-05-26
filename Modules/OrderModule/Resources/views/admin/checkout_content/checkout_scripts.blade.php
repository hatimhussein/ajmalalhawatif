@include('commonmodule::front.includes.basic_area_scripts')
<script type="text/javascript">

    function deleteProduct(url) {
        if (confirm('{{__('ordermodule::admin.delete_product')}}'))
            $.ajax({
                type: "get",
                url: url,
                success: function (data) {
                    if (data == '1') {
                        location.reload();
                    } else {
                        swal('{{__('ordermodule::admin.error_delete_product')}}')
                    }
                }

            });
    }

    function updateQuantity(quantity, url) {
        $.ajax({
            type: "get",
            url: url,
            data: {'quantity': quantity},
            success: function (data) {
                if (data == '1') {
                    location.reload();
                } else {
                    swal('{{__('ordermodule::admin.quantity_error')}}')
                }
            }

        });
    }

    function updateOrder(url, id) {

        var form = document.getElementById('checkout_form');
        token = '{{csrf_token()}}';
        var formdata = new FormData(document.querySelector('#checkout_form'));
        formdata.append("_token", token);
        formdata.append("confirm", true);
        console.log(formdata);
        $.ajax({
            type: "post",
            url: url,
            data: formdata,
            processData: false,
            contentType: false,
            success: function (data) {
                if (data == '1') {
                    window.location.href = "{{url('admin/order/')}}/" + id;
                } else {
                    swal('يبسيب');
                }
            }
        });
    }


    $('.billing-address-select').on('change', function () {

        if ($(this).val() == 'old') {
            $('#new_address').addClass('hidden');
            $('#old_address').removeClass('hidden');
        } else {
            $('#new_address').removeClass('hidden');
            $('#old_address').addClass('hidden');

            $('#new_address').removeClass('hidden');

        }

    });


    $("#confirm_checkout").on('click', function (event) {
        event.preventDefault();
        $('#confirm_checkout').addClass('hidden');
        $('#wait1').removeClass('hidden');

        var form = document.getElementById('checkout_form');
        token = '{{csrf_token()}}';
        var formdata = new FormData(document.querySelector('#checkout_form'));
        formdata.append("_token", token);
        formdata.append("confirm", true);

        $.ajax({
            'type': 'post',
            'url': '{{ url("do-checkout") }}',
            data: formdata,
            processData: false,
            contentType: false,
            'statusCode': {
                200: function (response) {

                    if (response.code == 201) {
                        toastr["error"](response.message);
                        $('#confirm_checkout').removeClass('hidden');
                        $('#wait1').addClass('hidden');
                    } else if (response.code == 202) {
                        toastr["error"](response.data.message);

                        setTimeout(function () {
                            window.location = "/order/" + response.data.order_id;

                        }, 3000);
                    } else if (response.code == 203) {
                        toastr["error"](response.data.message);
                        $('.modal-body').html(response.data.data);
                        $('.modal-title').text(response.data.total);

                        $.map(response.data.data, function (item) {
                            $('.modal-body').append('<li class="item even ' + item.product_id + '">' +
                                '<a class="product-image" href="/product-details/' + item.product_id + '" title="Downloadable Product ">' +
                                '<img alt="Downloadable Product " src="{{asset('images/product/')}}/' + item.item_photo + '" width="80">' +
                                '</a>' +
                                '<div class="detail-item">' +
                                '<div class="product-details"> <a href="/product-details/' + item.product_id + '"  data-product_id="' + item.product_id + '" data-item_combination="' + item.item_combination + '" title="Remove This Item" onClick=""' +
                                'class="glyphicon glyphicon-remove remove-item">&nbsp;</a> ' +
                                '<p class="product-name"> <a href="/product-details/' + item.product_id + '" title="Downloadable Product">' + item.item_name + ' </a>' +
                                '</p>' +
                                '</div>' +
                                '<div class="product-details-bottom"> <span class="price">' + item.item_price + '</span> <span' +
                                'class="title-desc">Qty:</span> <strong>' + item.quantity + '</strong> </div>' +
                                '</div>' +
                                '</li>');
                        });

                        $('.modal').show();
                    } else {
                        toastr["success"]("{{__('ordermodule::order.order_success')}}")
                        $('input').val('');

                        window.location = "/order/" + response.data;
                    }

                },
                422: function (response) {
                    $('.btn-proceed-checkout').removeClass('hidden');
                    $('#wait').addClass('hidden');

                    $.map(response.responseJSON.errors, function (error) {
                        toastr["error"](error)
                    });

                }
            },
        });

    });

    function closemodal() {
        $('.modal').hide();
        $('.btn-proceed-checkout').removeClass('hidden');
        $('#wait').addClass('hidden');

    }

    $("#checkout_form").submit(function (event) {
        event.preventDefault();
        $('.btn-proceed-checkout').addClass('hidden');
        $('#wait').removeClass('hidden');


        var currency = "{!! LanguageHelper::nameTranslate(Session::get('currency')) !!}";


        var form = document.getElementById('checkout_form');
        token = '{{csrf_token()}}';
        var formdata = new FormData(document.querySelector('#checkout_form'));
        formdata.append("_token", token);

        $.ajax({
            'type': 'post',
            'url': '{{ url("do-checkout") }}',
            data: formdata,
            processData: false,
            contentType: false,
            'statusCode': {
                200: function (response) {

                    if (response.code == 201) {
                        toastr["error"](response.message);
                        $('.btn-proceed-checkout').removeClass('hidden');
                        $('#wait').addClass('hidden');
                    } else if (response.code == 202) {
                        toastr["error"](response.data.message);
                        $('#OrderNumber').text(response.data.order_id);
                        $('#cart-sidebar').html('');
                        $('#cart-total').text('0');
                        getNextStep();
                        // setTimeout(function(){
                        //   window.location = "/order/done/"+response.data.order_id;
                        //
                        // },3000);
                    } else if (response.code == 203) {
                        $('.modal-products').html(response.data.data);
                        $('.total-num2').text(response.data.total);


                        $.map(response.data.data, function (item) {

                            $('.modal-products').append('<li class="item even ' + item.product_id + '">' +
                                '<div class="media-left"> <a href="/product-details/' + item.product_id + '" class="thumb">' +
                                '<img  src="{{asset('images/product/')}}/' + item.item_photo + '" class="img-responsive" alt=""> </a> </div>' +
                                '<div class="media-body">' +
                                '<a href="/product-details/' + item.product_id + '" class="tittle">' + item.item_name + '</a>' +
                                '<span>' + item.item_price + ' ' + currency + ' </span>' +
                                '<span>{{__('ordermodule::cart.quantity')}} : ' + item.quantity + '</span>' +
                                '</div>' +
                                '</li>');


                        });

                        $('.modal').show();
                    } else {
                        toastr["success"]("{{__('ordermodule::order.order_success')}}")
                        $('input').val('');
                        $('#OrderNumber').text(response.data);
                        $('#cart-sidebar').html('');
                        $('#cart-total').text('0');
                        getNextStep();
                        // window.location = "/order/done/"+response.data;
                    }

                },
                422: function (response) {
                    $('.btn-proceed-checkout').removeClass('hidden');
                    $('#wait').addClass('hidden');

                    $.map(response.responseJSON.errors, function (error) {
                        toastr["error"](error)
                    });

                }
            },
        });

    });


    $("input[name='shipping_address_id'],#government_id").on('change', function (event) {
        event.preventDefault();
        var shipping_address_id = $(this).val();
        var type = $(this).data('from');
        var sub_total = parseFloat($('input[name="sub_total"]').val());

        if (!shipping_address_id) {
            $('#shipping_cost').text(0);
            $('#total').text(sub_total);

            return;
        }
        $.ajax({
            'type': 'get',
            'url': '{{ url("shipping-cost") }}',
            data: {shipping_address_id, type},
            'statusCode': {
                200: function (response) {

                    var total = sub_total + response.data;

                    $('#shipping_cost').text(response.data);
                    $('#total').text(total);
                    $('#final-total').text(total);

                },
                422: function (response) {

                    $.map(response.responseJSON.errors, function (error) {
                        toastr["error"](error)
                    });

                }
            },
        });

    });


    $("#check_voucher").on('click', function (event) {
        event.preventDefault();

        var code = $('#coupon_code').val();

        $.ajax({
            'type': 'post',
            'url': '{{ url("check-code") }}',
            data: {code, '_token': "{{csrf_token()}}"},
            'statusCode': {
                200: function (response) {

                    if (response.code == 201)
                        toastr["error"](response.message);
                    else {
                        var message = response.data.message + ' ' + response.data.amount + ' ' + response.data.currency;
                        $('.discount').html("<h4>" + message + "</h4>" +
                            "<input type='hidden' name='coupon_code' value='" + response.data.code + "'>");
                        $('#discount_amount').text(response.data.amount);
                        $('#total_after_discount').text(response.data.total);
                        $('.discount_value').removeClass('hidden');
                        $('input[name="sub_total"]').val(response.data.total);


                        $('#total').text(response.data.total + parseFloat($('#shipping_cost').text()));
                        $('#final-total').text(response.data.total + parseFloat($('#shipping_cost').text()));
                        toastr["success"](message);


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

    function createOrder(url) {

        var form = document.getElementById('checkout_form');
        token = '{{csrf_token()}}';
        var formdata = new FormData(document.querySelector('#checkout_form'));
        formdata.append("_token", token);
        formdata.append("confirm", true);
        $.ajax({
            type: "post",
            url: url,
            data: formdata,
            processData: false,
            contentType: false,
            statusCode: {
                200: function (response) {
                    if (response.code == 200) {
                        window.location.href = "{{url('admin/order/')}}/" + response.data;
                    } else {
                        swal(response.message);
                    }
                }
            },


        });
    }


</script>
