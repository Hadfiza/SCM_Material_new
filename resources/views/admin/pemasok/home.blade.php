@extends('admin.app')
@section('title', 'Pemasok')

@section('content')
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Pemasok</title>
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
                <a href="{{ route('admin.pemasok') }}" class="py-4 px-1 border-b-2 border-black font-medium text-gray-900">Pemasok</a>
                <a href="{{ route('admin.kontrak.home') }}" class="py-4 px-1 border-b-2 border-transparent font-medium text-gray-500 hover:text-gray-700 hover:border-gray-300">Kontrak</a>
            </div>
        </div>
    </div>
    <div class="container mx-auto py-12">

        <!-- Tombol untuk menambahkan pemasok -->
        <div class="mb-6 flex justify-between items-center">
            <h1 class="text-3xl font-bold text-gray-800">Daftar Pemasok</h1>
            <a href="{{ route('admin.pemasok.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded shadow-lg transition duration-300">
                <i class="fas fa-plus mr-2"></i>Tambah Pemasok
            </a>
        </div>

        <!-- Daftar Pemasok -->
        <div class="bg-white shadow-md rounded-lg overflow-hidden">
            <table class="min-w-full bg-white">
                <thead class="bg-gray-800 text-white">
                    <tr>
                        <th class="py-3 px-4 uppercase font-semibold text-sm">ID</th>
                        <th class="py-3 px-4 uppercase font-semibold text-sm">Nama Pemasok</th>
                        <th class="py-3 px-4 uppercase font-semibold text-sm">Alamat</th>
                        <th class="py-3 px-4 uppercase font-semibold text-sm">Kontak</th>
                        <th class="py-3 px-4 uppercase font-semibold text-sm">Kontrak ID</th>
                        <th class="py-3 px-4 uppercase font-semibold text-sm">Rating Pemasok</th>
                        <th class="py-3 px-4 uppercase font-semibold text-sm">Aksi</th>
                    </tr>
                </thead>
                <tbody class="text-gray-700">
                    @foreach ($pemasok as $pemasok)
                        <tr class="border-b hover:bg-gray-100 transition duration-300">
                            <td class="py-3 px-4">{{ $pemasok->id }}</td>
                            <td class="py-3 px-4">{{ $pemasok->nama_pemasok }}</td>
                            <td class="py-3 px-4">{{ $pemasok->alamat }}</td>
                            <td class="py-3 px-4">{{ $pemasok->kontak }}</td>
                            <td class="py-3 px-4">{{ $pemasok->kontrak_id }}</td>
                            <td class="py-3 px-4">{{ $pemasok->rating_pemasok }}</td>
                            <td class="py-3 px-4 flex space-x-2">
                                <!-- Aksi Edit dan Hapus -->
                                <a href="{{ route('admin.pemasok.edit', $pemasok->id) }}" class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-1 px-2 rounded text-sm shadow-md transition duration-300">
                                    <i class="fas fa-edit"></i> Edit
                                </a>
                                <form action="{{ route('admin.pemasok.destroy', $pemasok->id) }}" method="POST" class="inline">
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
