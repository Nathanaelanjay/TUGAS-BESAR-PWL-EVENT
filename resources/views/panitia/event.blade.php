<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Event</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                        </svg>
                    </div>
                </div>
                
                <!-- Title -->
                <div class="relative z-10">
                    <h1 class="text-3xl font-bold text-white mb-2">Form Kelola Event</h1>
                    <p class="text-purple-100 text-lg">Buat event yang menginspirasi dan berkesan</p>
                </div>
            </div>

            <!-- Form Section -->
            <div class="px-8 py-8">
                <form action="{{ route('panitia.event.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6" id="eventForm">
                    @csrf

                    <!-- Event Name -->
                    <div class="space-y-2">
                        <label for="nama_event" class="block text-sm font-semibold text-gray-700 mb-2">
                            Nama Event <span class="text-red-500">*</span>
                        </label>
                        <input 
                            type="text" 
                            id="nama_event"
                            name="nama_event" 
                            placeholder="Masukkan nama event yang menarik"
                            required 
                            class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all duration-200 bg-gray-50 hover:bg-white hover:shadow-sm"
                        >
                    </div>

                    <!-- Poster Event -->
                    <div class="space-y-2">
                        <label for="poster_event" class="block text-sm font-semibold text-gray-700 mb-2">
                            Poster Event <span class="text-gray-500 font-normal">(Opsional)</span>
                        </label>
                        <div class="relative">
                            <input 
                                type="file" 
                                id="poster_event"
                                name="poster_event" 
                                accept="image/*,.pdf"
                                class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all duration-200 bg-gray-50 hover:bg-white hover:shadow-sm file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-medium file:bg-purple-50 file:text-purple-700 hover:file:bg-purple-100"
                                onchange="updateFileName(this)"
                            >
                        </div>
                        <p class="text-xs text-gray-500 mt-1">Format yang didukung: JPG, PNG, PDF (Maks. 5MB)</p>
                    </div>

                    <!-- Date Row -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <!-- Start Date -->
                        <div class="space-y-2">
                            <label for="tanggal_mulai" class="block text-sm font-semibold text-gray-700 mb-2">
                                Tanggal Mulai <span class="text-red-500">*</span>
                            </label>
                            <input 
                                type="date" 
                                id="tanggal_mulai"
                                name="tanggal_mulai" 
                                required 
                                class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all duration-200 bg-gray-50 hover:bg-white hover:shadow-sm"
                            >
                        </div>

                        <!-- End Date -->
                        <div class="space-y-2">
                            <label for="tanggal_selesai" class="block text-sm font-semibold text-gray-700 mb-2">
                                Tanggal Selesai <span class="text-red-500">*</span>
                            </label>
                            <input 
                                type="date" 
                                id="tanggal_selesai"
                                name="tanggal_selesai" 
                                required 
                                class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all duration-200 bg-gray-50 hover:bg-white hover:shadow-sm"
                            >
                        </div>
                    </div>

                    <!-- Event Description -->
                    <div class="space-y-2">
                        <label for="keterangan_event" class="block text-sm font-semibold text-gray-700 mb-2">
                            Keterangan Event <span class="text-red-500">*</span>
                        </label>
                        <textarea 
                            id="keterangan_event"
                            name="keterangan_event" 
                            rows="4" 
                            required
                            placeholder="Deskripsi singkat mengenai event..."
                            class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all duration-200 bg-gray-50 hover:bg-white hover:shadow-sm resize-none"
                        ></textarea>
                        <p class="text-xs text-gray-500 mt-1">Jelaskan tujuan, target peserta, dan highlight utama event</p>
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
                                <span>Simpan Event</span>
                            </span>
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Footer Info -->
        <div class="text-center mt-8">
            <p class="text-gray-500 text-sm">
                Pastikan semua informasi sudah benar sebelum menyimpan event
            </p>
        </div>
    </div>

    <script>
        function updateFileName(input) {
            if (input.files.length > 0) {
                const file = input.files[0];
                const sizeInMB = (file.size / 1024 / 1024).toFixed(2);

                // Success notification
                Swal.fire({
                    icon: 'success',
                    title: 'File berhasil dipilih!',
                    text: `"${file.name}" (${sizeInMB} MB) siap diupload.`,
                    confirmButtonColor: '#7c3aed',
                    timer: 2000,
                    timerProgressBar: true,
                    showConfirmButton: false
                });
            }
        }

        // Add some interactive enhancements
        document.addEventListener('DOMContentLoaded', function() {
            // Auto-focus first input
            const firstInput = document.querySelector('input[name="nama_event"]');
            if (firstInput) {
                firstInput.focus();
            }

            // Add loading state to submit button
            const form = document.querySelector('#eventForm');
            const submitBtn = document.querySelector('button[type="submit"]');
            
            if (form && submitBtn) {
                form.addEventListener('submit', function(e) {
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

            // Add input focus animations
            document.querySelectorAll('input, textarea').forEach(input => {
                input.addEventListener('focus', function() {
                    const label = this.parentElement.querySelector('label');
                    if (label) {
                        label.style.color = '#7c3aed';
                    }
                });
                
                input.addEventListener('blur', function() {
                    const label = this.parentElement.querySelector('label');
                    if (label) {
                        label.style.color = '#374151';
                    }
                });
            });

            // Date validation
            const startDateInput = document.getElementById('tanggal_mulai');
            const endDateInput = document.getElementById('tanggal_selesai');

            if (startDateInput && endDateInput) {
                startDateInput.addEventListener('change', function() {
                    endDateInput.min = this.value;
                    if (endDateInput.value && endDateInput.value < this.value) {
                        endDateInput.value = this.value;
                    }
                });

                endDateInput.addEventListener('change', function() {
                    if (startDateInput.value && this.value < startDateInput.value) {
                        Swal.fire({
                            icon: 'warning',
                            title: 'Tanggal tidak valid',
                            text: 'Tanggal selesai tidak boleh lebih awal dari tanggal mulai.',
                            confirmButtonColor: '#7c3aed'
                        });
                        this.value = startDateInput.value;
                    }
                });
            }
        });
    </script>
</body>
</html>