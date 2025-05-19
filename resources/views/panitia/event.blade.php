@extends('components.layout')

@section('title', 'Kelola Event')

@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-2xl font-bold text-gray-800 mb-6">Form Kelola Event</h1>

    <form action="{{ route('panitia.event.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
        @csrf

        <!-- Nama Event -->
        <div>
            <label for="nama_event" class="block text-gray-700 font-semibold">Nama Event</label>
            <input type="text" id="nama_event" name="nama_event" required
                class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-300">
        </div>

        <!-- Tanggal Event -->
        <div>
            <label for="tanggal_event" class="block text-gray-700 font-semibold">Tanggal Event</label>
            <input type="date" id="tanggal_event" name="tanggal_event" required
                class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-300">
        </div>

        <!-- Waktu Event -->
        <div>
            <label for="waktu_event" class="block text-gray-700 font-semibold">Waktu Event</label>
            <input type="time" id="waktu_event" name="waktu_event" required
                class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-300">
        </div>

        <!-- Lokasi Event -->
        <div>
            <label for="lokasi" class="block text-gray-700 font-semibold">Lokasi</label>
            <input type="text" id="lokasi" name="lokasi" required
                class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-300">
        </div>

        <!-- Poster Event -->
        <div>
            <label for="poster_event" class="block text-gray-700 font-semibold">Poster Event</label>
            <input type="file" id="poster_event" name="poster_event" accept="image/*"
                class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-300">
        </div>

        <!-- Biaya Event -->
        <div>
            <label for="biaya" class="block text-gray-700 font-semibold">Biaya</label>
            <input type="number" id="biaya" name="biaya" required
                class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-300">
        </div>

        <!-- Kuota -->
        <div>
            <label for="kuota" class="block text-gray-700 font-semibold">Kuota</label>
            <input type="number" id="kuota" name="kuota" required
                class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-300">
        </div>

        <!-- Narasumber -->
        <div>
            <label for="narasumber" class="block text-gray-700 font-semibold">Narasumber</label>
            <input type="text" id="narasumber" name="narasumber" required
                class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-300">
        </div>

        <!-- Submit Button -->
        <div>
            <button type="submit"
                class="w-full bg-blue-600 text-white font-semibold py-2 rounded-md hover:bg-blue-700 transition-all">
                Simpan Event
            </button>
        </div>
    </form>
</div>
@endsection
