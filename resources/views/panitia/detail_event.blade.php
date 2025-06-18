<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/lucide@latest/dist/umd/lucide.js"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap');
        body { font-family: 'Inter', sans-serif; }
    </style>
</head>
<body class="min-h-screen bg-gray-50 font-sans">
    <div class="max-w-6xl mx-auto py-8 px-4">
        <!-- Back Button -->
        <a href="{{ route('panitia.event.index') }}"
        class="inline-flex items-center gap-2 mb-8 px-4 py-2 bg-white hover:bg-gray-50 text-gray-700 rounded-lg shadow-sm border border-gray-200 transition-colors duration-200 font-medium">
            <i data-lucide="arrow-left" class="w-4 h-4"></i>
            Kembali ke Daftar Event
        </a>
        <!-- Event Title -->
        <h1 class="text-4xl font-bold text-gray-900 mb-8">
            {{ $event->nama_event }}
        </h1>

        <!-- Event Information Card -->
        <div class="bg-gradient-to-br from-blue-500 to-blue-700 rounded-2xl p-8 mb-8 text-white shadow-lg">
            <div class="flex items-center gap-3 mb-6">
                <div class="flex gap-1">
                    <div class="w-3 h-3 bg-white rounded-full"></div>
                    <div class="w-3 h-3 bg-white/60 rounded-full"></div>
                    <div class="w-3 h-3 bg-white/30 rounded-full"></div>
                </div>
            </div>
            
            <h2 class="text-2xl font-bold mb-2">Informasi Event</h2>
            <p class="text-blue-100 mb-8">Detail lengkap tentang event ini</p>

            <div class="grid md:grid-cols-2 gap-6">
                <!-- Start Date -->
                <div class="bg-white/10 backdrop-blur-sm rounded-xl p-6">
                    <div class="flex items-center gap-3 mb-3">
                        <div class="w-10 h-10 bg-green-500 rounded-lg flex items-center justify-center">
                            <i data-lucide="calendar" class="w-5 h-5 text-white"></i>
                        </div>
                        <div>
                            <h3 class="font-semibold text-lg">Tanggal Mulai</h3>
                            <p class="text-blue-100 text-sm">19 Jun 2025 00:00</p>
                        </div>
                    </div>
                </div>

                <!-- End Date -->
                <div class="bg-white/10 backdrop-blur-sm rounded-xl p-6">
                    <div class="flex items-center gap-3 mb-3">
                        <div class="w-10 h-10 bg-red-500 rounded-lg flex items-center justify-center">
                            <i data-lucide="calendar" class="w-5 h-5 text-white"></i>
                        </div>
                        <div>
                            <h3 class="font-semibold text-lg">Tanggal Selesai</h3>
                            <p class="text-blue-100 text-sm">20 Jun 2025 00:00</p>
                        </div>
                    </div>
                </div>

                <!-- Description -->
                <div class="bg-white/10 backdrop-blur-sm rounded-xl p-6 md:col-span-2">
                    <div class="flex items-center gap-3 mb-3">
                        <div class="w-10 h-10 bg-blue-600 rounded-lg flex items-center justify-center">
                            <i data-lucide="info" class="w-5 h-5 text-white"></i>
                        </div>
                        <div>
                            <h3 class="font-semibold text-lg">Keterangan</h3>
                            <p class="text-blue-100 text-sm">Mantap</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Sessions Section -->
        <div class="bg-white rounded-2xl shadow-lg overflow-hidden">
            <!-- Section Header -->
            <div class="bg-gray-800 text-white p-6">
                <div class="flex items-center justify-between">
                    <div>
                        <h2 class="text-2xl font-bold mb-2">Daftar Sesi</h2>
                        <p class="text-gray-300">Kelola semua sesi dalam event ini</p>
                    </div>
                    <button class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-lg font-medium transition-colors duration-200 flex items-center gap-2 shadow-lg">
                        <a href="{{ route('panitia.sesi.create', ['id_event' => $event->id_event]) }}">
                        Tambah Sesi
                        </a>
                    </button>
                </div>
            </div>

            <!-- Sessions List -->
            <div class="p-6">
                <!-- Session Item -->
               @foreach ($event->sesi as $index => $sesi)
            <div class="bg-gray-50 rounded-xl p-6 border border-gray-200 hover:shadow-md transition-shadow duration-200 mb-6">
                <div class="flex items-start justify-between mb-4">
                    <div class="flex items-center gap-4">
                        <div class="w-12 h-12 bg-blue-600 rounded-lg flex items-center justify-center text-white font-bold text-lg">
                            {{ $index + 1 }}
                        </div>
                        <div>
                            <h3 class="text-xl font-bold text-gray-900 mb-1">
                                {{ $sesi->nama_sesi }}
                            </h3>
                        </div>
                    </div>
                    <div class="flex gap-2">
                        <form action="{{ route('panitia.sesi.destroy', $sesi->id_sesi) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus sesi ini?')">
                            @csrf
                            @method('DELETE')
                            <button class="bg-red-100 hover:bg-red-200 text-red-700 px-4 py-2 rounded-lg font-medium transition-colors duration-200 flex items-center gap-2">
                                <i data-lucide="trash-2" class="w-4 h-4"></i>
                                Hapus
                            </button>
                        </form>
                    </div>
                </div>

                <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-4 mb-4">
                    <!-- Date and Time -->
                    <div class="flex items-center gap-3">
                        <i data-lucide="clock" class="w-5 h-5 text-gray-500"></i>
                        <div>
                            <p class="text-sm font-medium text-gray-900">
                                {{ \Carbon\Carbon::parse($sesi->tanggal_sesi)->format('d M Y') }}
                            </p>
                            <p class="text-sm text-gray-600">
                                {{ \Carbon\Carbon::parse($sesi->waktu_mulai)->format('H:i') }} - 
                                {{ \Carbon\Carbon::parse($sesi->waktu_selesai)->format('H:i') }} WIB
                            </p>
                        </div>
                    </div>

                    <!-- Location -->
                    <div class="flex items-center gap-3">
                        <i data-lucide="map-pin" class="w-5 h-5 text-gray-500"></i>
                        <div>
                            <p class="text-sm font-medium text-gray-900">Lokasi</p>
                            <p class="text-sm text-gray-600">{{ $sesi->lokasi_sesi }}</p>
                        </div>
                    </div>

                    <!-- Speaker -->
                    <div class="flex items-center gap-3">
                        <i data-lucide="user" class="w-5 h-5 text-gray-500"></i>
                        <div>
                            <p class="text-sm font-medium text-gray-900">Narasumber</p>
                            <p class="text-sm text-gray-600">{{ $sesi->narasumber_sesi }}</p>
                        </div>
                    </div>

                    <!-- Quota and Price -->
                    <div class="flex items-center gap-3">
                        <i data-lucide="users" class="w-5 h-5 text-gray-500"></i>
                        <div>
                            <p class="text-sm font-medium text-gray-900 flex items-center gap-2">
                                <span class="bg-green-100 text-green-800 px-2 py-1 rounded-full text-xs font-medium">
                                    {{ $sesi->kuota_sesi }} orang
                                </span>
                            </p>
                            <p class="text-sm font-semibold text-blue-600">
                                Rp{{ number_format($sesi->harga_sesi, 0, ',', '.') }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            </div>
        </div>
    </div>

    <script>
        // Initialize Lucide icons
        lucide.createIcons();
    </script>
</body>
</html>