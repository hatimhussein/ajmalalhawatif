<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>تسجيل الدخول</title>
    <link rel="stylesheet" href="{{asset('assets/admin')}}/css/users/login-3.css">
    <link rel="stylesheet" href="{{asset('assets/admin')}}/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{asset('assets/admin')}}/assets/css/plugins.css">


    <!-- Google Font -->
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700' rel='stylesheet' type='text/css'>
</head>
<body class="login">

<form action="{{route('admin_login')}}" method="post" class="form-login" style="padding-top: 0;">
    @csrf
    <div class="row">
        <div class="col-md-12 text-center mb-4" style="height: 207px;background-image: url('{{asset('assets/admin/img/logo-ajmal.png')}}');background-position: center;background-repeat: no-repeat;background-size: cover;
    ">
{{--            <img alt="logo" src="{{asset('assets/admin/img/logo-ajmal.png')}}" class="theme-logo" style="width: 150px;">--}}
        </div>
        <div class="col-md-12">


            <label for="inputEmail" class="">Email</label>
            <input type="email" name="email" id="inputEmail" class="form-control mb-4" placeholder="Login" required>
            <label for="inputPassword" class="">Password</label>
            <input type="password" name="password" id="inputPassword" class="form-control mb-5" placeholder="Password"
                   required>
            @foreach ($errors->all() as $error)
                <div class="text-center alert text-danger">{{ $error }}</div>
            @endforeach
            <button type="submit" class="btn btn-gradient-dark btn-rounded btn-block">Sign in</button>

        </div>

    </div>
</form>

<!-- jQuery 3 -->
<script src="{{ asset('assets/admin') }}/js/libs/jquery-3.1.1.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="{{ asset('assets/admin') }}/bootstrap/js/popper.min.js"></script>
<script src="{{ asset('assets/admin') }}/bootstrap/js/bootstrap.min.js"></script>


</body>
</html>
