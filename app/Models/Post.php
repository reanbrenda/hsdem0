<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Spatie\Image\Manipulations;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Post extends Model implements HasMedia
{
    use HasFactory;
    use InteractsWithMedia;

    protected $guarded = [];

    protected $casts = [
        'published_at' => 'datetime',
        'is_featured' => 'boolean',
    ];

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

    // Model attributes --------------------------------------------------------
    public function getThumbnailUrlAttribute()
    {
        return $this->getImageUrl('thumbnail');
    }

    public function getIsOldAttribute()
    {
        if($this->published_at === null) {
            return false;
        }

        return $this->published_at->lt(now()->subMonths(2));
    }

    public function getTimeSincePublishedAttribute()
    {
        if($this->is_old) {
            return 'very old post';
        }

        return $this->published_at->diffForHumans();
    }

    // Model scopes -----------------------------------------------------------------
    public function scopeIsPublished($query)
    {
        return $query->whereNotNull('published_at');
    }

    // Model method ------------------------------------------------------------------
    public function getImageUrl($conversion)
    {
        return ($this->media->isNotEmpty())
            ? $this->media->first()->getUrl($conversion)
            : '/media/default/conversions/default-'.$conversion.'.jpg';
    }

    // Medialibrary settings ----------------------------------------------------------
    public function registerMediaConversions(Media $media = null): void
    {
        $this
            ->addMediaConversion('preview')
            ->fit(Manipulations::FIT_CROP, 300, 200)
            ->nonQueued();
        $this
            ->addMediaConversion('thumbnail')
            ->fit(Manipulations::FIT_CROP, 50, 50)
            ->nonQueued();

    }
}
