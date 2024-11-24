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
    <style>
        #layout-wrapper-center {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            min-height: 90vh;
        }

        #layout-wrapper-center>* {
            margin: 10px 0;
        }
    </style>
</head>

<body>
    @include('user.partials.navbar')

    @hasSection('content-center')
        <div id="layout-wrapper-center">
            @yield('content-center')
        </div>
    @endif

    @hasSection('content')
        <div id="layout-wrapper">
            @yield('content')
        </div>
    @endif

    <footer class="text-center py-3" style="background-color: #0d1b2a; color: white;">
        <p class="mb-0" style="font-size: 0.875rem;">© 2024 Pendulum Power Generator. All rights reserved.</p>
    </footer>
    

    @include('layouts.partials.vendor-scripts')
</body>        

</html>
