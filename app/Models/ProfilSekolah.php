<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProfilSekolah extends Model
{
    protected $fillable = [
    'nama_sekolah', 'npsn', 'alamat', 'telepon', 'email',
    'kepala_sekolah', 'tahun_berdiri', 'akreditasi',
    'visi', 'misi', 'sejarah',
];
}