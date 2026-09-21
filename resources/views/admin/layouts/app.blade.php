<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Panel')</title>
    <link href="https://fonts.googleapis.com/css2?family=Fraunces:opsz,wght@9..144,600&family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <style>
        body { background:#F5F6F8; font-family:'Inter',sans-serif; }
        .sidebar { width:240px; min-height:100vh; background:#16233F; }
        .sidebar h5 { font-family:'Fraunces', serif; font-weight:600; }
        .sidebar .nav-link {
            border-radius:0;
            border-left:3px solid transparent;
            color:rgba(255,255,255,.75) !important;
            padding:10px 14px;
            margin-bottom:2px;
        }
        .sidebar .nav-link:hover { background:rgba(255,255,255,.06); color:#fff !important; }
        .sidebar .nav-link.active-menu {
            background:rgba(232,162,61,.12);
            border-left:3px solid #E8A23D;
            color:#fff !important;
            font-weight:600;
        }
        .stat-card { border-radius:10px; color:#fff; padding:24px; }
        .stat-card h2 { font-family:'Fraunces', serif; font-size:2.2rem; font-weight:600; margin-bottom:0; }
    </style>
</head>
<body class="bg-light">
    <div class="d-flex">
        <nav class="sidebar text-light p-3">
            <h5 class="mb-4"><i class="fa-solid fa-graduation-cap me-2"></i>Admin Sekolah</h5>
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a href="{{ route('admin.dashboard') }}" class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active-menu' : '' }}">
                        <i class="fa-solid fa-gauge me-2"></i>Dashboard
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.berita.index') }}" class="nav-link {{ request()->routeIs('admin.berita.*') ? 'active-menu' : '' }}">
                        <i class="fa-solid fa-newspaper me-2"></i>Berita
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.galeri.index') }}" class="nav-link {{ request()->routeIs('admin.galeri.*') ? 'active-menu' : '' }}">
                        <i class="fa-solid fa-images me-2"></i>Galeri
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.jurusan.index') }}" class="nav-link {{ request()->routeIs('admin.jurusan.*') ? 'active-menu' : '' }}">
                        <i class="fa-solid fa-book me-2"></i>Jurusan
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.fasilitas.index') }}" class="nav-link {{ request()->routeIs('admin.fasiltas.*') ? 'active-menu' : '' }}">
                        <i class="fa-solid fa-building me-2"></i>Fasilitas
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.akreditasi.index') }}" class="nav-link {{ request()->routeIs('admin.akreditasi.*') ? 'active-menu' : '' }}">
                        <i class="fa-solid fa-award me-2"></i>Akreditasi
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.ekstrakurikuler.index') }}" class="nav-link {{ request()->routeIs('admin.ekstrakurikuler.*') ? 'active-menu' : '' }}">
                        <i class="fa-solid fa-futbol me-2"></i>Ekstrakurikuler
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.guru.index') }}" class="nav-link {{ request()->routeIs('admin.guru.*') ? 'active-menu' : '' }}">
                        <i class="fa-solid fa-chalkboard-user me-2"></i>Guru & Staff
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.pembiasaan.index') }}" class="nav-link {{ request()->routeIs('admin.pembiasaan*') ? 'active' : '' }}">
                        <i class="fa-solid fa-sun me-2"></i>Pembiasaan
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.seragam.index') }}" class="nav-link {{ request()->routeIs('admin.seragam*') ? 'active' : '' }}">
                        <i class="fa-solid fa-shirt me-2"></i>Seragam
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.pesan.index') }}" class="nav-link {{ request()->routeIs('admin.pesan*') ? 'active' : '' }}">
                        <i class="fa-solid fa-envelope me-2"></i>Pesan Masuk
                        @php $jumlahBaru = \App\Models\Pesan::where('dibaca', false)->count(); @endphp
                        @if($jumlahBaru > 0)
                            <span class="badge bg-danger ms-1">{{ $jumlahBaru }}</span>
                        @endif
                    </a>
                </li>
                <li class="nav-item mt-4 pt-2 border-top border-secondary">
                    <a href="{{ route('beranda') }}" target="_blank" class="nav-link">
                        <i class="fa-solid fa-arrow-up-right-from-square me-2"></i>Lihat Website
                    </a>
                </li>
                <li class="nav-item">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="btn btn-sm btn-outline-light mt-2 w-100">
                            <i class="fa-solid fa-right-from-bracket me-2"></i>Logout
                        </button>
                    </form>
                </li>
            </ul>
        </nav>

        <main class="flex-fill p-4">
            @if(session('sukses'))
                <div class="alert alert-success">{{ session('sukses') }}</div>
            @endif
            @yield('content')
        </main>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>