<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
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
 * @property string           $status
 * @property Carbon|null      $created_at
 * @property Carbon|null      $updated_at
 *
 * @property-read int|null    $order_item_count
 * @property-read OrderItem[] $order_items
 * @property-read User        $user
 * @property-read string      $status_text
 */
class Order extends Model
{
    /**
     * Статус заказов
     */
    public const STATUS = [
        'NEW'       => 'new',
        'PENDING'   => 'pending',
        'COMPLETED' => 'completed',
        'CANCELED'  => 'canceled'
    ];

    /**
     * @var string
     */
    protected $table = 'orders';

    /**
     * @var array
     */
    protected $guarded = [];

    /**
     * Статусы
     *
     * @return string[]
     */
    public static function statusList(): array
    {
        return [
            static::STATUS['NEW']       => 'Новый',
            static::STATUS['PENDING']   => 'В обработке',
            static::STATUS['COMPLETED'] => 'Выполнен',
            static::STATUS['CANCELED']  => 'Отменён',
        ];
    }

    /**
     * @return HasMany
     * @noinspection PhpUnused
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

    /**
     * @return Attribute
     * @noinspection PhpUnused
     */
    protected function statusText(): Attribute
    {
        return Attribute::make(get: static function ($value, $attributes) {
            return static::statusList()[$attributes['status']] ?? '';
        });
    }
}
