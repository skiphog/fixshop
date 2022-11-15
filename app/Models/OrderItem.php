<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Traits\Formats\PriceFormat;
use App\Models\Traits\Formats\AmountFormat;
use App\Models\Traits\Formats\QuantityFormat;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property int         $id
 * @property int         $order_id
 * @property string      $title
 * @property float       $quantity
 * @property string      $unit
 * @property float       $price
 * @property float       $amount
 *
 * @property-read Order  $order
 * @property-read string $quantity_format
 * @property-read string $price_format
 * @property-read string $amount_format
 */
class OrderItem extends Model
{
    use QuantityFormat, PriceFormat, AmountFormat;

    /**
     * @var string
     */
    protected $table = 'order_items';

    /**
     * @var array
     */
    protected $guarded = [];

    /**
     * @var bool
     */
    public $timestamps = false;

    /**
     * @return BelongsTo
     */
    public function order(): BelongsTo
    {
        return $this->belongsTo(Order::class, 'order_id', 'id');
    }
}
