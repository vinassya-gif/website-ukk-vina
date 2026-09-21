<?php

namespace App\Http\Controllers;

use App\Models\ProfilSekolah;

class ProfilController extends Controller
{
    public function index()
    {
        $profil = ProfilSekolah::first();
        return view('profil', compact('profil'));
    }
    
    public function sejarah()
    {
        $profil = ProfilSekolah::first();
        return view('sejarah', compact('profil'));
    }
    public function visiMisi()
    {
        $profil = ProfilSekolah::first();
        return view('visi-misi', compact('profil'));
    }
}