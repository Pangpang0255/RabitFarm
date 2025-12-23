<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Transaction;
use Carbon\Carbon;

class TransactionSeeder extends Seeder
{
    public function run()
    {
        $userId = 1;
        
        // Sample transactions
        $transactions = [
            // Penjualan (Income)
            [
                'user_id' => $userId,
                'transaction_date' => Carbon::now()->subDays(1),
                'description' => 'Penjualan 15 Kelinci Pedaging',
                'category' => 'penjualan',
                'type' => 'income',
                'amount' => 3750000,
                'notes' => 'Penjualan ke pasar lokal'
            ],
            [
                'user_id' => $userId,
                'transaction_date' => Carbon::now()->subDays(3),
                'description' => 'Penjualan 20 Kelinci Hias',
                'category' => 'penjualan',
                'type' => 'income',
                'amount' => 5000000,
                'notes' => 'Penjualan ke toko hewan'
            ],
            [
                'user_id' => $userId,
                'transaction_date' => Carbon::now()->subDays(6),
                'description' => 'Penjualan 25 Kelinci Pedaging',
                'category' => 'penjualan',
                'type' => 'income',
                'amount' => 6250000,
                'notes' => 'Penjualan besar'
            ],
            [
                'user_id' => $userId,
                'transaction_date' => Carbon::now()->subDays(8),
                'description' => 'Penjualan Pupuk Organik (kotoran kelinci)',
                'category' => 'penjualan',
                'type' => 'income',
                'amount' => 750000,
                'notes' => 'Penjualan pupuk'
            ],
            
            // Pakan (Expense)
            [
                'user_id' => $userId,
                'transaction_date' => Carbon::now()->subDays(2),
                'description' => 'Pembelian Pakan Konsentrat 100kg',
                'category' => 'pakan',
                'type' => 'expense',
                'amount' => 1200000,
                'notes' => 'Stok pakan bulanan'
            ],
            [
                'user_id' => $userId,
                'transaction_date' => Carbon::now()->subDays(7),
                'description' => 'Pembelian Pakan Hijauan',
                'category' => 'pakan',
                'type' => 'expense',
                'amount' => 450000,
                'notes' => 'Sayuran dan rumput'
            ],
            
            // Obat & Vitamin (Expense)
            [
                'user_id' => $userId,
                'transaction_date' => Carbon::now()->subDays(4),
                'description' => 'Pembelian Vitamin & Obat-obatan',
                'category' => 'obat',
                'type' => 'expense',
                'amount' => 850000,
                'notes' => 'Stok obat dan vitamin'
            ],
            
            // Peralatan (Expense)
            [
                'user_id' => $userId,
                'transaction_date' => Carbon::now()->subDays(5),
                'description' => 'Pembelian Kandang Baru (10 unit)',
                'category' => 'peralatan',
                'type' => 'expense',
                'amount' => 3500000,
                'notes' => 'Ekspansi kandang'
            ],
            
            // Transaksi bulan lalu
            [
                'user_id' => $userId,
                'transaction_date' => Carbon::now()->subDays(35),
                'description' => 'Penjualan Kelinci Breeding',
                'category' => 'penjualan',
                'type' => 'income',
                'amount' => 8500000,
                'notes' => 'Penjualan kelinci berkualitas tinggi'
            ],
            [
                'user_id' => $userId,
                'transaction_date' => Carbon::now()->subDays(40),
                'description' => 'Pembelian Pakan Konsentrat Premium',
                'category' => 'pakan',
                'type' => 'expense',
                'amount' => 2500000,
                'notes' => 'Pakan berkualitas untuk breeding'
            ],
        ];
        
        foreach ($transactions as $transaction) {
            Transaction::create($transaction);
        }
        
        $this->command->info('Transaction seeder completed!');
    }
}
