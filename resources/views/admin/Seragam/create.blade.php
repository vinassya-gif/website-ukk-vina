@extends('admin.layouts.app')
@section('title', 'Tambah Seragam')

@section('content')
<h2 class="fw-bold mb-4">Tambah Seragam</h2>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul class="mb-0">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('admin.seragam.store') }}" method="POST" enctype="multipart/form-data" class="bg-white p-4 rounded shadow-sm">
    @csrf
    <div class="mb-3">
        <label class="form-label">Nama Hari (mis. "Senin - Selasa")</label>
        <input type="text" name="nama_hari" class="form-control" required>
    </div>
    <div class="mb-3">
        <label class="form-label">Urutan Tampil (angka kecil = tampil dulu)</label>
        <input type="number" name="urutan" class="form-control" value="0">
    </div>
    <div class="mb-3">
        <label class="form-label">Foto</label>
        <input type="file" name="gambar" class="form-control" required>
    </div>
    <button class="btn btn-primary">Simpan</button>
    <a href="{{ route('admin.seragam.index') }}" class="btn btn-secondary">Batal</a>
</form>
@endsection