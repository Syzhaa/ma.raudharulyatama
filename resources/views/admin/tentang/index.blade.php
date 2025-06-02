@extends('layouts.backend.app', [
    'title' => 'Tentang',
    'contentTitle' => 'Tentang',
])

@section('content')
    <div class="container py-4">
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        {{-- Tombol Edit keseluruhan data --}}
        <a href="{{ route('admin.tentang.edit', ['id' => $tentang->first()->id ?? 0]) }}" class="btn btn-primary mb-3">
            Edit Data Tentang
        </a>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Bagian</th>
                    <th>Isi</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $fields = [
                        'profil_ma_raudhatul_yatama' => 'Profil',
                        'visi' => 'Visi',
                        'misi' => 'Misi',
                        'tujuan_pendidikan' => 'Tujuan Pendidikan',
                        'staf_pengajar' => 'Staf Pengajar',
                        'kegiatan_keislaman' => 'Kegiatan Keislaman',
                        'fasilitas_penunjang' => 'Fasilitas Penunjang',
                        'lokasi_judul' => 'Lokasi Judul',
                        'lokasi_iframe_gmaps' => 'Google Maps',
                        'kontak' => 'Kontak',
                    ];
                    $i = 1;
                @endphp

                @foreach ($tentang as $item)
                    @foreach ($fields as $field => $label)
                        <tr>
                            <td>{{ $i++ }}</td>
                            <td>{{ $label }}</td>
                            <td>{!! $item->$field !!}</td>
                        </tr>
                    @endforeach
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
