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
                        swal("{{__('productmodule::admin.done')}}", "{{__('ordermodule::admin.updated_successfully')}}", "success", {button: "Ok",});
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

    @can('update_cart')
    $(document).on('click', '.remove-item', function (e) {
        e.preventDefault();
        let clicked = $(this);
        clicked.prop('disabled', true);
        let id = clicked.data('id');
        let _method = 'delete';
        let _token = '{{ csrf_token() }}';

        $.ajax({
            'type': 'post',
            'url': `{{ url('admin/cart') }}/${id}`,
            data: {_method, _token},
            'statusCode': {
                200: function (response) {
                    clicked.closest('tr').remove();
                }
            },
        });
    });

    $(document).on('click', '.qty-btn', function (e) {
        e.preventDefault();
        let clicked = $(this);
        clicked.prop('disabled', true);
        let id = clicked.data('id');
        let _method = 'put';
        let _token = '{{ csrf_token() }}';
        let quantity = $(`[name="quantity[${id}]"]`).val();

        $.ajax({
            'type': 'post',
            'url': `{{ url('admin/cart') }}/${id}`,
            data: {_method, _token, quantity},
            'statusCode': {
                200: function (response) {
                    clicked.prop('disabled', false);
                    if (response.code == 201) {
                        swal("Error", response.message, "error", {button: "Ok",});
                    } else {
                        clicked.parents('td').find('.qty-text').text(quantity);
                        swal("{{__('productmodule::admin.done')}}", "{{__('ordermodule::admin.updated_successfully')}}", "success", {button: "Ok",});
                    }
                },
                422: function (response) {
                    clicked.prop('disabled', false);
                    $.map(response.responseJSON.errors, function (error) {
                        if (error[0])
                            swal("Error", error[0], "error", {button: "Ok",});
                    });
                }
            },
        });
    });

    $('#product_id_select').change(function () {
        let submitter = $('#add_product_btn');
        const changed = $(this);
        submitter.prop('disabled', true);
        let type = changed.find(':selected').data('type');

        let combination_select = $('#combination_select');
        if (type === 'simple') {
            $('#combination_holder').hide();
            combination_select.html(`<option value="" selected disabled>{{__('ordermodule::admin.choose_combination')}}</option>`);
            combination_select.prop('required', false);
            submitter.prop('disabled', false);
        } else {
            let id = changed.val();
            $.ajax({
                'type': 'get',
                'url': `{{ url('get-product-combinations') }}/${id}`,
                'statusCode': {
                    200: function (response) {
                        combination_select.html(`<option value="" selected disabled>{{__('ordermodule::admin.choose_combination')}}</option>`);
                        $.map(response.data, (combination) => {
                            combination_select.append(`<option value="${combination.combination_values}">${combination.combination_names}</option>`);
                        });
                        combination_select.prop('required', true);
                        $('#combination_holder').show();
                        submitter.prop('disabled', false);
                    }
                },
            });
        }

    });


    $("#add_product_form").submit(function (event) {
        event.preventDefault();
        $(this).formValidate;
        let submitter = $('button[type="submit"]');
        submitter_loading(submitter)

        let productData = new FormData(this);
        $.ajax({
            'type': 'post',
            'url': $(this).attr('action'),
            data: productData,
            processData: false,
            contentType: false,

            'statusCode': {
                200: function (response) {
                    submitter_loaded(submitter);
                    if (response.code == 201) {
                        swal("Error", response.message, "error", {button: "Ok",});
                    } else {
                        swal("{{__('productmodule::admin.done')}}", "{{__('productmodule::admin.added_successfully')}}", "success", {button: "Ok",});
                        setTimeout(() => {
                            window.location.reload();
                        }, 2000);
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
    @endcan

</script>
