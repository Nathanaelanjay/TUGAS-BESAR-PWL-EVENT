@extends('components.layout')

@section('title', 'Form Registrasi Event')

@section('content')
<div class="flex justify-center items-center min-h-screen bg-gray-900 text-white">
    <div class="bg-gray-800 p-8 rounded-lg shadow-md w-full max-w-md">
        <h2 class="text-xl font-bold mb-4">Registrasi event: {{ $event->nama_event }}</h2>

        @if (session('success'))
            <script>
                Swal.fire({
                    icon: 'success',
                    title: 'Berhasil!',
                    text: '{{ session('success') }}',
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'OK'
                });
            </script>
        @endif

        @if (session('success_redirect'))
            <script>
                Swal.fire({
                    icon: 'success',
                    title: 'Berhasil!',
                    text: '{{ session('success_redirect') }}',
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'OK'
                }).then(() => {
                    window.location.href = "{{ route('member.dashboard') }}";
                });
            </script>
        @endif

        <form action="{{ route('registerevent.submit', $event->id_event) }}" method="POST" enctype="multipart/form-data">
            @csrf

            <!-- Bukti Pembayaran -->
            <div class="mb-4">
                <label class="block text-sm font-medium mb-1">Bukti Pembayaran (PDF/IMG)</label>
                <div class="flex w-full items-stretch space-x-2">
                    <a href="#" id="bukti_pembayaran_link" target="_blank"
                       class="flex-1 px-4 py-2 bg-gray-700 border border-gray-600 rounded-md text-white truncate pointer-events-none text-gray-400">
                        Belum ada file dipilih
                    </a>

                    <input type="file" id="bukti_pembayaran" name="bukti_pembayaran" accept="image/*,.pdf" class="hidden" onchange="updateFileName(this)" required>

                    <button type="button" id="bukti_pembayaran_button"
                            onclick="document.getElementById('bukti_pembayaran').click()"
                            class="bg-blue-600 hover:bg-blue-700 text-white px-4 rounded-md transition">
                        Pilih File
                    </button>
                </div>
                @error('bukti_pembayaran')
                    <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                @enderror
                <p class="text-sm text-gray-400 mt-1">Format yang didukung: JPG, PNG, PDF (maks. 2MB)</p>
            </div>

            <button type="submit"
                    class="w-full bg-blue-600 hover:bg-blue-700 py-2 rounded mt-4 transition">
                Kirim Registrasi
            </button>
        </form>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    function updateFileName(input) {
        const link = document.getElementById('bukti_pembayaran_link');
        const fileButton = document.getElementById('bukti_pembayaran_button');

        if (input.files.length > 0) {
            const file = input.files[0];
            const fileName = file.name;
            const fileUrl = URL.createObjectURL(file);

            link.href = fileUrl;
            link.textContent = fileName;
            link.classList.remove('pointer-events-none', 'text-gray-400');
            link.classList.add('underline', 'hover:text-blue-400');

            fileButton.innerText = 'Hapus File';
            fileButton.classList.remove('bg-blue-600', 'hover:bg-blue-700');
            fileButton.classList.add('bg-red-600', 'hover:bg-red-700');

            fileButton.onclick = function () {
                Swal.fire({
                    title: 'Hapus file?',
                    text: 'File akan dihapus dari form.',
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

            Swal.fire({
                icon: 'success',
                title: 'File berhasil dipilih!',
                text: `"${fileName}" sudah diunggah.`,
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'Oke'
            });
        }
    }
</script>
@endsection
