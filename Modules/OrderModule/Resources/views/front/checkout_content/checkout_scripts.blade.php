@include('commonmodule::front.includes.area_scripts')

<script type="text/javascript">

    function closemodal() {
        $('.modal').hide();
        $('.btn-proceed-checkout').removeClass('hidden');
        $('#wait').addClass('hidden');
    }

    $('#billing-address-select').on('change', function () {
        if ($(this).val()) {
            $('#new_address').addClass('hidden');
        } else {
            $('#new_address').removeClass('hidden');

        }
    });

    $("#confirm_checkout").on('click', function (event) {
        event.preventDefault();
        $('#confirm_checkout').addClass('hidden');
        $('#wait1').removeClass('hidden');

        var form = document.getElementById('checkout_form');
        token = '{{csrf_token()}}';
        var tax_percentage;
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


    $("#checkout_form").submit(function (event) {
        event.preventDefault();
        $('.btn-proceed-checkout').addClass('hidden');
        $('#wait').removeClass('hidden');

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

                        setTimeout(function () {
                            window.location = "/order/" + response.data.order_id;

                        }, 3000);
                    } else if (response.code == 203) {
                        $('.modal-products').html(response.data.data);
                        $('.total-num2').text(response.data.total);

                        $.map(response.data.data, function (item) {
                            $('.modal-products').append('<li class="item even ' + item.product_id + '">' +
                                '<a class="product-image" href="/product-details/' + item.product_id + '" title="Downloadable Product ">' +
                                '<img alt="Downloadable Product " src="{{asset('images/product/')}}/' + item.item_photo + '" width="80">' +
                                '</a>' +
                                '<div class="detail-item">' +
                                '<div class="product-details">' +
                                '<p class="product-name"> <a href="/product-details/' + item.product_id + '" title="Downloadable Product">' + item.item_name + ' </a>' +
                                '</p>' +
                                '</div>' +
                                '<div class="product-details-bottom"> <span class="price">' + item.item_price + '</span> <span' +
                                'class="title-desc">Qty:</span> <strong>' + item.quantity + '</strong> </div>' +
                                '</div>' +
                                '</li>');
                        });

                        $('.modal').show();
                    } else if (response.code == 100) {
                        window.location = response.message;
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


    $("#billing-address-select,#city_id").on('change', function (event) {
        event.preventDefault();
        var type = $(this).data('from');
        let id = 0;
        let city_id = 0;
        if (type == 'address') {
            id = $(this).val();
            if (!id) {
                $('#shipping_cost_inp').val(0);
                $('#shipping_cost').text(0);
                updateTotal();
                return true;
            }
        } else {
            id = $("#country_id").val();
            city_id = $("#city_id").val();
        }

        $.ajax({
            type: 'get',
            url: '{{ url("getShippingWithTax") }}',
            data: {'id': id, 'city_id': city_id, 'type': type},
            dataType: 'json',
            success: function (response) {
                let data = response.data;
                $("#tax_value").val(data.tax_value);
                $("#tax_span").text(`${data.tax_value} %`);
                $('#shipping_cost_inp').val(data.shipping_cost);
                $('#shipping_cost').text(data.shipping);
                updateTotal();
            }
        });
    });

    function updateTotal() {
        let tax_value = $("#tax_value").val();
        let untaxed_total = $('#sub_total').val();
        let gift_cost = $('#gift_cost_inp').val();
        let shipping_cost = $('#shipping_cost_inp').val();
        let taxed_total = ((untaxed_total * tax_value) / 100) + parseFloat(untaxed_total);
        let taxedTotal = parseFloat(taxed_total) + parseFloat(shipping_cost) + parseFloat(gift_cost);
        $('#total').text(taxedTotal.toFixed(2));
    }

    $("#send_gift").change(function (e) {
        let element = $(this);
        element.prop('disabled', true);

        let gift_price = element.data('gift_price');

        // let total = parseFloat($('#total').text());

        if (element.is(':checked')) {
            // total = gift_price + total;
            $(".gift_cost").removeClass('hidden');
            $('#anchor_comment').show();
            $('#gift_cost_inp').val(gift_price);
        } else {
            // total = total - gift_price;
            $(".gift_cost").addClass('hidden');
            $('#anchor_comment').hide();
            $('#gift_cost_inp').val(0);
        }

        updateTotal();
        element.prop('disabled', false);
    });


    $("#check_voucher").on('click', function (event) {
        event.preventDefault();

        var code = $('#coupon_code').val();
        var tax_percent = $('#tax_percent').val();

        $.ajax({
            'type': 'post',
            'url': '{{ url("check-code") }}',
            data: {code, tax_percent, '_token': "{{csrf_token()}}"},
            'statusCode': {
                200: function (response) {

                    if (response.code == 201)
                        toastr["error"](response.message);
                    else {
                        var message = response.data.message + ' ' + response.data.amount + ' ' + response.data.currency;
                        $('.discount').html("<h4>" + message + "</h4>" +
                            "<input type='hidden' name='coupon_code' value='" + response.data.code + "'>");
                        $('#discount_amount').text(response.data.amount);
                        $('#total_after_discount').text(response.data.total_after_disc);
                        $('.discount_value').removeClass('hidden');
                        $('input[name="sub_total"]').val(response.data.total);


                        $('#total').text((((response.data.total_after_disc + parseFloat($('#shipping_cost').html())) * parseFloat($('#tax_value').val())) /100) + response.data.total_after_disc + parseFloat($('#shipping_cost').html()));

                        if ($('#send_gift').is(':checked'))
                            $("#send_gift").change();

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


</script>
