@extends('layouts.app')

@section('content')
<div class="container py-4">
    <!-- Header -->
    <div class="mb-4">
        <h2 class="fw-bold"><i class="fas fa-heart text-danger me-2"></i>Breeding Program Dashboard</h2>
        <p class="text-muted">Kelola program perkawinan dan monitoring kehamilan kelinci Anda</p>
    </div>

    <!-- Statistics Cards -->
    <div class="row g-3 mb-4">
        <div class="col-md-3">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-start">
                        <div>
                            <h6 class="text-muted mb-2">Total Perkawinan</h6>
                            <h3 class="fw-bold mb-0">{{ $totalBreedings }}</h3>
                            <small class="text-primary">Semua Program</small>
                        </div>
                        <div class="bg-primary bg-opacity-10 p-3 rounded">
                            <i class="fas fa-heart text-primary fs-4"></i>
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
                            <h6 class="text-muted mb-2">Dijadwalkan</h6>
                            <h3 class="fw-bold mb-0">{{ $scheduledBreedings }}</h3>
                            <small class="text-warning">Aktif</small>
                        </div>
                        <div class="bg-warning bg-opacity-10 p-3 rounded">
                            <i class="fas fa-calendar-check text-warning fs-4"></i>
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
                            <h6 class="text-muted mb-2">Total Anak Lahir</h6>
                            <h3 class="fw-bold mb-0">{{ $totalOffspring ?? 0 }}</h3>
                            <small class="text-success">Keberhasilan</small>
                        </div>
                        <div class="bg-success bg-opacity-10 p-3 rounded">
                            <i class="fas fa-baby-carriage text-success fs-4"></i>
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
                            <h6 class="text-muted mb-2">Rata-rata Anak</h6>
                            <h3 class="fw-bold mb-0">{{ number_format($avgOffspring ?? 0, 1) }}</h3>
                            <small class="text-info">Per Kelahiran</small>
                        </div>
                        <div class="bg-info bg-opacity-10 p-3 rounded">
                            <i class="fas fa-chart-line text-info fs-4"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Active Breeding Rabbits -->
    <div class="row g-3 mb-4">
        <div class="col-md-6">
            <div class="card border-0 shadow-sm">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h5 class="mb-0"><i class="fas fa-venus text-warning me-2"></i>Indukan Aktif</h5>
                        <h3 class="fw-bold text-warning mb-0">{{ $activeFemales }}</h3>
                    </div>
                    <div class="progress" style="height: 10px;">
                        <div class="progress-bar bg-warning" style="width: {{ $activeFemales > 0 ? 100 : 0 }}%"></div>
                    </div>
                    <small class="text-muted mt-2 d-block">Betina siap breeding</small>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card border-0 shadow-sm">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h5 class="mb-0"><i class="fas fa-mars text-info me-2"></i>Pejantan Aktif</h5>
                        <h3 class="fw-bold text-info mb-0">{{ $activeMales }}</h3>
                    </div>
                    <div class="progress" style="height: 10px;">
                        <div class="progress-bar bg-info" style="width: {{ $activeMales > 0 ? 100 : 0 }}%"></div>
                    </div>
                    <small class="text-muted mt-2 d-block">Jantan siap breeding</small>
                </div>
            </div>
        </div>
    </div>

    <!-- To-Do Lists -->
    <div class="row g-3 mb-4">
        <!-- Upcoming Breeding Schedule -->
        <div class="col-md-4">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-header bg-primary text-white">
                    <h6 class="mb-0"><i class="fas fa-calendar-alt me-2"></i>Jadwal Perkawinan</h6>
                </div>
                <div class="card-body" style="max-height: 400px; overflow-y: auto;">
                    <div class="list-group list-group-flush">
                        @forelse($upcomingBreedings as $breeding)
                        <div class="list-group-item px-0 py-2 @if(!$loop->first) border-top @else border-0 @endif">
                            <div class="d-flex justify-content-between align-items-start mb-2">
                                <div class="flex-grow-1">
                                    <strong class="d-block">{{ $breeding->femaleRabbit->code }} <i class="fas fa-times small"></i> {{ $breeding->maleRabbit->code }}</strong>
                                    <small class="text-muted d-block">{{ $breeding->femaleRabbit->breed }} x {{ $breeding->maleRabbit->breed }}</small>
                                    <small class="text-primary"><i class="far fa-calendar me-1"></i>{{ \Carbon\Carbon::parse($breeding->breeding_date)->format('d M Y') }}</small>
                                </div>
                                <span class="badge bg-primary">{{ ucfirst($breeding->status) }}</span>
                            </div>
                            @if($breeding->notes)
                            <small class="text-muted"><i class="fas fa-sticky-note me-1"></i>{{ $breeding->notes }}</small>
                            @endif
                        </div>
                        @empty
                        <div class="list-group-item px-0 py-2 border-0 text-center">
                            <i class="fas fa-info-circle text-muted mb-2 fs-3"></i>
                            <p class="text-muted mb-0">Tidak ada jadwal perkawinan mendatang</p>
                        </div>
                        @endforelse
                    </div>
                    @if($upcomingBreedings->count() > 0)
                    <div class="mt-3 text-center">
                        <small class="text-muted"><i class="fas fa-heart me-1"></i>{{ $upcomingBreedings->count() }} pasangan dijadwalkan</small>
                    </div>
                    @endif
                </div>
            </div>
        </div>

        <!-- Pregnancy Check Needed -->
        <div class="col-md-4">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-header bg-warning text-dark">
                    <h6 class="mb-0"><i class="fas fa-stethoscope me-2"></i>Cek Kehamilan (Palpasi)</h6>
                </div>
                <div class="card-body" style="max-height: 400px; overflow-y: auto;">
                    <div class="list-group list-group-flush">
                        @forelse($pregnancyChecks as $check)
                        @php
                            $daysSinceBranding = \Carbon\Carbon::parse($check->breeding_date)->diffInDays(now());
                        @endphp
                        <div class="list-group-item px-0 py-2 @if(!$loop->first) border-top @else border-0 @endif">
                            <div class="d-flex justify-content-between align-items-start">
                                <div class="flex-grow-1">
                                    <strong class="d-block">{{ $check->femaleRabbit->code }}</strong>
                                    <small class="text-muted d-block">{{ $check->femaleRabbit->breed }}</small>
                                    <small class="text-warning"><i class="far fa-clock me-1"></i>Kawin {{ $daysSinceBranding }} hari lalu</small>
                                </div>
                                <span class="badge bg-warning text-dark">H+{{ $daysSinceBranding }}</span>
                            </div>
                        </div>
                        @empty
                        <div class="list-group-item px-0 py-2 border-0 text-center">
                            <i class="fas fa-check-circle text-success mb-2 fs-3"></i>
                            <p class="text-muted mb-0">Semua indukan sudah dicek</p>
                        </div>
                        @endforelse
                    </div>
                    @if($pregnancyChecks->count() > 0)
                    <div class="mt-3 text-center">
                        <small class="text-muted"><i class="fas fa-exclamation-circle me-1"></i>{{ $pregnancyChecks->count() }} indukan perlu dicek (>10 hari)</small>
                    </div>
                    @endif
                </div>
            </div>
        </div>

        <!-- Expected Births -->
        <div class="col-md-4">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-header bg-success text-white">
                    <h6 class="mb-0"><i class="fas fa-baby me-2"></i>Jadwal Kelahiran</h6>
                </div>
                <div class="card-body" style="max-height: 400px; overflow-y: auto;">
                    <div class="list-group list-group-flush">
                        @forelse($expectedBirths as $birth)
                        @php
                            $daysUntilBirth = \Carbon\Carbon::parse($birth->expected_birth_date)->diffInDays(now(), false);
                            $isOverdue = $daysUntilBirth > 0;
                        @endphp
                        <div class="list-group-item px-0 py-2 @if(!$loop->first) border-top @else border-0 @endif">
                            <div class="d-flex justify-content-between align-items-start">
                                <div class="flex-grow-1">
                                    <strong class="d-block">{{ $birth->femaleRabbit->code }}</strong>
                                    <small class="text-muted d-block">{{ $birth->femaleRabbit->breed }}</small>
                                    <small class="text-success"><i class="far fa-calendar-check me-1"></i>{{ \Carbon\Carbon::parse($birth->expected_birth_date)->format('d M Y') }}</small>
                                </div>
                                <span class="badge {{ $isOverdue ? 'bg-danger' : 'bg-success' }}">
                                    {{ $isOverdue ? 'Terlambat' : abs($daysUntilBirth) . ' hari' }}
                                </span>
                            </div>
                        </div>
                        @empty
                        <div class="list-group-item px-0 py-2 border-0 text-center">
                            <i class="fas fa-info-circle text-muted mb-2 fs-3"></i>
                            <p class="text-muted mb-0">Tidak ada jadwal kelahiran</p>
                        </div>
                        @endforelse
                    </div>
                    @if($expectedBirths->count() > 0)
                    <div class="mt-3 text-center">
                        <small class="text-muted"><i class="fas fa-baby me-1"></i>{{ $expectedBirths->count() }} kelahiran dijadwalkan</small>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <!-- Weaning Schedule -->
    @if($weaningSchedule->count() > 0)
    <div class="row g-3 mb-4">
        <div class="col-12">
            <div class="card border-0 shadow-sm">
                <div class="card-header bg-info text-white">
                    <h6 class="mb-0"><i class="fas fa-cut me-2"></i>Jadwal Sapih (30-35 Hari)</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover mb-0">
                            <thead>
                                <tr>
                                    <th>Kode Indukan</th>
                                    <th>Ras</th>
                                    <th>Tanggal Lahir</th>
                                    <th>Umur Anak</th>
                                    <th>Jumlah Anak</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($weaningSchedule as $wean)
                                @php
                                    $birthDate = \Carbon\Carbon::parse($wean->expected_birth_date);
                                    $ageInDays = $birthDate->diffInDays(now());
                                    $isReady = $ageInDays >= 30 && $ageInDays <= 40;
                                @endphp
                                <tr>
                                    <td><strong>{{ $wean->femaleRabbit->code }}</strong></td>
                                    <td>{{ $wean->femaleRabbit->breed }}</td>
                                    <td>{{ $birthDate->format('d M Y') }}</td>
                                    <td>{{ $ageInDays }} hari</td>
                                    <td><span class="badge bg-primary">{{ $wean->offspring_count }} anak</span></td>
                                    <td>
                                        <span class="badge {{ $isReady ? 'bg-success' : 'bg-warning' }}">
                                            {{ $isReady ? 'Siap Sapih' : 'Perhatian' }}
                                        </span>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="mt-3 text-center">
                        <small class="text-muted"><i class="fas fa-info-circle me-1"></i>{{ $weaningSchedule->sum('offspring_count') }} anak siap/perlu disapih</small>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif

    <!-- Monthly Statistics Chart -->
    <div class="row g-3 mb-4">
        <div class="col-12">
            <div class="card border-0 shadow-sm">
                <div class="card-header bg-white">
                    <h5 class="mb-0"><i class="fas fa-chart-bar me-2"></i>Statistik Perkawinan & Kelahiran (12 Bulan Terakhir)</h5>
                </div>
                <div class="card-body">
                    <canvas id="breedingChart" height="80"></canvas>
                </div>
            </div>
        </div>
    </div>

    <!-- Recent Breeding History -->
    <div class="row g-3 mb-4">
        <div class="col-12">
            <div class="card border-0 shadow-sm">
                <div class="card-header bg-white d-flex justify-content-between align-items-center">
                    <h5 class="mb-0"><i class="fas fa-history me-2"></i>Riwayat Perkawinan Terbaru</h5>
                    <div>
                        <span class="badge bg-primary me-1">{{ $scheduledBreedings }} Scheduled</span>
                        <span class="badge bg-success me-1">{{ $completedBreedings }} Completed</span>
                        <span class="badge bg-danger">{{ $cancelledBreedings }} Cancelled</span>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th>Tanggal Kawin</th>
                                    <th>Indukan (♀)</th>
                                    <th>Pejantan (♂)</th>
                                    <th>Ras</th>
                                    <th>Perkiraan Lahir</th>
                                    <th>Status</th>
                                    <th>Jumlah Anak</th>
                                    <th>Catatan</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($recentBreedings as $breeding)
                                <tr>
                                    <td>{{ \Carbon\Carbon::parse($breeding->breeding_date)->format('d M Y') }}</td>
                                    <td><strong>{{ $breeding->femaleRabbit->code }}</strong></td>
                                    <td><strong>{{ $breeding->maleRabbit->code }}</strong></td>
                                    <td>{{ $breeding->femaleRabbit->breed }}</td>
                                    <td>
                                        @if($breeding->expected_birth_date)
                                        {{ \Carbon\Carbon::parse($breeding->expected_birth_date)->format('d M Y') }}
                                        @else
                                        <span class="text-muted">-</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if($breeding->status === 'scheduled')
                                        <span class="badge bg-warning">Scheduled</span>
                                        @elseif($breeding->status === 'completed')
                                        <span class="badge bg-success">Completed</span>
                                        @else
                                        <span class="badge bg-danger">Cancelled</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if($breeding->offspring_count)
                                        <span class="badge bg-primary">{{ $breeding->offspring_count }} anak</span>
                                        @else
                                        <span class="text-muted">-</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if($breeding->notes)
                                        <small class="text-muted">{{ Str::limit($breeding->notes, 30) }}</small>
                                        @else
                                        <span class="text-muted">-</span>
                                        @endif
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="8" class="text-center text-muted py-4">
                                        <i class="fas fa-inbox fs-3 mb-2"></i>
                                        <p class="mb-0">Belum ada riwayat perkawinan</p>
                                    </td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    // Breeding Statistics Chart
    const ctx = document.getElementById('breedingChart').getContext('2d');
    const monthlyData = @json($monthlyData);
    
    const breedingChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: monthlyData.map(data => data.month),
            datasets: [{
                label: 'Perkawinan',
                data: monthlyData.map(data => data.breedings),
                backgroundColor: 'rgba(54, 162, 235, 0.6)',
                borderColor: 'rgba(54, 162, 235, 1)',
                borderWidth: 2,
                yAxisID: 'y'
            }, {
                label: 'Anak Lahir',
                data: monthlyData.map(data => data.offspring),
                backgroundColor: 'rgba(75, 192, 192, 0.6)',
                borderColor: 'rgba(75, 192, 192, 1)',
                borderWidth: 2,
                type: 'line',
                tension: 0.4,
                fill: false,
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
                            label += context.parsed.y;
                            if (context.dataset.label === 'Anak Lahir') {
                                label += ' anak';
                            } else {
                                label += ' kali';
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
                    title: {
                        display: true,
                        text: 'Jumlah Perkawinan'
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
                    title: {
                        display: true,
                        text: 'Jumlah Anak Lahir'
                    }
                }
            }
        }
    });
</script>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
@endsection
