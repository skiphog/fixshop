<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property int              $id
 * @property int|null         $user_id
 * @property int              $quantity
 * @property float            $weight
 * @property float            $amount
 * @property string           $name
 * @property string           $email
 * @property string           $phone
 * @property string|null      $organization
 * @property string|null      $note
 * @property Carbon|null      $created_at
 * @property Carbon|null      $updated_at
 *
 * @property-read int|null    $order_item_count
 * @property-read OrderItem[] $order_items
 * @property-read User        $user
 */
class Order extends Model
{
    /**
     * @var string
     */
    protected $table = 'orders';

    /**
     * @var array
     */
    protected $guarded = [];

    /**
     * @return HasMany
     */
    public function orderItems(): HasMany
    {
        return $this->hasMany(OrderItem::class, 'order_id', 'id');
    }

    /**
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id')->withDefault();
    }
}
