<?php

namespace Database\Seeders;

use App\Models\Promotion;
use App\Models\Article;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PromotionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        {
            DB::statement('SET FOREIGN_KEY_CHECKS = 0');

            Promotion::truncate();
            Promotion::flushEventListeners();


            Article::get()->each(static function (Article $article) {
                Promotion::factory(random_int(1, 2))->create([
                    'article_id' => $article->id,
                ]);
            });
        }
    }
}
