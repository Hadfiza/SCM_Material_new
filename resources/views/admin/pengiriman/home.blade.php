@extends('admin.app')
@section('title', 'Pengiriman')
@section('custom-css')
  <link rel="stylesheet" href="{{ asset('css/index.css') }}">
@endsection
@section('navbar', 'Pengiriman')

@section('content')
    <!-- Content -->
    <div>
        <div class="d-flex justify-content-between mt-3 mb-2">
            <!-- Tambah -->
            <div>
                <a href="{{ route('admin.pengiriman.create') }}" class="btn btn-success"><i class="bi bi-plus-lg me-2"></i>Tambah Pengiriman</a>
            </div>
            <!-- Search -->
            <form action="{{ route('admin.pengiriman') }}" method="GET" class="d-flex">
                <input type="text" name="search" placeholder="Search Order ID" class="form-control me-2" value="{{ request('search') }}">
                <button type="submit" class="btn btn-primary">Search</button>
            </form>
        </div>
        <!-- Pengiriman -->
        <table class="table table-bordered table-responsive">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Order ID</th>
                    <th>Tanggal Kirim</th>
                    <th>Tanggal Selesai</th>
                    <th>Status Pengiriman</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($pengiriman as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->order_id }}</td>
                        <td>{{ \Carbon\Carbon::parse($item->tanggal_kirim)->format('d-m-Y H:i:s') }}</td>
                        <td>{{ \Carbon\Carbon::parse($item->tanggal_selesai)->format('d-m-Y H:i:s') }}</td>
                        <td>{{ $item->status_pengiriman }}</td>
                        <td>
                            <!-- Aksi Edit dan Hapus -->
                            <a href="{{ route('admin.pengiriman.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('admin.pengiriman.destroy', $item->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus pengiriman ini?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center">Tidak ada data pengiriman ditemukan.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
