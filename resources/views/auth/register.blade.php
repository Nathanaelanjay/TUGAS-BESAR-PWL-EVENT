<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-900 flex items-center justify-center min-h-screen text-gray-100 font-sans">
    <div class="w-full max-w-md p-8 bg-gray-800 rounded-xl shadow-lg">
        <h2 class="text-3xl font-bold text-center text-gray-100 mb-6">Register</h2>

        {{-- Alert error validasi --}}
        @if ($errors->any())
            <div class="mb-4 bg-red-500 text-white p-3 rounded">
                <ul class="list-disc list-inside text-sm">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {{-- Form Register --}}
        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Name -->
            <div class="mb-4">
                <label for="nama" class="block text-sm font-medium text-gray-300">Name</label>
                <input id="nama" name="nama" type="text" required autofocus
                    value="{{ old('nama') }}"
                    class="mt-1 block w-full px-4 py-3 bg-gray-700 text-gray-100 border border-gray-700 rounded-md focus:outline-none focus:ring-gray-500 focus:border-gray-500">
            </div>

            <!-- Email -->
            <div class="mb-4">
                <label for="email" class="block text-sm font-medium text-gray-300">Email</label>
                <input id="email" name="email" type="email" required
                    value="{{ old('email') }}"
                    class="mt-1 block w-full px-4 py-3 bg-gray-700 text-gray-100 border border-gray-700 rounded-md focus:outline-none focus:ring-gray-500 focus:border-gray-500">
            </div>

            <!-- Password -->
            <div class="mb-6">
                <label for="password" class="block text-sm font-medium text-gray-300">Password</label>
                <input id="password" name="password" type="password" required
                    class="mt-1 block w-full px-4 py-3 bg-gray-700 text-gray-100 border border-gray-700 rounded-md focus:outline-none focus:ring-gray-500 focus:border-gray-500">
            </div>

            <!-- Submit -->
            <button type="submit"
                class="w-full py-3 px-6 bg-red-600 text-white font-medium rounded-md shadow-md hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">
                Register
            </button>
        </form>

        <p class="mt-4 text-sm text-center text-gray-400">
            Sudah punya akun?
            <a href="{{ route('login') }}" class="text-blue-400 hover:underline">Login</a>
        </p>
    </div>

    {{-- SweetAlert --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <x-sweetalerts />
</body>
</html>
