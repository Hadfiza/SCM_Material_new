@extends('admin.app')
@section('title', 'Daftar Material')

@section('content')
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Material Management</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"></link>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
</head>
<body class="bg-gray-100 font-roboto">
    <div class="container mx-auto py-12 px-4">
        <div class="bg-gray-100">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-start space-x-8 border-b-2 border-gray-200">
                    <a href="{{ route('admin.material') }}" class="py-4 px-1 border-b-2 border-black font-medium text-gray-900">Material</a>
                    <a href="{{ route('admin.order') }}" class="py-4 px-1 border-b-2 border-transparent font-medium text-gray-500 hover:text-gray-700 hover:border-gray-300">Order</a>
                </div>
            </div>
        </div>

        <!-- Button to add material -->
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-bold text-gray-800">Material Management</h1>
            <a href="{{ route('admin.material.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 transition duration-300">
                <i class="fas fa-plus mr-2"></i>Tambah Material
            </a>
        </div>

        <!-- Material List -->
        <div class="bg-white shadow-md rounded-lg overflow-hidden">
            <h3 class="text-xl font-semibold bg-gray-200 p-4">Daftar Material</h3>
            <div class="overflow-x-auto">
                <table class="min-w-full bg-white">
                    <thead class="bg-gray-100">
                        <tr class="divide-x divide-gray-200">
                            <th class="px-6 py-3 border-b-2 border-gray-200 text-left text-sm leading-4 text-gray-600 uppercase tracking-wider">ID</th>
                            <th class="px-6 py-3 border-b-2 border-gray-200 text-left text-sm leading-4 text-gray-600 uppercase tracking-wider">Nama Material</th>
                            <th class="px-6 py-3 border-b-2 border-gray-200 text-left text-sm leading-4 text-gray-600 uppercase tracking-wider">Stok</th>
                            <th class="px-6 py-3 border-b-2 border-gray-200 text-left text-sm leading-4 text-gray-600 uppercase tracking-wider">Harga Satuan</th>
                            <th class="px-6 py-3 border-b-2 border-gray-200 text-left text-sm leading-4 text-gray-600 uppercase tracking-wider">Jenis Material</th>
                            <th class="px-6 py-3 border-b-2 border-gray-200 text-left text-sm leading-4 text-gray-600 uppercase tracking-wider">Pemasok</th>
                            <th class="px-6 py-3 border-b-2 border-gray-200 text-left text-sm leading-4 text-gray-600 uppercase tracking-wider">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach ($materials as $material)
                            <tr class="divide-x divide-gray-200">
                                <td class="px-6 py-4 text-sm">{{ $material->id }}</td>
                                <td class="px-6 py-4 text-sm">{{ $material->nama_material }}</td>
                                <td class="px-6 py-4 text-sm">{{ $material->stok }} pcs </td>
                                <td class="px-6 py-4 text-sm">{{ $material->harga_satuan }}</td>
                                <td class="px-6 py-4 text-sm">{{ $material->jenis_material }}</td>
                                <td class="px-6 py-4 text-sm">{{ $material->pemasok->nama_pemasok }}</td>
                                <td class="px-6 py-4 text-sm">
                                    <!-- Edit and Delete Actions -->
                                    <a href="{{ route('admin.material.edit', $material->id) }}" class="bg-yellow-500 text-white px-3 py-1 rounded hover:bg-yellow-600 transition duration-300 mr-2">
                                        <i class="fas fa-edit"></i> Edit
                                    </a>
                                    <form action="{{ route('admin.material.destroy', $material->id) }}" method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600 transition duration-300">
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
    </div>
</body>
</html>
@endsection
