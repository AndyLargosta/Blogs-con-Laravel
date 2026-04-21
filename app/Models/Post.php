<?php

namespace App\Models;

use Dom\Comment;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage as Storage;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'image_path',
        'excerpt',
        'content',
        'is_published',
        'published_at',
        'user_id',
        'category_id',
    ];

    protected $casts = [
        'is_published' => 'boolean',
        'published_at' => 'datetime',
    ];

    // Accesores
    protected function image():Attribute
    {
        return Attribute::make(
            get: fn() => $this->image_path ? Storage::url($this->image_path) : 'https://upload.wikimedia.org/wikipedia/commons/d/d1/Image_not_available.png',
        );

    }

    // Route Model Binding
    public function getRouteKeyName()
    {
        return 'slug';
    }

    //Relaciones
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function user()
    {
        return $this->belongsTo(Category::class);
    }

    // Relacion uno a muchos
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }


    // Relacion muchos a muchos
    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }
}
