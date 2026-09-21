@extends('admin.layouts.app')
@section('title', 'Edit Akreditasi')

@section('content')
<h2 class="fw-bold mb-4">Edit Akreditasi</h2>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul class="mb-0">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('admin.akreditasi.update', $akreditasi->id) }}" method="POST" enctype="multipart/form-data" class="bg-white p-4 rounded shadow-sm">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label class="form-label">Judul</label>
        <input type="text" name="judul" class="form-control" value="{{ $akreditasi->judul }}" required>
    </div>
    <div class="mb-3">
        <label class="form-label">Foto</label>
        @if($akreditasi->foto)
            <div class="mb-2"><img src="{{ asset('storage/'.$akreditasi->foto) }}" style="height:100px;border-radius:8px;"></div>
        @endif
        <input type="file" name="foto" class="form-control">
        <small class="text-muted">Kosongkan kalau tidak ingin mengganti.</small>
    </div>
    <button class="btn btn-primary">Update</button>
    <a href="{{ route('admin.akreditasi.index') }}" class="btn btn-secondary">Batal</a>
</form>
@endsection