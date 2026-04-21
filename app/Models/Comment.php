<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
        'body'
    ];

    // Relacion uno a muchos inversa
    public function posts()
    {
        return $this->belongsTo(Post::class);
    }
}
