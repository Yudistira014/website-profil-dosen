@extends('layouts.app')
@section('title', 'Tambah Publikasi')

@section('content')
<div class="container mx-auto px-6 py-10 max-w-3xl">
    
    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
        <!-- Header Form -->
        <div class="bg-teal-800 px-8 py-6 border-b border-teal-900">
            <h2 class="text-2xl font-bold text-white flex items-center gap-3">
                <i class="fas fa-file-medical text-teal-300"></i> Tambah Data Publikasi
            </h2>
            <p class="text-teal-100 text-sm mt-1">Lengkapi informasi di bawah ini untuk menambahkan publikasi baru.</p>
        </div>
        
        <form action="{{ route('publikasi.store') }}" method="POST" enctype="multipart/form-data" class="p-8">
            @csrf
            
            <!-- Judul Publikasi -->
            <div class="mb-6">
                <label class="block text-sm font-semibold text-gray-700 mb-2">Judul Artikel / Publikasi <span class="text-red-500">*</span></label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                        <i class="fas fa-heading text-gray-400"></i>
                    </div>
                    <input type="text" name="judul" value="{{ old('judul') }}" placeholder="Contoh: Penerapan Metode Pembelajaran..." 
                        class="w-full pl-11 pr-4 py-3 bg-gray-50 border rounded-xl text-gray-800 transition focus:bg-white focus:outline-none focus:ring-2 focus:ring-teal-500/30 focus:border-teal-500 
                        @error('judul') border-red-400 bg-red-50/50 @else border-gray-200 @enderror">
                </div>
                @error('judul')
                    <p class="text-red-500 text-sm mt-2 flex items-center gap-1.5"><i class="fas fa-exclamation-circle"></i> {{ $message }}</p>
                @enderror
            </div>
            
            <!-- Grid Tahun & Penerbit -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                <!-- Tahun Terbit -->
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Tahun Terbit <span class="text-red-500">*</span></label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                            <i class="fas fa-calendar-alt text-gray-400"></i>
                        </div>
                        <input type="number" name="tahun" value="{{ old('tahun') }}" placeholder="Contoh: {{ date('Y') }}" 
                            class="w-full pl-11 pr-4 py-3 bg-gray-50 border rounded-xl text-gray-800 transition focus:bg-white focus:outline-none focus:ring-2 focus:ring-teal-500/30 focus:border-teal-500 
                            @error('tahun') border-red-400 bg-red-50/50 @else border-gray-200 @enderror">
                    </div>
                    @error('tahun')
                        <p class="text-red-500 text-sm mt-2 flex items-center gap-1.5"><i class="fas fa-exclamation-circle"></i> {{ $message }}</p>
                    @enderror
                </div>

                <!-- Nama Penerbit -->
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Nama Penerbit / Jurnal <span class="text-red-500">*</span></label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                            <i class="fas fa-bookmark text-gray-400"></i>
                        </div>
                        <input type="text" name="penerbit" value="{{ old('penerbit') }}" placeholder="Contoh: Jurnal Pendidikan..." 
                            class="w-full pl-11 pr-4 py-3 bg-gray-50 border rounded-xl text-gray-800 transition focus:bg-white focus:outline-none focus:ring-2 focus:ring-teal-500/30 focus:border-teal-500 
                            @error('penerbit') border-red-400 bg-red-50/50 @else border-gray-200 @enderror">
                    </div>
                    @error('penerbit')
                        <p class="text-red-500 text-sm mt-2 flex items-center gap-1.5"><i class="fas fa-exclamation-circle"></i> {{ $message }}</p>
                    @enderror
                </div>
            </div>

            <!-- Upload File -->
            <div class="mb-8 p-5 rounded-xl border-2 border-dashed bg-gray-50 @error('file_dokumen') border-red-300 bg-red-50/30 @else border-gray-200 @enderror">
                <label class="block text-sm font-semibold text-gray-700 mb-3">Upload Dokumen PDF (Opsional)</label>
                
                <input type="file" name="file_dokumen" accept=".pdf" 
                    class="block w-full text-sm text-gray-600 
                    file:mr-4 file:py-2.5 file:px-6 
                    file:rounded-lg file:border-0 
                    file:text-sm file:font-bold file:cursor-pointer
                    file:bg-teal-100 file:text-teal-800 
                    hover:file:bg-teal-200 file:transition cursor-pointer focus:outline-none">
                
                @error('file_dokumen')
                    <p class="text-red-500 text-sm mt-3 flex items-center gap-1.5"><i class="fas fa-exclamation-circle"></i> {{ $message }}</p>
                @else
                    <p class="text-xs text-gray-500 mt-3 flex items-center gap-1"><i class="fas fa-info-circle"></i> Maksimal ukuran file 2MB.</p>
                @enderror
            </div>

            <!-- Tombol Aksi -->
            <div class="flex items-center justify-end gap-4 pt-4 border-t border-gray-100">
                <a href="{{ route('publikasi.index') }}" class="px-6 py-3 border border-gray-300 rounded-xl text-gray-700 font-medium hover:bg-gray-100 hover:text-gray-900 transition flex items-center gap-2">
                    <i class="fas fa-arrow-left"></i> Kembali
                </a>
                <button type="submit" class="px-8 py-3 bg-teal-700 hover:bg-teal-800 text-white font-bold rounded-xl shadow-md transition flex items-center gap-2">
                    <i class="fas fa-save"></i> Simpan Publikasi
                </button>
            </div>
            
        </form>
    </div>
</div>
@endsection