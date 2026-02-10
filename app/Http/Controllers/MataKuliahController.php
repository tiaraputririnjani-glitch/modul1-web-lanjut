<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MataKuliah; // Jangan lupa panggil modelnya

class MataKuliahController extends Controller
{
    // 1. Tampilkan Daftar Mata Kuliah
    public function index()
    {
        $matakuliahs = MataKuliah::all();
        return view('matakuliah.index', compact('matakuliahs'));
    }

    // 2. Tampilkan Form Tambah
    public function create()
    {
        return view('matakuliah.create');
    }

    // 3. Simpan Data Baru (Validasi SKS ada di sini)
    public function store(Request $request)
    {
        $request->validate([
            'kode_mk' => 'required|unique:matakuliahs,kode_mk',
            'nama_mk' => 'required',
            'sks' => 'required|numeric|between:1,6', // SKS minimal 1, maksimal 6
            'semester' => 'required|numeric'
        ]);

        MataKuliah::create($request->all());

        return redirect()->route('matakuliah.index')
                         ->with('success', 'Mata Kuliah berhasil ditambahkan!');
    }

    // 4. Tampilkan Form Edit
    public function edit($kode_mk)
    {
        $mk = MataKuliah::findOrFail($kode_mk);
        return view('matakuliah.edit', compact('mk'));
    }

    // 5. Update Data
    public function update(Request $request, $kode_mk)
    {
        $request->validate([
            'nama_mk' => 'required',
            'sks' => 'required|numeric|between:1,6',
            'semester' => 'required|numeric'
        ]);

        $mk = MataKuliah::findOrFail($kode_mk);
        $mk->update($request->all());

        return redirect()->route('matakuliah.index')
                         ->with('success', 'Mata Kuliah berhasil diperbarui!');
    }

    // 6. Hapus Data
    public function destroy($kode_mk)
    {
        $mk = MataKuliah::findOrFail($kode_mk);
        $mk->delete();

        return redirect()->route('matakuliah.index')
                         ->with('success', 'Mata Kuliah berhasil dihapus!');
    }
}