@extends('admin.layouts.app')
@section('title', 'Tambah Fasilitas')

@section('content')
<h2 class="fw-bold mb-4">Tambah Fasilitas</h2>

<form action="{{ route('admin.fasilitas.store') }}" method="POST" enctype="multipart/form-data" class="bg-white p-4 rounded shadow-sm">
    @csrf
    <div class="mb-3">
        <label class="form-label">Nama Fasilitas</label>
        <input type="text" name="nama" class="form-control" required>
    </div>
    <div class="mb-3">
        <label class="form-label">Deskripsi</label>
        <textarea name="deskripsi" rows="2" class="form-control"></textarea>
    </div>
    <div class="mb-3">
        <label class="form-label">Kelas Ikon (Font Awesome)</label>
        <input type="text" name="icon" class="form-control" placeholder="Contoh: fa-solid fa-book">
        <small class="text-muted">Cari nama ikon lain di fontawesome.com/icons</small>
    </div>
    <div class="mb-3">
        <label class="form-label">Foto</label>
        <input type="file" name="gambar" class="form-control">
    </div>
    <button class="btn btn-primary">Simpan</button>
    <a href="{{ route('admin.fasilitas.index') }}" class="btn btn-secondary">Batal</a>
</form>
@endsection