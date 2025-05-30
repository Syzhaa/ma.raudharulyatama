<div class="clever-main-menu bg-white" style="width: 100%;">
    <div class="classy-nav-container breakpoint-off" style="padding: 0 30px;">
        <nav class="classy-navbar justify-content-between align-items-center" id="cleverNav" style="width: 100%;">

            <!-- Logo -->
            @if (isset($logo) && $logo->file_name)
                <a class="navbar-brand d-flex align-items-center" href="/">
                    <img src="{{ asset('uploads/img/logo/' . $logo->file_name) }}" width="50" alt="Logo"
                        class="mr-2">
                    MADRASAH ALIYAH <br> RAUDHATUL YATAMA
                </a>
            @else
                <a class="navbar-brand" href="/">LARASCHOOL</a>
            @endif

            <!-- Toggler -->
            <div class="classy-navbar-toggler">
                <span class="navbarToggler"><span></span><span></span><span></span></span>
            </div>

            <!-- Menu -->
            <div class="classy-menu" style="flex-grow: 1; justify-content: flex-end;">

                <!-- Close Button -->
                <div class="classycloseIcon">
                    <div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
                </div>

                <!-- Nav Start -->
                <div class="classynav d-flex align-items-center">
                    <ul class="mr-4">
                        <li><a href="/" class="{{ Request::is('/') ? 'text-primary' : '' }}">Home</a></li>
                        <li><a href="{{ route('about') }}"
                                class="{{ Request::is('about') ? 'text-primary' : '' }}">Tentang</a></li>
                        <li><a href="{{ route('contact') }}"
                                class="{{ Request::is('contact') ? 'text-primary' : '' }}">Kontak</a></li>
                        <li><a href="{{ route('artikel') }}"
                                class="{{ Request::segment(1) == 'artikel' ? 'text-primary' : '' }}">Artikel</a></li>
                        <li><a href="{{ route('pengumuman') }}"
                                class="{{ Request::segment(1) == 'pengumuman' ? 'text-primary' : '' }}">Pengumuman</a>
                        </li>
                        <li><a href="#" class="{{ Request::is('agenda') ? 'text-primary' : '' }}">Agenda</a></li>
                    </ul>

                    <!-- Search -->
                    <div class="search-area mr-4">
                        <form action="{{ route('artikel.search') }}" method="GET">
                            <input name="keyword" id="search" placeholder="Search">
                            <button type="submit"><i class="fa fa-search"></i></button>
                        </form>
                    </div>

                    <!-- Auth -->
                    @auth
                        <div class="login-state d-flex align-items-center">
                            <div class="user-name mr-2">
                                <div class="dropdown">
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
                            </div>
                        </div>
                    @endauth
                </div>
                <!-- Nav End -->
            </div>
        </nav>
    </div>
</div>
