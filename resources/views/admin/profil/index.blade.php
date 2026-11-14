@extends('layouts.app')
@section('title', 'Manajemen Profil')

@section('content')
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
    <main class="flex-1 p-6 md:p-10 overflow-y-auto">
        <div class="max-w-4xl mx-auto">
            
            <!-- Header Halaman -->
            <div class="mb-8">
                <h1 class="text-3xl font-extrabold text-gray-900">Manajemen Profil</h1>
                <p class="text-gray-500 mt-2 text-sm">Sesuaikan informasi identitas, foto, dan deskripsi untuk ditampilkan pada landing page.</p>
            </div>

            <!-- Alert Notifikasi -->
            @if(session('success'))
                <div class="bg-green-50 border-l-4 border-teal-600 text-teal-900 p-4 mb-8 rounded-r-lg shadow-sm flex items-center gap-3">
                    <i class="fas fa-check-circle text-teal-600 text-lg"></i> {{ session('success') }}
                </div>
            @endif

            <!-- Card Form -->
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
                
                <!-- Header Card -->
                <div class="bg-teal-800 px-8 py-5 border-b border-teal-900 flex items-center gap-3">
                    <div class="bg-teal-700/50 p-2 rounded-lg text-teal-300">
                        <i class="fas fa-user-edit"></i>
                    </div>
                    <h2 class="text-xl font-bold text-white">Edit Data Profil</h2>
                </div>
                
                <form action="{{ route('profil.update') }}" method="POST" enctype="multipart/form-data" class="p-8">
                    @csrf
                    @method('PUT')
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                        
                        <!-- Nama Lengkap -->
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Nama Lengkap & Gelar</label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                    <i class="fas fa-user text-gray-400"></i>
                                </div>
                                <input type="text" name="nama" value="{{ $profil->nama }}" required
                                    class="w-full pl-11 pr-4 py-3 bg-gray-50 border border-gray-200 rounded-xl text-gray-800 transition focus:bg-white focus:outline-none focus:ring-2 focus:ring-teal-500/30 focus:border-teal-500">
                            </div>
                        </div>

                        <!-- SINTA ID -->
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">SINTA ID</label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                    <i class="fas fa-id-badge text-gray-400"></i>
                                </div>
                                <input type="text" name="sinta_id" value="{{ $profil->sinta_id }}" required
                                    class="w-full pl-11 pr-4 py-3 bg-gray-50 border border-gray-200 rounded-xl text-gray-800 transition focus:bg-white focus:outline-none focus:ring-2 focus:ring-teal-500/30 focus:border-teal-500">
                            </div>
                        </div>

                        <!-- Universitas -->
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Universitas</label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                    <i class="fas fa-university text-gray-400"></i>
                                </div>
                                <input type="text" name="universitas" value="{{ $profil->universitas }}" required
                                    class="w-full pl-11 pr-4 py-3 bg-gray-50 border border-gray-200 rounded-xl text-gray-800 transition focus:bg-white focus:outline-none focus:ring-2 focus:ring-teal-500/30 focus:border-teal-500">
                            </div>
                        </div>

                        <!-- Program Studi -->
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Program Studi</label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                    <i class="fas fa-chalkboard-teacher text-gray-400"></i>
                                </div>
                                <input type="text" name="program_studi" value="{{ $profil->program_studi }}" required
                                    class="w-full pl-11 pr-4 py-3 bg-gray-50 border border-gray-200 rounded-xl text-gray-800 transition focus:bg-white focus:outline-none focus:ring-2 focus:ring-teal-500/30 focus:border-teal-500">
                            </div>
                        </div>

                        <!-- Bidang Keahlian -->
                        <div class="md:col-span-2">
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Bidang Keahlian</label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                    <i class="fas fa-star text-gray-400"></i>
                                </div>
                                <input type="text" name="bidang_keahlian" value="{{ $profil->bidang_keahlian }}" required
                                    class="w-full pl-11 pr-4 py-3 bg-gray-50 border border-gray-200 rounded-xl text-gray-800 transition focus:bg-white focus:outline-none focus:ring-2 focus:ring-teal-500/30 focus:border-teal-500">
                            </div>
                        </div>

                        <!-- Deskripsi -->
                        <div class="md:col-span-2">
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Deskripsi Tentang Saya</label>
                            <textarea name="deskripsi" rows="4" required
                                class="w-full p-4 bg-gray-50 border border-gray-200 rounded-xl text-gray-800 transition focus:bg-white focus:outline-none focus:ring-2 focus:ring-teal-500/30 focus:border-teal-500">{{ $profil->deskripsi }}</textarea>
                        </div>

                        <!-- Upload Foto -->
                        <div class="md:col-span-2 p-5 rounded-xl border-2 border-dashed border-gray-200 bg-gray-50 flex flex-col md:flex-row gap-6 items-center">
                            
                            <div class="shrink-0 relative">
                                @if($profil->foto_profil)
                                    <img src="{{ asset('storage/' . $profil->foto_profil) }}" alt="Foto Profil" class="w-24 h-24 rounded-full object-cover border-4 border-white shadow-md">
                                @else
                                    <div class="w-24 h-24 rounded-full bg-gray-200 flex items-center justify-center border-4 border-white shadow-md text-gray-400">
                                        <i class="fas fa-user text-3xl"></i>
                                    </div>
                                @endif
                                <div class="absolute -bottom-2 -right-2 bg-teal-600 text-white w-8 h-8 rounded-full border-2 border-white flex items-center justify-center shadow-sm">
                                    <i class="fas fa-camera text-xs"></i>
                                </div>
                            </div>

                            <!-- Input File -->
                            <div class="flex-1 w-full">
                                <label class="block text-sm font-semibold text-gray-700 mb-2">Ubah Foto Profil (Opsional)</label>
                                <input type="file" name="foto_profil" accept="image/*" 
                                    class="block w-full text-sm text-gray-600 
                                    file:mr-4 file:py-2.5 file:px-6 
                                    file:rounded-lg file:border-0 
                                    file:text-sm file:font-bold file:cursor-pointer
                                    file:bg-teal-100 file:text-teal-800 
                                    hover:file:bg-teal-200 file:transition cursor-pointer focus:outline-none">
                                <p class="text-xs text-gray-500 mt-2"><i class="fas fa-info-circle"></i> Format JPG, PNG, atau JPEG.</p>
                            </div>
                        </div>
                    </div>

                    <!-- Tombol Aksi -->
                    <div class="flex justify-end pt-4 border-t border-gray-100">
                        <button type="submit" class="px-8 py-3 bg-teal-700 hover:bg-teal-800 text-white font-bold rounded-xl shadow-md transition flex items-center gap-2">
                            <i class="fas fa-save"></i> Simpan Perubahan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </main>
</div>
@endsection