@extends('layouts.app')
@section('title', 'Sejarah Sekolah')

@section('content')
<div class="container py-5">
    <div class="accent-bar"></div>
    <h2 class="section-title">Sejarah Sekolah</h2>
    <p class="section-sub">Perjalanan panjang berdirinya sekolah kami.</p>

    <div class="sejarah-card">
        <p style="white-space: pre-line; margin-bottom:0;">{{ $profil->sejarah ?? 'Sejarah sekolah belum diisi.' }}</p>
    </div>
</div>
@endsection