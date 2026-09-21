@extends('layouts.app')
@section('title', 'Beranda - SMK Negeri 1 Cijati')

@section('content')

<section class="hero-section">
        <div class="hero-slide" style="background-image: url('{{ asset('images/hero/hero1.png') }}');"></div>
        <div class="hero-slide" style="background-image: url('{{ asset('images/hero/hero2.jpeg') }}');"></div>
        <div class="hero-slide" style="background-image: url('{{ asset('images/hero/hero3.jpeg') }}');"></div>
    </div>
    <div class="container position-relative">
        <div class="row align-items-center g-5">
            <div class="col-lg-7">
                <h1 class="mb-3"> Selamat Datang di SMK Negeri 1 Cijati </h1>
                <p class="lead mb-4">KEREND </p>
                <a href="{{ route('kontak') }}" class="btn btn-warning btn-lg px-4">Hubungi Kami</a>
            </div>
        </div>
    </div>
</section>
<section class="py-5 bg-white">
    <div class="container">
        <div class="row align-items-center g-5">
            <div class="col-lg-4 text-center">
                <img src="images/kpsek.png"
                     alt="{{ $profil->kepala_sekolah }}"
                     class="rounded-4 shadow"
                     style="width:220px;height:260px;object-fit:cover;border:6px solid var(--paper);">
            </div>
            <div class="col-lg-8">
                <div class="accent-bar"></div>
                <h3 class="section-title">Sambutan Kepala Sekolah</h3>
                <i class="fa-solid fa-quote-left mb-2" style="color:var(--gold);font-size:1.5rem;"></i>
                <p class="fst-italic" style="font-size:1.05rem;color:var(--slate);line-height:1.8;">
                    {{ $profil->sambutan ?? 'Selamat datang di website resmi sekolah kami.' }}
                </p>
                <p class="fw-bold mb-0" style="font-family:'Fraunces', serif;color:var(--navy);">
                    {{ $profil->kepala_sekolah }}
                </p>
                <small class="text-muted">Kepala Sekolah</small>
            </div>
        </div>
    </div>
</section>
<section id="pembiasaan-sekolah" class="py-5">
    <div class="container">
        <div class="accent-bar"></div>
        <h2 class="section-title">Pembiasaan Sekolah</h2>
        <p class="section-sub">Kegiatan rutin yang membentuk karakter siswa setiap hari.</p>

        <div class="pembiasaan-grid">
            @foreach($pembiasaan as $p)
            <div class="pembiasaan-item">
                <img src="{{ asset('storage/'.$p->gambar) }}" alt="{{ $p->judul }}">
                <div class="overlay">
                    @if($p->icon)
                        <i class="{{ $p->icon }}"></i>
                    @endif
                    <span>{{ $p->judul }}</span>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
<section id="seragam-sekolah" class="py-5">
    <div class="container">
        <div class="accent-bar"></div>
        <h2 class="section-title">Seragam Sekolah</h2>
        <p class="section-sub">Ketentuan seragam yang berlaku di sekolah kami.</p>

        <div id="seragamCarousel" class="carousel slide carousel-fade" data-bs-ride="carousel" data-bs-interval="4000">
            <div class="carousel-inner">
                @foreach($seragam as $s)
                <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                    <div class="d-flex justify-content-center">
                        <img src="{{ asset('storage/'.$s->gambar) }}" style="max-height:380px; width:auto; object-fit:contain;" class="rounded">
                    </div>
                </div>
                @endforeach
            </div>

            <div class="d-flex justify-content-center align-items-center gap-4 mt-3">
                <button class="btn btn-outline-primary rounded-circle" type="button" data-bs-target="#seragamCarousel" data-bs-slide="prev" style="width:40px; height:40px;">
                    <i class="fa-solid fa-chevron-left"></i>
                </button>

                <div class="carousel-indicators" style="position:static; margin:0;">
                    @foreach($seragam as $s)
                    <button type="button" data-bs-target="#seragamCarousel" data-bs-slide-to="{{ $loop->index }}" class="{{ $loop->first ? 'active' : '' }}" style="background-color: var(--navy);"></button>
                    @endforeach
                </div>

                <button class="btn btn-outline-primary rounded-circle" type="button" data-bs-target="#seragamCarousel" data-bs-slide="next" style="width:40px; height:40px;">
                    <i class="fa-solid fa-chevron-right"></i>
                </button>
            </div>
        </div>
    </div>
</section>
<section class="py-5">
    <div class="container">
        <div class="d-flex justify-content-between align-items-end mb-4">
            <div>
                <div class="accent-bar"></div>
                <h3 class="section-title mb-0">Berita & Kegiatan Sekolah</h3>
                <p class="section-sub">Kabar terbaru seputar prestasi dan aktivitas sekolah.</p>

            </div>
            <a href="{{ route('berita.index') }}" class="btn btn-outline-primary btn-sm">Lihat Semua</a>
        </div>
        <div class="row g-4">
            @forelse($berita as $b)
            <div class="col-md-4">
                <a href="{{ route('berita.show', $b) }}" class="text-decoration-none text-reset">
                    <div class="card h-100 card-hover shadow-sm">
                        <img src="{{ $b->gambar ?? 'https://picsum.photos/seed/berita' . $b->id . '/500/400' }}" class="card-img-top" style="height:200px;object-fit:cover;">
                        <div class="card-body">
                            <small class="text-muted">{{ \Carbon\Carbon::parse($b->tanggal)->translatedFormat('d F Y') }}</small>
                            <h5 class="card-title mt-1">{{ $b->judul }}</h5>
                            <p class="card-text">{{ Str::limit($b->isi, 90) }}</p>
                        </div>
                    </div>
                </a>
            </div>
            @empty
            <p class="text-muted">Belum ada berita.</p>
            @endforelse
        </div>
    </div>
</section>
<section class="stat-band py-5">
    <div class="container">
        <div class="row g-0">
            <div class="col-md-3 col-6 stat-item">
                <h2 class="counter" data-target="{{ $jumlahSiswa }}">0</h2>
                <p>Siswa</p>
            </div>
            <div class="col-md-3 col-6 stat-item">
                <h2 class="counter" data-target="{{ $jumlahGuruStaff }}">0</h2>
                <p>Guru & Staff</p>
            </div>
            <div class="col-md-3 col-6 stat-item">
                <h2 class="counter" data-target="{{ $jumlahJurusan }}">0</h2>
                <p>Jurusan</p>
            </div>
            <div class="col-md-3 col-6 stat-item">
                <h2 class="counter" data-target="{{ $jumlahEkskul }}">0</h2>
                <p>Ekstrakurikuler</p>
            </div>
        </div>
    </div>
</section>

<div class="lightbox-overlay" id="lightbox">
    <span class="lightbox-close">&times;</span>
    <img id="lightbox-img" src="" alt="Preview">
</div>

@endsection