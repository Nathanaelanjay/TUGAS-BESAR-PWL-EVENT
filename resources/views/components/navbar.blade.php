<!-- Navbar -->
<header class="bg-gray-800 shadow-md">
        <div class="container mx-auto px-6 py-4 flex justify-between items-center">
        <ul class="flex-grow flex justify-center space-x-6">  
            @if (Auth::user()->role === 'guest')
                <h1 class="text-xl font-bold text-white">EventHub</h1>
                <a href="{{ route('login') }}" class="bg-red-600 text-white px-4 py-2 rounded hover:bg-red-700 transition">Login</a>
            @elseif (Auth::user()->role === 'staff')
            @elseif (Auth::user()->role === 'member')
                <h1 class="text-xl font-bold text-white">EventHub</h1>
            @elseif (Auth::user()->role === 'panitia')
            @elseif (Auth::user()->role === 'timkeuangan')
            @elseif (Auth::user()->role === 'admin')
            @endif
        </ul>
    </div>
</header>
