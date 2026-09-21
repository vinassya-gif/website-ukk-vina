<?php

namespace App\Http\Controllers;

use App\Models\Jurusan;

class JurusanController extends Controller
{
    public function index()
    {
        $jurusans = Jurusan::all();
        return view('jurusan', compact('jurusans'));
    }

    public function show(Jurusan $jurusan)
    {
        return view('jurusan-detail', compact('jurusan'));
    }
}