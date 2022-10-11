<?php

namespace Database\Seeders;

use JsonException;
use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        Category::truncate();
        Category::flushEventListeners();

        try {
            $categories = json_decode(
                file_get_contents(
                    base_path('database/data/categories.json')
                ), true, 512, JSON_THROW_ON_ERROR
            );
        } catch (JsonException) {
            $categories = [];
        }

        DB::table('categories')->insert($categories);
    }
}
