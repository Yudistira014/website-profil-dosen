<?php

namespace App\Http\Controllers;

use App\Models\Publikasi;
use App\Models\Profil; 
use Illuminate\Http\Request;

class LandingController extends Controller
{
    public function index()
    {
        // Mengambil data publikasi dan profil dari database
        $publikasis = Publikasi::orderBy('tahun', 'desc')->get();
        $profil = Profil::first(); // Mengambil baris pertama data profil
        
        return view('landing', compact('publikasis', 'profil'));
    }
}