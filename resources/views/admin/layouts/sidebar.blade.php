<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
        <a href="#" class="app-brand-link">
            <span class="app-brand-logo demo">
                <img src="{{ asset('img/logo/customlogo.png') }}" width="40px" alt="logo">
            </span>
            <span class="app-brand-text demo menu-text fw-bolder ms-2">ihyaul</span>
        </a>

        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-xl-none">
            <i class="bx bx-chevron-left bx-sm align-middle"></i>
        </a>
    </div>
    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1 lead">
        <!-- Dashboard -->
        <li class="menu-item {{ $title == 'Dashboard' ? 'active' : '' }}">
            <a href="{{ route('admin-dashboard') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div class="lead" data-i18n="Analytics">Dashboard</div>
            </a>
        </li>

        <!-- Control page start  -->
        <li class="menu-header small text-uppercase">
            <span class="menu-header-text">Manajemen</span>
        </li>
        <!-- Programs Start -->
        <li class="menu-item {{ $title == 'Program' || $title == 'Program Tambah' || $title == 'Program Edit' ? 'active open' : '' }}">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-food-menu"></i>
                <div class="lead" data-i18n="Invoice">Program</div>
            </a>
            <ul class="menu-sub lead">
                <li class="menu-item  {{ $title == 'Program' || $title == 'Program Edit' ? 'active' : '' }}">
                    <a href="{{ route('admin-program') }}" class="menu-link">
                        <div data-i18n="List">Lihat Daftar</div>
                    </a>
                </li>
            </ul>
        </li>
        <!-- Programs end -->

        <!-- Infaq Start -->
        <li class="menu-item {{ $title == 'Infaq' || $title == 'Infaq Masuk' ? 'active open' : '' }}">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-gift"></i>
                <div class="lead" data-i18n="Account Settings">Infaq</div>
            </a>
            <ul class="menu-sub lead">
                <li class="menu-item {{ $title == 'Infaq Masuk' ? 'active' :'' }}">
                    <a href="{{ route('admin-infaq-incoming') }}" class="menu-link">
                        <div data-i18n="Account">Infaq Masuk</div>
                    </a>
                </li>
                <li class="menu-item {{ $title == 'Infaq' ? 'active' :'' }}">
                    <a href="{{ route('admin-infaq') }}" class="menu-link">
                        <div data-i18n="Notifications">Lihat Daftar</div>
                    </a>
                </li>
            </ul>
        </li>
        <!-- Infaq End -->

        <!-- Participants Start -->
        <li class="menu-item {{ $title == 'Pendaftar' || $title == 'Pendaftar Tambah' ? 'active open' : '' }}">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-user"></i>
                <div class="lead" data-i18n="Authentications">Pendaftar</div>
            </a>
            <ul class="menu-sub lead">
                <li class="menu-item {{ $title == 'Pendaftar' || $title == 'Pendaftar Edit' ? 'active' :'' }}">
                    <a href="{{ route('admin-participant') }}" class="menu-link">
                        <div data-i18n="Basic">Lihat Daftar</div>
                    </a>
                </li>
            </ul>
        </li>
        <!-- Participants End -->

        <!-- Admin Start -->
        <li class="menu-item {{ $title == 'Admin' || $title == 'Admin Edit' ? 'active open' : '' }}">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-user"></i>
                <div class="lead" data-i18n="Authentications">Admin</div>
            </a>
            <ul class="menu-sub lead">
                <li class="menu-item {{ $title == 'Admin' || $title == 'Admin Edit' ? 'active' :'' }}">
                    <a href="{{ route('admin-admin') }}" class="menu-link">
                        <div data-i18n="Basic">Lihat Daftar</div>
                    </a>
                </li>
            </ul>
        </li>
        <!-- Admin End -->

        <!-- Control page end  -->
    </ul>
</aside>