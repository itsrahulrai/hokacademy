<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Page extends Model
{
    protected $fillable = [
        'slug',
        'title',
        'header_title',
        'header_subtitle',
        'content',
        'meta_title',
        'meta_description',
        'meta_keywords',
        'canonical_url',
        'og_image',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    public function sections(): HasMany
    {
        return $this->hasMany(PageSection::class, 'page_slug', 'slug')->orderBy('sort_order');
    }

    public function getSection(string $key, mixed $default = null): ?PageSection
    {
        return $this->sections->firstWhere('section_key', $key) ?? $default;
    }
}

