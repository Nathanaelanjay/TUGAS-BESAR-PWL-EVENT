<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Member Page</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-900 text-gray-100">

    <!-- Header -->
    <header class="bg-gray-800 shadow-md">
        <div class="container mx-auto px-6 py-4 flex justify-between items-center">
            <h1 class="text-xl font-bold text-white">EventHub</h1>
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
        <div class="bg-gray-800 p-6 rounded-lg shadow-md mb-8 text-center">
            <h2 class="text-3xl font-bold text-white mb-2">Selamat Datang di EventHub!</h2>
            <p class="text-gray-400">Temukan dan daftar event seru yang diadakan oleh komunitas kami.</p>
        </div>
        <!-- Grid of Event Cards -->
         
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            @foreach ($events as $event)
            <div class="bg-gray-800 rounded-lg shadow-md overflow-hidden">
                <img src="{{ $event->poster_event ? asset('storage/' . ltrim($event->poster_event, '/')) : 'https://via.placeholder.com/400x200' }}" alt="Poster Event" class="w-full h-48 object-cover">
                <div class="p-4">
                    <h3 class="text-lg font-semibold text-white">{{ $event->nama_event }}</h3>
                    <p class="text-gray-400 text-sm mt-1">
                        📅 {{ \Carbon\Carbon::parse($event->tanggal_event)->format('d M Y') }} <br>
                        🕒 {{ \Carbon\Carbon::parse($event->waktu_event)->format('H:i') }} <br>
                        📍 {{ $event->lokasi }} <br>
                        🎤 {{ $event->narasumber }} <br>
                        💰 Rp{{ number_format($event->biaya, 0, ',', '.') }} <br>
                        👥 Kuota: {{ $event->kuota }} orang
                    </p>
                    <!-- Tombol-tombol -->
                    <div class="mt-4 flex justify-between">
                        <a href="#" class="bg-blue-600 hover:bg-blue-700 text-white px-3 py-2 rounded transition text-sm">Lihat Detail</a>
                       <a href="{{ route('registerevent.form', $event->id_event) }}"
                        class="bg-red-600 hover:bg-red-700 text-white px-3 py-2 rounded transition text-sm">
                            Daftar Sekarang
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </main>
</body>
</html>
