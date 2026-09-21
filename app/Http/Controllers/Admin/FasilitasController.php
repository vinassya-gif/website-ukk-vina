<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Fasilitas;
use Illuminate\Http\Request;

class FasilitasController extends Controller
{
    public function index()
    {
        $fasilitas = Fasilitas::all();
        return view('admin.fasilitas.index', compact('fasilitas'));
    }

    public function create()
    {
        return view('admin.fasilitas.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'icon' => 'nullable|string|max:100',
            'gambar' => 'nullable|image|max:10240',
        ]);

        $data = $request->except('gambar');

        if ($request->hasFile('gambar')) {
            $data['gambar'] = '/storage/' . $request->file('gambar')->store('fasilitas', 'public');
        }

        Fasilitas::create($data);

        return redirect()->route('admin.fasilitas.index')->with('sukses', 'Fasilitas berhasil ditambahkan.');
    }

    public function edit(Fasilitas $fasilitas)
    {
        return view('admin.fasilitas.edit', compact('fasilitas'));
    }

    public function update(Request $request, Fasilitas $fasilitas)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'icon' => 'nullable|string|max:100',
            'gambar' => 'nullable|image|max:10240',
        ]);

        $data = $request->except('gambar');

        if ($request->hasFile('gambar')) {
            $data['gambar'] = '/storage/' . $request->file('gambar')->store('fasilitas', 'public');
        }

        $fasilitas->update($data);

        return redirect()->route('admin.fasilitas.index')->with('sukses', 'Fasilitas berhasil diperbarui.');
    }

    public function destroy(Fasilitas $fasilitas)
    {
        $fasilitas->delete();
        return back()->with('sukses', 'Fasilitas berhasil dihapus.');
    }
}
