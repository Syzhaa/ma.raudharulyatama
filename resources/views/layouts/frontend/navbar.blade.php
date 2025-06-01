<div class="clever-main-menu bg-white fixed-top shadow-sm" style="z-index: 1055;">

    <div class="classy-nav-container px-3">
        <nav class="classy-navbar d-flex justify-content-between align-items-center w-100 flex-wrap" id="cleverNav">

            <div class="logo d-flex align-items-center">
                @if (isset($logo) && $logo->file_name)
                    <a href="/" class="brand-link d-flex align-items-center text-left" style="font-size: 13px;">
                        <img src="{{ asset('uploads/img/logo/' . $logo->file_name) }}" alt="Logo" class="mr-2"
                            style="opacity: .9; width: 37px; height: 37px; object-fit: contain;">
                        <div class="d-flex flex-column justify-content-center" style="font-weight: 500; line-height: 1.2;">
                            <span class="text-black mb-0">MADRASAH ALIYAH</span>
                            <span class="text-black mb-0">RAUDHATUL YATAMA</span>
                        </div>
                    </a>
                @else
                    <a class="navbar-brand text-left" href="/">M ARAUDHATUL YATAMA</a>
                @endif
            </div>

            <div class="desktop-menu d-none d-md-flex align-items-center">
                <ul class="d-flex list-unstyled mb-0">
                    <li class="px-3"><a href="/" class="{{ Request::is('/') ? 'text-primary' : '' }}">Beranda</a></li>
                    <li class="px-3"><a href="{{ route('about') }}" class="{{ Request::is('about') ? 'text-primary' : '' }}">Tentang</a></li>
                    <li class="px-3"><a href="{{ route('jadwal') }}" class="{{ Request::is('jadwal') ? 'text-primary' : '' }}">Jadwal</a></li>
                    <li class="px-3"><a href="{{ route('pengumuman') }}" class="{{ Request::segment(1) == 'pengumuman' ? 'text-primary' : '' }}">Pengumuman</a></li>
                    <li class="px-3"><a href="{{ route('artikel') }}" class="{{ Request::segment(1) == 'artikel' ? 'text-primary' : '' }}">Artikel</a></li>
                    <li class="px-3"><a href="{{ route('galeri') }}" class="{{ Request::is('galeri') ? 'text-primary' : '' }}">Galeri</a></li>
                </ul>

                @auth
                    <div class="dropdown ml-3">
                        <a class="dropdown-toggle" href="#" role="button" id="userName"
                            data-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false">{{ auth()->user()->name }}</a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userName">
                            <a class="dropdown-item" href="{{ route('admin.index') }}">Dashboard</a>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="dropdown-item">Logout</button>
                            </form>
                        </div>
                    </div>
                @endauth
            </div>

            <div class="classy-navbar-toggler d-md-none" id="menuToggle">
                <span class="navbarToggler"><span></span><span></span><span></span></span>
            </div>
        </nav>
    </div>

    <div id="mobileSidebar" class="mobile-sidebar">
        <div class="sidebar-header d-flex justify-content-between align-items-center p-3 border-bottom">
            <span class="font-weight-bold">Menu</span>
            <button id="sidebarClose" class="btn btn-sm btn-outline-secondary">&times;</button>
        </div>
        <ul class="list-unstyled px-3 pt-2">
            <li><a href="/" class="d-block py-2 {{ Request::is('/') ? 'text-primary' : '' }}">Home</a></li>
            <li><a href="{{ route('about') }}" class="d-block py-2 {{ Request::is('about') ? 'text-primary' : '' }}">Tentang</a></li>
            <li><a href="{{ route('jadwal') }}" class="d-block py-2 {{ Request::is('jadwal') ? 'text-primary' : '' }}">Jadwal</a></li>
            <li><a href="{{ route('pengumuman') }}" class="d-block py-2 {{ Request::segment(1) == 'pengumuman' ? 'text-primary' : '' }}">Pengumuman</a></li>
            <li><a href="{{ route('artikel') }}" class="d-block py-2 {{ Request::segment(1) == 'artikel' ? 'text-primary' : '' }}">Artikel</a></li>
            <li><a href="{{ route('galeri') }}" class="d-block py-2 {{ Request::is('galeri') ? 'text-primary' : '' }}">Galeri</a></li>
            @auth
                <hr>
                <li><a href="{{ route('admin.index') }}" class="d-block py-2">Dashboard</a></li>
                <li>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 py-2 d-block">Logout</button>
                    </form>
                </li>
            @endauth
        </ul>
    </div>

    <div id="sidebarOverlay" class="sidebar-overlay"></div>
</div>

<style>
    .navbarToggler span {
        display: block;
        width: 25px;
        height: 3px;
        margin: 4px 0;
        background-color: #333;
        transition: all 0.3s ease;
    }

    .mobile-sidebar {
        position: fixed;
        top: 0;
        left: -260px; /* Start off-screen */
        width: 250px;
        height: 100vh;
        background: #fff;
        box-shadow: 2px 0 8px rgba(0, 0, 0, 0.15);
        z-index: 1050; /* Ensure sidebar is above overlay but below main menu when needed */
        transition: left 0.3s ease-in-out;
        overflow-y: auto;
    }

    .mobile-sidebar.open {
        left: 0; /* Slide in */
    }

    .sidebar-overlay {
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: rgba(0, 0, 0, 0.4);
        z-index: 1049; /* Below sidebar */
        display: none;
        transition: all 0.3s ease;
    }

    .sidebar-overlay.show {
        display: block;
    }

    /* Desktop menu visible only on md up */
    .desktop-menu {
        flex-grow: 1; /* Allow desktop menu to take available space */
        justify-content: flex-end; /* Align desktop menu items to the right */
    }

    /* --- MODIFICATION FOR MOBILE LOGO MARGIN --- */
    /* Apply margin-left to the logo on screens smaller than md (Bootstrap's md breakpoint is 768px) */
    @media (max-width: 767.98px) {
        .classy-navbar .logo {
            margin-left: -20px;
        }
    }
    /* --- END OF MODIFICATION --- */

</style>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const toggle = document.getElementById('menuToggle');
        const sidebar = document.getElementById('mobileSidebar');
        const overlay = document.getElementById('sidebarOverlay');
        const closeBtn = document.getElementById('sidebarClose');

        // Event listener for hamburger icon click
        toggle.addEventListener('click', function () {
            sidebar.classList.add('open');
            overlay.classList.add('show');
        });

        // Event listener for sidebar close button click
        closeBtn.addEventListener('click', function () {
            sidebar.classList.remove('open');
            overlay.classList.remove('show');
        });

        // Event listener for overlay click (to close sidebar)
        overlay.addEventListener('click', function () {
            sidebar.classList.remove('open');
            overlay.classList.remove('show');
        });
    });
</script>
