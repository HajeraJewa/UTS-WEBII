<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JadwalPendakianSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('jadwal_pendakians')->insert([
            [
                'gunung_id' => 1,
                'jalur_id' => 1,
                'tanggal_pendakian' => '2025-05-10',
                'kuota' => 100,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'gunung_id' => 2,
                'jalur_id' => 2,
                'tanggal_pendakian' => '2025-05-15',
                'kuota' => 80,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'gunung_id' => 3,
                'jalur_id' => 3,
                'tanggal_pendakian' => '2025-06-01',
                'kuota' => 120,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'gunung_id' => 4,
                'jalur_id' => 4,
                'tanggal_pendakian' => '2025-06-10',
                'kuota' => 50,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'gunung_id' => 5,
                'jalur_id' => 5,
                'tanggal_pendakian' => '2025-06-20',
                'kuota' => 150,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
