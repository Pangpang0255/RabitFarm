<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rabbit;

class HomeController extends Controller
{
    public function index()
    {
        $userId = session('user_id', 1);
        
        // Get rabbit statistics
        $stats = [
            'indukan' => Rabbit::where('user_id', $userId)->where('status', 'produktif')->count(),
            'sapihan_dewasa' => Rabbit::where('user_id', $userId)->whereIn('status', ['sapihan', 'dewasa'])->count(),
            'total' => Rabbit::where('user_id', $userId)->count(),
        ];
        
        return view('home', compact('stats'));
    }
}
