<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Tim Keuangan - EventHub</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap');
        body { font-family: 'Inter', sans-serif; }
        
        .gradient-bg {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }
        
        .card-hover {
            transition: all 0.3s ease;
        }
        
        .card-hover:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
        }
        
        .sidebar-item {
            transition: all 0.2s ease;
        }
        
        .sidebar-item:hover {
            background-color: rgba(255, 255, 255, 0.1);
            transform: translateX(2px);
        }
    </style>
</head>
<body class="flex bg-gradient-to-br from-slate-50 to-slate-100 text-gray-900 min-h-screen overflow-x-hidden font-inter">
        
        <!-- Sidebar -->
        <aside class="fixed top-0 left-0 h-screen w-72 bg-gradient-to-b from-white to-gray-50 border-r border-gray-200 p-6 flex flex-col justify-between hidden md:flex shadow-xl backdrop-blur-sm z-50">
            <div>
                <!-- Logo -->
                <div class="flex items-center space-x-3 mb-8">
                    <div class="w-10 h-10 bg-gradient-to-r from-blue-600 to-purple-600 rounded-lg flex items-center justify-center">
                        <i class="fas fa-calendar-alt text-white text-lg"></i>
                    </div>
                    <div>
                        <h1 class="text-xl font-bold text-gray-800">EventHub</h1>
                        <p class="text-sm text-gray-500">Finance Team</p>
                    </div>
                </div>
                
                <!-- Navigation -->
                <nav class="space-y-2">
                    <a href="#" class="sidebar-item flex items-center space-x-3 px-4 py-3 rounded-lg bg-blue-50 text-blue-700">
                        <i class="fas fa-chart-bar w-5"></i>
                        <span class="font-medium">Dashboard</span>
                    </a>
                    @foreach ($events as $event)
                    <a href="{{ route('timkeuangan.registrasi', $event->id_event) }}"  class="sidebar-item flex items-center space-x-3 px-4 py-3 rounded-lg text-gray-600 hover:text-gray-800">
                        <i class="fas fa-users w-5"></i>
                        <span>Registrations</span>
                    </a>
                    @endforeach
                </nav>
            </div>
            
            <!-- Bottom Section -->
            <div class="pt-6">
                <div class="flex items-center gap-3 mb-4 p-3 bg-gray-50 rounded-xl">
                    <div class="w-10 h-10 bg-gradient-to-br from-blue-500 to-indigo-600 rounded-full flex items-center justify-center">
                        <span class="text-white font-semibold text-sm">JD</span>
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
            <!-- Header -->
            <header class="bg-white shadow-sm border-b">
                <div class="px-8 py-6">
                    <div class="flex items-center justify-between">
                        <div>
                            <h2 class="text-2xl font-bold text-gray-800">Dashboard Tim Keuangan</h2>
                            <p class="text-gray-600 mt-1">Pantau pendaftaran dan pembayaran event dengan mudah</p>
                        </div>
                        <div class="flex items-center space-x-4">
                            <div class="bg-gray-100 rounded-lg px-4 py-2">
                                <span class="text-sm text-gray-600">Last updated: </span>
                                <span class="text-sm font-medium text-gray-800" id="current-time"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
        
            <!-- Hero Section -->
            <div class="bg-gradient-to-r from-indigo-500 to-purple-600 text-white rounded-2xl shadow-lg mt-8 ml-4 mr-4">
                <div class="px-8 py-12">
                    <div class="max-w-4xl">
                        <div class="flex items-center space-x-2 mb-4">
                            <i class="fas fa-sparkles text-yellow-300"></i>
                            <h1 class="text-4xl font-bold">Selamat Datang!</h1>
                        </div>
                        <h2 class="text-xl mb-6 opacity-90">di EventHub Finance Dashboard</h2>
                        <p class="text-lg opacity-80 mb-8 max-w-2xl leading-relaxed">
                            Temukan pengalaman luar biasa melalui event-event eksklusif yang telah kami kurasi khusus untuk komunitas kami. Monitor semua aktivitas keuangan dan pendaftaran dengan mudah.
                        </p>
                    </div>
                </div>
            </div>


            <!-- Search and Filter Section -->
            <div class="px-8 py-6 bg-white border-b">
                <div class="flex flex-col sm:flex-row gap-4 items-center justify-between">
                    <div class="relative flex-1 max-w-md">
                        <i class="fas fa-search absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                        <input type="text" placeholder="Cari event yang menarik..." class="w-full pl-10 pr-4 py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                    </div>
                    <div class="flex items-center space-x-3">
                        <select class="px-4 py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                            <option>Semua Kategori</option>
                            <option>Technology</option>
                            <option>Business</option>
                            <option>Education</option>
                        </select>
                        <button class="px-6 py-3 bg-gray-100 hover:bg-gray-200 text-gray-700 rounded-xl transition font-medium">
                            <i class="fas fa-filter mr-2"></i>
                            Filter
                        </button>
                    </div>
                </div>
            </div>

            <!-- Events Section -->
            <div class="px-8 py-8">
                <!-- Section Header -->
                <div class="flex items-center justify-between mb-8">
                    <div>
                        <h3 class="text-2xl font-bold text-gray-800">Event Terpopuler</h3>
                        <p class="text-gray-600 mt-1">Kelola semua event dan pendaftaran</p>
                    </div>
                    <div class="text-sm text-gray-500">
                        <span id="event-count">24</span> Events Available
                    </div>
                </div>

                <!-- Event Grid -->
                @if($events->count())
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
                    @foreach ($events as $event)
                    <div class="card-hover bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
                        <!-- Event Image Placeholder -->
                        <div class="h-48 bg-gradient-to-br from-blue-400 to-purple-500 relative">
                            <div class="absolute top-4 left-4">
                                <span class="bg-green-500 text-white px-3 py-1 rounded-full text-xs font-semibold">
                                    ACTIVE
                                </span>
                            </div>
                            <div class="absolute top-4 right-4">
                                <button class="w-8 h-8 bg-white bg-opacity-20 backdrop-blur-sm rounded-full flex items-center justify-center">
                                    <i class="fas fa-heart text-white text-sm"></i>
                                </button>
                            </div>
                            <div class="absolute bottom-4 left-4 right-4">
                                <h4 class="text-white font-bold text-lg mb-1">{{ $event->nama_event }}</h4>
                                <div class="flex items-center text-white text-sm opacity-90">
                                    <i class="fas fa-users mr-2"></i>
                                    <span>Technology</span>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Event Details -->
                        <div class="p-6">
                            <div class="space-y-3 mb-6">
                                <div class="flex items-center text-gray-600 text-sm">
                                    <i class="fas fa-calendar text-blue-500 w-5 mr-3"></i>
                                    <span>{{ \Carbon\Carbon::parse($event->tanggal_event)->format('d M Y') }}</span>
                                </div>
                                <div class="flex items-center text-gray-600 text-sm">
                                    <i class="fas fa-clock text-green-500 w-5 mr-3"></i>
                                    <span>{{ \Carbon\Carbon::parse($event->waktu_event)->format('H:i') }}</span>
                                </div>
                                <div class="flex items-center text-gray-600 text-sm">
                                    <i class="fas fa-map-marker-alt text-red-500 w-5 mr-3"></i>
                                    <span>{{ $event->lokasi }}</span>
                                </div>

                            </div>
                            
                            <!-- Action Buttons -->
                            <div class="flex space-x-2">
                                <a href="{{ route('timkeuangan.registrasi', $event->id_event) }}" 
                                   class="flex-1 bg-blue-600 hover:bg-blue-700 text-white px-4 py-3 rounded-xl transition text-center text-sm font-semibold">
                                    <i class="fas fa-users mr-2"></i>
                                    Lihat Pendaftar
                                </a>
                                <button class="w-12 h-12 bg-gray-100 hover:bg-gray-200 text-gray-600 rounded-xl transition">
                                    <i class="fas fa-ellipsis-h"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                @else
                <!-- Empty State -->
                <div class="text-center py-16">
                    <div class="w-24 h-24 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-6">
                        <i class="fas fa-calendar-times text-gray-400 text-3xl"></i>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-800 mb-2">Belum ada event yang tersedia</h3>
                    <p class="text-gray-600 mb-6">Mulai dengan membuat event baru untuk komunitas Anda</p>
                    <button class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-xl transition font-semibold">
                        <i class="fas fa-plus mr-2"></i>
                        Buat Event Baru
                    </button>
                </div>
                @endif
            </div>
        </div>
    </div>

    <script>
        // Update current time
        function updateTime() {
            const now = new Date();
            const timeString = now.toLocaleTimeString('id-ID', { 
                hour: '2-digit', 
                minute: '2-digit',
                second: '2-digit'
            });
            document.getElementById('current-time').textContent = timeString;
        }
        
        updateTime();
        setInterval(updateTime, 1000);
        
        // Update event count (placeholder)
        document.getElementById('event-count').textContent = document.querySelectorAll('.card-hover').length;
    </script>
</body>
</html>