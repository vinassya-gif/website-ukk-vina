@extends('admin.layouts.app')
@section('title', 'Kelola Fasilitas')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="fw-bold mb-0">Kelola Fasilitas</h2>
    <a href="{{ route('admin.fasilitas.create') }}" class="btn btn-primary"><i class="fa-solid fa-plus me-1"></i>Tambah Fasilitas</a>
</div>

<table class="table table-bordered bg-white">
    <thead>
        <tr>
            <th>Nama</th>
            <th>Deskripsi</th>
            <th style="width:150px">Aksi</th>
        </tr>
    </thead>
    <tbody>
        @forelse($fasilitas as $f)
        <tr>
            <td>{{ $f->nama }}</td>
            <td>{{ $f->deskripsi }}</td>
            <td>
                <a href="{{ route('admin.fasilitas.edit', $f->id) }}" class="btn btn-sm btn-warning">Edit</a>
                <form action="{{ route('admin.fasilitas.destroy', $f->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Hapus fasilitas ini?')">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-sm btn-danger">Hapus</button>
                </form>
            </td>
        </tr>
        @empty
        <tr><td colspan="3" class="text-center">Belum ada fasilitas.</td></tr>
        @endforelse
    </tbody>
</table>
@endsection