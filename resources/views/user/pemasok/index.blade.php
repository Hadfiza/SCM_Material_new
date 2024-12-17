@extends('layouts.app')

@section('title', 'Daftar Pemasok')

@section('content')
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Pemasok</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"></link>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
        }
    </style>
</head>

<h1>Daftar Pemasok</h1>

<a href="{{ route('user.pemasok.create') }}" class="btn btn-primary mb-3">Tambah Pemasok</a>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>Nama Pemasok</th>
            <th>Alamat</th>
            <th>Kontak</th>
            <th>Kontrak</th>
            <th>Rating</th>
            <th>Aksi</th> <!-- Kolom untuk aksi -->
        </tr>
    </thead>
    <tbody>
        @foreach ($pemasok as $pemasok)
            <tr>
                <td>{{ $pemasok->nama_pemasok }}</td>
                <td>{{ $pemasok->alamat }}</td>
                <td>{{ $pemasok->kontak }}</td>
                <td>{{ $pemasok->kontrak ? $pemasok->kontrak->deskripsi : '-' }}</td>
                <td>{{ $pemasok->rating_pemasok }}</td>
                <td class="py-3 px-4 flex space-x-2">
                    <!-- Aksi Edit dan Hapus -->
                    <a href="{{ route('user.pemasok.edit', $pemasok->id) }}" class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-1 px-2 rounded text-sm shadow-md transition duration-300">
                        <i class="fas fa-edit"></i> Edit
                    </a>
                    <form action="{{ route('user.pemasok.destroy', $pemasok->id) }}" method="POST" class="inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-2 rounded text-sm shadow-md transition duration-300">
                            <i class="fas fa-trash"></i> Hapus
                        </button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

@endsection
