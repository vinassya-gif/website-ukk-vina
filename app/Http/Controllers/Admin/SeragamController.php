<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Seragam;
use Illuminate\Http\Request;

class SeragamController extends Controller
{
    public function index()
    {
        $seragam = Seragam::orderBy('urutan')->get();
        return view('admin.seragam.index', compact('seragam'));
    }

    public function create()
    {
        return view('admin.seragam.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_hari' => 'required|string|max:255',
            'gambar' => 'required|image|max:10240',
            'urutan' => 'nullable|integer',
        ]);

        $data = $request->only('nama_hari', 'urutan');

        if ($request->hasFile('gambar')) {
            $data['gambar'] = $request->file('gambar')->store('seragam', 'public');
        }

        Seragam::create($data);

        return redirect()->route('admin.seragam.index')->with('sukses', 'Seragam berhasil ditambahkan.');
    }

    public function edit(Seragam $seragam)
    {
        return view('admin.seragam.edit', compact('seragam'));
    }

    public function update(Request $request, Seragam $seragam)
    {
        $request->validate([
            'nama_hari' => 'required|string|max:255',
            'gambar' => 'nullable|image|max:10240',
            'urutan' => 'nullable|integer',
        ]);

        $data = $request->only('nama_hari', 'urutan');

        if ($request->hasFile('gambar')) {
            $data['gambar'] = $request->file('gambar')->store('seragam', 'public');
        }

        $seragam->update($data);

        return redirect()->route('admin.seragam.index')->with('sukses', 'Seragam berhasil diperbarui.');
    }

    public function destroy(Seragam $seragam)
    {
        $seragam->delete();
        return back()->with('sukses', 'Seragam berhasil dihapus.');
    }
}
