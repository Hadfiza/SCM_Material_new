@extends('admin.app')

@section('title', 'Tambah Detail Proyek')

@section('content')
<div class="py-4">
    <div class="container-fluid px-4">
        <div class="row justify-content-center">
            <div class="col-12 col-md-8 col-lg-6">
                <div class="card shadow-lg">
                    <div class="card-header bg-primary text-white">
                        <h4 class="mb-0">Tambah Detail Proyek</h4>
                    </div>
                    <div class="card-body">
                        <!-- Tombol Back dengan ikon -->
                        <p>
                            <a href="{{ route('admin.detail_proyek.index', ['proyek_id' => $proyek_id]) }}" class="btn btn-secondary mb-3">
                                <i class="bi bi-arrow-left-circle"></i> Kembali
                            </a>
                        </p>

                        <form action="{{ route('admin.detail_proyek.store', ['proyek_id' => $proyek_id]) }}" method="POST">
                            @csrf

                            <!-- Input Hidden untuk Proyek ID -->
                            <input type="hidden" name="proyek_id" value="{{ $proyek_id }}">

                            <!-- Dropdown Material -->
                            <div class="mb-4">
                                <label for="material_id" class="form-label">Material:</label>
                                <select name="material_id" id="material_id"
                                        class="form-control form-control-lg @error('material_id') is-invalid @enderror" required>
                                    <option value="" disabled selected>Pilih Material</option>
                                    @foreach ($material_proyek as $material)
                                        <option value="{{ $material->id }}" data-harga="{{ $material->harga_satuan }}">
                                            {{ $material->nama_material }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('material_id')
                                    <p class="text-danger text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Input Jumlah Digunakan -->
                            <div class="mb-4">
                                <label for="jumlah_digunakan" class="form-label">Jumlah Penggunaan Material:</label>
                                <input type="number" id="jumlah_digunakan" name="jumlah_digunakan"
                                       class="form-control form-control-lg @error('jumlah_digunakan') is-invalid @enderror"
                                       min="1" required>
                                @error('jumlah_digunakan')
                                    <p class="text-danger text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Input Tanggal Penggunaan -->
                            <div class="mb-4">
                                <label for="tanggal_digunakan" class="form-label">Tanggal Penggunaan Material:</label>
                                <input type="date" id="tanggal_digunakan" name="tanggal_digunakan"
                                       class="form-control form-control-lg @error('tanggal_digunakan') is-invalid @enderror"
                                       required>
                                @error('tanggal_digunakan')
                                    <p class="text-danger text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Input Keterangan -->
                            <div class="mb-4">
                                <label for="keterangan" class="form-label">Keterangan:</label>
                                <textarea id="keterangan" name="keterangan"
                                          class="form-control form-control-lg @error('keterangan') is-invalid @enderror"
                                          rows="3" required></textarea>
                                @error('keterangan')
                                    <p class="text-danger text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Biaya Penggunaan -->
                            <div class="mb-4">
                                <label for="biaya_penggunaan" class="form-label">Biaya Penggunaan:</label>
                                <input type="text" id="biaya_penggunaan" class="form-control form-control-lg" disabled>
                            </div>

                            <!-- Tombol Submit -->
                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary btn-lg">Tambah Detail Proyek</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    // Menambahkan event listener pada dropdown material dan jumlah digunakan
    document.getElementById('material_id').addEventListener('change', updateBiaya);
    document.getElementById('jumlah_digunakan').addEventListener('input', updateBiaya);

    function updateBiaya() {
        var materialId = document.getElementById('material_id').value;
        var hargaSatuan = document.querySelector(`#material_id option[value="${materialId}"]`)?.getAttribute('data-harga') || 0;
        var jumlahDigunakan = document.getElementById('jumlah_digunakan').value;

        if (hargaSatuan > 0 && jumlahDigunakan > 0) {
            var biaya = hargaSatuan * jumlahDigunakan;
            document.getElementById('biaya_penggunaan').value = 'Rp ' + biaya.toLocaleString('id-ID');
        } else {
            document.getElementById('biaya_penggunaan').value = '';
        }
    }
</script>
@endsection
