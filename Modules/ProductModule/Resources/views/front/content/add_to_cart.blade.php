<script>
    $(window).scroll(function () {
        var elementTarget = $(".add-to-box");
        if ($(window).scrollTop() > (elementTarget.offset().top + elementTarget.outerHeight())) {
            $(".add-to-box .add-to-cart").addClass('sticky-bottom');
        } else {
            $(".add-to-box .add-to-cart").removeClass('sticky-bottom');
        }
    });

    $(".selected_option").on('change', function (event) {
        event.preventDefault();
        $(this).parent('div').nextAll().children('select').html('<option disabled selected value="">Loading...</option>')


        var selector = $(this);
        var option = '';

        $(".selected_option").each(function (index, listItem) {
            if ($(this).val() != null) {
                option += $(this).val() + ',';
            }
        });

        // var option=$(this).val();
        var product_id = $(this).data('product_id');
        var follow_option = $(this).data('follow_option');


        var token = '{{csrf_token()}}';

        $.ajax({
            'type': 'post',
            'url': '{{ url("get-combination") }}',
            data: {option, product_id, follow_option, '_token': token},
            context: this,
            'statusCode': {
                200: function (response) {
                    $('#all_discounts').html('');

                    console.log(response);

                    if (response.code == 201)
                        toastr["error"](response.message);
                    else {
                        // selector.each(function() {
                        //   var a = $(this).find('.last');
                        //
                        //   $(this).nextUntil('.last').html('');
                        // });
                        //

                        // toastr["success"]('تمت العملية بنجاح');
                        // $('select[name="'+response.data[0]['option_id']+'"]').next().html('<option value="">choose</option>');

                        @if(session('locale')=='en')
                        if (Object.keys(response.data.result.values).length > 0) {
                            $('select[name="' + response.data.result.values[0]['option_id'] + '"]').html('<option disabled selected value="">Choose</option>');

                            $.map(response.data.result.values, function (option) {
                                $('select[name="' + option.option_id + '"]').append('<option value="' + option.id + '">' + option.name_en + '</option>');
                            });
                        }
                        @else
                        if (Object.keys(response.data.result.values).length > 0) {
                            $('select[name="' + response.data.result.values[0]['option_id'] + '"]').html('<option disabled selected value="">اختر</option>');

                            $.map(response.data.result.values, function (option) {
                                $('select[name="' + option.option_id + '"]').append('<option value="' + option.id + '">' + option.name_ar + '</option>');
                            });
                        }

                            @endif
                        else {
                            var total = parseFloat(response.data.result.combinations[0].combination_price * response.data.currency.value) + parseFloat($('#product_price').data('product_price'));
                            $('#product_price').text(total)
                            $.map(response.data.all_discounts, function (discount, index) {
                                $('#all_discounts').append(" <p><strong>{{__('productmodule::product.order_qty')}}" + index + "{{__('productmodule::product.or_more')}} " + (parseFloat(discount) + parseFloat(response.data.result.combinations[0].combination_price * response.data.currency.value)) + "{!!  LanguageHelper::nameTranslate(Session::get('currency')) !!}  {{__('productmodule::product.fot_unit')}}<strong></p>");
                                console.log(discount + parseFloat(response.data.result.combinations[0].combination_price * response.data.currency.value));
                            });


                        }

                    }

                },
                422: function (response) {
                    let errors = reverseObj(response.responseJSON.errors);
                    $.map(errors, function (error) {
                        toastr["error"](error)
                    });


                }
            },
        });

    });


    $(".btn-empty").on('click', function (event) {
        event.preventDefault();

        var token = '{{csrf_token()}}';

        $.ajax({
            'type': 'get',
            'url': '{{ url("clear-cart") }}',
            'statusCode': {
                200: function (response) {

                    if (response.code == 201)
                        toastr["error"](response.message);
                    else {
                        toastr["success"](response.message);

                        $('.cart_item').remove();
                        @if(session('locale')!='en')
                        $('.cart').html('<h1 class="text-center">لا يوجد منتجات بالسلة</h1>');
                        $('#cart-sidebar').html('<h1 class="text-center">لا يوجد منتجات بالسلة</h1>');
                        @else
                        $('.cart').html('<h1 class="text-center">No Products In Cart</h1>');
                        $('#cart-sidebar').html('<h1 class="text-center">No Products In Cart</h1>');

                        @endif
                        $('#top-subtotal').text('0');
                        $('#cart-total').text('0');
                        $('.subtotal_cal').text('0');


                    }

                },
                422: function (response) {
                    let errors = reverseObj(response.responseJSON.errors);
                    $.map(errors, function (error) {
                        toastr["error"](error)
                    });

                }
            },
        });

    });


    $(document).on("change", ".update-quantity", function (event) {


        event.preventDefault();


        var product_id = $(this).data('product_id');
        var item_combination = $(this).data('item_combination');
        var item_price = $(this).data('item_price');
        var old_quantity = $(this).data('old_quantity');
        var quantity = $(this).val();


        // if(old_quantity == quantity)
        // {
        //   toastr["success"]('تم التعديل بنجاح');
        //   return;
        // }

        var token = '{{csrf_token()}}';

        $.ajax({
            'type': 'post',
            'url': '{{ url("update-quantity") }}',
            data: {product_id, item_combination, quantity, old_quantity, '_token': token},
            context: this,
            'statusCode': {
                200: function (response) {

                    if (response.code == 201) {
                        toastr["error"](response.message);
                        $(this).siblings("input").val(old_quantity);
                    } else {
                        toastr["success"](response.data.message);
                        let old_price = parseFloat(old_quantity) * parseFloat(item_price);

                        item_price = response.data.item_price;
                        $(this).parent('.quantity_td').next().children().children().html(item_price * quantity)


                        let new_price = parseFloat(quantity) * parseFloat(item_price);

                        let ss = new_price - old_price;

                        let lettotals = parseFloat($('#subtotal_cal_prim').val()) + ss;


                        $('#subtotal_cal_prim').val(lettotals.toFixed(2));

                        $('.subtotal_cal').text(lettotals.toFixed(2));


                        $(this).data('old_quantity', quantity);
                        $(this).data('item_price', item_price);

                        var elm = item_combination.toString().replace(/,/g, '');
                        $('.' + product_id + elm).children('.detail-item').children('.product-details-bottom')
                            .children('strong').text(quantity);

                        $('.item_price' + product_id + elm).text(item_price);

                        //  $('.subtotal_cal').text(response.data.sub_total);

                    }

                },
                422: function (response) {
                    let errors = reverseObj(response.responseJSON.errors);
                    $.map(errors, function (error) {
                        toastr["error"](error)
                    });

                }
            },
        });

    });


</script>
