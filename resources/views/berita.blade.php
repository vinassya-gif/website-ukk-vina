@extends('layouts.app')
@section('title', 'Berita')

@section('content')
<div class="container py-5">
    <div class="accent-bar"></div>
    <h2 class="section-title">Berita & Kegiatan Sekolah</h2>
    <p class="section-sub">Kabar terbaru seputar prestasi dan aktivitas sekolah.</p>

    <div class="row g-4">
        @forelse($beritas as $b)
        <div class="col-md-4">
            <a href="{{ route('berita.show', $b) }}" class="text-decoration-none text-reset">
                <div class="card h-100 card-hover shadow-sm">
                    <img src="{{ $b->gambar ?? 'https://picsum.photos/seed/berita' . $b->id . '/500/400' }}" class="card-img-top" style="height:200px;object-fit:cover;">
                    <div class="card-body">
                        <small class="text-muted">{{ \Carbon\Carbon::parse($b->tanggal)->translatedFormat('d F Y') }}</small>
                        <h5 class="card-title mt-1">{{ $b->judul }}</h5>
                        <p class="card-text">{{ Str::limit($b->isi, 90) }}</p>
                    </div>
                </div>
            </a>
        </div>
        @empty
        <p class="text-muted">Belum ada berita.</p>
        @endforelse
    </div>
</div>
@endsection