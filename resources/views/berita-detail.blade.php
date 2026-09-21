@extends('layouts.app')
@section('title', $berita->judul)

@section('content')
<div class="container py-5">
    <a href="{{ route('berita.index') }}" class="text-decoration-none d-inline-block mb-4" style="color:var(--slate);font-size:.9rem;">
        <i class="fa-solid fa-arrow-left me-1"></i>Kembali ke semua berita
    </a>

    <img src="{{ $berita->gambar ?? 'https://picsum.photos/seed/berita' . $berita->id . '/800/400' }}" class="w-100 rounded mb-4" style="max-height:360px;object-fit:cover;">

    <p class="text-muted mb-1">{{ \Carbon\Carbon::parse($berita->tanggal)->translatedFormat('d F Y') }} @if($berita->penulis) &middot; {{ $berita->penulis }} @endif</p>
    <h2 class="section-title mb-4">{{ $berita->judul }}</h2>

    <div class="content-card">
        <p style="white-space:pre-line;">{{ $berita->isi }}</p>
    </div>
</div>
@endsection