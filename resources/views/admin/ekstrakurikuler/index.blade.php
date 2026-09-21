@extends('admin.layouts.app')
@section('title', 'Kelola Ekstrakurikuler')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="fw-bold mb-0">Kelola Ekstrakurikuler</h2>
    <a href="{{ route('admin.ekstrakurikuler.create') }}" class="btn btn-primary"><i class="fa-solid fa-plus me-1"></i>Tambah Ekstrakurikuler</a>
</div>

<table class="table table-bordered bg-white">
    <thead>
        <tr>
            <th>Nama</th>
            <th>Pembina</th>
            <th>Jadwal</th>
            <th style="width:150px">Aksi</th>
        </tr>
    </thead>
    <tbody>
        @forelse($ekskul as $e)
        <tr>
            <td>{{ $e->nama }}</td>
            <td>{{ $e->pembina }}</td>
            <td>{{ $e->jadwal }}</td>
            <td>
                <a href="{{ route('admin.ekstrakurikuler.edit', $e->id) }}" class="btn btn-sm btn-warning">Edit</a>
                <form action="{{ route('admin.ekstrakurikuler.destroy', $e->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Hapus ekstrakurikuler ini?')">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-sm btn-danger">Hapus</button>
                </form>
            </td>
        </tr>
        @empty
        <tr><td colspan="4" class="text-center">Belum ada ekstrakurikuler.</td></tr>
        @endforelse
    </tbody>
</table>
@endsection