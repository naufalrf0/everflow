<nav class="navbar navbar-expand-lg">
    <div class="container-fluid">
        <a class="navbar-brand logo" href="{{ route('home') }}">EverFlow</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto nav-links d-flex">
                <li class="nav-item">
                    <button onclick="location.href='{{ route('dashboard') }}'" class="nav-btn">Dashboard</button>
                </li>
                <li class="nav-item">
                    <button onclick="location.href='{{ route('reviews.index') }}'" class="nav-btn">User Reviews</button>
                </li>
                <li class="nav-item">
                    <button onclick="location.href='{{ route('productprofile') }}'" class="nav-btn">Profil
                        Produk</button>
                </li>
                <li class="nav-item">
                    <button onclick="location.href='{{ route('notifikasi.index') }}'" class="nav-btn">Notifikasi</button>
                </li>
                <li class="nav-item">
                    <button onclick="location.href='{{ route('forum.index') }}'" class="nav-btn">Forum Diskusi</button>
                </li>
            </ul>
            <button class="login-btn ms-2" onclick="location.href='{{ route('login') }}'">Login</button>
        </div>
       
    </div>
</nav>
