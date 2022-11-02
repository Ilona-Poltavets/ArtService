<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function post()
    {
        return $this->hasOne(Post::class, 'post_id', 'id');
    }

    public function answers()
    {
        return $this->hasMany(Answer::class, 'comment_id', 'id');
    }
}
