<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HealthDashboardController;
use App\Http\Controllers\FeedingDashboardController;
use App\Http\Controllers\MarketingDashboardController;
use App\Http\Controllers\DatabaseTernakController;
use App\Http\Controllers\BreedingController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\RecordingController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\ForumController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\AuthController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
   
Route::get('/', [HomeController::class, 'index']);

// Public Routes
Route::get('/about', [AboutController::class, 'index']);
Route::get('/services', [ServiceController::class, 'index']);
Route::get('/forum', [ForumController::class, 'index']);
Route::get('/kontak', function () {
    return view('kontak');
});

// Authentication Routes
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.post');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Protected Routes - Require Authentication
Route::middleware(['auth'])->group(function () {
    // Dashboard Routes
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/dashboard/data', [DashboardController::class, 'getDashboardData'])->name('dashboard.data');
    Route::get('/dashboard/breeding-program', [DashboardController::class, 'breedingProgram'])->name('dashboard.breeding');
    Route::get('/dashboard/health', [HealthDashboardController::class, 'index'])->name('dashboard.health');
    Route::get('/dashboard/health/data', [HealthDashboardController::class, 'getHealthData'])->name('dashboard.health.data');
    Route::get('/dashboard/feeding', [FeedingDashboardController::class, 'index'])->name('dashboard.feeding');
    Route::post('/dashboard/feeding/generate', [FeedingDashboardController::class, 'generateSchedule'])->name('dashboard.feeding.generate');
    Route::get('/dashboard/marketing', [MarketingDashboardController::class, 'index'])->name('dashboard.marketing');
    Route::get('/dashboard/marketing/data', [MarketingDashboardController::class, 'getMarketingData'])->name('dashboard.marketing.data');

    // Database Ternak Routes
    Route::get('/database-ternak', [DatabaseTernakController::class, 'index'])->name('database-ternak');
    Route::post('/database-ternak', [DatabaseTernakController::class, 'store'])->name('database-ternak.store');
    Route::put('/database-ternak/{id}', [DatabaseTernakController::class, 'update'])->name('database-ternak.update');
    Route::delete('/database-ternak/{id}', [DatabaseTernakController::class, 'destroy'])->name('database-ternak.destroy');

    // Breeding Program Routes
    Route::get('/breeding', [BreedingController::class, 'index'])->name('breeding.index');
    Route::post('/breeding', [BreedingController::class, 'store'])->name('breeding.store');
    Route::put('/breeding/{id}', [BreedingController::class, 'update'])->name('breeding.update');
    Route::delete('/breeding/{id}', [BreedingController::class, 'destroy'])->name('breeding.destroy');

    // Recording Routes
    Route::get('/recording', [RecordingController::class, 'index'])->name('recording');
    Route::post('/recording/breeding', [RecordingController::class, 'storeBreeding'])->name('recording.breeding');
    Route::post('/recording/feeding', [RecordingController::class, 'storeFeeding'])->name('recording.feeding');
    Route::post('/recording/health', [RecordingController::class, 'storeHealth'])->name('recording.health');

    // Notifications Routes
    Route::get('/notifications', [NotificationController::class, 'index'])->name('notifications');

    // Reports Routes
    Route::get('/reports', [ReportController::class, 'index'])->name('reports');
    Route::post('/reports', [ReportController::class, 'store'])->name('reports.store');
    Route::put('/reports/{id}', [ReportController::class, 'update'])->name('reports.update');
    Route::delete('/reports/{id}', [ReportController::class, 'destroy'])->name('reports.destroy');
});
