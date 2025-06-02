<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    @if (isset($logo) && $logo->file_name)
        <a href="/" class="brand-link d-flex align-items-center pl-3" style="font-size: 13px;">
            <img src="{{ asset('uploads/img/logo/' . $logo->file_name) }}" alt="Logo" class="mr-2"
                style="opacity: .9; width: 37px; height: 37px; object-fit: contain;">
            <div class="d-flex flex-column justify-content-center" style="font-weight: 500; line-height: 1.2;">
                <span class="text-white mb-0">MADRASAH ALIYAH</span>
                <span class="text-white mb-0">RAUDHATUL YATAMA</span>
            </div>
        </a>
    @else
    @endif
    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel d-flex">
            <div class="info" style="font-size: 20px; font-weight: 500; text-transform: uppercase;">
                <a href="#" class="d-block">{{ auth()->user()->name }}</a>
            </div>
        </div>


        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <li class="nav-item">
                    <a href="{{ route('admin.index') }}" class="nav-link {{ Request::is('admin') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                <li class="nav-header">MANAGE DATA</li>
                <li class="nav-item">
                    <a href="{{ route('admin.users.index') }}"
                        class="nav-link {{ Request::segment(2) == 'users' ? 'active' : '' }}">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            Users
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.artikel.index') }}"
                        class="nav-link {{ Request::segment(2) == 'artikel' ? 'active' : '' }}">
                        <i class="nav-icon far fa-image"></i>
                        <p>
                            Artikel
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.kategori-artikel.index') }}"
                        class="nav-link {{ Request::segment(2) == 'kategori-artikel' ? 'active' : '' }}">
                        <i class="nav-icon far fa-circle"></i>
                        <p>
                            Kategori Artikel
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.pengumuman.index') }}"
                        class="nav-link {{ Request::segment(2) == 'pengumuman' ? 'active' : '' }}">
                        <i class="nav-icon fas fa-info"></i>
                        <p>
                            Pengumuman
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.jadwal.index') }}"
                        class="nav-link {{ Request::segment(2) == 'jadwal' ? 'active' : '' }}">
                        <i class="nav-icon fas fa-list"></i>
                        <p>
                            Jadwal
                        </p>
                    </a>
                </li>
                 <li class="nav-item">
                    <a href="{{ route('admin.tentang.index') }}"
                        class="nav-link {{ Request::segment(2) == 'tentang' ? 'active' : '' }}">
                        <i class="nav-icon fas fa-school"></i>
                        <p>
                            Tentang
                        </p>
                    </a>
                </li>

                <li class="nav-header">PENGATURAN</li>
                <li class="nav-item">
                    <a href="{{ route('admin.profile.index') }}"
                        class="nav-link {{ Request::is('admin/profile') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-id-card"></i>
                        <p>
                            Profil
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.change-password.index') }}"
                        class="nav-link {{ Request::is('admin/change-password') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-unlock"></i>
                        <p>
                            Ubah Password
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
