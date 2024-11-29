@extends('admin.dashboard')

@section('title', 'Daftar Proyek')

@section('content')
<div class="py-12">

                <!-- Tombol untuk menambahkan proyek-->
                <p>
                    <a href="{{ route('admin.proyek.create') }}" class="btn btn-primary">
                        Tambah Proyek
                    </a>
                </p>

                <!-- Daftar Proyek -->
                <h3 class="mt-4">Daftar Proyek</h3>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nama Proyek</th>
                            <th>Lokasi</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($proyek as $item)
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->nama_proyek }}</td>
                                <td>{{ $item->lokasi }}</td>
                                <td>{{ $item->status }}</td>
                                <td>
                                    <!-- Aksi Edit dan Hapus -->
                                    <a href="{{ route('admin.proyek.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                    <form action="{{ route('admin.proyek.destroy', $item->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
