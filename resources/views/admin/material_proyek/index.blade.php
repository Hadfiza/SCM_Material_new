@extends('admin.app')

@section('title', 'Daftar Material Proyek')

@section('content')
<div class="container mt-5">
    <h1 class="text-center">Daftar Material Proyek</h1>

    <!-- Tombol Back -->
    <div class="mb-4">
        <a href="{{ route('admin.proyek') }}" class="btn btn-secondary">Kembali</a>
    </div>

    <div class="mb-4">
        <form action="{{ route('material_proyek.sync') }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-primary">Sinkronisasi Material</button>
        </form>
    </div>

    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Material</th>
                <th>Stok</th>
                <th>Harga Satuan</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($materials as $material)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $material->nama_material }}</td>
                    <td>{{ $material->stok }}</td>
                    <td>Rp {{ number_format($material->harga_satuan, 2, ',', '.') }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="text-center">Belum ada data material proyek.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
