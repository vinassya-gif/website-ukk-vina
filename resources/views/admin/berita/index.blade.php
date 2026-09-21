@extends('admin.layouts.app')
@section('title', 'Kelola Berita')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="fw-bold mb-0">Kelola Berita</h2>
    <a href="{{ route('admin.berita.create') }}" class="btn btn-primary"><i class="fa-solid fa-plus me-1"></i>Tambah Berita</a>
</div>

<table class="table table-bordered bg-white">
    <thead>
        <tr>
            <th>Judul</th>
            <th>Penulis</th>
            <th>Tanggal</th>
            <th style="width:150px">Aksi</th>
        </tr>
    </thead>
    <tbody>
        @forelse($berita as $b)
        <tr>
            <td>{{ $b->judul }}</td>
            <td>{{ $b->penulis }}</td>
            <td>{{ \Carbon\Carbon::parse($b->tanggal)->translatedFormat('d F Y') }}</td>
            <td>
                <a href="{{ route('admin.berita.edit', $b->id) }}" class="btn btn-sm btn-warning">Edit</a>
                <form action="{{ route('admin.berita.destroy', $b->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Hapus berita ini?')">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-sm btn-danger">Hapus</button>
                </form>
            </td>
        </tr>
        @empty
        <tr><td colspan="4" class="text-center">Belum ada berita.</td></tr>
        @endforelse
    </tbody>
</table>
@endsection