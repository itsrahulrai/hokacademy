<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FacultyMember extends Model
{
    protected $fillable = [
        'name',
        'designation',
        'speciality',
        'tag',
        'tone_class',
        'bio',
        'image',
        'skills_chips',
        'sort_order',
        'is_visiting',
        'is_active',
    ];

    protected $casts = [
        'skills_chips' => 'array',
        'is_visiting' => 'boolean',
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

