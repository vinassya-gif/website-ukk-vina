@extends('admin.layouts.app')
@section('title', 'Edit Foto Galeri')

@section('content')
<h2 class="fw-bold mb-4">Edit Foto Galeri</h2>

<form action="{{ route('admin.galeri.update', $galeri->id) }}" method="POST" enctype="multipart/form-data" class="bg-white p-4 rounded shadow-sm">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label class="form-label">Judul Foto</label>
        <input type="text" name="judul" class="form-control" value="{{ $galeri->judul }}" required>
    </div>
    <div class="mb-3">
        <label class="form-label">Kategori</label>
        <input type="text" name="kategori" class="form-control" value="{{ $galeri->kategori }}">
    </div>
    <div class="mb-3">
        <label class="form-label">Foto</label>
        <div class="mb-2"><img src="{{ $galeri->gambar }}" style="height:100px;border-radius:8px;object-fit:cover;"></div>
        <input type="file" name="gambar" class="form-control">
        <small class="text-muted">Kosongkan kalau tidak ingin mengganti foto.</small>
    </div>
    <button class="btn btn-primary">Update</button>
    <a href="{{ route('admin.galeri.index') }}" class="btn btn-secondary">Batal</a>
</form>
@endsection