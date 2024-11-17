<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Forum extends Model
{
    use HasFactory;

    protected $table = 't_forum'; // Nama tabel sesuai migration

    protected $fillable = [
        'customer_id',
        'admin_id',
        'judul_postingan',
        'isi_postingan',
        'jumlah_like',
        'jumlah_komentar',
        'waktu_post'
    ];

    protected $casts = [
        'waktu_post' => 'datetime',
    ];

    public function customer(): BelongsTo
    {
        return $this->belongsTo(User::class, 'customer_id');
    }

    public function admin(): BelongsTo
    {
        return $this->belongsTo(User::class, 'admin_id');
    }

    public function comments(): HasMany
    {
        return $this->hasMany(Komentar::class, 'post_id');
    }

    public function scopeCategory($query, $category)
    {
        return $query->where('kategori', $category);
    }
}
