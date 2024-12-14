@extends('admin.app')

@section('content')
<div class="container mt-5">
    <div class="card shadow p-4">
        <h1 class="text-center mb-4">Tren Material yang Paling Banyak Dipesan</h1>
        <table class="table table-bordered table-hover text-center">
            <thead class="table-dark">
                <tr>
                    <th>No</th>
                    <th>Nama Material</th>
                    <th>Total Order</th>
                </tr>
            </thead>
            <tbody>
                @foreach($trends as $index => $trend)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $trend->nama_material }}</td>
                        <td>{{ $trend->total_order }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="text-center mt-4">
            <a href="{{ route('admin.proyek') }}" class="btn btn-secondary btn-lg">
                Kembali
            </a>
        </div>
    </div>
</div>
@endsection
