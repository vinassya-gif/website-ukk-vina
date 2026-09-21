<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Jurusan;
use Illuminate\Http\Request;

class JurusanController extends Controller
{
    public function index()
    {
        $jurusans = Jurusan::all();
        return view('admin.jurusan.index', compact('jurusans'));
    }

    public function create()
    {
        return view('admin.jurusan.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_jurusan' => 'required|string|max:255',
            'kode_jurusan' => 'nullable|string|max:50',
            'deskripsi' => 'nullable|string',
            'gambar' => 'nullable|image|max:2048',
            'kaprog_nama' => 'nullable|string|max:255',
            'kaprog_foto' => 'nullable|image|max:2048',
            'kaprog_deskripsi' => 'nullable|string',
            'kompetensi' => 'nullable|string',
        ]);

        $data = $request->except(['gambar', 'kaprog_foto']);

        if ($request->hasFile('gambar')) {
            $data['gambar'] = '/storage/' . $request->file('gambar')->store('jurusan', 'public');
        }
        if ($request->hasFile('kaprog_foto')) {
            $data['kaprog_foto'] = '/storage/' . $request->file('kaprog_foto')->store('kaprog', 'public');
        }

        Jurusan::create($data);

        return redirect()->route('admin.jurusan.index')->with('sukses', 'Jurusan berhasil ditambahkan.');
    }

    public function edit(Jurusan $jurusan)
    {
        return view('admin.jurusan.edit', compact('jurusan'));
    }

    public function update(Request $request, Jurusan $jurusan)
    {
        $request->validate([
            'nama_jurusan' => 'required|string|max:255',
            'kode_jurusan' => 'nullable|string|max:50',
            'deskripsi' => 'nullable|string',
            'jumlah_siswa' => 'nullable|integer',
            'gambar' => 'nullable|image|max:2048',
            'kaprog_nama' => 'nullable|string|max:255',
            'kaprog_foto' => 'nullable|image|max:2048',
            'kaprog_deskripsi' => 'nullable|string',
            'kompetensi' => 'nullable|string',
        ]);

        $data = $request->except(['gambar', 'kaprog_foto']);

        if ($request->hasFile('gambar')) {
            $data['gambar'] = '/storage/' . $request->file('gambar')->store('jurusan', 'public');
        }
        if ($request->hasFile('kaprog_foto')) {
            $data['kaprog_foto'] = '/storage/' . $request->file('kaprog_foto')->store('kaprog', 'public');
        }

        $jurusan->update($data);

        return redirect()->route('admin.jurusan.index')->with('sukses', 'Jurusan berhasil diperbarui.');
    }

    public function destroy(Jurusan $jurusan)
    {
        $jurusan->delete();
        return back()->with('sukses', 'Jurusan berhasil dihapus.');
    }
}