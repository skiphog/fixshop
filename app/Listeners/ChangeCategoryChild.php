<?php

namespace App\Listeners;

use App\Models\Category;
use App\Events\CategoryUpdated;

class ChangeCategoryChild
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param CategoryUpdated $event
     *
     * @return void
     */
    public function handle(CategoryUpdated $event): void
    {
        $event->category->children()->withTrashed()->each(static function (Category $category) {
            $category->update(Category::makeData($category->parent_id, $category->code));
        });
    }
}
