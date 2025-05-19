@extends('components.layout')

@section('title')
    Panitia Dashboard
@endsection

@section('content')
<body class="bg-gray-100 min-h-screen">
    <div class="flex min-h-screen bg-gray-100">

        <div class="flex-1 ml-64">
            <div class="container mx-auto p-6">
                <!-- Card Header -->
                <div class="bg-white p-6 rounded-lg shadow-md">
                    <h1 class="text-2xl font-bold text-gray-800 mb-4">Welcome, Panitia!</h1>
                    <p class="text-gray-600">Ini adalah halaman dashboard untuk Panitia. Anda dapat mengelola event, peserta, dan kehadiran di sini.</p>
                </div>
            </div>
        </div>
    </div>
</body>
@endsection
