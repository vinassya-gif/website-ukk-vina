@extends('admin.layouts.app')
@section('title', 'Edit Seragam')

@section('content')
<h2 class="fw-bold mb-4">Edit Seragam</h2>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul class="mb-0">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('admin.seragam.update', $seragam->id) }}" method="POST" enctype="multipart/form-data" class="bg-white p-4 rounded shadow-sm">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label class="form-label">Nama Hari</label>
        <input type="text" name="nama_hari" class="form-control" value="{{ $seragam->nama_hari }}" required>
    </div>
    <div class="mb-3">
        <label class="form-label">Urutan Tampil</label>
        <input type="number" name="urutan" class="form-control" value="{{ $seragam->urutan }}">
    </div>
    <div class="mb-3">
        <label class="form-label">Foto</label>
        @if($seragam->gambar)
            <div class="mb-2"><img src="{{ asset('storage/'.$seragam->gambar) }}" style="height:120px;border-radius:8px;"></div>
        @endif
        <input type="file" name="gambar" class="form-control">
        <small class="text-muted">Kosongkan kalau tidak ingin mengganti.</small>
    </div>
    <button class="btn btn-primary">Update</button>
    <a href="{{ route('admin.seragam.index') }}" class="btn btn-secondary">Batal</a>
</form>
@endsection