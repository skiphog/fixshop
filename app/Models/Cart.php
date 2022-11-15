<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use App\Models\Traits\Formats\WeightFormat;
use App\Models\Traits\Formats\AmountFormat;
use App\Models\Traits\Formats\QuantityFormat;
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
    use QuantityFormat, WeightFormat, AmountFormat;

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
}
