<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Berita;
use App\Models\Galeri;
use App\Models\Guru;
use App\Models\Jurusan;
use App\Models\Ekstrakurikuler;

class DashboardController extends Controller
{
    public function index()
    {
        $totalBerita = Berita::count();
        $totalGaleri = Galeri::count();
        $totalGuru = Guru::where('is_staff', false)->count();
        $totalJurusan = Jurusan::count();
        $totalEkskul = Ekstrakurikuler::count();

        return view('admin.dashboard', compact('totalBerita', 'totalGaleri', 'totalGuru', 'totalJurusan', 'totalEkskul'));
    }
}