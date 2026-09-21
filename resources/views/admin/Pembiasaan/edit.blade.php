@extends('admin.layouts.app')
@section('title', 'Edit Pembiasaan')

@section('content')
<h2 class="fw-bold mb-4">Edit Pembiasaan</h2>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul class="mb-0">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('admin.pembiasaan.update', $pembiasaan->id) }}" method="POST" enctype="multipart/form-data" class="bg-white p-4 rounded shadow-sm">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label class="form-label">Judul</label>
        <input type="text" name="judul" class="form-control" value="{{ $pembiasaan->judul }}" required>
    </div>
    <div class="mb-3">
        <label class="form-label">Icon Font Awesome</label>
        <input type="text" name="icon" class="form-control" value="{{ $pembiasaan->icon }}">
    </div>
    <div class="mb-3">
        <label class="form-label">Foto</label>
        @if($pembiasaan->gambar)
            <div class="mb-2"><img src="{{ asset('storage/'.$pembiasaan->gambar) }}" style="height:100px;border-radius:8px;"></div>
        @endif
        <input type="file" name="gambar" class="form-control">
        <small class="text-muted">Kosongkan kalau tidak ingin mengganti.</small>
    </div>
    <button class="btn btn-primary">Update</button>
    <a href="{{ route('admin.pembiasaan.index') }}" class="btn btn-secondary">Batal</a>
</form>
@endsection