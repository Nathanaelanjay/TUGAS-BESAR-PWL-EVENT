<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Sesi Event</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: {
                            50: '#f0f4ff',
                            100: '#e0e7ff',
                            500: '#6366f1',
                            600: '#4f46e5',
                            700: '#4338ca',
                        }
                    }
                }
            }
        }
    </script>
</head>
<body class="bg-gray-50 min-h-screen py-8 px-4">
    <div class="max-w-2xl mx-auto">
        <!-- Form Container -->
        <div class="bg-white rounded-2xl shadow-xl overflow-hidden">
            <!-- Header Section -->
            <div class="bg-gradient-to-br from-purple-600 via-purple-500 to-indigo-600 px-8 py-12 text-center relative">
                <!-- Background Pattern -->
                <div class="absolute inset-0 bg-white/10 backdrop-blur-sm"></div>
                <div class="absolute inset-0 bg-gradient-to-br from-purple-600/20 to-transparent"></div>
                
                <!-- Icon -->
                <div class="relative z-10 mb-6">
                    <div class="w-16 h-16 bg-white/20 rounded-full flex items-center justify-center mx-auto backdrop-blur-sm">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                        </svg>
                    </div>
                </div>
                
                <!-- Title -->
                <div class="relative z-10">
                    <h1 class="text-3xl font-bold text-white mb-2">Tambah Sesi Event</h1>
                    <p class="text-purple-100 text-lg">Buat sesi yang menginspirasi dan berkesan</p>
                </div>
            </div>

            <!-- Form Section -->
            <div class="px-8 py-8">
                <form action="{{ route('panitia.sesi.store', $event->id_event) }}" method="POST" class="space-y-6">
                    @csrf

                    <!-- Event Name Display -->
                    <div class="bg-gradient-to-r from-blue-50 to-indigo-50 rounded-xl p-4 border border-blue-100">
                        <p class="text-sm text-blue-600 font-medium mb-1">Event:</p>
                        <p class="text-lg font-semibold text-blue-900">{{ $event->nama_event }}</p>
                    </div>

                    <!-- Session Name -->
                    <div class="space-y-2">
                        <label for="nama_sesi" class="block text-sm font-semibold text-gray-700 mb-2">
                            Nama Sesi <span class="text-red-500">*</span>
                        </label>
                        <input 
                            type="text" 
                            id="nama_sesi"
                            name="nama_sesi" 
                            required 
                            class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all duration-200 bg-gray-50 hover:bg-white hover:shadow-sm"
                        >
                    </div>

                    <!-- Date and Time Row -->
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                        <!-- Session Date -->
                        <div class="space-y-2">
                            <label for="tanggal_sesi" class="block text-sm font-semibold text-gray-700 mb-2">
                                Tanggal Sesi <span class="text-red-500">*</span>
                            </label>
                            <input 
                                type="date" 
                                id="tanggal_sesi"
                                name="tanggal_sesi" 
                                required 
                                class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all duration-200 bg-gray-50 hover:bg-white hover:shadow-sm"
                            >
                        </div>

                        <!-- Start Time -->
                        <div class="space-y-2">
                            <label for="waktu_mulai" class="block text-sm font-semibold text-gray-700 mb-2">
                                Waktu Mulai <span class="text-red-500">*</span>
                            </label>
                            <input 
                                type="time" 
                                id="waktu_mulai"
                                name="waktu_mulai" 
                                required 
                                class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all duration-200 bg-gray-50 hover:bg-white hover:shadow-sm"
                            >
                        </div>

                        <!-- End Time -->
                        <div class="space-y-2">
                            <label for="waktu_selesai" class="block text-sm font-semibold text-gray-700 mb-2">
                                Waktu Selesai <span class="text-red-500">*</span>
                            </label>
                            <input 
                                type="time" 
                                id="waktu_selesai"
                                name="waktu_selesai" 
                                required 
                                class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all duration-200 bg-gray-50 hover:bg-white hover:shadow-sm"
                            >
                        </div>
                    </div>

                    <!-- Location -->
                    <div class="space-y-2">
                        <label for="lokasi_sesi" class="block text-sm font-semibold text-gray-700 mb-2">
                            Lokasi Sesi <span class="text-red-500">*</span>
                        </label>
                        <input 
                            type="text" 
                            id="lokasi_sesi"
                            name="lokasi_sesi" 
                            required 
                            class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all duration-200 bg-gray-50 hover:bg-white hover:shadow-sm"
                        >
                    </div>

                    <!-- Speaker -->
                    <div class="space-y-2">
                        <label for="narasumber_sesi" class="block text-sm font-semibold text-gray-700 mb-2">
                            Narasumber <span class="text-gray-500 font-normal">(Opsional)</span>
                        </label>
                        <input 
                            type="text" 
                            id="narasumber_sesi"
                            name="narasumber_sesi" 
                            class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all duration-200 bg-gray-50 hover:bg-white hover:shadow-sm"
                        >
                    </div>

                    <!-- Quota, Price, and Session Number Row -->
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                        <!-- Quota -->
                        <div class="space-y-2">
                            <label for="kuota_sesi" class="block text-sm font-semibold text-gray-700 mb-2">
                                Kuota Peserta
                            </label>
                            <input 
                                type="number" 
                                id="kuota_sesi"
                                name="kuota_sesi" 
                                min="1"
                                class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all duration-200 bg-gray-50 hover:bg-white hover:shadow-sm"
                            >
                        </div>

                        <!-- Price -->
                        <div class="space-y-2">
                            <label for="harga_sesi" class="block text-sm font-semibold text-gray-700 mb-2">
                                Harga (Rp)
                            </label>
                            <input 
                                type="number" 
                                id="harga_sesi"
                                name="harga_sesi" 
                                step="0.01" 
                                min="0"
                                class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all duration-200 bg-gray-50 hover:bg-white hover:shadow-sm"
                            >
                        </div>

                        <!-- Session Number -->
                        <div class="space-y-2">
                            <label for="sesi" class="block text-sm font-semibold text-gray-700 mb-2">
                                Nomor Sesi
                            </label>
                            <input 
                                type="number" 
                                id="sesi"
                                name="sesi" 
                                min="1"
                                class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all duration-200 bg-gray-50 hover:bg-white hover:shadow-sm"
                            >
                        </div>
                    </div>

                    <!-- Submit Button -->
                    <div class="pt-6">
                        <button 
                            type="submit" 
                            class="w-full bg-gradient-to-r from-purple-600 to-indigo-600 hover:from-purple-700 hover:to-indigo-700 text-white font-bold py-4 px-8 rounded-xl transition-all duration-300 transform hover:scale-[1.02] hover:shadow-lg focus:outline-none focus:ring-4 focus:ring-purple-500/50 active:scale-95"
                        >
                            <span class="flex items-center justify-center space-x-2">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                </svg>
                                <span>Simpan Sesi</span>
                            </span>
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Footer Info -->
        <div class="text-center mt-8">
            <p class="text-gray-500 text-sm">
                Pastikan semua informasi sudah benar sebelum menyimpan sesi
            </p>
        </div>
    </div>

    <script>
        // Add some interactive enhancements
        document.addEventListener('DOMContentLoaded', function() {
            // Auto-focus first input
            const firstInput = document.querySelector('input[name="nama_sesi"]');
            if (firstInput) {
                firstInput.focus();
            }

            // Add loading state to submit button
            const form = document.querySelector('form');
            const submitBtn = document.querySelector('button[type="submit"]');
            
            if (form && submitBtn) {
                form.addEventListener('submit', function() {
                    submitBtn.disabled = true;
                    submitBtn.innerHTML = `
                        <span class="flex items-center justify-center space-x-2">
                            <svg class="animate-spin w-5 h-5" fill="none" viewBox="0 0 24 24">
                                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                            </svg>
                            <span>Menyimpan...</span>
                        </span>
                    `;
                });
            }
        });
    </script>
</body>
</html>