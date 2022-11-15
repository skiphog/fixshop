<?php

namespace App\Models\Traits\Formats;

use Illuminate\Database\Eloquent\Casts\Attribute;

/**
 * @property-read string $quantity_format
 */
trait QuantityFormat
{
    /**
     * @return Attribute
     * @noinspection PhpUnused
     */
    protected function quantityFormat(): Attribute
    {
        return Attribute::make(
            get: static fn($value, $attributes) => formatting($attributes['quantity'] ?? 0, 3),
        );
    }
}
