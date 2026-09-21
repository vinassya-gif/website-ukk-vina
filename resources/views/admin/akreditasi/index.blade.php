@extends('admin.layouts.app')
@section('title', 'Kelola Akreditasi')

@section('content')
<h2 class="fw-bold mb-4">Kelola Akreditasi</h2>

<a href="{{ route('admin.akreditasi.create') }}" class="btn btn-primary mb-3">+ Tambah Akreditasi</a>

@if(session('sukses'))
    <div class="alert alert-success">{{ session('sukses') }}</div>
@endif

<div class="row g-3">
    @forelse($akreditasi as $a)
    <div class="col-md-3 col-6">
        <div class="card h-100 text-center p-2">
            @if($a->foto)
                <img src="{{ asset('storage/'.$a->foto) }}" class="rounded mb-2" style="width:100%; height:150px; object-fit:cover;">
            @endif
            <h6>{{ $a->judul }}</h6>
            <div class="d-flex justify-content-center gap-2 mt-2">
                <a href="{{ route('admin.akreditasi.edit', $a->id) }}" class="btn btn-sm btn-warning">Edit</a>
                <form action="{{ route('admin.akreditasi.destroy', $a->id) }}" method="POST" onsubmit="return confirm('Yakin hapus?')">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-sm btn-danger">Hapus</button>
                </form>
            </div>
        </div>
    </div>
    @empty
        <p class="text-muted">Belum ada data akreditasi.</p>
    @endforelse
</div>
@endsection