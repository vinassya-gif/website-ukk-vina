@extends('admin.layouts.app')
@section('title', 'Tambah Foto Galeri')

@section('content')
<h2 class="fw-bold mb-4">Tambah Foto Galeri</h2>

<form action="{{ route('admin.galeri.store') }}" method="POST" enctype="multipart/form-data" class="bg-white p-4 rounded shadow-sm">
    @csrf
    <div class="mb-3">
        <label class="form-label">Judul Foto</label>
        <input type="text" name="judul" class="form-control" required>
    </div>
    <div class="mb-3">
        <label class="form-label">Kategori</label>
        <input type="text" name="kategori" class="form-control" placeholder="Contoh: Pembiasaan, Fasilitas, Ekstrakurikuler">
    </div>
    <div class="mb-3">
        <label class="form-label">Foto</label>
        <input type="file" name="gambar" class="form-control" required>
    </div>
    <button class="btn btn-primary">Simpan</button>
    <a href="{{ route('admin.galeri.index') }}" class="btn btn-secondary">Batal</a>
</form>
@endsection