@extends('layouts.app')
@section('title', 'Galeri')

@section('content')
<div class="container py-5">
    <div class="accent-bar"></div>
    <h2 class="section-title">Galeri Sekolah</h2>
    <p class="section-sub">Dokumentasi kegiatan dan fasilitas sekolah.</p>

    <div class="d-flex gap-2 mb-4 flex-wrap">
        <button class="btn btn-filter active" data-filter="semua">Semua</button>
        <button class="btn btn-filter" data-filter="fasilitas">Fasilitas</button>
        <button class="btn btn-filter" data-filter="kegiatan">Pembiasaan</button>
        <button class="btn btn-filter" data-filter="momen">Momen Kebersamaan</button>
        <button class="btn btn-filter" data-filter="berita">Berita</button>
    </div>

    <div class="galeri-grid">
        @forelse($galeri as $g)
        <div class="galeri-overlay-item" data-kategori="{{ $g->kategori }}">
            <img src="{{ $g->gambar }}" alt="{{ $g->judul }}">
            <div class="overlay">
                <span class="judul">{{ $g->judul }}</span>
            </div>
        </div>
        @empty
        <p class="text-muted">Belum ada foto.</p>
        @endforelse
    </div>
</div>
@endsection

@push('scripts')
<script>
document.querySelectorAll('.btn-filter').forEach(btn => {
    btn.addEventListener('click', () => {
        document.querySelectorAll('.btn-filter').forEach(b => b.classList.remove('active'));
        btn.classList.add('active');
        const filter = btn.dataset.filter;
        document.querySelectorAll('.galeri-overlay-item').forEach(item => {
            item.style.display = (filter === 'semua' || item.dataset.kategori === filter) ? '' : 'none';
        });
    });
});
</script>
@endpush