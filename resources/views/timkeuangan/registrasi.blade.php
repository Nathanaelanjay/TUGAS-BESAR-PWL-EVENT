<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Registrasi Event - EventHub</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap');
        body { font-family: 'Inter', sans-serif; }
        
        .gradient-bg {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }
        
        .table-hover {
            transition: all 0.2s ease;
        }
        
        .table-hover:hover {
            background-color: rgba(59, 130, 246, 0.05);
            transform: translateY(-1px);
        }
        
        .status-badge {
            display: inline-flex;
            align-items: center;
            padding: 0.375rem 0.75rem;
            border-radius: 9999px;
            font-size: 0.75rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.05em;
        }
        
        .action-btn {
            transition: all 0.2s ease;
            transform: scale(1);
        }
        
        .action-btn:hover {
            transform: scale(1.05);
        }
        
        .card-shadow {
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
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
<body class="bg-gray-50 text-gray-900">
    <div class="flex min-h-screen">
        <!-- Sidebar -->
        <div class="w-64 bg-white shadow-xl">
            <div class="p-6">
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
                    <a href="{{ route('timkeuangan.dashboard') }}" class="sidebar-item flex items-center space-x-3 px-4 py-3 rounded-lg text-gray-600 hover:text-gray-800">
                        <i class="fas fa-chart-bar w-5"></i>
                        <span class="font-medium">Dashboard</span>
                    </a>
                    <a href="#" class="sidebar-item flex items-center space-x-3 px-4 py-3 rounded-lg bg-blue-50 text-blue-700">
                        <i class="fas fa-users w-5"></i>
                        <span>Registrations</span>
                    </a>
                </nav>
            </div>
            
            <!-- Bottom Section -->
            <div class="absolute bottom-0 w-64 p-6 border-t">
                <div class="flex items-center space-x-3 mb-4">
                    <div class="w-8 h-8 bg-gray-300 rounded-full flex items-center justify-center">
                        <i class="fas fa-user text-gray-600 text-sm"></i>
                    </div>
                    <div>
                        <p class="text-sm font-medium text-gray-800">Tim Keuangan</p>
                        <p class="text-xs text-gray-500">Finance Team</p>
                    </div>
                </div>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="w-full bg-red-50 hover:bg-red-100 text-red-700 px-4 py-2 rounded-lg transition text-sm font-medium">
                        <i class="fas fa-sign-out-alt mr-2"></i>
                        Logout
                    </button>
                </form>
            </div>
        </div>

        <!-- Main Content -->
        <div class="flex-1 overflow-auto">
            <!-- Header -->
            <header class="bg-white shadow-sm border-b">
                <div class="px-8 py-6">
                    <div class="flex items-center justify-between">
                        <div>
                            <div class="flex items-center space-x-3 mb-2">
                                <a href="{{ route('timkeuangan.dashboard') }}" class="text-gray-500 hover:text-gray-700 transition">
                                    <i class="fas fa-arrow-left"></i>
                                </a>
                                <h2 class="text-2xl font-bold text-gray-800">Detail Registrasi Event</h2>
                            </div>
                            <p class="text-gray-600">Kelola pendaftaran dan pembayaran peserta</p>
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

            <!-- Event Info Section -->
            <div class="gradient-bg text-white">
                <div class="px-8 py-8">
                    <div class="max-w-4xl">
                        <div class="flex items-center space-x-3 mb-4">
                            <div class="w-12 h-12 bg-white bg-opacity-20 backdrop-blur-sm rounded-xl flex items-center justify-center">
                                <i class="fas fa-calendar-check text-white text-xl"></i>
                            </div>
                            <div>
                                <h1 class="text-3xl font-bold">{{ $event->nama_event }}</h1>
                                <p class="text-lg opacity-90">Event Registration Management</p>
                            </div>
                        </div>
                        
                        <!-- Event Stats -->
                        <div class="flex flex-wrap gap-4 mt-6">
                            <div class="bg-white bg-opacity-20 backdrop-blur-sm rounded-xl px-6 py-3">
                                <div class="flex items-center space-x-2">
                                    <i class="fas fa-users text-yellow-300"></i>
                                    <span class="font-semibold" id="total-registrations">{{ $registrasi->count() }} Registrations</span>
                                </div>
                            </div>
                            <div class="bg-white bg-opacity-20 backdrop-blur-sm rounded-xl px-6 py-3">
                                <div class="flex items-center space-x-2">
                                    <i class="fas fa-check-circle text-green-300"></i>
                                    <span class="font-semibold" id="confirmed-payments">0 Confirmed</span>
                                </div>
                            </div>
                            <div class="bg-white bg-opacity-20 backdrop-blur-sm rounded-xl px-6 py-3">
                                <div class="flex items-center space-x-2">
                                    <i class="fas fa-clock text-blue-300"></i>
                                    <span class="font-semibold" id="pending-payments">0 Pending</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Table Section -->
            <div class="px-8 py-8">
                @if($registrasi->count())
                    <!-- Table Controls -->
                    <div class="flex flex-col sm:flex-row gap-4 items-center justify-between mb-6">
                        <div class="relative flex-1 max-w-md">
                            <i class="fas fa-search absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                            <input type="text" id="search-input" placeholder="Cari nama peserta..." class="w-full pl-10 pr-4 py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                        </div>
                        <div class="flex items-center space-x-3">
                            <select id="status-filter" class="px-4 py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                                <option value="">Semua Status</option>
                                <option value="0">Belum Dibayar</option>
                                <option value="1">Menunggu Konfirmasi</option>
                                <option value="2">Lunas</option>
                                <option value="3">Ditolak</option>
                            </select>
                            <button class="px-6 py-3 bg-gray-100 hover:bg-gray-200 text-gray-700 rounded-xl transition font-medium">
                                <i class="fas fa-download mr-2"></i>
                                Export
                            </button>
                        </div>
                    </div>

                    <!-- Enhanced Table -->
                    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
                        <div class="overflow-x-auto">
                            <table class="min-w-full">
                                <thead class="bg-gray-50 border-b border-gray-200">
                                    <tr>
                                        <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                            <div class="flex items-center space-x-2">
                                                <i class="fas fa-user text-gray-400"></i>
                                                <span>Peserta</span>
                                            </div>
                                        </th>
                                        <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                            <div class="flex items-center space-x-2">
                                                <i class="fas fa-calendar text-gray-400"></i>
                                                <span>Tanggal Registrasi</span>
                                            </div>
                                        </th>
                                        <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                            <div class="flex items-center space-x-2">
                                                <i class="fas fa-receipt text-gray-400"></i>
                                                <span>Bukti Pembayaran</span>
                                            </div>
                                        </th>
                                        <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                            <div class="flex items-center space-x-2">
                                                <i class="fas fa-info-circle text-gray-400"></i>
                                                <span>Status</span>
                                            </div>
                                        </th>
                                        <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                            <div class="flex items-center space-x-2">
                                                <i class="fas fa-cog text-gray-400"></i>
                                                <span>Aksi</span>
                                            </div>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200" id="table-body">
                                    @foreach($registrasi as $item)
                                        <tr class="table-hover" data-status="{{ $item->status_pembayaran }}">
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="flex items-center">
                                                    <div class="w-10 h-10 bg-gradient-to-r from-blue-500 to-purple-600 rounded-full flex items-center justify-center">
                                                        <span class="text-white font-semibold text-sm">{{ substr($item->user->nama, 0, 1) }}</span>
                                                    </div>
                                                    <div class="ml-4">
                                                        <div class="text-sm font-semibold text-gray-900">{{ $item->user->nama }}</div>
                                                        <div class="text-sm text-gray-500">{{ $item->user->email ?? 'No email' }}</div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="text-sm text-gray-900 font-medium">{{ \Carbon\Carbon::parse($item->tanggal_registrasi)->format('d M Y') }}</div>
                                                <div class="text-sm text-gray-500">{{ \Carbon\Carbon::parse($item->tanggal_registrasi)->format('H:i') }}</div>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                @if($item->bukti_pembayaran)
                                                    <a href="{{ asset('storage/' . $item->bukti_pembayaran) }}" target="_blank"
                                                       class="inline-flex items-center px-3 py-2 bg-blue-50 hover:bg-blue-100 text-blue-700 rounded-lg transition text-sm font-medium">
                                                        <i class="fas fa-eye mr-2"></i>
                                                        Lihat Bukti
                                                    </a>
                                                @else
                                                    <span class="inline-flex items-center px-3 py-2 bg-gray-50 text-gray-500 rounded-lg text-sm">
                                                        <i class="fas fa-times mr-2"></i>
                                                        Tidak ada
                                                    </span>
                                                @endif
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                @if($item->status_pembayaran == 0)
                                                    <span class="status-badge bg-yellow-100 text-yellow-800">
                                                        <i class="fas fa-clock mr-1"></i>
                                                        Belum Dibayar
                                                    </span>
                                                @elseif($item->status_pembayaran == 1)
                                                    <span class="status-badge bg-blue-100 text-blue-800">
                                                        <i class="fas fa-hourglass-half mr-1"></i>
                                                        Menunggu Konfirmasi
                                                    </span>
                                                @elseif($item->status_pembayaran == 2)
                                                    <span class="status-badge bg-green-100 text-green-800">
                                                        <i class="fas fa-check-circle mr-1"></i>
                                                        Lunas
                                                    </span>
                                                @elseif($item->status_pembayaran == 3)
                                                    <span class="status-badge bg-red-100 text-red-800">
                                                        <i class="fas fa-times-circle mr-1"></i>
                                                        Ditolak
                                                    </span>
                                                @endif
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="flex items-center space-x-2">
                                                    @if($item->status_pembayaran == 2)
                                                        @if($item->qr_code_path)
                                                            <a href="{{ asset('storage/' . $item->qr_code_path) }}" download
                                                               class="action-btn inline-flex items-center px-3 py-2 bg-purple-50 hover:bg-purple-100 text-purple-700 rounded-lg transition text-sm font-medium">
                                                                <i class="fas fa-qrcode mr-2"></i>
                                                                QR Code
                                                            </a>
                                                        @endif
                                                    @elseif($item->status_pembayaran == 3)
                                                        <span class="inline-flex items-center px-3 py-2 bg-red-50 text-red-700 rounded-lg text-sm">
                                                            <i class="fas fa-ban mr-2"></i>
                                                            Ditolak
                                                        </span>
                                                    @else
                                                        <form action="{{ route('timkeuangan.accPembayaran', ['id' => $item->id ?? $item->id_registrasi ?? '' ]) }}" method="POST" class="inline">
                                                            @csrf
                                                            <button type="submit"
                                                                    class="action-btn inline-flex items-center px-3 py-2 bg-green-50 hover:bg-green-100 text-green-700 rounded-lg transition text-sm font-medium">
                                                                <i class="fas fa-check mr-2"></i>
                                                                Terima
                                                            </button>
                                                        </form>

                                                        <form action="{{ route('timkeuangan.tolakPembayaran', ['id' => $item->id ?? $item->id_registrasi ?? '' ]) }}" method="POST" class="inline">
                                                            @csrf
                                                            <button type="submit"
                                                                    class="action-btn inline-flex items-center px-3 py-2 bg-red-50 hover:bg-red-100 text-red-700 rounded-lg transition text-sm font-medium">
                                                                <i class="fas fa-times mr-2"></i>
                                                                Tolak
                                                            </button>
                                                        </form>
                                                    @endif
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                @else
                    <!-- Empty State -->
                    <div class="text-center py-16">
                        <div class="w-24 h-24 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-6">
                            <i class="fas fa-users text-gray-400 text-3xl"></i>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-800 mb-2">Belum ada pendaftar</h3>
                        <p class="text-gray-600 mb-6">Event ini belum memiliki peserta yang mendaftar</p>
                        <a href="{{ route('timkeuangan.dashboard') }}" class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-xl transition font-semibold">
                            <i class="fas fa-arrow-left mr-2"></i>
                            Kembali ke Dashboard
                        </a>
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

        // Update statistics
        function updateStats() {
            const rows = document.querySelectorAll('#table-body tr');
            let confirmed = 0;
            let pending = 0;
            
            rows.forEach(row => {
                const status = row.getAttribute('data-status');
                if (status === '2') confirmed++;
                if (status === '1') pending++;
            });
            
            document.getElementById('confirmed-payments').textContent = `${confirmed} Confirmed`;
            document.getElementById('pending-payments').textContent = `${pending} Pending`;
        }

        // Search functionality
        document.getElementById('search-input').addEventListener('input', function(e) {
            const searchTerm = e.target.value.toLowerCase();
            const rows = document.querySelectorAll('#table-body tr');
            
            rows.forEach(row => {
                const name = row.querySelector('td:first-child .text-gray-900').textContent.toLowerCase();
                if (name.includes(searchTerm)) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            });
        });

        // Status filter functionality
        document.getElementById('status-filter').addEventListener('change', function(e) {
            const filterStatus = e.target.value;
            const rows = document.querySelectorAll('#table-body tr');
            
            rows.forEach(row => {
                const status = row.getAttribute('data-status');
                if (filterStatus === '' || status === filterStatus) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            });
        });

        // Initialize stats
        updateStats();

        // Confirmation dialogs for actions
        document.querySelectorAll('form button').forEach(button => {
            button.addEventListener('click', function(e) {
                const action = this.textContent.trim();
                if (action.includes('Terima') || action.includes('Tolak')) {
                    if (!confirm(`Apakah Anda yakin ingin ${action.toLowerCase()} pembayaran ini?`)) {
                        e.preventDefault();
                    }
                }
            });
        });
    </script>
</body>
</html>