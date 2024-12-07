@extends('admin.app')
@section('title', 'Material Proyek')

@section('content')
<div class="container mx-auto py-12">
    <h3 class="text-2xl font-semibold text-gray-800 mb-6">Material Proyek</h3>

    @if(session('success'))
        <div class="bg-green-100 text-green-800 p-4 mb-4 rounded-lg">
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="bg-red-100 text-red-800 p-4 mb-4 rounded-lg">
            {{ session('error') }}
        </div>
    @endif

    <table class="table-auto w-full border-collapse">
        <thead>
            <tr>
                <th class="px-4 py-2 border">Nama Material</th>
                <th class="px-4 py-2 border">Stok</th>
                <th class="px-4 py-2 border">Harga Satuan</th>
                <th class="px-4 py-2 border">Jenis Material</th>
                <th class="px-4 py-2 border">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($materialProyeks as $materialProyek)
            <tr>
                <td class="px-4 py-2 border">{{ $materialProyek->nama_material }}</td>
                <td class="px-4 py-2 border">{{ $materialProyek->stok }}</td>
                <td class="px-4 py-2 border">{{ $materialProyek->harga_satuan }}</td>
                <td class="px-4 py-2 border">{{ $materialProyek->jenis_material }}</td>
                <td class="px-4 py-2 border">
                    <!-- Tombol untuk menambah material dari order material -->
                    <form action="{{ route('admin.material.storeFromOrder', $materialProyek->order_material_id) }}" method="POST">
                        @csrf
                        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-lg">
                            Tambah ke Proyek
                        </button>
                    </form>


                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
