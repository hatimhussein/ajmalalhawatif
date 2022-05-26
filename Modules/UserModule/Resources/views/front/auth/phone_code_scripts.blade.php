<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script>
    let codeData = {!! $phone_codes->toJson() !!};
    $(document).ready(function () {
        function formatCountry(country) {
            if (!country.id) {
                return country.iso + ' ' + country.code;
            }
            return $(
                '<span class="flag-icon flag-icon-' + country.iso.toLowerCase() + ' flag-icon-squared"></span> ' +
                '<span class="flag-text">' + country.text + "</span>"
            );
        }

        $('.select2').select2({
            data: codeData,
            templateResult: formatCountry,
            templateSelection: formatCountry,
        });
    });
</script>
