<nav id="dynamicNavbar" class="navbar navbar-expand-lg fixed-top">
    <div class="container-fluid">
        <!-- Logo Section -->
        <a class="navbar-brand logo me-auto" href="{{ route('home') }}">EverFlow</a>

        <!-- Toggle Button for Mobile View -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Navigation Links -->
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a href="{{ route('reviews.index') }}" class="nav-link">Ulasan</a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('notifications.index') }}" class="nav-link">Notifikasi</a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('forum-chat.index') }}" class="nav-link">Forum Diskusi</a>
                </li>
            </ul>

            <!-- Conditional Login or Dashboard Button -->
            <div class="d-flex ms-lg-3">
                @auth
                    <button onclick="location.href='{{ route('dashboard') }}'" class="btn btn-primary">
                        Dashboard
                    </button>
                @else
                    <button onclick="location.href='{{ route('login') }}'" class="btn btn-primary">
                        Login
                    </button>
                @endauth
            </div>
        </div>
    </div>
</nav>
