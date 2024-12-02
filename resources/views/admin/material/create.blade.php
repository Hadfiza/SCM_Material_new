@extends('admin.dashboard')

@section('title', 'Tambah Material')

@section('content')
<div class="py-12">
    <h3 class="mt-4">Tambah Material Baru</h3>

    <!-- Form untuk menambahkan material baru -->
    <form action="{{ route('admin.material.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="nama_material">Nama Material:</label>
            <input type="text" name="nama_material" class="form-control" required>
        </div>
        
        <div class="form-group">
            <label for="stok">Stok:</label>
            <input type="number" name="stok" class="form-control" required>
        </div>
        
        <div class="form-group">
            <label for="harga_total">Harga Total:</label>
            <input type="number" name="harga_total" class="form-control" required>
        </div>
        
        <div class="form-group">
            <label for="jenis_material">Jenis Material:</label>
            <input type="text" name="jenis_material" class="form-control" required>
        </div>
        
        <button type="submit" class="btn btn-primary">Tambah Material</button>
    </form>
</div>
@endsection
