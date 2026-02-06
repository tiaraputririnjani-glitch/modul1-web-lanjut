<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
use App\Http\Controllers\LatihanController; 
 
Route::get('/latihan', [LatihanController::class, 'index']); 

use App\Http\Controllers\MahasiswaController;

Route::resource('mahasiswa', MahasiswaController::class);

