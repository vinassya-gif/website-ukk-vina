@extends('admin.layouts.app')
@section('title', 'Tambah Akreditasi')

@section('content')
<h2 class="fw-bold mb-4">Tambah Akreditasi</h2>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul class="mb-0">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('admin.akreditasi.store') }}" method="POST" enctype="multipart/form-data" class="bg-white p-4 rounded shadow-sm">
    @csrf
    <div class="mb-3">
        <label class="form-label">Judul</label>
        <input type="text" name="judul" class="form-control" required>
    </div>
    <div class="mb-3">
        <label class="form-label">Foto</label>
        <input type="file" name="foto" class="form-control">
    </div>
    <button class="btn btn-primary">Simpan</button>
    <a href="{{ route('admin.akreditasi.index') }}" class="btn btn-secondary">Batal</a>
</form>
@endsection