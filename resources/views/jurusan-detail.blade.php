@extends('layouts.app')
@section('title', $jurusan->nama_jurusan)

@section('content')
<div class="container py-5">
    <a href="{{ route('jurusan') }}" class="text-decoration-none d-inline-block mb-4" style="color:var(--slate);font-size:.9rem;">
        <i class="fa-solid fa-arrow-left me-1"></i>Kembali ke semua jurusan
    </a>

    <span class="badge bg-primary mb-2">{{ $jurusan->kode_jurusan }}</span>
    <h2 class="section-title mb-2">{{ $jurusan->nama_jurusan }}</h2>
    <p class="text-muted mb-4"><i class="fa-solid fa-users me-1"></i>{{ $jurusan->jumlah_siswa }} siswa aktif</p>

    @if(!empty($jurusan->kaprog_nama))
    <div class="kaprog-card mb-4">
        <div class="kaprog-photo">
            <img src="{{ $jurusan->kaprog_foto ?? 'https://ui-avatars.com/api/?name=' . urlencode($jurusan->kaprog_nama) . '&size=300&background=16233F&color=fff' }}" alt="{{ $jurusan->kaprog_nama }}">
        </div>
        <div>
            <div class="kaprog-label">Kepala Program Keahlian</div>
            <div class="kaprog-name">{{ $jurusan->kaprog_nama }}</div>
            @if(!empty($jurusan->kaprog_deskripsi))
                <p class="kaprog-desc">{{ $jurusan->kaprog_deskripsi }}</p>
            @endif
        </div>
    </div>
    @endif

    <div class="accent-bar"></div>
    <h3 class="section-title">Deskripsi</h3>
    <div class="content-card">
        <p>{{ $jurusan->deskripsi ?? 'Belum ada deskripsi untuk jurusan ini.' }}</p>
    </div>

    <div class="accent-bar"></div>
    <h3 class="section-title">Kompetensi yang Dipelajari</h3>
    <div class="content-card">
        @if(!empty($jurusan->kompetensi))
            <ul class="kompetensi-list">
                @foreach(explode("\n", $jurusan->kompetensi) as $poin)
                    @if(trim($poin) !== '')
                        <li><i class="fa-solid fa-check"></i><span>{{ trim($poin) }}</span></li>
                    @endif
                @endforeach
            </ul>
        @else
            <p class="text-muted mb-0">Belum ada data kompetensi untuk jurusan ini.</p>
        @endif
    </div>
</div>
@endsection