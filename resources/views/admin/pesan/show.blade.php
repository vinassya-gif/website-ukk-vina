@extends('admin.layouts.app')
@section('title', 'Detail Pesan')

@section('content')
<h2 class="fw-bold mb-4">Detail Pesan</h2>

<div class="bg-white p-4 rounded shadow-sm">
    <p><strong>Nama:</strong> {{ $pesan->nama }}</p>
    <p><strong>Email:</strong> {{ $pesan->email }}</p>
    <p><strong>Tanggal:</strong> {{ $pesan->created_at->format('d M Y H:i') }}</p>
    <hr>
    <p style="white-space: pre-line;">{{ $pesan->pesan }}</p>
</div>

<a href="{{ route('admin.pesan.index') }}" class="btn btn-secondary mt-3">Kembali</a>
@endsection