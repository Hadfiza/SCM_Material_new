@extends('admin.app')

@section('content')
<div class="container">
    <h1>Material Proyek</h1>

    @if ($materialProyeks->isEmpty())
        <div class="alert alert-warning">Tidak ada material yang tersedia di proyek.</div>
    @else
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Material</th>
                    <th>Jenis Material</th>
                    <th>Stok</th>
                    <th>Harga Satuan</th>
                    <th>Total Harga</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($materialProyeks as $index => $materialProyek)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $materialProyek->nama_material }}</td>
                    <td>{{ $materialProyek->jenis_material }}</td>
                    <td>{{ $materialProyek->stok }}</td>
                    <td>Rp. {{ number_format($materialProyek->harga_satuan, 2, ',', '.') }}</td>
                    <td>Rp. {{ number_format($materialProyek->stok * $materialProyek->harga_satuan, 2, ',', '.') }}</td>
                    <td>
                        <a href="{{ route('admin.material_proyek.show', $materialProyek->id) }}" class="btn btn-info">Detail</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection
