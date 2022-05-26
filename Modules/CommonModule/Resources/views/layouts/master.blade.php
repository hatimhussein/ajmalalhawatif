<!DOCTYPE html>
<html dir="ltr">
<head>

    <meta charset="utf-8">
    <META http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">

    <title> @yield('title')</title>

    @include('commonmodule::includes.css')

</head>

<body>
<!-- Site header -->
@include('commonmodule::includes.header')
<!-- =============================================== -->
<!-- =============================================== -->

<div class="main-container" id="container">
    <div class="overlay"></div>
    <div class="cs-overlay"></div>


@include('commonmodule::includes.aside')

<!-- Main content -->
@yield('content')
<!-- /.content -->
</div>
<!-- /.content-wrapper -->

@include('commonmodule::includes.footer')


<!-- ./wrapper -->


@include('commonmodule::includes.js')


</body>
</html>
