@extends('admin.app')
@section('title', 'Material')
@section('custom-css')
  <link rel="stylesheet" href="{{ asset('css/index.css') }}">
@endsection
@section('navbar', 'Proyek')

@section('content')
    <!-- Content -->
    <div>
        <!-- Search -->
        <div class="nav-search d-flex flex-row justify-content-between mt-3 mb-2">
            <div class="d-flex flex-row gap-2">
                <a href="{{ route('admin.proyek.create') }}" class="btn btn-success"><i class="bi bi-plus-lg me-2"></i>Tambah</a>
            </div>
            <form action="">
                <div class="d-flex flex-row">
                    <input type="text" placeholder="Search Proyek" class="form-control">
                    <input type="submit" value="Search" class="btn btn-primary">
                </div>
            </form>
        </div>

        <!-- Proyek Card -->
        <div class="row g-2">
            @foreach ($proyek as $item)
                <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-4">
                    <div class="card shadow" data-aos="zoom-in" data-aos-delay="200">
                        <div class="card-header bg-white">
                            <h6 class="card-title mt-2">Proyek : <span class="text" style="color: #cb8742;">{{ $item->nama_proyek }}</span></h6>
                        </div>
                        <div class="card-body">
                            <p class="card-text">Lokasi : <span style="color: #cb8742;">{{ $item->lokasi }}</span></p>
                            <p class="card-text">Status : <span style="color: #cb8742;">{{ $item->status }}</span></p>
                            <div class="d-flex flex-row justify-content-between">
                                <div class="d-flex flex-row justify-content-start gap-2">
                                    <form action="{{ route('admin.proyek.destroy', $item->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger rounded-circle btn-sm"><i class="bi bi-trash3 text-white"></i></button>
                                    </form>
                                    <a href="{{ route('admin.proyek.edit', $item->id) }}" class="btn btn-warning rounded-circle btn-sm"><i class="bi bi-pencil-square text-white"></i></a>
                                </div>
                                <a href="{{ route('admin.detail_proyek.index', $item->id) }}" class="btn btn-outline-secondary btn-sm">view <i class="bi bi-arrow-right text-dark"></i></a>
                            </div>
                            <!-- Tombol Material Proyek harus berada di dalam loop -->
                            <a href="{{ route('material_proyek.index', $item->id) }}" class="btn btn-primary btn-sm mt-2">Material Proyek</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
