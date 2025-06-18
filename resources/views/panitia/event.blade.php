<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Beautiful Event Management Form</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: {
                            50: '#f3f1ff',
                            100: '#ebe5ff',
                            200: '#d9ceff',
                            300: '#bea6ff',
                            400: '#9f75ff',
                            500: '#843dff',
                            600: '#7916ff',
                            700: '#6b04fd',
                            800: '#5a03d4',
                            900: '#4c05af',
                        }
                    }
                }
            }
        }
    </script>
    <style>
        .glass-effect {
            backdrop-filter: blur(16px);
            background: rgba(255, 255, 255, 0.95);
        }
        .input-focus {
            transition: all 0.3s ease;
        }
        .input-focus:focus {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(123, 97, 255, 0.15);
        }
        .btn-hover {
            transition: all 0.3s ease;
        }
        .btn-hover:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(123, 97, 255, 0.3);
        }
        .file-upload-area {
            transition: all 0.3s ease;
        }
        .file-upload-area:hover {
            background: rgba(123, 97, 255, 0.05);
        }
    </style>
</head>
<body class="min-h-screen bg-white">
    <div class="flex justify-center items-start min-h-screen pt-8 px-4 py-12">
        <div class="w-full max-w-lg bg-white rounded-2xl shadow-2xl border border-gray-200 overflow-hidden">
            <!-- Header -->
            <div class="bg-gradient-to-r from-primary-500 to-primary-600 px-8 py-6">
                <div class="text-center">
                    <div class="w-16 h-16 bg-white/20 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3a2 2 0 012-2h4a2 2 0 012 2v4m-6 0h6m-6 0l1 5m5-5l-1 5m-2-5v-4"></path>
                        </svg>
                    </div>
                    <h1 class="text-2xl font-bold text-white mb-2">Form Kelola Event</h1>
                    <p class="text-primary-100 text-sm">Buat event yang menginspirasi dan berkesan</p>
                </div>
            </div>

            <!-- Form -->
            <div class="px-8 py-8">
                <form id="eventForm" class="space-y-6">
                    <!-- Nama Event -->
                    <div class="space-y-2">
                        <label for="nama_event" class="block text-sm font-semibold text-gray-700">
                            <span class="flex items-center gap-2">
                                <svg class="w-4 h-4 text-primary-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path>
                                </svg>
                                Nama Event
                            </span>
                        </label>
                        <input type="text" id="nama_event" name="nama_event" required
                            class="w-full px-4 py-3 bg-white border-2 border-gray-200 rounded-xl focus:outline-none focus:border-primary-500 text-gray-800 input-focus"
                            placeholder="Masukkan nama event yang menarik">
                    </div>

                    <!-- Tanggal dan Waktu Event -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div class="space-y-2">
                            <label for="tanggal_event" class="block text-sm font-semibold text-gray-700">
                                <span class="flex items-center gap-2">
                                    <svg class="w-4 h-4 text-primary-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3a2 2 0 012-2h4a2 2 0 012 2v4m-6 0h6m-6 0l1 5m5-5l-1 5"></path>
                                    </svg>
                                    Tanggal Event
                                </span>
                            </label>
                            <input type="date" id="tanggal_event" name="tanggal_event" required
                                class="w-full px-4 py-3 bg-white border-2 border-gray-200 rounded-xl focus:outline-none focus:border-primary-500 text-gray-800 input-focus">
                        </div>
                        
                        <div class="space-y-2">
                            <label for="waktu_event" class="block text-sm font-semibold text-gray-700">
                                <span class="flex items-center gap-2">
                                    <svg class="w-4 h-4 text-primary-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                    Waktu Event
                                </span>
                            </label>
                            <input type="time" id="waktu_event" name="waktu_event" required
                                class="w-full px-4 py-3 bg-white border-2 border-gray-200 rounded-xl focus:outline-none focus:border-primary-500 text-gray-800 input-focus">
                        </div>
                    </div>

                    <!-- Lokasi -->
                    <div class="space-y-2">
                        <label for="lokasi" class="block text-sm font-semibold text-gray-700">
                            <span class="flex items-center gap-2">
                                <svg class="w-4 h-4 text-primary-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                </svg>
                                Lokasi
                            </span>
                        </label>
                        <input type="text" id="lokasi" name="lokasi" required
                            class="w-full px-4 py-3 bg-white border-2 border-gray-200 rounded-xl focus:outline-none focus:border-primary-500 text-gray-800 input-focus"
                            placeholder="Alamat lengkap venue event">
                    </div>

                    <!-- Poster Event -->
                    <div class="space-y-2">
                        <label class="block text-sm font-semibold text-gray-700">
                            <span class="flex items-center gap-2">
                                <svg class="w-4 h-4 text-primary-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                </svg>
                                Poster Event
                                <span class="text-gray-500 font-normal">(opsional)</span>
                            </span>
                        </label>
                        <div class="border-2 border-dashed border-gray-300 rounded-xl p-6 file-upload-area bg-gray-50/50">
                            <div class="text-center">
                                <svg class="mx-auto h-12 w-12 text-gray-400 mb-4" stroke="currentColor" fill="none" viewBox="0 0 48 48">
                                    <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                                
                                <div id="upload-content">
                                    <p class="text-gray-600 mb-2">
                                        <span class="font-medium">Klik untuk upload</span> atau drag and drop
                                    </p>
                                    <p class="text-sm text-gray-500">PNG, JPG, PDF hingga 2MB</p>
                                </div>

                                <div id="file-preview" class="hidden">
                                    <div class="flex items-center justify-center space-x-2">
                                        <svg class="w-8 h-8 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                        </svg>
                                        <div>
                                            <p id="file-name" class="font-medium text-gray-800"></p>
                                            <p id="file-size" class="text-sm text-gray-500"></p>
                                        </div>
                                    </div>
                                </div>

                                <input type="file" id="poster_event" name="poster_event" accept="image/*,.pdf" class="hidden" onchange="updateFileName(this)">
                                
                                <div class="mt-4 flex justify-center space-x-2">
                                    <button type="button" id="upload-btn"
                                        onclick="document.getElementById('poster_event').click()"
                                        class="px-4 py-2 bg-primary-500 text-white rounded-lg hover:bg-primary-600 transition btn-hover">
                                        Pilih File
                                    </button>
                                    <button type="button" id="remove-btn" class="hidden px-4 py-2 bg-red-500 text-white rounded-lg hover:bg-red-600 transition btn-hover">
                                        Hapus File
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Biaya dan Kuota -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div class="space-y-2">
                            <label for="biaya" class="block text-sm font-semibold text-gray-700">
                                <span class="flex items-center gap-2">
                                    <svg class="w-4 h-4 text-primary-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1"></path>
                                    </svg>
                                    Biaya (Rp)
                                </span>
                            </label>
                            <input type="number" id="biaya" name="biaya" required min="0"
                                class="w-full px-4 py-3 bg-white border-2 border-gray-200 rounded-xl focus:outline-none focus:border-primary-500 text-gray-800 input-focus"
                                placeholder="0">
                        </div>

                        <div class="space-y-2">
                            <label for="kuota" class="block text-sm font-semibold text-gray-700">
                                <span class="flex items-center gap-2">
                                    <svg class="w-4 h-4 text-primary-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                                    </svg>
                                    Kuota
                                </span>
                            </label>
                            <input type="number" id="kuota" name="kuota" required min="1"
                                class="w-full px-4 py-3 bg-white border-2 border-gray-200 rounded-xl focus:outline-none focus:border-primary-500 text-gray-800 input-focus"
                                placeholder="Maksimal peserta">
                        </div>
                    </div>

                    <!-- Narasumber -->
                    <div class="space-y-2">
                        <label for="narasumber" class="block text-sm font-semibold text-gray-700">
                            <span class="flex items-center gap-2">
                                <svg class="w-4 h-4 text-primary-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                </svg>
                                Narasumber
                            </span>
                        </label>
                        <input type="text" id="narasumber" name="narasumber" required
                            class="w-full px-4 py-3 bg-white border-2 border-gray-200 rounded-xl focus:outline-none focus:border-primary-500 text-gray-800 input-focus"
                            placeholder="Nama pembicara atau narasumber">
                    </div>

                    <!-- Submit Button -->
                    <div class="pt-4">
                        <button type="submit"
                            class="w-full bg-gradient-to-r from-primary-500 to-primary-600 hover:from-primary-600 hover:to-primary-700 text-white font-semibold py-4 rounded-xl transition duration-300 btn-hover shadow-lg">
                            <span class="flex items-center justify-center gap-2">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                </svg>
                                Simpan Event
                            </span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        function updateFileName(input) {
            const uploadContent = document.getElementById('upload-content');
            const filePreview = document.getElementById('file-preview');
            const fileName = document.getElementById('file-name');
            const fileSize = document.getElementById('file-size');
            const uploadBtn = document.getElementById('upload-btn');
            const removeBtn = document.getElementById('remove-btn');

            if (input.files.length > 0) {
                const file = input.files[0];
                const sizeInMB = (file.size / 1024 / 1024).toFixed(2);

                // Show file preview
                uploadContent.classList.add('hidden');
                filePreview.classList.remove('hidden');
                fileName.textContent = file.name;
                fileSize.textContent = `${sizeInMB} MB`;

                // Update buttons
                uploadBtn.textContent = 'Ganti File';
                removeBtn.classList.remove('hidden');

                // Add remove functionality
                removeBtn.onclick = function() {
                    Swal.fire({
                        title: 'Hapus file?',
                        text: 'File yang dipilih akan dihapus dari form.',
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#ef4444',
                        cancelButtonColor: '#6b7280',
                        confirmButtonText: 'Ya, hapus!',
                        cancelButtonText: 'Batal'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            // Reset file input
                            input.value = '';
                            
                            // Reset UI
                            uploadContent.classList.remove('hidden');
                            filePreview.classList.add('hidden');
                            uploadBtn.textContent = 'Pilih File';
                            removeBtn.classList.add('hidden');
                            
                            Swal.fire({
                                icon: 'success',
                                title: 'File dihapus!',
                                text: 'File berhasil dihapus dari form.',
                                confirmButtonColor: '#7c3aed'
                            });
                        }
                    });
                };

                // Success notification
                Swal.fire({
                    icon: 'success',
                    title: 'File berhasil dipilih!',
                    text: `"${file.name}" siap diupload.`,
                    confirmButtonColor: '#7c3aed',
                    timer: 2000,
                    timerProgressBar: true
                });
            }
        }

        // Form submission handler
        document.getElementById('eventForm').addEventListener('submit', function(e) {
            e.preventDefault();
            
            Swal.fire({
                icon: 'success',
                title: 'Event berhasil disimpan!',
                text: 'Event Anda telah berhasil dibuat dan akan segera dipublikasikan.',
                confirmButtonColor: '#7c3aed',
                confirmButtonText: 'Tutup'
            });
        });

        // Add input animations
        document.querySelectorAll('input[type="text"], input[type="number"], input[type="date"], input[type="time"]').forEach(input => {
            input.addEventListener('focus', function() {
                this.parentElement.querySelector('label').style.color = '#7c3aed';
            });
            
            input.addEventListener('blur', function() {
                this.parentElement.querySelector('label').style.color = '#374151';
            });
        });
    </script>
</body>
</html>