<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GunungSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('gunungs')->insert([
            [
                'nama' => 'Gunung Merapi',
                'lokasi' => 'Yogyakarta, Indonesia',
                'ketinggian' => 2911,
                'status' => 'Aktif',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Gunung Bromo',
                'lokasi' => 'Jawa Timur, Indonesia',
                'ketinggian' => 2329,
                'status' => 'Aktif',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Gunung Semeru',
                'lokasi' => 'Jawa Timur, Indonesia',
                'ketinggian' => 3676,
                'status' => 'Aktif',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
