@extends('admin.layouts.app')
@section('title', 'Edit Guru/Staff')

@section('content')
<h2 class="fw-bold mb-4">Edit Guru/Staff</h2>

<form action="{{ route('admin.guru.update', $guru->id) }}" method="POST" enctype="multipart/form-data" class="bg-white p-4 rounded shadow-sm">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label class="form-label">Nama</label>
        <input type="text" name="nama" class="form-control" value="{{ $guru->nama }}" required>
    </div>
    <div class="mb-3">
        <label class="form-label">NIP</label>
        <input type="text" name="nip" class="form-control" value="{{ $guru->nip }}">
    </div>
    <div class="mb-3">
        <label class="form-label">Jabatan</label>
        <input type="text" name="jabatan" class="form-control" value="{{ $guru->jabatan }}">
    </div>
    <div class="mb-3">
        <label class="form-label">Mata Pelajaran</label>
        <input type="text" name="mapel" class="form-control" value="{{ $guru->mapel }}">
    </div>
    <div class="mb-3">
        <label class="form-label">Foto</label>
        @if(!empty($guru->foto))
            <div class="mb-2">
                <img src="{{ $guru->foto }}" style="height:100px;border-radius:8px;object-fit:cover;">
            </div>
        @endif
        <input type="file" name="foto" class="form-control">
        <small class="text-muted">Kosongkan kalau tidak ingin mengganti foto.</small>
    </div>
    <div class="mb-3 form-check">
        <input type="checkbox" name="is_staff" value="1" class="form-check-input" id="isStaff" {{ $guru->is_staff ? 'checked' : '' }}>
        <label class="form-check-label" for="isStaff">Centang kalau ini data Staff/TU (bukan guru pengajar)</label>
    </div>
    <button class="btn btn-primary">Update</button>
    <a href="{{ route('admin.guru.index') }}" class="btn btn-secondary">Batal</a>
</form>
@endsection