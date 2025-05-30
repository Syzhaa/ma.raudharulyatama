@extends('layouts.backend.app', [
    'title' => 'Profile',
    'contentTitle' => 'Profile',
])

@section('content')
    <x-alert></x-alert>

    {{-- BARIS 1: PROFIL SAAT INI & LOGO SAAT INI --}}
    <div class="row">
        {{-- Profil Saat Ini --}}
        <x-card>
            <x-slot name="col">6</x-slot>
            <x-slot name="header">Profil Saya</x-slot>
            <div class="form-group">
                <label>Nama Lengkap</label>
                <input type="text" disabled value="{{ auth()->user()->name }}" class="form-control">
            </div>
            <div class="form-group">
                <label>Email</label>
                <input type="email" disabled value="{{ auth()->user()->email }}" class="form-control">
            </div>
        </x-card>

        {{-- Logo Saat Ini --}}
        <x-card>
            <x-slot name="col">6</x-slot>
            <x-slot name="header">Logo Saat Ini</x-slot>
            <div class="text-center">
                @if ($logo && $logo->file_name)
                    <img src="{{ asset('uploads/img/logo/' . $logo->file_name) }}" alt="Logo Sekarang"
                        style="max-height: 100px;">
                @else
                    <p><em>Belum ada logo</em></p>
                @endif
            </div>
        </x-card>
    </div>

    {{-- BARIS 2: EDIT PROFIL & UPLOAD LOGO --}}
    <div class="row mt-4">
        {{-- Edit Profil --}}
        <x-card>
            <x-slot name="col">6</x-slot>
            <x-slot name="header">Edit Profil</x-slot>
            <form method="POST" action="{{ route('admin.profile.update') }}">
                @csrf
                @method('put')
                <div class="form-group">
                    <label>Nama Lengkap</label>
                    <input type="text" name="name" value="{{ auth()->user()->name }}"
                        class="form-control @error('name') is-invalid @enderror">
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input type="email" name="email" value="{{ auth()->user()->email }}"
                        class="form-control @error('email') is-invalid @enderror">
                    @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary btn-sm">Update Profil</button>
            </form>
        </x-card>

        {{-- Upload Logo --}}
        <x-card>
            <x-slot name="col">6</x-slot>
            <x-slot name="header">Upload Logo Baru</x-slot>
            <form method="POST" action="{{ route('admin.profile.logo.update') }}" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div id="drop-area" style="border: 2px dashed #ccc; padding: 20px; text-align: center; cursor: pointer;">
                    <p>Drag & Drop logo baru atau klik di sini</p>
                    <input type="file" name="logo" id="logoInput" accept="image/*" style="display:none;">
                    <img id="preview" style="max-height:100px; display:none; margin-top:10px;">
                </div>
                <div class="form-group text-center mt-3">
                    <button type="submit" class="btn btn-success btn-sm">Upload Logo</button>
                </div>
            </form>
        </x-card>
    </div>

    @push('js')
        <script>
            const dropArea = document.getElementById('drop-area');
            const input = document.getElementById('logoInput');
            const preview = document.getElementById('preview');

            dropArea.addEventListener('click', () => input.click());

            input.addEventListener('change', function() {
                const file = this.files[0];
                if (file) {
                    const reader = new FileReader();
                    reader.onload = e => {
                        preview.setAttribute('src', e.target.result);
                        preview.style.display = 'block';
                    };
                    reader.readAsDataURL(file);
                }
            });

            dropArea.addEventListener('dragover', e => {
                e.preventDefault();
                dropArea.style.borderColor = '#00aaff';
            });

            dropArea.addEventListener('dragleave', () => {
                dropArea.style.borderColor = '#ccc';
            });

            dropArea.addEventListener('drop', e => {
                e.preventDefault();
                dropArea.style.borderColor = '#ccc';
                const files = e.dataTransfer.files;
                input.files = files;
                input.dispatchEvent(new Event('change'));
            });
        </script>
    @endpush

@stop
