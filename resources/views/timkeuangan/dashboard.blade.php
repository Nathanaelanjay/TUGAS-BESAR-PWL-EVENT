<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard Tim Keuangan</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-900 text-gray-100">

    <!-- Header -->
    <header class="bg-gray-800 shadow-md">
        <div class="container mx-auto px-6 py-4 flex justify-between items-center">
            <h1 class="text-xl font-bold text-white">EventHub - Tim Keuangan</h1>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit"
                        class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded-md transition">
                    Logout
                </button>
            </form>
        </div>
    </header>

    <!-- Main Content -->
    <main class="container mx-auto px-6 py-8">
        <!-- Welcome -->
        <div class="bg-gray-800 p-6 rounded-lg shadow-md mb-6 text-center">
            <h2 class="text-3xl font-bold text-white mb-2">Dashboard Tim Keuangan</h2>
            <p class="text-gray-400">Pantau pendaftaran dan pembayaran event dengan mudah.</p>
        </div>

        <!-- Event List -->
        @if($events->count())
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                @foreach ($events as $event)
                    <div class="bg-gray-800 rounded-lg shadow-md overflow-hidden">
                        <div class="p-4">
                            <h3 class="text-lg font-semibold text-white">{{ $event->nama_event }}</h3>
                            <p class="text-gray-400 text-sm mt-1">
                                📅 {{ \Carbon\Carbon::parse($event->tanggal_event)->format('d M Y') }}<br>
                                🕒 {{ \Carbon\Carbon::parse($event->waktu_event)->format('H:i') }}<br>
                                📍 {{ $event->lokasi }}
                            </p>
                            <div class="mt-4">
                                <a href="{{ route('timkeuangan.registrasi', $event->id_event) }}"
                                   class="inline-block bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-md transition text-sm">
                                    Lihat Pendaftar
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <p class="text-center text-gray-400">Belum ada event yang tersedia.</p>
        @endif
    </main>
</body>
</html>
