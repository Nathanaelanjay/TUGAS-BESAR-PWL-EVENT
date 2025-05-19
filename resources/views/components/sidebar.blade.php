<!-- Navbar -->
<nav class="bg-blue-100 border-b border-blue-300 py-4 px-6">
    <div class="container mx-auto flex items-center justify-between">
        <!-- Navigation Links (Tengah) -->
        <ul class="flex-grow flex justify-center space-x-6">
            @if (Auth::user()->role === 'guest')
                <li>
                    <a href="{{ route('guest.event') }}" 
                       class="text-blue-900 text-lg px-4 py-2 rounded-lg transition-all hover:bg-green-200 hover:text-blue-900">
                        Event
                    </a>
                </li>
                <li>
                    <a href="{{ route('guest.registrasi') }}" 
                       class="text-blue-900 text-lg px-4 py-2 rounded-lg transition-all hover:bg-green-200 hover:text-blue-900">
                        Registrasi
                    </a>
                </li>
            @elseif (Auth::user()->role === 'staff')
            @elseif (Auth::user()->role === 'member')
            @elseif (Auth::user()->role === 'panitia')
            @elseif (Auth::user()->role === 'timkeuangan')
            @elseif (Auth::user()->role === 'admin')
            @endif
        </ul>

        <!-- Logout Button (Kanan) -->
        <div>
            <x-logout-button />
        </div>
    </div>
</nav>
