@extends('layouts.frontend.app', [
    'title' => 'show Jadwal Pelajaran',
])
@section('content')
    <div class="container mt-4">
        <h1 class="mb-4 text-center">Jadwal Pelajaran MA Raudhatul Yatama</h1>

        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        <ul class="nav nav-pills justify-content-center mb-3">
            @foreach ($allClassLevels as $level)
                <li class="nav-item">
                    <a class="nav-link @if (isset($selectedClassLevel) && $selectedClassLevel == $level) active @endif"
                        href="{{ route('jadwal.show_page', ['classLevel' => $level]) }}"> {{-- Route Baru --}}
                        Kelas {{ $level }}
                    </a>
                </li>
            @endforeach
        </ul>

        <div class="schedule-container text-center">
            @if (isset($jadwal) && $jadwal && $jadwal->image_path)
                {{-- Variabel $jadwal --}}
                <h2>Jadwal Kelas {{ $jadwal->class_level }}</h2>
                <img src="{{ Storage::url($jadwal->image_path) }}" alt="Jadwal Kelas {{ $jadwal->class_level }}"
                    class="img-fluid mb-3 border p-2" style="max-width:100%;">
                <br>
                <a href="{{ route('jadwal.download_file', ['classLevel' => $jadwal->class_level]) }}"
                    class="btn btn-success"> {{-- Route Baru --}}
                    Unduh Jadwal Kelas {{ $jadwal->class_level }}
                </a>
            @elseif(isset($selectedClassLevel))
                <div class="alert alert-warning" role="alert">
                    Jadwal untuk Kelas {{ $selectedClassLevel }} belum tersedia atau tidak ditemukan.
                </div>
            @else
                <div class="alert alert-info" role="alert">
                    Pilih kelas untuk melihat jadwal.
                </div>
            @endif
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
@stop
