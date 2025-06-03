<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Detail Registrasi Event</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-900 text-gray-100">
    <div class="container mx-auto px-6 py-8">

        <!-- Header -->
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-2xl font-bold">Detail Registrasi untuk Event: {{ $event->nama_event }}</h2>
            <a href="{{ route('timkeuangan.dashboard') }}"
               class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-md transition">
                Kembali ke Dashboard
            </a>
        </div>

        @if($registrasi->count())
            <div class="overflow-x-auto bg-gray-800 p-4 rounded-lg shadow">
                <table class="min-w-full table-auto text-left text-sm">
                    <thead>
                        <tr class="bg-gray-700 text-gray-300">
                            <th class="px-4 py-2">Nama</th>
                            <th class="px-4 py-2">Tanggal Registrasi</th>
                            <th class="px-4 py-2">Bukti Pembayaran</th>
                            <th class="px-4 py-2">Status Pembayaran</th>
                            <th class="px-4 py-2">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($registrasi as $item)
                            <tr class="border-t border-gray-700 hover:bg-gray-700">
                                <td class="px-4 py-2">{{ $item->user->nama }}</td>
                                <td class="px-4 py-2">{{ \Carbon\Carbon::parse($item->tanggal_registrasi)->format('d M Y') }}</td>
                                <td class="px-4 py-2">
                                    <a href="{{ asset('storage/' . $item->bukti_pembayaran) }}" target="_blank"
                                       class="text-blue-400 hover:underline">Lihat Bukti</a>
                                </td>
                                <td class="px-4 py-2">
                                    @if($item->status_pembayaran == 0)
                                        <span class="text-yellow-400">Belum Dibayar</span>
                                    @elseif($item->status_pembayaran == 1)
                                        <span class="text-blue-400">Menunggu Konfirmasi</span>
                                    @elseif($item->status_pembayaran == 2)
                                        <span class="text-green-400">Lunas</span>
                                    @elseif($item->status_pembayaran == 3)
                                        <span class="text-red-400">Ditolak</span>
                                    @endif
                                </td>
                                <td class="px-4 py-2 space-x-2">
                                    @if($item->status_pembayaran == 2)
                                        @if($item->qr_code_path)
                                            <a href="{{ asset('storage/' . $item->qr_code_path) }}" download
                                            class="text-blue-400 underline hover:text-blue-600">
                                                Download QR Code
                                            </a>
                                        @endif
                                    @elseif($item->status_pembayaran == 3)
                                        <span class="text-red-500">Registrasi ditolak</span>
                                    @else
                                        <form action="{{ route('timkeuangan.accPembayaran', ['id' => $item->id ?? $item->id_registrasi ?? '' ]) }}" method="POST" class="inline">
                                            @csrf
                                            <button type="submit"
                                                    class="bg-green-600 hover:bg-green-700 text-white px-3 py-1 rounded">
                                                Terima
                                            </button>
                                        </form>

                                        <form action="{{ route('timkeuangan.tolakPembayaran', ['id' => $item->id ?? $item->id_registrasi ?? '' ]) }}" method="POST" class="inline">
                                            @csrf
                                            <button type="submit"
                                                    class="bg-red-600 hover:bg-red-700 text-white px-3 py-1 rounded">
                                                Tolak
                                            </button>
                                        </form>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <p class="text-gray-400 mt-4">Belum ada yang mendaftar untuk event ini.</p>
        @endif
    </div>
</body>
</html>
