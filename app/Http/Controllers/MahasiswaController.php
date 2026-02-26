<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use App\Models\Matakuliah;
use Illuminate\Http\Request;

class MahasiswaController extends Controller {

    public function index() {
        // Mengambil data mahasiswa beserta relasi matakuliahnya
        $mahasiswas = Mahasiswa::with('matakuliah')->get();
        return view('mahasiswa.index', compact('mahasiswas'));
    }

    public function create() {
        $data_mk = Matakuliah::all(); 
        return view('mahasiswa.create', compact('data_mk'));
    }

    public function store(Request $request) {
        // 1. Validasi: Tambahkan 'kelas' dan 'matakuliah_id' agar tidak error 'Internal Server Error'
        $request->validate([
            'nim' => 'required|unique:mahasiswas',
            'nama' => 'required',
            'kelas' => 'required',
            'matakuliah_id' => 'required|exists:matakuliahs,id'
        ]);

        // 2. Mencatat ID User: Sangat penting agar kolom 'user_id' tidak kosong
        $data = $request->all();
        $data['user_id'] = auth()->id(); 

        Mahasiswa::create($data);
        return redirect()->route('mahasiswa.index')->with('success', 'Data mahasiswa berhasil ditambahkan');
    }

    public function edit($id) // Gunakan ID atau primary key yang sesuai di database
    {
        $mahasiswa = Mahasiswa::findOrFail($id); 
        $data_mk = Matakuliah::all();
        return view('mahasiswa.edit', compact('mahasiswa', 'data_mk'));
    }

    public function update(Request $request, $id) 
    {
        $request->validate([
            'nama' => 'required',
            'kelas' => 'required',
            'matakuliah_id' => 'required|exists:matakuliahs,id'
        ]);

        $mahasiswa = Mahasiswa::findOrFail($id);
        $mahasiswa->update($request->all()); 

        return redirect()->route('mahasiswa.index')->with('success', 'Data mahasiswa berhasil diperbarui');
    }

    public function destroy($id) 
    {
        $mahasiswa = Mahasiswa::findOrFail($id);
        $mahasiswa->delete(); 
        
        return redirect()->route('mahasiswa.index')->with('success', 'Data mahasiswa berhasil dihapus');
    }
}