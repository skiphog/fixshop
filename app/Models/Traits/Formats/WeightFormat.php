<?php

namespace App\Models\Traits\Formats;

use Illuminate\Database\Eloquent\Casts\Attribute;

/**
 * @property-read string $weight_format
 */
trait WeightFormat
{
    /**
     * @return Attribute
     * @noinspection PhpUnused
     */
    protected function weightFormat(): Attribute
    {
        return Attribute::make(
            get: static fn($value, $attributes) => formatting($attributes['weight'] ?? 0, 2),
        );
    }
}
