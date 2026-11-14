<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Profil Dosen UNCP')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
</head>
<body class="bg-gray-50 text-gray-800 font-sans flex flex-col min-h-screen">
    
   <!-- Navbar (Hanya tampil jika bukan di halaman admin) -->
    @if(!request()->is('admin*'))
    <nav id="navbar" class="bg-white/90 backdrop-blur-md text-teal-900 shadow-sm sticky top-0 z-50 transition-all duration-300">
        <div class="container mx-auto px-6 py-4 flex justify-between items-center relative">
            
            <!-- Logo (Kiri) -->
            <a href="{{ route('home') }}" class="text-xl font-bold tracking-wider flex items-center text-teal-800 z-10">
                <i class="fas fa-graduation-cap mr-2"></i>UNCP Akademik
            </a>
            
            <!-- Menu Navigasi Desktop -->
            <div class="hidden md:flex space-x-8 items-center absolute left-1/2 transform -translate-x-1/2 w-full justify-center">
                <a href="#beranda" class="hover:text-teal-600 transition font-medium">Beranda</a>
                <a href="#tentang" class="hover:text-teal-600 transition font-medium">Tentang Saya</a>
                <a href="#informasi" class="hover:text-teal-600 transition font-medium">Informasi Akademik</a>
            </div>
            
        </div> 
    </nav>    
    @endif

    <!-- Konten Utama -->
    <main class="flex-grow">
        @yield('content')
    </main>

    <!-- Footer (Hanya tampil jika bukan di halaman admin) -->
    @if(!request()->is('admin*'))
    <footer id="kontak" class="bg-gray-800 text-white text-center py-6 mt-12">
        <p>&copy; {{ date('Y') }} Universitas Cokroaminoto Palopo. All rights reserved.</p>
    </footer>
    @endif

    <style>
        /* efek scroll smooth */
        html {
            scroll-behavior: smooth !important;
        }
    </style>

    @if(session('success'))
        <div id="toast-success" class="fixed top-8 right-8 z-[100] flex items-center p-4 mb-4 w-full max-w-sm bg-white rounded-xl shadow-2xl border-l-4 border-teal-500 transform transition-all duration-500 translate-x-full opacity-0" role="alert">
            
            <!-- Ikon Sukses -->
            <div class="inline-flex items-center justify-center shrink-0 w-10 h-10 text-teal-600 bg-teal-50 rounded-lg">
                <i class="fas fa-check-circle text-xl"></i>
            </div>
            
            <!-- Pesan Notifikasi -->
            <div class="ml-4 mr-2 text-sm font-semibold text-slate-700 flex-1">
                {{ session('success') }}
            </div>
            
            <!-- Tombol Tutup (x)-->
            <button type="button" onclick="closeToast()" class="ml-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex items-center justify-center h-8 w-8 transition duration-200">
                <i class="fas fa-times"></i>
            </button>
        </div>

        <!-- Script Animasi Toast -->
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                const toast = document.getElementById('toast-success');
                if (toast) {
                    setTimeout(() => {
                        toast.classList.remove('translate-x-full', 'opacity-0');
                    }, 100); 

                    setTimeout(() => {
                        closeToast();
                    }, 4000); 
                }
            });          
            function closeToast() {
                const toast = document.getElementById('toast-success');
                if (toast) {
                    toast.classList.add('translate-x-full', 'opacity-0'); 
                    setTimeout(() => { toast.remove(); }, 500); 
                }
            }
        </script>
        @endif

        <!-- Script SweetAlert2 -->
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

        <!-- Animasi Konfirmasi Hapus -->
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                const deleteButtons = document.querySelectorAll('.btn-hapus');
                
                deleteButtons.forEach(button => {
                    button.addEventListener('click', function (e) {
                        e.preventDefault(); // Mencegah form langsung terkirim
                        
                        const form = this.closest('form'); 
                        
                        Swal.fire({
                            title: 'Apakah Anda Yakin?',
                            text: "Data publikasi ini akan dihapus secara permanen dan tidak dapat dikembalikan!",
                            icon: 'warning',
                            showCancelButton: true,
                            confirmButtonColor: '#0f766e', 
                            cancelButtonColor: '#ef4444', 
                            confirmButtonText: '<i class="fas fa-check mr-2"></i> Ya, Hapus!',
                            cancelButtonText: '<i class="fas fa-times mr-2"></i> Batal',
                            background: '#ffffff',
                            customClass: {
                                popup: 'rounded-2xl shadow-xl border border-gray-100'
                            }
                        }).then((result) => {
                            if (result.isConfirmed) {
                                form.submit();
                            }
                        });
                    });
                });
            });
        </script>
</body>
</html>