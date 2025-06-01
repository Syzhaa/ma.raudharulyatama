@extends('layouts.backend.app', [
    'title' => 'Manage Jadwal',
    'contentTitle' => 'Manage Jadwal',
])

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1>Daftar Jadwal Pelajaran</h1>
        <a href="{{ route('admin.jadwals.create') }}" class="btn btn-primary">Unggah Jadwal Baru</a> {{-- Route Baru --}}
    </div>

    @if ($jadwals->isEmpty())
        {{-- Variabel $jadwals --}}
        <p class="alert alert-info">Belum ada jadwal yang diunggah.</p>
    @else
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Kelas</th>
                    <th>Gambar Jadwal</th>
                    <th>Tanggal Unggah</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($jadwals as $index => $jadwal)
                    {{-- Loop dengan $jadwal --}}
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>Kelas {{ $jadwal->class_level }}</td>
                        <td>
                            @if ($jadwal->image_path)
                                <img src="{{ Storage::url($jadwal->image_path) }}"
                                    alt="Jadwal Kelas {{ $jadwal->class_level }}"
                                    style="max-width: 200px; max-height: 150px; cursor: pointer;"
                                    onclick="window.open('{{ Storage::url($jadwal->image_path) }}', '_blank')">
                            @else
                                Tidak ada gambar
                            @endif
                        </td>
                        <td>{{ $jadwal->created_at->format('d M Y, H:i') }}</td>
                        <td>
                            <a href="{{ route('admin.jadwals.edit', $jadwal->id) }}" class="btn btn-sm btn-warning">Edit</a>
                            {{-- Route Baru --}}
                            <form action="{{ route('admin.jadwals.destroy', $jadwal->id) }}" method="POST"
                                style="display:inline-block;"
                                onsubmit="return confirm('Apakah Anda yakin ingin menghapus jadwal ini?');">
                                {{-- Route Baru --}}
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
@endsection
