@extends('admin.app')
@section('title', 'Tambah Order Material')

@section('content')
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Order Material</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>

<body class="bg-gray-100">
    <div class="container mx-auto py-12">
        <h3 class="text-2xl font-semibold text-gray-800 mb-6">Tambah Order Material</h3>

        <!-- Form untuk menambahkan order material -->
        <form action="{{ route('admin.order.store') }}" method="POST"
            class="bg-white p-8 rounded-lg shadow-md">
            @csrf

            <!-- Material -->
            <div class="mb-4">
                <label for="material_id" class="block text-gray-700 font-bold mb-2">Material:</label>
                <select name="material_id" id="material_id"
                        class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500" required>
                    <option value="" disabled selected>Pilih Material</option>
                    @foreach ($material as $material)
                        <option value="{{ $material->id }}">{{ $material->id }}</option>
                    @endforeach
                </select>
                @error('material_id')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Jumlah Order -->
            <div class="mb-4">
                <label for="jumlah_order" class="block text-gray-700 font-bold mb-2">Jumlah Order:</label>
                <input type="number" name="jumlah_order" id="jumlah_order"
                    class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500"
                    value="{{ old('jumlah_order') }}" required>
                @error('jumlah_order')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Tanggal Order -->
            <div class="mb-4">
                <label for="tanggal_order" class="block text-gray-700 font-bold mb-2">Tanggal Order:</label>
                <input type="date" name="tanggal_order" id="tanggal_order"
                    class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500"
                    value="{{ old('tanggal_order') }}" required>
                @error('tanggal_order')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Keterangan -->
            <div class="mb-4">
                <label for="keterangan" class="block text-gray-700 font-bold mb-2">Keterangan:</label>
                <input type="text" name="keterangan" id="keterangan"
                    class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500"
                    value="{{ old('keterangan') }}" required>
                @error('keterangan')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Tombol Simpan -->
            <button type="submit"
                class="bg-blue-500 text-white px-6 py-2 rounded-lg shadow-md hover:bg-blue-700 transition duration-300">
                Tambah Order
            </button>
        </form>
    </div>
</body>

</html>
@endsection
