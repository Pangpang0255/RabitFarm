<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BreedingSchedule;
use App\Models\Rabbit;
use Carbon\Carbon;

class BreedingController extends Controller
{
    public function index()
    {
        $userId = session('user_id', 1);
        
        // Ambil semua jadwal breeding beserta relasi kelinci
        $breedings = BreedingSchedule::where('user_id', $userId)
            ->with(['femaleRabbit', 'maleRabbit'])
            ->orderBy('breeding_date', 'desc')
            ->get();
        
        // Ambil kelinci yang tersedia untuk breeding
        $maleRabbits = Rabbit::where('user_id', $userId)
            ->where('gender', 'jantan')
            ->where('status', 'produktif')
            ->where('health_status', 'sehat')
            ->get();
            
        $femaleRabbits = Rabbit::where('user_id', $userId)
            ->where('gender', 'betina')
            ->where('status', 'produktif')
            ->where('health_status', 'sehat')
            ->get();
        
        // Statistik
        $stats = [
            'total' => $breedings->count(),
            'scheduled' => $breedings->where('status', 'scheduled')->count(),
            'completed' => $breedings->where('status', 'completed')->count(),
            'cancelled' => $breedings->where('status', 'cancelled')->count(),
            'this_month' => $breedings->where('breeding_date', '>=', now()->startOfMonth())->count(),
            'total_offspring' => $breedings->where('status', 'completed')->sum('offspring_count'),
        ];
        
        return view('breeding.index', compact('breedings', 'maleRabbits', 'femaleRabbits', 'stats'));
    }
    
    public function store(Request $request)
    {
        $userId = session('user_id', 1);
        
        $validated = $request->validate([
            'female_rabbit_id' => 'required|exists:rabbits,id',
            'male_rabbit_id' => 'required|exists:rabbits,id',
            'breeding_date' => 'required|date',
            'notes' => 'nullable|string',
        ]);
        
        // Hitung perkiraan tanggal lahir (30 hari setelah kawin)
        $breedingDate = Carbon::parse($validated['breeding_date']);
        $expectedBirthDate = $breedingDate->copy()->addDays(30);
        
        BreedingSchedule::create([
            'user_id' => $userId,
            'female_rabbit_id' => $validated['female_rabbit_id'],
            'male_rabbit_id' => $validated['male_rabbit_id'],
            'breeding_date' => $validated['breeding_date'],
            'expected_birth_date' => $expectedBirthDate,
            'status' => 'scheduled',
            'notes' => $validated['notes'] ?? null,
        ]);
        
        return redirect()->route('breeding.index')->with('success', 'Jadwal breeding berhasil ditambahkan!');
    }
    
    public function update(Request $request, $id)
    {
        $userId = session('user_id', 1);
        
        $breeding = BreedingSchedule::where('user_id', $userId)->findOrFail($id);
        
        $validated = $request->validate([
            'status' => 'required|in:scheduled,completed,cancelled',
            'actual_birth_date' => 'nullable|date',
            'offspring_count' => 'nullable|integer|min:0',
            'notes' => 'nullable|string',
        ]);
        
        $breeding->update($validated);
        
        return redirect()->route('breeding.index')->with('success', 'Data breeding berhasil diupdate!');
    }
    
    public function destroy($id)
    {
        $userId = session('user_id', 1);
        
        $breeding = BreedingSchedule::where('user_id', $userId)->findOrFail($id);
        $breeding->delete();
        
        return redirect()->route('breeding.index')->with('success', 'Data breeding berhasil dihapus!');
    }
}
