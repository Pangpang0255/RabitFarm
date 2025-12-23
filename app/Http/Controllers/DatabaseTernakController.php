<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rabbit;
use Illuminate\Support\Facades\Auth;

class DatabaseTernakController extends Controller
{
    public function index(Request $request)
    {
        $userId = session('user_id', 1); // Temporary until auth is implemented
        
        // Get filter parameters
        $search = $request->get('search');
        $gender = $request->get('gender');
        $breed = $request->get('breed');
        $healthStatus = $request->get('health_status');
        
        // Build query with filters
        $query = Rabbit::where('user_id', $userId);
        
        // Apply search filter (ID/Code or Name)
        if ($search) {
            $query->where(function($q) use ($search) {
                $q->where('code', 'like', '%' . $search . '%')
                  ->orWhere('name', 'like', '%' . $search . '%');
            });
        }
        
        // Apply gender filter
        if ($gender) {
            $query->where('gender', $gender);
        }
        
        // Apply breed filter
        if ($breed) {
            $query->where('breed', $breed);
        }
        
        // Apply health status filter
        if ($healthStatus) {
            $query->where('health_status', $healthStatus);
        }
        
        $rabbits = $query->orderBy('created_at', 'desc')->paginate(10)->withQueryString();
        
        return view('database-ternak', compact('rabbits', 'search', 'gender', 'breed', 'healthStatus'));
    }
    
    public function store(Request $request)
    {
        $userId = session('user_id', 1);
        
        $validated = $request->validate([
            'code' => 'required|unique:rabbits,code',
            'name' => 'required|max:255',
            'gender' => 'required|in:jantan,betina',
            'status' => 'required|in:produktif,sapihan,anak,afkir',
            'breed' => 'nullable|max:255',
            'birth_date' => 'required|date',
            'weight' => 'nullable|numeric',
            'health_status' => 'required|in:sehat,sakit,karantina',
            'notes' => 'nullable'
        ]);
        
        $validated['user_id'] = $userId;
        
        Rabbit::create($validated);
        
        return redirect()->route('database-ternak')->with('success', 'Data kelinci berhasil ditambahkan');
    }
    
    public function update(Request $request, $id)
    {
        $userId = session('user_id', 1);
        
        $rabbit = Rabbit::where('user_id', $userId)->findOrFail($id);
        
        $validated = $request->validate([
            'code' => 'required|unique:rabbits,code,' . $id,
            'name' => 'required|max:255',
            'gender' => 'required|in:jantan,betina',
            'status' => 'required|in:produktif,sapihan,anak,afkir',
            'breed' => 'nullable|max:255',
            'birth_date' => 'required|date',
            'weight' => 'nullable|numeric',
            'health_status' => 'required|in:sehat,sakit,karantina',
            'notes' => 'nullable'
        ]);
        
        $rabbit->update($validated);
        
        return redirect()->route('database-ternak')->with('success', 'Data kelinci berhasil diupdate');
    }
    
    public function destroy($id)
    {
        $userId = session('user_id', 1);
        
        $rabbit = Rabbit::where('user_id', $userId)->findOrFail($id);
        $rabbit->delete();
        
        return redirect()->route('database-ternak')->with('success', 'Data kelinci berhasil dihapus');
    }
}
