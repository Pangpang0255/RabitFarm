<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;
use App\Models\Rabbit;
use Carbon\Carbon;

class MarketingDashboardController extends Controller
{
    public function index()
    {
        $userId = session('user_id', 1);

        // Total penjualan bulan ini (category = 'penjualan' dan type = 'income')
        $totalSalesThisMonth = Transaction::where('user_id', $userId)
            ->where('category', 'penjualan')
            ->where('type', 'income')
            ->whereMonth('transaction_date', now()->month)
            ->whereYear('transaction_date', now()->year)
            ->sum('amount');

        // Total transaksi bulan ini
        $totalTransactionsThisMonth = Transaction::where('user_id', $userId)
            ->where('category', 'penjualan')
            ->where('type', 'income')
            ->whereMonth('transaction_date', now()->month)
            ->whereYear('transaction_date', now()->year)
            ->count();

        // Stok tersedia untuk dijual
        $availableStock = Rabbit::where('user_id', $userId)
            ->whereIn('status', ['sapihan', 'dewasa', 'produktif'])
            ->count();

        // Transaksi terbaru
        $recentTransactions = Transaction::where('user_id', $userId)
            ->where('category', 'penjualan')
            ->where('type', 'income')
            ->orderBy('transaction_date', 'desc')
            ->take(10)
            ->get();

        // Data penjualan per bulan (12 bulan terakhir)
        $monthlySales = [];
        for ($i = 11; $i >= 0; $i--) {
            $month = now()->subMonths($i);
            $sales = Transaction::where('user_id', $userId)
                ->where('category', 'penjualan')
                ->where('type', 'income')
                ->whereYear('transaction_date', $month->year)
                ->whereMonth('transaction_date', $month->month)
                ->sum('amount');
            
            $count = Transaction::where('user_id', $userId)
                ->where('category', 'penjualan')
                ->where('type', 'income')
                ->whereYear('transaction_date', $month->year)
                ->whereMonth('transaction_date', $month->month)
                ->count();
                
            $monthlySales[] = [
                'month' => $month->format('M'),
                'sales' => $sales,
                'quantity' => $count
            ];
        }

        // Perbandingan bulan ini vs bulan lalu
        $lastMonthSales = Transaction::where('user_id', $userId)
            ->where('category', 'penjualan')
            ->where('type', 'income')
            ->whereMonth('transaction_date', now()->subMonth()->month)
            ->whereYear('transaction_date', now()->subMonth()->year)
            ->sum('amount');

        $growthPercentage = $lastMonthSales > 0 
            ? round((($totalSalesThisMonth - $lastMonthSales) / $lastMonthSales) * 100, 1) 
            : 0;

        // Rata-rata transaksi
        $averagePrice = $totalTransactionsThisMonth > 0 
            ? round($totalSalesThisMonth / $totalTransactionsThisMonth, 0) 
            : 0;

        // Karena tidak ada customer_name, kita kosongkan saja
        $topBuyers = collect();

        return view('marketing-dashboard', compact(
            'totalSalesThisMonth',
            'totalTransactionsThisMonth',
            'availableStock',
            'recentTransactions',
            'monthlySales',
            'topBuyers',
            'growthPercentage',
            'averagePrice'
        ));
    }

    public function getMarketingData()
    {
        $userId = session('user_id', 1);

        // Total penjualan bulan ini
        $totalSalesThisMonth = Transaction::where('user_id', $userId)
            ->where('category', 'penjualan')
            ->where('type', 'income')
            ->whereMonth('transaction_date', now()->month)
            ->whereYear('transaction_date', now()->year)
            ->sum('amount');

        // Total transaksi bulan ini
        $totalTransactionsThisMonth = Transaction::where('user_id', $userId)
            ->where('category', 'penjualan')
            ->where('type', 'income')
            ->whereMonth('transaction_date', now()->month)
            ->whereYear('transaction_date', now()->year)
            ->count();

        // Stok tersedia
        $availableStock = Rabbit::where('user_id', $userId)
            ->whereIn('status', ['sapihan', 'dewasa', 'produktif'])
            ->count();

        // Growth percentage
        $lastMonthSales = Transaction::where('user_id', $userId)
            ->where('category', 'penjualan')
            ->where('type', 'income')
            ->whereMonth('transaction_date', now()->subMonth()->month)
            ->whereYear('transaction_date', now()->subMonth()->year)
            ->sum('amount');

        $growthPercentage = $lastMonthSales > 0 
            ? round((($totalSalesThisMonth - $lastMonthSales) / $lastMonthSales) * 100, 1) 
            : 0;

        // Rata-rata transaksi
        $averagePrice = $totalTransactionsThisMonth > 0 
            ? round($totalSalesThisMonth / $totalTransactionsThisMonth, 0) 
            : 0;

        return response()->json([
            'totalSalesThisMonth' => $totalSalesThisMonth,
            'totalTransactionsThisMonth' => $totalTransactionsThisMonth,
            'availableStock' => $availableStock,
            'growthPercentage' => $growthPercentage,
            'averagePrice' => $averagePrice
        ]);
    }
}
