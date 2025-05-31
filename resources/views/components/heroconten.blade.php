<style>
    .hero-section-custom {
        height: 200px;
        margin-left: 50px;
        margin-right: 50px;
        background-color: #0D4715;
        /* Warna hijau tua */
        border-radius: 15px;
        display: flex;
        align-items: center;
        /* Vertikal tengah */
        justify-content: center;
        /* Horizontal tengah */
        color: white;
        /* Warna teks putih standar */
        text-align: center;
        /* Teks di tengah */
        padding: 20px;
        box-sizing: border-box;
        transition: all 0.3s ease-in-out;
        /* Transisi halus untuk perubahan ukuran */
    }

    .hero-section-custom h1 {
        margin: 0;
        padding: 0px 20px 0 20px;
        font-size: 2.2em;
        /* Ukuran font standar untuk desktop */
        color: white;
        /* Pastikan warna teks heading adalah putih */
        transition: font-size 0.3s ease-in-out;
        /* Transisi halus untuk ukuran font */
    }

    @media (max-width: 768px) {
        .hero-section-custom {
            height: 140px;
            margin-left: 50px;
            margin-right: 50px;
            padding: 10px;
        }

        .hero-section-custom h1 {
            font-size: 2em;

        }
    }

    /* Pertimbangkan juga untuk layar yang sangat kecil */
    @media (max-width: 480px) {
        .hero-section-custom {
            margin-left: 20px;
            /* Margin lebih kecil untuk layar sangat sempit */
            margin-right: 20px;
            /* Anda bisa menyesuaikan padding dan font-size lebih lanjut jika perlu */
        }

        .hero-section-custom h1 {
            font-size: 20px;
        }
    }
</style>

<div class="hero-section-custom">
    <h1>{{ $slot }}</h1>
</div>
