@extends('admin.dashboard')

@section('title', 'Daftar Material')

@section('content')
<div class="py-12">
    <!-- Tombol untuk menambahkan material -->
    <p>
        <a href="{{ route('admin.material.create') }}" class="btn btn-primary">
            Tambah Material
        </a>
    </p>

    <!-- Daftar Material -->
    <h3 class="mt-4">Daftar Material</h3>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama Material</th>
                <th>Stok</th>
                <th>Harga Total</th>
                <th>Jenis Material</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($materials as $material)
                <tr>
                    <td>{{ $material->id }}</td>
                    <td>{{ $material->nama_material }}</td>
                    <td>{{ $material->stok }}</td>
                    <td>{{ $material->harga_total }}</td>
                    <td>{{ $material->jenis_material }}</td>
                    <td>
                        <!-- Aksi Edit dan Hapus -->
                        <a href="{{ route('admin.material.edit', $material->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('admin.material.destroy', $material->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
