<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Notifikasi extends Model
{
    protected $table = 't_notifikasi';
    protected $primaryKey = 'notifikasi_id';
    public $timestamps = false;

    protected $fillable = [
        'bandul_id',
        'deskripsi',
    ];

    protected $casts = [
        'created_at' => 'datetime',
    ];

    public function bandul()
    {
        return $this->belongsTo(Bandul::class, 'bandul_id', 'id');
    }
}
