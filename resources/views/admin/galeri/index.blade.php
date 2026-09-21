@extends('admin.layouts.app')
@section('title', 'Kelola Galeri')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="fw-bold mb-0">Kelola Galeri</h2>
    <a href="{{ route('admin.galeri.create') }}" class="btn btn-primary">
        <i class="fa-solid fa-plus me-1"></i>Tambah Foto
    </a>
</div>

<p class="text-muted small">Foto fasilitas dan berita diedit lewat halaman aslinya. Foto galeri/kegiatan bisa diedit langsung di sini.</p>

<div class="row g-3">
    @forelse($galeri as $g)
    <div class="col-md-3">
        <div class="card h-100">
            <img src="{{ $g->gambar }}" class="card-img-top" style="height:140px;object-fit:cover;">
            <div class="card-body p-2">
                <p class="mb-1 small fw-bold">{{ $g->judul }}</p>
                <p class="mb-2 small text-muted">
                    <span class="badge bg-secondary">{{ $g->kategori }}</span>
                </p>
                <div class="d-flex gap-1">
                    <a href="{{ $g->edit_url }}" class="btn btn-sm btn-warning flex-fill">Edit</a>

                    @if($g->sumber === 'galeri')
                    <form action="{{ route('admin.galeri.destroy', $g->id) }}" method="POST" onsubmit="return confirm('Hapus foto ini?')" class="flex-fill">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-danger w-100">Hapus</button>
                    </form>
                    @endif
                </div>
            </div>
        </div>
    </div>
    @empty
    <p class="text-muted">Belum ada foto di galeri.</p>
    @endforelse
</div>
@endsection