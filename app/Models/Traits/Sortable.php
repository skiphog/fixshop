<?php

namespace App\Models\Traits;

use Illuminate\Database\Eloquent\Builder;

/**
 * @property int $sort
 * @method Builder sorted()
 */
trait Sortable
{
    /**
     * @param Builder $query
     *
     * @return Builder
     * @noinspection PhpUnused
     */
    public function scopeSorted(Builder $query): Builder
    {
        return $query->orderBy('sort');
    }
}
