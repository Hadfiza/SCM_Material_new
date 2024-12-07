@extends('admin.app')
@section('title', 'Material Proyek')
@section('navbar', 'Material Proyek')

@section('content')
    <div>
        <!-- Daftar Material Proyek -->
        <div class="row g-2">
            @foreach ($materialProyeks as $material)
                <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-4">
                    <div class="card shadow">
                        <div class="card-header bg-white">
                            <h6 class="card-title mt-2">Material : <span class="text" style="color: #cb8742;">{{ $material->nama_material }}</span></h6>
                        </div>
                        <div class="card-body">
                            <p class="card-text">Stok : <span style="color: #cb8742;">{{ $material->stok }}</span></p>
                            <p class="card-text">Status Pengiriman : <span style="color: #cb8742;">{{ $material->pengiriman->status_pengiriman }}</span></p>
                            <div class="d-flex flex-row justify-content-between">
                                @if ($material->pengiriman->status_pengiriman === 'selesai')
                                    <form action="{{ route('admin.material.storeFromOrder', ['orderMaterialId' => $material->id]) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="btn btn-success">Tambah ke Proyek</button>
                                    </form>
                                @else
                                    <button class="btn btn-secondary" disabled>Pengiriman Belum Selesai</button>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
