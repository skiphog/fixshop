<?php

namespace App\Models;

use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property int         $id
 * @property int         $parent_id
 * @property string      $code
 * @property string      $slug
 * @property string      $title
 * @property string      $nav
 * @property string|null $standard
 * @property string|null $extra
 * @property string|null $img
 * @property string      $description
 * @property string      $content
 * @property array       $breadcrumbs
 * @property int         $sort
 * @property Carbon|null $deleted_at
 *
 * @property Category[]  $children
 * @property-read int    $children_count
 * @property Category    $parent
 */
class Category extends Model
{
    use SoftDeletes;

    /**
     * @var string
     */
    protected $table = 'categories';

    /**
     * @var bool
     */
    public $timestamps = false;

    /**
     * @var array
     */
    protected $guarded = [];

    /**
     * @return HasMany
     */
    public function children(): HasMany
    {
        return $this->hasMany(static::class, 'parent_id', 'id');
    }

    /**
     * @return BelongsTo
     */
    public function parent(): BelongsTo
    {
        return $this->belongsTo(static::class, 'parent_id', 'id');
    }
}
