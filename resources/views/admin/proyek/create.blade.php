@extends('admin.dashboard')

@section('title', 'Tambah Proyek')

@section('content')
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900">
                <h1 class="mb-0">Add Proyek</h1>
                <p>
                    <a href="{{ route('admin.proyek') }}" class="btn btn-primary">
                        back
                    </a>
                </p>

                <hr>

                <!-- Form Proyek -->
                <form action="{{ route('admin.proyek.store') }}" method="POST">
                    @csrf

                    <div class="mb-4">
                        <label for="nama_proyek" class="block text-gray-700">Nama Proyek</label>
                        <input type="text" id="nama_proyek" name="nama_proyek" class="w-full p-2 border rounded" required>
                    </div>


                    <div class="mb-4">
                        <label for="status" class="block text-gray-700">Status Proyek</label>
                        <select id="status" name="status" class="w-full p-2 border rounded" required>
                            <option value="Aktif">Aktif</option>
                            <option value="Selesai">Selesai</option>
                            <option value="Tertunda">Tertunda</option>
                        </select>
                    </div>

                    <div class="mb-4">
                        <label for="lokasi" class="block text-gray-700">Lokasi Proyek</label>
                        <input id="lokasi" name="lokasi" class="w-full p-2 border rounded" required>
                    </div>

                    <!-- Tombol Submit -->
                    <button type="submit" class="btn btn-primary mt-4">Tambah Proyek</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
