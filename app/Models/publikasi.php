<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class publikasi extends Model
{
    // Mengizinkan mass-assignment untuk proses Create & Update
    protected $fillable = ['judul', 'penerbit', 'tahun', 'file_dokumen'];
}
