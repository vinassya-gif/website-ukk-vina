@extends('admin.layouts.app')
@section('title', 'Kelola Pembiasaan')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="fw-bold mb-0">Kelola Pembiasaan Sekolah</h2>
    <a href="{{ route('admin.pembiasaan.create') }}" class="btn btn-primary">+ Tambah Pembiasaan</a>
</div>

@if(session('sukses'))
    <div class="alert alert-success">{{ session('sukses') }}</div>
@endif

<div class="row g-3">
    @forelse($pembiasaan as $p)
    <div class="col-md-3 col-6">
        <div class="card h-100 text-center p-2">
            @if($p->gambar)
                <img src="{{ asset('storage/'.$p->gambar) }}" class="rounded mb-2" style="width:100%; height:150px; object-fit:cover;">
            @endif
            <h6>{{ $p->judul }}</h6>
            <div class="d-flex justify-content-center gap-2 mt-2">
                <a href="{{ route('admin.pembiasaan.edit', $p->id) }}" class="btn btn-sm btn-warning">Edit</a>
                <form action="{{ route('admin.pembiasaan.destroy', $p->id) }}" method="POST" onsubmit="return confirm('Yakin hapus?')">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-sm btn-danger">Hapus</button>
                </form>
            </div>
        </div>
    </div>
    @empty
        <p class="text-muted">Belum ada data pembiasaan.</p>
    @endforelse
</div>
@endsection