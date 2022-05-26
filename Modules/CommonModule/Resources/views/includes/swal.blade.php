<!-- <script src="{{asset('assets/admin/plugins/sweetalert/sweetalert.min.js')}}"></script> -->

<link rel="stylesheet" href="{{ asset('assets/admin/plugins/animate/animate.css')}}" type="text/css">
<link rel="stylesheet" href="{{ asset('assets/admin/plugins/sweetalerts/sweetalert2.min.css')}}" type="text/css">
<link rel="stylesheet" href="{{ asset('assets/admin/plugins/sweetalerts/sweetalert.css')}}" type="text/css">
<link rel="stylesheet" href="{{ asset('assets/admin/css/ui-kit/custom-sweetalert.css')}}" type="text/css">

<script src="{{ asset('assets/admin/plugins/sweetalerts/promise-polyfill.js')}}"></script>
<script src="{{ asset('assets/admin/plugins/sweetalerts/sweetalert2.min.js')}}"></script>
<!-- <script src="{{ asset('assets/admin/plugins/sweetalerts/custom-sweetalert.js')}}"></script> -->

@if (session('success'))
    <script>
        swal("{{__('commonmodule::swal.good')}}", "{{__('commonmodule::swal.saved')}}", "success", {button: "{{__('commonmodule::swal.btn')}}",});
    </script>
@endif

@if (session('updated')=='updated')
    <script>
        swal("{{__('commonmodule::swal.good')}}", "{{__('commonmodule::swal.edited')}}", "success", {button: "{{__('commonmodule::swal.btn')}}",});
    </script>

@elseif(session('updated')=='failed')
    <script>
        swal("{{__('commonmodule::swal.fail')}}", "الشجرة كدا اكبر من 3 مينفعش الفئة دى ", "error", {button: "{{__('commonmodule::swal.btn')}}",});
    </script>

@endif

@if (session('deleted')=='deleted')
    <script>
        swal("{{__('commonmodule::swal.good')}}", "{{__('commonmodule::swal.deleted')}}", "success", {button: "{{__('commonmodule::swal.btn')}}",});
    </script>
@elseif(session('deleted')=='failed')
    <script>
        swal("{{__('commonmodule::swal.fail')}}", "لا يمكن حذف هذة الفئة حيث انها تحتوى على فئات فرعية او منتجات !!!", "error", {button: "{{__('commonmodule::swal.btn')}}",});
    </script>


@elseif(session('deleted')=='failed-status')
    <script>
        swal("oops", "Can't Delete This Staus It Assigned To Orders", "error", {button: "{{__('commonmodule::swal.btn')}}",});
    </script>

@elseif(session('deleted'))
    <script>
        swal("oops", "{{session('deleted')}}", "error", {button: "{{__('commonmodule::swal.btn')}}",});
    </script>
@endif


@if (session('validated'))
    <script>
        swal("{{__('commonmodule::swal.fail')}}", "لا بد من اختيار قسم للمنتج", "error", {button: "{{__('commonmodule::swal.btn')}}",});
    </script>
@endif

@if (session('next'))
    <script>
        swal("{{__('commonmodule::swal.fail')}}", "لا يوجد اوردارات تالية", "error", {button: "{{__('commonmodule::swal.btn')}}",});
    </script>
@endif

@if (session('previous'))
    <script>
        swal("{{__('commonmodule::swal.fail')}}", "لا يوجد اوردارات سابقة", "error", {button: "{{__('commonmodule::swal.btn')}}",});
    </script>
@endif
@if (session('product_deleted')=='deleted')
    <script>
        swal("{{__('commonmodule::swal.good')}}", "{{__('productmodule::product.deleted_success')}}", "success", {button: "{{__('commonmodule::swal.btn')}}",});
    </script>
@elseif(session('product_deleted')=='failed')
    <script>
        swal("{{__('commonmodule::swal.fail')}}", "{{__('productmodule::product.deleted_fail')}}", {button: "{{__('commonmodule::swal.btn')}}",});
    </script>
@endif

@if(session('user_deleted')=='failed')
    <script>
        swal("{{__('commonmodule::swal.fail')}}", "{{__('usermodule::admin.deleted_fail')}}", {button: "{{__('commonmodule::swal.btn')}}",});
    </script>
@endif


@if(session('warning'))
    <script>
        swal("{{__('commonmodule::swal.warning')}}", "{{session('warning')}}", "warning", {button: "{{__('commonmodule::swal.btn')}}",});
    </script>
@endif
