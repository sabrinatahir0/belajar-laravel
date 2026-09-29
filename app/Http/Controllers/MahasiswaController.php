<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    // 1. Tampilkan Semua Data
    public function index()
    {
        $data_mahasiswa = Mahasiswa::all();
        return view('viewmahasiswa', compact('data_mahasiswa'));
    }

    // 2. Form Tambah Data
    public function create()
    {
        return view('tambahmahasiswa');
    }

    // 3. Proses Simpan Data Baru
    public function store(Request $request)
    {
        $request->validate([
            'npm' => 'required|numeric|unique:mahasiswa,npm',
            'nama' => 'required|string|max:255',
            'prodi' => 'required|string|max:255',
            'tahunmasuk' => 'required|digits:4|numeric',
        ], [
            'npm.required' => 'NPM wajib diisi!',
            'npm.numeric' => 'NPM harus berupa angka!',
            'npm.unique' => 'NPM ini sudah terdaftar di sistem!',
            'nama.required' => 'Nama Mahasiswa wajib diisi!',
            'prodi.required' => 'Program Studi wajib diisi!',
            'tahunmasuk.required' => 'Tahun Masuk wajib diisi!',
            'tahunmasuk.digits' => 'Tahun Masuk harus 4 digit angka!',
        ]);

        try {
            Mahasiswa::create([
                'npm' => $request->npm,
                'nama' => $request->nama,
                'prodi' => $request->prodi,
                'tahunmasuk' => $request->tahunmasuk,
            ]);

            return redirect()->route('mahasiswa.index')->with('success', 'Data mahasiswa berhasil ditambahkan!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Gagal menambahkan data mahasiswa!')->withInput();
        }
    }

    // 4. Form Edit Data
    public function edit($npm)
    {
        $mahasiswa = Mahasiswa::findOrFail($npm);
        return view('editmahasiswa', compact('mahasiswa'));
    }

    // 5. Proses Update Data
    public function update(Request $request, $npm)
    {
        $request->validate([
            'npm' => 'required',
            'nama' => 'required|string|max:255',
            'prodi' => 'required|string|max:255',
            'tahunmasuk' => 'required|digits:4|numeric',
        ], [
            'nama.required' => 'Nama Mahasiswa wajib diisi!',
            'prodi.required' => 'Program Studi wajib diisi!',
            'tahunmasuk.required' => 'Tahun Masuk wajib diisi!',
            'tahunmasuk.digits' => 'Tahun Masuk harus 4 digit angka!',
        ]);

        try {
            $mahasiswa = Mahasiswa::findOrFail($npm);
            $mahasiswa->update([
                'nama' => $request->nama,
                'prodi' => $request->prodi,
                'tahunmasuk' => $request->tahunmasuk,
            ]);

            return redirect()->route('mahasiswa.index')->with('success', 'Data mahasiswa berhasil diperbarui!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Gagal memperbarui data mahasiswa!')->withInput();
        }
    }

    // 6. Proses Hapus Data
    public function destroy($npm)
    {
        try {
            $mahasiswa = Mahasiswa::findOrFail($npm);
            $mahasiswa->delete();

            return redirect()->route('mahasiswa.index')->with('success', 'Data mahasiswa berhasil dihapus!');
        } catch (\Exception $e) {
            return redirect()->route('mahasiswa.index')->with('error', 'Gagal menghapus data mahasiswa!');
        }
    }
}