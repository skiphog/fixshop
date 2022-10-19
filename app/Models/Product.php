<?php

namespace App\Models;

use Carbon\Carbon;
use App\Models\Traits\Sortable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property int         $id
 * @property int         $category_id
 * @property string      $title
 * @property string      $img
 * @property string|null $content
 * @property float       $price
 * @property string      $price_format
 * @property string      $unit
 * @property float       $weight
 * @property float       $quantity
 * @property int         $packing
 * @property int         $sort
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property Carbon|null $deleted_at
 * @property Category    $category
 */
class Product extends Model
{
    use SoftDeletes, Sortable;

    /**
     * @var string
     */
    protected $table = 'products';

    /**
     * @var array
     */
    protected $guarded = [];

    /**
     * @return BelongsTo
     */
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    /**
     * @return Attribute
     * @noinspection PhpUnused
     */
    protected function img(): Attribute
    {
        return Attribute::make(
            get: fn($value) => $value ? "/images/catalog/{$value}.jpg" : $this->category->img,
        );
    }

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
