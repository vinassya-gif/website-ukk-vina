<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Galeri extends Model
{
    protected $fillable = ['judul', 'gambar', 'kategori', 'jurusan_id', 'ekstrakurikuler_id'];

    public function jurusan()
    {
        return $this->belongsTo(Jurusan::class);
    }

    public function ekstrakurikuler()
    {
        return $this->belongsTo(Ekstrakurikuler::class);
    }
}
