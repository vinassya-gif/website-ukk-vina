@extends('layouts.app')
@section('title', 'Guru & Staff')

@section('content')
<div class="container py-5">
    <div class="accent-bar"></div>
    <h2 class="section-title">Guru & Staff</h2>
    <p class="section-sub">Tenaga pendidik dan kependidikan sekolah.</p>

    <ul class="nav nav-tabs mb-4" id="tabGuru" role="tablist">
        <li class="nav-item">
            <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#tabDataGuru">Guru</button>
        </li>
        <li class="nav-item">
            <button class="nav-link" data-bs-toggle="tab" data-bs-target="#tabDataStaff">Staff / TU</button>
        </li>
    </ul>

    <div class="tab-content">
        <div class="tab-pane fade show active" id="tabDataGuru">
            <div class="row g-4">
                @foreach($guru as $g)
                <div class="col-md-4 col-lg-3">
                    <div class="staff-card h-100">
                        <div class="staff-photo">
                            <img src="{{ $g->foto ?? 'https://ui-avatars.com/api/?name=' . urlencode($g->nama) . '&size=300&background=16233F&color=fff' }}" alt="{{ $g->nama }}">
                        </div>
                        <div class="staff-body">
                            <h6>{{ $g->nama }}</h6>
                            <p>{{ $g->jabatan }}</p>
                            <p>{{ $g->mapel }}</p>
                            <p>{{ $g->NIP }}</p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>

        <div class="tab-pane fade" id="tabDataStaff">
            <div class="row g-4">
                @foreach($staff as $s)
                <div class="col-md-4 col-lg-3">
                    <div class="staff-card h-100">
                        <div class="staff-photo">
                            <img src="{{ $s->foto ?? 'https://ui-avatars.com/api/?name=' . urlencode($s->nama) . '&size=300&background=24365F&color=fff' }}" alt="{{ $s->nama }}">
                        </div>
                        <div class="staff-body">
                            <h6>{{ $s->nama }}</h6>
                            <p>{{ $s->jabatan }}</p>
                            <p>{{ $s->NIP }}</p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection