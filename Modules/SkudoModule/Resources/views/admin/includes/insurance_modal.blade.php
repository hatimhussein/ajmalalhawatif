@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/admin/css/design-css/design.css')}}" type="text/css">
    <link rel="stylesheet" href="{{ asset('assets/admin/css/design-css/design-icons.css')}}" type="text/css">

    <!-- BEGIN PAGE LEVEL STYLES -->
    <link rel="stylesheet" href="{{ asset('assets/admin/plugins/file-upload/file-upload-with-preview.css')}}"
          type="text/css">
    <!--  BEGIN CUSTOM STYLE FILE  -->

    <link rel="stylesheet" href="{{ asset('assets/admin/plugins/select2/select2.min.css')}}" type="text/css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/css-toggle-switch/latest/toggle-switch.css" type="text/css">

    <style>
        .row [class*="col-"] .widget .widget-header h4 {
            color: #00d1c1;
        }

        .switch-toggle {
            width: 10em;
        }

        .switch-toggle label:not(.disabled) {
            cursor: pointer;
        }

        .switch-toggle label {
            white-space: nowrap;
        }

        a.disabled {
            pointer-events: none;
            cursor: default;
        }
    </style>
@endpush

<div class="modal fade" id="insurance_modal" tabindex="-1" role="dialog" aria-labelledby="insuranceModalCenterTitle"
     aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"
                    id="exampleModalLongTitle">{{ __('warrantymodule::insurance.insurance') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div id="modal-insurance-box" class="row">
                    ....
                </div>
            </div>
        </div>
    </div>
</div>

@push('js_scripts')
    <script type="text/javascript">
        function showInsurance(id) {
            const url = '{!! route('skudo.insurance.show.modal', 'insurance_id') !!}';

            $('.table-controls a').addClass('disabled');

            $.get(url.replace('insurance_id', id), (response) => {
                $('#modal-insurance-box').html(response);

                $('#insurance_modal').modal('show');

                $('.table-controls a').removeClass('disabled');
            })
        }
    </script>



    <script src="{{ asset('assets/admin/js/design-js/design.js')}}"></script>
    <script src="{{ asset('assets/admin/js/forms/form_validation/form_validation_material.js')}}"></script>
@endpush
