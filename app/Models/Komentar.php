<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Komentar extends Model
{
    use HasFactory;

    protected $table = 't_komentar'; 
    protected $primaryKey = 'komentar_id';

    public $timestamps = false; 

    /**
     * The attributes that are mass assignable.
     *
     * @var array<string>
     */
    protected $fillable = [
        'user_id',
        'bandul_id',
        'review',
        'rating',
        'profile_image',
        'is_approved',
        'created_at',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'is_approved' => 'boolean',
        'created_at' => 'datetime',
    ];

    /**
     * Define a relationship with the User model.
     *
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    /**
     * Define a relationship with the Bandul model.
     *
     * @return BelongsTo
     */
    public function bandul(): BelongsTo
    {
        return $this->belongsTo(Bandul::class, 'bandul_id', 'id');
    }

    /**
     * Scope for fetching approved comments only.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeApproved($query)
    {
        return $query->where('is_approved', true);
    }

    /**
     * Scope for fetching comments related to a specific bandul.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @param  int  $bandulId
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeForBandul($query, $bandulId)
    {
        return $query->where('bandul_id', $bandulId);
    }

    /**
     * Accessor for displaying the profile image URL.
     *
     * If no profile image is uploaded, it generates a text-based avatar
     * using a public avatar API like UI Avatars.
     *
     * @return string
     */
    public function getProfileImageUrlAttribute(): string
    {
        if ($this->profile_image) {
            return asset('storage/' . $this->profile_image);
        }

        $name = $this->user->name ?? 'Guest';
        $encodedName = urlencode($name);

        return "https://ui-avatars.com/api/?name={$encodedName}&background=007bff&color=ffffff&size=128";
    }
}
