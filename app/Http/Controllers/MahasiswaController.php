<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mahasiswa;

class MahasiswaController extends Controller
{
    // 1. Tampil Tabel Utama
    public function index()
    {
        $mahasiswas = Mahasiswa::all(); 
        return view('mahasiswa.index', compact('mahasiswas'));
    }

    // 2. Tampil Form Tambah
    public function create()
    {
        return view('mahasiswa.create');
    }

    // 3. Simpan Data Baru (Sudah ada Validasi NIM Unik - Tugas Mandiri No. 2)
    public function store(Request $request)
    {
        $request->validate([
            'nim' => 'required|unique:mahasiswas,nim', // NIM wajib diisi & tidak boleh kembar
            'nama' => 'required',
            'kelas' => 'required',
            'matakuliah' => 'required',
        ]);

        // Gunakan only agar aman dari error _token
        Mahasiswa::create($request->only(['nim', 'nama', 'kelas', 'matakuliah']));

        return redirect()->route('mahasiswa.index')->with('success', 'Data Berhasil Disimpan!');
    }

    
    public function edit(string $id)
    {
        $mahasiswa = Mahasiswa::findOrFail($id);
        return view('mahasiswa.edit', compact('mahasiswa'));
    }

    
    public function update(Request $request, $nim) 
{ 
    $request->validate([ 
        'nama' => 'required', 
        'kelas' => 'required', 
        'matakuliah' => 'required' 
    ]); 
 
    $mahasiswa = Mahasiswa::findOrFail($nim); 
    $mahasiswa->update($request->all());      return redirect()->route('mahasiswa.index')         ->with('success', 'Data mahasiswa berhasil diperbarui'); 
} 


    public function destroy($nim) { 
    Mahasiswa::destroy($nim); 
    return redirect()->route('mahasiswa.index') 
        ->with('success', 'Data mahasiswa berhasil dihapus'); } 

}