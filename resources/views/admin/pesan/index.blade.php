@extends('admin.layouts.app')
@section('title', 'Pesan Masuk')

@section('content')
<h2 class="fw-bold mb-4">Pesan Masuk</h2>

@if(session('sukses'))
    <div class="alert alert-success">{{ session('sukses') }}</div>
@endif

<div class="table-responsive">
    <table class="table table-bordered bg-white shadow-sm">
        <thead>
            <tr>
                <th>Nama</th>
                <th>Email</th>
                <th>Pesan</th>
                <th>Tanggal</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($pesan as $p)
            <tr class="{{ !$p->dibaca ? 'fw-bold' : '' }}">
                <td>{{ $p->nama }}</td>
                <td>{{ $p->email }}</td>
                <td>{{ \Illuminate\Support\Str::limit($p->pesan, 50) }}</td>
                <td>{{ $p->created_at->format('d M Y H:i') }}</td>
                <td>
                    @if($p->dibaca)
                        <span class="badge bg-secondary">Dibaca</span>
                    @else
                        <span class="badge bg-primary">Baru</span>
                    @endif
                </td>
                <td>
                    <a href="{{ route('admin.pesan.show', $p->id) }}" class="btn btn-sm btn-warning">Lihat</a>
                    <form action="{{ route('admin.pesan.destroy', $p->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Hapus pesan ini?')">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-danger">Hapus</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr><td colspan="6" class="text-center text-muted">Belum ada pesan masuk.</td></tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection