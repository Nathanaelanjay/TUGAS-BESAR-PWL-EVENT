<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard Admin - EventHub</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        'inter': ['Inter', 'sans-serif'],
                    },
                    animation: {
                        'fade-in': 'fadeIn 0.6s ease-out forwards',
                        'fade-in-up': 'fadeInUp 0.8s ease-out forwards',
                        'slide-in': 'slideIn 0.7s ease-out forwards',
                        'bounce-gentle': 'bounceGentle 2s infinite',
                        'pulse-glow': 'pulseGlow 2s infinite',
                    }
                }
            }
        }
    </script>
</head>
<body class="flex bg-gradient-to-br from-slate-50 to-slate-100 text-gray-900 min-h-screen overflow-x-hidden font-inter">

    <!-- Sidebar -->
    <aside class="fixed top-0 left-0 h-screen w-72 bg-gradient-to-b from-white to-gray-50 border-r border-gray-200 p-6 flex flex-col justify-between hidden md:flex shadow-xl backdrop-blur-sm z-50">
        <div>
            <!-- Logo Section -->
            <div class="flex items-center gap-4 mb-8 p-4 bg-gradient-to-r from-purple-600 to-indigo-600 rounded-2xl shadow-lg">
                <div class="w-12 h-12 bg-white/20 backdrop-blur-sm rounded-xl flex items-center justify-center">
                    <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                    </svg>
                </div>
                <div>
                    <h2 class="text-2xl font-bold text-white">EventHub</h2>
                    <p class="text-purple-100 text-sm font-medium">Panitia Portal</p>
                </div>
            </div>

            <!-- Navigation Menu -->
            <nav class="space-y-2">
                <a href="#" class="flex items-center gap-3 px-4 py-3 text-purple-600 bg-purple-50 rounded-xl transition-all duration-200 group">
                    <svg class="w-5 h-5 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2H5a2 2 0 00-2-2z"/>
                    </svg>
                    <span class="font-medium">Dashboard</span>
                </a>
                <a href="{{ route('admin.register') }}" class="flex items-center gap-3 px-4 py-3 text-purple-600 bg-purple-50 rounded-xl transition-all duration-200 group">
                    <svg class="w-5 h-5 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A9 9 0 0112 15a9 9 0 016.879 2.804M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                    </svg>
                    <span class="font-medium">Register</span>
                </a>

            </nav>
        </div>

        <!-- User Profile & Logout -->
        <div class="pt-6">
            <div class="flex items-center gap-3 mb-4 p-3 bg-gray-50 rounded-xl">
                <div class="w-10 h-10 bg-gradient-to-br from-purple-500 to-indigo-600 rounded-full flex items-center justify-center">
                    <span class="text-white font-semibold text-sm">PA</span>
                </div>
                <div class="flex-1 min-w-0">
                    <p class="text-sm font-semibold text-gray-900 truncate">{{ Auth::user()->nama }}</p>
                    <p class="text-xs text-gray-500 truncate">{{ Auth::user()->email }}</p>
                </div>
            </div>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="group w-full flex items-center justify-center gap-2 bg-gradient-to-r from-red-500 to-red-600 hover:from-red-600 hover:to-red-700 text-white px-4 py-3 rounded-xl transition-all duration-200 font-semibold shadow-lg hover:shadow-xl transform hover:scale-[1.02]">
                    <svg class="w-5 h-5 group-hover:rotate-12 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/>
                    </svg>
                    Logout
                </button>
            </form>
        </div>
    </aside>

    <!-- Main Content -->
    <div class="ml-72 flex-1 flex flex-col bg-white/50 backdrop-blur-sm">
        <!-- Mobile Header -->
        <header class="bg-white/80 backdrop-blur-md border-b border-gray-200 px-6 py-4 flex justify-between items-center md:hidden shadow-lg">
            <div class="flex items-center gap-3">
                <div class="w-8 h-8 bg-gradient-to-br from-purple-500 to-indigo-600 rounded-lg flex items-center justify-center">
                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                    </svg>
                </div>
                <h1 class="text-xl font-bold text-gray-800">EventHub Panitia</h1>
            </div>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="bg-gradient-to-r from-red-500 to-red-600 text-white px-4 py-2 rounded-lg hover:from-red-600 hover:to-red-700 transition-all duration-200 font-medium shadow-md">
                    Logout
                </button>
            </form>
        </header>

        <!-- Content -->
        <main class="flex-1 p-6 md:p-10 space-y-8">
            <!-- Welcome Section -->
            <div class="relative bg-gradient-to-br from-purple-600 via-indigo-600 to-blue-700 rounded-3xl p-8 md:p-12 shadow-2xl overflow-hidden animate-fade-in">
                <!-- Background Pattern -->
                <div class="absolute inset-0 bg-white/10 backdrop-blur-3xl"></div>
                <div class="absolute top-0 right-0 w-64 h-64 bg-white/5 rounded-full transform translate-x-20 -translate-y-20"></div>
                <div class="absolute bottom-0 left-0 w-48 h-48 bg-white/5 rounded-full transform -translate-x-16 translate-y-16"></div>
                
                <div class="relative z-10">
                    <div class="flex items-center gap-4 mb-6">
                        <div class="w-16 h-16 bg-white/20 backdrop-blur-sm rounded-2xl flex items-center justify-center animate-bounce-gentle">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                            </svg>
                        </div>
                        <div>
                            <h2 class="text-4xl md:text-5xl font-bold text-white mb-2">Dashboard Panitia</h2>
                            <p class="text-purple-100 text-lg md:text-xl font-medium">Kelola Event dengan Mudah</p>
                        </div>
                    </div>
                    <p class="text-white/90 text-lg leading-relaxed max-w-2xl mb-6">
                        Selamat datang di dashboard Admin EventHub. Tempat anda dapat mengelola event, peserta, dan presensi dengan mudah. Gunakan menu di samping untuk navigasi.
                    </p>
                </div>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-8">
            <!-- Panitia -->
            <div class="bg-white p-6 rounded-xl shadow text-center">
                <h3 class="text-sm text-gray-500">Total Panitia</h3>
                <p class="text-3xl font-bold text-purple-600">{{ $jumlahPanitia }}</p>
            </div>

            <!-- Member -->
            <div class="bg-white p-6 rounded-xl shadow text-center">
                <h3 class="text-sm text-gray-500">Total Member</h3>
                <p class="text-3xl font-bold text-blue-600">{{ $jumlahMember }}</p>
            </div>

            <!-- Tim Keuangan -->
            <div class="bg-white p-6 rounded-xl shadow text-center">
                <h3 class="text-sm text-gray-500">Total Tim Keuangan</h3>
                <p class="text-3xl font-bold text-green-600">{{ $jumlahTimKeuangan }}</p>
            </div>
        </div>
        </main>
    <!-- SweetAlert -->
    @if(session('success'))
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            Swal.fire({
                icon: 'success',
                title: 'Berhasil!',
                text: '{{ session('success') }}',
                confirmButtonColor: '#8B5CF6',
                confirmButtonText: 'OK',
                showClass: {
                    popup: 'animate__animated animate__fadeInUp animate__faster'
                }
            });
        });
    </script>
    @endif

    <!-- Enhanced Animations and Styles -->
    <style>
        @keyframes fadeIn {
            from { 
                opacity: 0; 
                transform: translateY(20px); 
            }
            to { 
                opacity: 1; 
                transform: translateY(0); 
            }
        }
        
        @keyframes fadeInUp {
            from { 
                opacity: 0; 
                transform: translateY(30px); 
            }
            to { 
                opacity: 1; 
                transform: translateY(0); 
            }
        }
        
        @keyframes slideIn {
            from { 
                opacity: 0; 
                transform: translateX(-30px); 
            }
            to { 
                opacity: 1; 
                transform: translateX(0); 
            }
        }
        
        @keyframes bounceGentle {
            0%, 100% { 
                transform: translateY(0); 
            }
            50% { 
                transform: translateY(-10px); 
            }
        }
        
        @keyframes pulseGlow {
            0%, 100% { 
                box-shadow: 0 0 0 0 rgba(139, 92, 246, 0.4);
            }
            50% { 
                box-shadow: 0 0 0 10px rgba(139, 92, 246, 0);
            }
        }
        
        .animate-fade-in {
            animation: fadeIn 0.6s ease-out forwards;
        }
        
        .animate-fade-in-up {
            animation: fadeInUp 0.8s ease-out forwards;
        }
        
        .animate-slide-in {
            animation: slideIn 0.7s ease-out forwards;
        }
        
        .animate-bounce-gentle {
            animation: bounceGentle 2s infinite;
        }
        
        .animate-pulse-glow {
            animation: pulseGlow 2s infinite;
        }
        
        /* Custom scrollbar */
        ::-webkit-scrollbar {
            width: 6px;
        }
        
        ::-webkit-scrollbar-track {
            background: #f1f5f9;
        }
        
        ::-webkit-scrollbar-thumb {
            background: linear-gradient(45deg, #8B5CF6, #6366F1);
            border-radius: 10px;
        }
        
        ::-webkit-scrollbar-thumb:hover {
            background: linear-gradient(45deg, #7C3AED, #4F46E5);
        }
        
        /* Line clamp utility */
        .line-clamp-2 {
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        /* Enhanced glass effect */
        .backdrop-blur-3xl {
            backdrop-filter: blur(64px);
        }
        
        /* Smooth transitions for all interactive elements */
        * {
            transition-property: color, background-color, border-color, text-decoration-color, fill, stroke, opacity, box-shadow, transform, filter, backdrop-filter;
            transition-timing-function: cubic-bezier(0.4, 0, 0.2, 1);
            transition-duration: 200ms;
        }
    </style>
</body>
</html>