<?php

namespace App\Http\Controllers;

use App\Models\Berita;

class BeritaController extends Controller
{
    public function index()
    {
        $beritas = Berita::orderBy('tanggal', 'desc')->get();
        return view('berita', compact('beritas'));
    }

    public function show(Berita $berita)
    {
        return view('berita-detail', compact('berita'));
    }
}