<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rabbit;
use App\Models\BreedingSchedule;
use App\Models\FeedingSchedule;
use App\Models\Transaction;
use App\Models\HealthRecord;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        // Get user_id (for now using 1, will be replaced with Auth::id())
        $userId = session('user_id', 1); // Temporary until auth is implemented
        
        // Get rabbit statistics
        $totalRabbits = Rabbit::where('user_id', $userId)->count();
        $maleRabbits = Rabbit::where('user_id', $userId)->where('gender', 'jantan')->count();
        $femaleRabbits = Rabbit::where('user_id', $userId)->where('gender', 'betina')->count();
        $youngRabbits = Rabbit::where('user_id', $userId)->where('status', 'anak')->count();
        
        // Get health statistics
        $healthyRabbits = Rabbit::where('user_id', $userId)->where('health_status', 'sehat')->count();
        $sickRabbits = Rabbit::where('user_id', $userId)->where('health_status', 'sakit')->count();
        
        // Get today's feeding schedules
        $todayFeeding = FeedingSchedule::where('user_id', $userId)
            ->whereDate('feeding_date', today())
            ->where('status', 'pending')
            ->count();
        
        // Get financial summary (this month)
        $thisMonthIncome = Transaction::where('user_id', $userId)
            ->where('type', 'income')
            ->whereMonth('transaction_date', now()->month)
            ->whereYear('transaction_date', now()->year)
            ->sum('amount');
            
        $thisMonthExpense = Transaction::where('user_id', $userId)
            ->where('type', 'expense')
            ->whereMonth('transaction_date', now()->month)
            ->whereYear('transaction_date', now()->year)
            ->sum('amount');
        
        $balance = $thisMonthIncome - $thisMonthExpense;
        
        // Get recent health checks
        $recentHealthChecks = HealthRecord::where('user_id', $userId)
            ->with('rabbit')
            ->orderBy('check_date', 'desc')
            ->take(5)
            ->get();
        
        return view('dashboard', compact(
            'totalRabbits',
            'maleRabbits',
            'femaleRabbits',
            'youngRabbits',
            'healthyRabbits',
            'sickRabbits',
            'todayFeeding',
            'thisMonthIncome',
            'thisMonthExpense',
            'balance',
            'recentHealthChecks'
        ));
    }

    public function getDashboardData()
    {
        $userId = session('user_id', 1);
        
        // Get rabbit statistics
        $totalRabbits = Rabbit::where('user_id', $userId)->count();
        $maleRabbits = Rabbit::where('user_id', $userId)->where('gender', 'jantan')->count();
        $femaleRabbits = Rabbit::where('user_id', $userId)->where('gender', 'betina')->count();
        $youngRabbits = Rabbit::where('user_id', $userId)->where('status', 'anak')->count();
        
        // Get health statistics
        $healthyRabbits = Rabbit::where('user_id', $userId)->where('health_status', 'sehat')->count();
        $sickRabbits = Rabbit::where('user_id', $userId)->where('health_status', 'sakit')->count();
        
        // Get breeding schedules (upcoming)
        $upcomingBreedings = BreedingSchedule::where('user_id', $userId)
            ->where('status', 'scheduled')
            ->orderBy('breeding_date', 'asc')
            ->take(5)
            ->with(['femaleRabbit', 'maleRabbit'])
            ->get();
        
        // Get today's feeding schedules
        $todayFeeding = FeedingSchedule::where('user_id', $userId)
            ->whereDate('feeding_date', today())
            ->where('status', 'pending')
            ->count();
        
        // Get financial summary (this month)
        $thisMonthIncome = Transaction::where('user_id', $userId)
            ->where('type', 'income')
            ->whereMonth('transaction_date', now()->month)
            ->whereYear('transaction_date', now()->year)
            ->sum('amount');
            
        $thisMonthExpense = Transaction::where('user_id', $userId)
            ->where('type', 'expense')
            ->whereMonth('transaction_date', now()->month)
            ->whereYear('transaction_date', now()->year)
            ->sum('amount');
        
        $balance = $thisMonthIncome - $thisMonthExpense;
        
        // Get recent health checks
        $recentHealthChecks = HealthRecord::where('user_id', $userId)
            ->with('rabbit')
            ->orderBy('check_date', 'desc')
            ->take(5)
            ->get();

        return response()->json([
            'totalRabbits' => $totalRabbits,
            'maleRabbits' => $maleRabbits,
            'femaleRabbits' => $femaleRabbits,
            'youngRabbits' => $youngRabbits,
            'healthyRabbits' => $healthyRabbits,
            'sickRabbits' => $sickRabbits,
            'upcomingBreedings' => $upcomingBreedings,
            'todayFeeding' => $todayFeeding,
            'thisMonthIncome' => $thisMonthIncome,
            'thisMonthExpense' => $thisMonthExpense,
            'balance' => $balance,
            'recentHealthChecks' => $recentHealthChecks,
            'lastUpdate' => now()->format('d M Y H:i:s')
        ]);
    }

    public function breedingProgram()
    {
        $userId = session('user_id', 1);

        // Total breeding statistics
        $totalBreedings = BreedingSchedule::where('user_id', $userId)->count();
        $scheduledBreedings = BreedingSchedule::where('user_id', $userId)
            ->where('status', 'scheduled')->count();
        $completedBreedings = BreedingSchedule::where('user_id', $userId)
            ->where('status', 'completed')->count();
        $cancelledBreedings = BreedingSchedule::where('user_id', $userId)
            ->where('status', 'cancelled')->count();

        // Average offspring count
        $avgOffspring = BreedingSchedule::where('user_id', $userId)
            ->where('status', 'completed')
            ->whereNotNull('offspring_count')
            ->avg('offspring_count');

        // Total offspring produced
        $totalOffspring = BreedingSchedule::where('user_id', $userId)
            ->where('status', 'completed')
            ->sum('offspring_count');

        // Upcoming scheduled breedings
        $upcomingBreedings = BreedingSchedule::where('user_id', $userId)
            ->where('status', 'scheduled')
            ->where('breeding_date', '>=', now())
            ->with(['femaleRabbit', 'maleRabbit'])
            ->orderBy('breeding_date', 'asc')
            ->get();

        // Expected births (upcoming due dates)
        $expectedBirths = BreedingSchedule::where('user_id', $userId)
            ->where('status', 'scheduled')
            ->whereNotNull('expected_birth_date')
            ->where('expected_birth_date', '>=', now())
            ->with(['femaleRabbit', 'maleRabbit'])
            ->orderBy('expected_birth_date', 'asc')
            ->take(10)
            ->get();

        // Recent breeding history
        $recentBreedings = BreedingSchedule::where('user_id', $userId)
            ->with(['femaleRabbit', 'maleRabbit'])
            ->orderBy('created_at', 'desc')
            ->take(15)
            ->get();

        // Active breeding rabbits
        $activeFemales = Rabbit::where('user_id', $userId)
            ->where('gender', 'betina')
            ->where('status', 'indukan')
            ->count();

        $activeMales = Rabbit::where('user_id', $userId)
            ->where('gender', 'jantan')
            ->where('status', 'pejantan')
            ->count();

        // Pregnancy check needed (breeding more than 10 days ago)
        $pregnancyChecks = BreedingSchedule::where('user_id', $userId)
            ->where('status', 'scheduled')
            ->where('breeding_date', '<=', now()->subDays(10))
            ->whereNull('expected_birth_date')
            ->with(['femaleRabbit', 'maleRabbit'])
            ->orderBy('breeding_date', 'asc')
            ->get();

        // Weaning schedule (offspring ready to wean - 30-35 days after birth)
        $weaningSchedule = BreedingSchedule::where('user_id', $userId)
            ->where('status', 'completed')
            ->whereNotNull('expected_birth_date')
            ->whereNotNull('offspring_count')
            ->where('offspring_count', '>', 0)
            ->whereBetween('expected_birth_date', [now()->subDays(45), now()->subDays(28)])
            ->with(['femaleRabbit'])
            ->orderBy('expected_birth_date', 'asc')
            ->get();

        // Monthly breeding statistics for chart (last 12 months)
        $monthlyData = [];
        $monthlyOffspring = [];
        for ($i = 11; $i >= 0; $i--) {
            $month = now()->subMonths($i);
            $monthlyData[] = [
                'month' => $month->format('M'),
                'breedings' => BreedingSchedule::where('user_id', $userId)
                    ->whereYear('breeding_date', $month->year)
                    ->whereMonth('breeding_date', $month->month)
                    ->count(),
                'offspring' => BreedingSchedule::where('user_id', $userId)
                    ->where('status', 'completed')
                    ->whereYear('breeding_date', $month->year)
                    ->whereMonth('breeding_date', $month->month)
                    ->sum('offspring_count') ?? 0
            ];
        }

        return view('breeding-program', compact(
            'totalBreedings',
            'scheduledBreedings',
            'completedBreedings',
            'cancelledBreedings',
            'avgOffspring',
            'totalOffspring',
            'upcomingBreedings',
            'expectedBirths',
            'recentBreedings',
            'activeFemales',
            'activeMales',
            'pregnancyChecks',
            'weaningSchedule',
            'monthlyData'
        ));
    }
}