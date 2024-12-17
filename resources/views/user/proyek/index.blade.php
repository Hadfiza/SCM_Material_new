<!-- resources/views/proyek/index.blade.php -->
@extends('layouts.app')

@section('content')
    <h1>Daftar Proyek</h1>
    <table class="table">
        <thead>
            <tr>
                <th>#</th>
                <th>Nama Proyek</th>
                <th>Deskripsi</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($proyek as $p)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $p->name }}</td>
                    <td>{{ $p->description }}</td>
                    <td>
                        <a href="{{ route('proyek.edit', $p->id) }}" class="btn btn-primary">Edit</a>
                        <form action="{{ route('proyek.destroy', $p->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
