@extends('layouts.app')
@section('title', $ekstrakurikuler->nama)

@section('content')
<div class="container py-5">
    <a href="{{ route('ekstrakurikuler') }}" class="text-decoration-none d-inline-block mb-4" style="color:var(--slate);font-size:.9rem;">
        <i class="fa-solid fa-arrow-left me-1"></i>Kembali ke semua ekstrakurikuler
    </a>

    <h2 class="section-title mb-2">{{ $ekstrakurikuler->nama }}</h2>
    <p class="text-muted mb-4"><i class="fa-solid fa-clock me-1"></i>Jadwal: {{ $ekstrakurikuler->jadwal }}</p>

    @if(!empty($ekstrakurikuler->pembina))
    <div class="pembina-card">
        <div class="pembina-photo">
            <img src="{{ $ekstrakurikuler->pembina_foto ?? 'https://ui-avatars.com/api/?name=' . urlencode($ekstrakurikuler->pembina) . '&size=300&background=16233F&color=fff' }}" alt="{{ $ekstrakurikuler->pembina }}">
        </div>
        <div>
            <div class="pembina-label">Pembina</div>
            <div class="pembina-name">{{ $ekstrakurikuler->pembina }}</div>
            @if(!empty($ekstrakurikuler->pembina_deskripsi))
                <p class="pembina-desc">{{ $ekstrakurikuler->pembina_deskripsi }}</p>
            @endif
        </div>
    </div>
    @endif

    <div class="accent-bar"></div>
    <h3 class="section-title">Deskripsi</h3>
    <div class="content-card">
        <p>{{ $ekstrakurikuler->deskripsi ?? 'Belum ada deskripsi untuk ekstrakurikuler ini.' }}</p>
    </div>

    <div class="accent-bar"></div>
    <h3 class="section-title">Momen Kebersamaan</h3>

    @if($ekstrakurikuler->galeri->count())
        <div class="galeri-masonry">
            @foreach($ekstrakurikuler->galeri as $g)
            <div class="galeri-item">
                <img src="{{ $g->gambar }}" alt="{{ $g->judul }}">
            </div>
            @endforeach
        </div>
    @else
        <p class="text-muted">Belum ada foto untuk ekstrakurikuler ini.</p>
    @endif
</div>

<div class="lightbox-overlay" id="lightbox">
    <span class="lightbox-close">&times;</span>
    <img id="lightbox-img" src="" alt="Preview">
</div>
@endsection