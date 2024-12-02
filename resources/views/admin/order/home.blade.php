@extends('admin.dashboard')

@section('title', 'Update Detail Proyek')

@section('content')
<div class="py-12">
    <!-- Tombol untuk menambahkan order -->
    <p>
        <a href="{{ route('admin.order.create') }}" class="btn btn-primary">
            Tambah Order
        </a>
    </p>

    <!-- Daftar Order Material -->
    <h3 class="mt-4">Daftar Order Material</h3>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>ID Material</th>
                <th>Jumlah Order</th>
                <th>Tanggal Order</th>
                <th>Status Order</th>
                <th>Keterangan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($orders as $order)
                <tr>
                    <td>{{ $order->id }}</td>
                    <td>{{ $order->id_material }}</td>
                    <td>{{ $order->jumlah_order }}</td>
                    <td>{{ $order->tanggal_order }}</td>
                    <td>{{ $order->status_order }}</td>
                    <td>{{ $order->keterangan }}</td>
                    <td>
                        <!-- Aksi Edit dan Hapus -->
                        <a href="{{ route('admin.order.edit', $order->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('admin.order.destroy', $order->id) }}" method="POST" style="display:inline;">
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
