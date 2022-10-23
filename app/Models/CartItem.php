<?php

namespace App\Models;

use Carbon\Carbon;
use App\Events\CartItemUpdated;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property int         $id
 * @property int         $cart_id
 * @property int         $product_id
 * @property int         $quantity
 * @property float       $weight
 * @property float       $amount
 * @property Carbon      $created_at
 *
 * @property Cart        $cart
 * @property Product     $product
 * @property-read string $weight_format
 * @property-read string $amount_format
 */
class CartItem extends Model
{
    /**
     * @var string
     */
    protected $table = 'cart_items';

    /**
     * @var array
     */
    protected $guarded = [];

    /**
     * @var bool
     */
    public $timestamps = false;

    /**
     * @var string[]
     */
    protected $dispatchesEvents = [
        'created' => CartItemUpdated::class,
        'updated' => CartItemUpdated::class,
        'deleted' => CartItemUpdated::class,
    ];

    /**
     * @return BelongsTo
     */
    public function cart(): BelongsTo
    {
        return $this->belongsTo(Cart::class, 'cart_id', 'id');
    }

    /**
     * @return HasOne
     */
    public function product(): HasOne
    {
        return $this->hasOne(Product::class, 'id', 'product_id');
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
