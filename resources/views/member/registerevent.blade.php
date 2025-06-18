<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Event Registration Form with White Theme</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-20px); }
        }
        .float-animation { animation: float 6s ease-in-out infinite; }
        .float-delay-1 { animation-delay: -2s; }
        .float-delay-2 { animation-delay: -4s; }
        
        @keyframes pulse-soft {
            0%, 100% { opacity: 0.4; }
            50% { opacity: 0.6; }
        }
        .pulse-soft { animation: pulse-soft 4s ease-in-out infinite; }
        
        .form-input:focus {
            transform: scale(1.01);
            transition: all 0.3s ease;
        }
    </style>
</head>
<body class="min-h-screen bg-white flex items-center justify-center p-4 font-sans relative overflow-hidden">
    
    <!-- Animated Background Elements -->
    <div class="absolute inset-0 overflow-hidden pointer-events-none">
        <div class="absolute top-20 left-20 w-64 h-64 bg-blue-50 rounded-full blur-3xl float-animation pulse-soft"></div>
        <div class="absolute top-40 right-20 w-80 h-80 bg-purple-50 rounded-full blur-3xl float-animation float-delay-1 pulse-soft"></div>
        <div class="absolute bottom-20 left-1/3 w-72 h-72 bg-indigo-50 rounded-full blur-3xl float-animation float-delay-2 pulse-soft"></div>
    </div>

    <!-- Success Notification (Hidden by default) -->
    <div id="successNotification" class="fixed top-4 right-4 bg-green-50 border border-green-200 text-green-800 px-6 py-4 rounded-xl shadow-lg z-50 flex items-center gap-3 hidden">
        <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
        </svg>
        <span class="font-medium">Registrasi berhasil dikirim!</span>
    </div>

    <!-- Main Container -->
    <div class="relative w-full max-w-3xl z-10">
        
        <!-- Registration Card -->
        <div class="bg-white rounded-3xl p-8 shadow-2xl border border-gray-100">
            
            <!-- Event Information Header -->
            <div class="text-center mb-8 pb-6 border-b border-gray-100">
                <h2 class="text-3xl font-bold text-gray-800 mb-4">{{ $event->nama_event }}</h2>

                
                <p class="text-gray-600 text-sm leading-relaxed">
                    Daftarkan diri Anda untuk mengikuti event eksklusif ini<br>
                    <span class="text-xs text-gray-500">Lengkapi formulir di bawah untuk menyelesaikan registrasi</span>
                </p>
            </div>

            <!-- Registration Form -->
            <form id="registrationForm" method="POST" action="{{ route('member.register.submit', $event->id_event) }}">
             @csrf
                <!-- Form Grid -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Nama Lengkap -->
                    <div class="md:col-span-2">
                        <label for="nama_lengkap" class="block text-sm font-medium text-gray-700 mb-2">
                            Nama Lengkap
                        </label>
                        <div class="relative group">
                            <input id="nama_lengkap" type="text" name="nama_lengkap" required
                                class="form-input w-full px-4 py-3.5 bg-gray-50 border border-gray-200 rounded-xl text-gray-800 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent focus:bg-white transition-all duration-300 group-hover:border-gray-300"
                                placeholder="Masukkan nama lengkap Anda">
                            <div class="absolute inset-y-0 right-0 flex items-center pr-4">
                                <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                </svg>
                            </div>
                        </div>
                    </div>

                    <!-- Email -->
                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700 mb-2">
                            Email Address
                        </label>
                        <div class="relative group">
                            <input id="email" type="email" name="email" required
                                class="form-input w-full px-4 py-3.5 bg-gray-50 border border-gray-200 rounded-xl text-gray-800 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent focus:bg-white transition-all duration-300 group-hover:border-gray-300"
                                placeholder="nama@email.com">
                            <div class="absolute inset-y-0 right-0 flex items-center pr-4">
                                <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207"></path>
                                </svg>
                            </div>
                        </div>
                    </div>

                    <!-- Nomor Telepon -->
                    <div>
                        <label for="nomor_telepon" class="block text-sm font-medium text-gray-700 mb-2">
                            Nomor Telepon
                        </label>
                        <div class="relative group">
                            <input id="nomor_telepon" type="text" name="nomor_telepon" required
                                class="form-input w-full px-4 py-3.5 bg-gray-50 border border-gray-200 rounded-xl text-gray-800 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent focus:bg-white transition-all duration-300 group-hover:border-gray-300"
                                placeholder="08xxxxxxxxxx">
                            <div class="absolute inset-y-0 right-0 flex items-center pr-4">
                                <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                                </svg>
                            </div>
                        </div>
                    </div>

                    <!-- Instansi -->
                    <div>
                        <label for="instansi" class="block text-sm font-medium text-gray-700 mb-2">
                            Instansi
                        </label>
                        <div class="relative group">
                            <input id="instansi" type="text" name="instansi" required
                                class="form-input w-full px-4 py-3.5 bg-gray-50 border border-gray-200 rounded-xl text-gray-800 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent focus:bg-white transition-all duration-300 group-hover:border-gray-300"
                                placeholder="Nama perusahaan/instansi">
                            <div class="absolute inset-y-0 right-0 flex items-center pr-4">
                                <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                                </svg>
                            </div>
                        </div>
                    </div>

                    <!-- Pekerjaan -->
                    <div>
                        <label for="pekerjaan" class="block text-sm font-medium text-gray-700 mb-2">
                            Pekerjaan
                        </label>
                        <div class="relative group">
                            <input id="pekerjaan" type="text" name="pekerjaan" required
                                class="form-input w-full px-4 py-3.5 bg-gray-50 border border-gray-200 rounded-xl text-gray-800 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent focus:bg-white transition-all duration-300 group-hover:border-gray-300"
                                placeholder="Posisi/jabatan Anda">
                            <div class="absolute inset-y-0 right-0 flex items-center pr-4">
                                <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2-2v2m8 0H8m8 0v2a2 2 0 01-2 2H10a2 2 0 01-2-2V6m8 0H8"></path>
                                </svg>
                            </div>
                        </div>
                    </div>

                    <!-- Alamat -->
                    <div class="md:col-span-2">
                        <label for="alamat" class="block text-sm font-medium text-gray-700 mb-2">
                            Alamat Lengkap
                        </label>
                        <div class="relative group">
                            <textarea id="alamat" name="alamat" rows="3" required
                                class="form-input w-full px-4 py-3.5 bg-gray-50 border border-gray-200 rounded-xl text-gray-800 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent focus:bg-white transition-all duration-300 resize-none group-hover:border-gray-300"
                                placeholder="Masukkan alamat lengkap Anda"></textarea>
                            <div class="absolute top-4 right-4">
                                <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Submit Button -->
                <div class="pt-4">
                    <button type="submit" id="submitBtn"
                        class="w-full py-4 px-6 bg-gradient-to-r from-blue-600 via-purple-600 to-indigo-600 text-white font-semibold rounded-xl shadow-lg hover:from-blue-700 hover:via-purple-700 hover:to-indigo-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 focus:ring-offset-white transform hover:scale-[1.02] transition-all duration-300 active:scale-[0.98] disabled:opacity-50 disabled:cursor-not-allowed disabled:transform-none">
                        <span id="submitText" class="flex items-center justify-center gap-2">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            Kirim Registrasi
                        </span>
                        <span id="loadingText" class="hidden items-center justify-center gap-2">
                            <div class="w-5 h-5 border-2 border-white border-t-transparent rounded-full animate-spin"></div>
                            Mengirim...
                        </span>
                    </button>
                </div>
            </form>

            <!-- Additional Info -->
            <div class="mt-8 pt-6 border-t border-gray-100 text-center">
                <p class="text-xs text-gray-500 leading-relaxed">
                    Dengan mendaftar, Anda menyetujui syarat dan ketentuan event ini.<br>
                    Konfirmasi registrasi akan dikirim melalui email yang Anda berikan.
                </p>
            </div>
        </div>
    </div>

    <!-- JavaScript -->
    <script>
        // Form submission handling
        document.getElementById('registrationForm').addEventListener('submit', function(e) {
            
            // Get form data
            const formData = new FormData(this);
            const data = Object.fromEntries(formData);
            
            // Validate required fields
            const requiredFields = this.querySelectorAll('[required]');
            let isValid = true;
            
            requiredFields.forEach(field => {
                if (!field.value.trim()) {
                    field.classList.add('border-red-400', 'bg-red-50');
                    isValid = false;
                } else {
                    field.classList.remove('border-red-400', 'bg-red-50');
                }
            });
            
            if (!isValid) {
                Swal.fire({
                    icon: 'warning',
                    title: 'Perhatian!',
                    text: 'Mohon lengkapi semua field yang diperlukan.',
                    confirmButtonColor: '#3b82f6',
                    confirmButtonText: 'OK',
                    background: 'rgba(255, 255, 255, 0.95)',
                    backdrop: 'rgba(0, 0, 0, 0.8)'
                });
                return;
            }

            // Show loading state
            const submitBtn = document.getElementById('submitBtn');
            const submitText = document.getElementById('submitText');
            const loadingText = document.getElementById('loadingText');
            
            submitBtn.disabled = true;
            submitText.classList.add('hidden');
            loadingText.classList.remove('hidden');
            loadingText.classList.add('flex');

            // Simulate form submission
            setTimeout(() => {
                // Reset button state
                submitBtn.disabled = false;
                submitText.classList.remove('hidden');
                loadingText.classList.add('hidden');
                loadingText.classList.remove('flex');

                // Show success notification
                const notification = document.getElementById('successNotification');
                notification.classList.remove('hidden');
                
                // Reset form
                this.reset();
                
                // Hide notification after 5 seconds
                setTimeout(() => {
                    notification.classList.add('hidden');
                }, 5000);

                // Show success alert
                Swal.fire({
                    icon: 'success',
                    title: 'Berhasil!',
                    text: 'Registrasi Anda telah berhasil dikirim. Konfirmasi akan dikirim melalui email.',
                    confirmButtonColor: '#10b981',
                    confirmButtonText: 'OK',
                    background: 'rgba(255, 255, 255, 0.95)',
                    backdrop: 'rgba(0, 0, 0, 0.8)'
                });
            }, 1500);
        });

        // Add focus animations
        document.querySelectorAll('.form-input').forEach(input => {
            input.addEventListener('focus', function() {
                this.parentElement.classList.add('scale-[1.01]');
            });
            
            input.addEventListener('blur', function() {
                this.parentElement.classList.remove('scale-[1.01]');
            });
        });

        // Real-time validation feedback
        document.querySelectorAll('[required]').forEach(field => {
            field.addEventListener('input', function() {
                if (this.value.trim()) {
                    this.classList.remove('border-red-400', 'bg-red-50');
                    this.classList.add('border-green-300', 'bg-green-50');
                } else {
                    this.classList.remove('border-green-300', 'bg-green-50');
                }
            });
        });
    </script>
</body>
</html>