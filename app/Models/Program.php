<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Program extends Model
{
    protected $fillable = [
        'category_id',
        'title',
        'slug',
        'anchor',
        'short_description',
        'full_description',
        'image',
        'icon',
        'highlights',
        'curriculum',
        'duration',
        'eligibility',
        'certification',
        'is_featured',
        'sort_order',
        'meta_title',
        'meta_description',
        'meta_keywords',
        'is_active',
    ];

    protected $casts = [
        'highlights' => 'array',
        'curriculum' => 'array',
        'is_featured' => 'boolean',
        'is_active' => 'boolean',
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(ProgramCategory::class, 'category_id');
    }

    /**
     * Get image URL fallback.
     */
    public function getImageUrlAttribute(): string
    {
        if ($this->image) {
            if (str_starts_with($this->image, 'http') || str_starts_with($this->image, 'assets/')) {
                return asset($this->image);
            }
            return asset('storage/' . $this->image);
        }

        if ($this->anchor) {
            return asset('assets/img/expertise/' . $this->anchor . '.webp');
        }

        return asset('assets/img/logo.jpg');
    }
}

