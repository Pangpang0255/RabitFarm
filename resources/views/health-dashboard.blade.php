@extends('layouts.app')

@section('content')
<div class="container py-4">
    <!-- Header -->
    <div class="mb-4">
        <h2 class="fw-bold"><i class="fas fa-heartbeat text-success me-2"></i>Dashboard Kesehatan</h2>
        <p class="text-muted">Monitoring kesehatan, vaksinasi dan medical records kelinci Anda</p>
    </div>

    <!-- Statistics Cards -->
    <div class="row g-3 mb-4">
        <div class="col-md-3">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-start">
                        <div>
                            <h6 class="text-muted mb-2">Total Pemeriksaan</h6>
                            <h3 class="fw-bold mb-0">{{ $totalHealthRecords }}</h3>
                            <small class="text-primary">Medical Records</small>
                        </div>
                        <div class="bg-primary bg-opacity-10 p-3 rounded">
                            <i class="fas fa-file-medical text-primary fs-4"></i>
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
                            <h6 class="text-muted mb-2">Sembuh</h6>
                            <h3 class="fw-bold mb-0">{{ $recoveredCount }}</h3>
                            <small class="text-success">Recovered</small>
                        </div>
                        <div class="bg-success bg-opacity-10 p-3 rounded">
                            <i class="fas fa-check-circle text-success fs-4"></i>
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
                            <h6 class="text-muted mb-2">Dalam Perawatan</h6>
                            <h3 class="fw-bold mb-0">{{ $underTreatmentCount }}</h3>
                            <small class="text-warning">Under Treatment</small>
                        </div>
                        <div class="bg-warning bg-opacity-10 p-3 rounded">
                            <i class="fas fa-procedures text-warning fs-4"></i>
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
                            <h6 class="text-muted mb-2">Kritis</h6>
                            <h3 class="fw-bold mb-0">{{ $criticalCount }}</h3>
                            <small class="text-danger">Critical Cases</small>
                        </div>
                        <div class="bg-danger bg-opacity-10 p-3 rounded">
                            <i class="fas fa-exclamation-triangle text-danger fs-4"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Health Status -->
    <div class="row g-3 mb-4">
        <div class="col-md-6">
            <div class="card border-0 shadow-sm">
                <div class="card-body">
                    <h5 class="mb-3"><i class="fas fa-heartbeat text-success me-2"></i>Status Kesehatan Populasi</h5>
                    <div class="row">
                        <div class="col-6 text-center">
                            <h2 class="fw-bold text-success">{{ $healthyRabbits }}</h2>
                            <p class="text-muted mb-2">Sehat</p>
                            <div class="progress" style="height: 10px;">
                                <div class="progress-bar bg-success" style="width: {{ $healthPercentage }}%"></div>
                            </div>
                            <small class="text-muted">{{ $healthPercentage }}%</small>
                        </div>
                        <div class="col-6 text-center">
                            <h2 class="fw-bold text-danger">{{ $sickRabbits }}</h2>
                            <p class="text-muted mb-2">Sakit</p>
                            <div class="progress" style="height: 10px;">
                                <div class="progress-bar bg-danger" style="width: {{ $sickPercentage }}%"></div>
                            </div>
                            <small class="text-muted">{{ $sickPercentage }}%</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card border-0 shadow-sm">
                <div class="card-body">
                    <h5 class="mb-3"><i class="fas fa-chart-pie text-info me-2"></i>Diagnosa Paling Sering</h5>
                    <div class="list-group list-group-flush">
                        @forelse($commonDiagnoses as $index => $diagnosis)
                        <div class="list-group-item px-0 py-2 d-flex justify-content-between align-items-center @if($index > 0) border-top @else border-0 @endif">
                            <div>
                                <span class="badge bg-secondary me-2">{{ $index + 1 }}</span>
                                <strong>{{ $diagnosis->diagnosis }}</strong>
                            </div>
                            <span class="badge bg-primary">{{ $diagnosis->count }} kasus</span>
                        </div>
                        @empty
                        <p class="text-muted mb-0">Belum ada data diagnosa</p>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Critical Cases Alert -->
    @if($criticalCases->count() > 0)
    <div class="row g-3 mb-4">
        <div class="col-12">
            <div class="card border-danger shadow-sm">
                <div class="card-header bg-danger text-white">
                    <h6 class="mb-0"><i class="fas fa-exclamation-triangle me-2"></i>KASUS KRITIS - PERLU PERHATIAN SEGERA!</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover mb-0">
                            <thead>
                                <tr>
                                    <th>Kode Kelinci</th>
                                    <th>Nama</th>
                                    <th>Diagnosa</th>
                                    <th>Gejala</th>
                                    <th>Tanggal Cek</th>
                                    <th>Pengobatan</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($criticalCases as $case)
                                <tr class="table-danger">
                                    <td><strong>{{ $case->rabbit->code }}</strong></td>
                                    <td>{{ $case->rabbit->name }}</td>
                                    <td><span class="badge bg-danger">{{ $case->diagnosis }}</span></td>
                                    <td>{{ Str::limit($case->symptoms, 40) }}</td>
                                    <td>{{ \Carbon\Carbon::parse($case->check_date)->format('d M Y') }}</td>
                                    <td>{{ Str::limit($case->treatment, 30) }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif

    <!-- Action Lists -->
    <div class="row g-3 mb-4">
        <!-- Overdue Checks -->
        <div class="col-md-4">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-header bg-danger text-white">
                    <h6 class="mb-0"><i class="fas fa-calendar-times me-2"></i>Terlambat Cek</h6>
                </div>
                <div class="card-body" style="max-height: 400px; overflow-y: auto;">
                    <div class="list-group list-group-flush">
                        @forelse($overdueChecks as $check)
                        @php
                            $daysOverdue = \Carbon\Carbon::parse($check->next_check_date)->diffInDays(now());
                        @endphp
                        <div class="list-group-item px-0 py-2 @if(!$loop->first) border-top @else border-0 @endif">
                            <div class="d-flex justify-content-between align-items-start">
                                <div class="flex-grow-1">
                                    <strong class="d-block text-danger">{{ $check->rabbit->code }}</strong>
                                    <small class="text-muted d-block">{{ $check->diagnosis }}</small>
                                    <small class="text-danger"><i class="far fa-calendar-times me-1"></i>Terlambat {{ $daysOverdue }} hari</small>
                                </div>
                                <span class="badge bg-danger">URGENT</span>
                            </div>
                        </div>
                        @empty
                        <div class="list-group-item px-0 py-2 border-0 text-center">
                            <i class="fas fa-check-circle text-success mb-2 fs-3"></i>
                            <p class="text-muted mb-0">Semua cek tepat waktu</p>
                        </div>
                        @endforelse
                    </div>
                    @if($overdueChecks->count() > 0)
                    <div class="mt-3 text-center">
                        <small class="text-danger"><i class="fas fa-exclamation-circle me-1"></i>{{ $overdueChecks->count() }} kelinci terlambat cek</small>
                    </div>
                    @endif
                </div>
            </div>
        </div>

        <!-- Upcoming Checks -->
        <div class="col-md-4">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-header bg-warning text-dark">
                    <h6 class="mb-0"><i class="fas fa-calendar-check me-2"></i>Jadwal Cek Kesehatan</h6>
                </div>
                <div class="card-body" style="max-height: 400px; overflow-y: auto;">
                    <div class="list-group list-group-flush">
                        @forelse($upcomingChecks as $check)
                        @php
                            $daysUntil = \Carbon\Carbon::parse($check->next_check_date)->diffInDays(now(), false);
                        @endphp
                        <div class="list-group-item px-0 py-2 @if(!$loop->first) border-top @else border-0 @endif">
                            <div class="d-flex justify-content-between align-items-start">
                                <div class="flex-grow-1">
                                    <strong class="d-block">{{ $check->rabbit->code }}</strong>
                                    <small class="text-muted d-block">{{ $check->diagnosis }}</small>
                                    <small class="text-warning"><i class="far fa-calendar me-1"></i>{{ \Carbon\Carbon::parse($check->next_check_date)->format('d M Y') }}</small>
                                </div>
                                <span class="badge bg-warning text-dark">{{ abs($daysUntil) }} hari</span>
                            </div>
                        </div>
                        @empty
                        <div class="list-group-item px-0 py-2 border-0 text-center">
                            <i class="fas fa-info-circle text-muted mb-2 fs-3"></i>
                            <p class="text-muted mb-0">Tidak ada jadwal cek</p>
                        </div>
                        @endforelse
                    </div>
                    @if($upcomingChecks->count() > 0)
                    <div class="mt-3 text-center">
                        <small class="text-muted"><i class="fas fa-calendar me-1"></i>{{ $upcomingChecks->count() }} jadwal mendatang</small>
                    </div>
                    @endif
                </div>
            </div>
        </div>

        <!-- Under Treatment -->
        <div class="col-md-4">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-header bg-info text-white">
                    <h6 class="mb-0"><i class="fas fa-procedures me-2"></i>Dalam Perawatan</h6>
                </div>
                <div class="card-body" style="max-height: 400px; overflow-y: auto;">
                    <div class="list-group list-group-flush">
                        @forelse($underTreatment as $treatment)
                        <div class="list-group-item px-0 py-2 @if(!$loop->first) border-top @else border-0 @endif">
                            <div class="d-flex justify-content-between align-items-start">
                                <div class="flex-grow-1">
                                    <strong class="d-block">{{ $treatment->rabbit->code }}</strong>
                                    <small class="text-muted d-block">{{ $treatment->diagnosis }}</small>
                                    @if($treatment->medicine)
                                    <small class="text-info"><i class="fas fa-pills me-1"></i>{{ Str::limit($treatment->medicine, 25) }}</small>
                                    @endif
                                </div>
                                <span class="badge bg-info">Treatment</span>
                            </div>
                        </div>
                        @empty
                        <div class="list-group-item px-0 py-2 border-0 text-center">
                            <i class="fas fa-smile text-success mb-2 fs-3"></i>
                            <p class="text-muted mb-0">Semua kelinci sehat</p>
                        </div>
                        @endforelse
                    </div>
                    @if($underTreatment->count() > 0)
                    <div class="mt-3 text-center">
                        <small class="text-muted"><i class="fas fa-procedures me-1"></i>{{ $underTreatment->count() }} kelinci dalam perawatan</small>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <!-- Vaccination Records -->
    @if($vaccinations->count() > 0)
    <div class="row g-3 mb-4">
        <div class="col-12">
            <div class="card border-0 shadow-sm">
                <div class="card-header bg-success text-white">
                    <h6 class="mb-0"><i class="fas fa-syringe me-2"></i>Riwayat Vaksinasi</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th>Kode Kelinci</th>
                                    <th>Nama</th>
                                    <th>Tanggal</th>
                                    <th>Jenis Vaksin</th>
                                    <th>Catatan</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($vaccinations as $vac)
                                <tr>
                                    <td><strong>{{ $vac->rabbit->code }}</strong></td>
                                    <td>{{ $vac->rabbit->name }}</td>
                                    <td>{{ \Carbon\Carbon::parse($vac->check_date)->format('d M Y') }}</td>
                                    <td><span class="badge bg-success">{{ $vac->medicine }}</span></td>
                                    <td>{{ $vac->notes ? Str::limit($vac->notes, 40) : '-' }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif

    <!-- Monthly Chart -->
    <div class="row g-3 mb-4">
        <div class="col-12">
            <div class="card border-0 shadow-sm">
                <div class="card-header bg-white">
                    <h5 class="mb-0"><i class="fas fa-chart-line me-2"></i>Statistik Kesehatan (12 Bulan Terakhir)</h5>
                </div>
                <div class="card-body">
                    <canvas id="healthChart" height="80"></canvas>
                </div>
            </div>
        </div>
    </div>

    <!-- Recent Health Records -->
    <div class="row g-3 mb-4">
        <div class="col-12">
            <div class="card border-0 shadow-sm">
                <div class="card-header bg-white d-flex justify-content-between align-items-center">
                    <h5 class="mb-0"><i class="fas fa-history me-2"></i>Riwayat Pemeriksaan Kesehatan</h5>
                    <div>
                        <span class="badge bg-success me-1">{{ $recoveredCount }} Sembuh</span>
                        <span class="badge bg-warning me-1">{{ $underTreatmentCount }} Perawatan</span>
                        <span class="badge bg-danger">{{ $criticalCount }} Kritis</span>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th>Tanggal</th>
                                    <th>Kode Kelinci</th>
                                    <th>Nama</th>
                                    <th>Diagnosa</th>
                                    <th>Gejala</th>
                                    <th>Pengobatan</th>
                                    <th>Obat</th>
                                    <th>Status</th>
                                    <th>Cek Berikutnya</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($recentHealthRecords as $record)
                                <tr>
                                    <td>{{ \Carbon\Carbon::parse($record->check_date)->format('d M Y') }}</td>
                                    <td><strong>{{ $record->rabbit->code }}</strong></td>
                                    <td>{{ $record->rabbit->name }}</td>
                                    <td>{{ $record->diagnosis }}</td>
                                    <td>{{ $record->symptoms ? Str::limit($record->symptoms, 30) : '-' }}</td>
                                    <td>{{ $record->treatment ? Str::limit($record->treatment, 30) : '-' }}</td>
                                    <td>{{ $record->medicine ? Str::limit($record->medicine, 25) : '-' }}</td>
                                    <td>
                                        @if($record->status === 'recovered')
                                        <span class="badge bg-success">Sembuh</span>
                                        @elseif($record->status === 'under_treatment')
                                        <span class="badge bg-warning">Perawatan</span>
                                        @else
                                        <span class="badge bg-danger">Kritis</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if($record->next_check_date)
                                        {{ \Carbon\Carbon::parse($record->next_check_date)->format('d M Y') }}
                                        @else
                                        <span class="text-muted">-</span>
                                        @endif
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="9" class="text-center text-muted py-4">
                                        <i class="fas fa-inbox fs-3 mb-2"></i>
                                        <p class="mb-0">Belum ada riwayat pemeriksaan kesehatan</p>
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
    // Health Statistics Chart
    const ctx = document.getElementById('healthChart').getContext('2d');
    const monthlyHealthData = @json($monthlyHealthData);
    
    const healthChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: monthlyHealthData.map(data => data.month),
            datasets: [{
                label: 'Total Pemeriksaan',
                data: monthlyHealthData.map(data => data.checks),
                borderColor: 'rgba(54, 162, 235, 1)',
                backgroundColor: 'rgba(54, 162, 235, 0.1)',
                borderWidth: 2,
                tension: 0.4,
                fill: true
            }, {
                label: 'Sembuh',
                data: monthlyHealthData.map(data => data.recovered),
                borderColor: 'rgba(75, 192, 192, 1)',
                backgroundColor: 'rgba(75, 192, 192, 0.1)',
                borderWidth: 2,
                tension: 0.4,
                fill: true
            }, {
                label: 'Kritis',
                data: monthlyHealthData.map(data => data.critical),
                borderColor: 'rgba(255, 99, 132, 1)',
                backgroundColor: 'rgba(255, 99, 132, 0.1)',
                borderWidth: 2,
                tension: 0.4,
                fill: true
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
                            label += context.parsed.y + ' kasus';
                            return label;
                        }
                    }
                }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        stepSize: 5
                    },
                    title: {
                        display: true,
                        text: 'Jumlah Kasus'
                    }
                }
            }
        }
    });

    // Realtime data update function
    function updateHealthData() {
        fetch('{{ route('dashboard.health.data') }}')
            .then(response => response.json())
            .then(data => {
                // Update statistics cards
                document.querySelector('.card-body h3:nth-of-type(1)').textContent = data.totalHealthRecords;
                document.querySelectorAll('.card-body h3')[1].textContent = data.recoveredCount;
                document.querySelectorAll('.card-body h3')[2].textContent = data.underTreatmentCount;
                document.querySelectorAll('.card-body h3')[3].textContent = data.criticalCount;

                // Update health status
                document.querySelector('.col-6.text-center h2.text-success').textContent = data.healthyRabbits;
                document.querySelector('.col-6.text-center h2.text-danger').textContent = data.sickRabbits;
                
                // Update progress bars and percentages
                const healthProgress = document.querySelector('.col-6.text-center:nth-of-type(1) .progress-bar');
                const sickProgress = document.querySelector('.col-6.text-center:nth-of-type(2) .progress-bar');
                
                if (healthProgress) {
                    healthProgress.style.width = data.healthPercentage + '%';
                    healthProgress.parentElement.nextElementSibling.textContent = data.healthPercentage + '%';
                }
                
                if (sickProgress) {
                    sickProgress.style.width = data.sickPercentage + '%';
                    sickProgress.parentElement.nextElementSibling.textContent = data.sickPercentage + '%';
                }

                console.log('Health data updated successfully');
            })
            .catch(error => console.error('Error updating health data:', error));
    }

    // Update data every 30 seconds
    setInterval(updateHealthData, 30000);
    
    // Initial update after 2 seconds
    setTimeout(updateHealthData, 2000);
</script>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
@endsection
