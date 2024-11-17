<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Komentar extends Model
{
    use HasFactory;

    protected $table = 't_komentar'; // Nama tabel sesuai migration

    protected $fillable = [
        'customer_id',
        'admin_id',
        'post_id',
        'isi_komentar',
        'jumlah_like',
        'waktu_komentar'
    ];

    protected $casts = [
        'waktu_komentar' => 'datetime',
    ];

    public function customer(): BelongsTo
    {
        return $this->belongsTo(User::class, 'customer_id');
    }

    public function admin(): BelongsTo
    {
        return $this->belongsTo(User::class, 'admin_id');
    }

    public function post(): BelongsTo
    {
        return $this->belongsTo(Forum::class, 'post_id');
    }

    public function replies(): HasMany
    {
        return $this->hasMany(Komentar::class, 'parent_id');
    }

    public function parent(): BelongsTo
    {
        return $this->belongsTo(Komentar::class, 'parent_id');
    }
}
