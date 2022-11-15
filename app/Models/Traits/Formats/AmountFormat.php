<?php

namespace App\Models\Traits\Formats;

use Illuminate\Database\Eloquent\Casts\Attribute;

/**
 * @property-read string $amount_format
 */
trait AmountFormat
{
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
