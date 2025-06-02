@extends('layouts.frontend.app', [
    'title' => 'Jadwal',
])
@section('content')
    <div style="margin-top: 30px">
        <x-heroconten>Jadwal Pelajaran <br> MA Raudhatul Yatama</x-heroconten>
    </div>
   
    <div class="container mt-5">

        @php
            $kelases = ['10', '11', '12'];
        @endphp

        @foreach ($kelases as $kelas)
            <h3 class="mt-5">Kelas {{ $kelas }}</h3>

            <div class="row">
                @forelse ($jadwals->where('kelas', $kelas) as $jadwal)
                    {{-- Mengubah col-md-4 menjadi col-md-12 agar kartu mengambil lebar penuh di desktop --}}
                    <div class="col-md-12 mb-4"> 
                        <div class="card h-100 shadow-sm">
                            <img 
                                src="{{ asset($jadwal->gambar) }}" 
                                class="card-img-top"
                                {{-- Menyesuaikan style gambar agar lebih besar dan konten terlihat jelas --}}
                                style="width: 100%; height: auto; max-height: 600px; object-fit: contain; border-top-left-radius: .25rem; border-top-right-radius: .25rem;"
                                alt="Jadwal Kelas {{ $jadwal->kelas }}">

                            <div class="card-body text-center"> {{-- Menambahkan text-center untuk tombol --}}
                                <p class="card-text"><strong>Tanggal:</strong> {{ $jadwal->tanggal }}</p>
                                <a href="{{ asset($jadwal->gambar) }}" download class="btn btn-sm btn-primary mt-2">
                                    Download Gambar
                                </a>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12">
                        <p class="text-muted">Belum ada jadwal untuk kelas {{ $kelas }}.</p>
                    </div>
                @endforelse
            </div>
        @endforeach
    </div>
@endsection
