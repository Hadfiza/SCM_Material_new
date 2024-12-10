@extends('admin.app')
@section('title', 'Daftar Detail Proyek')

@section('content')
<div class="py-12">

    <!-- Tombol untuk kembali ke halaman sebelumnya -->
    <p>
        <a href="{{ route('admin.proyek', ['proyek_id' => $proyek_id]) }}" class="btn btn-secondary">
            Kembali
        </a>
    </p>

    <!-- Tombol untuk menambahkan proyek-->
    <p>
        <a href="{{ route('admin.detail_proyek.create', ['proyek_id' => $proyek_id]) }}" class="btn btn-primary">
            Tambah Detail Proyek
        </a>
    </p>


<!-- Form Filter Tanggal -->
<form action="{{ route('admin.detail_proyek.index', ['proyek_id' => $proyek_id]) }}" method="GET" class="form-inline">
    <label for="start_date">Dari:</label>
    <input type="date" name="start_date" value="{{ request()->get('start_date') }}" class="form-control mx-2">

    <label for="end_date">Hingga:</label>
    <input type="date" name="end_date" value="{{ request()->get('end_date') }}" class="form-control mx-2">

    <button type="submit" class="btn btn-primary">Filter</button>
</form>

<!-- Form Ekspor PDF -->
<form action="{{ route('admin.detail_proyek.exportPDF', ['proyek_id' => $proyek_id]) }}" method="GET" class="form-inline">
    <label for="pdf_name">Nama File PDF:</label>
    <input type="text" name="pdf_name" class="form-control mx-2" placeholder="Nama file PDF" required>

    <button type="submit" class="btn btn-danger">Ekspor ke PDF</button>
</form>

    <!-- Daftar Proyek -->
    <h3 class="mt-4">Daftar Detail Proyek</h3>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Material</th>
                <th>Proyek ID</th>
                <th>Jumlah Digunakan</th>
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
                    <td>{{ $item->materialProyek->nama_material ?? 'Tidak ada material' }}</td>
                    <td>{{ $item->proyek_id }} - {{ $item->proyek->nama_proyek ?? 'Tidak ada nama proyek' }}</td>
                    <td>{{ $item->jumlah_digunakan }}</td>
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
