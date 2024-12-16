@extends('admin.app')
@section('title', 'Create Pengiriman')
@section('navbar', 'Tambah Pengiriman')

@section('content')
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <p>
            <a href="{{ route('admin.pengiriman') }}" class="btn btn-secondary">
                Back
            </a>
        </p>
        <div class="d-flex flex-row justify-content-center">
            <div class="card bg-white overflow-hidden shadow-sm sm:rounded-lg" style="width: 30rem;">
                <div class="card-body text-gray-900">
                    <!-- Form Pengiriman -->
                    <form action="{{ route('admin.pengiriman.store') }}" method="POST">
                        @csrf

                        <div class="mb-4">
                            <label for="nomor_order" class="block text-gray-700 form-label">Order</label>
                            <select id="nomor_order" name="nomor_order" class="w-full p-2 border rounded form-control" required>
                                <option value="" disabled selected>Pilih Order</option>
                                @foreach($orderMaterials as $order)
                                    <option value="{{ $order->nomor_order }}">
                                        {{ $order->nomor_order }} - {{ $order->nama_material }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-4">
                            <label for="tanggal_kirim" class="block text-gray-700 form-label">Tanggal Kirim</label>
                            <input type="datetime-local" id="tanggal_kirim" name="tanggal_kirim" class="w-full p-2 border rounded form-control" required>
                        </div>

                        <div class="mb-4">
                            <label for="tanggal_selesai" class="block text-gray-700 form-label">Tanggal Selesai</label>
                            <input type="datetime-local" id="tanggal_selesai" name="tanggal_selesai" class="w-full p-2 border rounded form-control" required>
                        </div>

                        <div class="mb-4">
                            <label for="status_pengiriman" class="block text-gray-700 form-label">Status Pengiriman</label>
                            <select id="status_pengiriman" name="status_pengiriman" class="w-full p-2 border rounded form-control" required>
                                <option selected>Pilih Status</option>
                                <option value="proses">Proses</option>
                                <option value="dikirim">Di Kirim</option>
                                <option value="batal">Batal</option>
                            </select>
                        </div>

                        <!-- Tombol Submit -->
                        <button type="submit" class="btn btn-primary mt-4 w-100">Tambah Pengiriman</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
