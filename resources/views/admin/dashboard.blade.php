@extends('admin.layouts.app')
@section('title', 'Dashboard Admin')

@section('content')
<h2 class="fw-bold mb-4">Dashboard</h2>
<div class="row g-3">
    <div class="col-md-3">
        <div class="card text-white bg-primary shadow-sm">
            <div class="card-body">
                <h3>{{ $totalBerita }}</h3>
                <p class="mb-0">Berita</p>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card text-white bg-success shadow-sm">
            <div class="card-body">
                <h3>{{ $totalGaleri }}</h3>
                <p class="mb-0">Foto Galeri</p>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card text-white bg-warning shadow-sm">
            <div class="card-body">
                <h3>{{ $totalGuru }}</h3>
                <p class="mb-0">Guru</p>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card text-white bg-info shadow-sm">
            <div class="card-body">
                <h3>{{ $totalJurusan }}</h3>
                <p class="mb-0">Jurusan</p>
            </div>
        </div>
    </div>
</div>
@endsection