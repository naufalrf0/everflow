<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\HasMany;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 't_users'; // Nama tabel sesuai migration

    protected $fillable = ['name', 'email', 'password', 'role'];

    protected $hidden = ['password', 'remember_token'];

    public function banduls(): HasMany
    {
        return $this->hasMany(Bandul::class, 'customer_id'); // Relasi ke Bandul sebagai customer
    }

    public function managedBanduls(): HasMany
    {
        return $this->hasMany(Bandul::class, 'admin_id'); // Relasi ke Bandul sebagai admin
    }

    public function forums(): HasMany
    {
        return $this->hasMany(Forum::class, 'customer_id'); // Relasi ke Forum sebagai customer
    }

    public function managedForums(): HasMany
    {
        return $this->hasMany(Forum::class, 'admin_id'); // Relasi ke Forum sebagai admin
    }

    public function comments(): HasMany
    {
        return $this->hasMany(Komentar::class, 'customer_id'); // Relasi ke Komentar sebagai customer
    }

    public function managedComments(): HasMany
    {
        return $this->hasMany(Komentar::class, 'admin_id'); // Relasi ke Komentar sebagai admin
    }

    public function scopeRole($query, $role)
    {
        return $query->where('role', $role);
    }

    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = bcrypt($value);
    }
}
