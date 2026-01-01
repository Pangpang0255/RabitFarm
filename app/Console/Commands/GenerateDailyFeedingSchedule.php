<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Rabbit;
use App\Models\FeedingSchedule;
use App\Models\FeedingPattern;
use Carbon\Carbon;

class GenerateDailyFeedingSchedule extends Command
{
    /**
     * The name and signature of the console command.
     */
    protected $signature = 'feeding:generate-daily';

    /**
     * The console command description.
     */
    protected $description = 'Auto-generate feeding schedule for today based on rotation pattern';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info('Starting daily feeding schedule generation...');
        
        // Get all users with active patterns
        $patterns = FeedingPattern::where('is_active', true)->get();
        
        if ($patterns->isEmpty()) {
            $this->warn('No active feeding patterns found.');
            return Command::FAILURE;
        }
        
        $totalCreated = 0;
        
        foreach ($patterns as $pattern) {
            $userId = $pattern->user_id;
            
            // Get rabbits based on pattern category
            $rabbits = $this->getRabbitsByCategory($userId, $pattern->rabbit_category);
            
            if ($rabbits->isEmpty()) {
                continue;
            }
            
            $dailySchedule = $pattern->daily_schedule;
            
            // Generate for today + next 7 days (always keep 7 days ahead)
            for ($i = 0; $i < 7; $i++) {
                $date = Carbon::now()->addDays($i);
                $dayOfWeek = $date->dayOfWeek; // 0=Sunday, 1=Monday, ...
                $rotationDay = $dayOfWeek == 0 ? 7 : $dayOfWeek; // Convert Sunday to day 7
                $dayIndex = $rotationDay - 1; // Array index (0-6)
                
                if (!isset($dailySchedule[$dayIndex])) {
                    continue;
                }
                
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
                                'notes' => 'Auto-generated (Rotasi Hari ' . $rotationDay . ')'
                            ]);
                            $totalCreated++;
                        }
                    }
                }
            }
        }
        
        $this->info("Successfully created {$totalCreated} feeding schedules!");
        return Command::SUCCESS;
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
