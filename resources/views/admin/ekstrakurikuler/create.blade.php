@extends('admin.layouts.app')
@section('title', 'Tambah Ekstrakurikuler')

@section('content')
<h2 class="fw-bold mb-4">Tambah Ekstrakurikuler</h2>

<form action="{{ route('admin.ekstrakurikuler.store') }}" method="POST" enctype="multipart/form-data" class="bg-white p-4 rounded shadow-sm">
    @csrf
    <div class="mb-3">
        <label class="form-label">Nama Ekstrakurikuler</label>
        <input type="text" name="nama" class="form-control" required>
    </div>
    <div class="mb-3">
        <label class="form-label">Jadwal</label>
        <input type="text" name="jadwal" class="form-control" placeholder="Contoh: Jumat, 14.00">
    </div>
    <div class="mb-3">
        <label class="form-label">Deskripsi</label>
        <textarea name="deskripsi" rows="3" class="form-control"></textarea>
    </div>
        <div class="mb-3">
        <label class="form-label">Foto Ekstrakurikuler (untuk kartu)</label>
        <input type="file" name="gambar" class="form-control">
    </div>
    <hr>


    <h6 class="text-muted text-uppercase mb-3 mt-4" style="font-size:.8rem;">Pembina</h6>
    <div class="mb-3">
        <label class="form-label">Nama Pembina</label>
        <input type="text" name="pembina" class="form-control">
    </div>
    <div class="mb-3">
        <label class="form-label">Foto Pembina</label>
        <input type="file" name="pembina_foto" class="form-control">
    </div>
    <div class="mb-3">
        <label class="form-label">Deskripsi Singkat Pembina</label>
        <textarea name="pembina_deskripsi" rows="2" class="form-control" placeholder="Contoh: Melatih rutin dan mendampingi tim bertanding."></textarea>
    </div>

    <button class="btn btn-primary">Simpan</button>
    <a href="{{ route('admin.ekstrakurikuler.index') }}" class="btn btn-secondary">Batal</a>
</form>
@endsection