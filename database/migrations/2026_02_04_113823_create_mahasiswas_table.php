<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
   public function up(): void
{
    Schema::create('mahasiswas', function (Blueprint $table) {
        $table->id();
        // 1. Tambahkan user_id untuk relasi ke tabel users
        $table->foreignId('user_id')->constrained()->onDelete('cascade');
        $table->string('nim')->unique();
        $table->string('nama');
        // 2. Tambahkan kolom kelas yang menyebabkan error sebelumnya
        $table->string('kelas'); 
        $table->foreignId('matakuliah_id')->constrained('matakuliahs');
        $table->timestamps();
    });

}

    public function down(): void
    {
        Schema::dropIfExists('mahasiswas');
    }
};