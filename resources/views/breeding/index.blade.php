@extends('layouts.app')

@section('content')
<div class="container-fluid py-4">
    <!-- Clean Header -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="fw-bold mb-0">Program Breeding</h2>
            <p class="text-muted small mb-0">Kelola program perkawinan kelinci</p>
        </div>
        <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#addBreedingModal">
            <i class="fas fa-plus me-2"></i>Tambah Breeding
        </button>
    </div>

    @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
    @endif

    <!-- Clean Statistics -->
    <div class="row g-3 mb-4">
        <div class="col-lg-3 col-md-6">
            <div class="card border-0 shadow-sm">
                <div class="card-body text-center py-4">
                    <div class="text-danger mb-2"><i class="fas fa-heart fs-3"></i></div>
                    <h3 class="fw-bold mb-1">{{ $stats['total'] }}</h3>
                    <p class="text-muted small mb-0">Total Program</p>
                </div>
            </div>
        </div>
        
        <div class="col-lg-3 col-md-6">
            <div class="card border-0 shadow-sm">
                <div class="card-body text-center py-4">
                    <div class="text-warning mb-2"><i class="fas fa-clock fs-3"></i></div>
                    <h3 class="fw-bold mb-1">{{ $stats['scheduled'] }}</h3>
                    <p class="text-muted small mb-0">Menunggu</p>
                </div>
            </div>
        </div>
        
        <div class="col-lg-3 col-md-6">
            <div class="card border-0 shadow-sm">
                <div class="card-body text-center py-4">
                    <div class="text-success mb-2"><i class="fas fa-check-circle fs-3"></i></div>
                    <h3 class="fw-bold mb-1">{{ $stats['completed'] }}</h3>
                    <p class="text-muted small mb-0">Selesai</p>
                </div>
            </div>
        </div>
        
        <div class="col-lg-3 col-md-6">
            <div class="card border-0 shadow-sm">
                <div class="card-body text-center py-4">
                    <div class="text-primary mb-2"><i class="fas fa-baby fs-3"></i></div>
                    <h3 class="fw-bold mb-1">{{ $stats['total_offspring'] }}</h3>
                    <p class="text-muted small mb-0">Total Anak</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Clean Filter & Search -->
    <div class="card border-0 shadow-sm mb-3">
        <div class="card-body py-3">
            <div class="row align-items-center g-2">
                <div class="col-md-8">
                    <div class="d-flex gap-2" role="group">
                        <button type="button" class="btn btn-success btn-sm active" data-filter="all" style="border-radius: 20px; padding: 5px 20px;">
                            <strong>{{ $stats['total'] }}</strong> Semua
                        </button>
                        <button type="button" class="btn btn-warning btn-sm text-white" data-filter="scheduled" style="border-radius: 20px; padding: 5px 20px; background-color: #ffc107; border-color: #ffc107;">
                            <strong>{{ $stats['scheduled'] }}</strong> Menunggu
                        </button>
                        <button type="button" class="btn btn-danger btn-sm" data-filter="completed" style="border-radius: 20px; padding: 5px 20px;">
                            <strong>{{ $stats['completed'] }}</strong> Selesai
                        </button>
                        <button type="button" class="btn btn-secondary btn-sm" data-filter="cancelled" style="border-radius: 20px; padding: 5px 20px;">
                            <strong>{{ $stats['cancelled'] }}</strong> Batal
                        </button>
                    </div>
                </div>
                <div class="col-md-4">
                    <input type="text" id="searchBreeding" class="form-control form-control-sm" placeholder="Cari...">
                </div>
            </div>
        </div>
    </div>

    <!-- Clean Table -->
    <div class="card border-0 shadow-sm">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0" id="breedingTable">
                <thead class="table-light">
                    <tr>
                        <th class="px-3 py-3 fw-normal">Tanggal Kawin</th>
                        <th class="py-3 fw-normal"><span style="color: #e91e63;">♀</span> Betina</th>
                        <th class="py-3 fw-normal"><span style="color: #2196f3;">♂</span> Jantan</th>
                        <th class="py-3 fw-normal">Perkiraan Lahir</th>
                        <th class="py-3 fw-normal text-center">Jumlah Anak</th>
                        <th class="py-3 fw-normal text-center">Status</th>
                        <th class="py-3 fw-normal text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($breedings as $breeding)
                    <tr data-status="{{ $breeding->status }}">
                        <td class="px-3">
                            <div class="fw-bold">{{ \Carbon\Carbon::parse($breeding->breeding_date)->format('d M Y') }}</div>
                            <small class="text-muted">{{ \Carbon\Carbon::parse($breeding->breeding_date)->diffForHumans() }}</small>
                        </td>
                        <td>
                            <div class="fw-bold"><span style="color: #e91e63;">♀</span> {{ $breeding->femaleRabbit->code }}</div>
                            <small class="text-muted">{{ $breeding->femaleRabbit->name }}</small>
                        </td>
                        <td>
                            <div class="fw-bold"><span style="color: #2196f3;">♂</span> {{ $breeding->maleRabbit->code }}</div>
                            <small class="text-muted">{{ $breeding->maleRabbit->name }}</small>
                        </td>
                        <td>
                            @if($breeding->expected_birth_date)
                                <div>{{ \Carbon\Carbon::parse($breeding->expected_birth_date)->format('d M Y') }}</div>
                                @php
                                    $daysUntil = \Carbon\Carbon::parse($breeding->expected_birth_date)->diffInDays(now(), false);
                                @endphp
                                @if($daysUntil < 0)
                                    <small class="text-primary">{{ abs($daysUntil) }} hari lagi</small>
                                @elseif($daysUntil == 0)
                                    <small class="badge bg-danger">Hari Ini</small>
                                @else
                                    <small class="text-muted">{{ $daysUntil }} hari lalu</small>
                                @endif
                            @else
                                <span class="text-muted">-</span>
                            @endif
                        </td>
                        <td class="text-center">
                            @if($breeding->offspring_count)
                                <span class="badge bg-success">{{ $breeding->offspring_count }}</span>
                            @else
                                <span class="text-muted">-</span>
                            @endif
                        </td>
                        <td class="text-center">
                            @if($breeding->status == 'scheduled')
                                <span class="badge bg-warning text-dark">Menunggu</span>
                            @elseif($breeding->status == 'completed')
                                <span class="badge bg-success">Selesai</span>
                            @else
                                <span class="badge bg-secondary">Batal</span>
                            @endif
                        </td>
                        <td class="text-center">
                            <div class="btn-group btn-group-sm">
                                <button class="btn btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#viewModal{{ $breeding->id }}" title="Detail">
                                    <i class="fas fa-eye"></i>
                                </button>
                                <button class="btn btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#editModal{{ $breeding->id }}" title="Edit">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <form action="{{ route('breeding.destroy', $breeding->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-outline-secondary" onclick="return confirm('Hapus data ini?')" title="Hapus">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>

                        <!-- View Modal -->
                        <div class="modal fade" id="viewModal{{ $breeding->id }}" tabindex="-1">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h6 class="modal-title fw-bold mb-0">Detail Breeding</h6>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row g-3">
                                            <div class="col-6">
                                                <label class="small text-muted">Betina</label>
                                                <div class="fw-bold">{{ $breeding->femaleRabbit->code }}</div>
                                                <div class="small text-muted">{{ $breeding->femaleRabbit->name }}</div>
                                            </div>
                                            <div class="col-6">
                                                <label class="small text-muted">Jantan</label>
                                                <div class="fw-bold">{{ $breeding->maleRabbit->code }}</div>
                                                <div class="small text-muted">{{ $breeding->maleRabbit->name }}</div>
                                            </div>
                                            <div class="col-6">
                                                <label class="small text-muted">Tanggal Kawin</label>
                                                <div>{{ \Carbon\Carbon::parse($breeding->breeding_date)->format('d M Y') }}</div>
                                            </div>
                                            <div class="col-6">
                                                <label class="small text-muted">Perkiraan Lahir</label>
                                                <div>{{ $breeding->expected_birth_date ? \Carbon\Carbon::parse($breeding->expected_birth_date)->format('d M Y') : '-' }}</div>
                                            </div>
                                            <div class="col-6">
                                                <label class="small text-muted">Jumlah Anak</label>
                                                <div>{{ $breeding->offspring_count ?? '-' }}</div>
                                            </div>
                                            <div class="col-6">
                                                <label class="small text-muted">Status</label>
                                                <div>
                                                    @if($breeding->status == 'scheduled')
                                                        <span class="badge bg-warning text-dark">Menunggu</span>
                                                    @elseif($breeding->status == 'completed')
                                                        <span class="badge bg-success">Selesai</span>
                                                    @else
                                                        <span class="badge bg-secondary">Batal</span>
                                                    @endif
                                                </div>
                                            </div>
                                            @if($breeding->notes)
                                            <div class="col-12">
                                                <label class="small text-muted">Catatan</label>
                                                <div class="small">{{ $breeding->notes }}</div>
                                            </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </tr>

                    @empty
                    <tr>
                        <td colspan="7" class="text-center py-5">
                            <div class="text-muted mb-2"><i class="fas fa-heart fs-1"></i></div>
                            <h6 class="mb-1">Belum Ada Data</h6>
                            <p class="text-muted small mb-0">Tambah program breeding untuk memulai</p>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Add Modal -->
<div class="modal fade" id="addBreedingModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title fw-bold mb-0">Tambah Breeding</h6>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form action="{{ route('breeding.store') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label small">Kelinci Betina</label>
                        <select name="female_rabbit_id" class="form-select" required>
                            <option value="">Pilih Betina</option>
                            @foreach($femaleRabbits as $female)
                                <option value="{{ $female->id }}">{{ $female->code }} - {{ $female->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label small">Kelinci Jantan</label>
                        <select name="male_rabbit_id" class="form-select" required>
                            <option value="">Pilih Jantan</option>
                            @foreach($maleRabbits as $male)
                                <option value="{{ $male->id }}">{{ $male->code }} - {{ $male->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label small">Tanggal Kawin</label>
                        <input type="date" name="breeding_date" class="form-control" required value="{{ date('Y-m-d') }}">
                    </div>

                    <div class="mb-3">
                        <label class="form-label small">Catatan</label>
                        <textarea name="notes" class="form-control" rows="2" placeholder="Opsional"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-light" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-sm btn-danger">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Edit Modal -->
@foreach($breedings as $breeding)
<div class="modal fade" id="editModal{{ $breeding->id }}" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title fw-bold mb-0">Update Breeding</h6>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form action="{{ route('breeding.update', $breeding->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="alert alert-light border small mb-3">
                        <strong>{{ $breeding->femaleRabbit->code }}</strong> x <strong>{{ $breeding->maleRabbit->code }}</strong>
                    </div>

                    <div class="mb-3">
                        <label class="form-label small">Status</label>
                        <select name="status" class="form-select" required>
                            <option value="scheduled" {{ $breeding->status == 'scheduled' ? 'selected' : '' }}>Menunggu</option>
                            <option value="completed" {{ $breeding->status == 'completed' ? 'selected' : '' }}>Selesai</option>
                            <option value="cancelled" {{ $breeding->status == 'cancelled' ? 'selected' : '' }}>Dibatalkan</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label small">Tanggal Lahir Aktual</label>
                        <input type="date" name="actual_birth_date" class="form-control" value="{{ $breeding->actual_birth_date }}">
                    </div>

                    <div class="mb-3">
                        <label class="form-label small">Jumlah Anak</label>
                        <input type="number" name="offspring_count" class="form-control" value="{{ $breeding->offspring_count }}" min="0" max="20">
                    </div>

                    <div class="mb-3">
                        <label class="form-label small">Catatan</label>
                        <textarea name="notes" class="form-control" rows="2">{{ $breeding->notes }}</textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-light" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-sm btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endforeach

<script>
// Filter functionality
document.querySelectorAll('[data-filter]').forEach(btn => {
    btn.addEventListener('click', function() {
        const filter = this.getAttribute('data-filter');
        document.querySelectorAll('[data-filter]').forEach(b => b.classList.remove('active'));
        this.classList.add('active');
        
        document.querySelectorAll('#breedingTable tbody tr[data-status]').forEach(row => {
            if (filter === 'all' || row.getAttribute('data-status') === filter) {
                row.style.display = '';
            } else {
                row.style.display = 'none';
            }
        });
    });
});

// Search functionality
document.getElementById('searchBreeding').addEventListener('keyup', function() {
    const search = this.value.toLowerCase();
    document.querySelectorAll('#breedingTable tbody tr[data-status]').forEach(row => {
        const text = row.textContent.toLowerCase();
        row.style.display = text.includes(search) ? '' : 'none';
    });
});
</script>
@endsection
