<?php
namespace App\Http\Controllers;

use App\Models\Profil;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProfilController extends Controller
{
    public function index()
    {
        // Ambil data profil pertama. Jika kosong, buat data default.
        $profil = Profil::first();
        if (!$profil) {
            $profil = Profil::create([
                'nama' => 'Rahmawati Upa',
                'universitas' => 'Universitas Cokroaminoto Palopo',
                'program_studi' => 'Pendidikan Profesi Guru',
                'sinta_id' => '6003275',
                'bidang_keahlian' => 'English Education',
                'deskripsi' => 'Saya adalah tenaga pendidik di Universitas Cokroaminoto Palopo...'
            ]);
        }
        return view('admin.profil.index', compact('profil'));
    }

    public function update(Request $request)
    {
        $profil = Profil::first();
        $data = $request->except(['_token', '_method']);

        // Logika upload foto profil
        if ($request->hasFile('foto_profil')) {
            if ($profil->foto_profil) {
                Storage::disk('public')->delete($profil->foto_profil);
            }
            $data['foto_profil'] = $request->file('foto_profil')->store('foto_dosen', 'public');
        }

        $profil->update($data);
        return back()->with('success', 'Data profil berhasil diperbarui!');
    }
}