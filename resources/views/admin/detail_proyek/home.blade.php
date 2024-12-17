@extends('admin.app')
@section('title', 'Daftar Detail Proyek')
@section('navbar','Detail Proyek')

@section('content')
<div class="py-12">

    <!-- Tombol untuk kembali ke halaman sebelumnya -->
    <p>
        <a href="{{ route('admin.proyek', ['proyek_id' => $proyek_id]) }}" class="btn btn-secondary">
            Kembali
        </a>
    </p>

    <div class="d-flex flex-row justify-content-between">
        <!-- Tombol untuk menambahkan proyek-->
         <div>
             <a href="{{ route('admin.detail_proyek.create', ['proyek_id' => $proyek_id]) }}" class="btn btn-primary">
                 Tambah Detail Proyek
             </a>
         </div>

        <!-- Form Filter Tanggal -->
         <div class="mb-3">
             <form action="{{ route('admin.detail_proyek.index', ['proyek_id' => $proyek_id]) }}" method="GET" class="form-inline d-flex flex-row">
                <div class="d-flex flex-row me-2">
                    <label for="start_date" class="mt-2">Dari:</label>
                    <input type="date" name="start_date" value="{{ request()->get('start_date') }}" class="form-control mx-2">
                </div>
                <div class="d-flex flex-row">
                    <label for="end_date" class="mt-2">Hingga:</label>
                    <input type="date" name="end_date" value="{{ request()->get('end_date') }}" class="form-control mx-2">
                </div>
                 <button type="submit" class="btn btn-primary">Filter</button>
             </form>
         </div>
    </div>


    <!-- Daftar Proyek -->
     <div class="d-flex flex-row justify-content-between mt-4">
        <div>
            <h3>Daftar Detail Proyek</h3>
        </div>
         <!-- Form Ekspor PDF -->
        <div class="mb-2">
            <form action="{{ route('admin.detail_proyek.exportPDF', ['proyek_id' => $proyek_id]) }}" method="GET" class="form-inline">
                <input type="hidden" name="start_date" value="{{ request()->get('start_date') }}">
                <input type="hidden" name="end_date" value="{{ request()->get('end_date') }}">
    
                <div class="d-flex flex-row justify-content-between">
                    <button type="submit" class="btn btn-danger text-nowrap">Ekspor ke PDF</button>
                </div>
            </form>
        </div>
     </div>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Proyek ID</th>
                <th>Material</th>
                <th>Jumlah Digunakan</th>
                <th>Harga Satuan</th>
                <th>Tanggal Digunakan</th>
                <th>Keterangan</th>
                <th>Biaya Penggunaan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($detail_proyek as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <!-- Menampilkan nama_material yang terkait -->
                    <td>{{ $item->proyek_id }} - {{ $item->proyek->nama_proyek ?? 'Tidak ada nama proyek' }}</td>
                    <td>{{ $item->materialProyek->nama_material ?? 'Tidak ada material' }}</td>
                    <td>{{ $item->jumlah_digunakan }}</td>
                    <td>{{ $item->materialProyek->harga_satuan ?? 'Tidak ada harga satuan' }}</td>
                    <td>{{ $item->tanggal_digunakan }}</td>
                    <td>{{ $item->keterangan }}</td>
                    <td>{{ $item->biaya_penggunaan }}</td>
                    <td>
                        <!-- Aksi Edit dan Hapus -->
                        <a href="{{ route('admin.detail_proyek.edit', ['proyek_id' => $proyek_id, 'id' => $item->id]) }}" class="btn btn-warning">
                            Edit
                        </a>

                        <form action="{{ route('admin.detail_proyek.destroy', ['proyek_id' => $proyek_id, 'id' => $item->id]) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Pagination Links -->
    <div class="mt-4">
        @if ($detail_proyek->count() > 0)
            {{ $detail_proyek->appends(request()->query())->links('vendor.pagination.bootstrap-5') }}
        @endif
    </div>


</div>
@endsection
