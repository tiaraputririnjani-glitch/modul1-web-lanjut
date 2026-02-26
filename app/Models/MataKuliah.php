<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Matakuliah extends Model
{
    protected $table = 'matakuliahs';
    
    // HAPUS atau KOMENTARI baris primaryKey kode_mk
    // Karena di database kita pakai $table->id() yang otomatis adalah 'id'
    protected $primaryKey = 'id'; 
    public $incrementing = true;
    protected $keyType = 'int';

    protected $fillable = ['kode_mk', 'nama_mk', 'sks', 'semester'];

    public function mahasiswas() { 
        return $this->hasMany(Mahasiswa::class, 'matakuliah_id', 'id'); 
    } 
}