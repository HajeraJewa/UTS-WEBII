<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PemesananSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('pemesanans')->insert([
            [
                'jadwal_pendakian_id' => 1,
                'nama_pemesan' => 'Andi Pratama',
                'no_hp' => '081234567890',
                'jumlah_tiket' => 2,
                'status' => 'Terkonfirmasi',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'jadwal_pendakian_id' => 2,
                'nama_pemesan' => 'Siti Aisyah',
                'no_hp' => '082345678901',
                'jumlah_tiket' => 3,
                'status' => 'Tertunda',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'jadwal_pendakian_id' => 3,
                'nama_pemesan' => 'Budi Santoso',
                'no_hp' => '083456789012',
                'jumlah_tiket' => 1,
                'status' => 'Dibatalkan',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
