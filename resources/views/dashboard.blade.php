@extends('layouts.app')

@section('content')
<div class="container py-4">
    <!-- Header -->
    <div class="mb-4">
        <h2 class="fw-bold">Dashboard Monitoring</h2>
        <p class="text-muted">Kelola peternakan kelinci Anda dengan mudah</p>
    </div>

    <!-- Rekapitulasi Total Populasi -->
    <div class="row g-3 mb-4">
        <div class="col-md-3">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-start">
                        <div>
                            <h6 class="text-muted mb-2">Total Populasi</h6>
                            <h3 class="fw-bold mb-0">{{ $totalRabbits }}</h3>
                            <small class="text-success">Kelinci Aktif</small>
                        </div>
                        <div class="bg-primary bg-opacity-10 p-3 rounded">
                            <i class="fas fa-rabbit text-primary fs-4"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-start">
                        <div>
                            <h6 class="text-muted mb-2">Jantan</h6>
                            <h3 class="fw-bold mb-0">{{ $maleRabbits }}</h3>
                            <small class="text-info">Pejantan Produktif</small>
                        </div>
                        <div class="bg-info bg-opacity-10 p-3 rounded">
                            <i class="fas fa-mars text-info fs-4"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-start">
                        <div>
                            <h6 class="text-muted mb-2">Indukan</h6>
                            <h3 class="fw-bold mb-0">{{ $femaleRabbits }}</h3>
                            <small class="text-warning">Betina Produktif</small>
                        </div>
                        <div class="bg-warning bg-opacity-10 p-3 rounded">
                            <i class="fas fa-venus text-warning fs-4"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-start">
                        <div>
                            <h6 class="text-muted mb-2">Sapihan & Anak</h6>
                            <h3 class="fw-bold mb-0">{{ $youngRabbits }}</h3>
                            <small class="text-danger">Kelinci Muda</small>
                        </div>
                        <div class="bg-danger bg-opacity-10 p-3 rounded">
                            <i class="fas fa-baby-carriage text-danger fs-4"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- To-Do List Hari Ini -->
    <div class="row g-3 mb-4">
        <!-- Daftar Cek Kehamilan -->
        <div class="col-md-6">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-header bg-warning text-dark">
                    <h6 class="mb-0"><i class="fas fa-stethoscope me-2"></i>Cek Kehamilan (Palpasi)</h6>
                </div>
                <div class="card-body">
                    <div class="list-group list-group-flush">
                        <div class="list-group-item px-0 py-2 border-0">
                            <div class="d-flex justify-content-between align-items-start">
                                <div>
                                    <strong class="d-block">ID-F019</strong>
                                    <small class="text-muted">Kawin 12 hari lalu</small>
                                </div>
                                <span class="badge bg-warning text-dark">H-10</span>
                            </div>
                        </div>
                        <div class="list-group-item px-0 py-2 border-top">
                            <div class="d-flex justify-content-between align-items-start">
                                <div>
                                    <strong class="d-block">ID-F027</strong>
                                    <small class="text-muted">Kawin 11 hari lalu</small>
                                </div>
                                <span class="badge bg-warning text-dark">H-11</span>
                            </div>
                        </div>
                        <div class="list-group-item px-0 py-2 border-top">
                            <div class="d-flex justify-content-between align-items-start">
                                <div>
                                    <strong class="d-block">ID-F033</strong>
                                    <small class="text-muted">Kawin 14 hari lalu</small>
                                </div>
                                <span class="badge bg-warning text-dark">H-14</span>
                            </div>
                        </div>
                    </div>
                    <div class="mt-3">
                        <small class="text-muted"><i class="fas fa-info-circle me-1"></i>5 indukan perlu dicek</small>
                    </div>
                </div>
            </div>
        </div>

        <!-- Daftar Sapih Hari Ini -->
        <div class="col-md-6">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-header bg-success text-white">
                    <h6 class="mb-0"><i class="fas fa-cut me-2"></i>Sapih Hari Ini</h6>
                </div>
                <div class="card-body">
                    <div class="list-group list-group-flush">
                        <div class="list-group-item px-0 py-2 border-0">
                            <div class="d-flex justify-content-between align-items-start">
                                <div>
                                    <strong class="d-block">ID-F015</strong>
                                    <small class="text-muted">8 anak (35 hari)</small>
                                </div>
                                <span class="badge bg-success">Siap</span>
                            </div>
                        </div>
                        <div class="list-group-item px-0 py-2 border-top">
                            <div class="d-flex justify-content-between align-items-start">
                                <div>
                                    <strong class="d-block">ID-F022</strong>
                                    <small class="text-muted">6 anak (38 hari)</small>
                                </div>
                                <span class="badge bg-success">Siap</span>
                            </div>
                        </div>
                        <div class="list-group-item px-0 py-2 border-top">
                            <div class="d-flex justify-content-between align-items-start">
                                <div>
                                    <strong class="d-block">ID-F029</strong>
                                    <small class="text-muted">7 anak (36 hari)</small>
                                </div>
                                <span class="badge bg-success">Siap</span>
                            </div>
                        </div>
                    </div>
                    <div class="mt-3">
                        <small class="text-muted"><i class="fas fa-info-circle me-1"></i>21 anak siap disapih</small>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Grafik Produksi -->
    <div class="card border-0 shadow-sm">
        <div class="card-header bg-white">
            <h5 class="mb-0"><i class="fas fa-chart-line me-2"></i>Grafik Produksi - Tren Kelahiran vs Kematian</h5>
        </div>
        <div class="card-body">
            <canvas id="productionChart" height="80"></canvas>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const ctx = document.getElementById('productionChart').getContext('2d');
    const productionChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agu', 'Sep', 'Okt', 'Nov', 'Des'],
            datasets: [{
                label: 'Kelahiran',
                data: [42, 38, 45, 52, 48, 55, 58, 51, 47, 53, 49, 56],
                borderColor: 'rgb(75, 192, 192)',
                backgroundColor: 'rgba(75, 192, 192, 0.1)',
                tension: 0.4,
                fill: true
            }, {
                label: 'Kematian',
                data: [3, 5, 2, 4, 3, 2, 4, 3, 5, 2, 4, 3],
                borderColor: 'rgb(255, 99, 132)',
                backgroundColor: 'rgba(255, 99, 132, 0.1)',
                tension: 0.4,
                fill: true
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: true,
            plugins: {
                legend: {
                    position: 'top',
                },
                tooltip: {
                    mode: 'index',
                    intersect: false,
                }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        stepSize: 10
                    }
                }
            }
        }
    });
</script>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
@endsection