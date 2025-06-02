@extends('layouts.backend.app', [
    'title' => 'Edit Jadwal',
    'contentTitle' => 'Edit Jadwal',
])

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">Edit Jadwal</div>
            <div class="card-body">
                <form action="{{ route('admin.jadwal.update', $jadwal->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    {{-- Tanggal (otomatis hari ini) --}}
                    <div class="form-group mb-3">
                        <label for="tanggal">Tanggal</label>
                        <input type="date" name="tanggal" id="tanggal" class="form-control"
                            value="{{ now()->format('Y-m-d') }}" readonly>
                    </div>

                    {{-- Kelas (tidak bisa diubah) --}}
                    <div class="form-group mb-3">
                        <label for="kelas">Kelas</label>
                        <input type="text" class="form-control" value="Kelas {{ $jadwal->kelas }}" readonly>
                        <input type="hidden" name="kelas" value="{{ $jadwal->kelas }}">
                    </div>

                    {{-- Gambar --}}
                    <div class="form-group mb-3">
                        <label for="gambar">Gambar Jadwal</label>
                        <input type="file" name="gambar" id="gambar" class="form-control">
                        @if ($jadwal->gambar)
                            <div class="mt-2">
                                <img src="{{ asset($jadwal->gambar) }}" width="200" class="img-thumbnail mb-2">
                                <p class="text-muted">Gambar saat ini</p>
                            </div>
                        @endif
                    </div>

                    {{-- Tombol Simpan --}}
                    <button type="submit" class="btn btn-success">Simpan Perubahan</button>
                    <a href="{{ route('admin.jadwal.index') }}" class="btn btn-secondary">Kembali</a>
                </form>
            </div>
        </div>
    </div>
@endsection
