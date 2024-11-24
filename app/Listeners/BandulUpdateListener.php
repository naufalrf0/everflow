<?php

namespace App\Listeners;

use App\Models\Bandul;
use App\Models\Notifikasi;

class BandulUpdateListener
{
    /**
     * Handle the event.
     *
     * @param  Bandul  $bandul
     * @return void
     */
    public function handle(Bandul $bandul)
    {
        Notifikasi::create([
            'bandul_id' => $bandul->id,
            'deskripsi' => "Data Bandul dengan ID {$bandul->id} telah diperbarui.",
        ]);
    }
}
