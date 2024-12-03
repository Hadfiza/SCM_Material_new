@extends('admin.dashboard')

@section('title', 'Pemasok')

@section('content')
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Pemasok</title>
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
    <div class="container mx-auto py-12">
        <h3 class="text-2xl font-semibold mb-6">Edit Pemasok</h3>

        <!-- Form untuk mengedit pemasok -->
        <form action="{{ route('admin.pemasok.update', $pemasok->id) }}" method="POST" class="bg-white p-8 rounded-lg shadow-md">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <label for="nama_pemasok" class="block text-gray-700 font-bold mb-2">Nama Pemasok:</label>
                <input type="text" name="nama_pemasok" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500" value="{{ $pemasok->nama_pemasok }}" required>
            </div>
            
            <div class="mb-4">
                <label for="alamat" class="block text-gray-700 font-bold mb-2">Alamat:</label>
                <textarea name="alamat" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500" required>{{ $pemasok->alamat }}</textarea>
            </div>
            
            <div class="mb-4">
                <label for="kontak" class="block text-gray-700 font-bold mb-2">Kontak:</label>
                <input type="text" name="kontak" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500" value="{{ $pemasok->kontak }}" required>
            </div>
            
            <div class="mb-4">
                <label for="kontrak_id" class="block text-gray-700 font-bold mb-2">Kontrak ID:</label>
                <input type="number" name="kontrak_id" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500" value="{{ $pemasok->kontrak_id }}" required>
            </div>
            
            <div class="mb-4">
                <label for="rating_pemasok" class="block text-gray-700 font-bold mb-2">Rating Pemasok:</label>
                <input type="number" name="rating_pemasok" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500" value="{{ $pemasok->rating_pemasok }}" required>
            </div>
            
            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded shadow-lg transition duration-300">
                Simpan Perubahan
            </button>
        </form>
    </div>
</body>
</html>
@endsection
