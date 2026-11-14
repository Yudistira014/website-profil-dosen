<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profil extends Model
{
    protected $fillable = ['nama', 'universitas', 'program_studi', 'sinta_id', 'bidang_keahlian', 'deskripsi', 'foto_profil'];
}
