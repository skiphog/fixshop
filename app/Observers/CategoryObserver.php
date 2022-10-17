<?php

namespace App\Observers;

use App\Models\Category;
use Illuminate\Support\Facades\Cache;

class CategoryObserver
{
    /**
     * Handle the Category "created" event.
     *
     * @param Category $category
     *
     * @return void
     * @noinspection PhpUnusedParameterInspection
     */
    public function created(Category $category): void
    {
        Cache::forget('categories_tree');
    }

    /**
     * Handle the Category "updated" event.
     *
     * @param Category $category
     *
     * @return void
     */
    public function updated(Category $category): void
    {
        $category->children()->withTrashed()->each(static function (Category $category) {
            $category->update(Category::makeData($category->parent_id, $category->code));
        });

        Cache::forget('categories_tree');
    }

    /**
     * Handle the Category "deleted" event.
     *
     * @param Category $category
     *
     * @return void
     * @noinspection PhpUnusedParameterInspection
     */
    public function deleted(Category $category): void
    {
        Cache::forget('categories_tree');
    }

    /**
     * Handle the Category "restored" event.
     *
     * @param Category $category
     *
     * @return void
     * @noinspection PhpUnused
     * @noinspection PhpUnusedParameterInspection
     */
    public function restored(Category $category): void
    {
        Cache::forget('categories_tree');
    }

    /**
     * Handle the Category "force deleted" event.
     *
     * @param Category $category
     *
     * @return void
     * @noinspection PhpUnused
     * @noinspection PhpUnusedParameterInspection
     */
    public function forceDeleted(Category $category): void
    {
        Cache::forget('categories_tree');
    }
}
