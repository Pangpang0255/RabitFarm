<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rabbit;
use App\Models\FeedingSchedule;
use App\Models\FeedingPattern;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class FeedingDashboardController extends Controller
{
    public function index()
    {
        $userId = session('user_id', 1);

        // Total feeding statistics
        $totalFeedings = FeedingSchedule::where('user_id', $userId)->count();
        $completedFeedings = FeedingSchedule::where('user_id', $userId)
            ->where('status', 'completed')->count();
        $pendingFeedings = FeedingSchedule::where('user_id', $userId)
            ->where('status', 'pending')->count();

        // Today's feeding
        $todayFeedings = FeedingSchedule::where('user_id', $userId)
            ->whereDate('feeding_date', today())
            ->get();
        $todayPending = $todayFeedings->where('status', 'pending')->count();
        $todayCompleted = $todayFeedings->where('status', 'completed')->count();

        // Total quantity consumed (this month)
        $thisMonthQuantity = FeedingSchedule::where('user_id', $userId)
            ->where('status', 'completed')
            ->whereMonth('feeding_date', now()->month)
            ->whereYear('feeding_date', now()->year)
            ->sum('quantity');

        // Average daily consumption
        $avgDailyConsumption = FeedingSchedule::where('user_id', $userId)
            ->where('status', 'completed')
            ->whereMonth('feeding_date', now()->month)
            ->whereYear('feeding_date', now()->year)
            ->selectRaw('DATE(feeding_date) as date, SUM(quantity) as total')
            ->groupBy('date')
            ->get()
            ->avg('total');

        // Total rabbits
        $totalRabbits = Rabbit::where('user_id', $userId)->count();

        // Feed types consumption (top 5)
        $feedTypeConsumption = FeedingSchedule::where('user_id', $userId)
            ->where('status', 'completed')
            ->selectRaw('feed_type, SUM(quantity) as total_quantity, COUNT(*) as count')
            ->groupBy('feed_type')
            ->orderByRaw('SUM(quantity) DESC')
            ->limit(5)
            ->get();

        // Upcoming feeding schedule (pending today and future)
        $upcomingFeedings = FeedingSchedule::where('user_id', $userId)
            ->where('status', 'pending')
            ->where('feeding_date', '>=', today())
            ->with(['rabbit'])
            ->orderBy('feeding_date', 'asc')
            ->orderBy('feeding_time', 'asc')
            ->take(15)
            ->get();

        // Overdue feeding (pending but past date)
        $overdueFeedings = FeedingSchedule::where('user_id', $userId)
            ->where('status', 'pending')
            ->where('feeding_date', '<', today())
            ->with(['rabbit'])
            ->orderBy('feeding_date', 'desc')
            ->get();

        // Recent feeding history
        $recentFeedings = FeedingSchedule::where('user_id', $userId)
            ->with(['rabbit'])
            ->orderBy('feeding_date', 'desc')
            ->orderBy('feeding_time', 'desc')
            ->take(20)
            ->get();

        // Monthly feeding statistics for chart (last 12 months)
        $monthlyFeedingData = [];
        for ($i = 11; $i >= 0; $i--) {
            $month = now()->subMonths($i);
            $monthlyFeedingData[] = [
                'month' => $month->format('M'),
                'feedings' => FeedingSchedule::where('user_id', $userId)
                    ->whereYear('feeding_date', $month->year)
                    ->whereMonth('feeding_date', $month->month)
                    ->count(),
                'quantity' => FeedingSchedule::where('user_id', $userId)
                    ->where('status', 'completed')
                    ->whereYear('feeding_date', $month->year)
                    ->whereMonth('feeding_date', $month->month)
                    ->sum('quantity') ?? 0,
                'completed' => FeedingSchedule::where('user_id', $userId)
                    ->where('status', 'completed')
                    ->whereYear('feeding_date', $month->year)
                    ->whereMonth('feeding_date', $month->month)
                    ->count()
            ];
        }

        // Daily feeding for this week
        $weeklyFeedings = [];
        for ($i = 6; $i >= 0; $i--) {
            $date = now()->subDays($i);
            $weeklyFeedings[] = [
                'date' => $date->format('D'),
                'completed' => FeedingSchedule::where('user_id', $userId)
                    ->where('status', 'completed')
                    ->whereDate('feeding_date', $date->toDateString())
                    ->count(),
                'quantity' => FeedingSchedule::where('user_id', $userId)
                    ->where('status', 'completed')
                    ->whereDate('feeding_date', $date->toDateString())
                    ->sum('quantity') ?? 0
            ];
        }

        // Rabbits with no feeding today
        $rabbitsNoFeedingToday = Rabbit::where('user_id', $userId)
            ->whereDoesntHave('feedingSchedules', function($query) {
                $query->whereDate('feeding_date', today());
            })
            ->get();

        // Most fed rabbits (this month)
        $mostFedRabbits = FeedingSchedule::where('user_id', $userId)
            ->where('status', 'completed')
            ->whereMonth('feeding_date', now()->month)
            ->whereYear('feeding_date', now()->year)
            ->with(['rabbit'])
            ->selectRaw('rabbit_id, COUNT(*) as feed_count, SUM(quantity) as total_quantity')
            ->groupBy('rabbit_id')
            ->orderByRaw('COUNT(*) DESC')
            ->limit(5)
            ->get();

        // Completion rate
        $completionRate = $totalFeedings > 0 ? round(($completedFeedings / $totalFeedings) * 100, 1) : 0;

        return view('feeding-dashboard', compact(
            'totalFeedings',
            'completedFeedings',
            'pendingFeedings',
            'todayFeedings',
            'todayPending',
            'todayCompleted',
            'thisMonthQuantity',
            'avgDailyConsumption',
            'totalRabbits',
            'feedTypeConsumption',
            'upcomingFeedings',
            'overdueFeedings',
            'recentFeedings',
            'monthlyFeedingData',
            'weeklyFeedings',
            'rabbitsNoFeedingToday',
            'mostFedRabbits',
            'completionRate'
        ));
    }

    public function generateSchedule(Request $request)
    {
        $userId = session('user_id', 1);
        $days = $request->input('days', 7); // Default 7 hari
        
        // Get active feeding pattern
        $pattern = FeedingPattern::where('user_id', $userId)
            ->where('is_active', true)
            ->first();
        
        if (!$pattern) {
            // Create default pattern if not exists
            $pattern = $this->createDefaultPattern($userId);
        }
        
        // Get rabbits based on pattern category
        $rabbits = $this->getRabbitsByCategory($userId, $pattern->rabbit_category);
        
        if ($rabbits->isEmpty()) {
            return redirect()->back()->with('error', 'Tidak ada kelinci yang sesuai kategori');
        }
        
        $created = 0;
        $dailySchedule = $pattern->daily_schedule;
        
        // Generate schedule for next N days
        for ($i = 0; $i < $days; $i++) {
            $date = Carbon::now()->addDays($i);
            $dayIndex = ($i % count($dailySchedule)); // Rotasi berdasarkan jumlah hari dalam pola
            
            $daySchedule = $dailySchedule[$dayIndex];
            
            foreach ($rabbits as $rabbit) {
                foreach ($daySchedule['feeds'] as $feed) {
                    // Check if schedule already exists
                    $exists = FeedingSchedule::where('user_id', $userId)
                        ->where('rabbit_id', $rabbit->id)
                        ->where('feeding_date', $date->toDateString())
                        ->where('feeding_time', $feed['time'])
                        ->exists();
                    
                    if (!$exists) {
                        FeedingSchedule::create([
                            'user_id' => $userId,
                            'rabbit_id' => $rabbit->id,
                            'feeding_date' => $date->toDateString(),
                            'feeding_time' => $feed['time'],
                            'feed_type' => $feed['type'],
                            'quantity' => $feed['quantity'],
                            'status' => 'pending',
                            'notes' => 'Auto-generated (Rotasi Hari ' . ($dayIndex + 1) . ')'
                        ]);
                        $created++;
                    }
                }
            }
        }
        
        return redirect()->back()->with('success', "Berhasil membuat {$created} jadwal pemberian pakan untuk {$days} hari ke depan dengan rotasi menu!");
    }
    
    private function createDefaultPattern($userId)
    {
        // Pola nutrisi seimbang 7 hari dengan rotasi menu
        $dailySchedule = [
            // Hari 1: Pelet + Sayuran
            [
                'day' => 1,
                'day_name' => 'Senin - Pelet & Sayuran',
                'feeds' => [
                    ['time' => '07:00', 'type' => 'Pelet', 'quantity' => 0.15],
                    ['time' => '12:00', 'type' => 'Sayuran (Kangkung)', 'quantity' => 0.2],
                    ['time' => '17:00', 'type' => 'Pelet', 'quantity' => 0.15]
                ]
            ],
            // Hari 2: Konsentrat + Rumput
            [
                'day' => 2,
                'day_name' => 'Selasa - Konsentrat & Rumput',
                'feeds' => [
                    ['time' => '07:00', 'type' => 'Konsentrat', 'quantity' => 0.12],
                    ['time' => '12:00', 'type' => 'Rumput Gajah', 'quantity' => 0.25],
                    ['time' => '17:00', 'type' => 'Konsentrat', 'quantity' => 0.12]
                ]
            ],
            // Hari 3: Pelet + Wortel
            [
                'day' => 3,
                'day_name' => 'Rabu - Pelet & Wortel',
                'feeds' => [
                    ['time' => '07:00', 'type' => 'Pelet', 'quantity' => 0.15],
                    ['time' => '12:00', 'type' => 'Wortel', 'quantity' => 0.1],
                    ['time' => '17:00', 'type' => 'Pelet', 'quantity' => 0.15]
                ]
            ],
            // Hari 4: Mix Hijau
            [
                'day' => 4,
                'day_name' => 'Kamis - Mix Sayuran Hijau',
                'feeds' => [
                    ['time' => '07:00', 'type' => 'Pelet', 'quantity' => 0.12],
                    ['time' => '12:00', 'type' => 'Bayam + Kangkung', 'quantity' => 0.22],
                    ['time' => '17:00', 'type' => 'Rumput Odot', 'quantity' => 0.2]
                ]
            ],
            // Hari 5: Konsentrat + Sawi
            [
                'day' => 5,
                'day_name' => 'Jumat - Konsentrat & Sawi',
                'feeds' => [
                    ['time' => '07:00', 'type' => 'Konsentrat', 'quantity' => 0.13],
                    ['time' => '12:00', 'type' => 'Sawi Putih', 'quantity' => 0.18],
                    ['time' => '17:00', 'type' => 'Pelet', 'quantity' => 0.13]
                ]
            ],
            // Hari 6: Pelet + Jagung
            [
                'day' => 6,
                'day_name' => 'Sabtu - Pelet & Jagung',
                'feeds' => [
                    ['time' => '07:00', 'type' => 'Pelet', 'quantity' => 0.15],
                    ['time' => '12:00', 'type' => 'Jagung Pipilan', 'quantity' => 0.08],
                    ['time' => '17:00', 'type' => 'Rumput Gajah', 'quantity' => 0.2]
                ]
            ],
            // Hari 7: Variasi Lengkap
            [
                'day' => 7,
                'day_name' => 'Minggu - Menu Spesial',
                'feeds' => [
                    ['time' => '07:00', 'type' => 'Konsentrat Premium', 'quantity' => 0.14],
                    ['time' => '12:00', 'type' => 'Mix Sayuran + Wortel', 'quantity' => 0.2],
                    ['time' => '17:00', 'type' => 'Pelet + Rumput', 'quantity' => 0.16]
                ]
            ]
        ];
        
        return FeedingPattern::create([
            'user_id' => $userId,
            'pattern_name' => 'Pola Nutrisi Seimbang 7 Hari (Default)',
            'rabbit_category' => 'all',
            'daily_schedule' => $dailySchedule,
            'is_active' => true,
            'notes' => 'Pola default dengan rotasi menu 7 hari untuk nutrisi seimbang'
        ]);
    }
    
    private function getRabbitsByCategory($userId, $category)
    {
        $query = Rabbit::where('user_id', $userId);
        
        if ($category !== 'all') {
            if ($category === 'dewasa') {
                $query->whereIn('status', ['pejantan', 'indukan']);
            } elseif ($category === 'anak') {
                $query->where('status', 'anak');
            } elseif ($category === 'indukan') {
                $query->where('status', 'indukan');
            } elseif ($category === 'pejantan') {
                $query->where('status', 'pejantan');
            }
        }
        
        return $query->get();
    }
}
