<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProfilSekolah;
use App\Models\Pesan;

class KontakController extends Controller
{
    public function index()
    {
        $profil = ProfilSekolah::first();
        return view('kontak', compact('profil'));
    }

    public function kirim(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email',
            'pesan' => 'required|string',
        ]);

        Pesan::create($request->only('nama', 'email', 'pesan'));

        return back()->with('sukses', 'Pesan Anda berhasil dikirim. Terima kasih!');
    }
}
