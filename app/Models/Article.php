<?php

namespace App\Models;

use Eloquent;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * App\Models\Articles
 *
 * @property int         $id
 * @property int         $rubric_id
 * @property int         $user_id
 * @property string      $slug
 * @property string      $title
 * @property string      $img
 * @property string      $intro
 * @property string      $content
 * @property int         $time_to_read
 * @property Carbon|null $deleted_at
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @mixin Eloquent
 * @property-read Rubric        $rubric
 * @property-read User          $user
 * @property-read Promotion[]   $promotions
 */
class Article extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * @var string
     */
    protected $table = 'articles';

    /**
     * @var array
     */
    protected $guarded = [];

    /**
     * @return BelongsTo
     */
    public function rubric(): BelongsTo
    {
        return $this->belongsTo(Rubric::class, 'rubric_id', 'id');
    }

    /**
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    /**
     * @return HasMany
     */
    public function promotions(): HasMany
    {
        return $this->hasMany(Promotion::class, 'article_id', 'id');
    }

    /**
     * Это второй вариант.
     * Прямо здесь нахуярить путь
     *
     * @return string
     */
    public function path(): string
    {
        return route('blog.article.show', ['rubric' => $this->rubric, 'article' => $this]);
    }
}
