@extends('layouts.app')

@section('title', 'Pengiriman')
@section('custom-css')
  <link rel="stylesheet" href="{{ asset('css/index.css') }}">
@endsection
@section('navbar', 'Pengiriman')

@section('content')
    <!-- Content -->
    <div>
        <div class="nav-search d-flex flex-row justify-content-between mt-3 mb-2">
                <!-- Tambah -->
              <div>
                <a href="{{ route('admin.pengiriman.create') }}" class="btn btn-success"><i class="bi bi-plus-lg me-2"></i>Tambah</a>
              </div>
               <!-- Search -->
              <form action="">
                <div class="d-flex flex-row">
                  <input type="text" placeholder="Search Proyek" class="form-control">
                  <input type="submit" value="Search" class="btn btn-primary">
                </div>
              </form>
        </div>
        <!-- Pengiriman-->
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Material ID</th>
                    <th>Tanggal Kirim</th>
                    <th>Tanggal Selesai</th>
                    <th>Estimasi</th>
                    <th>Status Pengiriman</th>                     
                    <th>Order ID</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pengiriman as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->material_id }}</td>
                        <td>{{ $item->tanggal_kirim }}</td>
                        <td>{{ $item->tanggal_selesai }}</td>
                        <td>{{ $item->estimasi }}</td>
                        <td>{{ $item->status_pengiriman }}</td>
                        <td>{{ $item->order_id }}</td>
                        <td>
                            <!-- Aksi Edit dan Hapus -->
                            <a href="{{ route('admin.pengiriman.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('admin.pengiriman.destroy', $item->id) }}" method="POST" style="display:inline;">
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
