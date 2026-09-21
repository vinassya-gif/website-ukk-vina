<?php

namespace App\Http\Controllers;

use App\Models\Ekstrakurikuler;

class EkstrakurikulerController extends Controller
{
    public function index()
    {
        $ekskul = Ekstrakurikuler::all();
        return view('ekstrakurikuler', compact('ekskul'));
    }

    public function show(Ekstrakurikuler $ekstrakurikuler)
    {
        return view('ekstrakurikuler-detail', compact('ekstrakurikuler'));
    }
}