<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Home</title>
    <link rel="stylesheet" href="{{ asset('clients/index/app.css') }}" />
    <link rel="stylesheet" href="{{ asset('clients/index/fonts.css') }}" />
    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.icon') }}" />
    @yield('css')
</head>

<body id="@yield('page-id')">
    {{-- Header --}}
    @include('client.partials.header')
    {{-- Content --}}
    @yield('content')
    {{-- Footer --}}
    @include('client.partials.footer')

    {{-- Handle js --}}
    <script src="{{ asset('clients/index/flickity.pkgd.min.js') }}"></script>
    <script src="{{ asset('clients/index/_main.js') }}"></script>
    @yield('js')
</body>

</html>
