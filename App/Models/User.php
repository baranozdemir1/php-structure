<?php

namespace App\Models;

use Core\Model;

class User extends Model
{

    public function post(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Post::class);
    }

}