@extends('admin.dashboard')

@section('title', 'Daftar Detail Proyek')

@section('content')
<div class="py-12">

                <!-- Tombol untuk menambahkan proyek-->
                <p>
                    <a href="{{ route('admin.detail_proyek.create') }}" class="btn btn-primary">
                        Tambah Detail Proyek
                    </a>
                </p>

                <!-- Daftar Proyek -->
                <h3 class="mt-4">Daftar Detail Proyek</h3>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Material ID</th>
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
                                <td>{{ $item->material_id }}</td>
                                <td>{{ $item->proyek_id }}</td>
                                <td>{{ $item->jumlah_digunakan }}</td>
                                <td>{{ $item->tanggal_digunakan }}</td>
                                <td>{{ $item->keterangan }}</td>
                                <td>{{ $item->biaya_penggunaan }}</td>
                                <td>
                                    <!-- Aksi Edit dan Hapus -->
                                    <a href="{{ route('admin.detail_proyek.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                    <form action="{{ route('admin.detail_proyek.destroy', $item->id) }}" method="POST" style="display:inline;">
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
