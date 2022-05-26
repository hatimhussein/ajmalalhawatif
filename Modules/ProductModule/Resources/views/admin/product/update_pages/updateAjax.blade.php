<script type="text/javascript">
    $(document).ready(function () {


        $("#update_product_names").submit(function (event) {
            event.preventDefault();

            var form = document.getElementById('update_product_names');
            var isValidForm = form.checkValidity();
            if (isValidForm) {
                token = '{{csrf_token()}}';
                var formdata = new FormData(document.querySelector('#update_product_names'));
                formdata.append("_token", token);
                formdata.append("desc_ar", CKEDITOR.instances.desc_ar.getData());
                formdata.append("desc_en", CKEDITOR.instances.desc_en.getData());
                formdata.append("r_type", 'MainData');
                updateProductData(formdata, '#update_product_names');

            }
        });

        $("#update_product_attributes").submit(function (event) {
            event.preventDefault();

            var form = document.getElementById('update_product_attributes');
            var isValidForm = form.checkValidity();
            if (isValidForm) {
                token = '{{csrf_token()}}';
                var formdata = new FormData(document.querySelector('#update_product_attributes'));
                formdata.append("_token", token);
                formdata.append("r_type", 'Attributes');

                updateProductData(formdata, '#update_product_attributes');


            }
        });

        $("#update_product_dicounts").submit(function (event) {
            event.preventDefault();

            var form = document.getElementById('update_product_dicounts');
            var isValidForm = form.checkValidity();
            if (isValidForm) {
                token = '{{csrf_token()}}';
                var formdata = new FormData(document.querySelector('#update_product_dicounts'));
                formdata.append("_token", token);
                formdata.append("r_type", 'Dicount');
                updateProductData(formdata, '#update_product_dicounts');

            }
        });


        $("#update_product_shipping_cost").submit(function (event) {
            event.preventDefault();

            var form = document.getElementById('update_product_shipping_cost');
            var isValidForm = form.checkValidity();
            if (isValidForm) {
                token = '{{csrf_token()}}';
                var formdata = new FormData(document.querySelector('#update_product_shipping_cost'));
                formdata.append("_token", token);
                formdata.append("r_type", 'MainData');
                updateProductData(formdata, '#update_product_shipping_cost');

            }
        });


        $("#update_product_main_data").submit(function (event) {
            event.preventDefault();

            var form = document.getElementById('update_product_main_data');
            var isValidForm = form.checkValidity();
            if (isValidForm) {
                token = '{{csrf_token()}}';
                var formdata = new FormData(document.querySelector('#update_product_main_data'));
                var status = formdata.get('status')
                if (status == 'on')
                    status = 1;
                else
                    status = 0;

                formdata.set('status', status);

                formdata.append("_token", token);
                formdata.append("r_type", 'MainData');
                updateProductData(formdata, '#update_product_main_data');

            }
        });

        $("#update_product_prices").submit(function (event) {
            event.preventDefault();

            var form = document.getElementById('update_product_prices');
            var isValidForm = form.checkValidity();
            if (isValidForm) {
                token = '{{csrf_token()}}';
                var formdata = new FormData(document.querySelector('#update_product_prices'));

                formdata.append("_token", token);
                formdata.append("r_type", 'MainData');
                updateProductData(formdata, '#update_product_prices');

            }
        });


        $("#update_product_combination").submit(function (event) {
            event.preventDefault();

            var form = document.getElementById('update_product_combination');
            var isValidForm = form.checkValidity();
            if (isValidForm) {
                token = '{{csrf_token()}}';
                var formdata = new FormData(document.querySelector('#update_product_combination'));
                formdata.append("_token", token);
                formdata.append("r_type", 'Combination');
                updateProductData(formdata, '#update_product_combination');

            }
        });


        $("#update_product_quantity").submit(function (event) {
            event.preventDefault();

            var form = document.getElementById('update_product_quantity');
            var isValidForm = form.checkValidity();
            if (isValidForm) {
                token = '{{csrf_token()}}';
                var formdata = new FormData(document.querySelector('#update_product_quantity'));
                formdata.append("_token", token);
                formdata.append("r_type", 'ProductQuantity');
                updateProductData(formdata, '#update_product_quantity');
            }
        });


        $("#update_product_images").submit(function (event) {
            event.preventDefault();

            var form = document.getElementById('update_product_images');
            var isValidForm = form.checkValidity();
            if (isValidForm) {
                token = '{{csrf_token()}}';
                var formdata = new FormData(document.querySelector('#update_product_images'));
                formdata.append("_token", token);
                formdata.append("r_type", 'Images');

                product_photo = $('#product_photo').prop('files')[0];
                product_images = $('#product_images').prop('files');

                if ((formdata.get('product_photo').size != 0) || product_images[0] != undefined || (formdata.get('video').size != 0))
                    updateProductData(formdata, '#update_product_images');
                else
                    swal("Error", 'Please Select Image', "error", {button: "Ok",});
            }
        });


        function updateProductData(formdata, id) {

            $(id + ' button').attr("disabled", true);

            $(id + ' button').html('<div class="cp-spinner cp-skeleton"></div>');

            $.ajax({
                'type': 'post',
                'url': '{{ url("admin/update-product") }}',
                data: formdata,
                processData: false,
                contentType: false,
                context: this,
                'statusCode': {
                    200: function (response) {
                        swal("رائع", "تم التعديل بنجاح", "success", {button: "Ok",});
                        $(id + ' button').html('Update');
                        $(id + ' button').attr("disabled", false);

                    },
                    422: function (response) {
                        var erro = '';
                        $.map(response.responseJSON.errors, function (error) {
                            // erro+=error[0]+'<br><br>';
                            if (error[0])
                                swal("Error", error[0], "error", {button: "Ok",});
                            $(id + ' button').attr("disabled", false);

                            $(id + ' button').html('Update');

                        });


                        // swal("خطأ", erro, "error", { button: "Ok", });

                    }


                },
            });

        }


    });
</script>
