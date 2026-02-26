<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    // Karena NIM adalah string dan bukan angka auto-increment
    protected $primaryKey = 'nim';
    public $incrementing = false;
    protected $keyType = 'string';

    // Kolom yang boleh diisi secara massal
   
protected $fillable = ['user_id', 'nim', 'nama', 'kelas', 'matakuliah_id'];
    /**
     * Relasi ke model MataKuliah (Many to One)
     */
    public function matakuliah()
    {
        // Parameter kedua: 'matakuliah_id' adalah kolom di tabel mahasiswas
        // Parameter ketiga: 'id' adalah kunci utama di tabel matakuliahs
        return $this->belongsTo(MataKuliah::class, 'matakuliah_id', 'id');
    }
}