<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Akreditasi extends Model
{
    protected $table = 'akreditasis';
    protected $fillable = ['judul', 'foto'];
}
