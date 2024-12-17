@extends('admin.app')


@section('title', 'Supply Chain Visualization')

@section('content')
<div class="container mt-4" style="max-width: 100%; padding: 20px;">
    <h2 class="text-center mb-4">Visualisasi Kuantitas Order Material</h2>
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

    // Format data untuk Chart.js
    const chartData = {
        labels: orderIds.map((id) => `Order ${id}`), // Label berdasarkan ID ordermaterial
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
                        // Tooltip untuk menampilkan detail material dan pemasok
                        afterLabel: function(context) {
                            const index = context.dataIndex;
                            return `Material: ${materials[index]}\nPemasok: ${suppliers[index]}`;
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
