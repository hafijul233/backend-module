<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <title>{{ config('app.name', 'Laravel') }} | @yield('title')</title>
    <!-- meta Tags -->
@include('backend::layouts.includes.meta')
<!-- Web Font-->
@include('backend::layouts.includes.webfont')
<!-- Icon -->
@include('backend::layouts.includes.icon')
<!-- Plugins -->
@include('backend::layouts.includes.plugin-style')
<!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('modules/backend/assets/css/adminlte.min.css') }}">
    <!-- Page Level Style -->
@include('backend::layouts.includes.inline-style')
<!-- Page Level Script -->
    @include('backend::layouts.includes.head-script')
</head>
<body class="hold-transition @yield('body-class')">
<div class="wrapper">
    <!-- Preloader -->
    @include('backend::partials.preloader')
    <!-- Navbar -->
    @include('backend::partials.navbar')

<!-- Main Sidebar Container -->
    @include('backend::partials.menu-sidebar')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        @include('backend::partials.content-header')
        <!-- Main content -->
        <div class="content">
            @yield('content')
        </div>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <!-- Control Sidebar -->
    @include('backend::partials.control-sidebar')
    <!-- Main Footer -->
    @include('backend::partials.main-footer')
</div>
<!-- ./wrapper -->
<!-- jQuery -->
<script src="{{ asset('modules/backend/plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('modules/backend/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- Plugin JS -->
@include('backend::layouts.includes.plugin-script')
<!-- AdminLTE App -->
<script src="{{ asset('modules/backend/assets/js/adminlte.min.js') }}"></script>
<!-- inline js -->
@include('backend::layouts.includes.head-script')
</body>
</html>
