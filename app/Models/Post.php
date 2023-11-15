<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Post extends Model
{
    use HasFactory;

    // Model events -----------------------------------------------------------
    protected static function booted()
    {
        static::creating(function ($post) {
            $post->slug = $post->slug ?? Str::slug($post->title);
        });
    }

    // Model Relationships -----------------------------------------------------
    public function author()
    {
        return $this->belongsTo(User::class, 'author_id');
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }
}
