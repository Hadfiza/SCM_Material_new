@extends('admin.dashboard')

@section('title', 'Update Proyek')

@section('content')
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900">
                <h1>Update Proyek</h1>
                <hr>

                <form action="{{ route('admin.proyek.update', $proyek->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label for="nama_proyek" class="form-label">Nama Proyek</label>
                        <input type="text" class="form-control" id="nama_proyek" name="nama_proyek" value="{{ $proyek->nama_proyek }}">
                    </div>


                    <div class="mb-3">
                        <label for="status" class="form-label">Status Proyek</label>
                        <select class="form-select" id="status" name="status">
                            <option value="aktif" {{ $proyek->status == 'aktif' ? 'selected' : '' }}>Aktif</option>
                            <option value="selesai" {{ $proyek->status == 'selesai' ? 'selected' : '' }}>Selesai</option>
                            <option value="tertunda" {{ $proyek->status == 'tertunda' ? 'selected' : '' }}>Tertunda</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="lokasi" class="form-label">Lokasi</label>
                        <input class="form-control" id="lokasi" name="lokasi" value="{{ $proyek->lokasi }}">
                    </div>

                    <button type="submit" class="btn btn-primary">Update Proyek</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
