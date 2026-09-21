<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Guru;
use Illuminate\Http\Request;

class GuruController extends Controller
{
    public function index()
    {
        $guru = Guru::orderBy('is_staff')->get();
        return view('admin.guru.index', compact('guru'));
    }

    public function create()
    {
        return view('admin.guru.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'nip' => 'nullable|string|max:50',
            'jabatan' => 'nullable|string|max:255',
            'mapel' => 'nullable|string|max:255',
            'foto' => 'nullable|image|max:2048',
        ]);

        $data = $request->except('foto');
        $data['is_staff'] = $request->has('is_staff');

        if ($request->hasFile('foto')) {
            $data['foto'] = '/storage/' . $request->file('foto')->store('guru', 'public');
        }

        Guru::create($data);

        return redirect()->route('admin.guru.index')->with('sukses', 'Data berhasil ditambahkan.');
    }

    public function edit(Guru $guru)
    {
        return view('admin.guru.edit', compact('guru'));
    }

    public function update(Request $request, Guru $guru)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'nip' => 'nullable|string|max:50',
            'jabatan' => 'nullable|string|max:255',
            'mapel' => 'nullable|string|max:255',
            'foto' => 'nullable|image|max:2048',
        ]);

        $data = $request->except('foto');
        $data['is_staff'] = $request->has('is_staff');

        if ($request->hasFile('foto')) {
            $data['foto'] = '/storage/' . $request->file('foto')->store('guru', 'public');
        }

        $guru->update($data);

        return redirect()->route('admin.guru.index')->with('sukses', 'Data berhasil diperbarui.');
    }

    public function destroy(Guru $guru)
    {
        $guru->delete();
        return back()->with('sukses', 'Data berhasil dihapus.');
    }
}