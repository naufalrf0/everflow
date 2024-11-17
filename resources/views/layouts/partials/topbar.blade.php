<header id="page-topbar" class="isvertical-topbar">
    <div class="navbar-header">
        <div class="d-flex">
            <!-- LOGO -->
            <div class="navbar-brand-box">
                <a href="{{ route('dashboard') }}" class="logo logo-dark">
                    <span class="logo-sm">
                        <img src="{{ asset('assets/home/img/logo/logo-arunika.png') }}" alt="" height="32">
                    </span>
                    <span class="logo-lg">
                        <img src="{{ asset('assets/home/img/logo/logo-arunika.png') }}" alt="" height="32">
                    </span>
                </a>

                <a href="{{ route('dashboard') }}" class="logo logo-light">
                    <span class="logo-lg">
                        <img src="{{ asset('assets/home/img/logo/logo-arunika.png') }}" alt="" height="30">
                    </span>
                    <span class="logo-sm">
                        <img src="{{ asset('assets/home/img/logo/logo-arunika.png') }}" alt="" height="32">
                    </span>
                </a>
            </div>

            <button type="button" class="btn btn-sm px-3 font-size-24 header-item waves-effect vertical-menu-btn">
                <i class="bx bx-menu align-middle"></i>
            </button>
            <div class="page-title-box align-self-center d-none d-md-block">
                <h4 class="page-title mb-0">@yield('page-title')</h4>
            </div>
        </div>

        <div class="d-flex">
            {{-- Notification --}}
            {{-- <div class="dropdown d-inline-block">
                <button type="button" class="btn header-item noti-icon" id="page-header-notifications-dropdown-v"
                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="bx bx-bell icon-sm align-middle"></i>
                    <span class="noti-dot bg-danger rounded-pill">1</span>
                </button>
                <div class="dropdown-menu dropdown-menu-xl dropdown-menu-end p-0"
                    aria-labelledby="page-header-notifications-dropdown-v">
                    <div class="p-3">
                        <div class="row align-items-center">
                            <div class="col">
                                <h5 class="m-0 font-size-15"> Notifications </h5>
                            </div>
                            <div class="col-auto">
                                <a href="#!" class="small fw-semibold text-decoration-underline"> Mark all as read</a>
                            </div>
                        </div>
                    </div>
                    <div data-simplebar style="max-height: 250px;">
                        <a href="#!" class="text-reset notification-item">
                            <div class="d-flex">
                                <div class="flex-shrink-0 me-3">
                                    <img src="{{ URL::asset('build/images/users/empty-profile.png') }}"
                                        class="rounded-circle avatar-sm" alt="user-pic">
                                </div>
                                <div class="flex-grow-1">
                                    <p class="text-muted font-size-13 mb-0 float-end">1 hour ago</p>
                                    <h6 class="mb-1">James Lemire</h6>
                                    <div>
                                        <p class="mb-0">It will seem like simplified English.</p>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="p-2 border-top d-grid">
                        <a class="btn btn-sm btn-link font-size-14 btn-block text-center" href="javascript:void(0)">
                            <i class="uil-arrow-circle-right me-1"></i> <span>Lihat Selengkapnya..</span>
                        </a>
                    </div>
                </div>
            </div> --}}

            <div class="dropdown d-inline-block">
                <button type="button" class="btn header-item user text-start d-flex align-items-center"
                    id="page-header-user-dropdown-v" data-bs-toggle="dropdown" aria-haspopup="true"
                    aria-expanded="false">
                    <img class="rounded-circle header-profile-user"
                        src="{{ Auth::user()->avatar ?? URL::asset('build/images/empty-profile.png') }}"
                        alt="Header Avatar">
                    <span class="d-none d-xl-inline-block ms-2 fw-medium font-size-15">{{ Auth::user()->name ?? 'Default User' }}</span>
                </button>
                <div class="dropdown-menu dropdown-menu-end pt-0">
                    <div class="p-3 border-bottom">
                        <h6 class="mb-0">{{ Auth::user()->name ?? 'Default User' }}</h6>
                        <p class="mb-0 font-size-11 text-muted">{{ Auth::user()->email ?? 'default@example.com' }}</p>
                    </div>
                    
                    <a href="{{ route('profile.edit') }}" class="dropdown-item">
                        <i class="mdi mdi-account-circle text-muted font-size-16 align-middle me-2"></i> <span
                            class="align-middle">Profil</span>

                    <a class="dropdown-item" href="javascript:void();"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i
                            class="mdi mdi-logout text-muted font-size-16 align-middle me-2"></i> <span
                            class="align-middle">Keluar</span></a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
            </div>
        </div>
    </div>
</header>
