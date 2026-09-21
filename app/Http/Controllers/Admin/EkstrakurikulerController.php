<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Ekstrakurikuler;
use App\Models\Galeri;
use Illuminate\Http\Request;

class EkstrakurikulerController extends Controller
{
    public function index()
    {
        $ekskul = Ekstrakurikuler::all();
        return view('admin.ekstrakurikuler.index', compact('ekskul'));
    }

    public function create()
    {
        return view('admin.ekstrakurikuler.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'pembina' => 'nullable|string|max:255',
            'pembina_foto' => 'nullable|image|max:2048',
            'pembina_deskripsi' => 'nullable|string',
            'jadwal' => 'nullable|string|max:255',
            'deskripsi' => 'nullable|string',
            'gambar' => 'nullable|image|max:2048',
        ]);

        $data = $request->except(['pembina_foto', 'gambar']);

        if ($request->hasFile('pembina_foto')) {
            $data['pembina_foto'] = '/storage/' . $request->file('pembina_foto')->store('pembina', 'public');
        }
        if ($request->hasFile('gambar')) {
            $data['gambar'] = '/storage/' . $request->file('gambar')->store('ekstrakurikuler', 'public');
        }

        Ekstrakurikuler::create($data);

        return redirect()->route('admin.ekstrakurikuler.index')->with('sukses', 'Ekstrakurikuler berhasil ditambahkan.');
    }

    public function edit(Ekstrakurikuler $ekstrakurikuler)
    {
        return view('admin.ekstrakurikuler.edit', compact('ekstrakurikuler'));
    }

    public function update(Request $request, Ekstrakurikuler $ekstrakurikuler)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'pembina' => 'nullable|string|max:255',
            'pembina_foto' => 'nullable|image|max:10240',
            'pembina_deskripsi' => 'nullable|string',
            'jadwal' => 'nullable|string|max:255',
            'deskripsi' => 'nullable|string',
            'gambar' => 'nullable|image|max:10240',
        ]);

        $data = $request->except(['pembina_foto', 'gambar']);

        if ($request->hasFile('pembina_foto')) {
            $data['pembina_foto'] = '/storage/' . $request->file('pembina_foto')->store('pembina', 'public');
        }
        if ($request->hasFile('gambar')) {
            $data['gambar'] = '/storage/' . $request->file('gambar')->store('ekstrakurikuler', 'public');
        }

        $ekstrakurikuler->update($data);

        return redirect()->route('admin.ekstrakurikuler.index')->with('sukses', 'Ekstrakurikuler berhasil diperbarui.');
    }

    public function destroy(Ekstrakurikuler $ekstrakurikuler)
    {
        $ekstrakurikuler->delete();
        return back()->with('sukses', 'Ekstrakurikuler berhasil dihapus.');
    }
    public function storeGaleri(Request $request, Ekstrakurikuler $ekstrakurikuler)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'gambar' => 'required|array|min:1',
            'gambar.*' => 'image|max:10240',
        ]);

        foreach ($request->file('gambar') as $index => $file) {
            $path = '/storage/' . $file->store('galeri', 'public');

            Galeri::create([
                'judul' => $request->judul . ' ' . ($index + 1),
                'gambar' => $path,
                'kategori' => 'Ekstrakurikuler',
                'ekstrakurikuler_id' => $ekstrakurikuler->id,
            ]);
        }

        return back()->with('sukses', 'Foto berhasil ditambahkan.');
    }
}