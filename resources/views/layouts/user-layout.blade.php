<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8" />
    <title> @yield('title') | {{ config('app.name') }} </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @yield('meta')
    <link rel="icon" href="{{ asset('assets/home/img/logo/logo-round.png') }}">
    @include('layouts.partials.head-css')
    @include('user.partials.style')
</head>

<body>
    @include('user.partials.navbar')
    <div id="layout-wrapper">
        @yield('content')
    </div>
    <footer>
        <p>© 2024 Pendulum Power Generator. All rights reserved.</p>
    </footer>
    @include('layouts.partials.vendor-scripts')
</body>

</html>
