<?php

namespace App\Models\Traits\Formats;

use Illuminate\Database\Eloquent\Casts\Attribute;

/**
 * @property-read string $price_format
 */
trait PriceFormat
{
    /**
     * @return Attribute
     * @noinspection PhpUnused
     */
    protected function priceFormat(): Attribute
    {
        return Attribute::make(
            get: static fn($value, $attributes) => formatting($attributes['price'], 2),
        );
    }
}
