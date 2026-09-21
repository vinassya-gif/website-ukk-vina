@extends('admin.layouts.app')
@section('title', 'Tambah Jurusan')

@section('content')
<h2 class="fw-bold mb-4">Tambah Jurusan</h2>

<form action="{{ route('admin.jurusan.store') }}" method="POST" enctype="multipart/form-data" class="bg-white p-4 rounded shadow-sm">
    @csrf
    <h6 class="text-muted text-uppercase mb-3" style="font-size:.8rem;">Data Jurusan</h6>
    <div class="mb-3">
        <label class="form-label">Nama Jurusan</label>
        <input type="text" name="nama_jurusan" class="form-control" required>
    </div>
    <div class="mb-3">
        <label class="form-label">Kode Jurusan</label>
        <input type="text" name="kode_jurusan" class="form-control" placeholder="Contoh: RPL">
    </div>
    <div class="mb-3">
        <label class="form-label">Deskripsi</label>
        <textarea name="deskripsi" rows="3" class="form-control"></textarea>
    </div>
    <div class="mb-3">
        <label class="form-label">Foto Jurusan (untuk kartu & banner)</label>
        <input type="file" name="gambar" class="form-control">
    </div>

    <hr>

    <h6 class="text-muted text-uppercase mb-3 mt-4" style="font-size:.8rem;">Kepala Program Keahlian (Kaprog)</h6>
    <div class="mb-3">
        <label class="form-label">Nama Kaprog</label>
        <input type="text" name="kaprog_nama" class="form-control">
    </div>
    <div class="mb-3">
        <label class="form-label">Foto Kaprog</label>
        <input type="file" name="kaprog_foto" class="form-control">
    </div>
    <div class="mb-3">
        <label class="form-label">Deskripsi Singkat Kaprog</label>
        <textarea name="kaprog_deskripsi" rows="2" class="form-control"></textarea>
    </div>
    div class="mb-3">
        <label class="form-label">Kompetensi yang Dipelajari</label>
        <textarea name="kompetensi" rows="5" class="form-control" placeholder="Tulis satu kompetensi per baris, contoh:&#10;Pemrograman web (HTML, CSS, JavaScript, PHP)&#10;Basis data dan manajemen sistem informasi"></textarea>
        <small class="text-muted">Satu baris = satu poin kompetensi.</small>

    <button class="btn btn-primary">Simpan</button>
    <a href="{{ route('admin.jurusan.index') }}" class="btn btn-secondary">Batal</a>
</form>
@endsection