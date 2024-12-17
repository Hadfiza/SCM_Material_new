@extends('admin.app')

@section('title', 'Supply Chain Visualization')

@section('content')
<div class="container mt-4" style="max-width: 100%; padding: 20px;">
    <h2 class="text-center mb-4">Visualisasi Kuantitas Order Material</h2>

    <!-- Form untuk memilih bulan -->
    <form action="{{ route('admin.alur_rantai.index') }}" method="GET">
        <label for="bulan">Pilih Bulan:</label>
        <select name="bulan" id="bulan" onchange="this.form.submit()">
            <option value="1" {{ request('bulan') == '1' ? 'selected' : '' }}>Januari</option>
            <option value="2" {{ request('bulan') == '2' ? 'selected' : '' }}>Februari</option>
            <option value="3" {{ request('bulan') == '3' ? 'selected' : '' }}>Maret</option>
            <option value="4" {{ request('bulan') == '4' ? 'selected' : '' }}>April</option>
            <option value="5" {{ request('bulan') == '5' ? 'selected' : '' }}>Mei</option>
            <option value="6" {{ request('bulan') == '6' ? 'selected' : '' }}>Juni</option>
            <option value="7" {{ request('bulan') == '7' ? 'selected' : '' }}>Juli</option>
            <option value="8" {{ request('bulan') == '8' ? 'selected' : '' }}>Agustus</option>
            <option value="9" {{ request('bulan') == '9' ? 'selected' : '' }}>September</option>
            <option value="10" {{ request('bulan') == '10' ? 'selected' : '' }}>Oktober</option>
            <option value="11" {{ request('bulan') == '11' ? 'selected' : '' }}>November</option>
            <option value="12" {{ request('bulan') == '12' ? 'selected' : '' }}>Desember</option>
        </select>
    </form>

    <div class="chart-container" style="position: relative; height:400px; width:100%; margin: 0 auto; background-color: #fff; border-radius: 8px; padding: 20px; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);">
        <canvas id="supplyChainChart"></canvas>
    </div>
</div>

<!-- Script untuk Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    // Data dari controller
    const orderIds = @json($dataOrders->pluck('id')); // ID ordermaterial
    const materials = @json($dataOrders->pluck('nama_material')); // Nama material
    const suppliers = @json($dataOrders->pluck('nama_pemasok')); // Nama pemasok
    const orders = @json($dataOrders->pluck('jumlah_order')); // Jumlah order
    const dates = @json($dataOrders->pluck('tanggal_order')); // Tanggal order

    // Format data untuk Chart.js
    const chartData = {
        labels: orderIds.map((id, index) => {
            // Menampilkan tanggal pada label x-axis bersama dengan ID order
            const date = new Date(dates[index]);
            return `Order ${id} - ${date.toLocaleDateString()}`;
        }), // Label berdasarkan ID ordermaterial dan tanggal order
        datasets: [{
            label: 'Jumlah Order',
            data: orders, // Jumlah order
            backgroundColor: 'rgba(75, 192, 192, 0.5)',
            borderColor: 'rgba(75, 192, 192, 1)',
            borderWidth: 1
        }]
    };

    // Konfigurasi Chart.js
    const ctx = document.getElementById('supplyChainChart').getContext('2d');
    const supplyChainChart = new Chart(ctx, {
        type: 'bar', // Jenis grafik
        data: chartData,
        options: {
            responsive: true,
            maintainAspectRatio: false, // Agar grafik menyesuaikan ukuran container
            plugins: {
                legend: {
                    position: 'top',
                },
                tooltip: {
                    callbacks: {
                        // Tooltip untuk menampilkan detail material, pemasok, dan tanggal
                        afterLabel: function(context) {
                            const index = context.dataIndex;
                            const date = new Date(dates[index]);
                            return `Material: ${materials[index]}\nPemasok: ${suppliers[index]}\nTanggal: ${date.toLocaleDateString()}`;
                        }
                    }
                }
            },
            scales: {
                x: {
                    title: {
                        display: true,
                        text: 'Order'
                    }
                },
                y: {
                    beginAtZero: true,
                    title: {
                        display: true,
                        text: 'Jumlah Order'
                    }
                }
            }
        }
    });
</script>

<!-- Styling langsung -->
<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f8f9fa;
    }

    .container {
        max-width: 1200px;
        margin: auto;
        padding: 20px;
        background-color: #fff;
        border-radius: 8px;
        box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
    }

    h2 {
        color: #333;
        font-weight: bold;
    }

    .chart-container {
        overflow: hidden;
        height: 400px;
        margin-top: 20px;
    }

    canvas {
        display: block;
        margin: 0 auto;
    }
</style>
@endsection
