<!-- BEGIN GLOBAL MANDATORY SCRIPTS -->
<!-- jQuery 3 -->
<script src="{{ asset('assets/admin/js/libs/jquery-3.1.1.min.js')}}"></script>

<!-- Bootstrap 3.3.7 -->
<script src="{{ asset('assets/admin/bootstrap/js/popper.min.js')}}"></script>
<script src="{{ asset('assets/admin/bootstrap/js/bootstrap.min.js')}}"></script>
<script src="{{ asset('assets/admin/plugins/scrollbar/jquery.mCustomScrollbar.concat.min.js')}}"></script>

<!--  App -->
<script src="{{ asset('assets/admin/js/app.js')}}"></script>

<script>
    $(document).ready(function () {
        App.init();
    });
</script>

<!-- custom -->
<script src="{{ asset('assets/admin/js/custom.js')}}"></script>
<!-- END GLOBAL MANDATORY SCRIPTS -->

<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="{{ asset('assets/admin/plugins/table/datatable/datatables.js')}}"></script>

<!-- END PAGE LEVEL SCRIPTS -->


<!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->
<script src="{{ asset('assets/admin/plugins/charts/sparklines/jquery.sparkline.min.js')}}"></script>
<script src="{{ asset('assets/admin/plugins/charts/d3charts/d3.v3.min.js')}}"></script>
<script src="{{ asset('assets/admin/plugins/charts/c3charts/c3.min.js')}}"></script>
<script src="{{ asset('assets/admin/plugins/calendar/pignose/moment.latest.min.js')}}"></script>
<script src="{{ asset('assets/admin/plugins/calendar/pignose/pignose.calendar.js')}}"></script>
<script src="{{ asset('assets/admin/plugins/dropzone/dropzone.min.js')}}"></script>
<script src="{{ asset('assets/admin/plugins/progressbar/progressbar.min.js')}}"></script>
<script src="{{ asset('assets/admin/js/accounting-dashboard/accounting-custom.js')}}"></script>
<!-- END PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->

<script src="{{ asset('assets/admin/js/design-js/design.js')}}"></script>
<script src="{{ asset('assets/admin/js/forms/form_validation/form_validation_material.js')}}"></script>

<script type="text/javascript">
    var reverseObj = function (object) {
        var NewObj = {}, keysArr = Object.keys(object);
        for (var i = keysArr.length - 1; i >= 0; i--) {
            NewObj[keysArr[i]] = object[keysArr[i]];
        }
        return NewObj;
    }

</script>

<script>
    $(document).ready(function () {
        $('.loader-spinner').fadeOut(500, function () {
            $('.loader-spinner').remove();
        });

        $('#attach_box').click(function () {
            $('#update_other_country_tax').show();
            return false;
        });

        $('#country_form').click(function () {
            $('#update_country_tax').show();
            return false;
        });
        setInterval(function () {
            $.ajax({
                'type': 'get',
                'url': '{{url('admin/merchants/getNew')}}',
                success: function (data) {
                    if (data != '0') {
                        $('#notificationBill').addClass('flaticon-bell').text(data);
                        var audio = document.getElementById('notif_sound');
                        $('#notif_sound').attr('autoplay', 'true');
                        audio.play();
                    } else {
                        $('#notificationBill').removeClass('flaticon-bell').text('');
                    }
                }
            });
        }, 15000)
    });
    $(".update_status").click(function () {
        var order_id = $("#order_id").val();
        var status_id = $("#status_id").val();
        var status_comment = $("#status_comment").val();
        if (status_id > 0) {
            $("#modal_order_id").val(order_id);
            $("#modal_status_id").val(status_id);
            $("#modal_status_comment").val(status_comment);
            $("#uploadModal").modal("show");
        } else {
            $('#status_id').prop('required', true);
        }
    })

    function TaxFunction() {
        var id = $("#tax_id").val();
        token = '{{csrf_token()}}';
        var checkBox = document.getElementById("active_tax_shipping");

        if (checkBox.checked == true) {
            var status = 1;
            update_tax_shipping(id, status, token);

        }
    }

    function NoTaxFunction() {
        var id = $("#tax_id").val();
        token = '{{csrf_token()}}';
        var checkBox = document.getElementById("deactive_tax_shipping");
        if (checkBox.checked == true) {
            var status = 0;
            update_tax_shipping(id, status, token);

        }
    }

    function ProductTaxFunction() {
        var id = $("#tax_id").val();
        token = '{{csrf_token()}}';
        var checkBox = document.getElementById("active_tax_product");

        if (checkBox.checked == true) {
            var status = 1;
            update_tax_product(id, status, token);

        }
    }

    function NoProductTaxFunction() {
        var id = $("#tax_id").val();
        token = '{{csrf_token()}}';
        var checkBox = document.getElementById("deactive_tax_product");
        if (checkBox.checked == true) {
            var status = 0;
            update_tax_product(id, status, token);

        }
    }

    function myFunction() {
        var id = $("#tax_id").val();
        token = '{{csrf_token()}}';
        var shipp_tax = document.getElementById("shipp_tax");
        var product_tax = document.getElementById("product_tax");
        var country_tax = document.getElementById("country_tax");
        var checkBox = document.getElementById("status");
        if (checkBox.checked == true) {
            var status = 1;
            update_status(status, id, token);
            shipp_tax.style.display = "block";

            product_tax.style.display = "block";
            country_tax.style.display = "block";

        } else {
            var status = 0;
            update_status(id, status, token);
            shipp_tax.style.display = "none";

            product_tax.style.display = "none";
            country_tax.style.display = "none";


        }
    }

    function update_status(id, status, token) {


        $.ajax({
            'type': 'GET',
            'url': '{{ url("admin/update-tax-status") }}',
            data: {'id': id, 'status': status, '_token': token},
            'statusCode': {
                200: function (response) {

                    alert(response.message);

                },
                422: function (response) {
                    toastr["error"]('حدث خطأ ما');

                }
            },
        });

    }

    function update_tax_shipping(id, status, token) {
        $.ajax({
            'type': 'GET',
            'url': '{{ url("admin/update-tax_shipping") }}',
            data: {'id': id, 'status': status, '_token': token},
            'statusCode': {
                200: function (response) {

                    alert(response.message);

                },
                422: function (response) {
                    toastr["error"]('حدث خطأ ما');

                }
            },
        });

    }

    function update_tax_product(id, status, token) {
        $.ajax({
            'type': 'GET',
            'url': '{{ url("admin/update-tax_product") }}',
            data: {'id': id, 'status': status, '_token': token},
            'statusCode': {
                200: function (response) {

                    alert(response.message);

                },
                422: function (response) {
                    toastr["error"]('حدث خطأ ما');

                }
            },
        });
    }


    /**
     *
     * Bulk Changes Methods
     * -- handle select/selectAll
     * -- handle bulk form submit
     */
    $(() => {
        $('.table-select-all').change(function () {
            $(this).parents('table').find('.table-select').prop('checked', $(this).is(':checked'));
            $(this).parents('div.widget-content-area').siblings('div').find('.bulk-btn').prop('disabled', !$(this).is(':checked'));
        })

        $(document).on('change', '.table-select', function () {
            $(this).parents('table').find('.table-select-all').prop('checked', ($('.table-select:not(:checked)').length === 0));
            $(this).parents('div.widget-content-area').siblings('div').find('.bulk-btn').prop('disabled', ($('.table-select:checked').length === 0));
        })
    })

    let getBulIds = () => {
        let ids = [];
        $('.table-select[name="ids[]"]:checked').each((index, item) => {
            return ids.push($(item).val());
        });
        return ids;
    }

    $('.bulk-form [type="submit"]').click(function (e) {
        e.preventDefault();
        let form = $(this).parents('.bulk-form');
        form.find('input[name="ids"]').val(getBulIds());
        let method = $(this).val();
        let confirmed = true;
        if (method === 'delete') {
            confirmed = confirm("{{__('adminmodule::admin.confirm_delete')}}");
        }
        if (confirmed) {
            form.find('input[name="method"]').val(method);
            form.submit();
        }
    })

</script>


@yield('notification_js')


@yield('js')

@stack('js_scripts')
