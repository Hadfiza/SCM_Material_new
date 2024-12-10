@extends('layouts.app')
@section('title', 'Daftar Order Material')

@section('content')
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Management</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"></link>
</head>
<body class="bg-gray-100">
    <div class="container mx-auto py-12">
        <div class="bg-gray-100">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

                <div class="flex justify-start space-x-8 border-b-2 border-gray-200">
                    <a href="{{ route('user.material') }}" class="py-4 px-1 border-b-2 border-transparent font-medium text-gray-500 hover:text-gray-700 hover:border-gray-300">Material</a>
                    <a href="{{ route('user.order') }}" class="py-4 px-1 border-b-2 border-black font-medium text-gray-900">Order</a>
                </div>
            </div>
        </div>

        <!-- Order Material List -->
        <div class="overflow-x-auto bg-white shadow-md rounded-lg">
            <table class="min-w-full bg-white">
                <thead class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                    <tr class="border-b border-gray-300">
                        <th class="py-3 px-6 text-left">ID</th>
                        <th class="py-3 px-6 text-left">Nama Material</th>
                        <th class="py-3 px-6 text-left">Nama Pemasok</th>
                        <th class="py-3 px-6 text-left">Harga Satuan</th> <!-- Tambahkan harga_satuan di sini -->
                        <th class="py-3 px-6 text-left">Jumlah Order</th>
                        <th class="py-3 px-6 text-left">Tanggal Order</th>
                        <th class="py-3 px-6 text-left">Keterangan</th>
                    </tr>
                </thead>
                <tbody class="text-gray-600 text-sm font-light">
                    @foreach ($orders as $order)
                        <tr class="border-b border-gray-200 hover:bg-gray-100">
                            <td class="py-3 px-6 text-left whitespace-nowrap">{{ $order->id }}</td>
                            <!-- Menampilkan hanya ID Material -->
                            <td class="py-3 px-6 text-left">
                                {{ $order->nama_material ?? 'Material Tidak Ditemukan' }}
                            </td>
                            <td class="py-3 px-6 text-left">
                                {{ $order->nama_pemasok?? 'Pemasok Tidak Ditemukan' }}
                            </td>
                            <td class="py-3 px-6 text-left">
                                {{ number_format($order->harga_satuan, 0, ',', '.') }} <!-- Menampilkan harga satuan -->
                            </td>
                            <td class="py-3 px-6 text-left">{{ $order->jumlah_order }}</td>
                            <td class="py-3 px-6 text-left">{{ $order->tanggal_order }}</td>
                            <td class="py-3 px-6 text-left">{{ $order->keterangan }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
@endsection
