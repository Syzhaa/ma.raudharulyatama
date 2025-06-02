@extends('layouts.backend.app', [
    'title' => 'Buat Jadwal',
    'contentTitle' => 'Buat Jadwal',
])

@section('content')
    <div class="container">
        <h2>Tambah Jadwal</h2>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.jadwal.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
                <label for="gambar" class="form-label">Upload Gambar</label>
                <input type="file" class="form-control" id="gambar" name="gambar" required>
            </div>

            <div class="mb-3">
                <label for="tanggal" class="form-label">Tanggal</label>
                <input type="date" class="form-control" id="tanggal" name="tanggal" required>
            </div>

            <div class="mb-3">
                <label for="kelas" class="form-label">Pilih Kelas</label>
                <select class="form-control" id="kelas" name="kelas" required>
                    <option value="">-- Pilih Kelas --</option>
                    <option value="10">10</option>
                    <option value="11">11</option>
                    <option value="12">12</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
@endsection
