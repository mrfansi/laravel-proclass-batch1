<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ config('app.name') }} - @yield('title')</title>
    @vite(['resources/js/app.js'])
    @yield('styles')
</head>
<body class="sb-nav-fixed">
    @include('layout.base.navbar')
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            @include('layout.base.sidebar')
        </div>
        <div id="layoutSidenav_content">
            @yield('content')
            @include('layout.base.footer')
        </div>
    </div>
    @yield("scripts")
</body>
</html>
