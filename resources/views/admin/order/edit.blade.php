@extends('admin.dashboard')

@section('title', 'Edit Order')

@section('content')
<div class="py-12">
    <h3 class="mt-4">Edit Order Material</h3>

    <!-- Form untuk mengedit order material -->
    <form action="{{ route('admin.order.update', $order->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="id_material">ID Material:</label>
            <input type="number" name="id_material" class="form-control" value="{{ $order->id_material }}" required>
        </div>
        
        <div class="form-group">
            <label for="jumlah_order">Jumlah Order:</label>
            <input type="number" name="jumlah_order" class="form-control" value="{{ $order->jumlah_order }}" required>
        </div>
        
        <div class="form-group">
            <label for="tanggal_order">Tanggal Order:</label>
            <input type="date" name="tanggal_order" class="form-control" value="{{ $order->tanggal_order }}" required>
        </div>
        
        <div class="form-group">
            <label for="status_order">Status Order:</label>
            <input type="text" name="status_order" class="form-control" value="{{ $order->status_order }}" required>
        </div>
        
        <div class="form-group">
            <label for="keterangan">Keterangan:</label>
            <input type="text" name="keterangan" class="form-control" value="{{ $order->keterangan }}" required>
        </div>
        
        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
    </form>
</div>
@endsection
