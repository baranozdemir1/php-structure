<?php

namespace App\Models;

use Core\Model;

class Post extends Model
{

    protected $fillable = [
        'content',
        'user_id'
    ];

    public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class);
    }

}