<?php echo $__env->make('commonmodule::front.includes.area_scripts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<script src="<?php echo e(asset('assets\front\plugins\chosen\chosen.jquery.min.js')); ?>"></script>
<script>
    $('.chosen-select').chosen({
        width: '100%'
    });
</script>

<script type="text/javascript">
    $("input[name=password] + i").click(function () {
        $(this).parent().toggleClass('open');
    });
    $("input[type=password]").attr('type', 'text');

    function is_loading(button) {
        let old = button.html();
        button.html('<?php echo e(__('usermodule::login.loading')); ?>');
        button.prop('disabled', true);
        return old;
    }

    function loaded(button, old) {
        button.html(old);
        button.prop('disabled', false);
    }

    $("#loginForm").submit(function (event) {

        event.preventDefault();
        let submitter = $(this).find('[type="submit"]');
        let oldText = is_loading(submitter);

        var form = document.getElementById('loginForm');
        var isValidForm = form.checkValidity();
        if (isValidForm) {
            token = '<?php echo e(csrf_token()); ?>';
            var formdata = new FormData(document.querySelector('#loginForm'));
            formdata.append("_token", token);

            $.ajax({
                'type': 'post',
                'url': '<?php echo e(url('user/login')); ?>',
                data: formdata,
                processData: false,
                contentType: false,
                'statusCode': {
                    200: function (response){
                        $('#errors').html('');

                        if (response.code == 201) {
                            toastr["error"](response.message);
                            loaded(submitter, oldText);
                        } else {
                            toastr["success"](
                                "<?php echo e(__('usermodule::login.login_success')); ?>");
                            window.location = response.message;
                        }
                    },
                    422: function (response) {
                        loaded(submitter, oldText);
                        $('#errors').html('');
                        let errors = reverseObj(response.responseJSON.errors);
                        $.map(errors, function (error) {
                            toastr["error"](error);
                        });
                    }
                },
            });
        }
    });

    $("#merchantLoginForm").submit(function (event) {
        event.preventDefault();
        let submitter = $(this).find('[type="submit"]');
        let oldText = is_loading(submitter);

        var form = document.getElementById('merchantLoginForm');
        var isValidForm = form.checkValidity();
        if (isValidForm) {
            token = '<?php echo e(csrf_token()); ?>';
            var formdata = new FormData(document.querySelector('#merchantLoginForm'));
            formdata.append("_token", token);

            $.ajax({
                'type': 'post',
                'url': '<?php echo e(url('merchant/login')); ?>',
                data: formdata,
                processData: false,
                contentType: false,
                'statusCode': {
                    200: function (response) {
                        $('#errors').html('');

                        if (response.code == 201) {
                            toastr["error"](response.message);
                            loaded(submitter, oldText);
                        } else {
                            toastr["success"](
                                "<?php echo e(__('usermodule::login.login_success')); ?>");
                            window.location = "/";
                        }
                    },
                    422: function (response) {
                        loaded(submitter, oldText);

                        toastr["error"](response.message);
                        $('#errors').html('');
                        let errors = reverseObj(response.responseJSON.errors);
                        $.map(errors, function (error) {
                            toastr["error"](error);
                        });
                    }
                },
            });
        }
    });

    $('.auth-form').on('submit', function (e) {
        e.preventDefault();
        let form = this;
        let formData = new FormData(this);
        let token = '<?php echo e(csrf_token()); ?>';
        formData.append('_token', token);
        let url = $(this).attr('action');

        $.ajax({
            type: 'post',
            url: url,
            data: formData,
            processData: false,
            contentType: false,
            statusCode: {
                200: (response) => {
                    if (response.code == 201) {
                        toastr["error"](response.message);
                    } else {
                        toastr["success"](response.message)
                        handleFormSuccess(form, response);
                    }
                },
                422: function (response) {
                    let errors = reverseObj(response.responseJSON.errors);
                    $.map(errors, function (error) {
                        toastr["error"](error)
                    });
                }
            }
        })

    });

    function handleFormSuccess(form, response) {
        switch ($(form).attr('id')) {
            case 'phoneLoginForm':
                $('#verifyCodeForm input[name="phone"]').val(response.data.phone);
                $('.login-sec form > div').hide();
                $('#verifyCodeForm > div').show();
                break;
            case 'verifyCodeForm':
                console.log(response.data.url);
                window.location = response.data.url;
                break;
            case 'resetPasswordForm':
            case 'resetPasswordPhone':
                $(form).trigger('reset');
                break;
            default:
                location.reload();
                break;
        }
    }


    $("#reset_password_form").submit(function (event) {
        event.preventDefault();
        var form = document.getElementById('reset_password_form');
        token = '<?php echo e(csrf_token()); ?>';
        var formdata = new FormData(document.querySelector('#reset_password_form'));
        formdata.append("_token", token);

        $.ajax({
            'type': 'post',
            'url': '<?php echo e(url('reset-password')); ?>',
            data: formdata,
            processData: false,
            contentType: false,
            'statusCode': {
                200: function (response) {

                    if (response.code == 201) {
                        toastr["error"](response.message);
                    } else {
                        toastr["success"](response.message)
                        setInterval(function () {
                            window.location = "/login";
                        }, 10);

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


    $("#registerForm").submit(function (event) {
        event.preventDefault();
        let submitter = $(this).find('[type="submit"]');
        let oldText = is_loading(submitter);

        var form = document.getElementById('registerForm');
        var isValidForm = form.checkValidity();
        if (isValidForm) {
            token = '<?php echo e(csrf_token()); ?>';
            var formdata = new FormData(document.querySelector('#registerForm'));
            formdata.append("_token", token);

            $.ajax({
                'type': 'post',
                'url': '<?php echo e(url('user/register')); ?>',
                data: formdata,
                processData: false,
                contentType: false,
                'statusCode': {
                    200: function (response) {

                        if (response.code == 201) {
                            loaded(submitter, oldText);
                            toastr["error"](response.message);
                        } else {
                            //  toastr["success"](response.message);
                            //     window.location = "/activation";
                            Swal.fire({
                                position: 'center-center',
                                icon: 'success',
                                title: response.message,
                                showConfirmButton: false,
                                timer: 3000
                            });
                            setTimeout(function () {
                                window.location = "/";
                            }, 3000);
                        }

                    },
                    422: function (response) {
                        loaded(submitter, oldText);

                        let errors = reverseObj(response.responseJSON.errors);
                        $.map(errors, function (error) {
                            toastr["error"](error)
                        });

                    }
                },
            });
        }

    });

    $("#merchantRegisterForm").submit(function (event) {
        event.preventDefault();
        let submitter = $(this).find('[type="submit"]');
        let oldText = is_loading(submitter);

        var form = document.getElementById('merchantRegisterForm');
        var isValidForm = form.checkValidity();
        if (isValidForm) {
            token = '<?php echo e(csrf_token()); ?>';
            var formdata = new FormData(document.querySelector('#merchantRegisterForm'));
            formdata.append("_token", token);

            $.ajax({
                'type': 'post',
                'url': '<?php echo e(url('merchant/register')); ?>',
                data: formdata,
                processData: false,
                contentType: false,
                'statusCode': {
                    200: function (response) {

                        if (response.code == 201) {
                            loaded(submitter, oldText);
                            toastr["error"](response.message);
                        } else {
                            //  toastr["success"](response.message);
                            //     window.location = "/activation";
                            Swal.fire({
                                position: 'center-center',
                                icon: 'success',
                                title: response.message,
                                showConfirmButton: false,
                                timer: 3000
                            });
                            setTimeout(function () {
                                window.location = "/";
                            }, 3000);
                        }

                    },
                    422: function (response) {
                        loaded(submitter, oldText);
                        let errors = reverseObj(response.responseJSON.errors);
                        $.map(errors, function (error) {
                            toastr["error"](error)
                        });
                    }
                },
            });
        }
    });


    $("#update_account_informations").submit(function (event) {
        event.preventDefault();
        var form = document.getElementById('update_account_informations');
        var isValidForm = form.checkValidity();
        if (isValidForm) {
            token = '<?php echo e(csrf_token()); ?>';
            var formdata = new FormData(document.querySelector('#update_account_informations'));
            formdata.append("_token", token);

            $.ajax({
                'type': 'post',
                'url': '<?php echo e(url('update-account-information')); ?>',
                data: formdata,
                processData: false,
                contentType: false,
                'statusCode': {
                    200: function (response) {
                        $('#errors').html('');

                        toastr["success"](response.message)
                    },
                    422: function (response) {
                        let errors = reverseObj(response.responseJSON.errors);
                        $.map(errors, function (error) {
                            toastr["error"](error)
                        });

                    }
                },
            });
        }
    });
    $("#update_merchant_informations").submit(function (event) {
        event.preventDefault();
        var form = document.getElementById('update_merchant_informations');
        var isValidForm = form.checkValidity();
        if (isValidForm) {
            token = '<?php echo e(csrf_token()); ?>';
            var formdata = new FormData(document.querySelector('#update_merchant_informations'));
            formdata.append("_token", token);

            $.ajax({
                'type': 'post',
                'url': '<?php echo e(url('update-merchant-information')); ?>',
                data: formdata,
                processData: false,
                contentType: false,
                'statusCode': {
                    200: function (response) {
                        $('#errors').html('');

                        toastr["success"](response.message)
                    },
                    422: function (response) {
                        let errors = reverseObj(response.responseJSON.errors);
                        $.map(errors, function (error) {
                            toastr["error"](error)
                        });

                    }
                },
            });
        }
    });


    $("#update_change_form").submit(function (event) {
        event.preventDefault();

        var form = document.getElementById('update_change_form');
        var isValidForm = form.checkValidity();
        if (isValidForm) {
            token = '<?php echo e(csrf_token()); ?>';
            var formdata = new FormData(document.querySelector('#update_change_form'));
            formdata.append("_token", token);

            $.ajax({
                'type': 'post',
                'url': '<?php echo e(url('update-change-password')); ?>',
                data: formdata,
                processData: false,
                contentType: false,
                'statusCode': {
                    200: function (response) {
                        $('#errors').html('');
                        if (response.code == 201) {
                            toastr["error"](response.message)


                        } else {
                            $('input').val('');
                            toastr["success"](response.message)

                        }

                    },
                    422: function (response) {
                        $('#errors').html('');
                        if (response.code == 201) {
                            $.map(response, function (res) {
                                $('#errors').append('<span>' + res.message +
                                    '</span><br>');
                            });
                        } else {
                            let errors = reverseObj(response.responseJSON.errors);
                            $.map(errors, function (error) {
                                // $('#errors').append('<span>'+error+'</span><br>');
                                toastr["error"](error)
                            });

                        }
                    }
                },
            });
        }
    });


    $("#add_address_form").submit(function (event) {
        event.preventDefault();
        var form = document.getElementById('add_address_form');
        var isValidForm = form.checkValidity();
        if (isValidForm) {
            token = '<?php echo e(csrf_token()); ?>';
            var formdata = new FormData(document.querySelector('#add_address_form'));
            formdata.append("_token", token);

            $.ajax({
                'type': 'post',
                'url': '<?php echo e(url('save-account-address')); ?>',
                data: formdata,
                processData: false,
                contentType: false,
                'statusCode': {
                    200: function (response) {
                        $('#errors').html('');
                        $('input').val('');
                        $('#country_id').val('');
                        $('#government_id').html(
                            '<option disabled selected value=""><?php echo e(__('usermodule::login.choose_zone')); ?></opiton>');
                        $('#city_id').html('<option disabled selected value=""><?php echo e(__('usermodule::login.choose_city')); ?></opiton>');
                        $('#zone_id').html('<option disabled selected value=""><?php echo e(__('usermodule::login.choose_government')); ?></opiton>');
                        toastr["success"]("<?php echo e(__('commonmodule::validation.updated')); ?>")

                    },
                    422: function (response) {
                        $('#errors').html('');
                        let errors = reverseObj(response.responseJSON.errors);
                        $.map(errors, function (error) {
                            // $('#errors').append('<span>'+error+'</span><br>');
                            toastr["error"](error)
                        });
                    }
                },
            });
        }
    });


    $("#update_address_form").submit(function (event) {
        event.preventDefault();
        var form = document.getElementById('update_address_form');
        token = '<?php echo e(csrf_token()); ?>';
        var formdata = new FormData(document.querySelector('#update_address_form'));
        formdata.append("_token", token);

        $.ajax({
            'type': 'post',
            'url': '<?php echo e(url('update-account-address')); ?>',
            data: formdata,
            processData: false,
            contentType: false,
            'statusCode': {
                200: function (response) {
                    $('#errors').html('');

                    toastr["success"]("<?php echo e(__('commonmodule::validation.updated')); ?>")
                },
                422: function (response) {
                    $('#errors').html('');
                    let errors = reverseObj(response.responseJSON.errors);
                    $.map(errors, function (error) {
                        toastr["error"](error)
                    });
                }
            },
        });

    });


    $("#activation_form").submit(function (event) {
        event.preventDefault();

        var form = document.getElementById('activation_form');
        token = '<?php echo e(csrf_token()); ?>';
        var formdata = new FormData(document.querySelector('#activation_form'));
        formdata.append("_token", token);

        $.ajax({
            'type': 'post',
            'url': '<?php echo e(url('active-account')); ?>',
            data: formdata,
            processData: false,
            contentType: false,
            'statusCode': {
                200: function (response) {

                    if (response.code == 201) {
                        toastr["error"](response.message);

                    } else {
                        toastr["success"](response.message);
                        window.location = "/";

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


    $('input[name="phone"]').on("input", function () {
        if (/^0/.test(this.value)) {
            this.value = this.value.replace(/^0/, "");
        }
    });

</script>

<?php /**PATH D:\freelancing\أجمل الهواتف\real_web_app\Modules/UserModule\Resources/views/front/auth/scripts.blade.php ENDPATH**/ ?>