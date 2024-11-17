<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8" />
    <title> @yield('title') | {{ config('app.name') }} </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @yield('meta')
    <link rel="icon" href="{{ asset('assets/home/img/logo/logo-round.png') }}">
    @include('layouts.partials.head-css')
</head>

<body data-sidebar="dark" data-topbar="dark" data-bs-theme="light" style="margin-bottom: 30px;">
    <div id="layout-wrapper">
        @include('layouts.partials.topbar')
        @include('layouts.partials.sidebar')
        <div class="main-content">
            <div class="page-content">
                <div class="container-fluid">
                    @yield('content')
                </div>
            </div>
            @include('layouts.partials.footer')
        </div>
    </div>
    @include('layouts.partials.vendor-scripts')
</body>

</html>
