<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Website Sekolah')</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Fraunces:opsz,wght@9..144,500;9..144,600;9..144,700&family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link rel="icon" type="image/png" href="{{ asset('images/logosmk-.png') }}">
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-primary sticky-top shadow-sm">
        <div class="container">
            <a class="navbar-brand fw-bold brand-font" href="{{ route('beranda') }}">
            <img src="{{ asset('images/logosmk-.png') }}" alt="Logo Sekolah" height="50">SMK Negeri 1 Cijati
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navMenu">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navMenu">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('beranda') ? 'active fw-bold' : '' }}" href="{{ route('beranda') }}">Beranda</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Profil Sekolah
                        </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{ route('sejarah') }}">Sejarah</a></li>
                        <li><a class="dropdown-item" href="{{ route('visi-misi') }}">Visi & Misi</a></li>
                        <li><a class="dropdown-item" href="{{ route('fasilitas') }}">Fasilitas</a></li>
                        <li><a class="dropdown-item" href="{{ route('akreditasi') }}">Akreditasi</a></li>
                        <li><a class="dropdown-item" href="{{ route('guru') }}">Guru & Staff</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Informasi
                    </a>
                    <ul class="dropdown-menu">
                    <li class="nav-item dropdown">
                        <li><a class="dropdown-item" href="{{ route('galeri') }}">Galeri</a></li>
                        <li><a class="dropdown-item" href="{{ route('berita.index') }}">Berita</a></li>
                        </ul>
                    </li>
                     <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle {{ request()->routeIs('jurusan*') ? 'active fw-bold' : '' }}" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Program Keahlian
                        </a>
                        <ul class="dropdown-menu">
                            @forelse($navJurusans ?? [] as $nj)
                                <li><a class="dropdown-item" href="{{ route('jurusan.show', $nj) }}">{{ $nj->nama_jurusan }}</a></li>
                            @empty
                                <li><span class="dropdown-item-text text-muted">Belum ada data jurusan</span></li>
                            @endforelse
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="{{ route('jurusan') }}">Lihat Semua Jurusan</a></li>
                        </ul>
                    </li>
                   <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle {{ request()->routeIs('ekstrakurikuler*') ? 'active fw-bold' : '' }}" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Ekstrakurikuler
                        </a>
                        <ul class="dropdown-menu">
                            @forelse($navEkskul ?? [] as $ne)
                                <li><a class="dropdown-item" href="{{ route('ekstrakurikuler.show', $ne) }}">{{ $ne->nama }}</a></li>
                            @empty
                                <li><span class="dropdown-item-text text-muted">Belum ada data ekstrakurikuler</span></li>
                            @endforelse
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="{{ route('ekstrakurikuler') }}">Lihat Semua Ekstrakurikuler</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <main>
        @yield('content')
    </main>

    <footer class="bg-dark text-light pt-5 pb-3 mt-5">
    <div class="container">
        <div class="row g-4">
            <div class="col-md-6">
                <div class="d-flex align-items-center mb-3">
                    <img src="{{ asset('images/logosmk-.png') }}" style="height:50px;" class="me-2">
                    <h5 class="mb-0">SMK Negeri 1 Cijati</h5>
                </div>
                <p class="mb-1"><i class="fa-solid fa-location-dot me-2"></i>Jl. Raya Cijati, Kec. Cijati Kab. Cianjur, Prov. Jawa Barat Kode Pos: 43284</p>
                <p class="mb-1"><i class="fa-solid fa-phone me-2"></i>(0263)2361091</p>
                <p class="mb-3"><i class="fa-solid fa-envelope me-2"></i>info@smkn1cijati.sch.id</p>
                <div class="d-flex gap-2">
                    <a href="https://www.instagram.com/smkn1cijatiofficial?igsi=MTQ0dnl0MWhvNG9jZg==" target="_blank" class="text-white fs-5"><i class="fa-brands fa-instagram"></i></a>
                    <a href="https://www.facebook.com/smkn1cijatiofficial" target="_blank" class="text-white fs-5"><i class="fa-brands fa-facebook"></i></a>
                    <a href="https://www.tiktok.com/@smkn1cijati?_r=1&_t=ZS-99Tgc5rKF5I" target="_blank" class="text-white fs-5"><i class="fa-brands fa-tiktok"></i></a>
                </div>
            </div>
            <div class="col-md-6">
                <h5 class="mb-3">Lokasi Sekolah</h5>
                <iframe
                    src="https://www.google.com/maps?q=SMK+Negeri+1+Cijati+Cianjur&output=embed"
                    width="100%" height="200" style="border:0;" allowfullscreen loading="lazy">
                </iframe>
            </div>
        </div>
       <hr class="border-secondary my-4">
<div class="d-flex justify-content-center align-items-center gap-2 flex-wrap">
    <p class="text-center mb-0 small">&copy; {{ date('Y') }} SMK Negeri 1 Cijati. Seluruh hak cipta dilindungi.</p>
    @auth
        <a href="{{ route('admin.dashboard') }}" class="text-white-50" style="opacity:.35; font-size:.8rem;">
            <i class="fa-solid fa-lock"></i>
        </a>
    @else
        <a href="{{ route('login') }}" class="text-white-50" style="opacity:.35; font-size:.8rem;">
            <i class="fa-solid fa-lock"></i>
        </a>
    @endauth
</div>
</footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="{{ asset('js/script.js') }}"></script>
@stack('scripts')
</body>
</html>