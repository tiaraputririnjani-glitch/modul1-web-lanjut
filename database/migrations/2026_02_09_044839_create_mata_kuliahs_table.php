<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
{
    Schema::create('matakuliahs', function (Blueprint $table) {
        $table->string('kode_mk')->primary(); // Kode MK sebagai Primary Key [cite: 101]
        $table->string('nama_mk');           // Nama Mata Kuliah [cite: 101]
        $table->integer('sks');              // Jumlah SKS [cite: 101]
        $table->integer('semester');         // Semester [cite: 101]
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mata_kuliahs');
    }
};
