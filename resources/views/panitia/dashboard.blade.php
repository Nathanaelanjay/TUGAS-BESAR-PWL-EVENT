<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard Panitia - EventHub</title>
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
                        Selamat datang di dashboard panitia EventHub. Kelola dan buat event untuk komunitas dengan tools yang powerful dan mudah digunakan.
                    </p>
                    
                    <!-- Action Buttons -->
                    <div class="flex flex-col sm:flex-row gap-4 mb-8">
                        <a href="{{ route('panitia.events.create') }}" class="inline-flex items-center gap-2 bg-white text-purple-600 px-6 py-3 rounded-xl font-semibold hover:bg-purple-50 transition-all duration-200 shadow-lg hover:shadow-xl transform hover:scale-[1.02] animate-pulse-glow">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                            </svg>
                            Buat Event Baru
                        </a>
                        <button class="inline-flex items-center gap-2 bg-white/20 backdrop-blur-sm text-white px-6 py-3 rounded-xl font-semibold hover:bg-white/30 transition-all duration-200">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/>
                            </svg>
                            Lihat Analytics
                        </button>
                    </div>
                    
                    <div class="flex flex-wrap gap-4">
                        <div class="bg-white/20 backdrop-blur-sm px-4 py-2 rounded-full text-white font-medium">
                            🎯 {{ $events->count() }} Active Events
                        </div>
                        <div class="bg-white/20 backdrop-blur-sm px-4 py-2 rounded-full text-white font-medium">
                            👥 247 Total Registrations
                        </div>
                        <div class="bg-white/20 backdrop-blur-sm px-4 py-2 rounded-full text-white font-medium">
                            📈 +32 This Month
                        </div>
                    </div>
                </div>
            </div>

            <!-- Events Section -->
            <div class="space-y-6">
                <div class="flex items-center justify-between">
                    <h3 class="text-2xl font-bold text-gray-900">Event yang Dikelola</h3>
                    <div class="flex items-center gap-3">
                        <span class="text-sm text-gray-500 bg-gray-100 px-3 py-1 rounded-full">{{ $events->count() }} Events</span>
                        <a href="{{ route('panitia.events.create') }}" class="bg-gradient-to-r from-green-500 to-emerald-600 hover:from-green-600 hover:to-emerald-700 text-white px-4 py-2 rounded-xl text-sm font-medium transition-all duration-200 shadow-md hover:shadow-lg transform hover:scale-[1.02]">
                            + Buat Event
                        </a>
                    </div>
                </div>

                @if ($events->count())
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6 animate-fade-in-up">
                        @foreach ($events as $event)
                            <div class="group bg-white border border-gray-100 rounded-2xl overflow-hidden shadow-lg hover:shadow-2xl transition-all duration-300 transform hover:scale-[1.02] hover:-translate-y-1">
                                @php
                                    $posterPath = $event->poster_event ? asset('storage/' . ltrim($event->poster_event, '/')) : null;
                                    $isPdf = $posterPath && \Illuminate\Support\Str::endsWith(strtolower($event->poster_event), '.pdf');
                                    $isImage = $posterPath && \Illuminate\Support\Str::endsWith(strtolower($event->poster_event), ['.jpg', '.jpeg', '.png']);
                                @endphp

                                <!-- Event Image -->
                                <div class="relative overflow-hidden h-48 bg-gradient-to-br from-purple-100 to-indigo-100">
                                    @if ($isImage)
                                        <img src="{{ $posterPath }}" alt="Poster Event" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                                    @elseif ($isPdf)
                                        <iframe src="{{ $posterPath }}#toolbar=0" class="w-full h-full" frameborder="0"></iframe>
                                    @else
                                        <div class="w-full h-full flex items-center justify-center bg-gradient-to-br from-purple-500 to-indigo-600">
                                            <svg class="w-16 h-16 text-white/60" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                            </svg>
                                        </div>
                                    @endif
                                    
                                    <!-- Price Badge -->
                                    <div class="absolute top-4 right-4 bg-gradient-to-r from-emerald-500 to-green-600 text-white px-3 py-1 rounded-full text-sm font-semibold shadow-lg">
                                        @if($event->biaya == 0)
                                            FREE
                                        @else
                                            Rp{{ number_format($event->biaya, 0, ',', '.') }}
                                        @endif
                                    </div>

                                    <!-- Status Badge -->
                                    <div class="absolute top-4 left-4 bg-white/90 backdrop-blur-sm text-gray-700 px-3 py-1 rounded-full text-xs font-medium">
                                        Active
                                    </div>

                                    <!-- Admin Badge -->
                                    <div class="absolute bottom-4 left-4 bg-purple-500/90 backdrop-blur-sm text-white px-3 py-1 rounded-full text-xs font-medium flex items-center gap-1">
                                        <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                                        </svg>
                                        Managed
                                    </div>
                                </div>

                                <!-- Event Content -->
                                <div class="p-6 space-y-4">
                                    <div>
                                        <h3 class="text-lg font-bold text-gray-900 mb-2 line-clamp-2 group-hover:text-purple-600 transition-colors">
                                            {{ $event->nama_event }}
                                        </h3>
                                        
                                        <!-- Event Details -->
                                        <div class="space-y-2 text-sm text-gray-600">
                                            <div class="flex items-center gap-2">
                                                <svg class="w-4 h-4 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                                </svg>
                                                <span class="font-medium">{{ \Carbon\Carbon::parse($event->tanggal_event)->format('d M Y') }}</span>
                                            </div>
                                            <div class="flex items-center gap-2">
                                                <svg class="w-4 h-4 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                                </svg>
                                                <span>{{ \Carbon\Carbon::parse($event->waktu_event)->format('H:i') }} WIB</span>
                                            </div>
                                            <div class="flex items-center gap-2">
                                                <svg class="w-4 h-4 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                                                </svg>
                                                <span class="truncate">{{ $event->lokasi }}</span>
                                            </div>
                                            <div class="flex items-center gap-2">
                                                <svg class="w-4 h-4 text-purple-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                                                </svg>
                                                <span class="truncate">{{ $event->narasumber }}</span>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Registration Stats -->
                                    <div class="flex items-center justify-between p-3 bg-gray-50 rounded-xl">
                                        <div class="flex items-center gap-2">
                                            <svg class="w-4 h-4 text-orange-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0z"/>
                                            </svg>
                                            <span class="text-sm font-medium text-gray-700">{{ $event->kuota }} spots</span>
                                        </div>
                                        <div class="flex items-center gap-1">
                                            <div class="w-2 h-2 bg-green-400 rounded-full animate-pulse"></div>
                                            <span class="text-xs text-green-600 font-medium">23 registered</span>
                                        </div>
                                    </div>

                                    <!-- Management Actions -->
                                    <div class="flex gap-2 pt-2">
                                        <a href="#" class="flex-1 text-center bg-gray-100 hover:bg-gray-200 text-gray-700 hover:text-gray-900 px-3 py-2.5 rounded-xl text-sm font-medium transition-all duration-200">
                                            Edit
                                        </a>
                                        <a href="#" class="flex-1 text-center bg-blue-100 hover:bg-blue-200 text-blue-700 hover:text-blue-800 px-3 py-2.5 rounded-xl text-sm font-medium transition-all duration-200">
                                            Peserta
                                        </a>
                                        <a href="#" class="flex-1 text-center bg-gradient-to-r from-purple-500 to-indigo-600 hover:from-purple-600 hover:to-indigo-700 text-white px-3 py-2.5 rounded-xl text-sm font-medium transition-all duration-200 shadow-md hover:shadow-lg transform hover:scale-[1.02]">
                                            Detail
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <!-- Empty State -->
                    <div class="text-center py-16 animate-fade-in">
                        <div class="w-24 h-24 bg-gradient-to-br from-purple-100 to-indigo-100 rounded-full flex items-center justify-center mx-auto mb-6">
                            <svg class="w-12 h-12 text-purple-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                            </svg>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-2">Belum Ada Event</h3>
                        <p class="text-gray-600 mb-6 max-w-md mx-auto">
                            Mulai buat event pertama Anda untuk komunitas. Event yang menarik akan meningkatkan engagement dan partisipasi.
                        </p>
                        <a href="{{ route('panitia.events.create') }}" class="inline-flex items-center gap-2 bg-gradient-to-r from-purple-600 to-indigo-600 hover:from-purple-700 hover:to-indigo-700 text-white px-6 py-3 rounded-xl font-semibold transition-all duration-200 shadow-lg hover:shadow-xl transform hover:scale-[1.02]">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                            </svg>
                            Buat Event Pertama
                        </a>
                    </div>
                @endif
            </div>
        </main>
    </div>

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