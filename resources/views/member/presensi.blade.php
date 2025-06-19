<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Presensi Saya</title>
    <script src="https://unpkg.com/lucide@latest/dist/umd/lucide.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        .gradient-bg {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }
        .card-hover {
            transition: all 0.3s ease;
        }
        .card-hover:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(0,0,0,0.1);
        }
    </style>
</head>
<body class="bg-gray-50 min-h-screen">

    <!-- Header dengan gradient -->
    <div class="gradient-bg text-white">
        <div class="container mx-auto px-4 py-12">
            <div class="text-center">
                <div class="flex items-center justify-center mb-4">
                    <i data-lucide="calendar-check" class="w-8 h-8 mr-3"></i>
                    <h1 class="text-3xl font-bold">My Registered Events</h1>
                </div>
                <p class="text-white/80 text-lg">Kelola dan pantau event yang telah Anda daftarkan</p>
            </div>
        </div>
    </div>

    <div class="container mx-auto px-4  relative z-10">
        <div class="mt-4 mb-8">
            <a href="{{ route('member.dashboard') }}"
            class="inline-flex items-center px-4 py-2 bg-purple-500 hover:bg-purple-600 text-white text-sm font-semibold rounded-lg shadow-md transition duration-200">
                <i data-lucide="arrow-left" class="w-4 h-4 mr-2"></i>
                Kembali ke Dashboard
            </a>
        </div>
        <!-- Card container -->
        <div class="bg-white rounded-xl shadow-lg overflow-hidden">
            <!-- Header card -->
            <div class="bg-gradient-to-r from-purple-500 to-indigo-500 text-white p-6">
                <div class="flex items-center justify-between">
                    <div class="flex items-center">
                        <i data-lucide="list" class="w-6 h-6 mr-3"></i>
                        <h2 class="text-xl font-bold">Daftar Event Terdaftar</h2>
                    </div>
                    <div class="bg-white/20 px-3 py-1 rounded-full">
                        <span class="text-sm font-semibold">{{ count($presensiList) }} Event</span>
                    </div>
                </div>
            </div>

            <!-- Table Header -->
            <div class="bg-gray-50 px-6 py-4 border-b border-gray-200">
                <div class="grid grid-cols-12 gap-4 text-xs font-bold text-gray-600 uppercase">
                    <div class="col-span-1 text-left">#</div>
                    <div class="col-span-4">
                        <div class="flex items-center">
                            <i data-lucide="calendar" class="w-4 h-4 mr-1"></i>
                            Nama Event
                        </div>
                    </div>
                    <div class="col-span-3">
                        <div class="flex items-center">
                            <i data-lucide="clock" class="w-4 h-4 mr-1"></i>
                            Tanggal
                        </div>
                    </div>
                    <div class="col-span-2 text-center">
                        <div class="flex items-center justify-center">
                            <i data-lucide="shield-check" class="w-4 h-4 mr-1"></i>
                            Keterangan
                        </div>
                    </div>
                    <div class="col-span-2 text-center">
                        <div class="flex items-center justify-center">
                            <i data-lucide="settings" class="w-4 h-4 mr-1"></i>
                            Sertifikat
                        </div>
                    </div>
                </div>
            </div>

            <!-- Event List -->
            @forelse($presensiList as $index => $presensi)
                <div class="px-6 py-4 border-b border-gray-100 hover:bg-gray-50 transition-all duration-200">
                    <div class="grid grid-cols-12 gap-4 items-center">
                        <!-- Nomor -->
                        <div class="col-span-1 text-left">
                            <div class="w-8 h-8 bg-purple-500 text-white rounded-full flex items-center justify-center text-sm font-bold">
                                {{ $index + 1 }}
                            </div>
                        </div>

                        <!-- Nama Event -->
                        <div class="col-span-4">
                            <div class="flex items-center">
                                <div class="bg-purple-100 p-2 rounded-lg mr-3">
                                    <i data-lucide="calendar-days" class="w-4 h-4 text-purple-600"></i>
                                </div>
                                <div>
                                    <h3 class="font-semibold text-gray-800 text-sm">{{ $presensi->nama_event }}</h3>
                                </div>
                            </div>
                        </div>

                        <!-- Tanggal -->
                        <div class="col-span-3">
                            <div class="flex items-center text-purple-600">
                                <i data-lucide="calendar" class="w-4 h-4 mr-2"></i>
                                <span class="text-sm font-medium">
                                    {{ \Carbon\Carbon::parse($presensi->waktu_hadir)->format('d M Y - H:i') }}
                                </span>
                            </div>
                        </div>

                        <!-- Status/Keterangan -->
                        <div class="col-span-2 text-center">
                            <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                <i data-lucide="check-circle" class="w-3 h-3 mr-1"></i>
                                Hadir
                            </span>
                        </div>

                        <!-- Aksi -->
                        <div class="col-span-2">
                            <div class="flex items-center justify-center space-x-2">
                                @if($presensi->sertifikat_path)
                                    <a href="{{ asset('storage/' . $presensi->sertifikat_path) }}" target="_blank"
                                       class="inline-flex items-center px-3 py-1 bg-blue-500 hover:bg-blue-600 text-white text-xs font-medium rounded-md transition duration-200">
                                        <i data-lucide="download" class="w-3 h-3 mr-1"></i>
                                        Download
                                    </a>
                                @else
                                    <span class="inline-flex items-center px-3 py-1 bg-gray-100 text-gray-500 text-xs font-medium rounded-md">
                                        <i data-lucide="clock" class="w-3 h-3 mr-1"></i>
                                        Pending
                                    </span>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="px-6 py-12 text-center">
                    <div class="flex flex-col items-center">
                        <div class="bg-gray-100 p-4 rounded-full mb-4">
                            <i data-lucide="calendar-x" class="w-8 h-8 text-gray-400"></i>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-600 mb-2">Belum Ada Data Presensi</h3>
                        <p class="text-gray-500">Anda belum memiliki riwayat kehadiran pada event apapun.</p>
                    </div>
                </div>
            @endforelse

            <!-- Footer Info -->
            @if(count($presensiList) > 0)
                <div class="bg-gray-50 px-6 py-4 flex items-center justify-between text-sm">
                    <div class="flex items-center text-blue-600">
                        <i data-lucide="info" class="w-4 h-4 mr-2"></i>
                        <span>Total {{ count($presensiList) }} event terdaftar</span>
                    </div>
                    <div class="flex items-center text-green-600">
                        <i data-lucide="shield-check" class="w-4 h-4 mr-2"></i>
                        <span>Data terenkrips dan aman</span>
                    </div>
                </div>
            @endif
        </div>
    </div>

    <script>
        lucide.createIcons();
        
        // Add smooth animations
        document.addEventListener('DOMContentLoaded', function() {
            const rows = document.querySelectorAll('[class*="hover:bg-gray-50"]');
            rows.forEach(row => {
                row.addEventListener('mouseenter', function() {
                    this.style.transform = 'translateX(4px)';
                });
                row.addEventListener('mouseleave', function() {
                    this.style.transform = 'translateX(0)';
                });
            });
        });
    </script>
</body>
</html>