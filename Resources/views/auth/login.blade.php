@extends('backend::layouts.guest')

@section('title', 'Login')

@push('meta')

@endpush

@push('webfont')

@endpush

@push('icon')

@endpush

@push('plugin-style')
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="{{ asset('modules/backend/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
@endpush

@push('inline-style')

@endpush

@push('head-script')

@endpush

@section('body-class', 'login-page')

@section('content')
    <div class="login-box">
        <div class="login-logo">
            <a href="{{ url('/') }}">{{ config('app.name', 'Laravel') }}</a>
        </div>
        <!-- /.login-logo -->
        <div class="card">
            <div class="card-body login-card-body">
                <p class="login-box-msg">Sign in to start your session</p>
                {!! \Form::open(['route' => 'backend.login', 'id' => 'login-form']) !!}
                {!! \Form::gEmail('email', __('Email'), null, true, "fas fa-envelope", "after",
                                    ['autofocus' => 'autofocus', 'minlength' => '5', 'maxlength' => '250',
                                        'size' => '250', 'placeholder' => 'Enter Email Address']) !!}
                {!! \Form::gPassword('password', __('Password'), true, "fas fa-lock", "after",
                                    ["placeholder" => 'Enter Password', 'autocomplete' => "current-password",
                                     'minlength' => '5', 'maxlength' => '250', 'size' => '250']) !!}
                <div class="row">
                    <div class="col-8">
                        <div class="icheck-primary">
                            <input id="remember_me" type="checkbox" name="remember">
                            <label for="remember_me">
                                {{ __('Remember me') }}
                            </label>
                        </div>
                    </div>
                    <!-- /.col -->
                    <div class="col-4">

                        <button type="submit" class="btn btn-primary btn-block">{{ __('Log in') }}</button>
                    </div>
                    <!-- /.col -->
                </div>
                {!! \Form::close() !!}

                <div class="social-auth-links text-center mb-3">
                    <p>- OR -</p>
                    <a href="#" class="btn btn-block btn-primary">
                        <i class="fab fa-facebook mr-2"></i> Sign in using Facebook
                    </a>
                    <a href="#" class="btn btn-block btn-danger">
                        <i class="fab fa-google-plus mr-2"></i> Sign in using Google+
                    </a>
                </div>
                <!-- /.social-auth-links -->

                @if (Route::has('backend.password.request'))
                    <p class="mb-1">
                        <a href="forgot-password.html">I forgot my password</a>
                    </p>
                @endif
                <p class="mb-0">
                    <a href="register.html" class="text-center">Register a new membership</a>
                </p>
            </div>
            <!-- /.login-card-body -->
        </div>
    </div>
    <!-- /.login-box -->
@endsection


@push('plugin-script')
    <script src="{{ asset('modules/backend/plugins/jquery-validation/jquery.validate.min.js') }}"></script>
@endpush

@push('page-script')
    <script>
        $(function () {
            $("#login-form").validate({
                rules: {
                    emails: {
                        required: true,
                        minlength: 10,
                        maxlength: 255,
                        email: true
                    },
                    password: {
                        required: true,
                        minlength: 5,
                        maxlength: 250
                    },
                },
                messages: {
                    email: {
                        required: "Please enter a email address",
                        email: "Please enter a vaild email address"
                    },
                    password: {
                        required: "Please provide a password",
                        minlength: "Your password must be at least 5 characters long"
                    },
                    terms: "Please accept our terms"
                },
                errorElement: 'span',
                errorPlacement: function (error, element) {
                    error.addClass('invalid-feedback');
                    element.closest('.form-group').append(error);
                },
                highlight: function (element, errorClass, validClass) {
                    $(element).addClass('is-invalid');
                },
                unhighlight: function (element, errorClass, validClass) {
                    $(element).removeClass('is-invalid');
                }
            });
        });
    </script>
@endpush
