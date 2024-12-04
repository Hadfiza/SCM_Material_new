@extends('admin.dashboard')

@section('title', 'Edit Pengiriman')
@section('navbar', 'Edit Pengiriman')

@section('content')
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <p>
            <a href="{{ route('admin.pengiriman') }}" class="btn btn-secondary">
                back
            </a>
        </p>
        <div class="d-flex flex-row justify-content-center">
            <div class="card bg-white overflow-hidden shadow-sm sm:rounded-lg" style="width: 30rem;">       
                <div class=" card-body p-6 text-gray-900">
                    <form action="{{ route('admin.pengiriman.update', $pengiriman->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label for="material_id" class="form-label">Material ID</label>
                            <input type="text" class="form-control" id="material_id" name="material_id" value="{{ $pengiriman->material_id }}">
                        </div>

                        <div class="mb-3">
                            <label for="tanggal_kirim" class="form-label">Tanggal Kirim</label>
                            <input type="datetime-local" class="form-control" id="tanggal_kirim" name="tanggal_kirim" value="{{ $pengiriman->tanggal_kirim }}">
                        </div>

                        <div class="mb-3">
                            <label for="tanggal_selesai" class="form-label">Tanggal Selesai</label>
                            <input type="datetime-local" class="form-control" id="tanggal_selesai" name="tanggal_selesai" value="{{ $pengiriman->tanggal_selesai }}">
                        </div>

                        <div class="mb-3">
                            <label for="estimasi" class="form-label">Estimasi</label>
                            <input type="datetime-local" class="form-control" id="estimasi" name="estimasi" value="{{ $pengiriman->estimasi }}">
                        </div>
                        

                        <div class="mb-3">
                            <label for="status_pengiriman" class="form-label">Status Pengiriman</label>
                            <select class="form-select" id="status_pengiriman" name="status_pengiriman">
                                <option value="dikirim" {{ $pengiriman->status_pengiriman == 'dikirim' ? 'selected' : '' }}>Di Kirim</option>
                                <option value="proses" {{ $pengiriman->status_pengiriman == 'proses' ? 'selected' : '' }}>Proses</option>
                                <option value="batal" {{ $pengiriman->status_pengiriman == 'batal' ? 'selected' : '' }}>Batal</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="order_id" class="form-label">Order ID</label>
                            <input type="text" class="form-control" id="order_id" name="order_id" value="{{ $pengiriman->order_id }}">
                        </div>

                        <button type="submit" class="btn btn-primary">Update Pengiriman</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
