<script>
    let zones_list = [];
    const zoneSelects = $("#zone_id, #zone_id2");

    if (zoneSelects.length > 0)
        getZonesList();

    function getZonesList() {
        $.ajax({
            type: 'get',
            url: '<?php echo e(url("getZoneList")); ?>',
            statusCode: {
                200: function (response) {
                    zones_list = response.data;
                    appendZonesToSelect(zones_list);
                },
                422: function (response) {
                    $('#errors').html('حدث خطأ ما ');
                }
            },
        });
    }

    function appendZonesToSelect(zones_list) {
        let def = zoneSelects.val();
        zoneSelects.html('<option disabled selected value=""><?php echo e(__("usermodule::login.choose_government")); ?></opiton>');
        $.map(zones_list, (zone) => {
            zoneSelects.append(`<option value="${zone.id}">${zone.name}</opiton>`);
        });
        zoneSelects.val(def);
        $('.chosen-select').trigger('chosen:updated');
    }

    function getZone(zone_id) {
        return zones_list[zone_id];
    }


    $('#zone_id, #zone_id2').on('change', function () {
        let zone_id = $(this).val();
        let zone = getZone(zone_id);

        let extra = $(this).attr('id') === 'zone_id2' ? '2' : '';
        updateAreasValues(zone, extra);
    });

    function updateAreasValues(zone, extra = '') {
        let country = zone.country
        let government = zone.government
        let city = zone.city
        $(`#country_id${extra}`).val(country.id);
        $(`#country_id_text${extra}`).val(country.name);
        $(`#government_id${extra}`).val(government.id);
        $(`#government_id_text${extra}`).val(government.name);
        $(`#city_id${extra}`).val(city.id);
        $(`#city_id_text${extra}`).val(city.name);
        $('.chosen-select').trigger('chosen:updated');
    }
</script>
<?php /**PATH D:\freelancing\أجمل الهواتف\real_web_app\Modules/CommonModule\Resources/views/front/includes/area_scripts.blade.php ENDPATH**/ ?>