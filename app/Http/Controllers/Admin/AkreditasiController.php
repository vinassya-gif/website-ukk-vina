<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Akreditasi;
use Illuminate\Http\Request;

class AkreditasiController extends Controller
{
    public function index()
    {
        $akreditasi = Akreditasi::orderBy('created_at', 'desc')->get();
        return view('admin.akreditasi.index', compact('akreditasi'));
    }

    public function create()
    {
        return view('admin.akreditasi.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'foto' => 'nullable|image|max:10240',
        ]);

        $data = $request->only('judul');

        if ($request->hasFile('foto')) {
            $data['foto'] = $request->file('foto')->store('akreditasi', 'public');
        }

        Akreditasi::create($data);

        return redirect()->route('admin.akreditasi.index')->with('sukses', 'Akreditasi berhasil ditambahkan.');
    }

    public function edit(Akreditasi $akreditasi)
    {
        return view('admin.akreditasi.edit', compact('akreditasi'));
    }

    public function update(Request $request, Akreditasi $akreditasi)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'foto' => 'nullable|image|max:10240',
        ]);

        $data = $request->only('judul');

        if ($request->hasFile('foto')) {
            $data['foto'] = $request->file('foto')->store('akreditasi', 'public');
        }

        $akreditasi->update($data);

        return redirect()->route('admin.akreditasi.index')->with('sukses', 'Akreditasi berhasil diperbarui.');
    }

    public function destroy(Akreditasi $akreditasi)
    {
        $akreditasi->delete();
        return back()->with('sukses', 'Akreditasi berhasil dihapus.');
    }
}
