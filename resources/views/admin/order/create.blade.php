@extends('admin.dashboard')

@section('title', 'Creat Order')

@section('content')
<div class="py-12">
    <h3 class="mt-4">Tambah Order Material</h3>

    <!-- Form untuk menambahkan order material baru -->
    <form action="{{ route('admin.order.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="id_material">ID Material:</label>
            <input type="number" name="id_material" class="form-control" required>
        </div>
        
        <div class="form-group">
            <label for="jumlah_order">Jumlah Order:</label>
            <input type="number" name="jumlah_order" class="form-control" required>
        </div>
        
        <div class="form-group">
            <label for="tanggal_order">Tanggal Order:</label>
            <input type="date" name="tanggal_order" class="form-control" required>
        </div>
        
        <div class="form-group">
            <label for="status_order">Status Order:</label>
            <input type="text" name="status_order" class="form-control" required>
        </div>
        
        <div class="form-group">
            <label for="keterangan">Keterangan:</label>
            <input type="text" name="keterangan" class="form-control" required>
        </div>
        
        <button type="submit" class="btn btn-primary">Tambah Order</button>
    </form>
</div>
@endsection
