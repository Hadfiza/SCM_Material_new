@extends('admin.app')
@section('title', 'Material')
@section('custom-css')
  <link rel="stylesheet" href="{{ asset('css/index.css') }}">
@endsection
@section('navbar', 'Proyek')

@section('navbar', 'Proyek')

@section('content')
<div class="d-flex">

    <!-- Main Content -->
    <div class="flex-grow-1 p-4">
        <!-- Navbar Proyek dan Material Proyek -->
        <div class="d-flex justify-content-start align-items-center mb-4" style="background-color: #f8f9fa; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); padding: 10px; border-radius: 5px;">
            <a href="{{ route('admin.proyek') }}" class="me-4 text-xl font-medium text-black hover:text-gray-700" style="text-decoration: none; transition: color 0.3s;">
                Proyek
            </a>
            @if(isset($proyek) && $proyek->isNotEmpty())
                <a href="{{ route('material_proyek.index', $proyek->first()->id) }}" class="me-4 text-xl font-medium text-black hover:text-gray-700" style="text-decoration: none; transition: color 0.3s;">
                    Material Proyek
                </a>
            @endif
            <a href="{{ route('admin.order.trends') }}" class="ms-2 text-xl font-medium text-black hover:text-gray-700" style="text-decoration: none; transition: color 0.3s;">
                Trends Order Material
            </a>
        </div>
        
        

        <!-- Tombol Tambah -->
        <div class="d-flex justify-content-between mb-4">
            <a href="{{ route('admin.proyek.create') }}" class="btn btn-success text-lg">
                <i class="bi bi-plus-lg me-2"></i>Tambah
            </a>
            <form action="">
                <div class="d-flex">
                    <input type="text" placeholder="Search Proyek" class="form-control">
                    <input type="submit" value="Search" class="btn btn-primary">
                </div>
            </form>
        </div>

        <!-- Proyek Card -->
        <div class="row g-3">
            @foreach ($proyek as $item)
                <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-4">
                    <div class="card shadow" data-aos="zoom-in" data-aos-delay="200">
                        <div class="card-header bg-white">
                            <h6 class="card-title text-lg mt-2">
                                Proyek: <span class="text" style="color: #cb8742;">{{ $item->nama_proyek }}</span>
                            </h6>
                        </div>
                        <div class="card-body">
                            <p class="card-text text-lg">Lokasi: <span style="color: #cb8742;">{{ $item->lokasi }}</span></p>
                            <p class="card-text text-lg">Status: <span style="color: #cb8742;">{{ $item->status }}</span></p>
                            <div class="d-flex justify-content-between">
                                <div class="d-flex gap-2">
                                    <form action="{{ route('admin.proyek.destroy', $item->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger rounded-circle btn-sm">
                                            <i class="bi bi-trash3 text-white"></i>
                                        </button>
                                    </form>
                                    <a href="{{ route('admin.proyek.edit', $item->id) }}" class="btn btn-warning rounded-circle btn-sm">
                                        <i class="bi bi-pencil-square text-white"></i>
                                    </a>
                                </div>
                                <a href="{{ route('admin.detail_proyek.index', $item->id) }}" class="btn btn-outline-secondary btn-sm">
                                    view <i class="bi bi-arrow-right text-dark"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
