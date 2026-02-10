<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MataKuliah extends Model
{
    protected $table = 'matakuliahs';
    protected $primaryKey = 'kode_mk'; // Menggunakan kode_mk sebagai kunci utama [cite: 101]
    public $incrementing = false;     // Karena primary key bukan angka auto-increment
    protected $keyType = 'string';

    protected $fillable = ['kode_mk', 'nama_mk', 'sks', 'semester'];
}
