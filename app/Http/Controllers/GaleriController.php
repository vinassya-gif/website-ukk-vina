<?php

namespace App\Http\Controllers;

use App\Models\Galeri;

class GaleriController extends Controller
{
    public function index()
    {
        $fasilitas = \App\Models\Fasilitas::whereNotNull('gambar')->get()->map(function ($item) {
            return (object)[
                'gambar' => asset($item->gambar),
                'judul' => $item->nama,
                'kategori' => 'fasilitas',
            ];
        });

        $momen = Galeri::whereNotNull('ekstrakurikuler_id')->get()->map(function ($item) {
            return (object)[
                'gambar' => $item->gambar,
                'judul' => $item->judul,
                'kategori' => 'momen',
            ];
        });

        $berita = \App\Models\Berita::whereNotNull('gambar')->get()->map(function ($item) {
            return (object)[
                'gambar' => asset($item->gambar),
                'judul' => $item->judul,
                'kategori' => 'berita',
            ];
        });

        $galeriUmum = Galeri::whereNull('ekstrakurikuler_id')->get()->map(function ($item) {
            return (object)[
                'gambar' => $item->gambar,
                'judul' => $item->judul,
                'kategori' => strtolower($item->kategori ?? 'pembiasaan'),
            ];
        });

        $galeri = $fasilitas->concat($momen)->concat($berita)->concat($galeriUmum);

        return view('galeri', compact('galeri'));
    }
}
