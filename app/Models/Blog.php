<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'category_tag',
        'excerpt',
        'content',
        'featured_image',
        'read_time',
        'published_at',
        'is_published',
        'meta_title',
        'meta_description',
        'meta_keywords',
        'canonical_url',
    ];

    protected $casts = [
        'published_at' => 'date',
        'is_published' => 'boolean',
        'read_time' => 'integer',
    ];

    public function getImageUrlAttribute(): string
    {
        if ($this->featured_image) {
            if (str_starts_with($this->featured_image, 'http') || str_starts_with($this->featured_image, 'assets/')) {
                return asset($this->featured_image);
            }
            return asset('storage/' . $this->featured_image);
        }
        return asset('assets/img/why/banner.webp');
    }
}

