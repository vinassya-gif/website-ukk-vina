@extends('admin.layouts.app')
@section('title', 'Edit Fasilitas')

@section('content')
<h2 class="fw-bold mb-4">Edit Fasilitas</h2>
@if ($errors->any())
    <div class="alert alert-danger">
        <ul class="mb-0">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('admin.fasilitas.update', $fasilitas->id) }}" method="POST" enctype="multipart/form-data" class="bg-white p-4 rounded shadow-sm">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label class="form-label">Nama Fasilitas</label>
        <input type="text" name="nama" class="form-control" value="{{ $fasilitas->nama }}" required>
    </div>
    <div class="mb-3">
        <label class="form-label">Deskripsi</label>
        <textarea name="deskripsi" rows="2" class="form-control">{{ $fasilitas->deskripsi }}</textarea>
    </div>
    <div class="mb-3">
        <label class="form-label">Kelas Ikon (Font Awesome)</label>
        <input type="text" name="icon" class="form-control" value="{{ $fasilitas->icon }}">
    </div>
    <div class="mb-3">
        <label class="form-label">Foto</label>
        @if(!empty($fasilitas->gambar))
            <div class="mb-2"><img src="{{ $fasilitas->gambar }}" style="height:100px;border-radius:8px;object-fit:cover;"></div>
        @endif
        <input type="file" name="gambar" class="form-control">
        <small class="text-muted">Kosongkan kalau tidak ingin mengganti.</small>
    </div>
    <button class="btn btn-primary">Update</button>
    <a href="{{ route('admin.fasilitas.index') }}" class="btn btn-secondary">Batal</a>
</form>
@endsection