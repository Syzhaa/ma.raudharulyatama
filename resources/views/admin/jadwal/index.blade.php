@extends('layouts.backend.app', [
    'title' => 'Manage Jadwal',
    'contentTitle' => 'Manage Jadwal',
])

@section('content')
    <div class="container">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Kelas</th>
                    <th>Gambar</th>
                    <th>Tanggal</th>
                    <th>Aksi</th> {{-- Tambah kolom aksi --}}
                </tr>
            </thead>
            <tbody>
                @forelse ($jadwal as $item)
                    <tr>
                        <td>{{ $item->kelas }}</td>
                        <td><img src="{{ asset($item->gambar) }}" width="100"></td>
                        <td>{{ $item->tanggal }}</td>
                        <td>
                            <a href="{{ route('admin.jadwal.edit', $item->id) }}" class="btn btn-primary btn-sm">
                                <i class="fas fa-edit fa-fw"></i> Edit
                            </a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-center">Tidak ada data jadwal</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
