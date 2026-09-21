@extends('admin.layouts.app')
@section('title', 'Tambah Guru/Staff')

@section('content')
<h2 class="fw-bold mb-4">Tambah Guru/Staff</h2>

<form action="{{ route('admin.guru.store') }}" method="POST" enctype="multipart/form-data" class="bg-white p-4 rounded shadow-sm">
    @csrf
    <div class="mb-3">
        <label class="form-label">Nama</label>
        <input type="text" name="nama" class="form-control" required>
    </div>
    <div class="mb-3">
        <label class="form-label">NIP</label>
        <input type="text" name="nip" class="form-control">
    </div>
    <div class="mb-3">
        <label class="form-label">Jabatan</label>
        <input type="text" name="jabatan" class="form-control" placeholder="Contoh: Guru, Kepala Sekolah, Tata Usaha">
    </div>
    <div class="mb-3">
        <label class="form-label">Mata Pelajaran</label>
        <input type="text" name="mapel" class="form-control" placeholder="Kosongkan kalau bukan guru mapel">
    </div>
    <div class="mb-3">
        <label class="form-label">Foto</label>
        <input type="file" name="foto" class="form-control">
        <small class="text-muted">Kosongkan kalau belum ada foto (akan otomatis pakai avatar inisial di halaman publik).</small>
    </div>
    <div class="mb-3 form-check">
        <input type="checkbox" name="is_staff" value="1" class="form-check-input" id="isStaff">
        <label class="form-check-label" for="isStaff">Centang kalau ini data Staff/TU (bukan guru pengajar)</label>
    </div>
    </div>

    <button class="btn btn-primary">Simpan</button>
    <a href="{{ route('admin.guru.index') }}" class="btn btn-secondary">Batal</a>
</form>
@endsection