<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Bandul extends Model
{
    use HasFactory;

    protected $table = 't_bandul'; // Nama tabel sesuai migration
    protected $primaryKey = 'bandul_id';

    protected $fillable = [
        'customer_id',
        'admin_id',
        'voltase_baterai',
        'kecepatan_bandul',
        'total_daya',
        'hasil_daya',
        'waktu_kinerja_bandul'
    ];

    protected $casts = [
        'waktu_kinerja_bandul' => 'datetime',
    ];

    public function customer(): BelongsTo
    {
        return $this->belongsTo(User::class, 'customer_id');
    }

    public function admin(): BelongsTo
    {
        return $this->belongsTo(User::class, 'admin_id');
    }

    public function scopeEnergyAbove($query, $threshold)
    {
        return $query->where('total_daya', '>', $threshold);
    }
}
