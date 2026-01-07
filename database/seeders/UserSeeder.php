<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run()
    {
        // Cek apakah user sudah ada
        if (User::count() == 0) {
            User::create([
                'name' => 'Admin RabitFarm',
                'email' => 'admin@rabitfarm.com',
                'password' => Hash::make('password123'),
            ]);

            User::create([
                'name' => 'Demo User',
                'email' => 'demo@rabitfarm.com',
                'password' => Hash::make('demo123'),
            ]);

            echo "✅ User berhasil dibuat!\n";
            echo "   Email: admin@rabitfarm.com | Password: password123\n";
            echo "   Email: demo@rabitfarm.com | Password: demo123\n";
        } else {
            echo "⚠️  User sudah ada, skip seeding.\n";
        }
    }
}
