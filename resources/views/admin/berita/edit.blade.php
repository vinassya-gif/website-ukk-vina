@extends('admin.layouts.app')
@section('title', 'Edit Berita')

@section('content')
<h2 class="fw-bold mb-4">Edit Berita</h2>

<form action="{{ route('admin.berita.update', $berita->id) }}" method="POST" enctype="multipart/form-data" class="bg-white p-4 rounded shadow-sm">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label class="form-label">Judul</label>
        <input type="text" name="judul" class="form-control" value="{{ $berita->judul }}" required>
    </div>
    <div class="mb-3">
        <label class="form-label">Isi Berita</label>
        <textarea name="isi" rows="5" class="form-control" required>{{ $berita->isi }}</textarea>
    </div>
    <div class="mb-3">
        <label class="form-label">Penulis</label>
        <input type="text" name="penulis" class="form-control" value="{{ $berita->penulis }}">
    </div>
    <div class="mb-3">
        <label class="form-label">Tanggal</label>
        <input type="date" name="tanggal" class="form-control" value="{{ \Carbon\Carbon::parse($berita->tanggal)->format('Y-m-d') }}" required>
    </div>
    @if($berita->gambar)
        <div class="mb-3">
            <img src="{{ $berita->gambar }}" style="height:100px;border-radius:8px;object-fit:cover;">
        </div>
    @endif
    <div class="mb-3">
        <label class="form-label">Ganti Gambar (opsional)</label>
        <input type="file" name="gambar" class="form-control">
        <small class="text-muted">Kosongkan kalau tidak ingin mengganti.</small>
    </div>
    <button class="btn btn-primary">Update</button>
    <a href="{{ route('admin.berita.index') }}" class="btn btn-secondary">Batal</a>
</form>
@endsection