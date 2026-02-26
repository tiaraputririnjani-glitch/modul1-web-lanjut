<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Mahasiswa; // Tambahkan ini agar sistem kenal Model Mahasiswa

class MahasiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Masukkan kode di dalam fungsi run
        Mahasiswa::create([
            'user_id' => 1, // Pastikan kamu sudah register akun pertama
            'nim' => '2201001',
            'nama' => 'Mahasiswa Contoh',
        ]);
        
        Mahasiswa::create([
            'user_id' => 1,
            'nim' => '2201002',
            'nama' => 'Tiara Putri',
        ]);
    }
}