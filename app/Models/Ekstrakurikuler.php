<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ekstrakurikuler extends Model
{
    protected $fillable = [
        'nama','pembina','pembina_foto','pembina_deskripsi','jadwal','deskripsi','gambar',
    ];

    public function galeri()
    {
        return $this->hasMany(Galeri::class);
    }
}