<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Form Registrasi Akun</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center px-4">

    <div class="w-full max-w-md bg-white p-6 rounded-xl shadow-lg shadow-gray-300">
        <h2 class="text-2xl font-bold text-gray-800 mb-4 text-center">Form Registrasi Akun Baru</h2>

        @if(session('success'))
            <div class="bg-green-100 text-green-700 px-4 py-2 rounded mb-4 text-sm">
                {{ session('success') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="bg-red-100 text-red-700 px-4 py-2 rounded mb-4 text-sm">
                <ul class="list-disc list-inside">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.register') }}" method="POST">
            @csrf

            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700">Nama</label>
                <input type="text" name="nama" value="{{ old('nama') }}" class="w-full mt-1 border border-gray-300 rounded-md shadow-sm focus:ring-purple-500 focus:border-purple-500 p-2" required>
            </div>

            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700">Email</label>
                <input type="email" name="email" value="{{ old('email') }}" class="w-full mt-1 border border-gray-300 rounded-md shadow-sm focus:ring-purple-500 focus:border-purple-500 p-2" required>
            </div>

            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700">Password</label>
                <input type="password" name="password" class="w-full mt-1 border border-gray-300 rounded-md shadow-sm focus:ring-purple-500 focus:border-purple-500 p-2" required>
            </div>

            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700">Konfirmasi Password</label>
                <input type="password" name="password_confirmation" class="w-full mt-1 border border-gray-300 rounded-md shadow-sm focus:ring-purple-500 focus:border-purple-500 p-2" required>
            </div>

            <div class="mb-6">
                <label class="block text-sm font-medium text-gray-700">Role</label>
                <select name="role" class="w-full mt-1 border border-gray-300 rounded-md shadow-sm focus:ring-purple-500 focus:border-purple-500 p-2" required>
                    <option value="">-- Pilih Role --</option>
                    <option value="tim_keuangan" {{ old('role') === 'tim_keuangan' ? 'selected' : '' }}>Tim Keuangan</option>
                    <option value="panitia" {{ old('role') === 'panitia' ? 'selected' : '' }}>Panitia</option>
                </select>
            </div>

            <button type="submit"
                    class="w-full py-3 px-6 bg-gradient-to-r from-purple-600 via-blue-600 to-indigo-600 text-white font-semibold rounded-xl shadow-md hover:from-purple-700 hover:via-blue-700 hover:to-indigo-700 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-2 transform hover:scale-[1.02] transition-all duration-300 active:scale-[0.98]">
                Daftarkan Akun
            </button>
        </form>
    </div>

</body>
</html>
