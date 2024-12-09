<!-- resources/views/admin/detail_proyek/pdf.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Laporan Detail Proyek</title>
</head>
<body>
    <h1>Laporan Detail Proyek</h1>
    <p>Tanggal: {{ $start_date }} sampai {{ $end_date }}</p>

    <table border="1" cellpadding="5">
        <thead>
            <tr>
                <th>ID</th>
                <th>Material</th>
                <th>Proyek ID</th>
                <th>Jumlah Digunakan</th>
                <th>Tanggal Digunakan</th>
                <th>Keterangan</th>
                <th>Biaya Penggunaan</th>
            </tr>
        </thead>
        <tbody>
            @foreach($detail_proyek as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->materialProyek->nama_material }}</td>
                    <td>{{ $item->proyek_id }}</td>
                    <td>{{ $item->jumlah_digunakan }}</td>
                    <td>{{ $item->tanggal_digunakan }}</td>
                    <td>{{ $item->keterangan }}</td>
                    <td>{{ $item->biaya_penggunaan }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
