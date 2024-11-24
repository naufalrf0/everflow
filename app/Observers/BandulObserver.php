<?php

namespace App\Observers;

use App\Models\Bandul;
use App\Models\Notifikasi;

class BandulObserver
{
    public function created(Bandul $bandul)
    {
        Notifikasi::create([
            'bandul_id' => $bandul->id,
            'deskripsi' => "Data Bandul baru telah ditambahkan. Voltase: {$bandul->voltase_baterai} V, Kecepatan: {$bandul->kecepatan_bandul} RPM, Total Daya: {$bandul->total_daya} KW, Hasil Daya: {$bandul->hasil_daya} KW.",
        ]);
    }

    public function updated(Bandul $bandul)
    {
        Notifikasi::create([
            'bandul_id' => $bandul->id,
            'deskripsi' => "Data Bandul dengan ID {$bandul->id} telah diperbarui. Voltase: {$bandul->voltase_baterai} V, Kecepatan: {$bandul->kecepatan_bandul} RPM, Total Daya: {$bandul->total_daya} KW, Hasil Daya: {$bandul->hasil_daya} KW.",
        ]);
    }
}
