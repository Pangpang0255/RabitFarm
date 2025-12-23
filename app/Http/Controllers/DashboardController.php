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
        
        // Get breeding schedules (upcoming)
        $upcomingBreedings = BreedingSchedule::where('user_id', $userId)
            ->where('status', 'scheduled')
            ->orderBy('breeding_date', 'asc')
            ->take(5)
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
        
        return view('dashboard', compact(
            'totalRabbits',
            'maleRabbits',
            'femaleRabbits',
            'youngRabbits',
            'healthyRabbits',
            'sickRabbits',
            'upcomingBreedings',
            'todayFeeding',
            'thisMonthIncome',
            'thisMonthExpense',
            'balance',
            'recentHealthChecks'
        ));
    }
}