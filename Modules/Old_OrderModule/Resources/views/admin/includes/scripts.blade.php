@section('js')
    @include('commonmodule::includes.swal')

    <script>

        function resetForUser() {
            $('#products_table').html('');
            $('#billing-address-select').val('');
        }

        $(document).on('change', '#billing-address-select', function () {
            if ($(this).val()) {
                $('#country_id').val('').change();
                $('#new_address').slideUp();
            } else {
                $('#new_address').slideDown();
            }
        });

        $(document).on('change', '#user_id', function () {
            resetForUser();
            let user_id = $(this).val();
            if (!user_id)
                return true;

            $.ajax({
                'type': 'get',
                'url': '{{ url("admin/getUserInfo") }}/' + user_id,
                'statusCode': {
                    200: function (response) {
                        if (response.code == 201)
                            toastr["error"](response.message);
                        else {
                            user = response.data;
                            $('#billing-address-select').html('<option selected value="">{{__('ordermodule::checkout.new_adderess')}}</option>');
                            $.map(user.addresses, function (address) {
                                $('#billing-address-select').append(`<option value="${address.id}">${address.get_country.name} ${address.get_government.name} ${address.get_city.name} ${address.get_zone.name} ${address.address ?? ''}</option>`);
                            });
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


        $(document).on('change', '#parent_id', function () {
            let parent_id = $(this).val();
            if (!parent_id) return true;

            $.ajax({
                'type': 'get',
                'url': '{{ url("admin/getCategoryProducts") }}/' + parent_id,
                'statusCode': {
                    200: function (response) {
                        products = response.data;
                        $('#productSelection').html(`<option selected disabled>{{__('ordermodule::admin.products')}}</option>`);
                        $.map(products, function (product) {
                            $('#productSelection').append(`<option value="${product.id}">${product.name}</option>`);
                        });
                    },
                },
            });
        });

        var GenRowId = 0;

        $(document).on('change', '#productSelection', function () {
            let product_id = $(this).val();
            if (!product_id) return true;
            let user_id = $('#user_id').val();
            if (!user_id) {
                swal("Error", "{{__('ordermodule::admin.choose_user')}}", "error", {button: "Ok",});
                return true;
            }

            let products = JSON.stringify(getProductsArray());

            let rowId = GenRowId;
            GenRowId++;

            $.ajax({
                'type': 'get',
                'url': '{{ url("admin/getProductInfo") }}/' + product_id,
                'data': {user_id, products},
                'statusCode': {
                    200: function (response) {
                        if (response.code == 201)
                            swal("Error", response.message, "error", {button: "Ok",});
                        else {
                            let product = response.data;
                            let combinations_select = ''
                            if (product.type != 'simple') {
                                combinations_select = `<select class="combination-select form-control-rounded form-control product-inp"
                                    style="width: 150px;" name="products[${rowId}][combination]" data-rowid="${rowId}" data-name="combination">`;
                                combinations_select += product.combinations.reduce((options, combination) => {
                                    options += `<option data-price="${combination.combination_price}" value="${combination.combination_values}">${combination.combination_names}</option>`;
                                    return options;
                                });
                                combinations_select += '</select>';
                            }
                            $('#products_table').append(`<tr>
                                <td><img width="50" height="50" src="{{asset('images/product')}}/${product.product_photo}" alt="product_photo"></td>
                                <td>
                                    <span>${product.name}</span>
                                    <input type="hidden" class="product-inp" data-rowid="${rowId}" data-name="id" name="products[${rowId}][id]" value="${product.id}">
                                </td>
                                <td>${combinations_select}</td>
                                <td>
                                    <input type="number" name="products[${rowId}][quantity]" data-rowid="${rowId}" data-name="quantity"
                                    data-unit_price="${product.price}" value="1" min="1" class="form-control-rounded form-control product-inp">
                                </td>
                                <td><span class="rowPrice">${product.price}</span> {!! LanguageHelper::nameTranslate(Session::get('currency')) !!}</td>
                                <td><button class=" btn remove-row">&times;</button></td>
                            </tr>`);

                        }
                    },
                },
            });
        });

        $(document).on('change', '.combination-select', function () {
            let select = $(this);
            row = select.data('rowid');
            let products = getProductsArray();
            if (checkDuplicates(products))
                swal("Error", "{{__('ordermodule::admin.chosen_before')}}", "error", {button: "Ok",});
        });

        function checkDuplicates(products) {
            flag = false;
            $.each(products, (i, item) => {
                $.each(products, (x, inner) => {
                    if (x != i && item.id == inner.id) {
                        if (item.combination) {
                            if (item.combination == inner.combination) flag = true;
                        } else {
                            flag = true;
                        }
                    }
                });
            });
            return flag;
        }

        function getProductsArray() {
            let products = {};
            $('.product-inp').each((i, item) => {
                let index = $(item).data('rowid');
                let name = $(item).data('name');
                products[index] = products[index] ?? {};
                products[index] = products[index] ?? [];
                products[index][name] = $(item).val();
            });
            return products;
        }

        $(document).on('click', '.remove-row', function (e) {
            e.preventDefault();
            $(this).parents('tr').remove();
        });


        $("#checkout_form").submit(function (event) {
            event.preventDefault();
            $('a[href = "#finish"], button[type="submit"]').html('<div class="cp-spinner cp-skeleton"></div>');
            formdata = getFormData();
            if (!formdata) return true;

            $.ajax({
                'type': 'post',
                'url': '{{ url("admin/doCheckout") }}',
                data: formdata,
                processData: false,
                contentType: false,

                'statusCode': {
                    200: function (response) {
                        $('a[href = "#finish"]').html('Finish');
                        $('button[type="submit"]').html('Checkout');
                        if (response.code == 201) {
                            swal("Error", response.message, "error", {button: "Ok",});
                        } else {
                            swal("{{__('productmodule::admin.done')}}", "{{__('productmodule::admin.added_successfully')}}", "success", {button: "Ok",});
                            window.location.href = response.data;
                        }
                    },
                    422: function (response) {
                        $.map(response.responseJSON.errors, function (error) {
                            if (error[0])
                                swal("Error", error[0], "error", {button: "Ok",});
                        });
                        $('a[href = "#finish"]').html('Finish');
                        $('button[type="submit"]').html('Checkout');
                    }
                },
            });

        });

        $(document).on('click', 'a[href = "#finish"]', function (event) {
            // $('#checkout_form').submit();
            event.preventDefault();
            $('a[href = "#finish"]').html('<div class="cp-spinner cp-skeleton"></div>');
            formdata = getFormData();
            if (!formdata) return true;

            $.ajax({
                'type': 'post',
                'url': '{{ url("admin/previewOrder") }}',
                data: formdata,
                processData: false,
                contentType: false,
                // datatype: "html",
                'statusCode': {
                    200: function (response) {
                        $('a[href = "#finish"]').html('Finish');
                        if (response.code == 201) {
                            swal("Error", response.message, "error", {button: "Ok",});
                        } else {
                            $('#order-preview-modal .modal-body').empty().html(response);
                            $('#order-preview-modal').modal('show');
                        }
                    },
                    422: function (response) {
                        $.map(response.responseJSON.errors, function (error) {
                            if (error[0])
                                swal("Error", error[0], "error", {button: "Ok",});

                        });
                        $('a[href = "#finish"]').html('Finish');
                    }
                },
            });
        });

        function getFormData() {
            var form = document.getElementById('checkout_form');
            var isValidForm = form.checkValidity();
            console.log(isValidForm);
            if (!isValidForm) {
                swal("Error", "check form data", "error", {button: "Ok",});
                $('a[href = "#finish"]').html('Finish');
                return false;
            }

            let formdata = new FormData(document.querySelector('#checkout_form'));
            let products = JSON.stringify(getProductsArray());
            formdata.append('products', products);

            return formdata;
        }
    </script>

    <script>
        var countries_list = [];
        if ($("#country_id").length > 0)
            getCountriesList();

        function getCountriesList() {
            token = '{{csrf_token()}}';
            $.ajax({
                'type': 'get',
                'url': '{{ url("getCountryList/") }}',
                'statusCode': {
                    200: function (response) {
                        countries_list = response.data;
                    },
                    422: function (response) {
                        $('#errors').html('حدث خطأ ما ');
                    }
                },
            });
        }

        function getCountry(country_id) {
            let found = false;
            countries_list.forEach(function (country) {
                if (country.id == country_id) {
                    found = country;

                }
            });
            return found;
        }

        function getGovernment(government_id, country) {
            let found = false;
            country.governments.forEach(function (government) {
                if (government.id == government_id) {
                    found = government;

                }
            });
            return found;
        }

        function getCity(city_id, government) {
            let found = false;
            government.cities.forEach(function (city) {
                if (city.id == city_id) {
                    found = city;

                }
            });
            return found;
        }

        function getZone(zone_id, city) {
            let found = false;
            city.zones.forEach(function (zone) {
                if (zone.id == zone_id) {
                    found = zone;

                }
            });
            return found;
        }


        $(document).on('change', "#country_id", function () {
            var country_id = $(this).val();
            let country = getCountry(country_id);

            $('#government_id').html('<option disabled selected value="">{{__("usermodule::login.choose_zone")}}</opiton>');
            $('#city_id').html('<option disabled selected value="">{{__("usermodule::login.choose_city")}}</opiton>');
            $('#zone_id').html('<option disabled selected value="">{{__("usermodule::login.choose_government")}}</opiton>');

            if (country) {

                @if(session('locale')=='en')
                $.map(country.governments, function (government) {
                    $('#government_id').append('<option value="' + government.id + '">' + government.name_en + '</opiton>');
                });
                @else
                $.map(country.governments, function (government) {
                    $('#government_id').append('<option value="' + government.id + '">' + government.name_ar + '</opiton>');
                });
                @endif
            }
            $('.chosen-select').trigger('chosen:updated');
        });

        $(document).on('change', "#government_id", function () {
            var country_id = $('#country_id').val();
            var gov_id = $(this).val();

            let country = getCountry(country_id);
            let government = getGovernment(gov_id, country);

            $('#city_id').html('<option disabled selected value="">{{__("usermodule::login.choose_city")}}</opiton>');
            $('#zone_id').html('<option disabled selected value="">{{__("usermodule::login.choose_government")}}</opiton>');

            if (government) {
                @if(session('locale')=='en')
                $.map(government.cities, function (city) {
                    $('#city_id').append('<option value="' + city.id + '">' + city.name_en + '</opiton>');
                });
                @else
                $.map(government.cities, function (city) {
                    $('#city_id').append('<option value="' + city.id + '">' + city.name_ar + '</opiton>');
                });
                @endif
            }
            $('.chosen-select').trigger('chosen:updated');
        });

        $(document).on('change', "#city_id", function () {
            var country_id = $('#country_id').val();
            var gov_id = $('#government_id').val();
            var city_id = $(this).val();

            let country = getCountry(country_id);
            let government = getGovernment(gov_id, country);
            let city = getCity(city_id, government);

            $('#zone_id').html('<option disabled selected value="">{{__("usermodule::login.choose_government")}}</opiton>');

            if (city) {
                @if(session('locale')=='en')
                $.map(city.zones, function (zone) {
                    $('#zone_id').append('<option value="' + zone.id + '">' + zone.name_en + '</opiton>');
                });
                @else
                $.map(city.zones, function (zone) {
                    $('#zone_id').append('<option value="' + zone.id + '">' + zone.name_ar + '</opiton>');
                });
                @endif
            }
            $('.chosen-select').trigger('chosen:updated');
        });
    </script>

    <!-- BEGIN PAGE LEVEL SCRIPTS -->
    <script src="{{ asset('assets/admin/plugins/jquery-step/jquery.steps.min.js')}}"></script>
    <script src="{{ asset('assets/admin/plugins/jquery-step/custom-jquery.steps.js')}}"></script>
    <script src="{{ asset('assets/admin/plugins/blockui/jquery.blockUI.min.js')}}"></script>
    <script src="{{ asset('assets/admin/plugins/mdl/material.min.js')}}"></script>
    <!-- END PAGE LEVEL SCRIPTS -->
    <script src="{{ asset('assets/admin/js/design-js/design.js')}}"></script>

    <script src="{{ asset('assets/admin/js/forms/form_validation/form_validation_material.js')}}"></script>


    <script src="{{ asset('assets/admin/plugins/form-repeater/jquery.repeater.min.js')}}"></script>

    <script src="{{ asset('assets/admin/plugins/select2/select2.min.js')}}"></script>
    <script src="{{ asset('assets/admin/plugins/select2/custom-select2.js')}}"></script>

    <script src="{{ asset('assets/admin/plugins/file-upload/file-upload-with-preview.js')}}"></script>

    <script src="{{ asset('assets/admin/plugins/ckeditor/ckeditor.js')}}"></script>








@endsection
