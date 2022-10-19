<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property int         $id
 * @property string      $cookie_id
 * @property int         $quantity
 * @property float       $weight
 * @property float       $amount
 * @property Carbon      $created_at
 *
 * @property CartItem[]  $items
 * @property-read int    $items_count
 * @property-read string $quantity_format
 * @property-read string $weight_format
 * @property-read string $amount_format
 */
class Cart extends Model
{
    /**
     * @var string
     */
    protected $table = 'carts';

    /**
     * @var array
     */
    protected $guarded = [];

    /**
     * @var bool
     */
    public $timestamps = false;

    /**
     * @return HasMany
     */
    public function items(): HasMany
    {
        return $this->hasMany(CartItem::class, 'cart_id', 'id');
    }

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
