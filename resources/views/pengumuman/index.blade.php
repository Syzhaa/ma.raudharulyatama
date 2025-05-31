@extends('layouts.frontend.app',[
    'title' => 'List Pengumuman',
])
@section('content')


@if($pengumuman->count() > 0)
<section class="upcoming-events mb-5" style="margin-top: 30px; width: 100%;">
    <div>

        <x-heroconten>List Pengumuman <br> MA Raudhatul Yatama</x-heroconten>

    </div>

    <div class="container-fluid" style="margin-top: 20px; padding-left: 18px; padding-right: 18px;">
    <style>
        @media (min-width: 768px) {
            .container-fluid {
                padding-left: 50px !important;
                padding-right: 50px !important;
            }
        }
    </style>

    <div class="row">
        @foreach($pengumuman as $pn)
        <div class="col-12 col-md-6 col-lg-3 mb-4">
            <div class="card shadow-sm h-100 d-flex flex-column justify-content-between" style="border-radius: 16px; overflow: hidden;">
                <!-- Header Hijau -->
                <div style="background-color: #0D4715; padding: 16px;">
                    <h6 class="text-white mb-0">{{ $pn->tgl }} | BY : {{ $pn->user->name }}</h6>
                </div>

                <!-- Konten Pengumuman -->
                <div class="card-body" style="color: #000; padding: 16px;">
                    <h5 class="card-title">{{ $pn->judul }}</h5>
                    <a href="{{ route('pengumuman.show', $pn->slug) }}" class="btn btn-sm mt-3" style="background-color: #0D4715; color: white; border-radius: 8px;">
                        Detail
                    </a>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    <div class="pagination justify-content-center mt-4">
        {{ $pengumuman->links() }}
    </div>
</div>


    <div class="pagination justify-content-center mt-4">
        {{ $pengumuman->links() }}
    </div>
</div>


</section>
@endif

@stop