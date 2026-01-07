<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Keuangan - RabitFarm</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.0/dist/chart.umd.min.js"></script>
    <style>
        body { 
            margin: 0; 
            padding: 0; 
            background-color: #f5f7fa; 
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, sans-serif;
        }
        header { 
            background-color: white; 
            padding: 15px 0; 
            box-shadow: 0 2px 4px rgba(0,0,0,0.1); 
            position: relative;
            z-index: 1000;
        }
        .navbar-brand { color: #228B22 !important; font-weight: bold; font-size: 24px; }
        .nav-link { color: #333 !important; margin: 0 15px; }
        .nav-link:hover { color: #228B22 !important; }
        .dropdown-menu { border: 1px solid #ddd; }
        .btn-green {
            background-color: #32CD32;
            border-color: #32CD32;
            color: white;
        }
        .btn-green:hover {
            background-color: #228B22;
            border-color: #228B22;
        }
        
        /* Dashboard Container */
        .dashboard-container {
            padding: 30px;
            max-width: 1400px;
            margin: 0 auto;
        }
        
        .page-header {
            margin-bottom: 30px;
        }
        
        .page-title {
            font-size: 28px;
            font-weight: 700;
            color: #2c3e50;
            margin: 0;
        }
        
        .page-subtitle {
            color: #7f8c8d;
            font-size: 14px;
            margin-top: 5px;
        }
        
        /* Filter Section */
        .filter-section {
            background: white;
            padding: 20px;
            border-radius: 10px;
            margin-bottom: 25px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.05);
        }
        
        .filter-row {
            display: flex;
            gap: 15px;
            align-items: center;
            flex-wrap: wrap;
        }
        
        .filter-item {
            flex: 1;
            min-width: 200px;
        }
        
        .filter-label {
            font-size: 13px;
            font-weight: 600;
            color: #555;
            margin-bottom: 8px;
            display: block;
        }
        
        .filter-input {
            width: 100%;
            padding: 10px 15px;
            border: 1px solid #ddd;
            border-radius: 6px;
            font-size: 14px;
        }
        
        .filter-input:focus {
            outline: none;
            border-color: #228B22;
        }
        
        .btn-filter {
            background: #228B22;
            color: white;
            border: none;
            padding: 10px 25px;
            border-radius: 6px;
            font-weight: 600;
            cursor: pointer;
            margin-top: 26px;
        }
        
        .btn-filter:hover {
            background: #1a6b1a;
        }
        
        /* Stats Cards */
        .stats-row {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 20px;
            margin-bottom: 30px;
        }
        
        .stat-card {
            background: white;
            padding: 25px;
            border-radius: 12px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.05);
            position: relative;
            overflow: hidden;
        }
        
        .stat-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 4px;
            height: 100%;
        }
        
        .stat-card.income::before {
            background: #27ae60;
        }
        
        .stat-card.expense::before {
            background: #e74c3c;
        }
        
        .stat-card.balance::before {
            background: #3498db;
        }
        
        .stat-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 15px;
        }
        
        .stat-title {
            font-size: 14px;
            color: #7f8c8d;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }
        
        .stat-icon {
            width: 45px;
            height: 45px;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 20px;
        }
        
        .stat-card.income .stat-icon {
            background: #d5f4e6;
            color: #27ae60;
        }
        
        .stat-card.expense .stat-icon {
            background: #fadbd8;
            color: #e74c3c;
        }
        
        .stat-card.balance .stat-icon {
            background: #d6eaf8;
            color: #3498db;
        }
        
        .stat-value {
            font-size: 32px;
            font-weight: 700;
            color: #2c3e50;
            margin-bottom: 10px;
        }
        
        .stat-change {
            font-size: 13px;
            font-weight: 600;
        }
        
        .stat-change.positive {
            color: #27ae60;
        }
        
        .stat-change.negative {
            color: #e74c3c;
        }
        
        .stat-change i {
            margin-right: 5px;
        }
        
        /* Chart Section */
        .chart-section {
            background: white;
            padding: 25px;
            border-radius: 12px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.05);
            margin-bottom: 30px;
        }
        
        .chart-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 25px;
            padding-bottom: 15px;
            border-bottom: 2px solid #f5f7fa;
        }
        
        .chart-title {
            font-size: 18px;
            font-weight: 700;
            color: #2c3e50;
        }
        
        .chart-tabs {
            display: flex;
            gap: 10px;
        }
        
        .chart-tab {
            padding: 8px 20px;
            border: 1px solid #ddd;
            background: white;
            border-radius: 6px;
            cursor: pointer;
            font-size: 13px;
            font-weight: 600;
            color: #7f8c8d;
            transition: all 0.3s;
        }
        
        .chart-tab.active {
            background: #228B22;
            color: white;
            border-color: #228B22;
        }
        
        .chart-container {
            position: relative;
            height: 350px;
        }
        
        /* Transactions Table */
        .transactions-section {
            background: white;
            border-radius: 12px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.05);
            overflow: hidden;
        }
        
        .section-header {
            padding: 25px;
            border-bottom: 2px solid #f5f7fa;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        
        .section-title {
            font-size: 18px;
            font-weight: 700;
            color: #2c3e50;
        }
        
        .btn-add {
            background: #228B22;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 6px;
            font-size: 13px;
            font-weight: 600;
            cursor: pointer;
            display: flex;
            align-items: center;
            gap: 8px;
        }
        
        .btn-add:hover {
            background: #1a6b1a;
        }
        
        .table-responsive {
            overflow-x: auto;
        }
        
        .transactions-table {
            width: 100%;
            border-collapse: collapse;
        }
        
        .transactions-table thead {
            background: #f8f9fa;
        }
        
        .transactions-table th {
            padding: 15px 20px;
            text-align: left;
            font-size: 12px;
            font-weight: 700;
            color: #7f8c8d;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            border-bottom: 2px solid #e9ecef;
        }
        
        .transactions-table td {
            padding: 18px 20px;
            border-bottom: 1px solid #f5f7fa;
            font-size: 14px;
            color: #2c3e50;
        }
        
        .transactions-table tbody tr:hover {
            background: #f8f9fa;
        }
        
        .transaction-date {
            color: #7f8c8d;
            font-size: 13px;
        }
        
        .transaction-category {
            display: inline-block;
            padding: 5px 12px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
        }
        
        .category-pakan {
            background: #fff3cd;
            color: #856404;
        }
        
        .category-obat {
            background: #d1ecf1;
            color: #0c5460;
        }
        
        .category-penjualan {
            background: #d4edda;
            color: #155724;
        }
        
        .category-peralatan {
            background: #e2e3e5;
            color: #383d41;
        }
        
        .amount-income {
            color: #27ae60;
            font-weight: 700;
        }
        
        .amount-expense {
            color: #e74c3c;
            font-weight: 700;
        }
        
        .btn-action-small {
            padding: 5px 12px;
            border: none;
            border-radius: 5px;
            font-size: 12px;
            cursor: pointer;
            margin-right: 5px;
        }
        
        .btn-edit {
            background: #3498db;
            color: white;
        }
        
        .btn-delete {
            background: #e74c3c;
            color: white;
        }
        
        .btn-edit:hover {
            background: #2980b9;
        }
        
        .btn-delete:hover {
            background: #c0392b;
        }
    </style>
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="container">
                <a class="navbar-brand" href="/">
                    <span style="color: #228B22;">🐰 RABIT FARM</span>
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item"><a class="nav-link" href="/">Home</a></li>
                        <li class="nav-item"><a class="nav-link" href="/about">Tentang Kami</a></li>
                        <li class="nav-item"><a class="nav-link" href="/services">Layanan Kami</a></li>
                        <li class="nav-item"><a class="nav-link" href="/forum">Forum Komunitas</a></li>
                        <li class="nav-item"><a class="nav-link" href="/kontak">Kontak</a></li>
                        @auth
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown">
                                    Dashboard
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="/dashboard">Dashboard Monitoring</a></li>
                                    <li><a class="dropdown-item" href="/recording">Pencatatan Digital</a></li>
                                    <li><a class="dropdown-item" href="/database-ternak">Database Ternak</a></li>
                                    <li><a class="dropdown-item" href="/notifications">Notifikasi</a></li>
                                    <li><a class="dropdown-item" href="/forum">Forum Komunitas</a></li>
                                    <li><a class="dropdown-item" href="/reports">Laporan Keuangan</a></li>
                                </ul>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-bs-toggle="dropdown" style="margin-left: 15px;">
                                    <i class="fas fa-user-circle me-1"></i>{{ Auth::user()->name }}
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end">
                                    <li><a class="dropdown-item" href="/dashboard"><i class="fas fa-tachometer-alt me-2"></i>Dashboard</a></li>
                                    <li><hr class="dropdown-divider"></li>
                                    <li>
                                        <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                                            @csrf
                                            <button type="submit" class="dropdown-item text-danger">
                                                <i class="fas fa-sign-out-alt me-2"></i>Logout
                                            </button>
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @else
                            <li class="nav-item">
                                <a class="btn btn-green" href="{{ route('login') }}" style="padding: 8px 20px; border-radius: 20px; margin-left: 15px;">
                                    <i class="fas fa-sign-in-alt me-1"></i>Login
                                </a>
                            </li>
                        @endauth
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <div class="dashboard-container">
        <!-- Page Header -->
        <div class="page-header">
            <h1 class="page-title">Dashboard Keuangan</h1>
            <p class="page-subtitle">Pantau pemasukan, pengeluaran, dan analisis keuangan peternakan Anda</p>
            @if($startDate || $endDate || ($category && $category != 'all'))
            <div class="mt-2">
                <small class="text-muted">
                    <i class="fas fa-filter"></i> Filter aktif: 
                    @if($startDate)
                        <span class="badge bg-info">{{ date('d M Y', strtotime($startDate)) }}</span>
                    @endif
                    @if($startDate && $endDate)
                        s/d
                    @endif
                    @if($endDate)
                        <span class="badge bg-info">{{ date('d M Y', strtotime($endDate)) }}</span>
                    @endif
                    @if($category && $category != 'all')
                        | <span class="badge bg-success">{{ ucfirst($category) }}</span>
                    @endif
                </small>
            </div>
            @endif
        </div>

        <!-- Filter Section -->
        <div class="filter-section">
            <form method="GET" action="{{ route('reports') }}" id="filterForm">
                <div class="filter-row">
                    <div class="filter-item">
                        <label class="filter-label">Tanggal Mulai</label>
                        <input type="date" class="filter-input" name="start_date" id="startDate" value="{{ $startDate ?? '' }}">
                    </div>
                    <div class="filter-item">
                        <label class="filter-label">Tanggal Akhir</label>
                        <input type="date" class="filter-input" name="end_date" id="endDate" value="{{ $endDate ?? '' }}">
                    </div>
                    <div class="filter-item">
                        <label class="filter-label">Kategori</label>
                        <select class="filter-input" name="category" id="categoryFilter">
                            <option value="all" {{ ($category ?? 'all') == 'all' ? 'selected' : '' }}>Semua Kategori</option>
                            <option value="pakan" {{ ($category ?? '') == 'pakan' ? 'selected' : '' }}>Pakan</option>
                            <option value="obat" {{ ($category ?? '') == 'obat' ? 'selected' : '' }}>Obat & Vitamin</option>
                            <option value="penjualan" {{ ($category ?? '') == 'penjualan' ? 'selected' : '' }}>Penjualan</option>
                            <option value="peralatan" {{ ($category ?? '') == 'peralatan' ? 'selected' : '' }}>Peralatan</option>
                            <option value="lainnya" {{ ($category ?? '') == 'lainnya' ? 'selected' : '' }}>Lainnya</option>
                        </select>
                    </div>
                    <div class="d-flex gap-2">
                        <button type="submit" class="btn-filter">
                            <i class="fas fa-filter"></i> Filter
                        </button>
                        @if($startDate || $endDate || ($category && $category != 'all'))
                        <a href="{{ route('reports') }}" class="btn-filter" style="background: #6c757d; text-decoration: none;">
                            Reset
                        </a>
                        @endif
                    </div>
                </div>
            </form>
        </div>

        <!-- Stats Cards -->
        <div class="stats-row">
            <div class="stat-card income">
                <div class="stat-header">
                    <span class="stat-title">Total Pemasukan</span>
                    <div class="stat-icon">
                        <i class="fas fa-arrow-trend-up"></i>
                    </div>
                </div>
                <div class="stat-value" id="totalIncome">Rp {{ number_format($income, 0, ',', '.') }}</div>
                <div class="stat-change positive">
                    <i class="fas fa-arrow-up"></i> Semua waktu
                </div>
            </div>

            <div class="stat-card expense">
                <div class="stat-header">
                    <span class="stat-title">Total Pengeluaran</span>
                    <div class="stat-icon">
                        <i class="fas fa-arrow-trend-down"></i>
                    </div>
                </div>
                <div class="stat-value" id="totalExpense">Rp {{ number_format($expense, 0, ',', '.') }}</div>
                <div class="stat-change negative">
                    <i class="fas fa-arrow-up"></i> Semua waktu
                </div>
            </div>

            <div class="stat-card balance">
                <div class="stat-header">
                    <span class="stat-title">Saldo / Keuntungan</span>
                    <div class="stat-icon">
                        <i class="fas fa-wallet"></i>
                    </div>
                </div>
                <div class="stat-value" id="totalBalance">Rp {{ number_format($balance, 0, ',', '.') }}</div>
                <div class="stat-change positive">
                    <i class="fas fa-check-circle"></i> Total
                </div>
            </div>
        </div>

        <!-- Chart Section -->
        <div class="chart-section">
            <div class="chart-header">
                <h2 class="chart-title">Grafik Keuangan</h2>
                <div class="chart-tabs">
                    <button class="chart-tab active" onclick="changeChartPeriod('week')">Mingguan</button>
                    <button class="chart-tab" onclick="changeChartPeriod('month')">Bulanan</button>
                    <button class="chart-tab" onclick="changeChartPeriod('year')">Tahunan</button>
                </div>
            </div>
            <div class="chart-container">
                <canvas id="financialChart"></canvas>
            </div>
        </div>

        <!-- Transactions Table -->
        <div class="transactions-section">
            <div class="section-header">
                <h2 class="section-title">Transaksi Terbaru</h2>
                <button class="btn-add" onclick="addTransaction()">
                    <i class="fas fa-plus"></i> Tambah Transaksi
                </button>
            </div>
            <div class="table-responsive">
                <table class="transactions-table">
                    <thead>
                        <tr>
                            <th>Tanggal</th>
                            <th>Deskripsi</th>
                            <th>Kategori</th>
                            <th>Tipe</th>
                            <th>Jumlah</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody id="transactionsBody">
                        @forelse($transactions as $transaction)
                        <tr>
                            <td class="transaction-date">{{ $transaction->transaction_date->format('d M Y') }}</td>
                            <td>{{ $transaction->description }}</td>
                            <td><span class="transaction-category category-{{ $transaction->category }}">{{ ucfirst($transaction->category) }}</span></td>
                            <td>{{ $transaction->type == 'income' ? 'Pemasukan' : 'Pengeluaran' }}</td>
                            <td class="amount-{{ $transaction->type == 'income' ? 'income' : 'expense' }}">
                                {{ $transaction->type == 'income' ? '+' : '-' }} Rp {{ number_format($transaction->amount, 0, ',', '.') }}
                            </td>
                            <td>
                                <button class="btn-action-small btn-edit"><i class="fas fa-edit"></i></button>
                                <form action="{{ route('reports.destroy', $transaction->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn-action-small btn-delete" onclick="return confirm('Yakin ingin menghapus?')">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" class="text-center py-4">
                                <i class="fas fa-inbox fa-3x text-muted mb-3" style="opacity: 0.5;"></i>
                                <p class="text-muted">Belum ada transaksi. Klik "Tambah Transaksi" untuk mulai.</p>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Financial Chart
        const ctx = document.getElementById('financialChart').getContext('2d');
        let financialChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: @json($chartData['labels'] ?? []),
                datasets: [
                    {
                        label: 'Pemasukan',
                        data: @json($chartData['income'] ?? []),
                        borderColor: '#27ae60',
                        backgroundColor: 'rgba(39, 174, 96, 0.1)',
                        borderWidth: 3,
                        tension: 0.4,
                        fill: true,
                        pointRadius: 5,
                        pointHoverRadius: 7,
                        pointBackgroundColor: '#27ae60',
                        pointBorderColor: '#fff',
                        pointBorderWidth: 2
                    },
                    {
                        label: 'Pengeluaran',
                        data: @json($chartData['expense'] ?? []),
                        borderColor: '#e74c3c',
                        backgroundColor: 'rgba(231, 76, 60, 0.1)',
                        borderWidth: 3,
                        tension: 0.4,
                        fill: true,
                        pointRadius: 5,
                        pointHoverRadius: 7,
                        pointBackgroundColor: '#e74c3c',
                        pointBorderColor: '#fff',
                        pointBorderWidth: 2
                    }
                ]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: true,
                        position: 'top',
                        labels: {
                            usePointStyle: true,
                            padding: 20,
                            font: {
                                size: 13,
                                weight: '600'
                            }
                        }
                    },
                    tooltip: {
                        backgroundColor: 'rgba(0, 0, 0, 0.8)',
                        padding: 12,
                        titleFont: {
                            size: 14,
                            weight: '600'
                        },
                        bodyFont: {
                            size: 13
                        },
                        callbacks: {
                            label: function(context) {
                                let label = context.dataset.label || '';
                                if (label) {
                                    label += ': ';
                                }
                                label += 'Rp ' + context.parsed.y.toLocaleString('id-ID');
                                return label;
                            }
                        }
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            callback: function(value) {
                                return 'Rp ' + (value / 1000000) + 'jt';
                            },
                            font: {
                                size: 12
                            }
                        },
                        grid: {
                            color: 'rgba(0, 0, 0, 0.05)'
                        }
                    },
                    x: {
                        grid: {
                            display: false
                        },
                        ticks: {
                            font: {
                                size: 12,
                                weight: '600'
                            }
                        }
                    }
                },
                interaction: {
                    intersect: false,
                    mode: 'index'
                }
            }
        });

        // Change Chart Period
        function changeChartPeriod(period) {
            // Remove active class from all tabs
            document.querySelectorAll('.chart-tab').forEach(tab => {
                tab.classList.remove('active');
            });
            
            // Add active class to clicked tab
            event.target.classList.add('active');
            
            // Update chart data based on period
            if (period === 'week') {
                financialChart.data.labels = ['Sen', 'Sel', 'Rab', 'Kam', 'Jum', 'Sab', 'Min'];
                financialChart.data.datasets[0].data = [500000, 750000, 600000, 800000, 950000, 1100000, 850000];
                financialChart.data.datasets[1].data = [300000, 400000, 350000, 450000, 500000, 480000, 420000];
            } else if (period === 'month') {
                financialChart.data.labels = ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Ags', 'Sep', 'Okt', 'Nov', 'Des'];
                financialChart.data.datasets[0].data = [3500000, 4200000, 3800000, 4500000, 5100000, 4800000, 5500000, 5200000, 4900000, 5800000, 6200000, 5900000];
                financialChart.data.datasets[1].data = [2200000, 2500000, 2300000, 2800000, 3200000, 2900000, 3100000, 2700000, 2600000, 3300000, 3500000, 3200000];
            } else if (period === 'year') {
                financialChart.data.labels = ['2019', '2020', '2021', '2022', '2023', '2024'];
                financialChart.data.datasets[0].data = [35000000, 42000000, 48000000, 52000000, 58000000, 65000000];
                financialChart.data.datasets[1].data = [22000000, 25000000, 28000000, 31000000, 34000000, 38000000];
            }
            
            financialChart.update();
        }

        // Filter form is now handled by form submission

        // Add Transaction
        function addTransaction() {
            alert('Fitur tambah transaksi akan segera tersedia!');
            // You can open a modal or redirect to add transaction page
        }

        // Edit and Delete handlers
        document.querySelectorAll('.btn-edit').forEach(btn => {
            btn.addEventListener('click', function() {
                alert('Edit transaksi - fitur akan segera tersedia');
            });
        });

        document.querySelectorAll('.btn-delete').forEach(btn => {
            btn.addEventListener('click', function() {
                if (confirm('Apakah Anda yakin ingin menghapus transaksi ini?')) {
                    const row = this.closest('tr');
                    row.style.opacity = '0';
                    setTimeout(() => {
                        row.remove();
                    }, 300);
                }
            });
        });

        // Set today's date as default end date if not filtered
        if (!document.getElementById('endDate').value) {
            document.getElementById('endDate').valueAsDate = new Date();
        }
        
        // Set 30 days ago as default start date if not filtered
        if (!document.getElementById('startDate').value) {
            const thirtyDaysAgo = new Date();
            thirtyDaysAgo.setDate(thirtyDaysAgo.getDate() - 30);
            document.getElementById('startDate').valueAsDate = thirtyDaysAgo;
        }
    </script>
</body>
</html>
