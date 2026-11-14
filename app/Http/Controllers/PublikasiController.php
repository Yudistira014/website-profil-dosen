<?php

namespace App\Http\Controllers;

use App\Models\Publikasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PublikasiController extends Controller
{
    // Menampilkan halaman utama dasbor
    public function index()
    {
        $publikasis = Publikasi::orderBy('tahun', 'desc')->get();
        return view('admin.publikasi.index', compact('publikasis'));
    }

    // Menampilkan form tambah data
    public function create()
    {
        return view('admin.publikasi.create');
    }

    // Menyimpan data baru ke database (termasuk upload file)
    public function store(Request $request)
    {
        // 1. Buat pesan error kustom dalam bahasa Indonesia
        $messages = [
            'judul.required' => 'Judul publikasi wajib diisi.',
            'judul.min' => 'Judul publikasi harus berisi minimal 10 karakter.',
            'tahun.required' => 'Tahun terbit wajib diisi.',
            'tahun.integer' => 'Tahun harus berupa angka.',
            'tahun.min' => 'Tahun terbit tidak valid (minimal 1900).',
            'tahun.max' => 'Tahun terbit melebihi batas maksimal.',
            'penerbit.required' => 'Nama penerbit / jurnal wajib diisi.',
            'file_dokumen.mimes' => 'File dokumen hanya boleh berformat PDF.',
            'file_dokumen.max' => 'Ukuran file PDF tidak boleh lebih dari 2MB.',
        ];

        // 2.aturan validasi
        $request->validate([
            'judul' => 'required|string|min:10|max:255',
            'tahun' => 'required|integer|min:1900|max:2155',
            'penerbit' => 'required|string|max:255',
            'file_dokumen' => 'nullable|mimes:pdf|max:2048', // Hanya mengizinkan PDF
        ], $messages);

        $data = $request->all();

        if ($request->hasFile('file_dokumen')) {
            $data['file_dokumen'] = $request->file('file_dokumen')->store('dokumen_publikasi', 'public');
        }

        Publikasi::create($data);
        return redirect()->route('publikasi.index')->with('success', 'Data publikasi berhasil ditambahkan!');
    }

    // form edit data
    public function edit(Publikasi $publikasi)
    {
        return view('admin.publikasi.edit', compact('publikasi'));
    }

    // Memperbarui data ke database
    public function update(Request $request, Publikasi $publikasi)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'penerbit' => 'required|string|max:255',
            'tahun' => 'required|integer',
            'file_dokumen' => 'nullable|mimes:pdf,doc,docx|max:2048',
        ]);

        $data = $request->all();

        // Jika user mengupload file baru saat edit
        if ($request->hasFile('file_dokumen')) {
            // Hapus file lama fisik dari storage jika sebelumnya ada
            if ($publikasi->file_dokumen) {
                Storage::disk('public')->delete($publikasi->file_dokumen);
            }
            // Simpan file baru
            $data['file_dokumen'] = $request->file('file_dokumen')->store('dokumen_publikasi', 'public');
        }

        $publikasi->update($data);
        return redirect()->route('publikasi.index')->with('success', 'Data publikasi berhasil diperbarui!');
    }

    // Menghapus data dari database
    public function destroy(Publikasi $publikasi)
    {
        // Hapus file fisik dari storage
        if ($publikasi->file_dokumen) {
            Storage::disk('public')->delete($publikasi->file_dokumen);
        }
        
        $publikasi->delete();
        return redirect()->route('publikasi.index')->with('success', 'Data publikasi berhasil dihapus!');
    }
}