<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{
    public function index(Request $request)
    {
        $userId = session('user_id', 1);
        
        // Get filter parameters
        $startDate = $request->get('start_date');
        $endDate = $request->get('end_date');
        $category = $request->get('category');
        $period = $request->get('period', 'month');
        
        // Build query for transactions with filters
        $query = Transaction::where('user_id', $userId);
        
        // Apply date filter
        if ($startDate) {
            $query->whereDate('transaction_date', '>=', $startDate);
        }
        if ($endDate) {
            $query->whereDate('transaction_date', '<=', $endDate);
        }
        
        // Apply category filter
        if ($category && $category !== 'all') {
            $query->where('category', $category);
        }
        
        // Calculate income with filters
        $incomeQuery = clone $query;
        $income = $incomeQuery->where('type', 'income')->sum('amount');
        
        // Calculate expense with filters
        $expenseQuery = clone $query;
        $expense = $expenseQuery->where('type', 'expense')->sum('amount');
        
        // Calculate balance
        $balance = $income - $expense;
        
        // Get transactions for the list
        $transactions = $query->orderBy('transaction_date', 'desc')->get();
        
        // Get chart data based on period and filters
        $chartData = $this->getChartData($userId, $period, $startDate, $endDate, $category);
        
        return view('reports', compact('income', 'expense', 'balance', 'transactions', 'chartData', 'period', 'startDate', 'endDate', 'category'));
    }
    
    public function store(Request $request)
    {
        $userId = session('user_id', 1);
        
        $validated = $request->validate([
            'transaction_date' => 'required|date',
            'description' => 'required|max:255',
            'category' => 'required|in:pakan,obat,penjualan,peralatan,lainnya',
            'type' => 'required|in:income,expense',
            'amount' => 'required|numeric|min:0',
            'notes' => 'nullable'
        ]);
        
        $validated['user_id'] = $userId;
        
        Transaction::create($validated);
        
        return redirect()->route('reports')->with('success', 'Transaksi berhasil ditambahkan');
    }
    
    public function update(Request $request, $id)
    {
        $userId = session('user_id', 1);
        
        $transaction = Transaction::where('user_id', $userId)->findOrFail($id);
        
        $validated = $request->validate([
            'transaction_date' => 'required|date',
            'description' => 'required|max:255',
            'category' => 'required|in:pakan,obat,penjualan,peralatan,lainnya',
            'type' => 'required|in:income,expense',
            'amount' => 'required|numeric|min:0',
            'notes' => 'nullable'
        ]);
        
        $transaction->update($validated);
        
        return redirect()->route('reports')->with('success', 'Transaksi berhasil diupdate');
    }
    
    public function destroy($id)
    {
        $userId = session('user_id', 1);
        
        $transaction = Transaction::where('user_id', $userId)->findOrFail($id);
        $transaction->delete();
        
        return redirect()->route('reports')->with('success', 'Transaksi berhasil dihapus');
    }
    
    private function getChartData($userId, $period, $startDate = null, $endDate = null, $category = null)
    {
        $data = [];
        
        switch($period) {
            case 'week':
                // Last 7 days
                for($i = 6; $i >= 0; $i--) {
                    $date = now()->subDays($i);
                    
                    $incomeQuery = Transaction::where('user_id', $userId)->where('type', 'income')->whereDate('transaction_date', $date);
                    $expenseQuery = Transaction::where('user_id', $userId)->where('type', 'expense')->whereDate('transaction_date', $date);
                    
                    if ($category && $category !== 'all') {
                        $incomeQuery->where('category', $category);
                        $expenseQuery->where('category', $category);
                    }
                    
                    $income = $incomeQuery->sum('amount');
                    $expense = $expenseQuery->sum('amount');
                    
                    $data['labels'][] = $date->format('D');
                    $data['income'][] = $income;
                    $data['expense'][] = $expense;
                    $data['balance'][] = $income - $expense;
                }
                break;
                
            case 'year':
                // Last 12 months
                for($i = 11; $i >= 0; $i--) {
                    $date = now()->subMonths($i);
                    
                    $incomeQuery = Transaction::where('user_id', $userId)
                        ->where('type', 'income')
                        ->whereMonth('transaction_date', $date->month)
                        ->whereYear('transaction_date', $date->year);
                    $expenseQuery = Transaction::where('user_id', $userId)
                        ->where('type', 'expense')
                        ->whereMonth('transaction_date', $date->month)
                        ->whereYear('transaction_date', $date->year);
                    
                    if ($category && $category !== 'all') {
                        $incomeQuery->where('category', $category);
                        $expenseQuery->where('category', $category);
                    }
                    
                    $income = $incomeQuery->sum('amount');
                    $expense = $expenseQuery->sum('amount');
                    
                    $data['labels'][] = $date->format('M');
                    $data['income'][] = $income;
                    $data['expense'][] = $expense;
                    $data['balance'][] = $income - $expense;
                }
                break;
                
            case 'month':
            default:
                // Last 30 days
                for($i = 29; $i >= 0; $i--) {
                    $date = now()->subDays($i);
                    
                    $incomeQuery = Transaction::where('user_id', $userId)->where('type', 'income')->whereDate('transaction_date', $date);
                    $expenseQuery = Transaction::where('user_id', $userId)->where('type', 'expense')->whereDate('transaction_date', $date);
                    
                    if ($category && $category !== 'all') {
                        $incomeQuery->where('category', $category);
                        $expenseQuery->where('category', $category);
                    }
                    
                    $income = $incomeQuery->sum('amount');
                    $expense = $expenseQuery->sum('amount');
                    
                    $data['labels'][] = $date->format('d');
                    $data['income'][] = $income;
                    $data['expense'][] = $expense;
                    $data['balance'][] = $income - $expense;
                }
                break;
        }
        
        return $data;
    }
}
