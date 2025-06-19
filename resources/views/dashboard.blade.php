<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Landing Page - EventHub</title>
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
            <div class="flex items-center gap-4 mb-8 p-4 bg-gradient-to-r from-blue-600 to-indigo-600 rounded-2xl shadow-lg">
                <div class="w-12 h-12 bg-white/20 backdrop-blur-sm rounded-xl flex items-center justify-center">
                    <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                    </svg>
                </div>
                <div>
                    <h2 class="text-2xl font-bold text-white">EventHub</h2>
                    <p class="text-blue-100 text-sm font-medium">Discover Events</p>
                </div>
            </div>

            <!-- Navigation Menu -->
            <nav class="space-y-2">
                <a href="#" class="flex items-center gap-3 px-4 py-3 text-gray-700 hover:text-blue-600 hover:bg-blue-50 rounded-xl transition-all duration-200 group">
                    <svg class="w-5 h-5 group-hover:text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2H5a2 2 0 00-2-2z"/>
                    </svg>
                    <span class="font-medium">Browse Events</span>
                </a>
            </nav>
        </div>
        <!-- Bottom Section: Login -->
        <div class="pt-6 ">
            <div class="mb-4 p-4 bg-gradient-to-r from-blue-50 to-indigo-50 rounded-xl border border-blue-100">
                <div class="flex items-center gap-3 mb-2">
                    <div class="w-8 h-8 bg-blue-500 rounded-full flex items-center justify-center animate-pulse-glow">
                        <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                        </svg>
                    </div>
                    <span class="text-sm font-semibold text-blue-800">Ready to Join?</span>
                </div>
                <p class="text-xs text-blue-600 mb-3">Login to unlock all features and start registering for events!</p>
            </div>

            <a href="{{ route('login') }}"
                class="group w-full flex items-center justify-center gap-2 bg-gradient-to-r from-blue-600 to-indigo-600 hover:from-blue-700 hover:to-indigo-700 text-white px-4 py-3 rounded-xl transition-all duration-200 font-semibold shadow-lg hover:shadow-xl transform hover:scale-[1.02]">
                <svg class="w-5 h-5 group-hover:rotate-12 transition-transform" fill="none" stroke="currentColor"
                    viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1" />
                </svg>
                Login to Continue
            </a>
        </div>
    </aside>

    <!-- Main Content -->
    <div class="ml-72 flex-1 flex flex-col bg-white/50 backdrop-blur-sm">
        <!-- Mobile Header -->
        <header class="bg-white/80 backdrop-blur-md border-b border-gray-200 px-6 py-4 flex justify-between items-center md:hidden shadow-lg">
            <div class="flex items-center gap-3">
                <div class="w-8 h-8 bg-gradient-to-br from-blue-500 to-indigo-600 rounded-lg flex items-center justify-center">
                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                    </svg>
                </div>
                <h1 class="text-xl font-bold text-gray-800">EventHub</h1>
            </div>
            <a href="{{ route('login') }}" class="bg-gradient-to-r from-blue-600 to-indigo-600 text-white px-4 py-2 rounded-lg hover:from-blue-700 hover:to-indigo-700 transition-all duration-200 font-medium shadow-md">
                Login
            </a>
        </header>

        <!-- Content -->
        <main class="flex-1 p-6 md:p-10 space-y-8">
            <!-- Welcome Section -->
            <div class="relative bg-gradient-to-br from-blue-600 via-indigo-600 to-purple-700 rounded-3xl p-8 md:p-12 shadow-2xl overflow-hidden animate-fade-in">
                <!-- Background Pattern -->
                <div class="absolute inset-0 bg-white/10 backdrop-blur-3xl"></div>
                <div class="absolute top-0 right-0 w-64 h-64 bg-white/5 rounded-full transform translate-x-20 -translate-y-20"></div>
                <div class="absolute bottom-0 left-0 w-48 h-48 bg-white/5 rounded-full transform -translate-x-16 translate-y-16"></div>
                
                <div class="relative z-10">
                    <div class="flex items-center gap-4 mb-6">
                        <div class="w-16 h-16 bg-white/20 backdrop-blur-sm rounded-2xl flex items-center justify-center animate-bounce-gentle">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707"/>
                            </svg>
                        </div>
                        <div>
                            <h2 class="text-4xl md:text-5xl font-bold text-white mb-2">Selamat Datang!</h2>
                            <p class="text-blue-100 text-lg md:text-xl font-medium">di EventHub Community</p>
                        </div>
                    </div>
                    <p class="text-white/90 text-lg leading-relaxed max-w-2xl mb-6">
                        Temukan pengalaman luar biasa melalui event-event eksklusif yang telah kami kurasi khusus untuk komunitas kami. 
                        Login untuk bergabung dan wujudkan momen berharga bersama para profesional terbaik.
                    </p>
                </div>
            </div>

            <!-- Search and Filter Section -->
            <div class="bg-white rounded-2xl p-6 shadow-lg border border-gray-100 animate-slide-in">
                <div class="flex flex-col md:flex-row gap-4 items-center justify-between">
                    <div class="relative flex-1 max-w-md">
                        <svg class="absolute left-3 top-1/2 transform -translate-y-1/2 w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                        </svg>
                        <input type="text" placeholder="Cari event yang menarik..." class="w-full pl-10 pr-4 py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all" readonly>
                    </div>
                    <div class="flex gap-3">
                        <select class="px-4 py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent bg-white" disabled>
                            <option>Semua Kategori</option>
                            <option>Technology</option>
                            <option>Business</option>
                            <option>Design</option>
                        </select>
                        <button class="px-6 py-3 bg-gray-300 text-gray-500 rounded-xl cursor-not-allowed font-medium" disabled>
                            Filter
                        </button>
                    </div>
                </div>
                <div class="mt-4 p-3 bg-blue-50 rounded-lg border border-blue-200">
                    <p class="text-sm text-blue-700 flex items-center gap-2">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                        Login untuk menggunakan fitur pencarian dan filter
                    </p>
                </div>
            </div>

            <!-- Event Cards Section -->
            <div class="space-y-6">
                <div class="flex items-center justify-between">
                    <h3 class="text-2xl font-bold text-gray-900">Event Terpopuler</h3>
                    <span class="text-sm text-gray-500 bg-gray-100 px-3 py-1 rounded-full">24 Events Available</span>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6 animate-fade-in-up">
                    @foreach ($events as $event)
                        <div class="group bg-white border border-gray-100 rounded-2xl overflow-hidden shadow-lg hover:shadow-2xl transition-all duration-300 transform hover:scale-[1.02] hover:-translate-y-1 relative">
                            @php
                                $posterPath = $event->poster_event ? asset('storage/' . ltrim($event->poster_event, '/')) : null;
                                $isPdf = $posterPath && \Illuminate\Support\Str::endsWith(strtolower($event->poster_event), '.pdf');
                                $isImage = $posterPath && \Illuminate\Support\Str::endsWith(strtolower($event->poster_event), ['.jpg', '.jpeg', '.png']);
                            @endphp

                            <!-- Login Required Overlay -->
                            <div class="absolute inset-0 bg-black/60 backdrop-blur-sm z-10 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-all duration-300 rounded-2xl">
                                <div class="text-center p-6">
                                    <div class="w-12 h-12 bg-white/20 backdrop-blur-sm rounded-full flex items-center justify-center mx-auto mb-3">
                                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                                        </svg>
                                    </div>
                                    <p class="text-white font-semibold mb-2">Login Required</p>
                                    <p class="text-white/80 text-sm mb-4">Login untuk melihat detail dan mendaftar event</p>
                                    <a href="{{ route('login') }}" class="inline-flex items-center gap-2 bg-white text-gray-900 px-4 py-2 rounded-lg font-medium hover:bg-gray-100 transition-all">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"/>
                                        </svg>
                                        Login
                                    </a>
                                </div>
                            </div>

                            <!-- Event Image -->
                            <div class="relative overflow-hidden h-48 bg-gradient-to-br from-blue-100 to-indigo-100">
                                @if ($isImage)
                                    <img src="{{ $posterPath }}" alt="Poster Event" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                                @elseif ($isPdf)
                                    <iframe src="{{ $posterPath }}#toolbar=0" class="w-full h-full" frameborder="0"></iframe>
                                @else
                                    <div class="w-full h-full flex items-center justify-center bg-gradient-to-br from-blue-500 to-indigo-600">
                                        <svg class="w-16 h-16 text-white/60" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                        </svg>
                                    </div>
                                @endif
                            </div>

                            <!-- Event Content -->
                            <div class="p-6 space-y-4">
                                <div>
                                    <h3 class="text-lg font-bold text-gray-900 mb-2 line-clamp-2 group-hover:text-blue-600 transition-colors">
                                        {{ $event->nama_event }}
                                    </h3>
                                    
                                    <!-- Event Details -->
                                    <div class="space-y-2 text-sm text-gray-600">
                                        <div class="flex items-center gap-2">
                                            <svg class="w-4 h-4 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                            </svg>
                                            <span class="font-medium">{{ \Carbon\Carbon::parse($event->tanggal_mulai)->format('d M Y') }}</span>
                                        </div>
                                        <div class="flex items-center gap-2">
                                            <svg class="w-4 h-4 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                            </svg>
                                            <span class="font-medium">{{ \Carbon\Carbon::parse($event->tanggal_selesai)->format('d M Y') }}</span>
                                        </div>
                                    </div>
                                </div>

                                <!-- Quota Info -->
                                <div class="flex items-center justify-between p-3 bg-gray-50 rounded-xl">
                                    <div class="flex items-center gap-2">
                                        <svg class="w-4 h-4 text-orange-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0z"/>
                                        </svg>
                                        <span class="text-sm font-medium text-gray-700">{{ $event->kuota }} spots</span>
                                    </div>
                                    <div class="flex items-center gap-1">
                                        <div class="w-2 h-2 bg-green-400 rounded-full animate-pulse"></div>
                                        <span class="text-xs text-green-600 font-medium">Available</span>
                                    </div>
                                </div>

                                <!-- Action Buttons -->
                                <div class="flex gap-3 pt-2">
                                    <button class="flex-1 text-center bg-gray-100 text-gray-400 px-4 py-2.5 rounded-xl text-sm font-medium cursor-not-allowed" disabled>
                                        Detail
                                    </button>
                                    <a href="{{ route('login') }}" class="flex-1 text-center bg-gradient-to-r from-blue-500 to-indigo-600 hover:from-blue-600 hover:to-indigo-700 text-white px-4 py-2.5 rounded-xl text-sm font-medium transition-all duration-200 shadow-md hover:shadow-lg transform hover:scale-[1.02]">
                                        Login to Register
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
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
                confirmButtonColor: '#3B82F6',
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
                box-shadow: 0 0 0 0 rgba(59, 130, 246, 0.4);
            }
            50% { 
                box-shadow: 0 0 0 10px rgba(59, 130, 246, 0);
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
            background: linear-gradient(45deg, #3B82F6, #6366F1);
            border-radius: 10px;
        }
        
        ::-webkit-scrollbar-thumb:hover {
            background: linear-gradient(45deg, #2563EB, #4F46E5);
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