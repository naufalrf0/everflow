<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Bandul;

class BandulSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Bandul::create([
            'voltase_baterai' => 12,
            'kecepatan_bandul' => 3000,
            'total_daya' => 15,
            'hasil_daya' => 14.5,
            'waktu_kinerja_bandul' => now(),
        ]);

        Bandul::create([
            'voltase_baterai' => 24,
            'kecepatan_bandul' => 2800,
            'total_daya' => 20,
            'hasil_daya' => 19,
            'waktu_kinerja_bandul' => now()->subHours(1),
        ]);

        Bandul::create([
            'voltase_baterai' => 48,
            'kecepatan_bandul' => 2500,
            'total_daya' => 25,
            'hasil_daya' => 23.5,
            'waktu_kinerja_bandul' => now()->subHours(2),
        ]);
    }
}
