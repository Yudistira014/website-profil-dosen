<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\PublikasiController;
use App\Http\Controllers\ProfilController;

// Rute Halaman Publik
Route::get('/', [LandingController::class, 'index'])->name('home');

// Rute Dashboard Admin (CRUD)
Route::resource('admin/publikasi', PublikasiController::class);
Route::get('admin/profil', [ProfilController::class, 'index'])->name('profil.index');
Route::put('admin/profil/update', [ProfilController::class, 'update'])->name('profil.update');