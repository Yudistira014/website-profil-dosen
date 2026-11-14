@extends('layouts.app')
@section('title', 'Manajemen Publikasi')

@section('content')
<!-- Wrapper Flex untuk Layout Sidebar & Konten -->
<div class="flex h-screen bg-slate-50 font-sans overflow-hidden">

    <!-- Sidebar Kiri -->
    <aside class="w-64 bg-[#0f172a] text-white flex flex-col shadow-xl z-10">
        <div class="p-6 mt-4">
            <h3 class="text-xs font-bold text-gray-400 tracking-widest uppercase mb-4">Menu Utama</h3>
            <nav class="space-y-2">
                <!-- Menu Data Publikasi -->
                <a href="{{ route('publikasi.index') }}" 
                   class="flex items-center gap-3 px-4 py-3 rounded-lg transition {{ request()->routeIs('publikasi.*') ? 'bg-[#11683E] text-white shadow' : 'text-gray-400 hover:text-white hover:bg-slate-800' }}">
                    <i class="fas fa-book"></i>
                    <span class="font-medium">Data Publikasi</span>
                </a>
                
                <!-- Menu Profil -->
                <a href="{{ route('profil.index') }}" 
                   class="flex items-center gap-3 px-4 py-3 rounded-lg transition {{ request()->routeIs('profil.*') ? 'bg-[#11683E] text-white shadow' : 'text-gray-400 hover:text-white hover:bg-slate-800' }}">
                    <i class="far fa-user"></i>
                    <span class="font-medium">Profil</span>
                </a>
            </nav>
        </div>
    </aside>

    <!-- Konten Utama Kanan -->
    <main class="flex-1 p-10 overflow-y-auto">
        
        <!-- Header Konten -->
        <div class="flex justify-between items-center mb-10">
            <div>
                <h1 class="text-3xl font-extrabold text-gray-900">Manajemen Data Publikasi</h1>
                <p class="text-gray-500 mt-2 text-sm">Kelola data penelitian dan artikel.</p>
            </div>
            <a href="{{ route('publikasi.create') }}" class="bg-[#11683E] hover:bg-green-800 text-white font-semibold py-3 px-6 rounded-lg shadow-md flex items-center gap-2 transition">
                <i class="fas fa-plus-circle"></i> Tambah Data
            </a>
        </div>

        <!-- Alert Notifikasi -->
        @if(session('success'))
            <div class="bg-green-50 border-l-4 border-[#11683E] text-green-800 p-4 mb-8 rounded shadow-sm flex items-center gap-3">
                <i class="fas fa-check-circle text-[#11683E]"></i> {{ session('success') }}
            </div>
        @endif

        <!-- Tabel Card -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="border-b border-gray-100 text-gray-500 text-sm">
                        <th class="py-5 px-6 font-medium w-16 text-center">No</th>
                        <th class="py-5 px-6 font-medium">Judul Publikasi</th>
                        <th class="py-5 px-6 font-medium text-center">Tahun</th>
                        <th class="py-5 px-6 font-medium">Penerbit / Jurnal</th>
                        <!-- Kolom Dokumen tetap dipertahankan -->
                        <th class="py-5 px-6 font-medium text-center">Dokumen</th>
                        <th class="py-5 px-6 font-medium text-center w-32">Aksi</th>
                    </tr>
                </thead>
                <tbody class="text-sm">
                    @forelse($publikasis as $index => $item)
                    <tr class="border-b border-gray-50 hover:bg-slate-50 transition duration-150">
                        <td class="py-5 px-6 text-center text-gray-400">{{ $index + 1 }}</td>
                        <td class="py-5 px-6 font-medium text-gray-800 w-1/3 leading-relaxed">{{ $item->judul }}</td>
                        
                        <!-- Tahun dengan gaya Badge/Pill -->
                        <td class="py-5 px-6 text-center">
                            <span class="bg-slate-100 text-slate-700 py-1.5 px-3 rounded-md font-medium text-xs">{{ $item->tahun }}</span>
                        </td>
                        
                        <td class="py-5 px-6 text-gray-600">{{ $item->penerbit }}</td>
                        
                        <td class="py-5 px-6 text-center">
                            @if($item->file_dokumen)
                                <a href="{{ asset('storage/' . $item->file_dokumen) }}" target="_blank" class="text-teal-600 hover:text-teal-800" title="Lihat Dokumen">
                                    <i class="fas fa-file-pdf text-lg"></i>
                                </a>
                            @else
                                <span class="text-gray-300">-</span>
                            @endif
                        </td>

                        <!-- Tombol Aksi Icon Only -->
                        <td class="py-5 px-6 flex justify-center gap-3">
                            <a href="{{ route('publikasi.edit', $item->id) }}" class="bg-blue-50 text-blue-500 hover:bg-blue-100 p-2.5 rounded-md transition" title="Edit">
                                <i class="fas fa-pen text-xs"></i>
                            </a>
                            <!-- Form Hapus Data -->
                            <form action="{{ route('publikasi.destroy', $item->id) }}" method="POST" class="inline-block">
                                @csrf
                                @method('DELETE')
                                <!-- TAMBAHKAN class 'btn-hapus' agar terdeteksi oleh SweetAlert -->
                                <button type="button" class="btn-hapus w-8 h-8 rounded bg-red-50 text-red-500 hover:bg-red-500 hover:text-white transition flex items-center justify-center border border-red-100 hover:border-red-500 shadow-sm" title="Hapus Data">
                                    <i class="fas fa-trash-alt"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="p-10 text-center text-gray-400 flex-col items-center justify-center">
                            <i class="fas fa-folder-open text-4xl mb-3 opacity-20"></i>
                            <p>Belum ada data publikasi.</p>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </main>
</div>
@endsection