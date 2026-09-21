<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pesan;

class PesanController extends Controller
{
    public function index()
    {
        $pesan = Pesan::orderBy('created_at', 'desc')->get();
        return view('admin.pesan.index', compact('pesan'));
    }

    public function show(Pesan $pesan)
    {
        $pesan->update(['dibaca' => true]);
        return view('admin.pesan.show', compact('pesan'));
    }

    public function destroy(Pesan $pesan)
    {
        $pesan->delete();
        return back()->with('sukses', 'Pesan berhasil dihapus.');
    }
}
