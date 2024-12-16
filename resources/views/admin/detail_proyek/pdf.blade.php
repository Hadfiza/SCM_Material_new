<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Detail Proyek</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        h1 {
            text-align: center;
            margin-bottom: 10px;
        }
        p {
            text-align: center;
            font-size: 14px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            text-align: left;
            padding: 8px;
        }
        th {
            background-color: #f2f2f2;
        }
        tfoot {
            font-weight: bold;
        }
        footer {
            margin-top: 30px;
            text-align: center;
            font-size: 12px;
            color: gray;
        }
    </style>
</head>
<body>
    <h1>Laporan Detail Proyek</h1>

    <p>
        @if($start_date && $end_date)
            Periode: <strong>{{ $start_date }}</strong> sampai <strong>{{ $end_date }}</strong>
        @else
            Semua Data
        @endif
    </p>

    <p>Nama Proyek: <strong>{{ $proyek->nama_proyek ?? 'Tidak Diketahui' }}</strong></p>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Proyek ID</th>
                <th>Material</th>
                <th>Jumlah Digunakan</th>
                <th>Harga Satuan</th>
                <th>Tanggal Digunakan</th>
                <th>Keterangan</th>
                <th>Biaya Penggunaan</th>
            </tr>
        </thead>
        <tbody>
            @forelse($detail_proyek as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->proyek_id }}</td>
                    <td>{{ $item->materialProyek->nama_material ?? 'Tidak Ada Data' }}</td>
                    <td>{{ $item->jumlah_digunakan }}</td>
                    <td>{{ $item->materialProyek->harga_satuan ?? 'Tidak Ada Data' }}</td>
                    <td>{{ $item->tanggal_digunakan }}</td>
                    <td>{{ $item->keterangan }}</td>
                    <td>{{ number_format($item->biaya_penggunaan, 2) }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="7" style="text-align: center;">Tidak ada data untuk periode ini</td>
                </tr>
            @endforelse
        </tbody>
        <tfoot>
            <tr>
                <td colspan="7" style="text-align: right;">Total Biaya Penggunaan:</td>
                <td>{{ number_format($detail_proyek->sum('biaya_penggunaan'), 2) }}</td>
            </tr>
        </tfoot>
    </table>

    <footer>
        Laporan ini dicetak pada {{ now()->format('d-m-Y H:i:s') }}
    </footer>
</body>
</html>