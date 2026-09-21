@extends('admin.layouts.app')
@section('title', 'Edit Jurusan')

@section('content')
<h2 class="fw-bold mb-4">Edit Jurusan</h2>

<form action="{{ route('admin.jurusan.update', $jurusan->id) }}" method="POST" enctype="multipart/form-data" class="bg-white p-4 rounded shadow-sm">
    @csrf
    @method('PUT')
    <h6 class="text-muted text-uppercase mb-3" style="font-size:.8rem;">Data Jurusan</h6>
    <div class="mb-3">
        <label class="form-label">Nama Jurusan</label>
        <input type="text" name="nama_jurusan" class="form-control" value="{{ $jurusan->nama_jurusan }}" required>
    </div>
    <div class="mb-3">
        <label class="form-label">Kode Jurusan</label>
        <input type="text" name="kode_jurusan" class="form-control" value="{{ $jurusan->kode_jurusan }}">
    </div>
    <div class="mb-3">
        <label class="form-label">Deskripsi</label>
        <textarea name="deskripsi" rows="3" class="form-control">{{ $jurusan->deskripsi }}</textarea>
    </div>
    <div class="mb-3">
        <label class="form-label">Foto Jurusan (untuk kartu & banner)</label>
        @if(!empty($jurusan->gambar))
            <div class="mb-2"><img src="{{ $jurusan->gambar }}" style="height:80px;border-radius:8px;"></div>
        @endif
        <input type="file" name="gambar" class="form-control">
        <small class="text-muted">Kosongkan kalau tidak ingin mengganti.</small>
    </div>

    <hr>

    <h6 class="text-muted text-uppercase mb-3 mt-4" style="font-size:.8rem;">Kepala Program Keahlian (Kaprog)</h6>
    <div class="mb-3">
        <label class="form-label">Nama Kaprog</label>
        <input type="text" name="kaprog_nama" class="form-control" value="{{ $jurusan->kaprog_nama }}">
    </div>
    <div class="mb-3">
        <label class="form-label">Foto Kaprog</label>
        @if(!empty($jurusan->kaprog_foto))
            <div class="mb-2"><img src="{{ $jurusan->kaprog_foto }}" style="height:80px;border-radius:8px;"></div>
        @endif
        <input type="file" name="kaprog_foto" class="form-control">
        <small class="text-muted">Kosongkan kalau tidak ingin mengganti.</small>
    </div>
    <div class="mb-3">
        <label class="form-label">Deskripsi Singkat Kaprog</label>
        <textarea name="kaprog_deskripsi" rows="2" class="form-control">{{ $jurusan->kaprog_deskripsi }}</textarea>
    </div>
    <div class="mb-3">
        <label class="form-label">Kompetensi yang Dipelajari</label>
        <textarea name="kompetensi" rows="5" class="form-control" placeholder="Tulis satu kompetensi per baris">{{ $jurusan->kompetensi }}</textarea>
        <small class="text-muted">Satu baris = satu poin kompetensi.</small>
    </div>

    <button class="btn btn-primary">Update</button>
    <a href="{{ route('admin.jurusan.index') }}" class="btn btn-secondary">Batal</a>
</form>
@endsection