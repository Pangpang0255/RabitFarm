@extends('layouts.app')

@section('content')
<div class="container-fluid py-4">
    <!-- Header -->
    <div class="mb-4">
        <h2 class="fw-bold mb-0">Dashboard Pemasaran</h2>
        <p class="text-muted small mb-0">Monitoring penjualan dan analisis pemasaran</p>
    </div>

    <!-- Statistics Cards -->
    <div class="row g-3 mb-4">
        <div class="col-lg-3 col-md-6">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body text-center py-4">
                    <div class="text-success mb-2"><i class="fas fa-dollar-sign fs-3"></i></div>
                    <h3 class="fw-bold mb-1" id="totalSales">Rp {{ number_format($totalSalesThisMonth, 0, ',', '.') }}</h3>
                    <p class="text-muted small mb-1">Total Penjualan</p>
                    <small class="badge bg-success" id="growthBadge">
                        <i class="fas fa-arrow-up"></i> {{ $growthPercentage }}%
                    </small>
                </div>
            </div>
        </div>
        
        <div class="col-lg-3 col-md-6">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body text-center py-4">
                    <div class="text-primary mb-2"><i class="fas fa-shopping-cart fs-3"></i></div>
                    <h3 class="fw-bold mb-1" id="totalTransactions">{{ $totalTransactionsThisMonth }}</h3>
                    <p class="text-muted small mb-1">Total Transaksi</p>
                    <small class="text-muted" style="visibility: hidden;">spacer</small>
                </div>
            </div>
        </div>
        
        <div class="col-lg-3 col-md-6">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body text-center py-4">
                    <div class="text-warning mb-2"><i class="fas fa-chart-line fs-3"></i></div>
                    <h3 class="fw-bold mb-1" id="averagePrice">Rp {{ number_format($averagePrice, 0, ',', '.') }}</h3>
                    <p class="text-muted small mb-1">Rata-rata / Transaksi</p>
                    <small class="text-muted" style="visibility: hidden;">spacer</small>
                </div>
            </div>
        </div>
        
        <div class="col-lg-3 col-md-6">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body text-center py-4">
                    <div class="text-info mb-2"><i class="fas fa-box fs-3"></i></div>
                    <h3 class="fw-bold mb-1" id="availableStock">{{ $availableStock }}</h3>
                    <p class="text-muted small mb-1">Stok Tersedia</p>
                    <small class="text-muted" style="visibility: hidden;">spacer</small>
                </div>
            </div>
        </div>
    </div>

    <!-- Charts Row -->
    <div class="row g-3 mb-4">
        <div class="col-lg-12">
            <div class="card border-0 shadow-sm">
                <div class="card-body">
                    <h5 class="mb-3"><i class="fas fa-chart-line text-primary me-2"></i>Trend Penjualan 12 Bulan</h5>
                    <canvas id="salesChart" height="80"></canvas>
                </div>
            </div>
        </div>
    </div>

    <!-- Recent Transactions -->
    <div class="card border-0 shadow-sm">
        <div class="card-body">
            <h5 class="mb-3"><i class="fas fa-list text-primary me-2"></i>Transaksi Terbaru</h5>
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="table-light">
                        <tr>
                            <th class="px-3 py-3 fw-normal">Tanggal</th>
                            <th class="py-3 fw-normal">Deskripsi</th>
                            <th class="py-3 fw-normal">Kategori</th>
                            <th class="py-3 fw-normal text-end">Jumlah</th>
                            <th class="py-3 fw-normal">Catatan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($recentTransactions as $transaction)
                        <tr>
                            <td class="px-3">
                                <div class="fw-bold">{{ \Carbon\Carbon::parse($transaction->transaction_date)->format('d M Y') }}</div>
                                <small class="text-muted">{{ \Carbon\Carbon::parse($transaction->transaction_date)->diffForHumans() }}</small>
                            </td>
                            <td>
                                <div class="fw-bold">{{ $transaction->description }}</div>
                            </td>
                            <td>
                                <span class="badge bg-primary">{{ ucfirst($transaction->category) }}</span>
                            </td>
                            <td class="text-end">
                                <div class="fw-bold text-success">Rp {{ number_format($transaction->amount, 0, ',', '.') }}</div>
                            </td>
                            <td>
                                <small class="text-muted">{{ $transaction->notes ?? '-' }}</small>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="text-center py-5">
                                <div class="text-muted mb-2"><i class="fas fa-shopping-cart fs-1"></i></div>
                                <h6 class="mb-1">Belum Ada Transaksi</h6>
                                <p class="text-muted small mb-0">Transaksi penjualan akan muncul di sini</p>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    // Sales Chart
    const salesCtx = document.getElementById('salesChart').getContext('2d');
    const salesChart = new Chart(salesCtx, {
        type: 'line',
        data: {
            labels: {!! json_encode(array_column($monthlySales, 'month')) !!},
            datasets: [{
                label: 'Penjualan (Rp)',
                data: {!! json_encode(array_column($monthlySales, 'sales')) !!},
                borderColor: 'rgb(75, 192, 192)',
                backgroundColor: 'rgba(75, 192, 192, 0.1)',
                tension: 0.4,
                fill: true
            }, {
                label: 'Jumlah Transaksi',
                data: {!! json_encode(array_column($monthlySales, 'quantity')) !!},
                borderColor: 'rgb(255, 159, 64)',
                backgroundColor: 'rgba(255, 159, 64, 0.1)',
                tension: 0.4,
                fill: true,
                yAxisID: 'y1'
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: true,
            interaction: {
                mode: 'index',
                intersect: false,
            },
            plugins: {
                legend: {
                    position: 'top',
                },
                tooltip: {
                    callbacks: {
                        label: function(context) {
                            let label = context.dataset.label || '';
                            if (label) {
                                label += ': ';
                            }
                            if (context.datasetIndex === 0) {
                                label += 'Rp ' + context.parsed.y.toLocaleString('id-ID');
                            } else {
                                label += context.parsed.y + ' transaksi';
                            }
                            return label;
                        }
                    }
                }
            },
            scales: {
                y: {
                    type: 'linear',
                    display: true,
                    position: 'left',
                    beginAtZero: true,
                    ticks: {
                        callback: function(value) {
                            return 'Rp ' + value.toLocaleString('id-ID');
                        }
                    }
                },
                y1: {
                    type: 'linear',
                    display: true,
                    position: 'right',
                    beginAtZero: true,
                    grid: {
                        drawOnChartArea: false,
                    },
                    ticks: {
                        callback: function(value) {
                            return value + ' transaksi';
                        }
                    }
                }
            }
        }
    });

    // Realtime data update function
    function updateMarketingData() {
        fetch('{{ route('dashboard.marketing.data') }}')
            .then(response => response.json())
            .then(data => {
                // Update total sales
                document.getElementById('totalSales').textContent = 'Rp ' + data.totalSalesThisMonth.toLocaleString('id-ID');
                
                // Update growth badge
                const growthBadge = document.getElementById('growthBadge');
                if (data.growthPercentage >= 0) {
                    growthBadge.className = 'badge bg-success';
                    growthBadge.innerHTML = '<i class="fas fa-arrow-up"></i> ' + data.growthPercentage + '%';
                } else {
                    growthBadge.className = 'badge bg-danger';
                    growthBadge.innerHTML = '<i class="fas fa-arrow-down"></i> ' + Math.abs(data.growthPercentage) + '%';
                }
                
                // Update other stats
                document.getElementById('totalTransactions').textContent = data.totalTransactionsThisMonth;
                document.getElementById('availableStock').textContent = data.availableStock;

                console.log('Marketing data updated successfully');
            })
            .catch(error => console.error('Error updating marketing data:', error));
    }

    // Update data every 30 seconds
    setInterval(updateMarketingData, 30000);
    
    // Initial update after 2 seconds
    setTimeout(updateMarketingData, 2000);
</script>

@endsection
