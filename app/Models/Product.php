<?php

namespace App\Models;

use Carbon\Carbon;
use App\Models\Traits\Sortable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property int         $id
 * @property int         $category_id
 * @property string      $title
 * @property string      $img
 * @property string|null $content
 * @property float       $price
 * @property string      $unit
 * @property float       $weight
 * @property float       $quantity
 * @property int         $packing
 * @property int         $sort
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property Carbon|null $deleted_at
 * @property Category    $category
 */
class Product extends Model
{
    use SoftDeletes, Sortable;

    /**
     * @var string
     */
    protected $table = 'products';

    /**
     * @var array
     */
    protected $guarded = [];

    /**
     * @return BelongsTo
     */
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }
}
