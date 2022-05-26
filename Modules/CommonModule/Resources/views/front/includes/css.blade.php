<!--  GLOBAL MANDATORY STYLES -->

<link rel="stylesheet" href="{{ asset('assets/front/assets/css/animate.css')}}" type="text/css">

<link rel="stylesheet" href="{{ asset('assets/front/assets/css/animate.css')}}" type="text/css">
<link rel="stylesheet" href="{{ asset('assets/front/assets/css/bootstrap.min.css')}}" type="text/css">
<link rel="stylesheet" href="{{ asset('assets/front/assets/css/swiper-bundle.min.css')}}" type="text/css">

@if(App::getLocale()=='en')
    <link rel="stylesheet" href="{{ asset('assets/front/assets/css/style.css')}}?key=<?php echo time(); ?>" type="text/css">
@else
    <!-- Arabic -->
    <link rel="stylesheet" href="{{ asset('assets/front/assets/css/style-rtl.css')}}?key=<?php echo time(); ?>" type="text/css">
@endif

{{--<link rel="stylesheet" href="{{ asset('assets/front/assets/css/index-2-css/revslider.css')}}" type="text/css" >--}}
<link rel="stylesheet" href="{{ asset('assets/front/assets/css/owl.carousel.css')}}" type="text/css">
<link rel="stylesheet" href="{{ asset('assets/front/assets/css/owl.theme.css')}}" type="text/css">

<link rel="stylesheet" href="{{ asset('assets/front/assets/css/flexslider.css')}}" type="text/css">
<link rel="stylesheet" href="{{ asset('assets/front/assets/css/font-awesome.css')}}" type="text/css">

<link rel="stylesheet" href="{{ asset('assets/front/plugins/toastr/toastr.min.css')}}" type="text/css">
<link rel="stylesheet" href="{{ asset('assets/front/plugins/toastr/custom-notification.css')}}" type="text/css">

<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/themes/smoothness/jquery-ui.css"
      type="text/css">

<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/themes/smoothness/jquery-ui.css"
      type="text/css">
<link
    href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,300,700,800,400,600'
    rel='stylesheet' type='text/css'>

<!-- color -->
{{-- <link rel="stylesheet" href="{{ asset('assets/front/assets/css/color-style.css')}}" type="text/css" > --}}
@include('commonmodule::front.includes.color')


<style>
    input#search::placeholder {
        text-align: center;
    }

    input#search::-webkit-input-placeholder {
        text-align: center;
    }

    input#search:-moz-placeholder {
        text-align: center;
    }
</style>


@yield('css')
@yield('cssPond')
