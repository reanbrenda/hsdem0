<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $guarded = [];

    // Model Relationships -----------------------------------------------------
    public function posts()
    {
        return $this->belongsToMany(Post::class);
    }
}
