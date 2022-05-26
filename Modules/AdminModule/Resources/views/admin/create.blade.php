@extends('commonmodule::layouts.master')

@section('css')
    <link rel="stylesheet" href="{{ asset('assets/admin/css/design-css/design.css')}}" type="text/css">
    <link rel="stylesheet" href="{{ asset('assets/admin/css/design-css/design-icons.css')}}" type="text/css">
    <link rel="stylesheet" href="{{ asset('assets/admin/css/forms/form-validation.css')}}" type="text/css">
    <link rel="stylesheet" href="{{ asset('assets/admin/plugins/select2/select2.min.css')}}" type="text/css">

@endsection


@section('title')
    {{__('adminmodule::admin.add_new_admin')}}
@endsection

@section('content')
    <div id="content" class="main-content">
        <div class="container">
            <div class="page-header">
                <div class="page-title">
                    <h3>{{__('adminmodule::admin.admins')}}</h3>
                    <div class="crumbs">
                        <ul id="breadcrumbs" class="breadcrumb">
                            <li><a href="{{url('/admin')}}"><i class="flaticon-home-fill"></i></a></li>
                            <li><a href="{{url('admin/admins')}}">{{__('adminmodule::admin.admins')}}</a></li>
                            <li class="active"><a href="#">{{__('adminmodule::admin.addNew')}}</a></li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12 layout-spacing col-md-12">
                    <div class="statbox widget box box-shadow">
                        <div class="widget-header">
                            <div class="row">
                                <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                    <h4>{{__('adminmodule::admin.addNew')}}</h4>
                                </div>
                            </div>
                        </div>

                        <div class="widget-content widget-content-area">
                            <form action="{{url('admin/admins')}}" method="POST" class="needs-validation" novalidate>
                                @csrf
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="form-row">
                                            <div class="col-md-6 mb-3">
                                                <label
                                                    for="validationCustom01">{{__('adminmodule::admin.name')}}</label>
                                                <input name="name" value="{{ old('name') }}" class="form-control"
                                                       id="validationCustom01"
                                                       placeholder="{{__('adminmodule::admin.name')}}"
                                                       value="Mark" required>
                                                <div class="invalid-feedback">

                                                </div>
                                                @if ($errors->has('name'))
                                                    @include('commonmodule::includes.error',['errors'=>$errors->toArray(),'filed'=>'name'])
                                                @endif

                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label
                                                    for="validationCustom02">{{__('adminmodule::admin.userName')}}</label>
                                                <input name="username" value="{{ old('username') }}"
                                                       class="form-control"
                                                       id="validationCustom02"
                                                       placeholder="{{__('adminmodule::admin.userName')}}" value="Otto"
                                                       required>
                                                <div class="invalid-feedback">

                                                </div>
                                                @if ($errors->has('username'))
                                                    @include('commonmodule::includes.error',['errors'=>$errors->toArray(),'filed'=>'username'])
                                                @endif

                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="col-md-6 mb-3">
                                                <label
                                                    for="validationCustomUsername">{{__('adminmodule::admin.email')}}</label>
                                                <div class="input-group">
                                                    <input name="email" type="email" value="{{ old('email') }}"
                                                           class="form-control" id="validationCustomUsername"
                                                           placeholder="Example@gmail.com"
                                                           aria-describedby="inputGroupPrepend"
                                                           required>
                                                    <div class="invalid-feedback">
                                                        Please Enter Valid Email Address
                                                    </div>
                                                    @if ($errors->has('email'))
                                                        @include('commonmodule::includes.error',['errors'=>$errors->toArray(),'filed'=>'email'])
                                                    @endif

                                                </div>
                                            </div>

                                            <div class="col-md-6 mb-3">
                                                <label
                                                    for="validationCustom03">{{__('adminmodule::admin.password')}}</label>
                                                <input type="text" name="password" minlength="6" class="form-control"
                                                       id="validationCustom03"
                                                       placeholder="{{__('adminmodule::admin.password')}}" required>
                                                <div class="invalid-feedback">
                                                    MinLength 6 Char
                                                </div>
                                                @if ($errors->has('password'))
                                                    @include('commonmodule::includes.error',['errors'=>$errors->toArray(),'filed'=>'password'])
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="col-md-3 mb-3">
                                                <label
                                                    for="phone_code_id">{{__('usermodule::login.choose_phone_code')}}</label>
                                                <select id="phone_code_id" name="phone_code_id" title="Phone Code"
                                                        class="form-control" required>
                                                    <option disabled selected
                                                            value="">{{__('usermodule::login.choose_phone_code')}}</option>
                                                    @foreach($phone_codes as $code)
                                                        <option
                                                            value="{{$code->id}}"
                                                            {{ old('phone_code_id') == $code->id ? 'selected' :  '' }}>
                                                            {!! $code->iso . ' ' . $code->code !!}</option>
                                                    @endforeach
                                                </select>
                                                <div class="invalid-feedback">
                                                    required
                                                </div>
                                                @if ($errors->has('phone_code_id'))
                                                    @include('commonmodule::includes.error',['errors'=>$errors->toArray(),'filed'=>'phone_code_id'])
                                                @endif
                                            </div>
                                            <div class="col-md-3 mb-3">
                                                <label
                                                    for="validationCustom03">{{__('adminmodule::admin.phone')}}</label>
                                                <input type="text" name="phone" value="{{old('phone')}}"
                                                       minlength="9" maxlength="14"
                                                       class="form-control" id="validationCustom03"
                                                       placeholder="{{__('adminmodule::admin.phone')}}" required>
                                                <div class="invalid-feedback">

                                                </div>
                                                @if ($errors->has('phone'))
                                                    @include('commonmodule::includes.error',['errors'=>$errors->toArray(),'filed'=>'phone'])
                                                @endif
                                            </div>

                                            <div class="col-md-6 mb-3">
                                                <label
                                                    for="validationCustom04">{{__('adminmodule::admin.permissions')}}</label>

                                                <div id="select" name="role" class="form-group mb-4">
                                                    <select name="role" class="custom-select" required="">
                                                        <option
                                                            value="">{{__('adminmodule::admin.permissions')}}</option>
                                                        @foreach($roles as $role)
                                                            <option value="{{$role->name}}">{{$role->name}}</option>
                                                        @endforeach
                                                    </select>
                                                    <div class="valid-feedback"></div>

                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-row">
                                            <div class="col-md-12">

                                                <div class="statbox widget box box-shadow">
                                                    <div class="widget-content ">
                                                        <label>{{__('adminmodule::admin.orders_government')}}</label>

                                                        <select id="orders_zones" name="orders_zones[]"
                                                                multiple="multiple"
                                                                class="disabled-results form-control custom-select">
                                                            <option
                                                                value="all">{{__('adminmodule::admin.all_governments')}}</option>
                                                            @foreach($zones as $key)
                                                                <option
                                                                    value="{{$key->id}}">{{LanguageHelper::nameTranslate($key)}}</option>
                                                            @endforeach

                                                        </select>
                                                    </div>

                                                    @if ($errors->has('orders_zones'))
                                                        @include('commonmodule::includes.error',['errors'=>$errors->toArray(),'filed'=>'orders_zones'])
                                                    @endif

                                                </div>
                                                <div class="col-md-12">
                                                    <label>{{__('adminmodule::admin.statuses')}}</label><br>
                                                    <select id="status_levels" name="status_levels[]"
                                                            multiple="multiple"
                                                            class="disabled-results form-control custom-select">
                                                        <option
                                                            value="all">{{__('adminmodule::admin.all')}}</option>
                                                        @foreach($status as $key)
                                                            <option
                                                                value="{{$key->id}}">{{$key->title}}</option>
                                                        @endforeach
                                                    </select>

                                                </div>
                                                <div class="col-md-12">
                                                    <label
                                                        for="viewed_levels">{{__('adminmodule::admin.view_order_for')}}</label><br>
                                                    <input data-validate-func="required" data-validate-arg="6"
                                                           id="order_type"
                                                           name="order_type" type="radio" value="0"
                                                           checked> {{__('adminmodule::admin.customers')}}
                                                    <input data-validate-func="required" data-validate-arg="6"
                                                           id="order_type"
                                                           name="order_type" type="radio" value="1"
                                                           checked> {{__('adminmodule::admin.merchants')}}
                                                    <input data-validate-func="required" data-validate-arg="6"
                                                           id="order_type"
                                                           name="order_type" type="radio" value="2" checked>
                                                    {{__('adminmodule::admin.all')}}

                                                </div>
                                                <hr>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <button class="btn btn-gradient-danger"
                                        type="submit">{{__('adminmodule::admin.save')}}</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@stop

@section('js')
    <script src="{{ asset('assets/admin/js/forms/bootstrap_validation/bs_validation_script.js')}}"></script>
    <script src="{{ asset('assets/admin/js/design-js/design.js')}}"></script>
    <script src="{{ asset('assets/admin/plugins/select2/select2.min.js')}}"></script>
    <script src="{{ asset('assets/admin/plugins/select2/custom-select2.js')}}"></script>
    <script>
        $("#orders_zones, #status_levels").on('select2:select select2:unselect', function (e) {

            let notSelected = $(this).find('option').not('option:selected').not('option[value="all"]');

            if (e.params.data.id == 'all') {

                if (notSelected.length) {
                    notSelected.prop('selected', true);
                } else {
                    $(this).find('option').prop('selected', false);
                }

            }
            $(this).find('option[value="all"]').prop('selected', false);
            $(this).change();
        });

        $('input[name="phone"]').on("input", function () {
            if (/^0/.test(this.value)) {
                this.value = this.value.replace(/^0/, "");
            }
        });
    </script>
@endsection
