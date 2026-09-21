<?php

namespace App\Http\Controllers;

use App\Models\Guru;

class GuruController extends Controller
{
    public function index()
    {
        $guru = Guru::where('is_staff', false)->get();
        $staff = Guru::where('is_staff', true)->get();
        return view('guru', compact('guru', 'staff'));
    }
}