<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JalurSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('jalurs')->insert([
            [
                'nama' => 'Jalur Pendakian Merapi 1',
                'status' => 'Aktif',
                'gunung_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Jalur Pendakian Bromo 1',
                'status' => 'Aktif',
                'gunung_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Jalur Pendakian Rinjani 1',
                'status' => 'Aktif',
                'gunung_id' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Jalur Pendakian Krakatau 1',
                'status' => 'Tidak Aktif',
                'gunung_id' => 4,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Jalur Pendakian Semeru 1',
                'status' => 'Aktif',
                'gunung_id' => 5,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
