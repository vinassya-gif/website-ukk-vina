@extends('admin.layouts.app')
@section('title', 'Edit Ekstrakurikuler')

@section('content')
<h2 class="fw-bold mb-4">Edit Ekstrakurikuler</h2>

<form action="{{ route('admin.ekstrakurikuler.update', $ekstrakurikuler->id) }}" method="POST" enctype="multipart/form-data" class="bg-white p-4 rounded shadow-sm">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label class="form-label">Nama Ekstrakurikuler</label>
        <input type="text" name="nama" class="form-control" value="{{ $ekstrakurikuler->nama }}" required>
    </div>
    <div class="mb-3">
        <label class="form-label">Jadwal</label>
        <input type="text" name="jadwal" class="form-control" value="{{ $ekstrakurikuler->jadwal }}">
    </div>
    <div class="mb-3">
        <label class="form-label">Deskripsi</label>
        <textarea name="deskripsi" rows="3" class="form-control">{{ $ekstrakurikuler->deskripsi }}</textarea>
    </div>
    <div class="mb-3">
        <label class="form-label">Foto Ekstrakurikuler (untuk kartu)</label>
        @if(!empty($ekstrakurikuler->gambar))
            <div class="mb-2"><img src="{{ $ekstrakurikuler->gambar }}" style="height:100px;border-radius:8px;object-fit:cover;"></div>
        @endif
        <input type="file" name="gambar" class="form-control">
        <small class="text-muted">Kosongkan kalau tidak ingin mengganti.</small>
    </div>
    <hr>

    <h6 class="text-muted text-uppercase mb-3 mt-4" style="font-size:.8rem;">Pembina</h6>
    <div class="mb-3">
        <label class="form-label">Nama Pembina</label>
        <input type="text" name="pembina" class="form-control" value="{{ $ekstrakurikuler->pembina }}">
    </div>
    <div class="mb-3">
        <label class="form-label">Foto Pembina</label>
        @if(!empty($ekstrakurikuler->pembina_foto))
            <div class="mb-2"><img src="{{ $ekstrakurikuler->pembina_foto }}" style="height:80px;border-radius:8px;"></div>
        @endif
        <input type="file" name="pembina_foto" class="form-control">
        <small class="text-muted">Kosongkan kalau tidak ingin mengganti.</small>
    </div>
    <div class="mb-3">
        <label class="form-label">Deskripsi Singkat Pembina</label>
        <textarea name="pembina_deskripsi" rows="2" class="form-control">{{ $ekstrakurikuler->pembina_deskripsi }}</textarea>
    </div>

    <button class="btn btn-primary">Update</button>
    <a href="{{ route('admin.ekstrakurikuler.index') }}" class="btn btn-secondary">Batal</a>
</form>
    <div class="bg-white p-4 rounded shadow-sm mt-4">
    <h5 class="fw-bold mb-3">Momen Kebersamaan</h5>

    @if($ekstrakurikuler->galeri->count())
        <div class="row g-2 mb-4">
            @foreach($ekstrakurikuler->galeri as $g)
            <div class="col-3">
                <div class="position-relative">
                    <img src="{{ $g->gambar }}" class="w-100 rounded" style="height:100px;object-fit:cover;">
                    <form action="{{ route('admin.galeri.destroy', $g->id) }}" method="POST" onsubmit="return confirm('Hapus foto ini?')" class="position-absolute top-0 end-0 m-1">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-danger py-0 px-2">&times;</button>
                    </form>
                </div>
            </div>
            @endforeach
        </div>
    @else
        <p class="text-muted">Belum ada foto momen kebersamaan.</p>
    @endif

    <hr>

    <h6 class="fw-bold mb-3">Tambah Foto Baru</h6>
    <form action="{{ route('admin.ekstrakurikuler.galeri.store', $ekstrakurikuler->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row g-2">
            <div class="col-md-5">
                <input type="text" name="judul" class="form-control" placeholder="Judul foto" required>
            </div>
            <div class="col-md-5">
                <input type="file" name="gambar[]" class="form-control" multiple required>
            </div>
            <div class="col-md-2">
                <button class="btn btn-primary w-100">Upload</button>
            </div>
        </div>
        <small class="text-muted d-block mt-1">Bisa pilih lebih dari satu foto sekaligus (tahan Ctrl saat memilih file).</small>
    </form>
</div>
@endsections