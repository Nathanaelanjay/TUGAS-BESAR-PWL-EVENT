<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Landing Page Event</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-900 text-gray-100">
    <!-- Header -->
    <header class="bg-gray-800 shadow-md">
        <div class="container mx-auto px-6 py-4 flex justify-between items-center">
            <h1 class="text-xl font-bold text-white">EventHub</h1>
            <a href="{{ route('login') }}" class="bg-red-600 text-white px-4 py-2 rounded hover:bg-red-700  transition">Login</a>
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
                <img src="{{ $event->poster_event ?? 'https://via.placeholder.com/400x200' }}" alt="Poster Event" class="w-full h-48 object-cover">
                <div class="p-4">
                    <h3 class="text-lg font-semibold text-white">{{ $event->nama_event }}</h3>
                    <p class="text-gray-400 text-sm mt-1">
                        📅 {{ \Carbon\Carbon::parse($event->tanggal_event)->format('d M Y') }} <br>
                        🕒 {{ \Carbon\Carbon::parse($event->waktu_event)->format('H:i') }} <br>
                        📍 {{ $event->lokasi }} <br>
                        🎤 {{ $event->narasumber }}
                    </p>
                    <a href="#" class="mt-4 inline-block bg-gray-700 text-white px-3 py-2 rounded hover:bg-gray-600 transition text-sm">Lihat Detail</a>
                </div>
            </div>
            @endforeach
        </div>
    </main>
</body>
</html>
