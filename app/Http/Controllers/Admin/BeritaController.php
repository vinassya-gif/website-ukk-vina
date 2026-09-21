<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Berita;
use Illuminate\Http\Request;

class BeritaController extends Controller
{
    public function index()
    {
        $berita = Berita::orderBy('tanggal', 'desc')->get();
        return view('admin.berita.index', compact('berita'));
    }

    public function create()
    {
        return view('admin.berita.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'isi' => 'required|string',
            'penulis' => 'nullable|string|max:255',
            'tanggal' => 'required|date',
            'gambar' => 'nullable|image|max:2048',
        ]);

        $data = $request->only('judul', 'isi', 'penulis', 'tanggal');

        if ($request->hasFile('gambar')) {
            $data['gambar'] = '/storage/' . $request->file('gambar')->store('berita', 'public');
        }

        Berita::create($data);

        return redirect()->route('admin.berita.index')->with('sukses', 'Berita berhasil ditambahkan.');
    }

    public function edit(Berita $berita)
    {
        return view('admin.berita.edit', compact('berita'));
    }

    public function update(Request $request, Berita $berita)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'isi' => 'required|string',
            'penulis' => 'nullable|string|max:255',
            'tanggal' => 'required|date',
            'gambar' => 'nullable|image|max:2048',
        ]);

        $data = $request->only('judul', 'isi', 'penulis', 'tanggal');

        if ($request->hasFile('gambar')) {
            $data['gambar'] = '/storage/' . $request->file('gambar')->store('berita', 'public');
        }

        $berita->update($data);

        return redirect()->route('admin.berita.index')->with('sukses', 'Berita berhasil diperbarui.');
    }

    public function destroy(Berita $berita)
    {
        $berita->delete();
        return back()->with('sukses', 'Berita berhasil dihapus.');
    }
}
