<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Forum extends Model
{
    protected $table = 't_forum';
    protected $primaryKey = 'forum_id';
    public $timestamps = false; 

    protected $fillable = [
        'user_id',
        'pesan',
        'created_at',
    ];

    protected $casts = [
        'created_at' => 'datetime',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
