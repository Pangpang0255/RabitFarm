<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Rabbit;
use Carbon\Carbon;

class RabbitSeeder extends Seeder
{
    public function run()
    {
        $userId = 1;
        
        $rabbits = [
            // Jantan - Rex
            [
                'user_id' => $userId,
                'code' => 'RBT-M001',
                'name' => 'Rex Alpha',
                'gender' => 'jantan',
                'breed' => 'Rex',
                'birth_date' => Carbon::now()->subMonths(12),
                'weight' => 4.2,
                'status' => 'produktif',
                'health_status' => 'sehat',
                'notes' => 'Pejantan unggul untuk breeding'
            ],
            [
                'user_id' => $userId,
                'code' => 'RBT-M002',
                'name' => 'Rex Bravo',
                'gender' => 'jantan',
                'breed' => 'Rex',
                'birth_date' => Carbon::now()->subMonths(10),
                'weight' => 3.8,
                'status' => 'produktif',
                'health_status' => 'sehat',
                'notes' => 'Bulu berkualitas tinggi'
            ],
            [
                'user_id' => $userId,
                'code' => 'RBT-M003',
                'name' => 'Rex Charlie',
                'gender' => 'jantan',
                'breed' => 'Rex',
                'birth_date' => Carbon::now()->subMonths(8),
                'weight' => 3.5,
                'status' => 'produktif',
                'health_status' => 'sehat',
                'notes' => 'Keturunan juara'
            ],
            
            // Betina - Rex
            [
                'user_id' => $userId,
                'code' => 'RBT-F001',
                'name' => 'Rex Luna',
                'gender' => 'betina',
                'breed' => 'Rex',
                'birth_date' => Carbon::now()->subMonths(14),
                'weight' => 3.9,
                'status' => 'produktif',
                'health_status' => 'sehat',
                'notes' => 'Indukan produktif, sudah 3x melahirkan'
            ],
            [
                'user_id' => $userId,
                'code' => 'RBT-F002',
                'name' => 'Rex Bella',
                'gender' => 'betina',
                'breed' => 'Rex',
                'birth_date' => Carbon::now()->subMonths(11),
                'weight' => 3.6,
                'status' => 'produktif',
                'health_status' => 'sehat',
                'notes' => 'Indukan baru, siap breeding'
            ],
            [
                'user_id' => $userId,
                'code' => 'RBT-F003',
                'name' => 'Rex Daisy',
                'gender' => 'betina',
                'breed' => 'Rex',
                'birth_date' => Carbon::now()->subMonths(9),
                'weight' => 3.4,
                'status' => 'produktif',
                'health_status' => 'sehat',
                'notes' => 'Sedang bunting'
            ],
            
            // Jantan - New Zealand
            [
                'user_id' => $userId,
                'code' => 'RBT-M004',
                'name' => 'NZ Max',
                'gender' => 'jantan',
                'breed' => 'New Zealand',
                'birth_date' => Carbon::now()->subMonths(15),
                'weight' => 5.2,
                'status' => 'produktif',
                'health_status' => 'sehat',
                'notes' => 'Pejantan pedaging berkualitas'
            ],
            [
                'user_id' => $userId,
                'code' => 'RBT-M005',
                'name' => 'NZ Rocky',
                'gender' => 'jantan',
                'breed' => 'New Zealand',
                'birth_date' => Carbon::now()->subMonths(13),
                'weight' => 4.8,
                'status' => 'produktif',
                'health_status' => 'sehat',
                'notes' => 'Pertumbuhan cepat'
            ],
            [
                'user_id' => $userId,
                'code' => 'RBT-M006',
                'name' => 'NZ Duke',
                'gender' => 'jantan',
                'breed' => 'New Zealand',
                'birth_date' => Carbon::now()->subMonths(11),
                'weight' => 4.5,
                'status' => 'produktif',
                'health_status' => 'sehat',
                'notes' => 'Konformasi tubuh bagus'
            ],
            
            // Betina - New Zealand
            [
                'user_id' => $userId,
                'code' => 'RBT-F004',
                'name' => 'NZ Snow',
                'gender' => 'betina',
                'breed' => 'New Zealand',
                'birth_date' => Carbon::now()->subMonths(16),
                'weight' => 4.9,
                'status' => 'produktif',
                'health_status' => 'sehat',
                'notes' => 'Indukan terbaik, 5x melahirkan'
            ],
            [
                'user_id' => $userId,
                'code' => 'RBT-F005',
                'name' => 'NZ Pearl',
                'gender' => 'betina',
                'breed' => 'New Zealand',
                'birth_date' => Carbon::now()->subMonths(12),
                'weight' => 4.3,
                'status' => 'produktif',
                'health_status' => 'sehat',
                'notes' => 'Anak banyak per kelahiran'
            ],
            [
                'user_id' => $userId,
                'code' => 'RBT-F006',
                'name' => 'NZ Ruby',
                'gender' => 'betina',
                'breed' => 'New Zealand',
                'birth_date' => Carbon::now()->subMonths(10),
                'weight' => 4.0,
                'status' => 'produktif',
                'health_status' => 'sehat',
                'notes' => 'Sedang menyusui'
            ],
            
            // Jantan - Flemish Giant
            [
                'user_id' => $userId,
                'code' => 'RBT-M007',
                'name' => 'FG Titan',
                'gender' => 'jantan',
                'breed' => 'Flemish Giant',
                'birth_date' => Carbon::now()->subMonths(18),
                'weight' => 6.5,
                'status' => 'produktif',
                'health_status' => 'sehat',
                'notes' => 'Ukuran besar, pejantan premium'
            ],
            [
                'user_id' => $userId,
                'code' => 'RBT-M008',
                'name' => 'FG King',
                'gender' => 'jantan',
                'breed' => 'Flemish Giant',
                'birth_date' => Carbon::now()->subMonths(16),
                'weight' => 6.2,
                'status' => 'produktif',
                'health_status' => 'sehat',
                'notes' => 'Postur ideal'
            ],
            
            // Betina - Flemish Giant
            [
                'user_id' => $userId,
                'code' => 'RBT-F007',
                'name' => 'FG Queen',
                'gender' => 'betina',
                'breed' => 'Flemish Giant',
                'birth_date' => Carbon::now()->subMonths(20),
                'weight' => 6.8,
                'status' => 'produktif',
                'health_status' => 'sehat',
                'notes' => 'Indukan jumbo, 4x melahirkan'
            ],
            [
                'user_id' => $userId,
                'code' => 'RBT-F008',
                'name' => 'FG Princess',
                'gender' => 'betina',
                'breed' => 'Flemish Giant',
                'birth_date' => Carbon::now()->subMonths(17),
                'weight' => 6.3,
                'status' => 'produktif',
                'health_status' => 'sehat',
                'notes' => 'Maternal instinct bagus'
            ],
            
            // Jantan - Lokal
            [
                'user_id' => $userId,
                'code' => 'RBT-M009',
                'name' => 'Lokal Putra',
                'gender' => 'jantan',
                'breed' => 'Lokal',
                'birth_date' => Carbon::now()->subMonths(9),
                'weight' => 3.2,
                'status' => 'produktif',
                'health_status' => 'sehat',
                'notes' => 'Adaptasi baik'
            ],
            [
                'user_id' => $userId,
                'code' => 'RBT-M010',
                'name' => 'Lokal Bima',
                'gender' => 'jantan',
                'breed' => 'Lokal',
                'birth_date' => Carbon::now()->subMonths(7),
                'weight' => 2.9,
                'status' => 'produktif',
                'health_status' => 'sehat',
                'notes' => 'Tahan penyakit'
            ],
            
            // Betina - Lokal
            [
                'user_id' => $userId,
                'code' => 'RBT-F009',
                'name' => 'Lokal Sari',
                'gender' => 'betina',
                'breed' => 'Lokal',
                'birth_date' => Carbon::now()->subMonths(10),
                'weight' => 3.0,
                'status' => 'produktif',
                'health_status' => 'sehat',
                'notes' => 'Indukan lokal produktif'
            ],
            [
                'user_id' => $userId,
                'code' => 'RBT-F010',
                'name' => 'Lokal Dewi',
                'gender' => 'betina',
                'breed' => 'Lokal',
                'birth_date' => Carbon::now()->subMonths(8),
                'weight' => 2.8,
                'status' => 'produktif',
                'health_status' => 'sehat',
                'notes' => 'Perawatan mudah'
            ],
            
            // Anak-anak kelinci (Sapihan)
            [
                'user_id' => $userId,
                'code' => 'RBT-S001',
                'name' => 'Rex Junior 1',
                'gender' => 'jantan',
                'breed' => 'Rex',
                'birth_date' => Carbon::now()->subMonths(2),
                'weight' => 1.2,
                'status' => 'sapihan',
                'health_status' => 'sehat',
                'notes' => 'Siap dijual'
            ],
            [
                'user_id' => $userId,
                'code' => 'RBT-S002',
                'name' => 'Rex Junior 2',
                'gender' => 'betina',
                'breed' => 'Rex',
                'birth_date' => Carbon::now()->subMonths(2),
                'weight' => 1.1,
                'status' => 'sapihan',
                'health_status' => 'sehat',
                'notes' => 'Siap dijual'
            ],
            [
                'user_id' => $userId,
                'code' => 'RBT-S003',
                'name' => 'NZ Junior 1',
                'gender' => 'jantan',
                'breed' => 'New Zealand',
                'birth_date' => Carbon::now()->subMonths(2),
                'weight' => 1.4,
                'status' => 'sapihan',
                'health_status' => 'sehat',
                'notes' => 'Pertumbuhan bagus'
            ],
            [
                'user_id' => $userId,
                'code' => 'RBT-S004',
                'name' => 'NZ Junior 2',
                'gender' => 'betina',
                'breed' => 'New Zealand',
                'birth_date' => Carbon::now()->subMonths(2),
                'weight' => 1.3,
                'status' => 'sapihan',
                'health_status' => 'sehat',
                'notes' => 'Calon indukan'
            ],
            
            // Kelinci dengan kondisi khusus
            [
                'user_id' => $userId,
                'code' => 'RBT-K001',
                'name' => 'Rex Sick',
                'gender' => 'jantan',
                'breed' => 'Rex',
                'birth_date' => Carbon::now()->subMonths(6),
                'weight' => 2.5,
                'status' => 'produktif',
                'health_status' => 'sakit',
                'notes' => 'Sedang dalam perawatan'
            ],
            [
                'user_id' => $userId,
                'code' => 'RBT-K002',
                'name' => 'NZ Quarantine',
                'gender' => 'betina',
                'breed' => 'New Zealand',
                'birth_date' => Carbon::now()->subMonths(7),
                'weight' => 3.1,
                'status' => 'produktif',
                'health_status' => 'karantina',
                'notes' => 'Baru dibeli, observasi'
            ],
            [
                'user_id' => $userId,
                'code' => 'RBT-A001',
                'name' => 'Lokal Old',
                'gender' => 'jantan',
                'breed' => 'Lokal',
                'birth_date' => Carbon::now()->subMonths(48),
                'weight' => 2.8,
                'status' => 'afkir',
                'health_status' => 'sehat',
                'notes' => 'Sudah tua, akan diafkir'
            ],
        ];
        
        foreach ($rabbits as $rabbit) {
            Rabbit::create($rabbit);
        }
        
        $this->command->info('Rabbit seeder completed! Total: ' . count($rabbits) . ' rabbits added.');
    }
}
