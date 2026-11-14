@extends('layouts.app')
@section('title', 'Profil Dosen - ' . ($profil->nama ?? 'Akademik'))

@section('content')
<!-- Tambahan CSS Animasi -->
<style>
    @keyframes fadeInUp {
        0% { opacity: 0; transform: translateY(30px); }
        100% { opacity: 1; transform: translateY(0); }
    }
    @keyframes zoomIn {
        0% { opacity: 0; transform: scale(0.8); }
        100% { opacity: 1; transform: scale(1); }
    }
    .animate-zoom-in {
        animation: zoomIn 0.8s ease-out forwards;
        opacity: 0;
    }
    .animate-fade-in-up {
        animation: fadeInUp 0.8s ease-out forwards;
        opacity: 0;
    }
    .delay-100 { animation-delay: 0.1s; }
    .delay-200 { animation-delay: 0.2s; }
    .delay-400 { animation-delay: 0.4s; }
    .delay-600 { animation-delay: 0.6s; }
</style>

<!-- 1. Hero Section  -->
<section id="beranda" class="relative bg-slate-900 text-white py-24 px-6 border-b-[6px] border-amber-500 overflow-hidden z-0">
    
    <!-- Efek Cahaya Latar Belakang -->
    <div class="absolute top-0 left-1/2 -translate-x-1/2 w-full max-w-4xl h-full bg-teal-600/20 blur-[120px] -z-10 pointer-events-none animate-zoom-in"></div>
    <div class="absolute bottom-0 right-0 w-96 h-96 bg-amber-500/10 blur-[100px] -z-10 pointer-events-none animate-zoom-in"></div>

    <div class="container mx-auto max-w-5xl flex flex-col items-center justify-center text-center gap-6 relative z-10">
        
        <!-- Foto Profil -->
        <div class="shrink-0 relative inline-block group animate-zoom-in">
            <div class="absolute -inset-1 bg-gradient-to-r from-amber-400 to-teal-400 rounded-full blur opacity-40 group-hover:opacity-75 transition duration-500"></div>
            <img src="{{ $profil && $profil->foto_profil ? asset('storage/' . $profil->foto_profil) : 'https://ui-avatars.com/api/?name='.urlencode($profil->nama ?? 'Dosen').'&size=200&background=0D8B93&color=fff' }}" 
                 alt="Foto Dosen" 
                 class="relative w-48 h-48 md:w-56 md:h-56 rounded-full border-4 border-slate-800 shadow-2xl object-cover mx-auto">
        </div>

        <!-- Teks Informasi Dosen -->
        <div class="w-full mt-4">
            
            <!-- Label Bidang Keahlian  -->
            <span class="inline-block bg-white/5 border border-white/10 backdrop-blur-sm px-5 py-2 rounded-full text-xs font-bold tracking-widest uppercase mb-6 shadow-sm animate-fade-in-up delay-100">
                <span class="text-amber-400 font-medium">Bidang Keahlian Khusus:</span> <span class="text-teal-100">{{ $profil->bidang_keahlian ?? 'Belum Ditambahkan' }}</span>
            </span>
            
            <!-- Nama  -->
            <h1 class="text-3xl md:text-5xl font-extrabold text-transparent bg-clip-text bg-gradient-to-r from-white to-teal-200 mb-10 drop-shadow-sm animate-fade-in-up delay-200">
                {{ $profil->nama ?? 'Nama Dosen' }}
            </h1>
            
           <!-- Grid Info Akademik  -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-5 text-slate-300 mb-12 text-sm md:text-base max-w-5xl mx-auto animate-fade-in-up delay-400 w-full">
                
                <!-- Universitas -->
                <div class="flex items-center gap-4 bg-white/5 hover:bg-white/10 transition px-5 py-4 rounded-2xl border border-white/10 backdrop-blur-md text-left shadow-lg h-full">
                    <div class="bg-teal-500/20 p-3 rounded-xl text-amber-400 shrink-0">
                        <i class="fas fa-university text-xl"></i>
                    </div>
                    <span class="leading-snug font-medium text-white">{{ $profil->universitas ?? 'Universitas Cokroaminoto Palopo' }}</span>
                </div>
                
                <!-- Program Studi -->
                <div class="flex items-center gap-4 bg-white/5 hover:bg-white/10 transition px-5 py-4 rounded-2xl border border-white/10 backdrop-blur-md text-left shadow-lg h-full">
                    <div class="bg-teal-500/20 p-3 rounded-xl text-amber-400 shrink-0">
                        <i class="fas fa-chalkboard-teacher text-xl"></i>
                    </div>
                    <span class="leading-snug font-medium text-white">{{ $profil->program_studi ?? 'Program Studi' }}</span>
                </div>
                
                <!-- SINTA ID -->
                <div class="flex items-center gap-4 bg-white/5 hover:bg-white/10 transition px-5 py-4 rounded-2xl border border-white/10 backdrop-blur-md text-left shadow-lg h-full">
                    <div class="bg-teal-500/20 p-3 rounded-xl text-amber-400 shrink-0">
                        <i class="fas fa-id-badge text-xl"></i>
                    </div>
                    <span class="font-mono leading-snug font-medium text-slate-300">SINTA:<br><span class="text-white">{{ $profil->sinta_id ?? '-' }}</span></span>
                </div>
                
            </div>

            <!-- Tombol Aksi  -->
            <div class="flex justify-center w-full animate-fade-in-up delay-600">
                <a href="#informasi" class="bg-gradient-to-r from-amber-500 to-amber-600 hover:from-amber-400 hover:to-amber-500 text-slate-900 font-extrabold py-3.5 px-10 rounded-xl transition shadow-[0_0_15px_rgba(245,158,11,0.4)] hover:shadow-[0_0_25px_rgba(245,158,11,0.6)] flex items-center gap-3 transform hover:-translate-y-1">
                    <i class="fas fa-book-open"></i> Lihat Publikasi
                </a>
            </div>
            </div>
        </div>
    </div>
</section>

<!-- 2. Tentang Saya & Statistik -->
<section id="tentang" class="py-16 bg-gray-50 px-6">
    <div class="container mx-auto max-w-5xl">
        <div class="flex flex-col md:flex-row items-stretch gap-6">
            
            <!-- Deskripsi Utama & Minat Akademik -->
            <div class="md:w-2/3 bg-white p-8 rounded-2xl border border-gray-200 shadow-sm animate-fade-in-up">
                <h2 class="text-2xl font-bold text-gray-800 mb-2 flex items-center gap-3">
                    <i class="fas fa-user-circle text-teal-700"></i> Tentang Saya
                </h2>
                <div class="w-12 h-1 bg-teal-600 mb-6 rounded-full"></div>
                
                <!-- Poin 1: Profil / Deskripsi Singkat Dosen -->
                <p class="text-gray-600 text-base leading-relaxed text-justify mb-8">
                    {{ $profil->deskripsi ?? 'Deskripsi profil belum ditambahkan. Silakan update melalui dasbor admin.' }}
                </p>

                <!-- Poin 2: Bidang Keahlian / Minat Akademik -->
                <div class="bg-gradient-to-r from-teal-50 to-white border border-teal-100 rounded-xl p-5 shadow-sm">
                    <h3 class="text-sm font-bold text-teal-800 uppercase tracking-widest mb-3 flex items-center gap-2">
                        <i class="fas fa-lightbulb text-amber-500"></i> Bidang Keahlian & Minat Akademik
                    </h3>
                    <div class="flex flex-wrap gap-2">
                        <span class="text-teal-900 font-medium bg-white px-4 py-2 rounded-lg border border-teal-200 inline-block shadow-sm">
                            {{ $profil->bidang_keahlian ?? 'Belum Ditambahkan' }}
                        </span>
                    </div>
                </div>
            </div>

            <!-- Box Statistik Publikasi -->
            <div class="md:w-1/3 flex animate-fade-in-up delay-200">
                <div class="bg-white p-8 rounded-2xl border border-gray-200 shadow-sm w-full flex flex-col justify-center items-center text-center transition hover:shadow-md">
                    <div class="w-16 h-16 bg-teal-50 text-teal-600 rounded-full flex items-center justify-center text-2xl mb-4 shadow-inner">
                        <i class="fas fa-book-reader"></i>
                    </div>
                    <h3 class="text-gray-500 font-semibold mb-1 uppercase tracking-wider text-sm">Total Publikasi</h3>
                    <span class="text-6xl font-black text-slate-800">{{ $publikasis->count() }}</span>
                </div>
            </div>
            
        </div>
    </div>
</section>

<!-- 3. Informasi Akademik -->
<section id="informasi" class="py-16 bg-white px-6">
    <div class="container mx-auto max-w-6xl">
        
        <!-- Judul Bagian (Muncul pertama) -->
        <div class="text-center mb-10 animate-fade-in-up">
            <h2 class="text-3xl font-bold text-gray-900">Informasi Akademik</h2>
            <div class="w-16 h-1 bg-amber-500 mx-auto mt-4 rounded-full"></div>
        </div>
        
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            
         <!-- Pendidikan -->
            <div class="bg-white rounded-lg shadow-sm hover:shadow-lg border border-gray-200 border-t-4 border-t-teal-600 p-6 md:p-8 animate-fade-in-up delay-200 transform hover:-translate-y-1 transition duration-300 h-full">
                <h3 class="text-lg font-bold text-gray-800 mb-8 flex items-center gap-2">
                    <i class="fas fa-graduation-cap text-teal-600"></i> Pendidikan
                </h3>
                
                <!-- Wadah Timeline  -->
                <div class="relative border-l-2 border-teal-300 ml-5 py-2 space-y-8">
                    
                    <!-- Item Pendidikan 1 -->
                    <div class="relative pl-8">
                        <!-- Titik Indikator -->
                        <div class="absolute w-3.5 h-3.5 bg-teal-500 rounded-full -left-[8px] top-1.5 ring-4 ring-white shadow-sm"></div>
                        <h4 class="font-extrabold text-gray-800 text-base leading-tight mb-1.5">S2 Pendidikan Bahasa Inggris</h4>
                        <p class="text-sm text-gray-600 font-medium">Universitas Islam Negeri Palopo</p>
                    </div>
                    
                    <!-- Item Pendidikan 2 -->
                    <div class="relative pl-8">
                        <!-- Titik Indikator  -->
                        <div class="absolute w-3.5 h-3.5 bg-teal-500 rounded-full -left-[8px] top-1.5 ring-4 ring-white shadow-sm"></div>
                        <h4 class="font-extrabold text-gray-800 text-base leading-tight mb-1.5">S1 Pendidikan Bahasa Inggris</h4>
                        <p class="text-sm text-gray-600 font-medium">Universitas Islam Negeri Palopo</p>
                    </div>
                    
                </div>
            </div>

            <!-- Mata Kuliah -->
            <div class="bg-white rounded-lg shadow-sm hover:shadow-lg border border-gray-200 border-t-4 border-t-amber-500 p-6 animate-fade-in-up delay-400 transform hover:-translate-y-1 transition duration-300">
                <h3 class="text-lg font-bold text-gray-800 mb-6 flex items-center gap-2">
                    <i class="fas fa-chalkboard text-amber-500"></i> Mata Kuliah
                </h3>
                <ul class="space-y-3 text-gray-700">
                    <li class="flex items-start gap-3 bg-gray-50 px-3 py-2.5 rounded border border-gray-100 hover:border-amber-200 hover:bg-amber-50/50 transition">
                        <i class="fas fa-check-circle text-amber-500 mt-1 shrink-0"></i>
                        <span class="text-sm font-medium">Metodologi Penelitian Pendidikan</span>
                    </li>
                    <li class="flex items-start gap-3 bg-gray-50 px-3 py-2.5 rounded border border-gray-100 hover:border-amber-200 hover:bg-amber-50/50 transition">
                        <i class="fas fa-check-circle text-amber-500 mt-1 shrink-0"></i>
                        <span class="text-sm font-medium">Critical Reading / Reading Comprehension</span>
                    </li>
                    <li class="flex items-start gap-3 bg-gray-50 px-3 py-2.5 rounded border border-gray-100 hover:border-amber-200 hover:bg-amber-50/50 transition">
                        <i class="fas fa-check-circle text-amber-500 mt-1 shrink-0"></i>
                        <span class="text-sm font-medium">Textbook Analysis & Discourse Analysis</span>
                    </li>
                     <li class="flex items-start gap-3 bg-gray-50 px-3 py-2.5 rounded border border-gray-100 hover:border-amber-200 hover:bg-amber-50/50 transition">
                        <i class="fas fa-check-circle text-amber-500 mt-1 shrink-0"></i>
                        <span class="text-sm font-medium">English for Specific Purposes (ESP) (seperti English for Informatics atau English for Agriculture)</span>
                    </li>
                </ul>
            </div>

            <!-- Daftar Publikasi & PDF -->
            <div class="bg-white rounded-lg shadow-sm hover:shadow-lg border border-gray-200 border-t-4 border-t-teal-600 p-6 animate-fade-in-up delay-600 transform hover:-translate-y-1 transition duration-300">
                <h3 class="text-lg font-bold text-gray-800 mb-4 flex items-center gap-2">
                    <i class="fas fa-file-alt text-teal-600"></i> Daftar Publikasi
                </h3>
                
                @if($publikasis->isEmpty())
                    <div class="text-center py-6 text-gray-400 bg-gray-50 rounded border border-dashed border-gray-200">
                        <i class="fas fa-inbox text-2xl mb-2"></i>
                        <p class="text-sm">Belum ada publikasi.</p>
                    </div>
                @else
                    <div class="space-y-2 max-h-[300px] overflow-y-auto overflow-x-hidden pr-1 custom-scrollbar">
                        @foreach($publikasis as $item)
                        <!-- Card list -->
                        <div class="border border-gray-100 hover:border-teal-200 bg-white hover:bg-teal-50 p-3 rounded transition flex justify-between items-start gap-3">
                            <div class="flex-1 min-w-0"> 
                                <p class="font-semibold text-gray-800 text-sm mb-1 break-words">
                                    {{ $item->judul }}
                                </p>
                                <div class="flex items-center gap-2 text-xs text-gray-500">
                                    <span class="bg-gray-100 text-gray-600 px-1.5 py-0.5 rounded font-medium border border-gray-200 shrink-0">{{ $item->tahun }}</span>
                                    <span class="truncate" title="{{ $item->penerbit }}">{{ $item->penerbit }}</span>
                                </div>
                            </div>
                            
                            @if($item->file_dokumen)
                                <a href="{{ asset('storage/' . $item->file_dokumen) }}" target="_blank" class="shrink-0 flex items-center justify-center gap-1.5 text-red-600 hover:text-white bg-red-50 hover:bg-red-600 px-2 py-1.5 rounded text-xs font-bold border border-red-100 hover:border-red-600 transition shadow-sm" title="Buka Dokumen">
                                    <i class="fas fa-file-pdf"></i> PDF
                                </a>
                            @endif
                        </div>
                        @endforeach
                    </div>
                @endif
            </div>  
        </div>
    </div>
</section>
@endsection