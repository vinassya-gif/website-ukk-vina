@extends('admin.layouts.app')
@section('title', 'Kelola Jurusan')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="fw-bold mb-0">Kelola Jurusan</h2>
    <a href="{{ route('admin.jurusan.create') }}" class="btn btn-primary"><i class="fa-solid fa-plus me-1"></i>Tambah Jurusan</a>
</div>

<table class="table table-bordered bg-white">
    <thead>
        <tr>
            <th>Kode</th>
            <th>Nama Jurusan</th>
            <th style="width:150px">Aksi</th>
        </tr>
    </thead>
    <tbody>
        @forelse($jurusans as $j)
        <tr>
            <td>{{ $j->kode_jurusan }}</td>
            <td>{{ $j->nama_jurusan }}</td>
            <td>{{ $j->jumlah_siswa }}</td>
            <td>
                <a href="{{ route('admin.jurusan.edit', $j->id) }}" class="btn btn-sm btn-warning">Edit</a>
                <form action="{{ route('admin.jurusan.destroy', $j->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Hapus jurusan ini?')">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-sm btn-danger">Hapus</button>
                </form>
            </td>
        </tr>
        @empty
        <tr><td colspan="4" class="text-center">Belum ada jurusan.</td></tr>
        @endforelse
    </tbody>
</table>
@endsection