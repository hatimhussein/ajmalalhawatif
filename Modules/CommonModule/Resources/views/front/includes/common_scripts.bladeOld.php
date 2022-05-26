<script type="text/javascript">
    var countries_list = [];
    $("#country_id").on('change', function () {
        var country_id = $(this).val();

        token = '{{csrf_token()}}';
        $.ajax({
            'type': 'get',
            'url': '{{ url("getGovernmentList/") }}',
            data: {'country_id': country_id},
            'statusCode': {
                200: function (response) {
                    $('#government_id').html('<option disabled selected value="">{{__("usermodule::login.choose_zone")}}</opiton>');
                    $('#city_id').html('<option disabled selected value="">{{__("usermodule::login.choose_city")}}</opiton>');
                    $('#zone_id').html('<option disabled selected value="">{{__("usermodule::login.choose_government")}}</opiton>');
                    @if(session('locale')=='en')
                    $.map(response.data, function (government) {
                        $('#government_id').append('<option value="' + government.id + '">' + government.name_en + '</opiton>');
                    });
                    @else
                    $.map(response.data, function (government) {
                        $('#government_id').append('<option value="' + government.id + '">' + government.name_ar + '</opiton>');
                    });

                    @endif

                },
                422: function (response) {
                    $('#errors').html('حدث خطأ ما ');

                }
            },
        });
    });

    $("#government_id").on('change', function () {
        var gov_id = $(this).val();

        token = '{{csrf_token()}}';
        $.ajax({
            'type': 'get',
            'url': '{{ url("getCityList/") }}',
            data: {'gov_id': gov_id},
            'statusCode': {
                200: function (response) {
                    $('#city_id').html('<option disabled selected value="">{{__("usermodule::login.choose_city")}}</opiton>');
                    $('#zone_id').html('<option disabled selected value="">{{__("usermodule::login.choose_government")}}</opiton>');
                    @if(session('locale')=='en')
                    $.map(response.data, function (city) {
                        $('#city_id').append('<option value="' + city.id + '">' + city.name_en + '</opiton>');
                    });
                    @else
                    $.map(response.data, function (city) {
                        $('#city_id').append('<option value="' + city.id + '">' + city.name_ar + '</opiton>');
                    });

                    @endif

                },
                422: function (response) {
                    $('#errors').html('حدث خطأ ما ');

                }
            },
        });
    });

    $("#city_id").on('change', function () {
        var city_id = $(this).val();

        token = '{{csrf_token()}}';
        $.ajax({
            'type': 'get',
            'url': '{{ url("getZoneList/") }}',
            data: {'city_id': city_id},
            'statusCode': {
                200: function (response) {
                    $('#zone_id').html('<option disabled selected value="">{{__("usermodule::login.choose_government")}}</opiton>');

                    @if(session('locale')=='en')
                    $.map(response.data, function (zone) {
                        $('#zone_id').append('<option value="' + zone.id + '">' + zone.name_en + '</opiton>');
                    });
                    @else
                    $.map(response.data, function (zone) {
                        $('#zone_id').append('<option value="' + zone.id + '">' + zone.name_ar + '</opiton>');
                    });
                    @endif

                },
                422: function (response) {
                    toastr["error"]('حدث خطأ ما');

                }
            },
        });
    });


    $("#country_id2").on('change', function () {
        var country_id = $(this).val();

        token = '{{csrf_token()}}';
        $.ajax({
            'type': 'get',
            'url': '{{ url("getGovernmentList/") }}',
            data: {'country_id': country_id},
            'statusCode': {
                200: function (response) {
                    $('#government_id2').html('<option disabled selected value="">{{__("usermodule::login.choose_zone")}}</opiton>');
                    $('#city_id2').html('<option disabled selected value="">{{__("usermodule::login.choose_city")}}</opiton>');
                    $('#zone_id2').html('<option disabled selected value="">{{__("usermodule::login.choose_government")}}</opiton>');
                    @if(session('locale')=='en')
                    $.map(response.data, function (government) {
                        $('#government_id2').append('<option value="' + government.id + '">' + government.name_en + '</opiton>');
                    });
                    @else
                    $.map(response.data, function (government) {
                        $('#government_id2').append('<option value="' + government.id + '">' + government.name_ar + '</opiton>');
                    });

                    @endif

                },
                422: function (response) {
                    $('#errors').html('حدث خطأ ما ');

                }
            },
        });
    });

    $("#government_id2").on('change', function () {
        var gov_id = $(this).val();

        token = '{{csrf_token()}}';
        $.ajax({
            'type': 'get',
            'url': '{{ url("getCityList/") }}',
            data: {'gov_id': gov_id},
            'statusCode': {
                200: function (response) {
                    $('#city_id2').html('<option disabled selected value="">{{__("usermodule::login.choose_city")}}</opiton>');
                    $('#zone_id2').html('<option disabled selected value="">{{__("usermodule::login.choose_government")}}</opiton>');
                    @if(session('locale')=='en')
                    $.map(response.data, function (city) {
                        $('#city_id2').append('<option value="' + city.id + '">' + city.name_en + '</opiton>');
                    });
                    @else
                    $.map(response.data, function (city) {
                        $('#city_id2').append('<option value="' + city.id + '">' + city.name_ar + '</opiton>');
                    });

                    @endif

                },
                422: function (response) {
                    $('#errors').html('حدث خطأ ما ');

                }
            },
        });
    });

    $("#city_id2").on('change', function () {
        var city_id = $(this).val();

        token = '{{csrf_token()}}';
        $.ajax({
            'type': 'get',
            'url': '{{ url("getZoneList/") }}',
            data: {'city_id': city_id},
            'statusCode': {
                200: function (response) {
                    $('#zone_id2').html('<option disabled selected value="">{{__("usermodule::login.choose_government")}}</opiton>');

                    @if(session('locale')=='en')
                    $.map(response.data, function (zone) {
                        $('#zone_id2').append('<option value="' + zone.id + '">' + zone.name_en + '</opiton>');
                    });
                    @else
                    $.map(response.data, function (zone) {
                        $('#zone_id2').append('<option value="' + zone.id + '">' + zone.name_ar + '</opiton>');
                    });
                    @endif

                },
                422: function (response) {
                    toastr["error"]('حدث خطأ ما');

                }
            },
        });
    });


    $(document).on("click", ".add_to_cart", function (event) {

        event.preventDefault();
        @if(session('locale')=='en')
        var loading_add = "Adding ...";
        var add_to_cart = "Add To Cart";
        var success = "Successfuly Added TO Cart";

        @else
        var loading_add = "جارى الاضافة ...";
        var add_to_cart = "أضف للسلة";
        var success = "تم اضافة المنتج بنجاح";

        @endif



        $(this).text(loading_add);


        var product_type = $(this).data('product_type');

        // var product_type=$('#product_type').data('product_type');


        if (product_type == 'combination') {
            var comb = '';
            $(".selected_option").each(function () {
                comb += $(this).val() + ',';

            });

            var combination = comb;

        } else {
            var combination = '';
        }

        var product_id = $(this).data('product_id');
        var product_name = $(this).data('product_name');
        var product_price = $(this).data('product_price');


        var product_photo = $(this).data('product_photo');
        var token = '{{csrf_token()}}';

        var cart_type = $(this).data('cart_type');
        if (cart_type == 'from_home') {
            var product_quantity = 1;
        } else {
            var product_quantity = $('#qty').val();
        }

        $.ajax({
            'type': 'post',
            'url': '{{ url("add-to-cart") }}',
            data: {
                product_id,
                product_type,
                product_name,
                product_price,
                product_quantity,
                product_photo,
                combination,
                '_token': token
            },
            'statusCode': {
                200: function (response) {
                    $('.add_to_cart').html('<span>' + add_to_cart + '</span>');

                    if (response.code == 201)
                        toastr["error"](response.message);
                    else {
                        toastr["success"](success);
                        $('#cart-sidebar').html('');
                        var total = 0;
                        var elm = '';

                        $.map(response.data.cart_data, function (item) {
                            if (item.item_combination != null)
                                elm = item.item_combination.replace(/,/g, '');

                            $('#cart-sidebar').append(`
                                <li class="item even ${item.product_id}${elm}">
                                <a class="product-image" href="/product-details/${item.product_id}" title="Downloadable Product ">
                                    <img alt="Downloadable Product " src="{{asset('images/product/')}}/${item.item_photo}" width="80">
                                </a>
                                    <div class="detail-item">
                                        <div class="product-details">
                                            <a href="/product-details/${item.product_id}"
                                                data-product_id="${item.product_id}"
                                                data-item_combination="${item.item_combination}"
                                                title="Remove This Item" onClick=""
                                                class="glyphicon glyphicon-remove remove-item">&nbsp;
                                            </a>
                                            <p class="product-name">
                                                <a href="/product-details/${item.product_id}" title="Downloadable Product">
                                                    ${item.item_name}...
                                                </a>
                                            </p>
                                        </div>

                                        <div class="product-details-bottom">
                                            <span class="price"> ${item.item_price * response.data.currency.value} ${response.data.currency_name} </span>
                                            <span class="title-desc">Qty:</span>
                                            <strong>${item.quantity}</strong>
                                        </div>
                                    </div>
                                </li>
                               `)
                            total += item.quantity * item.item_price * response.data.currency.value;
                        });

                        $('#top-subtotal').text(total);
                        $('.subtotal_cal').text(total);

                        $('#no_products_in_cart').html('');

                        $('#cart-total').text(response.data.cart_data.length);

                    }
                },
                422: function (response) {
                    $('.add_to_cart').html('<span>' + add_to_cart + '</span>');

                    $.map(response.responseJSON.errors, function (error) {
                        toastr["error"](error)
                    });

                }


            },
        });

    });

    $(document).on("click", ".remove-item", function (event) {


        event.preventDefault();


        var product_id = $(this).data('product_id');
        var item_combination = $(this).data('item_combination');

        var token = '{{csrf_token()}}';

        $.ajax({
            'type': 'post',
            'url': '{{ url("remove-item-cart") }}',
            data: {product_id, item_combination, '_token': token},
            context: this,
            'statusCode': {
                200: function (response) {

                    if (response.code == 201)
                        toastr["error"](response.message);
                    else {
                        var elm = '';
                        toastr["success"](response.data.message);
                        if (item_combination != null)
                            elm = item_combination.toString().replace(/,/g, '');
                        $('.' + product_id + elm).remove();
                        $('.subtotal_cal').text(response.data.sub_total);
                        $('#subtotal_cal_prim').text(response.data.sub_total);
                        $('#subtotal_cal_prim').val(response.data.sub_total);
                        $('#cart-total').text(response.data.length);
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


<script type="text/javascript">

    $(".wishlist_operations").on('click', function (event) {
        event.preventDefault();
        var product_id = $(this).data('product_id');
        var token = '{{csrf_token()}}';

        $.ajax({
            'type': 'post',
            'url': '{{ url("check-Wishlist") }}',
            data: {product_id, '_token': token},
            context: this,
            'statusCode': {
                200: function (response) {

                    if (response.code == 201)
                        toastr["error"](response.message);
                    else {
                        toastr["success"](response.message)
                        $(this).toggleClass('active');

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


    $("#newsLetterForm").submit(function (event) {
        event.preventDefault();
        var form = document.getElementById('newsLetterForm');
        token = '{{csrf_token()}}';
        var formdata = new FormData(document.querySelector('#newsLetterForm'));
        formdata.append("_token", token);

        $.ajax({
            'type': 'post',
            'url': '{{ url("subscribe-newsletter") }}',
            data: formdata,
            processData: false,
            contentType: false,
            'statusCode': {
                200: function (response) {

                    if (response.code == 201)
                        toastr["error"](response.message);
                    else {
                        toastr["success"](response.message)
                        $('input').val('');
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


    var reverseObj = function (object) {
        var NewObj = {}, keysArr = Object.keys(object);
        for (var i = keysArr.length - 1; i >= 0; i--) {
            NewObj[keysArr[i]] = object[keysArr[i]];
        }
        return NewObj;
    }


</script>

<script>

    /*An array containing all the country names in the world:*/
    var countries = [];

    /*initiate the autocomplete function on the "search" element, and pass along the countries array as possible autocomplete values:*/


    $.ajax({
        'type': 'get',
        'url': '{{ url("autocomplete-names-search") }}',
        'statusCode': {
            200: function (response) {
                countries = response.data;
            },
            422: function (response) {
                alert('fail');


            }
        },
    });

    setTimeout(function () {
        var arr = [];
        $.each(countries, function (key, obj) {
            arr.push(obj)
        });
        console.log(arr);
        autocomplete(document.getElementById("search"), arr);
    }, 3000);

</script>


<script>
    (function ($) {
        $.fn.extend({
            accordion: function (options) {
                var defaults = {
                    accordion: 'true',
                    speed: 300,
                    closedSign: '[+]',
                    openedSign: '[-]'
                };
                var opts = $.extend(defaults, options);
                var $this = $(this);
                $this.find("li").each(function () {
                    if ($(this).find("ul").size() != 0) {
                        $(this).find("a:first").after("<em>" + opts.closedSign + "</em>");
                        if ($(this).find("a:first").attr('href') == "#") {
                            $(this).find("a:first").click(function () {
                                return false;
                            });
                        }
                    }
                });
                $this.find("li em").click(function () {
                    if ($(this).parent().find("ul").size() != 0) {
                        if (opts.accordion) {
                            //Do nothing when the list is open
                            if (!$(this).parent().find("ul").is(':visible')) {
                                parents = $(this).parent().parents("ul");
                                visible = $this.find("ul:visible");
                                visible.each(function (visibleIndex) {
                                    var close = true;
                                    parents.each(function (parentIndex) {
                                        if (parents[parentIndex] == visible[visibleIndex]) {
                                            close = false;
                                            return false;
                                        }
                                    });
                                    if (close) {
                                        if ($(this).parent().find("ul") != visible[visibleIndex]) {
                                            $(visible[visibleIndex]).slideUp(opts.speed, function () {
                                                $(this).parent("li").find("em:first").html(opts.closedSign);
                                            });
                                        }
                                    }
                                });
                            }
                        }
                        if ($(this).parent().find("ul:first").is(":visible")) {
                            $(this).parent().find("ul:first").slideUp(opts.speed, function () {
                                $(this).parent("li").find("em:first").delay(opts.speed).html(opts.closedSign);
                            });
                        } else {
                            $(this).parent().find("ul:first").slideDown(opts.speed, function () {
                                $(this).parent("li").find("em:first").delay(opts.speed).html(opts.openedSign);
                            });
                        }
                    }
                });
            }
        });
    })(jQuery);

</script>
<script>
    $(function () {
        $("#price-range").slider({
            range: true,
            min: 0,
            max: 50000,
            values: [0, 50000],
            slide: function (event, ui) {
                $("#priceRange").val(ui.values[0] + "," + ui.values[1]);
            }
        });
        $("#priceRange").val($("#price-range").slider("values", 0) + "," + $("#price-range").slider(
            "values", 1));

    });

</script>
