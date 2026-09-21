@extends('admin.layouts.app')
@section('title', 'Tambah Berita')

@section('content')
<h2 class="fw-bold mb-4">Tambah Berita</h2>

<form action="{{ route('admin.berita.store') }}" method="POST" enctype="multipart/form-data" class="bg-white p-4 rounded shadow-sm">
    @csrf
    <div class="mb-3">
        <label class="form-label">Judul</label>
        <input type="text" name="judul" class="form-control" required>
    </div>
    <div class="mb-3">
        <label class="form-label">Isi Berita</label>
        <textarea name="isi" rows="5" class="form-control" required></textarea>
    </div>
    <div class="mb-3">
        <label class="form-label">Penulis</label>
        <input type="text" name="penulis" class="form-control">
    </div>
    <div class="mb-3">
        <label class="form-label">Tanggal</label>
        <input type="date" name="tanggal" class="form-control" required>
    </div>
    <div class="mb-3">
        <label class="form-label">Gambar</label>
        <input type="file" name="gambar" class="form-control">
    </div>
    <button class="btn btn-primary">Simpan</button>
    <a href="{{ route('admin.berita.index') }}" class="btn btn-secondary">Batal</a>
</form>
@endsection