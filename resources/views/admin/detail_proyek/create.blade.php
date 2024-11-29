@extends('admin.dashboard')

@section('title', 'Tambah Detail Proyek')

@section('content')
<div class="py-4">
    <div class="container-fluid px-4"> <!-- Menggunakan container-fluid untuk mengurangi padding -->
        <div class="row justify-content-center">
            <div class="col-12"> <!-- Full width form -->
                <div class="card shadow-sm">
                    <div class="card-header bg-primary text-white">
                        <h4 class="mb-0">Tambah Detail Proyek</h4>
                    </div>
                    <div class="card-body">
                        <p>
                            <a href="{{ route('admin.detail_proyek') }}" class="btn btn-secondary mb-3">
                                Kembali
                            </a>
                        </p>
                        
                        <form action="{{ route('admin.detail_proyek.store') }}" method="POST">
                            @csrf

                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="material_id" class="form-label">Material</label>
                                    <select name="material_id" id="material_id" class="form-control">
                                        <option value="">Pilih Material</option>
                                        @foreach ($material as $item)
                                            <option value="{{ $item->id }}">{{ $item->keterangan }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label for="kontrak_id" class="form-label">Kontrak</label>
                                    <select name="kontrak_id" id="kontrak_id" class="form-control">
                                        <option value="">Pilih Kontrak</option>
                                        @foreach ($kontrak as $item)
                                            <option value="{{ $item->id }}">{{ $item->deskripsi }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="lokasi" class="form-label">Lokasi Proyek</label>
                                    <input type="text" id="lokasi" name="lokasi" class="form-control" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="jumlah_digunakan" class="form-label">Jumlah Penggunaan Material</label>
                                    <input type="number" id="jumlah_digunakan" name="jumlah_digunakan" class="form-control" required>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="tanggal_digunakan" class="form-label">Tanggal Penggunaan Material</label>
                                    <input type="date" id="tanggal_digunakan" name="tanggal_digunakan" class="form-control" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="biaya_penggunaan" class="form-label">Biaya Penggunaan</label>
                                    <input type="number" id="biaya_penggunaan" name="biaya_penggunaan" class="form-control" required>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="keterangan" class="form-label">Keterangan</label>
                                <input type="text" id="keterangan" name="keterangan" class="form-control" required>
                            </div>

                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary">Tambah Detail Proyek</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
