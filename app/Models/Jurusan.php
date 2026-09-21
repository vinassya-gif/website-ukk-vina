<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Jurusan extends Model
{
    protected $fillable = [
        'nama_jurusan','kode_jurusan','deskripsi','gambar','jumlah_siswa',
        'kaprog_nama','kaprog_foto','kaprog_deskripsi','kompetensi',
    ];

    public function galeri()
    {
        return $this->hasMany(Galeri::class);
    }
}