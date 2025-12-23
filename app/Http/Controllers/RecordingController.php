<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rabbit;
use App\Models\BreedingSchedule;
use App\Models\FeedingSchedule;
use App\Models\HealthRecord;
use Illuminate\Support\Facades\Auth;

class RecordingController extends Controller
{
    public function index()
    {
        $userId = session('user_id', 1);
        
        // Get all rabbits for dropdowns
        $rabbits = Rabbit::where('user_id', $userId)->get();
        
        // Get breeding schedules
        $breedingSchedules = BreedingSchedule::where('user_id', $userId)
            ->with(['femaleRabbit', 'maleRabbit'])
            ->orderBy('breeding_date', 'desc')
            ->get();
        
        // Get feeding schedules
        $feedingSchedules = FeedingSchedule::where('user_id', $userId)
            ->with('rabbit')
            ->orderBy('feeding_date', 'desc')
            ->orderBy('feeding_time', 'desc')
            ->get();
        
        // Get health records
        $healthRecords = HealthRecord::where('user_id', $userId)
            ->with('rabbit')
            ->orderBy('check_date', 'desc')
            ->get();
        
        return view('recording', compact('rabbits', 'breedingSchedules', 'feedingSchedules', 'healthRecords'));
    }
    
    public function storeBreeding(Request $request)
    {
        $userId = session('user_id', 1);
        
        $validated = $request->validate([
            'female_rabbit_id' => 'required|exists:rabbits,id',
            'male_rabbit_id' => 'required|exists:rabbits,id',
            'breeding_date' => 'required|date',
            'expected_birth_date' => 'required|date',
            'status' => 'required|in:scheduled,completed,cancelled',
            'offspring_count' => 'nullable|integer',
            'notes' => 'nullable'
        ]);
        
        $validated['user_id'] = $userId;
        
        BreedingSchedule::create($validated);
        
        return redirect()->route('recording')->with('success', 'Jadwal perkawinan berhasil ditambahkan');
    }
    
    public function storeFeeding(Request $request)
    {
        $userId = session('user_id', 1);
        
        $validated = $request->validate([
            'rabbit_id' => 'required|exists:rabbits,id',
            'feeding_date' => 'required|date',
            'feeding_time' => 'required',
            'feed_type' => 'required|max:255',
            'quantity' => 'required|numeric',
            'status' => 'required|in:pending,completed',
            'notes' => 'nullable'
        ]);
        
        $validated['user_id'] = $userId;
        
        FeedingSchedule::create($validated);
        
        return redirect()->route('recording')->with('success', 'Jadwal pemberian pakan berhasil ditambahkan');
    }
    
    public function storeHealth(Request $request)
    {
        $userId = session('user_id', 1);
        
        $validated = $request->validate([
            'rabbit_id' => 'required|exists:rabbits,id',
            'check_date' => 'required|date',
            'diagnosis' => 'required',
            'symptoms' => 'nullable',
            'treatment' => 'nullable',
            'medicine' => 'nullable|max:255',
            'next_check_date' => 'nullable|date',
            'status' => 'required|in:recovered,under_treatment,critical',
            'notes' => 'nullable'
        ]);
        
        $validated['user_id'] = $userId;
        
        HealthRecord::create($validated);
        
        return redirect()->route('recording')->with('success', 'Catatan kesehatan berhasil ditambahkan');
    }
}
