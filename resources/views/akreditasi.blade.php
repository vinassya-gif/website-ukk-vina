@extends('layouts.app')
@section('title', 'Akreditasi')

@section('content')
<div class="container my-5">
    <div class="accent-bar"></div>
    <h2 class="section-title">Akreditasi Sekolah</h2>
    <p class="section-sub">Bukti mutu dan pengakuan resmi sekolah kami.</p>

    @if($akreditasi->count())
        @foreach($akreditasi as $a)
        <div class="content-card mb-4">
            @if($a->foto)
                <img src="{{ asset('storage/'.$a->foto) }}" class="rounded" style="width:100%; max-width:900px; display:block; margin:0 auto;">
            @endif
            <h5 class="text-center mt-3 mb-0">{{ $a->judul }}</h5>
        </div>
        @endforeach
    @else
        <p class="text-muted">Belum ada data akreditasi.</p>
    @endif
</div>
@endsection