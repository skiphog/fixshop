<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property int        $id
 * @property string     $cookie_id
 * @property int        $quantity
 * @property float      $weight
 * @property float      $amount
 * @property Carbon     $created_at
 *
 * @property CartItem[] $items
 * @property-read int   $items_count
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
}
