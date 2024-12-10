@extends('admin.app')
@section('title', 'Tambah Material')

@section('content')
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Tambah Material Baru</title>
        <script src="https://cdn.tailwindcss.com"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
        </link>
        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    </head>

    <body class="bg-gray-100 font-roboto">
        <div class="container mx-auto py-12 px-4">
            <div class="bg-white shadow-lg rounded-lg p-8">
                <h3 class="text-3xl font-bold mb-8 text-gray-800">Tambah Material Baru</h3>

                <!-- Form to add new material -->
                <form action="{{ route('admin.material.store') }}" method="POST">
                    @csrf
                    <div class="mb-6">
                        <label for="nama_material" class="block text-gray-700 font-medium mb-2">Nama Material:</label>
                        <input type="text" name="nama_material"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                            required>
                    </div>

                    <div class="mb-6">
                        <label for="stok" class="block text-gray-700 font-medium mb-2">Stok (pcs):</label>
                        <input type="number" name="stok"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                            required>
                    </div>

                    <div class="mb-6">
                        <label for="harga_satuan" class="block text-gray-700 font-medium mb-2">Harga Satuan:</label>
                        <input type="number" name="harga_satuan"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                            required>
                    </div>

                    <div class="mb-6">
                        <label for="jenis_material" class="block text-gray-700 font-medium mb-2">Jenis Material:</label>
                        <input type="text" name="jenis_material"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                            required>
                    </div>

                    <div class="mb-6">
                        <label for="pemasok" class="block text-gray-700 font-medium mb-2">Pemasok:</label>
                        <select name="pemasok_id" required id="pemasok"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                            <option selected>Pilih Pemasok</option>
                            @foreach ($pemasok as $item)
                                <option value="{{ $item->id }}">{{ $item->nama_pemasok }}</option>
                            @endforeach
                        </select>
                    </div>

                    <button type="submit"
                        class="bg-blue-500 text-white px-6 py-2 rounded-lg hover:bg-blue-600 transition duration-300">Tambah
                        Material</button>
                </form>
            </div>
        </div>
    </body>

    </html>
@endsection
