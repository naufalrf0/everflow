<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('assets/css/auth.css') }}">
</head>
<body>
    <div class="container">
        <!-- Sign In Section -->
        <div class="form-container sign-in">
            
            
            {{-- Form Sign In --}}
            @yield('form-sign-in')
        </div>

        <!-- Sign Up Section -->
        
            
            {{-- Tombol atau Konten Sign Up --}}
            @yield('form-sign-up')
        </div>
    </div>

    <script src="{{ asset('assets/js/auth.js') }}"></script>
    <script>
        function goToRegister() {
            window.location.href = '{{ route('register') }}';
        }

        function goToLogin() {
            window.location.href = '{{ route('login') }}';
        }
    </script>
</body>
</html>
