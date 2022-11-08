<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int         $id
 * @property int|null    $user_id
 * @property int         $quantity
 * @property float       $weight
 * @property float       $amount
 * @property string      $name
 * @property string      $email
 * @property string      $phone
 * @property string|null $organization
 * @property string|null $note
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
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
}
