
@extends('layouts.app')

@section('title', 'Material')
@section('custom-css')
  <link rel="stylesheet" href="{{ asset('css/index.css') }}">
@endsection
@section('navbar', 'Tambah Proyek')

@section('content')
<div class="nav">
    <a href="{{ route('admin.proyek') }}" class="btn btn-secondary mb-2 rounded ps-3 "> <i class="bi bi-arrow-90deg-left pe-2"></i>Back</a>
</div>
<div class="d-flex justify-content-center">
    <div class="card shadow" style="width: 30rem;">
        <div class="card-body">
            <form action="{{ route('admin.proyek.store') }}" method="post" enctype="multipart/form-data">   
                @csrf 
                <div class="mb-3">
                    <label for="nama_proyek" class="form-label">Nama Proyek</label><br>
                    <input type="text" class="form-control" id="nama_proyek" name="nama_proyek" required>
                </div>
        
                <div class="mb-3">
                    <label for="status" class="form-label">Status</label><br>
                    <select class="form-select" aria-label="Select" id="status" name="status" required>
                        <option selected>Status Option</option>
                        <option value="aktif">Aktif</option>
                        <option value="selesai">Selesai</option>
                        <option value="tertunda">Tertunda</option>
                    </select>
                </div>    
                
                <div class="mb-3">
                    <label for="lokasi" class="form-label">Lokasi</label><br>
                    <input type="text" name="lokasi" id="lokasi" class="form-control" required>
                </div>

    
                <div class="mb-3">
                    <input type="submit" value="Submit" class="btn btn-primary form-control" name="submit">
                </div>
            </form>
        </div>
    </div>       
</div>
@endsection 

