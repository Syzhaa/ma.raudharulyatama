@extends('layouts.frontend.app',[
    'title' => 'List Artikel',
])
@section('content')
<!-- ##### Blog Area Start ##### -->


<div style="margin-top: 30px; width: 100%;">
    <x-heroconten>List Artikel <br> MA Raudhatul Yatama</x-heroconten>
</div>

<section class="blog-area section-padding-30-0 mb-50">
        
    <div class="container">
        <div class="row">
            
            @foreach($artikel as $art)
                <div class="col-md-6 mb-3">
                    <div class="card">
                        <div class="card-header">
                            {{ $art->judul }}

                            <span class="badge badge-danger float-right">by : {{ $art->user->name }}</span>
                        </div>
                        <div class="card-body">
                            <img src="{{ asset('uploads/img/artikel/'.$art->thumbnail) }}" width="100%" style="height: 300px; object-fit: cover; object-position: center;">

                            <div class="card-text mt-3">
                                {!! Str::limit($art->deskripsi) !!}
                            </div>

                            <a href="{{ route('artikel.show',$art->slug) }}" class="btn btn-primary btn-sm">Selengkapnya</a>
                        </div>
                        <div class="card-footer">
                            <div class="row">
                                
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
            <div class="col-lg pagination pagination-center justify-content-center">
                {{ $artikel->appends(Request::all())->links() }}
            </div>
        </div>
    </div>
</section>
@stop