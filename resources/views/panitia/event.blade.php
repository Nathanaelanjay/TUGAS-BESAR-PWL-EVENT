@extends('components.layout')

@section('title', 'Kelola Event')

@section('content')
<div class="flex justify-center items-start min-h-screen bg-gray-900 text-gray-100 pt-10 px-4">
    <div class="w-full max-w-lg bg-gray-800 p-8 rounded-lg shadow-md">
        <h1 class="text-2xl font-bold mb-6 text-center text-white">Form Kelola Event</h1>

        <form action="{{ route('panitia.event.store') }}" method="POST" enctype="multipart/form-data" class="space-y-5">
            @csrf

            <!-- Nama Event -->
            <div>
                <label for="nama_event" class="block text-sm font-semibold mb-1">Nama Event</label>
                <input type="text" id="nama_event" name="nama_event" required
                    class="w-full px-4 py-2 bg-gray-700 border border-gray-600 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 text-white">
            </div>

            <!-- Tanggal Event -->
            <div>
                <label for="tanggal_event" class="block text-sm font-semibold mb-1">Tanggal Event</label>
                <input type="date" id="tanggal_event" name="tanggal_event" required
                    class="w-full px-4 py-2 bg-gray-700 border border-gray-600 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 text-white">
            </div>

            <!-- Waktu Event -->
            <div>
                <label for="waktu_event" class="block text-sm font-semibold mb-1">Waktu Event</label>
                <input type="time" id="waktu_event" name="waktu_event" required
                    class="w-full px-4 py-2 bg-gray-700 border border-gray-600 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 text-white">
            </div>

            <!-- Lokasi -->
            <div>
                <label for="lokasi" class="block text-sm font-semibold mb-1">Lokasi</label>
                <input type="text" id="lokasi" name="lokasi" required
                    class="w-full px-4 py-2 bg-gray-700 border border-gray-600 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 text-white">
            </div>

            <!-- Poster Event -->
            <div>
                <label class="block text-sm font-semibold mb-1" for="poster_event">Poster Event (opsional)</label>
                <div class="flex w-full items-stretch space-x-2">
                    <!-- Link download file -->
                    <a href="#" id="poster_event_link" target="_blank"
                    class="flex-1 px-4 py-2 bg-gray-700 border border-gray-600 rounded-md text-white truncate pointer-events-none">
                    Belum ada file dipilih
                    </a>

                    <!-- Hidden file input -->
                    <input type="file" id="poster_event" name="poster_event" accept="image/*,.pdf" class="hidden" onchange="updateFileName(this)">

                    <!-- Button Pilih/Hapus -->
                    <button type="button" id="poster_event_button"
                        onclick="document.getElementById('poster_event').click()"
                        class="bg-blue-600 hover:bg-blue-700 text-white px-4 rounded-md transition">
                        Pilih File
                    </button>
                </div>
                <p class="text-sm text-gray-400 mt-1">Format yang didukung: JPG, PNG, PDF (maks. 2MB)</p>
            </div>

            <!-- Biaya -->
            <div>
                <label for="biaya" class="block text-sm font-semibold mb-1">Biaya (Rp)</label>
                <input type="number" id="biaya" name="biaya" required min="0"
                    class="w-full px-4 py-2 bg-gray-700 border border-gray-600 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 text-white">
            </div>

            <!-- Kuota -->
            <div>
                <label for="kuota" class="block text-sm font-semibold mb-1">Kuota</label>
                <input type="number" id="kuota" name="kuota" required min="1"
                    class="w-full px-4 py-2 bg-gray-700 border border-gray-600 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 text-white">
            </div>

            <!-- Narasumber -->
            <div>
                <label for="narasumber" class="block text-sm font-semibold mb-1">Narasumber</label>
                <input type="text" id="narasumber" name="narasumber" required
                    class="w-full px-4 py-2 bg-gray-700 border border-gray-600 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 text-white">
            </div>

            <!-- Submit -->
            <div>
                <button type="submit"
                    class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 rounded-md transition duration-300">
                    Simpan Event
                </button>
            </div>
        </form>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    function updateFileName(input) {
        const link = document.getElementById('poster_event_link');
        const fileButton = document.getElementById('poster_event_button');

        if (input.files.length > 0) {
            const file = input.files[0];
            const fileName = file.name;

            // Buat URL untuk file blob lokal
            const fileUrl = URL.createObjectURL(file);

            // Tampilkan link file
            link.href = fileUrl;
            link.textContent = fileName;
            link.classList.remove('pointer-events-none', 'text-gray-400');
            link.classList.add('underline', 'hover:text-blue-400');

            // Ubah tombol jadi "Hapus File"
            fileButton.innerText = 'Hapus File';
            fileButton.classList.remove('bg-blue-600', 'hover:bg-blue-700');
            fileButton.classList.add('bg-red-600', 'hover:bg-red-700');

            // Aksi hapus file
            fileButton.onclick = function () {
                Swal.fire({
                    title: 'Hapus file?',
                    text: 'File yang dipilih akan dihapus dari form.',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#3085d6',
                    confirmButtonText: 'Ya, hapus!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        input.value = '';
                        link.href = '#';
                        link.textContent = 'Belum ada file dipilih';
                        link.classList.add('pointer-events-none', 'text-gray-400');
                        link.classList.remove('underline', 'hover:text-blue-400');

                        fileButton.innerText = 'Pilih File';
                        fileButton.classList.remove('bg-red-600', 'hover:bg-red-700');
                        fileButton.classList.add('bg-blue-600', 'hover:bg-blue-700');
                        fileButton.onclick = function () {
                            input.click();
                        };

                        Swal.fire('Dihapus!', 'File berhasil dihapus.', 'success');
                    }
                });
            };

            // SweetAlert konfirmasi file dipilih
            Swal.fire({
                icon: 'success',
                title: 'File berhasil dipilih!',
                text: `"${fileName}" sudah diupload.`,
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'Oke'
            });
        }
    }
</script>
    </div>
</div>
@endsection
