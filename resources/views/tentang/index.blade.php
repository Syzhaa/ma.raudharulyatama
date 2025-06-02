@extends('layouts.frontend.app', [
    'title' => 'Tentang',
])

@section('content')
    <div style="margin-top: 30px">
        <x-heroconten>Profil Lengkap MA Raudhatul Yatama: Sejarah, Visi Misi, dan lain- lainnya</x-heroconten>
    </div>

    <div class="container py-4">
        @if ($tentang)
            <section class="mb-5">
                <h2>Profil</h2>
                {!! $tentang->profil_ma_raudhatul_yatama !!}
            </section>

            <section class="mb-5">
                <h2>Visi</h2>
                {!! $tentang->visi !!}
            </section>

            <section class="mb-5">
                <h2>Misi</h2>
                {!! $tentang->misi !!}
            </section>

            <section class="mb-5">
                <h2>Tujuan Pendidikan</h2>
                {!! $tentang->tujuan_pendidikan !!}
            </section>

            @if ($tentang->staf_pengajar)
                <section class="mb-5">
                    <h2>Staf Pengajar</h2>
                    {!! $tentang->staf_pengajar !!}
                </section>
            @endif

            @if ($tentang->kegiatan_keislaman)
                <section class="mb-5">
                    <h2>Kegiatan Keislaman</h2>
                    {!! $tentang->kegiatan_keislaman !!}
                </section>
            @endif

            @if ($tentang->fasilitas_penunjang)
                <section class="mb-5">
                    <h2>Fasilitas Penunjang</h2>
                    {!! $tentang->fasilitas_penunjang !!}
                </section>
            @endif

            @if ($tentang->lokasi_judul || $tentang->lokasi_iframe_gmaps)
                <section class="mb-5">
                    <h2>{{ $tentang->lokasi_judul ?? 'Lokasi' }}</h2>
                    <div class="ratio ratio-16x9">
                        {!! $tentang->lokasi_iframe_gmaps !!}
                    </div>
                </section>
            @endif

            @if ($tentang->kontak)
                <section class="mb-5">
                    <h2>Kontak</h2>
                    {!! $tentang->kontak !!}
                </section>
            @endif
        @else
            <p>Data belum tersedia.</p>
        @endif
    </div>

@endsection
