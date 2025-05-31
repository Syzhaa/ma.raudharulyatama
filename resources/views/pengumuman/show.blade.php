@extends('layouts.frontend.app',[
	'title' => 'Detail Pengumuman',
])
@section('content')
<style>
    .blog-details-text {
        margin: 30px 50px;
        border-radius: 10px
    }

    @media (max-width: 768px) {
        .blog-details-text {
            margin: 30px 20px;
        }
    }
</style>

<div style="margin-top: 30px">
    <x-heroconten>{{ $pengumuman->judul }} <br><p style="color: white">Dipublikasikan {{ $pengumuman->tgl }}</p> </x-heroconten>
</div> 

<div class="blog-details-text">
    <div>
        {!! $pengumuman->deskripsi !!}
    </div>
</div>

@stop
