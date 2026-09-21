@extends('layouts.app')
@section('title', 'Visi & Misi')

@section('content')
<div class="container py-5">
    <div class="accent-bar"></div>
    <h2 class="section-title">Visi & Misi</h2>
    <p class="section-sub">Arah dan tujuan pendidikan di sekolah kami.</p>

    <div class="visi-misi-grid">
        <div class="visi-misi-card">
            <h5><i class="fa-solid fa-eye"></i> Visi</h5>
            <p>{{ $profil->visi ?? 'Visi sekolah belum diisi.' }}</p>
        </div>
        <div class="visi-misi-card">
            <h5><i class="fa-solid fa-bullseye"></i> Misi</h5>
            <p style="white-space: pre-line;">{{ $profil->misi ?? 'Misi sekolah belum diisi.' }}</p>
        </div>
    </div>
</div>
@endsection