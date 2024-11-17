<?php

namespace Database\Seeders;

use App\Models\Bandul;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class BandulSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $performances = [
            [
                'customer_id' => 1, 
                'admin_id' => 1,
                'voltase_baterai' => 12,
                'kecepatan_bandul' => 1150,
                'total_daya' => 145,
                'hasil_daya' => 130,
                'waktu_kinerja_bandul' => Carbon::parse('08:00'),
            ],
            [
                'customer_id' => 1, 
                'admin_id' => 1,
                'voltase_baterai' => 12,
                'kecepatan_bandul' => 1180,
                'total_daya' => 148,
                'hasil_daya' => 135,
                'waktu_kinerja_bandul' => Carbon::parse('12:00'),
            ],
            [
                'customer_id' => 1, 
                'admin_id' => 1,
                'voltase_baterai' => 12,
                'kecepatan_bandul' => 1200,
                'total_daya' => 150,
                'hasil_daya' => 140,
                'waktu_kinerja_bandul' => Carbon::parse('16:00'),
            ]
        ];

        foreach ($performances as $performance) {
            Bandul::create($performance);
        }

        $this->command->info('3 data berhasil dimasukkan ke tabel t_bandul.');
    }
}
