<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LatihanController extends Controller
{
    public function index()
    {
        // Data dari Modul (Instruksi poin B & D)
        $nama_kampus = "Mahasiswa STMIK IKMI";

        // Data untuk Tugas Mandiri Poin 2
        $mata_kuliah = [
            "Pemrograman Web Lanjut", 
            "Data Mining", 
            "Ai Automation", 
            "Business Digital"
        ];

        // Mengirim semua data ke view
        return view('welcome_mahasiswa', compact('nama_kampus', 'mata_kuliah'));
    }
}


