<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title>@yield('title')</title>

    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{ asset('admintle/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('admintle/dist/css/adminlte.min.css') }}">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

    @yield('css')

</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">

        {{-- Header --}}
        @include('partials.header')

        {{-- Sidebar --}}
        @include('partials.sidebar')
        {{-- Content --}}
        @yield('content')

        @include('partials.footer')
    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->

    <!-- jQuery -->
    <script src="{{ asset('admintle/plugins/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('admintle/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('admintle/dist/js/adminlte.min.js') }}"></script>
    {{-- CDN sweet alert --}}
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @yield('js')
</body>

</html>
