@extends('admin.dashboard')

@section('title', 'Update Detail Proyek')

@section('content')
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900">
                <h1>Update Detail Proyek</h1>
                <hr>

                <form action="{{ route('admin.detail_proyek.update', $detail_proyek->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label for="material_id" class="form-label">Material ID</label>
                        <input type="text" class="form-control" id="material_id" name="material_id" value="{{ $detail_proyek->material_id }}">
                    </div>

                    <div class="mb-3">
                        <label for="proyek_id" class="form-label">Proyek ID</label>
                        <input class="form-control" id="proyek_id" name="proyek_id" value="{{ $detail_proyek->proyek_id }}">
                    </div>

                    <div class="mb-3">
                        <label for="jumlah_digunakan" class="form-label">Jumlah Digunakan</label>
                        <input class="form-control" id="jumlah_digunakan" name="jumlah_digunakan" value="{{ $detail_proyek->jumlah_digunakan }}">
                    </div>

                    <div class="mb-3">
                        <label for="tanggal_digunakan" class="form-label">Tanggal Digunakan</label>
                        <input class="form-control" id="tanggal_digunakan" name="tanggal_digunakan" value="{{ $detail_proyek->tanggal_digunakan }}">
                    </div>

                    <div class="mb-3">
                        <label for="keterangan" class="form-label">Keterangan</label>
                        <input class="form-control" id="keterangan" name="keterangan" value="{{ $detail_proyek->keterangan }}">
                    </div>

                    <div class="mb-3">
                        <label for="lokasi" class="form-label">Biaya Penggunaan</label>
                        <input class="form-control" id="lokasi" name="lokasi" value="{{ $detail_proyek->lokasi }}">
                    </div>

                    <button type="submit" class="btn btn-primary">Update Detail Proyek</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
