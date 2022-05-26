<!-- <script src="{{asset('assets/admin/plugins/sweetalert/sweetalert.min.js')}}"></script> -->

<link rel="stylesheet" href="{{ asset('assets/admin/plugins/notification/toastr/toastr.min.css')}}" type="text/css" >
<link rel="stylesheet" href="{{ asset('assets/admin/css/ui-kit/custom-notification.css')}}" type="text/css" >



<!-- toastr -->
<script src="{{ asset('assets/admin/plugins/notification/toastr/toastr.min.js')}}"></script>
<script src="{{ asset('assets/admin/js/ui-kit/notification/custom-toastr.js')}}"></script>
<!-- END PAGE LEVEL PLUGINS -->


<script>


toastr.options = {
    closeButton: $('#closeButton').prop('checked'),
    debug: $('#debugInfo').prop('checked'),
    newestOnTop: $('#newestOnTop').prop('checked'),
    progressBar: $('#progressBar').prop('checked'),
    rtl: $('#rtl').prop('checked'),
    positionClass: $('#positionGroup input:radio:checked').val() || 'toast-top-right',
    preventDuplicates: $('#preventDuplicates').prop('checked'),
    onclick: null
};

</script>
