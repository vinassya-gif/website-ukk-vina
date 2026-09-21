@extends('admin.layouts.app')
@section('title', 'Kelola Seragam')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="fw-bold mb-0">Kelola Seragam Sekolah</h2>
    <a href="{{ route('admin.seragam.create') }}" class="btn btn-primary">+ Tambah Seragam</a>
</div>

@if(session('sukses'))
    <div class="alert alert-success">{{ session('sukses') }}</div>
@endif

<div class="row g-3">
    @forelse($seragam as $s)
    <div class="col-md-2 col-6">
        <div class="card h-100 text-center p-2">
            @if($s->gambar)
                <img src="{{ asset('storage/'.$s->gambar) }}" class="rounded mb-2" style="width:100%; aspect-ratio:4/5; object-fit:cover;">
            @endif
            <h6>{{ $s->nama_hari }}</h6>
            <div class="d-flex justify-content-center gap-2 mt-2">
                <a href="{{ route('admin.seragam.edit', $s->id) }}" class="btn btn-sm btn-warning">Edit</a>
                <form action="{{ route('admin.seragam.destroy', $s->id) }}" method="POST" onsubmit="return confirm('Yakin hapus?')">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-sm btn-danger">Hapus</button>
                </form>
            </div>
        </div>
    </div>
    @empty
        <p class="text-muted">Belum ada data seragam.</p>
    @endforelse
</div>
@endsection