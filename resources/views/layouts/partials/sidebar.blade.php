<div class="vertical-menu d-flex flex-column">
    <!-- Logo Section -->
    <div class="navbar-brand-box text-center">
        <a href="{{ route('home') }}" class="logo logo-dark">
            <span class="logo-sm">
                <img src="{{ asset('assets/img/Ever-Flow.jpg') }}" alt="Ever-Flow Logo" height="32">
            </span>
            <span class="logo-lg">
                <img src="{{ asset('assets/img/Ever-Flow.jpg') }}" alt="Ever-Flow Logo" height="64">
            </span>
        </a>

        <a href="{{ route('home') }}" class="logo logo-light">
            <span class="logo-sm">
                <img src="{{ asset('assets/img/Ever-Flow.jpg') }}" alt="Ever-Flow Logo" height="32">
            </span>
            <span class="logo-lg">
                <img src="{{ asset('assets/img/Ever-Flow.jpg') }}" alt="Ever-Flow Logo" height="64">
            </span>
        </a>
    </div>

    <!-- Collapse Button -->
    <button type="button" class="btn btn-sm px-3 font-size-24 header-item waves-effect vertical-menu-btn"
        aria-label="Toggle Sidebar">
        <i class="bx bx-menu align-middle"></i>
    </button>

    <!-- Sidebar Menu -->
    <div class="flex-grow-1 overflow-auto" data-simplebar>
        <div id="sidebar-menu">
            <ul class="metismenu list-unstyled mt-5" id="side-menu">
                <li class="menu-title">Dashboard Everflow</li>

                <!-- Dashboard Link -->
                <li class="{{ request()->routeIs('dashboard') ? 'active' : '' }}">
                    <a href="{{ route('dashboard') }}" aria-label="Dashboard">
                        <i class="bx bx-home-alt icon nav-icon"></i>
                        <span class="menu-item">Dashboard</span>
                    </a>
                </li>

                <!-- Dynamic Role-based Menu -->
                @php
                    $menuItems = [
                        'admin' => [
                            [
                                'route' => 'user-management.index',
                                'icon' => 'bx bx-user',
                                'label' => 'Manajemen User',
                            ],
                            [
                                'route' => 'bandul-management.index',
                                'icon' => 'bx bx-cog',
                                'label' => 'Manajemen Data Bandul',
                            ],
                            [
                                'route' => 'review-management.index',
                                'icon' => 'bx bx-star',
                                'label' => 'Manajemen Komentar',
                            ],
                            [
                                'route' => 'forum-chat.index',
                                'icon' => 'bx bx-chat',
                                'label' => 'Forum Chat',
                            ],
                        ],
                        'user' => [
                            [
                                'route' => 'profile.edit',
                                'icon' => 'bx bx-user-circle',
                                'label' => 'Edit Profil',
                            ],
                            [
                                'route' => 'forum-chat.index',
                                'icon' => 'bx bx-chat',
                                'label' => 'Forum Chat',
                            ],
                        ],
                    ];
                @endphp

                @if (isset($menuItems[auth()->user()->role]))
                    @foreach ($menuItems[auth()->user()->role] as $menuItem)
                        <li class="{{ request()->routeIs($menuItem['route']) ? 'active' : '' }}">
                            <a href="{{ route($menuItem['route']) }}" aria-label="{{ $menuItem['label'] }}">
                                <i class="{{ $menuItem['icon'] }} icon nav-icon"></i>
                                <span class="menu-item">{{ $menuItem['label'] }}</span>
                            </a>
                        </li>
                    @endforeach
                @endif
            </ul>
        </div>
    </div>

    <!-- Footer Section (Always at the Bottom) -->
    <div class="sidebar-footer mt-auto p-3 border-top">
        <ul class="list-unstyled mb-0">
            <li>
                <a href="{{ route('reviews.index') }}" class="d-flex align-items-center text-reset"
                    aria-label="Beri Ulasan">
                    <i class="bx bx-edit icon nav-icon me-2"></i>
                    <span>Beri Ulasan</span>
                </a>
            </li>
            <li>
                <a href="{{ route('home') }}" class="d-flex align-items-center text-reset mt-2"
                    aria-label="Kembali ke Halaman Utama">
                    <i class="bx bx-arrow-back icon nav-icon me-2"></i>
                    <span>Kembali ke Halaman Utama</span>
                </a>
            </li>
        </ul>
    </div>
</div>
