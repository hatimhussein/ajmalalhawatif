@section('js')
    @include('commonmodule::includes.swal')

    <script type="text/javascript">
        $(document).ready(function () {


            var values = [];
            var names = [];
            var selected_options = '';
            $("#product_form").submit(function (event) {
                event.preventDefault();
                $('a[href = "#finish"]').html('<div class="cp-spinner cp-skeleton"></div>');


                var form = document.getElementById('product_form');
                var isValidForm = form.checkValidity();

                token = '{{csrf_token()}}';
                product_photo = $('#product_photo').prop('files')[0];
                product_images = $('#product_images').prop('files');

                var formdata = new FormData(document.querySelector('#product_form'));
                formdata.append("product_photo", product_photo);
                formdata.append("product_images", product_images);
                formdata.append("_token", token);
                formdata.append("desc_ar", CKEDITOR.instances.desc_ar.getData());
                formdata.append("desc_en", CKEDITOR.instances.desc_en.getData());


                console.log(formdata);

                $.ajax({
                    'type': 'post',
                    'url': '{{ url("admin/product") }}',
                    data: formdata,
                    processData: false,
                    contentType: false,

                    'statusCode': {
                        200: function (response) {
                            $('a[href = "#finish"]').html('Finish');

                            swal("{{__('productmodule::admin.done')}}", "{{__('productmodule::admin.added_successfully')}}", "success", {button: "Ok",});
                            window.location = "/admin/product";

                        },
                        422: function (response) {
                            var erro = '';
                            $.map(response.responseJSON.errors, function (error) {
                                // erro+=error[0]+'<br><br>';
                                if (error[0])
                                    swal("Error", error[0], "error", {button: "Ok",});

                            });
                            $('a[href = "#finish"]').html('Finish');

                            // swal("خطأ", erro, "error", { button: "Ok", });

                        }
                    },
                });

            });

            $('a[href = "#finish"]').click(function () {
                var a = $('#product_form').submit();
            });


            // start if product is simple remove quantity input
            $('.mdl-radio__button').on('click', function () {
                var type = $(this).val();

                if (type != 'simple') {
                    $('#quantity').addClass('hidden');
                    $('.option_body').removeClass('hidden');

                    $('#option_tab').text('Options');
                } else {
                    $('#quantity').removeClass('hidden');
                    $('.option_body').addClass('hidden');

                    $('#option_tab').text('Quantity');

                }
            });
            // end if product is simple remove quantity input


            // start get options_value
            // $('a[href = "#next"]').click(function(){
            //   if ($('.current').find('#combination_btn').length) {
            //     getOptionValues();
            //   }
            //
            //
            //
            // });
            // $('#combination_btn').parents('li').on('click',function(){
            //     getOptionValues();
            // });


            document.addEventListener('change', function (e) {
                if (hasClass(e.target, 'options')) {


                    var result = getOptionValues(e.target.value, 'add');
                    if (!result) {
                        $(e.target).val(selected_options);
                    }


                }

            }, false);


            document.addEventListener('click', function (e) {
                if (hasClass(e.target, 'options')) {
                    selected_options = e.target.value
                }

            }, false);


            function hasClass(elem, className) {
                return elem.className.split(' ').indexOf(className) > -1;
            }

            function getOptionValues(val, method) {
                var options = $('.options option:selected');

                if (method == 'add') {


                    if (values.indexOf(val) == -1) {
                        values = $.map(options, function (option) {
                            return option.value;
                        });
                    } else {
                        alert('{{__("productmodule::admin.exists")}}');
                        return false;
                    }
                }

                if (selected_options != '' && $.inArray(selected_options, values)) {
                    // values.splice($.inArray(selected_options, values),1);
                    console.log(values);
                    $('.' + selected_options).each(function () {
                        console.log(names);
                        names.splice($.inArray($(this).data('name'), names), 1);
                    });

                    $('.' + selected_options).remove();
                }


                if (values.length === 0) {
                    $('#options_values,#combinations').html('');
                    return;
                }

                $.ajax({
                    'type': 'GET',
                    'url': '{{ url("admin/option-with-ids") }}',
                    data: {
                        '_token': '{{csrf_token()}}',
                        'ids': values,
                    },
                    'statusCode': {
                        200: function (response) {

                            console.log(response);

                            names = [];


                            $('#selectd_option').val(values);
                            names = [];
                            $('#options_values,#combinations').html('');
                            $.map(response.data, function (option) {
                                console.log(option);


                                var name = '';
                                var option_name = '';
                                var opt = $.map(option.option_values, function (value) {
                                    name = value.name_ar;
                                    option_name = option.name_ar;

                                    // @if((Session('locale')=='en'))
                                    //  name=value.name_en;
                                    //  option_name=option.name_en;
                                    // @else
                                    //  name=value.name_ar;
                                    //  option_name=option.name_ar;
                                    // @endif

                                    $('#combinations').append('<option>'+name+'</option>');
                                    return '<div class="n-chk">' +
                                        '<label class="new-control new-radio radio-info">' +
                                        '<input data-option_name="' + name + '" value="' + value.id + '" data-name="' + option.id + '" name="' + option.id + '" type="radio" class="new-control-input option_type" >' +
                                        '<span class="new-control-indicator"></span>' + name +
                                        '</label>' +
                                        '</div>';

                                });

                                $('#options_values').append(
                                    '<div class="statbox widget box box-shadow">' +
                                    '<div class="widget-header">' +
                                    '<div class="row">' +
                                    '<div class="col-xl-12 col-md-12 col-sm-12 col-12">' +
                                    '<h4>' + option_name + '</h4>' +
                                    '</div>' +
                                    '</div>' +
                                    '</div>' +
                                    '<div style="padding:0px" class="widget-content widget-content-area">' + opt +

                                    '</div>' +
                                    '</div>'
                                );


                            });


                        },
                        422: function (response) {
                            alert('fails');
                        }
                    },
                })

                return true;
            }

            // end get options_value


            // start combination section

            $('#generate').on('click', function () {

                var RadeoButtonStatusCheck = $('#selectd_option').val(); // 10,11
                var mainPrice = $('#mainPrice').val();

                if (!RadeoButtonStatusCheck) {
                    alert('{{__("productmodule::admin.specify__cobmination")}}');
                    return;
                }
                var selected_classes = '';
                var result = RadeoButtonStatusCheck.split(','); // [10,11]

                result = result.filter(Boolean)


                var name = $.map(result, function (option_id) {
                    // return  $('input[name='+option_id+']:checked').val()
                    selected_classes += $('input[name=' + option_id + ']:checked').data('name') + ' ';
                    return $('input[name=' + option_id + ']:checked').data('option_name');

                });

                var combination_values = $.map(result, function (option_id) {
                    // return  $('input[name='+option_id+']:checked').val()
                    return $('input[name=' + option_id + ']:checked').val();

                });


                if (name == '') {
                    alert('{{__("productmodule::admin.choose_cobmination")}}');
                    return;
                }
                if (result.length != name.length) {
                    alert("{{__('productmodule::admin.correct_cobmination_options')}}");
                    return;

                }

                if (names.includes(name.join())) {
                    alert('{{__("productmodule::admin.exists")}}');
                    return;
                }

                names.push(name.join());


                $('#acutal_combinations').append(
                    '<tr class="' + selected_classes + '" data-name="' + name + '">' +
                    '<td><span>' + name + '</span></td>' +
                    '<input type="hidden" name="combination_names[' + combination_values + ']"  class="form-control-rounded form-control " value="' + name + '" id="inlineFormInputName2" placeholder="Combination">' +
                    '<input type="hidden" name="combination_values[]"  class="form-control-rounded form-control " value="' + combination_values + '" id="inlineFormInputName2" placeholder="Combination">' +
                    '<input type="hidden" name="options_ids[' + combination_values + ']"  class="form-control-rounded form-control " value="' + selected_classes + '" id="inlineFormInputName2" placeholder="Combination">' +
                    '<td><input type="number"  onkeydown="return event.keyCode !== 69" name="combination_qty[' + combination_values + ']" class="form-control-rounded form-control "  id="inlineFormInputName2" placeholder="Quantity"></td>' +
                    '<td><input type="text" name="combination_price[' + combination_values + ']" class="form-control-rounded form-control " onchange="getTotalPrice(this.value,this)" value="0"   id="inlineFormInputName3" placeholder="Price"></td>' +
                    '<td class=" text-center">' + mainPrice + '</td>' +
                    '<td class=" text-center"><i  data-combination_name="' + name + '" class="delete_one_combination t-icon t-hover-icon flaticon-cancel-12"></i></td>' +
                    '</tr>'
                );


            });


            document.addEventListener('click', function (e) {
                if (hasClass(e.target, 'delete_one_combination')) {
                    var removed_name = $(e.target).data('combination_name');
                    names.splice($.inArray(removed_name, names), 1);

                    $(e.target).parents('tr').remove();

                }

            }, false);


            // end combination section


            $('.repeater-default').repeater({
                show: function () {
                    $(this).slideDown('slow');
                }
            });
            $('.default-repeater').repeater({
                defaultValues: {features: ['abs'], make: 'ford', model: 'Mustang'}
            });
            $('.repeater-slide').repeater({
                defaultValues: {
                    'textarea-input': 'foo',
                    'text-input': 'bar',
                    'select-input': 'B',
                    'checkbox-input': ['A', 'B'],
                    'radio-input': 'B'
                },
                hide: function (deleteElement) {
                    if (confirm('Are you sure you want to delete this element?')) {

                        var old_value = $(this).find('.options').val();

                        if (old_value != null) {
                            $(this).find('.options').val('');
                            values.splice($.inArray(old_value, values), 1);
                            getOptionValues(values, 'delete');

                            $('.' + old_value).each(function () {
                                names.splice($.inArray($(this).data('name'), names), 1);
                            });
                            $('.' + old_value).remove();

                        }

                        $(this).slideUp(deleteElement);
                    }
                },
            });


        });

        function getTotalPrice(price, that) {
            var mainPrice = parseFloat($('#mainPrice').val());
            price = parseFloat(price);
            $($(that).parent().parent().children()[6]).text(mainPrice + price);
        }


        // plugins
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



    <script>
        //First upload
        var firstUpload = new FileUploadWithPreview('myFirstImage')
        //Second upload
        var secondUpload = new FileUploadWithPreview('mySecondImage')
        //Video upload
        var secondUpload = new FileUploadWithPreview('myVideo')
    </script>
    <!-- END PAGE LEVEL PLUGINS -->

    <script>
        $('#categoryFormModal').submit(function (e) {
            e.preventDefault();
            var form = document.getElementById('categoryFormModal');
            var isValidForm = form.checkValidity();

            token = '{{csrf_token()}}';
            category_photo = $('#category_photo').prop('files')[0];
            $('#categorySelection').html(' <option disabled selected value="">{{__('productmodule::admin.category')}}</option>')
            var formdata = new FormData(document.querySelector('#categoryFormModal'));
            formdata.append("photo", category_photo);
            formdata.append("_token", token);

            $.ajax({
                'type': 'post',
                'url': '{{ url("admin/category/setCategory") }}',
                data: formdata,
                processData: false,
                contentType: false,

                'statusCode': {
                    200: function (response) {
                        $('#saveCategoryBtn').html('save');
                        $.map(response.data, function (item) {
                            @if(Session::get('lang')=='en')
                            $('#categorySelection').append('<option value="' + item.id + '">' + item.name_en + '</option>');
                            @else
                            $('#categorySelection').append('<option value="' + item.id + '">' + item.name_ar + '</option>');
                            @endif
                        });

                        document.getElementById('categoryFormModal').reset();
                        $('#categoryClose').click();
                    },
                    422: function (response) {
                        var erro = '';
                        $.map(response.responseJSON.errors, function (error) {
                            // erro+=error[0]+'<br><br>';
                            if (error[0])
                                swal("Error", error[0], "error", {button: "Ok",});

                        });
                        $('#saveCategoryBtn').html('save');

                        // swal("خطأ", erro, "error", { button: "Ok", });

                    }
                },
            });

        });


        $('#brandFormModal').submit(function (e) {
            e.preventDefault();
            var form = document.getElementById('brandFormModal');
            var isValidForm = form.checkValidity();

            token = '{{csrf_token()}}';
            category_photo = $('#brand_photo').prop('files')[0];
            $('#brandSelection').html(' <option disabled selected value="">{{__('productmodule::admin.choose')}}</option>')
            var formdata = new FormData(document.querySelector('#brandFormModal'));
            formdata.append("photo", category_photo);
            formdata.append("_token", token);

            $.ajax({
                'type': 'post',
                'url': '{{ url("admin/setBrand") }}',
                data: formdata,
                processData: false,
                contentType: false,

                'statusCode': {
                    200: function (response) {
                        $('#saveBrandBtn').html('save');
                        $.map(response.data, function (item) {
                            @if(Session::get('lang')=='en')
                            $('#brandSelection').append('<option value="' + item.id + '">' + item.name_en + '</option>');
                            @else
                            $('#brandSelection').append('<option value="' + item.id + '">' + item.name_ar + '</option>');
                            @endif
                        });
                        document.getElementById('brandFormModal').reset();
                        $('#brandClose').click();
                    },
                    422: function (response) {
                        var erro = '';
                        $.map(response.responseJSON.errors, function (error) {
                            // erro+=error[0]+'<br><br>';
                            if (error[0])
                                swal("Error", error[0], "error", {button: "Ok",});

                        });
                        $('#saveCategoryBtn').html('save');

                        // swal("خطأ", erro, "error", { button: "Ok", });

                    }
                },
            });

        });

        $('#attributeFormModal').submit(function (e) {
            e.preventDefault();
            var form = document.getElementById('attributeFormModal');
            var isValidForm = form.checkValidity();

            token = '{{csrf_token()}}';
            $('#attributeSelection').html(' <option disabled selected value="">{{__('productmodule::admin.choose')}}</option>')
            var formdata = new FormData(document.querySelector('#attributeFormModal'));
            formdata.append("_token", token);

            $.ajax({
                'type': 'post',
                'url': '{{ url("admin/setAttribute") }}',
                data: formdata,
                processData: false,
                contentType: false,

                'statusCode': {
                    200: function (response) {
                        $('#saveAttributeBtn').html('save');
                        $.map(response.data, function (item) {
                            @if(Session::get('lang')=='en')
                            $('#attributeSelection').append('<option value="' + item.id + '">' + item.name_en + '</option>');
                            @else
                            $('#attributeSelection').append('<option value="' + item.id + '">' + item.name_ar + '</option>');
                            @endif
                        });
                        document.getElementById('attributeFormModal').reset();
                        $('#attributeClose').click();
                    },
                    422: function (response) {
                        var erro = '';
                        $.map(response.responseJSON.errors, function (error) {
                            // erro+=error[0]+'<br><br>';
                            if (error[0])
                                swal("Error", error[0], "error", {button: "Ok",});

                        });
                        $('#saveAttributeBtn').html('save');

                        // swal("خطأ", erro, "error", { button: "Ok", });

                    }
                },
            });

        });


        $('#optionFormModal').submit(function (e) {
            e.preventDefault();
            var form = document.getElementById('optionFormModal');
            var isValidForm = form.checkValidity();

            token = '{{csrf_token()}}';
            $('#optionSelection').html(' <option disabled selected value="">{{__('productmodule::admin.choose')}}</option>')
            $('#optionInValue').html(' <option disabled selected value="">{{__('productmodule::admin.choose')}}</option>')
            var formdata = new FormData(document.querySelector('#optionFormModal'));
            formdata.append("_token", token);

            $.ajax({
                'type': 'post',
                'url': '{{ url("admin/setOption") }}',
                data: formdata,
                processData: false,
                contentType: false,

                'statusCode': {
                    200: function (response) {
                        $('#saveOptionBtn').html('save');
                        $.map(response.data, function (item) {
                            @if(Session::get('lang')=='en')
                            $('#optionSelection').append('<option value="' + item.id + '">' + item.name_en + '</option>');
                            $('#optionInValue').append('<option value="' + item.id + '">' + item.name_en + '</option>');
                            @else
                            $('#optionSelection').append('<option value="' + item.id + '">' + item.name_ar + '</option>');
                            $('#optionInValue').append('<option value="' + item.id + '">' + item.name_ar + '</option>');
                            @endif
                        });
                        document.getElementById('optionFormModal').reset();
                        $('#optionClose').click();
                    },
                    422: function (response) {
                        var erro = '';
                        $.map(response.responseJSON.errors, function (error) {
                            // erro+=error[0]+'<br><br>';
                            if (error[0])
                                swal("Error", error[0], "error", {button: "Ok",});

                        });
                        $('#saveOptionBtn').html('save');

                        // swal("خطأ", erro, "error", { button: "Ok", });

                    }
                },
            });

        });

        $('#valueFormModal').submit(function (e) {
            e.preventDefault();
            var form = document.getElementById('valueFormModal');
            var isValidForm = form.checkValidity();

            token = '{{csrf_token()}}';
            var formdata = new FormData(document.querySelector('#valueFormModal'));
            formdata.append("_token", token);

            $.ajax({
                'type': 'post',
                'url': '{{ url("admin/setValue") }}',
                data: formdata,
                processData: false,
                contentType: false,

                'statusCode': {
                    200: function (response) {
                        $('#saveValueBtn').html('save');
                        alert('تمت الاضافه يرجى اعاده اختيار الخيار')
                        document.getElementById('valueFormModal').reset();
                        $('#valueClose').click();
                    },
                    422: function (response) {
                        var erro = '';
                        $.map(response.responseJSON.errors, function (error) {
                            // erro+=error[0]+'<br><br>';
                            if (error[0])
                                swal("Error", error[0], "error", {button: "Ok",});

                        });
                        $('#saveValueBtn').html('save');

                        // swal("خطأ", erro, "error", { button: "Ok", });

                    }
                },
            });

        });

        $(document).ready(function () {

            $('#option').on('change', function () {
                var type = $(this).find(':selected').data('type');
                if (type == 'color')
                    $('#color').css("display", "flex");
                else
                    $('#color').css("display", "none");

                $('#type').val(type);
            });

        });
    </script>




@endsection
