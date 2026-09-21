@extends('layouts.app')
@section('title', 'Ekstrakurikuler')

@section('content')
<div class="container py-5">
    <div class="accent-bar"></div>
    <h2 class="section-title">Ekstrakurikuler</h2>
    <p class="section-sub">Kembangkan minat dan bakat di luar jam pelajaran.</p>
    <div class="row g-4">
        @foreach($ekskul as $e)
        <div class="col-md-6 col-lg-3">
            <a href="{{ route('ekstrakurikuler.show', $e) }}" class="text-decoration-none text-reset">
                <div class="ekskul-card card-hover h-100">
                    <div class="ekskul-photo">
                        <img src="{{ $e->gambar ?? 'https://picsum.photos/seed/ekskul' . $e->id . '/400/300' }}" alt="{{ $e->nama }}">
                    </div>
                    <div class="ekskul-body">
                        <h5>{{ $e->nama }}</h5>
                        <p><i class="fa-solid fa-user me-1"></i>{{ $e->pembina }}</p>
                        <p><i class="fa-solid fa-clock me-1"></i>{{ $e->jadwal }}</p>
                    </div>
                </div>
            </a>
        </div>
        @endforeach
    </div>
</div>
@endsection