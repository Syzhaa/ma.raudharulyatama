@extends('layouts.backend.app', [
    'title' => 'Edit Tentang',
    'contentTitle' => 'Edit Tentang',
])

@section('title', 'Edit Tentang')

@push('css')
    {{-- Summernote CSS --}}
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
@endpush

@section('content')
    <div class="container py-4">
        <h1>Edit Tentang</h1>

        <form method="POST" action="{{ route('admin.tentang.update', $tentang->id) }}">
            @csrf
            @method('PUT')

            <div class="form-group mb-3">
                <label>Profil MA Raudhatul Yatama</label>
                <textarea name="profil_ma_raudhatul_yatama" class="form-control summernote">{{ old('profil_ma_raudhatul_yatama', $tentang->profil_ma_raudhatul_yatama) }}</textarea>
            </div>

            <div class="form-group mb-3">
                <label>Visi</label>
                <textarea name="visi" class="form-control summernote">{{ old('visi', $tentang->visi) }}</textarea>
            </div>

            <div class="form-group mb-3">
                <label>Misi</label>
                <textarea name="misi" class="form-control summernote">{{ old('misi', $tentang->misi) }}</textarea>
            </div>

            <div class="form-group mb-3">
                <label>Tujuan Pendidikan</label>
                <textarea name="tujuan_pendidikan" class="form-control summernote">{{ old('tujuan_pendidikan', $tentang->tujuan_pendidikan) }}</textarea>
            </div>

            <div class="form-group mb-3">
                <label>Staf Pengajar</label>
                <textarea name="staf_pengajar" class="form-control summernote">{{ old('staf_pengajar', $tentang->staf_pengajar) }}</textarea>
            </div>

            <div class="form-group mb-3">
                <label>Kegiatan Keislaman</label>
                <textarea name="kegiatan_keislaman" class="form-control summernote">{{ old('kegiatan_keislaman', $tentang->kegiatan_keislaman) }}</textarea>
            </div>

            <div class="form-group mb-3">
                <label>Fasilitas Penunjang</label>
                <textarea name="fasilitas_penunjang" class="form-control summernote">{{ old('fasilitas_penunjang', $tentang->fasilitas_penunjang) }}</textarea>
            </div>

            <div class="form-group mb-3">
                <label>Judul Lokasi</label>
                <input type="text" name="lokasi_judul" class="form-control"
                    value="{{ old('lokasi_judul', $tentang->lokasi_judul) }}">
            </div>

            <div class="form-group mb-3">
                <label>Iframe Google Maps</label>
                <textarea name="lokasi_iframe_gmaps" class="form-control" rows="4">{{ old('lokasi_iframe_gmaps', $tentang->lokasi_iframe_gmaps) }}</textarea>
                <small class="form-text text-muted">Masukkan kode iframe dari Google Maps</small>
            </div>

            <div class="form-group mb-3">
                <label>Kontak (alamat, nomor, email, dll)</label>
                <textarea name="kontak" class="form-control summernote">{{ old('kontak', $tentang->kontak) }}</textarea>
            </div>

            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
            <a href="{{ route('admin.tentang.index') }}" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
@endsection

@push('js')
    {{-- Summernote JS --}}
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.summernote').summernote({
                height: 200,
                toolbar: [
                    ['style', ['bold', 'italic', 'underline', 'clear']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['insert', ['link']],
                    ['view', ['fullscreen', 'codeview']]
                ]
            });
        });
    </script>
@endpush
