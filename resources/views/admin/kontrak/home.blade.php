@extends('admin.dashboard')

@section('title', 'Kontrak')

@section('content')
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Kontrak</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"></link>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
        }
    </style>
</head>
<body class="bg-gray-100">
    <div class="bg-gray-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-start space-x-8 border-b-2 border-gray-200">
                <a href="#" class="py-4 px-1 border-b-2 border-black font-medium text-gray-900">Pemasok</a>
                <a href="#" class="py-4 px-1 border-b-2 border-transparent font-medium text-gray-500 hover:text-gray-700 hover:border-gray-300">Kontrakt</a>
            </div>
        </div>
    </div>
    <div class="container mx-auto py-12">
        <!-- Tombol untuk menambahkan kontrak -->
        <div class="mb-6 flex justify-between items-center">
            <h1 class="text-3xl font-bold text-gray-800">Daftar Kontrak</h1>
            <a href="{{ route('admin.kontrak.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded shadow-lg transition duration-300">
                <i class="fas fa-plus mr-2"></i>Tambah Kontrak
            </a>
        </div>

        <!-- Daftar Kontrak -->
        <div class="bg-white shadow-md rounded-lg overflow-hidden">
            <table class="min-w-full bg-white">
                <thead class="bg-gray-800 text-white border-b-2 border-gray-300">
                    <tr>
                        <th class="py-3 px-4 uppercase font-semibold text-sm border-r border-gray-300">ID</th>
                        <th class="py-3 px-4 uppercase font-semibold text-sm border-r border-gray-300">Tanggal Mulai</th>
                        <th class="py-3 px-4 uppercase font-semibold text-sm border-r border-gray-300">Tanggal Selesai</th>
                        <th class="py-3 px-4 uppercase font-semibold text-sm border-r border-gray-300">Deskripsi</th>
                        <th class="py-3 px-4 uppercase font-semibold text-sm border-r border-gray-300">Bukti Kontrak</th>
                        <th class="py-3 px-4 uppercase font-semibold text-sm">Aksi</th>
                    </tr>
                </thead>
                <tbody class="text-gray-700">
                    @foreach ($kontraks as $kontrak)
                        <tr class="border-b hover:bg-gray-100 transition duration-300">
                            <td class="py-3 px-4 border-r border-gray-300">{{ $kontrak->id }}</td>
                            <td class="py-3 px-4 border-r border-gray-300">{{ $kontrak->tanggal_mulai }}</td>
                            <td class="py-3 px-4 border-r border-gray-300">{{ $kontrak->tanggal_selesai }}</td>
                            <td class="py-3 px-4 border-r border-gray-300">{{ $kontrak->deskripsi }}</td>
                            <td class="py-3 px-4 border-r border-gray-300">
                                <a href="{{ asset('storage/' . $kontrak->bukti_kontrak) }}" target="_blank" class="text-blue-500 hover:underline">Lihat Dokumen</a>
                            </td>
                            <td class="py-3 px-4 flex space-x-2">
                                <!-- Aksi Edit dan Hapus -->
                                <a href="{{ route('admin.kontrak.edit', $kontrak->id) }}" class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-1 px-2 rounded text-sm shadow-md transition duration-300">
                                    <i class="fas fa-edit"></i> Edit
                                </a>
                                <form action="{{ route('admin.kontrak.destroy', $kontrak->id) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-2 rounded text-sm shadow-md transition duration-300">
                                        <i class="fas fa-trash"></i> Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
@endsection
