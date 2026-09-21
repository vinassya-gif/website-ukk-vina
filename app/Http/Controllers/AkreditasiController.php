<?php

namespace App\Http\Controllers;

use App\Models\Akreditasi;

class AkreditasiController extends Controller
{
    public function index()
    {
        $akreditasi = Akreditasi::orderBy('created_at', 'desc')->get();
        return view('akreditasi', compact('akreditasi'));
    }
}
