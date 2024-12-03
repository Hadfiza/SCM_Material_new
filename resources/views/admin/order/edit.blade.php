@extends('admin.dashboard')

@section('title', 'Update Detail Proyek')

@section('content')
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Order Material</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"></link>
</head>
<body class="bg-gray-100">
    <div class="container mx-auto py-12">
        <h3 class="text-2xl font-semibold text-gray-800 mb-6">Edit Order Material</h3>

        <!-- Form untuk mengedit order material -->
        <form action="{{ route('admin.order.update', $order->id) }}" method="POST" class="bg-white p-8 rounded-lg shadow-md">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <label for="id_material" class="block text-gray-700 font-bold mb-2">ID Material:</label>
                <input type="number" name="id_material" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500" value="{{ $order->id_material }}" required>
            </div>
            
            <div class="mb-4">
                <label for="jumlah_order" class="block text-gray-700 font-bold mb-2">Jumlah Order:</label>
                <input type="number" name="jumlah_order" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500" value="{{ $order->jumlah_order }}" required>
            </div>
            
            <div class="mb-4">
                <label for="tanggal_order" class="block text-gray-700 font-bold mb-2">Tanggal Order:</label>
                <input type="date" name="tanggal_order" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500" value="{{ $order->tanggal_order }}" required>
            </div>
            
            <div class="mb-4">
                <label for="status_order" class="block text-gray-700 font-bold mb-2">Status Order:</label>
                <input type="text" name="status_order" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500" value="{{ $order->status_order }}" required>
            </div>
            
            <div class="mb-4">
                <label for="keterangan" class="block text-gray-700 font-bold mb-2">Keterangan:</label>
                <input type="text" name="keterangan" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500" value="{{ $order->keterangan }}" required>
            </div>
            
            <button type="submit" class="bg-blue-500 text-white px-6 py-2 rounded-lg shadow-md hover:bg-blue-700 transition duration-300">Simpan Perubahan</button>
        </form>
    </div>
</body>
</html>
@endsection
