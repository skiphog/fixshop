<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property int        $id
 * @property int        $order_id
 * @property string     $title
 * @property float      $quantity
 * @property string     $unit
 * @property float      $price
 * @property float      $amount
 *
 * @property-read Order $order
 */
class OrderItem extends Model
{
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
