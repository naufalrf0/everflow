<div class="vertical-menu">
    <div class="navbar-brand-box">
        <a href="{{ route('home') }}" class="logo logo-dark">
            <span class="logo-sm">
                <img src="{{ asset('assets/img/Ever-Flow.jpg') }}" alt="" height="32">
            </span>
            <span class="logo-lg">
                <img src="{{ asset('assets/img/Ever-Flow.jpg') }}" alt="" height="64">
            </span>
        </a>

        <a href="{{ route('home') }}" class="logo logo-light">
            <span class="logo-lg">
                <img src="{{ asset('assets/img/Ever-Flow.jpg') }}" alt="" height="64">
            </span>
            <span class="logo-sm">
                <img src="{{ asset('assets/img/Ever-Flow.jpg') }}" alt="" height="32">
            </span>
        </a>
    </div>

    <button type="button" class="btn btn-sm px-3 font-size-24 header-item waves-effect vertical-menu-btn">
        <i class="bx bx-menu align-middle"></i>
    </button>

    <div data-simplebar class="sidebar-menu-scroll">
        <div id="sidebar-menu">
            <ul class="metismenu list-unstyled" id="side-menu">
                {{-- Link Dashboard (Tampil di semua role) --}}
                <li class="{{ request()->routeIs('dashboard') ? 'active' : '' }}">
                    <a href="{{ route('dashboard') }}">
                        <i class="bx bx-home-alt icon nav-icon"></i>
                        <span class="menu-item">Dashboard</span>
                    </a>
                </li>
            
                {{-- Menu berdasarkan role --}}
                @if(auth()->user()->role === 'admin')
                    <li class="{{ request()->routeIs('user-management.index') ? 'active' : '' }}">
                        <a href="{{ route('user-management.index') }}">
                            <i class="bx bx-user icon nav-icon"></i>
                            <span class="menu-item">Manajemen User</span>
                        </a>
                    </li>
                    <li class="{{ request()->routeIs('bandul-management.index') ? 'active' : '' }}">
                        <a href="{{ route('bandul-management.index') }}">
                            <i class="bx bx-cog icon nav-icon"></i>
                            <span class="menu-item">Manajemen Data Bandul</span>
                        </a>
                    </li>
                @elseif(auth()->user()->role === 'customer')
                    <li class="{{ request()->routeIs('profile.edit') ? 'active' : '' }}">
                        <a href="{{ route('profile.edit') }}">
                            <i class="bx bx-user-circle icon nav-icon"></i>
                            <span class="menu-item">Edit Profil</span>
                        </a>
                    </li>
                @endif
            </ul>
            
        </div>
    </div>
</div>
