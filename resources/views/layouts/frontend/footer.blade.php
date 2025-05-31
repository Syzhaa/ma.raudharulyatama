<style>
    /* Styling dasar untuk footer */
    .footer-custom {
        background-color: #0D4715;
        color: white;
        padding-top: 32px; /* py-8 */
        padding-bottom: 32px; /* py-8 */
    }
    .footer-container-custom {
        max-width: 1280px; /* container */
        margin-left: auto;
        margin-right: auto;
        padding-left: 100px; /* Diubah dari 16px menjadi 100px */
        padding-right: 100px; /* Diubah dari 16px menjadi 100px */
    }
    .footer-grid-custom {
        display: grid;
        grid-template-columns: repeat(1, minmax(0, 1fr)); /* Default 1 kolom */
        gap: 10px; /* gap-8 */
    }
    .footer-logo-area img, .footer-logo-area div {
        border-radius: 0.375rem; /* rounded-md */
    }
    .footer-nav-link:hover, .footer-contact-link:hover, .footer-social-link:hover {
        color: #D1D5DB; /* hover:text-gray-300 */
        transition-property: color;
        transition-duration: 200ms;
    }
    .footer-nav-title, .footer-contact-title, .footer-social-title {
        font-size: 1.25rem; /* text-xl */
        font-weight: 600; /* font-semibold */
        margin-bottom: 16px; /* mb-4 */
        text-transform: uppercase;
    }
    .footer-copyright-separator {
        margin-top: 32px; /* mt-8 */
        padding-top: 32px; /* pt-8 */
        border-top: 1px solid #4B5563; /* border-t border-gray-700 */
        text-align: center;
        font-size: 0.875rem; /* text-sm */
        color: #9CA3AF; /* text-gray-400 */
    }

    /* Responsive grid for medium screens and up (md:grid-cols-2) */
    @media (min-width: 768px) {
        .footer-grid-custom {
            grid-template-columns: repeat(2, minmax(0, 1fr));
        }
        .footer-custom {
            padding-top: 48px; /* md:py-12 */
            padding-bottom: 48px; /* md:py-12 */
        }
        .footer-nav-column {
            padding-left: 32px; /* md:pl-8 */
        }
        .footer-contact-column {
            padding-left: 16px; /* md:pl-4 */
        }
        /* Penyesuaian padding untuk layar medium jika 100px terlalu besar */
        .footer-container-custom {
            padding-left: 50px; /* Contoh penyesuaian untuk layar medium */
            padding-right: 50px; /* Contoh penyesuaian untuk layar medium */
        }
    }

    /* Responsive grid for large screens and up (lg:grid-cols-4) */
    @media (min-width: 1024px) {
        .footer-grid-custom {
            grid-template-columns: repeat(4, minmax(0, 1fr));
        }
         .footer-custom {
            padding-top: 64px; /* lg:py-16 */
            padding-bottom: 64px; /* lg:py-16 */
        }
        /* Kembalikan padding 100px untuk layar besar */
        .footer-container-custom {
            padding-left: 100px;
            padding-right: 100px;
        }
    }
    /* Pastikan padding 100px default untuk layar sangat kecil jika tidak ada override di atas */
     @media (max-width: 767px) {
        .footer-container-custom {
            padding-left: 20px; /* Padding lebih kecil untuk mobile */
            padding-right: 20px; /* Padding lebih kecil untuk mobile */
        }
    }
</style>

<footer class="footer-custom">
    <div class="footer-container-custom">
        <div class="footer-grid-custom">

            <div style="display: flex; flex-direction: column; gap: 10px;"> {{-- space-y-4 --}}
                <div style="display: flex; align-items: center;" class="footer-logo-area">
                    @if (isset($logo) && $logo->file_name)
                        <img src="{{ asset('uploads/img/logo/' . $logo->file_name) }}" alt="Logo Madrasah Aliyah Raudhatul Yatama" style="height: 64px; width: 64px; margin-right: 16px; object-fit: contain;" onerror="this.style.display='none'; document.getElementById('logo-placeholder-footer-no-tw').style.display='flex';">
                        <div id="logo-placeholder-footer-no-tw" style="display: none; width: 60px; height: 60px; background-color: #e9ecef; color: #333; margin-right: 15px; justify-content: center; align-items: center; font-size:12px; text-align:center;">No Logo</div>
                    @else
                        <div style="width: 60px; height: 60px; background-color: #e9ecef; color: #333; margin-right: 15px; display: flex; justify-content: center; align-items: center; font-size:12px; text-align:center;">No Logo</div>
                    @endif
                    <div style="line-height: 0.3">
                        <h3 style="font-size: 1rem; font-weight: 700; padding-top:18px">MADRASAH ALIYAH <br>RAUDHATUL YATAMA</h3> {{-- text-lg font-semibold --}}
                    </div>
                </div>
                <p style="font-size: 0.875rem; line-height: 1.625; color:white"> {{-- text-sm leading-relaxed --}}
                    Jl. Ahmad Yani No.Km. 10, RT.01, Desa Sungai Lakum, Kec. Kertak Hanyar, Kabupaten Banjar, Kalimantan Selatan 70654
                </p>
            </div>

            <div class="footer-nav-column">
                <h4 class="footer-nav-title">Navigasi</h4>
                <ul style="display: flex; flex-direction: column; gap: 8px; color:white"> {{-- space-y-2 --}}
                    <li><a href="{{ route('home') }}" class="footer-nav-link" style="text-decoration: none;">Beranda</a></li>
                    <li><a href="{{ route('about') }}" class="footer-nav-link" style="text-decoration: none;">Profil</a></li>
                    <li><a href="{{ route('jadwal') }}" class="footer-nav-link" style="text-decoration: none;">Jadwal</a></li>
                    <li><a href="{{ route('pengumuman') }}" class="footer-nav-link" style="text-decoration: none;">Pengumuman</a></li>
                    <li><a href="{{ route('artikel') }}" class="footer-nav-link" style="text-decoration: none;">Artikel</a></li>
                    <li><a href="{{ route('galeri') }}" class="footer-nav-link" style="text-decoration: none;">Galeri</a></li>
                </ul>
            </div>

            <div class="footer-contact-column">
                <h4 class="footer-contact-title">Kontak Kami</h4>
                <ul style="display: flex; flex-direction: column; gap: 12px;"> {{-- space-y-3 --}}
                    <li style="display: flex; align-items: center;">
                        <svg style="width: 20px; height: 20px; margin-right: 12px; flex-shrink: 0;" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z"></path></svg>
                        <a href="tel:088855667733" class="footer-contact-link" style="text-decoration: none;">088855667733</a>
                    </li>
                    <li style="display: flex; align-items: center;">
                        <svg style="width: 20px; height: 20px; margin-right: 12px; flex-shrink: 0;" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z"></path><path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"></path></svg>
                        <a href="mailto:raudhatulyatama@gmail.com" class="footer-contact-link" style="text-decoration: none;">raudhatulyatama@gmail.com</a>
                    </li>
                </ul>
            </div>

            <div>
                <h4 class="footer-social-title">Ikuti sosial media kami</h4>
                <div style="display: flex; gap: 16px; margin-bottom: 24px;"> {{-- flex space-x-4 mb-6 --}}
                    <a href="#" target="_blank" rel="noopener noreferrer" class="footer-social-link" aria-label="Instagram">
                        <svg style="width: 28px; height: 28px;" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path fill-rule="evenodd" d="M12.315 2.014a.828.828 0 01.57 0C15.364 2.36 16.5 3.538 16.5 5.007v1.487c0 .497.206.973.57 1.328l.002.002c.365.355.86.578 1.38.578h1.995c1.47 0 2.659 1.137 3.005 2.598a.83.83 0 010 .571c-.346 1.46-1.536 2.597-3.005 2.597h-1.995a2.002 2.002 0 00-1.38.578l-.002.002a2.002 2.002 0 00-.57 1.328v1.487c0 1.47-1.136 2.648-2.598 3.005a.828.828 0 01-.57 0c-1.46-.357-2.597-1.535-2.597-3.005v-1.487a2.002 2.002 0 00-.57-1.328l-.002-.002a2.002 2.002 0 00-1.38-.578H7.005c-1.47 0-2.659-1.137-3.005-2.598a.83.83 0 010-.571c.346-1.46 1.536-2.597 3.005-2.597h1.995c.52 0 1.015-.223 1.38-.578l.002-.002c.364-.355.57-.83.57-1.328V5.007c0-1.47 1.136-2.648 2.597-3.005zM12 15.75a3.75 3.75 0 100-7.5 3.75 3.75 0 000 7.5zM12 9a3 3 0 100 6 3 3 0 000-6z" clip-rule="evenodd" /></svg>
                    </a>
                    <a href="#" target="_blank" rel="noopener noreferrer" class="footer-social-link" aria-label="Facebook">
                        <svg style="width: 28px; height: 28px;" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path fill-rule="evenodd" d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z" clip-rule="evenodd" /></svg>
                    </a>
                    <a href="#" target="_blank" rel="noopener noreferrer" class="footer-social-link" aria-label="YouTube">
                        <svg style="width: 28px; height: 28px;" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path fill-rule="evenodd" d="M19.812 5.418c.861.23 1.538.907 1.768 1.768C21.998 8.78 22 12 22 12s0 3.22-.42 4.814c-.23.861-.907 1.538-1.768 1.768C18.22 19.002 12 19.002 12 19.002s-6.22 0-7.814-.42c-.861-.23-1.538-.907-1.768-1.768C2.002 15.22 2 12 2 12s0-3.22.42-4.814c.23-.861.907-1.538 1.768-1.768C5.78 5.002 12 5.002 12 5.002s6.22 0 7.812.418ZM9.57 15.58l5.77-3.58-5.77-3.58v7.16Z" clip-rule="evenodd" /></svg>
                    </a>
                </div>
                <div style="font-size: 0.875rem;"> {{-- text-sm --}}
                    <p>Desain by Saleh</p>
                    <p>copyright &copy; {{ date('Y') }}</p>
                </div>
            </div>

        </div>

        <div class="footer-copyright-separator">
            Madrasah Aliyah Raudhatul Yatama - All rights reserved.
        </div>
    </div>
</footer>
