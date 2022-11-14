<?php

namespace App\Models\Traits;

use Illuminate\Database\Eloquent\Casts\Attribute;

/**
 * @property-read string $quantity_format
 * @property-read string $weight_format
 * @property-read string $amount_format
 */
trait DataFormat
{
    /**
     * @return Attribute
     * @noinspection PhpUnused
     */
    protected function quantityFormat(): Attribute
    {
        return Attribute::make(
            get: static fn($value, $attributes) => formatting($attributes['quantity'] ?? 0),
        );
    }

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

    /**
     * @return Attribute
     * @noinspection PhpUnused
     */
    protected function amountFormat(): Attribute
    {
        return Attribute::make(
            get: static fn($value, $attributes) => formatting($attributes['amount'] ?? 0, 2),
        );
    }
}
