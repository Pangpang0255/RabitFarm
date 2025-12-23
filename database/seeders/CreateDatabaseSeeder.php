<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CreateDatabaseSeeder extends Seeder
{
    public function run()
    {
        // Create sample user (id = 1) if not exists
        $userExists = DB::table('users')->where('email', 'demo@rabitfarm.com')->exists();
        
        if (!$userExists) {
            DB::table('users')->insert([
                'name' => 'Demo User',
                'email' => 'demo@rabitfarm.com',
                'password' => password_hash('password', PASSWORD_DEFAULT),
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }

        // Clear existing sample data for user 1 first
        DB::table('health_records')->where('user_id', 1)->delete();
        DB::table('feeding_schedules')->where('user_id', 1)->delete();
        DB::table('breeding_schedules')->where('user_id', 1)->delete();
        DB::table('transactions')->where('user_id', 1)->delete();
        DB::table('rabbits')->where('user_id', 1)->delete();

        // Create sample rabbits
        $rabbitIds = [];
        $statuses = ['produktif', 'sapihan', 'anak', 'afkir'];
        for ($i = 1; $i <= 10; $i++) {
            $id = DB::table('rabbits')->insertGetId([
                'user_id' => 1,
                'code' => 'RB' . str_pad($i, 4, '0', STR_PAD_LEFT),
                'name' => 'Kelinci ' . $i,
                'gender' => $i <= 5 ? 'jantan' : 'betina',
                'status' => $statuses[rand(0, 3)],
                'breed' => ['Rex', 'Anggora', 'Flemish Giant', 'Dutch'][rand(0, 3)],
                'birth_date' => now()->subMonths(rand(3, 24)),
                'weight' => rand(20, 50) / 10,
                'health_status' => rand(1, 10) > 8 ? 'sakit' : 'sehat',
                'notes' => 'Sample data kelinci ' . $i,
                'created_at' => now(),
                'updated_at' => now()
            ]);
            $rabbitIds[] = $id;
        }

        // Create sample breeding schedules
        for ($i = 0; $i < 5; $i++) {
            DB::table('breeding_schedules')->insert([
                'user_id' => 1,
                'female_rabbit_id' => $rabbitIds[rand(5, 9)], // Betina
                'male_rabbit_id' => $rabbitIds[rand(0, 4)], // Jantan
                'breeding_date' => now()->addDays(rand(1, 30)),
                'expected_birth_date' => now()->addDays(rand(31, 60)),
                'status' => ['scheduled', 'completed', 'cancelled'][rand(0, 2)],
                'offspring_count' => rand(3, 8),
                'notes' => 'Jadwal perkawinan ' . ($i + 1),
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }

        // Create sample feeding schedules
        for ($i = 0; $i < 20; $i++) {
            DB::table('feeding_schedules')->insert([
                'user_id' => 1,
                'rabbit_id' => $rabbitIds[rand(0, count($rabbitIds) - 1)],
                'feeding_date' => now()->addDays(rand(-5, 5)),
                'feeding_time' => ['07:00', '12:00', '18:00'][rand(0, 2)],
                'feed_type' => ['Pelet', 'Rumput', 'Sayuran', 'Konsentrat'][rand(0, 3)],
                'quantity' => rand(50, 200) / 100,
                'status' => rand(1, 2) == 1 ? 'completed' : 'pending',
                'notes' => 'Pemberian pakan rutin',
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }

        // Create sample transactions
        $categories = ['pakan', 'obat', 'penjualan', 'peralatan', 'lainnya'];
        for ($i = 0; $i < 30; $i++) {
            $category = $categories[rand(0, 4)];
            $type = $category == 'penjualan' ? 'income' : 'expense';
            
            DB::table('transactions')->insert([
                'user_id' => 1,
                'transaction_date' => now()->subDays(rand(0, 60)),
                'description' => $type == 'income' ? 'Penjualan kelinci' : 'Pembelian ' . $category,
                'category' => $category,
                'type' => $type,
                'amount' => rand(50000, 500000),
                'notes' => 'Transaksi sample',
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }

        // Create sample health records
        for ($i = 0; $i < 10; $i++) {
            DB::table('health_records')->insert([
                'user_id' => 1,
                'rabbit_id' => $rabbitIds[rand(0, count($rabbitIds) - 1)],
                'check_date' => now()->subDays(rand(0, 30)),
                'diagnosis' => ['Flu', 'Diare', 'Luka', 'Sehat'][rand(0, 3)],
                'symptoms' => 'Gejala sample',
                'treatment' => 'Perawatan sample',
                'medicine' => ['Vitamin', 'Antibiotik', 'Salep'][rand(0, 2)],
                'next_check_date' => now()->addDays(rand(7, 14)),
                'status' => ['recovered', 'under_treatment', 'critical'][rand(0, 2)],
                'notes' => 'Catatan kesehatan',
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }
    }
}
