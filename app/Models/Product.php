<?php

namespace App\Models;

use Carbon\Carbon;
use App\Models\Traits\Sortable;
use Illuminate\Database\Eloquent\Model;
use App\Models\Traits\Formats\PriceFormat;
use App\Models\Traits\Formats\WeightFormat;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Traits\Formats\QuantityFormat;
use Illuminate\Database\Eloquent\Casts\Attribute;
use GeneaLabs\LaravelModelCaching\Traits\Cachable;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property int         $id
 * @property int         $category_id
 * @property string      $title
 * @property string      $img
 * @property string|null $content
 * @property float       $price
 * @property string      $unit
 * @property float       $weight
 * @property float       $quantity
 * @property int         $packing
 * @property int         $sort
 *
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property Carbon|null $deleted_at
 * @property Category    $category
 * @property-read string $price_format
 * @property-read string $weight_format
 * @property-read string $quantity_format
 */
class Product extends Model
{
    use SoftDeletes, Sortable, PriceFormat, WeightFormat, QuantityFormat, Cachable;

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
}
