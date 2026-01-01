@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="row">
        <div class="col-md-12">
            <h2 class="mb-2 fw-bold">Pencatatan Digital</h2>
            <p class="text-muted mb-4">Pilih menu pencatatan yang ingin Anda kelola</p>
            
            <!-- Menu Cards -->
            <div class="row g-4">
                <!-- Database Ternak -->
                <div class="col-md-4">
                    <a href="/database-ternak" class="text-decoration-none">
                        <div class="card border-0 shadow-sm h-100 hover-card">
                            <div class="card-body text-center p-4">
                                <div class="bg-primary bg-opacity-10 p-4 rounded-circle d-inline-flex mb-3">
                                    <i class="fas fa-database text-primary" style="font-size: 48px;"></i>
                                </div>
                                <h5 class="card-title fw-bold">Database Ternak</h5>
                                <p class="card-text text-muted">Pemilihan Bibit & Inventory - KTP Setiap Kelinci</p>
                                <span class="btn btn-primary btn-sm mt-2">Kelola Data <i class="fas fa-arrow-right ms-2"></i></span>
                            </div>
                        </div>
                    </a>
                </div>

                <!-- Breeding Program -->
                <div class="col-md-4">
                    <a href="/dashboard/breeding-program" class="text-decoration-none">
                        <div class="card border-0 shadow-sm h-100 hover-card">
                            <div class="card-body text-center p-4">
                                <div class="bg-danger bg-opacity-10 p-4 rounded-circle d-inline-flex mb-3">
                                    <i class="fas fa-heart text-danger" style="font-size: 48px;"></i>
                                </div>
                                <h5 class="card-title fw-bold">Breeding Program</h5>
                                <p class="card-text text-muted">Jadwal Kawin, Kehamilan & Kelahiran</p>
                                <span class="btn btn-danger btn-sm mt-2">Kelola Data <i class="fas fa-arrow-right ms-2"></i></span>
                            </div>
                        </div>
                    </a>
                </div>

                <!-- Kesehatan -->
                <div class="col-md-4">
                    <a href="/dashboard/health" class="text-decoration-none">
                        <div class="card border-0 shadow-sm h-100 hover-card">
                            <div class="card-body text-center p-4">
                                <div class="bg-success bg-opacity-10 p-4 rounded-circle d-inline-flex mb-3">
                                    <i class="fas fa-stethoscope text-success" style="font-size: 48px;"></i>
                                </div>
                                <h5 class="card-title fw-bold">Kesehatan</h5>
                                <p class="card-text text-muted">Vaksinasi, Obat-obatan & Medical Records</p>
                                <span class="btn btn-success btn-sm mt-2">Kelola Data <i class="fas fa-arrow-right ms-2"></i></span>
                            </div>
                        </div>
                    </a>
                </div>

                <!-- Manajemen Pakan -->
                <div class="col-md-4">
                    <a href="/dashboard/feeding" class="text-decoration-none">
                        <div class="card border-0 shadow-sm h-100 hover-card">
                            <div class="card-body text-center p-4">
                                <div class="bg-warning bg-opacity-10 p-4 rounded-circle d-inline-flex mb-3">
                                    <i class="fas fa-carrot text-warning" style="font-size: 48px;"></i>
                                </div>
                                <h5 class="card-title fw-bold">Manajemen Pakan</h5>
                                <p class="card-text text-muted">Stock Pakan, Konsumsi & Biaya</p>
                                <span class="btn btn-warning btn-sm mt-2">Kelola Data <i class="fas fa-arrow-right ms-2"></i></span>
                            </div>
                        </div>
                    </a>
                </div>

                <!-- Pemasaran -->
                <div class="col-md-4">
                    <a href="#" class="text-decoration-none">
                        <div class="card border-0 shadow-sm h-100 hover-card">
                            <div class="card-body text-center p-4">
                                <div class="bg-info bg-opacity-10 p-4 rounded-circle d-inline-flex mb-3">
                                    <i class="fas fa-shopping-cart text-info" style="font-size: 48px;"></i>
                                </div>
                                <h5 class="card-title fw-bold">Pemasaran</h5>
                                <p class="card-text text-muted">Data Penjualan & Pendapatan</p>
                                <span class="btn btn-info btn-sm mt-2">Kelola Data <i class="fas fa-arrow-right ms-2"></i></span>
                            </div>
                        </div>
                    </a>
                </div>

                <!-- Laporan Keuangan -->
                <div class="col-md-4">
                    <a href="#" class="text-decoration-none">
                        <div class="card border-0 shadow-sm h-100 hover-card">
                            <div class="card-body text-center p-4">
                                <div class="bg-secondary bg-opacity-10 p-4 rounded-circle d-inline-flex mb-3">
                                    <i class="fas fa-chart-pie text-secondary" style="font-size: 48px;"></i>
                                </div>
                                <h5 class="card-title fw-bold">Laporan Keuangan</h5>
                                <p class="card-text text-muted">Analisis Pendapatan & Pengeluaran</p>
                                <span class="btn btn-secondary btn-sm mt-2">Kelola Data <i class="fas fa-arrow-right ms-2"></i></span>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
.hover-card {
    transition: all 0.3s ease;
}
.hover-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 30px rgba(0,0,0,0.15) !important;
}
</style>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
@endsection