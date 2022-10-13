<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * App\Models\Rubric
 *
 * @property int            $id
 * @property int            $parent_id
 * @property string         $slug
 * @property string         $title
 * @property string         $content
 *
 * @mixin Eloquent
 *
 * @property-read int|null  $articles_count
 * @property-read Article[] $articles
 */
class Rubric extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * @var string
     */
    protected $table = 'rubrics';

    /**
     * @var array
     */
    protected $guarded = [];

    /**
     * @var bool
     */
    public $timestamps = false;

    /**
     * @return HasMany
     */
    public function articles(): HasMany
    {
        return $this->hasMany(Article::class, 'rubric_id', 'id');
    }
}
