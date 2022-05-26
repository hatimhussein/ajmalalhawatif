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


    $("#country_id").on('change', function () {
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

    $("#government_id").on('change', function () {
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

    $("#city_id").on('change', function () {
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


    $("#country_id2").on('change', function () {
        var country_id = $(this).val();
        let country = getCountry(country_id);

        $('#government_id2').html('<option disabled selected value="">{{__("usermodule::login.choose_zone")}}</opiton>');
        $('#city_id2').html('<option disabled selected value="">{{__("usermodule::login.choose_city")}}</opiton>');
        $('#zone_id2').html('<option disabled selected value="">{{__("usermodule::login.choose_government")}}</opiton>');

        if (country) {
            @if(session('locale')=='en')
            $.map(country.governments, function (government) {
                $('#government_id2').append('<option value="' + government.id + '">' + government.name_en + '</opiton>');
            });
            @else
            $.map(country.governments, function (government) {
                $('#government_id2').append('<option value="' + government.id + '">' + government.name_ar + '</opiton>');
            });
            @endif
        }
        $('.chosen-select').trigger('chosen:updated');
    });

    $("#government_id2").on('change', function () {
        var country_id = $('#country_id2').val();
        var gov_id = $(this).val();

        let country = getCountry(country_id);
        let government = getGovernment(gov_id, country);

        $('#city_id2').html('<option disabled selected value="">{{__("usermodule::login.choose_city")}}</opiton>');
        $('#zone_id2').html('<option disabled selected value="">{{__("usermodule::login.choose_government")}}</opiton>');

        if (government) {
            @if(session('locale')=='en')
            $.map(government.cities, function (city) {
                $('#city_id2').append('<option value="' + city.id + '">' + city.name_en + '</opiton>');
            });
            @else
            $.map(government.cities, function (city) {
                $('#city_id2').append('<option value="' + city.id + '">' + city.name_ar + '</opiton>');
            });
            @endif
        }
        $('.chosen-select').trigger('chosen:updated');
    });

    $("#city_id2").on('change', function () {
        var country_id = $('#country_id2').val();
        var gov_id = $('#government_id2').val();
        var city_id = $(this).val();

        let country = getCountry(country_id);
        let government = getGovernment(gov_id, country);
        let city = getCity(city_id, government);

        $('#zone_id2').html('<option disabled selected value="">{{__("usermodule::login.choose_government")}}</opiton>');

        if (city) {
            @if(session('locale')=='en')
            $.map(city.zones, function (zone) {
                $('#zone_id2').append('<option value="' + zone.id + '">' + zone.name_en + '</opiton>');
            });
            @else
            $.map(city.zones, function (zone) {
                $('#zone_id2').append('<option value="' + zone.id + '">' + zone.name_ar + '</opiton>');
            });
            @endif
        }
        $('.chosen-select').trigger('chosen:updated');
    });

    $('input[name="phone"]').on("input", function () {
        if (/^0/.test(this.value)) {
            this.value = this.value.replace(/^0/, "");
        }
    });
</script>
