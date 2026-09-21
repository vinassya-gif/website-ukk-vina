@extends('layouts.app')
@section('title', 'Kontak')

@section('content')
<div class="container py-5">
    <h2 class="fw-bold mb-4 text-primary">Hubungi Kami</h2>

    @if(session('sukses'))
        <div class="alert alert-success">{{ session('sukses') }}</div>
    @endif

    <div class="row g-4">
        <div class="col-md-5">
            <div class="card shadow-sm h-100">
                <div class="card-body">
                    <h5 class="fw-bold mb-3">Informasi Kontak</h5>
                    <p><i class="fa-solid fa-location-dot me-2 text-primary"></i>{{ $profil->alamat }}</p>
                    <p><i class="fa-solid fa-phone me-2 text-primary"></i>{{ $profil->telepon }}</p>
                    <p><i class="fa-solid fa-envelope me-2 text-primary"></i>{{ $profil->email }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-7">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h5 class="fw-bold mb-3">Kirim Pesan</h5>
                    <form action="{{ route('kontak.kirim') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">Nama</label>
                            <input type="text" name="nama" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input type="email" name="email" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Pesan</label>
                            <textarea name="pesan" rows="4" class="form-control" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Kirim Pesan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection