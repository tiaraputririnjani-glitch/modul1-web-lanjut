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

    // 4. Tampil Form Edit (Tugas Mandiri No. 1)
    public function edit(string $id)
    {
        $mahasiswa = Mahasiswa::findOrFail($id);
        return view('mahasiswa.edit', compact('mahasiswa'));
    }

    // 5. Simpan Perubahan (Update - Tugas Mandiri No. 1)
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama' => 'required',
            'kelas' => 'required',
            'matakuliah' => 'required',
        ]);

        $mahasiswa = Mahasiswa::findOrFail($id);
        $mahasiswa->update($request->only(['nama', 'kelas', 'matakuliah']));

        return redirect()->route('mahasiswa.index')->with('success', 'Data Berhasil Diperbarui!');
    }

    // 6. Hapus Data (Delete - Tugas Mandiri No. 1)
    public function destroy(string $id)
    {
        $mahasiswa = Mahasiswa::findOrFail($id);
        $mahasiswa->delete();

        return redirect()->route('mahasiswa.index')->with('success', 'Data Berhasil Dihapus!');
    }
}