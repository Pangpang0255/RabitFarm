@extends('layouts.app')

@section('content')
<div class="container py-4">
    <!-- Header -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="fw-bold mb-1">Database Ternak</h2>
            <p class="text-muted mb-0">Pemilihan Bibit & Inventory - KTP Setiap Kelinci</p>
            @if($search || $gender || $breed || $healthStatus)
            <div class="mt-2">
                <small class="text-muted">
                    <i class="fas fa-filter"></i> Filter aktif: 
                    @if($search)
                        <span class="badge bg-info">Pencarian: {{ $search }}</span>
                    @endif
                    @if($gender)
                        <span class="badge bg-primary">{{ ucfirst($gender) }}</span>
                    @endif
                    @if($breed)
                        <span class="badge bg-success">{{ $breed }}</span>
                    @endif
                    @if($healthStatus)
                        <span class="badge bg-warning text-dark">{{ ucfirst($healthStatus) }}</span>
                    @endif
                </small>
            </div>
            @endif
        </div>
        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addRabbitModal">
            <i class="fas fa-plus me-2"></i>Tambah Kelinci
        </button>
    </div>

    <!-- Filter & Search -->
    <div class="card border-0 shadow-sm mb-4">
        <div class="card-body">
            <form method="GET" action="{{ route('database-ternak') }}">
                <div class="row g-3">
                    <div class="col-md-3">
                        <label class="form-label">Cari ID/No. Telinga</label>
                        <input type="text" class="form-control" name="search" placeholder="Cari kelinci..." value="{{ $search ?? '' }}">
                    </div>
                    <div class="col-md-2">
                        <label class="form-label">Jenis Kelamin</label>
                        <select class="form-select" name="gender">
                            <option value="">Semua</option>
                            <option value="jantan" {{ ($gender ?? '') == 'jantan' ? 'selected' : '' }}>Jantan</option>
                            <option value="betina" {{ ($gender ?? '') == 'betina' ? 'selected' : '' }}>Betina</option>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <label class="form-label">Ras/Jenis</label>
                        <select class="form-select" name="breed">
                            <option value="">Semua</option>
                            <option value="Rex" {{ ($breed ?? '') == 'Rex' ? 'selected' : '' }}>Rex</option>
                            <option value="New Zealand" {{ ($breed ?? '') == 'New Zealand' ? 'selected' : '' }}>New Zealand</option>
                            <option value="Flemish Giant" {{ ($breed ?? '') == 'Flemish Giant' ? 'selected' : '' }}>Flemish Giant</option>
                            <option value="Lokal" {{ ($breed ?? '') == 'Lokal' ? 'selected' : '' }}>Lokal</option>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <label class="form-label">Status Kesehatan</label>
                        <select class="form-select" name="health_status">
                            <option value="">Semua</option>
                            <option value="sehat" {{ ($healthStatus ?? '') == 'sehat' ? 'selected' : '' }}>Sehat</option>
                            <option value="sakit" {{ ($healthStatus ?? '') == 'sakit' ? 'selected' : '' }}>Sakit</option>
                            <option value="karantina" {{ ($healthStatus ?? '') == 'karantina' ? 'selected' : '' }}>Karantina</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label class="form-label">&nbsp;</label>
                        <div class="d-flex gap-2">
                            <button type="submit" class="btn btn-success flex-grow-1">
                                <i class="fas fa-search me-2"></i>Filter
                            </button>
                            @if($search || $gender || $breed || $healthStatus)
                            <a href="{{ route('database-ternak') }}" class="btn btn-secondary">
                                Reset
                            </a>
                            @endif
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- Tabel Database Ternak -->
    <div class="card border-0 shadow-sm">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover align-middle">
                    <thead class="table-light">
                        <tr>
                            <th>ID/No. Telinga</th>
                            <th>Jenis Kelamin</th>
                            <th>Ras/Jenis</th>
                            <th>Tanggal Lahir</th>
                            <th>Umur</th>
                            <th>Bobot (kg)</th>
                            <th>Asal Usul</th>
                            <th>Silsilah</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($rabbits as $rabbit)
                        <tr>
                            <td><strong>{{ $rabbit->code }}</strong></td>
                            <td>
                                @if($rabbit->gender == 'jantan')
                                <i class="fas fa-mars text-info me-1"></i>Jantan
                                @else
                                <i class="fas fa-venus text-danger me-1"></i>Betina
                                @endif
                            </td>
                            <td><span class="badge bg-primary">{{ $rabbit->breed }}</span></td>
                            <td>{{ $rabbit->birth_date->format('d M Y') }}</td>
                            <td>{{ $rabbit->age }} bulan</td>
                            <td>{{ $rabbit->weight ?? '-' }} kg</td>
                            <td><span class="badge bg-success">Ternak</span></td>
                            <td>
                                <small class="text-muted">-</small>
                            </td>
                            <td>
                                @if($rabbit->health_status == 'sehat')
                                <span class="badge bg-success">Sehat</span>
                                @elseif($rabbit->health_status == 'sakit')
                                <span class="badge bg-danger">Sakit</span>
                                @else
                                <span class="badge bg-warning">Karantina</span>
                                @endif
                            </td>
                            <td>
                                <button class="btn btn-sm btn-info">
                                    <i class="fas fa-eye"></i>
                                </button>
                                <button class="btn btn-sm btn-warning">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <form action="{{ route('database-ternak.destroy', $rabbit->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus?')">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="10" class="text-center py-4">
                                <i class="fas fa-inbox fa-3x text-muted mb-3"></i>
                                <p class="text-muted">Belum ada data kelinci. Klik "Tambah Kelinci" untuk mulai.</p>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            
            <!-- Pagination -->
            @if($rabbits->hasPages())
            <nav class="mt-4">
                {{ $rabbits->links('pagination::bootstrap-5') }}
            </nav>
            @endif
        </div>
    </div>
</div>

<!-- Modal Detail Kelinci -->
<div class="modal fade" id="detailModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Detail Kelinci - ID-M012</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6">
                        <h6 class="text-muted mb-3">Informasi Dasar</h6>
                        <table class="table table-sm">
                            <tr>
                                <td width="40%"><strong>ID/No. Telinga:</strong></td>
                                <td>ID-M012</td>
                            </tr>
                            <tr>
                                <td><strong>Jenis Kelamin:</strong></td>
                                <td><i class="fas fa-mars text-info me-1"></i>Jantan</td>
                            </tr>
                            <tr>
                                <td><strong>Ras/Jenis:</strong></td>
                                <td><span class="badge bg-primary">New Zealand</span></td>
                            </tr>
                            <tr>
                                <td><strong>Tanggal Lahir:</strong></td>
                                <td>15 Januari 2023</td>
                            </tr>
                            <tr>
                                <td><strong>Umur:</strong></td>
                                <td>1 tahun 11 bulan</td>
                            </tr>
                            <tr>
                                <td><strong>Bobot Terakhir:</strong></td>
                                <td>4.2 kg</td>
                            </tr>
                            <tr>
                                <td><strong>Status:</strong></td>
                                <td><span class="badge bg-success">Aktif</span></td>
                            </tr>
                        </table>
                    </div>
                    <div class="col-md-6">
                        <h6 class="text-muted mb-3">Asal Usul & Silsilah</h6>
                        <table class="table table-sm">
                            <tr>
                                <td width="40%"><strong>Asal Usul:</strong></td>
                                <td><span class="badge bg-success">Ternak Sendiri</span></td>
                            </tr>
                            <tr>
                                <td><strong>ID Ayah:</strong></td>
                                <td>ID-M001 (New Zealand)</td>
                            </tr>
                            <tr>
                                <td><strong>ID Ibu:</strong></td>
                                <td>ID-F003 (New Zealand)</td>
                            </tr>
                            <tr>
                                <td colspan="2" class="pt-3">
                                    <div class="alert alert-info mb-0">
                                        <i class="fas fa-info-circle me-2"></i>
                                        <small><strong>Catatan:</strong> Pejantan produktif, sudah menghasilkan 15 anak dengan tingkat survival 92%</small>
                                    </div>
                                </td>
                            </tr>
                        </table>
                        
                        <h6 class="text-muted mb-3 mt-3">Grafik Pertumbuhan Bobot</h6>
                        <canvas id="weightChart" height="150"></canvas>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                <button type="button" class="btn btn-warning">Edit Data</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal Tambah Kelinci -->
<div class="modal fade" id="addRabbitModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Kelinci Baru</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label">ID/No. Telinga (Tato) <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" placeholder="Contoh: ID-M012" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Jenis Kelamin <span class="text-danger">*</span></label>
                            <select class="form-select" required>
                                <option value="">Pilih...</option>
                                <option value="jantan">Jantan</option>
                                <option value="betina">Betina</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Ras/Jenis <span class="text-danger">*</span></label>
                            <select class="form-select" required>
                                <option value="">Pilih...</option>
                                <option value="rex">Rex</option>
                                <option value="nz">New Zealand</option>
                                <option value="fg">Flemish Giant</option>
                                <option value="lokal">Lokal</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Tanggal Lahir <span class="text-danger">*</span></label>
                            <input type="date" class="form-control" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Bobot Badan (kg) <span class="text-danger">*</span></label>
                            <input type="number" step="0.1" class="form-control" placeholder="Contoh: 3.5" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Asal Usul <span class="text-danger">*</span></label>
                            <select class="form-select" required>
                                <option value="">Pilih...</option>
                                <option value="ternak">Ternak Sendiri</option>
                                <option value="beli">Beli Luar</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">ID Ayah</label>
                            <input type="text" class="form-control" placeholder="Contoh: ID-M001">
                            <small class="text-muted">Kosongkan jika tidak diketahui</small>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">ID Ibu</label>
                            <input type="text" class="form-control" placeholder="Contoh: ID-F003">
                            <small class="text-muted">Kosongkan jika tidak diketahui</small>
                        </div>
                        <div class="col-md-12">
                            <label class="form-label">Catatan</label>
                            <textarea class="form-control" rows="3" placeholder="Catatan tambahan..."></textarea>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <button type="button" class="btn btn-primary">Simpan</button>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    // Grafik Pertumbuhan Bobot di Modal Detail
    const weightCtx = document.getElementById('weightChart');
    if (weightCtx) {
        new Chart(weightCtx.getContext('2d'), {
            type: 'line',
            data: {
                labels: ['0 bulan', '2 bulan', '4 bulan', '6 bulan', '8 bulan', '10 bulan', '12 bulan', 'Sekarang'],
                datasets: [{
                    label: 'Bobot (kg)',
                    data: [0.5, 1.2, 2.0, 2.8, 3.4, 3.8, 4.0, 4.2],
                    borderColor: 'rgb(75, 192, 192)',
                    backgroundColor: 'rgba(75, 192, 192, 0.1)',
                    tension: 0.4,
                    fill: true
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: true,
                plugins: {
                    legend: {
                        display: false
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            callback: function(value) {
                                return value + ' kg';
                            }
                        }
                    }
                }
            }
        });
    }
</script>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
@endsection
