<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @vite('resources/css/app.css')
</head>

<body class="bg-gray-900 flex items-center justify-center min-h-screen text-gray-100 font-sans">
    <div class="w-full max-w-md p-8 bg-gray-800 rounded-xl shadow-lg">
        <h2 class="text-3xl font-bold text-center text-gray-100 mb-6">Login</h2>

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email -->
            <div class="mb-4">
                <label for="email" class="block text-sm font-medium text-gray-300">Email</label>
                <input id="email" type="email"
                    class="mt-1 block w-full px-4 py-3 border border-gray-700 bg-gray-700 text-gray-100 rounded-md shadow-sm focus:outline-none focus:ring-gray-500 focus:border-gray-500 @error('email') border-red-500 @enderror"
                    name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                @error('email')
                    <p class="mt-2 text-sm text-red-400">{{ $message }}</p>
                @enderror
            </div>

            <!-- Password -->
            <div class="mb-6">
                <label for="password" class="block text-sm font-medium text-gray-300">Password</label>
                <input id="password" type="password"
                    class="mt-1 block w-full px-4 py-3 border border-gray-700 bg-gray-700 text-gray-100 rounded-md shadow-sm focus:outline-none focus:ring-gray-500 focus:border-gray-500 @error('password') border-red-500 @enderror"
                    name="password" required autocomplete="current-password">
                @error('password')
                    <p class="mt-2 text-sm text-red-400">{{ $message }}</p>
                @enderror
            </div>

            <!-- Remember Me -->
            <div class="flex items-center mb-4">
                <input id="remember" type="checkbox"
                    class="h-4 w-4 text-gray-600 focus:ring-gray-500 border-gray-600 rounded bg-gray-800"
                    name="remember" {{ old('remember') ? 'checked' : '' }}>
                <label for="remember" class="ml-2 block text-sm text-gray-200">Remember Me</label>
            </div>

            <!-- Submit Button -->
            <div>
                <button type="submit"
                    class="w-full py-3 px-6 bg-red-600 text-white font-medium rounded-md shadow-md hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">
                    Login
                </button>
            </div>
        </form>

        <!-- Link to Register -->
        <div class="mt-6 text-center">
            <p class="text-sm text-gray-400">
                Belum punya akun?
                <a href="{{ route('register') }}" class="text-gray-200 hover:underline">Daftar di sini</a>
            </p>
        </div>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<x-sweetalerts />
</html>
