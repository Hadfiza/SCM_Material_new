@extends('admin.dashboard')

@section('title', 'Edit Material')

@section('content')
<div class="py-12">
    <h3 class="mt-4">Edit Material</h3>

    <!-- Form untuk mengedit material -->
    <form action="{{ route('admin.material.update', $material->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="nama_material">Nama Material:</label>
            <input type="text" name="nama_material" class="form-control" value="{{ $material->nama_material }}" required>
        </div>
        
        <div class="form-group">
            <label for="stok">Stok:</label>
            <input type="number" name="stok" class="form-control" value="{{ $material->stok }}" required>
        </div>
        
        <div class="form-group">
            <label for="harga_total">Harga Total:</label>
            <input type="number" name="harga_total" class="form-control" value="{{ $material->harga_total }}" required>
        </div>
        
        <div class="form-group">
            <label for="jenis_material">Jenis Material:</label>
            <input type="text" name="jenis_material" class="form-control" value="{{ $material->jenis_material }}" required>
        </div>
        
        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
    </form>
</div>
@endsection
