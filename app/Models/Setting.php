<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $fillable = [
        'key',
        'value',
        'group',
        'type',
        'label',
    ];

    /**
     * Get a setting value by key with optional fallback.
     */
    public static function get(string $key, mixed $default = null): mixed
    {
        $setting = static::where('key', $key)->first();
        return $setting && $setting->value !== null ? $setting->value : $default;
    }

    /**
     * Set a setting value by key.
     */
    public static function set(string $key, mixed $value, string $group = 'general', string $type = 'text', ?string $label = null): static
    {
        $setting = static::where('key', $key)->first();
        if ($setting) {
            $setting->value = $value;
            $setting->save();
            return $setting;
        }

        return static::create([
            'key' => $key,
            'value' => $value,
            'group' => $group,
            'type' => $type,
            'label' => $label ?? ucwords(str_replace('_', ' ', $key)),
        ]);
    }
}

