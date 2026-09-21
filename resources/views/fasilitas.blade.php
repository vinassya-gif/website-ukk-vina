@extends('layouts.app')
@section('title', 'Fasilitas Sekolah')

@section('content')
<div class="container py-5">
    <div class="accent-bar"></div>
    <h2 class="section-title">Fasilitas Sekolah</h2>
    <p class="section-sub">Sarana dan prasarana penunjang kegiatan belajar mengajar.</p>

    <div class="fasilitas-grid">
        @forelse($fasilitas as $f)
        <div class="fasilitas-card">
            <div class="fasilitas-photo">
                <img src="{{ $f->gambar ?? 'https://picsum.photos/seed/fasilitas' . $f->id . '/500/400' }}" alt="{{ $f->nama }}">
                <div class="fasilitas-icon"><i class="{{ $f->icon ?? 'fa-solid fa-building' }}"></i></div>
            </div>
            <div class="fasilitas-body">
                <h6>{{ $f->nama }}</h6>
                <p>{{ $f->deskripsi }}</p>
            </div>
        </div>
        @empty
        <p class="text-muted">Belum ada data fasilitas.</p>
        @endforelse
    </div>
</div>
@endsection