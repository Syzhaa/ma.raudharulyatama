<footer class="bg-success text-white py-4">
    <div class="container" style="margin-left: 100px; margin-right: 100px;">
        <div class="row">
            <!-- Kiri: Logo dan Alamat -->
             <!-- Kolom 1: Logo & Alamat -->
            <div class="col-md-4 mb-3">
                @if (isset($logo) && $logo->file_name)
                    <img src="{{ asset('uploads/img/logo/' . $logo->file_name) }}" alt="Logo" width="60" class="mb-2">
                @else
                    <img src="{{ asset('default-logo.png') }}" alt="Default Logo" width="60" class="mb-2">
                @endif

                <p class="mb-0 fw-bold">MADRASAH ALIYAH<br>RAUDHATUL YATAMA</p>
                <p class="mb-0">
                    Jl. Ahmad Yani No.Km. 10, RT.01, Desa Sungai Lakum,<br>
                    Kec. Kertak Hanyar, Kabupaten Banjar,<br>
                    Kalimantan Selatan 70654
                </p>
            </div>

            <!-- Tengah: Navigasi -->
            <div class="col-md-4 mb-3">
                <h5>NAVIGASI</h5>
                <ul class="list-unstyled">
                    <li><a href="{{ route('home') }}" class="text-white text-decoration-none">Beranda</a></li>
                    <li><a href="{{ route('about') }}" class="text-white text-decoration-none">tentang</a></li>
                    <li><a href="{{ route('jadwal') }}" class="text-white text-decoration-none">Jadwal</a></li>
                    <li><a href="{{ route('pengumuman') }}" class="text-white text-decoration-none">Pengumuman</a></li>
                    <li><a href="{{ route('artikel') }}" class="text-white text-decoration-none">Artikel</li>
                    <li><a href="{{ route('galeri') }}" class="text-white text-decoration-none">Galeri</li>
                </ul>
            </div>

            <!-- Kanan: Kontak dan Sosial Media -->
            <div class="col-md-4 mb-3">
                <h5>KONTAK KAMI</h5>
                <p><i class="bi bi-telephone-fill me-2"></i> 088855667733</p>
                <p><i class="bi bi-envelope-fill me-2"></i> raudhatulyatama@gmail.com</p>

                <h6>Ikuti sosial media kami</h6>
                <a href="#" class="text-white me-2"><i class="bi bi-instagram"></i></a>
                <a href="#" class="text-white me-2"><i class="bi bi-facebook"></i></a>
                <a href="#" class="text-white me-2"><i class="bi bi-youtube"></i></a>

                <p class="mt-3">Desain by Saleh<br>copyright 2025</p>
            </div>
        </div>
    </div>
</footer>
