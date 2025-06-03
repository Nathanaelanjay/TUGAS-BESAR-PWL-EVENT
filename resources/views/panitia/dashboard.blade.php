<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard Panitia</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-900 text-gray-100">

    <!-- Header -->
    <header class="bg-gray-800 shadow-md">
        <div class="container mx-auto px-6 py-4 flex justify-between items-center">
            <h1 class="text-xl font-bold text-white">EventHub - Panitia</h1>
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
            <h2 class="text-3xl font-bold text-white mb-2">Dashboard Panitia</h2>
            <p class="text-gray-400">Kelola dan buat event untuk komunitas dengan mudah.</p>
        </div>

        <!-- Button Buat Event -->
        <div class="mb-6">
            <a href="{{ route('panitia.events.create') }}"
            class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-md shadow transition">
                + Buat Event
            </a>
        </div>

       <!-- Event List -->
        @if ($events->count())
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                @foreach ($events as $event)
                    <div class="bg-gray-800 rounded-lg shadow-md overflow-hidden">
                        @if ($event->poster_event && Str::endsWith(strtolower($event->poster_event), ['.jpg', '.jpeg', '.png']))
                            <img src="{{ asset('storage/' . ltrim($event->poster_event, '/')) }}"
                                alt="Poster Event" class="w-full h-48 object-cover">
                        @elseif ($event->poster_event && Str::endsWith(strtolower($event->poster_event), '.pdf'))
                            <iframe src="{{ asset('storage/' . ltrim($event->poster_event, '/')) }}#toolbar=0"
                                class="w-full h-48" frameborder="0">
                            </iframe>
                        @else
                            <img src="https://via.placeholder.com/400x200"
                                alt="Poster Event" class="w-full h-48 object-cover">
                        @endif

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
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <p class="text-center text-gray-400">Belum ada event yang dibuat.</p>
        @endif
    </main>
</body>
</html>
