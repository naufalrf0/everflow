<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bandul extends Model
{
    protected $table = 't_bandul';
    protected $primaryKey = 'id';

    protected $fillable = [
        'voltase_baterai',
        'kecepatan_bandul',
        'total_daya',
        'hasil_daya',
        'waktu_kinerja_bandul',
    ];

    public function notifikasi()
    {
        return $this->hasMany(Notifikasi::class, 'bandul_id', 'id');
    }

    public function komentar()
    {
        return $this->hasMany(Komentar::class, 'bandul_id', 'id');
    }
}
