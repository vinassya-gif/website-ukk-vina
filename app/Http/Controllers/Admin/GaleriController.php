<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Galeri;
use Illuminate\Http\Request;

class GaleriController extends Controller
{
    public function index()
    {
        $fasilitas = \App\Models\Fasilitas::whereNotNull('gambar')->get()->map(function ($item) {
            return (object)[
                'id' => $item->id,
                'gambar' => asset($item->gambar),
                'judul' => $item->nama,
                'kategori' => 'Fasilitas',
                'sumber' => 'fasilitas',
                'edit_url' => route('admin.fasilitas.edit', $item->id),
            ];
        });

        $galerisData = Galeri::get()->map(function ($item) {
            return (object)[
                'id' => $item->id,
                'gambar' => $item->gambar,
                'judul' => $item->judul,
                'kategori' => $item->kategori ?? ($item->ekstrakurikuler_id ? 'Momen Kebersamaan' : 'Kegiatan'),
                'sumber' => 'galeri',
                'edit_url' => route('admin.galeri.edit', $item->id),
            ];
        });

        $berita = \App\Models\Berita::whereNotNull('gambar')->get()->map(function ($item) {
            return (object)[
                'id' => $item->id,
                'gambar' => asset($item->gambar),
                'judul' => $item->judul,
                'kategori' => 'Berita',
                'sumber' => 'berita',
                'edit_url' => route('admin.berita.edit', $item->id),
            ];
        });

        $galeri = $fasilitas->concat($galerisData)->concat($berita);

        return view('admin.galeri.index', compact('galeri'));
    }

    public function create()
    {
        return view('admin.galeri.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'gambar' => 'required|image|max:10240',
            'kategori' => 'nullable|string|max:100',
        ]);

        $data = $request->only('judul', 'kategori');

        if ($request->hasFile('gambar')) {
            $data['gambar'] = $request->file('gambar')->store('galeri', 'public');
        }

        Galeri::create($data);

        return redirect()->route('admin.galeri.index')->with('sukses', 'Foto berhasil ditambahkan.');
    }

    public function edit(Galeri $galeri)
    {
        return view('admin.galeri.edit', compact('galeri'));
    }

    public function update(Request $request, Galeri $galeri)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'gambar' => 'nullable|image|max:10240',
            'kategori' => 'nullable|string|max:100',
        ]);

        $data = $request->only('judul', 'kategori');

        if ($request->hasFile('gambar')) {
            $data['gambar'] = $request->file('gambar')->store('galeri', 'public');
        }

        $galeri->update($data);

        return redirect()->route('admin.galeri.index')->with('sukses', 'Foto berhasil diperbarui.');
    }

    public function destroy(Galeri $galeri)
    {
        $galeri->delete();
        return back()->with('sukses', 'Foto berhasil dihapus.');
    }
}