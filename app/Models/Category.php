<?php

namespace App\Models;

use Illuminate\Support\Carbon;
use App\Models\Traits\Sortable;
use App\Events\CategoryUpdated;
use Illuminate\Support\Facades\Cache;
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
 * @property Product[]   $products
 * @property-read int    $children_count
 * @property-read int    $products_count
 * @property Category    $parent
 */
class Category extends Model
{
    use SoftDeletes, Sortable;

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
     * @var string[]
     */
    protected $casts = [
        'breadcrumbs' => 'array'
    ];

    /**
     * @var string[]
     */
    protected $dispatchesEvents = [
        'updated' => CategoryUpdated::class
    ];

    /**
     * @return array
     */
    public static function tree(): array
    {
        return Cache::rememberForever('categories_tree', static function () {
            $categories = static::select(['id', 'parent_id', 'slug', 'nav'])
                ->sorted()
                ->get()
                ->keyBy('id')
                ->toArray();

            return make_tree($categories);
        });
    }

    /**
     * @param int    $parent_id
     * @param string $code
     *
     * @return array
     */
    public static function makeData(int $parent_id, string $code): array
    {
        $data = [
            'slug'        => $code,
            'breadcrumbs' => []
        ];

        if (0 !== $parent_id) {
            $category = static::withTrashed()->find($parent_id, ['id', 'nav', 'slug', 'breadcrumbs']);
            $data['slug'] = "{$category->slug}/{$code}";
            $data['breadcrumbs'] = array_merge($category->breadcrumbs, [
                ['id' => $category->id, 'slug' => $category->slug, 'nav' => $category->nav]
            ]);
        }

        return $data;
    }

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

    /**
     * @return HasMany
     */
    public function products(): HasMany
    {
        return $this->hasMany(Product::class, 'category_id', 'id');
    }
}
