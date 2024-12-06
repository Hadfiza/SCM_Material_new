@extends('admin.app')
@section('title', 'Update Detail Proyek')

@section('content')
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Order Material</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>

<body class="bg-gray-100">
    <div class="container mx-auto py-12">
        <h3 class="text-2xl font-semibold text-gray-800 mb-6">Edit Order Material</h3>

        <!-- Form untuk mengedit order material -->
        <form action="{{ route('admin.order.update', $order->id) }}" method="POST"
            class="bg-white p-8 rounded-lg shadow-md">
            @csrf
            @method('PUT')

            <!-- Material -->
            <div class="mb-4">
                <label for="material_id" class="block text-gray-700 font-bold mb-2">Material:</label>
                <select name="material_id" id="material_id" 
                        class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500" required>
                    <option value="" disabled>Pilih Material</option>
                @foreach ($material as $material) <!-- Menggunakan $materials sesuai dari controller -->
                    <option value="{{ $material->id }}" {{ $material->id == $order->material_id ? 'selected' : '' }}>
                        {{ $material->id }} <!-- Menampilkan nama material -->
                    </option>
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
                    value="{{ $order->jumlah_order }}" required>
            </div>

            <!-- Tanggal Order -->
            <div class="mb-4">
                <label for="tanggal_order" class="block text-gray-700 font-bold mb-2">Tanggal Order:</label>
                <input type="date" name="tanggal_order" id="tanggal_order"
                    class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500"
                    value="{{ $order->tanggal_order }}" required>
            </div>

            <!-- Keterangan -->
            <div class="mb-4">
                <label for="keterangan" class="block text-gray-700 font-bold mb-2">Keterangan:</label>
                <input type="text" name="keterangan" id="keterangan"
                    class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500"
                    value="{{ $order->keterangan }}" required>
            </div>

            <!-- Tombol Simpan -->
            <button type="submit"
                class="bg-blue-500 text-white px-6 py-2 rounded-lg shadow-md hover:bg-blue-700 transition duration-300">
                Simpan Perubahan
            </button>
        </form>
    </div>
</body>

</html>
@endsection
