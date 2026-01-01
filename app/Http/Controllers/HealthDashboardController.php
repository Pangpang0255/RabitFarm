<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rabbit;
use App\Models\HealthRecord;
use Illuminate\Support\Facades\Auth;

class HealthDashboardController extends Controller
{
    public function index()
    {
        $userId = session('user_id', 1);

        // Total health records statistics
        $totalHealthRecords = HealthRecord::where('user_id', $userId)->count();
        $recoveredCount = HealthRecord::where('user_id', $userId)
            ->where('status', 'recovered')->count();
        $underTreatmentCount = HealthRecord::where('user_id', $userId)
            ->where('status', 'under_treatment')->count();
        $criticalCount = HealthRecord::where('user_id', $userId)
            ->where('status', 'critical')->count();

        // Rabbit health status
        $healthyRabbits = Rabbit::where('user_id', $userId)
            ->where('health_status', 'sehat')->count();
        $sickRabbits = Rabbit::where('user_id', $userId)
            ->where('health_status', 'sakit')->count();
        $totalRabbits = Rabbit::where('user_id', $userId)->count();

        // Upcoming health checks (next check date)
        $upcomingChecks = HealthRecord::where('user_id', $userId)
            ->whereNotNull('next_check_date')
            ->where('next_check_date', '>=', now())
            ->where('status', '!=', 'recovered')
            ->with(['rabbit'])
            ->orderBy('next_check_date', 'asc')
            ->take(10)
            ->get();

        // Overdue health checks
        $overdueChecks = HealthRecord::where('user_id', $userId)
            ->whereNotNull('next_check_date')
            ->where('next_check_date', '<', now())
            ->where('status', '!=', 'recovered')
            ->with(['rabbit'])
            ->orderBy('next_check_date', 'asc')
            ->get();

        // Critical cases
        $criticalCases = HealthRecord::where('user_id', $userId)
            ->where('status', 'critical')
            ->with(['rabbit'])
            ->orderBy('check_date', 'desc')
            ->get();

        // Under treatment
        $underTreatment = HealthRecord::where('user_id', $userId)
            ->where('status', 'under_treatment')
            ->with(['rabbit'])
            ->orderBy('check_date', 'desc')
            ->take(10)
            ->get();

        // Recent health records
        $recentHealthRecords = HealthRecord::where('user_id', $userId)
            ->with(['rabbit'])
            ->orderBy('check_date', 'desc')
            ->take(15)
            ->get();

        // Common diagnoses (top 5)
        $commonDiagnoses = HealthRecord::where('user_id', $userId)
            ->selectRaw('diagnosis, COUNT(*) as count')
            ->groupBy('diagnosis')
            ->orderByRaw('COUNT(*) DESC')
            ->limit(5)
            ->get();

        // Monthly health statistics for chart (last 12 months)
        $monthlyHealthData = [];
        for ($i = 11; $i >= 0; $i--) {
            $month = now()->subMonths($i);
            $monthlyHealthData[] = [
                'month' => $month->format('M'),
                'checks' => HealthRecord::where('user_id', $userId)
                    ->whereYear('check_date', $month->year)
                    ->whereMonth('check_date', $month->month)
                    ->count(),
                'recovered' => HealthRecord::where('user_id', $userId)
                    ->where('status', 'recovered')
                    ->whereYear('check_date', $month->year)
                    ->whereMonth('check_date', $month->month)
                    ->count(),
                'critical' => HealthRecord::where('user_id', $userId)
                    ->where('status', 'critical')
                    ->whereYear('check_date', $month->year)
                    ->whereMonth('check_date', $month->month)
                    ->count()
            ];
        }

        // Vaccination schedule (assuming medicine contains "vaksin")
        $vaccinations = HealthRecord::where('user_id', $userId)
            ->where('medicine', 'LIKE', '%vaksin%')
            ->with(['rabbit'])
            ->orderBy('check_date', 'desc')
            ->take(10)
            ->get();

        // Health percentage
        $healthPercentage = $totalRabbits > 0 ? round(($healthyRabbits / $totalRabbits) * 100, 1) : 0;
        $sickPercentage = $totalRabbits > 0 ? round(($sickRabbits / $totalRabbits) * 100, 1) : 0;

        return view('health-dashboard', compact(
            'totalHealthRecords',
            'recoveredCount',
            'underTreatmentCount',
            'criticalCount',
            'healthyRabbits',
            'sickRabbits',
            'totalRabbits',
            'upcomingChecks',
            'overdueChecks',
            'criticalCases',
            'underTreatment',
            'recentHealthRecords',
            'commonDiagnoses',
            'monthlyHealthData',
            'vaccinations',
            'healthPercentage',
            'sickPercentage'
        ));
    }

    public function getHealthData()
    {
        $userId = session('user_id', 1);

        // Total health records statistics
        $totalHealthRecords = HealthRecord::where('user_id', $userId)->count();
        $recoveredCount = HealthRecord::where('user_id', $userId)
            ->where('status', 'recovered')->count();
        $underTreatmentCount = HealthRecord::where('user_id', $userId)
            ->where('status', 'under_treatment')->count();
        $criticalCount = HealthRecord::where('user_id', $userId)
            ->where('status', 'critical')->count();

        // Rabbit health status
        $healthyRabbits = Rabbit::where('user_id', $userId)
            ->where('health_status', 'sehat')->count();
        $sickRabbits = Rabbit::where('user_id', $userId)
            ->where('health_status', 'sakit')->count();
        $totalRabbits = Rabbit::where('user_id', $userId)->count();

        // Health percentage
        $healthPercentage = $totalRabbits > 0 ? round(($healthyRabbits / $totalRabbits) * 100, 1) : 0;
        $sickPercentage = $totalRabbits > 0 ? round(($sickRabbits / $totalRabbits) * 100, 1) : 0;

        // Upcoming checks count
        $upcomingChecksCount = HealthRecord::where('user_id', $userId)
            ->whereNotNull('next_check_date')
            ->where('next_check_date', '>=', now())
            ->where('status', '!=', 'recovered')
            ->count();

        // Overdue checks count
        $overdueChecksCount = HealthRecord::where('user_id', $userId)
            ->whereNotNull('next_check_date')
            ->where('next_check_date', '<', now())
            ->where('status', '!=', 'recovered')
            ->count();

        return response()->json([
            'totalHealthRecords' => $totalHealthRecords,
            'recoveredCount' => $recoveredCount,
            'underTreatmentCount' => $underTreatmentCount,
            'criticalCount' => $criticalCount,
            'healthyRabbits' => $healthyRabbits,
            'sickRabbits' => $sickRabbits,
            'totalRabbits' => $totalRabbits,
            'healthPercentage' => $healthPercentage,
            'sickPercentage' => $sickPercentage,
            'upcomingChecksCount' => $upcomingChecksCount,
            'overdueChecksCount' => $overdueChecksCount
        ]);
    }
}
