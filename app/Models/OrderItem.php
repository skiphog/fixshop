<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int    $id
 * @property int    $order_id
 * @property string $title
 * @property float  $quantity
 * @property string $unit
 * @property float  $price
 * @property float  $amount
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
}
