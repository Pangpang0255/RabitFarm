@extends('layouts.app')

@section('content')
<div class="container py-4">
    <!-- Real-time Clock & Date -->
    <div class="row g-3 mb-3">
        <div class="col-12">
            <div class="card border-0 shadow-sm bg-dark text-white">
                <div class="card-body py-3">
                    <div class="row align-items-center">
                        <div class="col-md-6">
                            <h4 class="mb-0">
                                <i class="fas fa-calendar-day me-2"></i>
                                <span id="realTimeDate">{{ \Carbon\Carbon::now()->isoFormat('dddd, D MMMM YYYY') }}</span>
                            </h4>
                        </div>
                        <div class="col-md-3">
                            <h3 class="mb-0 text-center">
                                <i class="fas fa-clock me-2"></i>
                                <span id="realTimeClock">{{ \Carbon\Carbon::now()->format('H:i:s') }}</span>
                            </h3>
                        </div>
                        <div class="col-md-3 text-end">
                            <button class="btn btn-light btn-sm" onclick="location.reload()">
                                <i class="fas fa-sync-alt me-1"></i>Refresh Data
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Header -->
    <div class="mb-4">
        <div class="d-flex justify-content-between align-items-center">
            <div>
                <h2 class="fw-bold"><i class="fas fa-carrot text-warning me-2"></i>Dashboard Manajemen Pakan</h2>
                <p class="text-muted mb-0">Kelola jadwal pemberian pakan, stock, dan konsumsi pakan kelinci Anda</p>
            </div>
            <div>
                <!-- Generate Schedule Buttons -->
                <div class="btn-group" role="group">
                    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#generateModal">
                        <i class="fas fa-magic me-2"></i>Generate Jadwal Otomatis
                    </button>
                </div>
            </div>
        </div>
        
        @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
            <i class="fas fa-check-circle me-2"></i>{{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
        @endif
        
        @if(session('error'))
        <div class="alert alert-danger alert-dismissible fade show mt-3" role="alert">
            <i class="fas fa-exclamation-circle me-2"></i>{{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
        @endif
    </div>

    <!-- Statistics Cards -->
    <div class="row g-3 mb-4">
        <div class="col-12">
            <div class="card border-0 shadow-sm bg-gradient" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);">
                <div class="card-body text-white">
                    <div class="row align-items-center">
                        <div class="col-md-8">
                            <h5 class="mb-2"><i class="fas fa-sync-alt me-2"></i>Sistem Rotasi Menu Otomatis</h5>
                            <p class="mb-2">Jadwal pakan dengan variasi menu 7 hari yang berbeda setiap hari untuk nutrisi seimbang & kelinci tidak bosan!</p>
                            <small><i class="fas fa-check-circle me-1"></i>3x pemberian per hari (Pagi, Siang, Sore)</small><br>
                            <small><i class="fas fa-check-circle me-1"></i>Rotasi 7 jenis menu berbeda</small><br>
                            <small><i class="fas fa-check-circle me-1"></i>Porsi disesuaikan per jenis pakan</small>
                        </div>
                        <div class="col-md-4 text-end">
                            <button class="btn btn-light btn-lg" data-bs-toggle="modal" data-bs-target="#generateModal">
                                <i class="fas fa-magic me-2"></i>Generate Jadwal
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row g-3 mb-4">
        <div class="col-md-3">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-start">
                        <div>
                            <h6 class="text-muted mb-2">Total Pemberian</h6>
                            <h3 class="fw-bold mb-0">{{ $totalFeedings }}</h3>
                            <small class="text-primary">Feeding Records</small>
                        </div>
                        <div class="bg-primary bg-opacity-10 p-3 rounded">
                            <i class="fas fa-clipboard-list text-primary fs-4"></i>
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
                            <h6 class="text-muted mb-2">Konsumsi Bulan Ini</h6>
                            <h3 class="fw-bold mb-0">{{ number_format($thisMonthQuantity, 1) }}</h3>
                            <small class="text-success">Kg</small>
                        </div>
                        <div class="bg-success bg-opacity-10 p-3 rounded">
                            <i class="fas fa-weight text-success fs-4"></i>
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
                            <h6 class="text-muted mb-2">Rata-rata Harian</h6>
                            <h3 class="fw-bold mb-0">{{ number_format($avgDailyConsumption ?? 0, 1) }}</h3>
                            <small class="text-warning">Kg/hari</small>
                        </div>
                        <div class="bg-warning bg-opacity-10 p-3 rounded">
                            <i class="fas fa-chart-line text-warning fs-4"></i>
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
                            <h6 class="text-muted mb-2">Tingkat Selesai</h6>
                            <h3 class="fw-bold mb-0">{{ $completionRate }}%</h3>
                            <small class="text-info">Completion Rate</small>
                        </div>
                        <div class="bg-info bg-opacity-10 p-3 rounded">
                            <i class="fas fa-check-circle text-info fs-4"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Today's Summary -->
    <div class="row g-3 mb-4">
        <div class="col-md-4">
            <div class="card border-0 shadow-sm">
                <div class="card-body">
                    <h5 class="mb-3"><i class="fas fa-calendar-day text-primary me-2"></i>Pemberian Pakan Hari Ini</h5>
                    <div class="row">
                        <div class="col-6 text-center">
                            <h2 class="fw-bold text-warning">{{ $todayPending }}</h2>
                            <p class="text-muted mb-2">Pending</p>
                            <div class="progress" style="height: 10px;">
                                <div class="progress-bar bg-warning" style="width: {{ $todayFeedings->count() > 0 ? ($todayPending / $todayFeedings->count()) * 100 : 0 }}%"></div>
                            </div>
                        </div>
                        <div class="col-6 text-center">
                            <h2 class="fw-bold text-success">{{ $todayCompleted }}</h2>
                            <p class="text-muted mb-2">Completed</p>
                            <div class="progress" style="height: 10px;">
                                <div class="progress-bar bg-success" style="width: {{ $todayFeedings->count() > 0 ? ($todayCompleted / $todayFeedings->count()) * 100 : 0 }}%"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card border-0 shadow-sm bg-info text-white">
                <div class="card-body">
                    <h5 class="mb-3"><i class="fas fa-sync-alt me-2"></i>Rotasi Menu Hari Ini</h5>
                    @php
                        // Hitung hari rotasi (1-7)
                        $dayOfWeek = now()->dayOfWeek; // 0=Minggu, 1=Senin, dst
                        $rotationDay = $dayOfWeek == 0 ? 7 : $dayOfWeek; // Ubah Minggu jadi hari ke-7
                        $menuNames = [
                            1 => 'Pelet & Sayuran',
                            2 => 'Konsentrat & Rumput',
                            3 => 'Pelet & Wortel',
                            4 => 'Mix Sayuran Hijau',
                            5 => 'Konsentrat & Sawi',
                            6 => 'Pelet & Jagung',
                            7 => 'Menu Spesial'
                        ];
                        $colors = [
                            1 => 'primary',
                            2 => 'success',
                            3 => 'warning',
                            4 => 'danger',
                            5 => 'info',
                            6 => 'dark',
                            7 => 'purple'
                        ];
                    @endphp
                    <div class="text-center">
                        <h1 class="fw-bold mb-2">HARI {{ $rotationDay }}</h1>
                        <h4 class="mb-3">{{ $menuNames[$rotationDay] }}</h4>
                        <p class="mb-0"><i class="fas fa-info-circle me-1"></i>Rotasi siklus 7 hari</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card border-0 shadow-sm">
                <div class="card-body">
                    <h5 class="mb-3"><i class="fas fa-calendar-day text-primary me-2"></i>Pemberian Pakan Hari Ini</h5>
                    <div class="row">
                        <div class="col-6 text-center">
                            <h2 class="fw-bold text-warning">{{ $todayPending }}</h2>
                            <p class="text-muted mb-2">Pending</p>
                            <div class="progress" style="height: 10px;">
                                <div class="progress-bar bg-warning" style="width: {{ $todayFeedings->count() > 0 ? ($todayPending / $todayFeedings->count()) * 100 : 0 }}%"></div>
                            </div>
                        </div>
                        <div class="col-6 text-center">
                            <h2 class="fw-bold text-success">{{ $todayCompleted }}</h2>
                            <p class="text-muted mb-2">Completed</p>
                            <div class="progress" style="height: 10px;">
                                <div class="progress-bar bg-success" style="width: {{ $todayFeedings->count() > 0 ? ($todayCompleted / $todayFeedings->count()) * 100 : 0 }}%"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card border-0 shadow-sm">
                <div class="card-body">
                    <h5 class="mb-3"><i class="fas fa-box text-info me-2"></i>Jenis Pakan Paling Banyak</h5>
                    <div class="list-group list-group-flush">
                        @forelse($feedTypeConsumption->take(3) as $index => $feed)
                        <div class="list-group-item px-0 py-2 d-flex justify-content-between align-items-center @if($index > 0) border-top @else border-0 @endif">
                            <div>
                                <span class="badge bg-secondary me-2">{{ $index + 1 }}</span>
                                <strong>{{ $feed->feed_type }}</strong>
                            </div>
                            <span class="badge bg-warning">{{ number_format($feed->total_quantity, 1) }} Kg</span>
                        </div>
                        @empty
                        <p class="text-muted mb-0">Belum ada data konsumsi</p>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Alert: Rabbits without feeding today -->
    @if($rabbitsNoFeedingToday->count() > 0)
    <div class="row g-3 mb-4">
        <div class="col-12">
            <div class="alert alert-warning shadow-sm" role="alert">
                <h6 class="alert-heading"><i class="fas fa-exclamation-triangle me-2"></i>Perhatian! Kelinci Belum Diberi Pakan Hari Ini</h6>
                <hr>
                <div class="row">
                    @foreach($rabbitsNoFeedingToday->take(10) as $rabbit)
                    <div class="col-md-2 mb-2">
                        <span class="badge bg-warning text-dark">{{ $rabbit->code }}</span>
                    </div>
                    @endforeach
                    @if($rabbitsNoFeedingToday->count() > 10)
                    <div class="col-12">
                        <small class="text-muted">... dan {{ $rabbitsNoFeedingToday->count() - 10 }} kelinci lainnya</small>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
    @endif

    <!-- Action Lists -->
    <div class="row g-3 mb-4">
        <!-- Overdue Feeding -->
        <div class="col-md-4">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-header bg-danger text-white">
                    <h6 class="mb-0"><i class="fas fa-calendar-times me-2"></i>Terlambat Beri Pakan</h6>
                </div>
                <div class="card-body" style="max-height: 400px; overflow-y: auto;">
                    <div class="list-group list-group-flush">
                        @forelse($overdueFeedings as $feeding)
                        @php
                            $daysOverdue = \Carbon\Carbon::parse($feeding->feeding_date)->diffInDays(now());
                        @endphp
                        <div class="list-group-item px-0 py-2 @if(!$loop->first) border-top @else border-0 @endif">
                            <div class="d-flex justify-content-between align-items-start">
                                <div class="flex-grow-1">
                                    <strong class="d-block text-danger">{{ $feeding->rabbit->code }}</strong>
                                    <small class="text-muted d-block">{{ $feeding->feed_type }} - {{ $feeding->quantity }} Kg</small>
                                    <small class="text-danger"><i class="far fa-clock me-1"></i>{{ $daysOverdue }} hari lalu</small>
                                </div>
                                <span class="badge bg-danger">URGENT</span>
                            </div>
                        </div>
                        @empty
                        <div class="list-group-item px-0 py-2 border-0 text-center">
                            <i class="fas fa-check-circle text-success mb-2 fs-3"></i>
                            <p class="text-muted mb-0">Semua tepat waktu</p>
                        </div>
                        @endforelse
                    </div>
                    @if($overdueFeedings->count() > 0)
                    <div class="mt-3 text-center">
                        <small class="text-danger"><i class="fas fa-exclamation-circle me-1"></i>{{ $overdueFeedings->count() }} jadwal terlambat</small>
                    </div>
                    @endif
                </div>
            </div>
        </div>

        <!-- Upcoming Feeding -->
        <div class="col-md-4">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-header bg-primary text-white">
                    <h6 class="mb-0"><i class="fas fa-calendar-alt me-2"></i>Jadwal Pemberian Pakan</h6>
                </div>
                <div class="card-body" style="max-height: 400px; overflow-y: auto;">
                    <div class="list-group list-group-flush">
                        @forelse($upcomingFeedings as $feeding)
                        @php
                            // Extract rotation day from notes if exists
                            preg_match('/Rotasi Hari (\d+)/', $feeding->notes ?? '', $matches);
                            $rotDay = isset($matches[1]) ? $matches[1] : null;
                            $badgeColors = [
                                1 => 'primary',
                                2 => 'success', 
                                3 => 'warning',
                                4 => 'danger',
                                5 => 'info',
                                6 => 'dark',
                                7 => 'secondary'
                            ];
                        @endphp
                        <div class="list-group-item px-0 py-2 @if(!$loop->first) border-top @else border-0 @endif">
                            <div class="d-flex justify-content-between align-items-start">
                                <div class="flex-grow-1">
                                    <div class="d-flex align-items-center mb-1">
                                        @if($rotDay)
                                        <span class="badge bg-{{ $badgeColors[$rotDay] ?? 'secondary' }} me-2">Hari {{ $rotDay }}</span>
                                        @endif
                                        <strong>{{ $feeding->rabbit->code }}</strong>
                                    </div>
                                    <small class="text-muted d-block">{{ $feeding->feed_type }} - {{ $feeding->quantity }} Kg</small>
                                    <small class="text-primary"><i class="far fa-clock me-1"></i>{{ \Carbon\Carbon::parse($feeding->feeding_date)->format('d M') }} {{ \Carbon\Carbon::parse($feeding->feeding_time)->format('H:i') }}</small>
                                </div>
                                <span class="badge bg-primary">Pending</span>
                            </div>
                        </div>
                        @empty
                        <div class="list-group-item px-0 py-2 border-0 text-center">
                            <i class="fas fa-info-circle text-muted mb-2 fs-3"></i>
                            <p class="text-muted mb-0">Tidak ada jadwal</p>
                        </div>
                        @endforelse
                    </div>
                    @if($upcomingFeedings->count() > 0)
                    <div class="mt-3 text-center">
                        <small class="text-muted"><i class="fas fa-calendar me-1"></i>{{ $upcomingFeedings->count() }} jadwal mendatang</small>
                    </div>
                    @endif
                </div>
            </div>
        </div>

        <!-- Most Fed Rabbits -->
        <div class="col-md-4">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-header bg-success text-white">
                    <h6 class="mb-0"><i class="fas fa-trophy me-2"></i>Kelinci Paling Sering Diberi Pakan</h6>
                </div>
                <div class="card-body" style="max-height: 400px; overflow-y: auto;">
                    <div class="list-group list-group-flush">
                        @forelse($mostFedRabbits as $index => $fed)
                        <div class="list-group-item px-0 py-2 @if($index > 0) border-top @else border-0 @endif">
                            <div class="d-flex justify-content-between align-items-start">
                                <div class="flex-grow-1">
                                    <span class="badge bg-warning text-dark me-2">{{ $index + 1 }}</span>
                                    <strong class="d-block">{{ $fed->rabbit->code }}</strong>
                                    <small class="text-muted">{{ $fed->feed_count }} kali - {{ number_format($fed->total_quantity, 1) }} Kg</small>
                                </div>
                            </div>
                        </div>
                        @empty
                        <div class="list-group-item px-0 py-2 border-0 text-center">
                            <i class="fas fa-info-circle text-muted mb-2 fs-3"></i>
                            <p class="text-muted mb-0">Belum ada data</p>
                        </div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Weekly Chart -->
    <div class="row g-3 mb-4">
        <!-- Rotation Legend -->
        <div class="col-12">
            <div class="card border-0 shadow-sm">
                <div class="card-header bg-white">
                    <h5 class="mb-0"><i class="fas fa-palette me-2"></i>Legenda Rotasi Menu 7 Hari</h5>
                </div>
                <div class="card-body">
                    <div class="row g-2">
                        <div class="col-md-3">
                            <div class="d-flex align-items-center p-2 border rounded">
                                <span class="badge bg-primary me-2" style="width: 60px;">HARI 1</span>
                                <small>Pelet + Kangkung</small>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="d-flex align-items-center p-2 border rounded">
                                <span class="badge bg-success me-2" style="width: 60px;">HARI 2</span>
                                <small>Konsentrat + Rumput</small>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="d-flex align-items-center p-2 border rounded">
                                <span class="badge bg-warning me-2" style="width: 60px;">HARI 3</span>
                                <small>Pelet + Wortel</small>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="d-flex align-items-center p-2 border rounded">
                                <span class="badge bg-danger me-2" style="width: 60px;">HARI 4</span>
                                <small>Mix Sayuran</small>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="d-flex align-items-center p-2 border rounded">
                                <span class="badge bg-info me-2" style="width: 60px;">HARI 5</span>
                                <small>Konsentrat + Sawi</small>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="d-flex align-items-center p-2 border rounded">
                                <span class="badge bg-dark me-2" style="width: 60px;">HARI 6</span>
                                <small>Pelet + Jagung</small>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="d-flex align-items-center p-2 border rounded">
                                <span class="badge bg-secondary me-2" style="width: 60px;">HARI 7</span>
                                <small>Menu Spesial</small>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="d-flex align-items-center p-2 border rounded bg-light">
                                <i class="fas fa-sync-alt text-primary me-2"></i>
                                <small class="fw-bold">Lalu Rotasi Ulang</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row g-3 mb-4">
        <div class="col-md-6">
            <div class="card border-0 shadow-sm">
                <div class="card-header bg-white">
                    <h5 class="mb-0"><i class="fas fa-chart-bar me-2"></i>Pemberian Pakan 7 Hari Terakhir</h5>
                </div>
                <div class="card-body">
                    <canvas id="weeklyChart" height="250"></canvas>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card border-0 shadow-sm">
                <div class="card-header bg-white">
                    <h5 class="mb-0"><i class="fas fa-chart-pie me-2"></i>Konsumsi per Jenis Pakan</h5>
                </div>
                <div class="card-body">
                    <canvas id="feedTypeChart" height="250"></canvas>
                </div>
            </div>
        </div>
    </div>

    <!-- Monthly Statistics Chart -->
    <div class="row g-3 mb-4">
        <div class="col-12">
            <div class="card border-0 shadow-sm">
                <div class="card-header bg-white">
                    <h5 class="mb-0"><i class="fas fa-chart-area me-2"></i>Statistik Pemberian Pakan (12 Bulan Terakhir)</h5>
                </div>
                <div class="card-body">
                    <canvas id="monthlyChart" height="80"></canvas>
                </div>
            </div>
        </div>
    </div>

    <!-- Recent Feeding History -->
    <div class="row g-3 mb-4">
        <div class="col-12">
            <div class="card border-0 shadow-sm">
                <div class="card-header bg-white d-flex justify-content-between align-items-center">
                    <h5 class="mb-0"><i class="fas fa-history me-2"></i>Riwayat Pemberian Pakan</h5>
                    <div>
                        <span class="badge bg-success me-1">{{ $completedFeedings }} Completed</span>
                        <span class="badge bg-warning">{{ $pendingFeedings }} Pending</span>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th>Tanggal</th>
                                    <th>Waktu</th>
                                    <th>Kode Kelinci</th>
                                    <th>Nama</th>
                                    <th>Jenis Pakan</th>
                                    <th>Jumlah (Kg)</th>
                                    <th>Status</th>
                                    <th>Catatan</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($recentFeedings as $feeding)
                                @php
                                    // Extract rotation day from notes
                                    preg_match('/Rotasi Hari (\d+)/', $feeding->notes ?? '', $matches);
                                    $rotDay = isset($matches[1]) ? $matches[1] : null;
                                    $badgeColors = [
                                        1 => 'primary',
                                        2 => 'success',
                                        3 => 'warning', 
                                        4 => 'danger',
                                        5 => 'info',
                                        6 => 'dark',
                                        7 => 'secondary'
                                    ];
                                    $menuNames = [
                                        1 => 'Pelet & Sayuran',
                                        2 => 'Konsentrat & Rumput',
                                        3 => 'Pelet & Wortel',
                                        4 => 'Mix Sayuran',
                                        5 => 'Konsentrat & Sawi',
                                        6 => 'Pelet & Jagung',
                                        7 => 'Menu Spesial'
                                    ];
                                @endphp
                                <tr>
                                    <td>
                                        {{ \Carbon\Carbon::parse($feeding->feeding_date)->format('d M Y') }}
                                        @if($rotDay)
                                        <br><span class="badge bg-{{ $badgeColors[$rotDay] ?? 'secondary' }} badge-sm">H-{{ $rotDay }}</span>
                                        @endif
                                    </td>
                                    <td>{{ \Carbon\Carbon::parse($feeding->feeding_time)->format('H:i') }}</td>
                                    <td><strong>{{ $feeding->rabbit->code }}</strong></td>
                                    <td>{{ $feeding->rabbit->name }}</td>
                                    <td>
                                        {{ $feeding->feed_type }}
                                        @if($rotDay)
                                        <br><small class="text-muted">{{ $menuNames[$rotDay] ?? '' }}</small>
                                        @endif
                                    </td>
                                    <td><span class="badge bg-warning">{{ $feeding->quantity }} Kg</span></td>
                                    <td>
                                        @if($feeding->status === 'completed')
                                        <span class="badge bg-success">Completed</span>
                                        @else
                                        <span class="badge bg-warning">Pending</span>
                                        @endif
                                    </td>
                                    <td>{{ $feeding->notes ? Str::limit($feeding->notes, 30) : '-' }}</td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="8" class="text-center text-muted py-4">
                                        <i class="fas fa-inbox fs-3 mb-2"></i>
                                        <p class="mb-0">Belum ada riwayat pemberian pakan</p>
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

<!-- Generate Schedule Modal -->
<div class="modal fade" id="generateModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-success text-white">
                <h5 class="modal-title"><i class="fas fa-magic me-2"></i>Generate Jadwal Pakan Otomatis</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <div class="alert alert-info">
                    <h6 class="alert-heading"><i class="fas fa-info-circle me-2"></i>Sistem Rotasi Menu 7 Hari</h6>
                    <p class="mb-2">Sistem akan membuat jadwal otomatis dengan <strong>rotasi menu berbeda setiap hari</strong> agar kelinci tidak bosan dan nutrisi tercukupi:</p>
                    <ul class="mb-0">
                        <li><strong>Hari 1:</strong> Pelet + Sayuran (Kangkung)</li>
                        <li><strong>Hari 2:</strong> Konsentrat + Rumput Gajah</li>
                        <li><strong>Hari 3:</strong> Pelet + Wortel</li>
                        <li><strong>Hari 4:</strong> Mix Sayuran Hijau</li>
                        <li><strong>Hari 5:</strong> Konsentrat + Sawi Putih</li>
                        <li><strong>Hari 6:</strong> Pelet + Jagung Pipilan</li>
                        <li><strong>Hari 7:</strong> Menu Spesial Variasi Lengkap</li>
                    </ul>
                    <hr>
                    <small><strong>Frekuensi:</strong> 3x sehari (Pagi 07:00, Siang 12:00, Sore 17:00)</small><br>
                    <small><strong>Porsi:</strong> Disesuaikan per jenis pakan (0.1 - 0.25 Kg)</small>
                </div>
                
                <form action="{{ route('dashboard.feeding.generate') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label fw-bold">Pilih Durasi Generate:</label>
                        <div class="row g-2">
                            <div class="col-md-4">
                                <button type="submit" name="days" value="7" class="btn btn-outline-success w-100">
                                    <i class="fas fa-calendar-week me-2"></i>7 Hari<br>
                                    <small class="text-muted">(1 Minggu)</small>
                                </button>
                            </div>
                            <div class="col-md-4">
                                <button type="submit" name="days" value="14" class="btn btn-outline-success w-100">
                                    <i class="fas fa-calendar-alt me-2"></i>14 Hari<br>
                                    <small class="text-muted">(2 Minggu)</small>
                                </button>
                            </div>
                            <div class="col-md-4">
                                <button type="submit" name="days" value="30" class="btn btn-outline-success w-100">
                                    <i class="fas fa-calendar me-2"></i>30 Hari<br>
                                    <small class="text-muted">(1 Bulan)</small>
                                </button>
                            </div>
                        </div>
                    </div>
                    
                    <div class="alert alert-warning">
                        <i class="fas fa-exclamation-triangle me-2"></i>
                        <strong>Catatan:</strong> Jadwal akan dibuat untuk <strong>semua kelinci</strong> aktif. Jadwal yang sudah ada tidak akan diduplikat.
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    // Weekly Feeding Chart
    const weeklyCtx = document.getElementById('weeklyChart').getContext('2d');
    const weeklyFeedings = @json($weeklyFeedings);
    
    const weeklyChart = new Chart(weeklyCtx, {
        type: 'bar',
        data: {
            labels: weeklyFeedings.map(data => data.date),
            datasets: [{
                label: 'Pemberian Pakan',
                data: weeklyFeedings.map(data => data.completed),
                backgroundColor: 'rgba(75, 192, 192, 0.6)',
                borderColor: 'rgba(75, 192, 192, 1)',
                borderWidth: 2
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    display: false
                }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        stepSize: 5
                    }
                }
            }
        }
    });

    // Feed Type Pie Chart
    const feedTypeCtx = document.getElementById('feedTypeChart').getContext('2d');
    const feedTypeData = @json($feedTypeConsumption);
    
    const feedTypeChart = new Chart(feedTypeCtx, {
        type: 'doughnut',
        data: {
            labels: feedTypeData.map(data => data.feed_type),
            datasets: [{
                data: feedTypeData.map(data => data.total_quantity),
                backgroundColor: [
                    'rgba(255, 99, 132, 0.6)',
                    'rgba(54, 162, 235, 0.6)',
                    'rgba(255, 206, 86, 0.6)',
                    'rgba(75, 192, 192, 0.6)',
                    'rgba(153, 102, 255, 0.6)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)'
                ],
                borderWidth: 2
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    position: 'bottom'
                },
                tooltip: {
                    callbacks: {
                        label: function(context) {
                            return context.label + ': ' + context.parsed + ' Kg';
                        }
                    }
                }
            }
        }
    });

    // Monthly Statistics Chart
    const monthlyCtx = document.getElementById('monthlyChart').getContext('2d');
    const monthlyFeedingData = @json($monthlyFeedingData);
    
    const monthlyChart = new Chart(monthlyCtx, {
        type: 'line',
        data: {
            labels: monthlyFeedingData.map(data => data.month),
            datasets: [{
                label: 'Total Pemberian',
                data: monthlyFeedingData.map(data => data.feedings),
                borderColor: 'rgba(54, 162, 235, 1)',
                backgroundColor: 'rgba(54, 162, 235, 0.1)',
                borderWidth: 2,
                tension: 0.4,
                fill: true,
                yAxisID: 'y'
            }, {
                label: 'Konsumsi (Kg)',
                data: monthlyFeedingData.map(data => data.quantity),
                borderColor: 'rgba(255, 206, 86, 1)',
                backgroundColor: 'rgba(255, 206, 86, 0.1)',
                borderWidth: 2,
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
                        text: 'Jumlah Pemberian'
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
                        text: 'Konsumsi (Kg)'
                    }
                }
            }
        }
    });
</script>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

<script>
    // Real-time clock update
    function updateClock() {
        const now = new Date();
        const hours = String(now.getHours()).padStart(2, '0');
        const minutes = String(now.getMinutes()).padStart(2, '0');
        const seconds = String(now.getSeconds()).padStart(2, '0');
        document.getElementById('realTimeClock').textContent = hours + ':' + minutes + ':' + seconds;
    }
    
    // Update clock every second
    setInterval(updateClock, 1000);
    updateClock(); // Initial call
    
    // Auto-refresh page every 5 minutes to get latest data
    setTimeout(function() {
        console.log('Auto-refreshing data...');
        location.reload();
    }, 5 * 60 * 1000); // 5 minutes
    
    // Show last update time
    window.addEventListener('load', function() {
        const lastUpdate = new Date();
        console.log('Dashboard loaded at: ' + lastUpdate.toLocaleString());
    });
</script>
@endsection
