<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\MatakuliahController;
use App\Models\Mahasiswa;
use App\Models\Matakuliah;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Zona aman: Semua rute di dalam group ini butuh LOGIN
Route::middleware(['auth', 'verified'])->group(function () {
    
    // Halaman Dashboard Utama dengan Ringkasan Data
    Route::get('/dashboard', function () {
        $jml_mahasiswa = Mahasiswa::count();
        $jml_matakuliah = Matakuliah::count();
        return view('dashboard', compact('jml_mahasiswa', 'jml_matakuliah'));
    })->name('dashboard');

    // 1. Rute Khusus Hapus Mahasiswa (Dijaga Middleware Custom)
    Route::delete('/mahasiswa/{mahasiswa}', [MahasiswaController::class, 'destroy'])
        ->middleware('check.email')
        ->name('mahasiswa.destroy');

    // 2. Rute CRUD Sisanya (Kecuali destroy karena sudah dibuat di atas)
    Route::resource('mahasiswa', MahasiswaController::class)->except(['destroy']);
    Route::resource('matakuliah', MatakuliahController::class);

    // Rute Profile (Bawaan Breeze)
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';