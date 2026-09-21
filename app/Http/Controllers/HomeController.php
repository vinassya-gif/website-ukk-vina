<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\Galeri;
use App\Models\Guru;
use App\Models\Jurusan;
use App\Models\Ekstrakurikuler;
use App\Models\ProfilSekolah;
use App\Models\Pembiasaan;
use App\Models\Seragam;

class HomeController extends Controller
{
    public function index()
    {
        $profil = ProfilSekolah::first();
        $berita = Berita::orderBy('tanggal', 'desc')->take(3)->get();
        $galeri = Galeri::orderBy('created_at', 'desc')->take(6)->get();
        $pembiasaan = Pembiasaan::orderBy('id')->get();
        $seragam = Seragam::orderBy('urutan')->get();
        $jumlahSiswa = $profil->jumlah_siswa ?? 0;
        $jumlahEkskul = Ekstrakurikuler::count();
        $jumlahJurusan = Jurusan::count();
        $jumlahGuruStaff = Guru::count();

        return view('home', compact(
            'profil',
            'berita',
            'galeri',
            'pembiasaan',
            'seragam',
            'jumlahSiswa',
            'jumlahEkskul',
            'jumlahJurusan',
            'jumlahGuruStaff'
        ));
    }
}
