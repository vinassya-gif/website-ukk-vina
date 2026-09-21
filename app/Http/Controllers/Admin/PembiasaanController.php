<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pembiasaan;
use Illuminate\Http\Request;

class PembiasaanController extends Controller
{
    public function index()
    {
        $pembiasaan = Pembiasaan::orderBy('id')->get();
        return view('admin.pembiasaan.index', compact('pembiasaan'));
    }

    public function create()
    {
        return view('admin.pembiasaan.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'gambar' => 'required|image|max:10240',
            'icon' => 'nullable|string|max:100',
        ]);

        $data = $request->only('judul', 'icon');

        if ($request->hasFile('gambar')) {
            $data['gambar'] = $request->file('gambar')->store('pembiasaan', 'public');
        }

        Pembiasaan::create($data);

        return redirect()->route('admin.pembiasaan.index')->with('sukses', 'Pembiasaan berhasil ditambahkan.');
    }

    public function edit(Pembiasaan $pembiasaan)
    {
        return view('admin.pembiasaan.edit', compact('pembiasaan'));
    }

    public function update(Request $request, Pembiasaan $pembiasaan)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'gambar' => 'nullable|image|max:10240',
            'icon' => 'nullable|string|max:100',
        ]);

        $data = $request->only('judul', 'icon');

        if ($request->hasFile('gambar')) {
            $data['gambar'] = $request->file('gambar')->store('pembiasaan', 'public');
        }

        $pembiasaan->update($data);

        return redirect()->route('admin.pembiasaan.index')->with('sukses', 'Pembiasaan berhasil diperbarui.');
    }

    public function destroy(Pembiasaan $pembiasaan)
    {
        $pembiasaan->delete();
        return back()->with('sukses', 'Pembiasaan berhasil dihapus.');
    }
}
