<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>My Events - EventHub</title>
    <script src="https://unpkg.com/lucide@latest"></script>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        .gradient-bg {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }
        .card-shadow {
            box-shadow: 0 10px 25px rgba(102, 126, 234, 0.1);
        }
        .btn-primary {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            transition: all 0.3s ease;
        }
        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(102, 126, 234, 0.3);
        }
        .table-row:hover {
            background: linear-gradient(135deg, rgba(102, 126, 234, 0.05), rgba(118, 75, 162, 0.05));
        }
        .modal-overlay {
            background-color: rgba(0, 0, 0, 0.5);
            backdrop-filter: blur(4px);
        }
        .modal-enter {
            animation: modalEnter 0.3s ease-out;
        }
        @keyframes modalEnter {
            from {
                opacity: 0;
                transform: scale(0.9) translateY(-20px);
            }
            to {
                opacity: 1;
                transform: scale(1) translateY(0);
            }
        }
        .success-checkmark {
            animation: checkmarkPop 0.6s ease-out;
        }
        @keyframes checkmarkPop {
            0% { transform: scale(0); }
            50% { transform: scale(1.2); }
            100% { transform: scale(1); }
        }
    </style>
</head>
<body class="bg-gray-50">
    <!-- Success Modal -->
    <div id="successModal" class="fixed inset-0 z-50 flex items-center justify-center modal-overlay hidden">
        <div class="bg-white rounded-2xl p-8 max-w-md mx-4 modal-enter">
            <div class="text-center">
                <div class="bg-green-100 rounded-full p-4 w-20 h-20 mx-auto mb-4 flex items-center justify-center">
                    <i data-lucide="check-circle" class="h-10 w-10 text-green-500 success-checkmark"></i>
                </div>
                <h3 class="text-xl font-semibold text-gray-800 mb-2">Upload Berhasil!</h3>
                <p class="text-gray-600 mb-6">Bukti pembayaran Anda telah berhasil diupload dan sedang dalam proses verifikasi.</p>
                <button onclick="closeSuccessModal()" class="btn-primary text-white px-6 py-3 rounded-xl font-medium">
                    Tutup
                </button>
            </div>
        </div>
    </div>

    <!-- Delete Confirmation Modal -->
    <div id="deleteModal" class="fixed inset-0 z-50 flex items-center justify-center modal-overlay hidden">
        <div class="bg-white rounded-2xl p-8 max-w-md mx-4 modal-enter">
            <div class="text-center">
                <div class="bg-red-100 rounded-full p-4 w-20 h-20 mx-auto mb-4 flex items-center justify-center">
                    <i data-lucide="trash-2" class="h-10 w-10 text-red-500"></i>
                </div>
                <h3 class="text-xl font-semibold text-gray-800 mb-2">Hapus Bukti Pembayaran?</h3>
                <p class="text-gray-600 mb-6">Apakah Anda yakin ingin menghapus bukti pembayaran ini? Tindakan ini tidak dapat dibatalkan.</p>
                <div class="flex space-x-4">
                    <button onclick="closeDeleteModal()" class="flex-1 bg-gray-200 hover:bg-gray-300 text-gray-700 px-4 py-3 rounded-xl font-medium transition-colors">
                        Batal
                    </button>
                    <button onclick="confirmDelete()" class="flex-1 bg-red-500 hover:bg-red-600 text-white px-4 py-3 rounded-xl font-medium transition-colors">
                        Hapus
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Header Section -->
    <div class="gradient-bg text-white py-8 mb-8">
        <div class="max-w-6xl mx-auto px-6">
            <div class="flex items-center mb-4">
                <div class="bg-white bg-opacity-20 p-3 rounded-lg mr-4">
                    <i data-lucide="calendar" class="h-8 w-8"></i>
                </div>
                <div>
                    <h1 class="text-3xl font-bold">My Registered Events</h1>
                    <p class="text-white text-opacity-80 mt-1">Kelola dan pantau event yang telah Anda daftarkan</p>
                </div>
            </div>
        </div>
    </div>

    <div class="max-w-6xl mx-auto px-6">
        @if($events->isEmpty())
            <div class="bg-white rounded-2xl p-12 card-shadow text-center">
                <div class="bg-gray-100 rounded-full p-6 w-24 h-24 mx-auto mb-6 flex items-center justify-center">
                    <i data-lucide="calendar-x" class="h-12 w-12 text-gray-400"></i>
                </div>
                <h3 class="text-xl font-semibold text-gray-700 mb-2">Belum Ada Event Terdaftar</h3>
                <p class="text-gray-500">Kamu belum mendaftar ke event manapun. Mulai jelajahi event-event menarik yang tersedia!</p>
                <button class="btn-primary text-white px-6 py-3 rounded-xl font-medium mt-6 inline-flex items-center">
                    <i data-lucide="plus" class="h-5 w-5 mr-2"></i>
                    Cari Event
                </button>
            </div>
        @else
        <div class="mb-6 mt-2">
            <a href="{{ route('member.dashboard') }}"
            class="inline-flex items-center px-4 py-2 bg-gradient-to-r from-purple-500 to-indigo-500 text-white text-sm font-semibold rounded-lg shadow-md hover:from-purple-600 hover:to-indigo-600 transition duration-200">
                <i data-lucide="arrow-left" class="w-4 h-4 mr-2"></i>
                Kembali ke Dashboard
            </a>
        </div>
            <div class="bg-white rounded-2xl card-shadow overflow-hidden">
                
                <!-- Header Table -->
                 <div class="">
                    
                 </div>
                <div class="gradient-bg text-white p-6">
                    <div class="flex items-center justify-between">
                        
                        <div class="flex items-center">
                            <i data-lucide="list" class="h-6 w-6 mr-3"></i>
                            <h2 class="text-xl font-semibold">Daftar Event Terdaftar</h2>
                        </div>
                        <div class="bg-white bg-opacity-20 px-3 py-1 rounded-full text-sm">
                            {{ count($events) }} Event
                        </div>
                    </div>
                </div>

                <!-- Table Content -->
                <div class="overflow-x-auto">
                    <table class="min-w-full">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">#</th>
                                <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                    <div class="flex items-center">
                                        <i data-lucide="calendar" class="h-4 w-4 mr-2"></i>
                                        Nama Event
                                    </div>
                                </th>
                                <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                    <div class="flex items-center">
                                        <i data-lucide="clock" class="h-4 w-4 mr-2"></i>
                                        Tanggal
                                    </div>
                                </th>
                                <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                    <div class="flex items-center">
                                        <i data-lucide="info" class="h-4 w-4 mr-2"></i>
                                        Keterangan
                                    </div>
                                </th>
                                <th class="px-6 py-4 text-center text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                    <div class="flex items-center justify-center">
                                        <i data-lucide="qr-code" class="h-4 w-4 mr-2"></i>
                                        QR Code
                                    </div>
                                </th>
                                <th class="px-6 py-4 text-center text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                    <div class="flex items-center justify-center">
                                        <i data-lucide="settings" class="h-4 w-4 mr-2"></i>
                                        Aksi
                                    </div>
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-100">
                            @foreach($events as $index => $event)
                                <tr class="table-row transition-all duration-300">
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center justify-center w-8 h-8 bg-gradient-to-r from-blue-500 to-purple-600 text-white rounded-full text-sm font-semibold">
                                            {{ $index + 1 }}
                                        </div>
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="flex items-center">
                                            <div class="bg-gradient-to-r from-blue-100 to-purple-100 p-2 rounded-lg mr-3">
                                                <i data-lucide="calendar-days" class="h-5 w-5 text-purple-600"></i>
                                            </div>
                                            <div>
                                                <div class="text-sm font-semibold text-gray-900">{{ $event->nama_event }}</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="flex items-center text-sm text-gray-600">
                                            <i data-lucide="calendar-range" class="h-4 w-4 mr-2 text-purple-500"></i>
                                            <span>
                                                {{ \Carbon\Carbon::parse($event->tanggal_mulai)->format('d M Y') }} - 
                                                {{ \Carbon\Carbon::parse($event->tanggal_selesai)->format('d M Y') }}
                                            </span>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="text-sm text-gray-600 max-w-xs">
                                            {{ $event->keterangan_event }}
                                        </div>
                                    </td>

                                    <!-- QR Code column -->
                                    <td class="px-6 py-4 text-center">
                                        @if(!empty($event->qr_code_path))
                                            <a href="{{ asset('storage/' . $event->qr_code_path) }}" target="_blank"
                                            class="inline-flex items-center bg-indigo-500 hover:bg-indigo-600 text-white py-2 px-3 rounded-lg text-xs font-medium transition-colors duration-200">
                                                <i data-lucide="download" class="h-3 w-3 mr-1"></i>
                                                Download
                                            </a>
                                        @else
                                            <span class="text-xs text-gray-400 italic">Tidak tersedia</span>
                                        @endif
                                    </td>

                                    <td class="px-6 py-4 text-center">
                                        <div class="flex flex-col space-y-3 items-center">
                                            <div class="bg-gray-50 p-3 rounded-lg w-full max-w-xs">
                                                @if(isset($event->bukti_pembayaran) && $event->bukti_pembayaran)
                                                        <div class="flex space-x-2">
                                                            <a href="{{ asset('storage/' . $event->bukti_pembayaran) }}" target="_blank"
                                                            class="flex-1 bg-blue-500 hover:bg-blue-600 text-white py-2 px-3 rounded-lg text-xs font-medium transition-colors duration-200 flex items-center justify-center">
                                                                <i data-lucide="eye" class="h-3 w-3 mr-1"></i>
                                                                Lihat
                                                            </a>
                                                            <button onclick="showDeleteModal({{ $event->id_event }})"
                                                                    class="flex-1 bg-red-500 hover:bg-red-600 text-white py-2 px-3 rounded-lg text-xs font-medium transition-colors duration-200 flex items-center justify-center">
                                                                <i data-lucide="trash-2" class="h-3 w-3 mr-1"></i>
                                                                Hapus
                                                            </button>
                                                        </div>
                                                    </div>
                                                @else
                                                    <!-- Form upload -->
                                                    <form id="uploadForm{{ $event->id_event }}" action="{{ route('member.event.upload_bukti', ['id_event' => $event->id_event]) }}" method="POST" enctype="multipart/form-data" class="space-y-2">
                                                        @csrf
                                                        <div class="relative">
                                                            <input type="file" name="bukti_pembayaran" required 
                                                                accept="image/*,.pdf"
                                                                class="block w-full text-xs text-gray-600 file:mr-3 file:py-2 file:px-3 file:rounded-lg file:border-0 file:text-xs file:font-medium file:bg-purple-50 file:text-purple-700 hover:file:bg-purple-100">
                                                        </div>
                                                        <button type="submit" 
                                                                class="w-full bg-green-500 hover:bg-green-600 text-white py-2 px-3 rounded-lg text-xs font-medium transition-colors duration-200 flex items-center justify-center">
                                                            <i data-lucide="upload" class="h-4 w-4 mr-2"></i>
                                                            Upload Bukti
                                                        </button>
                                                    </form>
                                                @endif
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>

                    </table>
                </div>

                <!-- Table Footer -->
                <div class="bg-gray-50 px-6 py-4">
                    <div class="flex items-center justify-between text-sm text-gray-600">
                        <div class="flex items-center">
                            <i data-lucide="info" class="h-4 w-4 mr-2"></i>
                            Total {{ count($events) }} event terdaftar
                        </div>
                        <div class="flex items-center">
                            <i data-lucide="shield-check" class="h-4 w-4 mr-2 text-green-500"></i>
                            Data terenkripsi dan aman
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>


    <script>
        lucide.createIcons();

        let currentEventId = null;

        // Show success modal
        function showSuccessModal() {
            document.getElementById('successModal').classList.remove('hidden');
            document.body.style.overflow = 'hidden';
        }

        // Close success modal
        function closeSuccessModal() {
            document.getElementById('successModal').classList.add('hidden');
            document.body.style.overflow = 'auto';
            // Refresh page to show updated status
            window.location.reload();
        }

        // Show delete confirmation modal
        function showDeleteModal(eventId) {
            currentEventId = eventId;
            document.getElementById('deleteModal').classList.remove('hidden');
            document.body.style.overflow = 'hidden';
        }

        // Close delete modal
        function closeDeleteModal() {
            document.getElementById('deleteModal').classList.add('hidden');
            document.body.style.overflow = 'auto';
            currentEventId = null;
        }

        // Confirm delete
        function confirmDelete() {
            if (currentEventId) {
                // Create form to delete file
                const form = document.createElement('form');
                form.method = 'POST';
                form.action = `/member/event/${currentEventId}/delete-bukti`;
                
                const csrfToken = document.createElement('input');
                csrfToken.type = 'hidden';
                csrfToken.name = '_token';
                csrfToken.value = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') || '';
                
                const methodField = document.createElement('input');
                methodField.type = 'hidden';
                methodField.name = '_method';
                methodField.value = 'DELETE';
                
                form.appendChild(csrfToken);
                form.appendChild(methodField);
                document.body.appendChild(form);
                form.submit();
            }
        }

        // Handle form submissions
        document.addEventListener('DOMContentLoaded', function() {
            // Add CSRF token meta tag if not exists
            if (!document.querySelector('meta[name="csrf-token"]')) {
                const meta = document.createElement('meta');
                meta.name = 'csrf-token';
                meta.content = '{{ csrf_token() }}';
                document.head.appendChild(meta);
            }

            // Handle upload form submissions
            const uploadForms = document.querySelectorAll('form[id^="uploadForm"]');
            uploadForms.forEach(form => {
                form.addEventListener('submit', function(e) {
                    e.preventDefault();
                    
                    const formData = new FormData(this);
                    const submitButton = this.querySelector('button[type="submit"]');
                    const originalText = submitButton.innerHTML;
                    
                    // Show loading state
                    submitButton.innerHTML = '<i data-lucide="loader-2" class="h-4 w-4 mr-2 animate-spin"></i>Uploading...';
                    submitButton.disabled = true;
                    
                    fetch(this.action, {
                        method: 'POST',
                        body: formData,
                        headers: {
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                        }
                    })
                    .then(response => {
                        if (response.ok) {
                            showSuccessModal();
                        } else {
                            throw new Error('Upload failed');
                        }
                    })
                    .catch(error => {
                        alert('Terjadi kesalahan saat mengupload file. Silakan coba lagi.');
                        submitButton.innerHTML = originalText;
                        submitButton.disabled = false;
                        lucide.createIcons();
                    });
                });
            });
        });

        // Check for success message from server
        @if(session('success'))
            document.addEventListener('DOMContentLoaded', function() {
                showSuccessModal();
            });
        @endif

        // Close modals when clicking outside
        document.addEventListener('click', function(e) {
            if (e.target.classList.contains('modal-overlay')) {
                closeSuccessModal();
                closeDeleteModal();
            }
        });

        // Close modals with Escape key
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') {
                closeSuccessModal();
                closeDeleteModal();
            }
        });
    </script>
</body>
</html>