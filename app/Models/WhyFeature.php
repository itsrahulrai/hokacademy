<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WhyFeature extends Model
{
    protected $fillable = [
        'type',
        'anchor_id',
        'title',
        'subtitle',
        'description',
        'strong_text',
        'image',
        'icon',
        'tone_class',
        'chips',
        'is_wide',
        'sort_order',
        'is_active',
    ];

    protected $casts = [
        'chips' => 'array',
        'is_wide' => 'boolean',
        'is_active' => 'boolean',
    ];

    public function getImageUrlAttribute(): string
    {
        if ($this->image) {
            if (str_starts_with($this->image, 'http') || str_starts_with($this->image, 'assets/')) {
                return asset($this->image);
            }
            return asset('storage/' . $this->image);
        }
        return asset('assets/img/why/faculty.webp');
    }
}

