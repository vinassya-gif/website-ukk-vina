@extends('admin.layouts.app')
@section('title', 'Kelola Guru & Staff')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="fw-bold mb-0">Kelola Guru & Staff</h2>
    <a href="{{ route('admin.guru.create') }}" class="btn btn-primary"><i class="fa-solid fa-plus me-1"></i>Tambah Guru/Staff</a>
</div>

<table class="table table-bordered bg-white">
    <thead>
        <tr>
            <th>Nama</th>
            <th>NIP</th>
            <th>Jabatan</th>
            <th>Mapel</th>
            <th>Tipe</th>
            <th style="width:150px">Aksi</th>
        </tr>
    </thead>
    <tbody>
        @forelse($guru as $g)
        <tr>
            <td>{{ $g->nama }}</td>
            <td>{{ $g->nip }}</td>
            <td>{{ $g->jabatan }}</td>
            <td>{{ $g->mapel }}</td>
            <td>
                @if($g->is_staff)
                    <span class="badge bg-warning text-dark">Staff</span>
                @else
                    <span class="badge bg-primary">Guru</span>
                @endif
            </td>
            <td>
                <a href="{{ route('admin.guru.edit', $g->id) }}" class="btn btn-sm btn-warning">Edit</a>
                <form action="{{ route('admin.guru.destroy', $g->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Hapus data ini?')">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-sm btn-danger">Hapus</button>
                </form>
            </td>
        </tr>
        @empty
        <tr><td colspan="6" class="text-center">Belum ada data.</td></tr>
        @endforelse
    </tbody>
</table>
@endsection