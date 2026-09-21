@extends('layouts.app')
@section('title', 'Jurusan')

@section('content')
<div class="container py-5">
    <div class="accent-bar"></div>
    <h2 class="section-title">Jurusan / Program Keahlian</h2>
    <p class="section-sub">Program keahlian yang tersedia di sekolah kami.</p>
    <div class="row g-4">
        @foreach($jurusans as $j)
        <div class="col-md-6 col-lg-3">
            <a href="{{ route('jurusan.show', $j) }}" class="text-decoration-none text-reset">
                <div class="jurusan-card card-hover h-100">
                    <div class="jurusan-photo">
                        <img src="{{ $j->gambar ?? 'https://picsum.photos/seed/jurusan' . $j->id . '/500/300' }}" alt="{{ $j->nama_jurusan }}">
                        <span class="jurusan-badge">{{ $j->kode_jurusan }}</span>
                    </div>
                    <div class="jurusan-body">
                        <h5>{{ $j->nama_jurusan }}</h5>

                        <span class="btn-selengkapnya">
                            Klik Selengkapnya
                            <i class="fa-solid fa-arrow-right"></i>
                        </span>
                    </div>
                </div>
            </a>
        </div>
        @endforeach
    </div>
</div>
@endsection