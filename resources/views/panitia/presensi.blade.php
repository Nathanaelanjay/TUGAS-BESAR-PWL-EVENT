<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Daftar Presensi Peserta</title>
    <script src="https://unpkg.com/lucide@latest"></script>
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
<body class="bg-gray-50">
     <!-- Header Section -->
    <div class="gradient-bg text-white py-8 mb-8">
        <div class="max-w-6xl mx-auto px-6">
            <div class="flex items-center mb-4">
                <div class="bg-white bg-opacity-20 p-3 rounded-lg mr-4">
                    <i data-lucide="calendar" class="h-8 w-8"></i>
                </div>
                <div>
                    <h1 class="text-3xl font-bold">Presensi Event</h1>
                    <p class="text-white text-opacity-80 mt-1">Kelola dan pantau event yang telah Anda hadiri</p>
                </div>
            </div>
        </div>
    </div>
    <div class="container mx-auto px-4 py-8">
        <!-- Tombol kembali -->
        <div class="mb-4">
            <a href="{{ route('panitia.dashboard') }}"
               class="inline-flex items-center px-4 py-2 bg-gradient-to-r from-purple-500 to-indigo-500 text-white text-sm font-semibold rounded-lg shadow-md hover:from-purple-600 hover:to-indigo-600 transition duration-200">
                <i data-lucide="arrow-left" class="w-4 h-4 mr-2"></i>
                Kembali ke Dashboard
            </a>
        </div>

        <!-- Judul -->
         
        <div class="bg-gradient-to-r from-purple-500 to-indigo-500 text-white p-6 rounded-xl shadow">
            <h1 class="text-2xl font-bold flex items-center">
                <i data-lucide="clipboard-list" class="w-6 h-6 mr-2"></i>
                Daftar Presensi Peserta
            </h1>
            <p class="text-sm mt-1">Lihat daftar peserta yang hadir dan kelola sertifikat mereka.</p>
        </div>

        <!-- Presensi Card Style -->
        <div class="mt-6 bg-white rounded-lg shadow divide-y divide-gray-100">

            <!-- Header -->
            <div class="bg-gray-50 px-6 py-4 border-b border-gray-200">
                <div class="grid grid-cols-12 gap-4 text-xs font-bold text-gray-600 uppercase">
                    <div class="col-span-1 text-left">#</div>
                    <div class="col-span-3">Nama Peserta</div>
                    <div class="col-span-3">Nama Event</div>
                    <div class="col-span-3">Waktu Hadir</div>
                    <div class="col-span-2 text-center">Aksi</div>
                </div>
            </div>

            <!-- Data Rows -->
            @foreach($presensiList as $index => $item)
                <div class="px-6 py-4 hover:bg-gray-50 transition-all duration-200">
                    <div class="grid grid-cols-12 gap-4 items-center text-sm text-gray-800">

                        <!-- Kolom Nomor -->
                        <div class="col-span-1 text-left">
                            <div class="w-8 h-8 bg-purple-500 text-white rounded-full flex items-center justify-center text-sm font-bold">
                                {{ $index + 1 }}
                            </div>
                        </div>

                        <!-- Nama Peserta -->
                        <div class="col-span-3 font-semibold">
                            <div class="flex items-center gap-2">
                                <i data-lucide="user" class="w-4 h-4 text-purple-600"></i>
                                {{ $item->nama_peserta }}
                            </div>
                        </div>

                        <!-- Nama Event -->
                        <div class="col-span-3">
                            <div class="flex items-center gap-2">
                                <i data-lucide="calendar" class="w-4 h-4 text-blue-500"></i>
                                {{ $item->nama_event }}
                            </div>
                        </div>

                        <!-- Waktu Hadir -->
                        <div class="col-span-3 text-gray-600">
                            <div class="flex items-center gap-2">
                                <i data-lucide="clock" class="w-4 h-4 text-indigo-500"></i>
                                {{ \Carbon\Carbon::parse($item->waktu_hadir)->format('d M Y, H:i') }}
                            </div>
                        </div>

                        <!-- Aksi -->
                        <div class="col-span-2 flex justify-center">
                            @if($item->file_sertifikat)
                                <a href="{{ asset('storage/' . $item->file_sertifikat) }}" target="_blank"
                                class="inline-flex items-center px-3 py-1 bg-purple-500 hover:bg-purple-600 text-white text-xs font-medium rounded-md transition">
                                    <i data-lucide="download" class="w-4 h-4 mr-1"></i> Download
                                </a>
                            @else
                                <form action="{{ route('panitia.presensi.upload', $item->id_presensi) }}" method="POST"
                                    enctype="multipart/form-data" class="flex flex-wrap gap-2 items-center">
                                    @csrf
                                    <input type="file" name="file_sertifikat"
                                        class="text-xs border border-gray-300 p-1 rounded-md file:mr-2 file:py-1 file:px-2 file:rounded file:border-0 file:bg-gray-100 file:text-gray-700"
                                        required>
                                    <button type="submit"
                                            class="inline-flex items-center px-3 py-1 bg-green-500 hover:bg-green-600 text-white text-xs font-medium rounded-md transition">
                                        <i data-lucide="upload" class="w-4 h-4 mr-1"></i> Upload
                                    </button>
                                </form>
                            @endif
                        </div>

                    </div>
                </div>
            @endforeach
        </div>


    </div>

    <script>
        lucide.createIcons();
    </script>
</body>
</html>
